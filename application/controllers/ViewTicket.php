<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewTicket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Common');
		$this->load->library('form_validation');
		$this->load->library('stripe_lib');
		$this->load->library('Uploadimage');
		error_reporting(0);
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}

	public function index()
	{ 
		$user_id=$this->session->userdata('user');
		$data["querydetail"]=$this->db->query("select * from query where u_id='$user_id'")->result_array();
		$this->load->view("ViewTicket", $data);

		
	}
	
	
	 public function detail($q_id)
	{ 
	     $user_id=$this->session->userdata('user');
	    $data['user'] = $this->db->query("select * from users where u_id='$user_id'")->result_array()[0];
		
		$data['record_ans'] = $this->db->query("SELECT * FROM `query` join query_answer on query_answer.q_id = query.id where query.id = $q_id")->result_array();
		
		$data['question_dis'] = $this->db->query("SELECT * FROM `query` where id = $q_id")->result_array()[0];
			$data['query_id'] = $q_id;
		
		$arraynew = array(
                            'is_user_read'=>'yes'
                         );
             $con['conditions']=array("id"=> $q_id);
             $this->Common->update("query",$arraynew,$con); 
		$this->load->view("TicketDetail", $data);

		
	}
	
	public function updated_status(){
	    $qid = $this->input->post('q_id');
	    
	    if($this->db->query("Update query_answer set ans_status = 'satisfied' where q_id = $qid")){
	        
	        $respone['error'] =  false;
	        $respone['msg'] =  "Done";
	    }else{
	        $respone['error'] =  true;
	        $respone['msg'] =  "Try Later";
	    }
	    
	    echo json_encode($response);
	    die;
	    
	}
		
	 public function searchdata()
	{ 
	    $user_id=$this->session->userdata('user'); 
		
	$serachresult=$this->input->post("serachresult");
	
	$record = $this->db->query("select * from query WHERE u_id ='$user_id'")->result_array();
        
        if(!empty($serachresult)){
            
            foreach ($record as $row){
                $quertionid=$row['query_question_id'];
                $record1 = $this->db->query("select * from query_questions WHERE id ='$quertionid'")->result_array()[0];
                echo "<li><span>" . $record1['question'] . "</span></li>";
            };
        }
		
	}
	
    public function customer_reply(){
        
       $qid = $this->input->post('q_id');
       $reply = $this->input->post('reply_customer');
	    
	    if($this->db->query("Update query_answer set customer_reply = '$reply' , ans_status='not_satisfied' where q_id = $qid")){
	        
	         $this->session->set_flashdata('success','Your Reply Submitted');
			 redirect(SURL."ViewTicket");
	    }else{
	        
	        $this->session->set_flashdata('fail','Please Try Later!');
			redirect(SURL."ViewTicket");
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
    
    public function replyuser()
{
      $recv_id= $this->session->userdata('user');
      $admin_reply=$this->input->post('admin_reply');
      $senderid=$this->input->post('senderid');
      $queryid=$this->input->post('queryid');    
      
      if($this->input->post('query_status') != ""){
          
          $query_status = "close";
      }else{
          
          $query_status = "open";
      }
     
      
      
       $array=array("q_id"=>$queryid,
                      "content"=>$admin_reply,
                      "recv_id"=>$recv_id,
                      "	send_id"=>$senderid,
                      "datetime"=>date("Y-m-d H:i:s"),
                      );
      $replyID=$this->Common->insert("query_answer",$array);
    
    
              	if($replyID){
              	    
        
             if($_FILES['attachment']['size'][0] > 0){ 
            
           
        			$directory = 'uploads/';
        			$alowedtype = "*";
        			$results = $this->uploadimage->uploadfile($directory,$alowedtype,"attachment");
        			if($results){
        			    if(!empty($results[0]['file_name'])){
        			        foreach($results as $key=>$value){
        			          	$attachment = $directory.$value['file_name'];
                    			 $array_attachment = array(
                                "ans_id"=>$replyID,
                                "attachment_name"=>$attachment,
                                );
                                $test = $this->Common->insert("query_ans_attachments",$array_attachment);
        			        }
        			    }
        			    
        			}			
			
		    }
              	    
             $arraynew = array(
                            "query_status"=>$query_status,
                            'is_admin_read'=>'no'
                         );
             $con['conditions']=array("id"=> $queryid);
             $this->Common->update("query",$arraynew,$con);  
              	    
              	    
    			$this->session->set_flashdata('success','Message Send');
    			redirect(SURL.'ViewTicket/detail/'.$queryid);
	        }else{
    			$this->session->set_flashdata('fail','Try Again Later');
    		redirect(SURL.'ViewTicket/detail/'.$queryid);
	        }
    
}


	
}
