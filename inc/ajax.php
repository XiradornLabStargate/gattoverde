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
		'post_type'			=> 'post',
		'post_status'		=> 'publish',
		'paged'				=> $paged,
	) );
	
	if ( $query->have_posts() ) :

		echo '<div class="page-limit" data-page="/page/' . $paged . '">';

		while ( $query->have_posts() ) : $query->the_post();

			get_template_part( 'template-parts/content', get_post_format() );   
		
		endwhile;

		echo '</div>';
	
	endif;

	wp_reset_postdata();

	die(); // AJAX NEED EVER EVER EVER THE DIE AT THE END FOR CLOSE CONNECTION ---- SAFETY!!!!!!!!

}


// function for check paged
function gattoverde_check_paged( $num = null ) {

	$output = '';

	if ( is_paged() ) {
		$output = '/page/' . get_query_var( 'paged' );
	}

	if ( $num == 1 ) {

		$paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
		return $paged;

	} else {

		return $output;

	}

}