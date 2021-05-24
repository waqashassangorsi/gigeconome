<?php include("includes/fornt_end_header_customer.php");?>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .container-fluid{
        padding: 10px;
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
    
    #table_margin
    {
        margin-top: 44px
    }
    
    .btn_solved
    {
        background-color:#000000ab;
        color: white;
        border-radius: 5px;
    }
    
    .ticket_name{
        color:#5BC0DE ;
    }
    
    .questionsearch {
        list-style-type:none;
        box-shadow: -1px 0px 2px 1px;
      padding: 6px;
    }
 
 
 @media screen and (max-width: 764px) and (min-width:340px){

.invoicee_detailse_wapr{
        overflow-x: auto!important;
        width: 100%!important;
    }
    .invoicee_detailse{
        width: 693px!important;
        overflow-x: auto!important;
    }
    
    .search_headingnew{
        margin-top: 16px;
    }

}
</style>

<div class="container-fluid">
   
    
    <div class="container-fluid bg-white">
        <div class="container" style='min-height:500px'>
        
         <div class="row">
            <h1>My Request</h1>
         </div>
        
          <div class="row mt-4 request">
            <p>My Requests</p>
            <hr class="hr_line">
         </div>
          
          <!----search bar------------->
        
         <div class="row">
            <div class="col-sm-10 col-xs-12 search-heading" id="search_margin">
                <input type="text" placeholder="Search.." name="search" class="search1">
                <ul class="questionsearch" style="display:none">
                    <li></li>
                </ul>
            </div>
            <div class="col-sm-2 col-xs-12 search-heading  search_headingnew">
              <form action='' method="post" id='my_form_status'>
               <div class="form-group">
               <label for="sel1">Status</label>
                <select class="form-control on_status" name='my_status' id="sel1">
                  <option value="">Any</option>
                  <option value="close">Close</option>
                  <option value="open">Open</option>
               </select>
              </form>
              </div>
            </div>
         </div>
         
          <!----end search bar------------->
         
         <!----table------------->
        
         <div class="row invoicee_detailse_wapr" id="table_margin">
             
             <table class="table invoicee_detailse">
    <thead>
      <tr>
          <th>#Ticket</th> 
          <th>Reason</th> 
        <!--<th>Id</th>-->
        <th>Usertype</th>
        <!--<th>Created</th>-->
        <!--<th>Last activity</th>-->
        <th>Subject</th>
        <th>Status</th>
        <th>Attachments</th>
        <!--<th>Status</th>-->
      </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach($querydetail as $value) {
            $queryid=$value['id'];
            $questionid=$value['query_question_id'];
            $attach=$this->db->query("select * from query_attachments where query_id='$queryid'")->result_array();
              $attach1=$this->db->query("select * from query_attachments where query_id='$queryid'")->result_array()[0];
            $question=$this->db->query("select * from query_questions where id='$questionid'")->result_array()[0];
            $answer=$this->db->query("select * from query_answer where q_id='$queryid'")->result_array()[0];
            
            $stye = "";
            if($value['is_user_read'] == 'no'){
                $stye = 'style="background: #dddddd;font-weight: 600;color: black;"';
            }
            
        ?>
        
      <tr <?php echo $stye;?>>
         <td><a href="<?php echo SURL."ViewTicket/detail/".$queryid;?>" class="ticket_name"><?php echo $value["ticket_id"]?></a></td>
        <td><?php echo $question["question"]?></td>
        <!--<td>#930405</td>-->
        <td><?php echo $value["user_type"]?></td>
        <td><?php echo $value["subject"]?></td>
        <td id='on_status_value'><?php echo $value['query_status'];?></td>
           
           
  
         <?php if(!empty($attach1["attachments"])) {?>
         <td>
             <form  action="<?php echo SURL."ViewTicket/downloadfile";?>" method="post">
               
                  <?php       foreach($attach as $image){ ?>
                 <input type="hidden" value="<?php echo $image['attachments']; ?>" name="file2[]"> 
                 <?php } ?>
             <button type="submit" class="btn btn-default btn-sm">Download Attachments</button>
             </form>
             </td>
             
         <!--<input type="text" class="query_id <?php echo $value['id'] ?>" value="<?php echo $value['id'] ?>" style="display:none">-->
         
         <?php }else{ ?>
         <td>No Attachments</td>
         <?php } ?>
        <!--<td>1 day ago</td>-->
        <!--<td>20 hours ago</td>-->
      <!--<td><button class="btn_solved">solved</button></td>-->
      </tr>
      <?php } ?>
      <!--<tr>-->
      <!--  <td><a href="" class="ticket_name">Chat with Hassan Muhammad</a></td>-->
      <!--  <td>#930405</td>-->
      <!--  <td>1 day ago</td>-->
      <!--  <td>20 hours ago</td>-->
      <!--<td><button class="btn_solved">solved</button></td>-->
      <!--</tr>-->
      <!--<tr>-->
      <!-- <td><a href="" class="ticket_name">Chat with Hassan Muhammad</a></td>-->
      <!--  <td>#930405</td>-->
      <!--  <td>1 day ago</td>-->
      <!--  <td>20 hours ago</td>-->
      <!--<td><button class="btn_solved">solved</button></td>-->
      <!--</tr>-->
      
      <!-- <tr>-->
      <!--  <td><a href="" class="ticket_name">Chat with Hassan Muhammad</a></td>-->
      <!--  <td>#930405</td>-->
      <!--  <td>1 day ago</td>-->
      <!--  <td>20 hours ago</td>-->
      <!--<td><button class="btn_solved">solved</button></td>-->
      <!--</tr>-->
      
      <!-- <tr>-->
      <!--<td><a href="" class="ticket_name">Chat with Hassan Muhammad</a></td>-->
      <!--  <td>#930405</td>-->
      <!--  <td>1 day ago</td>-->
      <!--  <td>20 hours ago</td>-->
      <!--<td><button class="btn_solved">solved</button></td>-->
      <!--</tr>-->
    </tbody>
  </table>
  
        </div>
        
         
     </div>
        
  </div>
    
   
</div>

<script>
    $(document).ready(function(){
    /* $(".search1").keyup(function(){
        if($(".search1").val().length >2)
        {
            $(".questionsearch").show();
            var serachresult=$(".search1").val();
            $.ajax({
                url:"ViewTicket/searchdata",
                type:"POST",
                data:{serachresult : serachresult},
                success:function(html){
                    if(html)
                    {
                      $(".questionsearch").html('<a href="ViewTicket/detail">' + html + '</a>');   
                    }else
                    {
                     $(".questionsearch").html("<li>No Record</li>");    
                    }
                }
                
            });
            
        }else
        {
         $(".questionsearch").hide();   
        }
     });*/
     
     
     $(".search1").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
      
      
      $(".on_status").on("change", function() {
       $('#my_form_status').submit();
      });
      
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
     
    });
</script>

<script>
    $(document).ready(function(){
      $(".download_attach").click(function(){
      var query_id=$(this).data("id");    
           $.ajax({
            url: "<?php echo SURL."ViewTicket/downloadfile";?>",
          method:"POST",
          data:{query_id:query_id},
          success: function(html){
          }  
        });
      });  
    });
</script>
<?php include("includes/front_end_footer.php");?>