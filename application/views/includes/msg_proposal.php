<div class="row wrpr_singl_msg" id="msg_wapr_<?php echo $value['msg_id'];?>" data-id1="<?php echo $value['msg_id'];?>">
    <div class="proposal_invoice bg-white" style="margin-top: 0px;" data-id1="<?php echo $value['msg_id'];?>"> 
        <div class="row">
            <div class="col-xs-12 propmain_heading" style="font-size:17px;">
                <p>
                    <b>
                        <?php 
                         echo $formatted_date_long = date("h:i: a, d M Y",strtotime($this->Common->gettimeinmyzone($value['date'])));
                        ?>
                         
                    </b>
                    
                <?php if( ($value['is_seen'] == 1) && $value['send_id']==$myuser['u_id']){ ?>
                    <span class="label label-success pull-right" style='font-size:10px;color:#5bc0de;background:none'><?php 
         $tz = $this->session->userdata('timezone');
         $dt_obj = new DateTime($value['seen_date_time'] ,new DateTimeZone('UTC'));
         $dt_obj->setTimezone(new DateTimeZone($tz));
         
         echo "Seen ";
         echo $this->check->timeAgo(strtotime(date_format($dt_obj, 'Y-m-d H:i:s')));  ?></span><?php }?>
                    
                    
                </p>
                <h4>Proposal -- #<?php echo $value['proposal_no']?></h4> 
                <p style="color: #373e4a"><?php echo $value['content']; ?></p>
            </div>
        </div>
        <?php 
        $myattachedfiles = $this->db->query("select * from msgs_files where msg_id='".$value['msg_id']."'")->result_array();
        
        if(!empty($myattachedfiles)){
        ?>
        
            <?php		
            
            echo "<div class='row' style='padding:0px 16px'>";
            echo "<h5>Attachments</h5>";
    			foreach ($myattachedfiles as $key => $files) {
    				
    				if(!empty($files)){
    
    				$filescan = (pathinfo( $files['file'])); 
    				//var_dump($filescan);  
    				if(in_array($filescan['extension'],array("Jpg","jpg","Jpeg","png") )){
    					$filetypee = "Image";
    				}else{
    					$filetypee = "File";
    				}
    		?>
            <div class="col-sm-1" style="padding:0;">
    			<?php if($filetypee == "Image"){?>
    		<a class="demo1" href='<?php echo SURL.$files['file'];?>' data-lightbox="gallery">	<img src="<?php echo SURL.$files['file'];?>" target="_blank" class="imgshow thumbnail" style="width:60px;height:60px;max-width:300px;margin:0px"></a>
    			<?php } ?>
    			
    			<?php if($filetypee == "File"){?>
    			<div>
    			    <a style="background: none;color: black;border: none;text-decoration: underline;" href="<?php echo SURL."Inbox/downloadfilefeed/".$files['id'];?>"><?php echo $filescan['basename'];?></a>
    			</div>
    			
    			<?php } ?>
    
    		</div>	
        <?php }} echo "</div>";
     } ?> 
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
                <span class="first_row"  style="color: #373e4a!important;"><?php echo $value['proposal_description']; ?></span>
            </div>
            <div class="col-xs-6 text-center ">
                <span class="first_row" style="padding-left: 10px;color: #373e4a!important;">£<?php echo $value['proposal_budget']; ?></span>
            </div>
        </div>
        <div class="row proposa_back">
            <div class="col-md-10 col-xs-12 amountmain_align">
                <div class="row">
                    <div class="col-xs-8" style="padding:10px;">
                        <div class="row" style="border-bottom: 1px solid #aba5a5;padding-top: 10px;">
                            <div class="col-xs-7 prop_align">
                                <p>Proposal Amount</p>
                            </div>
                            <div class="col-lg-5 text-right">
                                <p>£<?php echo number_format($value['proposal_budget'],2); ?></p>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                        <div class="col-xs-7 prop_align">
                            <p>Deposit</p>
                        </div>
                        <div class="col-lg-5 text-right">
                            <p>£<?php echo number_format($value['proposal_deposit'],2); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4  proposal_amount">
                    <p>Proposal Amount</p>
                    <h2  style="color: #373e4a!important;">£<?php echo number_format( $value['proposal_budget'],2); ?></h2>
                </div>
                </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="button_action" id="wrpr_pro_section_<?php echo $value['msg_id'];?>">
                   
                    <?php 
                        if($value['custom_status_extent']=="0"){
                            if($value['send_id']==$myuser['u_id']){
                    ?>
                                <button type="button" class="btn btn_inovce cancelproposal" <?php echo $disabled_action;?> data-value="<?php echo $value['msg_id']; ?>">Cancel</button>
                            <?php }else{?>
                            <div>
                                <button type="button" class="btn btn_inovce acceptproposal" <?php echo $disabled_action;?> style="background:#007d3d;color:white;" data-value="<?php echo $value['msg_id']; ?>">Accept</button>
                                <button type="button" class="btn btn_inovce reject_proposal btn-danger" <?php echo $disabled_action;?> data-value="<?php echo $value['msg_id']; ?>">Reject</button>
                            </div>
                                
                            <?php } ?>
                    
                    
                    <?php 
                        }else if($value['custom_status_extent']=="1"){ ?>
                            <div class='accept_button btn btn-success'>Accepted</div>
                    
                    <?php 
                        }else if($value['custom_status_extent']=="2"){ ?>
                            <div class='reject_button btn btn-danger'>Rejected</div>
                    <?php }else if($value['custom_status_extent']=="3"){ ?>
                            <div class='btn btn-danger' style="padding: 15px 10px 15px 10px;border: 1px solid #ccc;">Cancelled</div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
           
    </div>

    <?php 
        $buyername = $this->db->query("select users.*,jobs_msgs.*,jobs.u_id as buyerid from jobs_msgs inner join jobs on jobs_msgs.job_id=jobs.job_id inner join users on jobs.u_id=users.u_id where jobs_msgs.job_id='".$value['job_id']."'")->result_array()[0];
        if($value['custom_status_extent']=="1"){
            
    ?>
        <!-- Proposal Accept  -->
        <div class="accept_wpar">
            <div class="row">
                <div class="col-md-1" >
                    <span><i class="glyphicon glyphicon-ok" ></i></span>
                </div>
                <div class="col-sm-10" style="border-left: 3px solid #007d3d;margin-left: 12px;">
                    <div class="accept_cont">
                        <h4>
                            <?php 
                                if($value['recv_id']==$myuser['u_id']){
                                    echo "You have deposited £".$value['proposal_deposit']." in site's Escrow Account";
                                }else{
                                    echo ucwords($buyername['f_name']." ".$buyername['l_name'])." has deposited £".$value['proposal_deposit']." in site's Escrow Account so you can get cracking.";
                                }
                            ?>
                        </h4>
                           
                    </div>
                </div>
            </div>
        </div>
    <?php 
            
        }else if($value['custom_status_extent']=="2" && $buyername['buyerid']!=$myuser['u_id']){ 
        
            if(($job_detail['job_awarded_to'] > 0) && ($job_detail['job_awarded_to'] != $myuser['u_id'])){
               $rejection_text = "This job has been awarded to other freelancer. Dont worry there are thousands of other jobs waiting for your proposal.";
            }else{
               $rejection_text = "Your proposal has been rejected, send another.";
            }
    
    ?>

            <!-- Proposal Reject  -->
            <div class="reject_wpar">
                <div class="row">
                    <div class="col-md-1" >
                        <span><i class="glyphicon glyphicon-remove" ></i></span>
                    </div>
                    <div class="col-sm-10" style="border-left: 3px solid #cc2424;margin-left: 12px;">
                        <div class="accept_cont">
                            <h4>
                                <?php 
                                    echo date("d M Y",strtotime($this->Common->gettimeinmyzone($value['date'])));
                                ?>
                            </h4>
                            <h4><?php echo $rejection_text;?></h4>
                        </div>
                    </div>
                </div>
            </div>
    <?php 
    
        } 
    ?>

</div>