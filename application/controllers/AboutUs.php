<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common');
	}

	public function index()
	{       
	       //$this->load->library('excel');
        // $reader= PHPExcel_IOFactory::createReader('Excel2007');
        // $reader->setReadDataOnly(true);
        // $path= "uploads/tags.xlsx";
        // $excel=$reader->load($path);

        // $sheet = $excel->getActiveSheet()->toArray(null,true,true,true);
        // $arrayCount = count($sheet); 
        // for($i=2;$i<=$arrayCount;$i++)
        // {                   
        //     $array = array("skill_name"=>$sheet[$i]["A"]);
        //     $this->common->insert("skills",$array);
            
        // }


			$this->load->view("AboutUs");
		
	}
	
// 	public function test(){
// 	    $data['result'] = array("name"=>"waqas","email"=>"waqas@gmail.com");
// 	    echo json_encode($data);
// 	}
	
	public function test(){
	    $data = json_decode(file_get_contents("php://input"));
	    
	    var_dump($data);
	   // $data['result'] = array("name"=>"waqas","email"=>"waqas@gmail.com");
	   // echo json_encode($data);
	}

	
}
