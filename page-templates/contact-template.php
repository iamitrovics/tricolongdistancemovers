<?php
/**
 * Template Name: Contact Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-xl-5">
					<?php 
					$values = get_field( 'main_title_intro_contact' );
					if ( $values ) { ?>
						<h1><?php the_field('main_title_intro_contact'); ?></h1>
					<?php 
					} else { ?>
						<h1><?php the_title(); ?></h1>
					<?php } ?>

					<p><a href="tel:<?php the_field('phone_number_contact_page'); ?>"><?php the_field('phone_number_contact_page'); ?></a></p>
					<p><a href="mailto:<?php the_field('email_address_contact_page'); ?>"><?php the_field('email_address_contact_page'); ?></a></p>
					<address><?php the_field('address_contact_page'); ?></address>
				</div>
				<div class="col-lg-7 col-xl-6">
					<div class="default-form">
						<?php the_field('form_code_contact_page'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>

