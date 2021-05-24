<?php
if($this->uri->segment("1") == 'Chat'){
$datadispute = $this->db->query("select * from disputes  where job_id =".$job_detail['job_id'])->result_array()[0]['u_id'];

$datadispute = $this->db->query("select * from users  where u_id =".$datadispute)->result_array()[0];
}else{
    
    $datadispute = $this->db->query("select * from disputes  where service_p_id =".$service_detail['id'])->result_array()[0]['u_id'];

    $datadispute = $this->db->query("select * from users  where u_id =".$datadispute)->result_array()[0];
    
     //$datadispute = $this->db->query("select * from users  where u_id =".$datadispute)->row();
}

?>


<div class="row wrpr_singl_msg" style="padding:20px">
    <div class="col-xs-12 propmain_heading" style="font-size:17px;">
      
        <div class="col-xs-11" style="background: red">
              
            <h4 style="color: white !important;"><?php echo ucwords($datadispute['f_name']." ".$datadispute['l_name']);?> has raised a dispute.</h4>
                       
        </div>
    </div>
</div>