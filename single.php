<?php
/**
 * The template for displaying all single posts
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>
	<div class="wrapper single-wrapper" id="single-wrapper">
        <main class="site-main" id="main">
			<div class="single-content-area">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'loop-templates/content', 'single' );
				 endwhile; ?>
			</div>
        </main><!-- #main -->
    </div><!-- #single-wrapper -->
<?php
get_footer();
