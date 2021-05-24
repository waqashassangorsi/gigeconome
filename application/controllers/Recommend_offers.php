<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Recommend_offers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Recommend_offers/";
		 $data['Controller_name'] = "Recommended Offers";
	
// =============================================fix data ends here====================================================
        //var_dump($this->input->post());exit;
        if(!empty($this->input->post("freelancers"))){
            foreach($this->input->post("freelancers") as $key=>$value){
                
                $query = $this->db->query("select * from recommend_offers where service_id='$value'");
                
                if($query->num_rows() > 0){
                    continue;
                }
                
                $array = array(
                            "service_id"=>$value,
                          );
                
                $query = $this->Common->insert("recommend_offers",$array);      
                if($query){
                    $this->session->set_flashdata("success","Record inserted");
                }else{
                    $this->session->set_flashdata("fail","Something went wrong");
                }
            }
            
            redirect(SURL."Recommend_offers");
            
        }

        $data['services'] = $this->db->query("select * from services")->result_array();
        $data['recommende_Services'] = $this->db->query("select recommend_offers.*,services.* from recommend_offers inner join services on services.service_id=recommend_offers.service_id")->result_array();
        
        
		$this->load->view("Price/Recommend_offers",$data);
	}

	

	public function delete($id){ 


        $query = $this->db->query("delete from recommend_offers where recommend_id='$id'");
        if($query){
            $this->session->set_flashdata("success","Record deleted successfully.");
        }else{
            $this->session->set_flashdata("fail","Something went wrong");
        }
        
        redirect(SURL."Recommend_offers");
		
	}


}
?>