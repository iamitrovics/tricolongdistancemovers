<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

    <div id="error-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="header-caption">
                        <h1><?php the_field('main_title_ermac', 'options'); ?></h1>
                        <div class="header-text">
                            <?php the_field('content_block_ermac', 'options'); ?>
                        </div>
                        <div class="header-ctas">
                            <a href="<?php the_field('button_link_ermac', 'options'); ?>" class="quote-btn"><?php the_field('button_label_ermac', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="header-photo">
                        <img src="<?php the_field('featured_image_ermac', 'options'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
