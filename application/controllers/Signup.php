<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
		$this->load->library('Googleplus');
		error_reporting(0);

	}

	public function google_response()
	{ 
		
		if(isset($_GET['code'])){

           $this->googleplus->getAuthenticate();
            
           $email=$this->googleplus->getUserInfo()['email']; 
           $fname=$this->googleplus->getUserInfo()['name']; 
            
           $chkuser = $this->db->query("select * from users where email='$email'");
           if($chkuser->num_rows() > 0){
               $record = $chkuser->result_array()[0];
               //var_dump($record); exit;
               $this->session->set_userdata("UserLoggedIn","True");
			   $this->session->set_userdata("Enduser",$record['u_id']);
			   redirect(SURL."Checkup");
				
           }else{
               
               $array = array(	
    				"name"=>$fname,
    				"email"=>$email,
    				"joining_date"=>date("Y-m-d"),
    				"user_status"=>0
    			);

    			$insert = $this->Common->insert("users",$array);
    			if($insert){
    				$this->session->set_userdata("UserLoggedIn","True");
    				$this->session->set_userdata("Enduser",$insert);
    
    				redirect(SURL."Checkup");
    			}
			
			
           }

        }else{

             redirect(SURL."Signup");

            

        }
		
	}
	
	
}
