<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class PaymentSummary extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('common');
		$this->load->library('Uploadimage');
		$this->checksession();
		$this->load->library('paypal_lib');
		$this->load->library('stripe_lib');
		error_reporting(0);
		
	}

	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}


	public function acceptproposal($msgid){ 
        $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
        if($data['record']['custom_status_extent'] != "0"){
	        $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	        redirect(SURL);
	    }
    	    
        $data['url'] = SURL.'PaymentSummary/process_accept_proposal';
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}	
	
	public function process_accept_proposal(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.username,jobs.job_slug from jobs_msgs inner join users on users.u_id=jobs_msgs.send_id inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$this->input->post("proposalno")."'")->result_array()[0];
    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("proposalno"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Proposal Accepted";
	            $data['proposal_no'] = $this->input->post("proposalno");
		        $data['method']      = "stripecc";
		        $data['my_status']      = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $this->db->trans_start();
		            $this->common->accept_proposal_transactions($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/acceptproposal/".$this->input->post("proposalno"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have accepted the proposal.");
                        
    				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/acceptproposal/".$this->input->post("proposalno"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	        }
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Chat/index/".$detail['username']."/".$detail['job_slug']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/acceptproposal/".$this->input->post("proposalno"); //payment cancel url
			$notifyURL = SURL.'Paypal/ipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Proposal Accepted');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("proposalno"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("proposalno"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/acceptproposal/".$this->input->post("proposalno"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['total_money'] = ($data['total_money']*100)/105;
	            $data['reason']      = "Proposal Accepted";
	            $data['proposal_no'] = $this->input->post("proposalno");
		        $data['method']      = "gigweb";
		        $data['my_status']      = 2;
		        
		        $data['total_money'] = ($data['total_money']*100)/105;
	            
	            $this->db->trans_start();
	            $this->common->accept_proposal_transactions($data);	
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/acceptproposal/".$this->input->post("proposalno"));
				}else{
				    $this->session->set_flashdata("success","You have accepted the proposal.");
				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/acceptproposal/".$this->input->post("proposalno"));
	        }
	    }
	  
	}
	
	public function dispute($disputeid){ 
        //$data['record'] = $this->db->query("select * from general where id='15'")->result_array()[0];
        // $data['budget'] = $this->db->query("select disputes.*,jobs.* from disputes inner join jobs on jobs.job_id=disputes.job_id where dsipute_id='$disputeid'")->result_array()[0]['budget'];
        // $data['budget'] = $data['budget'] *10/100;
        
        $data['budget'] = $this->db->query("select * from general where name='dispute_fee'")->result_array()[0]['price'];
        
        $data['url'] = SURL.'PaymentSummary/process_dispute';
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function disputeService($disputeid){ 
        $data['record'] = $this->db->query("select * from general where id='15'")->result_array()[0];
        
        // $data['budget'] = $this->db->query("select disputes.*,services_purchased.* from disputes inner join services_purchased on services_purchased.id=disputes.service_p_id where dsipute_id='$disputeid'")->result_array()[0]['purchase_amount'];
        //  = $data['budget'] *10/100;
        
        $data['budget'] = $this->db->query("select * from general where name='dispute_fee'")->result_array()[0]['price'];
        
        $data['url'] = SURL.'PaymentSummary/process_dispute_service';
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	public function process_dispute_service(){
	   	
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("dispute_id"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Dispute fee paid";
	            $data['dispute_id'] = $this->input->post("dispute_id");
		        $data['method']      = "stripecc";
		        $data['my_status']      = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            $data['total_money'] = ($data['total_money']*100)/105;
		            
		            $this->db->trans_start();
		            $this->common->accept_dispute_transactions($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/disputeService/".$this->input->post("dispute_id"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have paid.");
    				    redirect(SURL);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/disputeService/".$this->input->post("dispute_id"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/disputeService/".$this->input->post("dispute_id"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL; //payment success url
			
			$cancelURL = SURL."PaymentSummary/disputeService/".$this->input->post("dispute_id"); //payment cancel url
			$notifyURL = SURL.'Paypal/ipndispute'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Amount paid for dispute');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("dispute_id"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("dispute_id"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/disputeService/".$this->input->post("dispute_id"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['dispute_id'] = $this->input->post("dispute_id");
		        $data['method']      = "gigweb";
		        $data['my_status']      = 2;
	            $data['total_money'] = ($data['total_money']*100)/105;
	            
	            $this->db->trans_start();
	            $this->common->accept_dispute_transactions($data);	
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/disputeService/".$this->input->post("dispute_id"));
				}else{
				    $this->session->set_flashdata("success","You have Paid the amount.");
				    redirect(SURL);
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/disputeService/".$this->input->post("dispute_id"));
	        }
	    }
	  
	}
	public function process_dispute(){
	   			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("dispute_id"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Dispute fee paid";
	            $data['dispute_id'] = $this->input->post("dispute_id");
		        $data['method']      = "stripecc";
		        $data['my_status']      = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->accept_dispute_transactions_job($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/dispute/".$this->input->post("dispute_id"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have paid.");
                        
    				    redirect(SURL);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/dispute/".$this->input->post("dispute_id"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/dispute/".$this->input->post("dispute_id"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Disputespage"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/dispute/".$this->input->post("dispute_id"); //payment cancel url
			$notifyURL = SURL.'Paypal/ipndispute'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Amount paid for dispute');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("dispute_id"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("dispute_id"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/dispute/".$this->input->post("dispute_id"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['total_money'] = ($data['total_money']*100)/105;
	            $data['dispute_id'] = $this->input->post("dispute_id");
		        $data['method']      = "gigweb";
		        $data['my_status']      = 2;
	            
	            $this->db->trans_start();
	            $this->common->accept_dispute_transactions_job($data);	
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/dispute/".$this->input->post("dispute_id"));
				}else{
				    $this->session->set_flashdata("success","You have Paid the amount.");
				    redirect(SURL);
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/dispute/".$this->input->post("dispute_id"));
	        }
	    }
	  
	}
	
	public function depositamount($msgid){ 
        $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
        
        if($data['record']['custom_status_extent'] !="8"){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	    }
    	    
        $data['url'] = SURL.'PaymentSummary/process_deposit_amount';
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function process_deposit_amount(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.username,jobs.job_slug from jobs_msgs inner join users on users.u_id=jobs_msgs.send_id inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$this->input->post("msgid")."'")->result_array()[0];
    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("msgid"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Amount Deposited";
	            $data['proposal_no'] = $this->input->post("msgid");
		        $data['method']      = "stripecc";
		        $data['my_status']   = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            $data['total_money'] = ($data['total_money']*100)/105;
		            
		            $this->db->trans_start();
		            $this->common->deposit_amt_transactions($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/depositamount/".$this->input->post("msgid"));
    				}else{
    				    
    				    // $email = $this->db->query("select email from users where u_id=".$detail['recv_id'])->result_array()[0]['email'];
            //             $data['email'] = $email;
            //             $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
            //             $data['type'] = "deposite_accept";
            //     		$html = $this->load->view("Job_emails.php",$data,true);
            //             $emailsent = $this->Common->send_email($email,'Surf n Work', $html);
    				    
    				    $this->session->set_flashdata("success","You have accepted the deposit.");

    				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/depositamount/".$this->input->post("msgid"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	        }
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Chat/index/".$detail['username']."/".$detail['job_slug']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/depositamount/".$this->input->post("msgid"); //payment cancel url
			$notifyURL = SURL.'Paypal/depositipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Amount deposited');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("msgid"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("msgid"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/depositamount/".$this->input->post("msgid"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['total_money'] = ($data['total_money']*100)/105;
	            $data['reason']      = "Amount Deposited";
	            $data['proposal_no'] = $this->input->post("msgid");
		        $data['method']      = "gigweb";
		        $data['my_status']   = 2;
		        
		        $this->db->trans_start();
		        $this->common->deposit_amt_transactions($data);	
		        $this->db->trans_complete();
	            
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/depositamount/".$this->input->post("msgid"));
				}else{
				    
				        // $email = $this->db->query("select email from users where u_id=".$detail['recv_id'])->result_array()[0]['email'];
            //             $data['email'] = $email;
            //             $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
            //             $data['type'] = "deposite_accept";
            //     		$html = $this->load->view("Job_emails.php",$data,true);
            //             $emailsent = $this->Common->send_email($email,'Surf n Work', $html);
				    
				    $this->session->set_flashdata("success","You have accepted the deposit amount.");
				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/depositamount/".$this->input->post("msgid"));
	        }
	    }
	  
	}
	
	public function depositamountforservice($msgid){ 
        $data['record'] = $this->db->query("select * from services_msgs where msg_id='$msgid'")->result_array()[0];
        
        if($data['record']['custom_status_extent'] !='8'){
	         $this->session->set_flashdata("success","Something went wrong.");
	         redirect(SURL);
	    }
	     
        $data['url'] = SURL.'PaymentSummary/process_deposit_amount_service';
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function process_deposit_amount_service(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.*,services.*,services_msgs.* from services_msgs inner join users on users.u_id=services_msgs.send_id inner join services on services.service_id=services_msgs.service_id where msg_id='".$this->input->post("msgid")."'")->result_array()[0];
    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("msgid"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Amount Deposited";
	            $data['proposal_no'] = $this->input->post("msgid");
		        $data['method']      = "stripecc";
		        $data['my_status']   = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->deposit_amt__service_transactions($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/depositamountforservice/".$this->input->post("msgid"));
    				}else{
    				    
    				    $email = $this->db->query("select email from users where u_id='".$detail['send_id']."'")->result_array()[0]['email'];
                        $data['email'] = $email;
                        
                        $username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
                        $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
                        
                        $data['type'] = "deposite_accept_service";
                		$html = $this->load->view("Job_emails.php",$data,true);
                        $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
    				    
    				    $this->session->set_flashdata("success","You have accepted the deposit.");

    				    redirect(SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']."?id=".$detail['service_p_id']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/depositamountforservice/".$this->input->post("msgid"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/depositamountforservice/".$this->input->post("msgid"));
	        }
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/depositamountforservice/".$this->input->post("msgid"); //payment cancel url
			$notifyURL = SURL.'Paypal/depositipnservice'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Amount deposited');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("msgid"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("msgid"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/depositamountforservice/".$this->input->post("msgid"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['total_money'] = ($data['total_money']*100)/105;
	            
	            $data['reason']      = "Amount Deposited";
	            $data['proposal_no'] = $this->input->post("msgid");
		        $data['method']      = "gigweb";
		        $data['my_status']   = 2;
		        
		        $this->db->trans_start();
		        $this->common->deposit_amt__service_transactions($data);	
		        $this->db->trans_complete();
	            
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/depositamountforservice/".$this->input->post("msgid"));
				}else{
				    
			        $email = $this->db->query("select email from users where u_id='".$detail['send_id']."'")->result_array()[0]['email'];
                    $data['email'] = $email;
                    
                    $username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
                    $data['username'] = ucfirst($username['f_name'])." ".$username['l_name'];
                    
                    $data['type'] = "deposite_accept_service";
            		$html = $this->load->view("Job_emails.php",$data,true);
                    $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
				    
				    $this->session->set_flashdata("success","You have accepted the deposit amount.");
				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['service_slug']);
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/depositamountforservice/".$this->input->post("msgid"));
	        }
	    }
	  
	}
	
	public function givetip($username){ 
        $data['user_record'] = $this->db->query("select * from users where username='$username'")->result_array()[0];
        $data['total_money'] = $this->uri->segment("4");
        
        $data['url'] = SURL.'PaymentSummary/process_tip';
        $data['returnurl'] = SURL."PaymentSummary/givetip/$username/".$this->uri->segment("4")."/".$this->uri->segment("5");
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function process_tip(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.username,jobs.* from jobs_msgs inner join users on users.u_id=jobs_msgs.send_id inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$this->input->post("invoiceno")."'")->result_array()[0];
    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("user")) && !empty($this->input->post("invoiceno"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Tip";
	            $data['user_id']     = $this->input->post("user");
		        $data['method']      = "stripecc";
		        $data['msg_id']      = $this->input->post("invoiceno");
		        $data['my_status']   = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            $data['total_money'] = ($data['total_money']*100)/105;
		            
		            $this->db->trans_start();
		            $this->common->accept_tip_transaction($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect($this->input->post("returnurl"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have given the tip.");
    				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect($this->input->post("returnurl"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect($this->input->post("returnurl"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Chat/index/".$detail['username']."/".$detail['job_slug']; //payment success url
			
			$cancelURL = $this->input->post("returnurl"); //payment cancel url
			$notifyURL = SURL.'Paypal/tipipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Tip');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("invoiceno"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
            $data['total_money'] = $this->input->post("total_money");
            $data['total_money'] = ($data['total_money']*100)/105;
            $data['user_id']     = $this->input->post("user");
	        $data['method']      = "gigweb";
	        $data['msg_id']      = $this->input->post("invoiceno");
	        $data['my_status']   = 2;
	        
            
            $this->db->trans_start();
            $this->common->accept_tip_transaction($data);	
            $this->db->trans_complete();
		
			if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
			    redirect($this->input->post("returnurl"));
			}else{
			    
			    $this->session->set_flashdata("success","You have given the tip.");
			    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
                
			}
	        
	    }
	  
	}
	
	public function givetip_for_service($username){ 
        $data['user_record'] = $this->db->query("select * from users where username='$username'")->result_array()[0];
        $data['total_money'] = $this->uri->segment("4");
        
        $data['url'] = SURL.'PaymentSummary/process_tip_for_service';
        $data['returnurl'] = SURL."PaymentSummary/givetip_for_service/$username/".$this->uri->segment("4")."/".$this->uri->segment("5");
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function process_tip_for_service(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.username,services.*,services_msgs.* from services_msgs inner join users on users.u_id=services_msgs.send_id inner join services on services.service_id=services_msgs.service_id where msg_id='".$this->input->post("invoiceno")."'")->result_array()[0];
    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("user")) && !empty($this->input->post("invoiceno"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Tip";
	            $data['user_id']     = $this->input->post("user");
		        $data['method']      = "stripecc";
		        $data['msg_id']      = $this->input->post("invoiceno");
		        $data['my_status']   = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            $data['total_money'] = ($data['total_money']*100)/105;
		            
		            $this->db->trans_start();
		            $this->common->accept_tip_transaction_service($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect($this->input->post("returnurl"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have given the tip.");
    				    redirect(SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']."?id=".$detail['service_p_id']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect($this->input->post("returnurl"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect($this->input->post("returnurl"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        // Set variables for paypal form
			$returnURL = SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']."?id=".$detail['service_p_id']; //payment success url
			
			$cancelURL = $this->input->post("returnurl"); //payment cancel url
			$notifyURL = SURL.'Paypal/tipipnservice'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Tip');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("invoiceno"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
            $data['total_money'] = $this->input->post("total_money");
            $data['user_id']     = $this->input->post("user");
	        $data['method']      = "gigweb";
	        $data['msg_id']      = $this->input->post("invoiceno");
	        $data['my_status']   = 2;
	        
	        $data['total_money'] = ($data['total_money']*100)/105;
            
            $this->db->trans_start();
            $this->common->accept_tip_transaction_service($data);	
            $this->db->trans_complete();
		
			if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
			    redirect($this->input->post("returnurl"));
			}else{
			    
			    $this->session->set_flashdata("success","You have given the tip.");
			    redirect(SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']."?id=".$detail['service_p_id']);
                
			}
	        
	    }
	  
	}
	
	public function acceptinvoice($msgid){ 
	    
        $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	    if($data['record']['custom_status_extent']!='4'){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	    }
	    
        $detail = $this->db->query("select users.username,jobs.job_slug from jobs_msgs inner join users on users.u_id=jobs_msgs.send_id inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$msgid."'")->result_array()[0];
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
    
        $escrowamt = $this->common->job_escrow_amt($data['record']['job_id'],date("Y-m-d"));
        //echo $data['record']['invc_amt'];
       // exit;
        if($escrowamt >= $data['record']['invc_amt']){
            
            $this->db->trans_start();
            $data = $data['record'];
            $this->common->accept_invoice_transaction($data,date("Y-m-d"));
            $this->db->trans_complete();
            
            if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
			}else{
			    
			    $this->session->set_flashdata("success","Invoice has accepted.");
                
			}
			
			redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
        
        }else{
            $data['record']['invc_amt'] = $data['record']['invc_amt'] - $escrowamt;
            $data['url'] = SURL.'PaymentSummary/process_accept_invoice';
		    $this->load->view("PaymentSummary",$data);
        }
        
	}
	//// accept invoice for services
	public function acceptServiceinvoice($msgid){ 
	     
        $data['record'] = $this->db->query("select * from services_msgs where msg_id='$msgid'")->result_array()[0];
        if($data['record']['custom_status_extent']!='4'){
	         $this->session->set_flashdata("fail","Something went wrong.please try again later.");
	         redirect(SURL);
	    }
	    
        $detail = $this->db->query("select users.username,services.service_slug from services_msgs inner join users on users.u_id=services_msgs.send_id inner join services on services.service_id=services_msgs.service_id where msg_id='".$msgid."'")->result_array()[0];
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
        
        $escrowamt = $this->common->service_escrow_amt($data['record']['service_p_id']);
		
        if($escrowamt >= $data['record']['invc_amt']){
             $data['record']['invc_amt'];
            $this->db->trans_start();
            $data = $data['record'];
            $this->common->accept_invoice_transaction_service_new($data);
            $this->db->trans_complete();
            
            if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
			}else{
			    $this->session->set_flashdata("success","Invoice has accepted.");
                
			}
			
			redirect(SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']."?id=".$data['record']['service_p_id']);
        
        }else{
            $data['record']['invc_amt'] = $data['record']['invc_amt'] - $escrowamt;
            $data['url'] = SURL.'PaymentSummary/process_accept_service_invoice';
		    $this->load->view("PaymentSummary",$data);
        }
        
	}
	
	
	
	public function process_accept_invoice(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.username,jobs.* from jobs_msgs inner join users on users.u_id=jobs_msgs.send_id inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$this->input->post("proposalno")."'")->result_array()[0];
		
    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("proposalno"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Invoice Accepted";
	            $data['proposal_no'] = $this->input->post("proposalno");
		        $data['method']      = "stripecc";
		        $data['job_id']      = $detail['job_id'];
		        $data['my_status']   = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->accept_invoice_transaction_second($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/acceptinvoice/".$this->input->post("proposalno"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have accepted the Invoice.");
    				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/acceptinvoice/".$this->input->post("proposalno"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Chat/index/".$detail['username']."/".$detail['job_slug']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/acceptinvoice/".$this->input->post("proposalno"); //payment cancel url
			$notifyURL = SURL.'Paypal/invoiceipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Invoice Accepted');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("proposalno"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
            $data['total_money'] = $this->input->post("total_money");
            $data['total_money'] = ($data['total_money']*100)/105;
            $data['proposal_no'] = $this->input->post("proposalno");
	        $data['my_status']   = 2;
	        
	        $this->db->trans_start();
            $this->common->accept_invoice_transaction_second($data);	
            $this->db->trans_complete();
            
            if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
			    redirect(SURL."PaymentSummary/acceptinvoice/".$this->input->post("proposalno"));
			}else{
			    
			    $this->session->set_flashdata("success","You have accepted the Invoice.");
			    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
                
			}
		        
	    }
	  
	}
	
	//// Acept Service inovice payment
	public function process_accept_service_invoice(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.username,services.* from services_msgs inner join users on users.u_id=services_msgs.send_id inner join services on services.service_id=services_msgs.service_id where services_msgs.msg_id='".$this->input->post("proposalno")."'")->result_array()[0];

	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("proposalno"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Invoice Accepted";
	            $data['proposal_no'] = $this->input->post("proposalno");
		        $data['method']      = "stripecc";
		        $data['job_id']      = $detail['service_id'];
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->accept_invoice_transaction__service_second_new($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/acceptServiceinvoice/".$this->input->post("proposalno"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have accepted the Invoice.");
    				    redirect(SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/acceptServiceinvoice/".$this->input->post("proposalno"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."ChatServices/index/".$detail['username']."/".$detail['service_slug']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/acceptServiceinvoice/".$this->input->post("proposalno"); //payment cancel url
			$notifyURL = SURL.'Paypal/invoiceipnservice'; //ipn url
		     
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Invoice Accepted');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("proposalno"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	  
	}
	
	public function jobadons($jobid){ 
        $data['record'] = $this->db->query("select * from jobs where job_id='$jobid'")->result_array()[0];
        $data['url'] = SURL.'PaymentSummary/process_adons';
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function process_adons(){
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("job_id"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Job Adons Purchased";
	            $data['job_id']      = $this->input->post("job_id");
		        $data['method']      = "stripecc";
		        $data['my_status']      = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->jobadons_transactions($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","Thank you for your custom, your payment has been accepted and awaiting approval from admin.");
    				    redirect(SURL."Postproject");
						//redirect(SURL.'InviteFreelancer/'.$this->input->post("job_id"));
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Postproject"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/jobadons/".$this->input->post("job_id"); //payment cancel url
			$notifyURL = SURL.'Paypal/jobadonsipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Job Adons Purchased');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("job_id"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("job_id"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Job Adons Purchased";
	            $data['job_id']      = $this->input->post("job_id");
		        $data['method']      = "gigweb";
		        $data['my_status']      = 2;
		            
	            $this->db->trans_start();
	            $this->common->jobadons_transactions($data);	
	            $this->db->trans_complete();
		            
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
				}else{
				    $this->session->set_flashdata("success","Thank you for your custom, your payment has been accepted and your Project has been posted successfully!.");
				   redirect(SURL."Postproject");
				   //redirect(SURL.'InviteFreelancer/'.$this->input->post("job_id"));
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
	        }
	    }
	    
	}
    
    public function buyservice($serviceslug){ 
        
		$service_id = $this->db->query("select * from services where service_slug='$serviceslug'")->result_array()[0]['service_id'];		
        $data['service_data'] = $this->db->query("select * from services where service_id='".$service_id."'")->result_array()[0];
        
        if(empty($data['service_data'])){
            redirect(SURL);
        }
        
        $data['service_portfolio'] = $this->db->query("select * from service_portfolio where service_id='".$service_id."'")->result_array()[0]['image'];
        $data['service_adons'] = $this->db->query("select * from services_adons where service_id='".$service_id."'")->result_array();
        
        $data['payment_fee'] = (5*$data['service_data']['amount'])/100;
        
        $data['url'] = SURL.'PaymentSummary/buyservicetransaction';
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function buyservicetransaction(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("service_id")) && !empty($this->input->post("servicesbuydetails"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Service Purchased";
	            $data['service_id']  = $this->input->post("service_id");
		        $data['method']      = "stripecc";
		        $data['who_purchased'] = $this->session->userdata("user");
		        $data['servicesbuydetails'] = $this->input->post("servicesbuydetails");
		        $data['my_status'] = 1;
		        
		        if(!empty($this->input->post("adonspurchased"))){
		            $data['adons'] = implode("-",$this->input->post("adonspurchased"));
		        }else{
		            $data['adons'] = "";
		        }
		        
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['total_money'] = ($data['total_money']*100)/105;
		            
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $link = $this->common->servicepurchased_transactions($data);
		            $this->db->trans_complete();
		            
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
    				}else{
    				    
    				    $service_owner = $this->db->query("select * from services where service_id = ". $this->input->post("service_id"))->result_array()[0];
    				    
                        $email = $this->db->query("select email from users where u_id=".$service_owner['u_id'])->result_array()[0]['email'];
				        $data['email'] = $email;
				        $data['title'] = $service_owner['title'];
                        $data['type'] = "service_purchased";
    				 	$html = $this->load->view("Job_emails.php",$data,true);
                        $emailsent = $this->Common->send_email($email,'Gigeconome', $html);
                    
    			
    				    $this->session->set_flashdata("success","Service has Purchased .");
    				    redirect(SURL.$link);
		                
    				}
		             
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        if(empty($this->input->post("total_money")) || empty($this->input->post("service_id")) || empty($this->input->post("servicesbuydetails"))){
	            
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
	        }
	        
	        
            $total_money = $this->input->post("total_money");
            $service_id  = $this->input->post("service_id");
	        $who_purchased = $this->session->userdata("user");
	        $servicesbuydetails = $this->input->post("servicesbuydetails");
	        $data['my_status'] = 3;
	        
	        if(!empty($this->input->post("adonspurchased"))){
	            $adons = implode("-",$this->input->post("adonspurchased"));
	        }else{
	            $adons = "";
	        }
	        
	        	    
	        $buyer_data = $this->db->query("Select * from users where u_id = '".$who_purchased."'")->result_array()[0];
            $servicedetail = $this->db->query("Select * from services where service_id = '".$service_id."'")->result_array()[0];
          
	    
    	    $array = array(
                    "service_id"=>$service_id,
                    "service_owner_id"=>$servicedetail['u_id'],
                    "who_purchased"=>$who_purchased,
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "status"=>"Ongoing",
                    "adons"=>$adons,
                    "is_paid"=>"No",
                    "content"=>$servicesbuydetails,
                    "purchase_amount"=>$total_money
                  );
                  
            $service_purchase_id = $this->Common->insert("services_purchased",$array);
	        
	        $user_data = $this->db->query("Select * from users where u_id ='".$servicedetail['u_id']."'")->result_array()[0];
	        $link = "ChatServices/index/".$user_data['username']."/".$servicedetail['service_slug']."?id=".$service_purchase_id;
	        // Set variables for paypal form
			$returnURL = SURL.$link; //payment success url
			
			$cancelURL = SURL."PaymentSummary/buyservice/".$this->input->post("service_id"); //payment cancel url
			$notifyURL = SURL.'Paypal/servicepurchasedipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Service Purchased');
			$this->paypal_lib->add_field('custom', $service_purchase_id);
			$this->paypal_lib->add_field('item_number',$this->session->userdata("user"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("service_id")) && !empty($this->input->post("servicesbuydetails"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/buyservice/".$this->input->post("service_id"));
	            }
	            
	            $this->db->trans_start();
	            
		        $data['total_money'] = ($this->input->post("total_money")*100)/105;
	            $data['service_id']  = $this->input->post("service_id");
		        $data['method']      = "gigweb";
		        $data['who_purchased'] = $this->session->userdata("user");
		        $data['servicesbuydetails'] = $this->input->post("servicesbuydetails");
		        $data['my_status'] = 2;
		        
		        if(!empty($this->input->post("adonspurchased"))){
		            $data['adons'] = implode("-",$this->input->post("adonspurchased"));
		        }else{
		            $data['adons'] = "";
		        }
		        
		        $this->db->trans_start();
		        $link = $this->common->servicepurchased_transactions($data);
		        $this->db->trans_complete();
		        
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/buyservice/".$this->input->post("service_id"));
				}else{
				    $this->session->set_flashdata("success","You have purchased the service.");
				    redirect(SURL.$link);
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/buyservice/".$this->input->post("service_id"));
	        }
	    }
	    
	}
    
    public function featureproposal($proposal_id){ 
        
       
        
        $data['proposal_feature_price'] = $this->db->query("select * from general where name='Feature Proposal'")->result_array()[0]['price'];
        $data['url'] = SURL.'PaymentSummary/featureproposaltransaction';
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function featureproposaltransaction(){
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['proposalno'] = $this->input->post("proposalno");
	            $data['reason']      = "Proposal Featured";
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "stripecc";
		        $data['my_status']   = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->featureproposal_transactions($data);
		            
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/featureproposal/".$this->input->post("proposalno"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","Proposal Featured.");
    				    redirect(SURL."Jobs");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				 redirect(SURL."PaymentSummary/featureproposal/".$this->input->post("proposalno"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/featureproposal/".$this->input->post("proposalno"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Jobs"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/featureproposal/".$this->input->post("proposalno"); //payment cancel url
			$notifyURL = SURL.'Paypal/featureproposalipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Proposal featured');
			$this->paypal_lib->add_field('custom', $this->input->post("proposalno"));
			$this->paypal_lib->add_field('item_number',$this->session->userdata("user"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['total_money'] = ($data['total_money']*100)/105;
	            
	            $data['proposalno'] = $this->input->post("proposalno");
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "gigweb";
		        $data['my_status']   = 2;
	            
	            $this->db->trans_start();
	            
	            $this->common->featureproposal_transactions($data);
	            
	            $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
	                redirect(SURL."PaymentSummary/featureproposal/".$this->input->post("proposalno"));
				}else{
				   $this->session->set_flashdata("success","Proposal Featured.");
    			   redirect(SURL."Jobs");
				}
        
	        }else{
	            $this->session->set_flashdata("success","Proposal Featured.");
    			redirect(SURL."Jobs");
	        }
	    }
	    
	}
	
	public function featureservice($service_id){ 
        
       
        
        $data['service_feature_price'] = $this->db->query("select * from general where name='Feature_service'")->result_array()[0]['price'];
        $data['url'] = SURL.'PaymentSummary/featureservicetransaction';
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function featureservicetransaction(){
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['month'] = $this->input->post("month");
	            $data['service_id'] = $this->input->post("service_id");
	            $data['reason']      = "Service Featured";
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "stripecc";
	            $data['my_status'] = 1;
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->featureservice_transactions($data);
		            
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/featureservice/".$this->input->post("service_id"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","Service Featured.");
    				    redirect(SURL."Offer");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				 redirect(SURL."PaymentSummary/featureservice/".$this->input->post("service_id"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/featureservice/".$this->input->post("service_id"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Offer"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/featureservice/".$this->input->post("service_id"); //payment cancel url
			$notifyURL = SURL.'Paypal/featureproposalipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Services featured');
			$this->paypal_lib->add_field('custom', $this->input->post("service_id"));
			$this->paypal_lib->add_field('item_number',$this->session->userdata("user"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/featureservice/".$this->input->post("service_id"));
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['month'] = $this->input->post("month");
	            $data['service_id'] = $this->input->post("service_id");
	            $data['reason']      = "Service Featured";
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "stripecc";
	            $data['my_status'] = 2;
		        
	            
	            $this->db->trans_start();
		        
		        $this->common->featureservice_transactions($data);
		        
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
	                redirect(SURL."PaymentSummary/featureservice/".$this->input->post("service_id"));
				}else{
				   $this->session->set_flashdata("success","Service Featured.");
    			   redirect(SURL."Offer");
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something went wrong.");
    			redirect(SURL."PaymentSummary/featureservice/".$this->input->post("service_id"));
	        }
	    }
	    
	}
	
	public function featureprofile(){ 
        
        $data['profile_feature_price'] = $this->db->query("select * from general where name='Feature Profile'")->result_array()[0]['price'];
        $data['url'] = SURL.'PaymentSummary/featureprofiletransaction';
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function featureprofiletransaction(){
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['custom'] = $this->input->post("month");
	            $data['reason']      = "Profile Featured";
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "stripecc";
		        $data['my_status']      = 1; //this will be for to distinguish b/w both.
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $this->db->trans_start();
		            $this->common->featureprofile_transactions($data);
		            
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/featureprofile");
    				}else{
    				    $usernamequery = $this->db->query("select * from users where u_id='".$this->session->userdata("user")."'")->result_array()[0];
    				    $this->session->set_flashdata("success","Profile Featured.");
    				    redirect(SURL."TimeLine/".$usernamequery['username']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/featureprofile");
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/featureprofile");
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        $usernamequery = $this->db->query("select * from users where u_id='".$this->session->userdata("user")."'")->result_array()[0];
    				   
	        // Set variables for paypal form
			$returnURL = SURL."TimeLine/".$usernamequery['username']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/featureprofile"; //payment cancel url
			$notifyURL = SURL.'Paypal/featureprofileipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Profile featured');
			$this->paypal_lib->add_field('custom', $this->input->post("month"));
			$this->paypal_lib->add_field('item_number',$this->session->userdata("user"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/featureprofile/");
	            }
	            
	            $data['total_money'] = $this->input->post("total_money");
	            $data['total_money'] = ($data['total_money']*100)/105;
	            $data['custom'] = $this->input->post("month");
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "gigweb";
		        $data['my_status']  = 2; //this will be for to distinguish b/w both.
		        
	            $this->db->trans_start();
	            
		        $this->common->featureprofile_transactions($data);
		        
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
	                redirect(SURL."PaymentSummary/featureprofile/");
				}else{
    			   $usernamequery = $this->db->query("select * from users where u_id='".$this->session->userdata("user")."'")->result_array()[0];
    			   $this->session->set_flashdata("success","Profile Featured.");
    			   redirect(SURL."TimeLine/".$usernamequery['username']);
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
    			redirect(SURL."PaymentSummary/featureprofile");
    			
	        }
	    }
	    
	}
	
	public function buycredits($id){ 
        
        $data['credit_purchase_amt'] = $this->db->query("select * from general where name='Credit Price'")->result_array()[0]['price'];
        $data['url'] = SURL.'PaymentSummary/buycreditstransaction';
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function buycreditstransaction(){
	    
	    
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['credits'] = $this->input->post("credits");
	            $data['reason']      = "Credits Purchased";
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "stripecc";
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            $data['total_money'] = ($data['total_money']*100)/105;
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->creditspurchased_transactions($data);
		            
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","Credits Purchased.");
    				    redirect(SURL."Postproject");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Postproject"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/buycredits/".$this->session->userdata("user"); //payment cancel url
			$notifyURL = SURL.'Paypal/creditsipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Credits Purchased');
			$this->paypal_lib->add_field('custom', $this->input->post("credits"));
			$this->paypal_lib->add_field('item_number',$this->session->userdata("user"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money"))){
	            
	            $data['total_money'] = ($this->input->post("total_money")*100)/105;
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($data['total_money'] > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
	            }
	            
	            $this->db->trans_start();
		        
		        $array = array(
                    "u_id"=>$this->session->userdata("user"),
                    "credits"=>$this->input->post("credits"),
                    "is_paid"=>"Yes",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "used"=>"0",
                  );
              
                $credit_purchase_id = $this->Common->insert("proposal_credits",$array);
        
		        $array = array(
                        "u_id"=>$this->session->userdata("user"), 
                        "damount"=>"0", 
                        "camount"=>$data['total_money'],
                        "totalamt"=>$data['total_money'],
                        "proposal_credits_purchase_id"=>$credit_purchase_id,
                        "trans_type"=>"prop_credits_purchased",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                      );
                      
                $this->Common->insert("transactions",$array);
        
                $array = array(
                        "u_id"=>"0", 
                        "damount"=>$data['total_money'],
                        "camount"=>"0",
                        "totalamt"=>$data['total_money'],
                        "proposal_credits_purchase_id"=>$credit_purchase_id,
                        "trans_type"=>"prop_credits_purchased",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes", 
                      );
                      
                $this->Common->insert("transactions",$array);
        
                
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
				}else{
				    $this->session->set_flashdata("success","Credits Purchased.");
				    redirect(SURL."Postproject");
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
	        }
	    }
	    
	}
}
?>