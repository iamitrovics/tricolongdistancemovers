<?php
/**
 * Template Name: FAQ Template
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
					$values = get_field( 'main_title_header_faq' );
					if ( $values ) { ?>
					<h1><?php the_field('main_title_header_faq'); ?></h1>
					<?php 
					} else { ?>
						<h1><?php the_title(); ?></h1>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>

	<div id="faq-page">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<h2><?php the_field('main_title_faq_list'); ?></h2>
					<?php the_field('subtitle_faq_page'); ?>

					<?php if( have_rows('faq_list_faq_page') ): ?>
						<?php while( have_rows('faq_list_faq_page') ): the_row(); ?>

							<h3><?php the_sub_field('question'); ?></h3>
							<?php the_sub_field('answer'); ?>

						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>

