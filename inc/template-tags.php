<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'lonesometraveler_posted_on' ) ) {
	function lonesometraveler_posted_on() {
        if ( 'post' === get_post_type() ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_html( get_the_time() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() ),
				esc_html( get_the_modified_time() )
			);

			$posted_on   = apply_filters(
				'lonesometraveler_posted_on',
				sprintf(
					'<span class="posted-on">%1$s</span>',
					apply_filters( 'lonesometraveler_posted_on_time', $time_string )
				)
			);
			if ( function_exists('coauthors_posts_links') && is_single() ) {
				$byline = sprintf('<span class="byline">by %s</span>', coauthors_posts_links(null, ' & ', null, null, false));
			}else {
				$byline = apply_filters(
						'lonesometraveler_posted_by',
						sprintf(
								'<span class="byline">By <a href="%1$s"> %2$s</a></span>',
								esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
								esc_html( get_the_author_meta( 'display_name' ) )
						)
				);
			}

            echo $byline . '<span class="pipe">|</span>' . $posted_on;
        }
    }
}


/**
 * Post Category Function
 */
if ( ! function_exists( 'lonesometraveler_post_categories' ) ) {
	function lonesometraveler_post_categories( $post_id = null ) {
		if ( 'post' === get_post_type() ) {
			$term = lonesometraveler_get_primary_term( get_the_ID() );
			if ( ! empty( $term ) ) { ?>
				<div class="post-category">
					<a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>">
						<?php echo esc_html__( $term->name, 'lonesometraveler' ); ?>
					</a>
				</div>
				<?php
			}
		}
	}
}

/**
 * Post ByLine Function
 */
if ( ! function_exists( 'lonesometraveler_post_byline' ) ) {
	function lonesometraveler_post_byline() {
		if ( 'post' === get_post_type() ) {
			$posted_by = sprintf(
				'<span class="byline"> %1$s<a class="url fn n" href="%2$s"> %3$s</a></span>',
				esc_html_x( 'by', 'post author', 'lonesometraveler' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			);
			echo $posted_by;
		}
	}
}


if ( ! function_exists( 'lonesometraveler_breadcrumbs' ) ) :

	function lonesometraveler_breadcrumbs() { ?>
		<nav aria-label="breadcrumb" class="site-breadcrumb">
			<ul class="breadcrumb lonesometraveler-breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo esc_url( site_url() ); ?>"><?php esc_html_e( 'Home', 'lonesometraveler' ) ?></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<?php if ( is_tag() ) { ?>
						<?php esc_html_e( 'Posts Tagged ', 'lonesometraveler' ) ?><span
							class="raquo">|</span><?php single_tag_title();
						echo( '' ); ?>
					<?php } elseif ( is_day() ) { ?>
						<?php esc_html_e( 'Posts made in', 'lonesometraveler' ) ?><?php echo esc_html( get_the_time( 'F jS, Y' ) ); ?>
					<?php } elseif ( is_month() ) { ?>
						<?php esc_html_e( 'Posts made in', 'lonesometraveler' ) ?><?php echo esc_html( get_the_time( 'F, Y' ) ); ?>
					<?php } elseif ( is_year() ) { ?>
						<?php esc_html_e( 'Posts made in', 'lonesometraveler' ) ?><?php echo esc_html( get_the_time( 'Y' ) ); ?>
					<?php } elseif ( is_search() ) { ?>
						<?php esc_html_e( 'Search results for', 'lonesometraveler' ) ?><?php the_search_query() ?>
					<?php } elseif ( is_404() ) { ?>
						<?php esc_html_e( '404', 'lonesometraveler' ) ?>
					<?php } elseif ( is_single() ) { ?>
						<?php $category = get_the_category();
						if ( $category ) {
							$catlink = get_category_link( $category[0]->cat_ID );
							echo( '<a href="' . esc_url( $catlink ) . '">' . esc_html( $category[0]->cat_name ) . '</a> ' . '<span class="raquo"> / </span> ' );
						}
						echo get_the_title(); ?>
					<?php } elseif ( is_category() ) { ?>
						<?php single_cat_title(); ?>
					<?php } elseif ( is_tax() ) { ?>
						<?php
						$tt_taxonomy_links = array();
						$tt_term           = get_queried_object();
						$tt_term_parent_id = $tt_term->parent;
						$tt_term_taxonomy  = $tt_term->taxonomy;

						while ( $tt_term_parent_id ) {
							$tt_current_term     = get_term( $tt_term_parent_id, $tt_term_taxonomy );
							$tt_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $tt_current_term, $tt_term_taxonomy ) ) . '" title="' . esc_attr( $tt_current_term->name ) . '">' . esc_html( $tt_current_term->name ) . '</a>';
							$tt_term_parent_id   = $tt_current_term->parent;
						}

						if ( ! empty( $tt_taxonomy_links ) ) {
							echo implode( ' <span class="raquo">|</span> ', array_reverse( $tt_taxonomy_links ) ) . ' <span class="raquo">|</span> ';
						}

						echo esc_html( $tt_term->name );
					} elseif ( is_author() ) {
						global $wp_query;
						$curauth = $wp_query->get_queried_object();

						echo ' ', esc_html( $curauth->nickname );

					} elseif ( is_page() ) {
						echo get_the_title();
					} elseif ( is_home() ) {
						esc_html_e( 'News', 'lonesometraveler' );
					} elseif ( class_exists( 'WooCommerce' ) and ( is_shop() ) ) {
						esc_html_e( 'Shop', 'lonesometraveler' );
					} ?>
				</li>
			</ul>
		</nav>
		<?php
	}
endif;

/**
 * Post Date and Author Function
 */
if ( ! function_exists( 'lonesometraveler_posted_meta' ) ) {
	function lonesometraveler_posted_meta() {
		//lonesometraveler_post_on();
		lonesometraveler_posted_on();
	}
}

/**
 * Post Date Function
 */
if ( ! function_exists( 'lonesometraveler_posted_on' ) ) {
	function lonesometraveler_posted_on() {
		if ( 'post' == get_post_type())  {
		$time_string   = '<p class="entry-date published">Published <span>%1$s</span></p><p class="updated">Updated <span>%2$s</span></p>';

		$time_string   = sprintf( $time_string,
			esc_html( get_the_date( 'F Y' ) ),
			esc_html( get_the_modified_date( 'F j, Y' ) ));
		?>
		<div class="posted-on">
			<?php echo $time_string; ?>
		</div>
		<?php
		}
	}
}


/**
 * Post Author Function
 */

if ( ! function_exists( 'lonesometraveler_posted_by' ) ) {
	function lonesometraveler_posted_by() {
        $byline = apply_filters(
            'lonesometraveler_posted_by',
            sprintf(
                '<span class="byline">By <a href="%1$s"> %2$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_html( get_the_author_meta( 'display_name' ) )
            )
        );
        echo $byline;

	}
}


