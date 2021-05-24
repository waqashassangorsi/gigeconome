<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewPrivacypolicy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
	}

	public function index()
	{ 
			$this->load->view("NewPrivacypolicy");
		
	}

	
}
