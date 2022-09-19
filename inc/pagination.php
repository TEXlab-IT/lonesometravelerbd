<?php
/**
 * Pagination layout
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'lonesometraveler_pagination' ) ) {

	function lonesometraveler_pagination( $args = array(), $class = 'pagination' ) {

		if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 2,
				'prev_next'          => true,
				'prev_text'          => __( 'PREV', 'lonesometraveler' ),
				'next_text'          => __( 'NEXT >', 'lonesometraveler' ),
				'screen_reader_text' => __( 'posts navigation', 'lonesometraveler' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
			)
		);

		$links = paginate_links( $args );

		?>

		<nav class="posts-navigation" aria-label="<?php echo $args['screen_reader_text']; ?>">

			<ul class="pagination">

				<?php
				foreach ( $links as $key => $link ) {
					?>
					<li class="page-item <?php echo strpos( $link, 'current' ) ? 'active' : ''; ?>">
						<?php echo str_replace( 'page-numbers', 'page-link', $link ); ?>
					</li>
					<?php
				}
				?>

			</ul>

		</nav>

		<?php
	}
}

/**
 * Show Paginate Number
 */

if ( ! function_exists( 'lonesometraveler_pagination_number' ) ) {
	function lonesometraveler_pagination_number() {
		global $wp_query;
		$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		if ( $total > 1 ) :
			echo '<div class="pagination-number">';
				echo '<span class="total-page">'. esc_html__( 'Page', 'lonesometraveler' ).' ' .$current. ' '. esc_html__( 'of', 'lonesometraveler' ).' ' .$total. '</span>';
			echo '</div>';
		endif;
	}
}

