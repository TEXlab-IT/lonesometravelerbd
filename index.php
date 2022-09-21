<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div class="wrapper" id="index-wrapper">

		<div class="container bg-white ptb" id="content" tabindex="-1">

			<div class="row">
				<div class="col-lg-8 content-area mobile-mb" id="primary">

					<main class="site-main" id="main">

                    <?php if ( have_posts() ) : ?>
							<header class="page-header">
								<?php echo sprintf( '<h1 class="page-title">%s</h1>', esc_html__('Latest Posts') ); ?>
							</header><!-- .page-header -->

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

					</main><!-- #main -->
					<div class="pagination-area">
						<?php lonesometraveler_pagination_number(); ?>
						<?php lonesometraveler_pagination(); ?>
					</div>
				</div>

				<?php get_sidebar(); ?>

			</div><!-- .row -->
		</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
