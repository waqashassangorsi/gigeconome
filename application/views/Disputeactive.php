
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
			<th>Attachments</th>
			<th>Type</th>
			<th>Review</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($disputes)){ 
					
				foreach ($disputes as $value) {
				     $disputeid=$value['dsipute_id'];
				    $jobid=$value['job_id'];
				    $service_p_id=$value['service_p_id'];
				    
				    $userdata=$value['u_id'];
				    
                $disput_attachemts=$this->db->query("select * from disputes_files where dsipute_id='$disputeid'")->result_array();  
                $disput_attachemts1=$this->db->query("select * from disputes_files where dsipute_id='$disputeid'")->result_array()[0];
                
                $userdata=$this->db->query("select * from users where u_id='$userdata'")->result_array()[0];
                //var_dump($userdata);
                
                $servicedata=$this->db->query("select * from services_purchased join services on services.service_id = services_purchased.service_id  where services_purchased.id='$service_p_id'")->result_array()[0];
                $jobdata=$this->db->query("select * from jobs where job_id='$jobid'")->result_array()[0];
                 
                
             
        ?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['user_type']; ?></td>
					<td><?php echo $value['reason']; ?></td>
					<td>dispute</td>
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
					 <a href="<?php echo base_url();?>Chat/viewChat/<?php echo $userdata['username']?>/<?php echo $jobdata['job_slug']?>/<?php echo $disputeid?>" class="btn btn-default">View Stream</a>
					 
					   <?php 
					    }else{
					        
					        $service_purcahsed_data = $this->db->query("select * from services_purchased where id='".$value['service_p_id']."'")->result_array()[0];
					        if($service_purcahsed_data['service_owner_id']==$value['u_id']){
					            $otherparty = $service_purcahsed_data['who_purchased'];
					        }else{
					            $otherparty = $service_purcahsed_data['service_owner_id'];
					        }
					   ?>
					   <a href="<?php echo base_url();?>ChatServices/viewChat/<?php echo $value['u_id']."/".$servicedata['service_slug']."/".$disputeid."/".$otherparty."?id=".$service_p_id;?>" class="btn btn-default">View Stream</a>
					  
					   <?php } ?>
					</td>
					
					<td>
					    <?php if($value['type']=="job"){ ?>
					    
					      <?php if($value['is_resolved']=="Yes"){?>
					      <p>Status Closed</p>
					      <?php }else{?>
					      <a href="<?php echo base_url();?>Disputeactive/resolved/<?php echo $value['dsipute_id']?>" class="btn btn-info">Review</a>
					      <?php }?>
					      
					    
					    <?php }else{?>
					     <?php if($value['is_resolved']=="Yes"){?>
					      <p>Status Closed</p>
					      <?php }else{?>
					      <a href="<?php echo base_url();?>Disputeactive/resolved/<?php echo $value['dsipute_id']?>" class="btn btn-info">Review</a>
					      <?php }?>
					    <?php }?>
					</td>

				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>





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


