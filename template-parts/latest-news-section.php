<?php
/**
 * News Section template
 *
 * @package lonesometraveler
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $exclude;
$args = array(
	'posts_per_page' => 5,
	'post_type'      => 'post',
	'order'          => 'DESC',
	'orderby'        => 'publish_date',
	'post_status'    => 'publish',
	'exclude'        => $exclude,
);
$posts = get_posts( $args );
if( ! empty( $posts ) ){
	?>
	<section id="latestNewsSection" class="latest-news-section">
		<div class="container">
			<div class="rwo">
				<div class="col-12">
					<div class="timeline-breaker">
						<?php
						$time_string   = '<time datetime="%1$s">%2$s</time>';
						$time_string   = sprintf( $time_string,
								esc_html( date( 'F Y' ) ),
								esc_html( date( 'j F Y' ) )
						);
						echo $time_string;
						?>
					</div>
					<?php
					foreach ( $posts as $post) {
						setup_postdata( $post );
						$exclude[] = $post->ID;
						get_template_part('loop-templates/content', get_post_format());
					}
					wp_reset_postdata();
					?>
					<?php
					$args = array(
						'posts_per_page' => 6,
						'post_type'      => 'post',
						'exclude'        => $exclude,
						'post_status'    => 'publish',
					);
					apply_filters( 'lt_load_more_button', $args );
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
