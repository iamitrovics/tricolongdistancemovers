<?php
/**
 * Template Name: Add Testimonials Template
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
                    $values = get_field( 'main_title_add_review' );
                    if ( $values ) { ?>
                        <h1><?php the_field('main_title_add_review'); ?></h1>
                    <?php 
                    } else { ?>
                        <h1><?php the_title(); ?></h1>
                    <?php } ?>                    
                </div>
            </div>
        </div>
    </header>

    <div id="add-review">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <?php the_field('intro_text_add_review'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="default-form">
                        <?php the_field('form_code_add_review'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>	

<?php get_footer(); ?>

