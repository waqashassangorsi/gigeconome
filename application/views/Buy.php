<?php include("includes/front_end_header.php");?>
<style>
    .glyphicon_icon{
        color: #666666!important;
    }
    .buy{
        margin: 10px auto;
        width: 90%;
    }
    .buy-btns{
        background: #fff;
        padding-bottom: 10px;
    }
    .buy-btns a{
        padding: 2!important;
    }
    
    .buy-main-btn{
        margin-top: 10px;
        padding: 13px 67px!important;
        background: green !important;
    }
    .offer_lebal{
        position: absolute;
        top: 8px;
        right: -15px;
    }
    .buy-btns span{
        font-size: 17px;
        margin:0 auto;
    }
    .increment_de{
        border-left: 1px solid #0e0e0e14;
        border-bottom: 1px solid #0e0e0e14;
        margin-top: 15px;
        padding: 12px 3px;
        margin: 0;
    }
    .offer_lebal span{
        font-family: Arial;
        color: #fff;
        display: block;
        font-size: 11px;
        padding: 2px 15px;
        background: #ef9337 !important;
        transform: rotate(40deg);
    }
    .buy_glyphicon{
        color: #bbb8b882!important;
        font-size: 12px;
    }
    .social_buy{
        border-bottom: 1px solid #0e0e0e14!important;
        margin: 0;
    }
    .likes_buy{
        position: absolute;
        top: -11px;
        right: 18px;
        color: #00000040!important;
    }
    .view_buy{
        padding-top: 10px;
        
    }
    .view_buy p{
        font-weight: bold!important;
    }
    .cont{
        background: #efefef!important;
        border: #f0f0f1!important;
    }
    .aboutoffer_dec{
        min-height: 100px;
        background: #fff;
        padding: 10px;
        font-size: 23px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .subb_heading{
        font-size: 13px!important;
    }
    
    .buy_cont{
        padding-bottom: 3px;
        height: 635px;
        background: #fff!important;
    }
    
    .buy-btns span{
        padding: 0;
    }
    
    .buy_contact{
        color: #939496!important;
        padding: 6px 10px!important;
    }
    .buy_input{
        width: 100%!important;
        border: none;
        text-align: center;
        font-weight: bold;
    }
    .left_profile{
        width: 42px!important;
        height:42px !important;
    }
    .right_profile{
        width: 26px!important;
    }
    .profile h4{
        margin-left: -30px;
    }
    .profile h5{
        margin-left: -30px;
    }
   
    .location{
        font-size: 13px!important;
    }
    @media screen and (max-width:1190px) and (min-width: 991px){
        .buy-main-btn{
            padding: 13px 48px!important;;
        }
        .rightbanner_buttons ul li{
            width: 14px!important;
        }
    }
    @media screen and (max-width:991px) and (min-width: 767px){
        .buy-main-btn{
            padding: 12px 46px!important;
        }
        .offer_lebal {
            position: absolute;
            top: 8px;
            right: -14px;

       }
     
        .right_profile{
            width: 50%!important;
        }
        .profile_names{
            padding-left: 38px!important;
            padding: 0;
        }
        
    }
   
    @media screen and (max-width: 767px) {
       .offer_lebal {
            position: absolute;
            top: 8px;
            right: -14px;

       }
       .buy-main-btn{
            padding: 10px 26px!important;
            font-size: 11px!important;
            margin-top: 26px;
        }
       
     }
    

    @media screen and (min-width: 480px) and (max-width: 767px) {
        .offer_lebal {
            position: absolute;
            top: 9px;
            right: -15px;
        }
        
        .buy-main-btn{
            padding: 10px 30px!important;
            font-size: 11px!important;
            margin-top: 26px;
        }
        .aboutoffer_dec{
            width: 90%!important;
        }
        
        .left_profile{
            width: 35%!importan;
        }
        .left-banner h1{
          font-size: 26px!important;  
        }
    }
    

    @media screen and (min-width: 300px) and (max-width: 479px) {
        
       
        .offer_lebal{
            position: absolute;
            top: 8px;
            right: -18px;
        }
        .buy-main-btn{
            padding: 8px 12px!important;
            font-size: 10px!important;
            margin-top: 26px;
        }
       .left-banner{
           height: 43%;
       }
       .left-banner h1{
           font-size: 18px!important;
       }
        .aboutoffer_dec{
            width: 100%!important;
        }
        .profile h4{
            margin-left: -30px;
        }
        .profile h5{
            margin-left: -30px;
        }
        .profile_names{
            padding-left: 23px!important;
            padding: 0;
        }
        .about_offer h2{
            font-size: 17px;
        }
        .aboutoffer_dec p{
            font-size: 10px;
        }
        .carousel-inner{
            height: 200px;
        }
        .carousel-inner img{
            height: 50%!important;
        }
                
        }
        
        .rightbanner_buttons{
            padding-top: 15px;
        }
        .rightbanner_buttons ul{
            list-style:none;
            padding: 2px 7px;
        }
        .rightbanner_buttons ul li{
            float: left;
            width: 20px;
        }
        .increment ul li a:hover{
            background: transparent!important;
        }
        .increment{
            border-bottom: 1px solid #e2dcdc;
            border-left: 1px solid #e2dcdc;
            padding-top: 10px;
            height: 40px;
            width: 94px;
        }
        .profile_names{
            padding-left: 41px!important;
            padding: 0;
        }
        .profile ul{
            list-style: none;
            padding: 0;
        }
        .profile ul li{
            float: left;
        }
        .profile_name{
            padding-left: 35px;
            margin-top: -4px;
        }
        .about_buy{
            width: 90%;
            margin: 10px auto;
        }
        .about_offer{
            padding-left: 0;
        }
        
        .addns_cont {
    background: #fff;
    width: 100%;
    min-height: 36px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 8px;
    margin-bottom: 10px;
    box-shadow: 0 0 3px 0px grey;
    border-radius: 5px;
}

.addns_rate {
    background: #fff;
    width: 50%;
    min-height: 36px;
    padding-top: 10px;
    padding-bottom: 10px;
    box-shadow: 0 0 3px 0px grey;
    border-radius: 5px;
}

.carousel-inner > .item > img {
  /*width:640px !important;
  height:360px !important;*/
}


.review_cont{
    background: #fff;
    margin-top: 10px;
    border-radius: 6px;
    margin-bottom: 10px;
    width: 96%!important;
    box-shadow: 0 0 5px 0px gainsboro;
}

#review_div{
	margin-top: 29px;
}

 .reviewwrapper{
     border:1px solid #ededed;
     padding: 15px;
 }
 
 .reviewprofilecol{
    padding-right: 27px;
    margin-right: 10px;
    border-right: 1px solid  #dfe0e2;
    padding-top: 10px;
    padding-bottom: 104px;
 }
 
 .freelancercol{
     border:1px solid #dfe0e2;
     padding-bottom: 72px;
    padding-top: 17px;
    padding-left: 15px;
    padding-right: 15px;
 }
 
 .newfreelancercol{
   
    border: 1px solid #dfe0e2;
    margin-left: 20px;
    padding: 15px;
    margin-top: -63px;
    background: #f8f9fd;
 }
 
  .mapicon{
     margin-left:10px;
 }
 
 .priceheadingnew{
     display:none;
 }
@media screen and (max-width: 764px) and (min-width:340px){
.reviewprofilecol{
          text-align:left;
          border:none;
          padding-bottom:10px;
       }
 .freelancercol{
padding:9px;    
 }
 
 .newfreelancercol{
    width:100%;
    margin-right: 0px;
    padding:0px;
    margin-top:10px;
    float:left;
}

 .addns_rate{
     width:100%;
 }
 
 .addns_cont_col{
     padding:0px;
 }
 
 .priceheading{
     display:none;
 }
 .priceheadingnew{
     display:block;
     text-align: left !important;
     padding-top:0px !important;
 }
}  



</style>
<div class="container-fluid bg-grey">
    <div class="container buy">
        <div class="row bg-white buy_cont" >
        <div class="col-md-8 col-lg-8 left-banner" style="overflow:hidden;">
           
            <h1><?php echo $service['title']; ?></h1>
            
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <?php 
                    $z=0;
                    foreach($portfolio as $key=>$portvalue){
                        if($z==0){
                            $activeclass = "active";
                        }else{
                            $activeclass = "";
                        }
                ?>
                  <div class="item <?php echo $activeclass; ?>">
                    <img src="<?php echo $portvalue['image']; ?>" class="img-fluid img-responsive" alt="...">
                  </div>
                  <?php $z++; } ?>
                </div>
            
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            
            
            
            <div class="banner">
                <?php 
                    $todaydate = date("Y-m-d H:i:s");
                    $isfeature = $this->db->query("select * from services_featured where end_date >='$todaydate'");
                    if($isfeature->num_rows() > 0){
                ?>
                <div class="offer_lebal">
                    <span>Featured</span>
                </div>
                <?php } ?>
            </div>
            
            
        </div>
        <form class="col-md-4 col-lg-4 buy-btns" action="">
            <h1 class="priceheading">£<?php echo $service['amount']; ?></h1>
            <div class="row">
                <div class="col-md-4 col-xs-8 rightbanner_buttons">
                <h1 class="priceheadingnew">£<?php echo $service['amount']; ?></h1>
                    <!--<div class="increment">-->
                    <!--    <ul>-->
                    <!--        <li><a href="#"><label for="" class="glyphicon glyphicon-minus-sign glyphicon_icon" style="margin-left: -10px"></label></a></li>-->
                    <!--        <li><input type="text" name="qty" value="1" class="buy_input"></li>-->
                    <!--        <li><a href="#"><label for="" class="glyphicon glyphicon-plus-sign glyphicon_icon"></label></a></li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                </div>
                
                <?php 
                $loginuser=$myuser['u_id'];
                if($service['u_id']!=$loginuser){?>
                <div class="col-md-8 col-xs-4">
                    <a class="btn btn-success buy-main-btn" href="<?php echo SURL.'PaymentSummary/buyservice/'.$service['service_slug'];?>" >BUY NOW</a>
                    <!--<input type="submit" value="Buy Now" class="btn btn-success buy-main-btn"/>-->
                </div>
                <?php }?>
            </div>
            
            
            
            <div class="row social_buy">
                <div class="col-md-4 col-xs-4">
                    <div class="text-center">
                        <span class="glyphicon glyphicon-send buy_glyphicon"></span>
                        <p style="font-size:12px">Delivery In<br>
                        <span class="subb_heading"><?php echo $service['delivery']; ?> days</span></p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4">
                    <div class="text-center">
                    <span class="glyphicon glyphicon-thumbs-up buy_glyphicon"></span><p style="font-size:12px">Rating <br>
                    <?php 
                    $services_rating = $this->common->rating_service($service['service_id']);
                   
                    ?>
                    <span class="subb_heading"><?php echo intval($services_rating['totalrating']);?>%</span></p><p>(<?php echo $services_rating['votes'];?> Reviews)</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4">
                    <div class="text-center">
                       <span class="glyphicon glyphicon-time buy_glyphicon"></span> 
                       <p style="font-size:12px">Response Time<br>
                       <span class="subb_heading">Instantly</span>
                       </p>
                   </div>
                </div>
            </div>
            <div class="row" >
                
                <div class="col-md-3 col-xs-4" style="padding-top: 10px;">
                    <?php 
                        $serviceviews = $this->db->query("select count(*) as count from services_views where service_id='".$service['service_id']."'")->result_array()[0]['count']; 
                    ?>
                   <p style="font-weight:bold">Views <?php echo $serviceviews; ?></p> 
                </div>
                <div class="col-md-3 col-xs-4" style="padding-top: 10px;">
                    <?php 
                        $servicesales = $this->db->query("select count(*) as count from services_purchased where service_id='".$service['service_id']."' and status='Completed'")->result_array()[0]['count']; 
                    ?>
                    <p style="font-weight:bold">Sales <?php echo $servicesales; ?></p>
                </div>
                <div class="col-md-2 col-md-offset-4 col-xs-4">
                    <?php 
                        $servicesliked = $this->db->query("select count(*) as count from services_wishlist where service_id='".$service['service_id']."'")->result_array()[0]['count']; 
                        $loginuserid= $this->session->userdata('user');
                        $isliked = $this->db->query("select * from services_wishlist where service_id='".$service['service_id']."' and u_id='". $loginuserid."'")->result_array(); 
                         
                        
                    ?>
                    <span class="likes_buy" style="font-size:12px;">
                        <?php if(!empty($isliked)){
                        ?>
                        
                        <i class="glyphicon glyphicon-heart  fav_icon"  data-id1="<?php echo $service['service_id'];?>" style="color:red !important" id="favicon_btn_<?php echo $service['service_id'];?>"></i>
                        <?php }else{ ?>
                        <i class="glyphicon glyphicon-heart buy_glyphicon fav_icon"  data-id1="<?php echo $service['service_id'];?>" id="favicon_btn_<?php echo $service['service_id'];?>"></i>
                        <?php } ?>
                        <!--<?php echo $servicesliked;?>-->
                    </span>
                </div>
            </div>
           
            
            <div class="row ">
               <div class="col-md-12 profile">
                   <ul>
                        <li>
                            <img src="<?php echo $owner['dp'];?>" class="img img-circle left_profile" alt="...">
                        </li>
                        <li class="profile_name">
                            <h4><a href="<?php echo SURL."TimeLine/".$owner['username'];?>"><?php echo ucwords($owner['f_name']." ".$owner['l_name']);?></a></h4>
                            <h5><?php echo $owner['tags'];?></h5>
                        </li>
                        <!--<li style="float:right;">-->
                        <!--   <img src="<?php echo base_url();  ?>assets/images/thumb-4.png" class="img img-circle right_profile"  alt="...">-->
                        <!--</li>-->
                   </ul>
               </div>
            </div>
            <!--<div class="about-user">-->
            <!--    <p><?php echo $owner['about'];?></p>-->
            <!--</div>-->
            <div class="row">
                <div class="col-md-5 col-sm-4 col-xs-6">
                   <i class="glyphicon glyphicon-map-marker" style="color: #b7b0b0!important;"></i><span class="location"><?php echo $owner['location'];?></span>
                </div>
                <?php if($service['u_id']!=$loginuser){?>
                <div class="col-md-3 col-md-offset-4 col-sm-offset-4 col-sm-4  col-xs-6">
                    <a href="<?php echo SURL.'postproject/index/'.$owner['username'];?>" class="cont btn btn-default buy_contact">Contact</a>
                </div>
                <?php }?>
            </div>
            
            
            
        </form>
        </div>
        
    </div>
    
    <div class="container about_buy">
    <div class=" row ">
        <div class="col-sm-8 about_offer">
            <h2 class="">What you get with this offer</h2>
            <div class="aboutoffer_dec">
                <p  style="white-space: pre-line;">
                    <?php echo $service['description']; ?>
                </p>
            </div>
        </div>
        </div>
    </div>
    
    
       <?php if(!empty($adons)){ ?>
         <div class="container about_buy">
        <div class="row">
            <div class="col-sm-12">
                <h2>Add Ons</h2>
                     
            </div>
        </div>
         <?php foreach($adons as $value){ ?>
        <div class="row">
        
          <div class="col-sm-12">
                      
                         <div class="col-md-5 col-sm-4 col-xs-8 addns_cont_col">
                               <div class="addns_cont">
                                   <?php echo $value['title'];?>
                               </div>
                            </div>
                            <div class="col-md-3 col-sm-4  col-xs-4">
                                <div class="addns_rate" style="color: #000; padding-left:10px;">
                                    £<?php echo number_format($value['amount'],2);?>
                                </div>
                            </div>
                     
                  </div>
            </div>      
         <?php } ?>    
         </div>
         
         <?php } ?>    
    
     
    <div class="container-fluid">
        <div class="tab_profile">
            <ul class="nav nav-tabs">
              
                <li class="active"><a data-toggle="tab" href="#reviews" id="reviews_btn">Reviews</a></li>
            </ul>
        </div>
    
</div>

<div class="tab-content">

        <div class="container-fluid review_cont tab-pane fade in active" id="reviews">
            <div class="row" id="review_div">
            	<div class="col-xs-12 ">
                    
            		<h4 class="font">Reviews:</h4>
            	</div>
            
            </div>
            
            <?php
              if(!empty($servicerating)){
                    foreach($servicerating as $key=>$value21){
                        
                      $service_details = $this->db->query("select service_rating.*,users.* from service_rating inner join users on users.u_id=service_rating.u_id where service_rating.service_id='".$value21['service_id']."' and who_rated!='".$service['u_id']."'")->result_array()[0]; 
                     
            ?>
            
            <div style="padding: 6px;">
                <p><?php echo $value21['date']?></p>
                
                <!--<div class="row" style="padding: 6px;">-->
                <!--    <div class="reviewwrapper">-->
                <!--        <div class="col-sm-12" style="padding:0;">-->
                <!--            <h4>just a test job</h4>-->
                <!--        </div>-->
                <!--        <ul style="display:flex;list-style: none;padding:0;">-->
                <!--            <li><img src="https://gig.coviknow.com/uploads/freelancer1.jpg" style="width:30px;height:30px;border-radius:50%;"/></li>-->
                <!--            <li style="padding: 5px;"><b>Waqas Hasan</b></li>-->
                            <!--<li style="padding: 5px;"><b>Posted on:</b></li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</div>-->
            
            
                <div class="row">
                    
                    <div class="col-sm-12" style="padding:0;">
                        <div class="col-xs-2 col-sm-1 text-right reviewprofilecol">
                            <img src="<?php echo $service_details['dp']?>" style="width:39px;height:39px;border-radius:50%;"/>
                        </div>
                        
                        <div class="col-xs-9 freelancercol">
                            
                            <p><span><strong>"<?php echo ucwords($service_details['f_name']." ".$service_details['l_name']);?>"</strong></span> <span class="mapicon"><i class="fa fa-map-marker" aria-hidden="true"></i></span><span><?php echo $service_details['location']?></span>
                                <span class="reviewstarsnew">
                                  <?php if($value21['stars']>=1){?>
                                  <i class="fa fa-star"  aria-hidden="true" style="color: gold;"></i>
                                  <?php }else{ ?>
                                  <i class="fa fa-star"  aria-hidden="true"></i>
                                  <?php } ?>
                                  <?php if($value21['stars']>=2){?>
                                  <i class="fa fa-star"  aria-hidden="true" style="color: gold;"></i>
                                  <?php }else{ ?>
                                  <i class="fa fa-star"  aria-hidden="true"></i>
                                  <?php } ?>
                                  <?php if($value21['stars']>=3){?>
                                  <i class="fa fa-star"  aria-hidden="true" style="color: gold;"></i>
                                  <?php }else{ ?>
                                  <i class="fa fa-star"  aria-hidden="true"></i>
                                  <?php } ?>
                                  <?php if($value21['stars']>=4){?>
                                  <i class="fa fa-star"  aria-hidden="true" style="color: gold;"></i>
                                  <?php }else{ ?>
                                  <i class="fa fa-star"  aria-hidden="true"></i>
                                  <?php } ?>
                                  <?php if($value21['stars']>=5){?>
                                  <i class="fa fa-star"  aria-hidden="true" style="color: gold;"></i>
                                  <?php }else{ ?>
                                  <i class="fa fa-star"  aria-hidden="true"></i>
                                  <?php } ?>
                                </span>
                            </p>
                             
                            <p><?php echo $value21['comment'] ?></p>
                        </div>
                    </div>
                  <?php
                      $hav_replys = $this->db->query("select service_rating.*,users.* from service_rating inner join users on users.u_id=service_rating.who_rated where reply_of='".$value21['rating_id']."'")->result_array();
                     
                    if($hav_replys){
                        
                    ?>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-7 newfreelancercol">
                                 <div class="col-sm-1 col-xs-3 imgcol">
                                    <img src="<?php echo $hav_replys[0]['dp'];?>" style="width:30px;height:30px;border-radius:50%;"/>
                                 </div>
                                 
                                 <div class="col-sm-11 col-xs-9">
                                    <p><strong><?php echo ucwords($hav_replys[0]['f_name']." ".$hav_reply[0]['f_name']);?></strong></p>
                                     <p><?php echo ($hav_replys[0]['comment']);?></p>
                                 </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                  
                 
                </div> 
                
            </div>
          <?php } }?>
            
            
            
            
    </div>
        

    </div>
    
    
</div>

<?php include("includes/front_end_footer.php");?>