<?php 
/*
	Index
	@package gattoverde
*/
?>

<?php get_header() ?>

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main" role="main">
			
			<div class="container gattoverde-posts-container">
				
				<?php 

					echo '<div class="page-limit" data-page="/' . gattoverde_check_paged() . '">';
					
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();

							// use this tecnique if you dont want use JS for assign revela class
							// $class = 'reveal';
							// set_query_var( 'post-class', $class );
							get_template_part( 'template-parts/content', get_post_format() );   
						
						endwhile;
					endif;

					echo '</div>';

				?>

			</div><!-- .container -->

			<div class="container text-center">
				
				<!-- for having an ajax function we must point to ajax file in the admin folder -->
				<a class="btn-gattoverde-load gattoverde-load-more" data-page="<?php echo gattoverde_check_paged(1); ?>" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">
					<span class="gattoverde-icon gattoverde-loading"></span>
					<span class="text">Load More</span>
				</a>

			</div><!-- .container -->

		</main>

	</div><!-- #primary -->

<?php get_footer() ?>