<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freelancerdash extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
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
	    $userid = $this->session->userdata("user");
		$data['ranking_user'] = $this->db->query("select users.* from users where user_status='User' and status='Active'")->result_array();
		
		$data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id where services.u_id='".$userid."'")->result_array();
		
		$data['projects'] = $this->db->query("select jobs.*,users.* from jobs inner join users on jobs.u_id=users.u_id where job_awarded_to='".$userid."' and job_status='Ongoing'")->result_array();
		//echo "<pre>";var_dump($data['projects']);
		
		$this->load->view("Freelancerdash", $data);

		
	}


	
}
