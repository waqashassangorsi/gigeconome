
  <?php  include("fronthead.php");?>
  <body>
<style>
        .error{color:red;}
        .profile_name{
            font-size: 15px!important;
        }
        .menu{
            border: 0!important;
            margin: 0px;
            padding: 0;
        }
    

        .navicon{
            width: 34px; 
        }
        .user img{
            width: 40px;
            height: 40px;
        }
        .second_menu{
            /*background: #EEEEEE!important;*/
            /*border-bottom: 1px solid #ccc!important;*/
        }
      
        .second_menu li{
            padding: 0;
        }
        .second_menu li a{
            color: #444!important;
        }
        .second_menu li a:hover{
            background: #F3F4F5!important;
        }
        .search_input{
            margin-top: 16px;
            padding-left: 24px;
           
        }
        .serach_iconnn{
            position: relative!important;
            margin-top: 6px;
        }
        
        .search_dropdown{
            position: absolute !important;
            top: 48px!important;
            left: 0px!important;
            width: 184px!important;
            box-shadow: 0 0 3px 0px black;
        }
      
        .profile_user a:hover{
            background: red!important;
        }
        .profile_user{
            position: absolute;
            top: 20px;
            right: 26px;
            cursor: pointer;
        }
        .profile_drop{
            width: 241px!important;
            font-size: 13px;
            padding-left: 10px;
            box-shadow: 0 0 10px -3px grey;
        }
        .profile_drop >li >a:hover
        {
            background:#5bc0de !important;
            color:#fff !important;
        }
        .search_img{
            position: absolute;
            top: 23px;
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
                width: 100%;
                margin-top: 0;
            }
            .search_dropdown{
                position: absolute;
                top: 31px!important;
                width: 100%!important;
             }
             .navbar-brand img{
                 width: 153px!important;
             }
             .search_img{
                position: absolute;
                top: 11px;
                left: 5px;
                width: 17px;
            }
            .serach_mobile{
                display: flex!important;
                list-style: none;
                padding-left: 0;
                height: 45px;
            }
            
            .mobile_dropdownmenu
            {
               
            margin-left: -160px;
            margin-top: 19px;
            }
            
            
            .mobile_dropdownmenu2
            {
               
            margin-left: -204px;
            margin-top: 19px;
            }
            
        
        }
        .postporject_btn{
            background: #009247 !important;
            padding: 7px!important;
            color: #fff!important;
            margin-top: 13px!important;
            margin-right: 10px;
        }
        .postporject_btn:hover{
            background: #009247 !important;
            color: #fff!important;
        }
        .postporject_btnrate{
            background: #009247 !important;
            color: #fff !important;
            padding: 6px 20px!important;
            margin-top: 17px;
            margin-right: 15px;
                }
        .postporject_btnrate:hover{
            background: #009247 !important;
            color: #fff !important;
        }
        .post_rate{
            position: absolute;
            top: 0px;
            right: -2px;
        }
        .hrline_massage{
            margin: 0!important;
        }
        .second_menuwe{
            width: 100%;
            border-top: 1px solid #eee;
            justify-content: space-around;
             display: flex;
        }
        .mobile_rate{
            position: absolute;
            right: -17px;
            top: 23px;
        }
		.user{
			width:31rem !important;
		}
		
		#message_mobile
		{
    	width: 20%;
        margin-top: 16px;
        display: flex;
        padding: 5px;
        list-style-type: none;
		}
		

		@media screen and (max-width: 468px) and (min-width:340px){

     	#notifi_counter
		{
		    margin-top: -33px;
		    margin-left:18px !important;
		}
		#msgscounter
		{
		    right: -1px !important;
		}
}

.post_rate 
{
    top: 2px;
}

.navbar-brand2
{
   padding:0px; 
}

@media screen and (max-width: 766px) and (min-width:340px){
.navbar-brand2{
           padding:6px;
       }
    
}

/********************toogle btn*******************/

.switch {
  position: relative;
  display: inline-block;
  width: 75px;
    height: 24px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 21px;
    width: 19px;
    left: 1px;
    bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
  
  
  .material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
  
  
  @media screen and (max-width: 764px) and (min-width:340px){
.invoicee_detailse_wapr{
        overflow-x: auto!important;
        width: 100%!important;
    }
    .invoicee_detailse{
        width: 1000px!important;
        overflow-x: auto!important;
    }  

}

.navbar-right2
{
    margin-top: 6px;
}

.navbar-right3
{
    margin-top: 13px;
}

@media screen and (max-width: 764px) and (min-width:340px){
.postporject_btn 
{
    margin-top:0px !important;
    margin-bottom: 11px;
}
.serachandpost
{
    padding-top:14px;
}

.serachandpost2
{
    padding-top:14px;
}

.navbar-right3
{
    margin-top: 0px;
}
}

    </style>

<?php 
    $myuser = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
 

?>

<nav class="navbar menu" id="fixednav">
    <div class="container-fluid" style="padding: 5px 0 5px 0;">
        <div class="navbar-header">
            
            <button type="button" class="navbar-toggle toggle_button" data-toggle="collapse" style="padding:0;margin-top: 27px;"  data-target="#myNavbar">
                <span class="glyphicon glyphicon-align-justify mobileicon_bar" style="font-size:20px;color:#5bc0de;"></span>                       
            </button>
            
            <div>
          
            </div>
      
           
            
        </div>
<script>
    $(document).on('click','.navicon',function(){
    
       var id = $(this).data("id3");
      
       
        // if(){
                var portpid = $(this).data("id");
               
                $("#wrpr_portfolio_"+portpid).remove();
                $.ajax({
                  url: "/",
                  cache: false,
                  type: "POST",
                  data: {portpid : portpid},
                  success: function(html){ 
                      
                  }
                });
          
          
        // }else{
        // return false;
        // }
        
    });
</script>
        <div class="collapse navbar-collapse" id="myNavbar">
                <div class="col-sm-2">
                            <img src="https://gig.coviknow.com/uploads/logo.png">
                </div>
            
                
             <?php if($this->session->userdata('LoggedIn')){ ?>
                <ul class="hidden-sm visible-xs mobile_list">
                    <li><img class="img-circle" src="<?php echo $myuser['dp'];?>"  alt="..." style="width:8%"> <span class="profile_name">Welcome 
                        <b style="color:#009247;">
                            <?php 
                               
                                if($myuser['is_company']=="Yes"){
                                     echo $myuser['company_name'];
                                }else if($myuser['show_name'] == 'first_name'){
                                     echo $myuser['f_name'];
                                }else{
                                    echo $myuser['f_name']." ".$myuser['l_name'];
                                }
                               
                            ?> 
                        </b> </span> </li>
                        
                        
                      
                            <ul  style="border-bottom: #e8e7f3;">
                         
                         
                         <li><a href="/ViewTicket">View Ticket</a></li>
                        <li><a href="/Query">Submit a Ticket</a></li>
                         
                        </a>
                        
                    </ul>  
                            
                    
                    </li>    
           
            
                    
                </ul>
                
            <?php } ?>
            
            
            
            <!--<ul class="hidden-sm visible-xs serach_mobile">-->
            <!--    <li>-->
            <!--        <form class="navbar-form navbar-left " style="margin-top:0;" action="/action_page.php">-->
            <!--            <div class="form-group serach_iconnn">-->
            <!--                <img src="uploads/search.png" class="search_img">-->
            <!--                <input type="text" class="form-control search_input dropdown-toggle" placeholder="Search" data-toggle="dropdown">-->
            <!--                <ul class="dropdown-menu search_dropdown" style="width: 171px;">-->
            <!--                    <li><a href="/Freelancers">Hire FreeLancers</a></li>-->
            <!--                    <li><a href="/Jobs">Projects</a></li>-->
            <!--                    <li><a href="/Offer">Services</a></li>-->
                                
            <!--                </ul> -->
            <!--            </div>-->
                             
            <!--        </form>-->
            <!--    </li>-->
            <!--    <?php if(!empty($myuser)) { ?>-->
                
            <!--    <li style="padding-left:27px">-->
            <!--         <a href="<?php echo SURL ?>Postproject" class="btn postporject_btn hidden-sm visible-xs" style="color:#fff;font-size: 9px;padding: 8px 6px!important;">POST PROJECT</a>-->
            <!--    </li>-->
                
            <!--    <?php } ?>-->
            <!--</ul>-->
            
            <?php if($this->session->userdata('LoggedIn')){ ?>
            <ul class="nav navbar-nav navbar-right navbar-right2">
                
            <?php } else { ?>
            <ul class="nav navbar-nav navbar-right navbar-right3">
            <?php }?>
            
                <?php if($this->session->userdata('LoggedIn')){ ?>
                 
                 <li><a href="<?php echo SURL ?>ViewTicket" class="btn postporject_btn hidden-xs" style="color:#fff;">View Ticket</a></li>
                  <li><a href="<?php echo SURL ?>Query" class="btn postporject_btn hidden-xs" style="color:#fff;">Submit a Ticket</a></li>
                 
              
               
                <?php  if($myuser['is_company']!="Yes"){ ?>
                
               
                    
                <li class="user hidden-xs dropdown" style="width: 250px !important;" > <!---width 23rem--->
                <?php } else { ?>    
                <li class="user hidden-xs dropdown" style="width: 250px !important;">
                <?php } ?>
                <!--<span class="caret"></span>-->
                
                    <a href="javascript:void(0)" style="padding-top: 7px;padding-bottom: 7px;">
                        <img class="img-circle" src="<?php echo $myuser['dp'];?>"  alt="...">
                    </a>
                    <span class="profile_name dropdown-toggle profile_user" data-toggle="dropdown" style="right: 28px;width: 170px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;text-align: left;">Welcome 
                        <b style="color:#009247;">
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
                        
                </li>
                

                <?php }else{ ?>
                <li><a href="<?php echo SURL.'Newlogin';?>" style="font-weight: bold;">LOGIN</a></li>
                <li><a href="<?php echo SURL.'Newsignup';?>" style="font-weight: bold;">SIGN UP</a></li>
                <?php } ?>
            </ul>
            
        
        </div>
    </div>
   
</nav>


<div style='min-height:450px'>
