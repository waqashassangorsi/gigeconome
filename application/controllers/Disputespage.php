<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disputespage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Common');
		$this->load->library('form_validation');
		$this->load->library('Uploadimage');
		$this->checksession();
		$this->load->library('Check');
		error_reporting(0);
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
	    
    if($this->uri->segment("3")=="")
    {
    $this->session->set_flashdata('fail','You Cannot Access Directly.');
    redirect(SURL.'Main');
    }else{
        
            $data['remaing_time'] =  $this->uri->segment("4");
        
    	    $data['question']=$this->db->query('select * from query_questions')->result_array();
    		$this->load->view("Disputespage", $data);
    	}
}	
	public function insertdispute()
	{   
	    
	   // echo "<pre>";var_dump($this->input->post());
	   // exit;
	    
	     $u_id=$this->session->userdata('user');
	     $this->form_validation->set_rules('email', 'The Email is Required', 'required');
	     $this->form_validation->set_rules('subject', 'Subject is Required', 'required');
	     $this->form_validation->set_rules('description', 'Description is Required', 'required');
	     
	     $email=$this->input->post("email");
	     $user_type=$this->input->post("user_type");
	     $reason=$this->input->post("reason_contact");
	     $subject=$this->input->post("subject");
	     $description=$this->input->post("description");
	     $job_id=$this->input->post("job_id");
	     $msg_id=$this->input->post("msg_id");
	     
	     $remaing = $this->input->post("remaining_time");

       
	    
	    if($this->form_validation->run() == FALSE){ 
            
            $this->load->view("Disputespage", $data);
        }else{
                if(!empty($user_type) && !empty($reason)) {
                	        
                	    
                    $arry = array(
                        "email"=>$email,
                        "user_type"=>$user_type,
                        "subject"=>$subject,
                        "description"=>$description,
                        "reason"=>$reason,
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "is_resolved"=>"no",
                        "u_id"=>$this->session->userdata('user'),
                        "job_id"=>$job_id,
                        "type"=>"job",
                        "msg_id"=>$msg_id
                    );
                
                    $query = $this->Common->insert("disputes",$arry);
                
                    $query3=$this->db->query("update general SET price=price+1 WHERE id= 13;");
                
                    if($_FILES['attachment']['size'][0] > 0){ 
    				
        				$directory = 'uploads/';
        				$alowedtype = "jpg|png|jpeg";
        				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"attachment");
        				
        				if(!empty($results[0]['file_name'])){
        				    
        				    foreach($results as $key=>$value){
        				        $attachment = $directory.$value['file_name'];
        				    	$array_attachment = array(
                                    "dsipute_id"=>$query,
                                    "file"=>$attachment,
                                );
                                        
                                $test = $this->Common->insert("disputes_files",$array_attachment);
        				    }
        				}
    						
    			    }
                    
                }else{
               
                    $this->session->set_flashdata('fail','Please Select Correct Option.');
                    redirect(SURL.'Disputespage');
               }
                    
            if($query){
                $this->session->set_flashdata('success','Please pay to araise your dispute.');
                redirect(SURL.'PaymentSummary/dispute/'.$query);
            }else{
                $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
                redirect(SURL);
            }
            
        }
	   
	}
	
	
	public function services()
	{
	    
    if($this->uri->segment("3")=="")
    {
    $this->session->set_flashdata('fail','You Cannot Access Directly.');
    redirect(SURL.'Main');
    }else{
            $data['remaing_time'] =  $this->uri->segment("5");
    	    $data['question']=$this->db->query('select * from query_questions')->result_array();
    		$this->load->view("Disputespageservices", $data);
    	}
   }
   
   public function insertdisputeservices()
	{   
	   //  echo "<pre>";var_dump($this->input->post());
	   //  exit;
	     
	     $u_id=$this->session->userdata('user');
	     $this->form_validation->set_rules('email', 'The Email is Required', 'required');
	     $this->form_validation->set_rules('subject', 'Subject is Required', 'required');
	     $this->form_validation->set_rules('description', 'Description is Required', 'required');
	     
	     $email=$this->input->post("email");
	     $user_type=$this->input->post("user_type");
	     $reason=$this->input->post("reason_contact");
	     $subject=$this->input->post("subject");
	     $description=$this->input->post("description");
	     $service_id=$this->input->post("service_id");
         $remaing = $this->input->post("remaining_time");
         $msg_id = $this->input->post("msg_id");

	    
	    if($this->form_validation->run() == FALSE){ 
            
            $this->load->view("Disputespage", $data);
        }else{
                if(!empty($user_type) && !empty($reason)) {
                	        
                	    
                    $arry = array(
                        "email"=>$email,
                        "user_type"=>$user_type,
                        "subject"=>$subject,
                        "description"=>$description,
                        "reason"=>$reason,
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "is_resolved"=>"no",
                        "remaining_time"=>$remaing,
                        "u_id"=>$this->session->userdata('user'),
                        "service_p_id"=>$service_id,
                        "type"=>"service",
                        "msg_id"=>$msg_id
                    );
                
                    $query = $this->Common->insert("disputes",$arry);
                
                    $query3=$this->db->query("update general SET price=price+1 WHERE id= 13;");
                
                    if($_FILES['attachment']['size'][0] > 0){ 
    				
        				$directory = 'uploads/';
        				$alowedtype = "jpg|png|jpeg";
        				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"attachment");
        				
        				if(!empty($results[0]['file_name'])){
        				    
        				    foreach($results as $key=>$value){
        				        $attachment = $directory.$value['file_name'];
        				    	$array_attachment = array(
                                    "dsipute_id"=>$query,
                                    "file"=>$attachment,
                                );
                                        
                                $test = $this->Common->insert("disputes_files",$array_attachment);
        				    }
        				}
    						
    			    }
                    
                }else{
               
                    $this->session->set_flashdata('fail','Please Select Correct Option.');
                    redirect(SURL.'Disputespage');
               }
                    
            if($query){
                $this->session->set_flashdata('success','Please pay to araise your dispute.');
                redirect(SURL.'PaymentSummary/disputeService/'.$query);
            }else{
                $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
                redirect(SURL.'Disputespage');
            }
            
        }
	   
	}
	

}
