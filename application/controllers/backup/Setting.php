<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
			$this->checksession();
	}
	
	
	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}
	

	public function index()
	{ 
		
		$this->load->view("Setting", $data);
		
	}
	
	public function check_username()
	{
	    $username = $this->input->post("Status");
	}

	

	
}
