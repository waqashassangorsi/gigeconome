<?php include("includes/front_end_header.php");?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/paymentpage.css">
<style>

    .nav-tabs {
        margin-top: 4px;
        margin-bottom: 4px;
    }

    .cards{
        margin-top: 10px;
    }
   
    .edit{
        color: #5bc0de;
    }
    
    
    .submit_button{
        background: #5bc0de;
        color:#fff;
        border:none;
    }
 
    .nav-tabs > li.active > a{
        color: #fff;
        background-color: #5bc0de!important;
        border: 1px solid #5bc0de!important;
    }
    .nav-tabs li{
        cursor: pointer;
    }
    .nav-tabs > li.active > a:hover{
        cursor: pointer;
        color: #fff;
    }
    .nav-tabs > li.active > a:focus{
        color: #fff;
        background-color: #5bc0de!important;
        border: 1px solid #5bc0de!important;
    }
    .nav-tabs li a:hover{
        color: #fff;
        background-color: #5bc0de!important;
        border: 1px solid #5bc0de!important;
    }
    @media screen and (max-width: 766px) and (min-width: 340px)
    {
        #main_container {
            padding-top: 109px !important;
        }
    }
    
  @media screen and (max-width: 434px) {
 
   
    .modal{
        width: 80%;
        margin: auto;
    }
  }
  
  #withdrawal3
  {
      width:50%;
  }
  #withdrawal2
  {
      /*box-shadow: 5px 4px 17px -6px;*/
      padding: 22px;
    padding-left: 8px;
  }
  
  .paypalacco
  {
      width:50%;
  }
  
  
  .paypalacco2
  {
      
  float: right;
   margin-top: 3px;
  }
  .paypalacco2 a
  {
      color:#5bc0de;
  }
  @media screen and (max-width: 555px) and (min-width:340px){
.paypalacco{
           width:100%;
       }
#withdrawal3{
    width:100%;
}
    
}
.withdrawalbtn23
{
    background:#5bc0de;
    color:#fff;
    border:none;
    padding-left: 49px;
    padding-top: 10px;
    padding-right: 53px;
    padding-bottom: 10px;
    box-shadow: 2px 3px 3px -1px grey;
    border-radius: 0px;
}

.labeldesc
{
    margin-top:5px;
     color:#5bc0de;
}
  </style>

    <div class="container-fluid payment">
        <div class="row" >
            <div class="col-sm-12 col-xs-12">
                <div class="row" style="margin:0;">
                    <h1>Payments</h1>
                </div>
                <div class="row payment_menu" style="margin:0;">
                    <ul class="nav nav-tabs nav-tabs2">
                        <li class="tab active"><a   class="mymony">My Money</a></li>
                        <li class="tab"><a   class="payment_method">Payment Methods</a></li>
                        <li class="tab"><a   class="control_panel">Control Panel</a></li>
                    </ul>
                </div>
                <div id="mymony_model" class="">
                    <div class="row cards">
                        <div class="col-md-3 col-sm-6 col-xs-12 payment_card_div circle-border">
                            <div class="payment_card payment_card_surf surfnwork_acco answer_1  circle_div circle1 circle3 spin" style="border: 1px solid rgb(91, 192, 222);">
                                <h4 id="surfnwork_head1">$<?php echo number_format($myblnc,2);?></h4>
                                <h5 id="surfnwork_head2">Available Money</h5>
                                <!--<div class="payment_detail">-->
                                <!--    <div class="row payment_header">-->
                                <!--        <div class="col-xs-6">-->
                                <!--            <p>Currency</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-6 text-right">-->
                                <!--            <p>Amount</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>Pound sterling</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$0.00</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>Euro</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$0.00</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>US dollar</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$<?php echo $myblnc;?></p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 payment_card_div" >
                            <div class="payment_card payment_card_buyer buyer_escrow  circle1 circle3 spin">
                                <h4 id="buyer_head1">$<?php echo number_format($freelancerescrow,2);?></h4>
                                <h5 id="buyer_head2">My Seller Escrow</h5>
                                <!--<div class="payment_detail">-->
                                <!--    <div class="row payment_header">-->
                                <!--        <div class="col-xs-6">-->
                                <!--            <p>Currency</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-6 text-right">-->
                                <!--            <p>Amount</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>Pound sterling</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$0.00</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>Euro</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$0.00</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>US dollar</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$<?php// echo $buyerescrow; ?></p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 payment_card_div">
                            <div class="payment_card payment_card_frrelancer freelancer_escrow  circle1 circle3 spin">
                                <h4 id="freelancer_head1">$<?php echo number_format($buyerescrow,2);?></h4>
                                <h5 id="freelancer_head2">My Buyer Escrow</h5>
                                <!--<div class="payment_detail">-->
                                <!--    <div class="row payment_header">-->
                                <!--        <div class="col-xs-6">-->
                                <!--            <p>Currency</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-6 text-right">-->
                                <!--            <p>Amount</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>Pound sterling</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$35.00</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>Euro</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$0.00</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row payment_row">-->
                                <!--        <div class="col-xs-8">-->
                                <!--            <p>US dollar</p>-->
                                <!--        </div>-->
                                <!--        <div class="col-xs-4 text-right">-->
                                <!--            <p>$<?php echo $buyerescrow; ?></p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    
                    <!--<div class="row currancy_row surfaccount">-->
                    <!--    <div class="col-sm-4 text-center">-->
                    <!--        <h5>Currancy</h5>-->
                    <!--    </div>-->
                    <!--    <div class="col-sm-8 ">-->
                    <!--        <h5>Availble</h5>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="row cur_detail surfaccount">-->
                    <!--    <div class="col-md-4 text-center">-->
                    <!--        <h5>$USD</h5>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-4">-->
                    <!--        <h5 class="price_dollor">$0.00</h5>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-4">-->
                    <!--        <button type="button" class="btn withdraw_btn" data-toggle="modal" data-target="#withdraw_model">WITHDRAW FUNDS</button>-->
                    <!--    </div>-->
                        
                    <!--</div>-->
                       <div class="col-sm-12" style="margin-top:17px;margin-left:30px">
                         <a style="color:#5bc0de;cursor:pointer" data-toggle="modal" data-target="#withdraw_model">Withdraw</a>
                      </div> 
                    <div class="col-sm-12" style="margin-top:27px">
                        <h4>Transaction</h4>
                        <ul class="transcation_ul">
                            <li>
                                <select id='record_filter' style="border-radius: 11px;padding:2px">
                                   <option value='0' disabled selected>Choose from selection</option>
                                   <option value='1'>Last 7 days</option>
                                   <option value='2'>Last 30 days</option>
                                   <option value='3'>Previous Month</option>
                                   <option value='4'>Previous Year</option>
                                   <option value='5'>Custom Range</option>
                                </select>
                            </li>
                            <li style='display:none;' id='custom_range'><form action='Payment/filteration/5' id='range_date' method='post'><input type="text" placeholder='Date ranges...' name="datefilter" value="" /><div id='values'></div></form></li>
                           <!-- <li class="transcation_li"><a href="" style="color:#5bc0de;">Print</a></li>-->
                            <li class="transcation_li"><a href="<?php echo base_url()."Payment/exportCSV/myblnc"; ?>" id='exportocsv' style="color:#5bc0de;">Export to CSV</a></li>
                        </ul>
                    </div>
                    
                       <div class="invoicee_detailse_wapr">
                    	<table class="table invoicee_detailse2 surfaccount" style="margin-top: 17px;">
                    	 
                    	 <thead style="background: #eeeeee" align='center'>
                		   	<tr>
                		   	    <th><h5>TrxID</h5></th>
                		   	    <th><h5>Date</h5></th>
                		   	    <th><h5>Detail</h5></th>
                				<th><h5>Amount</h5></th>
                			    <th><h5>Action</h5></th>
                				<!--<th><h5>Withdrawal</h5></th>-->
                			</tr>
                		</thead>
                    	 
                    	 <tbody>
                    	   
                    	     <?php
                    	     
                    	     if(count($transactions_available_money) > 0 ){
                    	     $i = 1;
                    	     foreach($transactions_available_money as $key=>$trans) { 
                    	     $date=date_create($trans['date']);
                             $date =  date_format($date,"d M Y");
                             switch($trans['trans_type']){
                                 case 'Profile_featured':
                                  $detail = "You make profile featured!";
                                 break;
                                 case 'jobs_adons':
                                  $detail = "You make payment for job adons!";
                                 break;
                                 case 'services_featured':
                                  $detail = "You make service featured!";
                                 break;
                                 case 'services_purchased':
                                  $detail = "You purchased a service!";
                                 break;
                                 case 'tip_amt':
                                  $detail = "You received an tip from buyer!";
                                 break;
                                 case 'amt_deposit':
                                  $detail = "You deposited an amount!";
                                 break;
                                 case 'amt_deposit':
                                  $detail = "You deposited an amount!";
                                 break;
                                 case 'amt_refunded':
                                  $detail = "An amount refunded";
                                 break;
                                 case 'feature_proposal':
                                  $detail = "A transaction for feature proposal!";
                                 break;
                                 case 'proposal_accept':
                                  $detail = "A transaction for proposal acceptance!";
                                 break;
                                 case 'invoice_acept':
                                  $detail = "An invoice is accepted!";
                                 break;
                                 case 'prop_credits_purchased':
                                  $detail = "prop_credits_purchased";
                                 break;
                             }
                             
                             if($trans['camount'] > 0){
                                 $price = "<span style='color:red'> - $".number_format($trans['camount'],2)."</span>";
                             }else{
                                 $price = "<span style='color:green'> $".number_format($trans['damount'],2)."</span>";
                             }
                             
                    	     ?>
                    	     <tr>
                    	         <td><?php echo $i;?></td>
                    	        <td><h5 class="price_dollor"><?php echo $date;?></h5></td> 
                    	       <td><h5><?php echo $detail;?></h5></td>
                               <td><?php echo $price; ?></td>
                                 <td><h5 class="price_dollor">Print</td>
                               <!--<td><h5 class="price_dollor_button"> <a style="color:#5bc0de" data-toggle="modal" data-target="#withdraw_model">Withdrawn</a></td>-->
                            </tr>    
                            <?php $i++; } }else{ ?>
                               <tr align='center'><td colspan='4'><p style='color:red'> No transactions found yet!</p> </td></tr> 
                            <?php } ?>
    			          
    		               </tbody>
                    </table>
                    
                    </div>
                    
                    <!----Buyer Escrow----------->
                    <div class="invoicee_detailse_wapr">
                    	<table class="table invoicee_detailse buyer_escrow_detail" style="display:none;margin-top: 17px;">
                    	 
                    	 <thead style="background: #eeeeee">
                		   	<tr>
                		   	    <th><h5>TrxID</h5></th>
                				<th><h5>Date</h5></th>
                				<th>Job Title</th>
                				<th><h5>Detail</h5></th>
                				<th><h5>Amount</h5></th>
                				<th><h5>Action</h5></th>
                				<!--<th><h5>Invoices</h5></th>
                				<th><h5>Action</h5></th>-->
                			</tr>
                		</thead>
                    	 
                    	 <tbody>
                    	 <?php
                    	     
                    	     if(count($transactions_seller_escrow) > 0){
                    	         $i = 1;
                    	       foreach($transactions_seller_escrow as $transaction) {
                    	           
                    	        foreach($transaction as $key=>$trans) {        
                    	           //echo "<pre>"; var_dump($trans);
                    	           //// exit();
                    	     $date=date_create($trans['date']);
                             $date =  date_format($date,"d M Y");
                             switch($trans['trans_type']){
                                 case 'Profile_featured':
                                  $detail = "You make profile featured!";
                                 break;
                                 case 'jobs_adons':
                                  $detail = "You make payment for job adons!";
                                 break;
                                 case 'services_featured':
                                  $detail = "You make service featured!";
                                 break;
                                 case 'services_purchased':
                                  $detail = "You purchased a service!";
                                 break;
                                 case 'tip_amt':
                                  $detail = "You received an tip from buyer!";
                                 break;
                                 case 'amt_deposit':
                                  $detail = "You deposited an amount!";
                                 break;
                                 case 'amt_deposit':
                                  $detail = "You deposited an amount!";
                                 break;
                                 case 'amt_refunded':
                                  $detail = "An amount refunded to buyer!";
                                 break;
                                 case 'feature_proposal':
                                  $detail = "A transaction for feature proposal!";
                                 break;
                                 case 'proposal_accept':
                                  $detail = "A transaction for proposal acceptance!";
                                 break;
                                 case 'invoice_acept':
                                  $detail = "An invoice is accepted!";
                                 break;
                                 case 'prop_credits_purchased':
                                  $detail = "prop_credits_purchased";
                                 break;
                             }
                             
                              if($trans['camount'] > 0){
                                 $price_seller_escrow = "<span style='color:red'> - $".number_format($trans['camount'],2)."</span>";
                             }else{
                                 $price_seller_escrow = "<span style='color:green'> $".number_format($trans['damount'],2)."</span>";
                             }
                             //$detail = $trans['trans_type'];
                             
                             //$price_seller_escrow = $trans['damount'];
                             
                    	     ?>
                    	     <tr>
                    	         <td><?php echo $i;?></td>
                    	        <td><h5 class="price_dollor"><?php echo $date;?></h5></td> 
                    	        <td><a href='Jobdetails/index/<?php echo $trans['job_slug'];?>'><?php echo $trans['job_title'];?></a></td>
                    	       <td><h5><?php echo $detail;?></h5></td>
                               <td><?php echo $price_seller_escrow;?></td>
                              <!-- <td><button class='btn btn-primary'>Print</button></td>-->
                              <td><h5 class="price_dollor_button"> <a style="color:#5bc0de" data-toggle="modal" data-target="#withdraw_model">Deposited</a></td>
                            </tr>    
                            <?php $i++;}  } }else{ ?>
                             <tr align='center'><td colspan='5'><p style='color:red'> No transactions found yet!</p> </td></tr> 
                            <?php } ?>
    		               </tbody>
                    </table>
                    
                    </div>
                    
                    <!--<div class="wrapper">-->
                    <!--   <div class="row currancy_row buyer_escrow_detail" style="display:none">-->
                           
                    <!--       <ul class="ul_items">-->
                    <!--           <li><h5>Descritption</h5></li>-->
                    <!--           <li><h5>InEscrow</h5></li>-->
                    <!--           <li><h5>Deposit Request</h5></li>-->
                    <!--           <li><h5>Invoices</h5></li>-->
                    <!--           <li><h5>Action</h5></li>-->
                    <!--       </ul>-->
                      
                    <!--</div>-->
                    <!--<div class="row cur_detail buyer_escrow_detail" style="display:none">-->
                        
                           
                    <!--       <ul class="ul_items2">-->
                    <!--           <li><h5>$USD</h5></li>-->
                    <!--           <li><h5 class="price_dollor">$0.00</h5></li>-->
                    <!--           <li><h5 class="price_dollor">$0.00</h5></li>-->
                    <!--           <li><h5 class="price_dollor">$0.00</h5></li>-->
                    <!--            <li><a href="">Escrow Deposit</a></li>-->
                    <!--       </ul>-->
                    <!--</div>-->
                    <!--</div>-->
                         <!----Freelancer Escrow----------->
                         
                          <div class="invoicee_detailse_wapr">
                              
                    	<table class="table  invoicee_detailse freelancer_escrow_detail" style="display:none;margin-top: 17px;">
                    	 
                    	  <thead style="background: #eeeeee">
                		   	<tr>
                		   	    <th><h5>TrxID</h5></th>
                				<th><h5>Date</h5></th>
                				<th>Job Title</th>
                				<th><h5>Detail</h5></th>
                				<th><h5>Amount</h5></th>
                				<th><h5>Action</h5></th>
                			<!--	<th><h5>Invoices</h5></th>
                				<th><h5>Action</h5></th>-->
                			</tr>
                		</thead>
                    	 
                    	 <tbody>
                    	      <?php 
                    	      
                    	      if(count($transactions_buyer_escrow) > 0){
                    	          $i++;
                    	      foreach($transactions_buyer_escrow as $transaction) { 
                    	          foreach($transaction as $trans){
                    	     $date=date_create($trans['date']);
                             $date =  date_format($date,"d M Y");
                             switch($trans['trans_type']){
                                 case 'Profile_featured':
                                  $detail = "You make profile featured!";
                                 break;
                                 case 'jobs_adons':
                                  $detail = "You make payment for job adons!";
                                 break;
                                 case 'services_featured':
                                  $detail = "You make service featured!";
                                 break;
                                 case 'services_purchased':
                                  $detail = "You purchased a service!";
                                 break;
                                 case 'tip_amt':
                                  $detail = "You received an tip from buyer!";
                                 break;
                                 case 'amt_deposit':
                                  $detail = "You deposited an amount!";
                                 break;
                                 case 'amt_deposit':
                                  $detail = "You deposited an amount!";
                                 break;
                                 case 'amt_refunded':
                                  $detail = "An amount refunded to buyer!";
                                 break;
                                 case 'feature_proposal':
                                  $detail = "A transaction for feature proposal!";
                                 break;
                                 case 'proposal_accept':
                                  $detail = "A transaction for proposal acceptance!";
                                 break;
                                 case 'invoice_acept':
                                  $detail = "An invoice is accepted!";
                                 break;
                                 case 'prop_credits_purchased':
                                  $detail = "prop_credits_purchased";
                                 break;
                             }
                             
                              if($trans['camount'] > 0){
                                 $price = "<span style='color:red'> - $".number_format($trans['camount'],2)."</span>";
                             }else{
                                 $price = "<span style='color:green'> $".number_format($trans['damount'],2)."</span>";
                             }
                             
                            // $price = "$ ".$trans['damount'] - $trans['camount'] ;
                    	     ?>
                    	     <tr>
                    	         <td><?php echo $i;?></td>
                    	        <td><h5 class="price_dollor"><?php echo $date;?></h5></td> 
                    	        <td><a href='Jobdetails/index/<?php echo $trans['job_slug'];?>'><?php echo $trans['job_title'];?></a></td>
                    	       <td><h5><?php echo $detail;?></h5></td>
                               <td><?php echo $price; ?></td>
                               <!--<td><button class='btn btn-primary'>Print</button></td>
                                 <!--<td><h5 class="price_dollor">Print</td>-->
                               <td><h5 class="price_dollor_button"> <a style="color:#5bc0de" data-toggle="modal" data-target="#withdraw_model">Deposited</a></td>
                            </tr>    
                            <?php $i++;} } }else{ ?>
                            
                             <tr align='center'><td colspan='3'><p style='color:red'> No transactions found yet!</p> </td></tr> 
                             <?php } ?>
    		               </tbody>
                    	 
                    </table>
                    </div>
                         
                    
                    <!--   <div class="row currancy_row freelancer_escrow_detail" style="display:none">-->
                           
                    <!--       <ul class="ul_items">-->
                    <!--           <li><h5>Descritption</h5></li>-->
                    <!--           <li><h5>InEscrow</h5></li>-->
                    <!--           <li><h5>Deposit Request</h5></li>-->
                    <!--           <li><h5>Invoices</h5></li>-->
                    <!--           <li><h5>Action</h5></li>-->
                    <!--       </ul>-->
                      
                    <!--</div>-->
                    <!--<div class="row cur_detail freelancer_escrow_detail" style="display:none">-->
                        
                           
                    <!--       <ul class="ul_items2">-->
                    <!--           <li><h5>$USD</h5></li>-->
                    <!--           <li><h5 class="price_dollor">$0.00</h5></li>-->
                    <!--           <li><h5 class="price_dollor">$0.00</h5></li>-->
                    <!--           <li><h5 class="price_dollor">$0.00</h5></li>-->
                    <!--            <li><a href="">Escrow Deposit</a></li>-->
                    <!--       </ul>-->
                    <!--</div>-->
                    
                </div>
                <div id="payment_model" class="" >
                    <div class="row payment_method">
                        <div class="col-sm-6">
                            <h5><b>Withdrawal Account</b></h5>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="#edit_doc1" class="edit" data-toggle="collapse">Edit</a>
                        </div>
                    </div>
                    
                    <div class="invoicee_detailse_wapr collapse" id="edit_doc1">
                    	<table class="table table-bordered invoicee_detailse">
                    		<thead>
                    			<tr>
                    				<th>Account</th>
                    			</tr>
                    		</thead>
                    		
                    		<tbody>
                    		    <tr>
                    		        <td>
                    		            <div class="form-group">
                                            <input type="checkbox" name="account_id" value="1" data-toggle="collapse" data-target="#payoneer_id"> Payoneer                          
                                        </div>
                                        <?php
                                        
                                        ?>
                                        <div class="collapse" id="payoneer_id">
                                            <div style="margin-top:7px;">
                                                <label>Enter Email</label>
                                                <input type="text" class="form-control" value="<?php echo $myuser['payoneer_email'];?>" id="Emailpayoneer"/>
                                            </div>
                                            <div style="margin-top:7px;">
                                                <label>Confirm Email</label>
                                                <input type="text" class="form-control" value="<?php echo $myuser['payoneer_email'];?>"  id="cnfEmailpayoneer"/>
                                            </div>
                                            <div style="margin-top:7px;">
                                                <input type="button" value="Submit" id="submitpayoneer" class="btn btn-md" style="background:#5bc0de !important;color:white;"/>
                                            </div>
                                            <div id="success_reponse_payoneer" style="color: red;margin-top: 10px;"></div>
                                        </div>
                    		        </td>
                    		        
                    		    </tr>
                    		    
                    		    <tr>
                    		        <td>
                    		            <div class="form-group">
                                            <input type="checkbox" data-toggle="collapse" data-target="#stripe_id"> Stripe                          
                                        </div>
                                        <div class="collapse" id="stripe_id">
                                            <div style="margin-top:7px;">
                                                <label>Enter Email</label>
                                                <input type="text" class="form-control" value="<?php echo $myuser['stripe_email'];?>" id="emailstripe"/>
                                            </div>
                                            <div style="margin-top:7px;">
                                                <label>Confirm Email</label>
                                                <input type="text" class="form-control" value="<?php echo $myuser['stripe_email'];?>" id="cnfEmailstripe"/>
                                            </div>
                                            <div style="margin-top:7px;">
                                                <input type="button" value="Submit" id="submitstripe" class="btn btn-md" style="background:#5bc0de !important;color:white;"/>
                                            </div>
                                             <div id="success_reponse_stripe" style="color: red;margin-top: 10px;"></div>
                                        </div>
                    		        </td>
                    		        
                    		    </tr>
                    		    
                    		    <tr>
                    		        <td>
                    		            <div class="form-group">
                                            <input type="checkbox" data-toggle="collapse" data-target="#paypal_id"> Paypal                          
                                        </div>
                                        <div class="collapse" id="paypal_id">
                                            <div style="margin-top:7px;">
                                                <label>Enter Email</label>
                                                <input type="text" class="form-control" value="<?php echo $myuser['paypal_email'];?>" id="emailpaypal"/>
                                            </div>
                                            <div style="margin-top:7px;">
                                                <label>Confirm Email</label>
                                                <input type="text" class="form-control" value="<?php echo $myuser['paypal_email'];?>" id="cnfEmailpaypal"/>
                                            </div>
                                            <div style="margin-top:7px;">
                                                <input type="button" value="Submit" id="submitpaypal" class="btn btn-md" style="background:#5bc0de !important;color:white;"/>
                                            </div>
                                             <div id="success_reponse_paypal" style="color: red;margin-top: 10px;"></div>
                                        </div>
                    		        </td>
                    		    </tr>
                    		    
                    		     
                    		</tbody>
                    	</table>
                    	
	              </div>


                    <!--<div id="edit_doc1" class="collapse" style="height: auto;background: #fbfbfb;padding: 17px;">-->
                    <!--    <div class="row edi_collapse">-->
                    <!--        <div class="col-md-8">-->
                    <!--            <h5>Detail</h5>-->
                    <!--        </div>-->
                    <!--        <div class="col-md-2 text-center">-->
                    <!--            <h5>Status</h5>-->
                    <!--        </div>-->
                    <!--        <div class="col-md-2 text-center">-->
                    <!--            <h5>Active</h5>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="row detail_collpse">-->
                    <!--        <div class="col-md-1">-->
                    <!--            <i class="fa fa-university" aria-hidden="true"></i>-->
                    <!--        </div>-->
                    <!--        <div class="col-md-7">-->
                    <!--            <h5 style="font-size: 12px"><img src="uploads/pakistan-flag-icon-free-download.jpg" />HBL BANK LIMITED Hassan Nawaz pak988*****54</h5>-->
                    <!--        </div>-->
                    <!--        <div class="col-md-2 text-center">-->
                    <!--            <button class='btn approved_btn'>Approved</button>-->
                    <!--        </div>-->
                    <!--        <div class="col-md-2 text-center">-->
                    <!--            <h5 class="view_btn">View account</h5>-->
                    <!--        </div>-->
                            
                    <!--    </div>-->
                    <!--    <div class="row addbtn_row">-->
                    <!--        <div class="btn add_newaccount" data-toggle="modal" data-target="#addaccount">-->
                    <!--            + ADD NEW ACCOUNT-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="row payment_method">
                        <div class="col-sm-4 col-xs-6 verify_document">
                            <h5><b>Verification documents</b></h5>
                          
                        </div>
                        
                        <div class="col-sm-4 col-xs-6 verify_document2">
                            <?php
                            if(empty($myuser['withdrawl_Acct_Status'])){
                                echo "Waiting for documents";
                            }else if($myuser['withdrawl_Acct_Status']=="Pending"){
                                echo "Pending";
                            }else if($myuser['withdrawl_Acct_Status']=="Approved"){
                                 echo "Approved";
                            }else if($myuser['withdrawl_Acct_Status']=="Declined"){
                                 echo "Declined";
                            }else if($myuser['withdrawl_Acct_Status']=="Not Approved"){
                                 echo "Not Approved";
                            }
                            
                            ?>
                        </div>
                        
                        <?php if(empty($myuser['withdrawl_Acct_Status']) || $myuser['withdrawl_Acct_Status']=="Declined"){ ?>
                        
                        <div class="col-sm-4 col-xs-12 attach_docbtn">
                            <a href="#edit_doc2" class="submit_button btn btn-primary" data-toggle="collapse">
                                Attach document <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div id="edit_doc2 edit_doc3" class="collapse show_div" style="background: #fbfbfb;padding: 17px;">
                        <div>
                             <p>
                                 To help us verify your identity and ensure complete security of your information please attach the following documents (scanned copy, photo or screenshot):
                             </p> 
                             
                              <form action="<?php echo base_url()?>Payment/insertdoc2" method="POST" enctype="multipart/form-data">
                             
                             <div class="checkbox">
                                <?php
                                $doctype=$document_detail2->bill_document;
                                ?>
                                <label style="color:black"><input type="checkbox" name="copyofdoc" value="Idcard"  
                                <?php  if($doctype=="Idcard") { ?> checked disabled    <?php } ?>>
                                <strong> a copy of a Government issued ID with all information clearly visible
                                </strong> </label>
                                <input type="file" name="newdocument1" id="new_document" class="hidden">
                                <label for="new_document" class="btn add_newaccount add_newaccount2">
                                    + ADD NEW DOCUMENT
                                </label>
                              </div>
                             
                             <ul>
                                  <li>
                                   A copy of either your current Driving License, Passport or National Identity Card that clearly displays the name on your SnW account
                                  </li>
                                  <li class="description">
                                      Please attach only a single file that contains a clear color copy of the front and back of your ID card
                                  </li>
                            </ul>
                            
                                
                            <div class="checkbox">
                                
                                <?php
                                $doctype1=$document_detail2->bill_document;
                                // if($doctype1=="Bill")
                                // {
                                //     $select2="checked";
                                // }else
                                // {
                                //   $select2="";  
                                // }
                                // ?>
                                   <label style="color:black"><input type="checkbox" name="copyofdoc" value="Bill"
                                   <?php  if($doctype1=="Bill") { ?> checked disabled    <?php } ?>>
                                   <strong>a copy of a recent utility bill or statement showing your name and address (less than 3 months old)</strong></label>
                                    <input type="file" name="newdocument" id="new_document1" class="hidden" >
                                  <label for="new_document1" class="btn add_newaccount add_newaccount2">
                                    + ADD NEW DOCUMENT
                                  </label>
                            </div>
                                  
                                 
                            <ul>      
                                  <li>
                                      A copy of a recent bill or statement (not more than 3 months old) that displays the name AND address listed on your SnW account. This must be a copy of a Utility Bill: Gas/Electric/Landline Phone/Water Bills/Council Tax OR Paper copy only of Credit Card/Bank Statement.
                                  </li>
                                 
                                  
                                  <li class="description">
                                      Please attach only a single file that contains a clear color copy of the document
                                  </li>
                            </ul>
                        </div>
                       
                            <div class="row addbtn_row">
                                <!--<input type="file" name="newdocument[]" id="new_document" class="hidden" multiple >-->
                                <!--<label for="new_document" class="btn add_newaccount add_newaccount2">-->
                                <!--    + ADD NEW DOCUMENT-->
                                <!--</label>-->
                                
                               <div style="float:right;"> <i class="fa fa-times cross_btn" aria-hidden="true"></i> </div>
                               
                                <div class="attach_file"style="margin-top: 10px;color:#428bca;"></div>
                                 <div class="attach_file1"style="margin-top: 10px;color:#428bca;"></div>
                                
                                   <button type="submit" class="btn btn-primary save_btn2" style="display:none">Submit</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 payment_leftside" id="control_panel">
                <div class="payment_left">
                   
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Paid this month</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>$0.00</b></p>
                        </div>
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Paid to Date</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>$10.00</b></p>
                        </div>
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Earned this month</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>$0.00</b></p>
                        </div>
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Earned to Date</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>$12.7K</b></p>
                        </div>
                    </div>
                    <hr style="background-color: #8080801a;height: 1px;margin-top: 28px;">
                    <div class="row right_heading_second">
                        <h5>SERVICE FEES*</h5>
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-12 colxs">
                            <p>First $350 earned with Buyer (excl. VAT)20%</p>
                        </div>
                        
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-12">
                            <p>$350 - $250 earned with Buyer7.5%</p>
                        </div>
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-12">
                            <p>Over $7,000 earned with buyer3.5%</p>
                        </div>
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-12">
                            <p>*Worked billed under the Zero Commision scheme is excluded </p>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    
    <!-- Modal -->
          <div class="modal fade withdraw_model " id="withdraw_model" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h2 class="modal-title answer_security_question">Answer your security Question</h2>
                </div>
                <div class="modal-body text-center security_div">
                    <p style="font-size:16px;">To keep your account safe please answer security question.</p>
                  
                    <div class="form-group" style="margin-bottom: 1px;">
                      <?php if($userdata->SecurityAns == ""  && $userdata->SecurityQuestion == 0){ ?>
                      <p style="color:red">Please enter security question from settings.</p>
                      <input type='text' name="homrtown" class="form-control" readonly>
                      <?php }else{ ?>
                      <!--<select name='security' class='form-group form-control security'>-->
                      <!--  <option value='0'>Security Questions</option>-->
                        <?php
                            foreach($security_questions as $question){
                                if($question['q_id']==$myuser['SecurityQuestion']){
                        ?>
                             <!--<option  value='<?php echo $question['q_id'];?>'><?php echo $question['question'];?></option>-->
                             <input type="text" name='security' class='form-group form-control security' value='<?php echo $question['question'];?>' data-id='<?php echo $question['q_id'];?>' readonly>
                        <?php 
                            }} 
                        ?>
                        
                      <input type='text' placeholder='Write your answer here' name="security_ans" id="security_ans" class="form-control security_ans">
                      <input type='hidden' class='userid' value='<?php echo $myuser['u_id'];?>'>
                       <!--<input type='text' name="security_ques" id="security_ques" value="<?php echo $userdata->SecurityQuestion ?>" class="form-control" style="display:none">-->
                      <!--<button type="button" class='secuirtyquestioncheck' style="margin-top: 30px;border: 1px solid #2e606f;background: white;color: #2e606f;padding: 8px 39px;font-weight: bold;">SUBMIT </button>-->
                        <button type="button" class='secuirtyquestioncheck2' style="margin-top: 30px;border: 1px solid #2e606f;background: white;color: #2e606f;padding: 8px 39px;font-weight: bold;">SUBMIT </button>
                      <?php } ?>
                    </div>
                </div>
                 <!-----------------------withdrawalbody----------------------->
                <div class="modal-body method_div" style='display:none'>
                   
                   <form action="WithDraws/withdraw_fund" method="post" id="withdraw_form">
                   
                    <div class="form-group" style="margin-bottom: 1px;" id="withdrawal3">
                     <label><h4>Enter Withdrawal Amount</h4></label>
                    <input type='text' placeholder='Enter Withdrawal Amount' data-avail="<?php echo $myblnc;?>" name="withdrawal" class="form-control withdraw_amount" id="withdrawal2">
                    <p class='error'></p>
                    </div>
                    
                    <div class="form-group">
                       <p><strong> Available Balance :  $<?php echo number_format($myblnc,2);?> </strong> </p>
                       
                   </div>
                    
                    <div class="form-group paypalacco"style="padding: 16px;">
                              
                             <input type="radio" id="paypal_acco" <?php echo ($myuser['paypal_email'] != "")? "" : "disabled" ; ?> class='payment_select' name="account" value="paypal_account" /> PAYPAL ACCOUNT <span class="paypalacco2"><button type="button" class='btn btn-sm btn-primary add_new'><?php echo ($myuser['paypal_email'] != "")? "Edit" : "Add" ; ?></button></span>
                             
                              <div style="margin-top:26px;display:none" id="paypal_email">
                                  <input type='text' name="email3" readonly id="user_ques" value="<?php echo $myuser['paypal_email'];?>" placeholder="Add Email Address" class="form-control">
                                  <!--<input style="margin-top:10px" type='text' name="confrim_email" id="user_ques" placeholder="Confrim Email Address" class="form-control">-->
                                  <!--<input style="margin-top:10px" type='number' name="withdrawal_amount"  placeholder="Enter Withdrawal Account" class="form-control">-->
                                </div>
                              
                          </div>
                            
                            <div class="form-group paypalacco" style="padding: 16px;">
                                <input type="radio"  id="payoneer_acco" class='payment_select' <?php echo ($myuser['payoneer_email'] != "")? "" : "disabled" ; ?>  name="account" value="payoneer_account" /> PAYONEER ACCOUNT <span class="paypalacco2"><button type="button" class='btn btn-sm btn-primary add_new'><?php echo ($myuser['payoneer_email'] != "")? "Edit" : "Add" ; ?></button></span>
                                  <div style="margin-top:26px;display:none" id="payoneer_email">
                                    <input type='text' name="email3" readonly value="<?php echo $myuser['payoneer_email'];?>" id="user_ques" placeholder="Add Email Address" class="form-control">
                                    <!--<input style="margin-top:10px" type='text' name="confrim_email" id="user_ques" placeholder="Confrim Email Address" class="form-control">-->
                                    <!--<input style="margin-top:10px" type='number' name="withdrawal_amount"  placeholder="Enter Withdrawal Account" class="form-control">-->
                                 </div>
                            
                            </div>
                            
                            <div class="form-group paypalacco" style="padding: 16px;">
                                <input type="radio" id="strip_acco" class='payment_select' name="account" <?php echo ($myuser['stripe_email'] != "")? "" : "disabled" ; ?> value="payoneer_account" /> STRIPE ACCOUNT <span class="paypalacco2"><button type="button" class='btn btn-sm btn-primary add_new'><?php echo ($myuser['stripe_email'] != "")? "Edit" : "Add" ; ?></button></span>
                                 <div style="margin-top:26px;display:none" id="strip_email">
                                    <input type='text' name="email3" readonly value="<?php echo $myuser['stripe_email'];?>" id="user_ques" placeholder="Add Email Address" class="form-control">
                                    <!--<input style="margin-top:10px" type='text' name="confrim_email" id="user_ques" placeholder="Confrim Email Address" class="form-control">-->
                                    <!--<input style="margin-top:10px" type='number' name="withdrawal_amount"  placeholder="Enter Withdrawal Account" class="form-control">-->
                                </div>
                            </div>
                           
                           <p style='color:red' class="error_method"></p> 
                           
                          <div class="col-sm-12 text-center">
                                <label class="labeldesc"><input type="checkbox" class='final_checkbox'> I confimed that i have used my correct account details</label>
                                <p style="color:red" class='final_check'></p>
                            </div>
                            
                             <div class="col-sm-12 text-center">
                               <button type="submit" class="btn btn-primary mb-2 withdrawalbtn23" style="background:#5bc0de;color:#ffff;border:none">Withdraw</button>
                          </div>
                        
                    </form>
                </div>
              </div>
            </div>
          </div>
          
          
          <?php if(!empty($withdrawal1)) { ?>
          <!-- Modal ADD NEW ACCOUNT -->
              <div class="modal fade" id="addaccount" role="dialog">
                <div class="modal-dialog modal-lg" style="width: 99%">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h2 class="modal-title">Choose WithDrawal Account1</h2>
                    </div>
                    <div class="modal-body account_new">
                        <form>
                            
                            <?php foreach($withdrawal1 as $value){ 
                              if( $value['account_name']=="PayPal"){ ?>
                            
                          <div class="form-group "style="padding: 16px;">
                              
                             <input type="radio" id="paypal_acco" name="account" value="paypal_account" />  <img src="uploads/download.png" style="    margin-right: 54px;">  PAYPAL ACCOUNT
                        
                              <div style="margin-top:26px;display:none" id="paypal_email">
                                  <input type='text' name="email3" id="user_ques" placeholder="Add Email Address" class="form-control">
                                  <input style="margin-top:10px" type='text' name="confrim_email" id="user_ques" placeholder="Confrim Email Address" class="form-control">
                                  <input style="margin-top:10px" type='number' name="withdrawal_amount"  placeholder="Enter Withdrawal Account" class="form-control">
                                </div>
                              
                          </div>
                            <?php } else if($value['account_name']=="Payoneer") {?>
                            <div class="form-group" style="padding: 16px;">
                                <input type="radio"  id="payoneer_acco" name="account" value="payoneer_account" /><img src="uploads/download (1).png" style="width: 34px;">PAYONEER ACCOUNT (PREPAID CARD / WITHDRAW TO YOUR LOCAL BANK ACCOUNT)
                                  <div style="margin-top:26px;display:none" id="payoneer_email">
                                    <input type='text' name="email3" id="user_ques" placeholder="Add Email Address" class="form-control">
                                    <input style="margin-top:10px" type='text' name="confrim_email" id="user_ques" placeholder="Confrim Email Address" class="form-control">
                                    <input style="margin-top:10px" type='number' name="withdrawal_amount"  placeholder="Enter Withdrawal Account" class="form-control">
                                 </div>
                            
                            </div>
                            <?php } elseif($value['account_name']=="Strip"){ ?>
                            
                            <div class="form-group" style="padding: 16px;">
                                <input type="radio" id="strip_acco" name="account" value="payoneer_account" /><img src="uploads/stripe.png" style="width: 34px;">STRIPE ACCOUNT
                                 <div style="margin-top:26px;display:none" id="strip_email">
                                    <input type='text' name="email3" id="user_ques" placeholder="Add Email Address" class="form-control">
                                    <input style="margin-top:10px" type='text' name="confrim_email" id="user_ques" placeholder="Confrim Email Address" class="form-control">
                                    <input style="margin-top:10px" type='number' name="withdrawal_amount"  placeholder="Enter Withdrawal Account" class="form-control">
                                </div>
                            </div>
                            <?php } } ?>
                               <button type="submit" class="btn btn-primary submit_btn" style="margin-top:6px">Add</button>
                        </form>
                    </div>
                    
                  </div>
                </div>
              </div>
              <?php } ?>
                     
          <!-- Modal ADD NEW ACCOUNT2 -->
              <div class="modal fade addaccount2" id="addaccount2" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h2 class="modal-title">Withdarwal Accounts</h2>
                    </div>
                    <div class="modal-body account_new">
                        
                         <h3> Available Withdrawal Account</h3>
                        <div class='col-sm-12 '>
                            <p class="available-method"></p>
                        </div>
                        
                        <h3> Add New Withdrawal Account</h3>
                        <div class='col-sm-12 new_account'>
                        <form action="<?php echo base_url()?>Payment/addwithdrawal" id='add_nw_acct' method="POST">
                            
                            
                         
                        </form>
                        </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              
              
              
              <?php if(!empty($userdata2['gateway_id'])) { ?>
          <!-- Modal ADD NEW ACCOUNT -->
              <div class="modal fade" id="addaccount3" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                     
                    
                    <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h2 class="modal-title">Choose WithDrawal Account</h2>
                      
                    </div>
                    <div class="modal-body account_new">
                        <form action="<?php echo base_url()?>Payment/addwithdrawaldetail" method="Post">
                            
                            <?php 
                              
                              $gatewayid=$userdata2['gateway_id'];
                              
                              $gatewayrecord=$this->db->query("select * from payment_gateway where id='$gatewayid'")->result_array()[0];
                              
                               if( $gatewayrecord['id']==$userdata2['gateway_id']){ ?>
                         
                          <div class="form-group "style="padding: 16px;">
                              
                             <input type="radio" id="accountname" name="accountname" /> <?php echo $gatewayrecord["Name"] ?>
                        
                               <div style="margin-top:26px;display:none" id="accountemail">
                                  <?php if(empty($userdata2['gateway_email'])) { ?>
                                  <input type='text' name="gatewayemail" id="user_ques" placeholder="Add Email Address" class="form-control usergatewayemail">
                                  <input style="margin-top:10px" type='text' name="confrim_gatewayemail" id="user_ques" placeholder="Confrim Email Address" class="form-control">
                                  <?php } ?>
                                  <input style="margin-top:10px" type='number' name="gatewayamount"  placeholder="Enter Withdrawal Account" class="form-control usergatewayamount">
                                
                                   <button type="submit" class="btn btn-primary submit_btn submit_btn3" style="margin-top:6px">Add</button>
                                   <!--<button type="button" class="btn btn-primary submit_btn submit_btn4" style="margin-top:6px">Add</button>-->
                               </div>
                              
                          </div>
                          
                            </div>
                        
                            <?php }  ?>
                            
                              </form>
                             
                    </div> 
                              
                        
                    </div>
                    
                  </div>
                </div>
              </div>
              <?php }else{ ?>
              
               <div class="modal fade" id="addaccount3" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                     
                    
                    <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">WithDrawal Account Avaliabel</h4>
                      
                    </div>
                    <div class="modal-body account_new">
                        
                        <form action="<?php echo base_url()?>Payment/addwithdrawal2" method="POST">
                            <?php 
                                foreach($payment_gateway as $gateway_value){ 
                                    if($gateway_value['id']==1){
                                        if(empty($myuser['payoneer_email'])){
                                            continue;
                                        }else{
                                            $withdrawl_email = $myuser['payoneer_email'];
                                        }
                                    }else if($gateway_value['id']==2){
                                        if(empty($myuser['stripe_email'])){
                                            continue;
                                        }else{
                                            $withdrawl_email = $myuser['stripe_email'];
                                        }
                                    }else if($gateway_value['id']==3){
                                        if(empty($myuser['paypal_email'])){
                                            continue;
                                        }else{
                                            $withdrawl_email = $myuser['paypal_email'];
                                        }
                                    }
                            ?>
                          <div class="form-group "style="padding: 0 0 0 16px;">
                             <input type="radio" id="paypal_acco" name="account_id" value="<?php echo $gateway_value["id"]; ?>" /> <?php echo $gateway_value['Name']."(".$withdrawl_email.")"; ?>
                          </div>
                          <?php } ?>
                          
                          <div class="form-group "style="padding: 0 0 0 16px;">
                              <label>Amount to withdrawl($)</label>
                             <input type="text" class="form-control" name="amount" value="<?php echo $myblnc;?>" style="margin-top:6px">
                          </div>
                          
                          <div class="form-group "style="padding: 0 0 0 16px;">
                             <button type="submit" class="btn btn-primary submit_btn" style="margin-top:6px">Add</button>
                          </div>
                       
                               
                        </form>
                              
                        
                    </div>
                    
                  </div>
                </div>
              </div>
                  
              
            <?php  } ?>
              
              

    <script>
        $(function() {
             $('#new_document').change(function(){
                for(var i = 0 ; i < this.files.length ; i++){
                  var fileName = this.files[i].name;
                  $('.attach_file').html('');
                  $('.attach_file').append("<i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' , ');
                }
             });
             
               $('#new_document1').change(function(){
                for(var i = 0 ; i < this.files.length ; i++){
                  var fileName = this.files[i].name;
                  $('.attach_file1').html('');
                  $('.attach_file1').append("<i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' , ');
                }
             });
             
            });
            
            $(document).ready(function(){
              $("#control_panel").hide();  
            });
        $(document).ready(function(){
            $(".payment_method").click(function(){
                 $("#mymony_model").hide();
                 $("#control_panel").hide();
                 $("#payment_model").show();
            });
            
            $(".add_new").click(function(){
                 
                 $("#mymony_model").hide();
                 $("#control_panel").hide();
                  $(".tab").removeClass('active');
                 $(".payment_method").parent('.tab').addClass('active');
                 $("#payment_model").show();
                 $('#withdraw_model').modal('hide');
            });
            
            
            $(".mymony").click(function(){
                $("#mymony_model").show();
                $("#control_panel").hide();
                $("#payment_model").hide();
              });
            
            
             $(".control_panel").click(function(){
                $("#mymony_model").hide();
                $("#control_panel").show();
                $("#payment_model").hide();
              });
            
        });
            
            $(document).ready(function() {
                $(".tab").click(function () {
                    $(".tab").removeClass("active");
                    // $(".tab").addClass("active"); // instead of this do the below 
                    $(this).addClass("active");   
                });
            });
            
            $(document).ready(function(){
            $(".buyer_escrow").click(function(){
            $(".payment_card_buyer").css('border','1px solid #5bc0de');
            $(".payment_card_surf").css('border','none');
            $(".payment_card_frrelancer").css('border','none');    
            $(".buyer_escrow_detail").show();
            $(".surfaccount").hide();
            $(".freelancer_escrow_detail").hide();
              $('#exportocsv').attr('href','<?php echo base_url()."Payment/exportCSV/freelance_escrow"; ?>');
              });   
            });
            
            
            $(document).ready(function(){
            $(".surfnwork_acco").click(function(){
            $(".payment_card_surf").css('border','1px solid #5bc0de');
            $(".payment_card_buyer").css('border','none'); 
            $(".payment_card_frrelancer").css('border','none');
            
            $(".surfaccount").show();
            $(".buyer_escrow_detail").hide();
            $(".freelancer_escrow_detail").hide();
              $('#exportocsv').attr('href','<?php echo base_url()."Payment/exportCSV/myblnc"; ?>');
              });   
            });
            
            
            $(document).ready(function(){
            $(".freelancer_escrow").click(function(){
            $(".payment_card_frrelancer").css('border','1px solid #5bc0de');
            $(".payment_card_surf").css('border','none');
            $(".payment_card_buyer").css('border','none'); 
            $(".freelancer_escrow_detail").show();
            $(".buyer_escrow_detail").hide();
            $(".surfaccount").hide();
              $('#exportocsv').attr('href','<?php echo base_url()."Payment/exportCSV/buyer_escrow"; ?>');
              });   
            });
            
            
            $(document).ready(function(){
            $(".add_newaccount2").click(function(){
            $(".save_btn2").show();
              });   
            });
            
            
            $(document).ready(function(){
             $(".submit_button").click(function(){
             $(".submit_button").hide();     
               $(".show_div").show();
               $(".show_div").css("height","auto");
             });  
            });
            
            
            $(document).ready(function(){
             $(".cross_btn").click(function(){
             $(".submit_button").show();
             $(".show_div").hide();
                 
             });  
            });
          
           $(document).ready(function(){
               
                 $(document).on('change','#record_filter',function(){
                     //alert($(this).val());
                     if($(this).val() == 5){
                        $('#custom_range').show();
                     }else{
                        $('#custom_range').hide();
                       window.location.href = "<?php echo base_url()."Payment/filteration";?>/"+$(this).val();
                     }
                 });  
                 
                 $(function() {

                  $('input[name="datefilter"]').daterangepicker({
                      autoUpdateInput: false,
                      locale: {
                          cancelLabel: 'Clear'
                      }
                  });
                
                  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                      
                      $('#range_date #values').html('<input type="hidden" name="start_date" value="'+picker.startDate.format('YYYY-MM-DD hh:mm:ss')+'"><input type="hidden" name="end_date" value="'+picker.endDate.format('YYYY-MM-DD hh:mm:ss')+'">');
                      
                      $('#range_date').submit();
                      
                      //window.location.href = "<?php echo base_url()."";?>/"+$(this).val();
                  });
                
                  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                      $(this).val('');
                  });
                
                });
                 
                 
            });
            
         $(document).ready(function(){
          $('#strip_acco').change(function(){
           if($('#strip_acco').is(':checked')) 
          {
              $(".add_btn").show();
             $('#strip_email').show();
             $('#payoneer_email').hide();
              $('#paypal_email').hide();
              
          }
    
        });
        
         $('#payoneer_acco').change(function(){
           if($('#payoneer_acco').is(':checked')) 
          {
             $('#payoneer_email').show();
             $(".add_btn").show();
              $('#strip_email').hide();
              $('#paypal_email').hide();
          }
    
        });
        
         $('#paypal_acco').change(function(){
           if($('#paypal_acco').is(':checked')) 
          {
             $('#paypal_email').show();
             $(".add_btn").show();
              $('#strip_email').hide();
              $('#payoneer_email ').hide();
          }
    
        });
    });
    
    
    $(document).ready(function(){
        
      $("#user_ques1").keyup(function(){
         var security_ques= $('#security_ques').val();
          var user_ques= $('#user_ques1').val();
          if(security_ques==user_ques)
          {
              $("#error_withdrawal").hide();
             $('.submit_btn1').removeAttr("disabled");
          }else
          {
              $("#error_withdrawal").show();
               $('.submit_btn1').attr("disabled","disabled");
          }
      });
      
      
      
      $(document).on('change','.withdraw_amount',function(){
          
          var data_org =  $(this).data('avail');
          
          if(Number($(this).val()) > Number(data_org) ){
              
              $('.error').text('Amount is exceed from the balance');
          }else{
              $('.error').text(''); 
          }
          
      });
      
      $(document).on('click','.secuirtyquestioncheck',function(){
          
          
        
            if($('.security option:selected').val() != 0 && $('.security_ans').val() != ""){
                
                var security_q = $('.security option:selected').val();
                var security_a = $('.security_ans').val()
                var userid = $('.userid').val();
                
                $.ajax({
                    url: "Setting/checkSecurity", 
                    type: 'POST',
                    data: {'userid':userid,'security_q':security_q,'security_a':security_a},
                    async: false,
                    dataType: "json",
                    beforeSend:function(){
                     $('.secuirtyquestioncheck').html('Checking... <i class="fa fa-spinner fa-spin"></i>')  ; 
                    },
                    success: function (respnse) { 
                         $('.secuirtyquestioncheck').html('SUBMIT')  ; 
                        if(respnse.error){
                            alert('Not found!');
                        }else{
                            $('.security_div').hide();
                            $('.answer_security_question').text("Withdraw Method");
                            $('.method_div').show();
                            
                           // alert('Verified successfully!');
                          /* var accnts="",accnts_already="",paypal=false,payoneer=false,stripe=false;
                           
                           var accounts_details = respnse.accounts;
                           
                           if(accounts_details.length > 0){
                               
                               for(var i = 0; i < accounts_details.length ; i ++){
                                   
                                   var single = accounts_details[i];
                                   
                                   if(single.account_name == "PayPal"){
                                       paypal = true;
                                       accnts_already += "PayPal , ";
                                       
                                   }else if(single.account_name == "Payoneer"){
                                       payoneer = true;
                                       accnts_already += "Payooneer , ";
                                   }else if(single.account_name == "Stripe"){
                                       stripe= true;
                                        accnts_already += "Stripe , ";
                                   }
                                   
                               }
                               
                               if(!paypal){
                                   accnts +='<div class="form-group "style="padding: 16px;"> <input type="radio" data-id="1" id="paypal_acco1" class="pay_id" name="account1" value="PayPal"/> <img src="uploads/download.png" class="pay" style="margin-right: 54px;"> <p style="width: 300px;display: inline;"> PAYPAL ACCOUNT </p></div><input style="display:none" type="email" class="form-control form-group" name="email" placeholder="enter your account email">';
                               }
                               if(!payoneer){
                                   accnts = '<div class="form-group" style="padding: 16px;"> <input type="radio" data-id="2" id="payoneer_acco1" class="pay_id" name="account1" value="Payoneer"/><img src="uploads/download (1).png" style="width: 34px;"><p>PAYONEER ACCOUNT (PREPAID CARD / WITHDRAW TO YOUR LOCAL BANK ACCOUNT)</p></div><input style="display:none" type="email" name="email" placeholder="enter your account email">';
                               }
                               if(!stripe){
                                   
                                   accnts ='<div class="form-group" style="padding: 16px;"> <input type="radio" data-id="3" id="strip_acco1" class="pay_id" name="account1" value="Strip"/><img src="uploads/stripe.png" style="width: 34px;"><p style="width: 300px;display: inline;">STRIPE ACCOUNT</p></div><input style="display:none" type="email" name="email" placeholder="enter your account email">';
                               }
                               
                               
                           }else{
                               accnts_already = "<p style='color:red'>No accounts added yet!</p>";
                            accnts = '<div class="form-group "style="padding: 16px;"> <input type="radio" data-id="1" id="paypal_acco1" class="pay_id" name="account1" value="PayPal"/> <img src="uploads/download.png" class="pay" style="margin-right: 54px;"> <p style="width: 300px;display: inline;"> PAYPAL ACCOUNT </p></div><input style="display:none" type="email" name="email" placeholder="enter your account email"><div class="form-group" style="padding: 16px;"> <input type="radio" data-id="2" id="payoneer_acco1" class="pay_id" name="account1" value="Payoneer"/><img src="uploads/download (1).png" style="width: 34px;"><p>PAYONEER ACCOUNT (PREPAID CARD / WITHDRAW TO YOUR LOCAL BANK ACCOUNT)</p></div><input style="display:none" type="email" name="email" placeholder="enter your account email"><div class="form-group" style="padding: 16px;"> <input type="radio" data-id="3" id="strip_acco1" class="pay_id" name="account1" value="Strip"/><img src="uploads/stripe.png" style="width: 34px;"><p style="width: 300px;display: inline;">STRIPE ACCOUNT</p></div><input style="display:none" type="email" name="email" placeholder="enter your account email">';
                           }
                           accnts +=' <button type="submit" class="btn btn-primary submit_btn" style="margin-top:6px">Add Account</button>';
                           ///$('.available-method').html(accnts_already);
                          // $('#add_nw_acct').html(accnts);
                          // $('#withdraw_model').modal('hide');
                            
                           $('#addaccount2').modal('show');*/
                        }
                    }
                });
          
            }else{
                alert('Please fill the and pick question properly!');
            }
        });
      
      $(document).on('click','.pay_id',function(){
              if($(this).is(':checked')){
                 
                 $(this).parents('.form-group').siblings('input').css('display','block');
                 
              }else{
                $(this).parents('.form-group').siblings('input').css('display','none');
                  
              }
          });
      
    });
          
          
          
          
            $(document).ready(function(){
          $('.submit_btn1').click(function(){
          var security_ques= $('#security_ques').val();
          var user_ques= $('#user_ques1').val();
          if(security_ques==user_ques)
          {
               $('.withdraw_model').hide();
               $('.submit_btn1')
          }
          else
          {
              $('.addaccount2').hide();
             // $('#addaccount2').modal('hide');
             // $('#addaccount2').modal().hide();
          }
              

        });
    });
    
    
    
       
       
$("input[name='withdrawal_amount']").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
});

 
   $(document).on('click','.secuirtyquestioncheck2',function(){
        
            if($('.security_ans').val() != ""){
                
                var security_q = $('.security').data('id');
                var security_a = $('.security_ans').val()
                var userid = $('.userid').val();
                
                $.ajax({
                    url: "Setting/checkSecurity", 
                    type: 'POST',
                    data: {'userid':userid,'security_q':security_q,'security_a':security_a},
                    async: false,
                    dataType: "json",
                    beforeSend:function(){
                     $('.secuirtyquestioncheck').html('Checking... <i class="fa fa-spinner fa-spin"></i>')  ; 
                    },
                    success: function (respnse) { 
                         $('.secuirtyquestioncheck').html('SUBMIT'); 
                           if(respnse.error){
                            alert('Incorrect! Please Add or Update your Security Question from Setting!');
                        }else
                        {
                             $('.security_div').hide();
                            $('.answer_security_question').text("Select Withdraw Method");
                            $('.method_div').show();
                        }
                        
                         
                    }
                });
          
            }else{
                alert('Please fill the and pick question properly!');
            }
        }); 
 
 
     $(document).ready(function(){
          $('#strip_acco2').change(function(){
           if($('#strip_acco2').is(':checked')) 
          {
              $(".add_btn").show();
             $('#strip_email1').show();
             $('#payoneer_email').hide();
              $('#paypal_email').hide();
              
          }
    
        });
        
         $('#payoneer_acco').change(function(){
           if($('#payoneer_acco').is(':checked')) 
          {
             $('#payoneer_email').show();
             $(".add_btn").show();
              $('#strip_email').hide();
              $('#paypal_email').hide();
          }
    
        });
        
         $('#paypal_acco').change(function(){
           if($('#paypal_acco').is(':checked')) 
          {
             $('#paypal_email').show();
             $(".add_btn").show();
              $('#strip_email').hide();
              $('#payoneer_email ').hide();
          }
    
        });
    });
    
     $(document).on('click','#accountname',function(){
               $("#accountemail").show();
                 
          });
          
    $(document).on('click','.payment_select',function(){
        
        if($(this).is(':checked')){
           $('.error_method').text('');
        }
        
    })
    
    $(document).on('click','.final_checkbox',function(){
        
        if($(this).is(':checked')){
           $('.final_check').text('');
        }else{
            $('.final_check').text('Please Confirm');
            
        }
        
    })
    
    
    $(document).on('submit','#withdraw_form',function(){
        
        if($('.withdraw_amount').val() == ""){
             $('.error').text('Must fill the Amount!');
             return false;
        }else if($('.payment_select').is(':checked') == false){
              $('.error_method').text('Please Pick the Payment Method or Add new');
              return false;
            
        }else if($('.final_checkbox').is(':checked') == false){
            $('.final_check').text('Please Confirm');
             return false;
        }else{
            
            $(this).submit();
        }
        
        
    });
    
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
        
        

    </script>
<?php include("includes/front_end_footer.php");?>

 