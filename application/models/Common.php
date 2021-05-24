<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class common extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($table,$data = array()){
		
		$query = $this->db->insert($table,$data);
		if($query){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	

	public function send_email($to_email, $subject, $html, $attachments = array()){
		$from_email = "chris@gigeconome.com"; 
		$this->load->library('email'); 
		$config = array('charset'=>'utf-8', 'wordwrap'=> TRUE, 'mailtype' => 'html');
		$this->email->initialize($config);
		$this->email->from($from_email, 'Gigeconome');
		$this->email->to($to_email);
		$this->email->subject($subject);
		foreach($attachments as $attach){
			$this->email->attach($attach);
		}
		$logo = IMG."logo.png";
		$html = str_replace("[LOGO]","<img src='".$logo."'>",$html);
	
		$this->email->message($html);
		
		if($this->email->send()){
			return true;
		}else{
			return false;
		}
	}
	
	public function gettimeinmyzone($date_accept){
	     $tz = $this->session->userdata('timezone');
	    
	     $dt_obj = new DateTime($date_accept ,new DateTimeZone('UTC'));
	     $dt_obj->setTimezone(new DateTimeZone($tz));
	     return $dt_obj->format('Y-m-d H:i:s');
         //return $date_accept=date_format($dt_obj, 'Y-m-d H:i:s');
	}

	public function get_rows($table, $params = array()){
		$this->db->select('*');
		$this->db->from($table);

		if(array_key_exists("conditions", $params)){

			foreach ($params['conditions'] as $key => $value) {
				 $this->db->where($key,$value);
			}
        	

			$query = $this->db->get();
			if($query->num_rows() > 0){

			 	return $query->result_array();
			}else{
			 	return false;
			}

		}else{
			return false;
		}
	}

	public function get_rows_by_limit($table, $params = array(),$field,$limit,$sort){
		$this->db->select('*');
		$this->db->from($table);

		if(array_key_exists("conditions", $params)){

			foreach ($params['conditions'] as $key => $value) {
				 $this->db->where($key,$value);
			}
			if(!empty($field) &&(!empty($limit))){
				$this->db->order_by($field,$sort);
				$this->db->limit($limit);
				
			}

			
        	

			$query = $this->db->get();
			if($query->num_rows() > 0){

			 	return $query->result_array();
			}else{
			 	return false;
			}

		}else{
			return false;
		}
	}


	public function get_single_row($table_name, $params = array()){
		$this->db->select('*');
		$this->db->from($table_name);

		if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}

			$query = $this->db->get();
			if($query->num_rows() > 0){

				return $query->row();

			}else{
				return false;
			}
			
		

		}else{
			return false;
		}
	}
	
	public function if_proposal_left($u_id){
		$today_Date = date("Y-m-d");
		$query = $this->db->query("select * from proposal_credits where is_paid='No' and u_id='$u_id' and status='0' and used < credits");
		if($query->num_rows() > 0){
		    return $query->result_array()[0]['id'];
		}else{
		    $query = $this->db->query("select * from proposal_credits where is_paid='Yes' and u_id='$u_id' and status='1' and used < credits");
		    if($query->num_rows() > 0){
		        return $query->result_array()[0]['id'];
		    }else{
		        return false;
		    }
		}
	}


	public function count_record($table_name , $params=array()){
		$this->db->select("*");
		$this->db->from($table_name);

		if(array_key_exists("conditions", $params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}

			$query = $this->db->get();
			return $query->num_rows();

		}else{
			return false;
		}
	}

	public function update($table, $data = array(), $params = array()){
		if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
			if($this->db->update($table, $data)){
				return true;
			}
		}else{

			return false;

		}
		
	}

	public function update_new($table, $data = array(), $params = array()){
		
			foreach ($params as $key => $value) {
				$this->db->where($key,$value);
			}
			if($this->db->update($table, $data)){
				return true;
			}
		
	}

	public function delete($table,$record){
		$query = $this->db->delete($table,$record);
		if($query){
			return true;;
		}else{
			return false;
		}
	}
	
	public function rating_user($id){
	    $userratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from user_rating where u_id='".$id."' and reply_of='0'")->result_array()[0];
	    $serviceratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from service_rating where u_id='".$id."' and reply_of='0'")->result_array()[0];

	     
        // $data['totalrating'] = intval(($userratingquery['stars']+$serviceratingquery['stars'])*100/(($userratingquery['total']+$serviceratingquery['total'])*5));
        $data['totalrating'] = $this->db->query("select * from users where u_id='$id'")->result_array()[0]['rating'];
        $data['votes'] = intval($userratingquery['total'])+floatval($serviceratingquery['total']);
        return $data;
	}
	
	public function rating_service($id){
	    $ratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from service_rating where service_id='".$id."'")->result_array()[0];
        $data['totalrating'] = floatval($ratingquery['stars']*100/($ratingquery['total']*5));
        $data['votes'] = floatval($ratingquery['total']);
        return $data;
	}
	
	public function user_rank($id){
	    
	   $profile_rating = $this->db->query("select count(*) as sum from user_rating where stars='5' and u_id='$id'")->result_array()[0]['sum']; 
	   $service_rating = $this->db->query("select count(*) as sum from service_rating where stars='5' and u_id='$id'")->result_array()[0]['sum']; 
	   $totalrating = intval($profile_rating)+intval($service_rating);
       $rank = $this->db->query("select * from rank")->result_array();
       //echo "<pre>";var_dump($rank);
       
    //   if(($totalrating >= 0) && ($totalrating <= 1)){
    //          return $rank[0]['image'];
    //   }else if(($totalrating >= 2) && ($totalrating <= 3)){
    //         return $rank[1]['image'];
    //   }else if($totalrating > 3){
    //         return $rank[2]['image'];
    //   }else if($totalrating > 3){
    //         return $rank[3]['image'];
    //   }else if($totalrating > 3){
    //         return $rank[4]['image'];
    //   }
    
      return $this->db->query("select * from users where u_id='$id'")->result_array()[0]['star'];
       
	}
	
	function payment($postData){
		
		// If post data is not empty
		if(!empty($postData)){
			
			// Add customer to stripe
			$customer = $this->stripe_lib->addCustomer($postData['email'], $postData['stripeToken']);
			
			if($customer){
				// Charge a credit or a debit card
				$charge = $this->stripe_lib->createCharge($customer->id, $postData['reason'],$postData['total_money']);
				
				if($charge){ 
				    //echo "<pre>";var_dump($charge); exit;
					// Check whether the charge is successful
					if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){
					    
						return $charge['id'];
						
					}else{
					    return false;
					}

				}else{
					return false;
				}

			}else{
				return false;
			}
		}else{
			return false;
		}
		
    }
	
	public function accept_proposal_transactions($data){
	    
	    $proposalno = $data['proposal_no'];
	    $total_money = $data['total_money'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $mystatus = $data['my_status'];
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$proposalno."'")->result_array()[0];
        $senderid = $msg_details['send_id'];
        $jobid = $msg_details['job_id'];
        $recv_id = $msg_details['recv_id'];
        
        $this->db->query("update jobs_msgs set custom_status_extent='1',msg_status='Job',proposal_acptnc_date='".gmdate("Y-m-d H:i:s")."' where msg_id='".$proposalno."'");
        $this->db->query("update jobs set job_awarded_to='$senderid' where job_id='$jobid'");
        
        $this->db->query("update jobs_msgs set custom_status_extent='2' where send_id !=$senderid AND job_id = $jobid AND custom_status='Proposal' AND recv_id = $recv_id ");
	        
	   // echo "update jobs_msgs set custom_status_extent='2' where send_id !=$senderid AND job_id = $jobid AND custom_status='Proposal' AND recv_id = $recv_id";
	  
	        
        
        $notification = "Client has accepted your proposal.";
        $username = $this->db->query("select * from users where u_id='".$recv_id."'")->result_array()[0]['username'];
        
        $link = "Chat/index/".$username."/".$msg_details['job_slug'];
        
        $array = array(
                "notification"=>$notification,
                "noti_date"=>gmdate("Y-m-d H:i:s"),
                "noti_recvr_id"=>$senderid,
                "noti_sender_id"=>$recv_id,
                "link"=>$link
              );
              
        $this->Common->insert("notifications",$array);
        
        $this->db->query("update users set notifications=notifications+1 where u_id='$senderid'");
        $this->db->query("delete from transactions where proposal_id='".$proposalno."' and trans_type='proposal_accept'");
        
        if($mystatus==1){
            $array = array(
                    "u_id"=>$recv_id, 
                    "damount"=>$total_money, 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "job_id"=>$jobid,
                    "trans_type"=>"proposal_accept",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "proposal_id"=>$proposalno, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money,
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "job_id"=>$jobid,
                    "trans_type"=>"proposal_accept",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                    "proposal_id"=>$proposalno, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
        
        }


	}
	
	public function accept_dispute_transactions($data){
	    
	    $dispute_id = $data['dispute_id'];
	    $total_money = $data['total_money'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $mystatus = $data['my_status'];
	    
	    $dispute_record = $this->db->query("select * from disputes where dsipute_id='$dispute_id'")->result_array()[0];
	    $who_araised = $dispute_record['u_id'];
	    $service_p_id = $dispute_record['service_p_id'];
	    
        $this->db->query("update disputes set is_paid='Yes' where dsipute_id='".$dispute_id."'");
        
        if($mystatus==1){
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money,
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "trans_type"=>"dispute",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "dispute_id"=>$dispute_id, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
        
        }else{
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money,
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "trans_type"=>"dispute",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "dispute_id"=>$dispute_id, 
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>$who_araised, 
                    "damount"=>"0",
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "trans_type"=>"dispute",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "dispute_id"=>$dispute_id, 
                  );
                  
            $this->Common->insert("transactions",$array);
        }
        
        $service_p_id_query = $this->db->query("select services.*,services_purchased.* from services_purchased inner join services on services_purchased.service_id=services.service_id where services_purchased.id='".$service_p_id."'")->result_array()[0];
    	
    	$slug = $service_p_id_query['service_slug'];
    	$notification = "The issue has been raised on a Service";
    	
    	if($who_araised==$service_p_id_query['service_owner_id']){
    	    $username_query = $this->db->query("select * from users where u_id='".$service_p_id_query['who_purchased']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "ChatServices/index/$username/".$slug."?id=".$service_p_id;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$service_p_id_query['service_owner_id'],
    	                    "noti_sender_id"=>$service_p_id_query['who_purchased'],
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$service_p_id_query['service_owner_id']."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
            
            
            
            $username_query = $this->db->query("select * from users where u_id='".$service_p_id_query['service_owner_id']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "ChatServices/index/$username/".$slug."?id=".$service_p_id;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$service_p_id_query['who_purchased'],
    	                    "noti_sender_id"=>$service_p_id_query['service_owner_id'],
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$service_p_id_query['who_purchased']."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
	    
    	}else{
    	    
    	    $username_query = $this->db->query("select * from users where u_id='".$service_p_id_query['service_owner_id']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "ChatServices/index/$username/".$slug."?id=".$service_p_id;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$service_p_id_query['who_purchased'], 
    	                    "noti_sender_id"=>$service_p_id_query['service_owner_id'],
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$service_p_id_query['who_purchased']."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
            
            
            
            $username_query = $this->db->query("select * from users where u_id='".$service_p_id_query['who_purchased']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "ChatServices/index/$username/".$slug."?id=".$service_p_id;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$service_p_id_query['service_owner_id'],
    	                    "noti_sender_id"=>$service_p_id_query['who_purchased'],
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$service_p_id_query['service_owner_id']."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
    	}
    	
    	$this->db->query("update services_purchased set issue_status = 'Open' where id ='$service_p_id'");
    	
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>0,
	                    "noti_sender_id"=>$who_araised,
	                    "link"=>$link
	                  );
	                  
	    $query = $this->Common->insert("notifications",$array);

	}
	
	public function accept_dispute_transactions_job($data){
	    
	    $dispute_id = $data['dispute_id'];
	    $total_money = $data['total_money'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $mystatus = $data['my_status'];
	    
	    $dispute_record = $this->db->query("select * from disputes where dsipute_id='$dispute_id'")->result_array()[0];
	    $who_araised = $dispute_record['u_id'];
	    $job_id = $dispute_record['job_id'];
	    
        $this->db->query("update disputes set is_paid='Yes' where dsipute_id='".$dispute_id."'");
        
        if($mystatus==1){
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money,
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "trans_type"=>"dispute",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "dispute_id"=>$dispute_id, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
        
        }else{
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money,
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "trans_type"=>"dispute",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "dispute_id"=>$dispute_id, 
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>$who_araised, 
                    "damount"=>"0",
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "trans_type"=>"dispute",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "dispute_id"=>$dispute_id, 
                  );
                  
            $this->Common->insert("transactions",$array);
        }
        
        $job_details = $this->db->query("select * from jobs where job_id='".$job_id."'")->result_array()[0];
    	
    	$slug = $job_details['job_slug'];
    	$notification = "The issue has been raised on a Job";
    	
    	if($who_araised==$job_details['u_id']){
    	    
    	    $username_query = $this->db->query("select * from users where u_id='".$job_details['job_awarded_to']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "Chat/index/".$username."/".$slug;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$who_araised,
    	                    "noti_sender_id"=>$job_details['u_id'],
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$who_araised."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
            
            
            
            $username_query = $this->db->query("select * from users where u_id='".$job_details['u_id']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "Chat/index/$username/".$slug;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$job_details['job_awarded_to'],
    	                    "noti_sender_id"=>$who_araised,
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$job_details['job_awarded_to']."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
	    
    	}else{
    	    
    	    $username_query = $this->db->query("select * from users where u_id='".$job_details['u_id']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "Chat/index/$username/".$slug;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$job_details['job_awarded_to'], 
    	                    "noti_sender_id"=>$job_details['u_id'],
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$job_details['job_awarded_to']."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
            
            
            
            $username_query = $this->db->query("select * from users where u_id='".$job_details['job_awarded_to']."'")->result_array()[0];
    	    $username = $username_query['username'];
    	    
    	    $link = "Chat/index/$username/".$slug;
    	
    	    $array = array(
    	                    "notification"=>$notification,
    	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
    	                    "noti_recvr_id"=>$job_details['u_id'],
    	                    "noti_sender_id"=>$job_details['job_awarded_to'],
    	                    "link"=>$link
    	                  );
    	                  
    	    $query = $this->Common->insert("notifications",$array);
    	    
    	    $this->db->query("update users set notifications=notifications+1 where u_id='".$job_details['u_id']."'");
    	    
    	    $data['email'] = $username_query['email'];
	        $data['username'] = ucfirst($username_query['fname'])." ".$username_query['lname'];
            $data['type'] = "dispute_raised";
			$html = $this->load->view("Job_emails.php",$data,true);
            $emailsent = $this->send_email($username_query['email'],'Gigeconome', $html);
    	}
    	
    	$this->db->query("update jobs set issue_status = 'Open' where job_id ='$job_id'");
    	
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>0,
	                    "noti_sender_id"=>$who_araised,
	                    "link"=>$link
	                  );
	                  
	    $query = $this->Common->insert("notifications",$array);

	}
	
	/// Dispute Refund 
	
	public function dispute_refund_transactions($data){
	    
            $total_money = $data['total_money'];
            $job_id  = $data['job_id'];
            $u_id = $data['u_id'];
            $type = $data['type'];
            if($type == 'job'){
                $array = array(
                        "u_id"=>"0", 
                        "camount"=>$total_money,
                        "damount"=>"0",
                        "totalamt"=>$total_money,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"Yes",
                        "is_clear"=>"No",
                        "job_id"=>$job_id, 
                      );
                      
                $this->Common->insert("transactions",$array);
                
                $array = array(
                        "u_id"=>$u_id, 
                        "camount"=>"0",
                        "damount"=>$total_money,
                        "totalamt"=>$total_money,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "job_id"=>$job_id, 
                      );
                      
                $this->Common->insert("transactions",$array);
            }else{
                
                $service_p_id = $data['service_p_id'];
                
                $array = array(
                        "u_id"=>"0", 
                        "camount"=>$total_money,
                        "damount"=>"0",
                        "totalamt"=>$total_money,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"Yes",
                        "is_clear"=>"No",
                        "service_p_id"=>$service_p_id, 
                      );
                      
                $this->Common->insert("transactions",$array);
                
                $array = array(
                        "u_id"=>$u_id, 
                        "camount"=>"0",
                        "damount"=>$total_money,
                        "totalamt"=>$total_money,
                        "trans_type"=>"dispute_refund",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "service_p_id"=>$service_p_id, 
                      );
                      
                $this->Common->insert("transactions",$array);
                
            }
      

	}
	
	
	/// Dispute Refund 
	
	
	
	public function deposit_amt_transactions($data){
	    
	    $proposalno = $data['proposal_no'];
	    $total_money = $data['total_money'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $my_status = $data['my_status'];
	    
	    $msg_details = $this->db->query("select jobs_msgs.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$proposalno."'")->result_array()[0];
        $senderid = $msg_details['send_id'];
        $jobid = $msg_details['job_id'];
        $recv_id = $msg_details['recv_id'];

        $this->db->query("update jobs_msgs set custom_status_extent='11' where msg_id='".$proposalno."'");
        
        $notification = "Client has deposited amount into escrow on your job.";
        $username = $this->db->query("select * from users where u_id='".$recv_id."'")->result_array()[0]['username'];
        
        $link = "Chat/index/".$username."/".$msg_details['job_slug'];
        
        $array = array(
                "notification"=>$notification,
                "noti_date"=>gmdate("Y-m-d H:i:s"),
                "noti_recvr_id"=>$senderid,
                "noti_sender_id"=>$recv_id,
                "link"=>$link
              );
              
        $this->Common->insert("notifications",$array);
        
        $this->db->query("update users set notifications=notifications+1 where u_id='$senderid'");
        $this->db->query("delete from transactions where proposal_id='".$proposalno."' and trans_type='amt_deposit' and job_id='$jobid'");
        
        if($my_status==1){
           
            $array = array(
                    "u_id"=>$recv_id, 
                    "damount"=>$total_money, 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "job_id"=>$jobid,
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "proposal_id"=>$proposalno, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "job_id"=>$jobid,
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                    "proposal_id"=>$proposalno, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
        
	    }else{
	        
	        $array = array(
                    "u_id"=>$recv_id, 
                    "damount"=>"0", 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "job_id"=>$jobid,
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "proposal_id"=>$proposalno, 
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "job_id"=>$jobid,
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                    "proposal_id"=>$proposalno, 
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
	    }


	}
	
	public function deposit_amt__service_transactions($data){
	    
	    $proposalno = $data['proposal_no'];
	    $total_money = $data['total_money'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $my_status = $data['my_status'];
	    
	    $msg_details = $this->db->query("select services_msgs.*,services.*,services_purchased.* from services_msgs inner join services on services.service_id=services_msgs.service_id inner join services_purchased on services_purchased.id=services_msgs.service_p_id where msg_id='".$proposalno."'")->result_array()[0];
        $senderid = $msg_details['send_id'];
        $jobid = $msg_details['service_id'];
        $recv_id = $msg_details['recv_id'];
        $service_p_id = $msg_details['service_p_id'];

        $this->db->query("update services_msgs set custom_status_extent='11' where msg_id='".$proposalno."'");
        
        $notification = "Client has deposited amount into escrow.";
        $username = $this->db->query("select * from users where u_id='".$recv_id."'")->result_array()[0]['username'];
        
        $link = "ChatServices/index/".$username."/".$msg_details['service_slug']."?id=".$service_p_id;
        
        $array = array(
                "notification"=>$notification,
                "noti_date"=>gmdate("Y-m-d H:i:s"),
                "noti_recvr_id"=>$senderid,
                "noti_sender_id"=>$recv_id,
                "link"=>$link
              );
              
        $this->Common->insert("notifications",$array);
        
        $this->db->query("update users set notifications=notifications+1 where u_id='$senderid'");
        
        if($my_status==1){
           
            $array = array(
                    "u_id"=>$recv_id, 
                    "damount"=>$total_money, 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "service_id"=>$msg_details['service_id'],
                    "service_p_id"=>$msg_details['id'],
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "proposal_id"=>$proposalno, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "service_id"=>$msg_details['service_id'],
                    "service_p_id"=>$msg_details['id'],
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                    "proposal_id"=>$proposalno, 
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
        
	    }else{
	        
	        $array = array(
                    "u_id"=>$recv_id, 
                    "damount"=>"0", 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "service_id"=>$msg_details['service_id'],
                    "service_p_id"=>$msg_details['id'],
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "proposal_id"=>$proposalno, 
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "service_id"=>$msg_details['service_id'],
                    "service_p_id"=>$msg_details['id'],
                    "trans_type"=>"amt_deposit",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                    "proposal_id"=>$proposalno, 
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
	    }


	}
	
	public function servicepurchased_transactions($data){
	    
	    $total_money = $data['total_money'];
	    $service_id = $data['service_id'];
	    $method = $data['method'];
	    $who_purchased = $data['who_purchased'];
	    $adons = $data['adons'];
	    $servicesbuydetails = $data['servicesbuydetails'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $my_status = $data['my_status'];
	    
	    $buyer_data = $this->db->query("Select * from users where u_id = '".$who_purchased."'")->result_array()[0];
        $servicedetail = $this->db->query("Select * from services where service_id = '".$service_id."'")->result_array()[0];
          
	    //$service_owner_id = $this->db->query("select * from services where service_id='".$service_id."'")->result_array()[0]['u_id'];
	    
	    $array = array(
                "service_id"=>$service_id,
                "service_owner_id"=>$servicedetail['u_id'],
                "who_purchased"=>$who_purchased,
                "date"=>gmdate("Y-m-d H:i:s"),
                "status"=>"Ongoing",
                "adons"=>$adons,
                "is_paid"=>"Yes",
                "content"=>$servicesbuydetails,
                "purchase_amount"=>$total_money
              );
              
        $service_purchase_id = $this->Common->insert("services_purchased",$array);
        
        $notification = $buyer_data['f_name']." ".$buyer_data['l_name']." has bought your service ( ".$servicedetail['title']." )";
        
        $link = "ChatServices/index/".$buyer_data['username']."/".$servicedetail['service_slug']."?id=".$service_purchase_id;
                
        
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
        
        $link = "ChatServices/index/".$user_data['username']."/".$servicedetail['service_slug']."?id=".$service_purchase_id;
                
        
        $array = array(
                "notification"=>$notification,
                "noti_date"=>gmdate("Y-m-d H:i:s"),
                "noti_recvr_id"=>$who_purchased,
                "noti_sender_id"=>$servicedetail['u_id'],
                "link"=>$link
              );
              
        $this->Common->insert("notifications",$array);
        
        $this->db->query("update users set notifications=notifications+1 where u_id='".$who_purchased."'");
        
        // $array = array(
        //             "recv_id"=>$servicedetail['u_id'], 
        //             "send_id"=>$who_purchased,
        //             "date"=>gmdate("Y-m-d H:i:s"),
        //             "msg_status"=>"Service",
        //             "custom_status"=>'Service-Purchased',
        //             "custom_status_extent"=>'20',
        //             "service_id"=>$service_id,
        //             "service_p_id"=>$service_purchase_id,
        //             "service_requiremnt"=>$servicesbuydetails,
        //         );
              
        // $this->Common->insert("services_msgs",$array);
        
        if($my_status==1){
            
        
            $array = array(
                    "u_id"=>$who_purchased, 
                    "damount"=>$total_money, 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "service_id"=>$service_id,
                    "service_p_id"=>$service_purchase_id,
                    "trans_type"=>"service_purchased",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "service_id"=>$service_id,
                    "service_p_id"=>$service_purchase_id,
                    "trans_type"=>"service_purchased",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
        
        }else{
            
            $array = array(
                    "u_id"=>$who_purchased, 
                    "damount"=>"0", 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "service_id"=>$service_id,
                    "service_p_id"=>$service_purchase_id,
                    "trans_type"=>"service_purchased",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "service_id"=>$service_id,
                    "service_p_id"=>$service_purchase_id,
                    "trans_type"=>"service_purchased",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"Yes",
                    "is_clear"=>"No",
                  );
                  
            $this->Common->insert("transactions",$array);
        }
        
        return $link;
        
        

	}
	
	public function creditspurchased_transactions($data){
	    
	    $array = array(
                "u_id"=>$data['u_id'],
                "credits"=>$data['credits'],
                "is_paid"=>"Yes",
                "date"=>date("Y-m-d H:i:s"),
                "used"=>"0",
              );
              
        $credit_purchase_id = $this->Common->insert("proposal_credits",$array);

        $array = array(
                "u_id"=>$data['u_id'], 
                "damount"=>$data['total_money'], 
                "camount"=>$data['total_money'],
                "totalamt"=>$data['total_money'],
                "proposal_credits_purchase_id"=>$credit_purchase_id,
                "trans_type"=>"prop_credits_purchased",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes",
                "pg_transaction_id"=>$data['paymentid'],
                "payment_gateway"=>$data['method']
              );
              
        $this->Common->insert("transactions",$array);
        
        $array = array(
                "u_id"=>"0", 
                "damount"=>$data['total_money'],
                "camount"=>"0",
                "totalamt"=>$data['total_money'],
                "proposal_credits_purchase_id"=>$credit_purchase_id,
                "trans_type"=>"prop_credits_purchased",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes", 
                "pg_transaction_id"=>$data['paymentid'],
                "payment_gateway"=>$data['method']
              );
              
        $this->Common->insert("transactions",$array);


	}
	
	
	public function featureproposal_transactions($data){
	    
	    $total_money = $data['total_money'];
	    $proposalno = $data['proposalno'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $my_status = $data['my_status'];
	    $u_id = $this->db->query("select * from jobs_msgs where msg_id='$proposalno'")->result_array()[0]['send_id'];
	    
	    
	    $this->db->query("update jobs_msgs set is_featured='0' where msg_id='".$proposalno."'");
        $this->db->query("delete from transactions where proposal_featured_id='".$proposalno."' and trans_type='feature_proposal'");
        
        if($my_status==1){
            
        
            $array = array(
                    "u_id"=>$u_id, 
                    "damount"=>$total_money, 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "proposal_featured_id"=>$proposalno,
                    "trans_type"=>"feature_proposal",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "proposal_featured_id"=>$proposalno,
                    "trans_type"=>"feature_proposal",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
        
	    }else{
	        
	        $array = array(
                    "u_id"=>$u_id, 
                    "damount"=>"0", 
                    "camount"=>$total_money,
                    "totalamt"=>$total_money,
                    "proposal_featured_id"=>$proposalno,
                    "trans_type"=>"feature_proposal",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$total_money, 
                    "camount"=>"0",
                    "totalamt"=>$total_money,
                    "proposal_featured_id"=>$proposalno,
                    "trans_type"=>"feature_proposal",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
	    }

	}
	
	public function featureprofile_transactions($data){
	    
	    $u_id = $data['u_id'];
	    $month = $data['custom'];
	    $today_date = gmdate("Y-m-d H:i:s");
	    $totalamt = $data['total_money'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $my_status = $data['my_status'];
	    
	    $chk_if_already_featured = $this->db->query("select * from profile_featured where end_date >= '$today_date' order by id desc limit 1");
	    if($chk_if_already_featured->num_rows() > 0){
	        $get_end_Date = $chk_if_already_featured->result_array()[0]['end_date'];
	        $start_Date = date('Y-m-d H:i:s',strtotime($get_end_Date . "+1 days"));
	        $end_date = date("Y-m-d H:i:s", strtotime("+".$month." month", strtotime($start_Date)));
	        
	    }else{
	        $start_Date = gmdate("Y-m-d H:i:s");
	        $end_date = date("Y-m-d H:i:s", strtotime("+".$month." month", strtotime($start_Date)));
	    }
	    
	    $array = array(
                "u_id"=>$u_id, 
                "start_date"=>$start_Date, 
                "end_date"=>$end_date,
              );
              
        $profile_featured_id = $this->Common->insert("profile_featured",$array);
        
	    if($my_status==1){
	        
            $array = array(
                    "u_id"=>$u_id, 
                    "damount"=>$totalamt, 
                    "camount"=>$totalamt,
                    "totalamt"=>$totalamt,
                    "profile_featured_id"=>$profile_featured_id,
                    "trans_type"=>"Profile_featured",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                "u_id"=>"0", 
                "damount"=>$totalamt,
                "camount"=>"0",
                "totalamt"=>$totalamt,
                "profile_featured_id"=>$profile_featured_id,
                "trans_type"=>"Profile_featured",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes", 
                "pg_transaction_id"=>$paymentid,
                "payment_gateway"=>$method
              );
        
	    }else if($my_status==2){
	        
	        $array = array(
                    "u_id"=>$u_id, 
                    "damount"=>"0", 
                    "camount"=>$totalamt,
                    "totalamt"=>$totalamt,
                    "profile_featured_id"=>$profile_featured_id,
                    "trans_type"=>"Profile_featured",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                "u_id"=>"0", 
                "damount"=>$totalamt,
                "camount"=>"0",
                "totalamt"=>$totalamt,
                "profile_featured_id"=>$profile_featured_id,
                "trans_type"=>"Profile_featured",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes", 
                "payment_gateway"=>$method
              );
            
	    }
        
        
              
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update users set is_featured='1' where u_id='$u_id'");


	}
	
	public function featureservice_transactions($data){
	    
	    $u_id = $data['u_id'];
	    $month = $data['month'];
	    $service_id = $data['service_id'];
	    $today_date = gmdate("Y-m-d H:i:s");
	    $totalamt = $data['total_money'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $my_status = $data['my_status'];
	    
	    $chk_if_already_featured = $this->db->query("select * from services_featured where end_date >= '$today_date' order by id desc limit 1");
	    if($chk_if_already_featured->num_rows() > 0){
	        $get_end_Date = $chk_if_already_featured->result_array()[0]['end_date'];
	        $start_Date = date('Y-m-d H:i:s',strtotime($get_end_Date . "+1 days"));
	        $end_date = date("Y-m-d H:i:s", strtotime("+".$month." month", strtotime($start_Date)));
	        
	    }else{
	        $start_Date = gmdate("Y-m-d H:i:s");
	        $end_date = date("Y-m-d H:i:s", strtotime("+".$month." month", strtotime($start_Date)));
	    }
	    
	    $array = array(
                "service_id"=>$service_id, 
                "start_date"=>$start_Date, 
                "end_date"=>$end_date,
              );
              
        $service_featured_id = $this->Common->insert("services_featured",$array);
        
	    if($my_status==1){
	        
            $array = array(
                    "u_id"=>$u_id, 
                    "damount"=>$totalamt, 
                    "camount"=>$totalamt,
                    "totalamt"=>$totalamt,
                    "service_id"=>$service_id,
                    "service_featured_id"=>$service_featured_id,
                    "trans_type"=>"services_featured",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$totalamt,
                    "camount"=>"0",
                    "totalamt"=>$totalamt,
                    "service_id"=>$service_id,
                    "service_featured_id"=>$service_featured_id,
                    "trans_type"=>"services_featured",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$paymentid,
                    "payment_gateway"=>$method
                  );
        
	    }else if($my_status==2){
	        
	        $array = array(
                    "u_id"=>$u_id, 
                    "damount"=>"0", 
                    "camount"=>$totalamt,
                    "totalamt"=>$totalamt,
                    "service_id"=>$service_id,
                    "service_featured_id"=>$service_featured_id,
                    "trans_type"=>"services_featured",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "payment_gateway"=>$method
                  );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                    "u_id"=>"0", 
                    "damount"=>$totalamt,
                    "camount"=>"0",
                    "totalamt"=>$totalamt,
                    "service_id"=>$service_id,
                    "service_featured_id"=>$service_featured_id,
                    "trans_type"=>"services_featured",
                    "date"=>gmdate("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "payment_gateway"=>$method
                  );
            
	    }
        
        
              
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update services set is_service_featured='1' where service_id='$service_id'");


	}
	
	
	public function job_escrow_amt($jobid,$date){
	    
	    if(empty($date)){
	        $date=date("Y-m-d");
	    }
	    
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where job_id='$jobid' and u_id='0' and in_escrow='Yes' and left(date,10) <= '$date'")->result_array()[0]['amt'];
	    return $amt;
	}
	
	public function amt_released_job($jobid,$u_id){
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where job_id='$jobid' and u_id='".$u_id."' and is_clear='Yes'")->result_array()[0]['amt'];
	    $deducation_percentage = 100 - ($this->db->query("select * from general where id='9'")->result_array()[0]['price']);
	    return $amt/$deducation_percentage*100;
	    
	}
	
	public function amt_released_service($jobid,$u_id){
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where service_p_id='$jobid' and u_id='".$u_id."' and is_clear='Yes'")->result_array()[0]['amt'];
	    $deducation_percentage = 100 - ($this->db->query("select * from general where id='9'")->result_array()[0]['price']);
	    return $amt/$deducation_percentage*100;
	    
	}
	
	public function service_escrow_amt($servicepid){	    
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where service_p_id='$servicepid' and u_id='0' and in_escrow='Yes'")->result_array()[0]['amt'];	    
	    return $amt;	    	
	    
	}
	
	public function total_amt_released_of_job($jobid){
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where job_id='$jobid' and u_id='0' and in_escrow='Yes'")->result_array()[0]['amt'];
	    return $amt;
	    
	}
	
	public function mytotal_escrow_amt($u_id){
	    $escrow_amt=0;
	    $totaljobs = $this->db->query("select * from jobs where job_awarded_to='".$u_id."'")->result_array();
	    foreach($totaljobs as $key=>$value){
	        $escrow_amt += $this->job_escrow_amt($value['job_id'],date("Y-m-d"));
	    }
	    
	    return $escrow_amt;
	    
	}
	
	public function myblnc($u_id){
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where u_id='$u_id' and in_escrow='No' and is_clear='Yes'")->result_array()[0]['amt'];
	    return intval($amt);
	    
	}
	
	public function myproposalleft($u_id){
	    $proposal = $this->db->query("select sum(credits-used) as proposal from proposal_credits where u_id='$u_id'")->result_array()[0]['proposal'];
	    return intval($proposal);
	    
	}
	
	public function jobadons_transactions($data){
	    
	    $total_money = $data['total_money'];
	    $job_id = $data['job_id'];
	    $paymentid = $data['paymentid'];
	    $method = $data['method'];
	    $my_status = $data['my_status'];
	    
        $user = $this->db->query("select * from jobs where job_id='".$job_id."'")->result_array()[0]['u_id'];
	    
	    if($my_status==1){
    	    $array = array(
                        "u_id"=>"0", 
                        "damount"=>$total_money,
                        "camount"=>"0",
                        "totalamt"=>$total_money,
                        "job_id"=>$job_id,
                        "trans_type"=>"jobs_adons",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "pg_transaction_id"=>$paymentid,
                        "payment_gateway"=>$method
                    );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                        "u_id"=>$user, 
                        "damount"=>$total_money,
                        "camount"=>$total_money,
                        "totalamt"=>$total_money,
                        "job_id"=>$job_id,
                        "trans_type"=>"jobs_adons",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "pg_transaction_id"=>$paymentid,
                        "payment_gateway"=>$method
                    );
                  
            $this->Common->insert("transactions",$array);
        
	    }else{
	        
	        $array = array(
                        "u_id"=>"0", 
                        "damount"=>$total_money,
                        "camount"=>"0",
                        "totalamt"=>$total_money,
                        "job_id"=>$job_id,
                        "trans_type"=>"jobs_adons",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "payment_gateway"=>$method
                    );
                  
            $this->Common->insert("transactions",$array);
            
            $array = array(
                        "u_id"=>$user, 
                        "damount"=>"0",
                        "camount"=>$total_money,
                        "totalamt"=>$total_money,
                        "job_id"=>$job_id,
                        "trans_type"=>"jobs_adons",
                        "date"=>gmdate("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                        "payment_gateway"=>$method
                    );
                  
            $this->Common->insert("transactions",$array);
	    }
        
        $this->db->query("update jobs set privilidge_status='Pending' where job_id='".$job_id."'");
        $this->db->query("update jobs_type set is_paid='Yes' where job_id='".$job_id."'");
	}
	
	public function accept_invoice_transaction($mydata,$date){
	   // echo "<pre>";var_dump($mydata);exit;
	   
	   $msg_id = $mydata['msg_id'];
	    
	    $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='".$msg_id."'")->result_array()[0];
	    
	    if($data['record']['marked_as_complete'] == 'yes'){
	        $this->db->query("update jobs set job_status = 'Completed' where job_id=".$data['record']['job_id']);
	    }
        
	    $escrowamt = $this->Common->job_escrow_amt($data['record']['job_id'],$date);
	    
	    $array = array(
                "u_id"=>"0", 
                "damount"=>"0",
                "camount"=>$data['record']['invc_amt'],
                "totalamt"=>$data['record']['invc_amt'],
                "job_id"=>$data['record']['job_id'],
                "trans_type"=>"invoice_acept",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"Yes",
                "is_clear"=>"No",
            );
              
        $this->Common->insert("transactions",$array);
        
        $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $data['record']['invc_amt'] * $deductionperc/100;
        
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $data['record']['invc_amt'] - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update jobs_msgs set custom_status_extent='5' where msg_id='$msg_id'");
        
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $get_clientname = $this->db->query("select * from users where u_id='".$data['record']['recv_id']."'")->result_array()[0];
        $clientname = ucwords($get_clientname['f_name']." ".$get_clientname['l_name']);
        
        $notification = $clientname." has accepted your invoice.";
        
	    $job_details = $this->db->query("select users.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id inner join users on users.u_id=jobs.u_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];

	    $link = "Chat/index/".$job_details['username']."/".$job_details['job_slug'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
	    
	   	    

	}
	
	public function accept_invoice_transaction_service_new($mydata){
	   //echo "<pre>";var_dump($mydata);exit;
	   
	    $msg_id = $mydata['msg_id'];
	    
	    $data['record'] = $this->db->query("select * from services_msgs where msg_id='".$msg_id."'")->result_array()[0];
        
	    $escrowamt = $this->Common->service_escrow_amt($data['record']['service_p_id']);
	    
	    $array = array(
                "u_id"=>"0", 
                "damount"=>"0",
                "camount"=>$data['record']['invc_amt'],
                "totalamt"=>$data['record']['invc_amt'],
                "service_id"=>$data['record']['service_id'],
                "service_p_id"=>$data['record']['service_p_id'],
                "trans_type"=>"invoice_acept",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"Yes",
                "is_clear"=>"No",
            );
              
        $this->Common->insert("transactions",$array);
        
        $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $data['record']['invc_amt'] * $deductionperc/100;
        
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $data['record']['invc_amt'] - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update services_msgs set custom_status_extent='5' where msg_id='$msg_id'");
        
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $get_clientname = $this->db->query("select * from users where u_id='".$data['record']['recv_id']."'")->result_array()[0];
        $clientname = ucwords($get_clientname['f_name']." ".$get_clientname['l_name']);
        
        $notification = $clientname." has accepted your invoice.";
        
	    $job_details = $this->db->query("select users.*,services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id inner join users on users.u_id=services_msgs.recv_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];

	    $link = "ChatServices/index/".$job_details['username']."/".$job_details['service_slug']."?id=".$data['record']['service_p_id'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	   	    

	}
	
	public function accept_invoice_transaction__service_second_new($mydata){
	    
	    $msg_id = $mydata['proposal_no'];
	    $total_money = $mydata['total_money'];
	    $my_status = $mydata['my_status'];
	    
	    $data['record'] = $this->db->query("select * from services_msgs where msg_id='".$msg_id."'")->result_array()[0];
	    
	    $escrowamt = $this->Common->service_escrow_amt($data['record']['service_p_id']);
	    $array = array(
                "u_id"=>"0", 
                "damount"=>"0",
                "camount"=>$escrowamt,
                "totalamt"=>$escrowamt,
                "service_id"=>$data['record']['service_id'],
                "service_p_id"=>$data['record']['service_p_id'],
                "trans_type"=>"invoice_acept",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"Yes",
                "is_clear"=>"No",
            );
              
        $this->Common->insert("transactions",$array);
        
        $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $escrowamt * $deductionperc/100;
        
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $escrowamt - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update services_msgs set custom_status_extent='5' where msg_id='$msg_id'");
        
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $get_clientname = $this->db->query("select * from users where u_id='".$data['record']['recv_id']."'")->result_array()[0];
        $clientname = ucwords($get_clientname['f_name']." ".$get_clientname['l_name']);
        
        $notification = $clientname." has accepted your invoice.";
        
	    $job_details = $this->db->query("select users.*,services_msgs.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id inner join users on users.u_id=services_msgs.recv_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];

	    $link = "Chat/index/".$job_details['username']."/".$job_details['job_slug'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
	    $deductionamt = $total_money * $deductionperc/100;
	    $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
              
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $total_money - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
            
	    if($my_status==2){
	        
            $array = array(
                "u_id"=>$data['record']['recv_id'], 
                "damount"=>"0",
                "camount"=>$total_money,
                "totalamt"=>$earnedamt,
                "service_id"=>$data['record']['service_id'],
                "service_p_id"=>$data['record']['service_p_id'],
                "trans_type"=>"invoice_acept",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes",
              );
              
            $this->Common->insert("transactions",$array);
            
	    }
	    

	}
	
	
	
	public function accept_invoice_transaction_second($mydata){
	    
	    $msg_id = $mydata['proposal_no'];
	    $total_money = $mydata['total_money'];
	    $my_status = $mydata['my_status'];
	    
	    $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='".$msg_id."'")->result_array()[0];
	    if($data['record']['marked_as_complete'] == 'yes'){
	        $this->db->query("update jobs set job_status = 'Completed' where job_id=".$data['record']['job_id']);
	    }
        			    
	    $escrowamt = $this->Common->job_escrow_amt($data['record']['job_id'],date("Y-m-d"));
	    $array = array(
                "u_id"=>"0", 
                "damount"=>"0",
                "camount"=>$escrowamt,
                "totalamt"=>$escrowamt,
                "job_id"=>$data['record']['job_id'],
                "trans_type"=>"invoice_acept",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"Yes",
                "is_clear"=>"No",
            );
              
        $this->Common->insert("transactions",$array);
        
        $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $escrowamt * $deductionperc/100;
        
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $escrowamt - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update jobs_msgs set custom_status_extent='5' where msg_id='$msg_id'");
        
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $get_clientname = $this->db->query("select * from users where u_id='".$data['record']['recv_id']."'")->result_array()[0];
        $clientname = ucwords($get_clientname['f_name']." ".$get_clientname['l_name']);
        
        $notification = $clientname." has accepted your invoice.";
        
	    $job_details = $this->db->query("select users.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id inner join users on users.u_id=jobs.u_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];

	    $link = "Chat/index/".$job_details['username']."/".$job_details['job_slug'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
	    $deductionamt = $total_money * $deductionperc/100;
	    $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
              
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $total_money - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
            
	    if($my_status==2){
	        
            $array = array(
                "u_id"=>$data['record']['recv_id'], 
                "damount"=>"0",
                "camount"=>$total_money,
                "totalamt"=>$earnedamt,
                "job_id"=>$data['record']['job_id'],
                "trans_type"=>"invoice_acept",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes",
              );
              
            $this->Common->insert("transactions",$array);
            
	    }
	    

	}	
	
	///// for services invoice accept
	public function accept_invoice_transaction_service($mydata){
	   // echo "<pre>";var_dump($mydata);exit;
	   
	     $msgs= $mydata['record'];
	     $msg_id = $msgs['msg_id'];
	    
	     $data['record'] = $this->db->query("select * from services_msgs where msg_id='".$msg_id."'")->result_array()[0];
        
	    $escrowamt = $this->Common->job_escrow_amt($data['record']['service_id']);
	    
	    $array = array(
                "u_id"=>"0", 
                "damount"=>"0",
                "camount"=>$data['record']['invc_amt'],
                "totalamt"=>$data['record']['invc_amt'],
                "service_id"=>$data['record']['service_id'],
                "trans_type"=>"invoice_acept",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"Yes",
                "is_clear"=>"No",
            );
              
        $this->Common->insert("transactions",$array);
        
        $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $data['record']['invc_amt'] * $deductionperc/100;
        
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "service_id"=>$data['record']['service_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $data['record']['invc_amt'] - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "service_id"=>$data['record']['service_id'],
            "trans_type"=>"invoice_acept",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"No",
          );
          
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update services_msgs set custom_status_extent='5' where msg_id='$msg_id'");
        
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $get_clientname = $this->db->query("select * from users where u_id='".$data['record']['recv_id']."'")->result_array()[0];
        $clientname = ucwords($get_clientname['f_name']." ".$get_clientname['l_name']);
        
        $notification = $clientname." has accepted your invoice.";
        
	    $service_details = $this->db->query("select users.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id inner join users on users.u_id=services.u_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];
		
	    $username = $this->db->query("Select username from users where u_id=".$this->session->userdata("user")."")->result_array()[0];
		
	    $link = "ChatServices/index/".$username."/".$service_details['service_slug'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	   	    

	}
	
	//// service transaction invoice 	
	public function accept_invoice_transaction_second_services($mydata){
		//var_dump($mydata);		die;
	    $msg_id = $mydata['proposal_no'];
	    $data['record'] = $this->db->query("select * from services_msgs where msg_id='".$msg_id."'")->result_array()[0];	    	  
		$escrowamt = $this->Common->service_escrow_amt($data['record']['service_id']);
	    $array = array(             
		"u_id"=>"0",      
		"damount"=>"0",   
		"camount"=>$escrowamt,    
		"totalamt"=>$escrowamt,     
		"service_id"=>$data['record']['service_id'],   
		"trans_type"=>"invoice_acept",             
		"date"=>gmdate("Y-m-d H:i:s"),      
		"in_escrow"=>"Yes",              
		"is_clear"=>"No",            );   
		$this->Common->insert("transactions",$array);   
		$deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $escrowamt * $deductionperc/100;   
		$array = array(            
		"u_id"=>"0",  
		"damount"=>$deductionamt,  
		"camount"=>"0",           
		"totalamt"=>$deductionamt, 
		"service_id"=>$data['record']['service_id'],
		"trans_type"=>"invoice_acept", 
		"date"=>date("Y-m-d H:i:s"),       
		"in_escrow"=>"No",   
		"is_clear"=>"Yes", 
		);                 
		$this->Common->insert("transactions",$array);    
		$earnedamt = $escrowamt - $deductionamt;     
		$array = array(            
		"u_id"=>$data['record']['send_id'],  
		"damount"=>$earnedamt,     
		"camount"=>"0",         
		"totalamt"=>$earnedamt, 
		"service_id"=>$data['record']['service_id'],  
		"trans_type"=>"invoice_acept",      
		"date"=>date("Y-m-d H:i:s"),   
		"in_escrow"=>"No",       
		"is_clear"=>"No",      
		);                
		$this->Common->insert("transactions",$array);
		$this->db->query("update services_msgs set custom_status_extent='5' where msg_id='$msg_id'");            
		$this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");    
		
		$gerclient = $this->db->query("select * from users where u_id='".$data['record']['recv_id']."'")->result_array()[0];
		$clientname = ucwords($gerclient['f_name']." ".$gerclient['l_name']);
		
		$notification = $clientname." has accepted your Service invoice.";
		
		$service_details = $this->db->query("select users.*,services.* from services_msgs inner join services on services.service_id=services_msgs.service_id inner join users on users.u_id=services.u_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];
		
	    $username = $this->db->query("Select username from users where u_id=".$this->session->userdata("user")."")->result_array()[0];
		
		$link = "ChatServices/index/".$username."/".$service_details['service_slug'];	    $array = array(	           
		"notification"=>$notification,	
		"noti_date"=>date("Y-m-d H:i:s"),
		"noti_recvr_id"=>$data['record']['send_id'],	
		"noti_sender_id"=>$data['record']['recv_id'],	
		"link"=>$link	   
		);	                  	  
		$this->Common->insert("notifications",$array);	 
		$deductionamt = $mydata['total_money'] * $deductionperc/100;	  
		$array = array(            
		"u_id"=>"0",           
		"damount"=>$deductionamt, 
		"camount"=>"0",          
		"totalamt"=>$deductionamt, 
		"service_id"=>$data['record']['service_id'],
		"trans_type"=>"invoice_acept",   
		"date"=>date("Y-m-d H:i:s"),      
		"in_escrow"=>"No",      
		"is_clear"=>"Yes",    
		);                  
		$this->Common->insert("transactions",$array);    
		$earnedamt = $mydata['total_money'] - $deductionamt; 
		$array = array(            
		"u_id"=>$data['record']['send_id'],
		"damount"=>$earnedamt,            
		"camount"=>"0",            
		"totalamt"=>$earnedamt, 
		"service_id"=>$data['record']['service_id'],     
		"trans_type"=>"invoice_acept",            
		"date"=>date("Y-m-d H:i:s"),         
		"in_escrow"=>"No",
		"is_clear"=>"No");           
		$this->Common->insert("transactions",$array);	        
	}
	
	public function accept_tip_transaction($mydata){
	    
	    $msgid = $mydata['msg_id'];
	    $total_money = $mydata['total_money'];
	    $my_status = $mydata['my_status'];
	    
	    $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
	    
	    $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $total_money * $deductionperc/100;
        
        $this->db->query("delete from transactions where job_id='".$data['record']['job_id']."' and proposal_id='$msgid' and trans_type='tip_amt'");
        
	    
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "job_id"=>$data['record']['job_id'],
            "proposal_id"=>$msgid,
            "trans_type"=>"tip_amt",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $total_money - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "job_id"=>$data['record']['job_id'],
            "proposal_id"=>$msgid,
            "trans_type"=>"tip_amt",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        if($my_status==2){
            $array = array(
                "u_id"=>$data['record']['recv_id'], 
                "damount"=>"0",
                "camount"=>$total_money,
                "totalamt"=>$total_money,
                "job_id"=>$data['record']['job_id'],
                "proposal_id"=>$msgid,
                "trans_type"=>"tip_amt",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes",
              );
              
            $this->Common->insert("transactions",$array);
        }
        
        $this->db->query("update jobs_msgs set tip_amt='$earnedamt' where msg_id='$msgid'");
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $notification = "Client has given you a tip of $earnedamt.";
        
	    $job_details = $this->db->query("select users.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id inner join users on users.u_id=jobs.u_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];

	    $link = "Chat/index/".$job_details['username']."/".$job_details['job_slug'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
    	    

	}
    
    public function accept_tip_transaction_service($mydata){
	    
	    $msgid = $mydata['msg_id'];
	    $total_money = $mydata['total_money'];
	    $my_status = $mydata['my_status'];
	    
	    $data['record'] = $this->db->query("select * from services_msgs where msg_id='$msgid'")->result_array()[0];
	    
	    $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $total_money * $deductionperc/100;
        
        $this->db->query("delete from transactions where service_p_id='".$data['record']['service_p_id']."' and proposal_id='$msgid' and trans_type='tip_amt'");
        
	    
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "proposal_id"=>$msgid,
            "trans_type"=>"tip_amt",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $total_money - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "service_id"=>$data['record']['service_id'],
            "service_p_id"=>$data['record']['service_p_id'],
            "proposal_id"=>$msgid,
            "trans_type"=>"tip_amt",
            "date"=>gmdate("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        if($my_status==2){
            $array = array(
                "u_id"=>$data['record']['recv_id'], 
                "damount"=>"0",
                "camount"=>$total_money,
                "totalamt"=>$total_money,
                "service_id"=>$data['record']['service_id'],
                "service_p_id"=>$data['record']['service_p_id'],
                "proposal_id"=>$msgid,
                "trans_type"=>"tip_amt",
                "date"=>gmdate("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes",
              );
              
            $this->Common->insert("transactions",$array);
        }
        
        $this->db->query("update services_msgs set tip_amt='$earnedamt' where msg_id='$msgid'");
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $notification = "Client has given you a tip of $earnedamt.";
        
	    $detail = $this->db->query("select users.*,services.*,services_msgs.* from services_msgs inner join users on users.u_id=services_msgs.send_id inner join services on services.service_id=services_msgs.service_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];
    	
	    $link = "ChatServices/index/".$detail['username']."/".$detail['service_slug']."?id=".$data['record']['service_p_id'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>gmdate("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
    	    

	}

	

	
}





?>