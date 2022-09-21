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

get_header(); ?>
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

		</div><!-- #content -->
	</div>
<?php
get_footer();
