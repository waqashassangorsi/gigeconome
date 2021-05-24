<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsignupcontinue extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('common');
		$this->form_validation->set_error_delimiters('<h6 class="error">', '</h6>');
		
	}

	public function index()
	{ 
	    
		if(empty($this->input->post("email"))){
			redirect(SURL."Newsignup");
		}
		
	    $data['email'] = $this->input->post("email"); 
		$this->load->view("Newsignupcontinue", $data);

		
	}
	
	public function add(){
        
        //echo "<pre>";var_dump($this->input->post());exit;
        
		$email = $this->input->post("email");
		$f_name = $this->input->post("fname");
		$l_name = $this->input->post("lname");
		$pass = $this->input->post("password");
		$re_pass = $this->input->post("confirm_password");
	    $getloc = json_decode(file_get_contents("http://ipinfo.io/".$this->input->ip_address()));
        $mylocation = $getloc->city." ".$getloc->country;

        if(!empty($f_name) && !empty($l_name) && !empty($email) && !empty($pass) && !empty($re_pass)){

             $con['conditions'] = array(
                    'email' => $this->input->post("email"),
            );

            $userCount = $this->common->get_single_row("users",$con);
            if($userCount){
                 $this->session->set_flashdata('fail','The given email already exists.');
            	 redirect(SURL."Newsignup");

            }else{

            	if(strcmp($pass,$re_pass) == 0){

            	}else{

					$this->session->set_flashdata('fail','Password doesnt match with each other.');
					redirect(SURL."Newsignup");

            	}

                $otp = rand(1000,9999);
                $url = sha1($email).time().$otp;


                $explode = explode("@",$email);
                $username = $explode[0];
                
                $userData = array(

                    'f_name' => ucfirst($f_name),
                    'l_name' => ucfirst($l_name),
                    'email' => $email,
                    'pass' => sha1($pass),
                    'Joining_date' => Date("Y-m-d"),
                    'status' => 'InActive',
                    'user_status' => 'User',
                    'verify' => $url,
                    'location'=>$mylocation,
                    'dp'=>"assets/images/dp.png",
                    'username' => $username
                );

                $insert = $this->common->insert("users",$userData);

                if($insert){
                    //$data['type'] = "sign_up_verfication";
                    $data['link'] = SURL."Verify/email/$url";
                    $html = $this->load->view("email.php",$data,true);;

                    $emailsent = $this->common->send_email($email, 'Registration', $html);  
                    $url = SURL."Verification/user/".$url;
                        
                    $this->session->set_userdata("user",$insert);
                    $this->session->set_userdata('LoggedIn',TRUE);

                	$this->session->set_flashdata('success','Registration Done, Please check the email to verify your account.');
                	redirect(SURL."Type");

                }else{

                    $this->session->set_flashdata('fail','Some problems occurred, please try again.');
                    redirect(SURL."Newsignup");

                }

                

                

               

            }

        }else{

         

            $this->session->set_flashdata('fail','Provide complete user info to add.');
            redirect(SURL."Newsignup");

        }

	}


	
}
