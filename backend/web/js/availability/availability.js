/************************************************************************************************************************//**
 *  Filename: availability.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js realted stuff for service provider availability
 ***************************************************************************************************************************/

//------------- Owlcarousal intialization for provider slider  ------------

$('#serviceproviderlist_slider').owlCarousel({
    loop: false,
    margin: 10,
    dots: true,
    nav: true,
    center: true,
    responsive: {
        0: {
            items: 6
        },
        768: {
            items: 10
        },
        1000: {
            items: 9
        }
    },
    navText: ["<img src='../assets/images/left-arrow.png'>", "<img src='../assets/images/right-aarow.png'>"]

});

$('#serviceproviderlist_slider').on('click', '.owl-item', function (e) {
    var carousel = $('#serviceproviderlist_slider').data('owl.carousel');
    e.preventDefault();
    carousel.to(carousel.relative($(this).index()));
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

$(document).ready(function(){
    var prev = null;
    var curr = null;
    var next = null;
    var calendar;
    $("#preloader").hide();
})

//------------- Loads the calender for particular provider ------------

$(".av_provider_id").click(function(){
    var user_id = $(this).attr('id');
    $("#providerid").val(user_id);
    $("#preloader").show();
    var pageurl = $("#pageurl").val() + '/load-data/?user_id=' +user_id ;
    
    
    //doOnLoad(user_id)
    scheduler.clearAll();
    scheduler.load(pageurl);
   
    //scheduler.updateCalendar(calendar, new Date(2013,01,01));
      
    //scheduler.updateCalendar(calendar, new Date(), "day");
    
    $("#preloader").hide();
});
$(window).load(function () {
    doOnLoad();
});

//------------- Loads the calender with its data  ------------
function doOnLoad(id) {
    $("#preloader").show();
    var user_id;
    if(id) {
        user_id = id;
    } else {
        user_id = $('#providerid').val();
    }
    
       
    var pageurl = $("#pageurl").val() + '/load-data/?user_id=' +user_id ;
    document.getElementById('adevent').onclick = function () {
        var month = scheduler._date.getMonth() + 1;
        var year = scheduler._date.getFullYear();
        var dataarray = scheduler._date.toString();
        var data = dataarray.split(" ");
        var dayy = data[2];
        var startdate = data[2] + '-' + month + '-' + year + ' 09:00';
        scheduler.config.now_date = new Date(year, month - 1, data[2], 9, 0);

        var enddate = data[2] + '-' + month + '-' + year + ' 09:00';

        var eventId = scheduler.addEvent({
            start_date: startdate,
            end_date: enddate,
            text: "Meeting"
        });

        scheduler.showLightbox(eventId);
        scheduler.setCurrentView();

    }

    scheduler.config.multi_day = true;
    scheduler.config.xml_date = "%Y-%m-%d %H:%i";
    scheduler.config.hour_date = "%h:%i %a";
    scheduler.config.first_hour = 9;
    scheduler.config.last_hour = 20;

    scheduler.init('scheduler_here', new Date(), "day");
    //scheduler.init('scheduler_here',new Date(2014,9,11),"day");
    scheduler.load(pageurl);
     
    //alert(scheduler);
     calendar = scheduler.renderCalendar({
        container: "cal_here",
        navigation: true,
        handler: function (date) {
            scheduler.setCurrentView(date, scheduler._mode);
        }
    });
    scheduler.linkCalendar(calendar);
    scheduler.setCurrentView(scheduler._date, scheduler._mode);
    $("#preloader").hide();
}
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------------- This will be called when click on the event save icon -----------------------------------------------------
scheduler.attachEvent("onEventAdded", function (id, data) {
    var user_id = $("#providerid").val();
    
    var pageurl = $("#pageurl").val() + '/add-availablity/?user_id=' +user_id ;
    var start_date = data.start_date;
    var end_date = data.end_date;

    var on_date = start_date.getFullYear() + '-' + ("0" + (start_date.getMonth() + 1)).slice(-2) + '-' + start_date.getDate();
    var from_time = (start_date.getHours() < 10 ? '0' : '') + start_date.getHours() + ':' + (start_date.getMinutes() < 10 ? '0' : '') + start_date.getMinutes() + ':00';
    var to_time = (end_date.getHours() < 10 ? '0' : '') + end_date.getHours() + ':' + (end_date.getMinutes() < 10 ? '0' : '') + end_date.getMinutes() + ':00';

    $("#preloader").show();
    ajaxCall(pageurl, on_date, from_time, to_time, '', 'added');
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------------- This will be called when availability is update and saved  -----------------------------------------------------

scheduler.attachEvent("onEventChanged", function (id, data) {
    var user_id = $("#providerid").val();
    var pageurl = $("#pageurl").val() + '/update-availablity/?user_id=' +user_id ;
    var start_date = data.start_date;
    var end_date = data.end_date;

    var on_date = start_date.getFullYear() + '-' + ("0" + (start_date.getMonth() + 1)).slice(-2) + '-' + start_date.getDate();
    var from_time = (start_date.getHours() < 10 ? '0' : '') + start_date.getHours() + ':' + (start_date.getMinutes() < 10 ? '0' : '') + start_date.getMinutes() + ':00';
    var to_time = (end_date.getHours() < 10 ? '0' : '') + end_date.getHours() + ':' + (end_date.getMinutes() < 10 ? '0' : '') + end_date.getMinutes() + ':00';

    $("#preloader").show();
    ajaxCall(pageurl, on_date, from_time, to_time, id, 'updated');

});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//---------------------------------- This will be called when click on the event delete (cross) icon ----------------------------------------

scheduler.attachEvent("onConfirmedBeforeEventDelete", function (id, data) {
    var user_id = $("#providerid").val();
    var pageurl = $("#pageurl").val() + '/delete-availablity/?user_id=' +user_id ;
    var start_date = data.start_date;
    var end_date = data.end_date;

    var on_date = start_date.getFullYear() + '-' + ("0" + (start_date.getMonth() + 1)).slice(-2) + '-' + start_date.getDate();
    var from_time = (start_date.getHours() < 10 ? '0' : '') + start_date.getHours() + ':' + (start_date.getMinutes() < 10 ? '0' : '') + start_date.getMinutes() + ':00';
    var to_time = (end_date.getHours() < 10 ? '0' : '') + end_date.getHours() + ':' + (end_date.getMinutes() < 10 ? '0' : '') + end_date.getMinutes() + ':00';
    $("#preloader").show();

    ajaxCall(pageurl, on_date, from_time, to_time, id, 'deleted');
    //scheduler.load(pageurl);
    return true;
});
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------- Common function to call ajax on availability add/edit/delete --------------------------------------

function ajaxCall(pageurl, on_date, from_time, to_time, event_id, type) {

    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'on_date': on_date, 'from_time': from_time, 'to_time': to_time, 'event_id': event_id},
        success: function (data, status) {
            $("#preloader").hide();
            bootbox.alert("Availability " + type + " successfully!");
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });
    return true;
}


//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

/*************************************************************************************************************************************/
// EOF: availability.js
/*************************************************************************************************************************************/