<?php include("includes/front_end_header.php");?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
    .favourite_cont{
        background: #fff;
        margin: 20px;
        min-height:500px;
    }
    .nav-tabs > li.active > a{
        background: #009247;
        color: #fff;
    }
    .nav-tabs > li > a:hover{
        background: #009247!important;
        color: #fff;
    }
    .nav-tabs > li.active > a:hover{
        color: #fff;
    }
</style>
<div class="container-fluid">
    <div class="favourite_cont">
        <div class="row">
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <li class="tab active"><a  id="freelance_btn">Freelancer</a></li>
                    <li class="tab"><a id="service_button">Services</a></li>
                    <li class="tab"><a id="projects_button">Projects</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            
            <!-- TAB FOR FREELANCER START-->
            
            <div class="freelancer_1">
                <style type="text/css">

                    .select_padding
                    {
                    	padding: 0px;
                    }
                    
                    #heading_filter
                    {
                    	text-align: right;
                    	margin-top: 7px;
                    }
                    
                    
                    #filter_conatiner
                    {
                    	padding: 7px;
                    }
                    
                    
                    #image_2
                    {
                    	width: 58px;
                    	height: 62px;
                    }
                    
                    
                    .image_container
                    {
                    	padding: 25px;
                    	padding-bottom:0px;
                    	
                    }
                    
                    .start_margin
                    {
                    	margin-top: 10px;
                    }
                    
                    .image_margin
                    {
                    	margin-top: -14px;
                    }
                    
                    .rank_margin
                    {
                    	margin-top: -14px;
                    }
                    
                    #stra_container
                    {
                    	margin-top: -7px;
                    }
                    
                    .margin_ul
                    {
                    	padding: 0px;
                    }
                    
                    
                    
                    
                     .background_ul 
                     {
                     	list-style-type: none;
                     	display: inline;
                     	background-color: black;
                     	color: white;
                     	margin: 3px;
                     	padding:4px;
                     }
                     .star
                     {
                     	color: gold;
                     }
                    
                     #wrapper
                     {
                     padding:0px;
                     margin:0px;
                     }
                     
                      #img_col
                     {
                     padding:0px;
                     text-align:right;
                     }
                     
                     .rank_margin
                     {
                         margin:0px;
                         margin-bottom:8px;
                     }
                     
                     @media (max-width: 554px) {
                       .image_container
                       {
                    	padding: 12px;
                       }
                    }
                    
                    .button_border
                    {
                        border-radius:7px;
                    }
                    
                    </style>
                  
                <div class="container-fluid" >
                    <?php
                        
                        if(count($favusers) > 0){
                            
                            foreach($favusers as $user){
                            
                          
                    ?>
                    <div class="container-fluid image_container">
                    	<div class="row">
                           <div class="col-xs-9 col-sm-10">
                               <div class="row">
                             	  <div class="col-xs-3 col-sm-1" id="img_col">
                             		<img src="<?php echo $user['dp']?>" class="img-circle" id="image_2">
                             	   </div>
                                    <div class="col-xs-9 col-sm-11">     	
                             		     <a href="/TimeLine"><h4><strong><?php echo $user['f_name']?> <?php echo $user['l_name']?></strong></h4></a>
                             		    <p>
                    		 		        <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                    		                <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                    		                <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                                    		<span class="star"><i class="glyphicon glyphicon-star"></i></span>
                                    		<span class="star"><i class="glyphicon glyphicon-star"></i></span>
                                    		<span>100%</span>
                                    		<span>(98)</span>
                    		            </p>
                    
                    		            <p>
                    			            <span class="glyphicon glyphicon-map-marker" style="color:rgb(52, 143, 235)"></span>
                                        	<span><?php echo $user['location']?></span>
                                            <!--<span>Pakistan</span>-->
                    		            </p>
                    		            
                    		             <ul class="skill_ul">
                        	               
                        	               
    	                                    </ul>
                    		
                                		<p>
                                		   <?php  $str=$user['skills'];
                        	                $str2=(explode(",",$str)); ?>
                        	                <?php foreach($str2 as $value){ ?>
                        	                <span class="margin_ul background_ul"><?php echo $value ?></span>
                        	                <?php }?>
                                		    <!--<span class="margin_ul background_ul">Html</span>-->
                                		    <!--<span class="margin_ul background_ul">Css</span>-->
                                		</p>
                                    </div>
                               </div>
                          </div>
                             <div class="col-xs-3 col-xs-2 select_padding">
                             	<h3 class="rank_margin">Rank:</h3>
                             	     <button class="btn btn-success button_border"><a href="/offer" style="color:#fff;">Contact</a></button>
                             </div>
                    
                            </div>
                       </div>
                       
                       <hr>
                       
                       <?php } }else{ ?>
                       
                       <h2 class="text-center"> No Record Found!</h2>
                       
                       <?php } ?>
                       
                      
                       
                    </div>
 
            </div>
            
            <!-- TAB FOR SERVICES START-->
            
            <div >
                <style>
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
    width: 100%;
    height: 160px;
    padding-top: 16px;
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
    width: 38px;
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
                </style>
                
                <div class="container-fluid main-offers service_1" style="display:none; " >
                    
        <div class="row offers mt-2">
           
           <?php
           
           if(count($favservices) > 0){
           
           foreach($favservices as $service){
               
               $service_img = $this->db->query("select * from service_portfolio where service_id = ".$service['service_id'])->result_array()[0]['image'];
              // echo "select * from users where u_id = ".$service['u_id'];
               $users = $this->db->query("select * from users where u_id = ".$service['u_id'])->result_array()[0];
               $sold = $this->db->query("SELECT count(*) as sold FROM `services_purchased` where service_id=".$service['service_id'])->result_array()[0]['sold'];
           ?>
           
            <div class="col-md-3 col-sm-4 col-xs-6 " style="padding: 20px">
            <div class="card_cont">
                <div class="newcard">
                    <div class="card_label hidden">
                        <span>FEATURED</span>
                    </div>
                    <div class="favoriteIcon">
                        <i class="glyphicon glyphicon-heart fav_icon" id=favicon_btn""></i>
                    </div>
                    <div class="newcard_image">
                        <a href="#">
                            <img src="<?php echo base_url()."/".$service_img;?>"  class="img-fluid" />
                        </a>
                    </div>
                    <div class="card_content">
                        <div class="card_text">
                            <a href="<?php echo SURL.'Buy/index/'.$service['service_id'];?>"><?php echo $service['title'];?></a>
                        </div>
                        <div class="card_rate">
                            <span>£<?php echo $service['amount'];?></span>
                        </div>
                    </div>
                    <div class="newcard_footer">
                        <div class="cardfooter_left">
                            <div class="cardfooter_img">
                                <img src="<?php echo base_url($users['dp']); ?>" class="img-fluid" />
                            </div>
                            <div class="cardfooter_text">
                                <a href="<?php echo "TimeLine/index/".$users['username']; ?>"><h6 style="color:#000;font-weight:bold;"><?php echo $users['f_name']." ".$users['l_name'];?></h6></a>
                                <h6 style="color:#555;font-weight:bold;"><?php echo $users['location'];?></h6>
                            </div>
                        </div>
                        <div class="cardfooter_right text-right">
                            <a href="<?php echo SURL.'Buy/index/'.$service['service_id'] ?>" class="newcard_btn" >VIEW</a>
                        </div>
                    </div>
                    <div class="hover_text">
                        <div class="hover_left">
                            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                            <h6>Rating: <?php echo intval($service_rating['votes']);?>%</h6>
                        </div>
                        <div class="hover_right">
                            <i class="fa fa-archive fa-2x" aria-hidden="true"></i>
                            <h6>Sold: <?php echo $sold;?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
       
       <div class="col-sm-12 text-center"> <h2> No Record Found!</h2> </div>
       
       <?php } ?>
        
    </div>
                <!--    <div class="row offers mt-2">-->
                
                <!--        <div class="col-md-2 col-sm-4 col-md-offset-1 col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                     <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                     <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                                     
                <!--                <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart red_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                                    
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                                     
                <!--                                    <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a>  -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart red_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                                    
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                                     
                <!--                                    <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart-empty empty_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                                     
                <!--                                    <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart red_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                <!--                                <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart-empty empty_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                        
                
                <!--    </div>-->
                <!--    <div class="row offers mt-2">-->
                
                <!--        <div class="col-md-2 col-sm-4 col-md-offset-1 col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                <!--                                    <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart red_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                <!--                                <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart red_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                <!--                                <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart-empty empty_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                                    
                <!--                                <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart red_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-2 col-sm-4  col-xs-6 portolio_img">-->
                <!--            <div class="offer_card">-->
                <!--                <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="card-img-top" alt="...">-->
                <!--                <div class="offsercard_body">-->
                <!--                    <img src="<?php echo base_url();  ?>assets/images/client.jpg" class="secondcard_img" alt="..."> -->
                <!--                    <a href="/TimeLine">-->
                <!--                     <span class="secondcard_name">Hasan</span>-->
                <!--                     </a>-->
                <!--                                    <a href="/buy"><h5><b>I will Play Flute in your Song</b></h5></a> -->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star"></span>-->
                <!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
                <!--                    <span class="offercard_star"> (23)</span>-->
                <!--                    <h6 class="text-right"><b>$55</b></h6>-->
                <!--                </div>-->
                <!--                <i class="glyphicon glyphicon-heart-empty empty_heart"></i>-->
                <!--            </div>-->
                <!--        </div>-->
                        
                        
                
                <!--    </div>-->
                <!--</div>-->
            </div>
            
            <!-- TAB FOR PROJECTS START-->
            
            <div>
                <style type="text/css">
                    .select_padding
                    {
                    	padding: 0px;
                    }
                    
                    #heading_filter
                    {
                    	text-align: center;
                    	margin-top: 3px;
                    }
                    
                    #white_div
                    {
                        padding:36px;
                        background-color:white;
                    }
                    
                    
                    #grey_div
                    {
                        padding:23px;
                        background-color:#F3F5F7;
                    }
                    
                    #white_div
                    {
                        padding:23px;
                        background-color:white;
                    }
                    
                    #nov_of_proposal
                    {
                        padding:0px;
                        
                    }
                    .select_padding{
                        padding: 3px;
                    }
                    
                    .green_color
                    {
                        color:green;
                    }
                    
                    
                    ul li
                    {
                        list-style-type:none;
                        display:inline;
                    }
                    
                    #remote_margin
                    {
                        margin-left:-38px;
                    }
                    
                    #proposal_margin
                    {
                        margin-left:14px;
                    }
                    
                    #number_margin
                    {
                        margin-left:5px;
                    }
                    
                    .text_center
                    {
                        text-align:center;
                    }
                    
                    
                    .price_margin
                    {
                        margin-left:72px;
                    }
                    
                    @media (max-width: 432px) {
                        .stars {
                        width:100%;
                        
                        }
                    }
                    	</style>
                     <div class="container-fluid projects_1" style="display:none;" >
                    <?php
                        
                        if(count($favjobs) > 0){
                    
                        foreach($favjobs as $job){
                        
                        $proposals  = $this->db->query("SELECT count(*) as total FROM `jobs_msgs` where custom_status='Proposal' AND job_id = ".$job['job_id'])->result_array()[0]['total'];
                    ?>
                   
                        
                      <div class="container-fluid">
                    	  <div class="row"  id="grey_div">
                    	<div class="col-xs-9 col-sm-10 float-left grey_div stars">
                    			
                    
                          <div class="col-xs-10 col-sm-6">
                           
                    	
                    	    <h4><strong><?php echo $job['job_title'];?></strong></h4>
                    	   
                    	  <h5 class="text-light"><?php echo  $this->check->timeAgo(strtotime($job['date']));?></h5>
                    	  
                    	 <ul>
                    	     <li class="text-success" id="remote_margin"><?php echo $job['job_location'];?></li>
                    	     <li class="text-success" id="proposal_margin">No of Proposals</li>
                    	     <li id="number_margin" style="color:black"><?php echo $proposals;?></li>
                    	 </ul>
                    	
                      </div>
                    	</div>
                    	
                    		<div class="col-xs-3 col-sm-2 float-left text_center stars">
                    		    <div class="row">
                    			<div class="col-xs-12 col-sm-12 text-center">
                    				<h4 class="text-info"><strong>£<?php echo $job['budget'];?> </strong></h4>
                    				</div>
                    			</div>
                    			
                    			<div class="row">
                    			<button class="btn btn-success" ><a href="/Jobdetails/index/<?php echo $job['job_slug'];?>" style="color:#fff;">Send proposal</a></button>
                    			</div>
                    		</div>
                    	</div>
                    	</div>
                   
                    
                    <?php } }else{ ?>
                    
                        <h2 class="text-center"> No record found!</h2>
                        
                    <?php } ?>
                    
                     </div>
            </div>
            
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $(".tab").click(function () {
            $(".tab").removeClass("active");
            // $(".tab").addClass("active"); // instead of this do the below 
            $(this).addClass("active");   
        });
    });

   $(document).ready(function(){
        $("#service_button").click(function(){
        
            $(".service_1").show();
            $(".freelancer_1").hide();
            $(".projects_1").hide();
        });
        $("#projects_button").click(function(){
        
            $(".projects_1").show();
            $(".freelancer_1").hide();
            $(".service_1").hide();
        
        });
        $("#freelance_btn").click(function(){
        
            $(".freelancer_1").show();
            $(".service_1").hide();
            $(".projects_1").hide();
        });
});
</script>


<script>
   
</script>


<?php include("includes/front_end_footer.php");?>


