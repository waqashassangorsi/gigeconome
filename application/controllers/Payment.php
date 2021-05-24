<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		$this->checksession();
		$this->load->library('Uploadimage');
	    $this->load->library('Check');
		$this->load->model('Common');
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
		$userid = $this->session->userdata("user");
		$data['myblnc'] = $this->Common->myblnc($userid);
		$data['userdata']=$this->db->query("select * from users where u_id='$userid'")->row();
		
			$data['document_detail'] = $this->db->query("select * from doc_recived where u_id='$userid'")->result_array()[0]['status'];
		$data['document_detail2'] = $this->db->query("select * from doc_recived where u_id='$userid'")->row();
		
		$myjobs_buyer = $this->db->query("select * from jobs where u_id='$userid'")->result_array();
		
		foreach($myjobs_buyer as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where job_id='".$value['job_id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		
		$myjobs_buyer = $this->db->query("select * from services_purchased where who_purchased='$userid'")->result_array();
		foreach($myjobs_buyer as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where service_p_id='".$value['id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		$data['buyerescrow'] = $totalamt;
		
		
 		$myjobs = $this->db->query("select * from jobs where job_awarded_to='$userid'")->result_array();
	    $totalamt = 0;
		foreach($myjobs as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where job_id='".$value['job_id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		
		$myjobs = $this->db->query("select * from services_purchased where service_owner_id='$userid'")->result_array();
		foreach($myjobs as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where service_p_id='".$value['id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		$data['freelancerescrow'] = $totalamt;
		
		
		$this->load->view("Payment", $data);

		
	}
	
	public function update_payoneeremail(){
	    
	    $userid = $this->session->userdata("user");
	    $email = $this->input->post("email");
	    
	    $con['conditions'] = array("u_id"=>$userid);
	    $array = array(
	                    "payoneer_email"=>$email,
	                   );
	                   
	    $query = $this->Common->update("users",$array,$con);
	    if($query){
	        
	        $response['status'] = true; 
	        $response['response'] = "Payoneer account updated"; 
	    }else{
	        $response['status'] = false; 
	        $response['response'] = "Some error occured.Please try again later.";
	    }
	    
	    echo json_encode($response);
	}
	
	public function update_stripeemail(){
	    
	    $userid = $this->session->userdata("user");
	    $email = $this->input->post("email");
	    
	    $con['conditions'] = array("u_id"=>$userid);
	    $array = array(
	                    "stripe_email"=>$email,
	                   );
	                   
	    $query = $this->Common->update("users",$array,$con);
	    if($query){
	        
	        $response['status'] = true; 
	        $response['response'] = "Stripe account updated"; 
	    }else{
	        $response['status'] = false; 
	        $response['response'] = "Some error occured.Please try again later.";
	    }
	    
	    echo json_encode($response);
	}
	
	public function update_paypalemail(){
	    
	    $userid = $this->session->userdata("user");
	    $email = $this->input->post("email");
	    
	    $con['conditions'] = array("u_id"=>$userid);
	    $array = array(
	                    "paypal_email"=>$email,
	                   );
	                   
	    $query = $this->Common->update("users",$array,$con);
	    if($query){
	        
	        $response['status'] = true; 
	        $response['response'] = "Paypal account updated"; 
	    }else{
	        $response['status'] = false; 
	        $response['response'] = "Some error occured.Please try again later.";
	    }
	    
	    echo json_encode($response);
	}
	
	public  function insertdoc2()
	{
	      $u_id=$this->session->userdata('user');
	      

	       if($_FILES['newdocument1']['size'] > 0 && $_FILES['newdocument']['size'] > 0){ 
				
			
				
			$directory = 'uploads/';
			$alowedtype = "jpeg|jpg|png";
			$results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"newdocument1");
			$resultsnew = $this->uploadimage->singleuploadfile($directory,$alowedtype,"newdocument");
			
			if(!empty($results[0]['file_name']) && !empty(	$resultsnew[0]['file_name'])){
			    $idportfolio = $directory.$results[0]['file_name'];
			     $billportfolio = $directory.$resultsnew[0]['file_name'];
			   
			   
			    	$array = array(
 								"id_document"=>$idportfolio,
								"u_id"=>$this->session->userdata("user"),
								"status"=>"Pending",
								"bill_document"=>$billportfolio
							  );
                     
                    
		    $insert=$this->Common->insert("doc_recived",$array);
		       	 
    		if($insert){
    		        
    		     $array = array(
 					  "withdrawl_Acct_Status"=>"Pending"
						   );
						   
    			$this->db->where('u_id',$u_id);
    			$this->db->update('users',$array);
        		        
        		$this->session->set_flashdata("success","Document Uploaded Successfully.");
        		redirect(SURL.'Payment');
    		}else
    		{
    			 $this->session->set_flashdata("fail","Something went wrong.");
    			 redirect(SURL.'Payment');
    		}
			 
			}else{
	            $this->session->set_flashdata("fail","Something went wrong.");
			     redirect(SURL.'Payment');   
        	 }
	            
	        }else{
	            $this->session->set_flashdata("fail","Please upload both files.");
			     redirect(SURL.'Payment');   
        	 }

	    
	  
	}	


	
}
