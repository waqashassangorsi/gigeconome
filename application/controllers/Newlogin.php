<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newlogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->load->library('form_validation');
		//$this->load->library('facebook');
        $this->load->library('Googleplus');
		$this->load->library('facebook');
	}

	public function index()
	{ 
	    
	    if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){
            redirect(SURL);
        }	
        
        if(isset($_GET['code'])){   
			$fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');
			$email = $fbUser['email'];
			$fname = $fbUser['first_name'];
			$lname = $fbUser['last_name'];
		
			
			if(!empty($email)){
			    $chkemail = $this->db->query("select * from users where email='$email'")->result_array();
			    
			    if($chkemail){ 
			        $record = $chkemail[0];
			        if($record['can_login']=="0"){
			            $this->session->set_userdata("LoggedIn",True);
				        $this->session->set_userdata("user",$record['u_id']);
				        
				        if($record['user_status']=="User"){
                            redirect(SURL."Freelancerdash");
                        }else{
                            redirect(SURL."Buyerdashboard");
                        }
                
			        }else{
			            $this->session->set_flashdata("fail","Your account blocked.");
			            redirect(SURL.'Newlogin');
			        }
			    }else{
			        $explode = explode("@",$email);
                    $username = $explode[0];
                    
                    $getloc = json_decode(file_get_contents("http://ipinfo.io/".$this->input->ip_address()));
                    $mylocation = $getloc->city." ".$getloc->country;
                
			        $data = array('f_name' => $fbUser['first_name'],
                                  'l_name' => $fbUser['last_name'],
                                  'email' => $email,
                                  'username' => $username,
                                  'user_status' => "User",
                                  'location'=>$mylocation,
                                  'oauth'=> "fb",
                                  'Joining_date'=>Date("Y-m-d"),
                                  'status'=>'Active',
                                  'dp'=>'assets/images/dp.png'
                                );
        
        			$insert = $this->Common->insert("users",$data);
        			if($insert){
        				$this->session->set_userdata("LoggedIn",True);
				        $this->session->set_userdata("user",$insert);
				        redirect(SURL."Completeprofile");
        			}
			    }
			}else{
			    $this->session->set_flashdata("fail","Something went wrong. please try again later.");
			    redirect(SURL."Newlogin");
			}
		}	
		
		$data['FBauthUrl'] = $this->facebook->login_url();
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE){ 
            $data['googleURL'] = $this->googleplus->loginURL();
            $this->load->view("Newlogin", $data);
        }else{

            $con['conditions'] = array(
                    'email' => $this->input->post("email"),
                    'pass' => sha1($this->input->post("pass")),
            );
            
            $userCount = $this->common->get_single_row("users",$con);
           
            
            if($userCount){
                if($userCount->can_login=="1"){
                    $this->session->set_flashdata("fail","Your account blocked.");
			        redirect(SURL.'Newlogin');
                }
                
                $this->session->set_userdata("user",$userCount->u_id);
                $this->session->set_userdata('LoggedIn',TRUE);
                
                if($userCount->user_status=="User"){
                    redirect(SURL."Freelancerdash");
                }else{
                    redirect(SURL."Buyerdashboard");
                }
                
            }else{
                $this->session->set_flashdata('fail','No Record Found');
                redirect(SURL."Newlogin");
            }
            
            
            $this->load->view("Newlogin", $data);
        }    
		
	}
	
	public function google_response(){

        if(isset($_GET['code'])){

           $this->googleplus->getAuthenticate();
           $email=$this->googleplus->getUserInfo()['email']; 
           $fname=$this->googleplus->getUserInfo()['given_name']; 
           $lname=$this->googleplus->getUserInfo()['family_name']; 
           
           $con['conditions'] = array("email"=>$email);
           $userrecord = $this->common->get_single_row("users", $con);

           if($userrecord == True){
               
                if($userrecord->can_login=="1"){
                    $this->session->set_flashdata("fail","Your account blocked.");
			        redirect(SURL.'Newlogin');
                }
                
                $this->session->set_userdata("user",$userrecord->u_id);
                $this->session->set_userdata('LoggedIn',TRUE);
                
                if($userrecord->user_status=="User"){
                    redirect(SURL."Freelancerdash");
                }else{
                    redirect(SURL."Buyerdashboard");
                }

           }else{

                $this->db->trans_start();
                
                $getloc = json_decode(file_get_contents("http://ipinfo.io/".$this->input->ip_address()));
                $mylocation = $getloc->city." ".$getloc->country;
                
                $explode = explode("@",$email);
                $username = $explode[0];
                
                $data = array('f_name' => $fname,
                              'l_name' => $lname,
                              'email' => $email,
                              'username' => $username,
                              'user_status' => "User",
                              'location'=>$mylocation,
                              'oauth'=> "Google",
                              'Joining_date'=>Date("Y-m-d"),
                              'status'=>'Active',
                              'dp'=>'assets/images/dp.png'
                            );

                $lastrecord = $this->common->insert("users",$data);
                
                $this->session->set_userdata("user",$lastrecord);
                $this->session->set_userdata('LoggedIn',TRUE);
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
                    redirect(SURL."Newlogin");
                }else{
                    redirect(SURL."Type");

                }
           }

        }else{
             redirect(SURL."Newlogin");

        }

    }
    
    public function now(){
        
        
        if(!empty($this->input->post("u_id"))){
            
            $this->session->set_userdata("LoggedIn",True);
	    	$this->session->set_userdata("user",$this->input->post("u_id"));
	    	$this->session->set_flashdata("success","You have been logged into the account");
	    	redirect(SURL);
        }else{
            redirect(SURL.'Login');
        }
        
        
    }
    
    
    
	
}
