<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->checksession();
		$this->load->helper('url');
		$this->load->model('Common');
		$this->load->library('cart');
		$this->load->library('paypal_lib');
		$this->load->library('form_validation');
		$this->load->library('stripe_lib');
		$this->load->library('Uploadimage');
		error_reporting(0);
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}
	
	
	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Please Login.');
			redirect(SURL.'Newlogin');

		}

	}

	public function index()
	{ 
	    $data['question']=$this->db->query('select * from query_questions')->result_array();
		$this->load->view("Query", $data);
	}
	
	public function addQuery(){
	    
	    $u_id=$this->session->userdata('user');
	    $this->form_validation->set_rules('email', 'The Email is Required', 'required');
	    $this->form_validation->set_rules('subject', 'Subject is Required', 'required');
	    $this->form_validation->set_rules('description', 'Description is Required', 'required');
	     
	     $user_type=$this->input->post("user_type");
	     $question=$this->input->post("buyer_contact");
           
	    
	    if($this->form_validation->run() == FALSE){ 
            
            $this->load->view("Query", $data);
        }else{
            
          
                  if($user_type and $question > 0 ) {
            	        
            	    
            $arry = array(
            	        
            "email"=>$this->input->post("email"),
            "user_type"=>$this->input->post("user_type"),
            "subject"=>$this->input->post("subject"),
            "description"=>$this->input->post("description"),
            "query_question_id"=>$this->input->post("buyer_contact"),
            "u_id"=>$u_id
            	            
            );
            	        
            $query = $this->Common->insert("query",$arry);
            
             if($_FILES['attachment']['size'][0] > 0){ 
            
			$directory = 'uploads/';
			$alowedtype = "*";
			$results = $this->uploadimage->uploadfile($directory,$alowedtype,"attachment");
			if($results){
			    if(!empty($results[0]['file_name'])){
			        foreach($results as $key=>$value){
			          	$attachment = $directory.$value['file_name'];
            			 $array_attachment = array(
                        "query_id"=>$query,
                        "attachments"=>$attachment,
                        );
                        $test = $this->Common->insert("query_attachments",$array_attachment);
			        }
			    }
			    
			}			
			
		}
            
            }else{
            $this->session->set_flashdata('fail','Please Select Correct Option.');
            redirect(SURL.'Query');
            }
            
            if($query)
            {
                $rand = $this->generateRandomString();
                $arraynew = array(
                            "ticket_id"=>"#".$rand."-".$query,
                         );
             $con['conditions']=array("id"=> $query);
             $this->Common->update("query",$arraynew,$con);
             $this->session->set_flashdata('success','Query Added Successfully.');
            redirect(SURL.'Query');
                
            }else
            {
            $this->session->set_flashdata('fail','Something went wrong.');
            redirect(SURL.'Query');
                
            }
               
               
            	    
            	    
            
        }
	}
    
    function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return rand(10,100000000);
    //return $randomString;
}

	
}
