$(document).ready(function(){
   $(".loaderclass").hide(); 
});

$("input[type='image']").click(function() {
    $("input[id='product_image']").click();
    return false;
});
$("input[id='product_image']").change(function(){
    readURL(this);
    return false;
});

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#prodimage').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
}

$(".editproduct").click(function() {
    var product_id = $(this).attr('title');
    //$("#manage_product").clearQueue();
    //$("#manage_product").attr('action','manage-product');
    
    //$('#current_category_id').val(category_id);
    $("h2.modal-title").html('EDIT PRODUCTS');
    //$("#current_action").val('edit');
    $("#outPopUp").show();
        
        var siteurl = $("#siteurl").val();
        var pageurl = $("#pageurl").val();
        pageurl = pageurl + '/product-data';        
        $.ajax({
            url: pageurl,
            type: 'post',
            data: {'product_id' : product_id},
            
            success: function(data, status) {
                
                var returndata = jQuery.parseJSON(data);
                var imgurl;
                if(returndata.product_image == '') {
                    imgurl = '';
                } else {
                    imgurl = siteurl + returndata.product_image;
                }
                
                
                $("#product_name").val(returndata.product_name);
                $("#sr_number").val(returndata.sr_number);
                $("#product_ids").val(product_id);
                $("#prodimage").attr('src',imgurl);
                $("#product-main_category.selectpicker").selectpicker('val',returndata.category_id);
                $("#product-sub_category.selectpicker").selectpicker('val',returndata.sub_category_id);
                       
                $("#gross_price").val(returndata.price);
                $("#discount_price").val(returndata.selling_price);
                $("#quantity").val(returndata.quantity);
                $("#product-long_description").val(returndata.long_description);
                $("#outPopUp").hide();                              
               
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    //actionGetProductData
   
});

$("#product_add").click(function(){
    
    var siteurl = $("#siteurl").val();
    var imgurl = siteurl+'resource/images/upload-img.jpg'
    $("#outPopUp").hide();
    $("h2.modal-title").html('ADD PRODUCTS');
    $("#product_name").val('');
    $("#sr_number").val('');
    $("#prodimage").attr('src',imgurl);
    $("#product-main_category.selectpicker").selectpicker('val','');
    $("#product-sub_category.selectpicker").selectpicker('val','');
    $("#gross_price").val('');
    $("#discount_price").val('');
    $("#quantity").val('');
    $("#product-long_description").val('');    
})


//Ajax function to change the category status    
    $('input[name="on-off-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
        //if(state == true)
        //console.log(state); // true | false
        var html = '';
        var siteurl = $("#pageurl").val();
        siteurl = siteurl + '/change-status';
        var msg = '';
        var product_id = $(this).attr('id');
        $('#loader'+product_id).show();
        $.ajax({
            url: siteurl,
            type: 'post',
            
            data: {'status' : state,'product_id' : product_id},
            
            success: function(data, status) {
               $('#loader'+product_id).hide();
               $(".alert").remove();
                html = "<div role='alert' class='alert alert-info'>\n\
                           <button data-dismiss='alert' class='close' type='button'>\n\
                           <span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>Product status updated</div>";
                $(".admintable02").prepend(html);
                
                  setTimeout(function(){
                    $(".alert").slideUp().fadeOut();
                  }, 2000);
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    });
    
    
 