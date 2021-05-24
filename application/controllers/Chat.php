<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		$this->checksession();
		$this->load->library("Uploadimage");
	}
	
	private function checksession(){
      
		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

            if($this->uri->segment("2") != 'viewChat'){
    			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
    			redirect(SURL);
            }

		}

	}
	public function updatenotistatus(){
	    $noti_id = $this->input->post("noti_id");
	    $this->db->query("update notifications set is_read='Yes' where noti_id='$noti_id'");
	}

	public function index($username)
	{   
	    
	    $job_slug = $this->uri->segment("4");
	    $us=$this->session->userdata('user');
	    $data['job_detail'] = $this->db->query("select * from jobs where job_slug='$job_slug'")->result_array()[0];
	    if(empty($data['job_detail'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }
	    
	    $job_id = $data['job_detail']['job_id'];
	    
	    $noti_id = $_GET['notiid'];
	    $this->db->query("update notifications set is_read='Yes' where noti_id='$noti_id'");
	    
	    $data['otherparyr'] = $this->db->query("select * from users where username='$username'")->result_array()[0];
        $otherparyr = $data['otherparyr']['u_id'];
       //echo "SELECT custom_status_extent FROM `jobs_msgs` where job_id = $job_id AND custom_status='Proposal' AND (send_id ='".$this->session->userdata('user')."' AND recv_id = $otherparyr OR send_id = $otherparyr AND recv_id ='".$this->session->userdata('user')."') order  by msg_id desc ";
        
         $data['job_status'] = $this->db->query("SELECT custom_status_extent FROM `jobs_msgs` where job_id = $job_id AND custom_status='Proposal' AND (send_id ='".$this->session->userdata('user')."' AND recv_id = $otherparyr OR send_id = $otherparyr AND recv_id ='".$this->session->userdata('user')."') order  by msg_id desc ")->result_array()[0]['custom_status_extent'];
	    
        /// view chat admin in case of dispute
        $data['view_chat_admin'] = false;
        
        
	    $convo_query = "select jobs_msgs.* from jobs_msgs where send_id='".$this->session->userdata('user')."' and 
                  recv_id='$otherparyr' and job_id='$job_id' or recv_id='".$this->session->userdata('user')."' 
                  and send_id='$otherparyr' and job_id='$job_id' order by msg_id asc";
        //echo $convo_query;
        $data['convo'] = $this->db->query($convo_query)->result_array(); 
        if(empty($data['convo'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }else{
	        $this->checksession();
	        foreach($data['convo'] as $key=>$value){
	            
	            if($value['is_seen'] != 1){ 
	                 $this->db->query("update jobs_msgs set is_seen='1',seen_date_time='".gmdate('Y-m-d H:i:s')."' where msg_id=".$value['msg_id']);
	            }
	            
	        }
	        
	        
	    }
        //var_dump($data['convo']);
		
		$this->load->view("Chat", $data);

		
	}
	
	
	
	public function viewChat($username,$jobId,$disputeid)
	{   
	    
	    $job_slug = $this->uri->segment("4"); 
	    $data['job_detail'] = $this->db->query("select * from jobs where job_slug='$job_slug'")->result_array()[0];
	   
	    if(empty($data['job_detail'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }
	    
	    $data['myuser'] = $this->db->query("select users.* from disputes inner join users on users.u_id=disputes.u_id where dsipute_id=$disputeid")->result_array()[0];
	    $userid = $data['myuser']['u_id'];
	    
	    
	    $data['disabled_action'] = "disabled";
	    $job_id = $data['job_detail']['job_id'];
	    
	    if($data['job_detail']['u_id']==$userid){
	        $otherparyr = $data['job_detail']['job_awarded_to'];
	    }else{
	        $otherparyr = $data['job_detail']['u_id'];
	    }
	    
	    $data['otherparyr'] = $this->db->query("select * from users where u_id='$otherparyr'")->result_array()[0];
	    
       //echo "SELECT custom_status_extent FROM `jobs_msgs` where job_id = $job_id AND custom_status='Proposal' AND (send_id ='".$this->session->userdata('user')."' AND recv_id = $otherparyr OR send_id = $otherparyr AND recv_id ='".$this->session->userdata('user')."') order  by msg_id desc ";
        
        $data['job_status'] = $this->db->query("SELECT custom_status_extent FROM `jobs_msgs` where job_id = $job_id AND custom_status='Proposal' AND (send_id ='".$userid."' AND recv_id = $otherparyr OR send_id = $otherparyr AND recv_id ='".$userid."') order  by msg_id desc ")->result_array()[0]['custom_status_extent'];
	    
        /// view chat admin in case of dispute
        $data['view_chat_admin'] = true;
        
	    $convo_query = "select jobs_msgs.* from jobs_msgs where send_id='".$userid."' and 
                  recv_id='$otherparyr' and job_id='$job_id' or recv_id='".$userid."' 
                  and send_id='$otherparyr' and job_id='$job_id' order by date asc";
                  //echo $convo_query;
        $data['convo'] = $this->db->query($convo_query)->result_array(); 
        if(empty($data['convo'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }else{
	       // $this->checksession();
	        foreach($data['convo'] as $key=>$value){
	            
	            if($value['is_seen'] != 1){ 
	                 $this->db->query("update jobs_msgs set is_seen='1',seen_date_time='".gmdate('Y-m-d H:i:s')."' where msg_id=".$value['msg_id']);
	            }
	            
	        }
	        
	        
	    }
        //var_dump($data['convo']);
		//print_r($data['myuser']);
	    
	    
		$this->load->view("Chat", $data);

		
	}
	
	public function service($servicepid)
	{   
	    $data['convo'] = $this->db->query("select * from jobs_msgs where service_p_id='$servicepid' order by date asc")->result_array();
	    
	    if(empty($data['convo'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }
	    
	    $servicepurcahse = $this->db->query("select * from services_purchased where id='$servicepid'")->result_array()[0];
	    $data['servicepurchase'] = $servicepurcahse;
	    //echo "<pre>";var_dump($data['servicepurchase']);
	    
	    if($servicepurcahse['service_owner_id']==$this->session->userdata("user")){
	        $data['otherparyr'] = $this->db->query("select * from users where u_id='".$servicepurcahse['who_purchased']."'")->result_array()[0];
	    }else{
	        $data['otherparyr'] = $this->db->query("select * from users where u_id='".$servicepurcahse['service_owner_id']."'")->result_array()[0];
	    }
	    
	    if(($data['convo'][0]['send_id']==$this->session->userdata('user')) || ($data['convo'][0]['recv_id']==$this->session->userdata('user'))){
	        
	        $data['services_details'] = $this->db->query("select * from services where service_id='".$data['convo'][0]['service_id']."'")->result_array()[0];
		    $this->load->view("services_chat", $data);
		
	    }else{
	        redirect(SURL);
	    }
	    
	    

		
	}
	
	public function giverating(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $username = $this->db->query("select * from users where u_id='".$this->input->post("u_id")."'")->result_array()[0]['username'];
	    $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("jobid")."'")->result_array()[0];
	    
	   // echo "<pre>";var_dump($job_detail); 
	   // exit;
	    
	    if(!empty($this->input->post("jobid")) && $this->input->post("rating") > 0){
	        
	        $array = array(
	                        "u_id"=>$this->input->post("u_id"),
	                        "job_id"=>$this->input->post("jobid"),
	                        "stars"=>$this->input->post("rating"),
	                        "comment"=>$this->input->post("comment_user"),
	                        "date"=>gmdate("Y-m-d H:i:s"),
	                        "is_reply"=>"No",
	                        "who_rated"=>$this->session->userdata("user"),
	                        "msg_id"=>$this->input->post("msg_id"),
	                      );
	                      
	        $qyery = $this->Common->insert("user_rating",$array);   
	        
	        if($this->input->post("status")=="Buyer"){
	            $this->db->query("update jobs_msgs set is_buyer_rated='Yes' where msg_id='".$this->input->post("msg_id")."'");
	        }else{
	            $this->db->query("update jobs_msgs set is_freelancer_rated='Yes' where msg_id='".$this->input->post("msg_id")."'");
	        }
	        
	        
	        if($qyery){
	            $this->session->set_flashdata("success","Thank you, you rated Client successfully");
	        }else{
	            $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	        }
	        
	        
	        
	        
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	    }
	    
	    redirect(SURL."Chat/index/".$username."/".$job_detail['job_slug']);
	}
	
	public function replyrating(){
	    
	    //echo "<br>";var_dump($this->input->post()); exit;
	    
	    $username = $this->db->query("select * from users where u_id='".$this->input->post("u_id")."'")->result_array()[0]['username'];
	    $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("jobid")."'")->result_array()[0];
	    
	    //&& $this->input->post("rating"
	    
	    if(!empty($this->input->post("jobid")) > 0){
	        
	        $array = array(
	                        "u_id"=>$this->input->post("u_id"),
	                        "job_id"=>$this->input->post("jobid"),
	                        "stars"=>$this->input->post("rating"),
	                        "comment"=>$this->input->post("send_feed"),
	                        "date"=>gmdate("Y-m-d H:i:s"),
	                        "is_reply"=>"Yes",
	                        "who_rated"=>$this->session->userdata("user"),
	                        "msg_id"=>$this->input->post("msg_id"),
	                        "reply_of"=>$this->input->post("reply_of"),
	                      );
	                      
	        $qyery = $this->Common->insert("user_rating",$array);   

	        if($qyery){
	            $this->session->set_flashdata("success","Thank you, you rated Client successfully");
	        }else{
	            $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	        }
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	    }
	    
	    redirect(SURL."Chat/index/".$username."/".$job_detail['job_slug']);
	}
	public function givetip(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    if(!empty($this->input->post("msg_id")) && !empty($this->input->post("u_id")) && ($this->input->post("money")>0)){
	         redirect(SURL.'PaymentSummary/givetip/'.$this->input->post("username")."/".$this->input->post("money")."/".$this->input->post("msg_id"));
	    }else{
	        
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	         redirect(SURL.'Chat/index/'.$this->input->post("username")."/".$this->input->post("job_slug"));
	    }
	    
	   
	}
	
	public function propsal()
	{ 
		$this->load->view("Propsal", $data);

		
	}
	
	public function reject_proposal($msgid){
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	   
	    if($msg_details){
	        if($msg_details['custom_status_extent'] != "0"){
    	        $this->session->set_flashdata("fail","Something went wrong.please try again later.");
    	        redirect(SURL);
    	    }
	        
	        $query = $this->db->query("update jobs_msgs set custom_status_extent='2' where msg_id='$msgid'");
	        
	        $sender_id = $msg_details['send_id'];
	        $job_slug = $msg_details['job_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        $client = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has rejected your proposal.";
    	    
    	    $link = "Jobdetails/index/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        $this->session->set_flashdata("success","Proposal rejected.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	public function reject_invoice($msgid){
	    
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	    if($msg_details){
	        if($msg_details['custom_status_extent'] != "4"){
    	        $this->session->set_flashdata("fail","Something went wrong.please try again later.");
    	        redirect(SURL);
    	    }
    	    
    	    $query = $this->db->query("update jobs_msgs set custom_status_extent='6' where msg_id='$msgid'");
	        
	        $sender_id = $msg_details['send_id'];
	        $job_slug = $msg_details['job_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        $client = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has rejected your invoice.";
    	    
    	   // $link = "Chat/index/".$job_slug;
    	   // redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
    	    
    	    $username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    $link = "Chat/index/".$username."/".$job_slug;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        $this->session->set_flashdata("success","Invoice rejected.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	public function acept_proposal($msgid){
	    
	    $utc_time = gmdate("Y-m-d H:i:s");
	    $query = $this->db->query("update jobs_msgs set custom_status_extent='1',proposal_acptnc_date='$utc_time' where msg_id='$msgid'");
	    if($query){
	        $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	        $sender_id = $msg_details['send_id'];
	        $job_slug = $msg_details['job_slug'];
	        $job_id = $msg_details['job_id'];
	        
	        
	        $this->db->query("update jobs_msgs set custom_status_extent='2' where send_id !=$sender_id AND job_id = $job_id AND custom_status='Proposal' AND recv_id = ".$this->session->userdata('user'));
	        
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        $client = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has accepted your proposal.";
    	    
    	    $link = "Jobdetails/index/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        $this->session->set_flashdata("success","Proposal Accepted.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	
	public function sendmsg(){
	    
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    if(($this->input->post("msg_statuss")>=0) && !empty($this->input->post("recv_id")) && !empty($this->input->post("job_id")) && !empty($this->input->post("new_message"))){
	        
	        if($this->input->post("msg_statuss")=="0"){
	            $this->simplesndmsgjob();
	        }else if($this->input->post("msg_statuss")=="1"){
	            $this->sendproposaljob();
	        }else if($this->input->post("msg_statuss")=="2"){ 
	            $this->sendinvoicejob();
	        }else if($this->input->post("msg_statuss")=="3"){
	            $this->depositforjob();
	        }else if($this->input->post("msg_statuss")=="4"){
	            $this->refundjob();
	        }else if($this->input->post("msg_statuss")=="5"){
	            $this->extendtimejob();
	        }
	    }else{ 
	        exit;
	    }
	    
	}
	
	public function extendtimejob(){
	    
	    if(empty($this->input->post("new_message")) || empty($this->input->post("job_id")) || empty($this->input->post("reason_extention"))){
	        echo 1; exit;
	    }
	    
	    $extension_exist = $this->db->query("select * from jobs_msgs where job_id='".$this->input->post("job_id")."' and custom_status='Time-Extension' and custom_status_extent='16'");
        if($extension_exist->num_rows() > 0){
            echo 7;
            //Extension aleady sent.
            exit;
        }
        
        $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
        $recv_id = $job_detail['u_id'];
    	$job_slug = $job_detail['job_slug'];
    	$todaydate = gmdate("Y-m-d");
 
        
        // $escrowamt = $this->Common->job_escrow_amt($this->input->post("job_id"));
        
        // if($escrowamt > 0){
            
        // }else{
        //     echo 6;
        //     exit;
        // }
        
    	
    	$array = array(
                        "recv_id"=>$recv_id,
                        "send_id"=>$this->session->userdata('user'),
                        "content"=>$this->input->post("new_message"),
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "job_id"=>$this->input->post("job_id"),
                        "msg_status"=>"Job",
                        "custom_status"=>"Time-Extension", 
                        "custom_status_extent"=>"16",
                        "time_extension_rsn"=>$this->input->post("reason_extention"),
						"extension_days"=>$this->input->post('days')
                      );
                      
        $query = $this->Common->insert("jobs_msgs",$array);
        
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
		
		// $this->db->query("update jobs set no_of_penalty_day=no_of_penalty_day + ".$this->input->post('days')." where job_id=".$this->input->post("job_id")."");
    	
    	$notification = "You have received a request to extend ".$this->input->post('days')." day time for the job.";
    	$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    
    	$link = "Chat/index/".$username."/".$job_slug;
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$recv_id,
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $query_notification = $this->Common->insert("notifications",$array);
    	    
        if($query_notification){
	       
	        if($_FILES['files']['size'][0] > 0){ 
				//echo "<pre>";var_dump($_FILES['files']);
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				//echo "<pre>";var_dump($results);
				if($results){
				    
					foreach ($results as $key => $value){
					    
					    if(empty($value['file_name'])){
					        continue;
					    }
					    
					    $array = array(
					                    "msg_id"=>$query,
					                    "file"=>$directory.$value['file_name'],
					                 );
					                 
						$this->Common->insert("msgs_files",$array); 
					}
					
				}
				
			}
			
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthread.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function refundjob(){
	    
	    if(empty($this->input->post("new_message")) || empty($this->input->post("job_id")) || empty($this->input->post("description_refund"))){
	        echo 1; exit;
	    }
	    
	    $record_exist = $this->db->query("select * from jobs_msgs where job_id='".$this->input->post("job_id")."' and custom_status='Refund' and custom_status_extent='12'");
        if($record_exist->num_rows() > 0){
            echo 11;
            //Extension aleady sent.
            exit;
        }
	    
        $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
        $recv_id = $job_detail['job_awarded_to'];
    	$job_slug = $job_detail['job_slug'];
    	$todaydate = gmdate("Y-m-d");
 
        
        $escrowamt = $this->Common->job_escrow_amt($this->input->post("job_id"),date("Y-m-d"));
        
        if($escrowamt >= $this->input->post("amount_refund")){
            
        }else{
            echo 6;
            exit;
        }
        
    	
    	$array = array(
                        "recv_id"=>$recv_id,
                        "send_id"=>$this->session->userdata('user'),
                        "content"=>$this->input->post("new_message"),
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "job_id"=>$this->input->post("job_id"),
                        "msg_status"=>"Job",
                        "custom_status"=>"Refund", 
                        "custom_status_extent"=>"12",
                        "proposal_description"=>$this->input->post("description_refund"),
                        "refund_amt"=>$this->input->post("amount_refund"),
                      );
                      
        $query = $this->Common->insert("jobs_msgs",$array);
        $data['type']="refundjob";
        $userid=$this->session->userdata('user');
    	$username = $this->db->query("select * from users where u_id='$userid'")->result_array()[0]['username'];
        $email = $this->db->query("select email from users where u_id=".$userid)->result_array()[0]['email'];
        $data['email'] = $email;
        $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
        $html = $this->load->view("Job_emails.php",$data,true);
        $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	
    	$notification = "You have received a request to refund the amount for the job.";
    	$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    
    	$link = "Chat/index/".$username."/".$job_slug;
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$recv_id,
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $query_notification = $this->Common->insert("notifications",$array);
    	    
        if($query_notification){
	       
	        if($_FILES['files']['size'][0] > 0){ 
				//echo "<pre>";var_dump($_FILES['files']);
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				//echo "<pre>";var_dump($results);
				if($results){
				    
					foreach ($results as $key => $value){
					    
					    if(empty($value['file_name'])){
					        continue;
					    }
					    
					    $array = array(
					                    "msg_id"=>$query,
					                    "file"=>$directory.$value['file_name'],
					                 );
					                 
						$this->Common->insert("msgs_files",$array); 
					}
					
				}
				
			}
			
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthread.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function simplesndmsgjob(){
	    
	    
        
	    $chkmsg = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array();
	  
	    if(empty($chkmsg)){
	        echo 1; exit;
	        //Something went wrong. Please try again later
	    }else{
	        if($chkmsg[0]['u_id']==$this->session->userdata('user')){
	            
	        }else{
	            $clientmsg = $this->db->query("select * from jobs_msgs where send_id='".$chkmsg[0]['u_id']."' and job_id='".$this->input->post("job_id")."'");
	            
	            $if_proposal_acept = $this->db->query("select * from jobs_msgs where job_id='".$this->input->post("job_id")."' and send_id='".$this->session->userdata('user')."' and custom_status_extent='1'");
	               
	            if(($clientmsg->num_rows() > 0) || ($if_proposal_acept->num_rows() > 0)){
	                 
	            }else{
	                 echo 8; exit;
	                  //Something went wrong. Please try again later
	            }
	        }
	    }
	    
	    if($chkmsg[0]['job_awarded_to']>0){
	        $msgstatus = "Job";
	    }else{
	        $msgstatus = "Inbox";
	    }
	    
	    

	    $array = array(
	                    "recv_id"=>$this->input->post("recv_id"),
	                    "send_id"=>$this->session->userdata('user'),
	                    "content"=>$this->input->post("new_message"),
	                    "date"=>gmdate("Y-m-d H:i:s"),
	                    "job_id"=>$this->input->post("job_id"),
	                    "msg_status"=>$msgstatus,
	                  );
	                  
	   $insert = $this->Common->insert("jobs_msgs",$array);    
	   if($insert){
	      
	       if($_FILES['files']['size'][0] > 0){ 
				
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				//echo "<pre>";var_dump($results);
				if($results){
				    
					foreach ($results as $key => $value){
					    
					    if(empty($value['file_name'])){
					        continue;
					    }
					    
					    $array = array(
					                    "msg_id"=>$insert,
					                    "file"=>$directory.$value['file_name'],
					                 );
					                 
						$this->Common->insert("msgs_files",$array); 
					}
					
				}
				
			}
			
			$this->db->query("update users set msgs=msgs+1 where u_id='".$this->input->post("recv_id")."'");
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$insert'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthread.php",$data);
			
	   }else{
	       echo 1;
	   }
	   
	}
	
	public function sendproposaljob(){
	  
        $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
        $recv_id = $job_detail['u_id'];
    	$job_slug = $job_detail['job_slug'];
    	$todaydate = gmdate("Y-m-d");
    	
    	if(($job_detail['job_awarded_to']>0) && ($job_detail['job_awarded_to']!=$this->session->userdata('user'))){
	        echo 9;
	        exit;
	    }
	    
    	if($job_detail['job_awarded_to']>0){
	        $msgstatus = "Job";
	    }else{
	        $msgstatus = "Inbox";
	    }
    	
        if($recv_id==$this->session->userdata('user')){
            echo 3;
            //Buyer cant send the proposal to his own job.
            exit;
        }
        
         $proposal_exist = $this->db->query("select * from jobs_msgs where job_id='".$this->input->post("job_id")."' and custom_status='Proposal' and custom_status_extent='0'");
        if($proposal_exist->num_rows() > 0){
            echo 2;
            //Proposal aleady sent.
            exit;
        }
        $deductionfee = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
    	$deduct = $this->input->post("deposit") * $deductionfee/100;
    	$earn = $this->input->post("deposit") - $deduct;
    	
    	$proposal_left = $this->Common->if_proposal_left($this->session->userdata('user'));
            
	    if($proposal_left==false){
	        echo 9;
	        exit;
	    }else{
	        $this->db->query("update proposal_credits set used=used+1 where id='".$proposal_left."'");
	    }
    	
    	$array = array(
                        "recv_id"=>$recv_id,
                        "send_id"=>$this->session->userdata('user'),
                        "content"=>$this->input->post("new_message"),
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "job_id"=>$this->input->post("job_id"),
                        "msg_status"=>$msgstatus,
                        "custom_status"=>"Proposal",
                        "proposal_budget"=>$this->input->post("budget"),
                        "proposal_deposit"=>$this->input->post("deposit"), 
                        "proposal_description"=>$this->input->post("pro_description"),
                        "earn_amt"=>$earn,
                      );
                      
        $query = $this->Common->insert("jobs_msgs",$array);
        
    	$proposal_no = $this->session->userdata('user').'-'.time().'-'.$query;
    	$this->db->query("update jobs_msgs set proposal_no='$proposal_no' where msg_id='$query'");
    	
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	$notification = "You have received a new proposal on your job.";
    	
    	$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    
    	$link = "Chat/index/".$username."/".$job_slug;
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$recv_id,
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $query_notification = $this->Common->insert("notifications",$array);
    	    
        if($query_notification){
	       
	        if($_FILES['files']['size'][0] > 0){ 
				//echo "<pre>";var_dump($_FILES['files']);
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				//echo "<pre>";var_dump($results);
				if($results){
				    
					foreach ($results as $key => $value){
					    
					    if(empty($value['file_name'])){
					        continue;
					    }
					    
					    $array = array(
					                    "msg_id"=>$query,
					                    "file"=>$directory.$value['file_name'],
					                 );
					                 
						$this->Common->insert("msgs_files",$array); 
					}
					
				}
				
			}
			
			$this->db->query("update users set msgs=msgs+1 where u_id='".$this->input->post("recv_id")."'");
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthread.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function depositforjob(){
	    
        $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
        $recv_id = $job_detail['u_id'];
    	$job_slug = $job_detail['job_slug'];
    	$todaydate = gmdate("Y-m-d");
    	
        if($recv_id==$this->session->userdata('user')){
            echo 3;
            //Buyer cant send the proposal to his own job.
            exit;
        }
        
        $record_exist = $this->db->query("select * from jobs_msgs where job_id='".$this->input->post("job_id")."' and custom_status='Deposit' and custom_status_extent='8'");
        if($record_exist->num_rows() > 0){
            echo 10;
            //Deposit aleady sent.
            exit;
        }
        $deductionfee = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
    	$deduct = $this->input->post("amount_deposit") * $deductionfee/100;
    	$earn = $this->input->post("amount_deposit") - $deduct;
    	
    	$array = array(
                        "recv_id"=>$recv_id,
                        "send_id"=>$this->session->userdata('user'),
                        "content"=>$this->input->post("new_message"),
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "job_id"=>$this->input->post("job_id"),
                        "msg_status"=>"Job",
                        "custom_status"=>"Deposit",
                        "custom_status_extent"=>"8",
                        "deposit_amt"=>$this->input->post("amount_deposit"),
                        "proposal_description"=>$this->input->post("description_deposit"),
                        "earn_amt"=>$earn,
                      );
                      
        $query = $this->Common->insert("jobs_msgs",$array);
        
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	$notification = "You have received a deposit request on your job.";
    	$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    
    	$link = "Chat/index/".$username."/".$job_slug;
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$recv_id,
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $query_notification = $this->Common->insert("notifications",$array);
    	    
        if($query_notification){
	       
	        if($_FILES['files']['size'][0] > 0){ 
				//echo "<pre>";var_dump($_FILES['files']);
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				//echo "<pre>";var_dump($results);
				if($results){
				    
					foreach ($results as $key => $value){
					    
					    if(empty($value['file_name'])){
					        continue;
					    }
					    
					    $array = array(
					                    "msg_id"=>$query,
					                    "file"=>$directory.$value['file_name'],
					                 );
					                 
						$this->Common->insert("msgs_files",$array); 
					}
					
				}
				
			}
			
			$this->db->query("update users set msgs=msgs+1 where u_id='".$this->input->post("recv_id")."'");
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			$email = $this->db->query("select email from users where u_id=".$recv_id)->result_array()[0]['email'];
            $data['email'] = $email;
            $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
            $data['type'] = "deposite_amount";
    		$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
			$this->load->view("includes/allmsgthread.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function cancelinvoice($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	     if($record['custom_status_extent'] != "4"){
	        $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	        redirect(SURL);
	     }
    	    
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update jobs_msgs set custom_status_extent='7' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Invoice Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['job_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	public function canceldeposit($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	     
	     if($record['custom_status_extent'] != "8"){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	     }
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update jobs_msgs set custom_status_extent='10' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Deposit Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['job_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	public function cancelrefund($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	     if($record['custom_status_extent'] != "12"){
	        $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	        redirect(SURL);
	     }
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update jobs_msgs set custom_status_extent='15' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Refund request Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['job_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	public function canceltime($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update jobs_msgs set custom_status_extent='19' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Time Extension request Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['job_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	
	
	public function rejectdeposit($msgid){
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        if($msg_details['custom_status_extent'] !="8"){
    	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
    	         redirect(SURL);
    	    }
	        
	        $query = $this->db->query("update jobs_msgs set custom_status_extent='9' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['job_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $client = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has rejected your deposit request.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "Chat/index/".$username."/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        
    	        $email = $this->db->query("select email from users where u_id=".$recv_id)->result_array()[0]['email'];
                $data['email'] = $email;
                $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
                $data['type'] = "deposite_rejected";
        		$html = $this->load->view("Job_emails.php",$data,true);
                $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
    	        
    	        $this->session->set_flashdata("success","Deposit rejected.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	public function rejectrefund($msgid){
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	    if($msg_details['custom_status_extent'] != "12"){
	        $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	        redirect(SURL);
	    }
	     
	    if($msg_details){
	        
	        $query = $this->db->query("update jobs_msgs set custom_status_extent='14' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['job_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$msg_details['recv_id']."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has rejected your refund request.";
    	    
    	    //$notification = "User has rejected your refund request.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "Chat/index/".$username."/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        $this->session->set_flashdata("success","Refund request rejected.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	public function rejecttime($msgid){
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        $query = $this->db->query("update jobs_msgs set custom_status_extent='18' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['job_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$sender_id."'")->result_array()[0];
    	    $notification = "Hey! ".$client['f_name']." ".$client['l_name']." Unfortunately client didnt agree to your time extension request..";
    	    
    	    //$notification = "User has rejected your refund request.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "Chat/index/".$username."/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        $this->session->set_flashdata("success","Time Extension request rejected.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	public function acceptrefund($msgid){
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        if($msg_details['custom_status_extent']!="12"){
	            $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	            redirect(SURL);
	        }
	        
	        $query = $this->db->query("update jobs_msgs set custom_status_extent='13' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['job_slug'];
	        $jobid = $msg_details['job_id'];
	        
	        $escrow_amt = $this->Common->job_escrow_amt($jobid,date("Y-m-d"));
	        if($escrow_amt > 0){
	            $this->db->query("delete from transactions where job_id='$jobid' and u_id='0' and in_escrow='Yes'");
	            
	            $array = array(
	                            "u_id"=>$sender_id,
	                            "damount"=>$escrow_amt,
	                            "camount"=>"0",
	                            "totalamt"=>$escrow_amt,
	                            "job_id"=>$jobid,
	                            "in_escrow"=>"No",
	                            "is_clear"=>"Yes", 
	                            "trans_type"=>"amt_refunded",
	                            "date"=>gmdate("Y-m-d H:i:s"),
	                          ); 
	            $query = $this->Common->insert("transactions",$array);
	            
	        }else{
	            $this->session->set_flashdata("fail","You dont have any amount in escrow to refund.");
	            $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	            redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	        }
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$msg_details['recv_id']."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has accepted your refund request.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "Chat/index/".$username."/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        $this->session->set_flashdata("success","Refund request accepted.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
	
	public function accepttime($msgid){
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['job_slug'];
	        $jobid = $msg_details['job_id'];
	        $days = $msg_details['extension_days'];
	        $extended_pt_days = $msg_details['extended_pt_days'];
	        
	        $if_record_Exists = $this->db->query("select * from jobs_msgs where extension_aceptance_date !='0000-00-00 00:00:00' and job_id='$jobid' order by msg_id desc limit 1");
	        
	        if($if_record_Exists->num_rows() > 0){
	             $extension_Acptnc_date = $if_record_Exists->result_array()[0]['extension_aceptance_date'];
	             
	             $end_Date = date('Y-m-d H:i:s',strtotime($extension_Acptnc_date . "+$extended_pt_days days"));
	             
	             if($end_Date >= gmdate("Y-m-d H:i:s")){
	                $this->db->query("update jobs_msgs set custom_status_extent='17',extension_aceptance_date='$extension_Acptnc_date' where msg_id='$msgid'");
	                $this->db->query("update jobs set extended_pt_days=extended_pt_days + $days  where job_id=$jobid");
	             }else{
	                 $this->db->query("update jobs_msgs set custom_status_extent='17',extension_aceptance_date='".gmdate("Y-m-d H:i:s")."' where msg_id='$msgid'");
	                 $this->db->query("update jobs set extended_pt_days='0'  where job_id=$jobid");
	             }
	             	            
	        }else{
	             $query = $this->db->query("update jobs_msgs set custom_status_extent='17',extension_aceptance_date='".gmdate("Y-m-d H:i:s")."' where msg_id='$msgid'");
	             $this->db->query("update jobs set extended_pt_days=extended_pt_days + $days  where job_id=$jobid");
	        }
	        
	       
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$sender_id."'")->result_array()[0];
    	    $notification = "Hey! ".$client['f_name']." ".$client['l_name']." Congratulations! Client has accepted your time extension.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "Chat/index/".$username."/".$job_slug;
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        $this->session->set_flashdata("success","Time Extension accepted.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
    	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	        redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    redirect(SURL.'Home/');
	}
	
	public function sendinvoicejob(){
	    
	    $makred =  $this->input->post("confirm_complete_order");
	    
	    
        $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
        $recv_id = $job_detail['u_id'];
    	$job_slug = $job_detail['job_slug'];
    	$todaydate = gmdate("Y-m-d");
    	
        if($recv_id==$this->session->userdata('user')){
            echo 4;
            //Buyer cant send the proposal to his own job.
            exit;
        }
        
         $proposal_exist = $this->db->query("select * from jobs_msgs where job_id='".$this->input->post("job_id")."' and custom_status='Invoice' and custom_status_extent='4'");
        if($proposal_exist->num_rows() > 0){
            echo 5;
            //Proposal aleady sent.
            exit;
        }
        
    	
    	$array = array(
                        "recv_id"=>$recv_id,
                        "send_id"=>$this->session->userdata('user'),
                        "content"=>$this->input->post("new_message"),
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "job_id"=>$this->input->post("job_id"),
                        "msg_status"=>"Job",
                        "custom_status"=>"Invoice",
                        "custom_status_extent"=>"4",
                        "invc_amt"=>$this->input->post("total_inv_amt"),
                        "invc_description"=>$this->input->post("description_invoice"), 
                      );
                      
                    
                      
        $query = $this->Common->insert("jobs_msgs",$array);
        
        
        
    	$invoice_id = $this->session->userdata('user').'-'.time().'-'.$query;
    	$this->db->query("update jobs_msgs set invoice_id='$invoice_id' where msg_id='$query'");
    	
    	if($makred != ""){
    	    	$this->db->query("update jobs_msgs set marked_as_complete='$makred' where msg_id='$query'");
    	    	$this->db->query("update jobs set job_status = 'Completed' where job_id=".$this->input->post("job_id"));
    	}
    	
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	
    	$notification = "You have received a new Invoice on your job.";
    	$username_query = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	$username = $username_query['username'];
    	$link = "Chat/index/".$username."/".$job_slug;
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$recv_id,
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $query_notification = $this->Common->insert("notifications",$array);
	    
	    $email = $this->db->query("select email from users where u_id=".$recv_id)->result_array()[0]['email'];
        $data['email'] = $email;
        $data['username'] = ucfirst($username_query['f_name'])." ".$username_query['l_name'];
        $data['type'] = "send_invoice";
		$html = $this->load->view("Job_emails.php",$data,true);
        $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
	    
    	    
        if($query_notification){
	       
	        if($_FILES['files']['size'][0] > 0){ 
				//echo "<pre>";var_dump($_FILES['files']);
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				//echo "<pre>";var_dump($results);
				if($results){
				    
					foreach ($results as $key => $value){
					    
					    if(empty($value['file_name'])){
					        continue;
					    }
					    
					    $array = array(
					                    "msg_id"=>$query,
					                    "file"=>$directory.$value['file_name'],
					                 );
					                 
						$this->Common->insert("msgs_files",$array); 
					}
					
				}
				
			}
			
			$this->db->query("update users set msgs=msgs+1 where u_id='".$this->input->post("recv_id")."'");
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthread.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function sendmsgservice(){
	    
	    if(empty($this->input->post("new_message"))){
	        exit;
	    }

	    $chkmsg = $this->db->query("select * from services_purchased where id='".$this->input->post("servicep_id")."'")->result_array();
	    if(empty($chkmsg)){
	        echo 2; exit;
	    }
	    
	    $array = array(
	                    "recv_id"=>$this->input->post("recv_id"),
	                    "send_id"=>$this->session->userdata('user'),
	                    "content"=>$this->input->post("new_message"),
	                    "date"=>gmdate("Y-m-d H:i:s"),
	                    "service_id"=>$this->input->post("service_id"),
	                    "service_p_id"=>$this->input->post("servicep_id"),
	                    "msg_status"=>"Service",
	                  );
	                  
	   $insert = $this->Common->insert("jobs_msgs",$array);    
	   if($insert){
	       
	       if($_FILES['files']['size'][0] > 0){ 
				//echo "<pre>";var_dump($_FILES['files']);
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				//echo "<pre>";var_dump($results);
				if($results){
				    
					foreach ($results as $key => $value){
					    
					    if(empty($value['file_name'])){
					        continue;
					    }
					    
					    $array = array(
					                    "msg_id"=>$insert,
					                    "file"=>$directory.$value['file_name'],
					                 );
					                 
						$this->Common->insert("msgs_files",$array); 
					}
					
				}
				
			}
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$insert'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthread.php",$data);
	   }else{
	       echo 1;
	   }
	   
	}
	
	public function sendinvoice(){
	    
	    if(empty($this->input->post("new_message"))){
	        exit;
	    }
	    
	    $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
	    $recv_id = $job_detail['u_id'];
	    $job_slug = $job_detail['job_slug'];
	    
	    
	    $array = array(
	                    "recv_id"=>$recv_id,
	                    "send_id"=>$this->session->userdata('user'),
	                    "content"=>$this->input->post("new_message"),
	                    "date"=>gmdate("Y-m-d H:i:s"),
	                    "job_id"=>$this->input->post("job_id"),
	                    "msg_status"=>"Job",
	                    "custom_status"=>"Invoice",
	                    "custom_status_extent"=>"4",
	                    "invoice_id"=>"Invc-22", 
	                    "invc_amt"=>$this->input->post("total_inv_amt")
	                  );
	                  
	    $insert = $this->Common->insert("jobs_msgs",$array);
	    
	    $this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
	    $notification = "You have received a new Invoice.";
	    $username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
	    
	    $link = "Chat/index/".$username."/".$job_slug;
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$recv_id,
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
	    $data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$insert'")->result_array();
		$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
		
		$this->load->view("includes/allmsgthread.php",$data);
	}
	
	public function sendinvoicesrvc(){
	    
	    if(empty($this->input->post("new_message"))){
	        exit;
	    }
	    
	    $who_purchased = $this->db->query("select * from services_purchased where id='".$this->input->post("servicep_id")."'")->result_array()[0][who_purchased];
	    if($who_purchased==$this->session->userdata("user")){
	        echo 3;exit;
	    }
	    
	    $if_invc_sent = $this->db->query("select * from jobs_msgs where service_p_id='".$this->input->post("servicep_id")."' and custom_status='Invoice' and custom_status_extent='4'");
	    if($if_invc_sent->num_rows() > 0){
	        echo 4;exit;
	    }
	    
	    $array = array(
	                    "recv_id"=>$this->input->post("recv_id"),
	                    "send_id"=>$this->session->userdata('user'),
	                    "content"=>$this->input->post("new_message"),
	                    "date"=>gmdate("Y-m-d H:i:s"),
	                    "service_id"=>$this->input->post("service_id"),
	                    "service_p_id"=>$this->input->post("servicep_id"),
	                    "msg_status"=>"Service",
	                    "custom_status"=>"Invoice",
	                    "custom_status_extent"=>"4",
	                    "invoice_id"=>"Invc-22", 
	                    "invc_amt"=>$this->input->post("total_inv_amt")
	                  );
	                  
	    $insert = $this->Common->insert("jobs_msgs",$array);
	    
	    $this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
	    $notification = "You have received a new Invoice.";
	   
	    
	    $link = "Chat/service/".$this->input->post("servicep_id");
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$this->input->post("recv_id"),
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
	    $data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$insert'")->result_array();
		$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
		
		$this->load->view("includes/allmsgthread.php",$data);
	}
	
	public function get_new_msgs(){
      $msg_id = intval($this->input->post("msg_id"));
      $recv_id = $this->input->post("recv_id");
      $job_id = $this->input->post("job_id");
    

      $sql = "select * from jobs_msgs where msg_id > '$msg_id' and send_id='$recv_id' and recv_id='".$this->session->userdata('user')."' and job_id='$job_id' 
              union
              select * from jobs_msgs where msg_id > '$msg_id' and send_id='".$this->session->userdata('user')."' and recv_id='$recv_id' and job_id='$job_id' "; 


       $data['convo'] = $this->db->query($sql)->result_array();
       $data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
       
       if(empty($data['convo'])){
           echo "0";
       }else{
           $this->load->view("includes/allmsgthread.php",$data);
       }
       
   }
   
   public function get_new_msgs_notification(){
      $noti_id = ($this->input->post("noti_id"));
      $u_id = $this->input->post("u_id");
    

     $sql = "select * from notifications where noti_id > '$noti_id' and noti_recvr_id='".$this->session->userdata('user')."'"; 
      $noti = $this->db->query($sql)->result_array();
      
      if(count($noti) > 0){
          foreach($noti as $key=>$value){
?>
        <a href="<?php echo $value['link'];?>" class="noti_wrpr_head" data-id1="<?php echo $value['noti_id'];?>"> 
            <div class="my_noti unreadmsgs">  
                <ul style="display: flex;list-style: none;padding: 0;">
                    <li style="padding: 0 0 0 6px;">
                        <h5 style="margin-top:3px;font-weight: 700;"><?php echo $value['notification'];?></h5>
                        <h6>
                            <?php echo $this->check->timeAgo(strtotime($this->Common->gettimeinmyzone(($value['noti_date'])))); ?>
                        </h6>
                    </li>
                </ul>
            </div>         
        </a>
<?php
    
      }}else{
          echo 0;
      }
       
       
   }
   
   
   public function get_new_notification_above(){
       
      $u_id = $this->input->post("u_id");
    

     $sql = "select * from users where u_id='".$u_id."' and notifications > 0"; 
      $noti = $this->db->query($sql)->result_array();
      
      if(count($noti) > 0){
          foreach($noti as $key=>$value){
?>
       <span class="badge h6" id="noti_counter" style="font-size: 10px;background: red;color: white;padding: 2px;margin-left: -15px;"><?php echo $value['notifications'];?></span>
<?php
    
      }}else{
          echo 0;
      }
       
       
   }
   
   public function get_all_msgs(){
       
       $mynewuserid = $this->input->post("u_id");
      
        $sql = "select jobs_msgs.*,users.* from jobs_msgs left 
                  join users on 
                    case 
                    when(recv_id = $mynewuserid) then(users.u_id = send_id)
                    when(send_id = $mynewuserid) then(users.u_id = recv_id)
                    end   
                  where msg_id IN(
                    select MAX(msg_id) from jobs_msgs where send_id='$mynewuserid' OR recv_id='$mynewuserid'
                    group by
                      case
                        when(send_id = $mynewuserid) then(recv_id)
                        when(recv_id = $mynewuserid) then(send_id)
                      end  
                    ) 
                    Union
                    select services_msgs.*,users.* from services_msgs left 
                  join users on 
                    case 
                    when(recv_id = $mynewuserid) then(users.u_id = send_id)
                    when(send_id = $mynewuserid) then(users.u_id = recv_id)
                    end   
                  where msg_id IN(
                    select MAX(msg_id) from services_msgs where send_id='$mynewuserid' OR recv_id='$mynewuserid'
                    group by
                      case
                        when(send_id = $mynewuserid) then(recv_id)
                        when(recv_id = $mynewuserid) then(send_id)
                      end  
                    )
                    order by date desc";
        
        $mymsgs = $this->db->query($sql)->result_array(); 
    
      
        if(!empty($mymsgs)){
            foreach($mymsgs as $key=>$value){
              
                if($value['job_id'] != 0 && $value['job_id'] != null){
                    $job_query = $this->db->query("select * from jobs where job_id='".$value['job_id']."'")->result_array()[0];
                    $job_title = $job_query['job_title'];
                    $job_slug = $job_query['job_slug'];
                    $url_chat = SURL.'Chat/index/'.$value['username'].'/'.$job_slug;
                }else{
                    $job_query = $this->db->query("select * from services where service_id=".$value['service_id'])->result_array()[0];
                    $job_title = $job_query['title'];
                    $job_slug = $job_query['service_slug']; 
                    $url_chat  =SURL.'ChatServices/index/'.$value['username'].'/'.$job_slug.'?id='.$value['service_p_id'];
                }
                                            
?>
                    <a href="<?php echo $url_chat;?>"> 
            <div class="readmsgs">
                <ul style="display: flex;list-style: none;padding: 0;">
                    <li>
                        <img src="<?php echo $value['dp'];?>" class="img-circle" style="width:30px;height:30px;">
                    </li>
                    <li style="padding: 0 0 0 6px;">
                        <h5 style="margin-top:3px;font-weight: 700;"><?php echo $job_title;?></h5>
                        <h6><?php echo $value['content'];?></h6>
                        <h6><?php echo $this->check->timeAgo(strtotime($this->Common->gettimeinmyzone(($value['date'])))); ?></h6>
                    </li>
                </ul>
            </div>         
        </a>
                    <hr>
<?php
    
            }
          
      }else{
?>
                <p class="text-danger text-center">No Record Found.</p>
<?php
      }
       
       
   }
   
   public function get_new_msgs_above(){
       
      $u_id = $this->input->post("u_id");
    

     $sql = "select * from users where u_id='".$u_id."' and msgs > 0"; 
      $noti = $this->db->query($sql)->result_array();
      
      if(count($noti) > 0){
          foreach($noti as $key=>$value){
?>
       <span class="badge h6" id="msgscounter" style="font-size: 10px;background: red;color: white;padding: 2px;margin-left: -15px;"><?php echo $value['msgs'];?></span>
<?php
    
      }}else{
          echo 0;
      }
       
       
   }
   
   public function get_new_service_msgs(){
      $msg_id = intval($this->input->post("msg_id"));
      $recv_id = $this->input->post("recv_id");
      $servicep_id = $this->input->post("servicep_id");
    

        $sql = "select * from jobs_msgs where msg_id > '$msg_id' and send_id='$recv_id' and recv_id='".$this->session->userdata('user')."' and service_p_id='$servicep_id' 
              union
              select * from jobs_msgs where msg_id > '$msg_id' and send_id='".$this->session->userdata('user')."' and recv_id='$recv_id' and service_p_id='$servicep_id' "; 


       $data['convo'] = $this->db->query($sql)->result_array();
       $data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
       
       if(empty($data['convo'])){
           echo "0";
       }else{
           $this->load->view("includes/allmsgthread.php",$data);
       }
       
   }
   


	
}
