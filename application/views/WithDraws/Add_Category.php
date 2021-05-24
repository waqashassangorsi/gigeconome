
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>
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
					<b><?php echo $Controller_name;?></b>
				</div>
				
</div>

<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url();?>Price" class="form-horizontal form-groups-bordered">
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Name</label>
			
			<div class="col-sm-5">
				<input type="text" readonly value="<?php echo $record['name'] ?>" name="name" class="form-control" id="field-1" placeholder="Enter Name" required>
			</div>
		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Price</label>
			
			<div class="col-sm-5">
				<input type="text" value="<?php echo $record['price'] ?>" name="price" class="form-control" id="field-1" placeholder="Enter Name" required>
				<?php if($record['name']=="Project Deduction fee"){?>
				<h6 class="text-danger">Entered amount will be in %.Skip the % while writing.</h6>
				<?php } ?>
			</div>
		</div>

		<?php if(!empty($record['id'])){ ?>
			<input type="hidden" value="<?php echo $record['id'];?>" name="edit"/>	
		<?php } ?>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="Submit" name="Submit" class="btn btn-red">Save</button>
			</div>
		</div>
	</form>

				
</div>
		

<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>



		
			
			