<?php
if ( function_exists('get_coauthors') && is_single() ) {
	$coauthors = get_coauthors();
	foreach ( $coauthors as $coauthor ) {
		?>
		<div class="author-info-wrapper">
			<div class="author-image">
				<?php echo get_avatar( $coauthor->ID, 180 ); ?>
			</div>
			<div class="author-content">
				<h2 class="author-name"><?php echo coauthors_posts_links_single( $coauthor ) ?></h2>
				<div class="author-desc">
					<?php echo wpautop( $coauthor->description ); ?>
				</div>
			</div>
		</div>
		<?php
	}
} else {
	$author_id          = get_the_author_meta( 'ID' );
	$author_url         = get_the_author_meta( 'url', $author_id );
	$user_posts         = get_author_posts_url( get_the_author_meta( 'ID', $author_id ) );
	?>
	<div class="author-info-wrapper">
		<div class="author-image">
			<?php echo get_avatar( $author_id, 180 ); ?>
		</div>
		<div class="author-content">
			<h2 class="author-name">
				<?php if(is_single()){
					echo sprintf('<a href="%s">%s</a>',$user_posts, get_the_author_meta( 'display_name', $author_id ));
				}else {
					the_author();
				}?>
			</h2>
			<div class="author-desc">
				<?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
			</div>
		</div>
	</div>
<?php } ?>






