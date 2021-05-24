<?php 

$tz = $tz;
foreach($convo as $key=>$value){
    
    if($value['custom_status']=="Proposal"){ 
        include("msg_proposal.php");
    }else if($value['custom_status']=="Invoice"){
        include("msg_invoice.php");
    }else if($value['custom_status']=="Deposit"){
        include('msg_deposit.php');
    }else if($value['custom_status']=="Refund"){
        include('msg_refund.php');
    }else if($value['custom_status']=="Time-Extension"){
        include('msg_time_extension.php');
    }else{
        if($value['send_id']==$myuser['u_id']){
            
            include("sender_msg.php"); //i am the sender
        }else{
            include("receiver_msg.php"); //the receiver
        }
        
    }
    
} 
 //include("Tip.php"); //the receiver
 // include("includes/disputeraised.php");
                        
?>