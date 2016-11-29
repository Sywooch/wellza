$(document).ready(function(){
    $("#preloader").hide();
    $(".overlay").hide();
    $(".loaderclass").hide();
    //$('[data-toggle="tooltip"]').tooltip(); 
});

$(".view-more").click(function(){
    
    var bundle_id = $(this).attr('data-bundle');
    $("#current_bundle_id").val(bundle_id);
    var pageurl = $("#pageurl").val();
    $(".overlay").show();
    $("#preloader").delay(400).show(0);
    pageurl = pageurl + '/get-selected-category';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'bundle_id': bundle_id},
        success: function (data, status) {
            $('.selectpicker').selectpicker('refresh');
            var returndata = jQuery.parseJSON(data);
            var categories = [];
            
            for(var i=0;i<returndata.length;i++){
                var optionVal = returndata[i].category_id;
                $("#categories_edit").find("option[value="+optionVal+"]").prop("selected", "selected");                
            }
            $('.selectpicker').selectpicker('refresh');
            $("#wellza-package-name_edit").val(returndata[0].bundle_name);
            $("#savings_edit").val(returndata[0].savings);
            $("#price_edit").val(returndata[0].price);
            $(".overlay").hide();
            $("#preloader").hide(0);

        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call   
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
        
    var html = '';
    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/change-status';
    var msg = '';
    var bundle_id = $(this).attr('id');
    $('#loader-' + bundle_id).show();
    $.ajax({
        url: siteurl,
        type: 'post',
        data: {'status': state, 'bundle_id': bundle_id},
        success: function (data, status) {
            $('#loader-' + bundle_id).hide();
            $(".alert").remove();
            html = "<div role='alert' class='alert alert-info'>\n\
                           <button data-dismiss='alert' class='close' type='button'>\n\
                           <span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>Bundle status updated</div>";
            $(".admintable02").prepend(html);

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


//Reset fields
$(".close").click(function () {
    
    $("#categories_edit option:selected").removeAttr("selected");
    $('.selectpicker').selectpicker('refresh');
    $("#current_bundle_id").val('');
});


