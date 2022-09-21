<?php
/**
 * Theme shortcode
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Group Tour Slider
 */
function lonesometraveler_group_tour_slider( $atts ) {
	extract( shortcode_atts( array(
			'id' => '',
	), $atts ) );
	if ( empty( $id ) ) {
		return;
	}
	$slider_items = lonesometraveler_get_field('slider_items', $id);
	ob_start();
	if( ! empty( $slider_items ) ){
		?>
		<div class="slider-wrapper theme-default">
			<div id="contentSlider" class="content-slider nivoSlider"
				<?php
				foreach ($slider_items as $slider) {
					$image = $slider['image'];
					$link = $slider['url'];
					$newTab = $slider['new_tab'];
					$target = $newTab == true ? 'target="_blank"' : '';
					if (!empty($link)) {
						echo sprintf('<a href="%s" %s>%s</a>', $link, $target, wp_get_attachment_image($image, 'full'));
					} else {
						echo wp_get_attachment_image($image, 'full');
					}
				}

				?>
			</div>
		</div>
		<?php
	}
	return ob_get_clean();
}
add_shortcode( 'group_tour_slider', 'lonesometraveler_group_tour_slider' );




