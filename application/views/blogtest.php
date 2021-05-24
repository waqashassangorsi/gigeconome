<?php include("includes/front_end_header.php");?>
 
 <style>
section{
    padding:60px 0px;
    font-family: 'Raleway', sans-serif;
}

h2 {
    color: #4C4C4C;
    word-spacing: 5px;
    font-size: 30px;
    font-weight: 700;
    margin-bottom:30px;
    font-family: 'Raleway', sans-serif;
}

p{
    font-size:13px;
}

.ion-minus{
    padding:0px 10px;
}

#blog{
	background-color:#f6f6f6;
}

#blog .carousel-indicators {
    bottom: -60px;
}

#blog .carousel-indicators li{
    background-color: #5db4c0;
    height: 13px;
    width: 13px;
    margin: 5px;
}

#blog .carousel-indicators li.active{
    background-color: #888383;
}

#blog .card-block{
    padding: 6px;
}

#blog .card{
    background-color: #FFF;
    border: 1px solid #eceaea;
    margin: 20px 0px;
}

.btn.btn-default {
    background-color: #5db4c0;
    color: #fff;
    border-radius: 0;
    border: none;
    padding: 13px 20px;
    font-size: 13px;
    font-weight: 600;
}

.autoShowHide {
     overflow: hidden;
    width: 99%;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.cardmain
{
    height: 338px;
}

.cardheading{
     width: 100%;
      height: 56px;
      line-height: 20px;
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -moz-box-orient: vertical;
      -ms-box-orient: vertical;
      box-orient: vertical;
      -webkit-line-clamp: 5;
      -moz-line-clamp: 5;
      -ms-line-clamp: 5;
      line-clamp: 5;
      overflow: hidden;
}
 </style>
 
 
<div class="container-fluid" id="main_container">
<section id="blog">
   <div class="container">
           
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">  
                <h2>
                    <span class="ion-minus"></span>Blog Posts<span class="ion-minus"></span>
                </h2>
                <!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis  dis parturient montes, nascetur ridiculus </p><br>-->
            </div> 
         </div>  
                
        <div class="row">
             
			
                      
             <!-- Carousel items -->
          
                    
               
       <!--         	<div class="row">-->
					
       <!--         	  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
						 <!--<div class="card text-center">-->
							<!--<img class="card-img-top" src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">-->
							<!--<div class="card-block">-->
							<!--	<h4 class="card-title">What is the gig economy?</h4>-->
							<!--	<p class="card-text">The gig economy. It is a term which most people will have heard of but unless you work within it, you may not fully understand it</p>-->
							<!--	<a class="btn btn-default" href="<?php echo base_url()?>Blogdetail">Read More</a>-->
							<!--</div>-->
						 <!--</div>-->
					  <!--</div>-->
					  
					  <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
						 <!--<div class="card text-center">-->
							<!--<img class="card-img-top" src="https://images.pexels.com/photos/129105/pexels-photo-129105.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">-->
							<!--<div class="card-block">-->
							<!--	<h4 class="card-title">Post Title</h4>-->
							<!--	<p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>-->
							<!--	<a class="btn btn-default" href="#">Read More</a>-->
							<!--</div>-->
						 <!--</div>-->
					  <!--</div>-->
					  
					  <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
						 <!--<div class="card text-center">-->
							<!--<img class="card-img-top" src="https://images.pexels.com/photos/129441/pexels-photo-129441.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">-->
							<!--<div class="card-block">-->
							<!--	<h4 class="card-title">Post Title</h4>-->
							<!--	<p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>-->
							<!--	<a class="btn btn-default" href="#">Read More</a>-->
							<!--</div>-->
						 <!--</div>-->
					  <!--</div>-->
					  
					  <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
						 <!--<div class="card text-center">-->
							<!--<img class="card-img-top" src="https://images.pexels.com/photos/395196/pexels-photo-395196.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">-->
							<!--<div class="card-block">-->
							<!--	<h4 class="card-title">Post Title</h4>-->
							<!--	<p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>-->
							<!--	<a class="btn btn-default" href="#">Read More</a>-->
							<!--</div>-->
						 <!--</div>-->
					  <!--</div>-->
					 
       <!--         	</div> -->
              
                 
                	<div class="row">
   
					  
					    <?php foreach($blog as $value){ ?>
					    
					     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						 <div class="card cardmain text-center">
							<img class="card-img-top" src="<?php echo $value['image']?>" alt="" width="100%">
							<div class="card-block">
								<h4 class="card-title cardheading"><a href ="<?php echo base_url()?>Relatedcontent/firstpage/<?php echo $value["id"]?>"><?php echo $value['blogheading']?></a></h4>
								<p class="card-text autoShowHide"><?php echo $value['somtext']?></p>
								<!--<div class="card-text autoShowHide"><?php echo $value['blogdescription']?></div>-->
								<a class="btn btn-default" href="<?php echo base_url()?>Relatedcontent/firstpage/<?php echo $value["id"]?>">Read More</a>
							</div>
						 </div>
					  </div>
					    
					    <?php } ?>
					  
					  
						
                	</div> <!-- row -->
                
                 
                 
				
		
		</div>
			
	</div>
</section>

</div>


<?php include("includes/front_end_footer.php");?>
