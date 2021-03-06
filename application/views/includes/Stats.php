<?php //include("includes/front_end_header.php");?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<style>
    .profile_chat1 {
    background: #fff;
    box-shadow: 0 0 10px -6px grey;
    border-radius: 20px;
    padding-top: 13px;
    margin-top: 15px;
}

   .right_div1 {
  color:white;
  background-color: #5bc0de;
  border: 1px solid;
  border-radius: 13px;
  padding: 9px;
  text-align:center;
  width: 103px;
}
      
 .right_div2 {
  color:white;
  background-color: #5bc0de;
  border: 1px solid;
  border-radius: 13px;
  padding: 9px;
  text-align:center;
  margin-left: 14px;
  width: 103px;
}

.date_div
{
    text-align:right;
    margin-top: -6px;
}

@media screen and (max-width: 990px) {
.margin_main{
    margin-top: 143px;
}
}

@media screen and (max-width: 756px) {
.margin_main{
    margin-top: 4px;
}
}



@media screen and (max-width: 1202px) {

.right_div2
{
    margin-left:0px
}
}

@media screen and (max-width: 1118px) {

.right_div1
{
    margin-left:0px
}
}


@media screen and (max-width: 984px) {

.right_div1
{
     width: 33.33333333%;
}

.right_div2
{
   width: 33.33333333%;
}
}


@media screen and (max-width: 396px) and (min-width:340px){
#user_name{
          margin-left: 7px;
       }
       
       
    
}


@media screen and (max-width: 512px) and (min-width:340px){
.proposal_icon
{
padding: 0px;
}


.proposal_icon2
{
padding: 0px;
}
 
 .date_div
 {
     padding:0px;
 }
       
    
}

.total_bubget
{
   padding: 22px;padding-bottom: 13px;
    
}


.total_bubget2
{
    padding: 22px;padding-top: 0px;
    
}




@media screen and (max-width: 764px) and (min-width:340px){
   
.total_bubget
{
  padding-left:0px;
    
}

.total_bubget2
{
    
  padding-left:0px;
}

}

.activtycol{
    
    width:100%;
    float:left;
}


@media screen and (max-width: 764px) and (min-width:340px){
.percentwork{
    padding: 2px !important;
}

}

              
</style>

  <div class="margin_main col-md-12 col-sm-12 col-xs-12" style="overflow: auto;">
            <div class="profile_chat1" >
                <div class="row"  style="padding-bottom: 6px;">
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img src="<?php echo $otherparyr['dp'];?>" class="img-circle" style="width:50px;height:50px" />
                    </div>
                    <div class="col-md-6 col-sm-4 col-xs-6">
                       <h4 style="color:#5bc0de" id="user_name"><strong><a href="<?php echo SURL."TimeLine/".$otherparyr['username'];?>"><?php echo ucwords($otherparyr['f_name']." ".$otherparyr['l_name']);?></a></strong></h4>
                       <span style="font-size: 11px;"><i class="fa fa-map-marker" aria-hidden="true" style="color:red"></i></span>
                         <span style="font-size: 11px;"><?php echo $otherparyr['location'];?></span>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-4 percentwork" style="text-align:right;padding:0;">
                        <h6><strong>
                            <?php 
                                $user_rating = $this->Common->rating_user($otherparyr['u_id']); 
                                echo $user_rating['totalrating']; 
                            ?>% (<?php echo $user_rating['votes'];?>)</strong></h6>
                    </div>
                </div>
                <hr/>
                <div class="row" style="margin-top:12px;margin-bottom:12px;margin-left:12px">
                    <div class="col-md-3 col-sm-4 col-xs-4 right_div1">
                       <h5 style="color:white">Project Worth</h5>
                        <p>??<?php echo $job_detail['budget'];?></p>
                    </div>
                    <?php if($job_detail['job_awarded_to'] > 0){?>
                    <div class="col-md-3 col-sm-4 col-xs-4 right_div2">
                         <h5 style="color:white">Escrow Funds</h5>
                         
                        <p>??<?php echo $escrowamt = floatval($this->Common->job_escrow_amt($job_detail['job_id'],date("Y-m-d"))); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-4 right_div2 ">
                         <h5 style="color:white">Released</h5>
                        <p>??<?php 
                                
                                echo number_format($this->Common->amt_released_job($job_detail['job_id'],$job_detail['job_awarded_to'])); 
                                
                                
                            ?></p>
                    </div>
                    <?php } ?>
                </div>
                
                <?php if($job_detail['pt_assurance'] != "" && $job_detail['percentage_deduction'] != ""  && $job_detail['job_awarded_to'] > 0){ ?>
                
                    <div class="row total_bubget">
                        <div class="col-xs-7 col-lg-6">
                            Total Budget
                        </div>
                        <div class="col-xs-5 col-lg-6">
                            ??<?php echo $job_detail['budget'];?>
                        </div>
                    </div>
                    
                    <div class="row total_bubget">
                        <div class="col-xs-7 col-lg-6">
                            PTA Days
                        </div>
                        <div class="col-xs-5 col-lg-6">
                            <?php echo $job_detail['pt_assurance']." Day "; ?>
                        </div>
                    </div>
                    
                    <div class="row total_bubget2" style="padding-bottom:0px">
                        <div class="col-xs-7 col-lg-6" style='color:red'>
                            No of days delay
                        </div>
                        <div class="col-xs-5 col-lg-6">
                            <?php 
                                if($expiry_time==""){
                                    
                                    echo $days_delay_format = ceil($days_delay/86400);
                                }else{
                                    echo 0;
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="row total_bubget2">
                        <div class="col-xs-7 col-lg-6">
                            Grace Time
                        </div>
                        <div class="col-xs-5 col-lg-6">
                            <?php echo ($job_detail['no_of_penalty_day'] == "" ) ? "0 Day" : $job_detail['no_of_penalty_day']." Day" ; ?>
                        </div>
                    </div>
                    
                    <div class="row total_bubget2">
                        <div class="col-xs-7 col-lg-6">
                            Deduction Percentage % 
                        </div>
                        <div class="col-xs-5 col-lg-6">
                            <?php echo $job_detail['percentage_deduction']." % "; ?>
                        </div>
                    </div>
                    
                    <div class="row total_bubget">
                        <div class="col-xs-7 col-lg-6">
                           Bugdet Deduction
                        </div>
                        <div class="col-xs-5 col-lg-6" style='color:red'>
                            <?php 
                                if($expiry_time==""){
                                    $percentage_Deduction_amt = ($job_detail['budget']*($job_detail['percentage_deduction']*$days_delay_format)/100);
                                    echo "$".($job_detail['budget']-$percentage_Deduction_amt);
                                }else{
                                    echo 0;
                                }
                            ?>
                        </div>
                    </div>
                
                
                <?php } ?>
                
                
                
               <!-- <div class="row" style="margin-top:12px;border:1px">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:0px !important;padding:8px;text-align:center;padding-left:0px;padding-right:0px;">
                       <h4 style="padding: 6px;border-radius: 9px;  border: 1px solid #ccc;box-shadow: 2px 2px 3px #ccc;"><strong>Transaction Activity</strong></h4>
                </div>
                
            </div>
<?php 
$activity = $this->db->query("select * from jobs_msgs where job_id='".$job_detail['job_id']."' and custom_status in('Proposal','Invoice','Time-Extension','Deposit') and custom_status_extent not in('0','4','8')")->result_array();
//echo "<pre>";var_dump($activity);
?>            
             <div class="row" style="margin-top:0px; overflow: auto;padding-top: 14px;padding: 4px;">
                <?php 
                    if(!empty($activity)){
                        foreach($activity as $key=>$avalue){
                ?> 
                            <div class="col-sm-12 activtycol">
                    <?php 
                        if($avalue['custom_status_extent']=="2" || $avalue['custom_status_extent']=="3" || $avalue['custom_status_extent']=="6" || $avalue['custom_status_extent']=="7" || $avalue['custom_status_extent']=="18" || $avalue['custom_status_extent']=="19"|| $avalue['custom_status_extent']=="9"|| $avalue['custom_status_extent']=="10"){
                            
                    ?>
                    <div class="col-md-1 col-sm-2 col-xs-1 proposal_icon">
                       <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
                    </div>
                    <?php }else if($avalue['custom_status_extent']=="1" || $avalue['custom_status_extent']=="5" || $avalue['custom_status_extent']=="17"|| $avalue['custom_status_extent']=="11"){ ?>
                    <div class="col-md-1 col-sm-2 col-xs-1 proposal_icon">
                       <i class="fa fa-check" aria-hidden="true" style="color:green"></i>
                    </div>
                    <?php } ?>
                    <div class="col-md-5 col-sm-6 col-xs-5 proposal_icon2" style="margin-top: -6px;">
                        <h6>
                            <?php 
                            if($avalue['custom_status']=="Proposal"){
                                if($avalue['custom_status_extent']=="1"){
                                    echo "Proposal Accepted";
                                }else if($avalue['custom_status_extent']=="2"){
                                    echo "Proposal Rejected";
                                }else if($avalue['custom_status_extent']=="3"){
                                    echo "Proposal Cancelled";
                                }
                            }else if($avalue['custom_status']=="Invoice"){
                                
                                if($avalue['custom_status_extent']=="5"){
                                    echo "Invoice Accepted";
                                }else if($avalue['custom_status_extent']=="6"){
                                    echo "Invoice Rejected";
                                }else if($avalue['custom_status_extent']=="7"){
                                    echo "Invoice Cancelled";
                                }
                                
                                if($avalue['tip_amt'] != 0){
                                    echo " Tipped ";
                                }
                                
                            }else if($avalue['custom_status']=="Time-Extension"){
                                
                                if($avalue['custom_status_extent']=="17"){
                                    echo "Time Extension request accepted";
                                }else if($avalue['custom_status_extent']=="18"){
                                    echo "Time Extension request rejected";
                                }else if($avalue['custom_status_extent']=="19"){
                                    echo "Time Extension request Cancelled";
                                }
                                
                            }else if($avalue['custom_status']=="Deposit"){
                                
                                if($avalue['custom_status_extent']=="9"){
                                    echo "Deposit request rejected";
                                }else if($avalue['custom_status_extent']=="10"){
                                    echo "Deposit request cancelled";
                                }else if($avalue['custom_status_extent']=="11"){
                                    echo "Deposit request accepted";
                                }
                                
                            }
                            ?>
                            
                        </h6>
                    </div>
                    
                    <?php if($avalue['custom_status_extent']!="16"){ ?>
                    <div class="col-md-5 col-sm-4 col-xs-6 date_div">
                        <h6>
                            <?php
                        
                         echo $this->Common->gettimeinmyzone($avalue['date']);
                        
                        ?></h6>
                    </div>
                    <?php } ?>
                </div>
                <?php   }
                    }else{    
                ?>
                <p class="text-center">No Activity found.</p>
                <?php } ?>
                
                
                
           </div>-->
        </div>
        
       
    </div>
<?php include("includes/front_end_footer.php");?>