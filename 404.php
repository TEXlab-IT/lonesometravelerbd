<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper error-404-wrapper" id="error-404-wrapper">

	<div class="container bg-white ptb" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-10 offset-md-1" id="primary">

					<section class="error-404 not-found text-center h-100 mt-5 mb-5">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( '404 Error', 'themeplate' ); ?></h1>
							<h4 class="sub-title"><?php esc_html_e( 'Oops, we can’t seem to find the page you are looking for.', 'themeplate' ); ?></h4>

						</header><!-- .page-header -->

						<div class="page-content m-3 pb-2">
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
                        <div class="text-center mt-5 mb-5">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-to-btn"><i class="fa fa-angle-double-left"></i> <?php _e( 'Back To Home', 'themeplate' ); ?></a>
                        </div>

					</section><!-- .error-404 -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
