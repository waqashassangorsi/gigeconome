<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Completeprofile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->checksession();
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
	    //echo "<pre>";var_dump($data['categories']); exit;
	    $userid = $this->session->userdata("user");
	     
	    $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        //$this->form_validation->set_rules('profession', 'Profession', 'required');
        
        if($this->form_validation->run() == FALSE){ 
            $this->load->view("Completeprofile", $data);
            
        }else{
            
            
            $sql = "select * from users where u_id='$userid'";
			$sql_query  =$this->db->query($sql)->result_array()[0];
            $dp = $sql_query['dp'];
            
            if($_FILES['user_image']['size'] > 0){ 
				
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"user_image");
				//echo "<pre>";var_dump($results); exit;
				
				if(!empty($results[0]['file_name'])){
				    $dp = $directory.$results[0]['file_name'];
				}else{
				    $sql = "select * from users where u_id='$userid'";
			        $dp  =$this->db->query($sql)->result_array()[0]['dp'];
				}
						
			}
			
			if($sql_query['user_status']=="Buyer"){
			    
			    $array = array(
                            "dp"=>$dp,
                            "f_name"=>$this->input->post("first_name"),
                            "l_name"=>$this->input->post("last_name"),
                            "about"=>htmlspecialchars($this->input->post("about_self"))
                          );
                          
			}else{
			    
			    $array = array(
                            "dp"=>$dp,
                            "f_name"=>$this->input->post("first_name"),
                            "l_name"=>$this->input->post("last_name"),
                            "about"=>htmlspecialchars($this->input->post("about_self")), 
                            "profession"=>$this->input->post("profession"),
                            "category"=>$this->input->post("category"),
                            "sub_cat"=>$this->input->post("sub_Category"),
                            "tags"=>$this->input->post("tags"),
                            "hourly_rate"=>$this->input->post("hourly_rate"),
                            "skills"=>$this->input->post("skills"),
                            "language"=>$this->input->post("language"),
                            "company_name"=>$this->input->post("cname"),
                            "linked_account"=>$this->input->post("linked_account"),
                            "working_hour_from"=>$this->input->post("working_hour_from"),
                            "working_hour_to"=>$this->input->post("working_hour_to"),
                          );
			}
                  
            
            $con['conditions']=array("u_id"=>$this->session->userdata("user"));
            
            $query = $this->Common->update("users",$array,$con);
            
            if($query){
                if($sql_query['user_status']=="Buyer"){
                     $this->session->set_flashdata('success','Profile updated successfully!');
                    redirect(SURL.'profilecontinue');
                }else{
                     $this->session->set_flashdata('success','Profile updated successfully!');
                    redirect(SURL.'profilecontinue');
                }
                
            }else{
                $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
			    redirect(SURL.'completeprofile');
            }
            
            $this->load->view("Completeprofile", $data);
        
        } 
	    
	    

		
	}
	
	public function getSkills(){
	    $skills = $this->db->query("SELECT skill_name FROM `skills`")->result_array();
	    foreach($skills as $skil){
	        $data[] = $skil['skill_name'];
	    }
	    echo json_encode($data);
	}
	
	public function get_subcat(){
	    $catid = $this->input->post("catid");
	    
	    if($catid != 0){
	        
    	    $sql="select * from categories where parent_id='$catid'";
    	    $subct = $this->db->query($sql)->result_array();
    	    
    	    foreach($subct as $key=>$value){
?>	        
	            <option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
<?php 	        
	        }
	    
	        
	    }else{
	        echo "<option value='0'>Sub Category</option>";
	    }
	    
	}


	
}
