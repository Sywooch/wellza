 $(document).ready(function () {
                setTimeout(function () {
                    $('.our-services').equalizer({columns: 'div.align', rows: 'div.align', overflow: 'stinky'});
                }, 40);

            });

            $(document).ready(function () {
                $('#provider-slider').owlCarousel({
                    loop: false,
                    margin: 10,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    },
                    navText: ["<img src='resource/images/nav-left-arrow.png'>", "<img src='resource/images/nav-right-arrow.png'>"]

                });
                $('.selectpicker').selectpicker();
            });

            $(document).ready(function () {
                $('#blog-slider').owlCarousel({
                    loop: false,
                    margin: 10,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1300: {
                            items: 3
                        }
                    },
                    navText: ["<img src='resource/images/nav-left-arrow.png'>", "<img src='resource/images/nav-right-arrow.png'>"]

                });
            });

            $(document).ready(function () {
                $('#logo-slider').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 4
                        },
                        768: {
                            items: 5
                        },
                        1000: {
                            items: 7
                        }
                    }

                });

            });

//$(window).on('load resize', function () {
//  var w = $(window).height();
//  $(".main-slider").css('height', w + 'px');
//
//});
            $('#fullpage').fullpage({
                'verticalCentered': false,
                'navigation': true,
                'navigationPosition': 'right',
                slidesNavigation: true,
                scrollingSpeed: 1000,
                'sectionSelector': '.fullpage',
                'responsiveHeight': 0,
                'navigationTooltips': ['1', '2', '3', '4', '5', '6'],
                'scrollOverflow': true
            });

            $('.leftmenubutton').click(function () {
                $('body').toggleClass('showhide-menu');
            });