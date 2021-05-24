<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->checksession();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
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
	   ///echo $this->session->userdata("user");
		if(!empty($this->input->post("status"))){

		    $status = $this->input->post("status"); 
			$con['conditions'] = array("u_id"=>$this->session->userdata("user"));
			$this->common->update("users",array("user_status"=>$status),$con);


			if($status == "User"){

				redirect(SURL."Completeprofile");

			}else{

				redirect(SURL."Completeprofile");

			}

		}
		$this->load->view("Type", $data);

		
	}


	
}
