<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilecontinue extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->checksession();
		$this->load->library('form_validation');
		$this->load->library('Uploadimage');
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
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
		
		$this->load->view("Profilecontinue", $data);

		
	}
	
	public function coverphoto(){
	     
	    if($_FILES['cover_photo']['size'] > 0){ 
				
			$directory = 'uploads/';
			$alowedtype = "jpeg|jpg|png";
			$results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"cover_photo");
			
			if(!empty($results[0]['file_name'])){
			    $cover = $directory.$results[0]['file_name'];
			    $array = array(
                            "cover"=>$cover,
                         );
              
                $con['conditions']=array("u_id"=>$this->session->userdata("user"));
                $this->common->update("users",$array,$con);
			}
						
		}
		
        if($_FILES['portfolio']['size'][0] > 0){ 
            
			$directory = 'uploads/';
			$alowedtype = "jpeg|jpg|png";
			$results = $this->uploadimage->uploadfile($directory,$alowedtype,"portfolio");
			if($results){
				$this->uploadimage->resizeimage($results,"500","500");
				$i=0;
				foreach($results as $key => $value) {
					$portfolio = $directory.$results[$key]['raw_name']."_thumb".$results[$key]['file_ext'];

					$array = array(
									"image"=>$portfolio,
									"u_id"=>$this->session->userdata("user"),
								  );

					$this->common->insert("user_portfolio",$array);	
					$i++;			  
				}
				
			}			
			
		}
		
		$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
        redirect(SURL."TimeLine/index/$username");
        
	}


	
}
