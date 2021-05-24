<?php include("includes/front_end_header.php");?>

<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

<link rel="stylesheet" href="<?php echo SURL.'assets/crop/assets/css/main.css'?>">
<link rel="stylesheet" href="<?php echo SURL.'assets/crop/assets/css/croppic.css'?>">

<script src="assets/crop/assets/js/jquery.mousewheel.min.js"></script>
<script src="assets/crop/croppic.min.js"></script>
<script src="assets/crop/assets/js/main.js"></script>
    
   
<style type="text/css">
    
    
    body{
        background: #fff;
    }
    .profile_continue{
        margin-top: 30px;
        margin-bottom: 130px;
    }
    .protfolio_comments label{
        font-weight: bold;
        font-size: 16px;
        color: #111;
        
    }
    .protfolio_comments p{
       font-weight: normal;
        font-size: 11px;
        margin-top: 10; 
    }
    .protfolio_upload{
        width: 70px!important;
        height: 70px;
        border-radius: 138px;
        text-align: center;
        padding-top: 22px;
        font-size: 25px;
        border: none;
        color: #222!important;
        box-shadow: 0 0 5px 0px gainsboro;
        margin-top: 12px;
        margin-left: 10px;
    }
    .gallery{
        display: inline;
        
    }
    
    .profile_photoicon{
        width: 70px!important;
        height: 70px;
        border-radius: 138px;
        text-align: center;
        padding-top: 22px;
        font-size: 25px;
        color: #222!important;
        border: none;
        box-shadow: 0 0 5px 0px gainsboro;
    }
    .image-previewer{
        width: 100%;
        background: #fff;
        box-shadow: 0 0 5px 0px gainsboro;
    }
    .image-previewer img{
        width: 100%;
        height: 100%;
        padding: 10px;
    }
    .gallery img{
        width: 100px;
        height: 100px;
        padding: 10px;
    }
    .img_box{
        position: relative;
        float: left;
    }
    .remove_icon{
        color: #fff!important;
        position: absolute;
        top: -11px;
        left: 11px;
         background: red;
    }
    .photo_icon{
        margin-top: 20px!important;
    }
    .submit_button{
        border-radius: 24px!important;
        margin-top: 30px;
    }
    .cover_dec p{
        font-size: 11px;
    }
    
    .img_box1 
    {
        width:93px;
        float: left;
        position:relative;
    }
    
    .remove_icon1{
         color: #fff!important;
        position: absolute;
        top: -12px;
        left: 11px;
         background: red;
    }
    
    .gallery1{
        display: inline;
        
    }
    
    .gallery1 img{
        width: 100px;
        height: 100px;
        padding: 10px;
    }
    .label_for1
    {
    margin-top: 27px
        
    }
    
    @media screen and (max-width: 764px) and (min-width:340px){
     
      .usercoverimg{
        width:100%;
    }
    
    #cropContainerModal{
        height:auto;
        border:none;
    }
    
       
}
</style>

<div class='container profile_continue'>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="<?php echo SURL.'Profilecontinue/coverphoto'; ?>"  enctype="multipart/form-data">
                <?php
                
                 if($myuser['user_status']!="Buyer"){
                
                ?>
                <div class="form-group row protfolio_comments">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Upload your Certification</label>
                    <div class="col-sm-4">
                        <!--<p>(Recommended dimensions 689x459)</p>-->
                    </div>
                </div>
                <div class="form-group row protfolio_comments">
                    <div class="col-sm-12 " id="ipnut_files1">
                        <div class="gallery1">
                          <?php foreach($certifi_record as $key=>$value){
                            
                              if(!empty($value['cert_file'])){
                                  
                                  $ext  =  explode('.',$value['cert_file'])[1];
                                   if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif'){
                                      $file = '<img src="'.$value['cert_file'].'">';
                                   }else{
                                       $name = explode('/',$value['cert_file'])[1];
                                       $file = '<a href="'.$value['cert_file'].'" class="btn btn-info" style="margin-top:60px" download>'.$name."</a>";
                                   }
                                  ?>
                                 <div class='img_box' id ="wrpr_portfolio_.<?php echo $value['cert_id'];?>">
                                    <?php echo $file;?>
                                    <i class='glyphicon glyphicon-remove remove_icon dltserver1' data-id="<?php echo $value['cert_id'];?>"></i>
                                </div>
                                <?php
                              }
                            }
                            ?>
                        </div>
                        <input type="file"  class="hidden" name="certs[]"  multiple  id="attached_Certificates">
                        <label for='attached_Certificates'><span class="glyphicon glyphicon-plus protfolio_upload"></span></label>
                        
                        
                    </div>
                   <div class='col-sm-12'>
                        <div class="attach_waper" style="color:#428bca;padding: 10px;margin-top: 14px;"></div>  
                   </div>
                </div>
                <div class="form-group row protfolio_comments">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Upload your Protfolio</label>
                    <div class="col-sm-4">
                        <p>(Recommended dimensions 689x459)</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 " id="ipnut_files">
                        <div class="gallery">
                            
                            <?php foreach($record as $key=>$value){
                                  ?>
                                 <div class='img_box' id ="wrpr_portfolio_.<?php echo $value['id'];?>">
                                    <img src="<?php echo $value['image']; ?>">
                                    <i class='glyphicon glyphicon-remove remove_icon dltserver' data-id="<?php echo $value['id'];?>"></i>
                                </div>
                                <?php
                                
                            }
                            ?>
                        </div>
                        <input type="file" class="hidden" name="portfolio[]" accept="image/*" multiple id="upload_icon0" onchange="imagesPreview(this, 'div.gallery')">
                    
                        <label class="label_for" for='upload_icon0'><span class="glyphicon glyphicon-plus protfolio_upload"></span></label>
                    </div>
                </div>
                <?php } ?>
<style>
    .cropImgWrapper{
        height: 350px;
        width: 100%;
    }
</style>                
                <div class="form-group">
                    <div class="col-sm-12 cover_dec"style="padding:0;">
                        <label><h4><b>Add cover Photo</b></h4>
                           
                        </label>
                        <div class="form-group">
                		    <div id="cropContainerModal"><img class="usercoverimg" src="<?php echo $myuser['cover'];?>"></div>
            			</div>
                    </div>
                </div>
                
                
			
			
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 ">
                        <input type="submit" class="btn btn-primary form-control submit_button" name="submit" value="Submit">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
   
</div>

<script>
  
            $(document).on('change','#attached_Certificates',function(){
                console.log('asda');
                $('.attach_waper').html('');
                var $fileUpload = $("input[type='file']");
                if(parseInt($fileUpload.get(0).files.length)>4){
                    alert("You can only upload a maximum of 4 files");
                }else{
                    for(var i = 0 ; i < this.files.length ; i++){
                      var fileName = this.files[i].name;
                      $('.attach_waper').append("<div style='display:inline-block'><i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' <i class="fa fa-times-circle remove_file" style="color:red;cursor:pointer" data-file="'+fileName+'" ></i> , </div> ');
                    }
                }
            });

        $(document).on('click','.remove_file',function(){
            
            var fileUpload = $("input[type='file']");
            
             var file = $(this).data("file");
              for (var i = 0; i < fileUpload.length; i++) {
                if (fileUpload[i].name === file) {
                  fileUpload.splice(i, 1);
                  break;
                }
              }
              $(this).parent().remove();
        });

</script>

<script>
    var croppicContainerModalOptions = {
				uploadUrl:"<?php echo SURL.'Profilecontinue/crop_image';?>",
				cropUrl:"<?php echo SURL.'Profilecontinue/crop_now';?>",
				modal:true,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);
</script>


<script type="text/javascript">
    
    var counter = 0;

    function imagesPreview (input, placeToInsertImagePreview) {
    
    if (input.files) {
        var filesAmount = input.files.length;
    
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
    
            reader.onload = function(event) {
                
                $(".gallery").append("<div class='img_box1 box_img' id='img_number"+ counter +"'><img src='"+event.target.result+"' /><i class='glyphicon glyphicon-remove remove_icon' data-id='img_number"+ counter +"'></i></div>");
                // $($.parseHTML('<img>')).attr('src', event.target.result).appendTo("#img_number"+counter);
                // $(".gallery #img_number"+counter).append('');
            }
    
            reader.readAsDataURL(input.files[i]);
        }
    }
    
    counter++;
    $(".label_for").attr("for", "upload_icon0" + counter);
    $("#ipnut_files").append('<input type="file" onchange="imagesPreview(this, \'div.gallery\')" class="hidden" name="portfolio[]"  id="upload_icon0'+counter+'"  multiple />');
    //alert($(".label_for").attr("for"));
    
    };
    
     function imagesPreview2 (input, placeToInsertImagePreview) {
    
    if (input.files) {
        var filesAmount = input.files.length;
    
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
    
            reader.onload = function(event) {
                
                $(".gallery1").append("<div class='img_box1 box_img' id='img_number"+ counter +"'><img src='"+event.target.result+"' /><i class='glyphicon glyphicon-remove remove_icon1' data-id='img_number"+ counter +"'></i></div>");
                // $($.parseHTML('<img>')).attr('src', event.target.result).appendTo("#img_number"+counter);
                // $(".gallery #img_number"+counter).append('');
            }
    
            reader.readAsDataURL(input.files[i]);
        }
    }
    
    counter++;
    $(".label_for1").attr("for", "upload_icon1" + counter);
    $("#ipnut_files1").append('<input type="file" onchange="imagesPreview2(this, \'div.gallery1\')" class="hidden" name="certs[]"  id="upload_icon1'+counter+'"  multiple />');
    //alert($(".label_for").attr("for"));
    
    };
    
    
        
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#cover_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#upload_cover").change(function(){ 
        alert('check alert');
        readURL(this);
    });
    
    $(function() {
        $('#upload_certification').change(function(){
            
            for(var i = 0 ; i < this.files.length ; i++){
                var fileName = this.files[i].name;
                alert('test');
                $('.attach_file').append("<i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' , ');
            }
        });
       
    });
    
   


    $(document).on('click','.remove_icon',function(){
       var id = $(this).data("id");
       $("#"+id).remove();
        
    });


    $(document).on('click','.remove_icon1',function(){
       var id = $(this).data("id");
      // $("#"+id).remove();
        $(this).parents('.box_img').remove();
    });

  /*  $(document).on('click','.dltserver',function(){
       var id = $(this).data("id");
       $("#"+id).remove();
       
       var confirm_msg =  confirm('Are you sure you want to delete this portpolio?');
        if(confirm_msg == true){
                
                
                    
                var portpid = $(this).data("id");
                $.ajax({
                  url: "Profilecontinue/deleteProtpolio",
                  cache: false,
                  type: "POST",
                  data: {portpid : portpid},
                  success: function(html){ 
                      $(".dltserver").html(html);
                  }
                });
          
          
        }else{
        return false;
        }
        
    });*/
    
    
      $(document).on('click','.dltserver1',function(){
       var id = $(this).data("id");
       //$("#wrpr_portfolio_."+id).remove();
       var ele =  $(this);
       var confirm_msg =  confirm('Are you sure you want to delete this certificate?');
        if(confirm_msg == true){
                
                
                    
                var portpid = $(this).data("id");
                $.ajax({
                  url: "Profilecontinue/deleteCertificate",
                  cache: false,
                  type: "POST",
                  data: {portpid : portpid},
                  dataType:'json',
                  success: function(response){ 
                      //$(".dltserver1").html(html);
                      if(response.status == '1')
                      {
                        ele.parents('.img_box').remove();
                      }
                     
                  }
                });
          
          
        }else{
        return false;
        }
        
    });
    
    $(document).on('click','.dltserver',function(){
       var id = $(this).data("id");
       $("#"+id).remove();
       var ele =  $(this);
       var confirm_msg =  confirm('Are you sure you want to delete this portpolio?');
        if(confirm_msg == true){
                
                
                    
                var portpid = $(this).data("id");
                 ele.parents('.img_box').remove();
                $.ajax({
                  url: "Profilecontinue/deleteProtpolio",
                  cache: false,
                  type: "POST",
                  data: {portpid : portpid},
                  dataType:'json',
                  success: function(response){ 
                      //$(".dltserver1").html(html);
                     
                        ele.parents('.img_box').remove();
                     
                     
                  }
                });
          
          
        }else{
        return false;
        }
        
    });



    


</script>
	
<script>  
// cover Image ------------

$(document).ready(function(){

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });


});  
</script>






	


<?php include("includes/front_end_footer.php");?>
