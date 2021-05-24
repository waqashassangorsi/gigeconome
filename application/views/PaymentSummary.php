<?php require_once("includes/front_end_header.php"); ?>
<script src="https://js.stripe.com/v3/"></script>
<style type="text/css">

.checkbox{padding-left:0;}
.checkbox label{padding-left:0;padding-right:10px}
.checkbox span{margin-left:10px}
#card_number{background-image: url("<?php echo SURL."assets/images/Images.png";?>"), url("<?php echo SURL."assets/images/Images.png";?>");background-repeat: no-repeat;background-size: 120px 361px, 120px 361px;padding-left: 0px;background-position: 2px -121px, 260px -61px;}
#main_container{
padding: 69px;    
}
@media screen and (max-width: 764px) and (min-width:340px){
.chekc_box2{
           margin-top:13px;
           margin-left: 2px !important;
       }
 #main_container{
     padding: 13px;
 }    
}

</style>



<section class="dashboard section-padding" id="main_container">
          
    <div class="container" style="background: #fff;margin-top:40px;">
        <form class="row" method="post" action="<?php echo $url;?>" id="myform" style="padding:30px;" enctype="multipart/form-data">
            
            
            <div class="col-sm-8">
                
                <?php if($this->router->fetch_method()=="buyservice"){?>
                <div class="row" style="margin-bottom:50px;">
                    <div class="col-sm-2 col-xs-6">
                        <img style="width:80px;height:80px;" class="img-circle img-responsive" src="<?php echo SURL.$service_portfolio;?>"/>
                    </div>
                    <div class="col-sm-10 col-xs-6 WrprJobTitle">
                        <h4><?php echo $service_data['title']; ?></h4>
                    </div>
                </div>
                
                <?php 
                    if(!empty($service_adons)){
                        foreach($service_adons as $key=>$adonvalue){
                ?>
                <div class="row" style="margin-left:0;margin-bottom: 11px !important;">
                        
                    <div class="col-sm-2 col-md-1 chekc_box" style="padding-top:5px;padding-left:0;"> 
                        <input type="checkbox" value="<?php echo $adonvalue['adonid'];?>" name="adonspurchased[]" data-id1="<?php echo $adonvalue['amount'];?>" class="srviceadons">
                    </div>
                    <div class="col-xs-12 col-sm-7  chekc_box1" style="border: 1px solid #ccc;border-radius: 3px;   padding: 5px 10px 5px 7px;" >
                        <?php echo $adonvalue['title'];?>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-1 chekc_box2" style="border: 1px solid #ccc;border-radius: 3px;margin-left:5px;padding: 5px 10px 5px 7px;">
                        £<?php echo $adonvalue['amount'];?>
                    </div>
                </div>
                
                <?php }} ?>
                
                <h4>Details</h4>
                <div class="row">
                <textarea class="servicesbuydetails form-control" placeholder="write your detailed requirements" id="outertextarea" name="servicesbuydetails" required wrap="hard" cols="10"></textarea>
                 </div>
                
                <?php } ?>
                
                <h5><b>Payment Options</b></h5>
                <div class="checkbox">
                    <label><input type="radio" value="1" name="Paymentoption" checked class="Paymentoption"><span>Credit & Debit Cards</span></label>
                </div>

                <div class="row WrprCreditCard" id="WrprCreditCard">
                    <div class="col-sm-4 col-xs-12">
                        <h6>Card Number</h6>
                        <div id="card_number" class="field"></div>
                        
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <h6>Expiration Date</h6>
                        <div id="card_expiry" class="field"></div>
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <h6>Security Code</h6>
                        <div id="card_cvc" class="field"></div>
                    </div>
                </div>
                <div id="paymentResponse" style="color:red;margin-top:15px;"></div>
                <?php if($this->router->fetch_method()=="featureservice"){}else{?>
                <div class="row WrprCreditCard" style="margin-left:0;">
                    <label>
                        <input type="radio" value="2"  name="Paymentoption" class="Paymentoption">
                        <span><img src="<?php echo SURL."assets/images/paypal-logo.png";?>" style="width:70px;height:20px;"/></span>
                    </label>
                </div>    
                <?php } ?>
                
                <?php if($this->router->fetch_method()!="buyservice"){?>
                
                <div class="row WrprCreditCard" style="margin-left:0;">
                    <label>
                        <input type="radio" value="3"  name="Paymentoption" class="Paymentoption">
                        <span>Pay By Gigeconome Account (£<?php echo $mybalance;?>)</span>
                    </label>
                </div>
                <?php } ?>
                
            </div>
            <div class="col-sm-4 WrprPaymentSummary">
                <h5><b>Summary</b></h5>
                
                <hr>
                <?php if($this->router->fetch_method()=="acceptproposal"){?>
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Proposal Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $record['proposal_deposit'];?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $paymentfee = ($record['proposal_deposit']*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $record['proposal_deposit']+$paymentfee;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $record['msg_id'];?>" name="proposalno"/>
                        <b id="finalamt">£<?php echo $record['proposal_deposit']+$paymentfee;?></b>
                    </h6>
                </div>
                <?php }else if($this->router->fetch_method()=="acceptinvoice" || $this->router->fetch_method()=="acceptServiceinvoice"){ ?>
                
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Invoice Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $record['invc_amt'];?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fees</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $paymentfee = ($record['invc_amt']*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $record['invc_amt']+$paymentfee;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $record['msg_id'];?>" name="proposalno"/>
                        <b id="finalamt">£<?php echo $record['invc_amt']+$paymentfee;?></b>
                    </h6>
                </div>
                
                
                <?php }else if($this->router->fetch_method()=="featureproposal"){ ?>
                
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Feature Proposal Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $proposal_feature_price;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $paymentfee = ($proposal_feature_price*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $proposal_feature_price+$paymentfee;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="proposalno"/>
                        <b id="finalamt">£<?php echo $proposal_feature_price+$paymentfee;?></b>
                    </h6>
                </div>
                
                    
                <?php 
                    
                    }else if($this->router->fetch_method()=="jobadons"){ 
                        $adons = $this->db->query("select * from jobs_type where job_id='".$record['job_id']."' and is_paid='No'")->result_array();
                        if(empty($adons)){
                            redirect(SURL);
                        }else{
                ?>
                
                <div class="row">
                    <?php 
                        foreach($adons as $key=>$value){
                            $amt = $this->db->query("select * from general where name='".$value['type']."'")->result_array()[0]['price'];
                    ?>
                        
                        <h6 class="col-xs-7">
                            <b><?php echo $value['type'];?></b>
                        </h6>
                        <h6 class="col-xs-5 text-right">
                            <b id="finalamt">£<?php echo $amt;?></b>
                        </h6>
                    
                    <?php
                         $totalamt += $amt;
                        } 
                    ?>
                    
                    <h6 class="col-xs-7">
                            <b>Transaction fee</b>
                        </h6>
                        <h6 class="col-xs-5 text-right">
                            <b id="finalamt">£<?php echo $paymentfee = ($totalamt*5/100);?></b>
                        </h6>
                    
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $totalamt+$paymentfee;?>" name="total_money" />
                        <input type="hidden" value="<?php echo $record['job_id'];?>" name="job_id"/>
                        <b id="finalamt">£<?php echo $totalamt+$paymentfee;?></b>
                    </h6>
                </div>
                
                <?php }}else if($this->router->fetch_method()=="buyservice"){ ?>
                <!--to work here for rashid strts here-->
                <div class="row">
                    <h6 class="col-xs-7 ">
                        <b>Service</b>
                    </h6>
                    <h6 class="col-xs-5  text-right ">
                        <b>£<span id="service_total"><?php echo $service_data['amount'];?></span></b>
                    </h6>
                    <h6 class="col-xs-7">
                        Add-ons
                    </h6>
                    <h6 class="col-xs-5 text-right" >
                        <b >£<span id="adonsamt">0</span></b>
                    </h6>
                    <h6 class="col-xs-7">
                        Transaction Fee
                    </h6>
                    <h6 class="col-xs-5 text-right" >
                        <b >£<span id="fee_amount"><?php echo $payment_fee;?></span></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $service_data['amount']+$payment_fee;?>" id="total_money" name="total_money"/>
                        <input type="hidden" value="<?php echo $service_data['service_id'];?>" id="service_id" name="service_id"/>
                        <b id="finalamt">£<?php echo $service_data['amount']+$payment_fee;?></b>
                    </h6>
                </div>
                
                <!--to work here for rashid ends here-->
                
                <?php }else if($this->router->fetch_method()=="buycredits"){ ?>

<script>
    $(document).on('keyup','#credits_purchased',function(){ 
        var a = $(this).val();
         $("#ordernow").attr("disabled",false);
        if(a < 15){
            alert("Minimum 15 credits required to purchase.");
            $("#ordernow").attr("disabled",true);
            return false;
        }
        var totalamt = a*<?php echo $credit_purchase_amt; ?>;
        
        var paymentfee = (totalamt * 5)/100;
        $("#payment_fee").html("£"+paymentfee);
        totalamt = totalamt + paymentfee;
        $("#total_money").val(totalamt);
        $("#finalamt").html("£"+totalamt);
        
    });
</script>                
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Credit Price</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b>£<span id="singlecreditprice"><?php echo $credit_purchase_amt;?></span></b>
                    </h6>
                    
                    <h6 class="col-xs-7">
                        <b>Total Credits</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="text" name="credits" id="credits_purchased" value="15" class="form-control"/>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="payment_fee">£<?php echo $paymentfee = (($credit_purchase_amt*15)*5/100);?></b>
                    </h6>
                    
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo ($credit_purchase_amt*15)+$paymentfee;?>" name="total_money" id="total_money"/>
                        <b id="finalamt">£<?php echo ($credit_purchase_amt*15)+$paymentfee;?></b>
                    </h6>
                </div>
                
                <?php }else if($this->router->fetch_method()=="givetip"){ ?>
                
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Tip Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $total_money;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $paymentfee = ($total_money*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $total_money+$paymentfee;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $user_record['u_id'];?>" name="user"/> 
                        <input type="hidden" value="<?php echo $returnurl;?>" name="returnurl"/>
                        <input type="hidden" value="<?php echo $this->uri->segment("5");?>" name="invoiceno"/>
                        <b id="finalamt">£<?php echo $total_money+$paymentfee;?></b>
                    </h6>
                </div>
                
                <?php }else if($this->router->fetch_method()=="givetip_for_service"){ ?>
                
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Tip Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $total_money;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $servicefee = ($total_money*5)/100;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $total_money+$servicefee;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $user_record['u_id'];?>" name="user"/> 
                        <input type="hidden" value="<?php echo $returnurl;?>" name="returnurl"/>
                        <input type="hidden" value="<?php echo $this->uri->segment("5");?>" name="invoiceno"/>
                        <b id="finalamt">£<?php echo $total_money+$servicefee;?></b>
                    </h6>
                </div>
                
                <?php }else if($this->router->fetch_method()=="depositamount"){ ?>
                
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Deposit Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $record['deposit_amt'];?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $paymentfee = ($record['deposit_amt']*5)/100;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $record['deposit_amt']+$paymentfee;?>" name="total_money"/> 
                        <input type="hidden" value="<?php echo $this->uri->segment("3");?>" name="msgid"/>
                        <b id="finalamt">£<?php echo $record['deposit_amt']+$paymentfee;?></b>
                    </h6>
                </div>
                
                <?php }else if($this->router->fetch_method()=="depositamountforservice"){ ?>
                
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Deposit Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $record['deposit_amt'];?></b>
                    </h6>
                    
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b>£<?php echo $service_fee = ($record['deposit_amt']*5/100);?></b>
                    </h6>
                    
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo ($record['deposit_amt']+$service_fee);?>" name="total_money"/> 
                        <input type="hidden" value="<?php echo $this->uri->segment("3");?>" name="msgid"/>
                        <b id="finalamt">£<?php echo $record['deposit_amt']+$service_fee;?></b>
                    </h6>
                </div>
                
                <?php }else if($this->router->fetch_method()=="featureprofile"){ ?>

<script>
    $(document).on('change','#month',function(){
        var id = $(this).val();
        var totalamt = <?php echo $profile_feature_price;?>*id;
        $("#finalamt1").html("£"+totalamt);
        
        var paymentfee = totalamt *5/100;
        $("#paymentfees").html("£"+paymentfee);
        
        totalamt = parseFloat(totalamt)+parseFloat(paymentfee);
        $(".finlamt").html("£"+totalamt);
        $("#totalmoney").val(totalamt);
    });
</script>                
                 <div class="row">
                    <h6 class="col-xs-7">
                        <b>Feature Profile Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt1">£<?php echo $profile_feature_price;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Month</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <select class="form-control" id="month" name="month">
                            <option value="1">1 Month</option>
                            <option value="2">2 Months</option>
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12">1 Year</option>
                        </select>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction Fees</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="paymentfees">£<?php echo $paymentfees = ($profile_feature_price*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" value="<?php echo $profile_feature_price+$paymentfees;?>" id="totalmoney" name="total_money"/>
                        <b id="finalamt" class="finlamt">£<?php echo $profile_feature_price+$paymentfees;?></b>
                    </h6>
                </div>
                <?php }else if($this->router->fetch_method()=="featureservice"){ ?>

<script>
    $(document).on('change','#month_serice',function(){
        var id = $(this).val();
        var totalamt = <?php echo $service_feature_price;?>*id;
        $("#finalamt1").html("£"+totalamt);
        
        var paymentfee = totalamt *5/100;
        $("#paymentfees").html("£"+paymentfee);
        
        totalamt = parseFloat(totalamt)+parseFloat(paymentfee);
        $(".finlamt").html("£"+totalamt);
        $("#totalmoney").val(totalamt);
    });
</script> 

                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Feature Service Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt1">£<?php echo $service_feature_price;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Month</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <select class="form-control" id="month_serice" name="month">
                            <option value="1">1 Month</option>
                            <option value="2">2 Months</option>
                            <option value="3">3 Months</option>
                            <option value="4">4 Months</option>
                            <option value="5">5 Months</option>
                        </select>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction Fees</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="paymentfees">£<?php echo $paymentfees = ($profile_feature_price*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" id="totalmoney" value="<?php echo $service_feature_price+$paymentfees;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="service_id"/>
                        <b id="finalamt" class="finlamt">£<?php echo $service_feature_price+$paymentfees;?></b>
                    </h6>
                </div>
                
                
                <?php }else if($this->router->fetch_method()=="dispute"){ ?>
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Dispute Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $budget;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $paymentfee = ($budget*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" id="totalmoney" value="<?php echo $budget+$paymentfee;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="dispute_id"/>
                        <b id="finalamt" class="finlamt">£<?php echo $budget+$paymentfee;?></b>
                    </h6>
                </div>
                <?php }else if($this->router->fetch_method()=="disputeService"){ ?>
                <div class="row">
                    <h6 class="col-xs-7">
                        <b>Dispute Amount</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $budget;?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Transaction fee</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <b id="finalamt">£<?php echo $paymentfee = ($budget*5/100);?></b>
                    </h6>
                    <h6 class="col-xs-7">
                        <b>Total</b>
                    </h6>
                    <h6 class="col-xs-5 text-right">
                        <input type="hidden" id="totalmoney" value="<?php echo $budget+$paymentfee;?>" name="total_money"/>
                        <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="dispute_id"/>
                        <b id="finalamt" class="finlamt">£<?php echo $budget+$paymentfee;?></b>
                    </h6>
                </div>
                <?php } ?>
                
                <div>
                    <input type="button" value="Order Now" class="btn btn-block btn-success" style="background-color:#009247;border-color:#009247" id="ordernow"/>
                </div>
            </div>
        </form>
    </div>
</section>  
 
 <script>
    
    // Create an instance of the Stripe object
	// Set your publishable API key
	var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');
    console.log(stripe);
// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        padding: '30px',
        height: '150px !important',
        // box-shadow: none,
        color: '#000',
        // box-shadow: none;
        // height: 50px;
        // padding: 8px 15px;
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
    color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('myform');

$(document).on('click','#ordernow',function(e){
    e.preventDefault();
    var val = $(".Paymentoption:checked").val();
    
    if(val=="1"){
         createToken();
    }else{
        form.submit();
    }
   
    
});

$(document).on('click','.Paymentoption',function(e){
 
    var val = $(".Paymentoption:checked").val();
    
    
    if(val=="1"){ 
         $("#WrprCreditCard").show();
    }else{ 
        $("#WrprCreditCard").hide();
    }
   
    
});

// form.addEventListener('submit', function(e) { 
//     e.preventDefault();
//     createToken();
// });

// Create single-use token to charge the user
function createToken() { 
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);  
    form.appendChild(hiddenInput);
    
    // Submit the form
    form.submit();
}

    
    $(document).on('click','.srviceadons',function(){
        var totaladonsamt=0;
        var adonid=0;
        
        
        $('.srviceadons:checked').each(function() {

            valu = parseFloat($(this).data("id1"));
            totaladonsamt = totaladonsamt + valu; 
            
            //var fee_amount = (5*totaladonsamt)/100;
            
        });
        
        var service_amount =$('#service_total').text();
        $('#adonsamt').html(totaladonsamt);
        var totalamt = totaladonsamt+parseFloat(service_amount);
        var fee_amount = (5*totalamt)/100;
        $('#fee_amount').text(fee_amount);
        $('#finalamt').text("£"+(totalamt+fee_amount));
        $('#total_money').val(totalamt+fee_amount);
    });
    
    
</script>
  
<?php require_once("includes/front_end_footer.php"); ?>