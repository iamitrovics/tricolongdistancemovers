<?php
/**
 * Template Name: Free Estimate Form Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header('quote');
?>

<div id="moving-quote-intro">
    <div class="container">
        <div class="progress-area">
            <div class="progress-area-in">

                <?php if( have_rows('quote_pages_list', 'options') ): ?>
                    <?php while( have_rows('quote_pages_list', 'options') ): the_row(); ?>

                        <div class="progres-step">
                            <div class="root-steps">
                                <a href="<?php the_sub_field('link'); ?>">
                                    <span class="num"><img src="<?php the_sub_field('icon'); ?>" alt=""></span>
                                    <span class="title"><?php the_sub_field('title'); ?></span>
                                </a>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/img/misc/moving-estimate.png" alt="">
        </div>
        <div class="choose-area">
            <div class="choose-area-in">
                <h1><?php the_field('main_title_quote_form_page'); ?></h1>

                <div class="quote__form">
                    <?php the_field('form_code_quote_page'); ?>
                </div>
                <!-- // quote form  -->

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

