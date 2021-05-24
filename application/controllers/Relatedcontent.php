<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatedcontent extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
	}

	public function index()
	{ 
	      $data["blog"]=$this->db->query("select * from blog")->result_array();
			$this->load->view("blogtest",$data);
		
	}
	
		public function firstpage($id)
	{ 
	    $data["blog"]=$this->db->query("select * from blog where id='$id'")->row();
	    
		$this->load->view("blogtestdetail.php",$data);
		
	}

	
}
