<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Jobassign extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Jobassign/";
		 $data['Controller_name'] = "All Jobs Invites";
		 $data['Newcaption'] = "All Jobs";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
         $data['freelancers'] = $this->db->query("select * from jobs where job_status='Awarded' order by job_id desc")->result_array();
         //echo "<pre>";var_dump( $data['freelancers']);

		 $this->load->view("Jobassign.php",$data);
	}

}
?>