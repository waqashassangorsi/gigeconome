<?php include("includes/front_end_header.php");?>
<style>
    .customize_cont{
        background: #5f5f63;
        margin-top: 10px;
    }
    .customize_cont h3{
        color: #fff;
        
    }
    .customize_cont span{
        background: #46a049;
        color: #fff;
        padding: 2px;
        margin-top: 95px;
        display: inline-block;
        font-weight: bold;

    }
    .menu_customize{
        padding: 10px;
        background: #ffffff73;
    }
    
    .edit i{
        color: #f78409!important;
    }
    .edit a{
        color: #f78409!important;
    }
    .proposal_freelancer{
        padding-bottom: 30px;
    }
    .profile{
        background: #fff;
        padding: 20px;
        margin-top: 10px;
        width: 80%;
        margin: 0 auto;
        margin-bottom: 10px;
    }
    .profile img{
        width: 50px;
    }
    .glyphicon-star-empty{
        color: #1111117a!important;
        font-size: 15px;
    }
    .view_button{
        border: 1px solid #f47f1f;
        color: #f37106;
        font-weight: bold;
        padding: 7px;
        margin-top: 10px;
    }
    .pagenition{
        color: #222!important;
    }
    .test{
        width: 80%;
        margin: 0 auto;
    }
    @media screen and (max-width: 991px){
        .menu_cust{
            text-align: left;
        }
        
    }
    @media screen and (max-width: 767px){
        .customize_cont span{
            margin-top: 40px;
        }
        
    }
     @media screen and (max-width: 450px){
        
        .customize_cont h3{
            font-size: 16px;
        }
    }
    
  
</style>

<div class="container-fluid">
    <div class="row customize_cont">
        <div class="test">
        <div class="col-md-5 col-sm-8 col-xs-12">
            <h3>Customize a Web page using css or by plugin in custom website</h3>
        </div>
        <div class="col-md-7 text-right col-sm-4 col-xs-12">
            <span>OPEN FOR PROPSAL</span>
            <h6 style="color:#e2d9d9; font-weight:bold;">Project ID 285687</h6>
        </div>
        </div>
    </div>
    <div class="row menu_customize">
        <div class="test">
        <div class="col-md-2 col-xs-6">
            Buget<b> £60</b>
        </div>
        <div class="col-md-2 col-xs-6">
            Expary<b> 90 days</b>
        </div>
        <div class="col-md-6 col-xs-6 text-right menu_cust">
            <a href="#">View Project</a>
        </div>
        <div class="col-md-1 col-xs-6 edit text-right menu_cust">
            <a href="#"><i class="glyphicon glyphicon-edit"></i> Edit</a>
        </div>
        <div class="col-md-1 col-xs-6 text-right menu_cust">
            <i class="glyphicon glyphicon-menu-hamburger"></i>
        </div>
        </div>
    </div>
    <div class="row test">
        <div class="col-md-8">
            <h3>Proposal</h3>
            <p>Proposal form freelancer</p>
        </div>
        <div class="col-md-4 text-right" style="padding-top:20px;">
            <span>1-8 of 8</span>
            <i class="glyphicon glyphicon-chevron-left pagenition"></i> 
            <i class="glyphicon glyphicon-chevron-right pagenition"></i>
        </div>
    </div>
    <div class="profile">
        <div class="row">
            <div class="col-md-1 col-xs-4">
                <img src="http://gig.coviknow.com/assets/images/pic.png" class="img-circle" />
            </div>
            <div class="col-md-3 col-xs-8">
                <h4>Kamran</h4>
                <p>Senior Web & Software Developer</p>
                <p><b>100%(45)</b></p>
            </div>
            <div class="col-md-6">
                <p>Below is a sample of “Lorem ipsum dolor sit” dummy copy text often used to show font face samples, for page layout and design as sample layout text by printers, graphic designers, </p>
                <p>jun 22</p>
            </div>
            <div class="col-md-2 text-right">
                <p><b>18£</b></p>
                <span>Fixed price</span><br >
                <i class="	glyphicon glyphicon-star-empty"></i>
                <select name="view" class="view_button">
                    <option>View</option>
                </select>
            </div>
        </div>
    </div>
    <div class="profile">
        <div class="row">
            <div class="col-md-1 col-xs-4">
                <img src="http://gig.coviknow.com/assets/images/pic.png" class="img-circle" />
            </div>
            <div class="col-md-3 col-xs-8">
                <h4>Kamran</h4>
                <p>Senior Web & Software Developer</p>
                <p><b>100%(45)</b></p>
            </div>
            <div class="col-md-6">
                <p>Below is a sample of “Lorem ipsum dolor sit” dummy copy text often used to show font face samples, for page layout and design as sample layout text by printers, graphic designers, </p>
                <p>jun 22</p>
            </div>
            <div class="col-md-2 text-right">
                <p><b>18£</b></p>
                <span>Fixed price</span><br >
                <i class="	glyphicon glyphicon-star-empty"></i>
                <select name="view" class="view_button">
                    <option>View</option>
                </select>
            </div>
        </div>
    </div>
</div>



<?php include("includes/front_end_footer.php");?>