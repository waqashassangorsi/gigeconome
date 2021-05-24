<?php 
$myjobs = $this->db->query("select * from jobs where u_id='".$myuser['u_id']."'")->result_array();

$mysentproposals = $this->db->query("select jobs_msgs.*,users.* from jobs_msgs inner join users on users.u_id=jobs_msgs.recv_id where send_id='".$myuser['u_id']."' and msg_status='Inbox' and custom_status='Proposal'")->result_array();
?>
<h3>Proposals</h3>
<ul class="nav nav-tabs">
  <?php 
      if($_GET['id']==1 || $_GET['id']==""){
?>
        <li class="active"><a href="<?php echo SURL.'inbox/index/proposals?id=1';?>">Sent Proposals</a></li>
        <li><a href="<?php echo SURL.'inbox/index/proposals?id=2';?>">My Jobs Proposals</a></li>
<?php
      }else if($_GET['id']==2){
?>
        <li><a href="<?php echo SURL.'inbox/index/proposals?id=1';?>">Sent Proposals</a></li>
        <li class="active"><a href="<?php echo SURL.'inbox/index/proposals?id=2';?>">My Jobs Proposals</a></li>
<?php
      }
  ?>

</ul>

<div class="tab-content">
    <?php 
      if($_GET['id']==1 || $_GET['id']==""){
    ?>
  <div id="home" class="tab-pane fade in active invoicee_detailse_wapr">
    <table id="msglists" class="table table-striped table-bordered invoicee_detailse" style="width:100%">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Job Title</th>
                <th>View Job</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($mysentproposals as $key=>$value){
                    $job_detail = $this->db->query("select * from jobs where job_id='".$value['job_id']."'")->result_array()[0];
            ?>
            <tr>
                <td>
                    <a href="<?php echo SURL.'TimeLine/index/'.$value['username'];?>"><?php echo ucwords($value['f_name']." ".$value['l_name']);?></a>
                </td>
                <td><?php echo $job_detail['job_title']; ?></td>
                <td>
                    <a class="btn btn-info btn-xs" href="<?php echo SURL.'Jobdetails/index/'.$job_detail['job_slug'];?>">View Job</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table> 
  </div>
  <?php }else if($_GET['id']==2){?>
  <div id="menu1 invoicee_detailse_wapr">
    <?php 
        if(!empty($myjobs)){
            
    ?>
    <table id="recvd_proposals" class="table table-striped table-bordered invoicee_detailse" style="width:100%">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>No of Proposals</th>
                <th>View Proposals</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($myjobs as $key=>$value){ 
                    $no_of_proposals = $this->db->query("select count(DISTINCT(send_id)) as count from jobs_msgs where job_id='".$value['job_id']."' and msg_status='Inbox' and send_id !='".$myuser['u_id']."'")->result_array()[0]['count'];
        	 
            ?>
            <tr>
                <td><?php echo $value['job_title'];?></td>
                <td><?php echo $no_of_proposals; ?></td>
                <td>
                    <a href="<?php echo SURL.'inbox/viewproposal/'.$value['job_id'];?>" class="btn btn-info">View Proposals</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table> 
    
    <?php }else{ ?>
    <p>No Jobs Found.</p>
    <?php } ?>
       
  </div>
  <?php } ?>
  
</div>

<script>
    $(document).ready(function() {
        $('#recvd_proposals').DataTable();
    });
</script>