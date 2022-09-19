<?php
/**
 * The sidebar containing the main widget area
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-lg-4 site-right-sidebar">

	<div id="secondary" class="widget-area es-border-left">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>

</div><!-- #secondary -->
