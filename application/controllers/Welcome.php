<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->data['session']	 	= $this->session->userdata();
		$this->data['total']	 	= $this->get_info(1);
		$this->data['pending']	 	= $this->get_info(2);
		$this->data['complete']	 	= $this->get_info(3);
		$this->data['unresolve']	= $this->get_info(4);
		$this->data['message'] 		= (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('welcome_message',$this->data);
	}

	public function get_info($value)
	{
		switch ($value) {
			default:
				case 1:
					return $this->db->count_all_results('complaint');
				
				case 2:
					$this->db->where('progress <', 100);
					$this->db->where('status', '0');
					$this->db->from('complaint');
					return $this->db->count_all_results();
				case 3:
					$this->db->where('progress', 100);
					$this->db->where('status', 1);
					$this->db->from('complaint');
					return $this->db->count_all_results();				
				case 4:
					$this->db->where('progress <', 100);
					$this->db->where('status', 1);
					$this->db->from('complaint');
					return $this->db->count_all_results();
		}
	}
}
