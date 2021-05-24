<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gig Coviknow</title>
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
            <img src="<?php echo base_url()?>uploads/logo.png" style="width:222px;height:100px;" alt="">
        </a>
    </div>
    <hr>
    
    <h4 style="color:black;"><b>Dear Customer,</b></h4>
    <p style="color:black;padding-bottom: 23px;"> Please verify your email.your Otp is <?php echo $otp?></p>
    <!--<a style="background: ##46a049 !important;color: white !important;padding:11px;text-decoration: none;color:black;border-radius: 9px;margin-top:11px" href="<?php echo $link;?>">Verify your email</a>-->
    <p style="margin-top:34px">For more information, please read our <strong style="color:#5BC0DE"><a href="<?php echo base_url();?>Faq">FAQ.</a></strong></p>
     <p style="margin-top:10px">If you have any questions, please feel free to <strong style="color:#5BC0DE"><a href="<?php echo base_url();?>CustomerSupport">Contact us.</a></strong></p>
    <p style="color:black;">
       <strong>Thank You,</strong><br>
        The Gig Coviknow Team.
    </p>
        
</div>

<div id="footer_div" style=" margin:0 auto;width:95%;background: black;padding:15px">
    <div style="text-align: center;">
         <a href="https://www.facebook.com/SurfNWork/"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/facebook-01.png" alt=""></a>
         <a href="https://twitter.com/surfnwork"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/twitter2.png" alt=""></a>
         <a href="https://www.instagram.com/"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/insta-new.png" alt=""></a>
     </div>
    <p style="margin-top:19px; color: white;text-align:center">All Copyrights © 2020 are Reserved by  Gig Coviknow</p>
</div>

</body>
</html>
