<!DOCTYPE html>
<html lang="en">
<head>
  <title>Surf n Work</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background:#F5F5F5;padding:10px;">

  
<div style="margin:0 auto;width:95%;border:1px solid #ccc;background:white;padding:22px;">
    <div>
        <a href="<?php echo SURL; ?>" > 
            <img src="<?php echo SURL; ?>uploads/logo.png" style="width:222px;height:100px;" alt="">
        </a>
    </div>
    <hr>
    
    <h4 style="color:black;"><b>Dear Customer,</b></h4>
    
    <?php
    if($type == 'job_approve'){
    
    ?>
    <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Congrats!</span> Your project has been approved and published</p>
   
    <?php } 
        
        if($type == 'job_post'){
    
    ?>
    <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Congrats!</span> Your job post successfully! Invite sellers to start on it or wait for sellers to sent purposals.</p>
   
    <?php } 
    
        if($type == 'invitation'){
    
    ?>
    
     <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Great News!</span> You invited for a job from buyer (<?php echo ucfirst($username);?>). Go and grab this opportunity</p>
    
    <?php }
    
    if($type == 'service_purchased'){
    
    ?>

        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Congrats!</span> Client has purchased your service (<?php echo $title;?>)</p>

    <?php }  
    
     if($type == 'client_accepted_purposal'){
    
    ?>

        <p style="color:black;padding-bottom: 23px;"><span style='color:red'>Great News</span> Client has accepted your proposal. Go and give him quality services.</p>

    <?php } ?> 
    
   <?php if($type == 'complete profile'){ ?>   
    

        <p style="color:black;padding-bottom: 23px;"><span style='color:red'>Great News</span> Your Profile has been Created.</p>

    <?php } ?> 
    
    
   <?php if($type == 'inovice_rejected_service'){ ?>   
    

        <p style="color:black;padding-bottom: 23px;"><span style='color:red'>Invoice Rejected</span> You have rejected the invoice.</p>

    <?php } 
    
     if($type == 'dispute_raised'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:red'> Dispute Raised! </span> <?php //echo $username;?>Dispute has been araised on your job.</p>

    <?php } if($type == 'send_invoice'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'> Invoice! </span> <?php echo $username;?> has sent an invoice. Go through it and perform action accordingly.</p>

    <?php }if($type == 'purchasedservices'){ ?>
    
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'> Invoice! </span> <?php echo $username;?> You have received a new Invoice on your Purchased Service</p>

    <?php } if($type == 'deposite_amount'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Deposite Request! </span> <?php echo $username;?> Seller has requested to deposit amount for the job.</p>

    <?php }  if($type == 'deposite_accept'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Great News! </span> <?php echo $username;?> Client has accepted your deposit request go ahead with the work.</p>

    <?php }  if($type == 'deposite_amount_service'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Deposit Request! </span> <?php echo $username;?> Seller has requested to deposit amount for the Service.</p>

    <?php }  if($type == 'deposite_accept_service'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Great News! </span> <?php echo $username;?> has accepted your deposit request go ahead with the work.</p>

    <?php } if($type == 'deposite_rejected_service'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:red'>Deposite Rejected ! </span> <?php echo $username;?> Client rejected your deposite request.</p>

    <?php } if($type == 'deposite_rejected'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:red'>Deposite Rejected ! </span> <?php echo $username;?> Client rejected your deposite request.</p>

    <?php } if($type == 'send_inovice_service'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Invoice! </span> <?php echo $username;?> has sent an invoice. Go through it and perform action accordingly.</p>

    <?php }if($type == 'send_refund_service'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Refund! </span> <?php echo $username;?> You have received a Refund request from Buyer.</p>

    <?php } if($type == 'accept_refund_service'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:green'>Refund! </span> <?php echo $username;?> Seller accepted your refund request.</p>

    <?php } if($type == 'reject_refund_service'){
    
    ?>
        <p style="color:black;padding-bottom: 23px;"><span style='color:red'>Refund! </span> <?php echo $username;?> Seller rejected refund request.</p>

    <?php } ?> 
    
     
     
    
    
    
    
    <p style="margin-top:34px">For more information, please read our <strong style="color:#5BC0DE"><a href="<?php echo base_url();?>Faq">FAQ.</a></strong></p>
     <p style="margin-top:10px">If you have any questions, please feel free to <strong style="color:#5BC0DE"><a href="<?php echo base_url();?>Query">Contact us.</a></strong></p>
    <p style="color:black;">
       <strong>Thank You,</strong><br>
        The Gigeconome Team.
    </p>
        
</div>

<div id="footer_div" style=" margin:0 auto;width:95%;background: black;padding:15px">
    <div style="text-align: center;">
         <a href="https://www.facebook.com/"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/facebook-01.png" alt=""></a>
         <a href="https://twitter.com/"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/twitter2.png" alt=""></a>
         <a href="https://www.instagram.com/"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/insta-new.png" alt=""></a>
     </div>
    <p style="margin-top:19px; color: white;text-align:center">All Copyrights © 2021 are Reserved by Gigeconome</p>
</div>

</body>
</html>
