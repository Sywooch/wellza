$(document).ready(function(){
   $(".loaderclass").hide(); 
});
//Ajax function to change the category status    
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

    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/change-status';
    var msg = '';
    var user_id = $(this).attr('id');
    $('#loader' + user_id).show();
    $.ajax({
        url: siteurl,
        type: 'post',
        //data: {'action' : 'change-status','status' : state},
        data: {'status': state, 'user_id': user_id},
        success: function (data, status) {
            $('#loader' + user_id).hide();
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
});

//Ajax function to change the category status    
$('.verified').on('switchChange.bootstrapSwitch', function (event, state) {
   if(state) {
       $(this).attr('checked',true);
       $(this).attr('title','Verified');
       $(this).attr('data-label-text','Verified');
       $(this).parent().find('.bootstrap-switch-label').text('Verified');
   } else {
       $(this).attr('checked',false);
       $(this).attr('title','Unverified');
       $(this).attr('data-label-text','Unverified');
       $(this).parent().find('.bootstrap-switch-label').text('Unverified');
   }
    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/change-verification';
    var msg = '';
    var user_id = $(this).attr('id');
    $('#loader' + user_id).show();
    $.ajax({
        url: siteurl,
        type: 'post',
        //data: {'action' : 'change-status','status' : state},
        data: {'status': state, 'user_id': user_id},
        success: function (data, status) {
            $('#loader' + user_id).hide();
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });// end ajax call
});

//Ajax function to change the category status    
$('.delete-btn').click(function(){
    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/delete-provider';
    var msg = '';
    var user_id = $(this).attr('id');
    $('#loader' + user_id).show();
    $.ajax({
        url: siteurl,
        type: 'post',
        data: {'user_id': user_id},
        success: function (data, status) {
            $('#loader' + user_id).hide();
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });// end ajax call
});