
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>

<style>
.modal-backdrop
{
    display:none;
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
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>



<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Status</th>
			<th>Documents</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($documents)){ 
					
				foreach ($documents as $key=>$value) {
				    
				    $disput_attachemts1=$this->db->query("select * from doc_recived where id='".$value['id']."'")->result_array();
			  $user_details = $this->db->query("select * from users where u_id='".$value['u_id']."'")->result_array()[0];
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['u_id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo ucwords($user_details['f_name']." ".$user_details['l_name']); ?></td>
					
					<td><?php echo $value['status']; ?>
					     
					</td>
					
					<td>
					    
					    
					    <form action="<?php echo base_url()?>VerifyDocument/downloadfile" method="post">
					    <?php foreach($disput_attachemts1 as $disput_atta){ ?>
					     <input type="text" name="file2[]" value="<?php echo $disput_atta['id_document']?>" style="display:none">
					      <input type="text" name="file2[]" value="<?php echo $disput_atta['bill_document']?>" style="display:none">
					     <?php } ?>
					  <button type="submit" class="btn btn-success">Download</button>
					  
					 
					    </form>
					 <!--   <a href="javascript:void(0)" data-id1="<?php echo $value['id_document']; ?>" style="padding:7px"  class="btn btn-danger btn-sm idcard" data-id2="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#myModal">-->
						<!--<input type="text" name="docid1" class="docid1" value="<?php echo $value['id']; ?>"  style="display:none">-->
						<!--<input type="text" name="docid3" class="docid3" value="<?php echo $value['u_id'];?>" style="display:none">-->
						<!--View IdCard-->
						<!--</a>-->
						<!--<a href="javascript:void(0)" data-id1="<?php echo $value['bill_document']; ?>" style="padding:7px" class="btn btn-default btn-sm billbtn" data-id2="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#myModalbill22" >-->
						<!--<input type="text" name="docid2" class="docid2" value="<?php echo $value['id']; ?>"  style="display:none">-->
						<!--<input type="text" name="docid6" class="docid6" value="<?php echo $value['u_id'];?>" style="display:none">-->
						
						<!--	View Bill-->
						<!--</a>-->
					</td>
					
					<td>
					    <?php if($value['status']=="Pending"){ ?>
					       <form action="<?php base_url()?>VerifyDocument/newchangestatus" id="statusform" method="post">
					           
					       <input type="hidden" name="newuserid" value="<?php echo $value['u_id'];?>">
					         <input type="hidden" name="newdocid" value="<?php echo $value['id'];?>">
    					  <button type="submit" name="actionbtn" class="approvedoc btn btn-primary" value="Approved">Approve</button>
    					  <button type="submit"  name="actionbtn" class="rejectdoc btn btn-danger" value="Not Approved">Reject</button>
    					  
					       </form>
					    <?php }else { ?>    
					       <?php echo $value['status']; ?>
					    <?php } ?>
					</td> 
				</tr>
				
		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>

				<!-- The Modal -->
  <div class="modal" id="myModal" style="margin-top:45px">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Id Card</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <div class="modal-body">
          <a class="openbillimage" target="_blank" href="#"> <img class="bill_image" style="width:84%" src=""></a>
        
            <!--   <form action="<?php echo base_url()?>VerifyDocument/changestatus" method="POST"> -->
            <!--   <input type="text" class="docid4" name="docid" value="" style="display:none">-->
            <!--      <input type="text" class="docid5" name="docid5" value="" style="display:none">-->
            <!--  <div class="form-group col-md-12" style="padding:20px">-->
            <!--  <label for="inputState" style="color:black">Status</label>-->
            <!--  <select id="inputState" class="form-control changestatus" name="changestatus">-->
            <!--    <option value="">Select Status</option>-->
            <!--    <option value="Not Approved">Not Approved</option>-->
            <!--    <option value="Approved">Approved</option>-->
            <!--  </select>-->
            <!--</div>-->
            <!-- <button type="submit" disabled class="btn btn-primary submitbtn2">Submit</button>-->
            <!--</form>    -->
            
        </div>
     
        
        <!-- Modal footer -->
        <!--<div class="modal-footer">-->
        <!--  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
        <!--</div>-->
        
      </div>
    </div>
  </div>
  
  				<!-- The Bill Modal -->
  <div class="modal" id="myModalbill22" style="margin-top:45px">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Bill</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <div class="modal-body">
          <a class="openbillimage2" target="_blank" href="#"> <img class="bill_image2" style="width:84%" src=""></a>
                  
            <!--   <form action="<?php echo base_url()?>VerifyDocument/changestatus" method="POST"> -->
            <!--   <input type="text" class="docid4" name="docid" value="" style="display:none">-->
            <!--     <input type="text" class="docid5" name="docid5" value="" style="display:none">-->
            <!--  <div class="form-group col-md-12" style="padding:20px">-->
            <!--  <label for="inputState" style="color:black">Status</label>-->
            <!--  <select id="inputState" class="form-control changestatus" name="changestatus">-->
            <!--    <option value="">Select Status</option>-->
            <!--    <option value="Not Approved">Not Approved</option>-->
            <!--    <option value="Approved">Approved</option>-->
            <!--  </select>-->
            <!--</div>-->
            <!-- <button type="submit" class="btn btn-primary submitbtn3" disabled>Submit</button>-->
            <!--</form>    -->
       </div>
        
        <!-- Modal footer -->
        <!--<div class="modal-footer">-->
        <!--  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
        <!--</div>-->
        
      </div>
    </div>
  </div>
  
 
  
<script type="text/javascript">
	$(document).on('click','.idcard',function(){
		var id = $(this).data("id1");
		var id4 = $(this).data("id2");
		var userid=$(".docid3").val();
		$(".bill_image").attr("src",id);
		$(".openbillimage").attr("href",id);
		$(".docid4").val(id4);
		$(".docid5").val(userid);
		
	
	});
	
	$(document).on('click','.billbtn',function(){
		var id2 = $(this).data("id1");
		var id3 =$(this).data("id2");
		var userid2=$(".docid6").val();
		$(".bill_image2").attr("src",id2);
		$(".openbillimage2").attr("href",id2);
		$(".docid4").val(id3);
		$(".docid5").val(userid2);
	
	});
	
	$('.changestatus').on('change', function() {
   $(".submitbtn2").removeAttr("disabled");
    $(".submitbtn3").removeAttr("disabled");
	
});

// $(document).on('click','.approvedoc',function(){
//     	var response = confirm("Are You sure you want to approve this job?");
// 		if(response==true){
// 		    $('#statusform').submit();
// // 			window.location.href="<?php echo SURL.'Jobsadmin/approve/'?>"+id;
// 		}
// });


 $('form#statusform').submit(function() {
        var response = confirm("Are You sure you want to change the status?");
        return response;
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


