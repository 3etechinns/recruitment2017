<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','language'));
	}

	public function index()
	{	
		$this->data['session'] = $this->session->userdata();
		$this->data['pending'] = $this->get_pending();
		$this->data['completed'] = $this->get_completed();
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('issue',$this->data);
	}

	public function get_pending()
	{
		$id = $this->session->userdata('user_id');
		$this->db->where('status','0');
		$this->db->where('developer', $id);
		$this->db->order_by('severity', 'DESC');
		return $this->db->get('complaint')->result_array();
	}

	public function get_completed()
	{
		$id = $this->session->userdata('user_id');
		$this->db->where('status', '1');
		$this->db->where('developer', $id);
		$this->db->order_by('severity', 'DESC');
		return $this->db->get('complaint')->result_array();
	}

	public function update()
	{
		$data = array('progress' 	=> $this->input->post('progress'),
						'status'	=> $this->input->post('status'));
		$this->db->where('id', $this->input->post('id'));
		if($this->db->update('complaint', $data))
		{
			if($this->input->post('progress') == 100 && $this->input->post('status') == 1)
			{
				$this->send_mail($this->input->post('id'));
			}
			$this->session->set_flashdata('message', 'Issue updated');
			redirect('issue', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', $this->db->error()['message']);
			redirect('issue', 'refresh');
		}
	}

	//Sends automatic mail to compliant
	public function send_mail($value)
	{
		$this->db->where('id', $value);
		$data = $this->db->get('complaint')->row_array();

		require_once(APPPATH."third_party/sendgrid/sendgrid-php.php");
		//replace api key
		$apiKey = 'API KEY';
		//@replace system email
		$message = 'Dear user,\n'.
		
				   $value['name'].' complaint you lodge on '.date('Y-m-d h:m:s', $value['time']). ' with code '.$value['code'].' has been resolved\n'.
				   'Please let us know of any other short-comings after this resolution\n'.

				   'Thank you';

		$from = new SendGrid\Email("Client Support Portal", "system_email");
		$subject = "Complaint code, ".$value['code'];
		$to = new SendGrid\Email("User", $value['email']);
		$content = new SendGrid\Content("text/html", $message);

		$mail = new SendGrid\Mail($from, $subject, $to, $content);

		// $apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		

		$this->response = $sg->client->mail()->send()->post($mail);
		return $this->response->statusCode();
	}
}