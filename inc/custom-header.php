<?php
/**

 *
 * @link    https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package the-gap
 */

/**
 * Set up the WordPress core custom header feature.
 * 

**/

function the_gap_custom_header_setup() {
	
	

	add_theme_support( 'custom-header', apply_filters( 'the_gap_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/assets/images/cover.jpg',
		'default-text-color' => '000000',
		'width'              => 1300,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'header-text'         => false,
		'video'              => true,
		'wp-head-callback'   => '',
	) ) );
	
}

add_action( 'after_setup_theme', 'the_gap_custom_header_setup' );

