<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Blogsetting extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 	$this->load->library('Uploadimage');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Blogsetting/";
		 $data['Controller_name'] = "All Blogs";
	
// =============================================fix data ends here====================================================

		 $con['conditions'] = array(); 
		 $data['blogs'] = $this->common->get_rows("blog",$con);
		 $this->load->view("Blogsetting",$data);
	}

	

	public function Addcategory(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Blogsetting/";
		 $data['Controller_name'] = "Blog";
		 $data['method_url'] = "Blogsetting/Addcategory";
		 $data['method_name'] = "Add Blog";
	
// =============================================fix data ends here====================================================
        
        
         if($this->input->post('heading')){
	       
	        
	        $file="";	    
		    if($_FILES['files']['size'] > 0){ 
               //echo "<pre>";var_dump($_FILES['files']['name']);exit;
                $directory = 'uploads/';
                $alowedtype = "gif|jpg|png|jpeg";
                $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"files");
               
              
                if(!empty($results[0]["file_name"])){
                   
                    $file = $directory.$results[0]['file_name'];
                }
                 
            }else
            {
                $edit2=$this->input->post("edit");
                     $query3 = $this->db->query("select * from blog where id = $edit2")->result_array()[0];
                     $file = $query3['image'];
                     if(empty($file))
                     {
                         $this->session->set_flashdata('fail','Try Again Later');
    			        redirect("Blogsetting");
                         
                     }
                
            }
	        
	        $heading=$this->input->post("heading");
            $date=$this->input->post("date");
            $description=$this->input->post("description");
            $author=$this->input->post("author");
	        $array = array(
	                    'blogheading' => $heading,
	                    'blogdescription' => $description,
	                    'date' => $date,
	                    'image' => $file,
	                    'author'=>$author
	            );
	            
	          
	        if(empty($this->input->post("edit"))){

		 		$query = $this->Common->insert("blog",$array);

		 	}else{

		 		$con['conditions'] = array('id' =>$this->input->post("edit")); 
		 		//echo "<pre>";var_dump($array);exit;
				$query = $this->Common->update("blog",$array,$con);
				
			

		 	}
		 	
	 		if($query){
    			$this->session->set_flashdata('success','Information Successfully Added');
    			redirect("Blogsetting");
	        }else{
			
    			$this->session->set_flashdata('fail','Try Again Later');
    			redirect("Blogsetting/Addcategory");
	        }
	    }
        

		$this->load->view("AddBlog",$data);
		
	}



public function EditBlog($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Blogsetting/";
		 $data['Controller_name'] = "All Blog";
		 $data['method_url'] = "Blogsetting/Addblog";
		 $data['method_name'] = "Edit Blog";
	
// =============================================fix data ends here====================================================
		$id = intval($id);

		$con['conditions']=array("id"=>$id);
		$userrecord = $this->common->get_single_row("blog",$con);
		
		$data['record'] = $userrecord;

		$this->load->view("AddBlog",$data);

	}
	




	public function delete($id){
	

		$this->db->query("delete from blog where id='$id'");

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Try Again Later');
	   }else{
			$this->session->set_flashdata('success','Blog Deleted.');
	   }
	   redirect("Blogsetting");
	}


	

	

	

}
?>