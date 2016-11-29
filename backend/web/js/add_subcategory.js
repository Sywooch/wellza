$(document).ready(function () {
    var siteurl = $("#siteurl").val();
     $("#outPopUp").hide();
    $('#add-category').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 4
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        },
        navText: ["<img src='"+siteurl+"resource/images/modal-arrow-left.png'>", "<img src='"+siteurl+"resource/images/modal-arrow-right.png'>"]

    });
    
    $('body').on('beforeSubmit', 'form#addsubcategories', function () {
     //$("h2.modal-title").html('ADD SUB CATEGORY');   
     var msg;
     
     var form = new FormData($("#addsubcategories")[0]);
     var condition = $("#uploadFile").val();
     if(typeof condition === "undefined"){
        var ext = $("#uploadBtn").val().split('.').pop().toLowerCase();
        
        if($.inArray(ext, ['mp4','png','jpg','jpeg']) == -1) {
            $("#category_msg").html('<span style="color:red">Not a valid banner</span>');
            return false;
        }
     } 
       
        
     // submit form
     $.ajax({
          url: siteurl + 'category/add-category',
          type: 'post',
          data: form,
          processData: false,
          contentType: false,
          success: function (response) {
              
               if(response == 1) {
                   msg = "<span style='color:red'>Please choose icons</span>";
               }
               if(response == 2) {
                   msg = "<span style='color:red'>Category name can't be blank</span>";
               }
               if(response == 3) {
                   msg = "<span style='color:red'>Please choose icons<br>Category name can't be blank</span>";
               }
               if(response == 4) {
                   msg = "<span style='color:red'>Category already exist</span>";
               }
               if(response == 5) {
                   msg = "<span style='color:green'>Category added successfully</span>";
               }
               if(response == 6) {
                   msg = "<span style='color:red'>Record not saved</span>";
               }                
                
                $(".loader_load .fa-spin").hide();
                
                $("#category_msg").html(msg);
                msg = '';
                
                setTimeout(function(){ $("#category_msg").fadeOut().html(msg).fadeIn() }, 2000);
          }
     });
     return false;
});

//Ajax function to change the category status    
    $('input[name="on-off-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
        //if(state == true)
        //console.log(state); // true | false
        
        var siteurl = $("#pageurl").val();
        siteurl = siteurl + '/change-status';
        var msg = '';
        var category_id = $(this).attr('id');
        $('#loader'+category_id).show();
        $.ajax({
            url: siteurl,
            type: 'post',
            //data: {'action' : 'change-status','status' : state},
            data: {'status' : state,'category_id' : category_id},
            
            success: function(data, status) {
               $('#loader'+category_id).hide();
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    });
    
    //Ajax function to delete category
    $(".delete-btn").click(function(){
        var category_id = $(this).attr('name');
        $('#loader'+category_id).show();
        var siteurl = $("#pageurl").val();
        siteurl = siteurl + '/delete-category';
        $.ajax({
            url: siteurl,
            type: 'post',
            data: {'category_id' : category_id},
            
            success: function(data, status) {
               $('#loader'+category_id).hide();
               location.reload();
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    })
    
    $(".color-green").click(function(){
        var category_id = $(this).attr('id');
        $('#current_category_id').val(category_id);
        $("h2.modal-title").html('EDIT SUB CATEGORY');
        $("#current_action").val('edit');
        $("#outPopUp").show();
        
        var siteurl = $("#pageurl").val();
        siteurl = siteurl + '/sub-category-details';
        $.ajax({
            url: siteurl,
            type: 'post',
            data: {'category_id' : category_id},
            
            success: function(data, status) {
                var returndata = jQuery.parseJSON(data);             
                $("."+returndata.class_name).prop("checked", true)
                $("#outPopUp").hide();
                $("#category-name").val(returndata.category_name);
                if(returndata.banner != null) {
                    var banner = returndata.banner.split('/resource/images/banner/');
                    $("#uploadFile").val(banner[1]);
                }
                
                $("#preparation-status").val(returndata.preparation_status);
                $("#description").val(returndata.description);               
               
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    });    
});