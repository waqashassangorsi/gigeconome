<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	
	public function __construct(){
		//parent::__construct();
		//$this->load->library('Check');
		// $this->load->model('Common');
	}

	public function index(){

// =============================================fix data starts here====================================================
		// $data['user'] = $this->check->Login(); 
	
// =============================================fix data ends here====================================================
		//echo "<pre>";var_dump($data['user']);
		//$this->load->view("index",$data);
	}

	
}
?>