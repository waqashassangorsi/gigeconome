<?php  include('includes/front_end_header.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/Invitefreelancerpage.css">
<style>

.search_free i {
    color: #00c4cf!important;
}
.search_free {
    padding: 7px;
    background: #fff;
    border-radius: 5px;
}
.search_free input {
    border: none;
}
.invite_btn{
    background: #d2dede!important;
    color: #111!important;
}

.main_freelance_div{
    background: white;
    margin-top: 30px;
    margin-bottom: 50px;
    padding: 15px;
}

.freelancer_drop_search{
    width: 99%;
    margin-left: 0;
    box-shadow: 0 0 10px -3px grey;
}
#image_2 {
    width: 58px;
    height: 62px;
}
.freelancer_drop_search img{
    width: 30px;
    height: 30px;
}
.freelancer_drop_search span{
    margin-left: 14px;
}
.freelancer_drop_search li{
    padding: 9px 0;
}


@media screen and (max-width: 504px) and (min-width:340px){
.star {
    padding-left: 5px !important;
}
    
}

.tick_wrpr {
    padding-top: 11px;
}

.oktick{font-size: 50px;color: #5BC0DE !important;border: 1px solid #ccc;border-radius: 50%;width:80px !important; padding: 15px;}

.heading4
{
    font-size: 12px !important;
    color:black;
}
</style>

<div class="container-fluid" id="main_container">
    <div class="inivte_freelnce_wapr">
        <div class="row">
            <h3 class="col-xs-12">Invite Freelancer</h3>
            <div class="col-md-5 col-xs-12" style="padding: 0;margin-left: 13px;">
                <div class="input-group search_free ">
                    <input type="text" class="form-control" id="serachresult_text"  name="search_freelancer" placeholder="Search Freelancer">
                    <ul class="dropdown-menu freelancer_drop_search"  id="serachresult">
                       
                    </ul>
                    <div class="input-group-btn">
                      <button class="btn bg-white" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </div>
                </div>
                <h3 class="heading4"><?php echo count($record);?> Freelancers Found</h3>
            </div>
        </div>
            <div class="row invite_link">
                <div class="col-sm-12">
                  <button class="btn btn-primary button_invites invite_all" data-jobid="<?php echo $this->uri->segment("2") ?>">Invite All</button>
                  <a class="btn btn-primary button_invites" href="<?php echo base_url();?>MyBuyerdashboard/job">Skip</a>
               </div>
            </div>
        <div class="row freelance_profilediv">
             <div class="col-md-12 main_freelance_div">
                <?php 
            	    foreach($record as $key=>$value){ 
            	        ?>
            	       
            	           
            	            <div class="row">
            	                 <input type="hidden" class="allids" value="<?php echo $value['u_id']; ?>"/>
            <div class="col-xs-8 col-sm-8">
           
                <div class="row">
             	    <div class="col-xs-3 col-sm-1" id="img_col">
             		    <img src="<?php echo $value['dp'];?>" class="img-circle" id="image_2">
             	    </div>
                    <div class="col-xs-9 col-sm-11">
     		            <h4> <a href="<?php echo SURL.'TimeLine/index/'.$value['username'];?>"><strong><?php echo ucwords($value['f_name']." ".$value['l_name']);?></strong></a></h4>
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
                
             	<h3 class="rank_margin">Rank:<?php echo $this->common->user_rank($value['u_id']); ?></h3>
             	<?php if($value['u_id']!=$myuser['u_id']){?>
             	<button class="btn btn-success button_border"><a href="<?php echo SURL.'postproject/index/'.$value['username'];?>" style="color:#fff;">Invite</a></button>
             	<?php } ?>
             	<?php if(!empty($value['hourly_rate'])){?>
             	<h4 class="hourl_rate">£<?php echo $value['hourly_rate'];  ?></h4>
             	<?php } ?>
            </div>

        </div>
        <hr>
                	        <?php
                	         
                	       // require('includes/freelancerProfile.php'); 
                	        
                	        ?>
            	       
            	    <?php } ?>
            	     </div>
            	   
        </div>
        
            <div class="col-sm-12" style="text-align:center;margin-bottom:40px">
                  <a href="<?php echo base_url();?>MyBuyerdashboard/job" class="btn btn-primary button_invites">Process Job</a>
              </div>
    </div>
    
    
              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="tick_wrpr text-center">
            <span class="glyphicon glyphicon-ok oktick"></span>
        </div>
        <p class="text-center" style="margin-top:20px;">Job Posted Successfully</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    
</div>
<script>
    $(document).ready(function(){
	$("#serachresult_text").keyup(function(){
	  if($("#serachresult_text").val().length>2){
	      $("#serachresult").css("display","block");
	      var value=$("#serachresult_text").val();
	      var jobid = <?php echo $this->uri->segment(2);?>;
	      $.ajax({
	          url:"InviteFreelancer/serachFreelancer",
	          type:"POST",
	          data:{value : value,jobid:jobid},
	          success:function(html)
	          {
	             if(html){
                 $('#serachresult').html(html);
                 }else{
                 $('#serachresult').html('<li>Record not found</li>');
                 }
	          }
	          
	      });
	   }else
	   {
	    $("#serachresult").hide();    
	   }
	 });	
    });
</script>
<?php include('includes/front_end_footer.php'); ?>