/************************************************************************************************************************//**
 *  Filename: inner_footer.js
 *  Created: Codian Team
 *  Description: This will manages ajax and all the js realted stuff for some common operations in the whole site
 ***************************************************************************************************************************/

$(document).ready(function () {
        //$('#dob').datepicker({
        //    format: "dd-mm-yyyy"
        //});
        $('.leftmenubutton').click(function () {
            $('body').toggleClass('showhide-menu');
        });
        $('#delivery_date').datetimepicker({
        format:'MM/YYYY'        
         
    });
    
    
         $("#delivery_date").on("dp.change", function (e) {
          
            var d = $('#delivery_date').data("DateTimePicker").date();
            
            var dt = new Date(d);
            document.getElementById('delivery_date').value = dt.getMonth()+1 +'/'+dt.getFullYear();
            $('#delivery_date').data("DateTimePicker").format('MM/YYYY');
        });
        
        $("#delivery_date").click(function(){
            
            $('#delivery_date').data("DateTimePicker").format('MM/YYYY');
            
        });
        $("#delivery_date").on("dp.update", function (e) {
            $('#delivery_date').data("DateTimePicker").format('MM/YYYY');        
            
        });
                               
        
        function resize()
        {
            var heights = window.innerHeight;
            var footerh = $(".inner-footer").height();
            document.getElementById("inner-content").style.minHeight = heights - footerh + "px";
        }
        resize();
        function resizemenu() {
            var heightorange_div = $(".customer-side-menu .orange_box").innerHeight();
            $(".customer-side-menu .menu-list").css('height', $(window).height() - heightorange_div);
        }
        resizemenu();
        window.onresize = function () {
            resize();
            resizemenu();
        };

        $(window).on("load", function () {
            $(".customer-side-menu .menu-list").mCustomScrollbar({
                axis: "y", // horizontal scrollbar
                autoHideScrollbar: true
            });

        });

        function reposition() {
            var modal = $(this),
                    dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));

        }
        $('.modal').on('show.bs.modal', reposition);
        $(window).on('resize', function () {
            $('.modal:visible').each(reposition);
        });

        function ButtonText() {
            if ($(".membership-info-next").is(":visible")) {
                $(".next-div").text("BACK");
            } else {
                $(".next-div").text("MORE INFO");
            }
        }

        ButtonText();

        $(".next-div").click(function () {
            $(this).toggleClass('btn-disable');
            $(".membership-info").toggle();
            $(".membership-info-next").toggle();
            ButtonText();
        });

        $(document).on('click','#edit_profile',function () {
            $('.edit_profile').show();
            $('#view_profile').hide();

        });

//   ==============for side menu overlay   =======================//  
        $(function () {
            $('.leftmenubutton').click(function () {
                if ($('body').hasClass('showhide-menu')) {
                    $(".body-overlay").fadeIn(300);
                }
                else {
                    $(".body-overlay").fadeOut(300);
                }
            });
        });

        $('.body-overlay').click(function () {
            $('.leftmenubutton').trigger('click');
        });

        $('#manage_profile').click(function () {
            $('.leftmenubutton').trigger('click');
            
        });
       // $('#manage_profilemodal').click(function () {
       //     $('#manage-profile-modal').modal('hide');
       //     $('.leftmenubutton').trigger('click');           
            
        //});       
        
        $('#wellza_membership').click(function () {
            $('.leftmenubutton').trigger('click');
        });
        $('#close_menu').click(function () {
            $('.leftmenubutton').trigger('click');
        });

    });

//   ============== xxxxxxxxxxxxxxxxxxx ===============//  


    $("[name='on-off-switch']").bootstrapSwitch();

//   ============== xxxxxxxxxxxxxxxxxxx ===============//  


    $(document).ready(function() {
        $(".plus-icio").click(function () {
           $(this).toggleClass("arrow-white");
        });
     });
      $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        
  //=============== prodcut qty counter==================//
        var action;
        $(".checkout-spinner button").mousedown(function () {
            btn = $(this);
            input = btn.closest('.checkout-spinner ').find('input');
            btn.closest('.checkout-spinner ').find('button').prop("disabled", false);

            if (btn.attr('data-dir') == 'up') {
                action = setInterval(function () {
                    if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                        input.val(parseInt(input.val()) + 1);
                    } else {
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            } else {
                action = setInterval(function () {
                    if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                        input.val(parseInt(input.val()) - 1);
                    } else {
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            }
        })
        .mouseup(function () {
            clearInterval(action);
        });
  //===============end prodcut qty counter==================//
    });
    
//------------------------------------------ Fill the cart with the data of commodity -------------------------------------------
     $(document).ready(function(){
        showCart(); 
     });
     
     function showCart() {
        var siteurl = $("#siteurl").val();
        var url = siteurl + 'cart/show-cart';
        $.ajax({
            url: url,
            type: 'GET',
            data: {},
            async: false,
            success: function (res)
            {
                if(typeof res != 'undefined') {
                    $('#mincart_block > li').remove();
                    $("#checkout-btn").remove();
                    $(".no-item-cart").remove();
                    $('#mincart_block').append(res);
                }                
            }
        });
    }
    
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------    

//------------------------------------------ Removed the items from the cart -------------------------------------------
     function removeFromCart(id,commodity_type) {
        var siteurl = $("#siteurl").val(); 
        bootbox.confirm("Are you sure?", function(result) {
        if(result){
            var url = siteurl + 'cart/remove-cart';
            $.ajax({
                url: url,
                type: 'POST',
                data:{id:id,'commodity_type':commodity_type},
                dataType: 'JSON',
                async: false,
                success: function (res)
                {
                    $('#cartcount').text(res.count);
                    showCart();
                    bootbox.alert('Product removed successfully.');
                    //location.reload();
                                        
                    if(res.count == 0) {
                        var siteurl = $("#siteurl").val();
                        window.location.href =  siteurl + 'client/book-appointment'
                    }

                }
            });
        }else{
            return;
        }
    });
          
        
    }
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------    

//------------------------------------------ Ajax call for the view profile  -------------------------------------------
    
    $("#manage_profilemodal").click(function(){
        $('.leftmenubutton').trigger('click'); 
        var siteurl = $("#siteurl").val();
        var current_user_url = $("#current_user_url").val();
        var url = current_user_url + '/my-profile/view-profile';
        $.ajax({
            url: url,
            type: 'GET',
            data: {},
            //async: false,
            success: function (res)
                {
                    if(typeof res != 'undefined') {

                        //$('#manage-profile-modal').modal('show').find('.modal-content').load(res);
                        $('#manage-profile-modal').modal('show');
                        $("#manage-profile-modal").html(res);
                        
                    }                    
                }
        });
    });
    

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------ Ajax call for the membership subscription  -------------------------------------------
$("#start_membership").click(function(){
    var cart_url = $("#cart_url").val();
    console.log(cart_url);
    cart_url = cart_url + '/add-to-cart';
    
    $.ajax({
        url: cart_url,
        type: 'post',
        data: {'add': 'add','commodity_type':'wellza_membership'},
        success: function (data, status) {
            var returndata = jQuery.parseJSON(data);
            $("#cartcount").text(returndata.count);
            showCart();
            bootbox.alert("Commodity Added successfully");
            location.reload();    
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax cal
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------ Ajax call for Save customer credit card -------------------------------------------

$("#save_card").click(function(e){
    var cart_url = $("#cart_url").val();
    e.preventDefault();
    
    cart_url = cart_url + '/add-credit-card';
    var card = $("#stripepayment-add_card").val();
    var card_name = $("#stripepayment-card_name").val();
    var card_number = $("#stripepayment-creditcard_number").val();
    var card_date = $("#delivery_date").val();
    var card_cvc = $("#stripepayment-creditcard_cvv").val();
    if(card == '' || card_name == '' || card_number =='' || card_date == '' || card_cvc == '') {
        bootbox.alert("Please fill all the required fields");
    } else {        
        $.ajax({
        url: cart_url,
        type: 'post',
        data: {'card': card,'card_name':card_name,'card_number':card_number,'card_date':card_date,'card_cvc':card_cvc},
        success: function (data, status) {
            //var returndata = jQuery.parseJSON(data);
            bootbox.alert("Card Added successfully");
            //location.reload();    
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
        }); // end ajax cal
    }
    
});

//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------

/*************************************************************************************************************************************/
// EOF: inner_footer.js
/*************************************************************************************************************************************/