<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeLine extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
	}

	public function index($username)
	{   
	    
		$data['userdata'] = $this->db->query("select * from users where username='$username'")->result_array()[0];
		
		if(!empty($data['userdata'])){
		    $this->load->view("TimeLine", $data);
		}else{
		    redirect(SURL);
		}
		
		
	}

	

	
}
