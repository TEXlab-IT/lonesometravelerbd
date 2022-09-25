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
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo esc_url( site_url() ); ?>"><?php esc_html_e( 'Home', 'lonesometraveler' ) ?></a>
				</li>
				<?php if ( is_page() ) {
					if(has_post_parent(get_the_ID())){
						$id =  wp_get_post_parent_id(get_the_ID());
						echo sprintf('<li class="breadcrumb-item">%s</li>', get_the_title( $id ));
					}
					echo sprintf('<li class="breadcrumb-item active" aria-current="page">%s</li>', get_the_title());
				}?>
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


