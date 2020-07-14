<?php
/**
 * the-gap Functions
 *
 * 
 * @package the-gap
 * 
 */


function the_gap_html_id($param)
{
    $id = '';

    $unique_id = uniqid();
	
	$id .= $param;
	$id .= '_';
    $id .= $unique_id;
 
    return esc_attr($id);
}

function the_gap_make_class($id)
{
	
    $class = '.';

	
	$class .= $id;
	
 
    return esc_attr($class);
}

function the_gap_wp_page_menu($add_page) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $add_page, $adjusts);
	$class   = $adjusts[1];
	$replace    = array('<div class="'.$class.'">', '</div>');
	$new_page = str_replace($replace, '', $add_page);
	$new_page = preg_replace('/^<ul>/i', '<ul class="'.$class.'">', $new_page);
	return $new_page;
}
add_filter('wp_page_menu', 'the_gap_wp_page_menu');