<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

    <header id="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    $values = get_field( 'main_title_regular' );
                    if ( $values ) { ?>
                        <h1><?php the_field('main_title_regular'); ?></h1>
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

                    <?php if( have_rows('content_layout_regular') ): ?>
                        <?php while( have_rows('content_layout_regular') ): the_row(); ?>
                            <?php if( get_row_layout() == 'full_width_content' ): ?>

                                <?php the_sub_field('content_block'); ?>

                            <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
