<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		
	}

	public function index()
	{   
	    
        $delivery_time = $this->input->post("delivery_time");
        $price = $this->input->post("price");
        $cat_id = $this->input->post("cat_id");
        
        if($this->input->post("delivery_time")=="0"){
            
        }else{
            $query.= " and delivery='$delivery_time'";
        }
        
        if($price==0){
            
        }else{
            $budget = explode("-",$price);
            $start = $budget[0];
            $end = $budget[1];
            $query = " and amount between $start and $end";
        }
        
	   $data['categories'] = $this->db->query("select * from categories where parent_id='0'")->result_array();
	    
	    
		if(!empty($this->uri->segment("3"))){
		    
		    $userid = $this->session->userdata("user");
		    $data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id where services.u_id='$userid' and users.status='Active'")->result_array();
		}else{
		    $data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id where users.status='Active'")->result_array();
		}
		
	     
	    if($cat_id=="all")
	   
	   { 
	       
	      $data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id where users.status='Active' $query")->result_array();
	     
	   }
	
	
	   if(!empty($cat_id) && $cat_id!="all")
	   
	   { 
	       $data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id and services.cat_id='$cat_id' where users.status='Active' $query")->result_array();
	 
        
	   }
	   
	   //if(($price>0) && (!empty($cat_id)))
	   //{
	   //     $data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id and services.cat_id='$cat_id' and services.amount='$price' where users.status='Active'")->result_array();
	
	   //}
	   
		//echo "<pre>";var_dump($data['services']);
		
		$this->load->view("Offers", $data);

		
	}
	
	public function filter()
	{   
	   $cat_id=$this->input->post('cat_id');
	   
	   $price=$this->input->post('price');
	  
	   if(!empty($cat_id))
	   
	   { 
	       $data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id and services.cat_id='$cat_id'")->result_array();
	 
        	$this->load->view("Offers", $data);
	   }
	   
	   if((!empty($price)) && (!empty($cat_id)))
	   {
	        $data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id and services.cat_id='$cat_id' and services.amount='$price'")->result_array();
	   
	       	$this->load->view("Offers", $data);
	   }
	   
	   
		
		
	}
	
	public function service_wishlist(){
	    $service_id = $this->input->post("service_id");
	    $u_id = $this->session->userdata("user");
	    
	    
	    $query = $this->db->query("select * from services_wishlist where u_id='$u_id' and service_id='$service_id'");          
	    if($query->num_rows() > 0){
	        $this->db->query("delete from services_wishlist where u_id='$u_id' and service_id='$service_id'");
	        $count = $this->db->query("select count(*) as count from services_wishlist where u_id='$u_id' and service_id='$service_id'")->result_array()[0]['count'];
		    $response['count']=$count;
		    $response['color']="#908b8b";
		    
	    }else{
	        $array = array(
	                    "service_id"=>$service_id,
	                    "u_id"=>$u_id,
	                  );
	                  
	        $this->common->insert("services_wishlist",$array);    
	        
	        $count = $this->db->query("select count(*) as count from services_wishlist where u_id='$u_id' and service_id='$service_id'")->result_array()[0]['count'];
		    $response['count']=$count;
		    $response['color']="red";
		    
	    }
	    
	    echo json_encode($response);
	                   
    }


	
}
