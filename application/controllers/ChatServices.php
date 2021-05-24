<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatServices extends CI_Controller {

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
            if($this->session->userdata('AdminLoggedIn') && $this->uri->segment("2") == 'viewChat'){
                
            }else{
                $this->session->set_flashdata('fail','Your session expired. Please Login again.');
    			redirect(SURL);
            }
            
// 			if($this->uri->segment("2") != 'viewChat'){
//     			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
//     			redirect(SURL);
//             }

		}

	}

	public function index($username)
	{   
		//echo "Hello! ".$username;
		
		$data['otherparyr'] = $this->db->query("select * from users where username='$username'")->result_array()[0];
        $otherparyr = $data['otherparyr']['u_id'];
        
	    $service_slug = $this->uri->segment("4");
	    $us=$this->session->userdata('user');
	    
	    $noti_id = $_GET['notiid'];
	    $this->db->query("update notifications set is_read='Yes' where noti_id='$noti_id'");
	    
	    $service_p_id = $_GET['id'];
	    
	    $data['service_detail'] = $this->db->query("select services_purchased.*,services.* from services join services_purchased on services_purchased.service_id = services.service_id AND services_purchased.status='Ongoing' AND ( services_purchased.who_purchased = $otherparyr OR services_purchased.who_purchased = $us) where services_purchased.id ='$service_p_id'")->result_array()[0];
	    if(empty($data['service_detail'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }
	    
	    //echo "<pre>";var_dump($data['service_detail']);
	    
	    $service_id = $data['service_detail']['service_id'];
	    $data['view_chat_admin'] = false;
	    $data['escrowamt'] = $this->Common->service_escrow_amt($data['service_detail']['id']);
	    
	    
        
	   // $convo_query = "select services_msgs.* from services_msgs where (send_id='".$this->session->userdata('user')."' and 
    //               recv_id='$otherparyr' and service_id='$service_id' and service_p_id='$service_p_id') or (recv_id='".$this->session->userdata('user')."' 
    //               and send_id='$otherparyr' and service_id='$service_id' and service_p_id='$service_p_id') order by msg_id asc";
                  
        $convo_query = "select * from services_msgs where service_p_id='$service_p_id' order by msg_id asc";          
				 
        $data['convo'] = $this->db->query($convo_query)->result_array();
       
		
		$this->load->view("ChatServices", $data);
	}
	
	public function Chatinbox($username)
	{   
		//echo "Hello! ".$username;
		
		$data['otherparyr'] = $this->db->query("select * from users where username='$username'")->result_array()[0];
        $otherparyr = $data['otherparyr']['u_id'];
        
	    $service_slug = $this->uri->segment("4");
	    $us=$this->session->userdata('user');
	    
	    $noti_id = $_GET['notiid'];
	    $this->db->query("update notifications set is_read='Yes' where noti_id='$noti_id'");
	    
	    $service_p_id = $_GET['id'];
	    
	    $data['service_detail'] = $this->db->query("select services.* from services where service_slug ='$service_slug'")->result_array()[0];
	    if(empty($data['service_detail'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }
	    
	    //echo "<pre>";var_dump($data['service_detail']);
	    
	    $service_id = $data['service_detail']['service_id'];
	    $data['view_chat_admin'] = false;
	    //$data['escrowamt'] = $this->Common->service_escrow_amt($data['service_detail']['id']);
	    
	    
        
	   // $convo_query = "select services_msgs.* from services_msgs where (send_id='".$this->session->userdata('user')."' and 
    //               recv_id='$otherparyr' and service_id='$service_id' and service_p_id='$service_p_id') or (recv_id='".$this->session->userdata('user')."' 
    //               and send_id='$otherparyr' and service_id='$service_id' and service_p_id='$service_p_id') order by msg_id asc";
                  
        $convo_query = "select * from services_msgs where service_id='$service_id' and msg_status='Inbox' and (recv_id='$otherparyr' and send_id='$us' or recv_id='$us' and send_id='$otherparyr') order by msg_id asc";          
				 
        $data['convo'] = $this->db->query($convo_query)->result_array();
       
		
		$this->load->view("ChatServices", $data);
	}
	
	public function viewChat($whoaraised,$serviceId,$disputeid,$otherparyr)
	{   
	  
        $service_slug = $serviceId;
	    $us=$id;
	    $data['myuser'] = $this->db->query("select * from users where u_id='$whoaraised'")->result_array()[0];
        $service_p_id = $_GET['id'];
	    
	    $data['service_detail'] = $this->db->query("select services_purchased.*,services.* from services join services_purchased on services_purchased.service_id = services.service_id AND services_purchased.status='Ongoing' AND ( services_purchased.who_purchased = $otherparyr OR services_purchased.who_purchased = $whoaraised) where services_purchased.id ='$service_p_id'")->result_array()[0];
	    
	    if(empty($data['service_detail'])){ 
	        $this->session->set_flashdata("fail","No Record Found.");
	        redirect(SURL);
	    }
	    
	    //echo "<pre>";var_dump($data['service_detail']);
	    
	    $service_id = $data['service_detail']['service_id'];
	    
	    $data['escrowamt'] = $this->Common->service_escrow_amt($data['service_detail']['id']);
	    
	    $data['view_chat_admin'] = true;
        
	    $convo_query = "select services_msgs.* from services_msgs where service_p_id='$service_p_id' order by msg_id asc";
    
        //$convo_query = "select services_msgs.* from services_msgs where service_p_id='$service_p_id' order by date asc";
				 
        $data['convo'] = $this->db->query($convo_query)->result_array(); 
        //var_dump($data['convo']);
        
        // if(empty($data['convo'])){ 
	        // $this->session->set_flashdata("fail","No Record Found.");
	        // redirect(SURL);
	    // }
        
		
		$this->load->view("ChatServices", $data);
		
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
	    $job_detail = $this->db->query("select * from services where service_id='".$this->input->post("jobid")."'")->result_array()[0];
	    
	   //echo "<pre>";var_dump($job_detail); 
	   //exit;
	    
	    if(!empty($this->input->post("jobid")) && $this->input->post("rating") > 0){
	        $array = array(
	                        "u_id"=>$this->input->post("u_id"),
	                        "service_id"=>$this->input->post("jobid"),
	                        "stars"=>$this->input->post("rating"),
	                        "comment"=>$this->input->post("comment_user"),
	                        "service_purchase_id"=>$this->input->post("service_p_id"),
	                        "date"=>gmdate("Y-m-d H:i:s"),
	                        "is_reply"=>"No",
	                        "who_rated"=>$this->session->userdata("user"),
	                        "msg_id"=>$this->input->post("msg_id"),
	                      );
	                      
	        $qyery = $this->Common->insert("service_rating",$array);   
	        
	        if($this->input->post("status")=="Buyer"){
	            $this->db->query("update services_msgs set is_buyer_rated='Yes' where msg_id='".$this->input->post("msg_id")."'");
	        }else{
	            $this->db->query("update services_msgs set is_freelancer_rated='Yes' where msg_id='".$this->input->post("msg_id")."'");
	        }
	        
	        
	        if($qyery){
	            $this->session->set_flashdata("success","Thank you, you rated Client successfully");
	        }else{
	            $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	        }
	        
	        
	        
	        
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	    }
	    
	    redirect(SURL."ChatServices/index/".$username."/".$job_detail['service_slug']."?id=".$this->input->post("service_p_id"));
	}
	
	public function replyrating(){
	    
	    //echo "<br>";var_dump($this->input->post()); exit;
	    
	    $username = $this->db->query("select * from users where u_id='".$this->input->post("u_id")."'")->result_array()[0]['username'];
	    $service_detail = $this->db->query("select * from services where service_id='".$this->input->post("jobid")."'")->result_array()[0];
	    
	    if(!empty($this->input->post("jobid")) && $this->input->post("rating") > 0){
	        
	        $array = array(
	                        "u_id"=>$this->input->post("u_id"),
	                        "service_id"=>$this->input->post("jobid"),
	                        "stars"=>$this->input->post("rating"),
	                        "comment"=>$this->input->post("send_feed"),
	                        "service_purchase_id"=>$this->input->post("service_p_id"),
	                        "date"=>gmdate("Y-m-d H:i:s"),
	                        "is_reply"=>"Yes",
	                        "who_rated"=>$this->session->userdata("user"),
	                        "msg_id"=>$this->input->post("msg_id"),
	                        "reply_of"=>$this->input->post("reply_of"),
	                      );
	                      
	        $qyery = $this->Common->insert("service_rating",$array);   

	        if($qyery){
	            $this->session->set_flashdata("success","Thank you, you replied successfully");
	        }else{
	            $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	        }
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong. Please try again later.");
	    }
	    
	    redirect(SURL."ChatServices/index/".$username."/".$service_detail['service_slug']."?id=".$this->input->post("service_p_id"));
	}
	
	public function givetip(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    if(!empty($this->input->post("msg_id")) && !empty($this->input->post("u_id")) && ($this->input->post("money")>0)){
	         redirect(SURL.'PaymentSummary/givetip_for_service/'.$this->input->post("username")."/".$this->input->post("money")."/".$this->input->post("msg_id"));
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
	    
	    $query = $this->db->query("update jobs_msgs set custom_status_extent='2' where msg_id='$msgid'");
	    if($query){
	        $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
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
	
	public function reject_services_invoice($msgid){
	    
	    $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where services_msgs.msg_id='$msgid'")->result_array()[0];
	    if($msg_details['custom_status_extent']!='4'){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	    }
    	     
	    $query = $this->db->query("update services_msgs set custom_status_extent='6' where msg_id='$msgid'");
	    if($query){
	        
	        $sender_id = $msg_details['send_id'];
	        $service_slug = $msg_details['service_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        $client = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has rejected your Service invoice.";
    	    
    	    $link = "ChatServices/index/".$client['username']."/".$service_slug."?id=".$msg_details['service_p_id'];
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$sender_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    if($query){
    	        
    	   //     $email = $this->db->query("select email from users where u_id=".$recv_id)->result_array()[0]['email'];
        //         $data['email'] = $email;
        //         $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
        //         $data['type'] = "inovice_rejected_service";
        // 		$html = $this->load->view("Job_emails.php",$data,true);
        //         $emailsent = $this->Common->send_email($email,'Surf n Work', $html);
    	        
    	        $this->session->set_flashdata("success","Invoice rejected.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'ChatServices/index/'.$username.'/'.$service_slug."?id=".$msg_details['service_p_id']);
	}
	
	public function acept_proposal($msgid){
	    
	    $query = $this->db->query("update jobs_msgs set custom_status_extent='1' where msg_id='$msgid'");
	    if($query){
	        $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='$msgid'")->result_array()[0];
	        $sender_id = $msg_details['send_id'];
	        $job_slug = $msg_details['job_slug'];
	        
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
	    //&& !empty($this->input->post("new_message"))
	    
	    if(($this->input->post("msg_statuss")>=0) && !empty($this->input->post("recv_id")) && !empty($this->input->post("service_id")) && !empty($this->input->post("service_p_id")) ){
	        
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
	    
	    if(empty($this->input->post("service_id")) || empty($this->input->post("reason_extention"))){
	        echo 1; exit;
	    }
	    
	    $extension_exist = $this->db->query("select * from services_msgs where service_id='".$this->input->post("service_id")."' and custom_status='Time-Extension' and custom_status_extent='16'");
        if($extension_exist->num_rows() > 0){
            echo 7;
            //Extension aleady sent.
            exit;
        }
        
        $job_detail = $this->db->query("select * from services where service_id='".$this->input->post("service_id")."'")->result_array()[0];
        $recv_id = $this->input->post('recv_id');
    	$job_slug = $job_detail['service_slug'];
    	$todaydate = gmdate("Y-m-d");
 
        
        $escrowamt = $this->Common->service_escrow_amt($this->input->post("service_id"));
        
        if($escrowamt > 0){
            
        }else{
            echo 6;
            exit;
        }
        
    	$array = array(
                        "recv_id"=>$recv_id,
                        "send_id"=>$this->session->userdata('user'),
                        "content"=>$this->input->post("new_message"),
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "service_id"=>$this->input->post("service_id"),
                        "msg_status"=>"Service",
                        "custom_status"=>"Time-Extension", 
                        "custom_status_extent"=>"16",
                        "time_extension_rsn"=>$this->input->post("reason_extention"),
						"extension_days"=>$this->input->post('days')
                      );
                      
        $query = $this->Common->insert("services_msgs",$array);
        
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
		
		// $this->db->query("update jobs set no_of_penalty_day=no_of_penalty_day + ".$this->input->post('days')." where job_id=".$this->input->post("job_id")."");
    	
    	$notification = "You have received a request to extend ".$this->input->post('days')." day time for the Service.";
    	$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    
    	$link = "ChatServices/index/".$username."/".$job_slug;
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
			
			
			$data['convo'] = $this->db->query("select * from services_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthreadforservices.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	
	public function accepttime($msgid){
	    
	    $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        $query = $this->db->query("update services_msgs set custom_status_extent='17' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['service_slug'];
	        $jobid = $msg_details['service_id'];
	        $days = $msg_details['extension_days'];
			//print "update jobs set extended_pt_days=extended_pt_days + $days  where job_id=$jobid";exit;
			
	       // $this->db->query("update services_msgs set custom_status_extent=17  where service_id=$jobid");
			
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$sender_id."'")->result_array()[0];
    	    $notification = "Hey! ".$client['f_name']." ".$client['l_name']." Congratulations! Client has accepted your time extension.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "ChatServices/index/".$username."/".$job_slug;
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
	        redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug);
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    redirect(SURL.'Home/');
	}
	
	public function rejecttime($msgid){
	    
	    $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        $query = $this->db->query("update services_msgs set custom_status_extent='18' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['service_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$sender_id."'")->result_array()[0];
    	    $notification = "Hey! ".$client['f_name']." ".$client['l_name']." Unfortunately client didnt agree to your time extension request..";
    	    
    	    //$notification = "User has rejected your refund request.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "ChatServices/index/".$username."/".$job_slug;
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
	    redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug);
	}
	
	public function canceltime($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from services_msgs where msg_id='$msgid'")->result_array()[0];
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update services_msgs set custom_status_extent='19' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Time Extension request Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['service_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug);
	}
	
	public function refundjob(){
	    
	    if(empty($this->input->post("new_message")) || empty($this->input->post("service_id")) || empty($this->input->post("description_refund"))){
	        echo 1; exit;
	    }
	    
	    $job_detail = $this->db->query("select services.*,services_purchased.* from services_purchased inner join services on services_purchased.service_id = services.service_id where services_purchased.id='".$this->input->post("service_p_id")."'")->result_array()[0];
        $recv_id = $job_detail['service_owner_id'];
    	$job_slug = $job_detail['service_slug'];
    	$todaydate = date("Y-m-d");
    	
        $record_exist = $this->db->query("select * from services_msgs where service_p_id='".$this->input->post("service_p_id")."' and custom_status='Refund' and custom_status_extent='12'");
        if($record_exist->num_rows() > 0){
            echo 9;
            //refund aleady sent.
            exit;
        }
	    
        
        $escrowamt = $this->Common->service_escrow_amt($this->input->post("service_p_id"));
        
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
                        "service_id"=>$this->input->post("service_id"),
                        "service_p_id"=>$this->input->post("service_p_id"),
                        "msg_status"=>"Service",
                        "custom_status"=>"Refund", 
                        "custom_status_extent"=>"12",
                        "proposal_description"=>$this->input->post("description_refund"),
                        "refund_amt"=>$this->input->post("amount_refund"),
                      );
                      
        $query = $this->Common->insert("services_msgs",$array);
        
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	
    	$notification = "You have received a request to refund the amount for the Services.";
    	$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    
    	$link = "ChatServices/index/".$username."/".$job_slug."?id=".$this->input->post("service_p_id");
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
					                 
						$this->Common->insert("service_msgs_files",$array); 
					}
					
				}
				
			}
			
			
			$email = $this->db->query("select email from users where u_id=".$recv_id)->result_array()[0]['email'];
            $data['email'] = $email;
            $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
            $data['type'] = "send_refund_service";
    		$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
			
			$data['convo'] = $this->db->query("select * from services_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthreadforservices.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function simplesndmsgjob(){
	    $chkmsg = $this->db->query("select * from services_purchased where service_id='".$this->input->post("service_id")."' AND status = 'Ongoing'")->result_array();
		
	    if(empty($chkmsg)){
	        echo 1; exit;
	        //Something went wrong. Please try again later
	    }else{
	        // if($chkmsg[0]['u_id']==$this->session->userdata('user')){
	            
	        // }else{
	            // $clientmsg = $this->db->query("select * from services_msgs where send_id='".$chkmsg[0]['u_id']."'");
	 
	            // if($clientmsg->num_rows() > 0){
	                 
	            // }else{
	                 // echo "WHy"; exit;
	                 // Something went wrong. Please try again later
	            // }
	        // }
	    }
	    

	    $array = array(
	                    "recv_id"=>$this->input->post("recv_id"),
	                    "send_id"=>$this->session->userdata('user'),
	                    "content"=>$this->input->post("new_message"),
	                    "date"=>gmdate("Y-m-d H:i:s"),
	                    "service_id"=>$this->input->post("service_id"),
	                    "service_p_id"=>$this->input->post("service_p_id"),
	                    "msg_status"=>'Service',
	                  );
	   $insert = $this->Common->insert("services_msgs",$array);    
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
					                 
						$this->Common->insert("service_msgs_files",$array); 
					}
					
				}
				
			}
			
			$this->db->query("update users set msgs=msgs+1 where u_id='".$this->input->post("recv_id")."'");
			
			$data['convo'] = $this->db->query("select * from services_msgs where msg_id='$insert'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthreadforservices.php",$data);
			
	   }else{
	       echo 1;
	   }
	   
	}
	
	public function sendproposaljob(){
	  
        $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
        $recv_id = $job_detail['u_id'];
    	$job_slug = $job_detail['job_slug'];
    	$todaydate = date("Y-m-d");
    	
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
    	    
    	$link = "Chat/index/".$username."/".$job_slug."?id=".$this->input->post("service_p_id");
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
					                 
						$this->Common->insert("service_msgs_files",$array); 
					}
					
				}
				
			}
			
			$this->db->query("update users set msgs=msgs+1 where u_id='".$this->input->post("recv_id")."'");
			
			$data['convo'] = $this->db->query("select * from jobs_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthreadforservices.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function depositforjob(){
	    
        $job_detail = $this->db->query("select services.*,services_purchased.* from services_purchased inner join services on services_purchased.service_id = services.service_id where services_purchased.id='".$this->input->post("service_p_id")."'")->result_array()[0];
        $recv_id = $job_detail['who_purchased'];
    	$job_slug = $job_detail['service_slug'];
    	$todaydate = date("Y-m-d");
    	
        if($recv_id==$this->session->userdata('user')){
            echo 3;
            //Buyer cant send the proposal to his own job.
            exit;
        }
        
        $record_exist = $this->db->query("select * from services_msgs where service_p_id='".$this->input->post("service_p_id")."' and custom_status='Deposit' and custom_status_extent='8'");
        if($record_exist->num_rows() > 0){
            echo 8;
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
                        "service_id"=>$this->input->post("service_id"),
                        "service_p_id"=>$this->input->post("service_p_id"),
                        "msg_status"=>"Service",
                        "custom_status"=>"Deposit",
                        "custom_status_extent"=>"8",
                        "deposit_amt"=>$this->input->post("amount_deposit"),
                        "proposal_description"=>$this->input->post("description_deposit"),
                        "earn_amt"=>$earn,
                      );
                      
        $query = $this->Common->insert("services_msgs",$array);
        
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	$notification = "You have received a deposit request on your service.";
    	$username_query = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	$username = $username_query['username'];
    	
    	$link = "ChatServices/index/".$username."/".$job_slug."?id=".$this->input->post("service_p_id");
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
					                 
						$this->Common->insert("service_msgs_files",$array); 
					}
					
				}
				
			}
			
			$this->db->query("update users set msgs=msgs+1 where u_id='".$this->input->post("recv_id")."'");
			
			$data['convo'] = $this->db->query("select * from services_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			
			$email = $this->db->query("select email from users where u_id=".$recv_id)->result_array()[0]['email'];
            $data['email'] = $email;
            $data['username'] = ucfirst($username_query['f_name'])." ".$username_query['l_name'];
            $data['type'] = "deposite_amount_service";
    		$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
			
			$this->load->view("includes/allmsgthreadforservices.php",$data);
	   }else{
	       echo 1;
	   }
	   
	   
	}
	
	public function cancelinvoice($msgid){
	    
	     $this->checksession();
	     $record = $this->db->query("select * from services_msgs where msg_id='$msgid'")->result_array()[0];
	     if($record['custom_status_extent']!='4'){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	     }
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update services_msgs set custom_status_extent='7' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Invoice Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['service_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug."?id=".$msg_details['service_p_id']);
	}
	
	public function cancelrefund($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from services_msgs where msg_id='$msgid'")->result_array()[0];
	     if($record['custom_status_extent']!='12'){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	     }
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update services_msgs set custom_status_extent='15' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Refund request Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['service_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug."?id=".$msg_details['service_p_id']);
	}
	
	public function canceldeposit($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from services_msgs where msg_id='$msgid'")->result_array()[0];
	     if($record['custom_status_extent'] !='8'){
	         
	         $this->session->set_flashdata("success","Something went wrong.");
	         redirect(SURL);
	     }
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update services_msgs set custom_status_extent='10' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Deposit request Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
         $sender_id = $msg_details['recv_id'];
         $job_slug = $msg_details['service_slug'];
	   //  echo "<pre>";var_dump($msg_details);
	   //  exit;
	     $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	     redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug.'?id='.$msg_details['service_p_id']);
	}
	
	public function rejectdeposit($msgid){
	    
	    $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        if($msg_details['custom_status_extent'] !='8'){
	         
    	         $this->session->set_flashdata("success","Something went wrong.");
    	         redirect(SURL);
    	    }
	     
	        $query = $this->db->query("update services_msgs set custom_status_extent='9' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['service_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $client = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has rejected your deposit request.";
    	    
    	    $username_query = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "ChatServices/index/".$username."/".$job_slug;
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
                $data['username'] = ucfirst($username_query['f_name'])." ".$username_query['l_name'];
                $data['type'] = "deposite_rejected_service";
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
	    redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug.'?id='.$msg_details['service_p_id']);
	}
	
	public function rejectrefund($msgid){
	    
	    $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
	    
	    if($msg_details){
	        
	        $query = $this->db->query("update services_msgs set custom_status_extent='14' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['service_slug'];
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$msg_details['recv_id']."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has rejected your refund request.";
    	    
    	    //$notification = "User has rejected your refund request.";
    	    
    	    $username = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0]['username'];
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
    	    
    	    $link = "ChatServices/index/".$username."/".$job_slug;
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
                $data['type'] = "reject_refund_service";
        		$html = $this->load->view("Job_emails.php",$data,true);
                $emailsent = $this->Common->send_email($email,'GigEconome', $html);
    	        
    	        $this->session->set_flashdata("success","Refund request rejected.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug."?id=".$msg_details['service_p_id']);
	}
	
	public function acceptrefund($msgid){
	    
	    $msg_details = $this->db->query("select services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id where msg_id='$msgid'")->result_array()[0];
	    if($msg_details['custom_status_extent']!='12'){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	     }
	     
	    if($msg_details){
	        
	        $query = $this->db->query("update services_msgs set custom_status_extent='13' where msg_id='$msgid'");
	        $sender_id = $msg_details['send_id'];
	        $recv_id = $msg_details['recv_id'];
	        $job_slug = $msg_details['service_slug'];
	        $jobid = $msg_details['service_id'];
	        $service_p_id = $msg_details['service_p_id'];
	        $refund_amt = $msg_details['refund_amt'];
	        
	        $escrow_amt = $this->Common->service_escrow_amt($service_p_id);
	        if($escrow_amt >= $refund_amt){
	            //$this->db->query("delete from transactions where service_p_id='$service_p_id' and u_id='0' and in_escrow='Yes'");
	            
	            $array = array(
	                            "u_id"=>"0",
	                            "damount"=>"0",
	                            "camount"=>$refund_amt,
	                            "totalamt"=>$refund_amt,
	                            "service_id"=>$jobid,
	                            "service_p_id"=>$service_p_id,
	                            "in_escrow"=>"Yes",
	                            "is_clear"=>"No", 
	                            "trans_type"=>"amt_refunded",
	                            "date"=>gmdate("Y-m-d H:i:s"),
	                          ); 
	            $query = $this->Common->insert("transactions",$array);
	            
	            $array = array(
	                            "u_id"=>$sender_id,
	                            "damount"=>$refund_amt,
	                            "camount"=>"0",
	                            "totalamt"=>$refund_amt,
	                            "service_id"=>$jobid,
	                            "service_p_id"=>$service_p_id,
	                            "in_escrow"=>"No",
	                            "is_clear"=>"Yes", 
	                            "trans_type"=>"amt_refunded",
	                            "date"=>gmdate("Y-m-d H:i:s"),
	                          ); 
	            $query = $this->Common->insert("transactions",$array);
	            
	        }else{
	            $this->session->set_flashdata("fail","You dont have any amount in escrow to refund.");
	            $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	            redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug."?id=".$msg_details['service_p_id']);
	        }
	        
	        $this->db->query("update users set notifications=notifications+1 where u_id='$sender_id'");
	        
	        $client = $this->db->query("select * from users where u_id='".$msg_details['recv_id']."'")->result_array()[0];
    	    $notification = $client['f_name']." ".$client['l_name']." has accepted your refund request.";
    	    
    	    $username_query = $this->db->query("select * from users where u_id='$recv_id'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "ChatServices/index/".$username."/".$job_slug."?id=".$msg_details['service_p_id'];
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
                $data['type'] = "accept_refund_service";
        		$html = $this->load->view("Job_emails.php",$data,true);
                $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
    	        
    	        $this->session->set_flashdata("success","Refund request accepted.");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
	    }else{
	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	    }
	    
	    $username = $this->db->query("select * from users where u_id='$sender_id'")->result_array()[0]['username'];
	    redirect(SURL.'ChatServices/index/'.$username.'/'.$job_slug."?id=".$msg_details['service_p_id']);
	}
	
	public function sendinvoicejob(){
	    
	    $job_detail = $this->db->query("select services.*,services_purchased.* from services_purchased inner join services on services_purchased.service_id = services.service_id where services_purchased.id='".$this->input->post("service_p_id")."'")->result_array()[0];
        $recv_id = $job_detail['who_purchased'];
    	$job_slug = $job_detail['service_slug'];
    	$todaydate = date("Y-m-d");
    	
        if($recv_id==$this->session->userdata('user')){
            echo 4;
            //Buyer cant send the invoice.
            exit;
        }
        
         $invoice_exist = $this->db->query("select * from services_msgs where custom_status='Invoice' and custom_status_extent='4' and service_p_id =".$this->input->post('service_p_id')."");
        if($invoice_exist->num_rows() > 0){
            echo 5;
            //invoice aleady sent.
            exit;
        }
        
    	
    	$array = array(
                        "recv_id"=>$recv_id,
                        "send_id"=>$this->session->userdata('user'),
                        "content"=>$this->input->post("new_message"),
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "service_id"=>$this->input->post("service_id"),
                        "service_p_id"=>$this->input->post("service_p_id"),
                        "msg_status"=>"Service",
                        "custom_status"=>"Invoice",
                        "custom_status_extent"=>"4",
                        "invc_amt"=>$this->input->post("total_inv_amt"),
                        "invc_description"=>$this->input->post("description_invoice"), 
                      );
                      
                    
                      
        $query = $this->Common->insert("services_msgs",$array);
        
    	$invoice_id = 'Service-'.$this->session->userdata('user').'-'.time().'-'.$query;
    	$this->db->query("update services_msgs set invoice_id='$invoice_id' where msg_id='$query'");
    	
    	$this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	
    	$notification = "You have received a new Invoice on your Purchased Service.";
    	
    	$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    
    	$link = "ChatServices/index/".$username."/".$job_slug."?id=".$this->input->post("service_p_id");
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$recv_id,
	                    "noti_sender_id"=>$this->session->userdata('user'),
	                    "link"=>$link
	                  );
	                  
	    $query_notification = $this->Common->insert("notifications",$array);
    	 
    	 $email=$this->db->query("select * from users where u_id=".$recv_id)->result_array()[0]['email'];
    	 $data['type']="purchasedservices";   
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
					                 
						$this->Common->insert("service_msgs_files",$array); 
					}
					
				}
				
			}
			
		    	
			
			$data['convo'] = $this->db->query("select * from services_msgs where msg_id='$query'")->result_array();
			$data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
			
			$this->load->view("includes/allmsgthreadforservices.php",$data);
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
					                 
						$this->Common->insert("service_msgs_files",$array); 
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
      $service_id = $this->input->post("service_id"); 
      $service_p_id = $this->input->post("service_p_id");
    

         $sql = "select * from services_msgs where msg_id > '$msg_id' and send_id='$recv_id' and recv_id='".$this->session->userdata('user')."' and service_p_id='$service_p_id' 
              union
              select * from services_msgs where msg_id > '$msg_id' and send_id='".$this->session->userdata('user')."' and recv_id='$recv_id' and service_p_id='$service_p_id' "; 


       $data['convo'] = $this->db->query($sql)->result_array();
       $data['myuser'] = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
       
       if(empty($data['convo'])){
           echo "0";
       }else{
           $this->load->view("includes/allmsgthreadforservices.php",$data);
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
