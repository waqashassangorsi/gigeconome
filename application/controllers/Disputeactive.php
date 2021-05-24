<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Disputeactive extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		 $this->load->helper('download');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Disputeactive/";
		 $data['Controller_name'] = "Dispute Active";
		 $data['Newcaption'] = "Dispute Active";
// =============================================fix data ends here====================================================


		 $data['disputes'] =$this->db->query("select * from disputes where is_resolved='no'")->result_array();
		 //echo "<pre>";var_dump($data['disputes']);
		 
		 $this->load->view("Disputeactive",$data);
	}
	
		public function downloadfile(){

        $this->load->helper('download');
        $this->load->library('zip');
        $link = $this->input->post("file2");
        foreach($link as $atta)
        {
           $this->zip->read_file($atta);
        }
        $this->zip->download(''.time().'.zip');
    }
    
    public function resolved($id)
    {
        
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Disputeactive/";
		 $data['Controller_name'] = "Dispute Resolved";
		 $data['method_url'] = "Disputeactive/resolved";
		 $data['method_name'] = "Dispute Resolved";
	
// =============================================fix data ends here====================================================

			$id = intval($id);
			
    		$con['conditions']=array("dsipute_id"=>$id);
    		$userrecord = $this->common->get_single_row("disputes",$con);
    		$data['record'] = $userrecord;
    		
    		if($userrecord->type != "service"){
        		
        		$msg_id=$userrecord->msg_id;
    		    
    		    $service_msg_details = $this->db->query("select jobs_msgs.* from disputes inner join jobs_msgs on disputes.msg_id=jobs_msgs.msg_id where dsipute_id='$id'")->result_array()[0];
    		    if($service_msg_details['custom_status']=="Refund"){
    		        $data['job_escrow_amount'] = $service_msg_details['refund_amt'];
    		    }else if($service_msg_details['custom_status']=="Invoice"){
    		        $data['job_escrow_amount'] = $service_msg_details['invc_amt'];
    		    }
        		
        		
    		}else{
    		    
    		    $service_p_id=$userrecord->service_p_id;
    		    $service_id = $this->db->query("SELECT * FROM `services_purchased` where id=$service_p_id")->result_array()[0]['service_id'];
    		    
    		    $service_msg_details = $this->db->query("select services_msgs.* from disputes inner join services_msgs on disputes.msg_id=services_msgs.msg_id where dsipute_id='$id'")->result_array()[0];
    		    if($service_msg_details['custom_status']=="Refund"){
    		        $data['job_escrow_amount'] = $service_msg_details['refund_amt'];
    		    }else if($service_msg_details['custom_status']=="Invoice"){
    		        $data['job_escrow_amount'] = $service_msg_details['invc_amt'];
    		    }
    		    
    		    
    		    
    		}
		
	   //   $jobdata=$this->db->query("select * from jobs where job_id='$job_id'")->result_array()[0];
                 
		$this->load->view("Disputeresolved",$data);
        
    }


    public function status()
    {
        //echo "<pre>";var_dump($this->input->post());exit;
        
        $type_data=$this->input->post('type_data');
        $amount = $this->input->post('amount');
        $userid = $this->input->post('userid');
        $disputeid = $this->input->post("disputeid");
        $recordid1 = $this->input->post("recordid2");
        
        $this->db->trans_start();
        
        if($type_data=="service")
        {
            $recordid1=$this->input->post('recordid1');
            
            $con['conditions']=array("dsipute_id"=>$disputeid);
        	$array = array(
        	                "is_resolved"=>"yes",
        	                "winner_id"=>$userid,
        	             );
        	             
        	$query=$this->Common->update("disputes",$array,$con);
        	
        	$data['service_p_id'] =   $recordid1;
        	$data['total_money'] = $amount;
        	$data['u_id'] = $userid;
        	$data['type'] = "service";
        	
        	
        	//$this->db->query("delete from transactions where u_id='0' and service_p_id='$recordid1' and in_escrow='Yes' and is_clear='No'");
        	
        	$array = array(
                        "u_id"=>"0", 
                        "camount"=>$amount,
                        "damount"=>"0",
                        "totalamt"=>$amount,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"Yes",
                        "is_clear"=>"No",
                        "service_p_id"=>$recordid1, 
                      );
                      
            $this->Common->insert("transactions",$array);
            
            
        	$array = array(
                        "u_id"=>$userid, 
                        "camount"=>"0",
                        "damount"=>$amount,
                        "totalamt"=>$amount,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "service_p_id"=>$recordid1, 
                      );
                      
            $this->Common->insert("transactions",$array);
            
            
            
            $winneruser_record = $this->db->query("select * from users where u_id='$userid'")->result_array()[0];
            $service_msgs_details = $this->db->query("select services_msgs.* from disputes inner join services_msgs on services_msgs.msg_id=disputes.msg_id where dsipute_id='$disputeid'")->result_array()[0];
            $notification = "Amount has been deposited to ".$winneruser_record['f_name']." ".$winneruser_record['l_name']; 
            $servicelink = $this->db->query("select * from services where service_id='".$service_msgs_details['service_id']."'")->result_array()[0]['service_slug'];
            
            if($service_msgs_details['send_id']==$winneruser_record['u_id']){
                
                $otheruser = $service_msgs_details['recv_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."ChatServices/index/$username/$servicelink?id=".$service_msgs_details['service_p_id'];
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['send_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                          
                $this->Common->insert("notifications",$array);
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['send_id']."'");
                
                
                $otheruser = $service_msgs_details['send_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."ChatServices/index/$username/$servicelink?id=".$service_msgs_details['service_p_id'];
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['recv_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['recv_id']."'");          
                $this->Common->insert("notifications",$array);
                
            
            }else{
                
                $otheruser = $service_msgs_details['send_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."ChatServices/index/$username/$servicelink?id=".$service_msgs_details['service_p_id'];
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['recv_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                          
                $this->Common->insert("notifications",$array);
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['recv_id']."'");
                
                
                $otheruser = $service_msgs_details['recv_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."ChatServices/index/$username/$servicelink?id=".$service_msgs_details['service_p_id'];
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['send_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['send_id']."'");          
                $this->Common->insert("notifications",$array);
                
            }
            
            
            
             
        }else{
            
            $recordid1=$this->input->post('recordid2');
            
            $con['conditions']=array("dsipute_id"=>$disputeid);
        	$array = array(
        	                "is_resolved"=>"yes",
        	                "winner_id"=>$userid,
        	             );
        	             
        	$query=$this->Common->update("disputes",$array,$con);
        	
            $array = array(
                        "u_id"=>"0", 
                        "camount"=>$amount,
                        "damount"=>"0",
                        "totalamt"=>$amount,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"Yes",
                        "is_clear"=>"No",
                        "job_id"=>$recordid1, 
                      );
                      
            $this->Common->insert("transactions",$array);
            
            
        	$array = array(
                        "u_id"=>$userid, 
                        "camount"=>"0",
                        "damount"=>$amount,
                        "totalamt"=>$amount,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "job_id"=>$recordid1, 
                      );
                      
            $this->Common->insert("transactions",$array);
            
            
            
            $winneruser_record = $this->db->query("select * from users where u_id='$userid'")->result_array()[0];
            $notification = "Amount has been deposited to ".$winneruser_record['f_name']." ".$winneruser_record['l_name']; 
            
            $service_msgs_details = $this->db->query("select jobs_msgs.* from disputes inner join jobs_msgs on jobs_msgs.msg_id=disputes.msg_id where dsipute_id='$disputeid'")->result_array()[0];
            
            
            $servicelink = $this->db->query("select * from jobs where job_id='".$service_msgs_details['job_id']."'")->result_array()[0]['job_slug'];
            
            if($service_msgs_details['send_id']==$winneruser_record['u_id']){
                
                $otheruser = $service_msgs_details['recv_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."Chat/index/$username/$servicelink";
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['send_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                          
                $this->Common->insert("notifications",$array);
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['send_id']."'");
                
                
                $otheruser = $service_msgs_details['send_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."Chat/index/$username/$servicelink";
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['recv_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['recv_id']."'");          
                $this->Common->insert("notifications",$array);
                
            
            }else{
                
                $otheruser = $service_msgs_details['send_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."Chat/index/$username/$servicelink";
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['recv_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                          
                $this->Common->insert("notifications",$array);
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['recv_id']."'");
                
                
                $otheruser = $service_msgs_details['recv_id'];
                $otheruser_record = $this->db->query("select * from users where u_id='$otheruser'")->result_array()[0];
                $username = $otheruser_record['username'];
                
                $link = SURL."Chat/index/$username/$servicelink";
                $array = array(
                            "notification"=>$notification, 
                            "noti_date"=>gmdate("Y-m-d H:i:s"),
                            "noti_recvr_id"=>$service_msgs_details['send_id'],
                            "noti_sender_id"=>"0",
                            "is_read"=>"No",
                            "link"=>$link, 
                          );
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$service_msgs_details['send_id']."'");          
                $this->Common->insert("notifications",$array);
                
            }
             
         }
         
         $this->db->trans_complete();
        
        if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata("fail","Something went wrong.");
		}else{
		    
		    $this->session->set_flashdata("success","The issue has resolved.");
            
		} 
     
        redirect(SURL.'Disputeactive');
     
    }

}
?>