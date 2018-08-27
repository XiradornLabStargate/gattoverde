<?php 
/*
	Gallery post content format
	@package gattoverde
*/
?>

<!-- the the_ID returns a value. the get_the_ID() need to beh echoed for show the values -->

<article id="post-<?php the_ID(); ?>" <?php post_class( 'gattoverde-format-gallery' ); ?>>
	
	<header class="entry-header text-center">

		<?php  if ( gattoverde_get_attachment() ) : 
			$attachments = gattoverde_get_attachment( 7 );
		?>
		
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
				
				<div class="carousel-inner">
					
					<?php 
						$i = 0;
						foreach ( $attachments as $attachment ) : 
							$active = ( $i == 0 ) ? ' active' : ''; ?>

							<div class="carousel-item<?php echo $active; ?>">
								<div class="standard-featured background-image" style="background-image: url( <?php echo wp_get_attachment_url( $attachment->ID ); ?> )"></div>
							</div>

					<?php $i++; endforeach; ?>

				</div>

				<a class="carousel-control-prev" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div><!-- .carousel -->

		<?php endif; ?>
		
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<div class="entry-meta">
			<?php echo gattoverde_posted_meta(); ?>
		</div>

	</header>
		
	<div class="entry-content">

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-gattoverde"><?php _e( 'Read More' ); ?></a>
		</div>

	</div><!-- .entry-content -->
		
	<footer class="entry-footer">
		<?php echo gattoverde_posted_footer(); ?>
	</footer>

</article>