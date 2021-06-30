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
						<div class="cert-secure">
							<span class="footer-title"><?php the_field('block_title_revies_footer', 'options'); ?></span>
							<div class="ceritifactions">
								<?php if( have_rows('certifications_list_footer', 'options') ): ?>
									<?php while( have_rows('certifications_list_footer', 'options') ): the_row(); ?>
										<img src="<?php the_sub_field('logo'); ?>" alt="">
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
							<!-- /.ceritifactions -->
							<div class="security">
								<img src="<?php the_field('security_seal_footer', 'options'); ?>" alt="">
							</div>
							<!-- /.security -->
						</div>
						<!-- /.cert-secure -->
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
  
	<?php wp_footer(); ?>
	
	<!-- Modal -->
	<div class="modal fade" id="tooltip-modal" tabindex="-1" role="dialog" aria-labelledby="tooltip-modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-body">
		
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true"><i class="fal fa-times"></i></span>
			</button>

			<?php the_field('privacy_popup_text', 'options'); ?>

		</div>
		<!-- // body  -->
		</div>
	</div>
	</div>	

	<?php if( get_field('footer_code_snippet', 'options') ): ?>
		<?php the_field('footer_code_snippet', 'options'); ?>
	<?php endif; ?>

</body>
</html>

