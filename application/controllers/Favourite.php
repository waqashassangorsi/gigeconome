<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}

	public function index()
	{ 
		
		$data['favusers'] = $this->db->query("select users.* from users_wishlist inner join users on users_wishlist.whom_wished=users.u_id where users_wishlist.u_id='".$this->session->userdata('user')."'")->result_array();
		$data['favjobs'] = $this->db->query("select jobs.* from jobs_wishlist inner join jobs on jobs.job_id=jobs_wishlist.job_id where jobs_wishlist.u_id='".$this->session->userdata('user')."'")->result_array();
		$data['favservices'] = $this->db->query("select services.*,dp,f_name,l_name,location from services_wishlist inner join services on services_wishlist.service_id=services.service_id inner join users on users.u_id=services.u_id where services_wishlist.u_id='".$this->session->userdata('user')."'")->result_array();
		
		$this->load->view("Favourite", $data);

		
	}



	
}
