/************************************************************************************************************************//**
 *  Filename: wellza-provider.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js related stuff's for wellza provider page
 ***************************************************************************************************************************/

//-------------------------- Intialization and functions  --------------------------------
$(document).ready(function () {
    $(".preloader").hide();

    setTimeout(function () {
        var eq = new Equalizer('.wellza-provider-list .row .resize-box .list-box');
        eq.align();
    }, 100);
});


//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//-------------------------- This add the provider's client's favourite list --------------------------------

$('.checkbox > input[type=checkbox]').click(function(){
    var pageurl = $("#pageurl").val();
    var provider_id = $(this).val();
    var status = '';
    if($(this).is(':checked')) {
        status = 'Active'; 
    }    
    pageurl = pageurl + '/add-to-favourite';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'provider_id': provider_id,'status':status},
        success: function (data, status) {
            if(data == 1) {
                bootbox.alert("Service provider marked as favourite");
            } else {
                bootbox.alert("Service provider is unmarked as favourite");
            }
            
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax cal
});
//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------- Fill the page with the list of review and rating for each provider -------------------------------
$(".reviewcount").click(function () {
    $(".preloader").show();
    var ids = $(this).attr('id');
    var provider_ids = ids.split('reviewcount-');
    var provider_id = provider_ids[1];
    //document.getElementById('provided_to').value = provider_id;

    $(".preloader").css('z-index', '9999');
    var pageurl = $("#pageurl").val() + '/get-reviews';

    $.ajax({
        type: "POST",
        url: pageurl,
        data: {'providerid': provider_id},
        success: function (data) {
            $(".preloader").hide();
            var returndata = jQuery.parseJSON(data);
            //console.log(returndata);
            var html = '';

            for (var i = 0; i < returndata.length; i++) {
                html += '<div class="row feedback-row">';
                html += '<div class="col-lg-2 col-sm-2 p-0">';
                html += '<div class="img-box center-block" style="background-image: url(' + returndata[i].provider_image + ');">';
                html += '</div>';
                html += '<div class="review-by"><div class="rlabel">Reviewd By</div>' + returndata[i].review_by + '</div>';
                html += '</div>';
                html += '<div class="col-lg-10 col-sm-10">';
                html += '<p class="feedback-date pull-right">' + returndata[i].rating_date + '</p>';
                html += '<div class="stars">';
                html += '<input id="input-6" name="input-6" class="rating-loading" data-show-clear="false" value="' + returndata[i].rating + '">';
                html += '</div>';
                html += '<p class="feedback-comment">' + returndata[i].review + '</p>';
                html += '</div>';
               
                html += '</div>';
            }

            document.getElementById('reviewsdata').innerHTML = html;
            $('.rating-loading').rating({displayOnly: true, step: 0.5});
        }
    });
});

//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------