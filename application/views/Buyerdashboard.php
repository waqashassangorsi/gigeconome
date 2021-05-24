<?php include("includes/front_end_header.php");?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/slick-theme.css">
<style>

    .slider{
        padding:20px 0px;
    }

    .slick-slide {
      margin: 0px 0px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: white;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: 1;
    }
.switcher{
    border-top: 1px solid #dad3d3
}
.switcher h1{
    font-size: 28px;;
    font-family: Monotype Corsiva;
}
.button_dashboard{
    font-size: 14px;
    padding: 7px 36px;
}
.freelancer_cont{
    background: #091923!important;
    padding-top: 20px;
    padding-bottom: 70px;
}
.freelancer_cont h2{
    color: #fff;
    padding-bottom: 20px;
}
.freelancer_cont h5{
    font-weight: bold;
    padding-top: 10px;
    color: #fff;
}
.freelancer_card{
    margin-bottom: 20px;
    background: #091923;
}
.freelancer_empty{
    background: #091923!important;
}
.freelancer_cont h6{
    color: #07934B;
}
.offer_card{
    box-shadow: 0 0 10px 0px black;
    border: 1px solid #fff;
    background: #fff;
}
.offer_empty{
    background: #eeeeee!important;
}
.offercard_colum{
    background: #eeeeee!important;
}
.offer_card img{
    padding-bottom: 0px;
    width: 100%!important;
    height: 244px!important;
}
.footer_card img{
    height: auto!important;
}
.offercard_star{
    font-size: 8px;
    margin-left: 10px;
}
.offsercard_body{
    padding-left: 10px;
    padding-right: 10px;
}
.offerorder_con{
    padding-bottom: 60px;
}
.offerorder_con h2{
    font-weight: bold;
    padding-bottom: 7px;
}
.dashboard_project{
    padding-top: 50px;
    padding-bottom: 50px;
}

.table ul{
    list-style: none;
    
}
.table ul li{
    float: left;
    padding-top: 10px;
}
.red_heart{
    color: #ea3a5d!important;
    font-size: 17px;
    position: absolute;
    top: 6px;
    right: 23px;
}
.empty_heart{
    font-size: 17px;
    position: absolute;
    top: 6px;
    right: 23px;
    color: #fff!important;
}
.offercard_star{
    font-size: 11px;
    color: #9aa0a0;
}

.project_btn{
    margin-top: 22px!important;
    padding: 21px 50px;
}

.panel-title h1{
    margin-top: 0!important;
    color: #3b9c6a;
    font-size: 49px;
}
.post_project{
    padding: 15px 0px!important;
}


.recommendefeelancer_slider img{
    width: 141px!important;
    height: 141px;
}

.recommendedoffer_slider{
    height: 328px;
}
.freelancer_left{
    width: 40px;
    height: 40px;
    background: #fff;
    border-radius: 50%;
    position: absolute;
    top: 40%;
    background-image: none!important;
    left: 0%;
}
.freelancer_right{
    width: 40px;
    height: 40px;
    background: #fff;
    border-radius: 50%;
    position: absolute;
    top: 40%;
    right: 0%!important;
    background-image: none!important;
}
.freelancer_left_indector{
    left: 24%!important;
    top: 24%!important;
    color: #111!important;
}
.freelancer_right_indector{
    right: 24%!important;
    top: 24%!important;
    color: #111!important;
}

.offer_left{
    width: 40px;
    height: 40px;
    background: #fff;
    border-radius: 50%;
    position: absolute;
    top: 40%;
    left: 0%;
    background-image: none!important;
}
.offer_right{
    width: 40px;
    height: 40px;
    background: #fff;
    border-radius: 50%;
    position: absolute;
    top: 40%;
    right: 0%!important;
    background-image: none!important;
}
.offer_left_indector{
    left: 24%!important;
    top: 24%!important;
    color: #111!important;
}
.offer_right_indector{
    right: 24%!important;
    top: 24%!important;
    color: #111!important;
}
.recommended{
    width: 90%;
    margin: auto;
}
.offers_cont{
    width: 90%;
    margin: auto;
}

@media (max-width: 589px) {project_btn 
    .name {
        width:100%;
    
    }
}
@media screen and (max-width: 767px) and (min-width: 300px){
    .button_dashboard{
        font-size: 12px;
        padding: 5px 4px;
    }
    .switcher h1{
        font-size: 21px;
        text-align: center;
    }
    .project_btn {
        margin-top: 0!important;
        padding: 10px 12px;
        font-size: 13px!important;
    }
    .freelancer_card{
        margin-bottom: 40px;
    }
    .mycard{
        min-height: 150px;
        margin: 10px auto;
    }
    .footer_card{
        margin-bottom: 10px!important;
    }
    .pros h3{
        font-size: 13px;
    }
    .pros span{
        font-size: 11px;
    }
    .offer_card{
        margin-bottom: 9px;
    }
    .freelancer_cont h2{
        font-size: 16px;
    }
    .offerorder_con h2{
        font-size: 16px;
    }
    
}
.pagination{
    width: 100%;
    text-align: center;
    margin-top: 19px;
    margin-bottom: -16px;
}
.pagination li{
    width: 50px;
}
.pagination li a{
    display: inline-block;
    padding: 4px 21px;
}
.pagination li :hover {
    text-decoration: none;
    color: #fff !important;
    background: #00a651 !important;
}
.pagination > .active > a{
     background: #00a651 !important;
     color: #fff !important;
     border: 1px solid #00a651;
}

  
    .workdone_icon{
       color: #46a049!important; 
       margin-right: 10px;
       font-weight: normal!important;
    }
    .youtube_video{
        margin-top: 10px;
        width: 100%;
    }
    .project_heading{
        color: #eee;
        padding-bottom: 15px;
    }
    .carousel-inner1{
        height: 335px;
    }
    .get_project{
        color: #fff;
    }
    .explore_img img{
        display: block;
        text-align: center;
        
    }
    .video_cont{
        padding-top: 38px;
    }
    .video_cont iframe{
        width: 100%;
    }
    
   @media screen and (max-width: 600px){
       .youtube_video{
           height: 100%;
           width: 100%;
           
       }
       .popular{
           padding-top: 0px;
       }
        .post{
            padding-top: 0px;
       }
       .post h1{
            padding-top: 0px;
       }
   }
   
   
   /* Smaller than standard 960 (devices and browsers) */
    @media only screen and (max-width: 959px) {
        .slider_image{
            width: 100%;
            }
        .carousel-inner1{
          width:100%;
        }
        .freelancer_slider{
            max-height: 271px!important;
        }
        .bulidwebsite_slider{
            max-height: 324px!important;
        }
    }
    
    /* Tablet Portrait size to standard 960 (devices and browsers) */
    @media only screen and (min-width: 768px) and (max-width: 959px) {
        .slider_image{
            width: 100%;
            }
        .carousel-inner1{
          width:100%;
        }
        .freelancer_slider{
            max-height: 271px!important;
        }
        .bulidwebsite_slider{
            max-height: 324px!important;
        }
    }
    
    /* All Mobile Sizes (devices and browser) */
    @media only screen and (max-width: 767px) {
        .slider_image{
            width: 100%;
            }
        .carousel-inner1{
          width:100%;
        }
        .freelancer_slider{
            max-height: 271px!important;
        }
        .bulidwebsite_slider{
            max-height: 324px!important;
        }
    }
    
    /* Mobile Landscape Size to Tablet Portrait (devices and browsers) */
    @media only screen and (min-width: 480px) and (max-width: 767px) {
        .slider_image{
            width: 100%;
            }
        .carousel-inner1{
          width:100%;
        }
         .freelancer_slider{
            max-height: 271px!important;
        }
        .bulidwebsite_slider{
            max-height: 324px!important;
        }
    }
    
    /* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
    @media only screen and (max-width: 479px) {
        .slider_image{
            width: 100%;
            }
        .carousel-inner1{
          width:100%;
         
        }
        .get_project{
            padding-top: 30px;
        }
        .detail h2{
            font-size: 17px;
        }
        .detail h3{
            font-size: 14px;
        }
        .detail h4{
            font-size: 12px;
        }
        .footer h3{
           font-size: 14px;
           font-weight: normal;
        }
        .freelancer_slider{
            max-height: 271px!important;
        }
        .bulidwebsite_slider{
            max-height: 324px!important;
        }
        .video_cont {
            padding-top: 0;
        }
        
    }
    .freenlancer{
        padding-top: 63px!important;
        padding-bottom: 60px!important;
    }
    .freelancercard{
        padding: 5px;
        background: #091923;
    }
    
    .freelancer_card img{
        border: 1px solid #fff;
        border-radius: 10px;
        width: 100%;
    }
    .freecard_content{
        position: absolute;
        top: 24px;
        left: 24px;
        color: #fff;
    }
    .freecard_content h4{
        color: #fff!important;
        font-weight: bold;
    }
    .freecard_content h5{
        color: #fff!important;
    }
    .freelancer_container{
        width: 90%;
        margin: 0 auto;
    } 
    .gigconome{
        width: 90%;
        margin: auto;
    }
    .btn-lg{
        padding: 6px 35px!important;
    }
    .project_cover{
        width: 90%;
        margin: auto;
    }
    .madeproject{
        width: 93%;
        margin: auto;
        
    }
    .madeproject_card{
        padding: 5px;
        background: #091923;
    }
    .freelancer_slider{
        height: 271px;
    }
    .freelancerslider_left{
        color: #444!important;
        left: 17%!important;
        top: 22%!important;
    }
    .freelancerslider_right{
        color: #444!important;
        right: 17%!important;
        top: 22%!important;
    }
    .freelancer_indecator_left{
        background: #fff;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        position: absolute;
        top: 115px;
        left: -14px!important;
    }
    .freelancer_indecator_right{
        background: #fff;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        position: absolute;
        top: 133px;
        right: -14px!important;
    }
    .bulidwebsite_slider{
        height: 325px;
    }
    .bulidwebsite_left{
        color: #444!important;
        left: 19%!important;
        top: 22%!important;
    }
    .bulidwebsite_right{
        color: #444!important;
        right: 19%!important;
        top: 22%!important;
    }
    
    .bulid_indector_left{
        background: #fff;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        position: absolute;
        top: 128px;
        left: -19px;
    }
    .bulid_indector_right{
        background: #fff;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        position: absolute;
        top: 148px;
        right: -19px!important;
    }
    .detail h2{
        font-size: 22px!important;
    }
    .detail h3{
        font-size: 17px!important;
    }
    
    .test
    {
        width:90%;
        margin:auto;
    }
    
    
    .offer_card{
    box-shadow: 0 0 5px 0px gainsboro;
    border: none;
    background: #fff;
    margin-top: 10px;
    margin-bottom: 10px;
}
.offer_card h5{
    color: #333!important;
}
.offer_card img{
    padding-bottom: 0px;
    width: 100%;
    height: 160px;
}
.offercard_star{
    font-size: 8px;
    margin-left: 10px;
}
.offsercard_body{
    padding-left: 10px;
    padding-right: 10px;
}
.red_heart{
    color: #ea3a5d!important;
    font-size: 17px;
    position: absolute;
    top: 16px;
    right: 23px;
}
.empty_heart{
    font-size: 17px;
    position: absolute;
    top: 16px;
    right: 23px;
    color: #fff!important;
}
.offercard_star{
    font-size: 11px;
    color: #9aa0a0;
}
.filters{
    margin-top: 30px!important;
    padding:0px;
}
.secondcard_img{
    width: 25px!important;
    height: 25px!important;
    border-radius: 50%;
    margin-top: 5px;
}
.secondcard_name{
    color: #46a049!important;
    font-size: 13px;
}


.less
{
    display:none;
}

#label_filer
{
    margin-top:14px;
    margin-left:53px;
}

.collapse
{
    display:block;
}

.select_dropdown
{
    margin-top:10px;
	height:40px;
	font-size:14px;
	
	
}
.filters select{
    border: none;
	box-shadow: 0 0 5px 0px #B7B5B5;
}

    @media (max-width: 500px) {
    .portolio_img
{
	width:100%
}

.dropdown_select
{
    padding:0px;
}

 #label_filer2
 {
     margin-top:14px;
     margin-left:10px;
 }

.collapse
{
    display:none;
}

.rate
{
    text-align:left;
}

.select_dropdown
{
    margin-top:10px;
	width:100%;
	height:40px;
}


.less
{
    display:block;
}

#label_filer
{
    display:none
}

}

.option_select
{
    font-size:15px;
}

 @media (max-width: 991px) {
     
     #label_filer
{
    margin-top:14px;
    margin-left:10px;
}
 }
 
 
 @media (max-width: 983px) {
     .filters{
    margin-top: 0px !important;
}
 }


#submit_btn
{
   margin-top: 11px;
    padding: 9px 26px;
}
.newcard{
    min-height: 310px;
    width: 100%;
    background: #eee;
}

.card_label span {
    color: #fff;
    display: block;
    font-size: 9px;
    padding: 2px 0px;
    background: rgb(255, 115, 0) !important;
    transform: rotate(-45deg);
    position: absolute;
    width: 95px;
    top: 16px;
    left: -30px;
    text-align: center;
}
.newcard{
    position: relative;
    background: white;
    box-shadow: 0 0 3px 0px gray;
    border-radius: 5px;
    margin-bottom: 5px;
    padding: 5px;
}
.newcard:hover {
    
}
.newcard_image img{
    width: 100% !important;
    height: 160px;
    padding-top: 16px !important;
}
.fav_icon{
    position: absolute;
    top: 5px;
    color: #908b8b!important;
    right: 5px;
    font-size: 15px;
}
.fav_icon_click{
    color: red!important;
}
.card_cont{
    overflow: hidden;
}
.card_content{
    display: flex;
}
.card_text{
    width: 66%;
    border-bottom: 1px dashed #e1dfdf;
    padding-top: 10px;
    border-right: 1px dashed #e1dfdf;
}
.card_text a{
    color: #111;
    font-size: 13px;
}
.card_rate{
    border-bottom: 1px dashed #e1dfdf;
    text-align: center;
    width: 43%;
    padding-top: 29px;
    min-height: 70px;
}
.card_rate span{
    color: #009247;
    font-size: 17px;
    font-weight: bold;
}
.newcard_footer{
    display: flex;
    padding-top: 8px;
}
.cardfooter_left{
    width: 60%;
    display: flex;
}
.cardfooter_right{
    width: 40%;
}
.cardfooter_img img{
    width: 38px !important;
    height: 38px;
    border-radius: 5px;
}
.cardfooter_text{
    padding-left: 5px;
}
.newcard_btn{
    background: #fff !important;
    color: rgb(255, 115, 0) !important;
    border: 1px solid rgb(255, 115, 0) !important;
    padding: 5px 17px;
    border-radius: 5px
}
.newcard_btn:hover{
    background: rgb(255, 115, 0) !important;
    color: #fff!important;
    border: 1px solid rgb(255, 115, 0) !important;;
}
.cardfooter_right h6{
    color: rgb(255, 115, 0) !important;
    font-size: 14px;
}
.hover_text{
    color: #fff;
    background: rgb(17 17 17);
    transition: all 0.35s cubic-bezier(0.28, 0.37, 0, 1.15) 0s;
    opacity: 0;
    display: flex;
    position: absolute;
    top: 21px;
    width: 96%!important;
    height: 144px;
    padding-top: 84px;

}
.hover_text h6{
    color: #fff;
    font-size: 14px;
}
.hover_left{
    width: 50%;
    text-align: center;
}
.hover_right{
    width: 50%;
    text-align: center;
}
.newcard:hover .hover_text{
    opacity:0.6;
}
.service_warp{
    width: 87%;
}

.item {
    height: auto !important; 
}

.invoicediv
{
    margin-left: 8.33333333%;
}

@media screen and (max-width: 764px) and (min-width:340px){
.invoicediv{
         margin-left: 0%;
       }
    
}


@media screen and (max-width: 492px) and (min-width:340px){
.invoicedivnew{
         width:100%;
       }
    
}

.datacard
{
     overflow: hidden;
    width: 99%;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>

<div class="container-fluid next">
  <div class="row switcher">
  
  <?php include("includes/switching_module.php");?>
       
  
  
    <div class="col-md-8 col-sm-6 col-xs-12">
        <h1>Good Morning, <span><?php echo $myuser['f_name']; ?></span></h1>
  </div>
  

</div>
</div>
<div class="container-fluid navigate dashboard_project">
  <div class="row">
    
    <div class="col-md-1 mt-2 col-sm-2 col-sm-offset-2  col-xs-4  col-md-offset-3 invoicedivnew">
       <div class="panel panel-default mycard">
         <div class="panel-body">
          <div class="panel-title">
            <h1 align="center" id='invoice_due' class="nums"><?php echo $invoices_due;?></h1>
          </div>
          <h3 align="center" class="mt-2 text-secondary">Invoices Due</h3>
    
         </div>
       </div>
    </div>
    <div class="col-md-1 mt-2 col-sm-2 col-xs-4 invoicediv invoicedivnew">
       <div class="panel panel-default mycard">
         <div class="panel-body">
          <div class="panel-title">
            <h1 align="center" id='workStream' class="nums"><?php echo $total_stream_progress;?></h1>
          </div>
          <h3 align="center" class="mt-2 text-secondary">Workstream in Progress</h3>
    
         </div>
       </div>
    </div>
   <div class="col-md-1 mt-2 col-sm-2 col-xs-4  invoicediv invoicedivnew">
   <div class="panel panel-default mycard">
     <div class="panel-body">
      <div class="panel-title">
        <h1 align="center" class="nums"><?php echo $open_projects;?></h1>
      </div>
      <h3 align="center" class="mt-2 text-secondary">Ongoing Projects</h3>

     </div>
   </div>
  </div>
  
  

</div>
</div>
<div class="container-fluid">
  <div class="row post post_project">
  <div class="col-md-4 col-xs-12">
    <a class="btn btn-success project_btn project" href="/Postproject">
      POST A PROJECT</a>
  </div>
    <div class="col-md-4 col-xs-12  ">
        <h1 class="earn"><span>INVITE</span> FRIENDS AND EARN UPTO £10 ON HIS FIRST PROJECT</h1>
  </div>
  

</div>
</div>
<div class="container-fluid navigate dashboard_project">
  <div class="row">
    
  <div class="col-md-1 mt-2 col-sm-2 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-md-offset-3">
   <div class="panel panel-default mycard">
     <div class="panel-body">
      <div class="panel-title">
        <h1 align="center" class="nums"><?php echo $total_stream_progress;?></h1>
      </div>
      <h3 align="center" class="mt-2 text-secondary">Projects in progress</h3>

     </div>
   </div>
  </div>
     <div class="col-md-1 mt-2 col-sm-2 col-xs-10 col-xs-offset-1">
   <div class="panel panel-default mycard">
     <div class="panel-body">
      <div class="panel-title">
        <h1 align="center" class="nums"><?php echo $open_projects;?></h1>
      </div>
      <h3 align="center" class="mt-2 text-secondary">Unawarded Projects</h3>

     </div>
   </div>
  </div>
   <div class="col-md-1 mt-2 col-sm-2 col-xs-10 col-xs-offset-1">
   <div class="panel panel-default mycard">
     <div class="panel-body">
      <div class="panel-title">
        <h1 align="center" class="nums"><?php echo $invoices_due;?></h1>
      </div>
      <h3 align="center" class="mt-2 text-secondary">Invoices Due</h3>

     </div>
   </div>
  </div>
  
  

</div>
</div>
<div class="container-fluid freelancer_cont">
    <h2 class="text-center">TOP RECOMMENDED FREELANCERS</h2>
    
        <div class="recommended">
        <div id="topreco_slider" class="carousel slide" data-ride="carousel">
            
        
           
            <div class="carousel-inner carousel-inner2 recommendefeelancer_slider">
                <div class="item active">
                    <?php foreach($recomnd_freelancer as $key=>$value){ ?>
                    <div class="col-md-2 col-sm-4 col-xs-12 text-center freelancer_card">
                        <a href="<?php echo SURL.'TimeLine/'.$value['username'];?>"><img src="<?php echo $value['dp'];?>" style="width:150px !important;height:150px !important;border-radius:50%" class="img-circle" /></a>
                        <h5><?php echo ucwords($value['f_name']." ".$value['l_name']); ?></h5>
                        <h6><?php echo $value['profession'];?></h6>
                        <div class="col-xs-12 col-sm-12 " id="stars">
                    	    <?php 
                     	        $rating_Data = $this->Common->rating_user($value['u_id']);
                     	        if($rating_Data['totalrating']>=20){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=40){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=60){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=80){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=100){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    
                    		    
                    		    <span><?php echo intval($rating_Data['totalrating']); ?>%</span>
                    	</div>
                    </div>
                    <?php } ?>
                </div>
                
                <div class="item">
                    <?php foreach($recomnd_freelancer as $key=>$value){ ?>
                    <div class="col-md-2 col-sm-4 col-xs-12 text-center freelancer_card">
                        <a href="<?php echo SURL.'TimeLine/'.$value['username'];?>"><img src="<?php echo $value['dp'];?>" style="width:150px !important;height:150px !important;border-radius:50%" class="img-circle" /></a>
                        <h5><?php echo ucwords($value['f_name']." ".$value['l_name']); ?></h5>
                        <h6><?php echo $value['profession'];?></h6>
                        <div class="col-xs-12 col-sm-12 " id="stars">
                    	    <?php 
                     	        $rating_Data = $this->Common->rating_user($value['u_id']);
                     	        if($rating_Data['totalrating']>=20){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=40){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=60){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=80){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    <?php 
                     	        if($rating_Data['totalrating']>=100){
                     	        ?>
                    		    <span class="star" style="color: gold;"><i class="glyphicon glyphicon-star"></i></span>
                    		    <?php }else{?>
                    		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                    		    <?php } ?>
                    		    
                    		    
                    		    
                    		    <span><?php echo intval($rating_Data['totalrating']); ?>%</span>
                    	</div>
                    </div>
                    <?php } ?>
                </div>
                
        
            </div>
        
           
            <a class="left carousel-control freelancer_left " href="#topreco_slider" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left freelancer_left_indector"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control freelancer_right" href="#topreco_slider" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right freelancer_right_indector"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
    </div>
</div>
<div class="container-fluid offerorder_con">
    <h2 class="text-center">TOP RECOMMENDED OFFERS</h2>
    <div class="row">
        
        <div class="offers_cont">
        <div id="offer_slider" class="carousel slide" data-ride="carousel">
           
        
            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-inner1 recommendedoffer_slider">
                <div class="item active">
                    <?php 
                        foreach($recomnd_services as $key=>$value){
                            $img = $this->db->query("select * from service_portfolio where service_id='".$value['service_id']."'")->result_array()[0]['image'];
                    ?>
                    
                         <div class="col-md-3 col-sm-12 col-xs-12 " style="padding: 20px">
            <div class="card_cont">
                <div class="newcard">
                    <div class="card_label hidden">
                        <span>FEATURED</span>
                    </div>
                    <!--<div class="favoriteIcon">-->
                    <!--    <i class="glyphicon glyphicon-heart fav_icon" id=favicon_btn""></i>-->
                    <!--</div>-->
                    <div class="newcard_image">
                        <a href="#">
                            <img src="<?php echo $img;  ?>"  class="img-fluid" />
                        </a>
                    </div>
                    <div class="card_content">
                        <div class="card_text datacard">
                            <a href="<?php echo SURL.'Buy/index/'.$value['service_id'];?>"><?php echo $value['title'];?></a>
                        </div>
                        <div class="card_rate">
                            <span>£<?php echo $value['amount']; ?></span>
                        </div>
                    </div>
                    <div class="newcard_footer">
                        <div class="cardfooter_left">
                            <div class="cardfooter_img">
                                <img src="<?php echo $value['dp'] ?>" class="img-fluid" />
                            </div>
                            <div class="cardfooter_text">
                                <a href="<?php echo "TimeLine/".$value['username']; ?>"><h6 style="color:#000;font-weight:bold;"><?php echo ucwords($value['f_name']." ".$value['l_name']);?></h6></a>
                                <h6 style="color:#555;font-weight:bold;"><?php echo $value['location'];?></h6>
                            </div>
                        </div>
                        <div class="cardfooter_right text-right">
                            <a href="/TimeLine/<?php echo $value['username']?>" class="newcard_btn" >VIEW</a>
                        </div>
                    </div>
                    <?php 
                        $ratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from service_rating where service_id='".$value['service_id']."'")->result_array()[0];
                        $totalrating = $ratingquery['stars']*100/($ratingquery['total']*5);
                        
                    ?>
                    <div class="hover_text">
                        <div class="hover_left">
                            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                            <h6>Rating: <?php echo intval($service_rating['votes']);?>%</h6>
                        </div>
                        <?php 
                        $sold = $this->db->query("select count(*) as count from services_purchased where service_id='".$value['service_id']."'")->result_array()[0]['count'];
                        ?>
                        <div class="hover_right">
                            <i class="fa fa-archive fa-2x" aria-hidden="true"></i>
                            <h6>Sold: <?php echo $sold;?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                  
                    
                    <?php } ?>
                </div>
                
                
                     <div class="item">
                    <?php 
                        foreach($recomnd_services as $key=>$value){
                            $img = $this->db->query("select * from service_portfolio where service_id='".$value['service_id']."'")->result_array()[0]['image'];
                    ?>
                    
                         <div class="col-md-3 col-sm-12 col-xs-12 " style="padding: 20px">
            <div class="card_cont">
                <div class="newcard">
                    <!--<div class="card_label hidden">-->
                    <!--    <span>FEATURED</span>-->
                    <!--</div>-->
                    <div class="favoriteIcon">
                        <i class="glyphicon glyphicon-heart fav_icon" id=favicon_btn""></i>
                    </div>
                    <div class="newcard_image">
                        <a href="#">
                            <img src="<?php echo $img;  ?>"  class="img-fluid" />
                        </a>
                    </div>
                    <div class="card_content">
                        <div class="card_text datacard">
                            <a href="<?php echo SURL.'Buy/index/'.$value['service_id'];?>"><?php echo $value['title'];?></a>
                        </div>
                        <div class="card_rate">
                            <span>£<?php echo $value['amount']; ?></span>
                        </div>
                    </div>
                    <div class="newcard_footer">
                        <div class="cardfooter_left">
                            <div class="cardfooter_img">
                                <img src="<?php echo $value['dp'] ?>" class="img-fluid" />
                            </div>
                            <div class="cardfooter_text">
                                <a href="<?php echo "TimeLine/".$value['username']; ?>"><h6 style="color:#000;font-weight:bold;"><?php echo ucwords($value['f_name']." ".$value['l_name']);?></h6></a>
                                <h6 style="color:#555;font-weight:bold;"><?php echo $value['location'];?></h6>
                            </div>
                        </div>
                        <div class="cardfooter_right text-right">
                            <a href="/TimeLine/<?php echo $value['username']?>" class="newcard_btn" >VIEW</a>
                        </div>
                    </div>
                    <?php 
                        $ratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from service_rating where service_id='".$value['service_id']."'")->result_array()[0];
                        $totalrating = $ratingquery['stars']*100/($ratingquery['total']*5);
                        // var_dump($totalrating);
                        
                    ?>
                   <div class="hover_text">
                        <div class="hover_left">
                            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                            <h6>Rating: <?php echo intval($service_rating['votes']);?>%</h6>
                        </div>
                        <?php 
                        $sold = $this->db->query("select count(*) as count from services_purchased where service_id='".$value['service_id']."'")->result_array()[0]['count'];
                        ?>
                        <div class="hover_right">
                            <i class="fa fa-archive fa-2x" aria-hidden="true"></i>
                            <h6>Sold: <?php echo $sold;?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                  
                    
                    <?php } ?>
                </div>
        

            </div>
        
            <!-- Left and right controls -->
            <a class="left carousel-control offer_left" href="#offer_slider" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left offer_left_indector"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control offer_right" href="#offer_slider" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right  offer_right_indector"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
    
        
    </div>
    
</div>

</html>



<?php include("includes/front_end_footer.php");?>
<script>

    $(document).ready(function(){
      $(".glyphicon_icons").click(function(){
       // $(".glyphicon_icons").toggleClass("red_heart");
       $('.glyphicon_icons').removeClass('empty_heart').addClass('red_heart');
      });
      
    });
    
    
</script>

<script src='<?php echo base_url();?>assets/js/slick.min.js'></script>

<script>

$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
</script>

