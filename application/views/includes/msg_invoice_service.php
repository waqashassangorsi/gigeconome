
<div class="row wrpr_singl_msg" id="msg_wapr_<?php echo $value['msg_id'];?>" data-id1="<?php echo $value['msg_id'];?>">
    <?php 
    $job_escrow_amt = $this->Common->service_escrow_amt($value['service_p_id']);
    ?>
    <div id="outer_Wrpr_<?php echo $value['msg_id'];?>" data-id1="<?php echo $value['msg_id'];?>">
        <div class="proposal_invoice bg-white">
            <div class="row">
                <div class="col-xs-12 propmain_heading">
                    <p><b>
                        <?php 
                         echo $this->Common->gettimeinmyzone($avalue['date']);
                        ?></b></p>
                    <h4>Invoice -- #<?php echo $value['invoice_id']?></h4>
                    <p style="color: #373e4a!important;"><?php echo $value['content']; ?></p>
                </div>
            </div>
            <div class="row propinvoice_heading">
                <div class="col-xs-6">
                    <h6>ITEM</h6>
                </div>
                <div class="col-xs-3">
                    <h6>AMOUNT</h6>
                </div>
            </div>
            <div class="row propinvoice_body">
                <div class="col-xs-6 first_rows">
                    <span class="first_row" style="color: #373e4a!important;"><?php echo $value['invc_description']; ?></span>
                </div>
                <div class="col-xs-3 ">
                    <span class="first_row" style="padding-left: 10px;color: #373e4a!important;">£<?php echo number_format($value['invc_amt'],2); ?></span>
                </div>
            </div>
            <div class="row proposa_back">
                <div class="col-md-10 col-xs-12 amountmain_align">
                    <div class="row">
                        <div class="col-xs-8" style="padding:10px;">
                        <div class="row" style="border-bottom: 1px solid #aba5a5;padding-top: 10px;">
                        <div class="col-xs-7 prop_align">
                            <p>Invoice Total</p>
                        </div>
                        <div class="col-lg-5 text-right">
                            <p>£<?php echo number_format($value['invc_amt'],2); ?></p>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px;">
                        <div class="col-xs-7 prop_align">
                            <p>In Escrow</p>
                        </div>
                        <div class="col-lg-5 text-right">
                            <p>£<?php echo number_format($job_escrow_amt,2); ?></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xs-4  proposal_amount">
                        <p>Invoice Total</p>
                        <h2 style="color: #373e4a!important;">£<?php echo number_format($value['invc_amt'],2); ?></h2>
                    </div>
                    </div>
                </div>
                
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="button_action" id="wrpr_invc_section_<?php echo $value['msg_id'];?>">
    
                        <?php 
                            if($value['custom_status_extent']=="4"){
                                if($value['send_id']==$myuser['u_id']){
                        ?>
                                    <button type="button" class="btn btn_inovce cancelinvoice_service" data-value="<?php echo $value['msg_id']; ?>">Cancel</button>
                                <?php }else{ ?>
                                    <a href="javascript:void(0)" type="button" class="btn btn-success btn_inovce accept_services_invoice" data-value="<?php echo $value['msg_id']; ?>">Accept</a>
                                    <button type="button" class="btn btn-danger btn_inovce reject_services_invoice" data-value="<?php echo $value['msg_id']; ?>">Reject</button>
                                <?php } ?>
                        
                        
                        <?php 
                            }else if($value['custom_status_extent']=="5"){ ?>
                                <div class='accept_button btn btn-success'>Accepted</div>
                        
                        <?php 
                            }else if($value['custom_status_extent']=="6"){ ?>
                                <div class='reject_button btn btn-danger'>Rejected</div>
                               
                        <?php }else if($value['custom_status_extent']=="7"){ ?>
                                <div class='btn btn_inovce btn-danger'>Cancelled</div>
                        <?php } ?>
                    </div>
                    
                </div>
            </div>
        
            
            <?php 
                if($myuser['u_id']==$value['send_id']){
                    if($value['custom_status_extent']=="6"){
            ?>
            
            <?php }}?>
        
    </div>
    
    <?php 
    $myattachedfiles = $this->db->query("select * from msgs_files where msg_id='".$value['msg_id']."'")->result_array();
    
    if(!empty($myattachedfiles)){
    ?>
    <h5>Attachments</h5>
        <?php		
			foreach ($myattachedfiles as $key => $files) {
				
				if(!empty($files)){

				$filescan = (pathinfo( $files['file'])); 
				//var_dump($filescan);  
				if(in_array($filescan['extension'],array("Jpg","jpg","Jpeg", "png") )){
					$filetypee = "Image";
				}else{
					$filetypee = "File";
				}


					
		?>
        <div style="padding:0 0 10px 0;">
			<?php if($filetypee == "Image"){?>
			<img src="<?php echo SURL.$files['file'];?>" class="imgshow" style="width:100%;max-width:300px">
			<?php } ?>
			
			<?php if($filetypee == "File"){?>
			<div>
			    <a style="background: none;color: black;border: none;text-decoration: underline;" href="<?php echo SURL."Inbox/downloadfilefeed/".$files['id'];?>"><?php echo $filescan['basename'];?></a>
			</div>
			
			<?php } ?>

		</div>	
    <?php }}} ?>    
    
     <!--Invoice Accept  -->
    <?php if($value['custom_status_extent']=="5" && $myuser['u_id']==$value['send_id']){?>
    <div class="accept_wpar">
        <div class="row">
            <div class="col-md-2" >
                <span><i class="glyphicon glyphicon-ok" ></i></span>
            </div>
            <div class="col-sm-10" style="border-left: 3px solid #007d3d;">
                <div class="accept_cont">
                    <h4><?php echo date("d M Y",strtotime($value['date']));?></h4>
                    <h4>Your Invoice has been approved. £<?php echo number_format($value['invc_amt'],2); ?> is deposited on your account</h4>
                </div>
            </div>
        </div>
    </div>
<?php 
    }else if($value['custom_status_extent']=="6"){ 
        
        $is_dispute_araised = $this->db->query("select * from disputes where msg_id='".$value['msg_id']."' and type='service'");
        if($is_dispute_araised->num_rows() > 0){
            $fetch_dispute_Record = $is_dispute_araised->result_array()[0];
    
            if($fetch_dispute_Record['is_resolved']=="no"){
?>
    <div class="reject_wpar">
        <div class="row">
            <div class="col-md-1" >
                <span><i class="glyphicon glyphicon-ok"></i></span>
            </div>
            <div class="col-sm-10" style="border-left: 3px solid #cc2424;margin-left: 12px;">
                <div class="accept_cont">
                    <h4>Dispute has been raised on this Invoice request.</h4>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
            }else{
                
                $get_Winner = $this->db->query("select * from users where u_id='".$fetch_dispute_Record['winner_id']."'")->result_array()[0];
                 $winner_name = ucwords($get_Winner['f_name']." ".$get_Winner['l_name']);
    ?>
                <!-- Proposal Reject  -->
                <div class="reject_wpar">
                    <div class="row">
                        <div class="col-md-1" >
                            <span style="background: green !important;"><i class="glyphicon glyphicon-ok"></i></span>
                        </div>
                        <div class="col-sm-10" style="border-left: 3px solid #cc2424;margin-left: 12px;">
                            <div class="accept_cont">
                                <h4>Amount has refunded to <?php echo $winner_name; ?>.</h4>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            }
            
        }else{
            
        
            if($myuser['u_id']==$value['send_id']){?>
        
            <!-- Invoice Reject  -->
            <div class="reject_wpar">
                <div class="row">
                    <div class="col-md-2" >
                        <span><i class="glyphicon glyphicon-remove" ></i></span>
                    </div>
                    <div class="col-sm-10" style="border-left: 3px solid #cc2424;">
                        <div class="accept_cont">
                            <h4><?php echo date("d M Y",strtotime($value['date']));?></h4>
                            <h4>Your invoice has been rejected. If you want to raise a dispute <a class="dispute_link" data-href="Disputespage/services/<?php echo $service_detail['id'].'/'.$value['msg_id'];?>" href="<?php echo SURL.'Disputespage/services/'.$value['service_p_id'].'/'.$value['msg_id'];?>" target="_blank"  class="dropdown-toggle chat_btnss2 dispute_link"  data-href="Disputespage/services/<?php echo $value['service_p_id'];?>" >click here</a>.</h4>
                        </div>
                    </div>
                </div>
            </div>
                        
    <?php }}} ?>
    
    
    <?php 
        if($value['custom_status_extent']=="5"){

        if($myuser['u_id']==$service_detail['u_id']){ 
            if($value['is_freelancer_rated']=="No"){
    ?>
    <form class="feedback_warp" action="<?php echo SURL.'ChatServices/giverating';?>" method="post">
        <h3>Rating</h3>
    
        <div class="send_feed_left send_content">
            <div class="feedback_send bg-white">
                <ul class="d-flex">
                    <li><img src="<?php echo $myuser['dp'];?>" class="img-circle" /></li>
                    <li style="width:100%;">
                        <textarea class="form-control" name="comment_user" rows="4" style="width:100%;" required></textarea>
                    </li>
                </ul>
                <input type="hidden" name="rating" value="" id="rating_id_<?php echo $value['msg_id']; ?>"/>
                <input type="hidden" name="jobid" value="<?php echo $value['service_id']; ?>"/>
                <input type="hidden" name="u_id" value="<?php echo $otherparyr['u_id']; ?>"/>
                <input type="hidden" name="msg_id" value="<?php echo $value['msg_id']; ?>"/>
                <input type="hidden" name="status" value="user"/>
				<input type="hidden" id="service_p_id" value="<?php echo $service_detail['id'];?>" name="service_p_id"/>
                
                <div class="send_rating ratting_star" >
                    <p class="stars">
                      <span>
                        <a href="javascript:void(0)" data-id1="1" data-id2="<?php echo $value['msg_id']; ?>" class="star-1" href="#">1</a>
                        <a href="javascript:void(0)" data-id1="2" data-id2="<?php echo $value['msg_id']; ?>" class="star-2" href="#">2</a>
                        <a href="javascript:void(0)" data-id1="3" data-id2="<?php echo $value['msg_id']; ?>" class="star-3" href="#">3</a>
                        <a href="javascript:void(0)" data-id1="4" data-id2="<?php echo $value['msg_id']; ?>" class="star-4" href="#">4</a>
                        <a href="javascript:void(0)" data-id1="5" data-id2="<?php echo $value['msg_id']; ?>" class="star-5" href="#">5</a>
                      </span>
                    </p>
                    <button type="submit" class="btn btn-primary submit_rate_service giveratingg">Submit</button>
                </div>
            </div>
            
        </div>
        
    </form>
    
    <?php }}else{ 
        if($value['is_buyer_rated']=="No"){
    ?>
    <form class="feedback_warp" action="<?php echo SURL.'ChatServices/giverating';?>" method="post">
        <h3>Rating</h3>
        <div class="send_feed_left send_content">
            <div class="feedback_send bg-white">
                <ul class="d-flex">
                    <li><img src="<?php echo $myuser['dp'];?>" class="img-circle" /></li>
                    <li style="width:100%;">
                        <textarea class="form-control" name="comment_user" rows="4" style="width:100%;" required></textarea>
                    </li>
                </ul>
                <input type="hidden" name="rating" value="" id="rating_id_<?php echo $value['msg_id']; ?>"/>
                <input type="hidden" name="jobid" value="<?php echo $value['service_id']; ?>"/>
                <input type="hidden" name="u_id" value="<?php echo $otherparyr['u_id']; ?>"/>
                <input type="hidden" name="msg_id" value="<?php echo $value['msg_id']; ?>"/>
                <input type="hidden" name="status" value="Buyer"/>
				<input type="hidden" id="service_p_id" value="<?php echo $service_detail['id'];?>" name="service_p_id"/>
                
                <div class="send_rating ratting_star" >
                    <p class="stars">
                      <span>
                        <a href="javascript:void(0)" data-id1="1" data-id2="<?php echo $value['msg_id']; ?>" class="star-1" href="#">1</a>
                        <a href="javascript:void(0)" data-id1="2" data-id2="<?php echo $value['msg_id']; ?>" class="star-2" href="#">2</a>
                        <a href="javascript:void(0)" data-id1="3" data-id2="<?php echo $value['msg_id']; ?>" class="star-3" href="#">3</a>
                        <a href="javascript:void(0)" data-id1="4" data-id2="<?php echo $value['msg_id']; ?>" class="star-4" href="#">4</a>
                        <a href="javascript:void(0)" data-id1="5" data-id2="<?php echo $value['msg_id']; ?>" class="star-5" href="#">5</a>
                      </span>
                    </p>
                    <button type="submit" class="btn btn-primary submit_rate_service">Submit</button>
                </div>
            </div>
            
        </div>
    </form>
    
    <?php }}} ?>
    
    <?php 
        if($value['is_freelancer_rated']=="Yes" && $value['is_buyer_rated']=="Yes"){
            
            //$feedback = $this->db->query("select service_rating.*,services.* from service_rating inner join users on users.u_id=who_rated where msg_id='".$value['msg_id']."' and is_reply='No'")->result_array();
            $feedback = $this->db->query("select service_rating.*,users.* from service_rating inner join users on users.u_id=who_rated where msg_id='".$value['msg_id']."' and is_reply='No'")->result_array();
            foreach($feedback as $key=>$feedbackvalue){
                
                //var_dump($feedbackvalue['user_status']);
    ?>
    <div class="feedback_warp">
        <?php if($feedbackvalue['user_status']=="User"){
            $userstats = $this->db->query("select * from users where u_id='".$feedbackvalue['u_id']."'")->result_array()[0];
            $userstats = $userstats['f_name']."'s";
                 //$userstats="Freelancer";
            }else{
                $userstats = $this->db->query("select * from users where u_id='".$feedbackvalue['u_id']."'")->result_array()[0];
                $userstats = $userstats['f_name']."'s";
             //$userstats="Buyer";
            }?>
        
        <h3><?php echo $userstats ?> Feedback</h3>
      
        <div class="send_feed_left">
          
            
            <div class="feedback_send bg-white">
                <ul class="d-flex">
                    <li><img src="<?php echo $feedbackvalue['dp'];?>" class="img-circle" /></li>
                    <li>
                        <p>
                            <?php echo $feedbackvalue['comment'];?>
                        </p>
                    </li>
                </ul>
                
            </div>
            <div class="send_rating">
                
                <?php if($feedbackvalue['stars']>0){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($feedbackvalue['stars']>1){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($feedbackvalue['stars']>2){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($feedbackvalue['stars']>3){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($feedbackvalue['stars']>4){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                
            </div>
        </div>
        
        <?php 
            $rating_reply = $this->db->query("select service_rating.*,users.* from service_rating inner join users on users.u_id=who_rated where reply_of='".$feedbackvalue['rating_id']."'")->result_array();
            if(!empty($rating_reply)){
            foreach($rating_reply as $key=>$rating_rep){
               
        ?>
        <div class="send_feed_right">
             
             
            <div class="feedback_send bg-white">
                <ul class="d-flex">
                    <li><img src="<?php echo $rating_rep['dp'];?>" class="img-circle" /></li>
                    <li>
                        <p>
                            <?php echo $rating_rep['comment'];?>
                        </p>
                    </li>
                </ul>
                
            </div>
            <div class="send_rating">
                <?php if($rating_rep['stars']>0){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($rating_rep['stars']>1){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($rating_rep['stars']>2){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($rating_rep['stars']>3){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
                
                <?php if($rating_rep['stars']>4){?>
                <i class="glyphicon glyphicon-star"></i>
                <?php }else{ ?>
                <i class="glyphicon glyphicon-star-empty"></i>
                <?php } ?>
            </div>
        </div>
        <?php }}else{
        
        if($myuser['u_id'] != $feedbackvalue['u_id']){
        ?>
        
        <form class="send_feed_right send_content" action="<?php echo SURL.'ChatServices/replyrating';?>" method="post">
            <div class="feedback_send bg-white">
                
                <input type="hidden" name="rating" value="" id="rating_id_<?php echo $value['msg_id']; ?>"/>
                <input type="hidden" name="jobid" value="<?php echo $value['service_id']; ?>"/>
                <input type="hidden" name="u_id" value="<?php echo $otherparyr['u_id']; ?>"/>
                <input type="hidden" name="msg_id" value="<?php echo $value['msg_id']; ?>"/>
                <input type="hidden" name="reply_of" value="<?php echo $feedbackvalue['rating_id']; ?>"/>
                <input type="hidden" id="service_p_id" value="<?php echo $service_detail['id'];?>" name="service_p_id"/>
                
                <ul class="d-flex">
                    <li><img src="<?php echo $myuser['dp'];?>" class="img-circle" /></li>
                    <li style="width:100%">
                        <textarea  style="resize: none; width:100%;padding: 5px;border: none;background: #f9f9f9;" name='send_feed' placeholder="Write reply here" required></textarea>
                    </li>
                </ul>
                
            </div>
            <div class="send_rating ratting_star" >
                <p class="stars">
                  <span>
                    <a href="javascript:void(0)" data-id1="1" data-id2="<?php echo $value['msg_id']; ?>" class="star-1" href="#">1</a>
                    <a href="javascript:void(0)" data-id1="2" data-id2="<?php echo $value['msg_id']; ?>" class="star-2" href="#">2</a>
                    <a href="javascript:void(0)" data-id1="3" data-id2="<?php echo $value['msg_id']; ?>" class="star-3" href="#">3</a>
                    <a href="javascript:void(0)" data-id1="4" data-id2="<?php echo $value['msg_id']; ?>" class="star-4" href="#">4</a>
                    <a href="javascript:void(0)" data-id1="5" data-id2="<?php echo $value['msg_id']; ?>" class="star-5" href="#">5</a>
                  </span>
                </p>
                <button type="submit" class="btn submit_rate_service_reply">Submit</button>
            </div>
        </form>
        
        <?php }} ?>
    </div>
    <?php
        }}
    ?>
    
    
    <?php
    
    
    if($service_detail['who_purchased']==$myuser['u_id'] && $value['custom_status_extent']=="5"){?>
    
    
    <?php if($value['tip_amt']=="0"){?>
        <!--<div class="container-fluid main_con">-->
        <!--    <div class="row" id="tipaskwrpr_<?php echo $value['msg_id'];?>">-->
                
        <!--         <div class="feedback_warp">-->
        <!--             <div class="col-sm-12">-->
        <!--                 <h2 style="text-align:center">Do you want to give tip</h2>-->
        <!--             </div>-->
        <!--             <div class="col-sm-12">-->
        <!--               <ul class="d-flex" style="text-align:center">-->
        <!--                <button class="btn btn-primary btn1 yestip" data-id1="<?php echo $value['msg_id'];?>">Yes</button>-->
        <!--                <button class="btn btn-primary btn1 notip"  data-id1="<?php echo $value['msg_id'];?>">No</button>-->
        <!--                 </ul>-->
        <!--             </div>-->
        <!--        </div>-->
        <!--    </div>-->
            
        <!--    <form action="<?php echo SURL.'ChatServices/givetip'?>" method="post" class="row tip_Wrpr" id="choosetipamt_<?php echo $value['msg_id'];?>">-->
                
        <!--        <div class="feedback_warp">-->
        <!--             <div class="col-sm-12">-->
        <!--                 <h2 style="text-align:center">Choose Tip amount</h2>-->
        <!--             </div>-->
        <!--             <div class="col-sm-12">-->
        <!--                <input type="hidden" value="<?php echo $value['msg_id'];?>" name="msg_id"/> -->
        <!--                <input type="hidden" value="<?php echo $otherparyr['u_id'];?>" name="u_id"/> -->
        <!--                <input type="hidden" value="<?php echo $otherparyr['username'];?>" name="username"/>-->
        <!--                <input type="hidden" value="<?php echo $service_detail['service_slug'];?>" name="job_slug"/>-->
                        
        <!--                <ul class="d-flex" style="text-align:center;display:inline;list-style-type: none;">-->
        <!--                    <li>-->
        <!--                        <select class="form-control" name="money" style="width:50%;float:left;">-->
        <!--                            <option value="0">choose</option>-->
        <!--                            <option value="5">$5</option>-->
        <!--                            <option value="10">$10</option>-->
        <!--                            <option value="15">$15</option>-->
        <!--                            <option value="20">$20</option>-->
        <!--                        </select>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <button type="submit" class="btn btn-primary btn2">Send</button>-->
        <!--                    </li>-->
        <!--                </ul>-->
                  
        <!--             </div>-->
        <!--        </div>-->
        <!--    </form>-->
        <!--</div>-->
    
    <?php 
        
    }}
    
    
        if($value['tip_amt']>"0"){
        
        $tippartygiven = $this->db->query("select * from users where u_id='".$value['recv_id']."'")->result_array()[0];
        $tiprecvingparty = $this->db->query("select * from users where u_id='".$value['send_id']."'")->result_array()[0];
        
        ?>
        <!---------------------------------------second conatiner-------------------->
        <div class="container-fluid main_con">
            <div class="row">
                <?php if($value['send_id']!=$myuser['u_id']){?>
                <!--<div class="col-sm-12" style="padding:23px;padding-bottom:0px">-->
                <!--    <h4>$<?php echo $value['tip_amt'];?> Tip has been given to <?php echo ucwords($tiprecvingparty['f_name']." ".$tiprecvingparty['l_name']);?></h4>-->
                <!--</div>-->
                <?php } ?>
                
                <div class="feedback_warp2">
                    <div class="col-sm-12">
                      <img class="logo1" src="<?php echo base_url(); ?>uploads/Untitled-2.png" alt="">
                    </div>
                    <div class="col-sm-12 invoice_data">
                        <p>
                            <?php 
                                if($value['send_id']==$myuser['u_id']){
                                   
                                    
                                    if($job_detail['u_id']==$myuser['u_id']){
                                        echo ucwords($tippartygiven['f_name']." ".$tippartygiven['l_name']);
                                        echo " has given the tip of £".$value['tip_amt'];
                                    }else{
                                         
                                        echo "Congratulations! You received ".$value['tip_amt']." tip  from ".ucwords($tippartygiven['f_name']." ".$tippartygiven['l_name']).". Keep up with the Good work!";
                                        
                                    }
                                    echo "";
                                    
                                }else{
                                    $deducation_percentage = 100 - ($this->db->query("select * from general where id='9'")->result_array()[0]['price']);
	                                echo  "You have given the tip of £".$value['tip_amt']/$deducation_percentage*100;
                                }
                            ?>    
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <?php } ?>
    
    </div>
</div>


<style>
      .feedback_warp{
        background: #f7fbfc;
        margin-left: 20px;
        width: 90%;
      padding: 39px;
        border-radius: 20px;
        margin-top: 38px;
    
    }
    
    .btn1{
        padding-left: 35px;
        padding-right: 35px;
        border-radius: 26px
        ;background:#5bc0de;
        border:none
        
    }
    
     .btn2{
       padding-left: 35px;
       padding-right: 35px;
       background:#5bc0de;
       border:none
        
    }
    
    .main_con{
        border-radius: 20px;
        padding:0px;
        margin-top: 27px;
        margin-bottom: 27px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 3px #ccc;
        width: 94%;
    }
    
      .feedback_warp2{
        background: #daedf3;
        margin-left: 20px;
        width: 90%;
      padding: 11px;
        border-radius: 20px;
        margin-top: 38px;
        margin-bottom: 20px;
    
    }
    </style>