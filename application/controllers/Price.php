<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Price extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Price/";
		 $data['Controller_name'] = "All Price";
	
// =============================================fix data ends here====================================================
       
        if(!empty($this->input->post("edit"))){

            $array = array(
                        "name"=>$this->input->post("name"),
                        "price"=>$this->input->post("price"),
                    );
                    
            $con['conditions']=array("id"=>$this->input->post("edit"));
            $query = $this->common->update("general",$array,$con);
            if($query){
                
                $this->session->set_flashdata('success','Information added Successfully');
            }else{
                $this->session->set_flashdata('fail','Try Again Later');
            }

            redirect("/Price");
        }

		 $con['conditions'] = array(); 
         $data['categories'] = $this->common->get_rows("general",$con);
         //var_dump($data['categories']);
		 $this->load->view("Price/Category",$data);
	}

	

	public function edit($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Price/";
		 $data['Controller_name'] = "All Price";
		 $data['method_url'] = "Price/";
		 $data['method_name'] = "Edit Price";
	
// =============================================fix data ends here====================================================

        

	    $con['conditions'] = array("id"=>$id); 
        $data['record']= $this->common->get_rows("general",$con)[0];
       
		$this->load->view("Price/Add_Category",$data);
		
	}


}
?>