
<h3>Proposals of the Job</h3>

<?php 
    if(!empty($all_proposals)){
        
?>
<div class="invoicee_detailse_wapr">
<table id="recvd_proposals" class="table table-striped table-bordered invoicee_detailse" style="width:100%">
    <thead>
        <tr>
            <th>Freelancer Name</th>
            <th>Content</th>
            <th>View Proposal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($all_proposals as $key=>$value){
                $job_slug = $this->db->query("select * from jobs where job_id='".$value['job_id']."'")->result_array()[0]['job_slug'];
        ?>
        <tr>
            <th>
                <a href="<?php echo SURL.'TimeLine/'.$value['username'];?>">
                    <img src="<?php echo SURL.$value['dp'];?>" class="img-circle" style="width:30px;height:30px;"/>
                    <?php echo ucwords($value['f_name']." ".$value['l_name']);?>
                </a>
            </th>
            <th><?php echo $value['content']?></th>
            <th><a href="<?php echo SURL.'Chat/index/'.$value['username']."/".$job_slug;?>" class="btn btn-info btn-xs">View Proposal</a></th>
        </tr>
        <?php } ?>
    </tbody>
</table> 
</div>
<?php }else{ ?>
<p>No Record Found.</p>
<?php } ?>
       

<script>
    $(document).ready(function() {
        $('#recvd_proposals').DataTable();
    });
</script>