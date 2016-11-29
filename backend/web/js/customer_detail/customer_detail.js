/************************************************************************************************************************//**
 *  Filename: customer_detail.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js related stuff's for customers module
 ***************************************************************************************************************************/

//------------- All initalization and functions resides here ------------

$(document).ready(function () {
    $('#birth_date').datetimepicker({
        format: "L",
        format: "DD-MM-YYYY",
    });

    //$('#city').attr('disabled', true);
    $("#saveimg").hide();
    
});

//--------------------------------------------- js ends here ---------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

//------------- Autocomplete list for provinces ------------
    var pageurl = $("#pageurl").val();
    $("#province").autocomplete({
        source: pageurl+'/get-provinces',
        autoFocus: true
    });
    
    //-----------------------------------------------------------
    
    //------------- Autocomplete list for cities ------------
    $("#city").autocomplete({
        source: pageurl+'/get-cities'
    });
    
    //-----------------------------------------------------------

//--------------------------------------------- Called on cancel button click ---------------------------------------------------------

$("#cancelimg").click(function(){
   $("#light").hide();
   $("#fade").hide();   
});

//--------------------------------------------- Cancel image click js ends here ---------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------- Called on save button click ---------------------------------------------------------

$(document).on('click','#saveimgbtn',function(){
   
    var image_thumb = $('.cropped img').attr('src');
   if(image_thumb !='') {
        $(".profileimg").attr('src',image_thumb);        
        $("#light").hide();
        $("#fade").hide();
   } else {
       bootbox.alert('Please choose images');
   } 
    
});

//--------------------------------------------- Called on save button click ends here ---------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------- Ajax function to change the category status starts here ---------------------------------------------
    
$('input[name="on-off-checkbox"]').on('switchChange.bootstrapSwitch', function (event, state) {
    //if(state == true)
    //console.log(state); // true | false
    
    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/change-status';
    var user_id = $(this).attr('id');    
    $.ajax({
        url: siteurl,
        type: 'post',
        data: {'status': state, 'user_id': user_id},
        success: function (data, status) {
            location.reload();
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
});

//--------------------------------------------- Ajax function to change the category status ends here ---------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

/*************************************************************************************************************************************/
// EOF: customer_detail.js
/*************************************************************************************************************************************/