$(document).ready(function(){
   $(".loaderclass").hide();
   /*
    $('input[name="on-off-checkbox"]').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });*/
  
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

$('input[name="on-off-checkbox"]').bootstrapSwitch('state', true, true);
