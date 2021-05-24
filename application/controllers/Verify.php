<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}

	public function index()
	{ 
		
		$this->load->view("Verify", $data);

		
	}
    
    public function email($token)
	{ 
		$query = $this->db->query("select * from users where verify='$token'")->result_array();
        if($query){
            $u_id = $query[0]['u_id'];
            $query = $this->db->query("update users set status='Active' where u_id='$u_id'");
            if($query){
                echo "<h3 style='text-align:center;'>Congrats ! Your account is verified now.</h3>";
            }
        }
		
	}

	
}
