<?php
/**
 * Template Name: Sitemap Template
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
					$values = get_field( 'main_title_header_sitemap' );
					if ( $values ) { ?>
					<h1><?php the_field('main_title_header_sitemap'); ?></h1>
					<?php 
					} else { ?>
						<h1><?php the_title(); ?></h1>
					<?php } ?>
                </div>
            </div>
        </div>
    </header>

    <div id="regular-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>

