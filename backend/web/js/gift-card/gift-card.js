$(document).ready(function(){
    $("#preloader").hide();
    $(".overlay").hide();
    $(".loaderclass").hide();
});
$(".view-btn").click(function(){
    var id = $(this).attr('id');
    var siteurl = $("#siteurl").val();
    var pageurl = $("#pageurl").val();
    $(".overlay").show();
    $("#preloader").delay(400).show(0);
    pageurl = pageurl + '/gift-card-data';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'id': id},
        success: function (data, status) {
            $(".overlay").hide();
            $("#preloader").hide(0);
            var html = '';
            var returndata = jQuery.parseJSON(data);
                       
            html += '<div class="col-lg-4 col-md-4 col-sm-4 left">';
            html += '<img src="'+siteurl+'resource/images/giftcard.png" class="img-responsive center-block" alt="image">';
            html += '</div>';
            html += '<div class="col-lg-8 col-md-8 col-sm-8">';
            html += '<div class="user-text-detail">';
            html += '<div class="text-gray">Sender Name: <span>'+returndata.from_name+'</span></div>';
            html += '<div class="text-gray">Receiver Name: <span>'+returndata.to_name+'</span></div>';
            html += '<div class="text-gray">Sender Email: <span>'+returndata.from_email+'</span></div>';
            html += '<div class="text-gray">Receiver Email: <span>'+returndata.to_name+'</span></div>';
            html += '<div class="text-gray">Date: <span>'+returndata.delivery_date+'</span></div>';
            html += '<div class="text-gray">Price: <span>$'+returndata.amount+'</span></div>';
            html += '<div class="text-gray">Description:  <span>'+returndata.message+'</span></div>';
            html += '</div>';
            html += '</div>';                                        
            $("#fill_content").text(''); 
            $("#fill_content").append(html); 
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call 
})

//Ajax function to change the giftcard status    
$('input[name="on-off-checkbox"]').on('switchChange.bootstrapSwitch', function (event, state) {
    if(state) {
       $(this).attr('checked',true);
       $(this).attr('title','Enable');
       $(this).attr('data-label-text','Enable');
       $(this).parent().find('.bootstrap-switch-label').text('Enable');
   } else {
       $(this).attr('checked',false);
       $(this).attr('title','Disable');
       $(this).attr('data-label-text','Disable');
       $(this).parent().find('.bootstrap-switch-label').text('Disable');
   }
    var html = '';
    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/change-status';
    var msg = '';
    var id = $(this).attr('id');
    $('#loader-' + id).show();
    $.ajax({
        url: siteurl,
        type: 'post',
        data: {'status': state, 'id': id},
        success: function (data, status) {
            $('#loader-' + id).hide();
            $(".alert").remove();
            html = "<div role='alert' class='alert alert-info'>\n\
                           <button data-dismiss='alert' class='close' type='button'>\n\
                           <span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>Status updated</div>";
            $(".admintable").prepend(html);

            setTimeout(function () {
                $(".alert").slideUp().fadeOut();
            }, 2000);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
});