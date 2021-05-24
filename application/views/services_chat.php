<?php include("includes/front_end_header.php");?>

<style>
    
    .chat_web{
        background: #fff;
        min-height: 478px;
        border-radius: 30px;
        margin-bottom: 10px;
        margin-top: 15px;
        box-shadow: 0 0 10px -3px grey;
    }
    .chat_web h3{
        border-bottom: 1px solid black;
        padding-bottom: 10px;
        padding-top: 30px;
        color: #46a049;
        padding-left: 10px;
        
    }
    .send_chat{
        background: #bae6bb;
        margin-top: 20px;
        margin-left: 20px;
        border-radius: 10px;
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
        top: 10px;
        border-bottom: 1px solid #222;
        position: relative;
    }
    .massage_cont{
        background: #eee;
        min-height: 133px;
    }
    .send_message{
        padding-bottom: 100px;
        margin-top: 10px;
        padding-top: 10px;
    }
    .send_button{
        padding: 23px;
        font-size: 18px;
        margin-top: 20px;
        border-radius: 0;
    }
    
    .new_message label{
        color: #46a049;
        /*position: absolute;*/
        bottom: 0;
        left: 20px;
    }
    .profile_chat{
        background: #111;
        
        border-radius: 10px;
        padding-top: 13px;
        padding-bottom: 40px;
        margin-top: 15px;
    }
    .profile_chat img{
        width: 50px;
    }
    .profile_chat h4{
        color: #fff;
    }
    .profile_chat h6{
        color: #fff;
    }
    .profile_chat h5{
        color: #fff;
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
   }
   .proposal_invoice{
       margin-left: 20px;
       border-left: 1px solid #dcd9d9;
       border-right: 1px solid #dcd9d9;
       border-bottom: 1px solid #dcd9d9;
       width: 90%;
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
   .glyphicon{
       color: #9a9a98d1!important;
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
        box-shadow: 0 0 10px 2px grey!important;
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
   .chat_more{
        left: 92px!important;
        top: 25px!important;
   }
   .accept_button , .reject_button{
        padding: 27px 12px;
        font-size: 16px;
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
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <form class="chat_web sndsimplemsgservc sndinvoice" action="Chat/sendmsg" method="post" id="main_form" enctype="multipart/form-data">
                <div class="row wrpr_singl_msg" >
                    <div class="col-xs-12">
                        <h3><?php echo $services_details['title'];?></h3>
                    </div>
                </div>
                
                <div id="wrpr_all_msgs">
                    <?php 
                        include("includes/allmsgthread.php");
                    ?>
                </div>
                <?php 
                
                $is_proposal_sent = $this->db->query("select * from jobs_msgs where custom_status='Proposal' and custom_status_extent ='0' and service_p_id='".$convo[0]['service_p_id']."'");
                ?>
                <div class="row button_proInv">
                        
                        <!--<a href="#send_proposal" class="btn btn-defult" data-toggle="collapse">Send Propsal</a>-->
                    
                    <a href="#send_invoice" type="button" class="btn btn-defult" data-toggle="collapse" >Send Invoice</a>
                    <a href="" class="dropdown-toggle" type="button" data-toggle="dropdown">More
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu chat_more">
                      <li><a href="#requset_deposit" data-toggle="collapse" class="dropdown-toggle">Request Deposit</a></li>
                 
                      <li><a href="#refund" data-toggle="collapse">Refund</a></li>
                    </ul>
                    
                </div>
                <div class="massage_cont">
                    <div class="row new_message">
                        <div>
                            <div class="col-sm-10 col-xs-12">
                                <?php 
                                 //echo "<pre>";var_dump($servicepurchase);
                                ?>
                                <?php if($servicepurchase['service_owner_id']==$myuser['u_id']){ ?>
                                <input type="hidden" id="recv_id" value="<?php echo $servicepurchase['who_purchased'];?>" name="recv_id"/>
                                <?php }else{ ?>
                                <input type="hidden" id="recv_id" value="<?php echo $servicepurchase['service_owner_id'];?>" name="recv_id"/>
                                <?php } ?>
                                
                                <input type="hidden" id="service_id" value="<?php echo $services_details['service_id'];?>" name="service_id"/>
                                <input type="hidden" id="servicep_id" value="<?php echo $convo[0]['service_p_id'];?>" name="servicep_id"/>
                                
                                <input type="text" name="new_message" placeholder="Write your Message" class="form-control send_message" />
                                <input type="file" id="attached_file" name="files[]" multiple class='hidden' >
                                <label for="attached_file">
                                    Attach files
                                </label>
                            </div>
                            <div class="col-sm-2 col-xs-12 text-right">
                                
                                <input type="button" name="submit" value="Send" class="btn btn-success send_button" id="sendsimplemsgsrvc" >
                            </div>
                        </div>
                
                <!--  Collapse for Send Propsaal  START -->
                
                
                            <div class="collapse" id="send_proposal">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Proposal</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#send_proposal" ></i>
                                    </div>
                                </div>
                                <div class="row newpropsal_field">
                
                                        <div class="form-group">
                                            <div class="row">
                                               
                                                <div class="col-md-3">
                                                     <label>Rate</label>
                                                    <select name="rate" class="form-control">
                                                        <option>fixed</option>
                                                        <option>Hourly</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>ITEM</label>
                                                    <input type="text" name="description" placeholder="Enter description" class="form-control" />
                                                </div>
                                                <div class="col-md-4 amount">
                                                    <label>Amount</label>
                                                     <i class="glyphicon glyphicon-gbp icon_ammount"></i>
                                                    <input type="text" name="amount" placeholder="0.00" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 text-right labe_left">
                                                    <label class="new_proplabel">Total</label>
                                                </div>
                                                <div class="col-md-4 input_icon">
                                                    <i class="glyphicon glyphicon-gbp icon_new"></i>
                                                    <input type="text" name="description"  placeholder="0.00" class="form-control newpropsal_right" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 text-right labe_left">
                                                    <label class="new_proplabel">YOU'LL EARN</label>
                                                </div>
                                                <div class="col-md-4 input_icon">
                                                    <i class="glyphicon glyphicon-gbp icon_new"></i>
                                                    <input type="text" name="earn"  placeholder="0" class="form-control newpropsal_right" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 text-right labe_left">
                                                    <label class="new_proplabel">DEPOSIT</label>
                                                </div>
                                                <div class="col-md-4 input_icon">
                                                   
                                                    <input type="text" name="deposite"  placeholder="0.00" class="form-control newpropsal_right" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                   
                                                </div>
                                                <div class="col-md-2" style="padding: 10px;">
                                                    <input type="submit" name="submit" value="Send" class="btn btn-success send_buttoncollapse" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                </div>
                            </div>
            
            
                            <!--  Collapse for Send Invoice  START -->
                        
                            <div class="collapse" id="send_invoice">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Invoice</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#send_invoice" ></i>
                                    </div>
                                </div>
                                <div class="row newpropsal_field">
            
                                    <div class="form-group">
                                        <div class="row">
                                           
                                            <div class="col-md-3">
                                                 <label>Unit</label>
                                                <select name="rate" class="form-control">
                                                    <option>fixed</option>
                                                    <option>Hourly</option>
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
                                                <input type="number" name="total_inv_amt" placeholder="0.00" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--    <div class="row">-->
                                    <!--        <div class="col-md-8 text-right labe_left">-->
                                    <!--            <label class="new_proplabel">Total</label>-->
                                    <!--        </div>-->
                                    <!--        <div class="col-md-4 input_icon">-->
                                    <!--            <i class="glyphicon glyphicon-gbp icon_new"></i>-->
                                    <!--            <input type="text" name="total_inv_amt"  placeholder="0.00" class="form-control newpropsal_right" />-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    <div class="row">
                                        <div class="col-xs-12" style="padding:10px;">
                                            <input type="checkbox" name="confirm" style='height: auto!important;' /> You have confirmed that you have completed the work realted to this invoice and provided it in theworkstream.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                               
                                            </div>
                                            <div class="col-md-2" style="padding: 10px;">
                                                <input type="button" value="Send" class="btn btn-success send_buttoncollapse" id="sendinvsrvc" >
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            </div>
                        
                            <!--  Collapse for Send Requset Deposite  START -->
                            
                            <div class="collapse" id="requset_deposit">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Deposit</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#requset_deposit" ></i>
                                    </div>
                                </div>
                                <div class="row newpropsal_field">
                
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>ITEM</label>
                                                    <input type="text" name="description" placeholder="Enter description" class="form-control" />
                                                </div>
                                                <div class="col-md-4 amount">
                                                    <label>Amount</label>
                                                     <i class="glyphicon glyphicon-gbp icon_ammount"></i>
                                                    <input type="text" name="amount" placeholder="0.00" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                   
                                                </div>
                                                <div class="col-md-2" style="padding: 10px;">
                                                    <input type="submit" name="submit" value="Send" class="btn btn-success send_buttoncollapse" >
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        
                            <!--  Collapse for Repund  START -->
                        
                            <div class="collapse" id="refund">
                                <div class="row heading_newpropsal">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>New Refund</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-right">
                                        <i class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#refund" ></i>
                                    </div>
                                </div>
                                <div class="row newpropsal_field">
                
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>ITEM</label>
                                                    <input type="text" name="description" placeholder="Enter description" class="form-control" />
                                                </div>
                                                <div class="col-md-4 amount">
                                                    <label>Amount</label>
                                                     <i class="glyphicon glyphicon-gbp icon_ammount"></i>
                                                    <input type="text" name="amount" placeholder="0.00" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                   
                                                </div>
                                                <div class="col-md-2" style="padding: 10px;">
                                                    <input type="submit" name="submit" value="Send" class="btn btn-success send_buttoncollapse" >
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
              
              
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-4 col-sm-6 col-xs-12 ">
            <div class="profile_chat">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <img src="<?php echo $otherparyr['dp'];?>" class="img-circle" />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-5">
                        <h4><?php echo ucwords($otherparyr['f_name']." ".$otherparyr['l_name']);?></h4>
                        <h6><?php echo $otherparyr['location']; ?></h6>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <h6>0% (0)</h6>
                    </div>
                </div>
                <?php 
                    
                        if($servicepurchase['service_owner_id']==$myuser['u_id']){
                            
                ?>
                <div class="row profile_des">
                    <div class="col-sm-6">
                        <h5>Earnings</h5>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="text-right"><b>£0</b></h5>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-6">
                        <h5>In this Escrow</h5>
                    </div>
                    <?php 
                    $escrowamt = $this->db->query("select sum(damount-camount) as amt from transactions where u_id='0' and service_id='".$services_details['service_id']."' and in_escrow='Yes' and is_clear='No'")->result_array()[0]['amt'];
                    ?>
                    <div class="col-sm-6">
                        <h5 class="text-right"><b>£<?php echo $escrowamt;?></b></h5>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-6">
                        <h5>Unpaid Invoice</h5>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="text-right"><b>£0</b></h5>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include("includes/front_end_footer.php");?>

<script>
    $(document).ready(function(){
        setInterval(get_new_msg, 10000);
    });    
    
    function get_new_msg(){ 
      
        var msg_id = $('.wrpr_singl_msg:last').data("id1");
        var recv_id = $("#recv_id").val();
        var servicep_id = $("#servicep_id").val();
        
          $.ajax({
            url: "Chat/get_new_service_msgs",
            method:"post",
            data:{msg_id:msg_id,recv_id:recv_id,servicep_id:servicep_id},
            cache: false,
            success: function(html){ 
              if(html =="0"){
    
              }else{ 
                $("#wrpr_all_msgs").append(html);
                $("#wrpr_all_msgs").scrollTop($(document).height());
              }
              
              
            }
          });
    }
    
</script>
