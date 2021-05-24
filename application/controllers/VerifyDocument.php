<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class VerifyDocument extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		 	 $this->load->helper('download');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "VerifyDocument/";
		 $data['Controller_name'] = "Verify Document";
		 $data['Newcaption'] = " Verify Document";
// =============================================fix data ends here====================================================


		 $data['documents'] = $this->db->query("select * from doc_recived")->result_array();

		 $this->load->view("VerifyDocument",$data);
	}
	
		public function changestatus(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "VerifyDocument/";
		 $data['Controller_name'] = "Verify Document";
		 $data['Newcaption'] = " Verify Document";
// =============================================fix data ends here====================================================

        $docid=$this->input->post("docid");
        $docid5=$this->input->post("docid5");
        
        
        $changestatus=$this->input->post("changestatus");
       
        if(!empty($changestatus))
        {
            $con['conditions']=array("u_id"=>$docid5);
            
        	$array1 = array("withdrawl_Acct_Status"=>$changestatus,);
        	             
        	$querynew=$this->Common->update("users",$array1,$con);
            
    	    $this->db->where('id',$docid);
    	    $array=array("status"=>$changestatus);
    	
    	   $query1=$this->db->update('doc_recived',$array);
    	   
    	   if($changestatus=="Not Approved"){
    	       $notification = "Your documents couldnt be approved.";
    	       $link = SURL."Payment";
    	       
    	   }else if($changestatus=="Approved"){
    	       
    	       $notification = "Your documents are approved";
    	        $link = SURL."Payment";
    	       
    	   }
    	   
    	   $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$docid5,
    	                    "is_read"=>"No",
    	                    "link"=>$link,
    	                 );
    	                 
    	   $this->Common->insert("notifications",$array);
    
    	  if($query1){
    			  
    		$this->session->set_flashdata('success','Status Changed');
    		redirect(SURL."VerifyDocument");
    	    }else
    	    {
    	    $this->session->set_flashdata('fail','Something went wrong');
    		redirect(SURL."VerifyDocument"); 
    	    }
      }else
      {
          $this->session->set_flashdata('fail','Something went wrong');
    	  redirect(SURL."VerifyDocument");
      }
		
	}
	
	
		public function newchangestatus(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "VerifyDocument/";
		 $data['Controller_name'] = "Verify Document";
		 $data['Newcaption'] = " Verify Document";
// =============================================fix data ends here====================================================

        $newuserid=$this->input->post("newuserid");
        $newdocid=$this->input->post("newdocid");
        $actionbtn=$this->input->post("actionbtn");
        
      
        //$changestatus=$this->input->post("changestatus");
       
        if(!empty($actionbtn))
        {
            $con['conditions']=array("u_id"=>$newuserid);
            
        	$array1 = array("withdrawl_Acct_Status"=>$actionbtn,);
        	             
        	$querynew=$this->Common->update("users",$array1,$con);
            
    	    $this->db->where('id',$newdocid);
    	    $array=array("status"=>$actionbtn);
    	
    	   $query1=$this->db->update('doc_recived',$array);
    	   
    	   if($actionbtn=="Approved"){
    	       $notification = "Your documents are approved.";
    	       $link = SURL."Payment";
    	       
    	   }else if($actionbtn=="Not Approved"){
    	       
    	       $notification = "Your documents are rejected";
    	        $link = SURL."Payment";
    	       
    	   }
    	   
    	   $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$newuserid,
    	                    "is_read"=>"No",
    	                    "link"=>$link,
    	                 );
    	                 
    	   $this->Common->insert("notifications",$array);
    
    	  if($query1){
    	      
    	      $this->db->query("UPDATE users SET notifications=notifications+1 WHERE u_id='$newuserid'"); 
    		//$updatenotify = "UPDATE users SET notifications = notifications + 1 where u_id='$newuserid'";   	
    	
    		$this->session->set_flashdata('success','Status Changed');
    		redirect(SURL."VerifyDocument");
    	    }else
    	    {
    	    $this->session->set_flashdata('fail','Something went wrong');
    		redirect(SURL."VerifyDocument"); 
    	    }
      }else
      {
          $this->session->set_flashdata('fail','Something went wrong');
    	  redirect(SURL."VerifyDocument");
      }
		
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
	

}
?>