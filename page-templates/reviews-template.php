<?php
/**
 * Template Name: Testimonials Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<header id="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php 
					$values = get_field( 'main_title_hader_test' );
					if ( $values ) { ?>
					<h1><?php the_field('main_title_hader_test'); ?></h1>
					<?php 
					} else { ?>
						<h1><?php the_title(); ?></h1>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>

	<div id="testimonals-page">
		<div class="container">
			<div class="row">

				<?php
				// Must have wp_pagenavi plugin installed. Custom Post Type names can not clash with page names or 404's will occur on /page/#/ (Utilize Custom Rewrite Slug in CPT)
				// The press release loop
					$the_press = new WP_Query(array('post_type' => 'reviews','posts_per_page' => 20,'paged'=> get_query_var('paged') ));
					// The Loop
					while ($the_press->have_posts()) : $the_press->the_post(); ?>

						<div class="col-lg-4 col-md-6">
							<div class="testimonial-box">
								<div class="testimonial-photo">
									<?php 
									$values = get_field( 'field_name' );
									if ( $values ) { ?>
									<?php
										$imageID = get_field('client_photo_test');
										$image = wp_get_attachment_image_src( $imageID, 'test-image' );
										$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
										?> 

										<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 									
									<?php 
									} else { ?>
										<img src="<?php bloginfo('template_directory'); ?>/img/misc/avatar.jpg" alt="">
									<?php } ?>									
								</div>
								<div class="testimonial-text">

									<span class="mr-star-rating"> 

										<?php if (get_field('review_score') == '5') { ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										<?php } elseif (get_field('review_score') == '4') { ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
										<?php } elseif (get_field('review_score') == '3') { ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php } elseif (get_field('review_score') == '2') { ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php } elseif (get_field('review_score') == '1') { ?>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php } ?>   

									</span>
								
									<?php the_field('review_text'); ?>
								</div>
								<span class="testimonial-author"><?php the_title(); ?></span>
							</div>
						</div>

						<?php endwhile; ?>

			</div>

			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(array('query'=> $the_press));} ?>
			<?php wp_reset_postdata();?>

		</div>
	</div>

<?php get_footer(); ?>

