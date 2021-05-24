<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Paypal extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
		$this->load->library('paypal_lib');
	}
	
	
	public function ipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['proposal_no'] = $paypalInfo["item_number"];
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['paymentid']   = $paypalInfo["txn_id"];
                $data['method']      = "paypal";
                $data['my_status']=1;
                
                $this->db->trans_start();
		        $this->Common->accept_proposal_transactions($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function ipndispute(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['dispute_id'] = $paypalInfo["item_number"];
                $data['total_money'] =($paypalInfo["payment_gross"]*100)/105;
                $data['paymentid']   = $paypalInfo["txn_id"];
                $data['method']      = "paypal";
                $data['my_status']=1;
                
                $this->db->trans_start();
		        $this->Common->accept_dispute_transactions_job($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function depositipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['proposal_no'] = $paypalInfo["item_number"];
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['paymentid']   = $paypalInfo["txn_id"];
                $data['method']      = "paypal";
                $data['my_status']      = 1;
                
                $this->db->trans_start();
		        $this->Common->deposit_amt_transactions($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function depositipnservice(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['proposal_no'] = $paypalInfo["item_number"];
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['paymentid']   = $paypalInfo["txn_id"];
                $data['method']      = "paypal";
                $data['my_status']      = 1;
                
                $this->db->trans_start();
		        $this->Common->deposit_amt__service_transactions($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function invoiceipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['proposal_no'] = $paypalInfo["item_number"];
                $data['paymentid'] = $paypalInfo["txn_id"];
                $data['method'] = "paypal";
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['my_status'] = 1;
                
                $this->db->trans_start();
		        $this->Common->accept_invoice_transaction_second($data,date("Y-m-d"));	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function invoiceipnservice(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['proposal_no'] = $paypalInfo["item_number"];
                $data['paymentid'] = $paypalInfo["txn_id"];
                $data['method'] = "paypal";
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['my_status'] = 1;
                
                $this->db->trans_start();
		        $this->Common->accept_invoice_transaction__service_second_new($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function tipipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['msg_id'] = $paypalInfo["item_number"];
                $data['total_money'] = ($paypalInfo["amount"]*100)/105;
                $data['paymentid'] = $paypalInfo["txn_id"];
                $data['method'] = "paypal";
                $data['my_status'] = 1;
                
                $this->db->trans_start();
		        $this->Common->accept_tip_transaction($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function tipipnservice(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['msg_id'] = $paypalInfo["item_number"];
                $data['total_money'] = ($paypalInfo["amount"]*100)/105;
                $data['paymentid'] = $paypalInfo["txn_id"];
                $data['method'] = "paypal";
                $data['my_status'] = 1;
                
                $this->db->trans_start();
		        $this->Common->accept_tip_transaction_service($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function jobadonsipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['job_id'] = $paypalInfo["item_number"];
                $data['paymentid'] = $paypalInfo["txn_id"]; 
                $data['method'] = "paypal";
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['my_status']=1;
                
                $this->db->trans_start();
		        $this->Common->jobadons_transactions($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function creditsipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['u_id'] = $paypalInfo["item_number"];
                $data['paymentid'] = $paypalInfo["txn_id"]; 
                $data['method'] = "paypal";
                $data['credits'] = $paypalInfo["custom"];
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                
                $this->db->trans_start();
		        $this->Common->creditspurchased_transactions($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	public function featureproposalipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['u_id'] = $paypalInfo["item_number"];
                $data['paymentid'] = $paypalInfo["txn_id"]; 
                $data['method'] = "paypal";
                $data['proposalno'] = $paypalInfo["custom"];
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['my_status']   = 1;
                
                $this->db->trans_start();
		        $this->Common->featureproposal_transactions($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	
	public function featureprofileipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['u_id'] = $paypalInfo["item_number"];
                $data['paymentid'] = $paypalInfo["txn_id"]; 
                $data['method'] = "paypal";
                $data['custom'] = $paypalInfo["custom"];
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                $data['my_status'] = 1;
                
                $this->db->trans_start();
		        $this->Common->featureprofile_transactions($data);	
		        $this->db->trans_complete();
		           
            }
        }
        
	}
	
	
	public function servicepurchasedipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                
            if($ipnCheck){
                
                // Insert the transaction data in the database
                
                $data['u_id'] = $paypalInfo["item_number"];
                $data['paymentid'] = $paypalInfo["txn_id"]; 
                $data['method'] = "paypal";
                $data['servocep_id'] = $paypalInfo["custom"];
                $data['total_money'] = ($paypalInfo["payment_gross"]*100)/105;
                
                $this->db->trans_start();
                
                $this->db->query("update services_purchased set is_paid='Yes' where id='".$data['servocep_id']."'");
                
                $purchsedetail = $this->db->query("select * from services_purchased where id='".$data['servocep_id']."'")->result_array()[0];
                
                $servicedetail = $this->db->query("Select * from services where service_id = '".$purchsedetail['service_id']."'")->result_array()[0];
                
                $service_owner_id = $purchsedetail['service_owner_id'];
                $who_purchased = $purchsedetail['who_purchased'];
                
	            $buyer_data = $this->db->query("Select * from users where u_id = '".$who_purchased."'")->result_array()[0];          
          
                $notification = $buyer_data['f_name']." ".$buyer_data['l_name']." has bought your service ( ".$servicedetail['title']." )";
                
                $link = "ChatServices/index/".$buyer_data['username']."/".$servicedetail['service_slug']."?id=".$data['servocep_id'];
                        
                
                $array = array(
                        "notification"=>$notification,
                        "noti_date"=>gmdate("Y-m-d H:i:s"),
                        "noti_recvr_id"=>$servicedetail['u_id'],
                        "noti_sender_id"=>$who_purchased,
                        "link"=>$link
                      );
                      
                $this->Common->insert("notifications",$array);
        
                $this->db->query("update users set notifications=notifications+1 where u_id='".$servicedetail['u_id']."'");
        
                $user_data = $this->db->query("Select * from users where u_id ='".$servicedetail['u_id']."'")->result_array()[0];
                $notification = "You have purchased Service ( ".$servicedetail['title']." )";
        
                $link = "ChatServices/index/".$user_data['username']."/".$servicedetail['service_slug']."?id=".$data['servocep_id'];
                
        
                $array = array(
                        "notification"=>$notification,
                        "noti_date"=>gmdate("Y-m-d H:i:s"),
                        "noti_recvr_id"=>$who_purchased,
                        "noti_sender_id"=>$servicedetail['u_id'],
                        "link"=>$link
                      );
                      
                $this->Common->insert("notifications",$array);
                
                
                $this->db->query("update users set notifications=notifications+1 where u_id='".$who_purchased."'");
                
                $array = array(
                    "u_id"=>$who_purchased, 
                    "damount"=>$data['total_money'], 
                    "camount"=>$data['total_money'],
                    "totalamt"=>$data['total_money'],
                    "service_id"=>$purchsedetail['service_id'],
                    "service_p_id"=>$data['servocep_id'],
                    "trans_type"=>"service_purchased",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$data['paymentid'],
                    "payment_gateway"=>"paypal"
                  );
                  
                $this->Common->insert("transactions",$array);
                
                $array = array(
                    "u_id"=>$who_purchased, 
                    "damount"=>$data['total_money'], 
                    "camount"=>"0",
                    "totalamt"=>$data['total_money'],
                    "service_id"=>$purchsedetail['service_id'],
                    "service_p_id"=>$data['servocep_id'],
                    "trans_type"=>"service_purchased",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                    "pg_transaction_id"=>$data['paymentid'],
                    "payment_gateway"=>"paypal"
                  );
                  
                $this->Common->insert("transactions",$array);
        
		        $this->db->trans_complete();
		           
            }
        }
        
	}
    

}
?>