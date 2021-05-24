<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsignup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		
	}

	public function index()
	{ 
		
		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

            redirect(SURL);

        }
        
		$this->load->view("Newsignup", $data);

		
	}


	
}
