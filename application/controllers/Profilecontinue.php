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
		
		$id= $this->session->userdata('user');
	    $data['record'] = $this->db->query("select * from user_portfolio where u_id= $id")->result_array();
	    $data['certifi_record'] = $this->db->query("select * from user_certs where u_id= $id")->result_array();
		
		$this->load->view("Profilecontinue", $data);
	}

	public function coverphoto(){
	    
	    //echo "<pre>";var_dump($_FILES); exit;
	    
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
			    //echo "<pre>";var_dump($results);exit;
				$test = $this->uploadimage->resizeimage($results,"500","500","FALSE");
				
				$i=0;
				foreach($results as $key => $value) {
				    
				    if(empty($value['file_name']) || ($value['file_name'])==""){
        		        continue;
        		    }
        		    
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
		
		 if($_FILES['certs']['size'][0] > 0){ 
            
			$directory = 'uploads/';
			$alowedtype = "*";
			$results = $this->uploadimage->uploadfile($directory,$alowedtype,"certs");
			if($results){
			    //echo "<pre>";var_dump($results);exit;
				 $test = $this->uploadimage->resizeimage($results,"500","500","FALSE");
				
				$i=0;
				foreach($results as $key => $value) {
				    
				    if(empty($value['file_name']) || ($value['file_name'])==""){
        		        continue;
        		    }
        		    
					$portfolio2 = $directory.$results[$key]['raw_name'].$results[$key]['file_ext'];

				 $array = array(
									"cert_file"=>$portfolio2,
									"u_id"=>$this->session->userdata("user"),
								  );
								 

				$this->common->insert("user_certs",$array);	
					$i++;			  
				}
				
			}			
			
		}
		
// 		if($_FILES['certs']['size'][0] > 0){ 
            
// 			$directory = 'uploads/';
// 			$alowedtype = "*";
// 			$results = $this->uploadimage->uploadfile($directory,$alowedtype,"certs");
// 			if($results){
// 			    if(!empty($results[0]['file_name'])){
// 			        foreach($results as $key=>$value){
// 			          $portfolio2 = $directory.$results[$key]['raw_name']."_thumb".$results[$key]['file_ext'];
// 			            $array = array(
// 									"cert_file"=>$portfolio2,
// 									"u_id"=>$this->session->userdata("user"),
// 								  );
                      
// 					    $this->common->insert("user_certs",$array);	
// 			        }
// 			    }
			    
// 			}			
			
// 		}
		
		$username = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0]['username'];
        redirect(SURL."TimeLine/$username");
        
	}
	
	public function deleteProtpolio(){
	    
	    $id = $this->input->post('portpid');
	    
	    $this->db->delete('user_portfolio', array('id' => $id));
	}
	
	
	public function deleteCertificate(){
	    
	    $id = $this->input->post('portpid');
	    
	    $responsedata=$this->db->delete('user_certs', array('cert_id' => $id));
	    if( $responsedata)
	    {
	        $response['status']=1;
	    }else
	    {
	         $response['status']=2;
	    }
	    
	    	echo json_encode($response);
	    
	}
	
	
	public function crop_image(){
	    
	    if($_FILES['img']['size'] > 0){ 
            
			$directory = 'uploads/';
			$alowedtype = "*";
			$results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"img");
			if($results){
			    if(!empty($results[0]['file_name'])){
			        $filename = $directory.$results[0]['file_name'];
			        $width  = $results[0]['image_width'];
			        $height = $results[0]['image_height'];
			        
			        $response = array(
            			"status" => 'success',
            			"url" => $filename,
            			"width" => $width,
            			"height" => $height
        		    );
			    }
			    
			}			
			
		}else{
		    $response = array(
    			"status" => 'error',
    			"message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
    		);
		}
		
		print json_encode($response);
		
	}
	
	public function crop_now(){
	    
	    $imgUrl = $_POST['imgUrl'];
        // original sizes
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
        // resized sizes
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
        // offsets
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
        // crop box
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];
        // rotation angle
        $angle = $_POST['rotation'];
        
        $jpeg_quality = 100;
        
        $output_filename = "uploads/croppedImg_".rand();
    
        // uncomment line below to save the cropped image in the same location as the original image.
        //$output_filename = dirname($imgUrl). "/croppedImg_".rand();
        
        $what = getimagesize($imgUrl);
        
        switch(strtolower($what['mime']))
        {
            case 'image/png':
                $img_r = imagecreatefrompng($imgUrl);
        		$source_image = imagecreatefrompng($imgUrl);
        		$type = '.png';
                break;
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($imgUrl);
        		$source_image = imagecreatefromjpeg($imgUrl);
        		error_log("jpg");
        		$type = '.jpeg';
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($imgUrl);
        		$source_image = imagecreatefromgif($imgUrl);
        		$type = '.gif';
                break;
            default: die('image type not supported');
        }
        
        
        //Check write Access to Directory
        
        if(!is_writable(dirname($output_filename))){
        	$response = Array(
        	    "status" => 'error',
        	    "message" => 'Can`t write cropped File'
            );	
        }else{
        
            // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
        	imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
        	$cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
        	imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
        	imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
        	// crop image into selected area
        	$final_image = imagecreatetruecolor($cropW, $cropH);
        	imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
        	imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
        	// finally output png image
        	//imagepng($final_image, $output_filename.$type, $png_quality);
        	imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
        	
        	$con['conditions']=array("u_id"=>$this->session->userdata("user"));
        	$array = array(
        	                "cover"=>$output_filename.$type,
        	             );
        	             
        	$this->common->update("users",$array,$con);
        	
        	 
        	$response = Array(
        	    "status" => 'success',
        	    "url" => $output_filename.$type
            );
        }
        
       
        print json_encode($response);
	    
    }
	


	
}
