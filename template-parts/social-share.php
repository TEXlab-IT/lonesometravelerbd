<?php
/**
 * Social Share Template
 *
 * @package themeplate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
?>
<div class="social-share">
	<ul class="list-inline">
		<li>
			<a href="<?php echo themeplate_get_share_link( $post->ID, 'facebook' ); ?>" target="_blank"><i
						class="fa fa-facebook"></i></a>
		</li>
		<li>
			<a href="<?php echo themeplate_get_share_link( $post->ID, 'twitter' ); ?>" target="_blank"><i
					class="fa fa-twitter"></i></a>
		</li>
		<li>
			<a href="<?php echo themeplate_get_share_link( $post->ID, 'linkedin' ); ?>" target="_blank"><i
					class="fa fa-linkedin"></i></a>
		</li>
		<li>
			<a href="https://www.printfriendly.com" class="printfriendly" onclick="window.print(); return false;"><i
					class="fa fa-print"></i></a>
		</li>
		<li>
			<a href="<?php echo themeplate_get_share_link( $post->ID, 'email' ); ?>"><i class="fa fa-envelope-o"></i></a>
		</li>
		<li>
			<a href="#" class="copy-url-btn" id='copyToClip' data-url="<?php echo get_permalink( $post->ID ); ?>"><i class="fa fa-link"></i></a>
		</li>
	</ul>
</div>
