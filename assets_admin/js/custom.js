
$( document ).ready(function() {
    
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
    
    $(document).on('click','.reject_proposal',function(){
            
        var id = $(this).data("value");
        $.ajax({
              url: "Chat/reject_proposal",
              cache: false,
              type: "POST",
              data: {id : id},
              success: function(html){ 
                  if(html==1){
                      
                  }else{
                    $("#wrpr_pro_section_"+id).html("<div class='reject_button btn btn-danger'>Rejected</div>");
                  }
              }
        });
    });
    
    $(document).on('click','.cancelinvoice',function(){
            
        var id = $(this).data("value");
        $.ajax({
              url: "Chat/cancelinvoice",
              cache: false,
              type: "POST",
              data: {id : id},
              success: function(html){ 
                  
                    $("#outer_Wrpr_"+id).remove();
                  
              }
        });
    });
    
    $(document).on('click','#edit_email',function(){
        $(this).hide();
        $("#edit_btn").show();
    });
    
    $(document).on('keyup','#credits_purchased',function(){
        
        var singlecreditprice = $("#singlecreditprice").html();
        var totalcredits = $("#credits_purchased").val();
        var totalamt = singlecreditprice*totalcredits;
        $("#finalamt").html("$"+totalamt);
        $("#total_money").val(totalamt);
    });
    
    
    $(document).on('click','.reject_invoice',function(){
            
        var id = $(this).data("value");
        $.ajax({
              url: "Chat/reject_invoice",
              cache: false,
              type: "POST",
              data: {id : id},
              success: function(html){ 
                  
                    $("#outer_Wrpr_"+id).remove();
                  
              }
        });
    });
    
    
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
    
    $("#wrpr_all_msgs").scrollTop($(document).height());
    
    $(document).on("click",".send_button",function(){
        $('#main_form').attr('action',"Chat/sendmsg");
        $(".sndsimplemsg").submit();
    });
    
    $(document).on("click","#sendinv",function(){
        $('#main_form').attr('action',"Chat/sendinvoice");
        $(".sndsimplemsg").submit();
    });
    
    $(document).on('submit','.sndsimplemsg',(function(e){

      e.stopImmediatePropagation();
      var formData = new FormData($(this)[0]);
     
        $.ajax({ 
            url : $('#main_form').attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            dataType: "text",
            success: function (html) { 
                
                 $('.chat_web').trigger("reset");
                 
                if(html=="1"){
                    alert("Something went Wrong, pls try again later.");
                }else if(html=="2"){
                    alert("Client has not responded to your proposal. Please wait.");
                }else{
                    $("#wrpr_all_msgs").append(html);
                    $("#wrpr_all_msgs").scrollTop($(document).height());
                }
                
                 
            },
            cache: false,
            contentType: false,
            processData: false
        });
    
    }));
    
    $(document).on("click","#sendsimplemsgsrvc",function(){
        $('#main_form').attr('action',"Chat/sendmsgservice");
        $(".sndsimplemsgservc").submit();
    });
    
    $(document).on('submit','.sndsimplemsgservc',(function(e){

      e.stopImmediatePropagation();
      var formData = new FormData($(this)[0]);
     
        $.ajax({ 
            url : $('#main_form').attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            dataType: "text",
            success: function (html) { 
                
                 $('.chat_web').trigger("reset");
                 
                if(html=="1"){
                    alert("Something went Wrong, pls try again later.");
                }else if(html=="2"){
                    alert("Client has not responded to your proposal. Please wait.");
                }else if(html=="3"){
                     alert("You cant send the proposal to your freelancer.");
                }else if(html=="4"){
                     alert("You have already sent the invoice.Please wait for the client.");
                }else{
                    $("#wrpr_all_msgs").append(html);
                    $("#wrpr_all_msgs").scrollTop($(document).height());
                }
                
                 
            },
            cache: false,
            contentType: false,
            processData: false
        });
    
    }));
    
    $(document).on("click","#sendinvsrvc",function(){
        $('#main_form').attr('action',"Chat/sendinvoicesrvc");
        $(".sndsimplemsgservc").submit();
    });
    
    
    
});