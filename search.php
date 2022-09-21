<?php
/**
 * The template for displaying search results pages
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$count 	= 0;
?>
	<div class="wrapper search-wrapper" id="search-wrapper">

		<div class="container" id="content" tabindex="-1">
			<div class="row">
				<div class="col-md-12">
					<?php $search_key = get_search_query(); ?>
					<header class="page-header search-page-header">
						<h2 class="page-title text-center"><?php echo esc_html__( 'You searched for:', 'lonesometraveler' ); ?></h2>
						<?php get_search_form(); ?>
					</header><!-- .page-header -->
				</div>
				<div class="col-lg-8 content-area mobile-mb" id="primary">

					<main class="site-main" id="main">

						<?php if ( have_posts() ) : ?>
							<?php lonesometraveler_section_title('Search results', 'left'); ?>
							<?php /* Start the Loop */ ?>
							<?php
							while ( have_posts() ) :
								the_post();
								?>

								<?php get_template_part( 'loop-templates/content', 'search' ); ?>

							<?php endwhile; ?>
							<div class="pagination-area">
								<?php lonesometraveler_pagination(); ?>
							</div>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>

					</main><!-- #main -->

				</div>

				<?php get_sidebar(); ?>

			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #search-wrapper -->

<?php
get_footer();
