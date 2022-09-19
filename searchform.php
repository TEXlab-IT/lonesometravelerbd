<?php
/**
 * The template for displaying search forms
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<div class="search-form-area">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" class="es-search-form">
		<button class="search-inner-icon"><i class="fa fa-search"></i></button>
		<input class="search" id="s" name="s" type="search"
			   placeholder="<?php esc_attr_e( 'What are you looking for?', 'lonesometraveler' ); ?>" value="<?php the_search_query(); ?>">
		<button type="submit" class="search-inner-btn"><?php echo esc_html__('Go', 'lonesometraveler') ?></button>
	</form>
</div>
