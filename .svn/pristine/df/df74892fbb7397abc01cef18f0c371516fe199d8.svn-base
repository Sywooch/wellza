$(document).ready(function () {
    $('.bundle-boxes-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        center: true,
        lazyLoad: true,
        stagePadding: 455,
        responsive: {
            0: {
                items: 1,
                stagePadding: 0
            },
            600: {
                items: 1,
                stagePadding: 100
            },
            1000: {
                items: 1,
                stagePadding: 200
            },
            1200: {
                items: 1,
                stagePadding: 250
            },
            1400: {
                items: 1,
                stagePadding: 350
            },
            1600: {
                items: 1,
                stagePadding: 350
            },
            1800: {
                items: 1,
                stagePadding: 420
            }
        }

    });

//       ============  clickable carousel items =======================     //
    $('.bundle-boxes-slider').on('click', '.owl-item', function (e) {
        var carousel = $('.bundle-boxes-slider').data('owl.carousel');
        e.preventDefault();
        carousel.to(carousel.relative($(this).index()));
    });
//       ============  randomly color class add in items =======================     //

//        var classes = ["yellow-box", "green-box", "pink-box"];
//        $(".bundle-boxes-slider .item").each(function () {
//            $(this).addClass(classes[~~(Math.random() * classes.length)]);
//        });

});