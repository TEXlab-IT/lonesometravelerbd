<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lonesometraveler
 */

//phpcs:ignore PHPCompatibility.Syntax.NewShortArray.Found

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_filter( 'body_class', 'lonesometraveler_body_classes' );

if ( ! function_exists( 'lonesometraveler_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function lonesometraveler_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'lonesometraveler_adjust_body_class' );

if ( ! function_exists( 'lonesometraveler_adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function lonesometraveler_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' === $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'lonesometraveler_change_logo_class' );

if ( ! function_exists( 'lonesometraveler_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function lonesometraveler_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"', $html );

		return $html;
	}
}

/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists( 'lonesometraveler_post_nav' ) ) {
	/**
	 * Prints post navigation
	 */
	function lonesometraveler_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
        <nav class="container navigation post-navigation">
            <h2 class="sr-only"><?php esc_html_e( 'Post navigation', 'lonesometraveler' ); ?></h2>
            <div class="row nav-links justify-content-between">
				<?php
				if ( get_previous_post_link() ) {
					previous_post_link( '<span class="nav-previous">%link</span>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'lonesometraveler' ) );
				}
				if ( get_next_post_link() ) {
					next_post_link( '<span class="nav-next">%link</span>', _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'lonesometraveler' ) );
				}
				?>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
		<?php
	}
}

if ( ! function_exists( 'lonesometraveler_pingback' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts of any post type.
	 */
	function lonesometraveler_pingback() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'lonesometraveler_pingback' );

if ( ! function_exists( 'lonesometraveler_mobile_web_app_meta' ) ) {
	/**
	 * Add mobile-web-app meta.
	 */
	function lonesometraveler_mobile_web_app_meta() {
		echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr( get_bloginfo( 'name' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'lonesometraveler_mobile_web_app_meta' );


/**
 * Primary Taxonomy Function
 *
 * @param bool $post_id
 * @param string $taxonomy
 *
 * @return array|bool|null|WP_Error|WP_Term
 */
if ( ! function_exists( 'lonesometraveler_get_primary_term' ) ) {
	function lonesometraveler_get_primary_term( $post_id = false, $taxonomy = 'category' ) {
		if ( ! $taxonomy ) {
			return false;
		}

		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
			$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post_id );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			if ( $wpseo_primary_term ) {
				return get_term( $wpseo_primary_term );
			}
		}

		$terms = get_the_terms( $post_id, $taxonomy );

		if ( ! $terms || is_wp_error( $terms ) ) {
			return false;
		}

		return $terms[ 0 ];
	}
}

// Mobile manu Arrow add
function es_add_arrow_to_nav_menu( $title, $item, $args, $depth ) {
	if ( in_array( 'menu-item-has-children', $item->classes ) && $args->menu_id === 'mobile-menu' ) {
		return $title . ' <i class="fa fa-angle-right"></i>';
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'es_add_arrow_to_nav_menu', 10, 4 );

/**
 * Get category link by category slug
 *
 * @param string category slug
 *
 * @return string
 */
if ( ! function_exists( 'es_get_category_link_by_slug' ) ) {
	function es_get_category_link_by_slug( $categroy_slug ) {
		if ( term_exists( $categroy_slug, 'category' ) ) {
			$category = get_category_by_slug( $categroy_slug );
			$cat_link = get_category_link( $category->term_id );

			return $cat_link;
		}
	}
}

/**
 * Arcive Title Filter
 *
 * @param $title
 *
 * @return string
 */
function es_arcive_title( $title ) {
	$title_parts = explode( ':', $title );
	if ( ! empty( $title_parts[ 1 ] ) ) {
		return $title_parts[ 1 ];
	}

	return $title_parts[ 0 ];
}

add_filter( 'get_the_archive_title', 'es_arcive_title', 10, 1 );


// Add ACF Theme Options Page
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug'  => 'theme-options',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}


// lonesometraveler social media function
function lonesometraveler_social_media() {
	// If ACF class is not available / active
	if (!class_exists('acf')) {
		return;
	}
	$fields = [
		'instagram' => 'fa fa-instagram',
		'twitter'   => 'fa fa-twitter',
        'facebook'  => 'fa fa-facebook',
		'linkedin' => 'fa fa-linkedin',
		'pinterest' => 'fa fa-pinterest',
		'youtube' => 'fa fa-youtube-play',
	];
	$id = 'option';
	$html = "<div class='social-media'>";
	$html .= "<span class='follow-text'>Follow Us</span>";
	foreach ($fields as $field => $class) {
		if (get_field($field, $id)) {
			$html .= "<a href='" . get_field($field, $id) . "' target='_blank'>";
			$html .= "<i class='{$class}' aria-hidden='true'></i>";
			$html .= "</a>";
		}
	}
	$html .= "</div>";
	echo $html;
}

function lonesometraveler_set_post_views( $postID ) {

    $count_key = 'es_post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );

    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count ++;
        update_post_meta( $postID, $count_key, $count );
    }
}

// Get post view number
if ( ! function_exists( 'lonesometraveler_get_post_views' ) ) {
	function lonesometraveler_get_post_views( $postID ) {
		$count_key = 'es_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );

			return 0;
		}

		return $count;
	}
}


/**
* Social Share Function
*
* @param $post_id
* @param $type
*
* @return string
*/
if ( ! function_exists( 'lonesometraveler_get_share_link' ) ) {
  function lonesometraveler_get_share_link( $post_id, $type ) {
     $url = '';
     switch ( $type ) {
        case 'facebook':
           $url = add_query_arg(
              [
                 'u'       => get_the_permalink( $post_id ),
                 '[title]' => apply_filters( 'lonesometraveler_share_fb_title', get_the_title( $post_id ) ),
              ], 'http://www.facebook.com/sharer.php'
           );
           break;
        case 'twitter':
           $url = add_query_arg(
              [
                 'url'  => get_the_permalink( $post_id ),
                 'text' => apply_filters( 'lonesometraveler_share_twitter_text', get_the_title( $post_id ) ),
                 'via'  => '',
              ], 'http://twitter.com/share'
           );
           break;
        case 'linkedin':
           $url = add_query_arg(
              [
                 'url'     => get_the_permalink( $post_id ),
                 'title'   => apply_filters( 'lonesometraveler_share_twitter_text', wp_strip_all_tags( get_the_title( $post_id ) ) ),
                 'summary' => get_post_field( 'the_excerpt', $post_id ),
              ], 'https://www.linkedin.com/shareArticle?mini=true'
           );
           break;
	   case 'pinterest':
		   $url = add_query_arg(
			   [
				   'url'     => get_the_permalink( $post_id ),
				   'media'   => wp_get_attachment_url( get_post_thumbnail_id() ),
				   'description'   => apply_filters( 'lonesometraveler_share_twitter_text', wp_strip_all_tags( get_the_title( $post_id ) ) ),
			   ], 'https://pinterest.com/pin/create/button'
		   );
		   break;
        case 'email':
        case 'envelope-o':
           $url = add_query_arg(
              [
                 'subject' => 'I thought you might be interested in this article',
                 'body'    => sprintf( 'Check out this site %s ', get_the_permalink( $post_id ) ),
              ],
              'mailto:'
           );
           break;
     }
     return $url;
  }
}

if (!function_exists('lonesometraveler_post_social_share')) {
  function lonesometraveler_post_social_share($post_id, array $socials, $title = null) {
     $html = '<div class="social-share">';
     if ($title) {
        $html .= '<span class="socila-share-text"><i class="fa fa-share-alt"></i>' . $title . '</span>';
     }
     $html .= '<ul class="list-inline">';
     foreach ($socials as $social) {
        $html .= '<li>';
        if ('envelope' === $social) {
           $html .= "<a class='send-message' target='_blank' data-title='" . get_the_title() . "'><i class='fa fa-envelope'></i></a>";
        } elseif ('link' === $social) {
           $html .= "<a class='copy-url-btn' id='copyToClip' data-url='" . get_the_permalink() . "'><i class='fa fa-link'></i></a>";
        } elseif ('print' === $social) {
           $html .= "<a href='https://www.printfriendly.com' class='printfriendly' onclick='window.print(); return false;'><i class='fa fa-{$social}'></i></a>";
        } else {
           $html .= "<a href='" . lonesometraveler_get_share_link($post_id, $social) . "' target='_blank' class='{$social}'><i class='fa fa-{$social}'></i></a>";
        }
        $html .= '</li>';
     }
     $html .= '</ul>';
     $html .= '</div>';
     echo $html;
  }
}

function lonesometraveler_section_title( $title, $class="", $url= null ) {
	if( ! empty( $url ) ) {
		echo sprintf('<div class="section-header"><h2 class="section-title %s"><a href="%s">%s</a></h2></div>',$class, $url, esc_html__($title, 'lonesometraveler'));
	}else {
		echo sprintf('<div class="section-header"><h2 class="section-title %s">%s</h2></div>',$class, esc_html__($title, 'lonesometraveler'));
	}

}


/**
 * Displays a custom logo.
 */
function lonesometraveler_custom_logo() {
	if ( ! has_custom_logo() ) {
		$logo_url = THEME_ASSETS_URL. '/images/site-logo.jpg';
		$logo = sprintf('<img width="402" height="135" src="%s" alt="%s" />', $logo_url, get_bloginfo( 'name' ) );
	} else {
		$custom_logo       = get_theme_mod( 'custom_logo' ) ? get_theme_mod( 'custom_logo' ) : '';
		$retina_logo_1x    = get_theme_mod( 'retina_logo_1x' ) != '' ? get_theme_mod( 'retina_logo_1x' ) . ' 1x' : '';
		$retina_logo_2x    = get_theme_mod( 'retina_logo_2x' ) != '' ? get_theme_mod( 'retina_logo_2x' ) . ' 2x' : '';
		$srcset_separator  = ( ! empty( $retina_logo_2x ) ) ? ', ' : '';
		$image = wp_get_attachment_image_src($custom_logo, 'full');
		$image_url = $image['0'];
		$width = $image['1'];
		$height = $image['2'];
		$logo = sprintf( '<img width="%1$s" height="%2$s" src="%3$s" srcset="%4$s" alt="%5$s">', $width, $height, $image_url, $retina_logo_1x . $srcset_separator . $retina_logo_2x, get_bloginfo( 'name' ) );
	}
	$aria_current = is_front_page() && ! is_paged() ? ' aria-current="page"' : '';
	echo sprintf(
			'<a href="%1$s" class="navbar-brand custom-logo-link" rel="home"%2$s>%3$s</a>',
			esc_url( home_url( '/' ) ),
			$aria_current,
			$logo
	);

}

// Login Logout Link on Header menu
add_filter('wp_nav_menu_items', 'lonesometraveler_add_login_logout_link', 10, 2);
function lonesometraveler_add_login_logout_link($items, $args) {
	if ( 'header-menu' == $args->theme_location ) {
		ob_start();
		if ( ! is_user_logged_in() ) {
			echo sprintf('<a href="%s">%s</a>',esc_url( site_url('/login/') ), __( 'Log in' ) );
		} else {
			echo sprintf('<a href="%s">%s</a>',esc_url( wp_logout_url( home_url( '/' ) ) ), __( 'Log out' ) );
		}
		$loginoutlink = ob_get_contents();
		ob_end_clean();
		$items .= '<li class="custom-login-logout-link menu-item nav-item">' . $loginoutlink . '</li>';
		return $items;
	}else {
		return $items;
	}
}


/*
 * Custom function for ACF
 */

if ( ! function_exists( 'lonesometraveler_get_field' ) ) {
	function lonesometraveler_get_field( $field_name, $id = null ) {
		if ( class_exists( 'acf' ) ) {

			if ( empty( $field_name ) ) {
				return;
			}

			$data = get_field( $field_name );

			if ( $id ) {
				$data = get_field( $field_name, $id );
			}

			if ( $data ) {
				return $data;
			} else {
				return false;
			}
		}
	}
}
