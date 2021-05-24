<?php include("includes/front_end_header.php");?>
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
.hourl_rate{
    color: #111;
    font-weight: bold;
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

.pagination li a:hover,.pagination > .active > a{
    background:#00a651 !important;
    color:white;
    border:1px solid #00a651 !important;
}

</style>


<div class="container-fluid" style="background-color:white">
	
	<div class="container-fluid">
		<div class="row" id="filter_conatiner">

			
		<div class="col-sm-11">
        <div class="col-sm-11 col-xs-12 filters" id="demo">
           		<?php $query=$this->db->query("select * from categories where parent_id=0")->result_array();?>
            <form class="form-inline" action="<?php echo base_url()?>Freelancers" method="post">
                <select class="select_dropdown form-control" name="category">
                    <option value="all">All Category</option>
                    <?php foreach($query as $key=>$value){?>
                  <option <?php if($this->input->post("category")==$value['cat_id']){ echo "selected";}?>  value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                  <?php } ?>
                </select>
                <select name="rate" class="select_dropdown form-control">
                  <option <?php if($this->input->post("rate")=="0"){ echo "selected";}?> value="0">Hourly Rate</option>
                  <option <?php if($this->input->post("rate")=="0-10"){ echo "selected";}?> value="0-10">0£-10£</option>
                  <option <?php if($this->input->post("rate")=="11-20"){ echo "selected";}?> value="11-20">11£-20£</option>
                  <option <?php if($this->input->post("rate")=="21-30"){ echo "selected";}?> value="21-30">21£-30£</option>
                  <option <?php if($this->input->post("rate")=="31-40"){ echo "selected";}?> value="31-40">31£-40£</option>
                </select>
                <?php $allbadges = $this->db->query("select * from rank")->result_array();?>
                <select name="rank" class="select_dropdown form-control">
                  <option <?php if("0"==$this->input->post("rank")){ echo "selected";}?> value="0">Rank</option>
                  <?php foreach($allbadges as $key=>$value){?>    
                  <option <?php if($value['image']==$this->input->post("rank")){ echo "selected";}?> value="<?php echo $value['image']; ?>"><?php echo $value['name']; ?></option>
                  <?php } ?>
                </select>
                
                <select name="completed_projects" class="select_dropdown form-control">
                   <option <?php if("0"==$this->input->post("completed_projects")){ echo "selected";}?> value="0">Completed Projects</option>
                  <option <?php if("5"==$this->input->post("completed_projects")){ echo "selected";}?> value="5">More than 5</option>
                  <option <?php if("50"==$this->input->post("completed_projects")){ echo "selected";}?> value="50">More than 50</option>
                  <option <?php if("500"==$this->input->post("completed_projects")){ echo "selected";}?> value="500">More than 500</option>
                  
                  
                </select>
                
                <button class="btn btn-success btn-lg" id="submit_btn">Apply</button>
            </form>
           
        </div>
        </div>

	
		    
		    
		</div>

	</div>
	
<div class="container-fluid image_container">
        
        <?php
        //echo "<pre>";var_dump($result);
        
        if(!empty($result)){
        foreach($result as $key=>$value){
        ?>
		<div class="row">
            <div class="col-xs-8 col-sm-8">
           
                <div class="row">
             	    <div class="col-xs-3 col-sm-1" id="img_col">
             		    <img src="<?php echo $value['dp'];?>" class="img-circle" id="image_2">
             	    </div>
                    <div class="col-xs-9 col-sm-11">
     		            <h4> 
     		                <a href="<?php echo SURL.'TimeLine/'.$value['username'];?>">
     		                    <strong>
     		                            <?php 
     		                                if($value['show_name']=="first_name"){
     		                                    echo ucwords($value['f_name']);       
     		                                }else{
     		                                    echo ucwords($value['f_name']." ".$value['l_name']);
     		                                }
     		                             ?>
     		                    </strong>
     		                </a>
     		                <?php if($value['is_featured']==1){?>
     		                <button class="featured_btn" style="background: green;color: white;font-size: 11px;margin-left: 144px;font-weight: bold;float: right;" disabled>Featured</button>
     		                <?php } ?>
     		            </h4>
             		    <p>
             		        <?php 
             		        $rating_Data = $this->common->rating_user($value['u_id']);
             		        if($rating_Data['totalrating']>=20){
             		        ?>
                		    <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                		    <?php }else{?>
                		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                		    <?php } ?>
                		    
                		    <?php 
             		        if($rating_Data['totalrating']>=40){
             		        ?>
                		    <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                		    <?php }else{?>
                		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                		    <?php } ?>
                		    
                		    <?php 
             		        if($rating_Data['totalrating']>=60){
             		        ?>
                		    <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                		    <?php }else{?>
                		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                		    <?php } ?>
                		    
                		    <?php 
             		        if($rating_Data['totalrating']>=80){
             		        ?>
                		    <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                		    <?php }else{?>
                		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                		    <?php } ?>
                		    
                		    <?php 
             		        if($rating_Data['totalrating']>=100){
             		        ?>
                		    <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                		    <?php }else{?>
                		    <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                		    <?php } ?>
                		    
                		    
                		    
                		    <span><?php echo intval($rating_Data['totalrating']); ?>%</span>
                		    <span>(<?php echo intval($rating_Data['votes']);?>)</span>
                		</p>
                		<p>
                			<span class="glyphicon glyphicon-map-marker" style="color:rgb(52, 143, 235)"></span>
                	        <span><?php echo $value['location'];?>,</span>
                		</p>
    		
    		            <p>
    		                <?php 
    		                    
    		                    if(!empty($value['tags'])){
    		                        
    		                    $usertags = explode(",",$value['tags']); 
    		                    foreach($usertags as $key=>$tagvalue){
    		                ?>
                		    <span class="margin_ul background_ul"><?php echo $tagvalue;?></span>
                		    <?php }} ?>
                		</p>
                    </div>
                </div>

            </div>
            <div class="col-xs-1 text-center col-xs-2">
                 
                <h5>
                    <?php 
                    
                    
                    if($value['u_id']==$myuser['u_id']){
                      
                        $wishicon = "";
                    }else{
                        $wishicon = "wish_icon";
                    }
                    
                      
                    $is_wished = $this->db->query("select * from users_wishlist where whom_wished='".$value['u_id']."' and u_id='".$myuser['u_id']."'");
                    if($is_wished->num_rows() > 0){
                        
                    ?>
                    <i class="glyphicon glyphicon-heart wishfree <?php echo $wishicon;?>" style="color: red !important;" id="wish_heart_<?php echo $value['u_id'] ?>" data-id="<?php echo $value['u_id'] ?>"></i>
                    <?php }else{?>
                     <i class="glyphicon glyphicon-heart wishfree <?php echo $wishicon;?>" style="color:908b8b !important;" id="wish_heart_<?php echo $value['u_id'] ?>" data-id="<?php echo $value['u_id'] ?>"></i>
                    <?php } ?>
                </h5>
                 <?php 
                    $total_wishlist = $this->db->query("select count(*) as sum from users_wishlist where whom_wished='".$value['u_id']."'")->result_array()[0]['sum'];
                ?>
                <h6 id="total_likes_<?php echo $value['u_id'] ?>"><?php echo $total_wishlist;?></h6>
            </div>
            <div class="col-xs-3 col-xs-2 select_padding">
                
             	<h3 class="rank_margin">Rank</h3>
             	<?php 
             	    $user_badge = $this->common->user_rank($value['u_id']);
             	    if(!empty($user_badge)){
             	        
             	        $badge_expode=explode('/',$user_badge);
             	        $badge_name=$badge_expode[2];
             	        
             	        if($badge_name=="Badge-01.png")
             	        {
             	            $badgetitle="Bronze";
             	        }elseif($badge_name=="Badge-02.png")
             	        {
             	            $badgetitle="Silver";
             	            
             	        }elseif($badge_name=="Badge-03.png"){
             	            
             	             $badgetitle="Gold";
             	        }elseif($badge_name=="Badge-04.png"){
             	            
             	             $badgetitle="Platinum";
             	        }elseif($badge_name=="Badge-05.png"){
             	            
             	             $badgetitle="Diamond";
             	        }
             	      
    	        ?>
    	            <img src="<?php echo $user_badge;?>" data-toggle="tooltip" title="<?php echo $badgetitle ?>" width='40px' class="img-fluid ring_img">
    	            <?php } ?>
             	<?php if(!empty($value['hourly_rate'])){?>
             	<h4 class="hourl_rate">£<?php echo $value['hourly_rate'];  ?>/hr</h4>
             	<?php } ?>
             		<?php 
             	    if($this->session->userdata("LoggedIn") == TRUE){
             	    if($value['u_id']!=$myuser['u_id']){?>
             	        <button class="btn btn-success button_border" style="margin-bottom:10px;"><a href="<?php echo SURL.'postproject/index/'.$value['username'];?>" style="color:#fff;">Contact</a></button>
             	
             	    <?php }} ?>
            </div>

        </div>
        <hr>
        <?php }}else{ ?>
        <h4 class="text-center">No Record Found.</h4>
        <?php } ?>
           <div class="text-center">
        	<?php echo $links; ?>
        	</div>
    </div>
   
</div>



<?php include("includes/front_end_footer.php");?>


