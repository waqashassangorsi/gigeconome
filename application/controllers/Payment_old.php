<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
			$this->load->library('Uploadimage');
		$this->checksession();
		 $this->load->library('Check');
		 $this->load->model('Common');
	}
	
	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}

	public function index()
	{ 
		$userid = $this->session->userdata("user");
		$data['security_questions'] = $this->db->query("select * from security_questions")->result_array();
		$data['myblnc'] = $this->Common->myblnc($userid);
		
		$data['userdata']=$this->db->query("select * from users where u_id='$userid'")->row();
		
		$data['userdata2']=$this->db->query("select * from users where u_id='$userid'")->result_array()[0];
		
		
		$data['withdrawal1']=$this->db->query("select * from withdrawal where u_id='$userid'")->result_array();
		$data['payment_gateway']=$this->db->query("select * from payment_gateway")->result_array();
	
		
		$myjobs_buyer = $this->db->query("select * from jobs where u_id='$userid'")->result_array();
		
		$data['document_detail'] = $this->db->query("select * from doc_recived where u_id='$userid'")->result_array()[0]['status'];
		$data['document_detail2'] = $this->db->query("select * from doc_recived where u_id='$userid'")->row();
	//	$data['user_document_detail'] = $this->db->query("select * from users where u_id='$userid'")->result_array()[0]['is_withdrawaldoc_approved'];
 
		foreach($myjobs_buyer as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where job_id='".$value['job_id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		
		$myjobs_buyer = $this->db->query("select * from services_purchased where who_purchased='$userid'")->result_array();
		foreach($myjobs_buyer as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where service_p_id='".$value['id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		$data['buyerescrow'] = $totalamt;
		
		$myjobs = $this->db->query("select * from jobs where job_awarded_to='$userid'")->result_array();
	    $totalamt = 0;
		foreach($myjobs as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where job_id='".$value['job_id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		
		$myjobs = $this->db->query("select * from services_purchased where service_owner_id='$userid'")->result_array();
		foreach($myjobs as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where service_p_id='".$value['id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		$data['freelancerescrow'] = $totalamt;
		
		
		$data['transactions_available_money'] = $this->db->query("SELECT *  FROM `transactions` WHERE `u_id` = $userid And damount != camount AND in_escrow='No' AND is_clear='Yes'  order by date desc" )->result_array();;
	
	    
	    foreach($myjobs as $key=>$value){
	        
		 $myescrow[] = $this->db->query("SELECT transactions.*,jobs.job_title,jobs.job_slug  FROM `transactions` join jobs on jobs.job_id = transactions.job_id  WHERE transactions.job_id='".$value['job_id']."' and transactions.u_id='0' and transactions.in_escrow='Yes' and transactions.is_clear='No' order by date desc")->result_array();
		
	    }
	    
	    $data['transactions_seller_escrow'] = $myescrow;
	    
	    foreach($myjobs_buyer as $key=>$value){
	        
		 $mybuyerescrow[] = $this->db->query("SELECT transactions.*,jobs.job_title,jobs.job_slug  FROM `transactions` join jobs on jobs.job_id = transactions.job_id  WHERE transactions.job_id='".$value['job_id']."' and transactions.u_id='0' and transactions.in_escrow='Yes' and transactions.is_clear='No' order by date desc")->result_array();
		
	    }
		$data['transactions_buyer_escrow'] = $mybuyerescrow;
		
		
		$this->load->view("Payment", $data);

		
	}
	
	public  function insertdoc()
	{
	      $u_id=$this->session->userdata('user');
	      if($_FILES['newdocument']['size'][0] > 0){ 
            
			$directory = 'uploads/';
			$alowedtype = "jpeg|jpg|png";
			$results = $this->uploadimage->uploadfile($directory,$alowedtype,"newdocument");
			if($results){
			    //echo "<pre>";var_dump($results);exit;
				$i=0;
				foreach($results as $key => $value) {
				    
				    if(empty($value['file_name']) || ($value['file_name'])==""){
        		        continue;
        		    }
        		    
					$portfolio = $directory.$results[$key]['raw_name']."_thumb".$results[$key]['file_ext'];

					$array = array(
									"document"=>$portfolio,
									"u_id"=>$this->session->userdata("user"),
									"status"=>"Pending",
								  );

				 $insert=$this->Common->insert("doc_recived",$array);	
					$i++;			  
				}
				
				
    // 			$array_attachment = array(
    //             "is_withdrawaldoc_approved"=>$insert,
    //             );
                
    //             $this->db->where('u_id',$u_id);    
    //             $test = $this->db->update("users",$array_attachment);
				
				if($insert){
				     $this->session->set_flashdata("success","Document Uploaded Successfully.");
				     	redirect(SURL.'Payment');
				 }else
				 {
				      $this->session->set_flashdata("fail","Something went wrong.");
				      	redirect(SURL.'Payment');
				 }
				
			}			
			
		}else{
		            $this->session->set_flashdata("fail","Something went wrong.");
				     redirect(SURL.'Payment');   
		 }
		
		
	 
	  
	}
	
	// Export data in CSV format 
      public function exportCSV($type){ 
          
       $userid = $this->session->userdata("user");
       
       $usersData = array();
       // file name 
       $filename = 'Transaction'.date('Ymd').'.csv'; 
       header("Content-Description: File Transfer"); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/csv; ");
       
       // get data 
      // $usersData = $this->Main_model->getUserDetails();
    
       // file creation 
       $file = fopen('php://output', 'w');
       
        if($type == 'myblnc'){
            
         $header = array("Date","Detail","Amount");
         
         $myData = $this->db->query("SELECT date,trans_type,camount,damount  FROM `transactions` WHERE `u_id` = $userid And damount != camount AND in_escrow='No' AND is_clear='Yes'  order by date desc" )->result_array();;
	       
	     foreach($myData as $trans){
	            
	        $date=   date_create($trans['date']);
            $date =  date_format($date,"d M Y");
	        
	         if($trans['camount'] > 0){
                     $price = "$".number_format($trans['camount'],2);
                 }else{
                     $price = "$".number_format($trans['damount'],2);
                 }
                 
    		 $usersData[] = array(
    		        'date'=>$date,
    		        'detail'=>$trans['trans_type'],
    		        'amount'=>$price
    		     );
	        
	        
	        }
	        
         
        }else if($type == 'freelance_escrow'){
            
             $header = array("Date","Job Title","Detail","Amount"); 
        $myjobs = $this->db->query("select * from jobs where job_awarded_to='$userid'")->result_array();
        foreach($myjobs as $key=>$value){
	        
		 $mybuyerescrow = $this->db->query("SELECT transactions.*,jobs.job_title,jobs.job_slug  FROM `transactions` join jobs on jobs.job_id = transactions.job_id  WHERE transactions.job_id='".$value['job_id']."' and transactions.u_id='0' and transactions.in_escrow='Yes' and transactions.is_clear='No' order by date desc")->result_array();
		 
    		 foreach($mybuyerescrow as $trans){
    		     
                if($trans['camount'] > 0){
                     $price = "$".number_format($trans['camount'],2);
                 }else{
                     $price = "$".number_format($trans['damount'],2);
                 }
    		                  $date=date_create($trans['date']);
                             $date =  date_format($date,"d M Y");
    		 $usersData[] = array(
    		        'date'=>$date,
    		        'job_title'=>$trans['job_title'],
    		        'detail'=>$trans['trans_type'],
    		        'amount'=>$price
    		     );
    		 
    		 }
	     }
             
             
             
            
        }else if($type == 'buyer_escrow'){
            
        $header = array("Date","Job Title","Detail","Amount"); 
             
        $myjobs_buyer = $this->db->query("select * from jobs where u_id='$userid'")->result_array();
		
        foreach($myjobs_buyer as $key=>$value){
	        
		 $mybuyerescrow = $this->db->query("SELECT transactions.*,jobs.job_title,jobs.job_slug  FROM `transactions` join jobs on jobs.job_id = transactions.job_id  WHERE transactions.job_id='".$value['job_id']."' and transactions.u_id='0' and transactions.in_escrow='Yes' and transactions.is_clear='No' order by date desc")->result_array();
		 
    		 foreach($mybuyerescrow as $trans){
    		     
                if($trans['camount'] > 0){
                     $price = "$".number_format($trans['camount'],2);
                 }else{
                     $price = "$".number_format($trans['damount'],2);
                 }
    		                  $date=date_create($trans['date']);
                             $date =  date_format($date,"d M Y");
    		 $usersData[] = array(
    		        'date'=>$date,
    		        'job_title'=>$trans['job_title'],
    		        'detail'=>$trans['trans_type'],
    		        'amount'=>$price
    		     );
    		 
    		 }
	     }
             
            
        }else{
            
             $this->session->set_flashdata("fail","Not a valid Type for CSV.");
				     redirect(SURL.'Payment'); 
            
        }
        
        
       fputcsv($file, $header);
       foreach ($usersData as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       
	  // redirect(SURL.'Payment'); 
       
       exit; 
       
     }
    
    
    
    public function filteration($filter){
        
        switch($filter){
            case 1:
             $filter_date = "AND transactions.date >= CURRENT_DATE - INTERVAL 7 DAY";
            break;
            case 2:
              $filter_date = "AND transactions.date >= CURRENT_DATE - INTERVAL 30 DAY";
            break;
            case 3:
              $filter_date = "AND transactions.date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01 00:00:00')
                              AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59')"; 
            break;
            case 4:
              $filter_date = "AND YEAR(transactions.date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))";
            break;
            case 5:
                $filter_date = "AND transactions.date BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."'";
            break;
        }
        
        
        
        $userid = $this->session->userdata("user");
		
		$data['myblnc'] = $this->Common->myblnc($userid);
		
		$myjobs_buyer = $this->db->query("select * from jobs where u_id='$userid'")->result_array();
		
		$data['document_detail'] = $this->db->query("select * from doc_recived where u_id='$userid'")->result_array()[0]['status'];
		

		foreach($myjobs_buyer as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where job_id='".$value['job_id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		$data['buyerescrow'] = $totalamt;
		
		$myjobs = $this->db->query("select * from jobs where job_awarded_to='$userid'")->result_array();
	    $totalamt = 0;
		foreach($myjobs as $key=>$value){
		    $totalamt += $this->db->query("select sum(damount-camount) as amt from transactions where job_id='".$value['job_id']."' and u_id='0' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
		}
		$data['freelancerescrow'] = $totalamt;
		
		$data['transactions_available_money'] = $this->db->query("SELECT *  FROM `transactions` WHERE `u_id` = $userid And damount != camount AND in_escrow='No' AND is_clear='Yes' ".$filter_date." order by date desc" )->result_array();;
	
	    
	    foreach($myjobs as $key=>$value){
	        
		 $myescrow[] = $this->db->query("SELECT transactions.*,jobs.job_title,jobs.job_slug  FROM `transactions` join jobs on jobs.job_id = transactions.job_id  WHERE transactions.job_id='".$value['job_id']."' and transactions.u_id='0' and transactions.in_escrow='Yes' and transactions.is_clear='No' ".$filter_date." order by date desc")->result_array();
		
	    }
	    
	    $data['transactions_seller_escrow'] = $myescrow;
	    
	    foreach($myjobs_buyer as $key=>$value){
	        
		 $mybuyerescrow[] = $this->db->query("SELECT transactions.*,jobs.job_title,jobs.job_slug  FROM `transactions` join jobs on jobs.job_id = transactions.job_id  WHERE transactions.job_id='".$value['job_id']."' and transactions.u_id='0' and transactions.in_escrow='Yes' and transactions.is_clear='No' ".$filter_date." order by date desc")->result_array();
		
	    }
		$data['transactions_buyer_escrow'] = $mybuyerescrow;
		
		
		$this->load->view("Payment", $data);
        
        
        //echo $filter;
    }
    
    
     public  function withdrawal()
	{
	    $userid = $this->session->userdata("user");
	    $user_ques=$this->input->post('user_ques');
		$userdata=$this->db->query("select * from users where u_id='$userid'")->row();
		if($userdata->SecurityQuestion==$user_ques)
		{
		     $this->session->set_flashdata("success","Security Question Matched");
			  redirect(SURL.'Payment');
			  
		}else
		{
		     $this->session->set_flashdata("fail","Something went wrong.");
			  redirect(SURL.'Payment');   
			  
		}
		          
	}
	
	
     public  function addwithdrawal()
	{
	    $userid = $this->session->userdata("user");
	    $account=$this->input->post("account1");
	   
    	  $array=array("u_id"=>$userid,
    	               "account_name"=>$account,
    	               "date"=>date("Y-m-d"),
    	               "status"=>"Not Approved",
    	  );
    	  
    	  
    	  $checkaccount= $this->db->query("SELECT * from withdrawal where u_id='$userid' and account_name='$account'")->result_array();
         
         if(empty($checkaccount))
         {
             
         
    	 
    	    $query=$this->Common->insert("withdrawal",$array);
    		if($query)
    		{
    		     $this->session->set_flashdata("success","Details Recived");
    			  redirect(SURL.'Payment');
    			  
    		}else
    		{
    		     $this->session->set_flashdata("fail","Something went wrong.");
    			  redirect(SURL.'Payment');   
    			  
    		}
         }else
         {
             
    		     $this->session->set_flashdata("fail","Account Already Exists");
    			  redirect(SURL.'Payment');   
         }
   
	}
	
	
	 public  function addwithdrawal2()
	{
	    $userid = $this->session->userdata("user");
	    
	    var_dump($this->input->post());exit;
	    
	    $account=$this->input->post("account_id");
	  
	   
    // 	  $array=array("u_id"=>$userid,
    // 	               "gateway_id"=>$account,
    // 	               "date"=>date("Y-m-d"),
    // 	               "status"=>"Not Approved",
    // 	  );
    	  
    	  
    	  $checkaccount= $this->db->query("SELECT * from users where u_id='$userid' and gateway_id='$account'")->result_array();
         
         if(empty($checkaccount))
         {
             
         
    	 
    	 //   $query=$this->Common->insert("withdrawal",$array);
    	   $query= $this->db->query("Update users set gateway_id='$account' where u_id=$userid");
    		if($query)
    		{
    		     $this->session->set_flashdata("success","Details Recived");
    			  redirect(SURL.'Payment');
    			  
    		}else
    		{
    		     $this->session->set_flashdata("fail","Something went wrong.");
    			  redirect(SURL.'Payment');   
    			  
    		}
         }else
         {
             
    		     $this->session->set_flashdata("fail","Account Already Exists");
    			  redirect(SURL.'Payment');   
         }
   
	}
	
	
    public  function addwithdrawaldetail()
	{
	    $userid = $this->session->userdata("user");
	    $gatewayemail=$this->input->post("gatewayemail");
	    $confrim_gatewayemail=$this->input->post("confrim_gatewayemail");
	    $gatewayamount=$this->input->post("gatewayamount");
	  
	  	$myblnc = $this->Common->myblnc($userid);
	  	$data1=number_format($myblnc,2);
	  
	  if($data1>$gatewayamount && $data1>0)
	  {
	  	 $checkaccount1= $this->db->query("SELECT * from users where u_id='$userid' and gateway_email='$gatewayemail'")->result_array();
         
                     
         if(empty($checkaccount1))
         {
            
                $array=array(
        	           "u_id"=>$userid,
        	           "amount"=>$gatewayamount,
        	           "date"=>date("Y-m-d"),
                       "status"=>"Not Approved",
        	              );
            	  $query= $this->Common->insert("withdrawal",$array);
                 
            	     if(!empty($gatewayemail))
            	     {
            	         $query=$this->db->query("Update users set gateway_email='$gatewayemail' where u_id=$userid");  
            	     }
        
            		if($query)
            		{
            		     $this->session->set_flashdata("success","Details Recived");
            			  redirect(SURL.'Payment');
            			  
            		}else
            		{
            		     $this->session->set_flashdata("fail","Something went wrong.");
            			  redirect(SURL.'Payment');   
            			  
            		}
         }else
         {
             
    		     $this->session->set_flashdata("fail","Account Email Already Exists");
    			  redirect(SURL.'Payment');   
         }
	 }else
         {
             
    		     $this->session->set_flashdata("fail","Not Enough Money");
    			  redirect(SURL.'Payment');   
         }
	}
	
	public function update_payoneeremail(){
	    
	    $userid = $this->session->userdata("user");
	    $email = $this->input->post("email");
	    
	    $con['conditions'] = array("u_id"=>$userid);
	    $array = array(
	                    "payoneer_email"=>$email,
	                   );
	                   
	    $query = $this->Common->update("users",$array,$con);
	    if($query){
	        
	        $response['status'] = true; 
	        $response['response'] = "Payoneer account updated"; 
	    }else{
	        $response['status'] = false; 
	        $response['response'] = "Some error occured.Please try again later.";
	    }
	    
	    echo json_encode($response);
	}
	
	public function update_stripeemail(){
	    
	    $userid = $this->session->userdata("user");
	    $email = $this->input->post("email");
	    
	    $con['conditions'] = array("u_id"=>$userid);
	    $array = array(
	                    "stripe_email"=>$email,
	                   );
	                   
	    $query = $this->Common->update("users",$array,$con);
	    if($query){
	        
	        $response['status'] = true; 
	        $response['response'] = "Stripe account updated"; 
	    }else{
	        $response['status'] = false; 
	        $response['response'] = "Some error occured.Please try again later.";
	    }
	    
	    echo json_encode($response);
	}
	
	public function update_paypalemail(){
	    
	    $userid = $this->session->userdata("user");
	    $email = $this->input->post("email");
	    
	    $con['conditions'] = array("u_id"=>$userid);
	    $array = array(
	                    "paypal_email"=>$email,
	                   );
	                   
	    $query = $this->Common->update("users",$array,$con);
	    if($query){
	        
	        $response['status'] = true; 
	        $response['response'] = "Paypal account updated"; 
	    }else{
	        $response['status'] = false; 
	        $response['response'] = "Some error occured.Please try again later.";
	    }
	    
	    echo json_encode($response);
	}
	
	


	public  function insertdoc2()
	{
	      $u_id=$this->session->userdata('user');
	      
	       
	       if($_FILES['newdocument1']['size'] > 0 && $_FILES['newdocument']['size'] > 0){ 
				
			
				
			$directory = 'uploads/';
			$alowedtype = "jpeg|jpg|png";
			$results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"newdocument1");
			$resultsnew = $this->uploadimage->singleuploadfile($directory,$alowedtype,"newdocument");
			
			if(!empty($results[0]['file_name']) && !empty(	$resultsnew[0]['file_name'])){
			    $idportfolio = $directory.$results[0]['file_name'];
			     $billportfolio = $directory.$resultsnew[0]['file_name'];
			   
			   
			    	$array = array(
 								"id_document"=>$idportfolio,
								"u_id"=>$this->session->userdata("user"),
								"status"=>"Pending",
								"bill_document"=>$billportfolio
							  );
                     
                    
		    $insert=$this->Common->insert("doc_recived",$array);
		       	 
    		if($insert){
    		        
    		     $array = array(
 					  "withdrawl_Acct_Status"=>"Pending"
						   );
						   
    			$this->db->where('u_id',$u_id);
    			$this->db->update('users',$array);
        		        
        		$this->session->set_flashdata("success","Document Uploaded Successfully.");
        		redirect(SURL.'Payment');
    		}else
    		{
    			 $this->session->set_flashdata("fail","Something went wrong.");
    			 redirect(SURL.'Payment');
    		}
			 
			}else{
	            $this->session->set_flashdata("fail","Something went wrong.");
			     redirect(SURL.'Payment');   
        	 }
	            
	        }else{
	            $this->session->set_flashdata("fail","Please upload both files.");
			     redirect(SURL.'Payment');   
        	 }

	    
	  
	}	
    
    

	
}
