<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Payfreelancer extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Payfreelancer/";
		 $data['Controller_name'] = "Payfreelancer";
	
// =============================================fix data ends here====================================================
       

		 $con['conditions'] = array(); 
         $data['categories1'] = $this->common->get_rows("general",$con);
         //var_dump($data['categories']);
		 $this->load->view("Payfreelancer",$data);
	}


}
?>