$(document).ready(function () {
        $('.leftmenubutton').click(function () {
            $('body').toggleClass('showhide-menu');
        });

        function resize()
        {
            var heights = window.innerHeight;
            var footerh = $("#admin-footer").height();
            document.getElementById("content").style.minHeight = heights - 52 + "px";
        }
        resize();
        window.onresize = function () {
            resize();
        };
        
        $("[name='on-off-checkbox']").bootstrapSwitch();
        $("[name='on-off-checkbox-verified']").bootstrapSwitch();

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