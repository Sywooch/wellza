$(document).ready(function(){
    $("#preloader").hide();
var today = new Date();
today.setDate(today.getDate());    
$('#datepicker_delivery').datetimepicker({
        format: 'L',
        format: "dd/mm/yyyy",
        minDate: today
});

$("#datepicker_delivery").on("dp.change", function (e) {
            var currentdate = new Date();
                      
            var d = $('#datepicker_delivery').data("DateTimePicker").date();
            
            var dt = new Date(d);
            document.getElementById('gift_datepicker').value = dt.getDate() +'-'+ parseInt(dt.getMonth()+1) +'-'+dt.getFullYear();
            
        });
});
$('#add_card').on('beforeSubmit', function (e) {
    $("#preloader").show();
    //$('#add_card').yiiActiveForm('validate');
    var pageurl = $("#pageurl").val();
    pageurl = pageurl + '/add-to-cart';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: $("#add_card").serialize(),
        success: function (data, status) {
            $("#preloader").hide();
            var returndata = jQuery.parseJSON(data);
            $("#cartcount").text(returndata.count);
            showCart();
            bootbox.alert("Gift Card Added successfully");
            return false;
            //location.reload();
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
            return false;
        }
    });
    return false;
    
});
//$("#add_gift_card").click(function(e){
    //$("#preloader").show();
    //$('#add_card').yiiActiveForm('validate');
     
    //console.log(returndata);
    //e.preventDefault();
    /*var pageurl = $("#pageurl").val();
    pageurl = pageurl + '/add-to-cart';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'add': 'add','commodity_type':'gift_card'},
        success: function (data, status) {
            var returndata = jQuery.parseJSON(data);
            $("#cartcount").text(returndata.count);
            showCart();
            bootbox.alert("Commodity Added successfully");

        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });*/
//});

//$("#add_card").on("afterValidate", function (event, messages) {
  // Now you can work with messages by accessing messages variable
  //var attributes = $(this).data().attributes; // to get the list of attributes that has been passed in attributes property
  //var settings = $(this).data().settings; // to get the settings
  //console.log('called');
//});