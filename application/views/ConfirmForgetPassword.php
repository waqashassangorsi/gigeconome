  <!DOCTYPE html>
  <html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Forget Password</title>
    <link  href="<?php echo base_url()?>assets/style.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

  </head>
  <body>

  <style>


#form-wrap-email{
	width: 50%;
	height: 384px;
	left: 25%;
	border-radius: 2px;
	border:1px solid #fff;
	box-shadow: 0px 1px 7px 0.2px #B5B5B5; 
	position: absolute;
	background: #fff;
}

@media screen and (max-width: 764px) and (min-width:340px){
#form-wrap-email{
         width: 96%;
         left: 7px;
       }
    
}
</style>
      

      <div class="wrapper" id="card">
         <div class="wrapper-content">
            <div class="form-wrap-head">
                <img src="<?php echo base_url()?>uploads/logo.png">
            </div>
           <div class="front" id="form-wrap-email">
                <?php
			           if(!empty($this->session->flashdata('success'))){ ?>
			  
			                <div class="alert alert-success" style="text-align:center; color:green;">
			                    <?php echo $this->session->flashdata('success'); ?>
			                    
			                </div>

			          <?php } ?>

			          <?php if(!empty($this->session->flashdata('fail'))){ ?>

			                    <div class="alert alert-danger" style="text-align:center; color:red;">
			                    <?php echo $this->session->flashdata('fail'); ?>
			                    
			                </div>

			   <?php } ?>

            

               <form class="form-signin" method="POST" id="newform_email" action="<?php echo base_url()?>ForgetPassword/confrimemail">
              <input type="hidden" value="<?php echo $email?>" name="useremail">
                  <p class="form-heading">Enter OTP</p>
                  <input type="text" class="form-control" name="otp" id="userotp" placeholder="Enter OTP" required autofocus="" />
                  
                   <p class="form-heading">Enter New Password</p>
                  <input type="text" class="new_pass form-control" name="password" id="pass" placeholder="Enter New Password" required autofocus="" />
                  
                   <p class="form-heading">Confirm Password</p>
                  <input type="text" class="confirm_pass form-control" name="password" id="pass" placeholder="Confirm Password" required autofocus="" />
                  
                   <div style="text-align:center;margin-top: 33px;">
                    <button type="submit" class="submit_btn" style="background:#46a049;border:1px solid #46a049;box-shadow: 0px 1px 7px 0.2px #46a049;">Submit</button>
                  </div>
               
                  
               </form>
               
              <!--<div class="form-wrap-bottom" style="top:4px">-->
              <!--  <p>New to Gig coviknow?</p>-->
              <!--  <a href="Newsignup" style="color:#46a049">Sign up</a>-->

              <!--</div>-->
              
              
           </div>

      

          </div>
      </div>
  
  <script src="assets/loginjs/jquery.min.js"></script>
  <script src="assets/loginjs/jquery.flip.js"></script>
  
  

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script>
    
    $(document).on('submit','#newform_email',function(){
        
        var pass=$('.new_pass').val();
        var confirmpass=$('.confirm_pass').val()
        
        if(pass!=confirmpass){
             alert("Password Not Matched");
             return false;
        }else{
            $(this).submit();
        }
        
        
    });
</script>
  </body>
  </html>


  