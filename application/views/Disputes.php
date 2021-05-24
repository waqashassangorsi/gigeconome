
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
			<th>Job title</th>
			<th>User Type</th>
			<th>Email</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($disputes)){ 
					
				foreach ($disputes as $key=>$value) {
					$title = $this->db->query("select jobs.title from msgs inner join jobs on jobs.job_id=msgs.job_id where msg_id='".$value['msg_id']."'")->result_array()[0]['title'];
						
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo ucfirst($title); ?></td>
					<td><?php echo $value['user_type']; ?></td>
					<td><?php echo $value['email']; ?></td>
			
					<td class="center">
						
						<a href="<?php echo SURL."Disputes/view/".$value['id'];?>" class="btn btn-info btn-sm btn-icon icon-left">
							
							View
						</a>
			
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>

<script type="text/javascript">
	$(document).on('click','.dlt',function(){
		var id = $(this).data("id1");
		var status = $(this).data("id2");
		if(status == "Block"){
			var response = confirm("Are You sure you want to block this user?");
		}else{
			var response = confirm("Are You sure you want to Active again this user?");
		}
		
		if(response == true){
			$.ajax({
			  
			   url:"<?php echo SURL;?>Freelancers/delete",  
			   method:"POST",  
			   data:{id:id,status:status},  
			   dataType:"text",  
			   success:function(data){
			   		alert(data);
					// $("#row_"+id).remove();
			   				
				}
			});
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


