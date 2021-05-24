 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->checksession();
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}
	
	private function checksession(){

		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}
	
	public function downloadfile(){

        $this->load->helper('download');
        $link = $this->input->post("file");
        $filess = (pathinfo( $link)); 
        $data = file_get_contents($link);
        force_download($filess['basename'], $data);
    }
    
    public function downloadfilefeed($link){
        
        $link = $this->db->query("select * from msgs_files where id='$link'")->result_array()[0]['file'];
        $this->load->helper('download');
        $filess = (pathinfo( $link)); 
        $data = file_get_contents($link);
        force_download($filess['basename'], $data);
    }

	public function index()
	{ 
	   $status = $this->uri->segment(3);
	   $myuserid = $this->session->userdata("user");
	   
	   //if($status){
	   //    echo 123;
	   //}else{
	   //    echo 456;
	   //}
	   
	   if($status=="discussion" || empty($status)){ echo 123;
	           $sql = "select jobs_msgs.*,users.* from jobs_msgs left 
                  join users on 
                    case 
                    when(recv_id = $myuserid) then(users.u_id = send_id)
                    when(send_id = $myuserid) then(users.u_id = recv_id)
                    end   
                  where msg_id IN(
                    select MAX(msg_id) from jobs_msgs where send_id='$myuserid' or recv_id='$myuserid' and msg_status='Inbox'
                    group by
                      case
                        when(send_id = $myuserid) then(recv_id)
                        when(recv_id = $myuserid) then(send_id)
                      end  
                    ) order by msg_id desc";
                    
                $data['msg_list'] = ($this->db->query($sql)->result_array());
	   
	       
	   }else if($status=="workinprogress"){
	       
	      
	       
	   }else if($status=="completedprojects"){
	       
	   }
	   
	
    
    
        //$data = $this->msgs_detail();
        //echo "<pre>";var_dump($data);
        
		$this->load->view("Inbox", $data);

	}
	
	public function viewproposal($jobid)
	{ 
		
        $data = $this->msgs_detail();
        $data['all_proposals'] = $this->db->query("select jobs_msgs.*,users.* from jobs_msgs inner join users on send_id=users.u_id where job_id='$jobid' and msg_status='Inbox' and send_id !='".$this->session->userdata('user')."'")->result_array();

		$this->load->view("Inbox", $data);

	}
	
	public function msgs_detail(){
	    
	    
		$indiscusion = $this->db->query("select jobs_msgs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id where recv_id='".$this->session->userdata('user')."'")->result_array();
		
		if(!empty($indiscusion)){
		    
		}else{
		    $data['workinprogress'] = 0;
		}
		
		$data['workinprogress'] = $this->db->query("select count(*) as count from jobs where job_awarded_to='".$this->session->userdata('user')."' and job_status='Ongoing'")->result_array()[0]['count'];
		$data['completed_projects'] = $this->db->query("select count(*) as count from jobs where job_awarded_to='".$this->session->userdata('user')."' and job_status='Completed'")->result_array()[0]['count'];
		
		$userid = $this->session->userdata('user');
		
		if(!empty($this->uri->segment(3))){
		    
		    $sql = "select jobs_msgs.*,users.* from jobs_msgs left 
                  join users on 
                    case 
                    when(recv_id = $userid) then(users.u_id = send_id)
                    when(send_id = $userid) then(users.u_id = recv_id)
                    end   
                  where msg_id IN(
                    select MAX(msg_id) from jobs_msgs where send_id='$userid' or recv_id='$userid'
                    group by
                      case
                        when(send_id = $userid) then(recv_id)
                        when(recv_id = $userid) then(send_id)
                      end  
                    ) order by msg_id desc";
                    
		}else{
		    
		    $sql = "select jobs_msgs.*,users.* from jobs_msgs left 
                  join users on 
                    case 
                    when(recv_id = $userid) then(users.u_id = send_id)
                    when(send_id = $userid) then(users.u_id = recv_id)
                    end   
                  where msg_id IN(
                    select MAX(msg_id) from jobs_msgs where send_id='$userid' or recv_id='$userid'
                    group by
                      case
                        when(send_id = $userid) then(recv_id)
                        when(recv_id = $userid) then(send_id)
                      end  
                    ) group by job_id desc";
		}
		
		$query = $this->db->query($sql);
        $data['msg_list'] = $query->result_array();
        
        return $data;
	}
	


	
}
