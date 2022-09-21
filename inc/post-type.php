<?php
/**
 * Custom Post Type
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


function lonesometraveler_custom_post_type()
{
	$labels = array(
		'name' => __('Slider'),
		'singular_name' => __('Slider'),
		'name_admin_bar' => __('Add New'),
		'all_items' => __('All Sliders'),
		'search_items' => __('Search Sliders'),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => false,
		'rewrite' => array('slug' => 'sliders'),
		'menu_position' => 7,
		'supports' => array('title'),
		'menu_icon' => 'dashicons-slides',
	);

	register_post_type('slider', $args);

}

add_action('init', 'lonesometraveler_custom_post_type');




