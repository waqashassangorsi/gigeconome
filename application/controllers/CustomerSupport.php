<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerSupport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		$this->load->model('Common');
			$this->load->library('Check');
		
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
		
		$this->load->view("CustomerSupport", $data);

		
	}


	
}
