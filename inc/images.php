<?php
/**
 * Custom image sizes
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// general
add_image_size('preview-image', 300, 200, TRUE);
add_image_size('test-image', 260, 260, TRUE);

// Blog
add_image_size('blog-image', 810, 540, TRUE);
add_image_size('blogfull-image', 1024, 9999, FALSE);

// City
add_image_size('city-image', 600, 600, TRUE);