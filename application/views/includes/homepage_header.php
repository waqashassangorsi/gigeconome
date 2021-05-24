<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </head>
  <body>
<nav class="navbar menu">
  <div class="container-fluid">
    <div class="row myheader">
       <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>Home">
     <img class="img-thumbnail logo" src="<?php echo base_url(); ?>assets/images/mainlogo.png" alt="">
    </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control search" placeholder="Find Services">
        <input type="submit" name="" class="btn search-btn" value="Search">
       
      </div>
     
    </form>
   
    <ul class="nav navbar-nav navbar-right mybar">
      <li><a class="nav-img" href="#"> 
          <img class="" src="<?php echo base_url(); ?>assets/images/flag.png" alt="">English
        </a></li>
       <li><a href="/Newlogin"> Sign In</a></li>
       <li><a class="join" href="/Newsignup">Join</a></li>
      
     
    </ul>
    </div>
    
    </div>
   
  


  <div class="row myheader">
  <div class="col-md-2">
    <a href="<?php echo base_url();  ?>Home/Projects"><h4 align="center">Writing & Translation</h4></a>
  </div>
    <div class="col-md-2 col-sm-12">
    <a href="#"><h4 align="center">Writing & Translation</h4></a>
  </div>
  <div class="col-md-2">
    <a href="#"><h4 align="center">Writing & Translation</h4></a>
  </div>
  <div class="col-md-2">
    <a href="#"><h4 align="center">Writing & Translation</h4></a>
  </div>
  <div class="col-md-2">
    <a href="#"><h4 align="center">Writing & Translation</h4></a>
  </div>
  <div class="col-md-2">
    <a href="#"><h4 align="center">Writing & Translation</h4></a>
  </div>

</div>
</div>
</nav>
