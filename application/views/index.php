
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 

if($user->dashboard == "1"){

?>



<div class="row">
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_buyer;?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $total_buyer;?></div>
			
			<h3>Total Buyers</h3>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_freelancer;?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo $total_freelancer;?></div>
			
			<h3>Total Freelancers</h3>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_jobs;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $total_jobs;?></div>
			
			<h3>Total Jobs</h3>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_Earning;?>" data-postfix="" data-duration="1500" data-delay="1800"><?php echo $total_Earning;?></div>
			
			<h3>Total Earning($)</h3>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_Earning_month;?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $total_Earning_month;?></div>
			
			<h3>Earning of this month($)</h3>
		</div>
		
	</div>
	
	<!--<div class="col-sm-3">-->
	
	<!--	<div class="tile-stats tile-green">-->
	<!--		<div class="icon"><i class="entypo-chart-bar"></i></div>-->
	<!--		<div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500" data-delay="600">0</div>-->
			
	<!--		<h3>Last Month Earning($)</h3>-->
	<!--	</div>-->
		
	<!--</div>-->
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $escrowamt;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $escrowamt;?></div>
			
			<h3>Esrow Amount($)</h3>
		</div>
		
	</div>
	

	
</div>

<br />

<div class="row hidden">
	<div class="col-sm-8">
	
		<div class="panel panel-primary" id="charts_env">
		
			<div class="panel-heading">
				<div class="panel-title">Site Stats</div>
				
				<div class="panel-options">
					<ul class="nav nav-tabs">
						<li class=""><a href="#area-chart" data-toggle="tab">Area Chart</a></li>
						<li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
						<li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li>
					</ul>
				</div>
			</div>
	
			<div class="panel-body">
			
				<div class="tab-content">
				
					<div class="tab-pane" id="area-chart">							
						<div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
					</div>
					
					<div class="tab-pane active" id="line-chart">
						<div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
					</div>
					
					<div class="tab-pane" id="pie-chart">
						<div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
					</div>
					
				</div>
				
			</div>

			<table class="table table-bordered table-responsive">

				<thead>
					<tr>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Pageviews</div>
								<small>54,127</small>
							</div>
							<span class="pull-right pageviews">4,3,5,4,5,6,5</span>
							
						</th>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Unique Visitors</div>
								<small>25,127</small>
							</div>
							<span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
						</th>
					</tr>
				</thead>
				
			</table>
			
		</div>	

	</div>

	<div class="col-sm-4">

		<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Any Title</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Amount</th>
							</tr>
						</thead>
						
						<tbody>
												
							<tr>
								<td>1</td>
								<td>HBL</td>
								<td class="text-center"><span class="pie">Rs 1234 </span></td>
							</tr>

							<tr>
								<td>2</td>
								<td>HBL</td>
								<td class="text-center"><span class="pie">Rs 1234 </span></td>
							</tr>

							<tr>
								<td>3</td>
								<td>HBL</td>
								<td class="text-center"><span class="pie">Rs 1234 </span></td>
							</tr>
		
						</tbody>
					</table>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">All Courses</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Course Name</th>
						<th>Students Enrolled</th>
					</tr>
				</thead>
				
				<tbody>
										
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Course 1</td>
						<td>123</td>
					</tr>


				</tbody>
			</table>
		</div>

	</div>
</div>


<br />

<div class="row hidden">
	
	<div class="col-sm-4">
		
		<div class="panel panel-primary">
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th class="padding-bottom-none text-center">
							<br />
							<br />
							<span class="monthly-sales"></span>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="panel-heading">
							<h4>Monthly Stats</h4>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
	
	<div class="col-sm-8">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Latest Updated Profiles</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
				
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Position</th>
						<th>Activity</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td>1</td>
						<td>Art Ramadani</td>
						<td>CEO</td>
						<td class="text-center"><span class="inlinebar">4,3,5,4,5,6</span></td>
					</tr>
					
					<tr>
						<td>2</td>
						<td>Filan Fisteku</td>
						<td>Member</td>
						<td class="text-center"><span class="inlinebar-2">1,3,4,5,3,5</span></td>
					</tr>
					
					<tr>
						<td>3</td>
						<td>Arlind Nushi</td>
						<td>Co-founder</td>
						<td class="text-center"><span class="inlinebar-3">5,3,2,5,4,5</span></td>
					</tr>

				</tbody>
			</table>
		</div>
		
	</div>
	
</div>



<br />


<script type="text/javascript">
	// Code used to add Todo Tasks
	jQuery(document).ready(function($)
	{
		var $todo_tasks = $("#todo_tasks");
		
		$todo_tasks.find('input[type="text"]').on('keydown', function(ev)
		{
			if(ev.keyCode == 13)
			{
				ev.preventDefault();
				
				if($.trim($(this).val()).length)
				{
					var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
					$(this).val('');
					
					$todo_entry.appendTo($todo_tasks.find('.todo-list'));
					$todo_entry.hide().slideDown('fast');
					replaceCheckboxes();
				}
			}
		});
	});
</script>




<?php
}
require_once(APPPATH."views/includes/footer.php"); 

 ?>