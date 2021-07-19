<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
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
                    <h1><?php the_author(); ?></h1>
                </div>
            </div>
        </div>
    </header>

    <div id="blog-listing">
        <div class="container">
            <div class="row">

                <?php
                    
                    while(have_posts()): the_post(); ?>
                                        
                        <div class="col-md-6">
                            <div class="blog-box">
                                <div class="blog-photo">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <span><i class="fal fa-long-arrow-right"></i></span>
                                            <?php 
                                            $values = get_field( 'featured_image_blog' );
                                            if ( $values ) { ?>
                                                <?php
                                                $imageID = get_field('featured_image_blog');
                                                $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                ?> 

                                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                                             
                                            <?php 
                                            } else { ?> 
                                                <img src="<?php bloginfo('template_directory'); ?>/img/misc/placeholder.jpg" alt="">
                                            <?php } ?>
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-info">
                                        <span class="date"><i class="fas fa-calendar-alt"></i><?php echo get_the_date( 'F j, Y' ); ?></span>
                                        <span class="author">
                                        <?php $author_id = get_the_author_meta( 'ID' ); ?>
                                        <?php the_author_meta( 'display_name', $author_id ); ?>    
                                        </span>
                                    </div>
                                    <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php the_field('excerpt_text'); ?>
                                </div>
                            </div>
                        </div>                        
                    
                    <?php endwhile; ?>

                <nav class="pagination-block">
                    <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); // WP-PageNavi function ?>
                </nav>    

            </div>
        </div>
    </div>   

<?php get_footer(); ?>


