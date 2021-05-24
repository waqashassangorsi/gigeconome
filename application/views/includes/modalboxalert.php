
<style>
.glyphicon-warning-sign{color:#ff6112;font-size: 29px;}
.tick_wrpr {
    padding-top: 11px;
}

.oktick{font-size: 50px;color: green !important;border: 1px solid #ccc;border-radius: 50%;width:80px !important; padding: 15px;}
.cross{font-size: 50px;color: green;border: 1px solid #ccc;border-radius: 50%; padding: 15px;}
</style>

<?php if($this->session->userdata("success")){?>

<script type="text/javascript">

    $(window).on('load',function(){
        $('#success').modal('show');
    });

</script>

<div id="success" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="tick_wrpr text-center">
            <span class="glyphicon glyphicon-ok oktick"></span>
        </div>
        <p class="text-center" style="margin-top:20px;"><?php echo $this->session->userdata("success"); ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php } ?>

<?php if($this->session->userdata("fail")){?>

<script type="text/javascript">

    $(window).on('load',function(){
        $('#fail').modal('show');
    });

</script>

<div id="fail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-body">
        <div class="tick_wrpr text-center">
            <span class="glyphicon glyphicon-warning-sign"></span>
        </div>
        <p class="text-center" style="margin-top:20px;"><?php echo $this->session->userdata("fail"); ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php } ?>

<div id="fail_response" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-body">
        <div class="tick_wrpr text-center">
            <span class="glyphicon glyphicon-warning-sign"></span>
        </div>
        <p class="text-center" style="margin-top:20px;" id="failresponse"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="success_response" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="tick_wrpr text-center">
            <span class="glyphicon glyphicon-ok oktick"></span>
        </div>
        <p class="text-center" style="margin-top:20px;" id="successresponse"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
