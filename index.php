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

					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', get_post_format() );   
						}
					}

				?>

			</div><!-- .container -->

			<div class="container text-center">
				<!-- for having an ajax function we must point to ajax file in the admin folder -->
				<a href="javascript:void(0);" class="btn btn-lg btn-light gattoverde-load-more" data-page="1" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>"><span class="gattoverde-icon gattoverde-loading"></span> Load More</a>
			</div><!-- .container -->

		</main>

	</div><!-- #primary -->

<?php get_footer() ?>