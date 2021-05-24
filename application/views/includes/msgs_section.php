<style>
    table td img{margin-right:0;}
</style>




<?php 
    if($this->uri->segment(3)=="discussion" || $this->uri->segment(3)==""){
?>
<div class="invoicee_detailse_wapr">
<h3>INBOX</h3>
<table id="table_id" class="table invoicee_detailse">
    <thead>
        <tr>
            <th>Name</th>
            <th>Message</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($msg_list as $key=>$value){
            
            if($value['send_id']==$myuser['u_id']){
                $username = $this->db->query("select * from users where u_id='".$value['recv_id']."'")->result_array()[0]['username'];
            }else{
                $username = $this->db->query("select * from users where u_id='".$value['send_id']."'")->result_array()[0]['username'];
            }
            
            $job_slug = $this->db->query("select * from jobs where job_id='".$value['job_id']."'")->result_array()[0]['job_slug'];
            
        ?>
        <tr>
            <td>
                <img src="<?php echo $value['dp'];  ?>" class="img " alt="...">
                <a href="<?php echo SURL.'TimeLine/index/'.$value['username'];?>"><?php echo ucwords($value['f_name']." ".$value['l_name']); ?></a>
            </td>
            <td>
                <a href="<?php echo SURL.'Chat/index/'.$username.'/'.$job_slug;?>"><?php echo $value['content']; ?></a>
            </td>
            <td class="inbox_date">
                <?php echo date("d D M Y",strtotime($value['date'])); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php 
    }else if($this->uri->segment(3)=="workinprogress"){ 
        
        $record = $this->db->query("select * from jobs where u_id='".$myuser['u_id']."' and job_status='Ongoing' union select * from jobs where job_awarded_to='".$myuser['u_id']."' and job_status='Ongoing'")->result_array();
?>
<h3>Work In progress</h3>
<table id="table_id" class="table invoicee_detailse">
    <thead>
        <tr>
            <th>Job/Service Title</th>
            <th>Action</th>
        </tr>
        
    </thead>
    <tbody>
        <?php 
        foreach($record as $key=>$value){
            
            if($value['u_id']==$myuser['u_id']){
                $username = $this->db->query("select * from users where u_id='".$value['job_awarded_to']."'")->result_array()[0]['username'];
                $link = SURL."Chat/index/".$username."/".$value['job_slug'];
            }else{
                $username = $this->db->query("select * from users where u_id='".$value['u_id']."'")->result_array()[0]['username'];
                $link = SURL."Chat/index/".$username."/".$value['job_slug'];
            }
            
        ?>
        <tr>
            <td>
                <?php echo $value['job_title'];?>
            </td>
            <td>
                <a href="<?php echo $link;?>" class="btn btn-info btn-xs">View</a>
            </td>
        </tr>
        <?php } ?>
        
        <?php 
        
        $record = $this->db->query("select services_purchased.*,services.* from services_purchased inner join services on services.service_id=services_purchased.service_id where service_owner_id='".$myuser['u_id']."' and status='Ongoing' or service_owner_id='".$myuser['u_id']."' and status='Ongoing'")->result_array();
        
        foreach($record as $key=>$value){
            
            if($value['service_owner_id']==$myuser['u_id']){
                $username = $this->db->query("select * from users where u_id='".$value['who_purchased']."'")->result_array()[0]['username'];
                $link = SURL."ChatServices/index/".$username."/".$value['service_slug']."?id=".$value['id'];
            }else{
                $username = $this->db->query("select * from users where u_id='".$value['service_owner_id']."'")->result_array()[0]['username'];
                $link = SURL."ChatServices/index/".$username."/".$value['service_slug']."?id=".$value['id'];;
            }
            
            
        ?>
        <tr>
            <td>
                <?php echo $value['title'];?>
            </td>
            <td>
                <a href="<?php echo $link;?>" class="btn btn-info btn-xs">View</a>
            </td>
        </tr>
        <?php } ?>
        
        
    </tbody>
</table>

<?php 
        
    }else if($this->uri->segment(3)=="completedprojects"){ 
        $record = $this->db->query("select * from jobs where u_id='".$myuser['u_id']."' and job_status='Completed' union select * from jobs where job_awarded_to='".$myuser['u_id']."' and job_status='Completed'")->result_array();
?>

<h3>Completed</h3>
<table id="table_id" class="table invoicee_detailse">
    <thead>
        <tr>
            <th>Job/Service Title</th>
            <th>Action</th>
        </tr>
        
    </thead>
    <tbody>
        <?php 
        foreach($record as $key=>$value){
            
            if($value['u_id']==$myuser['u_id']){
                $username = $this->db->query("select * from users where u_id='".$value['job_awarded_to']."'")->result_array()[0]['username'];
                $link = SURL."Chat/index/".$username."/".$value['job_slug'];
            }else{
                $username = $this->db->query("select * from users where u_id='".$value['u_id']."'")->result_array()[0]['username'];
                $link = SURL."Chat/index/".$username."/".$value['job_slug'];
            }
            
        ?>
        <tr>
            <td>
                <?php echo $value['job_title'];?>
            </td>
            <td>
                <a href="<?php echo $link;?>" class="btn btn-info btn-xs">View</a>
            </td>
        </tr>
        <?php } ?>
        
        <?php 
        
        $record = $this->db->query("select services_purchased.*,services.* from services_purchased inner join services on services.service_id=services_purchased.service_id where service_owner_id='".$myuser['u_id']."' and status='Ongoing' or service_owner_id='".$myuser['u_id']."' and status='Ongoing'")->result_array();
        
        foreach($record as $key=>$value){
            
            if($value['service_owner_id']==$myuser['u_id']){
                $username = $this->db->query("select * from users where u_id='".$value['who_purchased']."'")->result_array()[0]['username'];
                $link = SURL."ChatServices/index/".$username."/".$value['service_slug']."?id=".$value['id'];
            }else{
                $username = $this->db->query("select * from users where u_id='".$value['service_owner_id']."'")->result_array()[0]['username'];
                $link = SURL."ChatServices/index/".$username."/".$value['service_slug']."?id=".$value['id'];;
            }
            
            
        ?>
        <tr>
            <td>
                <?php echo $value['title'];?>
            </td>
            <td>
                <a href="<?php echo $link;?>" class="btn btn-info btn-xs">View</a>
            </td>
        </tr>
        <?php } ?>
        
        
    </tbody>
</table>
</div>
<?php } ?>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>

