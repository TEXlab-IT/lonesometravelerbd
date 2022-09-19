<?php
/**
 * Search results partial template
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('list-layout'); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'small-thumb' ); ?>
			</a>
		</div>
	<?php } ?>
	<header class="entry-header">
		<?php lonesometraveler_post_categories(); ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<p class="entry-subtitle">
				<?php
				if( has_excerpt()){
					echo get_the_excerpt();
				} else {
					$post_content = get_the_content( get_the_ID() );
					//$content = es_get_first_sentence($post_content);
					$content = strip_shortcodes($post_content);
					echo wp_trim_words( $content,22,'..');
				}
				?>
			</p>
	</header><!-- .entry-header -->

</article><!-- #post-## -->

