<?php
/**
 * Theme functions and definitions
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Store the theme's directory path and uri in constants
 */
define( 'THEME_DIR_PATH', get_template_directory() );
define( 'THEME_DIR_URI', get_template_directory_uri() );
define( 'THEME_ASSETS_URL', THEME_DIR_URI . '/assets' );

$lonesometraveler_includes = array(
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation?
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.

);

// phpcs:disable
foreach ( $lonesometraveler_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
