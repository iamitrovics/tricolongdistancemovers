<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png"  href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon.png">
    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->
	<?php if( get_field('head_code_snippet', 'options') ): ?>
		<?php the_field('head_code_snippet', 'options'); ?>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<?php if( get_field('body_code_snippet', 'options') ): ?>
		<?php the_field('body_code_snippet', 'options'); ?>
	<?php endif; ?>

	<div class="menu-overlay"></div>
	<div class="main-menu-sidebar visible-xs visible-sm visible-md" id="menu">

		<header>
			<a href="javascript:;" class="close-menu-btn"><img src="<?php bloginfo('template_directory'); ?>/img/ico/close-x.svg" alt=""></a>
		</header>
		<!-- // header  -->


		<nav id="sidebar-menu-wrapper">
			<img src="<?php the_field('mobile_logo_website', 'options'); ?>" alt="" class="mobile-logo">
			<div id="menu">    
				<ul class="nav-links">
					<?php
					wp_nav_menu( array(
						'menu'              => 'mobile',
						'theme_location'    => 'mobile',
						'depth'             => 2,
						'container'         => false,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => false,
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'items_wrap' => '%3$s',
						'walker'            => new wp_bootstrap_navwalkermobile())
					);
					?>  
				</ul>
			</div>
			<!-- // menu  -->

		</nav> 
		<!-- // sidebar menu wrapper  -->

	</div>
	<!-- // main menu sidebar  -->	

        <header id="top-bar" class="navbar navbar-expand-lg navbar-classic">
            <div class="container">
                <div class="top-bar__branding">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('website_logo_general', 'options'); ?>" alt=""></a>
                </div>
                <!-- // branding  -->
                <div class="collapse navbar-collapse" id="navbar-classic">

                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i></a></li>

                        <?php if( have_rows('menu_items_desktop', 'options') ): ?>
                            <?php while( have_rows('menu_items_desktop', 'options') ): the_row(); ?>

                                <?php if (get_sub_field('item_type') == 'Single Item') { ?>
                                    <li class="nav-item"><a class="nav-link" href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label'); ?></a></li>
                                <?php } elseif (get_sub_field('item_type') == 'Dropdown') { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-togglex" href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label'); ?></a>
                                        <ul class="dropdown-menu">
                                            <?php if( have_rows('dropdown_items') ): ?>
                                                <?php while( have_rows('dropdown_items') ): the_row(); ?>
                                                    <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('label_dropdown'); ?></a></li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                <?php } ?>   

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </ul>

                </div>

                <div id="mobile-menu--btn" class="d-lg-none">
                    <a href="javascript:;">
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <!-- // mobile  -->	

            </div>
            <!-- // container  -->
        </header>
        <!-- // #top-bar  -->
        <div class="page-wrapper"> 

       