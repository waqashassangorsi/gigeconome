
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
		
<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url();?>Recommend_offers" class="form-horizontal form-groups-bordered">
		
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Freelancers</label>
			
			<div class="col-sm-5">
				<select class="form-control" name="freelancers[]" multiple>
				    <?php 
				        foreach($services as $key=>$value){
				            
				    ?>
				    <option value="<?php echo $value['service_id'];?>"><?php echo ucwords($value['title']);?></option>
				    <?php } ?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="Submit" name="Submit" class="btn btn-red">Save</button>
			</div>
		</div>
	</form>

				
</div>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($recommende_Services)){ 
					
				foreach ($recommende_Services as $value) {
						
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['service_id'];?>">
					<td><?php echo $i;?></td>
					
					<td><?php echo ucwords($value['title']); ?></td>
			
					<td class="center">
						<a href="Recommend_offers/delete/<?php echo $value['recommend_id'];?>" data-id1="<?php echo $value['recommend_id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left dlt">
							
							Delete
						</a>
						
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>

<script>
    $(document).on('click','.dlt',function(){
        var r = confirm("Are you sure you want to delete it?");
        if(r==true){
            
        }else{
            return false;
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


