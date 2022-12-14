<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

	<div class="wrapper archive-wrapper" id="archive-wrapper">

		<div class="container" id="content" tabindex="-1">

			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
					</div>
				</div>
				<div class="col-lg-8 content-area" id="primary">

					<main class="site-main" id="main">

						<div class="timeline-breaker">
							<?php
							$time_string   = '<time datetime="%1$s">%2$s</time>';
							$time_string   = sprintf( $time_string,
									esc_html( date( 'F Y' ) ),
									esc_html( date( 'j F Y' ) )
							);
							echo $time_string;
							?>
						</div>

						<?php if ( have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php
							while ( have_posts() ) :
								the_post();
								?>

								<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>

							<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>

						<div class="pagination-area">
							<?php lonesometraveler_pagination_number(); ?>
							<?php lonesometraveler_pagination(); ?>
						</div>

					</main><!-- #main -->


				</div>

				<?php get_sidebar(); ?>

			</div> <!-- .row -->

		</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php
get_footer();
