<?php 
/*
	Audio post content format
	@package gattoverde
*/
?>

<!-- the the_ID returns a value. the get_the_ID() need to beh echoed for show the values -->

<article id="post-<?php the_ID(); ?>" <?php post_class( 'gattoverde-format-audio' ); ?>>
	
	<header class="entry-header">
		
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<div class="entry-meta">
			<?php echo gattoverde_posted_meta(); ?>
		</div>

	</header>
		
	<div class="entry-content">

		<?php echo gattoverde_get_embedded_media( array( 'audio', 'iframe' ) ); ?>

	</div><!-- .entry-content -->
		
	<footer class="entry-footer">
		<?php echo gattoverde_posted_footer(); ?>
	</footer>

</article>