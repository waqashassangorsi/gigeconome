<?php include("includes/fornt_end_header_customer.php");?>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style type="text/css">


.list_item
{
    margin:3px
}

#first_container
{
    margin-top:22px
}


#search_bar
{
    border-radius: 17px;
}

#div_search_bar
{
    margin-top:-5px;
}

#first_row_padding
{
    padding-bottom:25px;
}

#heading
{
    margin-left:30px;
}


#form_heading
{
    margin-left:1px;
}

.text_box
{
    width:50%;
}

#submit_button
{
    padding-left: 58px;
    padding-right: 62px;
    
}

.text_color
{
    color:black;
}

.form_margin
{
    margin-top:28px
}
.font_para
{
    font-family:Arial;
    
}

.box_shadow
{
    box-shadow: 0px 0px 3px gainsboro;
}

@media (max-width: 726px) {
    #first_container{
        margin-left:-59px;
    
    }
    
    #heading{
        margin-left:-20px;
    }
    
    .text_box
   {
    width:100%;
   
   }
    
    
}

@media screen and (max-width: 764px) and (min-width:340px){
.desc1{
           margin-top:10px;
       }
    
}

</style>


<div class="container-fluid" style="background-color:white">
   <!-- <div class="container-fluid" id="first_container">-->
   <!--   <div class="row" id="first_row_padding">-->
   <!--       <div class="col-sm-8">-->
   <!--       <ul>-->
              
   <!--           <li>Submit a Request</li>-->
   <!--       </ul>-->
         
   <!--      </div>-->
         <!--
   <!--      <div class="col-sm-4" id="div_search_bar">-->
   <!--      <input class="form-control" type="text" placeholder="Search" id="search_bar">-->
   <!--      </div>-->
   <!--      -->
   <!--   </div>-->
   <!--</div>-->
   
   <!---------------form container------------------------>
   <div class="container-fluid" id="heading">
       
           
       <div class="row" id="form_heading">
           <h2>Submit a request</h2>
       </div>
        
        <form method="post" action="Query/addQuery" enctype="multipart/form-data">
          <div class="form-group form_margin">
             <label for="email" class="text_color font_para">Your email address:</label>
             <input type="email" name="email" class="form-control text_box box_shadow" value="<?php echo $myuser['email'];?>" id="email">
             <?php echo form_error('email') ?>
         </div>
          <div class="form-group form_margin">
             <label for="user_type"  class="text_color">What type of user are you?</label>
              <select class="form-control  text_box  box_shadow" name="user_type" id="sel1">
                  <option  class="text_color" value="0">Select type</option>
                 <option  class="text_color" value="Freelancer">I am a freelancer</option>
                 <option  class="text_color" value="Buyer">I am a buyer</option>
             </select>
             <?php echo form_error('user_type') ?>
             <p  class="text_color desc1">Let us know if you are a freelancer or a buyer under our platform.</p>
         </div>
         
         
         <div class="form-group form_margin">
             <label  class="text_color">Select reason</label>
              <select class="form-control  text_box  box_shadow" id="sel1" name="buyer_contact">
                <option  class="text_color">Select Reason</option>
                <?php foreach($question as $value) { ?>
                
                 <option  class="text_color" value="<?php echo $value["id"] ?>"><?php echo $value["question"] ?></option>
                 <?php } ?>
             </select>
             <?php echo form_error('buyer_contact') ?>
             <p  class="text_color desc1">If you are a buyer help us understand the main problem you are experiencing.</p>
         </div>
         
         <div class="form-group form_margin">
             <label  class="text_color">Subject</label>
             <input type="text" class="form-control text_box box_shadow" id="email" name="subject">
             <?php echo form_error('subject') ?>
         </div>
         
         <div class="form-group form_margin">
             <label  class="text_color">Description</label>
              <textarea class="form-control text_box  box_shadow" name="description" rows="5" id="comment"></textarea>
             <?php echo form_error('description') ?>
              <p  class="text_color desc1">Please enter the details of your request and a member of our customer support staff will respond as soon as possible!</p>
              <p  class="text_color desc1"> Our customer support team is available Monday to Sunday from 8 AM - 4 PM UK Time.</p> 
         </div>
         
         <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="attachment1">
              <label class="form-check-label" for="attachment1" style="color:#5bc0de;">Want to attach some attachment</label>
        </div>
          
          
          <div class="form-group form_margin" id="attachment_div" style="display:none">
             <label class="text_color">Attachments</label>
             <input type="file" id="attachment_file" class="form-control-file  box_shadow" name="attachment[]" multiple>
                
         </div>
         
         
          <div class="form-group form_margin">
             <input type="submit" class="btn btn-info btn-lg" style="background: #5BC0DE;border-color:#5BC0DE"  value="Submit" id="submit_button" />
         </div>
         
         
    </form>
       
   </div>
             
</div>

<script>
    $(document).ready(function(){
     $('#attachment1').click(function(){
      if($(this).is(":checked"))
      {
          $("#attachment_div").show();
          $("#attachment_file").attr("required", "true");
      }else{
          $("#attachment_file").removeAttr('required')
          $("#attachment_div").hide();
      }
     });   
    });
</script>
<?php include("includes/front_end_footer.php");?>


