<?php
/**
 * Template Name: Free Estimate Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header('quote');
?>

	<div id="moving-quote-intro" class="step1">
		<div class="container">
			<div class="intro-area">
				<div class="intro-area-in">
					<h1><?php the_field('main_title_quote_sidebar'); ?></h1>
					<?php the_field('content_block_quote_sidebar'); ?>
				</div>
				<img src="<?php the_field('featured_image_quote_sidebar'); ?>" alt="">
			</div>
			<div class="choose-area">
				<div class="choose-area-in">
					<h2><?php the_field('main_title_type_quote_page'); ?></h2>
					<div class="move-types">

						<?php if( have_rows('list_of_types_quotes') ): ?>
							<?php while( have_rows('list_of_types_quotes') ): the_row(); ?>

								<div class="move-type">
									<div class="move-type-icon">
										<img src="<?php the_sub_field('icon'); ?>" alt="">
									</div>
									<div class="move-type-content">
										<span class="caption"><?php the_sub_field('title'); ?></span>
										<span class="description"><?php the_sub_field('subtitle'); ?></span>
									</div>
									<a href="<?php the_sub_field('link_to_page'); ?>">Select Item</a>
								</div>

							<?php endwhile; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="moving-quote-body">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
				<?php if( have_rows('content_layout_quote_page') ): ?>
					<?php while( have_rows('content_layout_quote_page') ): the_row(); ?>
						<?php if( get_row_layout() == 'full_width_content' ): ?>
							<?php the_sub_field('content_block'); ?>
						<?php elseif( get_row_layout() == 'image' ): ?>

						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="quote-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a href="<?php the_field('button_link_quote_gen', 'options'); ?>" class="quote-btn"><?php the_field('button_label_quote_label', 'options'); ?> <i class="fas fa-chevron-circle-right"></i></a>
                        <a href="tel:<?php the_field('button_link_phone_gen', 'options'); ?>" class="call-btn"><?php the_field('button_label_phone_gen', 'options'); ?></a>
					</div>
				</div>
			</div>      
		</div>

	</div>

<?php get_footer(); ?>

