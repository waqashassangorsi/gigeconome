
  <?php include("fronthead.php");?>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <body>
      


<style>
        .error{color:red;}
        .profile_name{
            font-size: 15px!important;
        }
        .menu{
            background: #fff!important;
            border: 0!important;
            margin: 0px;
            padding: 0;
        }
        .menu ul li a:hover{
            color: #444!important;
        }
        .navicon{
            width: 34px;
        }
        .user img{
            width: 40px;
            height: 40px;
        }
        .second_menu{
            background: #EEEEEE!important;
            border-bottom: 1px solid #ccc!important;
        }
        .second_menu li{
            padding: 0;
        }
        .second_menu li a{
            color: #444!important;
        }
        .second_menu li a:hover{
            background: #eee!important;
        }
        .search_input{
            margin-top: 10px;
            padding-left: 24px;
           
        }
        .serach_iconnn{
            position: relative;
        }
        
        .search_dropdown{
            position: absolute;
            top: 48px;
            width: 184px!important;
            box-shadow: 0 0 3px 0px black;
        }
        .dropdown .open{
            background: #fff!important;
        }
        .profile_user a:hover{
            background: red!important;
        }
        .profile_user{
            position: absolute;
            top: 18px;
            right: 60px;
            cursor: pointer;
        }
        .profile_drop{
            width: 241px!important;
            font-size: 13px;
            padding-left: 10px;
            box-shadow: 0 0 10px -3px grey;
        }
        .toggle_button{
            background: #333!important;
        }
        .search_img{
            position: absolute;
            top: 17px;
            left: 5px;
            width: 17px;
        }
        .dropdown-menu li a{
            border-bottom: #f1ecec!important;
        }
        .pro_detail img{
            width: 50px;
            margin-top: 10px;
            margin-left: 10px;
        }
        .pro_detail h4{
            font-weight: bold;
        }
        .pro_detail h5{
            color: #989292d6;
        }
        @media only screen and (min-width: 300px) and (max-width: 767px){
            .search_input{
                width: 170px;
                margin-top: 0;
            }
            .search_dropdown{
                position: absolute;
                top: 50px;
                width: 170px!important;
             }
             .navbar-brand img{
                 width: 100px!important;
             }
             .search_img{
                position: absolute;
                top: 27px;
                left: 5px;
                width: 17px;
            }
        }
        
        .btn_searchbtn
        {
      
      padding: 13px;
    padding-top: 8px;
    padding-bottom: 2px;
    padding-left: 6px;
    padding-right: 5px;
    float: right;
    margin-top: 10px;
    border:none;
        }
        
        .drop_down
        {
            padding: 4px;
    padding-bottom: 5px;
        }
        
        
        @-moz-document url-prefix() {
    #msgscounter{
       margin-left:-13px !important;
    }
}

.postporject_btn {
    background: #007d3d !important;
    padding: 7px!important;
    color: #fff!important;
    margin-top:9px!important;
    margin-right: 10px;
}

.postporject_btn:hover{
      background: #EEEEEE!important;
}

.headinglogotext{
    margin:0px;
}

    </style>
<?php 
 $getloc = json_decode(file_get_contents("http://ipinfo.io/".$this->input->ip_address()));
    //echo "<pre>";var_dump($getloc);
    
    
    $curentlocation = $getloc->city." ".$getloc->country;
    $curentip = $getloc->ip;
    
    //echo $usertime = $getloc->timezone;
    
    
   // date_default_timezone_set($getloc->timezone);
    
   // echo date_default_timezone_get();
    ///// time zone of user?key=YOUR_API_KEY&ip=IP_V4_OR_IPV6_ADDRESS
     $timeZone='';
     $apikey='0cceae7e6555e033ed459e64eaffc165c76819a7b58d3ee042d81369d048df07';
     $urlsss = 'http://api.ipinfodb.com/v3/ip-city/?key='.$apikey.'&ip='.$this->input->ip_address();
     $response = file_get_contents($urlsss);
     
     //var_dump($response);
     
     
     $myArray = explode(';', $response);
     $ipInfo = file_get_contents('http://ip-api.com/json/' .$this->input->ip_address());
     $ipInfo = json_decode($ipInfo);
    // echo (new DateTime('now', new DateTimeZone( $ipInfo->timezone )))->format('P');
    //print_r($ipInfo);
     
     $countryCode=$myArray[3];
     $countryName=$myArray[4];
     $regionName=$myArray[5];
     $zipCode=$myArray[6];
     $latitude=$myArray[7];
     $longitude=$myArray[8];
     //$offset= (new DateTime('now', new DateTimeZone( $ipInfo->timezone )))->format('P');
     $offset= $myArray[10];
    //echo  "offset " + $offset;
     
    list($hours, $minutes) = explode(':', $offset);
    $seconds = $hours * 60 * 60 + $minutes * 60;
   // echo $seconds;
    $tz = timezone_name_from_abbr('', $seconds, 1);
    //var_dump($tz);
    
    if($tz === false) $tz = timezone_name_from_abbr('', $seconds, 0);
    // Set timezone
    date_default_timezone_set($tz);
    
    $this->session->set_userdata('timezone',$tz);
    
 ?>    
    
<?php 
    if($this->session->userdata('user')){
        
    
    $myuser = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
    if(!empty($myuser)){
         if($myuser['status']=="InActive"){?>
         
            <p class="text-center" style="font-weight:bold;padding-top:7px;margin-bottom:0;background:#F15F22;color:#fff">A verification link is sent to your email, please check your email</p>
<?php }?>
<?php


        if($myuser['user_status']=="User"){
            
            $todaydate = date("Y-m");
            $monthlyproposal = $this->db->query("select * from proposal_credits where left(date,7)='$todaydate' and is_paid='No' and u_id='".$myuser['u_id']."' and status='0'");
            
            if($monthlyproposal->num_rows() > 0){
                
            }else{
                
                $array = array(
                                "u_id"=>$myuser['u_id'],
                                "credits"=>"10",
                                "date"=>date("Y-m-d"),
                                "is_paid"=>"No",
                                "used"=>"0",
                                "status"=>"0",
                              );
                              
                $this->Common->insert("proposal_credits",$array);              
            }
        }
        
        $frstdayofmonth = date('Y-m-01');
        $this->db->query("update proposal_credits set used='10' where u_id='".$myuser['u_id']."' and is_paid='No' and date < '$frstdayofmonth' and status='0'");
        
        //msg section comes here
        $mynewuserid = $myuser['u_id'];
        $sql = "select jobs_msgs.*,users.* from jobs_msgs left 
                  join users on 
                    case 
                    when(recv_id = $mynewuserid) then(users.u_id = send_id)
                    when(send_id = $mynewuserid) then(users.u_id = recv_id)
                    end   
                  where msg_id IN(
                    select MAX(msg_id) from jobs_msgs where send_id='$mynewuserid' OR recv_id='$mynewuserid'
                    group by
                      case
                        when(send_id = $mynewuserid) then(recv_id)
                        when(recv_id = $mynewuserid) then(send_id)
                      end  
                    ) 
                    Union
                    select services_msgs.*,users.* from services_msgs left 
                  join users on 
                    case 
                    when(recv_id = $mynewuserid) then(users.u_id = send_id)
                    when(send_id = $mynewuserid) then(users.u_id = recv_id)
                    end   
                  where msg_id IN(
                    select MAX(msg_id) from services_msgs where send_id='$mynewuserid' OR recv_id='$mynewuserid'
                    group by
                      case
                        when(send_id = $mynewuserid) then(recv_id)
                        when(recv_id = $mynewuserid) then(send_id)
                      end  
                    )
                    order by date desc";
        
        $mymsgs = $this->db->query($sql)->result_array();            
        //msg section ends here
    }
    
    }
?>
    
<nav class="navbar menu">
    <div class="container-fluid" style="padding: 5px 0 5px 0;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle toggle_button" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar" style="background:#fff"></span>
                <span class="icon-bar" style="background:#fff"></span>
                <span class="icon-bar" style="background:#fff"></span>                        
            </button>
            <a class="navbar-brand" style="padding-top: 5px;padding-bottom:0;" href="<?php echo base_url(); ?>">
                <img class="logo1" src="<?php echo base_url(); ?>uploads/logo.png" alt="">
                <!--<h1 class="fontdata_heading headinglogotext">Gigecono<span style="color:#009247">Me</span></h1>-->
            </a>
            <form class="navbar-form navbar-left hidden-xs" style="margin-top:0;" action="/action_page.php">
                <div class="form-group serach_iconnn">
                    <img src="uploads/search.png" class="search_img">
                    <input type="text" class="form-control search_input dropdown-toggle" placeholder="Search" data-toggle="dropdown" readonly style='cursor:pointer;border:none'>
                      <button type='button' class='btn_searchbtn dropdown-toggle' data-toggle="dropdown"><i class='fa fa-caret-down drop_down'></i></button>
                    <ul class="dropdown-menu search_dropdown" style="width: 171px;">
                        <li><a href="/Freelancers">Hire FreeLancers</a></li>
                        <li><a href="/Jobs">Jobs</a></li>
                        <li><a href="/Offer">Services</a></li>
                        
                    </ul> 
                </div>
                     
            </form>
        </div>
        <div class="collapse navbar-collapse" >
            <ul class="nav navbar-nav navbar-right">
                <?php if($this->session->userdata('LoggedIn')){ ?>
                <li class="dropdown hidden-xs">
                    <a href="<?php echo base_url()?>Postproject" class="btn postporject_btn hidden-xs" style="color:#fff;">POST PROJECT</a>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0)" class="dropdown-toggle msgscounter_wrpr" data-toggle="dropdown" style="padding-top: 7px;"> 
                        <img src="<?php echo base_url();  ?>assets/images/header/message.png" class="navicon msgicon"  alt="...">
                        <?php if($myuser['msgs'] > 0){?>
                        <span class="badge h6" id="msgscounter" style="font-size: 10px;background: red;color: white;padding: 2px;margin-left: -15px;"><?php echo $myuser['msgs'];?></span>
                        <?php } ?>
                    </a>
  
                    <div class="dropdown-menu" style="width: 340px;padding: 0;box-shadow: 0px 0px 5px gainsboro;">
                         <h4 style="padding: 10px 15px 10px 15px;background: #f3f5f7;margin:0;">MESSAGES</h4>
                         <div class="all_msgs">
                        <?php 
                            if(!empty($mymsgs)){
                                foreach($mymsgs as $key=>$value){
                                            if($value['job_id'] != 0 && $value['job_id'] != null){
                                            $job_query = $this->db->query("select * from jobs where job_id='".$value['job_id']."'")->result_array()[0];
                                            $job_title = $job_query['job_title'];
                                            $job_slug = $job_query['job_slug'];
                                            $url_chat = SURL.'Chat/index/'.$value['username'].'/'.$job_slug;
                                            }else{
                                               $job_query = $this->db->query("select * from services where service_id=".$value['service_id'])->result_array()[0];
                                                $job_title = $job_query['title'];
                                                $job_slug = $job_query['service_slug']; 
                                                $url_chat  =SURL.'ChatServices/index/'.$value['username'].'/'.$job_slug.'?id='.$value['service_p_id'];
                                            }
                        ?>
                        <a href="<?php echo $url_chat;?>"> 
                            <div class="readmsgs">
                                <ul style="display: flex;list-style: none;padding: 0;">
                                    <li>
                                        <img src="<?php echo $value['dp'];?>" class="img-circle" style="width:30px;height:30px;">
                                    </li>
                                    <li style="padding: 0 0 0 6px;">
                                        <h5 style="margin-top:3px;font-weight: 700;"><?php echo $job_title;?></h5>
                                        <h6><?php echo $value['content'];?></h6>
                                        <h6><?php echo $this->check->timeAgo(strtotime($this->Common->gettimeinmyzone(($value['date'])))); ?></h6>
                                    </li>
                                </ul>
                            </div>         
                        </a>
                        <hr>
                        <?php }
                        
                        }else{?>
                        <p class="text-danger text-center">No Record Found.</p>
                        <?php } ?>
                        
                        </div>
                        
                        <hr>
                        <div class="text-right" style="padding: 10px 10px 10px 0;">
                            <a href="<?php echo SURL.'Inbox';?>" style="color:#04944A;font-weight:bold" class="btn btn-link btn-primary">View All</a>
                        </div>
                    </div>
                </li>
                <li class="hidden-xs">
                    <a href="javascript:void(0)" class="dropdown-toggle noti_wrpr" data-toggle="dropdown" style="padding-left: 0;padding-top: 7px;"> 
                        <img src="<?php echo base_url();  ?>assets/images/header/n.png" class="navicon noti_icon"  alt="...">
                        <?php if($myuser['notifications'] > 0){?>
                        <span class="badge h6" id="noti_counter" style="font-size: 10px;background: red;color: white;padding: 2px;margin-left: -15px;"><?php echo $myuser['notifications'];?></span>
                        <?php } ?>
                    </a>
                    <?php 
                    $mynotifications = $this->db->query("select * from notifications where noti_recvr_id='".$myuser['u_id']."' order by noti_id desc limit 5")->result_array();
                    
                    //var_dump($mynotifications);
                    ?>
                    <div class="dropdown-menu" style="width: 340px;padding: 0;box-shadow: 0px 0px 5px gainsboro;">
                        <h4 style="padding: 10px 15px 10px 15px;background: #f3f5f7;margin:0;">NOTIFICATIONS</h4>
                        <div class="all_notifications">
                            <?php 
                                if(!empty($mynotifications)){
                                    foreach($mynotifications as $key=>$value){
                                        if($value['is_read']=="Yes"){
                                            $is_noti_read = "readmsgs";
                                        }else{
                                            $is_noti_read = "unreadmsgs";
                                        }
                            ?>
                                        <a href="<?php echo $value['link'];?>" class="noti_wrpr_head" data-id1="<?php echo $value['noti_id'];?>"> 
                                <div class="my_noti <?php echo $is_noti_read;?>">  
                                    <ul style="display: flex;list-style: none;padding: 0;">
                                        <li style="padding: 0 0 0 6px;">
                                            <h5 style="margin-top:3px;font-weight: 700;"><?php echo $value['notification'];?></h5>
                                            <h6>
                                                <?php echo $this->check->timeAgo(strtotime($this->Common->gettimeinmyzone(($value['noti_date'])))); ?>
                                            </h6>
                                        </li>
                                    </ul>
                                </div>         
                            </a>
                        
                        <?php       }    }else{ ?>
                        <p class="text-danger text-center" style="margin-top:10px;">No Notifications Found.</p>
                        <?php } ?>
                        
                        </div>
                        
                        <hr>
                        <div class="text-right" style="padding: 10px 10px 10px 0;">
                            <a href="<?php echo SURL.'Notifications'; ?>" style="color:#04944A;font-weight:bold" class="btn btn-link btn-primary">View All</a>
                        </div>
                    </div>
                </li>
                
                <li class="user dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 7px;padding-bottom: 7px;">
                        <img class="img-circle" src="<?php echo $myuser['dp'];?>"  alt="...">
                    </a>
                    <!--<span class="profile_name dropdown-toggle profile_user" data-toggle="dropdown">Welcome <b style="color:#009247;"><?php echo $myuser['f_name'];?></b></span>-->
                    <span class="profile_name dropdown-toggle profile_user" data-toggle="dropdown" style="right: 28px;width: 170px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;text-align: left;">Welcome 
                        <b style="color:#00a651;">
                            <?php 
                               
                                if($myuser['is_company']=="Yes"){
                                     echo $myuser['company_name'];
                                }else if($myuser['show_name'] == 'first_name'){
                                     echo $myuser['f_name'];
                                }else{
                                    echo $myuser['f_name']." ".$myuser['l_name'];
                                }
                               
                            ?> 
                        </b>
                        <i class="fa fa-caret-down" aria-hidden="true"></i></span><span style="font-size:12px" class="hidden-sm visible-xs text-center mobile_rate">($<?php echo $this->Common->myblnc($myuser['u_id']);?>)</span>

                    <ul class="dropdown-menu profile_drop" style="width: 171px;border-bottom: #e8e7f3;">
                        <!--<li>-->
                        <!--    <div class="pro_detail">-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-md-4">-->
                        <!--                <img class="img-circle" src="<?php echo base_url();  ?>assets/images/pic.png"  alt="...">-->
                        <!--            </div>-->
                        <!--            <div class="col-md-8">-->
                        <!--                <h4>Hasan Muhammad</h4>-->
                        <!--                <h5>bilal@gmail.com</h5>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                                
                        <!--</li>-->
                        <?php if($myuser['user_status']=="User"){?>
                        <li class="test"><a href="/Freelancerdash">Dashboard</a></li>
                       <li class="test"><a href="<?php echo SURL.'PaymentSummary/buycredits/'.$myuser['u_id'];?>">Buy Credits</a></li>
                    
                        <?php }else{ ?>
                        <li><a href="/Buyerdashboard">Dashboard</a></li>
                        
                        <?php } ?>
                        
                        <li><a href="/TimeLine/<?php echo $myuser['username']?>">Profile</a></li>
                        <li><a href="/Completeprofile">Edit Profile</a></li>
                        <li><a href="/Setting">Settings</a></li>
                        <li><a href="<?php echo SURL.'Payment';?>">Payments</a></li>
                        <li><a href="/favourite">Favourite</a></li>
                        
                        <?php if($myuser['user_status']!="Buyer"){ ?>
                        <li><a href="<?php echo SURL.'Post';?>">Post Service</a></li>
                        <li><a href="<?php echo SURL.'Offer/index/'.$myuser['u_id'];?>">My services</a></li>
                         <li><a href="<?php echo SURL.'/PaymentSummary/featureprofile';?>">Profile Feature</a></li>
                        <?php }?>
                        
                        <li><a href="<?php echo base_url()?>CustomerSupport">Customer Support</a></li>
                        <li><a href="<?php echo SURL.'Logout';?>">Logout</a></li>
                    </ul>  
                </li>
                <?php }else{ ?>
                <li><a href="<?php echo SURL.'Newlogin';?>" style="font-weight: bold;">Login</a></li>
                <li><a href="<?php echo SURL.'Newsignup';?>" style="font-weight: bold;">Sign Up</a></li>
                <?php } ?>
            </ul>
            
        </div>
        
    </div>
    <?php $categories = $this->db->query("select * from categories where parent_id='0'")->result_array(); ?>
    
    
    <div class="second_menu collapse navbar-collapse " id="myNavbar">
            <ul class="nav navbar-nav responsivemenu1 hidden-sm visible-xs" style="background: white;">
                 <?php if($this->session->userdata('LoggedIn')){ ?>
                <a data-toggle="collapse" data-target="#demo" class="hidden-lg hidden-sm hidden-md">My profile</a>
                <ul id="demo" class="collapse" >
                      <li><a href="/Buyerdashboard">Dashboard</a></li>
                      <li><a href="<?php echo base_url()?>Postproject">Post Project</a></li>
                      <li><a href="/TimeLine/index/<?php echo $myuser['username']?>">Profile</a></li>
                      <li><a href="/Completeprofile">Edit Profile</a></li>
                      <li><a href="/Setting">Settings</a></li>
                      <li><a href="<?php echo SURL.'Payment';?>">Payments</a></li>
                      <li><a href="/favourite">Favourite</a></li>
                      <li><a href="<?php echo SURL.'Post';?>">Post Service</a></li>
                      <li><a href="<?php echo SURL.'Offer/index/'.$myuser['u_id'];?>">My services</a></li>
                      <li><a href="<?php echo base_url()?>CustomerSupport">Customer Support</a></li>
                      <li><a href="<?php echo SURL.'Logout';?>">Logout</a></li>
                </ul> 
             <?php } else { ?>
            <li><a href="<?php echo SURL.'Newlogin';?>" style="font-weight: bold;">Login</a></li>
            <li><a href="<?php echo SURL.'Newsignup';?>" style="font-weight: bold;">Sign Up</a></li>
            <?php } ?>
            </ul>
            
            <ul class="nav navbar-nav responsivemenu2">
                <?php foreach($categories as $key=>$value){?>
                <li><a href="<?php echo SURL.'Freelancers/showfreelancer/'.$value['cat_id'] ?>" data-id='<?php echo $value['cat_id']?>'><?php echo $value['cat_name'];?></a></li>
                <?php } ?>
            </ul>
        </div>
    
   
</nav>

<script>
    $(document).on('click','.noti_wrpr_head',function(){
        
        var noti_id = $(this).data("id1");
        
        $.ajax({
          url: "Chat/updatenotistatus",
          cache: false,
          type: "POST",
          data: {noti_id : noti_id},
          success: function(html){ 
             
          }
        });
        
    });
    
        
    <?php if(!$view_chat_admin){?>
    $(document).ready(function(){
         setInterval(get_new_noti, 50000000);
     });    
    <?php } ?>
    function get_new_noti(){ 
        
        var noti_id = $('.noti_wrpr_head:first').data("id1");
        var u_id = <?php echo $myuser['u_id'];?>;
        
        $.ajax({
            url: "Chat/get_new_msgs_notification",
            method:"post",
            data:{noti_id:noti_id,u_id:u_id},
            cache: false,
            success: function(html){ 
              if(html =="0"){
    
              }else{ 
                $(".all_notifications").prepend(html);
              }
              
              
            }
        });
          
          
          
        $.ajax({
            url: "Chat/get_new_notification_above",
            method:"post",
            data:{u_id:u_id},
            cache: false,
            success: function(html){ 
              if(html =="0"){
    
              }else{ 
                
                $("#noti_counter").remove();
                $(html).insertAfter(".noti_icon");
              }
              
              
            }
        });  
        
        $.ajax({
            url: "Chat/get_all_msgs",
            method:"post",
            data:{u_id:u_id},
            cache: false,
            success: function(html){ 
              
                $(".all_msgs").html(html);
              
            }
        });
        
        $.ajax({
            url: "Chat/get_new_msgs_above",
            method:"post",
            data:{u_id:u_id},
            cache: false,
            success: function(html){ 
              if(html =="0"){
    
              }else{ 
                
                $("#msgscounter").remove();
                $(html).insertAfter(".msgicon");
              }
              
              
            }
        });
    }
    
</script>
