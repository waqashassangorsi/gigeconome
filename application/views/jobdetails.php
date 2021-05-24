<?php include("includes/front_end_header.php");?>

<style type="text/css">
	.container{
		margin-top: 30px;
	}
	.container_main h2{
		font-weight: bold;
	}
	.button{
		display: inline-block;
		padding: 10px;
		border-radius: 5px;
		background: #333;
		color: #fff;
		text-align: center;
	}
	.container_images img{
		width: 30px;
		margin-top: 10px;
		margin-left: 7px;
	}
	.job_des{
		border-radius: 10px;
		padding: 10px;
		min-height: 170px;
		background: #333;
	}
	.job_des p{
		color: #fff;
		font-size: 13px;
		text-align: left;
		width: 100%;
		word-break: break-word;
	}
	.glyphicon-paperclip{
		color: #009247!important;
		font-size: 14px;
		margin-top: 10px;
	}
	.container_job_des h3{
		font-weight: bold;
	}
	.send_proposal{
		border-radius: 10px;
		margin-bottom: 10px;
	}
	.container_send_proposal{
		margin-top: 30px;
	}
	.container_send_proposal h3{
		font-weight: bold;
	}
	.send_proposal p{
		color: #777;
		font-size: 16px;
		text-align: left;
		width: 80%;
	}
	.reight_send_proposal{
		background: #fff;
		width: 220px;
		padding-bottom: 10px;
		padding-top: 10px;
		text-align: center;
		font-size: 15px;
		box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		margin-left: 10px;
		
	}
	.btn-success{
		margin-top: 40px;
		padding-left: 20px;
		font-size: 15px;
	}
	.Proposal_des_cont{
		margin-bottom: 10px;
	}
	.sendproposal_input{
		padding: 20px;
		font-size: 15px;
		background:white;
	}
	#submit{
		padding-top: 15px;
		padding-bottom: 35px;
		font-weight: bold;
	}
	#send_proposal_cont{
		font-size: 13px;
	}
	.reight_side_cont{
	}
	
	.company_decc{
	    background: #deebec;
	    padding: 5px;
        margin: 5px;
	}
	.company_decc h4{
    	font-weight: bold;
        font-size: 16px;
	}
	.company_decc p{
	
	    font-size: 11px;
	}
	
    	/*   */
    	
    
    
    .row{
        padding: 0;
        margin: 0;
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
   
   .accept_button , .reject_button{
        padding: 24px 7px;
        font-size: 16px;
   }
   .profile_des{
       padding-top: 30px;
   }
   .reject_proposal{
       padding: 12px 19px;
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
       
        .receive_chat p{
            font-size: 12px!important;
        }
        .receive_chat h5{
            font-size: 10px!important;
        }
        .profile_chat{
            margin-bottom: 10px;
        }
       
        .proposal_amount h2{
            font-size: 21px;
        }
    }
	
	.newpropsal_field input {
    height: 50px;
}
	.new_proplabel {
    padding-top: 19px;
    font-weight: bold;
}

.cuttingrow{
    margin-top:10px;
}

@media screen and (max-width: 764px) and (min-width:340px){
  .job_typetext{
    margin-top:3px;
   }   
}
</style>

<div class='container'>
	<div class="row">
		<div class="col-sm-7 col-xs-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="container_main">
						<h2><?php echo ucfirst($job_detail['job_title']);?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<hr style="height:2px;border-width:50%;color:gray;background-color:gray;margin-bottom:3px;" />
				</div>
			</div>
			<?php
			$proposal_sent = $this->db->query("select users.* from jobs_msgs inner join users on send_id=users.u_id where job_id='".$job_detail['job_id']."' and custom_status='Proposal' and custom_status_extent in(0,1,2) group by send_id")->result_array();
        		      
			?>
			<div class="row mt-1">
				<div class="col-sm-12">
					<div class="button"><?php echo $this->check->timeAgo(strtotime($this->Common->gettimeinmyzone(($job_detail['date']))));  ?></div>
					<div class="button"><?php echo count($proposal_sent);?> Proposal</div>
					<div class="button"><?php echo $job_detail['job_location'];?></div>
					<div class="button job_typetext"><?php echo $job_detail['job_type'];?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="container_images">
					    <?php 
					      foreach($proposal_sent as $key=>$value){
					    ?>
						<img src="<?php echo $value['dp'];?>" class="img-circle" alt='profile_Picture' style="height:30px;" />
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="container_job_des">
						<h3>JOB DESCRIPTION</h3>
						<div class="job_des">
							<p><?php echo $job_detail['job_details'];?></p>
						</div>
						<?php 
						$attachments = $this->db->query("select * from job_images where job_id='".$job_detail['job_id']."'")->result_array();
						//echo "<pre>";var_dump($attachments); exit;
						if(!empty($attachments)){
						    
						?>
						<span>Attachments: </span>
						<?php 
						    foreach($attachments as $imgkey=>$imgfile){
						        
						        $filescan = (pathinfo( $imgfile['images'])); 
						        //echo "<pre>";var_dump($filescan);
						        
						?>
						<form action="<?php echo SURL."Inbox/downloadfile/";?>" method="post" style="clear:both">
                            <input type="hidden" value="<?php echo $imgfile['images']; ?>" name="file">
                            <input type="submit" value="<?php echo $filescan['basename'];?>" style="background: none;color: #42c0fb;border: none;text-decoration: underline;font-size: 12px;">
                        </form>
              
						<!--<span class="glyphicon glyphicon-paperclip "><?php //echo $imgfile['images'];?> ,</span>-->
						<?php }} ?>
					</div>
				</div>
			</div>
			
			<!--  Proposal section start   -->
			<?php 
			$can_send=0;
			if((isset($_GET['view'])) || $myuser['u_id']==$job_detail['u_id'] || $myuser['user_status']=="Buyer"){
			    echo "<br><br><br><br>";
			}else{
    			$is_pro_Sent = $this->db->query("select * from jobs_msgs where job_id='".$job_detail['job_id']."' and custom_status='Proposal' and send_id='".$myuser['u_id']."'")->result_array();
            	if(count($is_pro_Sent) > 0){
            	    foreach($is_pro_Sent as $key=>$value){
			?>
			            <div class="proposal_invoice bg-white wrpr_singl_msg">
                        <div class="row">
                            <div class="col-xs-12 propmain_heading">
                                <p><b><?php echo date("d M Y",strtotime($value['date']));?></b></p>
                                <h4>Proposal -- #<?php echo $value['proposal_no']?></h4> 
                                <p><?php echo $value['content']?></p>
                            </div>
                        </div>
                        <div class="row propinvoice_heading">
                            <div class="col-xs-6">
                                <h6>ITEM</h6>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h6>AMOUNT</h6>
                            </div>
                        </div>
                        <div class="row propinvoice_body">
                            <div class="col-xs-6 first_rows">
                                <span class="first_row"><?php echo $value['proposal_description']?></span>
                            </div>
                            <div class="col-xs-6 text-center ">
                                <span class="first_row" style="padding-left: 10px;">£<?php echo $value['proposal_budget']?></span>
                            </div>
                        </div>
                        <div class="row proposa_back">
                            <div class="col-md-10 col-xs-12 amountmain_align">
                                <div class="row">
                                    <div class="col-xs-8" style="padding:10px;">
                                    <div class="row" style="border-bottom: 1px solid #aba5a5;padding-top: 10px;">
                                    <div class="col-xs-7 prop_align">
                                        <p>Proposal Ammount</p>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        <p>£<?php echo $value['proposal_budget']?></p>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px;">
                                    <div class="col-xs-7 prop_align">
                                        <p>Deposit</p>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        <p>£<?php echo $value['proposal_deposit']?></p>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xs-4  proposal_amount">
                                    <p>Proposal Amount</p>
                                    <h2><?php echo $value['proposal_budget']?></h2>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-2 col-sm-12 col-xs-12" style="padding:0;">
                                <div class="button_action" >
                                    <?php 
                                        if($value['custom_status_extent']=="0"){
                                            $can_send=1;
                                            if($value['send_id']==$myuser['u_id']){
                                    ?>
                                                <button type="button" class="btn btn_inovce outer_cancel" data-value="<?php echo $value['msg_id']; ?>">Cancel</button>
                                            <?php }else{ ?>
                                                <a href="<?php echo SURL.'PaymentSummary/acceptproposal/'.$value['msg_id'];?>" type="button" class="btn btn-success btn_inovce accept_proposal" data-value="<?php echo $value['msg_id']; ?>">Accept</a>
                                                <button type="button" class="btn btn-danger btn_inovce reject_proposal" data-value="<?php echo $value['msg_id']; ?>">Reject</button>
                                            <?php } 
                                    }else if($value['custom_status_extent']=="1"){ 
                                            $can_send=1;
                                    ?>
                                            <div class='accept_button btn btn-success'>Accepted</div>
                                    
                                    <?php 
                                        }else if($value['custom_status_extent']=="2"){ ?>
                                            <div class='reject_button btn btn-danger'>Rejected</div>
                                    <?php }else if($value['custom_status_extent']=="3"){ ?>
                                             <div class='reject_button btn btn-default'>Cancelled</div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    
                    </div>
			
			            <!--  Proposal Section End   -->
			<?php 
            	    }
            	    
            	} 
                if($can_send==0){	
			?>
			
			        <form method="post" class="newpropsal_field" action="<?php echo base_url(); ?>Jobdetails/index/<?php echo $job_detail['job_slug']?>">
    			
        			<div class="row">
        				<div class="col-sm-12">
        					<div class="container_send_proposal">
        						<h3>Send Proposal</h3>
        						<div class="send_proposal">
    								<div class="form-group">
    								  	<textarea class="form-control" name="content" rows="6" id="send_proposal_cont"></textarea>
    								</div>
        						</div>
        					</div>
        				</div>
        			</div>
    			
        			<input type="hidden" name="job_id" value="<?php echo $job_detail['job_id']; ?>"/>
    			    <div class="Proposal_des_cont">
            			<div class="row">
            				<div class="col-sm-8">
            					<div class="form-group">
            					    <label style="font-weight: bold;">Enter Description</label>
            						<input type="text" class="form-control sendproposal_input" name="description" id="project_description" placeholder="Project Description will come here">
            					</div>
            				</div>
            				<div class="col-sm-4">
            					<div class="form-group">
            					   <label style="font-weight: bold;">Enter Budget </label>	
            					   <input type="text" class="form-control sendproposal_input" name="budget" id="budget" placeholder="Budget">
            					</div>
            				</div>
            			</div>
            			<div class="row">
            			    <div class="col-md-8 text-right labe_left">
                                    <label class="new_proplabel ">DEPOSIT</label>
                            </div>
                            <div class="col-md-4 input_icon">
                                               
                                    <input type="text" class="form-control sendproposal_input" name="deposit"  id="deposite" placeholder="Deposit">
                            </div>
            			 <!--   <div class="col-sm-3 col-sm-offset-9">-->
            				<!--	<div class="form-group">-->
            				<!--		<input type="text" class="form-control sendproposal_input" name="deposit"  id="deposite" placeholder="Deposit">-->
            				<!--	</div>-->
            				<!--</div>-->
            			</div>
            			<div class="row cuttingrow">
            			      <div class="col-md-8 text-right labe_left">
                                 <label class="new_proplabel ">TAKE HOME</label>
                            </div>
                            
                            <div class="col-md-4 input_icon">
                                               
                               		<input type="text" class="form-control sendproposal_input" style="background:white;" readonly name="earn" id="ufter_cutting" placeholder="After Cutting">
                            </div>
            				<!--<div class="col-sm-4 col-sm-offset-9">-->
            				<!--	<div class="form-group">-->
            				<!--		<input type="text" class="form-control sendproposal_input" style="background:white;" readonly name="earn" id="ufter_cutting" placeholder="After Cutting">-->
            				<!--	</div>-->
            				<!--</div>-->
            			</div>
            			<div class="row">
            				<div class="col-sm-12">
            					<div class="form-group">
            						<input type="submit" class="form-control btn btn-success" id="submit" value="SEND PROPOSAL">
            					</div>
            				</div>
            			</div>
        			</div>
    		</form>
            <?php 
                }else{ ?>
			    
			 
            <?php 
                }
			    
			} 
            ?>
		</div>
		
		<div class="col-sm-3 col-sm-offset-2 col-xs-12 hidden-xs">
			<div class="reight_side_cont">
				<div class="reight_send_proposal">
					<h3>£<?php echo $job_detail['budget'];?></h3>
					<?php 
					    if(($myuser['u_id']!=$job_detail['u_id']) && $myuser['user_status']=="User"){
					        
					        if(count($is_pro_Sent) > 0){ ?>
					            <div class="btn btn-success"style="margin-top:0px!important;"><a href="javascript:Void(0)" style="color:#fff; ">PROPOSAL SENT</a></div>
					                <?php }else{ ?>
					
			                    <div class="btn btn-success"style="margin-top:0px!important;"><a href="#send_proposal_cont" style="color:#fff; ">SEND PROPOSAL</a></div>
					            
					            <?php }
					        } ?>
					
					            <?php if(!empty($job_detail['company_details'])){?>
					<div class="company_decc">
					   
					    <h4>Company Description</h4>
					    <p>
					        <?php echo $job_detail['company_details']; ?>
					        
					    </p>
					    
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
    $deductionfee = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
?>
<script>
$(document).on('keyup','#deposite',function(){

    var budget = $("#budget").val();
    var deposite = $("#deposite").val();
    var deduct = deposite*<?php echo $deductionfee;?>/100;
    var earn = deposite-deduct;
    var budget = $("#ufter_cutting").val(earn);
    
});
</script>
<?php include("includes/front_end_footer.php");?>
