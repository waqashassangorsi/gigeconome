<div class="row wrpr_singl_msg" id="msg_wapr_<?php echo $value['msg_id'];?>" data-id1="<?php echo $value['msg_id'];?>">
<div class="proposal_invoice bg-white" data-id1="<?php echo $value['msg_id'];?>"> 
        <div class="row">
            <div class="col-xs-12 propmain_heading">
                <p><b>
                    
                    <?php 
                        echo $formatted_date_long = date("h:i: a, d M Y",strtotime($this->Common->gettimeinmyzone($value['date'])));
                    ?>
                    </b></p>
                <p style="color: #373e4a"><?php echo $value['content']; ?></p>
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
                <span class="first_row"  style="color: #373e4a!important;"><?php echo $value['proposal_description']; ?></span>
            </div>
            <div class="col-xs-6 text-center ">
                <span class="first_row" style="padding-left: 10px;color: #373e4a!important;">£<?php echo $value['deposit_amt']; ?></span>
            </div>
        </div>
        <div class="row proposa_back">
            <div class="col-md-10 col-xs-12 amountmain_align">
                <div class="row">
                    <div class="col-xs-8" style="padding:10px;">
                    <div class="row" style="border-bottom: 1px solid #aba5a5;padding-top: 10px;">
                    <div class="col-xs-7 prop_align">
                        <p>Deposit Amount</p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <p>£<?php echo $value['deposit_amt']; ?></p>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-7 prop_align">
                        <p>Deposit</p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <p>£<?php echo $value['deposit_amt']; ?></p>
                    </div>
                </div>
                </div>
                <div class="col-xs-4  proposal_amount">
                    <p>Deposit Amount</p>
                    <h2  style="color: #373e4a!important;">£<?php echo $value['deposit_amt']; ?><span>.00</span></h2>
                </div>
                </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="button_action" id="wrpr_pro_section_<?php echo $value['msg_id'];?>">
                    
                    <?php 
                        if($value['custom_status_extent']=="8"){
                            if($value['send_id']==$myuser['u_id']){
                    ?>
                                <button type="button" class="btn btn_inovce canceldeposit" data-value="<?php echo $value['msg_id']; ?>">Cancel</button>
                            <?php }else{?>
                            <div>
                                <button type="button" class="btn btn_inovce acceptdeposit" style="background:#007d3d;color:white;" data-value="<?php echo $value['msg_id']; ?>">Accept</button>
                                <button type="button" class="btn btn_inovce reject_deposit btn-danger" data-value="<?php echo $value['msg_id']; ?>">Reject</button>
                            </div>
                                
                            <?php } ?>
                    
                    
                    <?php 
                        }else if($value['custom_status_extent']=="11"){ ?>
                            <div class='accept_button btn btn-success'>Accepted</div>
                    
                    <?php 
                        }else if($value['custom_status_extent']=="9"){ ?>
                            <div class='reject_button btn btn-danger'>Rejected</div>
                    <?php }else if($value['custom_status_extent']=="10"){ ?>
                            <div class='btn btn-danger' style="padding: 15px 10px 15px 10px;border: 1px solid #ccc;">Cancelled</div>
                    <?php } ?>
                </div>
            </div>
        </div>
</div>

<?php 
    $buyername = $this->db->query("select users.*,jobs_msgs.*,jobs.u_id as buyerid from jobs_msgs inner join jobs on jobs_msgs.job_id=jobs.job_id inner join users on jobs.u_id=users.u_id where jobs_msgs.job_id='".$value['job_id']."'")->result_array()[0];
    
    if($value['custom_status_extent']=="11" && $buyername['buyerid']!=$myuser['u_id']){
        
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
                <h4><?php echo ucwords($buyername['f_name']." ".$buyername['l_name']);?> has deposited £<?php echo $value['deposit_amt'];?> in your Escrow Account so you can get cracking.</h4>
            </div>
        </div>
    </div>
</div>
<?php }else if($value['custom_status_extent']=="9" && $buyername['buyerid']!=$myuser['u_id']){ 

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
                <h4>Your Deposit has been rejected, send another.</h4>
            </div>
        </div>
    </div>
</div>

<?php } ?>

</div>