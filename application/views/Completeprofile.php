<?php include("includes/front_end_header.php");?>

<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<style type="text/css">
    body{
        background: #fff;
    }
    .container{
        
    }
    
    .icon-github {
    background: no-repeat url('../img/github-16px.png');
    width: 16px;
    height: 16px;
}

.bootstrap-tagsinput {
    width: 100%;
}

.accordion {
    margin-bottom:-3px;
}

.accordion-group {
    border: none;
}

.twitter-typeahead .tt-query,
.twitter-typeahead .tt-hint {
    margin-bottom: 0;
}

.twitter-typeahead .tt-hint
{
    display: none;
}

.tt-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    list-style: none;
    font-size: 14px;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    background-clip: padding-box;
    cursor: pointer;
}

.tt-suggestion {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333333;
    white-space: nowrap;
}

.tt-suggestion:hover,
.tt-suggestion:focus {
  color: #ffffff;
  text-decoration: none;
  outline: 0;
  background-color: #428bca;
}

    .row{
        margin: 0;
        padding: 0;
    }
    .profile_headng{
        color: #222;
        padding-bottom: 20px;
        padding-top: 10px;
        font-weight: bold;
        padding-left: 10px;
    }
    .name_field{
        width: 33.33%;
    }
    .name_field input{
        border-radius: 15px;
        box-shadow: 0 0 5px 0px gainsboro;
        border: none;
    }
    .about_youself{
        margin-top: 25px;
    }
    .image_box{
        margin-top: 30px;
        width: 160px;
        background: #fff;
        max-height: 160px;
        border-radius: 15px;
        box-shadow: 0 0 5px 0px gainsboro;
    }
    .image_box img{
        border-radius: 15px;
    }
    .chose_category{
        margin-top: 20px;
    }
    .file_upload{
      position: relative;
      overflow: hidden;
      color: #222;
      font-weight: bold;
      margin: 0 auto;
      width: 160px;
      padding-top: 10px;
    }
     .fileupload_input{
      position: absolute;
      font-size: 50px;
      opacity: 0;
      right: 0;
      top: 0;
    }
    .img_description{
        font-size: 9px;
    }
    .next_button{
       background: #fff;
       width: 80px;
       margin-top: 20px;
       margin-bottom:20px;
       border: none;
       border-radius: 15px;
       margin-left: 10px;
       box-shadow: 0 0 5px 0px gainsboro;
       color: #333;
    }
    .next_button:hover{
        color: #444;
        background: #fff;
        border: 0;
        border: none;
    }
    textarea.form-control{
        box-shadow: 0 0 5px 0px gainsboro;
    }
    .profile_container select{
        box-shadow: 0 0 5px 0px gainsboro;
    }
    .bootstrap-tagsinput{
        box-shadow: 0 0 5px 0px gainsboro;
    }
    .bootstrap-tagsinput{
        border: none!important;
    }
    @media screen and (max-width: 877px){
        .name_field{
            width: 45%;
        }
        
        
    }
    @media screen and (max-width: 600px){
        .name_field{
            width: 55%;
        }
    }
     @media screen and (max-width: 453px){
        .name_field{
            width: 100%;
        }
        .profile_headng{
            font-size: 16px;
        }
    }
    
    .input_hourly{
        position: relative;
    }
    .doller_rate{
        position: absolute;
        top: 5px;
        right: 28px;
        font-size: 15px;
    }
    
    .below_text{
        clear: both;
        padding-left: 16px;
        padding-top: 6px;
        font-weight: bold;
        color: red;
    }
    
    .namefieldsdata{
        margin-top:10%;
    }
    
    @media screen and (max-width: 764px) and (min-width:340px){
 .namefieldsdata{
       margin-top: 38%;
    }
    
}

    
</style>

<div class='container-fluid profile_container'>
    <h3 class="profile_headng">Please Complete your Profile Proceed</h3>
    <form method="post" action="<?php eCho SURL.'Completeprofile'; ?>"  enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3 col-md-offset-1 col-xs-3 col-xs-offset-2 col-sm-offset-1 col-sm-4">
            <div class="image_box">
           <img src="<?php echo $myuser['dp'];?>" id="profile-img-tag"  width="100%" />
          
            <label for='upload_icon' class="file_upload">
				<p class="text-center">Upload your Image</p>
				<p class="text-center img_description">(Recommended dimension: 300x300)</p>
				<input type="file" name="user_image" class="fileupload_input" id="profile-img" accept="image/*"/>
			</label>
             </div>
        </div>
    </div>
    <div class="row name_field namefieldsdata">
        <div class="col-xs-6">
            <div class="form-group">
                <input type="text" name="first_name" value="<?php echo $myuser['f_name'];?>" Placeholder="First Name" class="form-control" pattern="[A-Za-z0-9]+" />
                <?php echo form_error('first_name'); ?>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <input type="text" name="last_name" value="<?php echo $myuser['l_name'];?>" Placeholder="Last Name" class="form-control " pattern="[A-Za-z0-9]+" />
                <?php echo form_error('last_name'); ?>
            </div>
        </div>
    </div>
    <?php if($myuser['user_status']=="User"){?>
     <div class="row name_field">
        <div class="col-xs-6">
            <div class="form-group">
                <input type="text" name="profession" value="<?php echo $myuser['profession'];?>" requried Placeholder="Write Down your profession" class="form-control "/>
                <?php echo form_error('profession'); ?>
            </div>
        </div>
    </div>
    
    <?php } ?>
    <div class="row about_youself">
        <div class="col-md-6 col-sm-8">
            <textarea name="about_self" placeholder="Tell Us about Yourself" rows="15" style="white-space: pre-line;" class="form-control profile_feild" ><?php echo $myuser['about'];?></textarea>
        </div>
        
    </div>
     <?php 
    //echo "<pre>";var_dump($myuser);
    
    if($myuser['user_status']!="Buyer"){
    ?>
    <h3 class="profile_headng">Chose Category</h3>
    <div class="row name_field">
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <select name="category" id="category" class="form-control" >
                    <option value="0">Select Category</option>
                    <?php 
                        foreach($categories as $key=>$value){
                            
                            if($value['cat_id']==$myuser['category']){
                                $isselect = "selected";
                            }else{
                                $isselect="";
                            }
                    ?>
                    <option <?php echo $isselect; ?> value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <select name="sub_Category" id="sub_Category" class="form-control" >
                    <option>Sub Category</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <h3 class="profile_headng">Add Tags(upto 5)</h3>
        <div class="col-md-4">
            <input type='text' name="tags" id="tag" class="form-control" value="<?php echo $myuser['tags']; ?>" data-role="tagsinput" />
        </div>
        <h6 class="below_text">Press enter to add new</h6>
    </div>
    
    


    <div class="row">
        <h3 class="profile_headng">Skill (upto 5)</h3>
        <div class="col-md-4">
            <input type='text' name="skills" id="skill" class="form-control" value="<?php echo $myuser['skills']; ?>"  />
        </div>
        <h6 class="below_text">Press enter to add new</h6>
    </div>
    
    <div class="row">
        <h3 class="profile_headng">Add Languages(upto 5)</h3>
        <div class="col-md-4">
            <input type='text' name="language"  id="addlan" class="form-control" value="<?php echo $myuser['language']; ?>" data-role="tagsinput" />
        </div>
        <h6 class="below_text">Press enter to add new</h6>
    </div>
    <div class="row">
        <h3 class="profile_headng">Hourly Rate</h3>
        <div class="col-md-1">
            <input type='text' name="hourly_rate" class="form-control input_hourly" value="<?php echo $myuser['hourly_rate']; ?>"  /><span class="doller_rate">£</span>
        </div>
        <div class="col-md-1"style="padding-left: 0;">
            <h4 class="rate_dec"><b>/hr</b></h4>
        </div>
    </div>
     <?php } ?>
    <input type="submit" value="Next" class="next_button btn btn-info"/> 
    </form>
</div>
<script>

$('#tag').tagsinput({
  maxTags: 5
});

//
$(document).ready(function(){
localStorage.clear();
var skills = new  Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: {
    url: 'Completeprofile/getSkills',
    filter: function(list) {
      return $.map(list, function(cityname) {
        return { name: cityname }; });
    }
  }
}); 

skills.initialize();
console.log(skills);


$('#skill').tagsinput({
  typeaheadjs: {
    name: 'skills',
    displayKey: 'name',
    valueKey: 'name',
    source: skills.ttAdapter()
  },
  maxTags: 5
});

});

$('#addlan').tagsinput({
  maxTags: 5
});
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
    
    $(document).on('click','#profile-img-tag',function(){
        
         $("#profile-img").click();
        
    });
   
    
</script>

<?php include("includes/front_end_footer.php");?>
