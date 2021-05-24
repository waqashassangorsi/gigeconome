<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('common');
		
	}

	public function index()
	{ 
		if($this->session->userdata('LoggedIn')){
			redirect(SURL."/Dashboard");
		}

		$data = "";

		if(isset($_POST['submit'])){

			$email = $_POST['email'];
			$pass  = sha1($_POST['password']); 

			$user_record = $this->db->query("select * from users where email='$email' and password='$pass' and user_status in('1','2')"); 
			if($user_record->num_rows() > 0){

				$result = $user_record->result_array()[0];
				//echo "<pre>";var_dump($result); exit();
				$this->session->set_userdata("user",$result['u_id']);
				$this->session->set_userdata('LoggedIn',TRUE);
			 	redirect(SURL."Dashboard");

			}else{
				$data['error'] = "Invalid Email/Password";
			}

			
		}


		$this->load->view("Login", $data);
		
	}

	

	
}
