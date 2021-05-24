<div class="row wrpr_singl_msg" id="msg_wapr_<?php echo $value['msg_id'];?>" data-id1="<?php echo $value['msg_id'];?>">
    <div class="col-md-6 col-sm-7 col-xs-11 receive_chat">
        <h6><?php
                         $tz = $this->session->userdata('timezone');
                         $dt_obj = new DateTime($value['date'] ,new DateTimeZone('UTC'));
                         $dt_obj->setTimezone(new DateTimeZone($tz));
                         
        echo date_format($dt_obj, 'd M Y, h:i a')." -- ";
        echo $this->check->timeAgo(strtotime(date_format($dt_obj, 'Y-m-d H:i:s')));?></h6>
        <?php if(!empty($value['service_requiremnt'])){?>
         <p><?php echo $value['service_requiremnt'];?></p>
        <?php }else{?>
        <p><?php echo $value['content'];?></p>
        <?php } ?>
        <?php 
        $myattachedfiles = $this->db->query("select * from msgs_files where msg_id='".$value['msg_id']."'")->result_array();
        
        if(!empty($myattachedfiles)){
        ?>
        <h5>Attachments</h5>
            <?php		
    			foreach ($myattachedfiles as $key => $files) {
    				
    				if(!empty($files)){
    
    				$filescan = (pathinfo( $files['file'])); 
    				//var_dump($filescan);  
    				if(in_array($filescan['extension'],array("Jpg","jpg","Jpeg", "png") )){
    					$filetypee = "Image";
    				}else{
    					$filetypee = "File";
    				}
    
    
    					
    		?>
    		<div id="overlay"></div>
            <div style="padding:0 0 10px 0;">
    			<?php if($filetypee == "Image"){?>
    			<a href='<?php echo SURL.$files['file'];?>' data-lightbox="gallery" class='demo1'>
    			<img src="<?php echo SURL.$files['file'];?>" class="imgshow" style="width:100%;max-width:300px"></a>
    			<?php } ?>
    			
    			<?php if($filetypee == "File"){?>
    			<div>
    			    <a style="background: none;color: black;border: none;text-decoration: underline;" href="<?php echo SURL."Inbox/downloadfilefeed/".$files['id'];?>"><?php echo $filescan['basename'];?></a>
    			</div>
    			
    			<?php } ?>
    
    		</div>	
        <?php }}} ?>    
            <!--<h5>Seen 9 minutes ago</h5>-->
        <!--</div>-->
    </div>
</div>