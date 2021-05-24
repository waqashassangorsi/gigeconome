<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Messagereports extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Messagereports/";
		 $data['Controller_name'] = "All Message Reports";
		 $data['Newcaption'] = "All Reports";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
         $data['query_detail'] = $this->common->get_rows("query", $con);
         $data['query_attachment'] = $this->common->get_rows("query_attachments", $con);

		 $this->load->view("Messagereports.php",$data);
	}

	public function view($id){ 
		
		// =============================================fix data starts here====================================================
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Disputes/";
		$data['Controller_name'] = "Dispute Description";
		$data['Newcaption'] = "All Dispu55tes";
		// =============================================fix data ends here====================================================
		
		$data['record'] = $this->db->query("select * from query where id = $id")->result_array()[0];
		$data['attachment'] = $this->db->query("select * from query_attachments where id = $id")->result_array()[0];
		echo "<pre></pre>";var_dump($data['attachment']);exit;

		$this->load->view("Dispute_detail.php",$data);
	}

	

}
?>