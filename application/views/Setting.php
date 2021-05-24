
<?php include("includes/front_end_header.php");?>

<style type="text/css">
 
    .nav-tabs a{
        color: #333;
    }
    .nav-tabs > li.active > a{
        cursor: pointer!important;
    }
   
    @media screen and (max-width:600px) and (min-width: 320px){
        .nav-tabs > li > a {
            margin-right: 0px;
            
        }
        .nav > li > a {
            padding: 10px 11px;
        }
    }
    .mybtn{display:none;}

/*------------------------------- start setting css-------------------*/

   .setting_cont{
        background: #fff;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .genral{
        background: #f2eded;
        display: block;
        font-size: 12px;
        padding: 7px 10px;
        border-radius: 5px;
        margin-bottom: 30px;
    }
    .setting_cont a{
        color: #009247;
    }
    .setting_cont hr{
        margin-top: 0!important;
        margin-bottom: 10px!important;
    }
    .feild{
        border: 0;
    }
    lebel{
        font-weight: bold;
    }
    .emailnot_heading{
        border-bottom: 1px solid #eeeeee;
    }
    .setting_rightsec div{
        padding: 9px 0;
    }
    .setting_cont2 h4{
        font-weight: bold;
    }
    .save_btn{
        border: 1px solid #5BC0DE;
        padding: 8px 47px!important;
        color: #fff;
        margin-bottom: 10px;
        margin-top: 20px;
         background: #5BC0DE;
    }
    .save_btn:hover{
        background: #5BC0DE;
        border: 1px solid #5BC0DE;
        color: #fff;
    }
     #seeting_4{
        font-size: 13px;
    }
    .tab_heading{
        padding-left: 12px;
        padding-bottom: 20px;
    }
    
     @media screen and (max-width:600px) and (min-width: 320px){
         
        #seeting_1,#seeting_2,#seeting_3,#seeting_4{
            padding-right: 0px!important;
            padding-left: 0!important;

        }
        .setting_cont h3{
            font-size: 17px;
        }
        .setting_cont2 h4, .emailnot_heading h4 {
            font-size: 12px;
            padding-top: 12px;
        }
    }
    
    .passerror{
        margin-top:10px;
        color:red;
    }
	</style>
<body>

<div class="container setting_cont"  id="main_container">
    <h2>Setting</h2>
    <div class="nav_tab">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#seeting_1">General</a></li>
            <!--<li><a data-toggle="tab" href="#seeting_2">Notification</a></li>-->
            <li><a data-toggle="tab" href="#seeting_3">Privacy </a></li>
            <!--<li><a data-toggle="tab" href="#seeting_4">Visibility</a></li>-->
        </ul>
        
    </div>
	<!--<div class="row">-->
	<!--    <div class="col-md-4 col-xs-12">-->
	<!--        <lebel>Personal URL</lebel>-->
	<!--    </div>-->
	<!--    <div class="col-md-4 col-xs-8 text-center">-->
	<!--      <input type="text" name="personal_url" value="<?php echo $myuser['username'];?>" class='form-control feild' id="url_field" readonly />-->
	<!--    </div>-->
	<!--    <div class="col-md-4 col-xs-4 text-right">-->
	<!--        <a href="#" id="url_edit_field" value="1">Edit</a>-->
	<!--         <a href="#" id="url_edit_field_save" value="2" hidden>Save</a>-->
	<!--    </div>-->
	<!--</div>-->
	<hr />
<div class="tab-content">
<div class="container tab-pane fade in active" id="seeting_1" style="padding-right: 30px;">	
    <div class="row">
        <div class="tab_heading">
            <h3>General</h3>
        </div>
    </div>
	<form class="row" action="<?php echo SURL.'Setting/email';?>" method="post">     
	    <div class="col-md-4 col-xs-12">
	        <lebel>Email</lebel>
	    </div>
	    <div class="col-md-4 col-xs-8 text-center">
	      <input type="email" name="email" required value="<?php echo $myuser['email'];?>" class='form-control feild' />
	    </div>
	    <div class="col-md-4 col-xs-4 text-right">
	        <a href="javascript:void(0)" id="edit_email">Edit</a>
	        <input type="submit" value="Save" id="edit_btn" class="btn btn-success mybtn"/>
	    </div>
	</form>
	
	
	<hr />
	
	
	<form action="<?php echo SURL.'Setting/password';?>" method="post">
	     
     <div class="row">  
	    <div class="col-md-4 col-xs-12">
	        <label>Password</label>
	    </div>
	    <div class="col-md-4 col-xs-8 text-center">
	     <input type="password" name="password" value="admin@gmail.com" class='feild form-control' />
	          <div id="pass" style="display:none">
	            <input type="text" name="oldpassword" class='feild form-control' style="border:1px solid grey" placeholder="Enter Old Password"/>
	            <input type="text" name="newpassword" class='feild form-control' id='new_pass' style="border:1px solid grey;margin-top:3px" placeholder="Enter New Password"/>
	            <input type="text" name="confirmpassword" class='feild form-control confirm_pass' style="border:1px solid grey;margin-top:3px" placeholder="Confirm Password"/>
	            <p class="passerror"></p>
	            </div> 
	      
	      
	      
	      
	    </div>
	    <div class="col-md-4 col-xs-4 text-right">
	   <a href="javascript:void(0)" class="edit_pass">Edit</a>
	   <input type="submit" value="Save" class="btn btn-success" id="save_btn" style="display:none;border:none"/>
	         
	    </div>
	    
	  
       </div>

 	<!--
 	  <div id="pass" style="display:none">
	   <hr />	
	     
      <div class="row">  
	  <div class="col-md-4 col-xs-12">
	  <lebel>Old Password</lebel>
	  </div>
	  <div class="col-md-4 col-xs-4 text-center" style="border:1px solid black">
	  <input type="text" name="oldpassword" class='feild form-control' />
	  </div>

      </div>
	  <hr />
	


      <div class="row">  
	  <div class="col-md-4 col-xs-12">
	  <lebel>New Password</lebel>
	  </div>
	  <div class="col-md-4 col-xs-4 text-center" style="border:1px solid black">
	  <input type="text" name="newpassword" class='feild form-control' />
	  </div>

	  </div>
     </div>
     -->
    </form>
    
	<hr />
	
<form  action="<?php echo SURL.'Setting/Status';?>" method="post">
    
	<div class="row">
	    <div class="col-md-4 col-xs-12">
	        <lebel>Account</lebel>
	    </div>
	    <div class="col-md-4 col-xs-8 text-center">
           <select name="status" class='form-control'>
               <option value="Active" <?php if($myuser['status']=="Active"){ echo "selected";}?>>Active</option>
               <option value="Deactive" <?php if($myuser['status']=="Deactive"){ echo "selected";}?>>Deactive</option>
           </select><br>
	    </div>
	    <div class="col-md-4 col-xs-4 text-right">
	     <a href="javascript:void(0)" class="edit_status">Edit</a>
	   <input type="submit" value="Save" class="btn btn-success" id="edit_status" style="display:none;border:none"/>
	    </div>
	</div>
	
</form>	


	<hr />
	
<form id='secuirtyquestionform' action="<?php echo SURL.'Setting/SecurityQuestion';?>" method="post">	
	<div class="row">
	    <div class="col-md-4 col-xs-12">
	        <lebel>Security Question</lebel>
	    </div>
	    <div class="col-md-4 col-xs-8 text-center">
            <select name='security' class='form-group form-control security' disabled>
                    <option value='0'>Security Questions</option>
                    <?php
                     foreach($security_questions as $question){
                        if($myuser['SecurityQuestion'] == $question['q_id']){
                            $selected = "selected";
                        }else{
                            $selected  = "";
                        }
                     ?>
                     <option <?php echo $selected;?> value='<?php echo $question['q_id'];?>'><?php echo $question['question'];?></option>
                     
                     <?php } ?>
            </select>
            
            <input type="text" name="security_ans" disabled class='form-group security_ans form-control' id="text_security" value="<?php echo $myuser['SecurityAns'] ?>"/>
	    </div>
	   </form>	
	    <div class="col-md-4 col-xs-4 text-right">
	        <a href="javascript:void(0)" class="edit_question">Edit</a>
	        <input type="button" value="Save" class="btn btn-success secuirtyquestion" id="edit_question" style="display:none;border:none"/>
	    </div>
	</div>

	<hr />
	<?php 
	?>
	<!--<div class="row">-->
	<!--    <div class="col-md-4 col-xs-12">-->
	<!--        <lebel>Proposal Credits</lebel>-->
	<!--    </div>-->
	<!--    <div class="col-md-4 col-xs-8 text-center">-->
 <!--           <input type="text" readonly name="proposal_caredit" value="<//?php echo $this->Common->myproposalleft($myuser['u_id']); ?>" class='feild form-control' />-->
	<!--    </div>-->
	<!--    <div class="col-md-4 col-xs-4 text-right">-->
	<!--        <a href="<?php echo SUR.'PaymentSummary/buycredits/'.$myuser['u_id'];?>" style="color: #5bc0de">Buy More</a>-->
	<!--    </div>-->
	<!--</div><hr />-->
    
    <?php 
    $catname = $this->db->query("select * from categories where cat_id='".$myuser['category']."'")->result_array()[0]['cat_name'];
    ?>
    <!--
	<div class="row">
	    <div class="col-md-4 col-xs-12">
	        <lebel>Primary Category</lebel>
	    </div>
	    <div class="col-md-4 col-xs-8 text-center">
            <input type="text" name="design" value="<?php echo $catname;?>" class='feild form-control' />
	    </div>
	    <div class="col-md-4 col-xs-4 text-right">
	        <a href="#">Edit</a>
	    </div>
	</div><hr />
-->
	
</div>

<!--<div class="container setting_cont2 tab-pane fade" id="seeting_2" style="padding-right: 30px;">-->
<!--    <div class="row">-->
<!--        <div class="tab_heading">-->
<!--            <h3>Notification</h3>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row emailnot_heading">-->
<!--        <div class="col-xs-6">-->
<!--            <h4>Email Notification</h4>-->
<!--        </div>-->
<!--        <div class="col-xs-6 text-right "style="padding-top: 25px;">-->
<!--            <a href="#noti_collapse" data-toggle="collapse" style="color: #5bc0de">Edit</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="noti_collapse" class="collapse">-->
<!--    <div class="row " style="padding-bottom: 18px;">-->
<!--        <div class="col-xs-4">-->
<!--            <h5>Transactional Email</h5>-->
<!--        </div>-->
<!--        <div class="col-xs-6 setting_rightsec">-->
<!--           <div><input type="radio" name="transactional" /><span style="font-weight: bold;"> Interesting: </span><span> e.g Someone submit feedback or gives me rating </span></div>-->
<!--           <div><input type="radio" name="transactional" /><span style="font-weight: bold;"> Important: </span><span> e.g when my invoice is paid, my refund is approved </span></div>-->
<!--           <div><input type="radio" name="transactional" /><span style="font-weight: bold;"> Essential: </span><span> e.g receiving an invoice, buyer requesting a refund </span></div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row " style="padding-bottom: 18px;">-->
<!--        <div class="col-xs-4">-->
<!--            <h5>Project Notification Email</h5>-->
<!--        </div>-->
<!--        <div class="col-xs-6 setting_rightsec">-->
<!--           <div><input type="checkbox" name="saved" /><span style="font-weight: bold;"> Interesting: </span><span>Someone submit feedback or gives me rating </span></div>-->
<!--           <div><input type="checkbox" name="project" /><span style="font-weight: bold;"> Important: </span><span> when my invoice is paid, my refund is approved </span></div>-->
<!--           <div><input type="checkbox" name="recommended" /><span style="font-weight: bold;"> Essential: </span><span>when my invoice is paid, my refund is approved </span></div>-->
<!--           <div><input type="checkbox" name="invition" /><span style="font-weight: bold;"> Essential: </span><span> when my invoice is paid, my refund is approved </span></div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row " style="padding-bottom: 18px;">-->
<!--        <div class="col-xs-4">-->
<!--            <h5>Marketing Email</h5>-->
<!--        </div>-->
<!--        <div class="col-xs-8 setting_rightsec">-->
<!--           <div><input type="checkbox" name="saved" /><span style="font-weight: bold;"> Interesting: </span><span> Interesting Someone submit feedback or gives me rating </span></div>-->
<!--           <div><input type="checkbox" name="project" /><span style="font-weight: bold;"> Important: </span><span> when my invoice is paid, my refund is approved </span></div>-->
<!--           <div><input type="checkbox" name="recommended" /><span style="font-weight: bold;"> Essential: </span><span>  when my invoice is paid, my refund is approved </span></div>-->
<!--           <div><input type="checkbox" name="invition" /><span style="font-weight: bold;"> Essential: </span><span> when my invoice is paid, my refund is approved </span></div>-->
<!--           <div><input type="checkbox" name="invition" /><span style="font-weight: bold;"> Essential: </span><span> when my invoice is paid, my refund is approved </span></div>-->
<!--           <div class="btn save_btn">Save</div>-->
<!--        </div>-->
<!--    </div>-->
    
<!--    </div>-->
<!--    <div class="row emailnot_heading">-->
<!--        <div class="col-xs-6">-->
<!--            <h4>Updates Via SMS</h4>-->
<!--        </div>-->
<!--        <div class="col-xs-6 text-right "style="padding-top: 25px;">-->
<!--            <a hre="#noti_collapse" style="color: #5bc0de" data-toggle="collapse" >Edit</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row emailnot_heading">-->
<!--        <div class="col-xs-6">-->
<!--            <h4>Sound and Alerts</h4>-->
<!--        </div>-->
<!--        <div class="col-xs-6 text-right "style="padding-top: 25px;">-->
<!--            <a hre="#noti_collapse" style="color: #5bc0de" data-toggle="collapse" >Edit</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container setting_cont3 tab-pane fade"id="seeting_3" style="padding-right: 30px;">
    <div class="row">
        <div class="tab_heading">
            <h3>Privacy</h3>
        </div>
    </div>
    <div class="row emailnot_heading">
        <div class="col-xs-6">
            <h4>Activity Visibility</h4>
        </div>
        <div class="col-xs-6 text-right "style="padding-top: 25px;">
            <a hre="#">Edit</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form action='Setting/visibility' method='post'>
            <?php
             if($myuser['show_name'] == 'first_name'){
                 $check_second = '';
                 $check_first = "checked";
             }else{
                 $check_second =  'checked';
                 $check_first = '';
             }
            
            ?>
            
            <input type='hidden' value='<?php echo $myuser['u_id'];?>' name='userid'>
            <div class="radio">
              <label><input type="radio" name="setting_name" value='first_name' <?php echo $check_first;?>>Display my first name only</label>
            </div>
            <div class="radio">
              <label><input type="radio" value='full_name' <?php echo $check_second;?> name="setting_name">Display my full name</label>
            </div>
            <input type='submit' name='save' value='Save' style="margin-bottom:8px" class='form-group btn btn-info'>
            </form>
        </div>
       
    </div>
</div>

<!--<div class="container setting_cont4 tab-pane fade" id="seeting_4" style="padding-right: 30px;">-->
<!--    <div class="row">-->
<!--        <div class="tab_heading">-->
<!--            <h3>Visibility</h3>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row emailnot_heading">-->
<!--        <div class="col-xs-6">-->
<!--            <h4>Activity Visibility</h4>-->
<!--        </div>-->
<!--        <div class="col-xs-6 text-right "style="padding-top: 25px;">-->
<!--            <a hre="#" style="color: #5bc0de" >Edit</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row emailnot_heading">-->
<!--        <div class="col-xs-6">-->
<!--            <h4>Activity Visibility</h4>-->
<!--        </div>-->
<!--        <div class="col-xs-6 text-right "style="padding-top: 25px;">-->
<!--            <a hre="#" style="color: #5bc0de" >Edit</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row emailnot_heading">-->
<!--        <div class="col-xs-6">-->
<!--            <h4>Activity Visibility</h4>-->
<!--        </div>-->
<!--        <div class="col-xs-6 text-right "style="padding-top: 25px;">-->
<!--            <a hre="#" style="color: #5bc0de" >Edit</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</div>
</div>





<?php include("includes/front_end_footer.php");?>

<script>
    $(document).ready(function()
    {
        $("#url_edit_field").click(function () {
                $('#url_field').removeAttr('readonly');
                $("#url_field").css("border", "1px solid black"); 
                 $('#url_edit_field_save').show();
                   $('#url_edit_field').hide();
                 
        });
        
        
         $("#url_edit_field_save").click(function () {
                $('#url_field').attr('readonly', true);
                $("#url_field").css("border", "0px"); 
                $('#url_edit_field').show();
                $("#url_edit_field_save").hide();
        
                var Status = $('#url_field').val();
     
                $.ajax({
                    url: "<?php echo SURL."Setting/check_username";?>",
                    cache: false,
                    method:"POST",
                    data:{Status:Status},
                    success: function(html){
                       alert(html);
                    }  
                });
                   
        });
        
        
        
    });
    
</script>



<script>
    $(document).ready(function()
    {
        $(".edit_pass").click(function () {
        $("#save_btn").show(); 
         $(".edit_pass").hide(); 
        $("#pass").toggle();
        });
        
        $("#save_btn").click(function () {
        $(".edit_pass").show(); 
         $("#save_btn").hide(); 
        });
        
        
    });
    
</script>



<script>
    $(document).ready(function()
    {
        $(".edit_status").click(function () {
        $("#edit_status").show(); 
         $(".edit_status").hide(); 
        });
        
        $("#edit_status").click(function () {
        $(".edit_status").show(); 
         $("#edit_status").hide(); 
        });
        
        
    });
    
</script>


<script>
    $(document).ready(function()
    {
        $(".edit_question").click(function () {
             $(".security_ans").prop('disabled',false);
             $('.security').prop('disabled',false);
             $("#edit_question").show(); 
             $(".edit_question").hide();
        });
        
        $(document).on('click','.secuirtyquestion',function(){
            if($('.security option:selected').val() != 0 && $('.security_ans').val() != ""){
                $('#secuirtyquestionform').submit();
            }else{
                alert('Please fill the and pick question properly!');
            }
        });
        
        $(document).on('change','.security',function(){
           $(".security_ans").val('');
            
        });
        
        
    });
    
</script>



<script>
    $(document).ready(function()
    {
        $("#securtiy_question").click(function () {
       $('#text_security').removeAttr('readonly');
        });
        
        
        
    });
    
</script>

<script>
 $(document).ready(function()
    {
     
        $('.confirm_pass').on('keyup',function(){
          var newpass=$('#new_pass').val();
          var confirmpass=$('.confirm_pass').val();
      
             if(newpass!=confirmpass)
             {
                 $('.passerror').text('Confirm Password and New Password not matched');
                 $('#save_btn').attr('disabled','disabled');
                   $('.passerror').show();
             }else{
                 $('.passerror').hide();
                   $('#save_btn').removeAttr('disabled')
                 
             }
           
        });
        
    });
</script>

