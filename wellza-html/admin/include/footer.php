<div class="admin-footer" id="admin-footer">
    <ul class="list-inline">
        <li class="copyright"> copyright- 2016 Wellza</li>
    </ul>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script src="../vendor/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.equalizer.min.js"></script>
<!--<script src="../assets/js/bootstrap-toggle.min.js"></script>-->
<script src="../assets/js/bootstrap-switch.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>
<script src="../assets/js/moment.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

<script>
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

    $(document).ready(function() {
        $(".plus-icio").click(function () {
           $(this).toggleClass("arrow-white");
        });
     });
</script>

