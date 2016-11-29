/************************************************************************************************************************//**
 *  Filename: appointment.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js related stuff's for providers appointment 
 ***************************************************************************************************************************/

//-------------------------- Intialization and functions  --------------------------------
$(document).ready(function(){
    $(".preloader").hide();
    
        
});


//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------
//
//-------------------------- This adds the client's id to hidden fields in _rating_review page --------------------------------

$(".client_id").click(function(){
    var client_ids = $(this).attr('id');
    var appointment_id = $(this).attr('data-appointment_id'); 
    var client_id = client_ids.split('userid-');
    document.getElementById('provided_to').value = client_id[1];
    document.getElementById('appointment_id').value = appointment_id;
});
//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------- Submit the data for _rating_review page --------------------------------------------
$("#save_comment").click(function(e){
    e.preventDefault();
    $(".preloader").show();
    $(".preloader").css('z-index','9999');
    var pageurl = $("#pageurl").val() + '/save-review-rating';
    
    $.ajax({
        type: "POST",
        url: pageurl,
        data: $("#provider_rating_review").serialize(), // serializes the form's elements.
        success: function(data) {
            $(".preloader").hide();
            $('.rating-popup').modal('hide');
            setTimeout(function(){
                $('.thankyou-popup').modal('show');
            },300);
             
        }
    });
});
//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------- Fill the page with the list of review and rating for each client -------------------------------
$(".reviewcount").click(function(){
    $(".preloader").show();
    var ids = $(this).attr('id');
    var client_ids = ids.split('reviewcount-');
    var client_id = client_ids[1];
    document.getElementById('provided_to').value = client_id;
    
    $(".preloader").css('z-index','9999');
    var pageurl = $("#pageurl").val() + '/get-reviews';
    
    $.ajax({
        type: "POST",
        url: pageurl,
        data: {'clientid' : client_id},
        success: function(data) {
            $(".preloader").hide();
            var returndata = jQuery.parseJSON(data);
            //console.log(returndata);
            var html = '';
            
            for(var i = 0;i < returndata.length;i++) {
                html += '<div class="row feedback-row">';
                html += '<div class="col-lg-1 col-sm-2 p-0">';
                html += '<div class="img-box center-block" style="background-image: url('+returndata[i].provider_image+');">';
                html += '</div></div>';
                html += '<div class="col-lg-11 col-sm-10">';
                html += '<p class="feedback-date pull-right">'+returndata[i].rating_date+'</p>';
                html += '<div class="stars">';
                html += '<input id="input-6" name="input-6" class="rating-loading" data-show-clear="false" value="'+returndata[i].rating+'">';
                html += '</div>';
                html += '<p class="feedback-comment">'+returndata[i].review+'</p>';
                html += '</div>';
                html += '<span>Reviewd By:'+returndata[i].review_by+'</span>';
                html += '</div>';
            }
            
            document.getElementById('reviewsdata').innerHTML = html;              
            $('.rating-loading').rating({displayOnly: true, step: 0.5}); 
        }
    });
});

//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------
//
//-------------------------- Called on the rating review page pop close button click  --------------------------------

$(".feed_back").click(function(){
   location.reload(); 
});

//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//-------------------------- This add the rating in the heading allows client to see given rating by him  --------------------------------
$(document).on('mousedown','.star',function(){
    document.getElementById('ratecontainer').innerHTML = $('.caption span').text();
    document.getElementById('rating_value').value = $('.caption span').text();    
})
//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//-------------------------- This initialize the rating shown in the heading --------------------------------

$(document).on('mousedown','.clear-rating',function(){
    document.getElementById('ratecontainer').innerHTML = '0.0';
    document.getElementById('rating_value').value = '0.0';
})

//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//-------------------------- Ajax call on cancel appointment --------------------------------

$(".cancel_appointment").click(function(){
    var ids = $(this).attr('id');
    var appointment_ids = ids.split('cancel-');
    var appointment_id = appointment_ids[1];
    
    var pageurl = $("#pageurl").val() + '/cancel-appointment';
    
    bootbox.confirm({
        title: "Appointment",
        message: "Do you want to cancel this appointment.",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancel'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Confirm'
            }
        },
        callback: function (result) {
            $(".preloader").show();
            $(".preloader").css('z-index','9999');
            if(result) {
                $.ajax({
                    type: "POST",
                    url: pageurl,
                    data: {'appointment_id' : appointment_id},
                    success: function(data) {
                        location.reload();
                    }
                });
            } 
            $(".preloader").hide();            
        }
    });
    
})

//------------------------------------------------- Function ends here ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

/*************************************************************************************************************************************/
// EOF: appoinment.js
/*************************************************************************************************************************************/