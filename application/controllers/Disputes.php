<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Disputes extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Disputes/";
		 $data['Controller_name'] = "All Disputes";
		 $data['Newcaption'] = "All Disputes";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
         $data['disputes'] = $this->common->get_rows("disputes", $con);
        

		 $this->load->view("Disputes.php",$data);
	}

	public function view($id){ 
		
		// =============================================fix data starts here====================================================
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Disputes/";
		$data['Controller_name'] = "Dispute Description";
		$data['Newcaption'] = "All Disputes";
		// =============================================fix data ends here====================================================
		
		$data['record'] = $this->db->query("select disputes.*,jobs.title from disputes inner join msgs on msgs.msg_id=disputes.msg_id inner join jobs on msgs.job_id=jobs.job_id where disputes.id='$id'")->result_array()[0];
		//echo "<pre></pre>";var_dump($data['disputes']);

		$this->load->view("Dispute_detail.php",$data);
	}

	

}
?>