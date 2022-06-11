<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
	<div class="cert-secure">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="footer-title"><?php the_field('block_title_revies_footer', 'options'); ?></h2>
						<div class="cert-helper">
							<div class="reviews-certifications">
								
								<!-- TrustBox widget - Starter -->
								<div class="trustpilot-widget" data-locale="en-US" data-template-id="5613c9cde69ddc09340c6beb" data-businessunit-id="56ba71c70000ff000588b8ba" data-style-height="100%" data-style-width="100%" data-theme="light">
									<a href="https://www.trustpilot.com/review/tricolongdistancemovers.com" target="_blank" rel="noopener">Trustpilot</a>
								</div>
								<!-- End TrustBox widget -->

								<div><a target="_blank" id="bbblink" class="rbhzbam" href="https://www.bbb.org/us/ca/los-angeles/profile/moving-and-storage-companies/trico-long-distance-transportation-llc-1216-353057#bbbseal" title="Trico Long Distance Transportation, LLC is a BBB Accredited Moving andor Storage Company in Los Angeles, CA" style="display: block;position: relative;overflow: hidden; width: 150px; height: 57px; margin: 0px; padding: 0px;"><img style="padding: 0px; border: none;" id="bbblinkimg" src="https://seal-sanjose.bbb.org/logo/rbhzbam/trico-long-distance-transportation-353057.png" width="300" height="57" alt="Trico Long Distance Transportation, LLC is a BBB Accredited Moving andor Storage Company in Los Angeles, CA" /></a><script type="text/javascript">var bbbprotocol = ( ("https:" == document.location.protocol) ? "https://" : "http://" ); (function(){var s=document.createElement('script');s.src=bbbprotocol + 'seal-sanjose.bbb.org' + unescape('%2Flogo%2Ftrico-long-distance-transportation-353057.js');s.type='text/javascript';s.async=true;var st=document.getElementsByTagName('script');st=st[st.length-1];var pt=st.parentNode;pt.insertBefore(s,pt.nextSibling);})();</script></div>

								<?php if( have_rows('reviews_certifications_list_footer_icon', 'options') ): ?>
									<?php while( have_rows('reviews_certifications_list_footer_icon', 'options') ): the_row(); ?>
										<a target="_blank" href="<?php the_sub_field('logo-icon-link'); ?>"><?php the_sub_field('logo-icon'); ?></a>
									<?php endwhile; ?>
								<?php endif; ?>

								<?php if( have_rows('reviews_certifications_list_footer_img', 'options') ): ?>
									<?php while( have_rows('reviews_certifications_list_footer_img', 'options') ): the_row(); ?>
										<a target="_blank" href="<?php the_sub_field('logo-img-link'); ?>"><img class="small-img" src="<?php the_sub_field('logo-img'); ?>" alt=""></a>
									<?php endwhile; ?>
								<?php endif; ?>
								<div class="security">
									<img class="small-img" src="<?php the_field('security_seal_footer', 'options'); ?>" alt="">
								</div> 
								<!-- security -->
							</div>
							<!-- /.reviews-certifications -->
						</div>
						<!-- /.cert-helper -->
					</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.cert-secure -->
	<footer id="page-footer">
		<div class="container">
			<div class="row">
				
				<div class="col">
					<div class="footer-block">
						<div class="footer-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('footer_logo_gen', 'options'); ?>" alt=""></a>
						</div>
						<div class="footer-text">
							<p><?php the_field('company_id_footer', 'options'); ?></p>
						</div>
					</div>
				</div>
				<!-- /.col -->

				<div class="col">
					<div class="footer-sitemap">
						<span class="footer-title"><?php the_field('block_title_footer_block_1', 'options'); ?></span>
						<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
					</div>
				</div>
				<!-- /.col -->

				<div class="col">
					<span class="footer-title"><?php the_field('block_title_footer_block_2', 'options'); ?></span>
					<p><a href="tel:<?php the_field('phone_number_footer_contact', 'options'); ?>"><?php the_field('phone_number_footer_contact', 'options'); ?></a></p>
					<p><a href="mailto:<?php the_field('email_address_footer_contact', 'options'); ?>"><?php the_field('email_address_footer_contact', 'options'); ?></a></p>
					<address><?php the_field('company_address_footer', 'options'); ?></address>
				</div>
				<!-- /.col -->

				<div class="col">
					<div class="follow-us">
						<span class="footer-title"><?php the_field('block_title_footer_block_3', 'options'); ?></span>
						<ul>

							<?php if( have_rows('social_networks_gen', 'options') ): ?>
								<?php while( have_rows('social_networks_gen', 'options') ): the_row(); ?>
								<li><a href="<?php the_sub_field('link_to_network'); ?>" target="_blank"><?php the_sub_field('icon_code'); ?></a></li>
								<?php endwhile; ?>
							<?php endif; ?>

						</ul>
					</div>
					<!-- /.follow-us -->
					<div class="newsletter">
						<span class="footer-title"><?php the_field('block_title_footer_block_4', 'options'); ?></span>
						<div class="form__wrapper">
							<input type="email" placeholder="E-mail">
							<button type="submit"><i class="fal fa-long-arrow-right"></i></button>
						</div>
						<!-- /.form__wrapper -->
					</div>
					<!-- /.newsletter -->
				</div>
				<!-- /.col -->

			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</footer>

		<div class="copy-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="copyright-area">
							<small>&copy; <?php echo(date('Y'));?> <?php the_field('copyright_text_footer', 'options'); ?></small>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="copy-bar--links">
							<?php wp_nav_menu( array( 'theme_location' => 'copy' ) ); ?>
						</div>
						<!-- /.copy-bar--links -->
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- // copy bar  -->

	</div> 
	<!-- /.Page Wrapper -->

	<div id="fixed-cta">
		
		<a href="tel:877 666 8464">
			<em><img src="<?php bloginfo('template_directory'); ?>/img/ico/phone-solid.svg" alt=""></em>
			<div class="phone-text">
				<small class="label">Get a Free Estimate</small>
				<span>877 666 8464</span>
			</div>
			<!-- // text  -->
		</a>

	</div>
	<!-- // fixed cta  -->		
  
	<?php wp_footer(); ?>

	<div class="modal-overlay disclaimer-modal" data-my-element="tooltip-modal">
		<div class="modal" data-my-element="tooltip-modal">
			<a class="close-modal">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico/close.svg" alt="">
			</a>
			<!-- close modal -->
			<div class="disclaimer-modal-wrap">
				<?php the_field('privacy_popup_text', 'options'); ?>
			</div>
			<!-- /.disclaimer-modal-wrap -->
		</div>
		<!-- modal -->
	</div>	

	<div id="cookie-notice">
		<div id="cookie-notice-in">
			<div class="notice-text">
				<?php the_field('notice_text_cookies', 'options') ?>
			</div>
			<!-- /.notice-text -->
			<div class="notice-btns">
				<a href="#" id="accept-cookie"><?php the_field('button_1_label_cookies', 'options'); ?></a>
				<a href="<?php the_field('button_link_cooke_2', 'options'); ?>"><?php the_field('button_2_label_cooki', 'options'); ?></a>
			</div>
			<!-- /.notice-btns -->
			<a href="javascript:void(0);" id="close-notice"></a>
		</div>
		<!-- /#cookie-notice-in -->
	</div>
	<!-- /#cookie-notice -->	

	<?php if( get_field('footer_code_snippet', 'options') ): ?>
		<?php the_field('footer_code_snippet', 'options'); ?>
	<?php endif; ?>

    <script>

jQuery(document).ready(function($) {

    //Add pins on page load
    $('input[name="your-state"]').parent().addClass('pinned');
    $('input[name="your-stateto"]').parent().addClass('pinned');

    // Add pins when field has no value, either on change or blur (leaving the field)
    $('input[name="zip-from"]').on('change', function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-state"]').val('');
      }
    });
    $('input[name="zip-from"]').blur(function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-state"]').val('');
      }
    });
    $('input[name="zip-to"]').on('change', function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-stateto"]').val('');
      }
    });
    $('input[name="zip-to"]').blur(function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-stateto"]').val('');
      }
    });

    //Trigger API check for Zip from state
    $('input[name="zip-from"]').mouseout(function(){
        var zip = $(this).val();
        var stateFrom = $(this).parent('span').siblings('span').find('input[name="your-state"]');

        var api_key = 'AIzaSyAkitxoIA55jYyfHIt871IKgOUK4EV4KG0';
        if(zip.length){
            //make a request to the google geocode api with the zipcode as the address parameter and your api key
            $.get('https://maps.googleapis.com/maps/api/geocode/json?address='+zip+'&key='+api_key).then(function(response){
            //parse the response for a list of matching city/state
            var possibleLocalities = geocodeResponseToCityState(response, stateFrom);
            //Add state letters to State field
            $(stateFrom).val(possibleLocalities[0].state);
            });
        }
    });

    //Trigger API check for Zip to state
    $('input[name="zip-to"]').mouseout(function(){
        var zip = $(this).val();
        var stateTo = $(this).parent('span').siblings('span').find('input[name="your-stateto"]');

        var api_key = 'AIzaSyAkitxoIA55jYyfHIt871IKgOUK4EV4KG0';
        if(zip.length){
            //make a request to the google geocode api with the zipcode as the address parameter and your api key
            $.get('https://maps.googleapis.com/maps/api/geocode/json?address='+zip+'&key='+api_key).then(function(response){
            //parse the response for a list of matching city/state
            var possibleLocalities = geocodeResponseToCityState(response, stateTo);
            //fillCityAndStateFields(possibleLocalities, stateTo);
            $(stateTo).val(possibleLocalities[0].state);
            });
        }
    });


    function geocodeResponseToCityState(geocodeJSON, state) { //will return and array of matching {city,state} objects
      var parsedLocalities = [];
      $(state).parent().removeClass('pinned');
      //$('#state').parent().removeClass('pinned');
      if(geocodeJSON.results.length) {
        for(var i = 0; i < geocodeJSON.results.length; i++){
          var result = geocodeJSON.results[i];

          var locality = {};
          for(var j=0; j<result.address_components.length; j++){
            var types = result.address_components[j].types;
            for(var k = 0; k < types.length; k++) {
              if(types[k] == 'locality') {
                locality.city = result.address_components[j].long_name;
              } else if(types[k] == 'administrative_area_level_1') {
                locality.state = result.address_components[j].short_name;
              }
            }
          }
          parsedLocalities.push(locality);

          //check for additional cities within this zip code
          if(result.postcode_localities){
            for(var l = 0; l<result.postcode_localities.length;l++) {
              parsedLocalities.push({city:result.postcode_localities[l],state:locality.state});
            }
          }
        }
      } else {
        // $('#state').parent().addClass('pinned');
        // $('#state').val('');
        $(state).parent().addClass('pinned');
        $(state).val('');
        console.log('error: no address components found');
      }
      return parsedLocalities;
    }

});

  </script>

  <script>
    if (!sessionStorage.alreadyClicked) {
        jQuery('#cookie-notice').addClass('slide-up');
        sessionStorage.alreadyClicked = 1;
    }
  </script> 	

</body>
</html>

