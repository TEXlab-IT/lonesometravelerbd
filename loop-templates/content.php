<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$layout    = isset( $args['layout'] ) ? $args['layout'] : 'list-layout';
$thumbnail = isset( $args['thumbnail'] ) ? $args['thumbnail'] : 'small-thumb';
$excerpt   = isset( $args['excerpt'] ) ? $args['excerpt'] : true;
$category = isset( $args['category'] ) ? $args['category'] : true;
?>

<article <?php post_class($layout); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="image-wrap" title="<?php echo get_the_title(); ?>">
				<?php echo get_the_post_thumbnail( get_the_ID(), $thumbnail ); ?>
			</a>
		</div>
	<?php }else { ?>
		<div class="post-thumbnail default">
		</div>
	<?php } ?>
	<header class="entry-header">
		<?php
		if( $category == true ) {
			lonesometraveler_post_categories();
		}
		?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if( $excerpt == true ) { ?>
			<p class="entry-subtitle">
				<?php
				if( has_excerpt()){
					echo get_the_excerpt();
				} else {
					$post_content = get_the_content( get_the_ID() );
					$content = strip_shortcodes($post_content);
					echo wp_trim_words( $content,22,'..');
				}
				?>
			</p>
		<?php } ?>


	</header><!-- .entry-header -->

</article><!-- #post-## -->
