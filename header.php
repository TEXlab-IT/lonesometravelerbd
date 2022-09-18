<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

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
<?php do_action( 'themeplate_wp_body_open' ); ?>
<div class="site" id="page">
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<div class="container-fluid">
			<div id="main-header" class="header-section">
				<div class="header-logo-area">
					<div class="site-logo">
						<?php everstep_custom_logo(); ?>
					</div>
				</div>
				<div class="header-right-area">
				</div>
			</div><!-- .container -->
		</div>
	</div><!-- #wrapper-navbar end -->

