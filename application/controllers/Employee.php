<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Employee extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Employee/";
		 $data['Controller_name'] = "All Employees";
		 $data['Newcaption'] = "All Employees";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status" => "Employee");
         $data['Employees'] = $this->Common->get_rows("users", $con);

		 $this->load->view("Employees/Employees.php",$data);
	}

	public function Addemployee(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Employee/";
		 $data['Controller_name'] = "All Employees";
		 $data['method_url'] = "Employee/Addemployee";
		 $data['method_name'] = "Add Employee";
	
// =============================================fix data ends here====================================================

		if(isset($_POST['Submit'])){

		
			$name = htmlspecialchars($this->input->post("name"));
			$email = ($this->input->post("email"));
			$pass = sha1($this->input->post("pass"));
			$status = ($this->input->post("status"));

			if(empty($name) || empty($email) || empty($pass) || empty($status)){
				$this->session->set_flashdata('fail','Plz FIll all fields.');
			    	redirect("/Employee/Addemployee");
			}
		    

			if(empty($this->input->post("edit"))){

				$con['conditions'] = array('email' => $email);
			    $query = $this->common->get_rows("users",$con);
			    if($query){
			    	$this->session->set_flashdata('fail','Email already exists,plz try another one');
			    	redirect("/Employee/Addemployee");
			    }


				$array = array('f_name' => $name,'email' => $email,'pass' => $pass,'Joining_date' => date("Y-m-d"),
					'status' => $status,'user_status'=>'Employee');



				$query = $this->db->insert("users",$array);
				
			}else{
				$edit = intval($this->input->post("edit"));

				
				$query = $this->db->query("select * from users where email='$email' and u_id != '$edit'");
			    if($query->num_rows() > 0){
			    	
			    	$this->session->set_flashdata('fail','Email already exists,plz try another one');
			    	redirect("/Employee/Addemployee");
			    }

				$array = array('f_name' => $name,'email' => $email,'pass' => $pass,'status' => $status);
			    
			    $con['conditions'] = array('u_id' => $edit); 

				$query = $this->common->update("users",$array,$con);

		    }

			if($query){
				
				$this->session->set_flashdata('success','Information added Successfully');
			}else{
				$this->session->set_flashdata('fail','Try Again Later');
			}

			redirect("/Employee/Addemployee");

	    }

		 $data['edit'] = 0;
		
		$this->load->view("Employees/Add_Employee.php",$data);
	}

	public function role($id){ 

		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Employee/";
		$data['Controller_name'] = "All Privilege";
		$data['method_url'] = "Employee/role";
		$data['method_name'] = "Add Privilege";


		if($data['user']->user_status == "Employee"){
			$this->session->set_flashdata('fail','You cant access this profile');
			redirect("/Employee");
		}

		$con['conditions'] = array("u_id" => $id);
		$get_user = $this->common->get_single_row("users", $con);
		
		$data['u_id'] = $id;
		$con['conditions'] = array();
		$data['main_menu'] = $this->Common->get_rows("main_menu", $con);
		
		$this->load->view("Employees/role.php",$data);
	}

	public function EditEmployee($id){ 

		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Employee/";
		$data['Controller_name'] = "All Privilege";
		$data['method_url'] = "Employee/role";
		$data['method_name'] = "Add Privilege";


		if($data['user']->user_status == "Employee"){
			$this->session->set_flashdata('fail','You cant access this profile');
			redirect("/Employee");
		}

		$con['conditions'] = array("u_id" => $id);
		$data['record'] = $this->common->get_rows("users", $con)[0];
		
		$this->load->view("Employees/Add_Employee.php",$data);
	}

	public function addrole(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
	
// =============================================fix data ends here====================================================
		 //echo "<pre>"; var_dump($this->input->post()); exit();

		 $this->db->trans_start();
		 $this->common->delete("user_rights",array("u_id"=>intval($this->input->post('u_id'))));
		 foreach ($this->input->post('page') as $key => $value) {
		 	$array = array("u_id"=>intval($this->input->post('u_id')),'page_id'=>$value);
		 	$this->common->insert("user_rights", $array);
		 }
		 $this->db->trans_complete();
         
         if($this->db->trans_status() === FALSE){
         	$this->session->set_flashdata('fail','Some error occured,plz try again later');
			redirect("/Employee");
         }else{
         	$this->session->set_flashdata('success','Information added Successfully');
         	redirect("/Employee");
         }
		 

		$this->load->view("Employees/role.php",$data);
	}
	

	

	

}
?>