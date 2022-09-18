<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$twitter_profile = get_the_author_meta( 'twitter_profile' );
$user_email = get_the_author_meta( 'user_email' );
?>

	<div class="wrapper author-wrapper" id="author-wrapper">
		<div class="container bg-white ptb" id="content" tabindex="-1">

			<div class="row">

				<div class="col-lg-8 content-area mobile-mb">
					<main class="site-main" id="main">
						<!-- Author Information -->
						<?php get_template_part( 'template-parts/author-bio' ); ?>

						<?php es_section_title('More Stories from this Author'); ?>

						<!-- The Loop -->
						<div class="author-post-area">
							<?php if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) :
									the_post();
									?>
									<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>

								<?php endwhile; ?>

							<?php else : ?>

								<?php get_template_part( 'loop-templates/content', 'none' ); ?>

							<?php endif; ?>
						</div>

						<!-- End Loop -->
						<div class="pagination-area">
							<?php themeplate_pagination(); ?>
						</div>
					</main>
				</div>

				<?php get_sidebar(); ?>

			</div> <!-- .row -->
		</div><!-- #content -->

	</div><!-- #author-wrapper -->

<?php
get_footer();
