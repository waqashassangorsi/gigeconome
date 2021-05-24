
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
		     <th>Ticket Id</th>   
		    <th>Name</th>    
			<th>Question</th>
			<th>Date</th>
			<th>Subject</th>
			<th>Attachments</th>
			<th>Email</th>
			<th>Status</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			//echo "<pre>";var_dump($query_record);exit;
			$i = 1;
			if(!empty($query_record)){ 
		
				foreach ($query_record as $value) {
			  
				 $question = $this->db->query("select * from query_questions where id='".$value['query_question_id']."'")->result_array()[0];
				 $attachments = $this->db->query("select * from query_attachments where query_id='".$value['id']."'")->result_array()[0];
				 $username1 = $this->db->query("select * from users where u_id='".$value['u_id']."'")->result_array()[0];
				 $question_answer = $this->db->query("select * from query_answer where q_id='".$value['id']."'")->result_array()[0];
				 $mark_unread  = "";
				 if($value['is_admin_read'] == 'no'){
				     $mark_unread="background: #e1dfdf;font-weight: 600;";
				 }
				
        ?>
				<tr class="odd gradeX" style="color:black;<?php echo $mark_unread;?>" id="row_<?php echo $value['id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo $value["ticket_id"];?></td>
					<td><?php echo $username1["f_name"];?><?php echo $username1["l_name"];?></td>
					<td><?php echo $question['question']; ?></td>
					<td><?php echo $value['datetime_query']; ?></td>
						<td><?php echo $value['subject']; ?></td>
					<?php if(!empty($attachments['attachments'])){ ?>
					<td style="width:30%">
					    <img src=" <?php echo $attachments['attachments']; ?>" style="width:30%"></td>
					<?php }else{ ?>
					<td>No attachments</td>
					<?php } ?>
					<td><?php echo $value['email']; ?></td>
					<?php if($question_answer['ans_status']=="satisfied"){
					     $ans="Satisfied";
					     }
					     else if($question_answer['ans_status']=="not_satisfied")
					     {
					          $ans="Not Satisfied";
					     } else{
					         $ans="No Reply";
					     }
					 ?>
					<td><?php echo ucfirst($value['query_status']); ?></td>
					<td><?php echo $value['datetime_query']; ?></td>
					<td class="center">
					    
					   
					 <!--   <a href="Displayquery/Edit/<?php echo $value['id'];?>" class="btn btn-default btn-sm btn-icon icon-left">-->
						<!--	<i class="entypo-pencil"></i>-->
						<!--	Edit-->
						<!--</a>-->
					
						
					    <a href="Displayquery/Edit/<?php echo $value['id'];?>" class="btn btn-danger btn-sm">
							Reply
						</a>
						
					    
					 <!--   <a href="Displayquery/Edit/<?php echo $value['id'];?>" class="btn btn-success btn-sm">-->
						
						<!--	View Detail-->
						<!--</a>-->
						
						
						
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


