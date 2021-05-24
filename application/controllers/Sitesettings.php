<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Sitesettings extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Sitesettings/";
		 $data['Controller_name'] = "Edit Site Settings";
	
// =============================================fix data ends here====================================================
        if(!empty($this->input->post("name"))){
            //echo "<pre></pre>";var_dump($this->input->post());exit;
            $array = array(
                    "name"=>$this->input->post("name"),
                    "tagline"=>$this->input->post("tagline"),
                    "url"=>$this->input->post("url"),
                    "sitemetadesc"=>$this->input->post("sitemetadesc"),
                    "sitemetakeyword"=>$this->input->post("sitemetakeyword"),
                    "metautor"=>$this->input->post("metautor"),
            );

            $con['conditions']=array("id"=>1);
            $query = $this->common->update("site_settings",$array,$con);
            if($query){
                $this->session->set_flashdata('success','Record Updated');
			    redirect("/Sitesettings");
            }else{
                $this->session->set_flashdata('fail','Something went wrong.');
			    redirect("/Sitesettings");
            }
        }
		 $con['conditions'] = array("id"=>1); 
		 $data['record'] = $this->common->get_rows("site_settings",$con)[0];
         $this->load->view("Add_settings",$data);
	}

	
}
?>