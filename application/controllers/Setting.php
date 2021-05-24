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
			$data['security_questions'] = $this->db->query("select * from security_questions")->result_array();
		$this->load->view("Setting", $data);
		
	}
	
	public function check_username()
	{
	    $username = $this->input->post("Status");
	}

	public function email()
	{ 
	    $email=$this->input->post("email");
	    
	    $query = $this->db->query("select * from users where email='$email' and u_id!='".$this->session->userdata('user')."'");
				
		if($query->num_rows() > 0){
			    	
		$this->session->set_flashdata('fail','Email already exists,plz try another one');
		redirect(SURL);
	    }

		$array = array('email'=> $email);
			    
		$con['conditions'] = array('u_id' =>$this->session->userdata('user')); 

		$query = $this->common->update("users",$array,$con);
	
		if($query){
    	 $this->session->set_flashdata("success","Successfull Updated");
    	 redirect(SURL);
		}else{
    	 
    	 $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
				
				
		
	}
	
	
	public function password()
	{ 
	    $newpassword=sha1($this->input->post("newpassword"));
	    $oldpassword=sha1($this->input->post("oldpassword"));
	    
	    $query = $this->db->query("select * from users where pass='$oldpassword' and u_id='".$this->session->userdata('user')."'");
				
		if($query->num_rows() > 0){
		   	$array = array('pass'=> $newpassword);
			    
		$con['conditions'] = array('u_id'=>$this->session->userdata('user')); 

		$query = $this->common->update("users",$array,$con);
	
		if($query){
    	 $this->session->set_flashdata("success","Successfull Updated");
    	 redirect(SURL);
		}else{
    	 
    	 $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	 } 
		    
		    
	    }

				
	    else
	    {
		$this->session->set_flashdata('fail','Password in Incorrect');
			$this->load->view("Setting");
	    }		
				
		
	}
	
	
		public function Status()
	{ 
	   
	    $status=$this->input->post("status"); 
	   
		$array = array('status'=> $status);
			    
		$con['conditions'] = array('u_id'=>$this->session->userdata('user')); 

		$query = $this->common->update("users",$array,$con);
	
		if($query){
    	 $this->session->set_flashdata("success","Successfull Updated");
    	 $this->load->view("Setting");
		}else{
    	 $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	 $this->load->view("Setting");
    	 } 
		    
		    
	    }
	    
	    
 public function SecurityQuestion()
	{ 
	   
	    $security_ans = $this->input->post("security_ans");
	    
	    $security_qst = $this->input->post("security");
	   
		    
		 $query = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'");
				
		if($query->num_rows() > 0){
		   
    		$array = array('SecurityQuestion'=> $security_qst,'SecurityAns'=>$security_ans);
    			    
    		$con['conditions'] = array('u_id'=>$this->session->userdata('user')); 
    
    		$query = $this->common->update("users",$array,$con);
    	
    		if($query){
    		 $data['security_questions'] = $this->db->query("select * from security_questions")->result_array();
        	 $this->session->set_flashdata("success","Successfull Updated");
        	 $this->load->view("Setting",$data);
    		}else{
        	 
        	 $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
        	 $this->load->view("Setting");
    		    
    		} 
		    
		    
	    }

				
	    else
	    {
		$this->session->set_flashdata('fail','Password in Incorrect');
			$this->load->view("Setting");
	    }		   
		    
		    
		    
	 }
				
		
		public function checkSecurity(){
	    
	   $s_q = $this->input->post('security_q');
	   $s_a = $this->input->post('security_a'); 
	   $user = $this->input->post('userid');
	    
	   $record = $this->db->query("SELECT * FROM users where u_id= $user AND SecurityQuestion=$s_q AND SecurityAns = '$s_a' ")->result_array();
	   //print_r($record);
	   if(count($record) > 0){
	       $response['error'] =  false;
	       $withdrawal = $this->db->query("SELECT * FROM withdrawal WHERE u_id = $user")->result_array();
	       $response['accounts'] = $withdrawal;
	       $response['msg'] = "Found successfully!";
	   }else{
	       $response['error'] =  true;
	       $response['msg'] = "Not found! sorry";
	   }
	    echo json_encode($response);
	    die;
	    
	}			
	
	public function visibility(){
	   $userid = $this->input->post('userid');
	   $setting_name = $this->input->post('setting_name');
	   $query_update = $this->db->query("Update users set show_name='$setting_name' where u_id = $userid");
	       if($query_update){
        	 $this->session->set_flashdata("success","Successfull Updated");
        		$this->load->view("Setting");
    		}else{
        	 $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
        	 	$this->load->view("Setting");
	       }
	   
	}
	
	
	

	
}
