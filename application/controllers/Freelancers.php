<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freelancers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
		$this->load->library("pagination");
	}

	public function index()
	{ 
	   
	   $config = array();
       $config["base_url"] = base_url() . "Freelancers";
       $config["per_page"] = 5;
       $config["uri_segment"] = 2;
       
       $category=$this->input->post("category");
       $rate=$this->input->post("rate");
       $rank=$this->input->post("rank");
        
       
       if($this->input->post("category")=="all" || $this->input->post("category")==""){
            $category = "";
        }
      
        else{
            $myquery = " and category='$category'";
            //var_dump($myquery);
        }
        
        if($rate==0 || $rate==""){
            
        }else{
            $budget = explode("-",$rate);
            $start = $budget[0];
            $end = $budget[1];
            $myquery .= " and hourly_rate between $start and $end";
        }
        
        if($rank=="0" || $rate==""){
            //echo "<pre>";var_dump($this->input->post());
       
        }else{
            $myquery .= " and star='$rank'";
        }
        
       
       
	   if(empty($category))
	   {
		    $query="select * from users where status='Active' and user_status='User' $myquery";
		    
		  //  var_dump($query);
		  //  exit();
		  
		    $data['result']=$this->db->query($query)->result_array();
		
	   }else
	   {
	      
	     $query="select * from users where status='Active' and user_status='User' $myquery";
	      
		 $data['result']=$this->db->query($query)->result_array();
		  
	   }
	   
	    $config["total_rows"] = count($data['result']);   //for pagination
	    $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["links"] = $this->pagination->create_links();
		
		
		if(empty($category))
	    {
		    $query="select * from users where status='Active' and user_status='User' $myquery LIMIT $page,".$config["per_page"]."";
		    $data['result']=$this->db->query($query)->result_array();
		
	    }else
	    { 
	     $query="select * from users where status='Active' and user_status='User' $myquery  LIMIT $page,".$config["per_page"]."";
		 $data['result']=$this->db->query($query)->result_array();
	    }

	    if(($this->input->post("completed_projects") > 0)){

	        foreach($data['result'] as $key=>$value){
	     
	            $job_count = $this->db->query("select count(*) as count from jobs where job_awarded_to='".$value['u_id']."'")->result_array()[0]['count'];
	            if($job_count < $this->input->post("completed_projects")){
	                
	                unset($data['result'][$key]);
	                
	            }
	        }
	        
	    }
	   
	   //echo "<pre>";var_dump($data['result']);
	   	 $this->load->view("Freelancers", $data);
		
	}
	
	public function showfreelancer($id)
	{ 
		$query="select * from users where status='Active' and user_status='User' and category='$id'";
		$query2="select services.*,users.* from services inner join users on users.u_id=services.u_id where cat_id='$id'";
		
		$query3="select * from jobs where cat_id='$id'";
		$data['result']=$this->db->query($query)->result_array();
		$data['result2']=$this->db->query($query2)->result_array();
		$data['result3']=$this->db->query($query3)->result_array();
		
		$data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' and cat_id='$id' order by job_id")->result_array();
		$this->load->view("Showfreelancers", $data);
		
	}
	
	public function showfreelancerontags($id)
	{ 
		$query="select * from users where status='Active' and user_status='User' and tags like '%$id%'";
		$query2="select services.*,users.* from services inner join users on users.u_id=services.u_id where cat_id='$id'";
		
		$query3="select * from jobs where cat_id='$id'";
		$data['result']=$this->db->query($query)->result_array();
		$data['result2']=$this->db->query($query2)->result_array();
		$data['result3']=$this->db->query($query3)->result_array();
		
		$data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0' and is_public='Yes' and cat_id='$id' order by job_id")->result_array();
		$this->load->view("Showfreelancers", $data);
		
	}
	
    
    public function wish(){
		$whom_wished=$this->input->post("id");
		$u_id = $this->session->userdata("user");
		
		$is_wishlist = $this->db->query("select * from users_wishlist where u_id='$u_id' and whom_wished='$whom_wished'");
		if($is_wishlist->num_rows() > 0){
		    $this->db->query("delete from users_wishlist where u_id='$u_id' and whom_wished='$whom_wished'");
		    $count = $this->db->query("select count(*) as count from users_wishlist where whom_wished='$whom_wished'")->result_array()[0]['count'];
		    $response['count']=$count;
		    $response['color']="#00C4CF";
		}else{
		    $array = array(
		                    "whom_wished"=>$whom_wished,
		                    "u_id"=>$u_id,
		                  );
		                  
		    $this->common->insert("users_wishlist",$array);   
		    
		    $count = $this->db->query("select count(*) as count from users_wishlist where whom_wished='$whom_wished'")->result_array()[0]['count'];
		    $response['count']=$count;
		    $response['color']="red";
		    
		}
		
		echo json_encode($response);
        
    }
	

	
}
