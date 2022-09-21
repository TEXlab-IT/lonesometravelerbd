<?php
/**
 * Partial template for content in page.php
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php the_content(); ?>

		<div class="slider-wrapper theme-default">
			<div id="contentSlider" class="content-slider nivoSlider"
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G01.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G02.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G03.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G04.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G05.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G06.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G07.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G08.jpg" alt="Vinaora Nivo Slider 3.x" >
				<img src="https://www.lonesome-traveler.de/images/animationen/gruppenreisen-en/G19.jpg" alt="Vinaora Nivo Slider 3.x" >
			</div>
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
