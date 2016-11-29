$(document).ready(function () {
    //slider js
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
        
    $(".owl-item li.item").click(function () {
        $(".owl-item li").removeClass('active');
    });

    var video;
    video = document.getElementsByName("media-video");
    $("#preloader").show();
    var pageurl = $("#pageurl").val();
    var siteurl = $("#siteurl").val();
    //alert(window.location.href);
    //callAjax(0, pageurl, siteurl);
    $("#category_tab li a").click(function () {
        $("#preloader").show();
        var category_id = $(this).attr('id');
        document.getElementById('categoryid').value = category_id; 
        var pageurl = $("#pageurl").val();
        pageurl = pageurl + '/load-subcategory';
        //var siteurl = $("#siteurl").val();
        callAjax(category_id,0, pageurl);
    });
});

$(window).on("load", function() {
    var pageurl = $("#pageurl").val();
    var siteurl = $("#siteurl").val();
    //alert(window.location.href);
    var category_id = document.getElementById('categoryid').value;
    var subcategoryid = document.getElementById('subcategoryid').value;
    if(category_id != '' && subcategoryid != '') {
        callAjax(category_id,subcategoryid, pageurl, siteurl);
    } else {
        callAjax(0, 0,pageurl, siteurl);
    }
        
});

$("div").on('click', '.radio.category-icon > input[type=radio]', function () {
    var modal_id = '#myModal' + $(this).val();
    //$("#subcategoryid").val($(this).val());
    document.getElementById('subcategoryid').value = $(this).val(); 
    $(".showmodel").attr('data-target', modal_id);

    exit;
    //alert($(this).find($(input[name=radio])).attr('id'));
});


$(".showvideo").hover(function (event) {
    if (event.type === "mouseenter") {
        $(this).attr("controls", "");
    } else if (event.type === "mouseleave") {
        $(this).removeAttr("controls");
    }
});

function callAjax(category_id,subcategoryid, pageurl, siteurl) {
    //$("#categoryid").valcategory_id;
    //console.log(category_id);
    var resource_path = $("#resource_path").val();
    $.ajax({
        url: pageurl,
        type: 'post',
        data: {'category_id': category_id},
        success: function (data, status) {
            //alert(data);exit; 
            var json = $.parseJSON(data);
            //console.log(json[0].category_id);
            //console.log(json.category_id);
            var html_append = '';
            var html_model = '';
            var tempcount;
            var modal_id;
            //console.log(typeof json[0]);
            if(typeof json[0] == 'undefined') {
                
                modal_id = '#myModal' + json.category_id;
                document.getElementById('subcategoryid').value = json.category_id; 
            } else {
                modal_id = '#myModal' + json[0].category_id;
                document.getElementById('subcategoryid').value = json[0].category_id; 
            }
            
            $(".showmodel").attr('data-target', modal_id);
            
            for (var i = 0; i < json.length; ++i)
            {               
                tempcount = i + 1;
                html_append += '<div class="category-box item">';
                html_append += '<div class="radio category-icon">';
                if(subcategoryid != '' && subcategoryid == json[i].category_id) {
                    html_append += '<input type="radio" checked = "checked" name="category-type" id="category-type' + tempcount + '" value="' + subcategoryid + '"> ';
                } else {
                    html_append += '<input type="radio" name="category-type" id="category-type' + tempcount + '" value="' + json[i].category_id + '"> ';
                }
                
                html_append += '<label for="category-type' + tempcount + '"><span class="' + json[i].class + '"></span>' + json[i].category_name + '</label>';
                html_append += '</div>';
                html_append += '</div>';

                html_model += '<div id="myModal' + json[i].category_id + '" class="modal inner-modal fade service-detail-modal" tabindex="-1" role="dialog">';
                html_model += '<div class="modal-dialog modal-lg" role="document">';
                html_model += '<div class="modal-header">';
                html_model += '<button onclick="stopPlayer();" type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="'+resource_path+'/resource/images/cross.png" alt="close"></button>';
                html_model += '</div>';
                html_model += '<div class="modal-content">';
                html_model += '<div class="row">';
                html_model += '<div class="col-lg-12">';
               
                var url = json[i].banner;
                var poster = '';
                
                if (json[i].video_thumbnail != null && typeof json[i].video_thumbnail != 'undefined') {
                    poster = siteurl + json[i].video_thumbnail;
                    poster = poster.replace('//', '/');
                    
                }
                //console.log(url);
                //url = url.replace('resource', 'backend/web/resource');

                if (json[i].banner_type == 'Image') {
                   html_model += '<div id="media-player" class="media_box" style="background-image:url(' + resource_path + url + ')">';
                   // html_model += '<img src="' + resource_path + url + '" alt="' + json[i].banner_type + '" class="img-responsive">';
                } else {

                    html_model += '<video name= "media-video" class="showvideo" width="100%" height="100%" controls preload="auto" width="640" height="264" poster="' + poster + '" >';
                    html_model += '<source src="' + resource_path+url + '" type="video/mp4">';
                    html_model += 'Your browser does not support the video tag.';
                    html_model += '</video>';
                    //html_model += '<div id="media-controls"><button id="play-pause-button" class="play" title="play" onclick="togglePlayPause();">Play</button></div>';

                    //html_model += '<img src="/resource/images/service-video.jpg" alt="'+json[i].banner_type+'" class="img-responsive">';<button id="play-pause-button" class="play" title="play" onclick="togglePlayPause();">Play</button><
                }
                html_model += '</div>';
                html_model += '<div class="product-detail">';

                html_model += '<div class="heading">' + json[i].parent_category_name + '<img src="'+resource_path+'/resource/images/arrow.png" alt="arrow"> <span>' + json[i].category_name + '</span></div>';
                html_model += '<p>' + json[i].description + '</p>';
                html_model += '</div>';
                html_model += '</div>';
                html_model += '</div>';
                html_model += '</div>';
                html_model += '</div>';
                html_model += '</div>';
            }

            //html_append += '</div>';
            if (json.length == 0) {
                $("#category_contents div.category-type").html('<div class="row">No Record Found!</div>');
            } else {
                
                $("#category_contents div.category-type").html(html_append);
                $("main").append(html_model);
                //callSlider();
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
        complete: function (data) {
            //callSlider();
            
       },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
}

function stopPlayer() {
    $("video").each(function () {
        this.pause();
        this.currentTime = 0;
        this.muted = true
    });
}