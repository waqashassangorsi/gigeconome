<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
		$this->load->library('form_validation');
		$this->load->library('Googleplus');
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}

	public function index()
	{ 
		
		if($this->session->userdata('UserLoggedIn')){
			redirect(SURL."/Home");
		}
		
		$data['googleURL'] = $this->googleplus->loginURL();
		
		$this->form_validation->set_rules("email","Email",'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('pass', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{	
			
			$this->load->view("Frond_end", $data);
		}
		else
		{ 	
			$con['conditions'] = array(	
				"email"=>$this->input->post("email"),
				"password"=>sha1($this->input->post("pass")),
			);

			$record = $this->Common->get_rows("users",$con)[0];
			//echo "<pre>";var_dump($record); exit;
			if($record){
				$this->session->set_userdata("UserLoggedIn","True");
				$this->session->set_userdata("Enduser",$record['u_id']);

				redirect(SURL."Home");
			}
			
			$this->load->view('Frond_end');
		}

		
		
	}

	public function email_check(){
		$email = $this->input->post("email");
		$pass = sha1($this->input->post("pass")); 
		
		$query = $this->db->query("select * from users where email='$email' and password='$pass'");
		if($query->num_rows() > 0){

			
            return TRUE;

		}else{
			$this->form_validation->set_message('email_check', 'Wrong email/pasword');
			return FALSE;
		}
	}
	
	

	

	
}
