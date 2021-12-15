<?php
/**
 * Template Name: Areas We Serve Template
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
						<h1><?php the_field('main_title_header_areas'); ?></h1>
						<div class="header-text">
							<?php the_field('content_block_header_areas'); ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xl-7">
					<div class="header-photo">
						<img src="<?php the_field('featured_image_header_areas'); ?>" alt="">
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
	<div id="areas-page">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div id="areas-listing">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Locations We Cover</h2>
                                    <ul class="locations-item">
                                    <?php
                                        $loop = new WP_Query( array( 'post_type' => 'cities', 'posts_per_page' => -1) ); ?>  
                                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                        <a href="<?php echo get_permalink(); ?>"><li class="locations-title"><?php the_title(); ?></li></a>
                                                
                                        <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?> 
                                    </ul>
                                    <!-- /.service-item -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div> 
                    <!-- /.areas-listing -->
                </div>
            </div>
		</div>
	</div>

<?php get_footer(); ?>

