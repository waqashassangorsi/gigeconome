<?php include("includes/front_end_header.php");?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/slick-theme.css">
  
<style>
    
    .workdone_icon{
       color: #46a049!important; 
       margin-right: 10px;
       font-weight: normal!important;
    }
    .freecard_content a{
        color:white;
        
    }
    
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
    
    .youtube_video{
        margin-top: 10px;
        width: 100%;
    }
    .project_heading{
        color: #eee;
        padding-bottom: 15px;
    }
    .carousel-inner{
        height: 550px;
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
       .slick-next{
           right:-10px !important;
       }
       .slick-prev{
           left:-8px !important;
       }
       .detail{
           padding:0px;
       }
       .detail h2{
           margin-bottom:12px;
           color:white;
       }
       .explore_img a h4{
           
           color:white !important;
       }
       .test{
           
           width:100% !important;
       }
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
        .carousel-inner{
          width:100%;
          max-height: 400px !important;
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
        .carousel-inner{
          width:100%;
          max-height: 236px !important;
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
        .carousel-inner{
          width:100%;
          max-height: 200px !important;
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
        .carousel-inner{
          width:100%;
          max-height: 200px !important;
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
        .carousel-inner{
          width:100%;
          max-height: 130px !important;
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
        height: 266px;
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



@media screen and (max-width: 764px) and (min-width:340px){
.explore_img
{
    width:50%;
        float: right;
}

 .detail h2{
        font-size: 19px!important;
    }
    
}


@media screen and (max-width: 526px) and (min-width:359px){
.explore_img
{
    width:47%;
        float: right;
}

    
}

.gigtext{
    width:32%;;
    background:#cdcccc;
    border-radius: 7px;
}

.carousernewwarpper{
    position:absolute;
    z-index: 1;
    width: 52%;
    top:239px;
}

.headingtext{
    padding-left:0px;
    padding-right:0px;
    padding:10px;
}

@media screen and (max-width: 764px) and (min-width:340px){
.carousernewwarpper{
          top:0px;
          width:100%;
       }
    .gigtext{
        width: 43%;
    }
    .fontdata_heading{
        font-size: 22px;
    }
    
    .fontdata{
        font-size: 14px;
        margin-top: -6px;
    }
}

@font-face {
  font-family: myFirstFontnew;
  src: url(assets/fonts/CenturyGothicRegular__-_911fonts.ttf);
}

.fontdata{
  font-family: myFirstFontnew;
}


@font-face {
  font-family: myFirstFontbold;
  src: url(assets/fonts/CenturyGothicBold__-_911fonts.ttf);
}

.fontdata_heading{
  font-family: myFirstFontbold;
}

.datacard
{
     overflow: hidden;
    width: 99%;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
<?php //echo "<pre>";var_dump($categories);exit; ?>

<div class="container-fluid" style="margin:0;padding: 0; ">
    <!--<div class="row" style="background:black">-->
    <!--    <div class="col-sm-12 text-center">-->
    <!--        <h2 style="color:white;">GigeconoMe - Providing further opportunities for professionals through the reach of technology.</h2>-->
    <!--    </div>-->
    <!--</div>-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      
     
      
      <div class="item active">
          <div class="col-sm-12">
              <div class="carousernewwarpper">
                   <div class="gigtext"> <h1 class="headingtext fontdata_heading">Gigecono<span style="color:#009247">Me</span></h1></div>
                    <h2 class="fontdata" style="color:white;">Providing further opportunities for professionals through the reach of technology.</h2>
              </div>
          </div>
        <img src="<?php echo base_url(); ?>uploads/new_carousel1.png" alt="Los Angeles" alt="Los Angeles" class="img-fluid img-responsive slider_image">
      </div>

      <div class="item">
            <div class="col-sm-12">
              <div class="carousernewwarpper">
                   <div class="gigtext"> <h1 class="headingtext fontdata_heading">Gigecono<span style="color:#009247">Me</span></h1></div>
                    <h2 class="fontdata" style="color:white;">Providing further opportunities for professionals through the reach of technology.</h2>
              </div>
          </div>
        <img src="<?php echo base_url(); ?>uploads/new_carousel2.png" alt="Chicago" alt="Los Angeles" class="img-fluid img-responsive slider_image">
      </div>
    
      <!--<div class="item">-->
      <!--   <img src="<?php echo base_url(); ?>assets/images/1.jpg" alt="New York" alt="Los Angeles" class="img-fluid img-responsive slider_image">-->
      <!--</div>-->
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
</div>


<div class="container-fluid post freenlancer">
<div class="container">
  
<div class="freelancer_container">
    <div class="row">
        <div class="col-md-12 ">
            <h1 class=" project_heading">Delivery focussed projects to revolutionise your business

</h1>
        </div>
    </div>
    <div class="row">
        
        <div id="freelancerslider" class="carousel slide" data-ride="carousel">
            
            <!-- Wrapper for slides -->
             
            <div class="carousel-inner freelancer_slider">
             <div class="item active">
            <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/mobile-apps development.png" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Programming and Development</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Apps & Mobile</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/CreativeWriting.png" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Content & Creative Writing</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Concepts / Ideas / Documentation</a></h4>
                    </div>
                </div>
            </div>
           
           <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/cyber.jpg" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Security Penetration</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Cyber Security</a></h4>
                    </div>
                </div>
            </div>
            
           
              <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/Business&Finance.png" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Administrative & Secretary</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Business & Finance</a></h4>
                    </div>
                </div>
            </div>
              </div>
        
              <div class="item">
                <div class="col-md-3 col-sm-4 col-xs-12 freelancercard ">
                <div class="freelancer_card">
                    <img src="uploads/graphics.jpg" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Administrative & Secretary</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Typing & Call Handling</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/worpress.jpg" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Bulid a stunning Website</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Ecommerce</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/law.jpg" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Legal professional </h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Barristers</a></h4>
                    </div>
                </div>
            </div>
            
             <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/Graphicss deigns.png" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Design & Art</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Graphic Design</a></h4>
                    </div>
                </div>
            </div>
              </div>
            
              <div class="item">
                 <div class="col-md-3 col-sm-4 col-xs-12 freelancercard ">
                <div class="freelancer_card">
                    <img src="uploads/Data-Science.png" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Extract knowledge and insights </h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Data Science</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/worpress.jpg" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Bulid a stunning Website</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Ecommerce</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/law.jpg" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Legal Professional</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Barristers</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 freelancercard">
                <div class="freelancer_card">
                    <img src="uploads/cyber.jpg" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5>Security Penetration</h5>
                        <h4><a href="<?php echo SURL.'Offer' ?>" >Cyber Security</a></h4>
                    </div>
                </div>
            </div>
              </div>
            
            </div>
        
            <!-- Left and right controls -->
            <a class=" left carousel-control freelancer_indecator_left" href="#freelancerslider" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left freelancerslider_left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control freelancer_indecator_right" href="#freelancerslider" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right freelancerslider_right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        
    </div>
    
    <!--<div class="row">
        
        <div id="freelancerslider" class="carousel slide" data-ride="carousel">
            
            <!-- Wrapper for slides --
            <div class="carousel-inner freelancer_slider">
              <div class="item active">
                   <?php
                    foreach($categories as $service)
                    {?>
                <div class="col-md-3 col-sm-4 col-xs-12 freelancercard ">
                <div class="freelancer_card">
                   <a href="<?php echo SURL.'Offer' ?>"> <img src="<?php echo $service['newimages'];?>" class="img-responsive img-fluid" />
                    <div class="freecard_content">
                        <h5><?php echo $service['title'];?></h5>
                        <h4><?php echo $service['cat_name'];?></h4></a>
                    </div>
                </div>
                
                
            </div>
            
            <?php } ?> 
              </div>
           
            </div>
        
            <!-- Left and right controls --
            <a class=" left carousel-control freelancer_indecator_left" href="#freelancerslider" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left freelancerslider_left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control freelancer_indecator_right" href="#freelancerslider" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right freelancerslider_right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        
         
        </div>-->

</div>

    </div>
  </div>
<div class="container" style="background: #fff;width:100%;">
    <div class="gigconome">
    <!--<div class="row">-->
    <!--    <div class="col-md-6 detail">-->
    <!--        <h2 style="color:black">An effective & efficient way of getting work done   </h2>-->
    <!--        <div class="points">-->
    <!--            <h3><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Transact with confidence</h3>-->
    <!--            <h4>We will only release funds when you authorise us to do so. We pride ourselves on the quality of our freelancers work and their ability to fulfil your needs and requirement.</h4>-->
    <!--        </div>-->
    <!--        <div class="points">-->
    <!--            <h3><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>New ways of working are possible</h3>-->
    <!--            <h4>A valued service for both expanding and declining businesses that will bring fresh thinking and insight to your organisation. </h4>-->
    <!--        </div>-->
    <!--        <div class="points">-->
    <!--            <h3><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Empowerment</h3>-->
    <!--            <h4>By empowering a productive and creative experience for Freelancers you will benefit from increased innovation which will deliver new value to your customers.</h4>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-md-6 video_cont ">-->
    <!--        <video class="youtube_video" src="uploads/newvideomain.mp4" controls></video>-->
    <!--    </div>-->
    <!--</div>-->
    
         <div class="row">
            <div class="col-md-6 detail">
                <h2 style="color:black"> But how does GigeconoMe work?</h2>
                <div class="points">
                    <h3 style="font-size:16px!important;font-weight: 500;"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Whether you are a freelancer or a business, GigeconoMe is free to join.</h3>
                </div>
                <div class="points">
                    <h3 style="font-size:16px!important;font-weight: 500;"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>You can set up a profile in a matter of minutes and start looking for new projects within the hour.</h3>
                </div>
                <div class="points">
                    <h3 style="font-size:16px!important;font-weight: 500;"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Businesses are able to search by sector and look at individual freelancers’ profiles to see examples of their work and projected costing.</h3>
                </div>
                
                <div class="points">
                    <h3 style="font-size:16px!important;font-weight: 500;"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Freelancers and businesses agree on a statement of work by which the finished work shall be assessed.</h3>
                </div>
                
                <div class="points">
                    <h3 style="font-size:16px!important;font-weight: 500;"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>When work has been completed, the funds are released and GigeconoMe receives a small percentage.</h3>
                </div>
                
                <div class="points">
                    <h3 style="font-size:16px!important;font-weight: 500;"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Businesses have the chance to start small by inserting an individual freelancer into a project alongside existing staff, before expanding their network of reliable and trusted freelancers over time.</h3>
                </div>
                
                <div class="points">
                    <h3 style="font-size:16px!important;font-weight: 500;"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Many businesses, including major corporations, now rely on ‘talent clouds’, where a host of freelancers have already been pre-vetted and onboarded ready for when they are needed. We can help you achieve this.</h3>
                </div>
            </div>
            <div class="col-md-6 video_cont ">
                <video class="youtube_video" src="uploads/newvideomain.mp4" controls></video>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid post" style="padding-bottom: 70px;">
<div class="container">
    <div class="madeproject">
        <div class="row">
            <div class="col-md-12 ">
                <h2 class="project_heading">Connect with endless <b>remote talent from across the world</b></h2>
            </div>
    
        </div>
    <div class="row">
    <div class="responsive slider">
           
                   <?php //$myuser = $this->db->query("select * from users where u_id='".$this->session->userdata('user')."'")->result_array()[0];
                  foreach ($Employees as $value) {
                  $image = $this->db->query("select * from service_portfolio where service_id='".$value['service_id']."' order by id")->result_array()[0]['image'];
                   ?>
                  <div class="col-md-3 col-sm-4 col-xs-6 " style="padding: 20px">
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
                                            <img src="<?php echo SURL.$image;?>"  class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="card_content">
                                        <div class="card_text datacard">
                                            <a href="<?php echo SURL.'Buy/index/'.$value['service_id'];?>"><?php echo $value['title'];?></a>
                                        </div>
                                        <div class="card_rate">
                                            <span>£<?php echo $value['amount']?></span>
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
                                            <h6>Sold: <?php echo $sold?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                  <?php } ?>
                
                
                </div>
                   
        </div>

</div>
 </div>

<div class="container-fluid" style="padding:0px;background:white">
    <div class="explore hidden">
        <div class="col-md-12 detail">
            <h2 class="text-center">Explore GigeconoMe</h2>
           
        </div>
        
        <div class="test">    
            <div class="col-sm-12">
            
            
            <?php
            foreach ($record as $value) {
            ?>
            
            <div class="col-md-3 col-sm-4 col-xs-6 explore_img">
                <img class="img-thumbnail my-img" src="<?php echo $value['image'] ?>" style="width:100%;height:206px;" alt="">
                <a href="javascript:void(0)"><h4  style="text-align:center"><?php echo $value['cat_name']; ?></h4></a>
            </div>
             <?php } ?>
             
             <!--
             <div class="col-md-1 hidden-xs hidden-sm"></div>
             
            </div>
            <div class="col-md-1 hidden-xs hidden-sm"></div>
            <?php
             for($i=1;$i<=5;$i++){
             ?>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-thumbnail my-img" src="<?php echo base_url(); ?>assets/images/notifications-01.png" alt="">
                <h4>Website Design</h4>
            </div>
            
             <?php } ?>
             
             <div class="col-md-1"></div>
    -->
       
    
            </div>
    
    
        </div>
    </div>

<!--<div class="container-fluid " style="padding: 20px 0px;">-->
<!--  <div>-->
<!--    <div class="col-md-12 breaker"></div>-->
<!--  </div>-->
<!--</div>-->
<div class="container" style="background: #fff;width:100%;">
    <div class="gigconome">
    <div class="row">
        <div class="col-md-6 detail">
            <h2 style="color:black">Increase capacity without increasing costs</h2>
            <div class="points">
                <h3 style="color:black"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Avoid lengthy onboarding and recruitment processes</h3>
                <h4>Hire Freelance professionals on demand at the click of a button.</h4>
            </div>
            <div class="points">
                <h3  style="color:black"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Unlock growth opportunities and drive greater equality</h3>
                <h4>Freelancing isn’t bound by barriers like location. Therefore, you can broaden your search and welcome untapped talent from new communities and geographies.</h4>
            </div>
            <div class="points">
                <h3  style="color:black"><span class="glyphicon glyphicon-ok-circle workdone_icon"></span>Widen your talent pool</h3>
                <h4>Flexible schedules and offering remote positions will give you access to a level of talent you wouldn’t have been able to attract before.</h4>
            </div>
        </div>
        <div class="col-md-6 video_cont ">
            <video class="youtube_video" src="uploads/VID-20200811-WA0028.mp4" controls></video>        </div>
    </div>
    </div>
</div>



<div class="container-fluid post footer">
<div class="container">
    <div class="project_cover">
  <div class="row">
  <div class="col-md-12 post footer-banner" style="background:url('<?php echo base_url();?>assets/images/a.png');padding:40px 0px;">
    <h2 class="text-center get_project ">
      Want to network, increase your skills and expose yourself to new opportunities?</h2>
      <!--<h4>We have Covered your all Business Needs</h4>-->
     <center><a href="<?php echo SURL."Newsignup";?>" class="btn btn-primary btn-lg start-btn">Get Started</a>
  </div></center>

 </div>
</div>

</div>
  </div>



<?php include("includes/front_end_footer.php");?>

<script src='<?php echo base_url();  ?>assets/js/slick.min.js'></script>

<script>

        $(document).ready(function(){
            
          $(".responsive").slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            variableWidth:false,
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
        });
</script>
