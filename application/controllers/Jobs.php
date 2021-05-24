<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
		$this->load->library('Check');
			$this->load->library("pagination");
	}

	public function index()
	{ 
        
        $joblocation = $this->input->post("location");
        $job_type = $this->input->post("job_type");
        $price = $this->input->post("price");
        $category = $this->input->post("category");
        
            
        if($this->input->post("location")=="0"){
            
        }else{
            $query.= " and job_location='$joblocation'";
        }
        
        if($this->input->post("job_type")=="0"){
            
        }else{
            $query .= " and job_type='$job_type'";
        }
        
        if($price==0){
            
        }else{
            $budget = explode("-",$price);
            $start = $budget[0];
            $end = $budget[1];
            $query = " and budget between $start and $end";
        }
	        
	        
	    $config = array();
        $config["base_url"] = base_url() . "Jobs";
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        
	    if(empty($category))
	    {   
	        
	       $data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' order by job_id desc")->result_array();
	        
	    }else
	    {
	        
	        if($category=="all"){
	            
	            $data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' $query order by job_id desc")->result_array();
	        }else{
	            $data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' and cat_id='$category' $query order by job_id desc")->result_array();
	        }
	            
	     }
	    
	    $config["total_rows"] = count($data['jobs']);   //for pagination
	     
	    $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["links"] = $this->pagination->create_links();
	
	    if(empty($category))
	    {
    		$data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' order by job_id desc")->result_array();
	    }else
	    {   
	        if($category=="all"){
	            
	            $data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' $query order by job_id desc LIMIT $page,".$config["per_page"]."")->result_array();
	        }else{
	        
    	        $data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' and cat_id='$category' $query order by job_id desc LIMIT $page,".$config["per_page"]."")->result_array();
	        }
	        
	    }
	  
	    $this->load->view("jobs",$data);
	}
	
	public function favourite(){
		$job_id=$this->input->post("jobid");
		$u_id = $this->session->userdata("user");
		
		$is_wishlist = $this->db->query("select * from jobs_wishlist where job_id='$job_id' and u_id='$u_id'");
		if($is_wishlist->num_rows() > 0){
		    $this->db->query("delete from jobs_wishlist where job_id='$job_id' and u_id='$u_id'");
		    $count = $this->db->query("select count(*) as count from jobs_wishlist where job_id='$job_id'")->result_array()[0]['count'];
		    $response['count']=$count;
		    $response['color']="#00C4CF";
		}else{
		    $array = array(
		                    "job_id"=>$job_id,
		                    "u_id"=>$u_id,
		                  );
		                  
		    $this->common->insert("jobs_wishlist",$array);   
		    
		    $count = $this->db->query("select count(*) as count from jobs_wishlist where job_id='$job_id'")->result_array()[0]['count'];
		    $response['count']=$count;
		    $response['color']="#ff0000";
		    
		}
		
		echo json_encode($response);
        
    }
	
	
	public function delete($jobid){
	    $job = $this->db->query("select * from jobs where job_id='$jobid'")->result_array()[0];
	    
	    if($job['u_id']==$this->session->userdata("user")){
	        
	        $this->db->trans_start();
	        
	        $this->db->query("delete from jobs where job_id='$jobid'");
	        $this->db->query("delete from jobs_msgs where job_id='$jobid'");
	        $this->db->query("delete from jobs_type where job_id='$jobid'");
	        $this->db->query("delete from job_images where job_id='$jobid'");
	        $this->db->query("delete from job_invites where job_id='$jobid'");
	        
	        $this->db->trans_complete();
				
			if($this->db->trans_status() === FALSE){
				 $this->session->set_flashdata("fail","Something went wrong.");
			}else{
			    $this->session->set_flashdata("success","Job deleted successfully.");
			}
				
	    }
	    redirect(SURL.'Jobs');
	}

	

	
}
