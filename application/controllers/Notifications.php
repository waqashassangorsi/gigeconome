<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}

	public function index()
	{ 
		  $data["mynotifications"] = $this->db->query("select * from notifications where noti_recvr_id='".$myuser['u_id']."' order by noti_date desc")->result_array();
		$this->load->view("Notifications", $data);

		
	}
	
		public function deleteNotipication(){
	    
	    $id = $this->input->post('notipicationid');
	    
	    $this->db->delete('notifications',array('noti_id' => $id));
	}


	
}
