<div class="row wrpr_singl_msg" id="msg_wapr_<?php echo $value['msg_id'];?>" data-id1="<?php echo $value['msg_id'];?>">
<div class="proposal_invoice bg-white" data-id1="<?php echo $value['msg_id'];?>"> 
        <div class="row">
            <div class="col-xs-12 propmain_heading">
                <p><b><?php 
                        echo $this->Common->gettimeinmyzone($avalue['date']);
                    ?></b></p>
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
                <span class="first_row" style="padding-left: 10px;color: #373e4a!important;">£<?php echo number_format($value['refund_amt'],2); ?></span>
            </div>
        </div>
        <div class="row proposa_back">
            <div class="col-md-10 col-xs-12 amountmain_align">
                <div class="row">
                    <div class="col-xs-8" style="padding:10px;">
                    <div class="row" style="border-bottom: 1px solid #aba5a5;padding-top: 10px;">
                    <div class="col-xs-7 prop_align">
                        <p>Refund Amount</p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <p>£<?php echo number_format($value['refund_amt'],2); ?></p>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-7 prop_align">
                        <p>Refund</p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <p>£<?php echo number_format($value['refund_amt'],2); ?></p>
                    </div>
                </div>
                </div>
                <div class="col-xs-4  proposal_amount">
                    <p>Refund Amount</p>
                    <h2  style="color: #373e4a!important;">£<?php echo number_format($value['refund_amt'],2); ?><span>.00</span></h2>
                </div>
                </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="button_action" id="wrpr_pro_section_<?php echo $value['msg_id'];?>">
                   
                    <?php 
                        if($value['custom_status_extent']=="12"){
                            if($value['send_id']==$myuser['u_id']){
                    ?>
                                <button type="button" class="btn btn_inovce cancelrefundservice" data-value="<?php echo $value['msg_id']; ?>">Cancel</button>
                            <?php }else{?>
                            <div>
                                <button type="button" class="btn btn_inovce acceptrefundservice" style="background:#007d3d;color:white;" data-value="<?php echo $value['msg_id']; ?>">Accept</button>
                                <button type="button" class="btn btn_inovce reject_refundservice btn-danger" data-value="<?php echo $value['msg_id']; ?>">Reject</button>
                            </div>
                            <?php } ?>
                    
                    
                    <?php 
                        }else if($value['custom_status_extent']=="13"){ ?>
                            <div class='accept_button btn btn-success'>Accepted</div>
                    
                    <?php 
                        }else if($value['custom_status_extent']=="14"){ ?>
                            <div class='reject_button btn btn-danger'>Rejected</div>
                    <?php }else if($value['custom_status_extent']=="15"){ ?>
                            <div class='btn btn-danger' style="padding: 15px 10px 15px 10px;border: 1px solid #ccc;">Cancelled</div>
                    <?php } ?>
                </div>
            </div>
        </div>
</div>

<?php 
    $buyername = $this->db->query("select users.*,users.u_id as buyerid from users where u_id='".$value['recv_id']."'")->result_array()[0];
    
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
                <h4><?php echo ucwords($buyername['f_name']." ".$buyername['l_name']);?> has refunded £<?php echo number_format($value['refund_amt'],2); ?>.</h4>
            </div>
        </div>
    </div>
</div>
<?php }else if($value['custom_status_extent']=="14"){ 
    
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
                    <h4>Dispute has been araised on this refund request.</h4>
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
    
if($buyername['buyerid']!=$myuser['u_id']){
?>

<!-- Proposal Reject  -->
<div class="reject_wpar">
    <div class="row">
        <div class="col-md-1" >
            <span><i class="glyphicon glyphicon-remove" ></i></span>
        </div>
        <div class="col-sm-10" style="border-left: 3px solid #cc2424;margin-left: 12px;">
            <div class="accept_cont">
                <h4>Your Refund request has been rejected, send another or raise a dispute by <a class="dispute_link" data-href="Disputespage/services/<?php echo $service_detail['id'].'/'.$value['msg_id'];?>" href="<?php echo SURL.'Disputespage/services/'.$value['service_p_id'].'/'.$value['msg_id'];?>">clicking me</a>.</h4>
            </div>
        </div>
    </div>
</div>

<?php }}} ?>

</div>