/************************************************************************************************************************//**
 *  Filename: inbox.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js related stuff's chat module.It also act as server to raise request.
 ***************************************************************************************************************************/

$(document).ready(function () {
    var options = {
            valueNames: ['name']
        };

    var userList = new List('users', options);
    
    $(".loadmore").hide();
    var pageurl = $("#pageurl").val();
    var socket = io('192.168.0.192:3000');
    //var socket = io('http://prortc.com:8881/');

    $("#message-notification").prop("disabled", true);
    var provider_id = '';
    var data;
    var socketid;
    /*$('#inbox').submit(function () {
     var user_id = document.getElementById('currentuser_id').value;
     var data = {
     from_user_id: user_id,
     to_user_id: window.provider_id,
     message: $('#message-notification').val()
     };
     socket.emit('send-message', data);
     
     $('#message-notification').val('');  
     return false;
     
     });*/
    //----------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------

    //---------------------------------------- This will be called on send button click --------------------------------------------
    //---------------------------------------- server request will be send from here --------------------------------------------

    $(".send-btn").unbind('click');
    $('.send-btn').click(function () {
        var html = '';
        var user_id = document.getElementById('currentuser_id').value;
        var profile_imgae = document.getElementById('profile_imgae').value;
        var message = $('#message-notification').val();

        var data = {
            from_user_id: user_id,
            to_user_id: window.provider_id,
            message: message
        };
        socket.emit('send-message', data);

        html = '<div id="tb-message-box" class="message-box you"><div class="message-box-desc">';
        if (typeof profile_imgae != 'undefined') {
            html += '<img src="' + profile_imgae + '" alt="">';
        }

        var d = new Date();
        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var date = month[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
        var time = d.toLocaleTimeString().toLowerCase();

        var message_date = date + "," + time

        html += '<span class="time-date">' + message_date + '</span>';

        html += '</div>';

        if (typeof message != 'undefined') {
            html += '<div class="message-box-section">';
            html += message;
            html += '</div>';
        }

        html += '</div>';
        $(".message-box").parent().append(html);
        $(".chat-box").mCustomScrollbar("scrollTo", "bottom", {
            scrollEasing: "easeOut"
        });

        html = '';
        $('#message-notification').val('');
        return false;

    });
    //----------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------
    
    //---------------------------------------- This will be called on enter key press --------------------------------------------
    //---------------------------------------- will trigger send button click event --------------------------------------------
    
    $("#message-notification").keypress(function(event){
                
        if(event.keyCode == 13 && !event.shiftKey){
            $( ".send-btn" ).trigger( "click" );
        }
    });
    
    //----------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------
    
    //---------------------------------------- The socket will be called when server emit message --------------------------------------------

    socket.on('recieve-message', function (messages) {
        //console.log(messages); 
        var html = '';
        var innerhtm = '';
        var returndata = jQuery.parseJSON(messages);
        var active = '';
        var isDisabled = $('#message-notification').prop('disabled');
        var cur_user_id = $("#currentuser_id").val();
        
        if (typeof returndata.data.message != 'undefined' && returndata.data.to_user_id == cur_user_id) {
            if ($(".inbox-cnt-box").is("#" + returndata.data.from_user_id)) {
                $("#" + returndata.data.from_user_id).find('.messagecount').show();
                console.log($("#" + returndata.data.from_user_id).hasClass('active'));
                console.log(returndata.data.from_user_id);
                if (!$("#" + returndata.data.from_user_id).hasClass('active')) {
                    innerhtm += '<span class="messagecount">&nbsp;</span>';
                }
                innerhtm += returndata.data.message.substring(0, 40);
                $("#" + returndata.data.from_user_id).find('.message').empty().append(innerhtm);
                $.ajax({
                    url: pageurl + '/change-message-status',
                    type: 'post',
                    data: {'from_user_id': returndata.data.from_user_id},
                    success: function (data, status) {
                        //console.log(data);
                    },
                    error: function (xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                });
                if ($("#" + returndata.data.from_user_id).hasClass('active')) {
                    html = '<div id="tb-message-box" class="message-box me"><div class="message-box-desc">';
                    if (typeof returndata.data.from_profile_image != 'undefined') {
                        html += '<img class="mCS_img_loaded" src="../' + returndata.data.from_profile_image + '" alt="">';
                    }

                    if (typeof returndata.data.message_date != 'undefined') {
                        var d = new Date(returndata.data.message_date);
                        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        var date = month[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
                        var time = d.toLocaleTimeString().toLowerCase();
                        var message_date = date + "," + time

                        html += '<span class="time-date">' + message_date + '</span>';
                    }
                    html += '</div>';

                    if (typeof returndata.data.message != 'undefined') {

                        html += '<div class="message-box-section">';
                        html += returndata.data.message;
                        html += '</div>';
                    }

                    html += '</div>';
                    if (isDisabled != true) {
                        $(".first").hide();
                        $(".message-box").parent().append(html);
                        $(".chat-box").mCustomScrollbar("scrollTo", "bottom", {
                            scrollEasing: "easeOut"
                        });
                    }
                    
                }
                
            }
            
        }
        
        //console.log($(".message-box")[0].append(html));
        html = '';

        return false;
    });
    socket.on('disconnect', function () {
        console.log('Client disconnected');
    });
    //----------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------

    //---------------------------------------- This will call on the user list click in sidebar --------------------------------------------

    $(".inbox-cnt-box").click(function () {
        $(".first").hide();


        $(".message-box").not(':first').remove();
        $(".loadmore").show();
        window.provider_id = '';
        $('.inbox-cnt-box').removeClass('active');
        $(this).addClass('active');
        $(this).find('.messagecount').hide();
        $("#message-notification").prop("disabled", false);
        window.provider_id = $(this).attr('id');

        var user_id = window.provider_id;

        $.ajax({
            url: pageurl + '/get-all-message',
            type: 'post',
            data: {'user_id': user_id},
            success: function (data, status) {
                $(".loadmore").hide();
                $(".message-box").after(data);
                $(".chat-box").mCustomScrollbar("scrollTo", "bottom", {
                    scrollEasing: "easeOut"
                });
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });// end ajax call

    })
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------- Load the scrollbar for user list and chat window ---------------------------------------------------------

$(window).on("load", function () {

    $(".inbox-content .right .chat-box").mCustomScrollbar({
        axis: "y", // horizontal scrollbar
        autoHideScrollbar: true

    });
    $(".inbox-content .inbox-list").mCustomScrollbar({
        axis: "y", // horizontal scrollbar
        autoHideScrollbar: true
    });
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

/*************************************************************************************************************************************/
// EOF: inbox.js
/*************************************************************************************************************************************/





