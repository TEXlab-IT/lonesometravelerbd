<?php
/**
 * Main Slider Template
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$main_sliders = lonesometraveler_get_field('main_slider', 'option');
if( ! empty($main_sliders) ) {
?>
	<div class="slider-wrapper theme-default">
		<div id="mainSlider" class="nivoSlider"
			<?php
			foreach ( $main_sliders as $slider ) {
				$image = $slider[ 'image' ];
				$link  = $slider[ 'url' ];
				$newTab = $slider[ 'new_tab' ];
				$target = $newTab == true ? 'target="_blank"' : '';
				if( ! empty( $link ) ) {
					echo sprintf('<a href="%s" %s>%s</a>', $link, $target, wp_get_attachment_image($image, 'full'));
				}else {
					echo wp_get_attachment_image($image, 'full');
				}
			}
			?>
		</div>
	</div>
<?php
}
