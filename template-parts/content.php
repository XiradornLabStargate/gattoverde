<?php 
/*
	Standard post content format
	@package gattoverde
*/
?>

<!-- the the_ID returns a value. the get_the_ID() need to beh echoed for show the values -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php echo gattoverde_posted_meta(); ?>
		</div>

	</header>
		
	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) : ?>

			<div class="standard-featured">
				<?php the_post_thumbnail(); ?>
			</div>

		<?php endif; ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="button-container">
			<a href="<?php the_permalink(); ?>" class="btn btn-dark"><?php _e( 'Read More' ); ?></a>
		</div>

	</div><!-- .entry-content -->
		
	<footer class="entry-footer">
		<?php echo gattoverde_posted_footer(); ?>
	</footer>

</article>