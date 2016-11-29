$(document).ready(function(){
    $(".loader_load .fa-spin").hide();
    $(".loaderclass").hide();
    $(".btn-block").click(function(e){
        e.preventDefault();
        //$(this).disabled = true;
        $(".loader_load .fa-spin").show();
        var form = $("#addcategories");  
        var msg = '';
        $.ajax({
            //url: 'category/add-category',
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            //data: {'action': 'add-category', 'category_name': '11239528343'},
            success: function(data, status) {
                
               if(data == 1) {
                   msg = "<span style='color:red'>Please choose icons</span>";
               }
               if(data == 2) {
                   msg = "<span style='color:red'>Category name can't be blank</span>";
               }
               if(data == 3) {
                   msg = "<span style='color:red'>Please choose icons<br>Category name can't be blank</span>";
               }
               if(data == 4) {
                   msg = "<span style='color:red'>Category already exist</span>";
               }
               if(data == 5) {
                   msg = "<span style='color:green'>Category added successfully</span>";
               }
               if(data == 6) {
                   msg = "<span style='color:red'>Record not saved</span>";
               }
                
                //$(this).disabled = false;
                $(".loader_load .fa-spin").hide();
                
                $("#category_msg").html(msg);
                msg = '';
                
                setTimeout(function(){ $("#category_msg").fadeOut().html(msg).fadeIn() }, 2000);
                
                
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    });
    
    //Ajax function to change the category status    
    $('input[name="on-off-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
        
        if(state == true) {          
            
            $(this).find(".bootstrap-switch-label").html('enable');
        } 
        if(state == false) {
            
           $(this).find(".bootstrap-switch-label").html('disable');
            
        }
        
        //console.log(state); // true | false
        //$(this).attr('data-label-text');
        var siteurl = $("#siteurl").val();
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
        var siteurl = $("#siteurl").val();
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
    //Ajax function to delete category
    /*$(".loadmore").click(function(){
        var category_id = $(this).attr('name');
        $('#loader'+category_id).show();
        var siteurl = $("#siteurl").val();
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
    })*/
});

$('.close').click(function(){
   location.reload(); 
});
