<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Clients extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Clients/";
		 $data['Controller_name'] = "All Clients";
		 $data['Newcaption'] = "All Clients";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status" => "Buyer");
         $data['freelancers'] = $this->common->get_rows("users", $con);
         //echo "<pre>";var_dump( $data['freelancers']);

		 $this->load->view("Clients.php",$data);
	}


	public function active($id){
		
		$data['user'] = $this->check->Login(); 
		$status ="0";


		$con['conditions'] = array("u_id"=>$id);
	    $query= $this->Common->update("users",array("can_login"=>$status),$con);
			
        if($query){
		    $this->session->set_flashdata('success','Updated Successfully');
			 redirect("/Clients");
		}else{
		    $this->session->set_flashdata('fail','Some error occured,plz try again later');
			 redirect("/Clients");
		}


	}
	
	public function inactive($id){
		
		$data['user'] = $this->check->Login(); 
		$status ="1";


		$con['conditions'] = array("u_id"=>$id);
	    $query= $this->Common->update("users",array("can_login"=>$status),$con);
			
        if($query){
		    $this->session->set_flashdata('success','Updated Successfully');
			 redirect("/Clients");
		}else{
		    $this->session->set_flashdata('fail','Some error occured,plz try again later');
			 redirect("/Clients");
		}


	}

	

}
?>