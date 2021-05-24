<?php include("includes/front_end_header.php");?>

<style type="text/css">
    body{
        background: #fff;
    }
    .container-fluid{
        margin: 0;
        padding: 0;
    }
    .login_form{
        background: #fff;
        border-radius: 15px;
        width: 353px;
        margin: 75px auto;
        box-shadow: 0 0 5px 0px gainsboro;
        margin-bottom: 160px;
    }
    
    .login_heading{
        color: #00a651;
        font-weight: bold;
        padding-bottom: 40px;
        text-align: center;
        padding-top: 20px;
    }
   
	.input_feild{
	    width: 275px;
	    margin: auto;
	}
	.login_form input{
        border: 1px solid #949494;
        border-radius: 15px;
        margin-top: 5px;
        box-shadow: 0 0 5px 0px gainsboro;
        border: none;
    }
	.heading_or{
        color: #00a651;
        font-weight: bold;
        padding-bottom: 20px;
        text-align: center;
    }
    .login_container  a{
        color: #00a651;
        font-weight: bold;
        font-size: 15px;
        padding-bottom: 30px;
    }
    .login_container p{
        font-size: 15px;
        padding-bottom: 30px;
        text-align: center;
    }
    .signup_button{
       width: 175px;
       margin: 0 auto;
       margin-top: 20px;
    }
    .signup_button .btn-primary{
        border-radius: 15px;
	    border: 1px solid #aaa;
	    margin-bottom: 20px;
	    width: 180px;
	    text-align: center;
	    
	    background: #666666!important;
	    font-weight: bold;
    }
    .btn-primary a{
        color: #fff!important;
    }
    
    @media screen and (max-width: 442px){
        .login_form{
            width: 90%;
        }
    }
    
</style>

<div class='container-fluid login_container'>
    <form class="login_form" action="<?php echo SURL.'Newsignupcontinue';?>" method="post">
        <h4 class='login_heading'>SIGN UP</h4>
            
            <div class='input_feild'>
                <input type='email' required name='email' placeholder="Email" class="form-control" />
            </div>
            
            <div class="signup_button">
                 <button button="submit" class='btn  btn-primary'>SIGN UP</button>
            </div>
            
            <h4 class='heading_or'>OR</h4>
            
            <p style="color:#A29E9E;">Sign in to GigeconoMe <a href="/Newlogin">Log In</a></p>
            
    </form>
</div>



<?php include("includes/front_end_footer.php");?>
