<?php include("includes/front_end_header.php");?>
<style>
    
    .chat_web{
        background: #fff;
        min-height: 478px;
        border-radius: 30px;
        margin-bottom: 10px;
        margin-top: 15px;
        box-shadow: 0 0 10px -6px grey;
    }
    .chat_web h3{
        border-bottom: 1px solid black;
        padding-bottom: 10px;
        padding-top: 30px;
        color: #5bc0de;
        padding-left: 10px;
        
    }
    .send_chat{
        background: #E5E5E6;
        margin-top: 20px;
        margin-right: 20px!important;
        border-radius: 10px;
        float: right;
    }
    .send_chat h6{
        color: #222;
        font-size: 8px!important;
        font-weight: bold;
    }
    .send_chat p{
        font-size: 13px!important;
        color: #5F5E5E;
    }
    .send_chat h5{
        padding-top: 10px;
        font-size: 8px!important;
        font-weight: bold;
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
    .button_proInv{
        margin-top: 10px;
        border-bottom: 1px solid #222;
        
    }
    .button_proInv li{
        margin: 0px 6px;
    }
    .button_proInv ul{
       list-style: none;
       padding-left: 13px;
       display: flex;
    }
    .massage_cont{
        background: #eee;
        min-height: 133px;
        border-bottom-right-radius: 31px;
        border-bottom-left-radius: 31px;
    }
    .send_message{
        padding-bottom: 100px;
        margin-top: 10px;
        padding-top: 10px;
        position: relative;
    }
    .send_button{
        padding: 23px;
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
    
    .new_message label{
        color: #5bc0de;
        /*position: absolute;*/
        /*right: 22px;*/
        /*bottom: -4px;*/
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
    .new_proplabel{
       padding-top: 10px;
       font-weight: bold;
   }
   .newpropsal_field{
       padding-top: 10px;
   }
   .newpropsal_field input{
       height: 50px;
   }
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
   .amount i{
        position: absolute;
        left: 18px;
        top: 22px;
        color: #33333373!important;
   }
   .icon_ammount{
       padding-top:18px;
       font-size: 14px;
   }
   .amount input{
       padding-left: 30px;
       border: 1px solid #3333332b;
       background: #eee;
   }
   .heading_newpropsal{
       background: #11111117;
       padding: 10px;
   }
   .heading_newpropsal h4{
       color: #11111169;
       font-weight: bold;
   }
   .heading_newpropsal i{
       color: #111!important;
       font-weight: bold;
       padding-top: 10px;
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
   .accept_wpar h4, .reject_wpar h4{
       font-size: 14px;
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
   .propinvoice_heading{
        border-bottom: 2px solid #fffafa;
        background: #e0eff545;
        
   }
   .propinvoice_heading h6{
        color: #9a9a98d1!important;
        font-weight: bold;
   }
   .propinvoice_body{
       background: #e0eff545;
       padding: 10px;
   }
   .first_row{
       font-size: 15px!important;
       color: #9a9a98d1!important;
       padding-top: 10px;
   }
   
   .first_row i{
       font-size: 13px!important;
       
   }
   .first_rows{
      padding-left: 5px;
   }
   .btn_inovce{
        padding: 12px 13px;
        margin-top: 5px;
        box-shadow: 0 0 10px -6px grey!important;
        margin-bottom: 10px;
   }
   .proposal_amount{
       margin-top: 12px;
   }
   .proposal_amount h2{
       color: #9a9a98d1!important;
       font-weight: bold;
        margin-top: -5px;
   }
   .proposal_amount i{
       font-size: 12px!important;
       padding-bottom: 10px;
   }
   .proposal_amount span{
       font-size: 12px!important;
       padding-bottom: 10px;
   }
   .propmain_heading h4{
       font-weight: bold;
       color: #9a9a98d1!important;
   }
   .prop_align{
       padding-left: 0px;
   }
   .amountmain_align{
       padding: 5px;
       font-weight: bold;
       
   }
   .proposa_back{
       background: #e0eff545;
   }
   .accept_button , .reject_button{
        padding: 27px 12px;
        font-size: 16px;
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
        .labe_left{
            text-align: left!important;
        }
        .profile_chat{
            margin-bottom: 10px;
        }
    }
    @media screen and (max-width: 450px){
        .send_button{
            padding: 7px!important;
            font-size: 14px;
        }
        .chat_web h3 {
            font-size: 16px!important;
        }
        .send_chat h6{
            font-size: 9px!important;
        }
        .send_chat p{
            font-size: 12px!important;
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
    #wrpr_all_msgs{
        overflow: auto;
        height: 450px;
    }
    .accept_wpar,.reject_wpar{
        width: 90%;
        margin-left: 20px;
        margin-bottom: 10px;
    }
    .accept_wpar span{
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #007d3d;
        display: inline-block;
        text-align: center;
        padding-top: 13px;
        
    }
    .accept_wpar i,.reject_wpar i{
        color: #fff!important;
        font-size: 20px;
    }
    .accept_wpar .row,.reject_wpar .row{
        border-left: 10px solid #eeeeee;
        border-right: 10px solid #eeeeee;
        padding: 24px 0px;
    }
    .accept_wpar h4,.reject_wpar h4{
        font-weight: bold;
        color: #867f7f;
    }
    .reject_wpar span{
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #cc2424;
        display: inline-block;
        text-align: center;
        padding-top: 14px;
        
    }
    .feedback_warp{
        background: #daedf3!important;
        margin-left: 20px;
        margin-bottom: 20px;
        width: 90%;
        padding: 16px;
        border-radius: 20px;

    }
    .feedback_send img{
        width: 40px;
        height: 40px;
        margin-right: 15px;
    }
    .feedback_warp h3 {
        padding-bottom: 15px!important;
        border-bottom: 1px solid transparent;
        padding-top: 0;
        color: #333;
        padding-left: 0;
    }
    .send_rating i{
        color: #ffbd29!important;
        font-size: 18px;
    }
    .send_rating{
        margin-top: 10px;
    }
    .send_feed_left{
        width: 70%;
        margin-left: 30px!important;
        margin: auto;
        margin-left: 0;
    }
    .send_feed_right{
        width: 70%;
        margin: auto;
        margin-right: 0;
        margin-top: -12px;
    }
    .feedback_send{
        width: 100%;
        margin-left: 20px;
        padding: 14px;
        margin-left: 0;
        border-radius: 13px;
        box-shadow: 0 0 10px -6px grey;
    }
    .feedback_send ul{
        list-style: none;
        display: flex;
        padding-left: 0;
    }
    .chat_btnss{
        color: #5bc0de;
        box-shadow: 0 0 10px -6px grey;
        border-radius: 20px;
        background: #fff;
    }
    .chat_btnss:hover{
        color: #5bc0de;
    }
    .chat_more{
        top: -29px;
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
        .submit_rate{
            margin-left: 140px!important;
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
            font-size: 9px!important;
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


span {
  font-size: 0; /* trick to remove inline-element's margin */
}

.stars a:hover ~ a:after{
  color: #9e9e9e !important;
}
span.active a.active ~ a:after{
  color: #9e9e9e;
}

span:hover a:after{
  color:#ffbd29 !important;
}
.profile_chat1{
    border-bottom: 1px solid #dcd9d9;
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
.upload_imagechat{
    margin-left: 10px;
    margin-bottom :10px;
}
.upload_imagechat img{
    width: 40%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 20px;
}

.logo img{
    width: 200px;
    padding-top: 10px;
}
.blazer h1 {
    margin-bottom: 102px;
}
.blazer h2{
    color: #b49449;
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



.content .alert-success {

	background-color: transparent;
	color: #ffffff;
	display: none;
}
.content .alert-warning {
	background-color: transparent;
	color: #ffffff;
	display: none;
}

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
/*--------targetting the opera----------*/




.tip_Wrpr{display:none;}

#count_downtimer{
    font-size: 19px;
    text-align: right;
    padding-top: 20px;
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


.invoice_data p{
    
    color:black;
    font-weight: 800;
}

.submit_rate_service{
    margin: 0 5px 9.5px;
}



</style>

<div class="container-fluid" id="main_container">
    <div class="row">
        <div class="col-md-8 col-xs-12" id="main_container2">
            <div class="chat_web sndsimplemsg sndinvoice">
                <div class="row wrpr_singl_msg" >				
                    <div class="col-xs-12">
                        <h3><?php echo $service_detail['title'];?></h3>
                    </div>
                    <!--timer-->
                    <?php if($service_detail['issue_status'] == 'Normal'){ ?>
                    <div class="col-sm-12 col-xs-12" style='background: #d4e9f5;padding:12px'>
							<div class="timing">
							    <p style="float:left;color:green;font-size:19px;" id="timer_type">Delivery In :</p>
								<p id="count_downtimer" style="color:#0bb586;padding:0px"></p>
								</div>	
						 </div>
					<?php }else{
					    
					    $stop_time = $this->db->query("SELECT * from disputes where service_p_id ='".$service_detail['id']."' and is_paid='Yes'")->result_array()[0];
                        echo  '<div class="col-sm-12 col-xs-12" style="background: #d4e9f5;padding:12px;overflow:hidden">
												<div class="timing">
												 <p style="float:left;color:green;font-size:19px;margin-top: 20px;" id="timer_type">Delivery In :</p>
												   <p id="count_downtimer_stop" style="float:right;color:green;font-size: 19px;padding-top: 20px;text-align: center;">'.$stop_time['remaining_time'].'</p>
												</div>	
											</div>';
					
					 } ?>
                </div>
                
                <div id="wrpr_all_msgs">
                    <?php 
					    //echo "<pre>";var_dump($service_detail);
					    
					    $expiry_time1 = strtotime(date('Y-m-d H:i:s',strtotime($service_detail['date'] . "+".$service_detail['delivery']." days")));
					    $expiry_time = $expiry_time1 - strtotime(gmdate("Y-m-d H:i:s"));
					    
                       
						include("includes/service_purchase_proposal.php");
						$days = 0;
                        include("includes/allmsgthreadforservices.php");
                        
                        //if($service_detail['issue_status']!="Normal"){
					    //include("includes/disputeraised.php");
                        //}
						
                        
                    ?>
                    
                </div>
                <?php 
                
                $is_proposal_sent = $this->db->query("select * from jobs_msgs where custom_status='Proposal' and custom_status_extent ='3'");
                
                if(!$view_chat_admin){
                ?>
                <div class="row button_proInv">
                    <ul>
                    <?php 
                    //echo "<pre>";var_dump($service_detail);
                    
                        if($service_detail['u_id']==$myuser['u_id']){
                            
                    ?>
                        <!--<li><a href="javascript:void(0)" class="btn chat_btnss " id="send_massgaee" data-toggle="collapse" >Send Message</a></li>
                        <li>
                            <a href="#send_proposal" class="btn chat_btnss sendbtn btn_cahtt" data-toggle="collapse" >Send Propsal</a>
                        </li>-->
                    
                    <?php //if($service_detail['job_awarded_to']>"0"){?>
                    <li>
                        <a href="#send_invoice" type="button" class="btn chat_btnss sendbtn btn_cahtt" data-toggle="collapse" >Send Invoice</a>
                    </li>
                    <?php //} ?>
                    <?php } ?>
                    <li style="padding-top: 8px;position: relative;" class="dropdown" id="more_btn">
                            <a href="" class="dropdown-toggle  more_dropdown" type="button" data-toggle="dropdown" style="color: #5bc0de;">More
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu chat_more d-none" style="list-style:none;">
                              
                                
                                <?php 
                                    $datadisputenew = $this->db->query("select * from disputes  where service_p_id='".$service_detail['id']."' and is_paid ='Yes'")->result_array(); 
                                ?>
                              
                                <?php if(empty($datadisputenew)){ ?>
                                    	<li><a href="Disputespage/services/<?php echo $service_detail['id'];?>"  data-href="Disputespage/services/<?php echo $service_detail['id'];?>"  onclick="return confirm('There is 10% fee attached to the mediation service. Do you Accept this?')" target="_blank"  class="dropdown-toggle chat_btnss2 dispute_link">Raise Dispute</a></li>
                               <?php }?>
                                
                                <?php 
                                
                                  if($service_detail['who_purchased']!=$myuser['u_id']){ ?>
                                  
                                    <li><a href="#requset_deposit" data-toggle="collapse" class="dropdown-toggle chat_btnss sendbtn">Request Deposit</a></li>
                                    
                                <?php }else{?>
                                    <li><a href="#refund" data-toggle="collapse" class="refund_contt sendbtn">Refund</a></li>
                              <?php } ?>
                            </ul>
                    </li>
                    </ul>
                </div>
                <?php } ?>
                
                
                <?php if(!$view_chat_admin){?>
                    <form class="massage_cont" action="ChatServices/sendmsg" method="post" id="main_form_services" enctype="multipart/form-data">
                
                    <div class="row new_message">
                        <div>
                            <div class="col-sm-10 col-xs-12 text_area">
                                <?php 
                                $scnduri = $this->uri->segment("3");
                                $receiver = $this->db->query("select * from users where username='$scnduri'")->result_array()[0]['u_id'];
                                ?>
                                <input type="hidden" id="recv_id" value="<?php echo $receiver; ?>" name="recv_id"/>
                                <input type="hidden" id="service_p_id" value="<?php echo $service_detail['id'];?>" name="service_p_id"/>
								
								<input type="hidden" id="service_id" value="<?php echo $service_detail['service_id'];?>" name="service_id"/>
                                
                                <input type="hidden" id="msg_statuss" value="0" name="msg_statuss"/>
                                <!--0=normal-->
                                <!--1-proposal-->
                                <!--2=invoice-->
                                
                                <input type="text" name="new_message" placeholder="Write your Message" class="form-control send_message" />
                                <input type="file" id="attached_file" name="files[]" multiple class='hidden' >
                                <label for="attached_file">
                                    Attach files
                                </label>
                                
                            </div>
                            <div class="col-sm-2 col-xs-12 text-right sendbtn_area">
                                
                                <input type="button" name="submit_simple_msg" value="Send" class="btn send_button" id="sendsimplemsgservice" >
                            </div>
                            
                        </div>
                        
                <!--  Collapse for Send Propsaal  START -->
                <?php 
                    //if($service_detail['u_id']!=$myuser['u_id']){
                        
                        //if($is_proposal_sent->num_rows() > 0){
                ?>
                
                            <div class="collapse  bg-white" id="send_proposal">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Proposal</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove sendbtn" data-toggle="collapse" data-target="#send_proposal" ></i>
                                    </div>
                                </div>
                                <div class="row newpropsal_field">
                
                                        <div class="form-group">
                                            <div class="row">
                                               
                                                <div class="col-md-3">
                                                     <label>Rate</label>
                                                    <select name="rate" class="form-control">
                                                        <option><?php echo $service_detail['job_type'];?></option>
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
                                                    <input id="budget" type="text" name="budget" placeholder="0.00" class="form-control" />
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
                                                    <input type="text" name="totalamt" id="totalamt" readonly  placeholder="0.00" class="form-control newpropsal_right" />
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
                                                    <input type="text" id="deposite" name="deposit"  placeholder="0.00" class="form-control newpropsal_right" />
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
            
                        <?php //} ?>
            
                            <!--  Collapse for Send Invoice  START -->
                        
                            <div class="collapse bg-white" id="send_invoice">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Invoice</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove sendbtn" data-toggle="collapse" data-target="#send_invoice" ></i>
                                    </div>
                                </div>
                                <div class="row newpropsal_field">
            
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>ITEM</label>
                                                <input type="text" name="description_invoice" placeholder="Enter description" class="form-control" />
                                            </div>
                                            <div class="col-md-4 amount">
                                                <label>Amount</label>
                                                 <i class="glyphicon glyphicon-usd icon_ammount"></i>
                                                <input type="text" name="amount_invoice" placeholder="0.00" value="<?php echo $escrowamt;?>" id="amt_inovice" class="form-control" readonly />
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
                                                <input type="text" name="total_inv_amt" id="total_amt" placeholder="0.00" class="form-control newpropsal_right" value="<?php echo $escrowamt;?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xs-12" style="padding:10px;">
                                            <input type="checkbox" name="confirm" style='height: auto!important;' /> With this you confirm to have completed the work related to this invoice and provided it in the workstream.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                               
                                            </div>
                                            <div class="col-md-2" style="padding: 10px;">
                                                <input type="button" value="Send" name="send_invoice" class="btn send_buttoncollapse" id="sendinvservice" >
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            </div>
                        
                            <!--  Collapse for Send Requset Deposite  START -->
                            
                            <div class="collapse  bg-white" id="requset_deposit">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Deposit</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove sendbtn" data-toggle="collapse" data-target="#requset_deposit" ></i>
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
                                                    <input type="button" name="submit" value="Send" id="askdepositservice" class="btn  send_buttoncollapse" >
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        
                            <!--  Collapse for Repund  START -->
                        
                            <div class="collapse bg-white" id="refund">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Refund</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove sendbtn" data-toggle="collapse" data-target="#refund" ></i>
                                    </div>
                                </div>
                                <div class="row newpropsal_field">
            
                                    <div class="form-group">
                                        <div class="row">
                                           
                                            <div class="col-md-3">
                                                 <label>Unit</label>
                                                <select name="rate" class="form-control">
                                                    <option>Service</option>
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
                                                <input type="text" name="amount_refund" value="" id="refundinput" placeholder="0.00" class="form-control" />
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
                                                <input type="text" name="total_refund_amt" id="againrefundinput" readonly value="<?php //echo $this->Common->service_escrow_amt($service_detail['id']);?>"  placeholder="0.00" class="form-control newpropsal_right" />
                                            </div>
                                        </div>
                                    </div>
                        <script>
                            $(document).on('keyup','#refundinput',function(){
                                var refundamt = $(this).val();
                                if(refundamt > <?php echo $this->Common->service_escrow_amt($service_detail['id']);?> ){
                                    alert("Refund amount cant be greater than <?php echo $this->Common->service_escrow_amt($service_detail['id']);?>");
                                    $("#refundinput").val(0);
                                    $("#againrefundinput").val(0);
                                    return false;
                                }else{
                                    $("#againrefundinput").val(refundamt);
                                }
                            });
                        </script>            
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                               
                                            </div>
                                            <div class="col-md-2" style="padding: 10px;">
                                                <input type="button" value="Send" name="send_refund" class="btn send_buttoncollapse" id="sendrefundservice" >
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
                                            <input type="text" name="reason_extention" placeholder="Enter reason for time extension..." class="form-control reason_extention" />
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
                                            <input type="button" value="Send" name="send_extendtime" class="btn send_buttoncollapse" id="sendextendtimeservice" >
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        </div>
              
              <?php //} ?>
              
                    </div>
                    <div class="col-sm-12">
                        <div class="attach_waper"style="color:#428bca;padding: 10px;" ></div>  
                    </div>
                </form>
                
                <?php } ?>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6 col-xs-12 ">
             
        </div>
        <?php 
            if(!$view_chat_admin){
                include('includes/service_stats.php'); 
            }
        ?>
        
        
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
        $('.attach_waper').html('');
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
        
        $('#attached_file').click(function() {
            $('#attached_file').change(function(){
                
                var $fileUpload = $("input[type='file']");
                if(parseInt($fileUpload.get(0).files.length)>4){
                    alert("You can only upload a maximum of 4 files");
                 
                }else{
                    
                    for(var i = 0 ; i < this.files.length ; i++){
                      var fileName = this.files[i].name;
                      $('.attach_waper').append("<i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' , ');
                    }
                }
            });
         
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
    
    $("#wrpr_all_msgs").scrollTop(1000000000000000000000000000000000000); 
    
    //window.scrollTo(0,document.querySelector("#wrpr_all_msgs").scrollHeight);
     <?php if(!$view_chat_admin){?>
        $(document).ready(function(){
            setInterval(get_new_msg, 5000);
        }); 
    <?php } ?>
    
    function get_new_msg(){ 
        
        var msg_id = $('.wrpr_singl_msg:last').data("id1");
        console.log(msg_id);
        var recv_id = $("#recv_id").val();
        var service_id = $("#service_id").val();
        
          $.ajax({
            url: "ChatServices/get_new_msgs",
            method:"post",
            data:{msg_id:msg_id,recv_id:recv_id,service_id:service_id,service_p_id:<?php echo $_GET['id'];?>},
            cache: false,
            success: function(html){ 
              if(html =="0"){
    
              }else{ 
                $("#wrpr_all_msgs").append(html);
                //$("#wrpr_all_msgs").html(html);
                $("#wrpr_all_msgs").scrollTop(1000000);
              }
              
              
            }
          });
    }
    
</script>




<!--/*****************************----Timer---****************************************/-->

<script>

var objDiv = document.getElementById("wrpr_all_msgs");
objDiv.scrollTop = objDiv.scrollHeight;

 dist =  <?php echo ($expiry_time * 1000);?> ; 
       
var x = setInterval(function() {

dist = dist-1000;
var distance = dist;
var days = Math.floor(distance / (1000 * 3600 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

document.getElementById("count_downtimer").innerHTML = days + " days : " + hours + " hrs : " + minutes + " min :" + seconds + "s ";
var oldhref  = $('.dispute_link').attr('data-href');
$('.dispute_link').prop('href',oldhref+"/"+days+"days-"+hours+"hrs-"+minutes+"min");
if (distance < 0) {
   clearInterval(x);
   document.getElementById("count_downtimer").innerHTML = "EXPIRED";
}
}, 1000);


</script>
<script>
    $(document).click(function() {
    $("#more_btn").removeClass('open');
    $(".chat_more ").removeClass('d-block');
    $(".chat_more ").css("display","none");
});
</script>
