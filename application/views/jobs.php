<?php include("includes/front_end_header.php");?>

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
.urgent_btn {
    background: #cc2424!important;
    border: 0;
    color: #fff;
    padding: 5px 20px;
    border-radius: 5px;
}
.featured_btn {
    background: #00afef!important;
    border: 0;
    color: #fff;
    padding: 5px 20px;
    border-radius: 5px;
}
.highly_btn{
    background: #e5aa09!important;
    border: 0;
    color: #fff;
    padding: 5px 20px;
    border-radius: 5px;
}
.fav_icon_job{
    position: absolute;
    top: 5px;
    right: 5px;
    font-size: 15px;
}
.fav_icon_job{
    font-size: 15px;
    color: rgb(0, 196, 207);
}

.fav_icon_click{
    color: red!important;
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
    /*color: #908b8b!important;*/
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

.budgetprice{
    text-align:left;
}
	</style>

</head>
<body>

<div class="container-fluid">
    <div class="container-fluid" id="white_div" >

    <div class="row">
	
		<div class="col-sm-11">
            <div class="col-sm-11 col-xs-12 filters collapse" id="demo">
           		<?php $query=$this->db->query("select * from categories where parent_id=0")->result_array();?>
                <form class="form-inline" action="<?php echo base_url()?>Jobs" method="post">
                    <select class="select_dropdown form-control" name="category">
                        
                        <option value="all">All Category</option>
                        <?php foreach($query as $key=>$value){?>
                      <option <?php if($value['cat_id']==$this->input->post("category")){ echo "selected";}?>  value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                      <?php } ?>
                    </select>
                    <select name="location" class="select_dropdown form-control">
                      <option <?php if("0"==$this->input->post("location")){ echo "selected";}?> value="0">Location</option>
                      <option <?php if("Remote"==$this->input->post("location")){ echo "selected";}?> value="Remote">Remote</option>
                      <option <?php if("Onsite"==$this->input->post("location")){ echo "selected";}?> value="Onsite">Onsite</option>
                    </select>
                    <select name="job_type" class="select_dropdown form-control">
                      <option <?php if("0"==$this->input->post("job_type")){ echo "selected";}?> value="0">Job Type</option>
                      <option <?php if("Fixed"==$this->input->post("job_type")){ echo "selected";}?> value="Fixed">Fixed</option>
                      <option <?php if("Hourlie"==$this->input->post("job_type")){ echo "selected";}?> value="Hourlie">Hourlie</option>
                    </select>
                    <select name="price" class="select_dropdown form-control">
                      <option <?php if("0"==$this->input->post("price")){ echo "selected";}?> value="0">Price</option>
                      <option <?php if("0-500"==$this->input->post("price")){ echo "selected";}?> value="0-500">£0-£500</option>
                      <option <?php if("501-1000"==$this->input->post("price")){ echo "selected";}?> value="501-1000">£501-£1000</option>
                      <option <?php if("1001-5000"==$this->input->post("price")){ echo "selected";}?> value="1001-5000">£1001-£5000</option>
                    </select>
                    <button class="btn btn-success btn-lg" id="submit_btn">Apply</button>
                </form>
           
        </div>
        </div>
		
	</div>



        </div>


    <div class="container-fluid">
      <?php 
        if(!empty($jobs)){
            $i=0;
            foreach($jobs as $key=>$value){
              if($i % 2==0){
                  $clasname = "grey_div";
              }else{
                  $clasname = "white_div";
              }
              
              $no_of_proposal = $this->db->query("select count(DISTINCT(send_id)) as count from jobs_msgs where job_id='".$value['job_id']."' and custom_status='Proposal' and custom_status_extent in(0,1,2)")->result_array()[0]['count'];
        	 
      ?>
	  <div class="row" id="<?php echo $clasname; ?>">
    	<div class="col-xs-9 col-sm-10 float-left grey_div stars">
    	    <div class="col-xs-10 col-sm-6">
    	        <h4>
    	            <strong><a href="<?php echo SURL.'Jobdetails/index/'.$value['job_slug'];?>"><?php echo $value['job_title'];?></a></strong>
    	            <?php if($value['u_id']==$myuser['u_id']){?>
    	            <a href="javascript:void(0)" class="dlt_job" data-id1="<?php echo $value['job_id'];?>"><span class="glyphicon glyphicon-trash"></span></a>
    	            <?php }?>
    	        </h4>
    	        <h5 class="text-light">
    	            <?php 
    	                echo $this->check->timeAgo(strtotime($this->Common->gettimeinmyzone(($value['date']))));
    	                
    	            
    	            ?></h5>
    	        <ul>
        	     <li class="text-success" id="remote_margin"><?php echo $value['job_location'];?></li>
        	     <li class="text-success" id="proposal_margin">No of Proposals</li>
        	     <li id="number_margin" style="color:black"><?php echo intval($no_of_proposal);?></li>
        	     <li>
        	         
        	         <?php 
        	          $loginuserid=$this->session->userdata('user');
        	            $is_wishlist = $this->db->query("select * from jobs_wishlist where job_id='".$value['job_id']."' and u_id='".$loginuserid."'"); 
        	            if($is_wishlist->num_rows() > 0){
        	         ?>
        	         
        	         <i class="fav_icon_job glyphicon glyphicon-heart heart" style="color:rgb(255, 0, 0)!important;" data-id1="<?php echo $value['job_id'];?>" id="total_wishlist_<?php echo $value['job_id'];?>"></i>
        	         <?php }else{?>
        	         <i class="fav_icon_job glyphicon glyphicon-heart heart" style="color:rgb(0, 196, 207) !important;" data-id1="<?php echo $value['job_id'];?>" id="total_wishlist_<?php echo $value['job_id'];?>"></i>
        	         <?php } ?>
        	     </li>
        	     
        	     <input type="hidden" value="<?php echo $loginuserid?>" class="userlike">
        	     
        	    </ul>
            </div>
            <?php 
            $job_type = $this->db->query("select * from jobs_type where job_id='".$value['job_id']."'")->result_array();
            if($job_type){
            ?>
            <div class="job_buttons">
                <?php 
                    foreach($job_type as $key=>$jobtypevalue){
                        if($jobtypevalue['type']=="Urgent"){
                ?>
                            <button class="urgent_btn" disabled>Urgent</button>
                        <?php }else if($jobtypevalue['type']=="Featured"){ ?>
                            <button class="featured_btn" disabled>Featured</button>
                        <?php }else if($jobtypevalue['type']=="Highly Paid"){?>
                            <button class="highly_btn" disabled>Highly</button>
                        <?php } ?>
                        
                    <?php } ?>    
            </div>
            <?php } ?>
	    </div>
	
		<div class="col-xs-3 col-sm-2 float-left text_center stars">
		   
			<div class="col-xs-12 col-sm-12 text-center">
				<h4 class="text-info budgetprice"><strong>£<?php echo $value['budget']; ?></strong></h4>
				</div>
		
			<?php 
			    if($myuser['user_status']=="User"){
    			    if($value['u_id']!=$myuser['u_id']){
    			        $is_proposal_Sent = $this->db->query("select * from jobs_msgs where custom_status='Proposal' and job_id='".$value['job_id']."' and custom_status_extent='0' and send_id='".$myuser['u_id']."'");
			        
			?>
			<div class="row">
			    <?php if($is_proposal_Sent->num_rows() > 0){?>
			    <a href="javascript:void(0)" class="btn btn-default" style="border: 1px solid black;color: black;">Proposal Sent</a>
			    <?php }else{?>
			    <a href="<?php echo SURL.'Jobdetails/index/'.$value['job_slug'];?>" class="btn btn-success" style="color:#fff;">Send proposal</a>
			    <?php } ?>
			</div>
			<?php }} ?>
		</div>
      </div>
      <?php $i++; }}else{?>
      <h4>No Record Found.</h4>
      <?php } ?>
      
            	<div class="text-center">
        	<?php echo $links; ?>
        	</div>
	</div>
	<!--container-fluid ends here-->
		

</div>
<script>
    // $(document).ready(function(){
    //   $("#favicon_btn").click(function(){
    //     $(".fav_icon").toggleClass("fav_icon_click");
    //   });
    // });
</script>
<?php include("includes/front_end_footer.php");?>


