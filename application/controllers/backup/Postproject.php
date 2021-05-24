<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postproject extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->checksession();
		$this->load->library('form_validation');
		$this->load->library('Uploadimage');
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
	
	}
	
	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}

	public function index()
	{ 
		
	    $data['categories'] = $this->db->query("select * from categories where parent_id='0'")->result_array();
	    
	    $userid = $this->session->userdata("user");
	     
	   
	    $this->form_validation->set_rules('job_title', 'Job Title', 'required');
	    $this->form_validation->set_rules('category', 'Category', 'required');
	    $this->form_validation->set_rules('sub_category', 'Sub Category', 'required');
	    $this->form_validation->set_rules('job_detail', 'Job Detail', 'required');
	    $this->form_validation->set_rules('joblocation', 'Job Location', 'required');
	    $this->form_validation->set_rules('budget', 'Budget', 'required');
	    
        
        if($this->form_validation->run() == FALSE){  
            //echo "form validation";exit;
            $this->load->view("Postproject", $data);
        }else{
            // echo "<pre>";var_dump($this->input->post()); exit;
            
//             if($_FILES['upload_file']['size'] > 0){ 
				
// 				$directory = 'uploads/';
// 				$alowedtype = "*";
// 				$results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"upload_file");
				
// 				if(!empty($results[0]['file_name'])){
// 				    $upload_file = $directory.$results[0]['file_name'];
// 				}else{
// 				    $sql = "select * from users where u_id='$userid'";
// 			        $upload_file  =$this->db->query($sql)->result_array()[0]['upload_file'];
// 				}
						
// 			}else{
			   
			 
// 			    $sql = "select * from users where u_id='$userid'";
// 			    $upload_file  =$this->db->query($sql)->result_array()[0]['upload_file'];
// 			}
            //echo "<pre>";var_dump($this->input->post()); exit;
            $array = array(
                            "u_id"=>$userid,
                            "job_title"=>$this->input->post("job_title"),
                            "cat_id"=>$this->input->post("category"),
                            "sub_cat"=>$this->input->post("sub_category"),
                            "job_details"=>$this->input->post("job_detail"),
                            "company_details"=>$this->input->post("company_detail"),
                            "job_location"=>$this->input->post("joblocation"),
                            "budget"=>$this->input->post("budget"),
                          );
                          
            $insert = $this->common->insert("jobs",$array);
            
            $type = $this->input->post('project_type');
           
            echo "<pre>";var_dump($type); exit;
            
            if(!empty($type[0]['project_type'])){
                foreach($type as $key => $value){
                    
                }
            }
           
            if($insert){
                $this->session->set_flashdata('success','Congratulation job Created.');
                redirect(SURL.'Postproject');
            }else{
                $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
			    redirect(SURL.'Postproject');
            }
            
           
        }
		
	}
	
	public function get_subcat(){
	    $catid = $this->input->post("catid");
	    
	    $sql="select * from categories where parent_id='$catid'";
	    $subct = $this->db->query($sql)->result_array();
	    
	    foreach($subct as $key=>$value){
        ?>	        
	        <option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
        <?php 	        
	    }
	    
	}

	

	
}
