$( document ).ready(function() {
    
    $(document).on('click','.mobile_list > li',function(e){
        
        e.stopPropagation();
        
        if($(this).children('.content_mobile').hasClass('active_menu')){
            
            $('.active_menu').slideUp("slow");
            $('.content_mobile').removeClass('active_menu'); 
           
        }else{
        
            $('.active_menu').slideUp("slow");
            $('.content_mobile').removeClass('active_menu');
            $(this).children('.content_mobile').addClass('active_menu');
            $(this).children('.content_mobile').slideDown("slow");
        
        }
        
    });
    
    
    
    $(document).on('change','#category',function(){
            
        var catid = $(this).val();
        $.ajax({
          url: "Completeprofile/get_subcat",
          cache: false,
          type: "POST",
          data: {catid : catid},
          success: function(html){ 
              $("#sub_Category").html(html);
          }
        });
    
    
    });
    
    
    $(document).on('click','.available',function(e){
        e.stopPropagation();
        if($(this).is(':checked')){
           if(confirm("Are you sure you want to change Status?")){
                //alert($(this).val());
                 $('#change_status').submit();
            }
            else{
                return false;
            }
        }else{
           if(confirm("Are you sure you want to change Status?")){
                //alert($(this).val());
                 $('#change_status').submit();
            }
            else{
                return false;
            }
        }
    });
    
    
    $(document).on('click','.noti_wrpr',function(){
            
        var catid = $(this).val();
        $.ajax({
              url: "Jobdetails/remove_noti_count",
              cache: false,
              type: "POST",
              data: {catid : catid},
              success: function(html){ 
                  
                  $(".noti_wrpr span").remove();
                  
              }
        });
    
    });
    
    $(document).on('click','#submitpayoneer',function(){
            
        var email = $("#Emailpayoneer").val();
        var cnfemail = $("#cnfEmailpayoneer").val();
        if(email!=cnfemail){
             alert("Emails doesnt match with each other.");
        }else if(email==""){
            alert("Enter email.");
        }else if(cnfemail==""){
            alert("Please re-enter email.");
        }else{
        
            $.ajax({
              url: "Payment/update_payoneeremail",
              cache: false,
              type: "POST",
              data: {email : email},
              success: function(html){ 
                  var a = JSON.parse(html);
                  $('#success_reponse_payoneer').html(a.response);
                  
              }
            });
        
        }
    
    });
    
    $(document).on('click','#submitstripe',function(){
            
        var email = $("#emailstripe").val();
        var cnfemail = $("#cnfEmailstripe").val();
        if(email!=cnfemail){
             alert("Emails doesnt match with each other.");
        }else if(email==""){
            alert("Enter email.");
        }else if(cnfemail==""){
            alert("Please re-enter email.");
        }else{
        
            $.ajax({
              url: "Payment/update_stripeemail",
              cache: false,
              type: "POST",
              data: {email : email},
              success: function(html){ 
                  var a = JSON.parse(html);
                  $('#success_reponse_stripe').html(a.response);
                  
              }
            });
        
        }
    
    });
    
    $(document).on('click','#submitpaypal',function(){
            
        var email = $("#emailpaypal").val();
        var cnfemail = $("#cnfEmailpaypal").val();
        if(email!=cnfemail){
             alert("Emails doesnt match with each other.");
        }else if(email==""){
            alert("Enter email.");
        }else if(cnfemail==""){
            alert("Please re-enter email.");
        }else{
        
            $.ajax({
              url: "Payment/update_paypalemail",
              cache: false,
              type: "POST",
              data: {email : email},
              success: function(html){ 
                  var a = JSON.parse(html);
                  $('#success_reponse_paypal').html(a.response);
                  
              }
            });
        
        }
    
    });
    
    $(document).on('click','.msgscounter_wrpr',function(){
        
        var notiid=0;
        $.ajax({
              url: "Jobdetails/remove_msg_count",
              cache: false,
              type: "POST",
              data: {notiid : notiid},
              success: function(html){ 
                  $("#msgscounter").remove();
              }
        });
    
    
    });
    
    $(document).on('click','.noti_wrpr_head',function(){
            
        var notiid = $(this).data("id1");
   
        $.ajax({
              url: "Jobdetails/update_noti_status",
              cache: false,
              type: "POST",
              data: {notiid : notiid},
              success: function(html){ 
                  $(".noti_wrpr span").remove();
              }
        });
    
    
    });
    
    $(document).on('click','.fav_icon',function(){
    
        var service_id = $(this).data("id1");

        
        $.ajax({
              url: "Offer/service_wishlist",
              cache: false,
              type: "POST",
              data: {service_id : service_id},
              success: function(html){ 
                  
                var a=JSON.parse(html);
                $("#favicon_btn_"+service_id).css("cssText","color: "+a.color+" !important;");
                    
              }
        });
        
    });
    
    $(document).on('click','.offerheart',function(){
    
        var service_id = $(this).data("id1");
        var color = $(this).css("color");
        var no = $("#totalliked").html().trim();
            
        if(color=="rgb(255, 0, 0)"){
            $("#totalliked").html(no-parseInt(1));
            $(this).css("color","rgb(144, 139, 139)");
        }else{
            
            $("#totalliked").html(parseInt(no)+parseInt(1));
            $(this).css("color","rgb(255, 0, 0)");
        }
        
        $.ajax({
              url: "Offer/service_wishlist",
              cache: false,
              type: "POST",
              data: {service_id : service_id},
              success: function(html){ 
     
              }
        });
        
       
    });
    
    $('.heart').click(function () {
        var jobid=$(this).data("id1");
        var no = $("#total_wishlist_"+jobid).html().trim();
        var userlike=$('.userlike').val();
        
        if(userlike=="")
        {
            alert("Please Login for like");
        }
        else
        {
       
          if($(this).css("color") == "rgb(0, 196, 207)") { 
            $("#total_wishlist_"+jobid).html(parseInt(no)+parseInt(1));
            $(this).css("color","rgb(255, 0, 0)");
        }else{
          $("#total_wishlist_"+jobid).html(parseInt(no)-parseInt(1));
          $(this).css("color", "rgb(0, 196, 207)");
        }
        
        // rgb(0, 196, 207)
      
        // if($(this).css("color") == "rgb(0, 196, 207)") { 
        //     $("#total_wishlist_"+jobid).html(parseInt(no)+parseInt(1));
        //     $(this).css("color","rgb(255, 0, 0)");
        // }else{
        //   $("#total_wishlist_"+jobid).html(parseInt(no)-parseInt(1));
        //   $(this).css("color", "rgb(0, 196, 207)");
        // }
      
        $.ajax({
            url: "Jobs/favourite",
            cache: false,
            method:"POST",
            data:{jobid:jobid},
            success: function(html){
            //   var a=JSON.parse(html);
            //   $("#total_wishlist_"+jobid).html(a.count);
            //   if(a.color=="#ff0000")
            //   {
            //       $("#total_wishlist_"+jobid).css({"color":"#ff0000 !important"});
            //   }if(a.color=="#00C4CF")
            //   {
            //     $("#total_wishlist_"+jobid).css({"color":"#00C4CF !important"});   
            //   }
              
            }  
        });
        
        }
    
    });
    
	//job invitation 
	$(document).on('click','.invite_btnt',function(e){
			e.preventDefault();
			var thiss = $(this);
            var freelancer = $(this).data('freelancerid');
			var jobid = $(this).data('jobslug');
			$.ajax({
			  url: "InviteFreelancer/invitation",
			  cache: false,
			  type: "POST",
			  dataType:'json',
			  data: {'freelancer' : freelancer,'jobid':jobid},
			  beforeSend: function(){
				  thiss.html('inviting <i class="fa fa-spinner fa-spin"></i>');
			  },
			  success: function(response){ 
				if(response.error){
					alert(response.error_msg);
				}else{
				  thiss.html('Invitation Sent');
                  thiss.addClass( "invite_btn_cancel" );
                  thiss.removeClass( "invite_btnt" );
				  thiss.attr('data-notiid',response.data_id_notify);
				  //alert(response.data_id_notify);
				  //thiss.attr('data-jobinviteid',response.data_id_job);
				}
			  }
			});
            // $("#invite_btnt").html('Invitation send');
            // $( "#invite_btnt" ).addClass( "invite_btn" )
        });
		
		//job invitation 
	$(document).on('click','.invite_btn_cancel',function(e){
			e.preventDefault();
			var thiss = $(this);
            var freelancer = $(this).data('freelancerid');
			var jobid = $(this).data('jobslug');
			var data_noti_id = $(this).attr('data-notiid');
			$.ajax({
			  url: "InviteFreelancer/invitation_cancel",
			  cache: false,
			  type: "POST",
			  dataType:'json',
			  data: {'freelancer' : freelancer,'jobid':jobid,'notiid':data_noti_id},
			  beforeSend: function(){
				  thiss.html('canceling <i class="fa fa-spinner fa-spin"></i>');
			  },
			  success: function(response){ 
				if(response.error){
					alert(response.error_msg);
					thiss.html('Invite');
				}else{
				  thiss.html('Invite');
                  thiss.addClass( "invite_btnt" );
                  thiss.removeClass( "invite_btn_cancel" );
				}
			  }
			});
        });
	
	
	$(document).on('click','.invite_all',function(){
	    
	    var jobid = $(this).data("jobid");
        var ids = $('.allids').map(function() {
            return this.value;
        }).get();
        
	    var thiss = $(this);
	    $.ajax({
			  url: "InviteFreelancer/invitation_all",
			  cache: false,
			  type: "POST",
			  dataType:'json',
			  data: {'jobid':jobid,'ids':ids},
			  beforeSend: function(){
				  thiss.html('Inviting <i class="fa fa-spinner fa-spin"></i>');
			  },
			  success: function(response){ 
				if(response.error){
					alert(response.error_msg);
					thiss.html('Invite All');
				}else{
				  thiss.html('Invited');
				  $(".invite_btnt").html("Invitation sent");
				  $(".invite_btnt").attr("disabled",true);
                  thiss.removeClass( "invite_all" );
				}
			  }
			});
	    
	});
	
    $('.wish_icon').click(function () {
        var id=$(this).data("id");
        var no = $("#total_likes_"+id).html().trim(); 
        
        if($(this).css("color") == "rgb(0, 196, 207)") { 
            $("#total_likes_"+id).html(parseInt(no)+parseInt(1));
            $(this).css("color","rgb(255, 0, 0)");
        }else{
            if(parseInt(no)>0)
            {
              $("#total_likes_"+id).html(parseInt(no)-parseInt(1));   
            $(this).css("color", "rgb(0, 196, 207)");
            }else
            {
                alert('This cannot be less than zero');
            }
          
        }
        
        $.ajax({
            url: "Freelancers/wish",
            cache: false,
            method:"POST",
            data:{id:id},
            success: function(html){
               
            }  
        });
    
    });
    

    $(document).on('click','.contact_btn',function(e){
		e.preventDefault();
		var existing_href=""; var new_href="";
		$('.btn_new_project').attr('href','https://surfnwork.com/postproject/index/');
		$('.btn_existing_project').attr('href','https://surfnwork.com/MyBuyerdashboard/existing_jobs/');
		$('.contact_freelancer_header').text("Get a Quote from " + $(this).data('name') + " for");
		console.log(existing_href);
		console.log(new_href);
		//$('.btn_new_project').attr('href',$(this).attr('href'));
		existing_href = $('.btn_existing_project').attr('href');
		new_href = $('.btn_new_project').attr('href');
		$('.btn_new_project').attr('href',new_href+$(this).attr('data-username'));
		$('.btn_existing_project').attr('href',existing_href+$(this).attr('data-userid'));
		$('#modal_contact').modal('show');	
	});	
	
    $(document).on('click','.reject_proposal',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject this proposal?");
        if(r==true){
            window.location.href="Chat/reject_proposal/"+id;
        }
        
    });
    
    $(document).on('click','.yestip',function(){
            
        var id = $(this).data("id1"); 
        $("#choosetipamt_"+id).show();
        $("#tipaskwrpr_"+id).hide();
        
    });
    
    $(document).on('click','.acceptproposal',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Accept this proposal?");
        if(r==true){
            window.location.href="PaymentSummary/acceptproposal/"+id;
        }
        
    });
    
    $(document).on('click','.accept_invoice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Accept this Invoice?");
        if(r==true){
            window.location.href="PaymentSummary/acceptinvoice/"+id;
        }
        
    });
	
	//// accept inovice for Services
	$(document).on('click','.accept_services_invoice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Accept this Invoice?");
        if(r==true){
            window.location.href="PaymentSummary/acceptServiceinvoice/"+id;
        }
        
    });
    
    
    
    $(document).on('click','.cancelinvoice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Cancel this Invoice?");
        if(r==true){
            window.location.href="Chat/cancelinvoice/"+id;
        }
    
    });
    
    $(document).on('click','.cancelinvoice_service',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Cancel this Invoice?");
        if(r==true){
            window.location.href="ChatServices/cancelinvoice/"+id;
        }
    
    });
    
    $(document).on('click','.reject_invoice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject this invoice?");
        if(r==true){
            window.location.href="Chat/reject_invoice/"+id;
        }
        
    });
	
	$(document).on('click','.reject_services_invoice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject this invoice?");
        if(r==true){
            window.location.href="ChatServices/reject_services_invoice/"+id;
        }
        
    });
    
    $(document).on('click','.cancelproposal',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Cancel this proposal?");
        if(r==true){
            window.location.href="Jobdetails/cancelproposalonchat/"+id;
        }
    
    });
    
    $(document).on('click','.canceldeposit',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Cancel this Deposit?");
        if(r==true){
            window.location.href="Chat/canceldeposit/"+id;
        }
    
    });
    
    
    
    $(document).on('click','.canceldepositservice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Cancel this Deposit for service?");
        if(r==true){
            window.location.href="ChatServices/canceldeposit/"+id;
        }
    
    });
    
    
    $(document).on('click','.canceldepositrefund',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Cancel this Deposit?");
        if(r==true){
            window.location.href="ChatServices/canceldeposit/"+id;
        }
    
    });
    
    $(document).on('click','.reject_deposit',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject this Deposit?");
        if(r==true){
            window.location.href="Chat/rejectdeposit/"+id;
        }
    
    });
    
    
    $(document).on('click','.reject_depositservice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject this Deposit for service?");
        if(r==true){
            window.location.href="ChatServices/rejectdeposit/"+id;
        }
    
    });
    
    $(document).on('click','.reject_refund',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject this refund request?");
        if(r==true){
            window.location.href="Chat/rejectrefund/"+id;
        }
    
    });
    
        $(document).on('click','.reject_refundservice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject this refund request Service?");
        if(r==true){
            window.location.href="ChatServices/rejectrefund/"+id;
        }
    
    });
	
	$(document).on('click','.reject_time',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject time extension request?");
        if(r==true){
            window.location.href="Chat/rejecttime/"+id;
        }
    
    });
    
    $(document).on('click','.reject_time_Service',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to reject time extension request?");
        if(r==true){
            window.location.href="ChatServices/rejecttime/"+id;
        }
    
    });
    
    
    
    $(document).on('click','.acceptdeposit',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to accept this Deposit?");
        if(r==true){
            window.location.href="PaymentSummary/depositamount/"+id;
        }
    
    });
    
    
    $(document).on('click','.acceptdeposit_refund',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to accept this Deposit?");
        if(r==true){
            window.location.href="PaymentSummary/depositamountforservice/"+id;
        }
    
    });
    
    $(document).on('click','.acceptrefund',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to accept this refund request?");
        if(r==true){
            window.location.href="Chat/acceptrefund/"+id;
        }
    
    });
    
    
    
    $(document).on('click','.acceptrefundservice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to accept this refund request Services?");
        if(r==true){
            window.location.href="ChatServices/acceptrefund/"+id;
        }
    
    });
	
	$(document).on('click','.accepttime',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to accept this Time extension request?");
        if(r==true){
            window.location.href="Chat/accepttime/"+id;
        }
    
    });
    
    $(document).on('click','.accepttime_service',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to accept this Time extension request?");
        if(r==true){
            window.location.href="ChatServices/accepttime/"+id;
        }
    
    });
    
    
    
    $(document).on('click','.cancelrefund',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to cancel this refund request?");
        if(r==true){
            window.location.href="Chat/cancelrefund/"+id;
        }
    
    });
    
    $(document).on('click','.cancelrefundservice',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to cancel this refund request for service?");
        if(r==true){
            window.location.href="ChatServices/cancelrefund/"+id;
        }
    
    });
    
	$(document).on('click','.cancel_time',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to cancel this Time Extension request?");
        if(r==true){
            window.location.href="Chat/canceltime/"+id;
        }
    
    });
    
    $(document).on('click','.cancel_time_service',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to cancel this Time Extension request?");
        if(r==true){
            window.location.href="ChatServices/canceltime/"+id;
        }
    
    });
    
    
    $(document).on('click','.outer_cancel',function(){
            
        var id = $(this).data("value");
        var r=confirm("Are you sure you want to Cancel this proposal?");
        if(r==true){
            window.location.href="Jobdetails/cancelproposal/"+id;
        }
    
    });
    
    $(document).on('click','#sendsimplemsg',function(){
        
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
            $("#msg_statuss").val(0);
            $("#main_form").submit();
        }
    
    });
	
	$(document).on('click','#sendsimplemsgservice',function(){
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
        $("#msg_statuss").val(0);
        $("#main_form_services").submit();
        }
    });
    

    $(document).on('click','#sendrefund',function(){
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
        $("#msg_statuss").val(4);
        $("#main_form").submit();
        }
    });
    
     $(document).on('click','#sendrefundservice',function(){
         if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
        $("#msg_statuss").val(4);
        $("#main_form_services").submit();
        }
    });
	
	$(document).on('click','#sendextendtime',function(){
	    if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
        $("#msg_statuss").val(5);
        $("#main_form").submit();
        }
    
    });
    
    
    $(document).on('click','#sendproposalbtn',function(){
        var totalamt = $("#totalamt").val();
        var deposite = $("#deposite").val();
        
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
            return false;
        }
        
        if(parseFloat(deposite)>parseFloat(totalamt)){
            alert("Deposited amount cannot be greater than total amount.");
            return false;
        }
        
        var percentage = deposite*100/totalamt;
        if(percentage>25){
            
        }else{
            
            var minimumamt = totalamt*25/100;
            alert("Deposited amount cannot be lesser than $"+minimumamt);
            return false;
        }
    
        $("#msg_statuss").val(1);
        $("#main_form").submit();
    
    });
    
    $(document).on('click','#sendinv',function(){
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
            
            if($('.confirm_invoice').is(':checked')){
                $("#msg_statuss").val(2);
                $("#main_form").submit();
            }else{
                $('.show_err').text('Please Confirm');
                $('.show_err').show();
                return false;
            }
        }
    
    });
    
    $(document).on('click','.confirm_invoice',function(){
        
        if($(this).is(':checked')){
            
                $('.show_err').text('');
                $('.show_err').hide();
        }else{
            
            $('.show_err').text('Please Confirm');
                $('.show_err').show();
                return false;
        }
        
    });
    
    $(document).on('click','#sendinvservice',function(){
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
        $("#msg_statuss").val(2);
        $("#main_form_services").submit();
        }
    });
    
    $(document).on('click','#sendextendtimeservice',function(){
	    if($('.reason_extention').val() == ""){
            alert('Please write the Reason!');
        }else{
        $("#msg_statuss").val(5);
        $("#main_form_services").submit();
        }
    
    });
    
    $(document).on('click','#askdeposit',function(){
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
        $("#msg_statuss").val(3);
        $("#main_form").submit();
        }
    
    });
    
    $(document).on('click','#askdepositservice',function(){
        if($('.send_message').val() == ""){
            alert('Please write something in message box!');
        }else{
        $("#msg_statuss").val(3);
        $("#main_form_services").submit();
        }
    
    });
    
    
    
    $(document).on('submit','#main_form',(function(e){
        
       e.preventDefault();
       e.stopImmediatePropagation();
     
       var formData = new FormData($(this)[0]);
  
       if($(".proposal_wrpr").css("display") == "block"){
         $(".proposal_wrpr").hide();
       }
       
      $.ajax({
        url: "Chat/sendmsg", 
        type: 'POST',
        data: formData,
        async: false,
        dataType: "text",
        success: function (html) { 
            $('.attach_waper').html('');
            $("#main_form").trigger("reset");
            if(html=="1"){
                $('#failresponse').html('Something went wrong. Please try again later.');
                $('#fail_response').modal('show');
                
            }else if(html=="2"){
                $('#failresponse').html('Proposal Already sent.');
                $('#fail_response').modal('show');
            }else if(html=="3"){
                $('#failresponse').html('You cant send the proposal to your own job.');
                $('#fail_response').modal('show');
            }else if(html=="4"){
                $('#failresponse').html('You cant send the Invoice to your own job.');
                $('#fail_response').modal('show');
            }else if(html=="5"){
                $('#failresponse').html('Invoice Already sent.');
                $('#fail_response').modal('show');
            }else if(html=="6"){
                $('#failresponse').html('This job has nothing in escrow.');
                $('#fail_response').modal('show');
            }else if(html=="7"){
                $('#failresponse').html('Wait for the Client to respond to your prior sent Extension Time Request.');
                $('#fail_response').modal('show');
            }else if(html=="8"){
                $('#failresponse').html('Wait for the Client to respond to your message sent.');
                $('#fail_response').modal('show');
            }else if(html=="9"){
                $('#failresponse').html('Job has been awarded to some one else..');
                $('#fail_response').modal('show');
            }else if(html=="10"){
                $('#failresponse').html('Deposit request already sent.');
                $('#fail_response').modal('show');
            }else if(html=="11"){
                $('#failresponse').html('Refund request already sent.');
                $('#fail_response').modal('show');
            }else{
                
                $("#wrpr_all_msgs").append(html);
                $("#wrpr_all_msgs").scrollTop(8500);
            }
          
          
        },
        cache: false,
        contentType: false,
        processData: false
      });
    
    }));
	
	$(document).on('submit','#main_form_services',(function(e){
        
       e.preventDefault();
       e.stopImmediatePropagation();
     
       var formData = new FormData($(this)[0]);
        
  
       if($(".proposal_wrpr").css("display") == "block"){
         $(".proposal_wrpr").hide();
       }

      
      $.ajax({
        url: "ChatServices/sendmsg", 
        type: 'POST',
        data: formData,
        async: false,
        dataType: "text",
        success: function (html) { 
            $('.attach_waper').html('');
            $("#main_form_services").trigger("reset");
            if(html=="1"){
                $('#failresponse').html('Something went wrong. Please try again later.');
                $('#fail_response').modal('show');
                
            }else if(html=="2"){
                $('#failresponse').html('Proposal Already sent.');
                $('#fail_response').modal('show');
            }else if(html=="3"){
                $('#failresponse').html('You cant send the proposal to your own job.');
                $('#fail_response').modal('show');
            }else if(html=="4"){
                $('#failresponse').html('You cant send the Invoice to your own job.');
                $('#fail_response').modal('show');
            }else if(html=="5"){
                $('#failresponse').html('Invoice Already sent.');
                $('#fail_response').modal('show');
            }else if(html=="6"){
                $('#failresponse').html('This Service has nothing in escrow.');
                $('#fail_response').modal('show');
            }else if(html=="7"){
                $('#failresponse').html('This Service time extension already sent.');
                $('#fail_response').modal('show');
            }else if(html=="8"){
                $('#failresponse').html('The deposit request already sent.');
                $('#fail_response').modal('show');
            }else if(html=="9"){
                $('#failresponse').html('The Refund request already sent.');
                $('#fail_response').modal('show');
            }else{
                
                $("#wrpr_all_msgs").append(html);
                $("#wrpr_all_msgs").scrollTop(1000000);
            }
          
          
        },
        cache: false,
        contentType: false,
        processData: false
      });
    
    }));


    
    var catid = $("#category").val();
    
    $.ajax({
        url: "Completeprofile/get_subcat",
        cache: false,
        type: "POST",
        data: {catid : catid},
        success: function(html){ 
            $("#sub_Category").html(html);
        }
    });
    
    $(document).on('change','#upload_icon0',function(){
            
        $("#upload_portolio").submit();
    
    });
});function shareOverrideOGMeta(overrideLink, overrideTitle, overrideDescription)	{		FB.ui({			method: 'share_open_graph',			action_type: 'og.likes',			action_properties: JSON.stringify({				object: {					'og:url': overrideLink,					'og:title': overrideTitle,					'og:description': overrideDescription				}			})		});	}