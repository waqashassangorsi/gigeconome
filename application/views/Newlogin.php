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
        width: 450px;
        margin: 45px auto;
        box-shadow: 0 0 5px 0px gainsboro;
        margin-bottom: 100px;
        
    }
    .login_button{
        
    }
    .login_heading{
        color: #00a651;
        font-weight: bold;
        padding-bottom: 40px;
        text-align: center;
        padding-top: 20px;
    }
    .facebook_button{
	    width: 135px;
	    border-radius: 15px;
	    border: none;
	    margin-bottom: 20px;
	    color: #fff;
	    background: #4267B2;
	}
	.facebook_button:hover{
	    color: #fff;
	    background: #254c9b;;
	}
	.gmail_button{
	    border-radius: 15px;
	    border: none;
	    margin-bottom: 20px;
	    width: 135px;
	}
	.input_feild{
	    width: 275px;
	    margin: auto;
	}
	.login_form input{
        border: 1px solid #949494;
        border-radius: 15px;
        margin-top: 20px;
        box-shadow: 0 0 5px 0px gainsboro;
        border: none;
    }
	.heading_or{
        color: #00a651;
        font-weight: bold;
        padding-bottom: 20px;
        text-align: center;
    }
    .login_container .footer_signup{
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
    .signup_button a{
        color: #fff;
    }
    .signup_button .btn-primary{
        border-radius: 15px;
	    border: none;
	    margin-bottom: 20px;
	    width: 180px;
	    text-align: center;
	    background: #666666!important;
    }
    @media screen and (max-width: 442px){
        .login_form{
            width: 90%;
        }
    }
    
</style>

<div class='container-fluid login_container'>
    <form class="login_form" action="<?php echo SURL.'Newlogin';?>" method="post">
        <h4 class='login_heading'>LOG IN</h4>
            <div class="login_button text-center">
                <a href="<?php echo $FBauthUrl; ?>" class='btn  facebook_button'>Log in with Facebook</a>
                <a href="<?php echo $googleURL;?>" class='btn btn-danger gmail_button'>Log in with Gmail</a>
            </div>
            <div class='input_feild'>
                <input type='email' name='email' placeholder="Email" required class="form-control" />
            </div>
            <div class="input_feild">
                <input type='password' name='pass' placeholder="Password" required class="form-control" />
            </div>
            <div class="signup_button">
                 <button type="submit" class='btn btn-primary '>Log In</button>
            </div>
            
            <h4 class='heading_or'>OR</h4>
             <p><a href="<?php echo SURL."ForgetPassword";?>" style="color:#00a651;">Forgot password?</a></p>
            <p style="color:#A29E9E;">New to GigeconoMe? <a href="/Newsignup" class='footer_signup' >Sign Up</a></p>
            
    </form>
</div>



<?php include("includes/front_end_footer.php");?>
