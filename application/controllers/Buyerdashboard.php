<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyerdashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		$this->checksession();
	}
	
	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}
	

	public function index()
	{   
	    $userid = $this->session->userdata("user");
		
		$data['recomnd_freelancer'] = $this->db->query("select users.* from recommend_freelancers inner join users on users.u_id=recommend_freelancers.u_id")->result_array();
	
		$data['recomnd_services'] = $this->db->query("select services.*,users.* from recommend_offers inner join services on services.service_id=recommend_offers.service_id inner join users on users.u_id=services.u_id")->result_array();
		
		$data['invoices_due_msgs'] = $this->db->query("SELECT count(*) as total_invoice FROM `jobs_msgs` where custom_status='Invoice' AND custom_status_extent = '0' AND recv_id = ".$this->session->userdata('user'))->result_array()[0]['total_invoice'];
		$data['invoices_due_services'] = $this->db->query("SELECT count(*) as total_invoice FROM `services_msgs` where custom_status='Invoice' AND custom_status_extent = '0' AND recv_id = ".$this->session->userdata('user'))->result_array()[0]['total_invoice'];
		
		$data['invoices_due'] = $data['invoices_due_msgs'] + $data['invoices_due_services'];
		
		$data['total_stream_progress_jobs'] = $this->db->query("Select count(*) as total_stream_progress from jobs where job_status ='Ongoing' AND job_awarded_to !='0' and u_id='".$this->session->userdata('user')."'")->result_array()[0]['total_stream_progress'];
		$data['total_stream_progress_services'] = $this->db->query("Select count(*) as total_stream_progress from services_purchased where status ='Ongoing' and who_purchased='".$this->session->userdata('user')."'")->result_array()[0]['total_stream_progress'];
		
		$data['total_stream_progress'] = $data['total_stream_progress_jobs'] + $data['total_stream_progress_services'];
		
		$data['open_projects_jobs'] = $this->db->query("Select count(*) as open_projects from jobs where job_status ='Ongoing' AND job_awarded_to ='0' and u_id='".$this->session->userdata('user')."'")->result_array()[0]['open_projects'];
		$data['open_projects_services'] = $this->db->query("Select count(*) as open_projects from services_purchased where status ='Ongoing' AND who_purchased='".$this->session->userdata('user')."'")->result_array()[0]['open_projects'];
		
		$data['open_projects'] = $data['open_projects_jobs'] + $data['open_projects_services'];
		
		//echo "<pre>";var_dump($data['recomnd_services']);
		$this->load->view("Buyerdashboard", $data);

	}


	
}
