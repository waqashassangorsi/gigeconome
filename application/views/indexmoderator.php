
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 

if($user->dashboard == "1"){

?>



<div class="row">
	
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_jobs;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $total_jobs;?></div>
			
			<h3>Total Jobs</h3>
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