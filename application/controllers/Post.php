<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->checksession();
		$this->load->library('Uploadimage');
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
	    
	    $data['categories'] = $this->db->query("select * from categories where parent_id='0'")->result_array();
	    
	    $userid = $this->session->userdata("user");
	     
	    $this->form_validation->set_rules('ican', 'Title', 'required');
        // $this->form_validation->set_rules('amount', 'Amount', 'required');

        
        if($this->form_validation->run() == FALSE){ 
            $this->load->view("Post", $data);
        }else{
            
            $this->db->trans_start();
            
            $array = array(
                            "title"=>$this->input->post("ican"),
                            "amount"=>$this->input->post("amount"),
                            "delivery"=>$this->input->post("devliver_day"),
                            "cat_id"=>$this->input->post("cat"),
                            "tags"=>$this->input->post("planets"),
                            "description"=>$this->input->post("details"),
                            "u_id"=>$userid,
                        );
            
            if(!empty($this->input->post("edit"))){
                $insert = $this->input->post("edit");
                
                $con['conditions'] = array("service_id"=>$insert);
                $this->Common->update("services",$array,$con);
            }else{
                $insert = $this->Common->insert("services",$array);
                $slug = url_title($this->input->post("ican"), 'dash', true); 
                $slug = $slug.$insert;   
                $this->db->query("update services set service_slug='$slug' where service_id='$insert'");
            }
            
            if($_FILES['files']['size'][0] > 0){ 
				
				$directory = 'uploads/';
				$alowedtype = "jpg|png|jpeg";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				
				if(!empty($results[0]['file_name'])){
				    
				    foreach($results as $key=>$value){
				        $filename = $directory.$value['file_name'];
				        
				        $array1 = array(
				                         "service_id"=>$insert,
				                         "image"=>$filename,
				                       );
				        
				        $this->Common->insert("service_portfolio",$array1);
				    }
				}
						
			}
			
			$this->db->query("delete from services_adons where service_id='$insert'");
			
		
			if(!empty($this->input->post("addons"))){
			    
			    $z=0;
			    foreach($this->input->post("addons") as $key=>$value){
    			    $adonsarray = array(
    			                    "service_id"=>$insert,
    			                    "title"=>$value,
    			                    "amount"=>$this->input->post("addonamount")[$z],
    			                  );
    			    
    			    $this->Common->insert("services_adons",$adonsarray);   
    			    $z++;
			    }
			    
			}
            
            $this->db->trans_complete();
				
			if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Something went wrong.Please try again later');
			    redirect(SURL."post");
			}else{
				$this->session->set_flashdata('success','Record Inserted Successfully.');
			    redirect(SURL."Buy/index/$insert");
			}
				
        } 

		
	}
	
	public function edit($service_id){
	    
	    $data['categories'] = $this->db->query("select * from categories where parent_id='0'")->result_array();
	    $userid = $this->session->userdata("user");
	    
	    $data['service'] = $this->db->query("select * from services where service_id='$service_id'")->result_array()[0];
	    if($data['service']['u_id']==$userid){
	        
	    }else{
	        $this->session->set_flashdata("fail","You are not authorized to view this page.");
	        redirect(SURL);
	    }
	       
	    $data['serviceadons'] = $this->db->query("select * from services_adons where service_id='$service_id'")->result_array();
	    $data['serviceimages'] = $this->db->query("select * from service_portfolio where service_id='$service_id'")->result_array();
	    
	    $this->load->view("Post", $data);
	}


	
}
