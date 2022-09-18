<?php
/**
 * Template Name: Without Title Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

	<div class="wrapper" id="page-wrapper">

		<div class="container bg-white ptb" id="content" tabindex="-1">

			<div class="row">
				<div class="col-lg-8 content-area mobile-mb" id="primary">

					<main class="site-main" id="main">

						<?php
						while ( have_posts() ) :
							the_post();
							?>

							<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

								<div class="entry-content">

									<?php the_content(); ?>

								</div><!-- .entry-content -->

							</article><!-- #post-## -->

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->

				</div>

				<?php get_sidebar(); ?>

			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #page-wrapper -->

<?php
get_footer();
