(function ($) {
    jQuery(document).ready(function () {

        // new WOW().init();

        // Sticky header
        jQuery(window).scroll(function () {
            if ($(this).scrollTop() > 60) {
                $('#top-bar').addClass("sticky");
            } else {
                $('#top-bar').removeClass("sticky");
            }
        });
        // mobile multilevel menu
        $("#menu").slidingMenu();
        jQuery(".top-bar__menu-btn .menu-btn").click(function () {
            jQuery(".menu-overlay").addClass("active-overlay");
            jQuery("html,body").addClass("fixed");
            jQuery('.main-menu-sidebar').addClass("menu-active");
        });

        jQuery('.close-menu-btn, .menu-overlay, .main-menu-sidebar .nav-links>li>a').click(function () {
            jQuery('.main-menu-sidebar').removeClass("menu-active");
            jQuery(".nav-links").fadeIn(300);
            jQuery("html,body").removeClass("fixed");
            jQuery(".menu-overlay").removeClass("active-overlay");
        });
        $('#testimonials-slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 500,
            fade: true,
            /*adaptiveHeight: true,*/
            cssEase: 'linear'
        });
        // $(".moving-date .datepicker").datepicker({
        //     minDate: '0',
        //     dayNamesMin: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']
        // });

        // $(".date-input").datepicker({
        //     minDate: '0',
        //     dayNamesMin: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']
        // });


        $(function () {

            var date1 = new Date('05/05/2021');
            var date2 = new Date('05/20/2021');

            var date3 = new Date('06/05/2021');
            var date4 = new Date('06/20/2021');

            var date5 = new Date('07/05/2021');
            var date6 = new Date('07/20/2021');

            $(".date-picker-input").datepicker({
                minDate: '0',
                showOtherMonths: true,
                selectOtherMonths: true,


                beforeShowDay: function (date) {
                    var highlight = date >= date1 && date <= date2
                    var highlight2 = date >= date3 && date <= date4
                    var highlight3 = date >= date5 && date <= date6
                    if (highlight || highlight2 || highlight3) {
                        return [true, "event", 'Tooltip text'];
                    } else {
                        return [true, '', ''];
                    }
                }

            });

        });

        $('.date-picker-input').on('click', function (e) {
            e.preventDefault();
            $(this).attr("autocomplete", "off");
        });

        $(".date-picker-input").attr("autocomplete", "off");

        // $(function () {
        //     $(".accordion-list").accordion();
        // });

        $('#testimonals-page .testimonial-box .testimonial-text, #weoffer .weoffer-box h3, #blog-listing .blog-box .blog-content h2, #blogs-section .blog-content h3, #services .service-box h2, #services .service-box h3').matchHeight();
        $('#testimonals-page .testimonial-box .testimonial-author, #weoffer .weoffer-box p, #blogs-section .blog-content p, #blog-listing .blog-box .blog-content p').matchHeight();
        $('.blog-content .blog-info').matchHeight();

        // on focus add class to parrent div
        $('.default-form .form-group input').focusin(function () {
            $(this).parent().addClass('active');
        });
        $('.default-form .form-group input').focusout(function () {
            $(this).parent().removeClass('active');
        });

        $(function () {
            $('.quote-cta--single a.btn-cta').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 100
                        }, 1000);
                        return false;
                    }
                }
            });
        });

        $('#nav-slider').slick({
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplay: true,
            infinite: true,
            autoplaySpeed: 4000,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },

                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },

            ]
        });

        // add class to the selected radio button
        $('.homesizes input').click(function () {
            $('.homesizes input:not(:checked)').next('label').removeClass("checked");
            $('.homesizes input:checked').next('label').addClass("checked");
        });
        $('.default-form .form-group select').selectpicker();

        $('.main__content a').attr("target", "_blank");


        $(".accordion-list .panel:first-of-type > h4").addClass('active');
        $(".accordion-list .panel:first-of-type > .panel__content").css('display', 'block');
        $(".accordion-list .panel > h4").on("click", function (e) {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                    .siblings(".accordion-list .panel .panel__content")
                    .slideUp(200);
            } else {
                $(".accordion-list .panel > h4").removeClass("active");
                $(this).addClass("active");
                $(".accordion-list .panel .panel__content").slideUp(200);
                $(this)
                    .siblings(".accordion-list .panel .panel__content")
                    .slideDown(200);
            }
            e.preventDefault();
        });

        $('#bottom-form .nav-tabs, .cta-wrapper .nav-tabs').each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active.attr('href'));
            $links.not($active).each(function () {
                $($(this).attr('href')).hide();
            });
            $(this).on('click', 'a', function (e) {
                var c = this;
                $active.removeClass('active');
                $content.fadeOut("fast", function () {
                    $active = $(c);
                    $content = $($(c).attr('href'));

                    $active.addClass('active');
                    $content.fadeIn("fast");
                });
                e.preventDefault();
            });
        });
        //modal
        setTimeout(function () {
            jQuery('.modal-overlay').addClass('show');
        }, 1000);
        $('.zebra_tooltips_below').click(function (e) {
            var myEm = $(this).attr('data-my-element');
            var modal = $('.modal-overlay[data-my-element = ' + myEm + '], .modal[data-my-element = ' + myEm + ']');
            e.preventDefault();
            modal.addClass('active');
            $('html').addClass('fixed');
        });
        $('.close-modal').click(function () {
            var modal = $('.modal-overlay, .modal');
            $('html').removeClass('fixed');
            modal.removeClass('active');
        });
    });
})(jQuery);