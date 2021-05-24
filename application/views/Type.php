<?php include("includes/fronthead.php");?>

<style>
    .wrpr{
        width: 350px;
        background: white;
        border: 1px solid #ccc;
        margin: 0 auto;
        margin-top: 10%;
    }
</style>
<body>
    <div class="row wrpr">
        <h1 style="text-align:center;margin-bottom:30px;">Join</h1>
        <form  method="post" action="<?php echo SURL."Type"?>" class="form-group col-xs-6" style="text-align:center;">	
			          
          <button class="btn btn-lg btn-info" name="status" value="Buyer" style="padding: 5px 30px 5px 30px;">As a Buyer</button>
        </form>
        <form method="post" action="<?php echo SURL."Type"?>" class="form-group col-xs-6" style="text-align:center;"> 
                 
          <button class="btn btn-lg btn-primary" name="status" value="User" style="padding: 5px 30px 5px 30px;">As a Seller</button>
        </form>
    </div><!-- /.job-box -->	


<?php include("includes/modalboxalert.php");?>