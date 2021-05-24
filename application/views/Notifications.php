<?php include("includes/front_end_header.php");?>
<style>
    .notification{
        padding-bottom: 20px;
    }
    .notification h4{
        color: #46a049;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .first_noti{
        background: #F5F5FB;
        padding: 0px 0px;
        font-size: 13px;
    }
    .first_noti p{
        font-weight: bold;
        color: #000!important;
        padding-top: 9px;
    }
    .first_noti .glyphicon{
        color: #f2b408!important;
        cursor: pointer;
    }
   
    
    .second_noti{
        padding: 0px 0px;
        font-size: 13px;
        margin-top: 10px;
        
    }
    .second_noti p{
        font-weight: bold;
        color: #000!important;
        padding-top: 9px;
    }
    .second_noti .glyphicon{
        color: #f2b408!important;
        cursor: pointer;
        font-weight: normal;
    }
    .remve_icon{
        padding-top: 10px;
    }
    
    .dltnotipication
    {
        cursor:pointer;
    }
</style>

<div class="container-fluid notification">
    
    <div class="row ">
        <div class="col-md-1 col-sm-1 hidden-xs"></div>
           <?php if(!empty($mynotifications)){ ?>
        <div class="col-md-8 col-sm-10 col-xs-12">
            <h4>All Notifications</h4>
           <?php 
                foreach($mynotifications as $key=>$value){
            ?>
            <div class="row first_notit_<?php echo $value['noti_id'];?>">
                <div class="col-xs-11">
                    <a href="<?php echo $value['link'];?>"><p><?php echo $value['notification'];?></p></a>
                     <h6><?php echo $this->check->timeAgo(strtotime($value['noti_date'])) ?></h6>
                </div>
                <div class="col-xs-1 remve_icon text-right">
                    <i class="glyphicon glyphicon-remove dltnotipication" data-id="<?php echo $value['noti_id'];?>"></i>
                </div>
            </div>
        <?php }}else{ ?>
                <?php include('includes/RecordNotfound.php'); ?>
            <?php } ?>
        </div>
        <div class="col-md-1 col-sm-1 hidden-xs"></div>
    </div>
</div>


<script>
    $(document).on('click','.dltnotipication',function(){
       var id = $(this).data("id");
       
       var confirm_msg =  confirm('Are you sure you want to delete this Notifications?');
        if(confirm_msg == true){
                
                var notipicationid = $(this).data("id");
               
                $("#notipicationcont_"+notipicationid).remove();
                $.ajax({
                  url: "Notifications/deleteNotipication",
                  cache: false,
                  type: "POST",
                  data: {notipicationid : notipicationid},
                  success: function(html){ 
                      
                  }
                });
          
          
        }
    });
</script>
<?php include("includes/front_end_footer.php");?>
