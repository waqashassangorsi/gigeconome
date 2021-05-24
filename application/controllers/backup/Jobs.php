<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
		$this->load->library('Check');
	}

	public function index()
	{ 
		$data['jobs'] = $this->db->query("select * from jobs where privilidge_status='Approved' and job_status='Ongoing' and job_awarded_to='0'")->result_array();
		$this->load->view("jobs", $data);
		
	}

	

	
}
