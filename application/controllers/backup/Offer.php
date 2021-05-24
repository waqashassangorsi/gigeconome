<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		
	}

	public function index()
	{ 
		
		$data['categories'] = $this->db->query("select * from categories where parent_id='0'")->result_array();
		$data['services'] = $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id")->result_array();
		$this->load->view("Offers", $data);

		
	}


	
}
