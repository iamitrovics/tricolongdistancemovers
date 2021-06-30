<?php
/**
 * Template Name: About Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<header id="masheader">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-5">
					<div class="header-caption">
						<h1><?php the_field('main_title_header_about'); ?></h1>
						<div class="header-text">
							<?php the_field('content_block_header_about'); ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xl-7">
					<div class="header-photo">
						<img src="<?php the_field('featured_image_header_about'); ?>" alt="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="header-ctas">
						<a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
						<a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="about-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php the_field('main_title_why_about'); ?></h2>
				</div>
			</div>
		</div>
		<div class="about-listing">

			<?php if( have_rows('why_blocks_about') ): ?>
				<?php while( have_rows('why_blocks_about') ): the_row(); ?>

					<section class="about-listing--block">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="about-listing--block__content">
										<h3><?php the_sub_field('title'); ?></h3>
										<?php the_sub_field('content_block'); ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="about-listing--block__photo">
										<img src="<?php the_sub_field('featured_image'); ?>" alt="">
									</div>
								</div>
							</div>
						</div>
					</section>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>

