<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InviteFreelancer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->load->library("pagination");
	}

	public function index()
	{ 
	   
		if($this->input->post("cat")>0 && ($this->input->post("sub_Category"))==0){
	         $query="select * from users where status='Active' and user_status='User' and category='".$this->input->post('cat')."'";
	    }else if(($this->input->post("cat"))>0 && ($this->input->post("sub_Category"))>0){
	        $query="select * from users where status='Active' and user_status='User' and category='".$this->input->post('cat')."' and sub_cat='".$this->input->post('sub_cat')."'";
	    }else{
	        $query="select * from users where status='Active' and user_status='User'";
	    }
		//print $query; exit;
// 	     $query=$this->db->query($query)->row();
// 		$config["total_rows"] = $query->total;
// 		$this->pagination->initialize($config);
// 		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
// 		$data["links"] = $this->pagination->create_links();
// 		//print_r($data["record"]);
		
// 			if($this->input->post("cat")>0 && ($this->input->post("sub_Category"))==0){
// 	         $query="select * from users where status='Active' and user_status='User' and category='".$this->input->post('cat')."'LIMIT $page,".$config["per_page"]."";
// 	    }else if(($this->input->post("cat"))>0 && ($this->input->post("sub_Category"))>0){
// 	        $query="select * from users where status='Active' and user_status='User' and category='".$this->input->post('cat')."' and sub_cat='".$this->input->post('sub_cat')."' LIMIT $page,".$config["per_page"]."";
// 	    }else{
// 	        $query="select * from users where status='Active' and user_status='User' LIMIT $page,".$config["per_page"]."";
// 	    }
			$data['record']=$this->db->query($query)->result_array();
		$data['rank'] = $this->db->query("SELECT * FROM rank")->result_array();
		$this->load->view("InviteFreelancer", $data);
	}	    		
	
	public function invitation(){	
	//print_r($this->input->post());
	// echo $this->input->post('jobid');
	// die;
	$job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post('jobid')."'")->result_array()[0];
	$response=array();
	if(count($job_detail) != 0){
		 $todaydate = date("Y-m-d");
		 $job_slug = $job_detail['job_slug'];
		 
		 $this->db->query("update users set notifications=notifications+1 where u_id='".$this->input->post('freelancer')."'");
		 $notification = "You have received a invitation on the job.";
    	    $username = $this->db->query("select * from users where u_id='".$this->input->post('freelancer')."'")->result_array()[0]['username'];
    	    
    	    $link = "Jobdetails/index/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$this->input->post('freelancer'),
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	    $query_notification = $this->Common->insert("notifications",$array);
			$id = $this->db->insert_id();
			$array = array(

                                "job_id"=>$this->input->post('jobid'),
                                "u_id"=>$this->input->post('freelancer'),
								"noti_id" =>$id,
                                "date"=>gmdate("Y-m-d H:i:s"),

                             );

               $query_invite =  $this->common->insert("job_invites",$array);
			   if($query_invite && $query_notification){
				   $response['error'] = false;
					$response['success_msg'] = "invitation send!";
					$response['data_id_notify'] = $id;
			   }else{
				   $response['error'] = true;
				   $response['error_msg'] = "something went wrong while insertion";
			   }
		
	}else{
		$response['error'] = true;
		$response['error_msg'] = "Invalid job slug";
	}
	echo json_encode($response);
	die;
		
	}
	
	public function invitation_cancel(){
		$job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post('jobid')."'")->result_array()[0];
		$response=array();
		if(count($job_detail) != 0){
			$array = array(
    	                    "job_id"=>$this->input->post('jobid'),
                             "u_id"=>$this->input->post('freelancer')
						);
			  $query_invite_cancel =  $this->common->delete("job_invites",$array);
			  $array = array(
    	                    "noti_id"=>$this->input->post('notiid')
						);
			  $query_notification_cancel =  $this->common->delete("notifications",$array);
			   if($query_invite_cancel && $query_notification_cancel){
				    $response['error'] = false;
					$response['success_msg'] = "invitation cancel!";
			   }else{
				   $response['error'] = true;
				   $response['error_msg'] = "something went wrong while deleting";
			   }
			
		}else{
		$response['error'] = true;
		$response['error_msg'] = "Invalid job slug";
		}
		echo json_encode($response);
		die;
		
	}
	
	public function invitation_all(){
	    
		$job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post('jobid')."'")->result_array()[0];
		$response=array();
		
		if(count($job_detail) != 0){
    		 $todaydate = date("Y-m-d");
    		 $job_slug = $job_detail['job_slug'];
    		 
    		 foreach($this->input->post("ids") as $key=>$value){
    		     
    		    $this->db->query("update users set notifications=notifications+1 where u_id='".$value."'");
    		    $notification = "You have received a invitation on the job.";
    		    $username = $this->db->query("select * from users where u_id='".$value."'")->result_array()[0]['username'];
        	    
        	    $link = "Jobdetails/index/".$job_slug;
        	    $array = array(
        	                    "notification"=>$notification,
        	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
        	                    "noti_recvr_id"=>$value,
        	                    "noti_sender_id"=>$this->session->userdata('user'),
        	                    "link"=>$link
        	                  );
        	    $query_notification = $this->Common->insert("notifications",$array);
        	    $id = $this->db->insert_id();
    			$array = array(
    
                                "job_id"=>$this->input->post('jobid'),
                                "u_id"=>$value,
    							"noti_id" =>$id,
                                "date"=>gmdate("Y-m-d H:i:s"),
    
                             );
    
                $query_invite =  $this->common->insert("job_invites",$array);
                
    		 }
    		 
    		 if($query_invite && $query_notification){
			   $response['error'] = false;
			   $response['success_msg'] = "invitation sent!";
			   $response['data_id_notify'] = $id;
		     }else{
			   $response['error'] = true;
			   $response['error_msg'] = "something went wrong while insertion";
		     }
    		
    	}else{
    		$response['error'] = true;
    		$response['error_msg'] = "Invalid job slug";
    	}
    	
		echo json_encode($response);
		die;
		
	}
	
	
	 public function serachFreelancer(){
	     $value= $this->input->post("value");
	     $jobid= $this->input->post("jobid");
	     
	       $record = $this->db->query("select * from users WHERE f_name like '%$value%' AND user_status = 'User' and u_id !='".$this->session->userdata('user')."'")->result_array();

        if(!empty($value)){
            
            foreach ($record as $row){
                $query = $this->db->query("select * from job_invites where u_id='".$row['u_id']."' and job_id='$jobid'");
                if($query->num_rows() > 0){
                    
                    echo "<li style='display:flex;'>
                            <a href='".SURL."TimeLine/".$row['username']."'><img src='". $row['dp'] ."' class='img-circle' /><span>" . $row['f_name'] . "</span></a>
                            <a href='javascript:void(0)' style='margin-top:4px !important;height:24px !important;' class='btn send_btn'>Invitation Sent</a>
                      </li>";
                      
                }else{
                    echo "<li style='display:flex;'>
                            <a href='".SURL."TimeLine/".$row['username']."'><img src='". $row['dp'] ."' class='img-circle' /><span>" . $row['f_name'] . "</span></a>
                            <a href='javascript:void(0)' data-jobslug='".$jobid."' data-freelancerid='".$row['u_id']."' style='margin-top:4px !important;height:24px !important;' class='btn send_btn invite_btnt'>Invite</a>
                      </li>";
                }
                
            };
        }
		
	}


	
}
