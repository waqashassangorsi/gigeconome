<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Disputeinactive extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		 	$this->load->helper('download');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Disputeinactive/";
		 $data['Controller_name'] = "Dispute Resolved";
		 $data['Newcaption'] = "Dispute Resolved";
// =============================================fix data ends here====================================================


		 $data['disputes'] =$this->db->query("select * from disputes where 	is_resolved='yes'")->result_array();
		 
		 $this->load->view("Disputeinactive",$data);
	}

public function downloadfile(){

        $this->load->helper('download');
        $this->load->library('zip');
        $link = $this->input->post("file2");
        foreach($link as $atta)
        {
           $this->zip->read_file($atta);
        }
        $this->zip->download(''.time().'.zip');
    }

}
?>