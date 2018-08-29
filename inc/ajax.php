<?php 
/**
 * @package gattoverde
 *
 * Ajax Functions
 */
	
add_action( 'wp_ajax_nopriv_gattoverde_load_more', 'gattoverde_load_more' );
add_action( 'wp_ajax_gattoverde_load_more', 'gattoverde_load_more' ); // allow only to logged use to do this

function gattoverde_load_more() {

	$paged = $_POST[ 'page' ] + 1;

	$query = new WP_Query( array(		
		'post_type'		=> 'post',
		'paged'			=> $paged,
	) );
	
	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {
			
			$query->the_post();
			get_template_part( 'template-parts/content', get_post_format() );   
		
		}
	
	}

	wp_reset_postdata();

	die(); // AJAX NEED EVER EVER EVER THE DIE AT THE END FOR CLOSE CONNECTION ---- SAFETY!!!!!!!!

}