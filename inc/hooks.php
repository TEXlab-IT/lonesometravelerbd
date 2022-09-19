<?php
/**
 * Custom hooks
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'lonesometraveler_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function lonesometraveler_site_info() {
		do_action( 'lonesometraveler_site_info' );
	}
}

if ( ! function_exists( 'lonesometraveler_add_site_info' ) ) {
	add_action( 'lonesometraveler_site_info', 'lonesometraveler_add_site_info' );

	/**
	 * Add site info content.
	 */
	function lonesometraveler_add_site_info() {
		$name        = get_bloginfo( 'name', 'display' );
		$curent_year = date( 'Y' );

		$site_info = sprintf(
			'<p class="site-info-text">%1$s<span class="sep"> </span>%2$s</p>',
			sprintf(
				esc_html__( '© Copyright ' . $curent_year . ' %1$s All Rights Reserved. ', 'lonesometraveler' ),
				'<a href="' . esc_url( __( site_url( '/' ), 'lonesometraveler' ) ) . '">' . $name . '.</a>'
			),
			sprintf(
				esc_html__( 'Website by %1$s', 'lonesometraveler' ),
				'<a href="' . esc_url( __( 'https://www.texlabit.com/', 'lonesometraveler' ) ) . '" class="website-by" target="_blank">Tex Lab It</a>'
			)

		);

		echo apply_filters( 'lonesometraveler_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
