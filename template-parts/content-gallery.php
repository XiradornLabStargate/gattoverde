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
		
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide gattoverde-carousel-thumb" data-ride="carousel">
				
				<div class="carousel-inner">
					
					<?php 

						$count = count($attachments) - 1;

						for ( $i = 0; $i <= $count; $i++ ) : 
							$active = ( $i == 0 ) ? ' active' : '';

							$n = ( $i == $count ) ? 0 : $i+1;
							$next_image = wp_get_attachment_thumb_url( $attachments[$n]->ID );
							$p = ( $i == 0 ) ? $count : $i-1;
							$prev_image = wp_get_attachment_thumb_url( $attachments[$p]->ID );

					?>

							<div class="carousel-item<?php echo $active; ?>">
								<div class="standard-featured background-image" style="background-image: url( <?php echo wp_get_attachment_url( $attachments[$i]->ID ); ?> )"></div>

								<div class="d-hide next-image-preview" data-image="<?php echo $next_image ?>"></div>
								<div class="d-hide prev-image-preview" data-image="<?php echo $prev_image ?>"></div>
							</div>

					<?php endfor; ?>

				</div>

				<a class="carousel-control-prev gattoverde-carousel-controll" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<div class="preview-container">
						<span class="thumbnail-container background-image"></span>
						<span class="gattoverde-icon gattoverde-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</div><!-- .preview-container -->
				</a>
				<a class="carousel-control-next gattoverde-carousel-controll" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<div class="preview-container">
						<span class="thumbnail-container background-image"></span>
						<span class="gattoverde-icon gattoverde-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</div><!-- .preview-container -->
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