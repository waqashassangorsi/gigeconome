<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class WithDraws extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "WithDraws/";
		 $data['Controller_name'] = "All WithDrawls";
	
// =============================================fix data ends here====================================================
       

		 $con['conditions'] = array(); 
         $data['withdraws'] = $this->common->get_rows("withdrawal",$con);
         //var_dump($data['categories']);
		 $this->load->view("WithDraws/Category",$data);
	}
	
	public function approve($id){
	    $this->db->query("update withdrawal set status='Approved' where id='$id'");
	    $withdrawlid = $this->db->query("select * from withdrawal where id='$id'")->result_array()[0];
	    
	   $notifications = "Amount has been released to your account.";
	   $link = SURL.'Payment';
	   
	   $arraynew = array(
	                    "notification"=>$notifications,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$withdrawlid['u_id'],
	                    "is_read"=>"No",
	                    "link"=>$link,
	                   );
	                   
	   $query = $this->Common->insert("notifications",$arraynew);
	   
	   if($query){
	       $withdrawaluserid=$withdrawlid['u_id'];
	         $this->db->query("UPDATE users SET notifications=notifications+1 WHERE u_id='$withdrawaluserid'"); 
	        $this->session->set_flashdata('success','Amount transferred');
            redirect(SURL."WithDraws");
	   }else{
	        $this->session->set_flashdata('fail','Try Later.....');
            redirect(SURL."WithDraws");
	   }
	}
	
    public function withdraw_fund(){
        
        $withdraw_amt =  $this->input->post("withdrawal");
        $withdraw_account=$this->input->post("account");
        $userid = $this->session->userdata("user");
        $balance = $this->Common->myblnc($userid);
        
        if(!empty($withdraw_amt) && !empty($withdraw_account)){
           
            
            $array_data =  array(
                                "u_id"=>$userid,
                                'date'=>gmdate('Y-m-d'),
                                'status'=>'Pending',
                                'amount'=>$withdraw_amt,
                                'withdraw_method'=>$withdraw_account
                            );
            
            if($this->common->insert("withdrawal",$array_data)){
                
                $array_data =  array(
                                "u_id"=>$userid,
                                'damount'=>"0",
                                'camount'=>$withdraw_amt,
                                'totalamt'=>$withdraw_amt,
                                'trans_type'=>"withdrawal",
                                'date'=>gmdate("Y-m-d H:i:s"),
                                "in_escrow"=>"No",
                                "is_clear"=>"Yes"
                            );
                
                $this->common->insert("transactions",$array_data);
                
                
                $this->session->set_flashdata('success','Withdraw Requested initiated!');
                  	 //$this->load->view("WithDraws");
                redirect(SURL."Payment");
                
            }else{
                    $this->session->set_flashdata('fail','Try Later.....');
                     redirect(SURL."Payment");
            }
        }else{
            
            $this->session->set_flashdata('fail','Sorry You are sending wrong data.....');
            redirect(SURL."Payment");
            
        }
    
    }
    
    public function reject($id){
        
	    $this->db->query("update withdrawal set status='Not Approved' where id='$id'");
	    $withdrawlid = $this->db->query("select * from withdrawal where id='$id'")->result_array()[0];
	    
	    $array = array(
	                    "u_id"=>$withdrawlid['u_id'],
	                    "damount"=>$withdrawlid['amount'],
	                    "camount"=>"0",
	                    "totalamt"=>$withdrawlid['amount'],
	                    "trans_type"=>"withdrawal",
	                    "date"=>gmdate("Y-m-d H:i:s"),
	                    "in_escrow"=>"No",
	                    "is_clear"=>"Yes",
	                   );
	                   
	   $query = $this->Common->insert("transactions",$array); 
	   
	   $notifications = "Your Request has been rejected Please contact customer support.";
	   $link = SURL.'Payment';
	   
	   $arraynew = array(
	                    "notification"=>$notifications,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$withdrawlid['u_id'],
	                    "is_read"=>"No",
	                    "link"=>$link,
	                   );
	                   
	   $query = $this->Common->insert("notifications",$arraynew);
	   
	   if($query){
	       $withdrawaluserid=$withdrawlid['u_id'];
	         $this->db->query("UPDATE users SET notifications=notifications+1 WHERE u_id='$withdrawaluserid'"); 
	        $this->session->set_flashdata('success','Request has been rejected');
            redirect(SURL."WithDraws");
	   }else{
	        $this->session->set_flashdata('fail','Try Later.....');
            redirect(SURL."WithDraws");
	   }
	}
}
?>