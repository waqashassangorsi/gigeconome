<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Customers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		  $this->load->library('Uploadimage');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Customers/";
		 $data['Controller_name'] = "All Customers";
		 $data['Newcaption'] = "All Customers";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status" =>"0");
         $data['Employees'] = $this->Common->get_rows("users", $con);

		 $this->load->view("Customers.php",$data);
	}

	public function Addemployee(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Customers/";
		 $data['Controller_name'] = "All Customers";
		 $data['method_url'] = "Customers/Addemployee";
		 $data['method_name'] = "Add Customers";
	
// =============================================fix data ends here====================================================
	

		

		if(isset($_POST['Submit'])){

			$name = htmlspecialchars($this->input->post("usrename"));
			$password = $this->input->post("password");
			
			

			$array = array('name' => $name,
						   'password' => sha1($pass),
						   'Joining_date' => date("Y-m-d"),
						   'user_status'=>"0",
						);
		    

			if(empty($this->input->post("edit"))){

				$con['conditions'] = array('name' => $name);
			    $query = $this->common->get_rows("users",$con);
			    if($query){
			    	$this->session->set_flashdata('fail','name already exists,plz try another one');
			    	redirect("/Customers/Addemployee");
			    }

				$insert = $this->common->insert("users",$array);
				
				
			}else{
				$insert = intval($this->input->post("edit"));

				$query = $this->db->query("select * from users where name='$name' and u_id != '$insert'");
			    if($query->num_rows() > 0){
			    	
			    	$this->session->set_flashdata('fail','insert already exists,plz try another one');
			    	redirect("/Customers/Addemployee");
			    }
			    
			    $con['conditions'] = array('u_id' => $edit); 

				$insert = $this->common->update("users",$array,$con);


		    }

			if($insert){
				
				$this->session->set_flashdata('success','Information added Successfully');
			}else{
				$this->session->set_flashdata('fail','Try Again Later');
			}

			redirect("/Customers/Addemployee");

	    }

		
		
		$this->load->view("Addvendors.php",$data);
	}


	public function EditEmployee($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Employee/";
		 $data['Controller_name'] = "All Employees";
		 $data['method_url'] = "Employee/Addemployee";
		 $data['method_name'] = "Edit Employee";
	
// =============================================fix data ends here====================================================
		$id = intval($id);

		$con['conditions']=array("u_id"=>$id);
		$userrecord = $this->common->get_single_row("users",$con);
		
		$data['Employees'] = $userrecord;
		//echo "<pre>";var_dump($data['Employees']);

		$this->load->view("Add_Employee.php",$data);

	}


	public function delete($id){
		$id = intval($id);
		$data['user'] = $this->check->Login();

		$query = $this->common->delete("users",array("u_id"=>$id));

		if($query){
			$this->session->set_flashdata('success','Customers Deleted Successfully');
         	redirect("/Customers");
         }else{
         	$this->session->set_flashdata('fail','Some error occured,plz try again later');
			redirect("/Customers");
         }

	}



}
?>