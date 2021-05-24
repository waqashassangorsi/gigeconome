<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgetPassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->load->library('form_validation');
	}

	public function index()
	{ 
	    
	    if($this->session->userdata('LoggedIn') == TRUE && $this->session->userdata('user')){
            redirect(SURL);
        }		
		
        
        $this->form_validation->set_rules('email', 'Email', 'required');
       
        
        if($this->form_validation->run() == FALSE){ 
            $this->load->view("ForgetPassword", $data);
        }else{

                $email=$this->input->post("email");
               $query=$this->db->query("select * from users where email='$email'")->row();
               $userid=$query->u_id;
               if(!empty($query))
               {
                 $rand = $this->generateRandomString();
                    $arraynew = array(
                                "otp"=>"#".$rand,
                             );
                 $con['conditions']=array("u_id"=>$userid);
                 $this->Common->update("users",$arraynew,$con);
                $data['email'] = $email;
                $data['otp']="#".$rand;
        		$html = $this->load->view("email2.php",$data,true);
                $emailsent = $this->Common->send_email($email,'Gig Coviknow', $html);
                $this->session->set_flashdata('success','Link Successfully has been sent to your Email.');
        		//redirect(SURL.'ForgetPassword/confrimemail');
        		  $this->load->view("ConfirmForgetPassword",$data);
               }else
               {
                     $this->session->set_flashdata('fail','No Email found.');
        		   redirect(SURL.'ForgetPassword');
                   
               }
               
                
            }
           
          
        }    
        
    public function confrimemail()
    {
        
        $useremail=$this->input->post('useremail');
        $otp=$this->input->post('otp');
        $password=$this->input->post('password');
        $query=$this->db->query("select * from users where email='$useremail'")->row();
        
        $userid=$query->u_id;
        if($query->otp==$otp)
        {
               $arraynew = array(
                                "pass"=>sha1($password),
                             );
                 $con['conditions']=array("u_id"=>$userid);
                 $this->Common->update("users",$arraynew,$con);
            
               $this->session->set_flashdata('success','Your password has been updated.');
                redirect(SURL.'ForgetPassword');
            
        }else
        {
              $this->session->set_flashdata('fail','OTP Not Matched .');
        	redirect(SURL.'ForgetPassword');
            
        }
     
       
        
    }
        
         function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
		
    
	
}
