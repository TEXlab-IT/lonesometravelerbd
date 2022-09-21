<?php
/**
 * Single Small Post template
 *
 * @package lonesometraveler
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
?>
	<article <?php post_class('single-layout'); ?> id="post-<?php the_ID(); ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</article>







