<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeratorDashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		 $this->load->model('Common');
	}

	public function index(){

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Category/";
		 $data['Controller_name'] = "All Product Categories";

		 $con['conditions'] = array("user_status"=>"Buyer");
		 $data['total_buyer'] = $this->common->count_record("users",$con);

		 $con['conditions'] = array("user_status"=>"User");
		 $data['total_freelancer'] = $this->common->count_record("users",$con);

		 $con['conditions'] = array();
		 $data['total_jobs'] = $this->common->count_record("jobs",$con);
		 
		  $data['escrowamt'] = $this->db->query("select sum(damount-camount) as amt from transactions where u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
	
// =============================================fix data ends here====================================================
		 //echo "<pre>"; var_dump( $data['user']); exit();
		$this->load->view("indexmoderator",$data);
	}

	
}
?>