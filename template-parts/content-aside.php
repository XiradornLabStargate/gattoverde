<?php 
/*
	Aside post content format
	@package gattoverde
*/

// use this tecnique if you dont want use JS for assign revela class
// $class = get_query_var( 'post-class' );

?>

<!-- the the_ID returns a value. the get_the_ID() need to beh echoed for show the values -->

<!-- // use this tecnique if you dont want use JS for assign revela class -->
<!-- <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'gattoverde-format-aside', $class ) ); ?>> -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'gattoverde-format-aside' ); ?>>
	
	<div class="aside-container">
		
		<div class="row">
			
			<div class="col-lg-2 text-center">
				<?php if ( gattoverde_get_attachment() ) : ?>
					<div class="aside-featured background-image" style="background-image: url( <?php echo gattoverde_get_attachment(); ?> );"></div>
				<?php endif; ?>
			</div><!-- .col-lg-4 -->
			
			<div class="col-lg-10">

				<header class="entry-header">
			
					<div class="entry-meta">
						<?php echo gattoverde_posted_meta(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
					
						<div class="entry-excerpt">
							<?php the_content(); ?>
						</div>

					</div><!-- .entry-content -->

				</header>
				
			</div><!-- col-lg-8 -->

		</div><!-- .row -->

		<footer class="entry-footer">
			<div class="row">
				<div class="col-lg-10 offset-lg-2"><?php echo gattoverde_posted_footer(); ?></div>
			</div>
		</footer>

	</div><!-- .aside-container -->
		

</article>