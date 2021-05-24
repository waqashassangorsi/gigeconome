<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Displayquery extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 	$this->load->library('Uploadimage');
		 //error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Displayquery/";
		 $data['Controller_name'] = "All Support Queries";
	
// =============================================fix data ends here====================================================
       

		// $con['conditions'] = array(); 
         //$data['categories'] = $this->common->get_rows("general",$con);
         //var_dump($data['categories']);
		 //$data['withdraws'] = $this->common->get_rows("withdrawal",$con);
		//var_dump($data['withdraws']);
		
		$data['query_record']=$this->db->query("select * from query order by is_admin_read <> 'no',is_admin_read ASC ")->result_array();
// 		echo "<pre>";var_dump($data['query']);exit;
		
		
		 $this->load->view("Displayquery",$data);
	}
	

public function Addanswer()
{
    $questionid=$this->input->post('questionid');
    $answer_quest=$this->input->post('answer_quest');
    $admin_reply=$this->input->post('admin_reply');
    $queryanswer=$this->db->query("select * from query_answer where q_id='$questionid'")->row();
    
    if(!empty($answer_quest))
    {
        if(empty($queryanswer))
        {
        
        $array=array("q_id"=>$questionid,
                      "answer"=>$answer_quest,
                      "customer_reply"=>"",
                      "ans_status"=>"",
                      "	admin_reply"=>$admin_reply);
               $query=$this->db->insert("query_answer",$array);
        }else
        {
            $arra1=array("answer"=>$answer_quest,"admin_reply"=>$admin_reply);
            	$con['conditions'] = array('q_id' =>$questionid); 
          
		 		//echo "<pre>";var_dump($array);exit;
				$query = $this->Common->update("query_answer",$arra1,$con);
            
        }
              	if($query){
    			$this->session->set_flashdata('success','Answer Successfully Added');
    			redirect("Displayquery");
	        }else{
			
    			$this->session->set_flashdata('fail','Try Again Later');
    			redirect("Displayquery");
	        }
        }
    
    
    else{
			
    			$this->session->set_flashdata('fail','Something went wrong');
    			redirect("Displayquery");
	   }
   
}

public function Edit($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Displayquery/";
		 $data['Controller_name'] = "Query";
		 $data['method_url'] = "Displayquery/Edit";
		 $data['method_name'] = "Edit Query";
	
// =============================================fix data ends here====================================================
		$id = intval($id);
         $arraynew = array(
                            'is_admin_read'=>'yes'
                         );
             $con['conditions']=array("id"=> $id);
             $this->Common->update("query",$arraynew,$con); 
             
		$con['conditions']=array("id"=>$id);
		$userrecord = $this->common->get_single_row("query",$con);
		
		$data['record'] = $userrecord;
		
		$this->load->view("EditQuery",$data);

	}	


public function replyuser()
{
      $recv_id="1";
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
                      "send_id"=>$recv_id,
                      "recv_id"=>$senderid,
                      "datetime"=>date("Y-m-d H:i:s"),
                      );
      $query=$this->Common->insert("query_answer",$array);
    
    
              	if($query){
              	    
        
             if($_FILES['newattachment']['size'][0] > 0){ 
            
			$directory = 'uploads/';
			$alowedtype = "*";
			$results = $this->uploadimage->uploadfile($directory,$alowedtype,"newattachment");
			if($results){
			    if(!empty($results[0]['file_name'])){
			        foreach($results as $key=>$value){
			          	$attachment = $directory.$value['file_name'];
            			 $array_attachment = array(
                        "ans_id"=>$query,
                        "attachment_name"=>$attachment,
                        );
                        $test = $this->Common->insert("query_ans_attachments",$array_attachment);
			        }
			    }
			    
			}			
			
		}
              	    $arraynew = array(
              	        "query_status"=>$query_status,
                            'is_user_read'=>'no'
                         );
             $con['conditions']=array("id"=> $queryid);
             $this->Common->update("query",$arraynew,$con); 
              	    
    			$this->session->set_flashdata('success','Message Send');
    			redirect("Displayquery");
	        }else{
    			$this->session->set_flashdata('fail','Try Again Later');
    			redirect("Displayquery");
	        }
    
}

}
?>