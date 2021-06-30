<?php
/**
 * Template Name: Thanks Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

    <div id="error-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="header-caption">
                        <h1><?php the_field('main_title_thanks'); ?></h1>
                        <div class="header-text">
                            <?php the_field('content_block_thanks'); ?>
                        </div>
                        <div class="header-ctas">
                            <a href="<?php the_field('button_link_thanks'); ?>" class="quote-btn"><?php the_field('button_label_thanks'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="header-photo">
                        <img src="<?php the_field('featured_image_thanks_page'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>

