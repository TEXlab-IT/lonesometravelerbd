<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
	<div class="wrapper-footer" id="wrapper-footer">
		<div class="footer-area">
			<div class="container">
				<div class="footer-top-section">
					<div class="footer-nav navbar-expand-md">
						<?php wp_nav_menu(
								array(
										'theme_location'  => 'footer-menu',
										'container_class' => 'navbar-collapse footer-menu',
										'container_id'    => 'navbarNavDropdown',
										'menu_class'      => 'nav navbar-nav',
										'menu_id'         => 'footer-menu',
										'depth'           => 1,
										'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
										'walker'          => new WP_Bootstrap_Navwalker(),
								)
						); ?>
					</div>
				</div>
			</div><!-- container end -->
		</div>

		<div class="site-info-area">
			<div class="container">
				<div class="site-info">
					<?php lonesometraveler_site_info(); ?>
				</div><!-- .site-info -->
			</div>
		</div>

	</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

