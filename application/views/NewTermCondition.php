<?php include("includes/front_end_header.php");?>
<style>

#main_container{
    margin-bottom:1px;
    background-color:white;
    padding: 0px;
 }
 #aboutus_heading{
    color:#fff;
  }


 .paragraph1{
    margin-top:20px;
    color:#2b2727cc;
    font-weight: 700;
  }

  .about_us_container
  {
      background:#00a550;
      margin:0px;
      padding:49px;
      padding-bottom: 1px;
    padding-left: 0px;
    padding-right: 0px;
 background-image: url(https://gigeconome.com/uploads/todaysmallpic2.jpg);
    background-size: cover;
    background-repeat: no-repeat;
  }
     
    .aboutus_desc
    {
        background:#1e4065;
        text-align:center;
        color:#fff;
    }
     .aboutuspage_heading
     {
         padding-bottom: 37px;
        text-align: center;
     }
     
     .myaboutpageheading
     {
         width:50%;
         padding:10px;
         margin:auto;
         box-shadow: -1px 1px 25px -20px #fff;
     }
     
     .itisaboutusection
     {
         padding: 55px;
         padding-bottom:0px;
         color:#fff;
     }
     
     /* Source code: WebsiteEdu (https://websiteedu.com) */

.div-bottom-arrow {
    padding: 1px;
    background-color:#1b1e2f;
    color: white;
}

.div-bottom-arrow:after {
       content: "";
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 0;
    height: 0;
    border-top: 20px solid #1b1e2f;
    border-left: 19px solid transparent;
    border-right: 19px solid transparent;
    margin-top: -1px;
}

.benefits_ul
{
    color:#2b2727cc;
    font-weight: 700;
}

@media screen and (max-width: 764px) and (min-width:340px){
.aboutus_desc{
          margin:0px;
       }
 .about_us_containerrow{
     margin:0px;
 }
 
 .myaboutpageheading{
  width:100%;    
 }
 
   .about_us_container
  {
     background-size: 100% 100%;
  }
}


.row{
    margin-right:0px;
}
 </style>
<div class="container-fluid about_us_container">
    <div class="row about_us_containerrow">
        <div class="col-sm-12 aboutuspage_heading">
            <div class="myaboutpageheading">
            <h1 id="aboutus_heading">Terms And Conditions</h1>
           </div>
           <!--<h2 class="itisaboutusection">Its About us Section</>-->
        </div>
        
    </div>
    
    <div class="row aboutus_desc">
        <div class="col-sm-12 div-bottom-arrow">
            <h4 style="color:#fff;height:18px;"></h4>
        </div>
    </div>
</div>
<!-- Termly Tracking Code -->

<div name="termly-embed" data-id="bc1a791d-9a1f-48db-aeba-4c6ad9592681" data-type="iframe"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, tjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://app.termly.io/embed-policy.min.js";
  tjs.parentNode.insertBefore(js, tjs);
}(document, 'script', 'termly-jssdk'));</script>



<?php include("includes/front_end_footer.php");?>
