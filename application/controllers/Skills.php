<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Skills extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "skills/";
		 $data['Controller_name'] = "All skills";
	
// =============================================fix data ends here====================================================

		 $con['conditions'] = array(); 
		 $data['skills'] = $this->common->get_rows("skills",$con);
		 $this->load->view("Skills",$data);
	}

	

	public function Add(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Skills/";
		 $data['Controller_name'] = "All Skills";
		 $data['method_url'] = "Skills/Addcategory";
		 $data['method_name'] = "Add Skills";
	
// =============================================fix data ends here====================================================

        if(!empty($this->input->post("name"))){

            $array = array("name"=>$this->input->post("name"));
            

            if(!empty($this->input->post("edit"))){
                $con['conditions']=array("id"=>$this->input->post("edit"));
                $query = $this->common->update("skills",$array,$con);
            }else{
                $query = $this->common->insert("skills",$array);
            }
           
            if($query){
				
				$this->session->set_flashdata('success','Information added Successfully');
			}else{
				$this->session->set_flashdata('fail','Try Again Later');
            }
            redirect("/Skills");
        }

		$this->load->view("Add_Skills",$data);
		
	}



	public function edit($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Skills/";
		 $data['Controller_name'] = "All Skills";
		 $data['method_url'] = "Skills/Addcategory";
		 $data['method_name'] = "Add Skills";
	
// =============================================fix data ends here====================================================
		
		$con['conditions']=array("id" => $id);
		$data['record'] = $this->common->get_rows("skills",$con)[0];
        //var_dump($data['record']);
		$this->load->view("Add_Skills",$data);
		
    }
    
    public function delete($id){
		
		$data['user'] = $this->check->Login(); 

		$this->db->trans_start(); //transation starts here

		$this->common->delete("skills",array("id"=>$id));

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
            $this->session->set_flashdata('fail','Some Error Occued, plz try again later');
		}else{
            $this->session->set_flashdata('success','Deleted Successfully');
		}
		
		redirect("/Skills");
		
	}

	

	

	

}
?>