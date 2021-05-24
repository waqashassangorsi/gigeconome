<?php 
//echo "<pre>";var_dump($myuser);
foreach($convo as $key=>$value){
	
    if($value['custom_status']=="Invoice"){
        include("msg_invoice_service.php");
    }else if($value['custom_status']=="Deposit"){
        include('msg_deposit_service.php');
    }else if($value['custom_status']=="Refund"){
        include('msg_refund_service.php');
    }else if($value['custom_status']=="Time-Extension"){
        include('msg_time_extension_service.php');
    }else{
        if($value['send_id']==$myuser['u_id']){
            include("sender_msg_service.php"); //i am the sender
        }else{
            include("receiver_msg_service.php"); //the receiver
        }
        
    }
    
} 
 //include("Tip.php"); //the receiver
                        
?>