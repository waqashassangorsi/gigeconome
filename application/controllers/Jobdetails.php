<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobdetails extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Check');
	}
	
	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}

	public function index($id)
	{   
		$data['job_detail'] = $this->db->query("select * from jobs where job_slug='$id'")->result_array()[0];
		
		
		$this->form_validation->set_rules('content', 'Proposal', 'required');
        
        if($this->form_validation->run() == FALSE){ 
            
            $this->load->view("jobdetails", $data);
            
        }else{
            
            $this->checksession();
    	    
    	    $job_detail = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0];
    	    $recv_id = $job_detail['u_id'];
    	    $job_slug = $job_detail['job_slug'];
    	    
           /* $proposal_left = $this->Common->if_proposal_left($this->session->userdata('user'));
            
    	    if($proposal_left==false){
    	        $this->session->set_flashdata("fail","You dont have proposal credits to send the proposal.");
    	        redirect(SURL.'Jobdetails/index/'.$job_slug);
    	    }else{
    	        $this->db->query("update proposal_credits set used=used+1 where id='".$proposal_left."'");
    	    }*/
    	    
    	    
    	    $deductionfee = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
    	    $deduct = $this->input->post("deposit") * $deductionfee/100;
    	    $earn = $this->input->post("deposit") - $deduct;
    	    
    	    
    	    $array = array(
    	                    "recv_id"=>$recv_id,
    	                    "send_id"=>$this->session->userdata('user'),
    	                    "content"=>$this->input->post("content"),
    	                    "date"=>gmdate("Y-m-d H:i:s"),
    	                    "job_id"=>$this->input->post("job_id"),
    	                    "msg_status"=>"Inbox",
    	                    "custom_status"=>"Proposal",
    	                    "proposal_budget"=>$this->input->post("budget"),
    	                    "proposal_deposit"=>$this->input->post("deposit"), 
    	                    "proposal_description"=>$this->input->post("description"),
    	                    "earn_amt"=>$earn,
    	                  );
    	                  
    	    $query = $this->Common->insert("jobs_msgs",$array);
    	    
    	           
    	    
    	    $proposal_no = $this->session->userdata('user').'-'.time().'-'.$query;
    	    $this->db->query("update jobs_msgs set proposal_no='$proposal_no' where msg_id='$query'");
    	
    	    $this->db->query("update users set notifications=notifications+1 where u_id='$recv_id'");
    	    $notification = "You have received a new proposal on your job.";
    	    $username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
    	    $email = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['email'];
    	    $link = "inbox/viewproposal/".$this->input->post("job_id");
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>date("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$recv_id,
    	                    "noti_sender_id"=>$this->session->userdata('user'),
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	     $data['type'] = "job_proposal";
    	     $data['joblink'] = $link;
             $html = $this->load->view("Job_emails.php",$data,true);;

             $emailsent = $this->Common->send_email($email, 'Project Proposal', $html); 
    	    
    	    if($query){
    	        $this->session->set_flashdata("success","Proposal Sent");
    	    }else{
    	        $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    	    }
    	    
    	    $job_title = $this->db->query("select * from jobs where job_id='".$this->input->post("job_id")."'")->result_array()[0]['job_slug'];
    	    redirect(SURL.'Jobdetails/index/'.$job_title);
        }    
		

	}
	
	
		public function update_noti_status(){
	     $this->checksession();
	     $this->db->query("update notifications set is_read='Yes' where noti_id='".$this->input->post('notiid')."'");

	}
	
	public function remove_noti_count(){
	     $this->checksession();
	     $query = $this->db->query("update users set notifications='0' where u_id='".$this->session->userdata('user')."'");
	     if($query){
	         echo 1;
	     }else{
	         echo 0;
	     }
	}
	
public function remove_msg_count(){
	     $this->checksession();
	     $query = $this->db->query("update users set msgs='0' where u_id='".$this->session->userdata('user')."'");
	     if($query){
	         echo 1;
	     }else{
	         echo 0;
	     }
	}
	
	
	public function cancelproposal($msgid){
	     $this->checksession();
	     $record = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update jobs_msgs set custom_status_extent='3' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Proposal Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	     }
	     
	     $job_slug = $this->db->query("select * from jobs where job_id='".$record['job_id']."'")->result_array()[0]['job_slug'];
	     redirect(SURL.'Jobdetails/index/'.$job_slug);
	}
	
	public function cancelproposalonchat($msgid){
	    //echo $msgid; exit;
	     $this->checksession();
	     $record = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	     //echo "<pre>";var_dump($record); exit;
	     
	     if($record['send_id']==$this->session->userdata("user")){
	         $this->db->query("update jobs_msgs set custom_status_extent='3' where msg_id='$msgid'");
	         $this->session->set_flashdata("success","Proposal Cancelled.");
	     }else{
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	     }
	     
	     $job_detail = $this->db->query("select jobs.*,username from jobs inner join users on users.u_id=jobs.u_id where job_id='".$record['job_id']."'")->result_array()[0];
	     $job_slug = $job_detail['job_slug'];
	     $username = $job_detail['username'];
	     
	     redirect(SURL.'Chat/index/'.$username.'/'.$job_slug);
	}
	
}
