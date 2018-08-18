<?php 
/**
 * @package gattoverde
 *
 * Admin Enqueue Functions
 */

// thehook var is used for check the page
function gattoverde_load_admin_scripts( $hook ) {

	// allow the enqueuing only in the desired page. In this case the page have the id toplevel_page_x_gattoverde. I can individuate the id with echo $hook
	if ( 'toplevel_page_x_gattoverde' != $hook ) { return; } 

	wp_register_style( 'gattoverde_admin', get_template_directory_uri() . '/css/gattoverde.admin.css', [], '1.0.0', 'all' );
	wp_enqueue_style( 'gattoverde_admin' );

	wp_enqueue_media();

	wp_register_script( 'gattoverde-admin-scripts', get_template_directory_uri() . '/js/gattoverde.admin.js', [], '1.0.0', true );
	wp_enqueue_script( 'gattoverde-admin-scripts' );

}
add_action( 'admin_enqueue_scripts', 'gattoverde_load_admin_scripts' );