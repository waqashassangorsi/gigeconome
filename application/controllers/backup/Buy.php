<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}

	public function index($serviceid)
	{   
	    $array = array(
	                    "date"=>date("Y-m-d H:i:s"),
	                    "service_id"=>$serviceid,
	                  );
	    $this->common->insert("services_views",$array);
	    
		$data['service'] = $this->db->query("select * from services where service_id='$serviceid'")->result_array()[0];
		if(empty($data['service'])){
		    redirect(SURL);
		}
		$data['adons'] = $this->db->query("select * from services_adons where service_id='$serviceid'")->result_array()[0];
		$data['portfolio'] = $this->db->query("select * from service_portfolio where service_id='$serviceid' order by id asc limit 1")->result_array()[0];
		
		$data['owner'] = $this->db->query("select * from users where u_id='".$data['service']['u_id']."'")->result_array()[0];

		$this->load->view("Buy", $data);

		
	}


	
}
