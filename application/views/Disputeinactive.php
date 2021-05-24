
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>
<style>
    .autoShowHide {
     overflow: hidden;
    width: 20%;
    text-overflow: ellipsis;
    white-space: nowrap;
}

</style>
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
					<b><?php echo $Newcaption;?></b>
				</div>
				
			
</div>
			



<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Email</th>
			<th>Type</th>
			<th>Reason</th>
			<th>Subject</th>
			<th>Description</th>
			<th>Date</th>
			<th>Image</th>
			<th>Type</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($disputes)){ 
					
				foreach ($disputes as $value) {
                    $disputeid=$value['dsipute_id'];
                $disput_attachemts=$this->db->query("select * from disputes_files where dsipute_id='$disputeid'")->result_array();  
                   $disput_attachemts1=$this->db->query("select * from disputes_files where dsipute_id='$disputeid'")->result_array()[0];
        ?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['user_type']; ?></td>
					<td><?php echo $value['reason']; ?></td>
					<td><?php echo $value['subject']; ?></td>
					<td class="autoShowHide"><?php echo $value['description']; ?></td>
					<td><?php echo $value['date']; ?></td>
					
						<td>
					    <?php if($disput_attachemts1["file"]!=''){?>
					    <form action="<?php echo base_url()?>Disputeactive/downloadfile" method="post">
					    <?php foreach($disput_attachemts as $disput_atta){ ?>
					     <input type="text" name="file2[]" value="<?php echo $disput_atta['file']?>" style="display:none">
					     <?php } ?>
					  <button type="submit" class="btn btn-success">Download</button>
					    <?php } else{?>
					    <p>No attachment</p>
					    <?php }?>
					    </form>
					</td>
					
					<td><?php if($value['type']=="job"){ ?>
					 <a href="job" class="btn btn-default">View Stream</a>
					   <?php }else{?>
					   <a href="service" class="btn btn-default">View Stream</a>
					   <?php } ?>
					</td>

				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>


<script type="text/javascript">
	$(document).on('click','.dlt',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to delete?");
		if(response == true){
			window.location.href = "<?php echo SURL;?>Configuration/delete/"+id;
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


