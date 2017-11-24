<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {

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
		$this->data['history'] = $this->get();
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('complaint',$this->data);
	}

	public function get()
	{
		$this->db->order_by('severity', 'DESC');
		return $this->db->get('complaint')->result_array();
	}

	public function add()
	{
		$this->form_validation->set_rules('name','', 'required');
		$this->form_validation->set_rules('description','', 'required');

		$code = $this->generate_code();

		$developer = $this->assign_developer();

		$data = array('name' 		=> $this->input->post('name'),
					  'description' => $this->input->post('description'),
					  'severity'	=> $this->input->post('severity'),
					  'email'		=> $this->input->post('email'),
					  'code'		=> $code,
					  'time'		=> time(),
					  'developer'	=> $developer);
		if ($this->form_validation->run() == true)
		{

			if($this->db->insert('complaint', $data))
			{
					$this->session->set_flashdata('message', 'The code for your complaint is '.$code);
					redirect('welcome', 'refresh');
			}
			else
			{
					$this->session->set_flashdata('message', $this->db->error()['message']);
					redirect('welcome', 'refresh');
			}
		}
		else
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('welcome', $this->data);
		}
	}

	public function generate_code()
	{
		return strval(rand(1004, 9898));
	}

	public function assign_developer()
	{
		$query = $this->db->query('select developer, count(*) as c FROM .complaint WHERE status = 1 GROUP BY developer');
		if($query->num_rows() > 0)
		{

		$value = max($query->result_array());
		
		return $value['developer'];
		}
		$data = $this->db->query('select * from users')
		if($data->num_rows() <= 0)
		{
			$message = $this->session->flashdata("Cannot process request at this time. Please check back later");
			redirect('welcome','refresh');
		}

		return '1';

	}

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

}
