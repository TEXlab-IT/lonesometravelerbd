<?php
/**
 * Template Name: Tight Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
	<?php
	$slider = get_post_meta( get_the_ID(), 'slider_deactivate', true );
	if( $slider != 1 ) {
		get_template_part( 'template-parts/main-slider' );
	}
	?>
	<div class="wrapper" id="tight-page-wrapper">

		<div class="container bg-white ptb" id="content">

			<div class="row">

				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 content-area" id="primary">

					<main class="site-main" id="main" role="main">

						<?php
						while ( have_posts() ) :
							the_post();
							?>

							<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->

				</div><!-- #primary -->

			</div><!-- .row end -->

		</div><!-- #content -->

	</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
