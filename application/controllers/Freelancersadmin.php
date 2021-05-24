<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Freelancersadmin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Freelancers/";
		 $data['Controller_name'] = "All Freelancers";
		 $data['Newcaption'] = "All Freelancers";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status" => "User");
         $data['freelancers'] = $this->common->get_rows("users", $con);
         //echo "<pre>";var_dump( $data['freelancers']);

		 $this->load->view("Vendors/Vendors.php",$data);
	}
	
	public function givecredits(){
		
		$data['user'] = $this->check->Login(); 
		if(!empty($this->input->post("u_id")) && ($this->input->post("credits") > 0)){
		    
		    
		}else{
		    $this->session->set_flashdata('fail','Something is missing');
			redirect("/Freelancersadmin");
		}
		

		$con['conditions'] = array("u_id"=>$id);
		$array = array(
		                "u_id"=>$this->input->post("u_id"),
		                "credits"=>$this->input->post("credits"),
		                "date"=>gmdate("Y-m-d"),
		                "is_paid"=>"Yes",
		                "used"=>"0",
		                "status"=>"Purcahsed"
		              );
	    $query= $this->Common->insert("proposal_credits",$array);
			
        if($query){
		    $this->session->set_flashdata('success','Credits given to user Successfully');
			 redirect("/Freelancersadmin");
		}else{
		    $this->session->set_flashdata('fail','Some error occured,plz try again later');
			 redirect("/Freelancersadmin");
		}


	}
	
	public function assignrating(){
		
		$data['user'] = $this->check->Login(); 
		if(!empty($this->input->post("u_id")) && !empty($this->input->post("star_name")) && !empty($this->input->post("rating"))){
		    
		    
		}else{
		    $this->session->set_flashdata('fail','Something is missing');
			redirect("/Freelancersadmin");
		}
		//echo "<pre>";var_dump($this->input->post());exit;

		
		$array = array(
		                "rating"=>$this->input->post("rating"),
		                "star"=>$this->input->post("star_name"),
		              );
		$con['conditions'] = array("u_id"=>$this->input->post("u_id"));             
	    $query= $this->Common->update("users",$array,$con);
			
        if($query){
		    $this->session->set_flashdata('success','Credits given to user Successfully');
			 redirect("/Freelancersadmin");
		}else{
		    $this->session->set_flashdata('fail','Some error occured,plz try again later');
			 redirect("/Freelancersadmin");
		}


	}


	public function active($id){
		
		$data['user'] = $this->check->Login(); 
		$status ="0";


		$con['conditions'] = array("u_id"=>$id);
	    $query= $this->Common->update("users",array("can_login"=>$status),$con);
			
        if($query){
		    $this->session->set_flashdata('success','Updated Successfully');
			 redirect("/Freelancersadmin");
		}else{
		    $this->session->set_flashdata('fail','Some error occured,plz try again later');
			 redirect("/Freelancersadmin");
		}


	}
	
	public function inactive($id){
		
		$data['user'] = $this->check->Login(); 
		$status ="1";


		$con['conditions'] = array("u_id"=>$id);
	    $query= $this->Common->update("users",array("can_login"=>$status),$con);
			
        if($query){
		    $this->session->set_flashdata('success','Updated Successfully');
			 redirect("/Freelancersadmin");
		}else{
		    $this->session->set_flashdata('fail','Some error occured,plz try again later');
			 redirect("/Freelancersadmin");
		}


	}
	

	

	

}
?>