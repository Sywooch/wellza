/************************************************************************************************************************//**
 *  Filename: my-availability.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js realted stuff for my availability page.It will manage the availablity
 *  calender for the provider.The provider can add his availabilities accordingly
 ***************************************************************************************************************************/
var prev = null;
var curr = null;
var next = null;
$("#preloader").hide();

$(window).load(function() {
 doOnLoad();
});

//------------- Loads the calender with its data  ------------
function doOnLoad() {
    $("#preloader").show();
    var pageurl = $("#pageurl").val()+'/load-data';
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
    var calendar = scheduler.renderCalendar({
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
scheduler.attachEvent("onEventAdded",function(id,data){
    var pageurl = $("#pageurl").val()+'/add-availablity';
    var start_date = data.start_date;
    var end_date = data.end_date;
        
    var on_date = start_date.getFullYear()+'-'+("0" + (start_date.getMonth() + 1)).slice(-2)+'-'+start_date.getDate(); 
    var from_time = (start_date.getHours()<10?'0':'') + start_date.getHours()+':'+(start_date.getMinutes()<10?'0':'') + start_date.getMinutes()+':00'; 
    var to_time = (end_date.getHours()<10?'0':'') + end_date.getHours()+':'+(end_date.getMinutes()<10?'0':'') + end_date.getMinutes()+':00'; 
        
    $("#preloader").show();
    ajaxCall(pageurl,on_date,from_time,to_time,'','added');
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------------- This will be called when availability is update and saved  -----------------------------------------------------

scheduler.attachEvent("onEventChanged",function(id,data){
    var pageurl = $("#pageurl").val()+'/update-availablity';
    var start_date = data.start_date;
    var end_date = data.end_date;
   
    var on_date = start_date.getFullYear()+'-'+("0" + (start_date.getMonth() + 1)).slice(-2)+'-'+start_date.getDate(); 
    var from_time = (start_date.getHours()<10?'0':'') + start_date.getHours()+':'+(start_date.getMinutes()<10?'0':'') + start_date.getMinutes()+':00'; 
    var to_time = (end_date.getHours()<10?'0':'') + end_date.getHours()+':'+(end_date.getMinutes()<10?'0':'') + end_date.getMinutes()+':00'; 
        
    $("#preloader").show();
    ajaxCall(pageurl,on_date,from_time,to_time,id,'updated');
    
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//---------------------------------- This will be called when click on the event delete (cross) icon ----------------------------------------

scheduler.attachEvent("onConfirmedBeforeEventDelete",function(id,data){
    var pageurl = $("#pageurl").val()+'/delete-availablity';
    var start_date = data.start_date;
    var end_date = data.end_date;
   
    var on_date = start_date.getFullYear()+'-'+("0" + (start_date.getMonth() + 1)).slice(-2)+'-'+start_date.getDate(); 
    var from_time = (start_date.getHours()<10?'0':'') + start_date.getHours()+':'+(start_date.getMinutes()<10?'0':'') + start_date.getMinutes()+':00'; 
    var to_time = (end_date.getHours()<10?'0':'') + end_date.getHours()+':'+(end_date.getMinutes()<10?'0':'') + end_date.getMinutes()+':00'; 
    $("#preloader").show();
    
    ajaxCall(pageurl,on_date,from_time,to_time,id,'deleted');
    //scheduler.load(pageurl);
    return true;
});
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------- Common function to call ajax on availability add/edit/delete --------------------------------------

function ajaxCall(pageurl,on_date,from_time,to_time,event_id,type) {
        
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'on_date': on_date,'from_time':from_time,'to_time':to_time,'event_id':event_id },
        success: function (data, status) {
           $("#preloader").hide();
            bootbox.alert("Availability "+type+" successfully!");
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
// EOF: my-availability.js
/*************************************************************************************************************************************/