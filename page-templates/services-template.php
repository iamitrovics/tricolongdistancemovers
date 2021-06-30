<?php
/**
 * Template Name: Services Template
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
						<?php 
						$values = get_field( 'field_name' );
						if ( $values ) { ?>
							<h1><?php the_field('main_title_header_services_page'); ?></h1>
						<?php 
						} else { ?>
							<h1><?php the_title(); ?></h1>
						<?php } ?>
						<div class="header-text">
							<?php the_field('content_block_header_services_page'); ?>
						</div>
						<div class="header-ctas">
							<a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
							<a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xl-7">
					<div class="header-photo">
						<img src="<?php the_field('featured_image_header_services_page'); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="services-page">
		<section id="services">
			<div class="container">
				<div class="row">

					<?php
					$loop = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 15) ); ?>  
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

						<div class="col-lg-3 col-md-6">
							<div class="service-box">
								<h3><?php the_title(); ?></h3>
								<img src="<?php the_field('service_icon_serv'); ?>" alt="">
								<a href="<?php echo get_permalink(); ?>">Read More</a>
							</div>
						</div>

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>      

				</div>
			</div>
		</section>
		<div id="services-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2><?php the_field('main_title_main_services_page'); ?></h2>
						<div class="services-benefits">
							<ul>
								<?php if( have_rows('features_list_serviecs_page') ): ?>
									<?php while( have_rows('features_list_serviecs_page') ): the_row(); ?>
										<li><?php the_sub_field('feature'); ?></li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
						<?php the_field('content_block_serv_page_main'); ?>

						<span class="quote-title"><?php the_field('main_title_cta_serv_page'); ?></span>
						<div class="quote-area">
							<a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
							<a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>

