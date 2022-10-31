<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lonesometraveler
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$site_lang = get_field( 'lonesome_site_language', 'option' );
$switch = get_field( 'url_language_switcher', get_the_ID() );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action( 'lonesometraveler_wp_body_open' ); ?>
<div class="site" id="page">
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<div class="header-top-section">
			<div class="container">
				<div class="row">
					<?php if ( 'de' == $site_lang ) {
						?>
						<div class="col-sm-6">
							<div id="fav-language" class="mod-languages">
								<a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo THEME_ASSETS_URL . '/images/de.gif'; ?>"
													alt="Deutsch" title="Deutsch"></a>

								<a href="<?php echo esc_url( 'https://en.lonesometravelerbd.com/' . $switch ); ?>"><img src="<?php echo THEME_ASSETS_URL . '/images/en.gif'; ?>"
													alt="English (UK)" title="English (UK)"></a>
							</div>
						</div>
					<?php } else if ( 'en' == $site_lang ) {
						?>
						<div class="col-sm-6">
							<div id="fav-language" class="mod-languages">
								<a href="<?php echo esc_url( 'https://lonesometravelerbd.com/' . $switch ); ?>"><img src="<?php echo THEME_ASSETS_URL . '/images/de.gif'; ?>"
													alt="Deutsch" title="Deutsch"></a>

								<a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo THEME_ASSETS_URL . '/images/en.gif'; ?>"
													alt="English (UK)" title="English (UK)"></a>
							</div>
						</div>
					<?php } ?>
					<div class="col-sm-6">
						<div class="top-header-right">
							<img src="<?php echo THEME_ASSETS_URL .'/images/topbar-text-en.jpg'; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="main-header" class="header-section">
			<div class="container">
				<nav id="main-nav" class="navbar navbar-expand-lg">
					<div class="navbar-brand header-logo-area">
						<div class="site-logo">
							<?php lonesometraveler_custom_logo(); ?>
						</div>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					wp_nav_menu(
						array(
								'theme_location'  => 'primary',
								'container_class' => 'header-navbar-area collapse navbar-collapse navbar-responsive-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'nav navbar-nav',
								'menu_id'         => 'main-menu',
								'depth'           => 4,
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
						)
					);

					?>
				</nav>
			</div><!-- .container -->
		</div>
	</div><!-- #wrapper-navbar end -->

