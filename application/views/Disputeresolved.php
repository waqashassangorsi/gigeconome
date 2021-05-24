
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
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>

<script src="assets/js/select2/select2.min.js"></script>
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">

<div class="panel-body">
    <?php  
        
                 
        if($record->type!="service"){
            $job_id=$record->job_id;
            $jobdata=$this->db->query("select * from jobs where job_id='$job_id'")->result_array()[0];
            $jobdetail=$jobdata['job_id'];
        
            $querynew=$this->db->query("select * from jobs a INNER JOIN users b ON  a.u_id=b.u_id where a.job_id=$jobdetail")->result_array();
            $querynew2=$this->db->query("select * from jobs a INNER JOIN users b ON  a.job_awarded_to=b.u_id where a.job_id=$jobdetail")->result_array();
            
        }else{
            $service_p_id=$record->service_p_id;
            $service_id = $this->db->query("SELECT * FROM `services_purchased` where id=$service_p_id")->result_array()[0]['service_id'];
            $servicedata=$this->db->query("select * from services where service_id='$service_id'")->result_array()[0];
            
            $querynew2 = $this->db->query("select * from services_purchased a INNER JOIN users b ON  a.service_owner_id=b.u_id where a.id=$service_p_id")->result_array();
            $querynew = $this->db->query("select * from services_purchased a INNER JOIN users b ON  a.who_purchased=b.u_id where a.id=$service_p_id")->result_array();
            
        
            
        }
    ?>
                
	<form role="form" method="post" action="<?php echo base_url();?>Disputeactive/status" id="refund_form" class="form-horizontal form-groups-bordered">
	
		
		<div class="form-group">

			<div class="col-sm-12 text-center">
			    	
		<?php 
		if($record->type=="service"){
		$newtitle= $servicedata['title'];
		} 
		else {
			$newtitle= $jobdata['job_title'];    
	   } ?>
			    <h3><?php echo ucfirst($record->type) ?>:<?php echo $newtitle; ?></h3>
			</div>
		</div>
		
		
			<div class="form-group">
			<label class="col-sm-3 control-label">Pay To</label>
			
			<div class="col-sm-5">
				
				<select name="userid" class="form-control" data-allow-clear="true" data-placeholder="Select Parent Category..." required>
				  
				 <?php foreach($querynew2 as $querynew4){?>
				   <option value="<?php echo $querynew4['u_id'];?>"><?php echo $querynew4['f_name']." (Freelancer)";?></option>
				   <?php }?>
					
				   <?php foreach($querynew as $querynew3){?>
				   <option value="<?php echo $querynew3['u_id'];?>"><?php echo $querynew3['f_name']." (Client)"?></option>
				   <?php }?>
				</select>
				
			</div>
		</div>
		
		
		<div class="form-group">
			<label class="col-sm-3 control-label">Enter Amount</label>
			
			<div class="col-sm-5">
				
				<input type="text"  name="amount" class="form-control" id="field-1" value="<?php echo $job_escrow_amount;?>" placeholder="Enter Amount" readonly required>
				<input type="hidden"  name="disputeid" class="form-control" id="field-1" value="<?php echo $this->uri->segment(3);?>" readonly required>
				
			</div>
		</div>
		
		<input type="text" name='type_data' value="<?php echo $record->type ?>" style="display:none">
		
		<?php if($record->type=="service"){?>
		<input type="text" name='recordid1' value="<?php echo $record->service_p_id ?>" style="display:none">
		<?php } else {?>
		<input type="text" name='recordid2' value="<?php echo $record->job_id ?>" style="display:none">
		<?php }?>
		
		<input type="hidden" value="<?php echo $job_escrow_amount;?>" id="escrow_amount" name="escrow_amount">
		<p class="error_amount"></p>
		
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
    
    $(document).ready(function(){
       
       $(document).on('submit','#refund_form',function(){
           
           if(Number($('#escrow_amount').val()) < Number($('#field-1').val())){
               
               $('.error_amount').css('color','red').text('Invalid amount max amount shoud be ' + $('#escrow_amount').val());
             return false;
           }
           
       }); 
       
       $(document).on('change','#field-1',function(){
           if(Number($('#escrow_amount').val()) < Number($('#field-1').val()) ){
               
               $('.error_amount').css('color','red').text('Invalid amount max amount shoud be ' + $('#escrow_amount').val());
             
           }else{
               $('.error_amount').text('');
               
           }
           
       }); 
        
    });
    
</script>
		
			
			