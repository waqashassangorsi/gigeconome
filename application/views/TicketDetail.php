<?php include("includes/fornt_end_header_customer.php");?>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .container-fluid{
        padding: 0;
    }

    .page_heading{
        margin-left: 30px;
        padding-top: 16px;
        font-size: 19px!important;
        font-weight: bold;
    }
    .profile_name{
        margin-left: -20px;
    }
    .gallery input{
        border-radius: 20px;
        padding: 17px;
    }
    .gallery{
        background-image: url("assets/images/1.jpg");
        height: 240px;
        padding: 0;
        margin: 0;
    }
    .search_page{
        width: 40%;
        margin: 111px auto;
    }
    .blog_dashborad{
        width: 90%;
        margin: 40px auto;
        margin-bottom: 100px;
    }
    .freelancer_btn{
        border: 1px solid #009247;
        padding: 15px;
        border-radius: 5px;
    }
    
    .freelancer_btn:hover{
        background: #009247;
        box-sizing: border-box;
        color: #fff;
    }
    
    
    .request
    {
        margin-top:25px;
    }
    
    .hr_line
    {
        margin-bottom: 20px
    }
    
    .search1{
        border-radius: 19px;
        width:100%;
       padding: 12px;
        border: 1px solid gainsboro;
    }
    
     .search-heading{
         float:left;
    }
    
    #search_margin
    {
        margin-top:16px
    }
   
   .wrapper
   {
       background-color: gainsboro;
       padding: 27px;
       
   }
   
   #request_button
   {
       margin-top:14px;
   }
   
   #request_p
   {
       float: right;
    margin-top: 45px;
    color: #009247;
   }
   
      .wrapper2
   {
      
      margin-top: 27px;
       
   }
   
   #user_name
   {
       padding:0px;
   }
   
   #chat1{
       margin-top: 32px;
   }
 
  #chat2{
       margin-top: 10px;
   }
   
   
    .wrapper3
   {
       background-color: gainsboro;
       padding: 21px;
       
   }
   
   .column_padd
   {
       margin-top:18px;
   }
   
   .wrapper3>ul li
   {
       list-style-type:none;
       display:inline;
   }
   
   .li_margin{
       margin-left:90px;
   }
   
   .li_margin2{
       margin-left:142px;
   }
 
 .li_margin3{
       margin-left:73px;
   }
   
   
   .li_margin4{
       margin-left:117px;
   }
   
   
   .li_margin5{
       margin-left:8px;
   }
   
   
   .li_margin6{
       margin-left:8px;
   }
   
   
   .li_margin7{
       margin-left:52px;
   }
 
 .hr_line1
 {
     margin-top: 29px;
    margin-bottom: 26px;
 }
 
 .user_div
 {
         margin-top: 38px;
 }
 
 .user_data_image
 {
    width: 40px;
    height: 40px;
    border-radius: 27px;
 }
 
 .viewticketdiv{
      padding:30px 0px;
 }
 
 @media screen and (max-width: 764px) and (min-width:340px){
.viewticketdiv{
          padding:0px;
       }
    
}

</style>

<div class="container-fluid">
   
  <?php 
$queryQuestion = $this->db->query("select * from query_questions where id = ".$question_dis['query_question_id'])->row();
    ?>
    <div class="">
        <div class="container" style='min-height:500px'>
        
        <h1 class="text-center"><?php echo $question_dis['subject'];?></h1>
         <div class="row">
            
            <div class="col-sm-12" style="padding:10px;background: white;margin-top:10px">
             <h4><strong>Ticket Number:</strong> <?php echo  $question_dis['ticket_id'];?></h4>
            </div>
            
            <div class="col-sm-12" style="padding:10px;background: white;margin-top:10px">
             <h4><strong>Question:</strong> <?php echo $queryQuestion->question;?></h4>
            </div>
              <div class="col-sm-12" style="padding:10px;background: white;margin-top:10px;margin-bottom:10px">
                   <h4><strong>Description:</strong> <?php echo $question_dis['description'];?></h4>
            </div>
        </div>
        <style>
  .attachment{
      overflow:hidden;
      background:whitesmoke;
      padding:0px 5px 9px 10px;
  }  
    .panel-body{
        max-height:600px;
        overflow:auto;
        background: whitesmoke;
    }
    .col-sm-11{
        padding-top:6px;
    }
</style>
<div class="panel-body">
    <?php 
    
    if(count($record_ans)  > 0){
    foreach($record_ans as $k=>$ans){ 
    $attach=$this->db->query("select * from query_ans_attachments where ans_id=".$ans['query_ans_id'])->result_array();
     $userdetails_sender = $this->db->query("select * from users where u_id=".$ans['send_id'])->result_array()[0];
     
     
     
         /*$tz = $this->session->userdata('timezone');
         $dt_obj = new DateTime($value['seen_date_time'] ,new DateTimeZone('UTC'));
         $dt_obj->setTimezone(new DateTimeZone($tz));*/
         //strtotime(date_format($dt_obj, 'Y-m-d H:i:s')
        
         $time =  $this->check->timeAgo(strtotime($ans['datetime'])); 
     
    ?>
   
    <div class="row" style="margin-bottom:15px;padding:9px;background:white">
        <div class='col-sm-1 text-center'>
            <img src="<?php echo base_url().$userdetails_sender['dp'];?>" class="img img-circle img-thumbnail" width="60px">
        </div>
   
        <div class='col-sm-11'>
            <p style='color:#249ab6;font-weight:600'><?php echo ucfirst($userdetails_sender['f_name'])." ".ucfirst($userdetails_sender['l_name']);?> <span class="pull-right"><?php echo $time; ?></span></p>
            <p><?php echo $ans['content'] ?></p>
            
            <?php if(count($attach) > 0){ 
            
            ?>
            <div class="attachment">
                      <h4>Attachments:</h4>
                      <?php foreach($attach as $attchment){ ?>
                       <p class="filename">
                       <?php echo $attchment['attachment_name'];?>
                      </p>
    
                      <?php } ?>
                          
                      
                      <form action="<?php echo base_url();?>ViewTicket/downloadfile" method="post">
                    <?php foreach($attach as $att){ ?>
                        <input type="hidden" value="<?php echo $att['attachment_name'];?>" name="file2[]"> 

                      <?php } ?>
                      <div class="pull-right">
                      <button type="submit" class="btn btn-primary btn-sm btn-flat">Download</button>
                     </form>
                    </div>
                 </div>
                <?php } ?>
        </div>
    </div>
    <?php } }else{?>
        <div class="col-sm-12 text-center">
            <h2>No Replied Yet!</h2>
        </div>
    <?php } ?>
</div>


<div class="panel-footer" style='overflow:hidden'>
    <?php if($question_dis['query_status'] == 'open'){ ?>
    <form action="<?php echo base_url();?>ViewTicket/replyuser" method="post" enctype='multipart/form-data'>
    <input type='hidden' name='queryid' value="<?php echo $query_id;?>">
    <input type='hidden' name='senderid' value="<?php echo $myuser['u_id'];?>">
    <input type='hidden' name='user' value="1">
   <textarea class="form-control" required name="admin_reply" rows="5" placeholder="Write your reply...."></textarea>
   <input type='checkbox' value='closed' name='query_status'> Check to Close the Query<br>
   <div class='col-sm-6' style='padding:0px;margin-top:6px'>
   <input type="file" id="attached_file" name="attachment[]" multiple class='hidden' >
    <label for="attached_file" style='    background: #1eb3dc;padding: 6px 15px; color: white;'> Attach files</label>
   <div class="attach_waper"style="color:#428bca;padding: 10px;" ></div>  
    </div><div class='col-sm-6'><button type='submit' class='btn btn-primary pull-right'> Send </button></div>
    </form>
    <?php }else { ?>
    
    <p class='text-center'> Query Closed </p>
    
    <?php } ?>
    
</div>
  
         </div>
        
        <!--
         <div class="row">
            <h1>Chat with Hassan Muhammad</h1>
         </div>
        --
      
       <div class="row">
        <div class="col-sm-8">
             <hr class="hr_line">
        
        <?php 
        if($record_ans['ans_status'] != ""){
        if($record_ans['ans_status'] == 'satisfied' )
        {
        ?>
         <div class="col-sm-12 wrapper3">
            <h3>This Request has been rated as:</h3>
            <button id="request_button" class="btn btn-primary">Good,I'm satisfied</button>
            <!-- <p id="request_p">Change my rating</p> -->
          </div> 
          <?php }else{?>
            <div class="col-sm-12 wrapper3">
            <h3>This Request has been rated as:</h3>
            <button id="request_button" class="btn btn-danger">Sorry,I'm not satisfied</button>
            <!-- <p id="request_p">Change my rating</p> --
          </div>
          <?php } }?>
          <?php 
          {
             $datarecord= $question_dis['u_id'];
          $datarecord1 = $this->db->query("select * from users where u_id='$datarecord'")->row();
          
          
          }
          ?>
           <div class="col-sm-12 user_div">
             <div class="col-sm-1">
               <!--<i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>--
               <img class="user_data_image" src="<?php echo $datarecord1->dp ?>">
             </div>
             <div class="col-sm-11" id="user_name">
               <p><?php echo $datarecord1->f_name." ".$datarecord1->l_name;?></p>
               <p><?php $timestamp = strtotime($record_ans['datetime_query']); echo date('H:i A , d M Y',$timestamp);?></p>
             </div>
           </div>

           <div class="col-sm-12" id="chat1">
                 <p>Char started:2020-08-24 07:51 AM UTC</p>
           </div>
              
          <div class="col-sm-12" id="chat2">
              <?php 
              $question_id=$question_dis['query_question_id'];
              $question1= $this->db->query("select * from query_questions where id='$question_id'")->row(); 
              ?>
             <p><strong>Reason : <?php echo $question1->question ?> </strong> </p>
             <p><strong>Subject : <?php echo $question_dis["subject"] ?> </strong> </p>
             <p><strong>Description : <?php echo $question_dis["description"] ?> </strong> </p>
             
             <?php if($record_ans['answer'] != ""){ ?>
                 
                 
             <p> <strong>Ans : </strong> <?php echo $record_ans['answer'];?> </p>
             
              <?php if($record_ans['ans_status'] == ""){ ?>
              <button type="button" class="btn btn-success satisfied" data-qid="<?php echo $record_ans['id'];?>"> Satisfied </button>
              <button type="button" class="btn btn-danger not_satisfied"> Not Satisfied </button>
                
             <?php } }else{ ?>
             
              <p style='color:red'> <strong>Sorry! Not replied yet! Please Wait we will get you asap.</strong> </p>
             
             <?php } ?>
            
             
          </div>
          
           <?php if($record_ans["admin_reply"]!=""){ ?>
           
          <div class="col-sm-12" id="reply_to_ans1">
              <h3> Admin Reply </h3><br>
        
                <div class="form-group">
                  <label for="comment">Admin Answer:</label>
                  <textarea class="form-control" name="reply_customer1" rows="5" id="comment1" disabled><?php echo  $record_ans["admin_reply"] ?></textarea>
                </div>
          </div>
           <?php } ?>
          <div class="col-sm-12" id="reply_to_ans" style="display:none">
              <h3> Respond To Answer </h3><br>
              <form action='ViewTicket/customer_reply' method="post">
                  <!--<div class="form-group">
                    <label class="radio-inline">
                      <input type="radio" name="optradio">Solved
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optradio">Not Solved
                    </label>
                  </div>--
                
                <div class="form-group">
                  <label for="comment">Reply To Answer:</label>
                  <textarea class="form-control" name="reply_customer" rows="5" id="comment"></textarea>
                </div>
                  
                 <div class="form-group">
                     <input type='hidden' name="q_id" value="<?php echo $record_ans['id'];?>">
                    <input type="submit" name="reply" value="Reply" class="btn btn-success">
                 </div>              
              </form>
              
          </div>
           
        </div>
          <div class="col-sm-4">
            <div class="row wrapper3">
                
                <ul>
                    <li>Requester</li>
                     <li class="li_margin"><?php echo $user['f_name']." ".$user['l_name'];?></li>
                </ul>
                
                
                <ul>
                    <li>Created</li>
                     <li class="li_margin"><?php $timestamp = strtotime($record_ans['datetime_query']); echo date('H:i A , d M Y',$timestamp);?></li>
                </ul>
                
                  <ul>
                    <li>Last Actviity</li>
                     <li class="li_margin3"><?php $timestamp = strtotime($record_ans['datetime_query']); echo date('H:i A , d M Y',$timestamp);?></li>
                </ul>
                
                <hr class="hr_line1">
                
                <ul>
                    <li>Assigned to</li>
                     <li class="li_margin">Nikoalas</li>
                </ul>
        
        
                  <ul>
                    <li>Id</li>
                     <li class="li_margin2">#930405</li>
                </ul>
                
                <?php 
                    if($record_ans['ans_status'] == 'satisfied')
                    { ?>
        
                  <ul>
                    <li>Status</li>
                     <li class="li_margin4"><button class="btn- btn-success">Closed</button></li>
                </ul>
                
                <?php }else{ ?>
                
                <ul>
                    <li>Status</li>
                     <li class="li_margin4"><button class="btn- btn-danger">Open</button></li>
                </ul>
                
                <?php } ?>
                
                  <?php if($record_ans['user_type'] == "Freelancer"){ ?>
                  
                  <ul>
                    <li>What type of user are you?</li>
                  
                     <li class="li_margin5">I am a freelancer</li>
                     
                    
                </ul>
                
                 <ul>
                    <li>Freelancer contact reason</li>
                     <li class="li_margin6"><?php echo $record_ans['description'];?></li>
                </ul>
                 <?php }else{?>
                 <ul>
                    <li>What type of user are you?</li>
                  
                     <li class="li_margin5">I am a Buyer</li>
                </ul>
                  <ul>
                    <li>Buyer contact reason</li>
                     <li class="li_margin7"><?php echo $record_ans['description'];?></li>
                </ul>
                <?php } ?>
               
               
            </div>
          </div>
      </div>-->
        
         
     </div>
        
  </div>
    
   
</div>

<?php  include("includes/front_end_footer.php");?>
<script>
    
    $(document).ready(function(){
        
       $(document).on('click','.not_satisfied',function(){
           
           $('#reply_to_ans').slideDown("slow");
           
           
           
           
       });
       
       $(document).on('click','.satisfied',function(){
           var q_id = $(this).data('qid');
           var element = $(this);
              $.ajax({
                  url: "ViewTicket/updated_status",
                  cache: false,
                  type: "POST",
                  data: {'q_id' : q_id},
                  beforeSend: function(){
                      element.html('Satisfied <i class="fa fa-spinner fa-spin"></i>');
                  },
                  success: function(html){ 
                      if(html.error){
                          alert("Please Try Later");
                      }else{
                          element.html('Satified');
                          
                          window.location.href= "<?php echo SURL;?>ViewTicket";
                      }
                      
                  }
                });
           
           
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
       
       $('#attached_file').change(function(){
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
        
        
    });
    
    
    
</script>