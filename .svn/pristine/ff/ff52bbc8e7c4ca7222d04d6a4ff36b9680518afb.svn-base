$(document).ready(function(){
    $("#preloader").hide();
    $(".overlay").hide();
    $(".loaderclass").hide();
    var today = new Date();
    today.setDate(today.getDate());    
    $('#coupon-date_start').datetimepicker({
            format: 'L',
            format: "dd/mm/yyyy",
            minDate: today
    });

    $("#coupon-date_start").on("dp.change", function (e) {
        var currentdate = new Date();
        var d = $('#coupon-date_start').data("DateTimePicker").date();
        var dt = new Date(d);
        document.getElementById('coupon-date_start').value = dt.getDate() +'-'+ parseInt(dt.getMonth()+1) +'-'+dt.getFullYear();
    });
    
    $('#coupon-date_end').datetimepicker({
            format: 'L',
            format: "dd/mm/yyyy",
            minDate: today
    });

    $("#coupon-date_end").on("dp.change", function (e) {
        var currentdate = new Date();
        var d = $('#coupon-date_end').data("DateTimePicker").date();
        var dt = new Date(d);
        document.getElementById('coupon-date_end').value = dt.getDate() +'-'+ parseInt(dt.getMonth()+1) +'-'+dt.getFullYear();
    });
    
    $('#date_start_coupon').datetimepicker({
            format: 'L',
            format: "dd/mm/yyyy",
            minDate: today
    });

    $("#date_start_coupon").on("dp.change", function (e) {
        var currentdate = new Date();
        var d = $('#date_start_coupon').data("DateTimePicker").date();
        var dt = new Date(d);
        document.getElementById('date_start_coupon').value = dt.getDate() +'-'+ parseInt(dt.getMonth()+1) +'-'+dt.getFullYear();
    });
    
    $('#date_end_coupon').datetimepicker({
            format: 'L',
            format: "dd/mm/yyyy",
            minDate: today
    });

    $("#date_end_coupon").on("dp.change", function (e) {
        var currentdate = new Date();
        var d = $('#date_end_coupon').data("DateTimePicker").date();
        var dt = new Date(d);
        document.getElementById('date_end_coupon').value = dt.getDate() +'-'+ parseInt(dt.getMonth()+1) +'-'+dt.getFullYear();
    });
});

$("#coupon-discount").blur(function(){
   var code = $("#coupon-code").val();
    code = code +'-' +$(this).val();
    $("#coupon-code").val(code);
});
var bool = ''
$(".edit-btn").click(function(e){
   
    var id = $(this).attr('data-title');
    var siteurl = $("#siteurl").val();
    var pageurl = $("#pageurl").val();
    $(".overlay").show();
    $("#preloader").delay(400).show(0);
    pageurl = pageurl + '/get-coupon-data';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'id': id},
        success: function (data, status) {
            $(".overlay").hide();
            $("#preloader").hide(0);
            
            var returndata = jQuery.parseJSON(data);
            document.getElementById("name_coupon").value = returndata.name;            
            document.getElementById("code_coupon").value = returndata.code;
            document.getElementById("discount_coupon").value = parseInt(returndata.discount);
            document.getElementById("date_start_coupon").value = returndata.date_start;
            document.getElementById("date_end_coupon").value = returndata.date_end;
            document.getElementById("uses_coupon").value = returndata.uses_total;
            document.getElementById("couponid").value = returndata.id;
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
});

   
$(".view-btn").click(function(){
    var id = $(this).attr('data-title');
    var siteurl = $("#siteurl").val();
    var pageurl = $("#pageurl").val();
    $(".overlay").show();
    $("#preloader").delay(400).show(0);
    pageurl = pageurl + '/get-coupon-data';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'id': id},
        success: function (data, status) {
            $(".overlay").hide();
            $("#preloader").hide(0);
            
            var returndata = jQuery.parseJSON(data);
            var html = ''
            html +='<div class="col-lg-4 col-md-4 col-sm-4 left">';
            html +='<img src="'+siteurl+'resource/images/coupon_icon.png" class="img-responsive center-block" alt="image"></div>';
            html +='<div class="col-sm-8 col-md-4 col-lg-4">';
            html +='<div class="user-text-detail">';
            html +='<div class="text-gray">Name: <span>'+returndata.name+'</span></div>';
            html +='<div class="text-gray">Discount: <span>'+parseInt(returndata.discount)+'%</span></div>';
            html +='<div class="text-gray">Start Date: <span>'+returndata.date_start+'</span></div>';
            html +='<div class="text-gray">TOTAL USES: <span>'+returndata.uses_total+'</span></div>';
            html +='</div></div>';
            html +='<div class="col-sm-8 col-sm-offset-4 col-lg-offset-0 col-md-4 col-lg-4">';
            html +='<div class="user-text-detail">';
            html +='<div class="text-gray">Code: <span>'+returndata.code+'</span></div>';
            html +='<div class="text-gray">End Date: <span>'+returndata.date_end+'</span></div></div></div>';            
            $("#fill_coupon_details").html(html);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
});

//Ajax function to change the category status    
$('input[name="on-off-checkbox"]').on('switchChange.bootstrapSwitch', function (event, state) {
    
    var html = '';
    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/change-status';
    var msg = '';
    var id = $(this).attr('data-title');
    $('#loader-' + id).show();
    $.ajax({
        url: siteurl,
        type: 'post',
        data: {'status': state, 'id': id},
        success: function (data, status) {
            $('#loader-' + id).hide();
            $(".alert").remove();
            html = "<div role='alert' class='alert alert-info'>\n\
                           <button data-dismiss='alert' class='close' type='button'>\n\
                           <span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>Coupon status updated</div>";
            $(".admintable").prepend(html);

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

