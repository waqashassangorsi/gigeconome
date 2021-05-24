<div class="col-md-4 col-sm-6 col-xs-12 mt-2">
    <?php 
        if($this->router->fetch_class()=="Buyerdashboard"){
        
            if($myuser['user_status']=="User"){
    ?> 
                <a class="btn btn-success button_dashboard" href="<?php echo SURL.'/Freelancerdash';?>">Switch to Freelancer Dashboard</a>
    <?php   }
    }else{ 
        if($myuser['user_status']=="User"){
    ?>
            <a class="btn btn-success button_dashboard" href="<?php echo SURL.'/Buyerdashboard';?>">Switch to Buyer Dashboard</a>
    
    <?php }} ?>
</div>