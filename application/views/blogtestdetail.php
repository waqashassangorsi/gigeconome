<?php include("includes/front_end_header.php");?>



<style>
  .main_divmargin{
   margin-top: 15px   
  }
  
  .web_color{
      color:#5bc0de;
  }
  
  .image_width
  {
         width: 51%;
         margin: auto;
  }
  
  @media screen and (max-width: 432px) and (min-width:340px){
.blog_text{
           width:100%;
           margin-top:10px;
       }
      .blog_text2
      {
          margin-bottom:10px;
      }
    .blog_text3
    {
        width:100%;
    }
}

.blog_titlerow
{
    padding:10px;
    text-align:center;
}

.picdiv
{
    margin-top: 21px;
    margin-bottom: 21px;
}

.main_color
{
    background:#fff;
}
strong
 {
     color: black;
    font-size: 19px;
 }
 
 p{
     color:black;
     font-size:13px;
 }
 h1{
     color:black;
 }
 .twiter_btn{
            background: #00c7f7;
            border: 1px solid #00c7f7;
            padding: 5px 12px!important;
            color: #fff;
            border-radius: 5px!important;
            margin-right: 0!important;
        }
        .fb_btn{
            background: #335397;
            border: 1px solid #335397;
            padding: 5px 12px!important;
            color: #fff;
            border-radius: 5px!important;
            margin-right: 0!important;
        }
        .linkdin_btn{
            background: #337ab7;
            border: 1px solid #337ab7;
            padding: 5px 12px!important;
            color: #fff;
            border-radius: 5px!important;
            margin-right: 0!important;
        }
        .whatsapp_btn{
            background: #1bd741;
            border: 1px solid #1bd741;
            padding: 5px 12px!important;
            color: #fff;
            border-radius: 5px!important;
            margin-right: 0!important;
        }
        
        .blogdesc ul{
            color:black;
        }
        
        
        .blogdesc ol{
            color:black;
        }
</style>
<div class="container main_divmargin main_color">
   
 
  <div class="row blog_titlerow">
      <div class="col-sm-12">
          	<h1 class="media-heading"><?php echo $blog->blogheading?></h1>
      </div>
  </div>
  
    <div class="row picdiv">
      <div class="col-sm-12">
          <img class="media-object image_width blog_text3" src="<?php echo $blog->image?>">
      </div>
  </div>
  
  <div class="row">
      <div class="col-sm-12 blogdesc">
         <p><?php echo $blog->blogdescription?></p>
      </div>
  </div>
  
  <!-- <div class="row" style="margin-bottom:10px">-->
  <!--    <div class="col-sm-12">-->
  <!--          <a href="http://twitter.com/share" target="_blank" class="twiter_btn"><i class="fa fa-twitter" aria-hidden="true"></i></a>-->
  <!--          <a href="https://www.facebook.com/sharer/sharer.php" class="fb_btn" target="_blank"><i class="fa fa-facebook" aria-hidden="true" ></i></a>-->
  <!--          <a href="https://www.linkedin.com/shareArticle?mini=true&url" class="linkdin_btn" target="_blank" ><i class="fa fa-linkedin" aria-hidden="true"></i></a>-->
  <!--          <a href="https://api.whatsapp.com/send?text=" class="whatsapp_btn" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true" ></i></a>-->
  <!--    </div>-->
  <!--</div>-->
  
  <!--<div class="row">-->
  <!--    <div class="col-sm-12">-->
  <!--         <p style="color:#5bc0de ">Author: <?php echo $blog->author?></p>-->
           
  <!--         <h5 style="color:#5bc0de ">Posted on: <?php echo $blog->date?> </h5>-->
  <!--    </div>-->
  <!--</div>-->
  

</div>

<?php include("includes/front_end_footer.php");?>

