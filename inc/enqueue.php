<?php
/**
 * themeplate enqueue scripts
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'themeplate_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function themeplate_scripts() {
		// Get the theme data.
		$theme_version = 20220821;
		// Enqueue Font Family
        wp_enqueue_style( 'es-cabin-font', 'https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap', false );
        wp_enqueue_style( 'es-playfair-font', 'https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@300;400;500;600;700&display=swap', false );

        // Enqueue css
		wp_enqueue_style( 'themeplate-styles', THEME_ASSETS_URL . '/css/style.css', array(), $theme_version );

		wp_enqueue_script('owlcarousel-js', THEME_ASSETS_URL . '/vendor/carousel/js/owl.carousel.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'themeplate-scripts', THEME_ASSETS_URL . '/js/bundle.js', array( 'jquery' ), $theme_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'themeplate_scripts' );
