<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freelancers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
	}

	public function index()
	{ 
		$query="select * from users where status='Active'";
		$data['result']=$this->db->query($query)->result_array();
		$this->load->view("Freelancers", $data);
		
	}

	

	
}
