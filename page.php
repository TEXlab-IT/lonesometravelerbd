<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper wrapper-padding" id="page-wrapper">

	<div class="container bg-white ptb" id="content" tabindex="-1">

		<div class="row">
			<div class="col-lg-8 content-area mobile-mb" id="primary">

                <main class="site-main" id="main">

                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div>

			<?php get_sidebar(); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
