<?php include("includes/front_end_header.php");?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/paymentpage.css">
<style>

    .nav-tabs {
        margin-top: 4px;verify_document2
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
        background-color: #009247!important;
        border: 1px solid #009247!important;
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
       
    }
    .nav-tabs li a:hover{
        color: #fff;
         background-color: #009247!important;
        
    }
    @media screen and (max-width: 766px) and (min-width: 340px)
    {
        #main_container {
            padding-top: 109px !important;
        }
        
        .payment_menu ul li{
            margin-left: 2px !important;
        }
    }
    
  @media screen and (max-width: 434px) {
 
   
    .modal{
        width: 80%;
        margin: auto;
    }
  }
  
  .payment{
        background: #fff;
        width: 90%;
        margin: 20px auto;
        padding-left: 22px;
        padding-right: 22px;
        box-shadow: 0 0 10px -3px grey;
    }
    .payment_menu{
        background: #eeeeee;
    }
    
        .payment_menu ul{
        list-style: none;
        padding: 0;
        
    }
    .payment_menu ul li{
        float: left;
        margin-left: 10px;
        
    }
    
     .payment_card{
    padding-left: 10px;
    padding-right: 11px;
   box-shadow: 0 0 10px -3px gainsboro;
    padding-top: 19px;
    padding-bottom: 15px;
    margin-top: 10px;
    background:#fff;
    border-radius: 6px;
    width: 100% !important;
    }
    .payment_card h4{
          font-size: 15px;
        color: #717070;
        font-weight: bold;
    }
    .payment_card h5{
        color: #717070;
        font-weight: bold;
    }
    .payment_detail{
        background: #fff;
        margin-top: 20px;
    }
    .payment_detail p{
        padding: 5px;
        font-weight: bold;
        margin-bottom: 0;
        font-size: 11px;
    }
    .payment_header{
        padding: 0;
        margin: 0;
        background: #eee;
    }
    .payment_row{
        border-bottom: 1px solid #8080801a!important;
        padding: 0;
        margin: 0;
    }
    .payment_left{
       color:black;
        padding-top: 10px;
        
    }
    .right_heading{
        border-bottom: 1px solid #8080801a!important;
        padding: 0;
        margin: 0;
        font-weight: bold;
    }
    .right_heading_second{
        padding: 0;
        margin: 0;
        font-weight: bold;
        padding-top: 20px;
    }
    .right_heading_second h5{
        font-weight: bold;
        padding-left: 13px;
    }
    .right_heading h5{
        font-weight: bold;
        padding-left: 13px;
    }
    .right_detail{
        padding: 0;
        margin: 0;
        padding-top: 7px;
    }
    .currancy_row{
        background: #eeeeee;
        padding: 10px;
        margin: 20px 0;
    }
    .currancy_row h5{
        font-weight: bold;
    }
    .cur_detail{
        margin: 0;
    }
    .cur_detail {
        margin: 14px 0;
        padding-bottom: 26px;
        border-bottom: 1px solid #ded7d7;
    }
    .withdraw_btn{
        background:#5bc0de;
        color:#fff;
    }
    .withdraw_btn:hover{
        background:#5bc0de;
        color:#fff;
    }
    .price_dollor{
        color: #5bc0de;
    }
    .ok_btn{
        background:#5bc0de;
        color: #fff;
        padding: 6px 24px;
    }
    .ok_btn:hover{
         background:#5bc0de;
        color:#fff;
    }
   .payment_method{
        border-bottom: 1px solid #f1e9e9;
        padding: 15px;
    }
    
        @media screen and (max-width: 767px){
        .payment_left{
            margin-top: 10px;
            border-radius: 5px;
        }
        .payment h1{
            font-size: 20px;
            padding-bottom: 10px;
        }
        .payment_card h4{
            font-size: 14px;
        }
        .payment_card h5{
            font-size: 11px;
        }
        .payment_leftside{
            
        }
    }
    
     .payment_leftside{
         padding:9px;   
        }
    .edi_collapse{
        background: #eeeeee;
        padding: 5px;
        margin: 6px 0;
    
    }
    .detail_collpse{
        padding: 13px;
    }
    .approved_btn{
        background: #5bc0de;
        color: #fff;
    }
    .approved_btn:hover{
        color: #fff;
    }
    .view_btn{
        color:#5bc0de;
    }
    .detail_collpse img{
        width: 17px;
        margin-right: 17px;
    }
    .detail_collpse i{
        margin-top: 8px;
        font-size: 13px;
        color: #333;
    }
    #payment_model{
        display: none;
    }
    .add_newaccount{
        color: #009247;
        font-weight: bold;
        border: 1px solid #009247;
    }
    .add_newaccount:hover{
        color: #009247;
    }
    .addbtn_row{
        text-align: center;
        background: #fff;
        width: 97%;
        padding: 12px;
        margin: auto;
    }
    .account_new img{
        width: 20px;
        margin: 0 41px;
    }
    #addaccount{
        top: 290px!important;
    }
    

@media screen and (max-width: 517px) and (min-width:340px){

.invoicee_detailse_wapr{
        overflow-x: auto!important;
        width: 100%!important;
    }
    .invoicee_detailse{
       width: 614px!important;
        overflow-x: auto!important;
    }
    
     .invoicee_detailse2{
       width: 487px!important;
        overflow-x: auto!important;
    }
    
}
    
.price_dollor_button
{
    margin-top:10px;
    
}


.transcation_ul
{
    display:flex;
    list-style-type:none;
    padding:0px;
}

.transcation_ul >li
{
    margin-right: 31px;
    padding-bottom: 10px;
}

.transcation_li
{
    margin-top:3px;
    color:#5bc0de;
}


@media screen and (max-width: 765px) and (min-width:340px){
.transcation_ul >li
{
    margin-right: 20px;
    padding-bottom: 10px;
}

.payment_card {
    padding-top: 28px;
    padding-bottom: 27px;
    margin-top: 10px;
    margin:auto;
}

.payment_card_div
{
    margin-bottom: 11px;
}


}

.account_span
{
margin-right:10px;
}

.nav-tabs2>li
{
    padding-right: 16%;
}


@media screen and (max-width: 764px) and (min-width:386px){
.nav-tabs2>li{
          padding-right:0%;
       }

.payment_methodnew{
    padding-left: 13px !important;
}
    
}



@media screen and (max-width: 765px) and (min-width:340px){
.transcation_ul >li
{
    margin-right: 20px;
    padding-bottom: 10px;
}
}


@media screen and (max-width: 386px) and (min-width:345px){

.transcation_ul >li {
    margin-right: 7px !important;
}
    
}

@media screen and (max-width: 764px) and (min-width:340px){
.nav-tabs2>li {
    padding-right: 0%;
    
}
}


.circle {
  position: relative;
  transition: all 0.75s ease-in-out 0s;
  cursor: pointer;
}

.circle::after, .circle::before {
  border-radius: 156px;
  content: "";
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  transform: scale(0);
  transition: all 0.5s ease-in-out 0s;
  width: 100%;
  z-index: 3;
}

.circle::before {
  border: 2px solid #009247;
  transform-origin: 0 100% 0;
}

.circle::after {
  border: 2px solid #009247;
  transform-origin: 100% 0 0;
}

.circle:hover::after, button:hover::before {
  transform: scale(1,1);
}

.spin{
    cursor:pointer;
}
.spin::before,
.spin::after {
    top: 0;
    left: 0;
}

.spin::before {
    border: 2px solid transparent;
}

.spin:hover::before {
    border-top-color: #009247;
    border-right-color: #009247;
    border-bottom-color: #009247;
    transition: border-top-color 0.15s linear, border-right-color 0.15s linear 0.10s, border-bottom-color 0.15s linear 0.20s;
}

.spin::after {
    border: 0 solid transparent;
}

.spin:hover::after {
    border-top: 2px solid #009247;
    border-left-width: 2px;
    border-right-width: 2px;
    transform: rotate(270deg);
    transition: transform 0.4s linear 0s, border-left-width 0s linear 0.35s, -webkit-transform 0.4s linear 0s;
}



.circle1::before,
.circle1::after {
    border-radius: 100%;
}

.circle3 {
    border: 0;
    position: relative;
}






.cross_btn:hover{
    cursor:pointer;
}

.attach_docbtn
{
    text-align:right;
}
@media screen and (max-width: 764px) and (min-width:340px){
   .attach_docbtn
   {
   text-align: center;
    margin-top: 44px;
   }
}


@media screen and (max-width: 409px) and (min-width:340px){
.verify_document
   {
       margin:0px;
       padding:0px;
   }
}


.verify_document2
{
    margin-top: 9px;
}

@media screen and (max-width: 764px) and (min-width:340px){
   .verify_document2
   {
       text-align: right;
   }
}

#edit_doc3
{
 height:auto!important;   
}

.description
{
    margin-top: 9px;
}

#error_withdrawal{
     margin-top: 9px;
     color:red;
}



/************************************************************/

.WrprJobTitle{padding-top:12px;}
.WrprPaymentSummary{border: 1px solid #ccc;padding-bottom:20px;}
.serviceQty{
    width: 59px;
    margin-left: 21px;
    margin-bottom: 5px;
}

@media screen and (max-width: 765px) {
 .section-padding
 {
     padding:0px !important;
 }
 
 .chekc_box
 {
     float:left;
 }
 
 .chekc_box1
 {
     float:left;
     margin-left:0px !important;
 }
 
 
 .chekc_box2
 {
     float:left;
 }
}


@media screen and (max-width: 922px) and (min-width:340px){
.checkbox label
{
 display: inline-block;   
}

}
#surfnwork_head1
{
    color:#fff;
}
#surfnwork_head2
{
    color:#fff;
}

@media screen and (max-width: 764px) and (min-width:340px){
.payment_card_div2
{
    margin-top:10px;
}

.edit_tabcollapse{
    margin-top: 10px;
}

}

</style>

    <div class="container-fluid payment">
        <div class="row" style="padding: 10px;">
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
                            <div class="payment_card payment_card_surf surfnwork_acco answer_1  circle_div circle1 circle3" style="background:#707276">
                                <h4 id="surfnwork_head1">My Gigeconome User Account</h4>
                                <h5 id="surfnwork_head2">Available Money</h5>
                                   <div class="col-sm-12" style="padding:0px">
                                     <table class="table">
                                        <thead style="background:#009247">
                                          <tr>
                                            <th style="color:#fff"><strong>Currency</strong></th>
                                            <th style="color:#fff"><strong>Amount</strong></th>
                                          </tr>
                                        </thead>
                                        <tbody style="background:#fff">
                                          <!--<tr>-->
                                          <!--  <td>Pond sterling</td>-->
                                          <!--  <td style="color:black"><strong>£0.00</strong></td>-->
                                          <!--</tr>-->
                                          <!--<tr>-->
                                          <!--  <td>Euro</td>-->
                                          <!--  <td style="color:black"><strong>€0.00</strong></td>-->
                                          <!--</tr>-->
                                          <tr>
                                            <td>Pound</td>
                                            <td style="color:black"><strong>£<?php echo number_format($this->Common->myblnc($myuser['u_id']));?></strong></td>
                                            
                                          </tr>
                                        </tbody>
                                      </table>
                                   </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12" >
                          
                          <div class="payment_card payment_card_buyer buyer_escrow  circle_div circle1 circle3 " style="background:#dbdcdf">
                                <h4 style="color:#70747c">My Buyer Escrow</h4>
                                <h5 style="color:#70747c">Work others are doing for me </h5>
                                   <div class="col-sm-12" style="padding:0px">
                                     <table class="table">
                                        <thead style="background:#f8f9fc">
                                          <tr>
                                            <th style="color:black"><strong>Currency</strong></th>
                                            <th style="color:black"><strong>Amount</strong></th>
                                          </tr>
                                        </thead>
                                        <tbody style="background:#fff">
                                          <!--<tr>-->
                                          <!--  <td>Pond sterling</td>-->
                                          <!--  <td style="color:black"><strong>£0.00</strong></td>-->
                                          <!--</tr>-->
                                          <!--<tr>-->
                                          <!--  <td>Euro</td>-->
                                          <!--  <td style="color:black"><strong>€0.00</strong></td>-->
                                          <!--</tr>-->
                                          <tr>
                                            <td>Pound</td>
                                            <td style="color:black"><strong>£<?php echo number_format($buyerescrow); ?></strong></td>
                                            
                                          </tr>
                                        </tbody>
                                      </table>
                                   </div>
                            </div>
                          
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 payment_card_div payment_card_div2">
                            
                            <div class="payment_card payment_card_frrelancer freelancer_escrow  circle_div circle1 circle3 " style="background:#dbdcdf">
                                <h4 style="color:#70747c">My Freelancer Escrow</h4>
                                <h5 style="color:#70747c">Work I am doing for others</h5>
                                   <div class="col-sm-12" style="padding:0px">
                                     <table class="table">
                                        <thead style="background:#f8f9fc">
                                          <tr>
                                            <th style="color:black"><strong>Currency</strong></th>
                                            <th style="color:black"><strong>Amount</strong></th>
                                          </tr>
                                        </thead>
                                        <tbody style="background:#fff">
                                          <!--<tr>-->
                                          <!--  <td>Pond sterling</td>-->
                                          <!--  <td style="color:black"><strong>£0.00</strong></td>-->
                                          <!--</tr>-->
                                          <!--<tr>-->
                                          <!--  <td>Euro</td>-->
                                          <!--  <td style="color:black"><strong>€0.00</strong></td>-->
                                          <!--</tr>-->
                                          <tr>
                                            <td>Pound</td>
                                            <td style="color:black"><strong>£<?php echo number_format($freelancerescrow); ?></strong></td>
                                            
                                          </tr>
                                        </tbody>
                                      </table>
                                   </div>
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
                       <div class="col-sm-12" style="margin-top:17px">
                             <?php
                            if(($myuser['withdrawl_Acct_Status']=="Approved")){?>
                            
                             <a style="color:#white;cursor:pointer;background:#009247;border:none" class="btn btn-primary" data-toggle="modal" data-target="#withdraw_model2">Withdraw</a>
                             
                            <?php }else if($myuser['withdrawl_Acct_Status']=="Pending"){ ?>
                             <p style="color:red">Your documents are in Pending</p>
                            <?php    
                            }else if($myuser['withdrawl_Acct_Status']=="Not Approved"){ ?>
                                <p style="color:red">Your documents are not approved</p>
                            <?php }else if(empty($myuser['withdrawl_Acct_Status'])){ ?>
                             <p style="color:red">Documents not submitted</p>
                            <?php } ?>
                            
                            
                       
                      </div> 
                    <!--<div class="col-sm-12" style="margin-top:27px">-->
                    <!--    <h4>Transaction</h4>-->
                    <!--    <ul class="transcation_ul">-->
                    <!--        <li>-->
                    <!--            <select id='record_filter' style="border-radius: 11px;padding:2px">-->
                    <!--               <option value='0' disabled selected>Choose from selection</option>-->
                    <!--               <option value='1'>Last 7 days</option>-->
                    <!--               <option value='2'>Last 30 days</option>-->
                    <!--               <option value='3'>Previous Month</option>-->
                    <!--               <option value='4'>Previous Year</option>-->
                    <!--               <option value='5'>Custom Range</option>-->
                    <!--            </select>-->
                    <!--        </li>-->
                    <!--        <li style='display:none;' id='custom_range'><form action='Payment/filteration/5' id='range_date' method='post'><input type="text" placeholder='Date ranges...' name="datefilter" value="" /><div id='values'></div></form></li>-->
                           <!-- <li class="transcation_li"><a href="" style="color:#5bc0de;">Print</a></li>-->
                    <!--        <li class="transcation_li"><a href="<?php echo base_url()."Payment/exportCSV/myblnc"; ?>" id='exportocsv' style="color:#009247;">Export to CSV</a></li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                    
                  <!--     <div class="invoicee_detailse_wapr">-->
                  <!--  	<table class="table invoicee_detailse2 surfaccount" style="margin-top: 17px;">-->
                    	 
                  <!--  	 <thead style="background: #eeeeee" align='center'>-->
                		<!--   	<tr>-->
                		<!--   	    <th><h5>TrxID1</h5></th>-->
                		<!--   	    <th><h5>Date</h5></th>-->
                		<!--   	    <th><h5>Detail</h5></th>-->
                		<!--		<th><h5>Amount</h5></th>-->
                		<!--	    <th><h5>Action</h5></th>-->
                		<!--		<th><h5>Withdrawal</h5></th>-->
                		<!--	</tr>-->
                		<!--</thead>-->
                    	 
                  <!--  	 <tbody>-->
                    	   
                    	    
                  <!--  	     <tr>-->
                  <!--  	         <td><?php echo $i;?></td>-->
                  <!--  	        <td></td> -->
                  <!--  	       <td><</td>-->
                  <!--             <td></td>-->
                  <!--               <td></td>-->
                  <!--             <td></td>-->
                  <!--          </tr>    -->
                            
    			          
    		            <!--   </tbody>-->
                  <!--  </table>-->
                    
                  <!--  </div>-->
                    
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
                    <div class="row payment_method payment_methodnew">
                        <div class="col-sm-6 col-xs-6 verify_document">
                            <h5><b>Withdrawal Account</b></h5>
                        </div>
                        <div class="col-sm-6 col-xs-6 text-right">
                            <a href="#edit_doc1" class="edit edit_tabcollapse" style="color:#009247"data-toggle="collapse">Edit</a>
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
                                                <input type="button" value="Submit" id="submitpayoneer" class="btn btn-md" style="background:#009247 !important;color:white;"/>
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
                                                <input type="button" value="Submit" id="submitstripe" class="btn btn-md" style="background:#009247 !important;color:white;"/>
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
                                                <input type="button" value="Submit" id="submitpaypal" class="btn btn-md" style="background:#009247 !important;color:white;"/>
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
                            }else if($myuser['withdrawl_Acct_Status']=="Not Approved"){
                                 echo "Not Approved";
                            }
                            
                            ?>
                        </div>
                        
                        <?php if(empty($myuser['withdrawl_Acct_Status']) || $myuser['withdrawl_Acct_Status']=="Not Approved"){ ?>
                        
                        <div class="col-sm-4 col-xs-12 attach_docbtn">
                            <a href="#edit_doc2" class="submit_button btn btn-primary" data-toggle="collapse" style="background:#009247">
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
                                <label style="color:black">
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
                                   <label style="color:black">
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
                               
                                <div class="attach_file" style="margin-top: 10px;color:#428bca;"></div>
                                  <div class="attach_file1" style="margin-top: 10px;color:#428bca;"></div>
                                
                                   <button type="submit" class="btn btn-primary save_btn2" style="display:none">Submit</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 payment_leftside" id="control_panel">
                <div class="payment_left">
                   <?php 
                   
                   $start_date=date("Y-m-01");
                   $end_date=date("Y-m-t");
                   
                   $paidthismonth = $this->db->query("select sum(camount) as sum from transactions where u_id='".$myuser['u_id']."' and camount != damount and left(date,10) between '$start_date' and '$end_date'")->result_array()[0]['sum'];
                   
                   ?>
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Paid this month</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>£<?php echo number_format($paidthismonth,2)?></b></p>
                        </div>
                    </div>
                    
                    <?php 
                       
                       $paidtodate = $this->db->query("select sum(camount) as sum from transactions where u_id='".$myuser['u_id']."' and camount != damount")->result_array()[0]['sum'];
                   
                   ?>
                   
                   
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Paid to Date</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>£<?php echo number_format($paidtodate,2)?></b></p>
                        </div>
                    </div>
                    
                    <?php 
                    
                    $earnedthismonth = $this->db->query("select sum(damount) as sum from transactions where u_id='".$myuser['u_id']."' and in_escrow='No' and is_clear='Yes' and left(date,10) between '$start_date' and '$end_date'")->result_array()[0]['sum'];
                  
                    
                    ?>
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Earned this month</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>£<?php echo number_format($earnedthismonth,2)?></b></p>
                        </div>
                    </div>
                    
                    <?php 
                    $earnedtodate = $this->db->query("select sum(damount) as sum from transactions where u_id='".$myuser['u_id']."' and in_escrow='No' and is_clear='Yes'")->result_array()[0]['sum'];
                  
                    
                    ?>
                    
                    
                    <div class="row right_detail">
                        <div class="col-xs-8">
                            <p>Earned to Date</p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <p><b>£<?php echo number_format($earnedtodate,2)?></b></p>
                        </div>
                    </div>
                    <hr style="background-color: #8080801a;height: 1px;margin-top: 28px;">
                    <div class="row right_heading_second">
                        <h5>SERVICE FEES*</h5>
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-12 colxs">
                            <p>10% for projects worth upto £7500</p>
                        </div>
                        
                    </div>
                    <div class="row right_detail">
                        <div class="col-xs-12">
                            <p>For Projects worth £7501 or more, Service Charges is 3.5%.</p>
                        </div>
                    </div>
                    <!--<div class="row right_detail">-->
                    <!--    <div class="col-xs-12">-->
                    <!--        <p>Over $7,000 earned with buyer3.5%</p>-->
                    <!--    </div>-->
                    <!--</div>-->
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
          <div class="modal fade withdraw_model " id="withdraw_model2" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h2 class="modal-title">Answer your security Question</h2>
                </div>
                <div class="modal-body text-center security_div">
                    <p style="font-size:16px;">To keep your account safe please answer security question.</p>
                  
                    <div class="form-group" style="margin-bottom: 1px;">
                      <?php if($userdata->SecurityAns == ""  && $userdata->SecurityQuestion == 0){
                      
                      ?>
                      <p style="color:red">Please enter security question from settings.</p>
                      <input type='text' name="homrtown" class="form-control" readonly>
                      <?php }else{ ?>
                     
                        <?php
                            foreach($security_questions as $question){
                                if($question['q_id']==$myuser['SecurityQuestion']){
                                    
                        ?>
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
                
                <div class="modal-body method_div" style='display:none'>
                   
                   <form action="WithDraws/withdraw_fund" method="post" id="withdraw_form">
                   
                    <div class="form-group" style="margin-bottom: 1px;" id="withdrawal3">
                     <label><h4>Enter Withdrawal Amount</h4></label>
                    <input type='text' placeholder='Enter Withdrawal Amount' data-avail="<?php echo $myblnc;?>" name="withdrawal" class="form-control withdraw_amount" id="withdrawal2">
                     <input type='hidden' name="withdrawalinaccount" class="form-control amountinaccount" id="withdrawalamount" value='<?php echo number_format($myblnc,2);?>'>
                    
                   
                    
                    <p class='error'></p>
                    </div>
                    
                    <div class="form-group">
                       <p><strong> Available Balance :  £<?php echo number_format($myblnc,2);?> </strong> </p>
                       
                   </div>
                    
                    
                    <?php  if(!empty($myuser['payoneer_email'])){?>
                    <div>
                        <input type="radio" id="paypal_acco" class="payment_select" checked name="account" value="paypal_account"> PAYONEER ACCOUNT (<?php echo $myuser['payoneer_email'] ?>) 
                    </div>
                    <?php }if(!empty($myuser['stripe_email'])){ ?>
                    <div>
                        <input type="radio" id="paypal_acco" class="payment_select" name="account" value="paypal_account"> STRIPE ACCOUNT  (<?php echo $myuser['stripe_email'] ?>)
                    </div>
                    <?php }if(!empty($myuser['paypal_email'])){ ?>
                    <div>
                        <input type="radio" id="paypal_acco" class="payment_select" name="account" value="paypal_account"> PAYPAL ACCOUNT  (<?php echo $myuser['paypal_email'] ?>)
                    </div>
                    <?php } ?>
                            
                    <div class="col-sm-12" style="padding:0;padding-top:20px;">
                        <label class="labeldesc"><input type="checkbox" class='final_checkbox'> I confimed that i have used my correct account details</label>
                        <p style="color:red" class='final_check'></p>
                    </div>
                <?php if(!empty($myuser['payoneer_email']) ||!empty($myuser['stripe_email'])||!empty($myuser['paypal_email'])){ ?>
                     <div class="col-sm-12 text-center">
                       <button type="submit" class="btn btn-primary mb-2 withdrawalbtn23" style="background:#009247;color:#ffff;border:none">Withdraw</button>
                    </div>
                    <?php } ?>
                        
                    </form>
                </div>

              </div>
            </div>
          </div>
          
         
          
         
                     
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
                              <label>Amount to withdrawl(£)</label>
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
            $(".payment_card_buyer").css('border','1px solid #009247');
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
            $(".payment_card_surf").css('border','1px solid #009247');
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
            $(".payment_card_frrelancer").css('border','1px solid #009247');
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
                           // alert('Verified successfully!');
                           var accnts="",accnts_already="",paypal=false,payoneer=false,stripe=false;
                           
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
                           $('.available-method').html(accnts_already);
                           $('#add_nw_acct').html(accnts);
                           $('#withdraw_model').modal('hide');
                            
                           $('#addaccount2').modal('show');
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
        
        

    </script>

<script>
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
</script>
 <script>
     $(document).on('submit','#withdraw_form',function(){
        
        var amountval=$('.withdraw_amount').val();
        var accountamount=$('.amountinaccount').val();
        if($('.withdraw_amount').val() == ""){
             $('.error').text('Must fill the Amount!');
             return false;
        }else if($('.payment_select').is(':checked') == false){
              $('.error_method').text('Please Pick the Payment Method or Add new');
              return false;
            
        }else if($('.final_checkbox').is(':checked') == false){
            $('.final_check').text('Please Confirm');
             return false;
        }
        else{
            
            $(this).submit();
        }
        
        
    });
 </script>
 
  <script>
     $(document).on('keyup','.withdraw_amount',function(){
        
        var amountval=$('.withdraw_amount').val();
        var accountamount=$('.amountinaccount').val();
        var value = parseInt(accountamount.replace(",", ""));
        
        //alert(value);
        if(amountval>value){
            alert("Insufficant Balance");
            var amountval=$('.withdraw_amount').val("");
        }
    });
 </script>
<?php include("includes/front_end_footer.php");?>

 