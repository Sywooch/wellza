$("#start_membership").click(function(){
    var pageurl = $("#pageurl").val();
    console.log('called');
    pageurl = pageurl + '/add-to-cart';
    
    /*$.ajax({
        url: pageurl,
        type: 'post',
        data: {'add': 'add','commodity_type':'appointment','upcoming':appointment_id},
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
    });*/ // end ajax cal
});