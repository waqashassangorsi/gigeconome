<?php include("includes/front_end_header.php");?>

<style type="text/css">
   body{
       margin-top: 0!important;
   }
    input,select,textarea{
        border: 1px solid #ccc!important;
    }
    label{
        font-weight: bold;
    }
    .heading{
        color: #00a651;
        font-weight: bold;
    }
    .heading_title{
        font-weight: bold;
        margin-bottom: 30px;
    }
    .file_upload{
      position: relative;
      overflow: hidden;
      width: 100px;
      margin-top: 50px;
    }
    .upload_file{
      position: absolute;
      font-size: 50px;
      opacity: 0;
      right: 0;
      top: 0;
    }
    .projecttype_button{
    }
    .projecttype_button button{
        width: 100px;
        margin-left: 5px;
    }
    .projecttype_button ul{
        display: flex;
        list-style-type: none;
        padding: 0;
    }
    .radio_button{
        padding-top: 5px;
    }
    .job_location ul{
        display: flex;
        list-style-type: none;
        padding: 0;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .joblocation_label{
        margin-right: 15px;
        padding-top: 15px;
        font-weight: bold;
    }
    .budget ul{
        display: flex;
        list-style-type: none;
        padding: 0;
    }
    .budget_label{
        margin-right: 5px;
        padding-top: 10px;
        font-weight: bold;
    }
    .budget_field{
        margin-top: 5px;
        font-weight: bold;
    }
    .budget_checkbox{
        margin-left: 5px;
    }
    .postproject_button{
        width: 150px;
        font-size: 17px;
        margin-top: 20px;
    }
    .icon_projecttype{
        padding-top:0;
        color: #fff;
        cursor: pointer;
        margin-left: 2px;
        margin-top: -5px;
    }
    .featured_btn{
        background: #00afef!important;
        border: 0;
    }
    .highly_btn{
        background: #e5aa09!important;
        border: 0;
    }
    
</style>

</head>
<body>

<div class="container">
   <h2 class="heading">HIRE A FREELANCE PROFESSIONAL</h2>
   <p class="heading_title">Post a job and get poposals instantily</p>
   
        <form method="post" action="<?php echo SURL.'Postproject'; ?>"  enctype="multipart/form-data">
           <div class="row">
               <div class="col-md-8 col-sm-12">
                   <div class="form-group">
                       <label>Tile of the job</label>
                     	<input type="text" name="job_title" required  class="form-control" placeholder="e.g I need professional web Design" />
                     	<?php echo form_error('job_title'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-xs-12">
                            <label>Chose a Category</label>
                            <select class="form-control" name="category" id="category" required>
                                <option>Select</option>
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
                            <?php echo form_error('category'); ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <label>Sub Category</label>
                            <select class="form-control" name="sub_category" id="sub_Category" required>
                                <option>Select</option>
                                
                            </select>
                            
                        </div>
                    </div>
                </div>
                <?php if(empty($this->uri->segment(3))){ ?>
                <div class="col-md-4 col-sm-12">
                   <div class="form-group">
                        <label>Company Details (if any)</label>
                        <textarea class="form-control" rows="5" name="company_detail" placeholder="Tell us about your company" ></textarea>
                        
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-xs-12">
                    <label>Job Detail</label>
                    <textarea class="form-control" rows="5" name="job_detail" required></textarea>
                    <?php echo form_error('job_detail'); ?>
                </div>
                <div class="col-md-6 col-xs-12">
                   <button class="file btn btn-info file_upload">
						Upload
						<input type="file" name="upload_file[]" multiple class="upload_file" id="test" />
					</button>
					<?php echo form_error('upload_file'); ?>
					<div class="attach_file"style="margin-top: 10px;color:#428bca;" ></div>
					
                </div>
            </div>
            <?php if(empty($this->uri->segment(3))){ ?>
            <label>Choose Projects Type (optional)</label>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <div class="form-group projecttype_button">
                        <ul>
                            <li class="radio_button">
                                <input type="checkbox" value="Urgent"  name="project_type[]" />
                            </li>
                            <li ><button href="#" class='btn btn-danger'>Urgent</button></li>
                            <li class="icon_projecttype"><span class="glyphicon glyphicon-record tooltip_icon" data-toggle="tooltip" data-placement="top" title="Urgent"></span></li>
                        </ul>
                       
                     </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="form-group projecttype_button">
                        <ul>
                            <li class="radio_button">
                                <input type="checkbox" value="Featured"  name="project_type[]" />
                            </li>
                            <li><button href="#" class='btn btn-success featured_btn'>Featured</button></li>
                            <li class="icon_projecttype"><span class="glyphicon glyphicon-record tooltip_icon" data-toggle="tooltip" data-placement="top" title="Featured"></span></li>
                        </ul>
                        
                     </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="form-group projecttype_button">
                       <ul>
                            <li class="radio_button">
                                <input type="checkbox" value="Highly Paid" name="project_type[]" />
                            </li>
                            <li><button href="#" class='btn btn-warning highly_btn'>Highly Paid</button></li>
                            <li class="icon_projecttype"><span class="glyphicon glyphicon-record tooltip_icon" data-toggle="tooltip" data-placement="top" title="Highly Paid"></span></li>
                        </ul>
                     </div>
                </div>
            </div>
            <?php } ?>
            <?php 
            if(!empty($this->uri->segment(3))){
            ?>
            <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="username"/>
            <?php
            }
            ?>
            <div class="form-group job_location">
                <ul>
                    <li class='joblocation_label'>Job Location </li>
                    <li>
                        <input type="radio" name='joblocation' value="Remote" /> Remote <br />
                        <input type="radio" name='joblocation' value="Onsite" checked/> Onsite
                    </li>
                </ul>
                <?php echo form_error('joblocation'); ?>
            </div>
            <div class="form-group budget">
                <ul>
                    <li class='budget_label'>Budget(£)</li>
                    <li class="budget_field"><input type="text" name="budget" required class="form-control" value="" ></li>
                    <li class='budget_checkbox'><input type="checkbox" class="fix" name="budget_fixed" value="Fixed" checked/> Fixed <br>
                            <input type="checkbox" value="Hourlie" name="budget_fixed" class="hourlie" /> Hourlie</li>
                            <?php echo form_error('budget'); ?>
                </ul>
            </div>
            
            <?php 
            if(!empty($this->uri->segment(3))){
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group projecttype_button">                       
                        <ul>                            
                            <li class="radio_button" style='margin-right:8px;'>                               
                            <input type="checkbox"  value="1" id='agreetermid' name="makepublic"/>                             
                            </li>
                            <li>							
                            <h4 for='makepublic'>Make this job as public</h4>						
                            </li>
                        </ul>
                
                    </div>
                </div>  
            </div>
            <?php } ?>
        
            <div class="form-group">
                <input type="submit" name="Submit" value="Post Project" class="btn btn-info postproject_button" />
             </div>
        </form>

   
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

$(function() {
 $('#test').change(function(){
    for(var i = 0 ; i < this.files.length ; i++){
      var fileName = this.files[i].name;
      $('.attach_file').append("<i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' , ');
    }
 });
});




</script>

<script>
    $(document).ready(function(){
        $('.hourlie').change(function(){
           if($('.hourlie').is(':checked'))
           {
            $('.fix').removeAttr('checked');   
           }else if($('.hourlie').is(':checked') == false)
           {
               ('.fix').attr('checked','checked');
                $('.hourlie').removeAttr('checked'); 
           }
           
        });
        
         $('.fix').change(function(){
           if($('.fix').is(':checked'))
           {
            $('.hourlie').removeAttr('checked');   
           }else if($('.fix').is(':checked') == false)
           {
               ('.hourlie').attr('checked','checked');
                $('.fix').removeAttr('checked'); 
           }
           
        });
    });
</script>
<?php include("includes/front_end_footer.php");?>


