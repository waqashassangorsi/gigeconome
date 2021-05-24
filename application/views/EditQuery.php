
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
	<style>
    .glyphicon-remove{cursor: pointer; }
</style>	

<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<li>			
		<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>
	</li>
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b> (<?php echo $record->subject?>)</b>
	</div>
				
</div>
<?php


$queranswer = $this->db->query("select * from query_answer where q_id = ".$record->id)->result_array();

$queryData = $this->db->query("select * from query where id = ".$record->id)->result_array()[0];

$attach = $this->db->query("select * from query_attachments where query_id = ".$record->id)->result_array();
//var_dump($attach);
$queryQuestion = $this->db->query("select * from query_questions where id = ".$record->query_question_id)->row();

?>
<script src="assets/js/select2/select2.min.js"></script>
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">
<style>
  .attachment{
      overflow:hidden;
      background:#f1f1f1;
      padding:0px 5px 9px 10px;
  }  
    .panel-body{
        max-height:600px;
        overflow:auto;
    }
    .col-sm-11{
        padding-top:6px;
    }
    
    .querydata
    {
        margin-bottom:20px;
    padding: 10px;
    box-shadow: 13px 0px 7px 0px;
    border-radius:13px;
    border:1px solid grey;
        
    }
</style>
<div class="panel-body">
    <div class="row">
        <div class="col-sm-12 querydata">
            <h4><b>Reason:</b></h4><p><?php echo $queryQuestion->question?></p>
            <h4><b>Description:</b></h4><p><?php echo $record->description?></p>
        </div>
    </div>
    
     
       <?php foreach($queranswer as $querdata){ 
          
            //$attach=$this->db->query("select * from query_ans_attachments where ans_id=".$querdata['query_ans_id'])->result_array();
            $userdetails_sender = $this->db->query("select * from users where u_id=".$querdata['send_id'])->result_array()[0];
              $time =  $this->check->timeAgo(strtotime($querdata['datetime']));
       ?>
       
    <div class="row" style="margin-bottom:15px;">
        <div class='col-sm-1 text-center'>
            <img src="<?php echo base_url().$userdetails_sender['dp'];?>" class="img img-circle img-thumbnail" width="60px">
        </div>
   
        <div class='col-sm-11'>
            
            <p style='color:#249ab6;font-weight:600'><?php echo ucfirst($userdetails_sender['f_name'])." ".ucfirst($userdetails_sender['l_name']);?></a>  <span class="pull-right"><?php echo $time; ?></span></p>
          
            <p><?php echo $querdata['content'] ?></p>
        
      

        </div>
            
    </div>
    <?php }?>
    
    
     <?php  if(count($attach) > 0){ 
            ?>
            <div class="attachment" style="margin-bottom:10px;">
                      <h4>Attachments:</h4>
                      <?php foreach($attach as $attchment){ 
                     
                      ?>
                       <p class="filename">
                       <?php echo $attchment['attachments'];?>
                      </p>
    
                      <?php } ?>
                          
                      
                      <form action="https://surfnwork.com/ViewTicket/downloadfile" method="post">
                    <?php foreach($attach as $att){ ?>
                        <input type="hidden" value="<?php echo $att['attachments'];?>" name="file2[]"> 

                      <?php } ?>
                      <div class="pull-right">
                      <button type="submit" class="btn btn-primary btn-sm btn-flat">Download</button>
                     </form>
                    </div>
                 </div>
                <?php } ?>
         
  
</div>




<div class="panel-footer" style='overflow:hidden'>
     <?php if($queryData['query_status'] == 'open'){ ?>
    <form action="<?php echo base_url();?>Displayquery/replyuser" method="post" enctype="multipart/form-data">
    <input type="hidden" name="senderid" value="<?php echo $record->u_id ?>"> 
     <input type="hidden" name="queryid" value="<?php echo $record->id ?>"> 
     <textarea required class="form-control" name="admin_reply" rows="5" placeholder="Write your reply...."></textarea><br>
     <input type='checkbox' value='closed' name='query_status'> Check to close the Ticket
    <input type="file" id="attached_file" name="newattachment[]" multiple class='hidden'>
    <div class="col-sm-12" style="margin-top:10px;">
        <label for="attached_file" style='background: #1eb3dc;padding: 6px 15px; color: white;'  class="custom-file-upload ">Attach File</label>
       <!--<button class='btn btn-success pull-left'> Attach Files</button>-->
       <button type="submit" class='btn btn-primary pull-right'> Send </button>
   </div>
   <div class="col-sm-12">
                        <div class="attach_waper"style="color:#428bca;padding: 10px;" ></div>  
    </div>
    
</form>	
 <?php }else { ?>
    
    <p class='text-center'> Query Closed </p>
    
    <?php } ?>


</div>


	


<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>
 
 <script>
	CKEDITOR.replace('exampleFormControlTextarea1');
	
	  $(document).ready(function(){

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
                      $('.attach_waper').append("<div style='display:inline-block'><i class='glyphicon glyphicon-paperclip' style='color:#428bca!important;'></i> "+fileName + ' <i class="glyphicon glyphicon-remove remove_file" style="color:red;cursor:pointer" data-file="'+fileName+'" ></i> , </div> ');
                    }
                }
            });
        
        
    });
    
	
</script>



		
			
			