<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article <?php post_class('list-layout'); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">
		<?php echo lonesometraveler_posted_on(); ?>
		<?php
			$post_content = get_the_content( get_the_ID() );
			$content = strip_shortcodes($post_content);
			echo wpautop($content);
		?>
	</div>

</article><!-- #post-## -->
