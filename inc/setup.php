<?php
/**
 * Theme basic setup
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */ //phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
}

add_action( 'after_setup_theme', 'lonesometraveler_setup' );

if ( ! function_exists( 'lonesometraveler_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lonesometraveler_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lonesometraveler, use a find and replace
		 * to change 'lonesometraveler' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'lonesometraveler', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'           => __( 'Primary Menu', 'lonesometraveler' ),
				'footer-menu'       => __( 'Footer Menu', 'lonesometraveler' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding Image Size
		 */
		add_image_size( 'full-thumb', 1660, 680, true );
		add_image_size( 'large-thumb', 1134, 636, true );
		add_image_size( 'medium-thumb', 776, 434, true );
		add_image_size( 'small-thumb', 365, 205, true );
		add_image_size( 'grid-thumb', 555, 310, true );
		add_image_size( 'list-thumbnail', 314, 175, true );
		add_image_size( 'small-list-thumb', 84, 68, true );


		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'lonesometraveler_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

	}
}


add_filter( 'excerpt_more', 'lonesometraveler_custom_excerpt_more' );

if ( ! function_exists( 'lonesometraveler_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function lonesometraveler_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

// Remove jQuery Migrate notice
if ( class_exists( 'jQuery_Migrate_Helper' ) ) {
    remove_action( 'admin_notices', array( 'jQuery_Migrate_Helper', 'admin_notices' ) );
    remove_action( 'admin_bar_menu', array( 'jQuery_Migrate_Helper', 'admin_bar_menu' ), 100 );
}
