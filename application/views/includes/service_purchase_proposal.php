<div class="row wrpr_singl_msg" id="msg_wapr_<?php echo $service_detail['id'];?>" data-id1="<?php echo $value['msg_id'];?>">
<div class="proposal_invoice bg-white wrpr_singl_msg" data-id1="<?php echo $value['msg_id'];?>"> 
        <div class="row">
            <div class="col-xs-12 propmain_heading">
                <p><b>
                    <?php 
                        echo $date_accept = $this->Common->gettimeinmyzone($service_detail['date']);
                    ?></b></p>
                <h4>Service -- <?php echo $service_detail['content']?></h4> 
                <!--<p style="color: #373e4a"><?php echo $value['content']; ?></p>-->
            </div>
        </div>
        
        <?php 
            if($service_detail['adons'] != "" ){ 
                $services_adons = explode("-",$service_detail['adons']);
                //echo "<pre>";var_dump($services_adons);
        ?>
        <div class="row propinvoice_heading">
            <div class="col-xs-6">
                <h6>ITEM</h6>
            </div>
            <div class="col-xs-6 text-center">
                <h6>AMOUNT</h6>
            </div>
        </div>
        <?php 
            foreach($services_adons as $key=>$adonsvalue){
                $service_adons = $this->db->query("select * from services_adons where adonid='$adonsvalue'")->result_array()[0];
                //var_dump($service_adons);
        ?>
        <div class="row propinvoice_body">
            <div class="col-xs-6 first_rows">
                <span class="first_row"  style="color: #373e4a!important;">
                    <?php echo $service_adons['title'];?>
                </span>
            </div>
            <div class="col-xs-6 text-center ">
                <span class="first_row" style="padding-left: 10px;color: #373e4a!important;">£<?php echo $service_adons['amount']; ?></span>
            </div>
        </div>
        <?php }} ?>
        <div class="row proposa_back">
            <div class="col-md-10 col-xs-12 amountmain_align">
                <div class="row">
                    <div class="col-xs-8" style="padding:10px;">
                    <div class="row" style="border-bottom: 1px solid #aba5a5;padding-top: 10px;">
                    <div class="col-xs-7 prop_align">
                        <p>Purchase Amount</p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <p>£ <?php echo $service_detail['purchase_amount']; ?></p>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-7 prop_align">
                        <p>Deposit</p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <p>£<?php echo $escrowamt; ?></p>
                    </div>
                </div>
                </div>
                </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="button_action" id="wrpr_pro_section_<?php echo $value['msg_id'];?>">
                   
                    <?php 
                        if($value['custom_status_extent']=="0"){
                            if($value['send_id']==$myuser['u_id']){
                    ?>
                                <button type="button" class="btn btn_inovce cancelproposal" data-value="<?php echo $value['msg_id']; ?>">Cancel</button>
                            <?php }else{?>
                            <div>
                                <button type="button" class="btn btn_inovce acceptproposal" style="background:#007d3d;color:white;" data-value="<?php echo $value['msg_id']; ?>">Accept</button>
                                <button type="button" class="btn btn_inovce reject_proposal btn-danger" data-value="<?php echo $value['msg_id']; ?>">Reject</button>
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
                <h4><?php echo date("d M Y H:i:s",strtotime($value['date']));?></h4>
                <h4><?php echo ucwords($buyername['f_name']." ".$buyername['l_name']);?> has deposited £<?php echo $value['proposal_deposit'];?> in the site's Escrow Account so you can get cracking.</h4>
            </div>
        </div>
    </div>
</div>
<?php }else if($value['custom_status_extent']=="2" && $buyername['buyerid']!=$myuser['u_id']){ 

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
                <h4>Your proposal has been rejected, send another.</h4>
            </div>
        </div>
    </div>
</div>

<?php } ?>

</div>