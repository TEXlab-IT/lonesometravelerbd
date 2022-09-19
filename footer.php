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
				<div class="row">
					<div class="col-md-12">
						<div class="footer-top-section">

						</div>
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

