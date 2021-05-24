
<?php 
require_once(APPPATH."views\includes/header.php"); 
require_once(APPPATH."views\includes/alerts.php"); 
?>

<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo $homee; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	
</ol>

<div class="panel-heading">
				<div class="panel-title h4">
					<b><?php echo $line;?></b>
				</div>
				
			
</div>
			
<div style="text-align: right;">
			<a href="<?php echo base_url();?>Category/Addcategory" class="btn btn-success btn-icon">
				Add Category
				<i class="entypo-pencil"></i>
			</a>
</div>

<script src="assets/js/jquery.nestable.js"></script>
<script type="text/javascript">

jQuery(document).ready(function($)
{
	$('.dd').nestable({});
});
</script>





<div class="panel-body">



<div id="list-1" class="nested-list dd with-margins">





<div class="panel panel-primary" data-collapsed="0">
			
	<div class="panel-heading">
		<div class="panel-title">
			Parsing Folder List
		</div>
		
		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
			<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
		</div>
	</div>
	
	
	<div class="panel-body no-padding" style="padding: 5px 0;">
		
		<div id="tree1" class="aciTree aciTreeFullRow" style="min-height: 70px;"></div>
		
	</div>
	
	
</div><!-- Footer -->






	
<?php if(!empty($categories)){?>	

			<ul class="dd-list">
			<?php foreach($categories as $key=>$value){?>
				<li class="dd-item">
					<div class="dd-handle">
						<?php echo $value['name'];?>
						<a href="Category/Editcategory/<?php echo $value['cat_id'];?>">
							
							<i class="entypo-pencil"></i>
						</a>
						<a onclick="delete(1)" data-id1="<?php echo $value['cat_id'];?>" class="dltcat" href="javascript:void(0)">
							
							<i class="entypo-trash"></i>
					  </a>
					</div>



	

					<?php 
						$con['conditions'] = array("company_id"=> $this->session->userdata['companyid'],"parent_id" => $value['cat_id']); 

						$subcat1 = $this->common->get_rows("category",$con);
						
						if(!empty($subcat1)){	
					?>
					
							<ul class="dd-list">

								<?php foreach($subcat1 as $key=>$value1){ ?>
								 
								<li class="dd-item">
									<div class="dd-handle">
										<?php echo $value1['name'];?>
										<a href="Category/Editcategory/<?php echo $value1['cat_id'];?>">
							
											<i class="entypo-pencil"></i>
										</a>
										<a data-id1="<?php echo $value1['cat_id'];?>" class="dltcat" href="javascript:void(0)">
							
											<i class="entypo-trash"></i>
									  </a>
									</div>
									<?php 
										$con['conditions'] = array("company_id"=> $this->session->userdata['companyid'],"parent_id" => $value1['cat_id']); 

										$subcat2 = $this->common->get_rows("category",$con);
										
										if(!empty($subcat2)){	
									?>
								

									 <ul class="dd-list">
									 	<?php foreach($subcat2 as $key=>$value2){ ?>
											<li class="dd-item">
												<div class="dd-handle">
													<?php echo $value2['name'];?>
													<a href="Category/Editcategory/<?php echo $value2['cat_id'];?>">
							
														<i class="entypo-pencil"></i>
													</a>
													<a data-id1="<?php echo $value2['cat_id'];?>" class="dltcat" href="javascript:void(0)">
							
														<i class="entypo-trash"></i>
												  </a>
												</div>

												<?php 
													$con['conditions'] = array("company_id"=> $this->session->userdata['companyid'],"parent_id" => $value2['cat_id']); 

													$subcat3 = $this->common->get_rows("category",$con);
													
													if(!empty($subcat3)){	
												?>

												<ul class="dd-list">
												 <?php foreach($subcat3 as $key=>$value3){ ?>
													<li class="dd-item">
														<div class="dd-handle">
															<?php echo $value3['name'];?>
															<a href="Category/Editcategory/<?php echo $value3['cat_id'];?>">
							
																<i class="entypo-pencil"></i>
															</a>
															<a data-id1="<?php echo $value3['cat_id'];?>" class="dltcat" href="javascript:void(0)">
							
																<i class="entypo-trash"></i>
														  </a>
														</div>
															<?php 
																$con['conditions'] = array("company_id"=> $this->session->userdata['companyid'],"parent_id" => $value3['cat_id']); 

																$subcat4 = $this->common->get_rows("category",$con);
																
																if(!empty($subcat4)){	
															?>

															<ul class="dd-list">
															 <?php foreach($subcat4 as $key=>$value4){ ?>
																<li class="dd-item">
																	<div class="dd-handle">
																		<?php echo $value4['name'];?>
																		<a href="Category/Editcategory/<?php echo $value4['cat_id'];?>">
							
																			<i class="entypo-pencil"></i>
																		</a>
																		<a data-id1="<?php echo $value4['cat_id'];?>" class="dltcat" href="javascript:void(0)">
							
																			<i class="entypo-trash"></i>
																	  </a>
																	</div>
																	
																</li>	
																<?php } ?> 
															</ul>
															<?php } ?> 
														
													</li>	
													<?php } ?> 
												</ul>
												<?php } ?> 
											</li>
										<?php } ?> 
										
									</ul> 
									
									<?php } ?> 

								</li>
								<?php } ?>
							</ul>
					<?php } ?>
				</li>

		<?php } ?>		
				
			
			</ul>
<?php } ?>			
				
		</div>



	</div>


<script type="text/javascript">

function delete(id){
	alert(id);
}

	$(document).on('click','.entypo-pencil',function(){
		alert('asd');
		// var id = $(this).data("id1");
		// var response = confirm("Are You sure you want to delete?");
		// if(response == true){
		// 	window.location.href = "<?php echo SURL;?>Configuration/delete/"+id;
		// }
	});
</script>


<?php
require_once(APPPATH."views\includes/footer.php"); 

 ?>


