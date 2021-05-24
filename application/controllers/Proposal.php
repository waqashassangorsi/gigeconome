<?php

defined('BASEPATH') OR exit('No direct script access allowed');



// require_once APPPATH . '/libraries/Check.php';



class Proposal extends CI_Controller{

	

	public function __construct(){

		parent::__construct();

		 $this->load->library('Check');

		 $this->load->model('common');
		 $this->checksession();
		error_reporting(0);

		

	}

	private function checksession(){
		if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}
	
	
		}





	public function index(){ 

// =============================================fix data ends here====================================================
		$data['proposal'] = $this->db->query("select msgs.*,users.*,jobs.* from msgs inner join users on recv_id=users.u_id inner 
			join jobs on msgs.job_id=jobs.job_id where send_id='".$this->session->userdata("userrecord")->u_id."' 
			and proposal_Status !=''  order by msg_id desc")->result_array();
		 $this->load->view("Proposal",$data);

	}

	public function show($id){

		$data['proposal'] = $this->db->query("select msgs.*,users.*,jobs.* from msgs inner join users on recv_id=users.u_id inner 
			join jobs on msgs.job_id=jobs.job_id where msg_id='".$id."'")->result_array()[0];
		$this->load->view("Proposal_description",$data);
	}



		



	



}

?>