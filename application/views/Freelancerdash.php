<?php include("includes/front_end_header.php");?>
<style>
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
.recommendefeelancer_slider{
    height: 195px;
}
.recommendefeelancer_slider img{
    width: 141px!important;
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
        width: 70%;
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




    .hover_text{
    color: #fff;
    background: rgb(17 17 17);
    transition: all 0.35s cubic-bezier(0.28, 0.37, 0, 1.15) 0s;
    opacity: 0;
    display: flex;
    position: absolute;
    top: -3px;
    width: 85%!important;
    height: 126px;
    padding-top: 70px;
}
.hover_text h6{
    color: #fff;
    font-size: 14px;
}
.hover_left{
    width: 50%;
    text-align: center;
}

.hover_text:hover{
    opacity:0.6;
}

.hover_right{
    margin-left: 14px;
}

@media screen and (max-width: 764px) and (min-width:340px){
.hover_text{
           width: 90%!important;
       }
    
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
    
    <div class="col-md-1 mt-2 col-sm-2 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-md-offset-3">
       <div class="panel panel-default mycard">
         <div class="panel-body">
          <div class="panel-title">
            <?php 
            
            ?>
            <h1 align="center" class="nums" style="font-size:35px;"><?php echo $this->Common->myproposalleft($myuser['u_id']); ?></h1>
          </div>
          <h3 align="center" class="mt-2 text-secondary">Proposal Credits</h3>
          <h6 class="text-center"><a href="<?php echo SURL.'PaymentSummary/buycredits/'.$myuser['u_id'];?>" style="color:green;font-weight:bold;">Buy more</a></h6>
         </div>
       </div>
    </div>
    <div class="col-md-1 mt-2 col-sm-2 col-xs-10 col-xs-offset-1">
       <div class="panel panel-default mycard">
         <div class="panel-body">
          <div class="panel-title">
             <?php 
             $openingprojects_jobs = $this->db->query("select count(*) as count from jobs where job_awarded_to='".$myuser['u_id']."' and job_status='Ongoing'")->result_array()[0]['count'];
             
             $openingprojects_services = $this->db->query("select count(*) as count from services_purchased where service_owner_id='".$myuser['u_id']."' and status='Ongoing'")->result_array()[0]['count'];
             ?>
            <h1 align="center" class="nums" style="font-size:35px;"><?php echo $openingprojects_jobs+$openingprojects_services; ?></h1>
          </div>
          <h3 align="center" class="mt-2 text-secondary">Ongoing Projects</h3>
    
         </div>
       </div>
    </div>
   <div class="col-md-1 mt-2 col-sm-2 col-xs-10 col-xs-offset-1">
   <div class="panel panel-default mycard">
     <div class="panel-body">
      <div class="panel-title">
        <h1 align="center" class="nums" style="font-size:35px;">
            <?php 
                
                $start_date=date("Y-m-01");
                $end_date=date("Y-m-t");
                   
                $earnedthismonth = $this->db->query("select sum(damount) as sum from transactions where u_id='".$myuser['u_id']."' and in_escrow='No' and is_clear='Yes' and left(date,10) between '$start_date' and '$end_date' and camount != damount")->result_array()[0]['sum'];
          
            
            ?>
            <?php 
            echo number_format($earnedthismonth,0);
            ?>
        </h1>
      </div>
      <h3 align="center" class="mt-2 text-secondary">Earned this month(£)</h3>

     </div>
   </div>
  </div>
  
  

</div>
</div>
<div class="container-fluid">
  <div class="row post post_project" style="padding-bottom: 35px!important;">
  <div class="col-md-4 col-xs-12">
    <a class="btn btn-success project_btn project" href="/PaymentSummary/featureprofile">
      <strong>FEATURE PROFILE</strong></a>
  </div>
    <div class="col-md-4 col-xs-12  ">
        <h1 class="earn" style="font-size: 33px;">Earn<span> 10x</span> more on featuring your profile.</h1>
  </div>
  

</div>
</div>



<div class="container-fluid navigate ">
  <div class="row ranking">
  	<div class="col-md-12">
  		<h1 class="rank" align="center">RANKING</h1>
  	</div>
    <div class="col-md-12 col-xs-12">
      <div class="table">
      	<table style="margin-bottom: 10px;">
      		<?php
      		    $i=1;
                foreach($ranking_user as $key=>$value){

      		?>
      		<tr>
      			<td>
      			    <ul>
      			        <!--<li><?php echo $i; ?></li>-->
      			        <li>
      			            <?php 
                         	    $user_badge = $this->Common->user_rank($value['u_id']);
                         	    if(!empty($user_badge)){
                            ?>
                                <img src="<?php echo $user_badge;?>" data-toggle="tooltip" title="Bronze" width='40px' class="img-fluid ring_img">
                            <?php } ?>
      			        </li>
      			        <li><img class="img-circle ranking_image" style="width: 30px;height: 30px;" src="<?php echo $value['dp'];?>"></li>
      			        <li>
      			            <span class="name">
      			            <a href="<?php echo SURL.'TimeLine/index/'.$value['username'];?>"><?php echo ucwords($value['f_name']." ".$value['l_name']);?></a>
      			            </span>
      			            <span style="display:block;"><?php echo $value['profession']; ?></span>
      			         
      			         <?php 
             		        $rating_Data = $this->Common->rating_user($value['u_id']);
             		        
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
      			        </li>
      			        
      			    </ul>
      			    <br>
      			   
      			</td>
      		</tr>
      		<?php $i++;}	?>
      	</table>
      </div>
    </div>

</div>
</div>
<section class="bottom footer">
<div class="container">
  <div class="row">
  <div class="col-md-12 Ongoing">
    
      <h2 align="center">ONGOING PROJECTS</h2>
  </div>
</div>
<div class="row ">
	<div class="col-md-6">
		<h2 >Projects</h2>
		 <?php 
		    if(!empty($projects)){
		        foreach($projects as $key=>$value){
		?>
		<div class="col-md-12 pros">
			<h3><?php echo ucfirst($value['job_title']);?></h3>
			<img class="img-circle" src="<?php echo $value['dp'];?>">
			<span><?php echo ucwords($value['f_name']." ".$value['l_name']);?></span>
		</div>
		<?php }}else{ ?>
		<h5 class="text-center" style="color:white;font-weight:bold;">No Record Found.</h5>
		<?php } ?>
		<!--<div class="col-md-12 pagination_cont">-->
		<!--    <ul class="pagination">-->
  <!--              <li><a href="#">1</a></li>-->
  <!--              <li class="active"><a href="#">2</a></li>-->
  <!--              <li><a href="#">3</a></li>-->
  <!--              <li><a href="#">4</a></li>-->
  <!--              <li><a href="#">5</a></li>-->
  <!--          </ul>-->
		<!--</div>-->
	</div>
	<div class="col-md-6 right-project">
	<h2 align="center">Offers</h2>
        <div class="row">
            <?php 
                if(!empty($services)){
                  foreach($services as $key=>$value){
                      $image = $this->db->query("select * from service_portfolio where service_id='".$value['service_id']."' order by id")->result_array()[0]['image'];
            ?>
            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom:10px;">
                <div class="offer_card footer_card">
                    <a href="<?php echo SURL.'Buy/index/'.$value['service_id']; ?>"><img src="<?php echo $image;?>" alt="Avatar" style="width:100%!important;height: 120px!important;"></a>
                    <div class="offsercard_body">
                        <h5><b><?php echo ucwords($value['f_name']." ".$value['l_name']); ?></b></h5> 
                        <?php 
                            $service_rating = $this->Common->rating_service($value['service_id']);
                            
                            if($service_rating['totalrating'] >= 20){
                        ?>
                            <span class="glyphicon glyphicon-star"></span>
                        <?php }else{ ?>  
                            <span class="glyphicon glyphicon-star-empty"></span>
                        <?php } ?>
                        
                        <?php if($service_rating['totalrating'] >= 40){?>
                            <span class="glyphicon glyphicon-star"></span>
                        <?php }else{?>    
                            <span class="glyphicon glyphicon-star-empty"></span>
                        <?php } ?>
                        
                        <?php if($service_rating['totalrating'] >= 60){?>
                            <span class="glyphicon glyphicon-star"></span>
                        <?php }else{?>    
                            <span class="glyphicon glyphicon-star-empty"></span>
                        <?php } ?>
                        
                        <?php if($service_rating['totalrating'] >= 80){?>
                            <span class="glyphicon glyphicon-star"></span>
                        <?php }else{?>    
                            <span class="glyphicon glyphicon-star-empty"></span>
                        <?php } ?>
                        
                        <?php if($service_rating['totalrating'] >= 100){?>
                            <span class="glyphicon glyphicon-star"></span>
                        <?php }else{?>    
                            <span class="glyphicon glyphicon-star-empty"></span>
                        <?php } ?>
                            
                        <span class="offercard_star"> (<?php echo intval($service_rating['votes']);?>)</span>

                        <h6 class="text-right"><b>£<?php echo $value['amount'];?></b></h6>
                    </div>
                    <?php 
                        $ratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from service_rating where service_id='".$value['service_id']."'")->result_array()[0];
                        $totalrating = $ratingquery['stars']*100/($ratingquery['total']*5);
                        
                    ?>
                    
                    <div class="hover_text">
                        <div class="hover_left">
                            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                            <h6>Rating: <?php echo intval($totalrating);?>%</h6>
                        </div>
                        <?php 
                        $sold = $this->db->query("select count(*) as count from services_purchased where service_id='".$value['service_id']."'")->result_array()[0]['count'];
                        ?>
                        <div class="hover_right">
                            <i class="fa fa-archive fa-2x" aria-hidden="true"></i>
                            <h6>Sold: <?php echo $sold;?></h6>
                        </div>
                    </div>
<style>
/*    .hover_text{*/
/*    color: #fff;*/
/*    background: rgb(17 17 17);*/
/*    transition: all 0.35s cubic-bezier(0.28, 0.37, 0, 1.15) 0s;*/
/*    opacity: 0;*/
/*    display: flex;*/
/*    position: absolute;*/
/*    top: 21px;*/
/*    width: 96%!important;*/
/*    height: 144px;*/
/*    padding-top: 84px;*/

/*}*/
/*.hover_text h6{*/
/*    color: #fff;*/
/*    font-size: 14px;*/
/*}*/
/*.hover_left{*/
/*    width: 50%;*/
/*    text-align: center;*/
/*}*/
</style>                    
                    <!--<div class="hover_text">-->
                    <!--    <div class="hover_left">-->
                    <!--        <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>-->
                    <!--        <h6>Rating: <?php echo intval($totalrating);?>%</h6>-->
                    <!--    </div>-->
                     
                    <!--    //$sold = $this->db->query("select count(*) as count from services_purchased where service_id='".$value['service_id']."'")->result_array()[0]['count'];-->
                    <!--    ?>-->
                    <!--    <div class="hover_right">-->
                    <!--        <i class="fa fa-archive fa-2x" aria-hidden="true"></i>-->
                    <!--        <h6>Sold: <?php echo $sold;?></h6>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
            <?php }}else{?>
            <h5 class="text-center" style="color:white;font-weight:bold;">No Record Found.</h5>
            <?php } ?>


		</div>
	</div>
</div>
</div>

</section>
</html>


<?php include("includes/front_end_footer.php");?>