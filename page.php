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
<div class="slider-wrapper theme-default">
	<div id="mainSlider" class="nivoSlider"
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_01.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_02.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_03.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_04.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_05.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_06.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_07.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_08.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_09.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_10.jpg" alt="Vinaora Nivo Slider 3.x" >
	<img src="https://www.lonesome-traveler.de/images/slideshow/08/08_slideshow_11.jpg" alt="Vinaora Nivo Slider 3.x" >
	</div>
</div>
<div class="wrapper page-wrapper" id="page-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			<div class="col-lg-12 content-area" id="primary">

                <main class="site-main" id="main">

                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
