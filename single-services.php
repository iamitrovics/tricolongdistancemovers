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
                        $values = get_field( 'main_title_serv_single' );
                        if ( $values ) { ?>
                            <h1><?php the_field('main_title_serv_single'); ?></h1>
                        <?php 
                        } else { ?>
                            <h1><?php the_title(); ?></h1>
                        <?php } ?>                        
                        <div class="header-text">
                            <?php the_field('content_block_service_single'); ?>
                        </div>
                        <div class="header-ctas">
                            <a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                            <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7">
                    <div class="header-photo">
                        <img src="<?php the_field('featured_image_service_single'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="service-detailed">

        <?php if( have_rows('content_sections_services_single') ): ?>
            <?php while( have_rows('content_sections_services_single') ): the_row(); ?>
                <?php if( get_row_layout() == 'full_width_content' ): ?>

                    <div class="service-detailed-body auto-transport"> 
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php the_sub_field('content_block'); ?>
                                </div>
                            </div>
                        </div>
                    </div>     

                <?php elseif( get_row_layout() == 'intro' ): ?> 

                    <div class="service-detailed-body auto-transport">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="intro">
                                        <?php the_sub_field('content_block_intro'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      

                <?php elseif( get_row_layout() == 'two_images' ): ?> 
                
                    <div class="service-detailed-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="at-photos">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="<?php the_sub_field('featured_image_1'); ?>" alt="">
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php the_sub_field('featured_image_2'); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>       

                <?php elseif( get_row_layout() == 'form' ): ?>    
                
                    <div class="service-detailed-body no-pad-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2><?php the_sub_field('main_title_form'); ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1">
                                    <div class="default-form">
                                        <?php the_sub_field('form_code'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                

                <?php elseif( get_row_layout() == 'left_image_right_content' ): ?>
                
                    <div class="service-detailed-body service-left--col"> 
                        <div class="container">
                            <div class="residental-content">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="residental-photo"><img src="<?php the_sub_field('featured_image_left_image'); ?>" alt=""></div>
                                    </div>
                                    <div class="col-xl-6">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                              
                    
                <?php elseif( get_row_layout() == 'centered_image' ): ?>

                    <div class="service-detailed-body auto-transport"> 
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="at-photos mx-auto">
                                        <img src="<?php the_sub_field('featured_image'); ?>" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>                    

                <?php elseif( get_row_layout() == 'who_we_are' ): ?>

                    <div class="service-detailed-body auto-transport"> 
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2><?php the_sub_field('main_title_who_we_are'); ?></h2>
                                    <?php the_sub_field('intro_text_who'); ?>

                                    <div class="moving-whoweare">
                                        <ul>
                                            <?php if( have_rows('who_we_are_list') ): ?>
                                                <?php while( have_rows('who_we_are_list') ): the_row(); ?>

                                                    <li><?php the_sub_field('icon_code'); ?> <?php the_sub_field('text'); ?></li>

                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>                    

                <?php elseif( get_row_layout() == 'middle_cta' ): ?>

                    <div class="quote-area with-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                                    <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
                                </div>
                            </div>
                        </div>      
                    </div>

                <?php elseif( get_row_layout() == 'services_content' ): ?>

                    <div class="service-detailed-body no-pad-bottom mov-serv">
                        <div class="container">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3><?php the_sub_field('main_title'); ?></h3>
                                    <?php the_sub_field('content_block_content'); ?>
                                </div>
                            </div>

                        </div>
                    </div>                    

                <?php elseif( get_row_layout() == 'bottom_cta' ): ?>

                    <div class="service-detailed-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="quote-title"><?php the_sub_field('cta_title'); ?></span>
                                    <div class="quote-area">
                                        <a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                                        <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>    

    </div>
  
<?php
get_footer();
