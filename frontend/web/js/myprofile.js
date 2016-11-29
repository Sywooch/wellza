/************************************************************************************************************************//**
 *  Filename: myprofile.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js related stuff's for my profile view
 ***************************************************************************************************************************/

$(document).ready(function () {
    
    $("#saveimg").hide();
    
    $( ".hello" ).remove();
    
    var startdate = new Date();
    startdate.setFullYear(startdate.getFullYear() - 40);
    startdate.setDate(startdate.getDate());    
    
    $('#datepicker_birthdate').datetimepicker({
            format: 'L',
            format: "DD-MM-YYYY",
            minDate: startdate,
            
    });

    $("#datepicker_birthdate").on("dp.change", function (e) {
        //var currentdate = new Date(1980,01,01);
        //var d = $('#datepicker_birthdate').data("DateTimePicker").viewDate(startdate);
        
        var d = $('#datepicker_birthdate').data("DateTimePicker").date();
        var dt = new Date(d);
        var month = parseInt(dt.getMonth()+1);
        if(month <10) {
            month = '0'+month;
        }
        var day = dt.getDate();
        if(day <10) {
            day = '0'+day;
        }
        
        document.getElementById('birth_date').value = day +'-'+ month +'-'+dt.getFullYear();
    });
    
    var pageurl = $("#siteurl").val();
    
    //------------- Autocomplete list for provinces ------------
    $("#province").autocomplete({
        source: pageurl+'/provider/my-profile/get-provinces',
        autoFocus: true
    });
    
    //-----------------------------------------------------------
    
    //------------- Autocomplete list for cities ------------
    $("#city").autocomplete({
        source: pageurl+'/provider/my-profile/get-cities'
    });
    
    //-----------------------------------------------------------
    
});
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------------- Fill text field with selected province -----------------------------------------------------

$(document).on('click', "#ui-id-1 li.ui-menu-item", function () {
    document.getElementById("province").value = $(this).text();
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------- Fill text field with selected city ------------------------------------------------------

$(document).on('click', "#ui-id-2 li.ui-menu-item", function () {
    document.getElementById("city").value = $(this).text();
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------- Cancel image click starts here ---------------------------------------------------------

$(document).on('click','#cancelimg',function(){
   $("#light").hide();
   $("#fade").hide();
   //$(".cropped").html('');
   //$(".imageBox").removeAttr('style');
});

//--------------------------------------------- Cancel image click js ends here ---------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

$(document).on('click','#saveimgbtn',function(){
   
    var image_thumb = $('.cropped img').attr('src');
   if(image_thumb !='') {
        //var image = document.getElementById("user-profile_image").files[0];
        
        // console.log(image);

        //var original_image = $('.image-cropbox').attr('src');
        $(".customer-image").attr('src',image_thumb);        
                
        //$('input[name="User[image]"]:hidden').val(original_image);
        $("#light").hide();
        $("#fade").hide();
   } else {
       bootbox.alert('Please choose images');
   } 
    
});

/*************************************************************************************************************************************/
// EOF: myprofile.js
/*************************************************************************************************************************************/