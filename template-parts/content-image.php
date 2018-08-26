<?php 
/*
	Image post content format
	@package gattoverde
*/
?>

<!-- the the_ID returns a value. the get_the_ID() need to beh echoed for show the values -->

<article id="post-<?php the_ID(); ?>" <?php post_class( 'gattoverde-format-image' ); ?>>
	
	<?php 

		// $featured_image = gattoverde_get_attachment();
		
	?>

	<!-- <header class="entry-header text-center background-image" style="background-image: url(<?php echo $featured_image; ?>);"> -->
	<header class="entry-header text-center background-image" style="background-image: url(<?php echo gattoverde_get_attachment(); ?>);">
		
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<div class="entry-meta">
			<?php echo gattoverde_posted_meta(); ?>
		</div>

		<div class="entry-excerpt image-caption">
			<?php the_excerpt(); ?>
		</div>

	</header>

		
	<footer class="entry-footer">
		<?php echo gattoverde_posted_footer(); ?>
	</footer>

</article>