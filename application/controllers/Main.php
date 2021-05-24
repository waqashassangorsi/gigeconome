<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		 $this->load->model('Common');
		
	}

	public function index()
	{ 
	     $con['conditions'] = array("status" => "Active");
         $data['Employees'] =  $this->db->query("select services.*,users.* from services inner join users on services.u_id=users.u_id")->result_array();
        
        $query="SELECT services.service_id,services.title,services.description,service_portfolio.image FROM services INNER JOIN service_portfolio  ON services.service_id = service_portfolio.service_id";
        $data['categories'] = $this->db->query($query)->result_array();
         
         $query1="select * from categories where parent_id=0";
		 $data['record'] =$this->db->query($query1)->result_array();
         
         
      //echo "<pre>";var_dump($data['Employees']);exit;
		$this->load->view("Main", $data);

		
	}


	
}
