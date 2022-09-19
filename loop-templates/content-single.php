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
				<div class="col-lg-8 mb-30">
					<header class="entry-header">
						<?php lonesometraveler_post_categories(); ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php
						if ( has_excerpt() ) {
							$excerpt = get_the_excerpt( get_the_ID() );
							echo '<h4 class="entry-subtitle">' . $excerpt .'</h4>';
						}
						?>
						<div class="entry-meta">
							<?php lonesometraveler_posted_on(); ?>
						</div>
						<div class="social-share-area">
							<?php
							lonesometraveler_post_social_share( get_the_ID(), [
									'facebook',
									'twitter',
									'envelope-o',
									'print',
									'link',
							], 'Share', true );
							?>
						</div>
					</header>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php
						$thumb_id       = get_post_thumbnail_id( $post->ID );
						$caption        = get_the_post_thumbnail_caption();
						$caption_by     = get_field( 'visual_artist', $thumb_id );
						$caption_by     = ! empty($caption_by->post_title) ? $caption_by->post_title : '';
						?>
						<div class="post-thumbnail <?php echo $caption ? 'with-caption' : ''; ?> <?php echo $template == 'small' ? 'col-md-5 es-bl' : 'col-md-12'; ?>">
							<?php echo get_the_post_thumbnail( $post->ID, 'medium-thumb' );
							if ( ! empty( $caption ) ) { ?>
								<p class="img-caption"><?php echo $caption; ?>
								<?php if ( ! empty( $caption_by ) ) { ?>
									<span class="caption-by"> By <span class="caption-author"><?php echo $caption_by; ?></span></span>
								<?php } ?>
								</p>
							<?php } ?>
						</div>
					<?php } ?>
					<div class="entry-content clearfix">
						<?php the_content(); ?>
					</div>
					<div class="entry-footer">
						<?php get_template_part( 'template-parts/author-bio' ); ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>

		</div>
	</article>







