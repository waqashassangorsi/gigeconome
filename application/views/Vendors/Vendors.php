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
			<th>Star</th>
			<th>Rating(%)</th>
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
					<td><?php echo $value['star']; ?></td>
					<td><?php echo $value['rating']; ?></td>
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
							<a href="javascript:void(0)" data-id1="<?php echo $value['u_id']; ?>" class="btn btn-danger btn-sm  active">
							
							<?php echo $status = "InActive";; ?>
							</a>
						<?php		
							}
						?>
						<form action="<?php echo SURL.'Newlogin/now'?>" method="post" target="_blank">
						    <input type="hidden" name="u_id" value="<?php echo $value['u_id'];?>"/>
						    <input class="btn btn-danger" type="submit" value="Login" name="submit"/>
						</form>
						
					
						<button type="button" data-id1="<?php echo $value['u_id'];?>"  class="btn btn-info btn-xs givecredits" onClick="window.scroll({ top: 0,left: 0,behavior: 'smooth' });" data-toggle="modal" data-target="#myModal">Give Credits</button>
						<button type="button" data-id1="<?php echo $value['u_id'];?>" class="btn btn-info btn-xs assignrating" onClick="window.scroll({ top: 0,left: 0,behavior: 'smooth' });" data-toggle="modal" data-target="#assignrating">Assign Rating</button>
			
						
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
		    window.location.href="<?php echo SURL.'Freelancersadmin/active/';?>"+id;
		}else{
		    
		}
		
		
	});
	
	$(document).on('click','.inactive',function(){
	    
		var id = $(this).data("id1");
		
		var r=confirm("Are you sure you want to make this freelancer Active?");
		if(r==true){
		    window.location.href="<?php echo SURL.'Freelancersadmin/inactive/';?>"+id;
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
 
 <script>
     $(document).on('click','.givecredits',function(){
         var id = $(this).data("id1");
   
    
         $("#u_id").val(id);
     });
     
     $(document).on('click','.assignrating',function(){
         var id = $(this).data("id1");
         $("#newu_id").val(id);
     });
   
     
 </script>
 
 <form action="<?php echo SURL.'Freelancersadmin/givecredits/'?>" method="post" class="modal fade mynewmodal" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Give credits</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" value="" name="u_id" id="u_id"/>
              <input type="text" value="" class="form-control" placeholder="Write no of credits" name="credits"/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-default btn-info">Submit</button>
            </div>
        </div>
    </div>
</form>

<form action="<?php echo SURL.'Freelancersadmin/assignrating/'?>" method="post" class="modal fade mynewmodal" id="assignrating" role="dialog">
    <div class="modal-dialog modal-sm" >
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Assign Rating</h4>
            </div>
            <div class="modal-body">
              <h4 class="modal-title">Give rating(%)</h4>
              <input type="text" value="" required class="form-control" placeholder="Give Rating" name="rating"/>
              
              <h4 style="margin-top:30px;">Choose Star</h4>
              <select class="form-control" name="star_name">
                  <?php 
                  $rank = $this->db->query("select * from rank")->result_array();
                  ?>
                  
                  <?php foreach($rank as $key=>$value){?>
                  <option value="<?php echo $value['image'];?>"><?php echo $value['name'];?></option>
                  <?php } ?>
              </select>
              <input type="hidden" value="" name="u_id" id="newu_id"/>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-default btn-info">Submit</button>
            </div>
        </div>
    </div>
</form>


