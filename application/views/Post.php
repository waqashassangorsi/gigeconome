<?php include("includes/front_end_header.php");?>

<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<style type="text/css">
.top-30{
  padding-top: 30px;
}

.bottom-30{
  padding-bottom: 30px;
}


.user-img{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 5px;
    border-radius: 8px;
}

.user-img p{
    font-size: 10px;
    margin: 0;
}

.form-tooltip{
  border-radius: 10px;
    width: 21px;
    margin-bottom: 10px;
    padding: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.form-tooltip-checkbox{
  border-radius: 10px;
    width: 21px;
    margin-bottom: 40px;
    margin-left: 10px;
    padding: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}


.project-checkbox-p{
margin: 0;
    background: #09a4d5;
    padding: 10px 25px;
    border-radius: 5px;
    color: white;
}


.top-img{
  width: 45px;
    padding-left: 10px;
}

.top-user{
  padding-left: 10px;
    width: 47px;
    border-left: 1px solid;
    padding-right: 10px;
}

.padding-40{
  padding: 40px 0;
}

.bottom-40{
  padding-bottom: 40px;

}


.frmwrpr{background: white; padding: 20px;box-shadow: 0 0 10px -3px grey;}
.frmwrpr .col{padding-right: 0; padding-left: 0;}
.wrpr_form1 li{display: inline;}
.wrprfields{border: 1px solid #ccc;padding: 10px;margin: 0;}
.ican{border: none;width: 300px;margin-bottom: 13px}
.form-control{height: 40px;}
.wrpr_postmyservice{width:60%;margin:30px auto;}

@media only screen and (max-width: 600px) {
  .wrpr_postmyservice{ width: 100% !important; }
  .wrpr_editprofile{width: 100% !important;}
  .ican {
    width: 112px;
  }
  .hide1 h2{text-align:center;}
}
@media only screen and (max-width: 991px) and (min-width: 601px){
    .ican {
        width: 132px;
  }
}


@media only screen and (max-width: 460px){
    .dollar_sign
 {
        width: 132px;
  }
}

@media only screen and (max-width: 442px){
    .dollar_sign
 {
        width: 113px;
  }
}

@media only screen and (max-width: 423px){
    .dollar_sign
 {
        width: 101px;
  }
}

@media only screen and (max-width: 410px){
    .dollar_sign
 {
        width: 85px;
  }
}



@media only screen and (max-width: 395px){
    .dollar_sign
 {
        width: 75px;
  }
}



@media only screen and (max-width: 386px){
    .dollar_sign
 {
        width: 56px;
  }
}




@media only screen and (max-width: 366px){
    .dollar_sign
 {
        width: 43px;
  }
}



@media only screen and (max-width: 353px){
    .dollar_sign
 {
        width: 29px;
  }
}



@media only screen and (max-width: 1199px){
    .dollar_sign
 {
        width: 85px;
  }
}

@media only screen and (max-width: 670px){
    .dollar_sign
 {
        width: 69px;
  }
}

@media only screen and (max-width: 645px){
    .dollar_sign
 {
        width: 42px;
  }
}


@media only screen and (max-width: 352px){
    .dollar_sign
 {
        width: 37px;
  }
}


@media only screen and (max-width: 992px){
  .day_divs
 {
        width: 100%;
  }
  
  .day_divs1
 {
        width: 100%;
  }
}

.wrpr_editprofile{margin:20px auto; width: 700px; }

.mybtnbig{
    border-radius: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    border: none;
    background: #009247!important;
}


.logo{
  height:50px;
}

.bg-light {
    background-color: #fff !important;
    box-shadow: 0 1px 6px 0 rgba(32,33,36,0.28);
}

.bg-white{
  background-color: #fff;
}




<?php
  if(isset($hide)){
?>
.hide1{display: none;}

<?php
  }
?>

label{
    font-weight: 700;
}
.error{color: red;}

.bootstrap-tagsinput
{
    width:100%;
}

.form-control1
{
   border:1px solid #ccc;
}

@media screen and (max-width: 764px) and (min-width:340px){
.enterpricenew{
          width: 39px;
}
       
    
}

</style>






<div class="container"  id="main_container">

  <div class="row wrpr_postmyservice"> 
    <div class="col-xs--12">
        
      <h1 style="color:#009247;font-weight:bold;text-transform: uppercase;">Post a service</h1>
      <h4 style="padding-bottom: 15px;">to show the clients about your services</h4>
        <form method="post" action="<?php echo SURL.'Post'; ?>"  enctype="multipart/form-data">
        <div class="row frmwrpr" style="margin:0; color:#2b2727cc;">
          <div style="margin-bottom:20px;">
            <ul class="wrpr_form1 wrprfields">
               <li><label for="field-1" style="font-style: italic;">I can</label></li>
               <li> <input type="text" autocomplete="off" required value="<?php echo $service['title'];?>"  name="ican" class="ican" style="border:1px solid #ccc" /></li>

               <li><label for="field-1" style="font-style: italic;">for</label></li>
               <li style="border:1px solid #ccc;padding: 6px;">
                <strong>£</strong> <input type="number" value="<?php echo $service['amount'];?>" required autocomplete="off"  name="amount" class="enter_price" style="border:none;width: 40px!important;" pattern="[0-9]+" />
               </li>
            </ul>  
            
            <p style="font-style: italic;" class="h6">e.g I can design for businiess card for $60</i>
          </div>
          
          <?php 
          if(!empty($service['service_id'])){
              ?>
            <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="edit"/>  
          <?php }      
          ?>

          <div class="col-xs-12 col-sm-6 day_divs" style="padding:0 0 0 0px;margin-top:10px;margin-bottom: 20px;">
            <label style="font-size:12px;">WHEN YOU WILL DELIVER THE OFFER?</label>
            <select name="devliver_day" class="form-control" id="devliver_day">
                <option <?php if($service['delivery']=="1"){ echo "selected";}?> value="1">Day 1</option>
                <option <?php if($service['delivery']=="2"){ echo "selected";}?> value="2">Day 2</option>
                <option <?php if($service['delivery']=="3"){ echo "selected";}?> value="3">Day 3</option>
                <option <?php if($service['delivery']=="4"){ echo "selected";}?> value="4">Day 4</option>
                <option <?php if($service['delivery']=="5"){ echo "selected";}?> value="5">Day 5</option>
                
            </select>
           
          </div>
          
          <div class="col-xs-12 col-sm-6 day_divs1" style="padding:0 0 0 0px;margin-top:10px;margin-bottom: 20px;">
            <label style="font-size:12px;">PICK CATEGORY</label>
            <select name="cat" class="form-control" id="cat" required>
                         
                <option value="0">Pick one</option>
                <?php 
                        foreach($categories as $key=>$value){
                            
                            if($value['cat_id']==$service['cat_id']){
                                $isselect = "selected";
                            }else{
                                $isselect="";
                            }
                    ?>
                    <option <?php echo $isselect; ?> value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                    <?php } ?>
              
            </select>
           
          </div>


          <div class="form-group">
            <label style="font-size:12px;">ADD TAGS (max 5)</label>

            <div class="form-group">
              <input type="text" class="form-control values" id="skills" placeholder="type here to add"  name="planets" value="<?php echo $service['tags'];?>" <?php if(empty($service['tags'])){echo "required";}?>  data-role="tagsinput" />
            </div>
            
          </div>
          <div class="form-group" style="margin-top:20px;">
            <div>
              <label style="font-size:12px;">MAKE IT FUN:UPLOAD PHOTOS</label>
            </div>
            <div class="row" style="margin:0; border:dotted;">
              <div class="col-sm-3 col-xs-6">
                 <label class="btn btn-file" style="border-right: 1px solid #ccc;" for="files">
                      <span class="glyphicon glyphicon-play-circle" style="font-size:35px;"></span><br>
                       <i style="color:#853232;">Upload Image</i> <input <?php if(empty($serviceimages)){ echo "required";}?>  type="file" id="files" class="hidden" onchange="fileSelect(event)" name="files[]" multiple="" hidden="" accept="video/*,image/*">
                  </label>
              </div>
              <div class="col-sm-9 col-xs-6 wrpr_files" style="padding-top:20px;">
              </div>  
            </div>
           
          </div>
          
          <?php 
            if(!empty($serviceimages)){
                foreach($serviceimages as $key=>$value){
          ?>
          <div>
              <div class="pull-left">
                  <img src="<?php echo $value['image'];?>" style="width:70px;height:70px;"/>
                  <span class="glyphicon glyphicon-remove removeimg" data-id1="<?php echo $value['id'];?>"></span>
              </div>
          </div>
          <?php }}?>

          <div class="form-group" style="margin-top:20px;clear:both;">
            <label style="font-size:12px;">PROVIDE MORE DETAIL ABOUT YOUR OFFER</label>
            <textarea wrap="hard" name="details" style="white-space: pre-line;"  placeholder="Explain in more details what exactly you will deliver to the buyer"
             class="form-control" rows="5" required><?php echo $service['title'];?></textarea>
            
          </div>
          <div style="margin-bottom:20px;">
            <label style="font-size:12px;">ADD ONS</label>
            
            <div class="wrpr_addsons">
                
                <?php 
                    if(!empty($serviceadons)){
                        foreach($serviceadons as $key=>$value){
                ?>
                <ul class="wrpr_form1 wrprfields inerwrpradons">
                   <li><label for="field-1" style="font-style: italic;">I will</label></li>
                   <li> <input type="text" autocomplete="off" value="<?php echo $value['title']; ?>"  name="addons[]" class="form-control1 ican" style="border:1px solid #ccc"/></li>

                   <li><label for="field-1" style="font-style: italic;">for</label></li>
                   <li style="border:1px solid #ccc;padding: 6px;">
                    <strong>£</strong> <input type="number" value="<?php echo $value['amount']; ?>"  name="addonamount[]" class="enter_price enterpricenew" style="border:none;"/>
                   </li>
                   <li style="float: right;color:#ccc;"><span class="glyphicon glyphicon-remove removeadson"></span></li>

                </ul>
                <?php }}else{ ?>
                
                <ul class="wrpr_form1 wrprfields inerwrpradons">
                   <li><label for="field-1" style="font-style: italic;">I will</label></li>
                   <li> <input type="text" autocomplete="off" value="<?php //echo set_value('ican'); ?>"  name="addons[]" class="form-control1 ican"  style="border:1px solid #ccc"/></li>

                   <li><label for="field-1" style="font-style: italic;">for</label></li>
                   <li style="border:1px solid #ccc;padding: 6px;">
                    <strong>£</strong> <input type="number" value="<?php //echo set_value('amount'); ?>"  name="addonamount[]" class="dollar_sign enter_price" style="border:none;"/>
                   </li>
                   

                </ul>
                
                <?php } ?>
            
            </div>
            
            <h6 style="cursor: pointer;">
              <span class="glyphicon glyphicon-plus addmoreons"></span><span style="color:#009247;" class="h6 addmoreons">Add More</span>
            </h6>
          </div>
            <?php if($myuser['status']=="Active"){?>
            <div class="form-group" style="margin-top:20px;">
              <div style="margin:0 auto; margin-top:60px;">
                <input type="submit" name="submit" class="btn btn-primary btn-block mybtnbig mynewbg" value="Post Service">
                      
              </div> 
            </div>
            <?php }else{?> 
            <p class="text-danger">You are not authorized to post a project.Please verify your email first.</p>
            <?php } 
            ?>

        </div>    


      </form>



<div class="demowrpr" style="display:none;">
  <ul class="wrpr_form1 wrprfields inerwrpradons copyy">
     <li><label for="field-1" style="font-style: italic;">I will</label></li>
      <li> <input type="text" autocomplete="off" value=""  name="addons[]" class="form-control1 ican"/></li>

     <li><label for="field-1" style="font-style: italic;">for</label></li>
     <li style="border:1px solid #ccc;padding: 6px;">
      <strong>£</strong> <input type="text" value=""  name="addonamount[]" class="dollar_sign" style="border:none;"/>
     </li>
     <li style="float: right;color:#ccc;"><span class="glyphicon glyphicon-remove removeadson"></span></li>
  </ul> 
</div>
         
<style type="text/css">
.inerwrpradons{margin-bottom: 10px;}
.removeadson{cursor: pointer;}
</style> 
      

    </div>

  </div>

  </div>

</div>
<?php include("includes/front_end_footer.php");?>

<script>

$('#skills').tagsinput({
  maxTags: 5
})

</script>

<script>
    $(document).on('change','#cat',function(){
        var id = $(this).val();
        
        $.ajax({
          url: "<?php echo SURL."Postjob/show_subcat/";?>"+id,
          cache: false,
          method:"POST",
          success: function(html){
            $("#subcat").html(html);
          }
        });

    });
    
    $(document).on('click','.removeimg',function(){
        var id = $(this).data("id1");
        var r=confirm("Are you sure you want to delete the image");
        if(r==true){
            window.location.href="<?php echo SURL.'Post/dltimg/'.$this->uri->segment(3).'/';?>"+id;
        }
        

    });
    
    $('input[type="submit"]').click(function(e) {
    //prevent chrome bug
    // $("input:hidden").val(null);
});
    
    
    
    <?php if(!empty($servicerecord->categry)){?>
   
        var id = <?php echo $servicerecord->categry; ?>;
        var subcat = <?php echo $servicerecord->sub_cate; ?>;
        
        $.ajax({
          url: "<?php echo SURL."Editprofile/get_subcat";?>",
          cache: false,
          method:"POST",
          data:{id:id,subcat:subcat},
          success: function(html){
            $("#subcat").html(html);
          }
        });

   
    <?php } ?>
</script>
<script type="text/javascript">

    $(document).ready(function(){

        $('#files').change(function(e){
          e.stopImmediatePropagation();
          var files = $(this)[0].files;

          // alert(files.length);
          for(var i=0;i<files.length;i++){

            fileName = e.target.files[i].name;

            $(".wrpr_files").append("<span class='glyphicon glyphicon-paperclip' style='color:#008dc9!important;'>"+fileName+"</span>,&nbsp;");

          }

        });
    });

  </script>  
  
  <script type="text/javascript">

    $(document).on('change','#cat',function(){
        
        var catid = $(this).val();
        
        if(catid==0)
        {
         
         $('.mybtnbig').prop('disabled', true);
           
        }
        else
        {
         $('.mybtnbig').prop('disabled', false);
           
        }
    });

  </script> 
   <script type="text/javascript">
$(document).on('click','.addmoreons',function(event){ 
  event.stopImmediatePropagation()
 
     $(".demowrpr > .copyy").clone().appendTo(".wrpr_addsons");
 
});

$(document).on('click','.removeadson',function(){
 
     $(this).closest('.inerwrpradons').remove();
 
});
</script>

<script>
$(".enter_price").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
});      
</script>
  
  
  
