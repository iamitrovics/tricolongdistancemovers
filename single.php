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

<header id="masheader" class="blog-single-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header-caption">
                    <h1><?php the_title(); ?></h1>
                    <div class="header-text">
                        <?php the_field('excerpt_text'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="blog-box">
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
                    <div class="blog-info">
                        <span class="date"><i class="fas fa-calendar-alt"></i><?php echo get_the_date( 'F j, Y' ); ?></span>
                        <span class="author">
                            <?php $author_id = get_the_author_meta( 'ID' ); ?>
                            <?php the_author_meta( 'display_name', $author_id ); ?>                              
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="blog-detailed">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('content_layout_blog') ):
                        // loop through the rows of data
                        while ( have_rows('content_layout_blog') ) : the_row();
                            if( get_row_layout() == 'intro_text' ): ?>

                                <div class="intro__content">
                                    <?php the_sub_field('intro_content'); ?>
                                </div>
                                <!-- // intro  -->							

                            <?php elseif( get_row_layout() == 'full_width_content' ): ?>
							
                                <div class="main__content">
                                    <?php the_sub_field('content_block'); ?>
                                </div>								

                            <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                                <div class="blog-photo">
                                    <?php
                                    $imageID = get_sub_field('featured_image');
                                    $image = wp_get_attachment_image_src( $imageID, 'blogfull-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                        <?php 
                                        $values = get_sub_field( 'image_alt_text' );
                                        if ( $values ) { ?>
                                            <img class="img-responsive" alt="<?php the_sub_field('image_alt_text'); ?>" src="<?php echo $image[0]; ?>" /> 
                                        <?php 
                                        } else { ?>
                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                        <?php } ?>

                                        <?php if( get_sub_field('image_caption') ): ?>
                                        <div class="image__caption">
                                            <span class="photo-lablel"><?php the_sub_field('image_caption'); ?></span>
                                        </div>
                                        <?php endif; ?>

                                </div>
                                <!-- // inner image  -->
                            
                            <?php elseif( get_row_layout() == 'half_width_image' ): ?>

                                <div class="image__half">
                                    <?php
                                    $imageID = get_sub_field('featured_image');
                                    $image = wp_get_attachment_image_src( $imageID, 'blogfull-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                </div>
                                <!-- // inner image  -->

                            <?php elseif( get_row_layout() == 'table_of_contents' ): ?>

                            
                            <div class="blog__toc">
                                <span class="title">Table of Contents</span>
                                <ul>
                                    <?php if( have_rows('table_content') ): ?>
                                        <?php while( have_rows('table_content') ): the_row(); ?>
                                            
                                        <li><a href="#<?php the_sub_field('id_anchor'); ?>"><?php the_sub_field('main_heading'); ?></a>
                                        
                                                <?php if( have_rows('subheadings') ): ?>
                                                    <ul>
                                                <?php while( have_rows('subheadings') ): the_row(); ?>
                                                    <li><a href="#<?php the_sub_field('id_of_section'); ?>"><?php the_sub_field('subheading'); ?></a></li>
                                                <?php endwhile; ?>
                                                </ul>
                                                <?php endif; ?>

                                        </li>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                
                                </ul>
                            </div>
                            <!-- // toc  -->		

                            <?php elseif( get_row_layout() == 'video' ): ?>	

                                <div class="video__holder">
                                    <?php the_sub_field('embedded_code'); ?>
                                </div>	
                                
                            <?php elseif( get_row_layout() == 'accordion' ): ?>		

                                <div class="blog__accordion">
                                    <h3><?php the_sub_field('accordion_title'); ?></h3>

                                    <div class="accordion-list">
                                        <?php if( have_rows('accordion_list') ): ?>
                                            <?php while( have_rows('accordion_list') ): the_row(); ?>
                                                <h4><?php the_sub_field('heading'); ?></h4>
                                                <div class="panel">
                                                    <div class="panel__content">
                                                    <?php the_sub_field('content'); ?>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <!-- // list  -->
                                </div>
                                <!-- // accordion  -->

                            <?php elseif( get_row_layout() == 'quote' ): ?>	

                            <blockquote>
                                <?php the_sub_field('quotation_content'); ?>
                                <?php if( get_sub_field('source') ): ?>
                                <span class="author">- <?php the_sub_field('source'); ?></span>
                                <?php endif; ?>
                            </blockquote>	

                            <?php elseif( get_row_layout() == 'accordion' ): ?>				

                                <div class="accordion-section">
                                    <?php if( get_sub_field('accordion_title') ): ?>
                                        <h3><?php the_sub_field('accordion_title'); ?></h3>
                                    <?php endif; ?>
                                    <div class="accordion">
                                    <?php if( have_rows('accordion_list') ): ?>
                                        <?php while( have_rows('accordion_list') ): the_row(); ?>
                                            <span class="h4"><?php the_sub_field('heading'); ?></span>
                                            <div class="panel">
                                            <?php the_sub_field('content'); ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    </div>
                                    <!-- // acc  -->
                                </div>
                                <!-- // section  -->

                                <?php elseif( get_row_layout() == 'quote_cta' ): ?>

                                    <div class="quote-cta--single">
                                        <span class="title"><?php the_sub_field('cta_title'); ?></span>
                                        <a href="#bottom-form" class="btn-cta"><?php the_sub_field('button_label'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                                    </div>
                                    <!-- // single  -->                                      

                                <?php elseif( get_row_layout() == 'table' ): ?>

                                <table style="width:100%" class="single-table">
                                    <thead>
                                        <tr role="row">

                                        <?php

                                            // check if the repeater field has rows of data
                                            if(have_rows('table_head_cells')):

                                                // loop through the rows of data
                                                while(have_rows('table_head_cells')) : the_row();

                                                    $hlabel = get_sub_field('table_cell_label_thead');

                                                    ?>  

                                                    <th tabindex="0" rowspan="1" colspan="1"><?php echo $hlabel; ?></th>

                                                <?php endwhile;

                                            else :
                                                echo 'No data';
                                            endif;
                                            ?>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php while ( have_posts() ) : the_post(); ?>

                                        <?php 

                                        // check for rows (parent repeater)
                                        if( have_rows('table_body_row') ): ?>
                                            
                                            <?php 

                                            // loop through rows (parent repeater)
                                            while( have_rows('table_body_row') ): the_row(); ?>

                                                    <?php 

                                                    // check for rows (sub repeater)
                                                    if( have_rows('table_body_cells') ): ?>
                                                        <tr>
                                                            <?php 

                                                            // loop through rows (sub repeater)
                                                            while( have_rows('table_body_cells') ): the_row();

                                                                
                                                                ?>
                                                                <td><?php the_sub_field('table_cell_label_tbody'); ?></td>
                                                            <?php endwhile; ?>
                                                        </tr>
                                                    <?php endif; //if( get_sub_field('') ): ?>

                                            <?php endwhile; // while( has_sub_field('') ): ?>
                                                
                                        <?php endif; // if( get_field('') ): ?>

                                        <?php endwhile; // end of the loop. ?>
                                        
                                    </tbody>
                                </table>  

                            <?php endif;
                        endwhile;
                    else :
                    endif;
                    ?>

            </div>
        </div>
    </div>
</div>   

<div id="blog-cta">
    <div class="container">
        <div class="row" id="bottom-form">
            <div class="col-lg-8 offset-lg-2">

                <div class="cta-wrapper">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#moving-home" role="tab" aria-controls="home" aria-selected="true">
                                Moving your Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#moving-car" role="tab" aria-controls="profile" aria-selected="false">
                                Moving your Car
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#moving-both" role="tab" aria-controls="contact" aria-selected="false">Moving Both</a>
                        </li>
                    </ul>
                    <!-- // tabs  -->

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="moving-home" role="tabpanel" aria-labelledby="home-tab">
                            <?php echo do_shortcode('[contact-form-7 id="28874" title="Moving Your Home"]'); ?>
                        </div>
                        <!-- // tab 1  -->
                        <div class="tab-pane fade" id="moving-car" role="tabpanel" aria-labelledby="profile-tab">
                            <?php echo do_shortcode('[contact-form-7 id="28878" title="Moving your Car"]'); ?>
                        </div>
                        <!-- // tab 2  -->
                        <div class="tab-pane fade" id="moving-both" role="tabpanel" aria-labelledby="contact-tab">
                            <?php echo do_shortcode('[contact-form-7 id="28881" title="Moving Both"]'); ?>
                        </div>
                        <!-- // tab 3  -->
                    </div>
                    <!-- // tab content  -->

                </div>
                <!-- // wrapper  -->

            </div>
            <!-- // col  -->
        </div>
        <!-- // row  -->

    </div>
    <!-- // container  -->
</div>
<!-- // blog cta  -->

<?php
get_footer();
