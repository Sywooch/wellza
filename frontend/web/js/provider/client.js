/************************************************************************************************************************//**
 *  Filename: Client.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js realted stuff for service provider service page
 ***************************************************************************************************************************/

$(document).ready(function () {

//------------------------------------------ Data will be load on Ajax call on page load -------------------------------------------
    $("#preloader").show();
    var pageurl = $("#pageurl").val();
    var siteurl = $("#siteurl").val();
    
    callAjax(0, pageurl, siteurl);
    
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------- Carousal will called from here -----------------------------------------------------
    $('#category_tab').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 3
            },
            361: {
                items: 4
            },
            1000: {
                items: 6
            }
        },
        navText: ["<img src='../resource/images/modal-arrow-left.png'>", "<img src='../resource/images/modal-arrow-right.png'>"]


    }); 
    
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------- This will remove the active class from other icons ----------------------------------------
    
    $(".owl-item li.item").click(function () {
        $(".owl-item li").removeClass('active');
    });
    
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------- Ajax will be called on category icons click ---------------------------------------

    $("#category_tab li a").click(function () {
        $("#preloader").show();
        var category_id = $(this).attr('id');
        document.getElementById('service_id').value = category_id; 
        var pageurl = $("#pageurl").val();
        pageurl = pageurl + '/load-subcategory';
        //var siteurl = $("#siteurl").val();
        callAjax(category_id, pageurl);
    });



});

//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------- Function called on Add button click ---------------------------------------

$("#add_btn").click(function(e){
    e.preventDefault();
});

//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------- Function called on Add Service button click ---------------------------------------

$("#add_servicebtn").click(function(e){
    
    var atLeastOneIsChecked = $('input[name="add_service[]"]:checked').length > 0;
    if(atLeastOneIsChecked == 0) {
        bootbox.alert("Please choose category and its subcategories");
        e.preventDefault();
    }     
});


//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------- This will be called to load subcategory content -------------------------------------------

function callAjax(category_id, pageurl, siteurl) {
        
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'category_id': category_id},
        success: function (data, status) {
            //alert(data);exit;            
            var json = $.parseJSON(data);
            var html_append = '';
            
            var tempcount;
                        
            document.getElementById('sub_service_id').value = json[0].category_id; 
            for (var i = 0; i < json.length; ++i) {   
                tempcount = i + 1;
                html_append += '<div class="category-box item">';
                html_append += '<div class="checkbox category-icon">';
                html_append += '<input type="checkbox" name="add_service[]" id="category-type' + tempcount + '" value="' + json[i].category_id + '"> ';
                html_append += '<label for="category-type' + tempcount + '"><span class="' + json[i].class + '"></span>' + json[i].category_name + '</label>';
                html_append += '</div>';
                html_append += '</div>';
            }
            //html_append += '</div>';
            if (json.length == 0) {
                $("#category_contents div.category-type").html('<div class="row">No Record Found!</div>');
            } else {
                $("#category_contents div.category-type").html(html_append);
                var owl = $('.category-type-slider');
                owl.trigger('destroy.owl.carousel');
                owl.owlCarousel({
                    loop: false,
                    nav: true,
                    dots: false,
                    margin:10,
                    lazyLoad : true,
                    //center:true,
                    responsive: {
                        0: {
                            items: 3
                        },
                        361: {
                            items: 4
                        },
                        1000: {
                            items: 4
                        }
                    },
                    navText: ["<img src='../resource/images/nav-left-arrow.png'>", "<img src='../resource/images/nav-right-arrow.png'>"]
                });
                
                owl.trigger('insertContent.owl',html_append);
                owl.trigger('refresh.owl.carousel');
            }

            $("#preloader").hide();

        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
}

//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

/*************************************************************************************************************************************/
// EOF: Client.js
/*************************************************************************************************************************************/