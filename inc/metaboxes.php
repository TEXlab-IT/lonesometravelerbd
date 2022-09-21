<?php
/**
 * Custom Mataboxes for this theme
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Saving Metabox Data
 *
 * @param $post_id
 */
function lonesometraveler_save_postmeta( $post_id, $post, $is_update ) {

	if ( ! $is_update ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
	if ( 'post' !== get_post_type( $post_id ) && 'page' !== get_post_type( $post_id ) ) {
		return;
	}
	update_post_meta( $post_id, 'slider_deactivate', empty( $_POST['slider_deactivate'] ) ? '0' : '1' );


}

add_action( 'save_post', 'lonesometraveler_save_postmeta', 10, 3 );

/**
 * Register Metabox
 */
function lonesometraveler_register_metabox() {
	add_meta_box( 'slider-shortcode', 'Slider Shortcode', 'lonesometraveler_slider_shortcode_metabox', 'slider', 'side', 'high' );
	add_meta_box( 'top-slider', 'Top Slider', 'lonesometraveler_top_slider_metabox', array('post', 'page'), 'side', 'high' );
}

add_action( 'admin_init', 'lonesometraveler_register_metabox' );


/*
 * Candidate Shortcode
 */
function lonesometraveler_slider_shortcode_metabox( $post ) {
	?>
	<div class="meta-box">
		<p class="meta-options">
            [group_tour_slider id="<?php echo $post->ID; ?>"]
		</p>
	</div>
	<?php
}

/*
 * Post Controls Metabox
 */
function lonesometraveler_top_slider_metabox( $post ) {
	?>
	<div class="meta-box">
		<p class="meta-options">
			<input type="checkbox" name="slider_deactivate" class="post-format" id="slider_deactivate" value="1" <?php checked( get_post_meta( $post->ID, 'slider_deactivate', true ), '1' ); ?>>
			<label for="slider_deactivate" class="post-format-icon"><b><?php echo esc_html__( 'Slider Deactivate', 'lonesometraveler' ) ?></b></label>
		</p>
	</div>
	<?php
}
