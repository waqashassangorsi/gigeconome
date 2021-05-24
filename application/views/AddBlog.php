
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
		<b>Add Blog</b>
	</div>
				
</div>

<script src="assets/js/select2/select2.min.js"></script>
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">

<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url();?>Blogsetting/Addcategory" class="form-horizontal form-groups-bordered" enctype='multipart/form-data'>
					
		<div class="form-group">
			<label class="col-sm-3 control-label">Heading</label>
			
			<div class="col-sm-5">
				
			<input type="text"  name="heading" value="<?php echo $record->blogheading?>" class="form-control" id="field-1" placeholder="Enter Blog Heading" required>	
			</div>
		</div>

		<?php if(isset($record)){ ?>
			<input type="hidden" value="<?php echo $record->id;?>" name="edit"/>	
		<?php } ?>

	
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Date</label>
			
			<div class="col-sm-5">
				<input type="date" value="<?php echo $record->date?>" name="date" class="form-control" id="field-1" placeholder="Enter Date" required>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Author Name</label>
			<div class="col-sm-5">
		       	<input type="text" name="author" class="form-control" value="<?php echo $record->author?>" id="field-1" placeholder="Enter Author Name" required>
			</div>
		</div>
		
			
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Description</label>
			<div class="col-sm-5">
			<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"> <?php echo ($record->blogdescription); ?></textarea>
			</div>
		</div>
		
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Upload Picture</label>
		    
		    <div class="col-sm-5">
		         
				<div class="col-sm-12" style="clear:both;">
							
					<input type="file" class="form-control file2 inline btn btn-primary" name="files" accept="image/*" multiple="1" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
					
				</div>
			</div>
			
		</div>
		
		<?php if(isset($record)){ ?>
		<div class="form-group">
			<div class="col-sm-5 text-center">
		         
				<div class="col-sm-12" style="clear:both;">
							
				 <img style="width:57%" src="<?php echo $record->image?>">
					
				</div>
			</div>
		</div>
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
 
 <script>
	CKEDITOR.replace('exampleFormControlTextarea1');
</script>



		
			
			