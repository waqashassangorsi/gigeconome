
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
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>



<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Joining date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($freelancers)){ 
					
				foreach ($freelancers as $key=>$value) {
						
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['u_id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo ucwords($value['f_name']." ".$value['l_name']); ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['Joining_date']; ?></td>
			
					<td class="center">
						<?php if($value['can_login'] == "0"){ 
							$status = "Active";
						?>
						<a href="javascript:void(0)" data-id1="<?php echo $value['u_id']; ?>" class="btn btn-info btn-sm inactive">
					
							<?php echo $status; ?>
						</a>
						<?php	
							
							}
							else{ 
						?>
							<a href="javascript:void(0)" data-id1="<?php echo $value['u_id']; ?>" class="btn btn-danger btn-sm active">
						
							<?php echo $status = "InActive";; ?>
							</a>
						<?php		
							}
						?>
						
						<form action="<?php echo SURL.'Newlogin/now'?>" method="post" target="_blank">
						    <input type="hidden" name="u_id" value="<?php echo $value['u_id'];?>"/>
						    <input class="btn btn-danger" type="submit" value="Login" name="submit"/>
						</form>
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>

<script type="text/javascript">
	$(document).on('click','.active',function(){
	    
		var id = $(this).data("id1");
		
		var r=confirm("Are you sure you want to make this freelancer Inactive?");
		if(r==true){
		    window.location.href="<?php echo SURL.'Clients/active/';?>"+id;
		}else{
		    
		}
		
		
	});
	
	$(document).on('click','.inactive',function(){
	    
		var id = $(this).data("id1");
		
		var r=confirm("Are you sure you want to make this freelancer Active?");
		if(r==true){
		    window.location.href="<?php echo SURL.'Clients/inactive/';?>"+id;
		}else{
		    
		}
		
		
	});
</script>



<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
	});
</script>



<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>


