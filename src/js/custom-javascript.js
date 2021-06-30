//@prepros-prepend modernizr.js
//@prepros-prepend bootstrap4\bootstrap.bundle.js
//@prepros-prepend easing.js
//@prepros-prepend skip-link-focus-fix.js
//@prepros-prepend slick.js
//@prepros-prepend jquery.matchHeight.js
//@prepros-prepend moment\moment-with-locales.min.js
//@prepros-prepend jquery.fancybox.min.js
//@prepros-prepend bootstrap-select.js
//@prepros-prepend jquery-ui.min.js
//@prepros-prepend wow.min.js
//@prepros-prepend sliding-menu.js

(function($) {
	jQuery(document).ready(function() {

		new WOW().init();

		// Sticky header
		jQuery(window).scroll(function() {
		  if ($(this).scrollTop() > 60){  
		      $('#top-bar').addClass("sticky");
		    }
		    else{
		      $('#top-bar').removeClass("sticky");
		    }
		});
		// mobile multilevel menu
        $("#menu").slidingMenu();
	 	jQuery(".top-bar__menu-btn .menu-btn").click(function(){
	    	jQuery(".menu-overlay").addClass("active-overlay");
	     	jQuery("html,body").addClass("fixed");
	    	jQuery('.main-menu-sidebar').addClass("menu-active");
	    });
	   
	    jQuery('.close-menu-btn, .menu-overlay, .main-menu-sidebar .nav-links>li>a').click(function(){
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
                    
                    
                    beforeShowDay: function( date ) {
                        var highlight = date >= date1 && date <= date2
                        var highlight2 = date >= date3 && date <= date4
                        var highlight3 = date >= date5 && date <= date6
                        if( highlight || highlight2 || highlight3 ) {
                             return [true, "event", 'Tooltip text'];
                        } else {
                             return [true, '', ''];
                        }
                    }
            
                });

        });

        $('.date-picker-input').on('click', function(e) {
          e.preventDefault();
          $(this).attr("autocomplete", "off");  
       });

       $(".date-picker-input").attr("autocomplete", "off");		

		$( function() {
			$( ".accordion-list" ).accordion();
		  } );

		$('#testimonals-page .testimonial-box .testimonial-text, #weoffer .weoffer-box h3, #blog-listing .blog-box .blog-content h2, #blogs-section .blog-content h3, #services .service-box h2, #services .service-box h3').matchHeight();
		$('#testimonals-page .testimonial-box .testimonial-author, #weoffer .weoffer-box p, #blogs-section .blog-content p, #blog-listing .blog-box .blog-content p').matchHeight();
		$('.blog-content .blog-info').matchHeight();
		
		// on focus add class to parrent div
		 $('.default-form .form-group input').focusin(function() {
	      $(this).parent().addClass('active');
	    });
	    $('.default-form .form-group input').focusout(function() {
	      $(this).parent().removeClass('active');
	    });

	    // add class to the selected radio button
	    $('.homesizes input').click(function () {
            $('.homesizes input:not(:checked)').next('label').removeClass("checked");
            $('.homesizes input:checked').next('label').addClass("checked");
        });
        $('.default-form .form-group select').selectpicker();
	});
})(jQuery);
