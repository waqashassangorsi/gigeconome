
<div class="row wrpr_singl_msg" id="msg_wapr_<?php echo $value['msg_id'];?>" data-id1="<?php echo $value['msg_id'];?>">
<div class="proposal_invoice bg-white" data-id1="<?php echo $value['msg_id'];?>"> 
        <div class="row">
            <div class="col-xs-12 propmain_heading">
			<h2 style="font-size:17px">
			    
                    <?php 
                     
                        if($value['custom_status_extent']=="17"){ $heading="Congratulations, Time Extension request has been accepted!" ;
                        $days += $value['extension_days']; ?>
                        
                    <?php 
                        }else if($value['custom_status_extent']=="18"){ $heading="Time Extension request has been rejected!" ?>
                        
                    <?php }else if($value['custom_status_extent']=="19"){ $heading="Time Extension request has been cancelled!"  ?>
                    
                    <?php }else { $heading="Time Extension Request Initiated"; } ?>
                    
			   <?php echo $heading; ?>
			</h2>
                <p><b><?php
                         $tz = $this->session->userdata('timezone');
                         $dt_obj = new DateTime($value['date'] ,new DateTimeZone('UTC'));
                         $dt_obj->setTimezone(new DateTimeZone($tz));
                         
        echo date_format($dt_obj, 'd M Y, h:i a')." -- ";
        //echo $this->check->timeAgo(strtotime(date_format($dt_obj, 'Y-m-d H:i:s')));?></b></p> 
                <p style="color: #373e4a"><?php echo $value['content']; ?></p>
            </div>
        </div>
              
          
          
          
          <div class="invoicee_detailse_wapr">
    	<table class="table table-bordered invoicee_detailse">
    		<thead>
    			<tr>
    				<th>Reason</th>
    				<th>Days</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		
    		<tbody>
    			
    			<tr>
    				<td>
    				   <span class="first_row"  style="color: #373e4a!important;"><?php echo $value['time_extension_rsn']; ?></span>
    				</td>
    				<td>
    				       <span class="first_row" style="padding-left: 10px;color: #373e4a!important;"><?php echo $value['extension_days']; ?></span>
    				</td>
    				<td>
    				     <div class="button_action" id="wrpr_pro_section_<?php echo $value['msg_id'];?>">
                   
                    <?php 
                        if($value['custom_status_extent']=="16"){
                            if($value['send_id']==$myuser['u_id']){
                    ?>
                                <button type="button" class="btn btn_inovce cancel_time_service" data-value="<?php echo $value['msg_id']; ?>">Cancel Request</button>
                            <?php }else{?>
                            <div>
                                <button type="button" class="btn btn_inovce accepttime_service" style="background:#007d3d;color:white;" data-value="<?php echo $value['msg_id']; ?>">Accept</button>
                                <button type="button" class="btn btn_inovce reject_time_Service btn-danger" data-value="<?php echo $value['msg_id']; ?>">Reject</button>
                            </div>
                            <?php } ?>
                    
                    
                    <?php 
                        }else if($value['custom_status_extent']=="17"){ $heading="Congratulations, Time Extension request has been accepted!" ?>
                            <div class='accept_button btn btn-success'>Accepted</div>
                    
                    <?php 
                        }else if($value['custom_status_extent']=="18"){ $heading="Congratulations, Time Extension request has been rejected!" ?>
                            <div class='reject_button btn btn-danger'>Rejected</div>
                    <?php }else if($value['custom_status_extent']=="19"){ $heading="Congratulations, Time Extension request has been cancelled!"  ?>
                            <div class='btn btn-danger' style="padding: 15px 10px 15px 10px;border: 1px solid #ccc;">Cancelled</div>
                    <?php } ?>
                </div>
    				    
    				</td>
    		</tr>
    			
    			
    		</tbody>
    	</table>
	</div>    
            

</div>

<?php 
    $buyername = $this->db->query("select users.*,jobs_msgs.*,jobs.job_awarded_to as buyerid from jobs_msgs inner join jobs on jobs_msgs.job_id=jobs.job_id inner join users on jobs.u_id=users.u_id where jobs_msgs.job_id='".$value['job_id']."'")->result_array()[0];
    
    if($value['custom_status_extent']=="13"){
        
?>
<!-- Proposal Accept  -->
<div class="accept_wpar">
    <div class="row">
        <div class="col-md-1" >
            <span><i class="glyphicon glyphicon-ok" ></i></span>
        </div>
        <div class="col-sm-10" style="border-left: 3px solid #007d3d;margin-left: 12px;">
            <div class="accept_cont">
                <h4><?php echo date("d M Y",strtotime($value['date']));?></h4>
                <h4><?php echo ucwords($buyername['f_name']." ".$buyername['l_name']);?> has refunded $<?php echo $value['refund_amt'];?>.</h4>
            </div>
        </div>
    </div>
</div>
<?php }else if($value['custom_status_extent']=="14" && $buyername['buyerid']!=$myuser['u_id']){ 

?>

<!-- Proposal Reject  -->
<div class="reject_wpar">
    <div class="row">
        <div class="col-md-1" >
            <span><i class="glyphicon glyphicon-remove" ></i></span>
        </div>
        <div class="col-sm-10" style="border-left: 3px solid #cc2424;margin-left: 12px;">
            <div class="accept_cont">
                <h4><?php echo date("d M Y",strtotime($value['date']));?></h4>
                <h4>Your Refund has been rejected, send another.</h4>
            </div>
        </div>
    </div>
</div>

<?php } ?>

</div>