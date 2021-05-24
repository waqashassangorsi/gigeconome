<?php include("includes/front_end_header.php");?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css" />

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js "></script>
<style>
    .inbox_right .glyphicon{
        color: #333!important;
    }
    .search_inbox{
        background: #f9f9fd;
        padding: 24px 16px;
        margin: 0px;
        border-radius: 5px;
    }
    .inbox_right{
        background: #fff;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .inbox_right h3{
        color: #46a049;
    }
    .inbox_right table img{
        margin-left: 0;
        border-radius: none;
    }
    .table{
        margin-top: 20px;
        background: #fff;
    }
    .table td{
        
    }
    .glyphicon-star-empty{
        color: #f3b710!important;
        font-size: 18px;
    }
    .inbox_row{
        background: #f9f9fd;
    }
    .inbox_date{
        font-size: 10px;
        padding-top: 28px!important;
        width: 100px!important;
    }
    .inbox_select{
        padding: 4px 14px;
        background: #f9f9fd;
        border: 1px solid #efeaea;
    }
    .inbox-last a h5{
        font-size: 13px!important;
    }
    @media only screen and (max-width: 479px) {
        .inbox_search{
            font-size: 9px;
        }
        .table a{
            font-size: 10px;
        }
    }
    

@media screen and (max-width: 764px) and (min-width:340px){

.invoicee_detailse_wapr{
        overflow-x: auto!important;
        width: 100%!important;
    }
    .invoicee_detailse{
        width: 501px!important;
        overflow-x: auto!important;
    }
  .inbox{
      margin: 1rem;
  }
}
    

</style>

<?php 
    $myuserid = $myuser['u_id'];
    $sql = "select jobs_msgs.*,users.* from jobs_msgs left 
      join users on 
        case 
        when(recv_id = $myuserid) then(users.u_id = send_id)
        when(send_id = $myuserid) then(users.u_id = recv_id)
        end   
      where msg_id IN(
        select MAX(msg_id) from jobs_msgs where send_id='$myuserid' or recv_id='$myuserid' and msg_status='Inbox'
        group by
          case
            when(send_id = $myuserid) then(recv_id)
            when(recv_id = $myuserid) then(send_id)
          end  
        ) order by msg_id desc";
        
    $in_discussion_query = count($this->db->query($sql)->result_array());
    
    $workinprogressjobs = $this->db->query("select * from jobs where u_id='$myuserid' and job_status='Ongoing' or job_awarded_to='$myuserid' and job_status='Ongoing'")->num_rows();
    $workinprogressservices = $this->db->query("select * from services_purchased where service_owner_id='$myuserid' and status='Ongoing' or who_purchased='$myuserid' and status='Ongoing'")->num_rows();
    $totalworkinprogress = (($workinprogressjobs) + ($workinprogressservices));
    
    $completedjobs = $this->db->query("select count(*) as count from jobs where u_id='$myuserid' and job_status='Ongoing' or job_awarded_to='$myuserid' and job_status='Ongoing'")->result_array();
    $completedservices = $this->db->query("select count(*) as count from services_purchased where service_owner_id='$myuserid' and status='Completed' or who_purchased='$myuserid' and status='Completed'")->result_array();
    $totalworkcompleted = count($completedjobs) + count($completedservices);
?>
                
                
<div class="container-fluid inbox">
    <div class="row inbox_row">
        <div class="col-md-4 inbox-left">
            <div class="inbox-h5">
                <a href="javascript:void(0)"> <h5>Inbox <span>(<?php echo ($in_discussion_query+$totalworkinprogress+$totalworkcompleted);?>)</span></h5></a>
            </div>
            <div class="inbox-links">
                
                <a href="<?php echo SURL.'inbox/index/discussion';?>"> <h5>In Discussion <span>(<?php echo ($in_discussion_query); ?>)</span></h5></a>
                <a href="<?php echo SURL.'inbox/index/workinprogress';?>"> <h5>Work in progress <span>(<?php echo ($totalworkinprogress); ?>)</span></h5></a>
                <a href="<?php echo SURL.'inbox/index/completedprojects';?>"> <h5>Completed <span>(<?php echo $totalworkcompleted; ?>)</span></h5></a>
                <a href="<?php echo SURL.'inbox/index/proposals';?>"> <h5>Proposals</h5></a>
                
            </div>
            <div class="inbox-last">
                <a href="#"> <h5>All Workstreams <span>(<?php echo ($in_discussion_query+$totalworkinprogress+$totalworkcompleted);?>)</span></h5></a>
            
            </div>
            
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12 inbox_right">  
            
            <?php 
                if($this->uri->segment("3")=="proposals"){
                    include("includes/proposal_section.php");
                }else if($this->uri->segment("2")=="viewproposal"){
                    include("includes/all_proposals_of_job.php");
                }else{ 
                    include("includes/msgs_section.php");
                }
                
            ?>
                
        </div>
    </div>
</div>
<?php include("includes/front_end_footer.php");?>
<script>
    $(document).ready(function() {
    $('#msglists').DataTable();
} );
</script>