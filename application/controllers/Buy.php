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
	    if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){
	        
	        $query = $this->db->query("select * from services_views where service_id='$serviceid' and u_id='".$this->session->userdata('user')."'");
	        if($query->num_rows() > 0){
	            
	        }else{
                $array = array(
    	                    "date"=>date("Y-m-d H:i:s"),
    	                    "service_id"=>$serviceid,
    	                    "u_id"=>$this->session->userdata('user')
    	                  );
    	        $this->common->insert("services_views",$array);
	        }
		}
	    
	    
		$data['service'] = $this->db->query("select * from services where service_id='$serviceid'")->result_array()[0];
		if(empty($data['service'])){
		    redirect(SURL);
		}
		$data['adons'] = $this->db->query("select * from services_adons where service_id='$serviceid'")->result_array();
		
		
		$data['portfolio'] = $this->db->query("select * from service_portfolio where service_id='$serviceid'")->result_array();

		$data['owner'] = $this->db->query("select * from users where u_id='".$data['service']['u_id']."'")->result_array()[0];
		
	    $servcieuser=$data['service']['u_id'];
	    
		$data['servicerating'] = $this->db->query("select * from service_rating where service_id='$serviceid' and  reply_of='0' and who_rated!='$servcieuser'")->result_array();
        
       

		$this->load->view("Buy", $data);

		
	}


	
}
