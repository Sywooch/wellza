$(document).ready(function () {
    $("#preloader").hide();
    $(".overlay").hide();
    $(".loaderclass").hide();
    setTimeout(function () {
        $(".alert").remove()
    }, 2000);

    $('.datetimepicker1').datetimepicker({
        format: 'LT'
                //disabledTimeIntervals: [[moment({ h: 0 }), moment({ h: 9 })], [moment({ h: 19}), moment({ h: 24 })]]        
    });

    var counter = 0;
    var next_counter = 2;
    var sub_next_counter = 0;
    var first_time;
    var second_time;

    function get_todays_date() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }

        if (mm < 10) {
            mm = '0' + mm
        }

        today = mm + '/' + dd + '/' + yyyy;
        return today;
    }

    $(document).on('click', '.add_fields', function () {
        var edit = $("#current_operation").val();
        counter = document.getElementById('add_package_counter').value;
        counter++;
        //next_counter = next_counter + 2;       
        ///sub_next_counter = next_counter + 1; 

        $('#add_package_counter').val(counter);
        var html_data = '';
        html_data += '<div class="row del-' + counter + '">';
        html_data += '<div class="col-sm-10 form-group" id="service_package1">';
        html_data += '<div class="row">';
        html_data += '<div class="col-sm-6">';
        html_data += '<div class="row time_duration">';
        html_data += '<div class="col-sm-4 start_time"><input id="start-' + counter + '" data-counter = "' + counter + '" type="text" class="form-control input-lg watch_icon_gray datetimepicker1 first" placeholder="Start Time" value="" name = "Packages[start_time][]"></div>';
        html_data += '<div class="col-sm-1 to">';
        html_data += 'To';
        html_data += '</div>';
        html_data += '<div class="col-sm-4 end_time"><input type="text" id="end-' + counter + '" data-counter = "' + counter + '" class="form-control input-lg watch_icon_gray datetimepicker1 second" placeholder="End Time" value="" name = "Packages[end_time][]"></div>';
        html_data += '</div>';
        html_data += '</div>';
        if (edit != '') {
            html_data += '<div class="col-sm-3"><input id="duration-edit-' + counter + '" type="text" class="form-control input-lg" placeholder="Duration (mins)" readonly = "readonly" name="Packages[minutes_duration][]"></div>';
        } else {
            html_data += '<div class="col-sm-3"><input id="duration-' + counter + '" type="text" class="form-control input-lg" placeholder="Duration (mins)" readonly = "readonly" name="Packages[minutes_duration][]"></div>';
        }

        html_data += '<div class="col-sm-3"><input type="text" id="price-' + counter + '" class="form-control input-lg" placeholder="Price ($)" name="Packages[service_price][]"></div>';
        html_data += '</div>';
        html_data += '</div>';
        html_data += '<div class="col-sm-1 edit_package">';
        html_data += '<ul class="list-unstyled list-inline">';
        html_data += '<li id="' + counter + '" class="deletetag"><a href="javascript:void(0);"><img src="resource/images/delete_icon02.png" alt="delete_icon"></a></li>';
        html_data += '</ul></div></div>';

        if (edit != '') {

            $("#editcontents").append(html_data);
        } else {

            $("#row_conatiner").append(html_data);
        }
        $('.datetimepicker1').datetimepicker({
            format: 'LT'
        });

    });
    var result;
    $(document).on('blur', ".first", function () {
        first_time = $(this).val();
        //console.log(first_time);
        //console.log(get_todays_date()+ ' '+first_time);
        if (typeof first_time != 'undefined' && typeof second_time != 'undefined') {
            var counvar = $(this).attr('data-counter');
            var diff = Math.abs(new Date(get_todays_date() + ' ' + second_time) - new Date(get_todays_date() + ' ' + first_time));
            var minutes = Math.floor((diff / 1000) / 60) + ' mins';
            //console.log('minutes='+minutes);
            //console.log("#duration-"+counvar);
            $("#duration-" + counvar).val(minutes);
            $("#duration-edit-" + counvar).val(minutes);
            //document.getElementById("#duration-"+counvar).value = minutes;
        }
    });

    $(document).on('blur', ".second", function () {
        second_time = $(this).val();
        //console.log(second_time);
        if (typeof first_time != 'undefined' && typeof second_time != 'undefined') {
            var counvar = $(this).attr('data-counter')
            var diff = Math.abs(new Date(get_todays_date() + ' ' + second_time) - new Date(get_todays_date() + ' ' + first_time));
            var minutes = Math.floor((diff / 1000) / 60) + ' mins';
            //console.log('minutes='+minutes);
            //console.log("#duration-"+counvar);
            $("#duration-" + counvar).val(minutes);
            $("#duration-edit-" + counvar).val(minutes);

            //document.getElementById("#duration-"+counvar).value = minutes;
        }
    });
    $(document).on('click', '.deletetag', function () {
        var id = $(this).attr('id');
        var delete_ele = '.del-' + id;
        $('.del-' + id).remove();

        counter--;
        document.getElementById("add_package_counter").value = counter;
    })

})
$(".field-services-category_name .selectpicker").on('change', function () {
    document.getElementById("parent").value = $(this).val();

});

$("#addpackage").click(function (e) {
    $("#current_operation").val('');
    $("#current_operation").val('');
    var categoryid = $("#parent").val();
    var pageurl = $("#pageurl").val();
    if (categoryid == '') {
        alert('Please Choose Service');
        return false;
    } else {
        $(".overlay").show();
        $("#preloader").delay(400).show(0);
        pageurl = pageurl + '/get-subcategory';
        getSubCategories(pageurl, categoryid, 'add', null)
        /*
         $.ajax({
         url: pageurl,
         type: 'post',
         data: {'categoryid': categoryid},
         success: function (data, status) {
         
         var returndata = jQuery.parseJSON(data);
         $("#wellza-package-name").val(returndata.category);
         
         var options = '';
         options += '<option value="">Select Service</option>';
         $.each(returndata.subcategory, function (i, d) {
         options += '<option value="' + i + '">' + d + '</option>';
         });
         $('#subcategories').html(options);
         $('.selectpicker').selectpicker('refresh');
         
         $(".overlay").hide();
         $("#preloader").hide(0);
         
         },
         error: function (xhr, desc, err) {
         console.log(xhr);
         console.log("Details: " + desc + "\nError:" + err);
         }
         });*/ // end ajax call 
    }

});

$(".view-more").click(function (e) {

    $("#current_operation").val('edit');
    var categoryid = $(this).attr('id');
    var subcategoryid = $(this).attr('data-subcategory');
    $("#main_category_id").val(categoryid);
    var pageurl = $("#pageurl").val();
    $(".overlay").show();
    $("#preloader").delay(400).show(0);
    pageurl = pageurl + '/get-subcategory';
    getSubCategories(pageurl, categoryid, 'edit', subcategoryid);

})
//Function to show the data according to the selected category.
function getSubCategories(pageurl, categoryid, condition, subcategoryid) {

    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'categoryid': categoryid, 'subcategoryid': subcategoryid},
        success: function (data, status) {

            var returndata = jQuery.parseJSON(data);
            var html_content = '';
            if (condition == 'add') {
                $("#wellza-package-name").val(returndata.category);
            } else {
                $("#wellza-package-name_edit").val(returndata.category);
            }

            var options = '';
            options += '<option value="">Select Service</option>';
            $.each(returndata.subcategory, function (i, d) {
                options += '<option value="' + i + '">' + d + '</option>';
            });
            if (condition == 'add') {
                $('#subcategories').html(options);
                $('#subcategories').prop('selectedIndex', 1);
                $('.selectpicker').selectpicker('refresh');
            }

            if (condition == 'edit') {
                $('#subcategories_edit').html(options);


                //counter = returndata.slots.length;
                if (returndata.slots != null) {
                    document.getElementById('add_package_counter').value = returndata.slots.length;

                    $('#subcategories_edit option[value="' + subcategoryid + '"]').attr("selected", "selected");
                    for (var j = 0; j < returndata.slots.length; j++) {
                        //counter = j + 1;
                        html_content += '<div class="row filled del-' + j + '">';
                        html_content += '<div class="col-sm-10 form-group" id="service_package' + j + '">';
                        html_content += '<div class="row">';
                        html_content += '<div class="col-sm-6">';
                        html_content += '<div class="row time_duration">';
                        html_content += '<div class="col-sm-5 start_time">';
                        html_content += '<input type="text" id="start-' + j + '" data-counter="' + j + '" name = "Packages[start_time][]" class="form-control input-lg watch_icon_gray datetimepicker1 first" placeholder="Start Time" value="' + returndata.slots[j].start_time + '" readonly = "readonly">';
                        html_content += '</div>';
                        html_content += '<div class="col-sm-1 to">To</div>';
                        html_content += '<div class="col-sm-5 end_time">';
                        html_content += '<input type="text" id="end-' + j + '" data-counter="' + j + '" name = "Packages[end_time][]" class="form-control input-lg watch_icon_gray datetimepicker1 second" placeholder="End Time" value="' + returndata.slots[j].end_time + '" readonly = "readonly">';
                        html_content += '</div></div></div>';
                        html_content += '<div class="col-sm-3">';
                        html_content += '<input type="text" id="duration-edit-' + j + '" data-counter="' + j + '" name="Packages[minutes_duration][]" class="form-control input-lg" placeholder="Duration (mins)" value="' + returndata.slots[j].minutes_duration + ' mins" readonly = "readonly">';
                        html_content += '</div>';
                        html_content += '<div class="col-sm-3">';
                        html_content += '<input id="price-' + j + '" data-counter="' + j + '" type="text" name="Packages[service_price][]" class="form-control input-lg" placeholder="Price" value="' + returndata.slots[j].service_price + '" readonly = "readonly"></div></div></div>';
                        html_content += '<div class="col-sm-2 edit_package">';
                        html_content += '<ul class="list-unstyled list-inline">';
                        html_content += '<li id="' + j + '" class="editicon"><a href="javascript:void(0);"><img src="resource/images/edit_icon02.png" alt="edit_icon"></a></li>';
                        html_content += '<li id="' + j + '" class="deletetag"><a href="javascript:void(0);"><img src="resource/images/delete_icon02.png" alt="delete_icon"></a></li>';
                        html_content += '</ul>';
                        html_content += '</div></div>';
                    }
                    html_content += '<div class="row del-' + j + '">';
                    html_content += '<div class="col-sm-10 form-group" id="service_package' + j + '">';
                    html_content += '<div class="row">';
                    html_content += '<div class="col-sm-6">';
                    html_content += '<div class="row time_duration">';
                    html_content += '<div class="col-sm-5 start_time">';
                    html_content += '<input type="text" id="start-' + j + '" data-counter="' + j + '" name = "Packages[start_time][]" class="form-control input-lg watch_icon_gray datetimepicker1 first" placeholder="Time" value="">';
                    html_content += '</div>';
                    html_content += '<div class="col-sm-1 to">To</div>';
                    html_content += '<div class="col-sm-5 end_time">';
                    html_content += '<input type="text" id="end-' + j + '" data-counter="' + j + '" name = "Packages[end_time][]" class="form-control input-lg watch_icon_gray datetimepicker1 second" placeholder="Time" value="">';
                    html_content += '</div></div></div>';
                    html_content += '<div class="col-sm-3">';
                    html_content += '<input type="text" id="duration-edit-' + j + '" name="Packages[minutes_duration][]" class="form-control input-lg" placeholder="Duration (mins)" value="" readonly = "readonly">';
                    html_content += '</div>';
                    html_content += '<div class="col-sm-3">';
                    html_content += '<input type="text" id="price-' + j + '" data-counter="' + j + '" name="Packages[service_price][]" class="form-control input-lg" placeholder="Price" value=""></div></div></div>';
                    html_content += '<div class="col-sm-2 edit_package add_fields">';
                    html_content += '<ul class="list-unstyled list-inline">';
                    html_content += '<li id="' + j + '"><a href="javascript:void(0);"><img src="resource/images/add_icon02.png" alt="add_icon"></a></li>';
                    html_content += '<li id="' + j + '" class="deletetag"><a href="javascript:void(0);"><img src="resource/images/delete_icon02.png" alt="delete_icon"></a></li>';
                    html_content += '</ul>';
                    html_content += '</div></div>';

                    $("#editcontents").html(html_content);
                    $('.datetimepicker1').datetimepicker({
                        format: 'LT'
                    });
                    document.getElementById('packages-preparation_status_edit').value = returndata.slots[0].preparation_status;
                    $('.selectpicker').selectpicker('refresh');
                } else {
                    html_content += '<div class="row del-0">';
                    html_content += '<div class="col-sm-10 form-group" id="service_package0">';
                    html_content += '<div class="row">';
                    html_content += '<div class="col-sm-6">';
                    html_content += '<div class="row time_duration">';
                    html_content += '<div class="col-sm-5 start_time">';
                    html_content += '<input type="text" id="start-0" data-counter="0" name = "Packages[start_time][]" class="form-control input-lg watch_icon_gray datetimepicker1 first" placeholder="Time" value="">';
                    html_content += '</div>';
                    html_content += '<div class="col-sm-1 to">To</div>';
                    html_content += '<div class="col-sm-5 end_time">';
                    html_content += '<input type="text" id="end-0" data-counter="0" name = "Packages[end_time][]" class="form-control input-lg watch_icon_gray datetimepicker1 second" placeholder="Time" value="">';
                    html_content += '</div></div></div>';
                    html_content += '<div class="col-sm-3">';
                    html_content += '<input type="text" id="duration-edit-0" name="Packages[minutes_duration][]" class="form-control input-lg" placeholder="Duration (mins)" value="" readonly = "readonly">';
                    html_content += '</div>';
                    html_content += '<div class="col-sm-3">';
                    html_content += '<input type="text" id="price-0" data-counter="0" name="Packages[service_price][]" class="form-control input-lg" placeholder="Price" value=""></div></div></div>';
                    html_content += '<div class="col-sm-2 edit_package add_fields">';
                    html_content += '<ul class="list-unstyled list-inline">';
                    html_content += '<li id="0"><a href="javascript:void(0);"><img src="resource/images/add_icon02.png" alt="add_icon"></a></li>';
                    html_content += '</ul>';
                    html_content += '</div></div>';
                    document.getElementById('packages-preparation_status_edit').value = '';
                    $("#editcontents").html(html_content);
                    //$('#subcategories_edit').prop('selectedIndex',0);
                    $('.datetimepicker1').datetimepicker({
                        format: 'LT'
                    });
                }

            }
            //console.log(returndata.slots[0].preparation_status);



            $(".overlay").hide();
            $("#preloader").hide(0);

        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call 

    //return false;
}

//Reset fields
$(".close").click(function () {
    var options = '';

    document.getElementById("wellza-package-name").value = '';
    document.getElementById("wellza-package-name_edit").value = '';

    options += '<option value="">Select Service</option>';
    options += '<option value=""></option>';

    $('#subcategories').html(options);
    $('#subcategories_edit').html(options);
    $('.selectpicker').selectpicker('refresh');
});

$(document).on('click', '.editicon', function () {
    var id = $(this).attr('id');

    $("#start-" + id).removeAttr('readonly');
    $("#end-" + id).removeAttr('readonly');
    $("#price-" + id).removeAttr('readonly');
    $(this).parents().removeClass('filled');
});

$(document).on('change', '#subcategories_edit', function (e) {

    var categoryid = $("#main_category_id").val();
    var pageurl = $("#pageurl").val();
    var subcategoryid = $(this).val();

    $(".overlay").show();
    $("#preloader").delay(400).show(0);
    pageurl = pageurl + '/get-subcategory';
    getSubCategories(pageurl, categoryid, 'edit', subcategoryid);
});
//Ajax function to change the category status    
$('input[name="on-off-checkbox"]').on('switchChange.bootstrapSwitch', function (event, state) {
    //if(state == true)
    //console.log(state); // true | false
    var html = '';
    var siteurl = $("#pageurl").val();
    siteurl = siteurl + '/change-status';
    var msg = '';
    var package_id = $(this).attr('id');
    $('#loader-' + package_id).show();
    $.ajax({
        url: siteurl,
        type: 'post',
        data: {'status': state, 'package_id': package_id},
        success: function (data, status) {
            $('#loader-' + package_id).hide();
            $(".alert").remove();
            html = "<div role='alert' class='alert alert-info'>\n\
                           <button data-dismiss='alert' class='close' type='button'>\n\
                           <span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>Package status updated</div>";
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




