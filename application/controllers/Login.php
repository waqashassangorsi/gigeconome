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
		if($this->session->userdata('AdminLoggedIn')){
			redirect(SURL."/Dashboard");
		}


		if(isset($_POST['submit'])){

			 $email = $_POST['email'];
			 $pass  = sha1($_POST['password']); 
			 
			$sql = "select * from users where email='$email' and pass='$pass' and status='Active' and 
			 	user_status in ('Admin','Employee')";
            
			 $query = $this->db->query($sql);
			 //echo $query->num_rows();exit;
			 if($query->num_rows() > 0){
			 	$result = $query->result_array();
			 	
			 	$this->session->set_userdata("distributor",$result[0]['u_id']);
				$this->session->set_userdata('AdminLoggedIn',TRUE);
			 	redirect(SURL."Dashboard");

			 }else{
				$data['error'] = "Invalid Email/Password";
			}
			
		}


		$this->load->view("Login", $data);
		
	}

	

	
}
