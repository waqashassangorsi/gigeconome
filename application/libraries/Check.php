<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Check{

	
	public function Login(){
		$CI =& get_instance();
		$CI->load->model('common');
		

		if((!$CI->session->userdata('AdminLoggedIn')) &&(!$CI->session->userdata('distributor'))){
			$CI->session->sess_destroy();
			redirect("Login");
			exit();
		}

		$con['conditions'] = array('u_id' =>$CI->session->userdata('distributor')); 
		$user = $CI->common->get_single_row("users",$con);

		if($user){
				
			if(($CI->router->fetch_class() == "Dashboard") || ($user->user_status == "Admin")){

			}else{

				$con['conditions'] = array('pageurl' =>  htmlspecialchars($CI->router->fetch_class())); 
				$page_id = $CI->common->get_single_row("submenu",$con)->id;

				if($page_id == 2){
					$CI->session->set_flashdata('fail','you are not authorized to view this page.');
					redirect("Dashboard");
				}

				$con['conditions'] = array('page_id' => $page_id,"u_id"=>$user->u_id); 
				$rights = $CI->common->get_single_row("user_rights",$con);

				if($rights){

				}else{
					$CI->session->set_flashdata('fail','you are not authorized to view this page. Ask your admin to give you access');
					redirect("Dashboard");
				}
			}
				
			return $user;
			
			
		}else{
			$CI->session->set_flashdata('fail','Your account has disabled or something went wrong.');
			redirect("Login");
			
		}
	}

	function timeAgo($time_ago){
			
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($seconds / 60 );
			$hours      = round($seconds / 3600);
			$days       = round($seconds / 86400 );
			$weeks      = round($seconds / 604800);
			$months     = round($seconds / 2600640 );
			$years      = round($seconds / 31207680 );
			// Seconds
			if($seconds <= 60){
			    return "Just now";
			}
			//Minutes
			else if($minutes <=60){
			    if($minutes==1){
			        return "1 minute ago";
			    }
			    else{
			        return "$minutes minutes ago";
			    }
			}
			//Hours
			else if($hours <=24){
			    if($hours==1){
			        return "an hour ago";
			    }else{
			        return "$hours hrs ago";
			    }
			}
			//Days
			else if($days <= 7){
			    if($days==1){
			        return "Yesterday at"." ".date("H:ia",$time_ago) ;
			    }else{
			        return "$days days ago";
			    }
			}
			//Weeks
			else if($weeks <= 4.3){
			    if($weeks==1){
			        return "A week ago";
			    }else{
			        return "$weeks weeks ago";
			    }
			}
			//Months
			else if($months <=12){
			    if($months==1){
			        return "A month ago";
			    }else{
			        return "$months months ago";
			    }
			}
			//Years
			else{
			    if($years==1){
			        return "One year ago";
			    }else{
			        return "$years years ago";
			    }
			}
		}



}
?>