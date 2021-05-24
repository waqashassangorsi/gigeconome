<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Jobsadmin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Jobs/";
		 $data['Controller_name'] = "All Jobs";
		 $data['Newcaption'] = "All Jobs";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
         $data['freelancers'] = $this->db->query("select * from jobs order by job_id desc")->result_array();
         //echo "<pre>";var_dump( $data['freelancers']);

		 $this->load->view("Jobsadmin.php",$data);
	}

	public function approve($id){
		
		$data['user'] = $this->check->Login(); 

		$this->db->trans_start(); //transation starts here

		$con['conditions'] = array("job_id"=>$id);
		$this->common->update("jobs",array("privilidge_status"=>"Approved"),$con);
		
		$result = $this->db->query("select users.* from jobs inner join users on jobs.u_id=users.u_id where job_id='$id'")->result_array()[0];
	
		$name = ucwords($result['f_name']." ".$result['l_name']);
		$email = $result['email'];
        $user_id=$result['u_id']; 
		$html = "<p>Dear $name,</p>
		                        <p>Your job has been approved and published</p>
		                        
		                        <p>Kind Regards</p>
		                        <p>Support Team</p>";

		$emailsent = $this->common->send_email($email, 'Job', $html); 
			 			
			//notification for activity ends here
			
		
    	       $notification = "Congratulations! Your job is approved by Gigeconome.";
    	       $link = SURL."Jobs";
    	       
    	   
    	   $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$user_id,
    	                    "is_read"=>"No",
    	                    "link"=>$link,
    	                 );
    	                 
    	   $this->Common->insert("notifications",$array);
    

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Some error occure. plz try again later');
		}else{
		     $this->db->query("UPDATE users SET notifications=notifications+1 WHERE u_id='$user_id'"); 
			$this->session->set_flashdata('success','Job is approved');
					
			
		}
		redirect("/Jobsadmin/");
	}	


	public function delete($id){
		
		$data['user'] = $this->check->Login(); 

		$this->db->trans_start(); //transation starts here

		$con['conditions'] = array("job_id"=>$id);
		$this->common->update("jobs",array("privilidge_status"=>"Declined"),$con);
		
		$result = $this->db->query("select users.* from jobs inner join users on jobs.u_id=users.u_id where job_id='$id'")->result_array()[0];
	
		$name = ucwords($result['f_name']." ".$result['l_name']);
		$email = $result['email'];
		$user_id = $result['u_id'];

		$html = "<p>Dear $name,</p>
		                        <p>Your job has been rejected by admin and it doesnt follow our terms and conditions</p>
		                        
		                        <p>Kind Regards</p>
		                        <p>Support Team</p>";

		$emailsent = $this->common->send_email($email, 'Job', $html); 
		
		$notification = "Your job has been rejected by Gigeconome.";
    	$link = SURL."Jobs";
    	       
    	   
	   $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$user_id,
	                    "is_read"=>"No",
	                    "link"=>$link,
	                 );
    	                 
    	$this->Common->insert("notifications",$array);

			//notification for activity ends here

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Some error occure. plz try again later');
		}else{
			$this->session->set_flashdata('success','Job is rejected');
					
			
		}
		redirect("/Jobsadmin/");
	}	
	

	

	

}
?>