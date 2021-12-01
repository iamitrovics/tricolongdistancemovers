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
                            Posted in
                            
                            <?php
                            global $post;
                            $categories = get_the_category($post->ID);
                            $cat_link = get_category_link($categories[0]->cat_ID);
                            echo '<a href="'.$cat_link.'">'.$categories[0]->cat_name.'</a>' 
                            ?>                            
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

                                <div class="accordion-section">
									<?php if( get_sub_field('accordion_title') ): ?>
										<h3><?php the_sub_field('accordion_title'); ?></h3>
									<?php endif; ?>
									<div class="accordion-list">
									<?php if( have_rows('accordion_list') ): ?>
										<?php while( have_rows('accordion_list') ): the_row(); ?>

											<div class="panel">
												<h4><?php the_sub_field('heading'); ?></h4>
												<div class="panel__content">
													<?php the_sub_field('content'); ?>
												</div>
											</div>
											<!-- /.panel -->
										<?php endwhile; ?>
									<?php endif; ?>
									</div>
									<!-- // acc  -->
								</div>
								<!-- // section  -->

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
                                    
                                <?php elseif( get_row_layout() == 'featured_article' ): ?>    
                                    <?php
                                        $post_objects = get_sub_field('featured_article_list');

                                        if( $post_objects ): ?>
                                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                <?php setup_postdata($post); ?>
                                                    
                                                <div class="featured-article-box">
                                                    <div class="blog-box">
                                                        <div class="blog-photo">
                                                            <a href="<?php echo get_permalink(); ?>" target="_blank">
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
                                                            <h3><a href="<?php echo get_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                                            <a href="<?php echo get_permalink(); ?>" class="btn-cta" target="_blank">Read More<i class="fas fa-chevron-circle-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.featured-article -->
                                                    
                                            <?php endforeach; ?>
                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif; ?>
                                    <?php wp_reset_postdata(); ?>

                                <?php elseif( get_row_layout() == 'services_module' ): ?>

                                    <section id="services" class="services-blog-module">
                                        <div class="row">

                                        <?php
                                            $post_objects = get_sub_field('services_list_blog_page');

                                            if( $post_objects ): ?>
                                                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                    <?php setup_postdata($post); ?>

                                                    <div class="col-lg-4">
                                                        <div class="service-box">
                                                            <h3><?php the_title(); ?></h3>
                                                            <img src="<?php the_field('service_icon_serv'); ?>" alt="">
                                                            <a href="<?php echo get_permalink(); ?>" target="_blank">Read More</a>
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                        <?php endif; ?>

                                    
                                        </div>
                                    </section>

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

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="author-desc">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                <div class="author-content">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                    <p><?php the_author_description(); ?></p>
                </div>
                <!-- /.author-content -->
            </div>
        </div>
        <!-- // col  -->
    </div>
    <!-- // row  -->
</div>
<!-- // container  -->

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

<section class="similar-posts first-child-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Recent posts</h2>
                <div class="posts-list">
                    <div class="row">

                    <?php
                        $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3) ); ?>  
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <div class="col-lg-4 col-md-6">
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
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-4 col-md-6 --> 

                            <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>    
                    <?php wp_reset_query(); ?>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.posts-list -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.similar-posts -->

<section class="similar-posts last-child-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Related posts</h2>
                <div class="posts-list">
                    <div class="row">

                        <?php
                            $categories =   get_the_category();
                            // print_r($categories);
                            $rp_query   =  new WP_Query ([
                                'posts_per_page'        =>  3,
                                'post__not_in'          =>  [ $post->ID ],
                                'cat'                   =>  !empty($categories) ? $categories[0]->term_id : null,

                            ]);

                            if ( $rp_query->have_posts() ) {
                                while( $rp_query->have_posts() ) {
                                    $rp_query->the_post();
                                    ?>

                                    <div class="col-lg-4 col-md-6">
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
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-4 col-md-6 --> 

                                    <?php
                                }

                                wp_reset_postdata();

                            }

                        ?>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.posts-list -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.similar-posts -->

<?php
get_footer(); ?>
