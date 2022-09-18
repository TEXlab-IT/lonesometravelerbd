<?php
/**
 * Custom hooks
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'themeplate_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function themeplate_site_info() {
		do_action( 'themeplate_site_info' );
	}
}

if ( ! function_exists( 'themeplate_add_site_info' ) ) {
	add_action( 'themeplate_site_info', 'themeplate_add_site_info' );

	/**
	 * Add site info content.
	 */
	function themeplate_add_site_info() {
		$name        = get_bloginfo( 'name', 'display' );
		$curent_year = date( 'Y' );

		$site_info = sprintf(
			'<p class="site-info-text">%1$s<span class="sep"> </span>%2$s</p>',
			sprintf(
				esc_html__( '© Copyright ' . $curent_year . ' %1$s All Rights Reserved. ', 'themeplate' ),
				'<a href="' . esc_url( __( site_url( '/' ), 'themeplate' ) ) . '">' . $name . '.</a>'
			),
			sprintf(
				esc_html__( 'Website by %1$s', 'themeplate' ),
				'<a href="' . esc_url( __( 'https://www.texlabit.com/', 'themeplate' ) ) . '" class="website-by" target="_blank">Tex Lab It</a>'
			)

		);

		echo apply_filters( 'themeplate_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
