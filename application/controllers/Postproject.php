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
	    $username = $this->db->query("select username from users where u_id=".$userid)->result_array()[0]['username'];
	   
	    //echo "<pre>";var_dump($this->input->post());exit;
	    
	    $this->form_validation->set_rules('job_title', 'Job Title', 'required');
	    $this->form_validation->set_rules('category', 'Category', 'required');
	    $this->form_validation->set_rules('sub_category', 'Sub Category', 'required');
	    $this->form_validation->set_rules('job_detail', 'Job Detail', 'required');
	    $this->form_validation->set_rules('joblocation', 'Job Location', 'required');
	    $this->form_validation->set_rules('budget', 'Budget', 'required');
	    
        
        if($this->form_validation->run() == FALSE){  
            $this->load->view("Postproject", $data);
        }else{
	        
	       
	        
	        $this->db->trans_start();
	        
            $job_title = trim($this->input->post("job_title"),""); 
            
            if(!empty($this->input->post("username"))){
                
                //echo "<pre>";var_dump($this->input->post());
                
                if(!empty($this->input->post("makepublic"))){
                    $is_public = "Yes";
                }else{
                    $is_public = "No";
                }
                
                
                $array = array(
                            "u_id"=>$userid,
                            "job_title"=>$job_title,
                            "cat_id"=>$this->input->post("category"),
                            "sub_cat"=>$this->input->post("sub_category"),
                            "job_details"=>$this->input->post("job_detail"),
                            "job_location"=>$this->input->post("joblocation"),
                            "budget"=>$this->input->post("budget"),
                            "date"=>gmdate("Y-m-d h:i:s"),
                            "job_type"=>$this->input->post("budget_fixed"),
                            "is_public"=>$is_public
                          );
                          
            }else{
                $array = array(
                            "u_id"=>$userid,
                            "job_title"=>$job_title,
                            "cat_id"=>$this->input->post("category"),
                            "sub_cat"=>$this->input->post("sub_category"),
                            "job_details"=>$this->input->post("job_detail"),
                            "company_details"=>$this->input->post("company_detail"),
                            "job_location"=>$this->input->post("joblocation"),
                            "budget"=>$this->input->post("budget"),
                            "date"=>gmdate("Y-m-d h:i:s"),
                            "job_type"=>$this->input->post("budget_fixed"),
                          );
            }
            
            
                          
            //echo "<pre>";var_dump($array);exit;
            
            if(!empty($this->input->post("edit"))){
                
                $insert = $this->input->post("edit");
                
                $con['conditions'] =array("job_id"=>$insert);
                $insert = $this->common->update("jobs",$array,$con);
                
            }else{
                $insert = $this->common->insert("jobs",$array);
                
                $slug = url_title($job_title, 'dash', true);
                $slug = $slug.$insert;
                
                $link = "javascript:void(0)";
                $notification = "Job is awaiting admin approval";	
                $array = array("notification"=>$notification,    	                    
                    "noti_date"=>gmdate("Y-m-d H:i:s"),    	                    
                    "noti_recvr_id"=>$userid,      	                    
                    "link"=>$link    	                  
                );					
                
                $query_notification = $this->Common->insert("notifications",$array);
                
                $this->db->query("update users set notifications=notifications+1 where u_id='$userid'");
                    
                    
                if(!empty($this->input->post("username"))){
                    
                    $u_id = $this->db->query("select * from users where username='".$this->input->post("username")."'")->result_array()[0]['u_id'];
                    $loggedinusername = $this->db->query("select * from users where u_id='".$userid."'")->result_array()[0]['username'];
                    
                    $link = "Chat/index/".$loggedinusername."/".$slug;
                    $notification = ucfirst($username)." invited you for the job";	
                    $array = array("notification"=>$notification,    	                    
                        "noti_date"=>date("Y-m-d H:i:s"),    	                    
                        "noti_recvr_id"=>$u_id,    	                    
                        "noti_sender_id"=>$userid,    	                    
                        "link"=>$link    	                  
                    );					
                    
                    $query_notification = $this->Common->insert("notifications",$array);
                    
                    $this->db->query("update users set notifications=notifications+1 where u_id='$u_id'");
                    
                    
                    $array = array("recv_id"=>$u_id,    	                    
                                    "send_id"=>$userid,    	                    
                                    "content"=>$this->input->post("job_detail"),    	                    
                                    "date"=>gmdate("Y-m-d H:i:s"),    	                    
                                    "job_id"=>$insert,
                                    "msg_status"=>"Inbox",  
                                );					
                    
                    $this->Common->insert("jobs_msgs",$array);
                }
                  
                
                    
            }
            
            $this->db->query("update jobs set job_slug='$slug' where job_id='$insert'");
            
            $type = $this->input->post('project_type');
           
            if(!empty($type)){ 
                foreach($type as $key => $value){
                    
                    $array = array(
                                "job_id"=>$insert,
                                "type"=>$value,
                             );
                          
                    $this->common->insert("jobs_type",$array);
                    
                }
                
                $this->db->query("update jobs set privilidge_status='Unpaid' where job_id='$insert'");
            }
            
            
            if($_FILES['upload_file']['size'][0] > 0){ 
				
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"upload_file");
				foreach($results as $key=>$value){
				    if(!empty($results[$key]['file_name'])){
    				    $upload_file = $directory.$results[$key]['file_name'];
    				    
    				    $array = array(
    				                    "job_id"=>$insert,
    				                    "images"=>$upload_file,
    				                  );
    				    $this->common->insert("job_images",$array);            
    				}
    			}
			}
			
			
			
			$this->db->trans_complete();

			
			if(!empty($type)){ 
			    redirect(SURL.'PaymentSummary/jobadons/'.$insert);
			}
			
			if(!empty($this->input->post("username"))){
			    $u_id = $this->db->query("select * from users where username='".$this->input->post("username")."'")->result_array()[0]['u_id'];
			    
			    $this->db->query("update jobs set is_invite='Yes' where job_id='$insert'");
			    
			    $array = array(
                                "job_id"=>$insert,
                                "u_id"=>$u_id,
                                "date"=>date("Y-m-d H:i:s"),
                             );
                          
                $this->common->insert("job_invites",$array);
			}
		
			if($this->db->trans_status() === FALSE){
                $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
			    redirect(SURL.'Postproject');
			}else{
			    
	            $email = $this->db->query("select email from users where u_id=".$userid)->result_array()[0]['email'];
		        $data['email'] = $email;
                $data['type'] = "job_post";
				$html = $this->load->view("Job_emails.php",$data,true);
                $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
                
                 
                
				$this->session->set_flashdata('success','Congratulation job Created.');
			//	redirect(SURL.'InviteFreelancer/'.$insert);	
			    if(!empty($this->input->post("username"))){
			        redirect(SURL.'Chat/index/'.$this->input->post("username").'/'.$slug);
			    }
                redirect(SURL.'Jobs');
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
