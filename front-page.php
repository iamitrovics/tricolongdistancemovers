<?php 
/**
 * Homepage / Front Page
**/
get_header(); ?>

    <header id="masheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="header-caption">
                        <h1><?php the_field('main_title_hero_home'); ?></h1>
                        <div class="header-text">
                            <?php the_field('content_block_hero_home'); ?>
                        </div>
                        <div class="header-ctas">
                            <a href="<?php the_field('cta_button_link_hero_home'); ?>" class="quote-btn"><?php the_field('cta_button_label_hero_home'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                            <a href="tel:<?php the_field('phone_number_hero_home'); ?>" class="call-btn"><?php the_field('phone_number_hero_home'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7">
                    <div class="header-photo">
                        <img src="<?php the_field('featured_image_hero_home'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="weoffer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_offer_home'); ?></h2>
                </div>
            </div>
            <div class="row">

                <?php if( have_rows('offer_blocks_home') ): ?>
                    <?php while( have_rows('offer_blocks_home') ): the_row(); ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="weoffer-box">
                            <div class="weoffer-box--icon">
                                <?php the_sub_field('icon_code'); ?>
                            </div>
                            <h3><?php the_sub_field('title'); ?></h3>
                            <p><?php the_sub_field('text'); ?></p>
                        </div>
                    </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_services_home'); ?></h2>
                </div>
            </div>
            <div class="row">

                <?php
                $loop = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 15) ); ?>  
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="service-box">
                            <h3><?php the_title(); ?></h3>
                            <img src="<?php the_field('service_icon_serv'); ?>" alt="">
                            <a href="<?php echo get_permalink(); ?>">Read More</a>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>   

            </div>
        </div>
    </section>

    <section id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_test_home'); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonials-slider">

                        <?php
                            $post_objects = get_field('reviews_list_home');

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
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_about_home'); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="about-content">
                        <?php the_field('content_block_about_home'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-video">
                        <?php the_field('video_code_about_home'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blogs-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_blog_home'); ?></h2>
                </div>
            </div>
            <div class="row">

                <?php
                    $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
                    $args = array(
                        'posts_per_page' => 2, // the value from Settings > Reading by default
                        'paged'          => $current_page // current page
                    );
                    query_posts( $args );
                    
                    $wp_query->is_archive = true;
                    $wp_query->is_home = false;
                    
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
                                    <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php the_field('excerpt_text'); ?>
                                </div>
                            </div>
                        </div>                        
                    
                <?php endwhile; ?>            

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="quote-area">
                        <a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                        <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
