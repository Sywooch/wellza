$(document).ready(function () {
    $('#birth_date').datetimepicker({
        format: "L"
    });

    $('#city').attr('disabled', true);
    $("#saveimg").hide();
    
});

/*************************************************** province select box change js starts here *******************************************************/

$('#province').on('change', function () {
    $('#city').attr('disabled', true);
    $('.selectpicker').selectpicker('refresh');
    $('#city').val("");
    var state_id = $(this).val();
    var siteurl = $("#siteurl").val();
    var pageurl = $("#pageurl").val();
    pageurl = pageurl + '/province-city';
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'state_id': state_id},
        success: function (data, status) {
            var returndata = jQuery.parseJSON(data);
            var options = '';
            options += '<option value="">City</option>';
            $.each(returndata, function (i, d) {
                options += '<option value="' + d.city_id + '">' + d.city_name + '</option>';
            });
            $('#city').html(options);
            $('.selectpicker').selectpicker('refresh');
            $('.field-city .bootstrap-select').removeClass('disabled');
            $('.field-city .bootstrap-select button.dropdown-toggle').removeClass('disabled');
            $('.selectpicker').prop("disabled", false);

        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
});

$("#cancelimg").click(function(){
   $("#light").hide();
   $("#fade").hide();
   $(".cropped").html('');
   $(".imageBox").removeAttr('style');
});

$("#saveimg").click(function(){
   $("#light").hide();
   $("#fade").hide();
   $(".cropped").html('');
   $(".imageBox").removeAttr('style');
    
});
/*************************************************** province select box change js ends here *******************************************************/

/************************************************************* Image cropbox js starts here*****************************************************************/

window.onload = function() {
        var options =
        {
            imageBox: '.imageBox',
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: 'avatar.png'
        }
        var cropper;
        document.querySelector('#file').addEventListener('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                $("#originalimg").val(e.target.result);
                cropper = new cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        })
        document.querySelector('#btnCrop').addEventListener('click', function(){
            var img = cropper.getDataURL()
            //document.querySelector('.cropped').innerHTML += '<img src="'+img+'">';
            document.querySelector('.cropped').innerHTML = '<img src="'+img+'">';
            $(".profileimg").attr('src',img);
            $("#saveimg").show();
            $("#profile_thumbimg").val(img);
            
        })
        document.querySelector('#btnZoomIn').addEventListener('click', function(){
            cropper.zoomIn();
        })
        document.querySelector('#btnZoomOut').addEventListener('click', function(){
            cropper.zoomOut();
        })
    };

/************************************************************* Image cropbox js ends here*****************************************************************/
//Ajax function to change the category status    
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
            
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
});