<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Recommend_freelancers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Recommend_freelancers/";
		 $data['Controller_name'] = "Recommended Freelancers";
	
// =============================================fix data ends here====================================================
        //var_dump($this->input->post());exit;
        if(!empty($this->input->post("freelancers"))){
            foreach($this->input->post("freelancers") as $key=>$value){
                
                $query = $this->db->query("select * from recommend_freelancers where u_id='$value'");
                
                if($query->num_rows() > 0){
                    continue;
                }
                
                $array = array(
                            "u_id"=>$value,
                          );
                
                $query = $this->Common->insert("recommend_freelancers",$array);      
                if($query){
                    $this->session->set_flashdata("success","Record inserted");
                }else{
                    $this->session->set_flashdata("fail","Something went wrong");
                }
            }
            
            redirect(SURL."Recommend_freelancers");
            
        }

        $data['freelancers'] = $this->db->query("select * from users where user_status='User'")->result_array();
        $data['freelancers_new'] = $this->db->query("select recommend_freelancers.*,users.* from recommend_freelancers inner join users on users.u_id=recommend_freelancers.u_id where status='Active' and user_status='User'")->result_array();
        
        
		$this->load->view("Price/Recommend_freelancers",$data);
	}

	

	public function delete($id){ 


        $query = $this->db->query("delete from recommend_freelancers where recommend_id='$id'");
        if($query){
            $this->session->set_flashdata("success","Record deleted successfully.");
        }else{
            $this->session->set_flashdata("fail","Something went wrong");
        }
        
        redirect(SURL."Recommend_freelancers");
		
	}


}
?>