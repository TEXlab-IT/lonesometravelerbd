<?php
/**
 * Template Name: Home Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $home_exclude_id;

$home_exclude_id = array();

get_header();
?>
	<?php
	$slider = get_post_meta( get_the_ID(), 'slider_deactivate', true );
	if( $slider != 1 ) {
		get_template_part( 'template-parts/main-slider' );
	}
	?>
	<div class="wrapper home-wrapper" id="home-wrapper">
		<div class="container" id="content" tabindex="-1">

			<div class="row">
				<div class="col-lg-12 content-area" id="primary">

					<main class="site-main" id="main">

						<?php
						while ( have_posts() ) :
							the_post();
							?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content">

								<?php the_content(); ?>

							</div><!-- .entry-content -->

						</article>

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->
				</div>

			</div><!-- .row -->

			<div class="row">
				<div class="col-md-12">
					<?php get_template_part( 'template-parts/latest-news-section' ); ?>
				</div>
			</div>

		</div><!-- #content -->
	</div>
<?php
get_footer();
