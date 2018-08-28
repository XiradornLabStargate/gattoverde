<?php 
/*
	Quote post content format
	@package gattoverde
*/
?>

<!-- the the_ID returns a value. the get_the_ID() need to beh echoed for show the values -->

<article id="post-<?php the_ID(); ?>" <?php post_class( 'gattoverde-format-quote' ); ?>>
	
	<header class="entry-header text-center">

		<div class="row">
			
			<div class="col-lg-8 offset-lg-2">
				
			<h1 class="quote-content"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h1>
			
			<?php the_title( '<h2 class="quote-author">- ', ' -</h2>' ); ?>
			
			</div><!-- .col-lg-8 -->

		</div><!-- .row -->

	</header>
		
	<footer class="entry-footer">
		<?php echo gattoverde_posted_footer(); ?>
	</footer>

</article>