<?php include("includes/front_end_header.php");?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/chatpage.css">
<style>

   
    .input_icon i{
       position: absolute;
       padding-left: 5px;
       color: #33333373!important;
   }
   
      .icon_new{
       padding-top:18px;
       font-size: 14px;
   }
    .input_icon input{
        padding-left: 30px;
        background: #eee;
        border: 1px solid #3333332b;
   }
      .accept_wpar h4, .reject_wpar h4{
       font-size: 14px;
   }
    .row{
        padding: 0;
        margin: 0;
    }
    .receive_chat{
        margin-top: 10px;
        background: #c1e7f4;
        margin-left: 20px;
        border-radius: 10px;
    }
    .receive_chat h6{
        color: #222;
        font-size: 8px!important;
        font-weight: bold;
    }
    .receive_chat p{
        font-size: 13px!important;
        color: #5F5E5E;
    }
    .receive_chat h5{
        padding-top: 10px;
        font-size: 8px!important;
        font-weight: bold;
    }
   

   
    .send_button{
        padding: 23px !important;
        font-size: 18px;
        margin-top: 20px;
        border-radius: 0;
        background: #5bc0de;
        border-radius: 20px;
        color: #fff;
    }
    .send_button:hover{
        background: #5bc0de;
        color: #fff;
    }
    
   
    .profile_chat{
        background: #fff;
        box-shadow: 0 0 10px -6px grey;
        border-radius: 10px;
        padding-top: 13px;
        padding-bottom: 40px;
        margin-top: 15px;
    }
    .profile_chat img{
        width: 50px;
    }
    .profile_chat h4{
        color: #111;
    }
    .profile_chat h6{
        color: #111;
    }
    .profile_chat h5{
        color: #111;
    }
  

   .btn-defult{
       background: #eee!important;
   }
   .send_buttoncollapse{
        padding: 15px;
        font-size: 16px;
        margin-left: 32px;
        background: #5bc0de;
        color: #fff;
   }
   .send_buttoncollapse:hover{
       background: #5bc0de;
       color: #fff;
   }

   .proposal_invoice{
       margin-left: 20px;
       border-left: 1px solid #dcd9d9;
       border-right: 1px solid #dcd9d9;
       border-bottom: 1px solid #dcd9d9;
       border-top: 1px solid #dcd9d9;
       width: 90%;
       padding-top: 10px;
       margin-top: 15px;
       margin-bottom: 27px;
   }

   .accept_button , .reject_button{
        padding: 27px 12px;
        font-size: 16px;
   }
   
   @media screen and (max-width: 764px) and (min-width:340px){

  .accept_button , .reject_button{
       padding: 12px 5px;
   }
   
   .morebtn3
   {
       margin-left: 61px;
   }
    
}
   .accept_button{
        background-color: #5bc0de!important;
        border: 1px solid #5bc0de!important; 
        color: #fff;
   }
   .accept_button:hover{
        background-color: #5bc0de!important; 
        border: 1px solid #5bc0de!important; 
        color: #fff;
   }
   .profile_des{
       padding-top: 30px;
   }
     @media screen and (max-width: 991px){
        .send_button{
            padding: 10px!important;
            font-size: 16px;
        }

    }
    @media screen and (max-width: 450px){
        .send_button{
            padding: 7px!important;
            font-size: 14px;
        }
        .receive_chat h5{
            font-size: 10px!important;
        }
        .receive_chat h6{
            font-size: 9px!important;
        }
        .receive_chat p{
            font-size: 12px!important;
        }
        .receive_chat h5{
            font-size: 10px!important;
        }
        .profile_chat{
            margin-bottom: 10px;
        }
        .send_buttoncollapse{
            padding: 7px!important;
            font-size: 14px;
            height: 38px!important;
        }
        .proposal_amount h2{
            font-size: 21px;
        }
    }
  
  
    .d-none{
        display: none!important;
    }
    .d-block{
        display: block!important;
        
    }
    
    @media screen and (max-width: 780px) and (min-width: 320px){
        .ratting_star{
            display: inline-block!important;
            margin-left: 0!important;
        }
       
        .send_content{
            width: 100%!important;  
        }
        .send_feed_left{
            width: 100%;
        }
        .send_feed_right{
            width: 100%;
            margin-top: 4px;
        }
        .chat_btnss{
            padding: 3px 4px!important;
            font-size: 10px!important;
        }
        .{
            padding-top: 2px;
        }
    }
.stars input {
    position: absolute;
    left: -999999px;
}

.stars a {
    display: inline-block;
    padding-right:4px;
    text-decoration: none;
    margin:0;
}

.stars a:after {
    position: relative;
    font-size: 22px;
    font-family: 'FontAwesome', serif;
    display: block;
    content: "\f005";
    color: #9e9e9e;
}


/*span {
  font-size: 0; /* trick to remove inline-element's margin */
}*/

.stars a:hover ~ a:after{
  color: #9e9e9e !important;
}
span.active a.active ~ a:after{
  color: #9e9e9e;
}

span:hover a:after{
  color:#ffbd29 !important;
}


span.active a:after,
.stars a.active:after{
  color:#ffbd29;
}
.ratting_star{
    margin-left: 52px;
    display: flex;
}
.submit_rate{
    background: #5bc0de;
    color: #fff;
    margin-left: 157px;
    padding: 6px 20px!important;
}
.submit_rate:hover{
    color: #fff;
}
.activebtn{
    background: #5bc0de!important;
    color: #fff!important;
}
.activebtn:hover{
    background: #5bc0de!important;
}


.logo img{
    width: 200px;
    padding-top: 10px;
}

.time_show
{
   text-align:center;
   color:#fff !important;
}


.chat_btnss2
{
    box-shadow: 0 0 10px -6px grey;
    background: #fff;
}

.invoice_data p{
    
    color:black;
    font-weight: 800;
}

@import url(http://fonts.googleapis.com/css?family=Josefin+Sans:400,700);
/*
========================================================================
# 1.0 - General styles
------------------------------------------------------------------------


}
/*--------------------------------------
# - 3.1 Countdown section style start here
----------------------------------------*/





/*------------------------------------------------
Responsive Styles
-------------------------------------------------*/

@media screen and (min-width: 768px) {
  .content, 
  .content .row, 
  .content .row .left-block, 
  .content .row .right-block,
   {
    height: 100%;
  }
}


@media screen and (max-width: 991px) and (min-width:340px){
#main_container{
           padding:4px;
       }
       
#main_container2{
           padding:0px;
       }
.margin_main{
 padding:0px;   
} 

}


@media screen and (max-width: 764px) and (min-width:340px){
.invoicee_detailse_wapr{
        overflow-x: auto;
        width: 100%;
    }
    .invoicee_detailse{
        width:461px;
        overflow-x: auto;
    }
    
}

.submit_rate{
    margin: 16px 4px 10px 5.5px;
    background-color: #303641 !important;
    border-color: #303641 !important;
}

@media screen and (max-width: 764px) and (min-width:340px){
.submit_rate{
     margin: 1px 3px 3px 3.5px;
}

}

#send_proposal{
    margin-top: 10px;
}
</style>

<div class="container-fluid" id="main_container">
    <div class="row">
        <div class="col-md-8 col-xs-12" id="main_container2">
            <div class="chat_web1 sndsimplemsg sndinvoice">
                <div class="row" >
			        
                    <div class="col-xs-12">
                        <h3> <a href="<?php echo SURL.'Jobdetails/index/'.$job_detail['job_slug'];?>"><?php echo $job_detail['job_title'];?></a></h3>
                       
                    </div>
                    
                              
                        
                        
                    
                    <!--timer-->
                   
                </div>
             
                
                <?php 
                
                //echo $job_status;
               
                if($job_detail['pt_assurance'] != "" && $job_detail['percentage_deduction'] != "" && $job_detail['job_awarded_to'] > 0){
                     //echo "<pre>";var_dump($job_detail);
                    //global $interval;
                    if($job_detail['issue_status'] == 'Normal'){
                        
                    
                    if($job_detail['job_status'] == "Ongoing"){
                    
                    $date_accept = $this->db->query("SELECT proposal_acptnc_date FROM `jobs_msgs` where job_id = ".$job_detail['job_id']." and custom_status='Proposal' AND custom_status_extent = '1' order by msg_id asc limit 1")->result_array()[0]['proposal_acptnc_date'];
				    
				    
				    //echo $date_accept = $this->Common->gettimeinmyzone($date_accept);
				    
					$startdate = $date_accept;
                    $pt_assurance = $job_detail["pt_assurance"]+$job_detail["no_of_penalty_day"];
                    $expire = strtotime("+$pt_assurance day", strtotime($startdate));
                    //$today = strtotime("now");
                    
                ?>
                
                <div class="row time_show">
                    <div class="col-xs-11 displaytime_div" <?php echo $sty; ?>>
                        
                        <?php 
                            $expiredcontent="";
                            $expiry_time="";
                            
    						if(strtotime(gmdate("Y-m-d H:i:s")) >= $expire){ 
    						    $IsTimeLineExtensionExists = $this->db->query("select * from jobs_msgs where job_id='".$job_detail["job_id"]."' and custom_status LIKE 'Time-Extension' and custom_status_extent='17' order by msg_id desc limit 1");
    						    if($IsTimeLineExtensionExists->num_rows() > 0){
    						        $extension_aceptance_date = $IsTimeLineExtensionExists->result_array()[0]['extension_aceptance_date'];
    						        
                                    //$extension_aceptance_date = $this->Common->gettimeinmyzone($extension_aceptance_date);
                				   
                                    $day_to_add = $job_detail["extended_pt_days"];
                                    $new_expire = strtotime("+$day_to_add day", strtotime($extension_aceptance_date));
    						        if(strtotime(gmdate("Y-m-d H:i:s")) >= $new_expire){ 
    						            
    						            $days_delay = strtotime(gmdate("Y-m-d H:i:s"))-$new_expire;
    						           
                                         echo  '<div class="col-xs-12" id="timmer_div">
                                    
												<div class="timing">
												   <p style="float:left;padding-top:20px;color:white;font-size:19px;color:red;" id="timer_type"></p>
												   <p id="count_downtimer" style="float:right;color:red;">EXPIRED</p>
												</div>	
											</div>';
											
                                                        
    						        }else{
    						            $expiry_time = $new_expire - strtotime(gmdate("Y-m-d H:i:s")); //extended time
                                        
                                        echo  '<div class="col-xs-12" id="timmer_div">
												<div class="timing">
												   <p style="float:left;padding-top:20px;color:green;font-size:19px" id="timer_type">Extended Time</p>
												   <p id="count_downtimer" style="float:right;color:green"></p>
												</div>	
											</div>';                
    						        }
    						        
    						    }else{
    						            
    						            $days_delay = strtotime(gmdate("Y-m-d H:i:s"))-$expire;
    						             
                                        echo  '<div class="col-xs-12" id="timmer_div">
                                    
												<div class="timing">
												   <p style="float:left;padding-top:20px;color:white;font-size:19px;color:red;" id="timer_type"></p>
												   <p id="count_downtimer" style="float:right;color:red;">EXPIRED</p>
												</div>	
											</div>';                
    						    }
    						    
    						}else{
    						    $onlypt_assurance = $job_detail["pt_assurance"];
    						 
                                $ptassuranceexpire = strtotime("+$onlypt_assurance day", strtotime($startdate));
                                // echo date("Y-m-d H:i:s",$ptassuranceexpire);
                                
                                if(strtotime(gmdate("Y-m-d H:i:s")) >= $ptassuranceexpire){ //Grace time started
                                    $expiry_time = $expire - strtotime(gmdate("Y-m-d H:i:s"));
                                    $whichphase = "Grace Time";
                                    echo  '<div class="col-xs-12" id="timmer_div">
                                    
												<div class="timing">
												   <p style="float:left;padding-top:20px;color:white;font-size:19px" id="timer_type">Grace time</p>
												   <p id="count_downtimer" style="float:right;color:orange"></p>
												</div>	
											</div>';
                                }else{
                                    $expiry_time = $ptassuranceexpire - strtotime(gmdate("Y-m-d H:i:s")); //Even Pt assurance time has not ended
                                    echo  '<div class="col-xs-12" id="timmer_div">
												<div class="timing">
												   <p style="float:left;padding-top:20px;color:green;font-size:19px" id="timer_type">PTA Timer</p>
												   <p id="count_downtimer" style="float:right;color:green"></p>
												</div>	
											</div>';
                                }
    						}
						?>
                    </div>
                </div>
                <?php }else if($job_detail['job_status'] == "Completed"){
                   
                            echo  '<div class="row time_show"><div class="col-xs-11 displaytime_div"><div class="col-xs-12" id="timmer_div">
												<div class="timing">
												   <p style="float:left;padding-top:20px;color:green;font-size:19px" id="timer_type">PTA Timer</p>
												   <p id="count_downtimer_stop" style="float:right;color:green;font-size: 19px;padding-top: 20px;text-align: center;">Job Completed</p>
												</div>	
											</div></div></div>';
                } }else{
                    
                    $stop_time = $this->db->query("SELECT * from disputes where job_id = ".$job_detail['job_id'])->result_array()[0];
                        echo  '<div class="row time_show"><div class="col-xs-11 displaytime_div"><div class="col-xs-12" id="timmer_div">
												<div class="timing">
												   <p style="float:left;padding-top:20px;color:green;font-size:19px" id="timer_type">PTA Timer</p>
												   <p id="count_downtimer_stop" style="float:right;color:green;font-size: 19px;padding-top: 20px;text-align: center;">'.$stop_time['remaining_time'].'</p>
												</div>	
											</div></div></div>';
                    }
                }
                
                ?>
                
                <div id="wrpr_all_msgs">
                    
                    <?php 
                        include("includes/allmsgthread.php");
                        
                    ?>
                    
                    <?php
                       //if($job_detail['issue_status']!="Normal"){
                       
                        //include("includes/disputeraised.php");
                       //}
                    ?>
                    
                </div>
                <?php 
                 
                 /// incase of dispute and view chat 
                 
                 if(!$view_chat_admin){
                  
                    //$is_proposal_sent = $this->db->query("select * from jobs_msgs where custom_status='Proposal' and custom_status_extent ='3'");
                ?>
                <div class="row button_proInv">
                    <ul>
                    
                     <?php  if($job_detail['job_awarded_to']>0){
                                if($job_detail['job_type']=="Hourlie"){?>
                         <li>
                            <a href="<?php echo SURL.'newpage/index/'.$job_detail['job_id']?>" target="_blank"  class="btn chat_btnss sendbtn btn_cahtt sendbtn1" >View Log</a>
                        </li>
                        <?php }} ?>
                        
                    <?php 
                        if($job_detail['u_id']!=$myuser['u_id']){
                            
                    ?>
                        <li>
                            <a href="#send_proposal" class="btn chat_btnss sendbtn btn_cahtt sendbtn1 sendprobtn" data-toggle="collapse" >Send Proposal</a>
                        </li>
                    
                    <?php 
                        if($job_detail['job_awarded_to']>0){
                    ?>
                        <li>
                            <a href="#send_invoice" type="button" class="btn chat_btnss sendbtn btn_cahtt sendbtn1 sendinvbtn" data-toggle="collapse" >Send Invoice</a>
                        </li>
                       
                    <?php }
                    } 
                    ?>
                    <!--<li>-->
                    <!--    <a href="javascript:void(0)" type="button" class="btn chat_btnss sendbtn btn_cahtt sendbtn1" data-toggle="collapse" >Video Call</a>-->
                    <!--</li>-->
                    
                    <?php if($job_detail['job_awarded_to']>0){?>
                    <li id="more_btn" class="dropdown">
                            <a href="" class="dropdown-toggle  more_dropdown" type="button" data-toggle="dropdown" style="color: #5bc0de;">More
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu chat_more d-none morebtn3"  id="more_btn2 " style="list-style:none;">
                               <?php 
                                
                                  if($job_detail['u_id']!=$myuser['u_id']){ 
                                      if($job_detail['pt_assurance'] != "" && $job_detail['percentage_deduction'] != ""  && ($job_detail['job_awarded_to'] == $myuser['u_id'])){
                                ?>
                                    <li><a href="#extendtime" data-toggle="collapse" class="refund_contt chat_btnss sendbtn">Request Time Extention</a></li>
                                    
                                      <?php } ?>
									
								    <li><a href="#requset_deposit" data-toggle="collapse" class="dropdown-toggle chat_btnss sendbtn requestdepo">Request Deposit</a></li>
								    
                                <?php }else{?>
                                    <li><a href="#refund" data-toggle="collapse" class="refund_contt sendbtn requestdepo">Refund</a></li>
                              <?php } ?>
                              
                              <?php $datadisputenew = $this->db->query("select * from disputes  where type='job' and job_id='".$job_detail['job_id']."' and is_paid='Yes'")->result_array(); ?>
                              <?php if(empty($datadisputenew)){ ?>
                              
                               <li hidden><a href="Disputespage/index/<?php echo $job_detail['job_id'];?>"  data-href="Disputespage/index/<?php echo $job_detail['job_id'];?>" target="_blank" onclick="return confirm('There is 10% fee attached to the mediation service. Do you Accept this ?')"  class="dropdown-toggle chat_btnss2 dispute_link">Raise Dispute</a></li>
                            <?php }?>
                            </ul>
                    </li>
                    <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            <?php if(!$view_chat_admin){?>
                   
                <form class="massage_cont" action="Chat/sendmsg" method="post" id="main_form" enctype="multipart/form-data">
                
                    <div class="row new_message">
                        <div>
                            <div class="col-sm-10 col-xs-12 text_area">
                                <?php 
                                $scnduri = $this->uri->segment("3");
                                $receiver = $this->db->query("select * from users where username='$scnduri'")->result_array()[0]['u_id'];
                                ?>
                                <input type="hidden" id="recv_id" value="<?php echo $receiver; ?>" name="recv_id"/>
                                <input type="hidden" id="job_id" value="<?php echo $job_detail['job_id'];?>" name="job_id"/>
                                
                                <input type="hidden" id="msg_statuss" value="0" name="msg_statuss"/>
                                <!--0=normal-->
                                <!--1-proposal-->
                                <!--2=invoice-->
                                
                                <input type="text" name="new_message" placeholder="Write your Message" class="form-control send_message" />
                                <input type="file" id="attached_file" name="files[]" multiple class='hidden' >
                                <label for="attached_file" id="attached_filenew">
                                    Attach files
                                </label>
                                
                            </div>
                            <div class="col-sm-2 col-xs-12 text-right sendbtn_area">
                                <input type="button" name="submit_simple_msg" value="Send" class="btn send_button" id="sendsimplemsg" >
                            </div>
                        </div>
                        
                        <!--  Collapse for Send Propsaal  START1 -->
            
                        <div class="collapse  bg-white" id="send_proposal">
                            <div class="row heading_newpropsal">
                                <div class="col-md-6 col-xs-6">
                                    <h4>New Proposal</h4>
                                </div>
                                <div class="col-md-6 col-xs-6 text-right">
                                    <i class="glyphicon glyphicon-remove sendbtn closebtn" data-toggle="collapse" data-target="#send_proposal" ></i>
                                </div>
                            </div>
                            <div class="row newpropsal_field">
            
                                    <div class="form-group">
                                        <div class="row">
                                           
                                            <div class="col-md-3">
                                                 <label>Rate</label>
                                                <select name="rate" class="form-control">
                                                    <option><?php echo $job_detail['job_type'];?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>ITEM</label>
                                                <input type="text" name="pro_description" placeholder="Enter description" class="form-control" />
                                            </div>
                                            <div class="col-md-4 amount">
                                                <label>Amount</label>
                                                 <i class="glyphicon glyphicon-usd doller_icon icon_ammount"></i>
                                                <input id="budget" type="text" name="budget" placeholder="0.00" class="form-control amountdata" value=""  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8 text-right labe_left">
                                                <label class="new_proplabel">TOTAL</label>
                                            </div>
                                            <div class="col-md-4 input_icon">
                                                <i class="glyphicon glyphicon-usd doller_icon icon_new"></i>
                                                <input type="text" name="totalamt" id="totalamt" readonly  placeholder="0.00" class="form-control newpropsal_right" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8 text-right labe_left">
                                                <label class="new_proplabel">DEPOSIT</label>
                                            </div>
                                            <div class="col-md-4 input_icon">
                                                <i class="glyphicon glyphicon-usd icon_new"></i>
                                                <input type="text" value="0" id="deposite" name="deposit"  placeholder="0.00" class="form-control newpropsal_right amountdeposit" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8 text-right labe_left">
                                                <label class="new_proplabel">YOU'LL EARN</label>
                                            </div>
                                            <div class="col-md-4 input_icon">
                                                <i class="glyphicon glyphicon-usd icon_new"></i>
                                                <input id="ufter_cutting" type="text" name="earn" readonly  placeholder="0" class="form-control newpropsal_right" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                               
                                            </div>
                                            <div class="col-md-2" style="padding: 10px;">
                                                <input type="submit" name="submit_proposal" value="Send" id="sendproposalbtn" class="btn send_buttoncollapse" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                            </div>
                        </div>
        
                        <!--  Collapse for Send Invoice  START -->
                    
                        <div class="collapse bg-white" id="send_invoice" style="margin-top:10px;">
                            <div class="row heading_newpropsal">
                                <div class="col-md-6 col-xs-6">
                                    <h4>New Invoice</h4>
                                </div>
                                <div class="col-md-6 col-xs-6 text-right">
                                    <i class="glyphicon glyphicon-remove sendbtn sendinvoicedata" data-toggle="collapse" data-target="#send_invoice" ></i>
                                </div>
                            </div>
                            <div class="row newpropsal_field">
        
                                <div class="form-group">
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                             <label>Unit</label>
                                            <select name="rate" class="form-control">
                                                <option><?php echo $job_detail['job_type'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>ITEM</label>
                                            <input type="text" name="description_invoice" placeholder="Enter description" class="form-control" />
                                        </div>
                                        <div class="col-md-4 amount">
                                            <label>Amount</label>
                                             <i class="glyphicon glyphicon-usd icon_ammount"></i>
                                            <input type="number" name="amount_invoice" placeholder="0.00" id="amt_inovice" class="form-control newenteramount" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8 text-right labe_left">
                                            <label class="new_proplabel">Total</label>
                                        </div>
                                        <div class="col-md-4 input_icon">
                                            <i class="glyphicon glyphicon-usd icon_new"></i>
                                            <input type="text" name="total_inv_amt" id="total_amt" placeholder="0.00" class="form-control newpropsal_right" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12" style="padding:10px;">
                                        <input type="checkbox" class="confirm_invoice" name="confirm" style='height: auto!important;' /> With this you confirm to have completed the work related to this invoice and provided it in the workstream.
                                        <p style='color:red;display:none' class='show_err'></p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12" style="padding:10px;">
                                        <input type="checkbox" class="confirm_complete_order" name="confirm_complete_order" value='yes' style='height: auto!important;' /> Mark this Order Complete
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                           
                                        </div>
                                        <div class="col-md-2" style="padding: 10px;">
                                            <input type="button" value="Send" name="send_invoice" class="btn send_buttoncollapse" id="sendinv" >
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        </div>
                    
                        <!--  Collapse for Send Requset Deposite  START -->
                        
                        <div class="collapse  bg-white requset_deposit2" id="requset_deposit" style="margin-top:10px;">
                            <div class="row heading_newpropsal">
                                <div class="col-md-6 col-xs-6">
                                    <h4>New Deposit</h4>
                                </div>
                                <div class="col-md-6 col-xs-6 text-right">
                                    <i class="glyphicon glyphicon-remove sendbtn requestdeporemove" data-toggle="collapse" data-target="#requset_deposit" ></i>
                                </div>
                            </div>
                            <div class="row newpropsal_field">
            
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>ITEM</label>
                                                <input type="text" name="description_deposit" placeholder="Enter description" class="form-control" />
                                            </div>
                                            <div class="col-md-4 amount">
                                                <label>Amount</label>
                                                 <i class="glyphicon glyphicon-usd icon_ammount"></i>
                                                <input type="text" name="amount_deposit" placeholder="0.00" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                               
                                            </div>
                                            <div class="col-md-2" style="padding: 10px;">
                                                <input type="submit" name="submit" value="Send" id="askdeposit" class="btn  send_buttoncollapse" >
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    
                        <!--  Collapse for Repund  START -->
                    
                        <div class="collapse bg-white" id="refund" style="margin-top:10px;">
                            <div class="row heading_newpropsal">
                                <div class="col-md-6 col-xs-6">
                                    <h4>New Refund</h4>
                                </div>
                                <div class="col-md-6 col-xs-6 text-right">
                                    <i class="glyphicon glyphicon-remove sendbtn closebtn" data-toggle="collapse" data-target="#refund" ></i>
                                </div>
                            </div>
                            <div class="row newpropsal_field">
        
                                <div class="form-group">
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                             <label>Unit</label>
                                            <select name="rate" class="form-control">
                                                <option><?php echo $job_detail['job_type'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>ITEM</label>
                                            <input type="text" name="description_refund" placeholder="Enter description" class="form-control" />
                                        </div>
                                        <div class="col-md-4 amount">
                                            <label>Amount</label>
                                             <i class="glyphicon glyphicon-usd icon_ammount"></i>
                                            <input type="text" name="amount_refund"  value="<?php //echo $this->Common->job_escrow_amt($job_detail['job_id'],date("Y-m-d"));?>" placeholder="0.00" class="form-control refundamt" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8 text-right labe_left">
                                            <label class="new_proplabel">Total</label>
                                        </div>
                                        <div class="col-md-4 input_icon">
                                            <i class="glyphicon glyphicon-usd icon_new"></i>
                                            <input type="text" name="total_refund_amt" readonly value=""  placeholder="0.00" class="form-control newpropsal_right" />
                                        </div>
                                    </div>
                                </div>
<script>
    $(document).on('keyup','.refundamt',function(){
        var amt = $(this).val();
       
        if(amt > <?php echo $this->Common->job_escrow_amt($job_detail['job_id'],date("Y-m-d"));?>){
            alert("You cant write more than <?php echo $this->Common->job_escrow_amt($job_detail['job_id'],date("Y-m-d"));?>");
            $(this).val(0);
            $(".newpropsal_right").val(0);
            return false;
        }else{
            $(".newpropsal_right").val(amt);
        }
    });
</script>                                
                                <!--<div class="row">-->
                                <!--    <div class="col-xs-12" style="padding:10px;">-->
                                <!--        <input type="checkbox" name="confirm_refund" style='height: auto!important;' /> You have confirmed that you have completed the work realted to this invoice and provided it in theworkstream.-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                           
                                        </div>
                                        <div class="col-md-2" style="padding: 10px;">
                                            <input type="button" value="Send" name="send_refund" class="btn send_buttoncollapse" id="sendrefund" >
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        </div>
						
						<!--  Collapse for Extend time  START -->
                    
                        <div class="collapse bg-white extendtime2" id="extendtime">
                            <div class="row heading_newpropsal">
                                <div class="col-md-6 col-xs-6">
                                    <h4>Extend Time </h4>
                                </div>
                                <div class="col-md-6 col-xs-6 text-right">
                                    <i class="glyphicon glyphicon-remove sendbtn" data-toggle="collapse" data-target="#extendtime" ></i>
                                </div>
                            </div>
                            <div class="row newpropsal_field">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Reasons</label>
                                            <input type="text" name="reason_extention" placeholder="Enter reason for time extension..." class="form-control" />
                                        </div>
                                        <div class="col-md-4 days">
                                            <label>Days</label>
                                            <select class='selectday form-control' name='days'>
												<option>Select days</option>
												<?php 
												for($i=1;$i<=31;$i++){ 
												
												?>
													
												<option value='<?php echo $i;?>'> <?php echo ($i < 10) ? '0'.$i. ' Day' : $i . ' Day' ; ?></option> 
													
												<?php	}?>
												
												</select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                           
                                        </div>
                                        <div class="col-md-2" style="padding: 10px;">
                                            <input type="button" value="Send" name="send_extendtime" class="btn send_buttoncollapse" id="sendextendtime" >
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        </div>
                        
                        
              
                    </div>
                    <div class="col-sm-12">
                        <div class="attach_waper"style="color:#428bca;padding: 10px;" ></div>  
                    </div>
                </form>
                <?php }?>
            </div>
        </div>
    
   <!--<input type="hidden" id="user_date" value="<?php echo $date_accept?>">-->
   <!--<input type="hidden" id="penalty_date" data-offset="'<?php echo $tz;?>'" data-expire="<?php echo $expire*1000;?>" data-today="<?php echo time()*1000;?>" data-timetype='<?php echo $timetype ;?>' value="<?php echo ($job_detail["pt_assurance"]+$job_detail["extended_pt_days"]+$grace_time_day);?>">-->
   
   
        <div class="col-md-4 col-sm-6 col-xs-12 ">
            <?php include('includes/Stats.php'); ?>
        </div>
        
    </div>
</div>
<?php include("includes/front_end_footer.php");?>

   
<style>

/* The Modal (background) */
.modal12 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content3 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.modal-conten11t{
    width: 30%!important;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<?php 
    $deductionfee = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
?>
<script>
$(document).ready(function(){
    $('#sendsimplemsg').click(function(){
        //$('.attach_waper').html('');
    })
})


$(document).on('keyup','#amt_inovice',function(){
    var amt_inovice = $(this).val();
    $("#total_amt").val(amt_inovice);
});

$(document).on('keyup','#deposite',function(){

    var budget = $("#budget").val();

    var deposite = $("#deposite").val();
    var deduct = deposite*<?php echo $deductionfee;?>/100;
    var earn = deposite-deduct;
    $("#ufter_cutting").val(earn);
    
    
});



$(document).on('keyup','#budget',function(){
    var budget = $(this).val();
    $("#totalamt").val(budget);
});


</script>


<script>
    $(document).ready(function(){
        
        //$('#attached_file').click(function() {
        
            $('#attached_file').change(function(){
                $('.attach_waper').html('');
                var $fileUpload = $("input[type='file']");
                if(parseInt($fileUpload.get(0).files.length)>4){
                    alert("You can only upload a maximum of 4 files");
                 
                }else{
                    
                    for(var i = 0 ; i < this.files.length ; i++){
                      var fileName = this.files[i].name;
                      $('.attach_waper').append("<div style='display:inline-block'><i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' <i class="fa fa-times-circle remove_file" style="color:red;cursor:pointer" data-file="'+fileName+'" ></i> , </div> ');
                    }
                }
            });
         
        //});
        
        $(document).on('click','.remove_file',function(){
            
            var fileUpload = $("input[type='file']");
            
             var file = $(this).data("file");
              for (var i = 0; i < fileUpload.length; i++) {
                if (fileUpload[i].name === file) {
                  fileUpload.splice(i, 1);
                  break;
                }
              }
              $(this).parent().remove();
        });
       
        
        $('.sendbtn').click(function(){
            $(".sendbtn_area").toggle();
            $('.text_area').toggleClass('col-sm-10').toggleClass('col-sm-12');
           // $('.sendbtn').toggleClass('active').toggleClass('');
            
        });
        
        $('#send_massgaee').click(function(){
            $('#send_proposal').hide();
            $('#send_invoice').hide();
            $('#requset_deposit').hide();
            $('#refund').hide();
        });
        
        $('.more_dropdown').click(function(){
            $('.chat_more').toggleClass('d-block').toggleClass('d-none');
        });
    });
    
    /* Star rating */
    $('.stars a').on('click', function(){
        var id= $(this).data("id2");
        var star= $(this).data("id1");
        $("#rating_id_"+id).val(star);
        
        $('.stars span, .stars a').removeClass('active');
         
        $(this).addClass('active');
        $('.stars span').addClass('active');
    });
    
    $(".btn_cahtt").click(function () {
        $(".btn_cahtt").removeClass("activebtn");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).addClass("activebtn");   
    });
    

</script>

<script>
    
    // $("#wrpr_all_msgs").scrollTop($(document).height()); 
    $("#wrpr_all_msgs").scrollTop(8500); 
    <?php if(!$view_chat_admin){?>
    $(document).ready(function(){
         setInterval(get_new_msg, 5000);
     });    
    <?php } ?>
    function get_new_msg(){ 
        
        var msg_id = $('.wrpr_singl_msg:last').data("id1");
        var recv_id = $("#recv_id").val();
        var job_id = $("#job_id").val();
        
          $.ajax({
            url: "Chat/get_new_msgs",
            method:"post",
            data:{msg_id:msg_id,recv_id:recv_id,job_id:job_id},
            cache: false,
            success: function(html){ 
              if(html =="0"){
    
              }else{ 
                $("#wrpr_all_msgs").append(html);
                $("#wrpr_all_msgs").scrollTop(8500); 
              }
              
              
            }
          });
    }
    
</script>


<!--<srcipt src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></srcipt>-->
<!--<srcipt src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.32/moment-timezone.min.js"></srcipt>-->
<!--/*****************************----Timer---****************************************/-->

<script>

    var objDiv = document.getElementById("wrpr_all_msgs");
    objDiv.scrollTop = objDiv.scrollHeight;
    
    
    <?php 
        if($job_detail['pt_assurance'] != "" && $job_detail['percentage_deduction'] != ""  && $job_detail['job_awarded_to'] > 0){
    ?>
       
       dist =  <?php echo ($expiry_time * 1000);?> ; 
       
       var x = setInterval(function() {
    
        dist = dist-1000;
        var distance = dist;
        var days = Math.floor(distance / (1000 * 3600 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        var countdowntime = days + " days : " + hours + " hrs : " + minutes + " min :" + seconds + "s ";
        document.getElementById("count_downtimer").innerHTML = countdowntime;
        var oldhref  = $('.dispute_link').attr('data-href');
        $('.dispute_link').prop('href',oldhref+"/"+days+"days-"+hours+"hrs-"+minutes+"min");
        if (distance < 0) {
           clearInterval(x);
           document.getElementById("count_downtimer").innerHTML = "EXPIRED";
        }
      }, 1000);
    
    <?php } ?>

</script>

<script>
    $('#wrpr_all_msgs img').on('click', function() {
  $('#overlay')
    .css({backgroundImage: `url(${this.src})`})
    .addClass('open')
    .one('click', function() { $(this).removeClass('open'); });
});
    
</script>


<script>
    $(document).click(function() {
    $("#more_btn").removeClass('open');
    $(".chat_more ").removeClass('d-block');
    $(".chat_more ").css("display","none");
});
</script>

<script>

$(function(){
  $(".newenteramount").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

$(".newenteramount").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
});

</script>

<script>
    // $(document).on('submit',"#main_form",function(){
    //      var amountdata=$('.amountdata').val();
    //      var amountdeposit=$('.amountdeposit').val();
    //      if(amountdata>amountdeposit)
    //      {
    //          alert("Depsoit Amount cannot be greater than amount.");
    //          return false;
    //      }else{
    //              $(this).submit();
    //      }
    // });
</script>

<script>
    $(document).ready(function(){
    
      
        $('.sendprobtn').click(function(){
          $('#attached_filenew').hide();
      });
      
      $('.closebtn').click(function(){
           $('#attached_filenew').show();
      });
      
      $('.sendinvbtn').click(function(){
            $('#attached_filenew').hide();
      });
      
      $('.sendinvoicedata').click(function(){
            $('#attached_filenew').show();
      });
      
      
      $('.requestdeporemove').click(function(){
            $('#attached_filenew').show();
      });
      
      $('.requestdepo').click(function(){
           $('#attached_filenew').hide();
      });
      
     
  
    });
</script>

