<?php include("includes/front_end_header.php");?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

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

.servicesheading{
    padding: 1px;
}

.showsometext {
     overflow: hidden;
    width: 99%;
    text-overflow: ellipsis;
    white-space: nowrap;
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
 
 
  .featurebtn{
   margin-left: 11px;
    padding: 2px;
    padding-top: 7px;
    padding-bottom: 6px;
}
 
 .newcard_btn{
  width:89%;   
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

.featurebtn{
    text-align: center;
    margin-left: 0px;
    width:100%;
}

}  
</style>

<div class="container-fluid main-offers">
    	<?php if($this->uri->segment("2")!="index"){ ?>
    <div class="row">
    
        <div class="col-sm-1  col-xs-12 filters">
            
          
            <button type="button" data-toggle="collapse" data-target="#demo" class="btn btn-default btn-md" disabled="disabled" id="label_filer" style="color:black"><strong></strong></button>
            
            <div class="less">
                <button type="button" data-toggle="collapse" data-target="#demo" class="btn btn-info btn-lg"  id="label_filer2">Filters</button>
            </div>
    
        </div>
        <div class="col-sm-11">
        <div class="col-sm-11 col-xs-12 filters collapse" id="demo">
            <?php if(empty($this->uri->segment("3"))){ ?>
            <form class="form-inline" action="<?php echo base_url()?>Offer" method="post">
                <select class="select_dropdown form-control" name="cat_id">
                    <option value="all">All Services</option>
                    <?php foreach($categories as $key=>$value){?>
                  <option <?php if($this->input->post("cat_id")==$value['cat_id']){ echo "selected";}?> value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                  <?php } ?>
                </select>
                <select name="delivery_time" class="select_dropdown form-control">
                  <option <?php if($this->input->post("delivery_time")=="0"){ echo "selected";}?> value="0">Delivery Time</option>
                  <option <?php if($this->input->post("delivery_time")=="1"){ echo "selected";}?> value="1">One Day</option>
                  <option <?php if($this->input->post("delivery_time")=="2"){ echo "selected";}?> value="2">Two Day</option>
                  <option <?php if($this->input->post("delivery_time")=="3"){ echo "selected";}?> value="3">Three Day</option>
                  <option <?php if($this->input->post("delivery_time")=="4"){ echo "selected";}?> value="4">Four Day</option>
                  <option <?php if($this->input->post("delivery_time")=="5"){ echo "selected";}?> value="5">Five Day</option>
                  <option <?php if($this->input->post("delivery_time")=="6"){ echo "selected";}?> value="6">Six Day</option>
                  <option <?php if($this->input->post("delivery_time")=="7"){ echo "selected";}?> value="7">Seven Day</option>
                </select>
                <select name="price" class="select_dropdown form-control">
                      <option <?php if($this->input->post("price")=="0"){ echo "selected";}?> value="0">Price</option>
                      <option <?php if($this->input->post("price")=="0-500"){ echo "selected";}?>  value="0-500">£0-£500</option>
                      <option <?php if($this->input->post("price")=="501-1000"){ echo "selected";}?>  value="501-1000">£501-£1000</option>
                      <option <?php if($this->input->post("price")=="1001-5000"){ echo "selected";}?>  value="1001-5000">£1001-£5000</option>
                </select>
                <button class="btn btn-success btn-lg" id="submit_btn">Apply</button>
            </form>
            <?php } ?>
        </div>
        </div>
    </div>
    
    <?php } ?>
    <?php if(!empty($services)){?>
    <div class="container service_warp">
        <div class="row offers mt-2">
            	<?php if(!empty($this->uri->segment("3"))){ ?>
                <div class="col-sm-12 servicesheading">
                     <h1 style="text-align:center;font-weight:bold;">My Services</h1>
                 </div>
            	<?php } ?>
        <?php 
            foreach($services as $key=>$value){
                $image = $this->db->query("select * from service_portfolio where service_id='".$value['service_id']."' order by id")->result_array()[0]['image'];
        ?>
            <div class="col-md-3 col-sm-4 col-xs-12 " style="padding: 20px">
            <div class="card_cont">
                <div class="newcard">
                    
                    <div class="card_label">
                        <?php if($value['is_service_featured']=="1"){?>
                        <span style="background:green !important;">FEATURED</span>
                        <?php }
                        if($myuser['u_id']==$value['u_id']){
                        ?>
                        <a style="position:absolute;right:10px;" href="<?php echo SURL.'Post/edit/'.$value['service_id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
                        <?php } ?>
                    </div>
                    
                     <?php 
                        if($myuser['u_id']!=$value['u_id']){
                            $is_wishlist = $this->db->query("select * from services_wishlist where service_id='".$value['service_id']."' and u_id='".$myuser['u_id']."'");
                           
                    ?>
                    <div class="favoriteIcon">
                        <?php if($is_wishlist->num_rows() > 0){ 
                        ?>
                        <i class="glyphicon glyphicon-heart fav_icon" style="color:red !important;cursor:pointer" data-id1="<?php echo $value['service_id'];?>" id="favicon_btn_<?php echo $value['service_id'];?>"></i>
                        <?php 
                        }else{?>
                        <i class="glyphicon glyphicon-heart fav_icon" style="cursor:pointer" data-id1="<?php echo $value['service_id'];?>" id="favicon_btn_<?php echo $value['service_id'];?>"></i>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="newcard_image">
                        <a href="#">
                            <img src="<?php echo SURL.$image;  ?>"  class="img-fluid" />
                        </a>
                    </div>
                    <div class="card_content">
                        <div class="card_text showsometext">
                            <a href="<?php echo SURL.'Buy/index/'.$value['service_id'];?>"><?php echo $value['title'];?></a>
                        </div>
                        <div class="card_rate">
                            <span>£<?php echo $value['amount'];?></span>
                        </div>
                    </div>
                    <div class="newcard_footer">
                        <div class="cardfooter_left">
                            <div class="cardfooter_img">
                                <img src="<?php echo base_url($value['dp']); ?>" class="img-fluid" />
                            </div>
                            <div class="cardfooter_text">
                                <a href="<?php echo "TimeLine/".$value['username']; ?>">
                                <h6 style="color:#000;font-weight:bold;">
                                    <?php 
                                        if($value['show_name']=="first_name"){
 		                                    echo ucwords($value['f_name']);       
 		                                }else{
 		                                    echo ucwords($value['f_name']." ".$value['l_name']);
 		                                }
                                        
                                    ?>
                                </h6></a>
                                <h6 style="color:#555;font-weight:bold;"><?php echo $value['location'];?></h6>
                            </div>
                        </div>
                        <div class="cardfooter_right text-right">
                            <a href="<?php echo SURL.'Buy/index/'.$value['service_id'] ?>" class="newcard_btn  viewnewbtn" >VIEW</a>
                            <?php if($myuser['u_id']==$value['u_id']){?>
                            <a href="<?php echo SURL.'PaymentSummary/featureservice/'.$value['service_id'] ?>" class="newcard_btn featurebtn" style="margin-top:9px;display:block !important;" >Feature Now</a>
                            <?php } ?>
                        </div>
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
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
    </div>
   
    
    
    <?php }else{ ?>
    <p class="text-danger text-center" style="margin-top:50px; margin-bottom:50px;">No Record Found</p>
    <?php } ?>

</div>
<script>
    $(document).ready(function(){
      $("#favicon_btn").click(function(){
        $(".fav_icon").toggleClass("fav_icon_click");
      });
    });
</script>

<?php include("includes/front_end_footer.php");?>
