<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <header id="masheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="header-caption">
                        <?php 
                        $values = get_field( 'custom_main_title_city_header' );
                        if ( $values ) { ?>
                            <h1><?php the_field('custom_main_title_city_header'); ?></h1>
                        <?php 
                        } else { ?>
                            <h1><?php the_title(); ?></h1>
                        <?php } ?>                        
                        <div class="header-text">
                            <?php the_field('description_text_header_city'); ?>
                        </div>
                        <div class="header-ctas city-ctas">
                            <a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>

                            <?php 
                            $values = get_field('phone_number_city_header');
                            if ( $values ) { ?>
                                <a href="tel:<?php the_field('phone_number_city_header'); ?>" class="call-btn"><?php the_field('phone_number_city_header'); ?></a>
                            <?php 
                            } else { ?>
                                <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7">
                    <div class="header-photo city-photo">
                        <?php
                        $imageID = get_field('featured_image_city_header');
                        $image = wp_get_attachment_image_src( $imageID, 'city-image' );
                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                        ?> 

                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="single-city">
        <div class="container">

        <?php if( have_rows('content_layout_city_page') ): ?>
            <?php while( have_rows('content_layout_city_page') ): the_row(); ?>
                <?php if( get_row_layout() == 'intro' ): ?>

                    <div class="city-intro">
                        <h2><?php the_sub_field('main_title_intro'); ?></h2>
                        <?php the_sub_field('intro_text_intro'); ?>
                    </div>
                    <!-- // intro  -->

                <?php elseif( get_row_layout() == 'full_width_content' ): ?>

                    <div class="city-full">
                        <?php if( get_sub_field('main_title_full') ): ?>
                            <h2><?php the_sub_field('main_title_full'); ?></h2>
                        <?php endif; ?>
                        <?php the_sub_field('content_block_full'); ?>
                    </div>
                    <!-- // content  -->

                <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                    <div class="city-image--full">
                        <?php
                        $imageID = get_sub_field('featured_image');
                        $image = wp_get_attachment_image_src( $imageID, 'blogfull-image' );
                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                        ?> 

                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                    </div>
                    <!-- // image  -->

                <?php elseif( get_row_layout() == 'reviews' ): ?>

                <section id="testimonials">
   
                    <h2><?php the_sub_field('custom_title'); ?></h2>
        
                        <div id="testimonials-slider">

                            <?php
                                $post_objects = get_sub_field('reviews_list_post');

                                if( $post_objects ): ?>
                                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                        <?php setup_postdata($post); ?>

                                        <div>
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
                                                
                                                    <?php the_field('review_text'); ?>
                                                </div>
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
                                                <span class="testimonial-author"><?php the_title(); ?></span>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>

                    </div>  
                    <div class="brand-logos">
                        <?php if( have_rows('badges_list') ): ?>
                            <?php while( have_rows('badges_list') ): the_row(); ?>

                                <div class="brand-item">
                                   <a href="<?php the_sub_field('link_to_website'); ?>" target="_blank"><img src="<?php the_sub_field('icon'); ?>" alt=""></a>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <!-- // share  -->
                </section>           
                
                <?php elseif( get_row_layout() == 'middle_cta' ): ?>

                    <div class="quote-area with-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                                    <?php 
                                    $values = get_field('phone_number_city_header');
                                    if ( $values ) { ?>
                                        <a href="tel:<?php the_field('phone_number_city_header'); ?>" class="call-btn"><?php the_field('phone_number_city_header'); ?></a>
                                    <?php 
                                    } else { ?>
                                        <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>      
                    </div>
                    
                <?php elseif( get_row_layout() == 'why_us' ): ?>
                    
                    <section id="weoffer">
                        <h2><?php the_field('main_title_what_we_offer', 'options'); ?></h2>
                  
                            <div class="row">

                                <?php if( have_rows('offers_list_offer', 'options') ): ?>
                                    <?php while( have_rows('offers_list_offer', 'options') ): the_row(); ?>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="weoffer-box">
                                            <div class="weoffer-box--icon">
                                                <?php the_sub_field('icon'); ?>
                                            </div>
                                            <h3><?php the_sub_field('title'); ?></h3>
                                            <p><?php the_sub_field('text'); ?></p>
                                        </div>
                                    </div>

                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                    </section>        
                    
                <?php elseif( get_row_layout() == 'bottom_cta' ): ?>
                    
                    <div class="service-detailed-body">
         
                        <span class="quote-title"><?php the_sub_field('main_title_bottom_cta'); ?></span>
                        <div class="quote-area">
                            <a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                            <?php 
                            $values = get_field('phone_number_city_header');
                            if ( $values ) { ?>
                                <a href="tel:<?php the_field('phone_number_city_header'); ?>" class="call-btn"><?php the_field('phone_number_city_header'); ?></a>
                            <?php 
                            } else { ?>
                                <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
                            <?php } ?>
                        </div>
       
                    </div>                    

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        </div>
    </section>
    <!-- // single city  -->


<?php
get_footer();
?>

