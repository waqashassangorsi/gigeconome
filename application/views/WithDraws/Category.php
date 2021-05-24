
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
			<th>User name</th>
			<th>Status</th>
			<th>Withdrawl Amount Requested</th>
			<th>Account</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($withdraws)){ 
					
				foreach ($withdraws as $value) {
					
					$user_record = $this->db->query("select * from users where u_id='".$value['u_id']."'")->result_array()[0];
					if($value['status']=="Approved"){
					    $whatsstatus = "Approved";
					}else if($value['status']=="Pending"){
					    $whatsstatus = "Pending";
					}else if($value['status']=="Not Approved"){
					    $whatsstatus = "Pending";
					}
					
				// 	if($value['withdraw_method']=="paypal_account"){
				// 	    $withdrawlacct = "Paypal";
				// 	}else if($value['withdraw_method']=="paypal_account"){
				// 	    $withdrawlacct = "Paypal";
				// 	}else if($value['withdraw_method']=="paypal_account"){
				// 	    $withdrawlacct = "Paypal";
				// 	}
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo ucwords($user_record['f_name']." ".$user_record['l_name']); ?></td>
					<td><?php echo $whatsstatus; ?></td>
					<td><?php echo $value['amount']; ?></td>
					<td><?php echo $value['withdraw_method']; ?></td>
			        <td><?php echo $value['date']; ?></td>
					<td class="center">
					    
					    <?php if($value['status']=="Pending"){ ?>
						<a href="javascript:void(0)" data-id1="<?php echo $value['id'];?>" class="btn btn-info btn-sm apprve btn-icon icon-left">
							Approve
						</a>
						
						<a href="javascript:void(0)" data-id1="<?php echo $value['id'];?>" class="btn btn-danger btn-sm reject btn-icon icon-left">
							Reject
						</a>
						
						<?php } ?>
						
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>


<script type="text/javascript">


$(document).on('click','.apprve',function(){
    var id1 = $(this).data("id1");
   
    var r = confirm("Are you sure you want to approve this?");
    if(r==true){
        window.location.replace('WithDraws/approve/'+id1);
    }
    
});


$(document).on('click','.reject',function(){
    var id1 = $(this).data("id1");
   
    var r = confirm("Are you sure you want to reject this?");
    if(r==true){
        window.location.replace('WithDraws/reject/'+id1);
    }
    
});



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


