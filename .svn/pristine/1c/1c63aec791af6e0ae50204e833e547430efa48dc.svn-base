<!DOCTYPE html>
<html>
    <head>
        <title>Wellza</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scable=no">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <link href="../assets/css/bootstrap-toggle.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../vendor/owl.carousel/dist/assets/owl.carousel.min.css" />
        <link href="../assets/css/bootstrap-switch.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/dhtmlxscheduler.js"></script>
        <link href="../assets/css/dhtmlxscheduler.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/dhtmlxscheduler_minical.js"></script>
        <script type="text/javascript" charset="utf-8">
            var prev = null;
            var curr = null;
            var next = null;
            function doOnLoad() {
                document.getElementById('adevent').onclick = function () {
                    var month = scheduler._date.getMonth() + 1;
                    var year = scheduler._date.getFullYear();
                    var dataarray = scheduler._date.toString();
                    var data = dataarray.split(" ");
                    var dayy = data[2];
                    var startdate = data[2] + '-' + month + '-' + year + ' 09:00';
                    scheduler.config.now_date = new Date(year, month - 1, data[2], 9, 0);

                    var enddate = data[2] + '-' + month + '-' + year + ' 09:00';

                    var eventId = scheduler.addEvent({
                        start_date: startdate,
                        end_date: enddate,
                        text: "Meeting"
                    });

                    scheduler.showLightbox(eventId);
                    scheduler.setCurrentView();
                }

                scheduler.config.multi_day = true;
                scheduler.config.xml_date = "%Y-%m-%d %H:%i";
                scheduler.config.hour_date = "%h:%i %a";
                scheduler.config.first_hour = 9;
                scheduler.config.last_hour = 20;

                scheduler.init('scheduler_here', new Date(), "day");
                //scheduler.init('scheduler_here',new Date(2014,9,11),"day");
                scheduler.load("./data/events.xml");

                var calendar = scheduler.renderCalendar({
                    container: "cal_here",
                    navigation: true,
                    handler: function (date) {
                        scheduler.setCurrentView(date, scheduler._mode);

                    }
                });
                scheduler.linkCalendar(calendar);
                scheduler.setCurrentView(scheduler._date, scheduler._mode);

            }

        </script>

        <style type="text/css" media="screen">
            .dhx_calendar_click {
                background-color: #C2D5FC !important;
            }
            .schedule_calender{ height: 100%;  width: 100%; font-family: 'ITCAvantGardeStd' !important; border: 1px solid #ddd;}
            .dhx_cal_prev_button{background-image:url(../assets/images/left-arrow.png) !important; }
            .dhx_cal_next_button{background-image:url(../assets/images/right-aarow.png) !important; }
            @media(min-width:1600px){
                .schedule_calender .right {width:16.6667%;}
                .schedule_calender .left{ width:83.3333%;  padding-left: 0px;}
            }
            .dhx_cal_data { border-top: 1px solid #ddd;}
            .schedule_calender .dhx_mini_calendar{ border: none; box-shadow: none !important;}
            .schedule_calender .calendar .dhx_year_month{font-family: 'ITCAvantGardeStd' !important; font-size: 25px; height: auto; line-height: 0; padding: 25px 0px;width: 358px; text-transform: uppercase; position: relative; margin: 0 auto 25px; color: #52bfb8;}
            .schedule_calender .dhx_mini_calendar .dhx_cal_next_button, .schedule_calender .dhx_mini_calendar .dhx_cal_prev_button{ top: 16px !important; }
            .schedule_calender .calendar .dhx_year_week{ margin-bottom: 25px;}
            .schedule_calender .calendar .dhx_year_week .dhx_scale_bar{ font-size: 20px; position: static !important; width: 14.28% !important; float: left; text-transform: uppercase; color: #383838;}
            .schedule_calender .dhx_cal_container.dhx_mini_calendar td{height:105px !important;}
            .schedule_calender .dhx_month_head{  border-radius: 50% !important; height: 50px; width: 50px; line-height: 50px;}
            .schedule_calender .dhx_year_body table{ width: 100%;}
            .schedule_calender .dhx_year_body td{ width: 14.28% !important;}
            .schedule_calender .dhx_year_body .dhx_month_body{ display: none !important;} 
            .schedule_calender .dhx_year_body .dhx_month_head{margin: 0 auto !important; background-color: #F5F5F5; font-size: 22px; color: #666;}
            .dhx_year_event{background-color: #F9AE39 !important; color:#fff !important;}
            .schedule_calender .dhx_calendar_click{background-color: #52BFB8 !important; color:#fff !important;}
            .dhx_scheduler_day{ background-color: #F9F9F9 ;color: #fff !important; border-top: 1px solid #ddd; border-left: 1px solid #ddd;}
            .dhx_now .dhx_month_head{ background-color: #ccc !important; color: #ffffff !important;}
            .dhx_scheduler_day .dhx_scale_holder{ border: none;}
            .schedule_calender #adevent{ background-image: none;font-family: 'ITCAvantGardeStd' !important; float: left !important;font-size: 18px; cursor: pointer; margin: 19px 0 0 -15px !important; padding-left: 15px; width: auto !important; color:#333333 !important;}
            .dhx_scheduler_day .dhx_scale_holder_now, #scheduler_here .dhx_cal_data .dhx_scale_holder:nth-child(1){left: 0 !important; }
            .dhx_scheduler_day .dhx_scale_hour{ line-height: 60px; font-size: 14px; color: #ADADAD; width: 68px !important; border-width: 1px; border-color: #F0F0F0;}
            .dhx_scheduler_day .dhx_cal_select_menu{ left:-72px !important;}
            .dhx_scheduler_day .dhx_cal_select_menu .dhx_title{ display: none !important;}
            .dhx_scheduler_day .dhx_cal_select_menu{right: 100px !important; width: 100% !important; height: 0px !important; z-index: 9999 !important;}
            .dhx_scheduler_day .dhx_cal_select_menu .dhx_body{ width: auto !important; height: 25px !important; border-radius: 0 !important; right: 0 !important; position: absolute !important;}
            .dhx_scheduler_day .dhx_cal_select_menu .dhx_menu_icon{ float: left !important; display: inline-block !important; padding: 5px; background-repeat: no-repeat !important; }
            .dhx_scheduler_day .dhx_cal_select_menu .dhx_menu_icon.icon_details{background-image:url(../assets/images/schedule_edit.png) !important; background-position: 5px 5px !important;}
            .dhx_scheduler_day .dhx_cal_select_menu .dhx_menu_icon.icon_delete{ background-image:url(../assets/images/schedule_delete.png) !important; background-position: 5px 5px !important; }
            .dhx_scheduler_day .dhx_cal_select_menu .dhx_menu_icon.icon_save{background-image:url(../assets/images/schedule_save_icon.png) !important; background-position: 5px 5px !important;}
            .dhx_scheduler_day .dhx_cal_select_menu .dhx_menu_icon.icon_cancel{ background-image:url(../assets/images/schedule_cancel_icon.png) !important; background-position: 5px 5px !important;}
            .dhx_scheduler_day .dhx_cal_select_menu .icon_edit{ display: none !important;}
            .dhx_scheduler_day .dhx_cal_event .dhx_body{padding: 0px 5px !important;  font-size: 16px !important;}
            .dhx_scheduler_day .dhx_cal_event .dhx_title{ text-align: left !important; height: 28px !important; line-height: 1.5;font-size: 16px !important; color: #383838;}
            .dhx_scheduler_day .dhx_cal_editor{ left: 2px !important; font-size: 16px !important; }
            .dhx_scheduler_day textarea.dhx_cal_editor{ padding: 5px !important; }
            .dhx_scheduler_day .dhx_cal_editor > div{ margin-top: 16px !important;}
            .dhx_cal_event .dhx_footer{ margin-top: -7px !important; height: 5px !important;}
            .dhx_scale_holder_now, .dhx_scale_holder{ background-image: none !important;}
            .dhx_cal_event .dhx_body, .dhx_cal_event .dhx_footer, .dhx_cal_event .dhx_header, .dhx_cal_event .dhx_title{background-color:#F8EDDB !important;}
            /*  .dhx_cal_light .dhx_wrap_section.test_0{ display: none;}
                .dhx_cal_light .dhx_title{display: none;}*/
        </style>
    </head>

    <body onload="doOnLoad();">
        <?php include 'include/header.php'; ?>

        <?php include 'include/left-menu.php'; ?>
        <main class="content admin-page clearfix" id="content" style="height: 100%;">
            <div class="tabpanel">                    
                <div class="panel-body">
                    <div class="table-container" style="min-height:auto;">
                        <div class="panel-heading clearfix"> 
                            <div class="main-heading pull-left">
                                <h4 class="">Service Provider Availability</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="schedule_calender clearfix">
                <section class="appointment_section">
                    <div class="serviceproviderlist_slider owl-carousel owl-theme" id="serviceproviderlist_slider">
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item active">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider05.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider05.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>
                        <div class="item">
                            <div class="img_box">
                                <img src="../assets/images/provider06.jpg" alt="img"/>
                            </div>
                            <div class="name">
                                Nikola Jokic
                            </div>
                        </div>

                    </div>
                </section>

                <div class="col-md-9 calendar left">
                    <div id="cal_here" class="" style='text-align: center;'>
                    </div>
                </div>

                <div id="scheduler_here" class="dhx_cal_container right col-md-3" style='height:100%;'>
                    <div style="width: 100%;" title="Add" id="adevent" class="icon_add">Add Event</div>
                    <div class="dhx_cal_navline">
                        <div class="dhx_cal_date"></div>
                    </div>
                    <div class="dhx_cal_header">
                    </div>
                    <div class="dhx_cal_data">
                    </div>
                </div>  
            </div>


        </main>
        <div class="clearfix"></div>
        <?php include 'include/footer.php'; ?>  
        <script>
            $('#serviceproviderlist_slider').owlCarousel({
                loop: true,
                margin: 10,
                dots: true,
                nav: true,
                center: true,
                responsive: {
                    0: {
                        items: 6
                    },
                    768: {
                        items: 10
                    },
                    1000: {
                        items: 9
                    }
                },
                navText: ["<img src='../assets/images/left-arrow.png'>", "<img src='../assets/images/right-aarow.png'>"]

            });
            $('#serviceproviderlist_slider').on('click', '.owl-item', function (e) {
                var carousel = $('#serviceproviderlist_slider').data('owl.carousel');
                e.preventDefault();
                carousel.to(carousel.relative($(this).index()));
            });
        </script>

    </body>

</html>

