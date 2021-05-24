<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- <meta name="description" content="" />
	<meta name="author" content="" /> -->
	
	<title>Help Center</title>
	
	<base href="<?php echo base_url(); ?>"> 
	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>
	
</head>
<style>
    .container-fluid{
        padding: 0;
    }
    .navbar a:hover{
        background: transparent!important;
    }
    .navbar{
        margin-bottom: 0px!important;
    }
    .nav_bar img{
        width: 100px!important;
    }
    .nav_bar ul {
        list-style: none;
    }
    .nav_bar ul li{
        float: left;
        margin-right: 20px;
    }
    .navbar-right{
        padding-top: 10px;
    }
    .navbar-right a{
        color: #009247;
        font-weight: bold;
    }
    .page_heading{
        margin-left: 30px;
        padding-top: 16px;
        font-size: 19px!important;
        font-weight: bold;
    }
    .profile_name{
        margin-left: -20px;
    }
    .gallery input{
        border-radius: 20px;
        padding: 17px;
    }
    .gallery{
        background-image: url("assets/images/1.jpg");
        height: 240px;
        padding: 0;
        margin: 0;
    }
    .search_page{
        width: 40%;
        margin: 111px auto;
    }
    .blog_dashborad{
        width: 90%;
        margin: 40px auto;
        margin-bottom: 100px;
    }
    .freelancer_btn{
        border: 1px solid #009247;
        padding: 15px;
        border-radius: 5px;
    }
    
    .freelancer_btn:hover{
        background: #009247;
        box-sizing: border-box;
        color: #fff;
    }
    
    
    
</style>
<body>
<div class="container-fluid">
    <header>
        <nav class="navbar ">
            <div class="container-fluid">
                <div class="navbar-header nav_bar">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="glyphicon glyphicon-align-justify"></span>
                                          
                  </button>
                  
                  <ul>
                      <li><a class="navbar-brand" href="#"><img class="logo1" src="<?php echo base_url(); ?>uploads/logo.png" alt=""></a></li>
                      <li class="page_heading"><h4>Help Center</h4></li>
                  </ul>
                  
                  
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  
                  <ul class="nav navbar-nav navbar-right">
                     <li><a href="/ViewTicket">View Ticket</a></li>
                    <li><a href="/Query">Submit a Ticket</a></li>
                    <li><a href="#"><img src="assets/images/pic.png" width="25px" class='img-circle' ></a></li>
                    <li class="profile_name"><a href="#">Hasan</a></li>
                  </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid gallery">
        <div class="search_page">
            <from>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="serach" placeholder="Enter a Search" class="form-control" />
                    </div>
                </div>
            </from>
        </div>
    </div>
    <div class=" blog_dashborad">
        <div class="row">
            <div class="col-md-4">
                <div class="freelancer_btn text-center h4">
                    Freelancer Suport
                </div>
            </div>
            <div class="col-md-4">
                <div class="freelancer_btn text-center h4">
                    Freelancer Suport
                </div>
            </div>
            <div class="col-md-4">
               <div class="freelancer_btn text-center h4">
                    Freelancer Suport
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-4">
                <div class="freelancer_btn text-center h4">
                    Freelancer Suport
                </div>
            </div>
            <div class="col-md-4">
                <div class="freelancer_btn text-center h4">
                    Freelancer Suport
                </div>
            </div>
            <div class="col-md-4">
               <div class="freelancer_btn text-center h4">
                    Freelancer Suport
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/front_end_footer.php");?>