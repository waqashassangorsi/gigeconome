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
		 $data['Controller_name'] = "All Users";
		 $data['Newcaption'] = "All Users";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status" =>"2");
         $data['Employees'] = $this->Common->get_rows("users", $con);

		 $this->load->view("Employees.php",$data);
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
			$email = $this->input->post("email");
			$pass = sha1($this->input->post("pass"));

			if(empty($name) || empty($email) || empty($pass)){
				$this->session->set_flashdata('fail','Plz FIll all fields.');
			    	redirect("/Employee/Addemployee");
			}

			$array = array('name' => $name,
						   'email' => $email,
						   'password' => $pass,
						   'Joining_date' => date("Y-m-d"),
						   'user_status'=>"2"
						);
		    

			if(empty($this->input->post("edit"))){

				$con['conditions'] = array('email' => $email);
			    $query = $this->common->get_rows("users",$con);
			    if($query){
			    	$this->session->set_flashdata('fail','Email already exists,plz try another one');
			    	redirect("/Employee/Addemployee");
			    }

				$query = $this->db->insert("users",$array);
				
			}else{
				$edit = intval($this->input->post("edit"));

				$query = $this->db->query("select * from users where email='$email' and u_id != '$edit'");
			    if($query->num_rows() > 0){
			    	
			    	$this->session->set_flashdata('fail','Email already exists,plz try another one');
			    	redirect("/Employee/Addemployee");
			    }
			    
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
		
		$this->load->view("Add_Employee.php",$data);
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
         $get_user = $this->Common->get_single_row("users", $con);
         if($get_user){
         	

         	if($get_user->company_id == $data['user']->company_id){

         	}else{
         		$this->session->set_flashdata('fail','You cant access this profile');
				redirect("/Employee");
         	}
         }else{
         	$this->session->set_flashdata('fail','No Record Found');
			redirect("/Employee");
         }


		 $data['u_id'] = $id;
		 $con['conditions'] = array();
         $data['main_menu'] = $this->Common->get_rows("main_menu", $con);
		
		$this->load->view("role.php",$data);
	}

	public function addrole(){ 

		 $data['user'] = $this->check->Login(); 

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
		 

		$this->load->view("role.php",$data);
	}

	public function delete($id){
		$id = intval($id);
		$data['user'] = $this->check->Login();

		$query = $this->common->delete("users",array("u_id"=>$id));

		if($query){
			$this->session->set_flashdata('success','User Deleted Successfully');
         	redirect("/Employee");
         }else{
         	$this->session->set_flashdata('fail','Some error occured,plz try again later');
			redirect("/Employee");
         }

	}

	public function dashboard(){
		$data['user'] = $this->check->Login(); 

		if($this->input->post("status") == "0"){
			$status=1;
		}else{
			$status=0;
		}
		//echo $status; exit();
		$con['conditions']=array("u_id"=>$this->input->post("userid"));

		$query = $this->common->update("users",array("dashboard"=>"$status"),$con);
		if($query){
			$this->session->set_flashdata('success','Information added Successfully');
         	redirect("/Employee");
		}else{
			$this->session->set_flashdata('fail','Some error occured,plz try again later');
			redirect("/Employee");
		}
	}
	

	

	

}
?>