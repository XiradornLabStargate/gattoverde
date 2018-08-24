<?php 
/**
 * @package gattoverde
 *
 * Admin Enqueue Functions
 */

// thehook var is used for check the page
function gattoverde_load_admin_scripts( $hook ) {

		// allow the enqueuing only in the desired page. In this case the page have the id toplevel_page_x_gattoverde. I can individuate the id with echo $hook
		switch ( $hook ) {

		 	case 'toplevel_page_x_gattoverde' :
		 		wp_register_style( 'gattoverde_admin', get_template_directory_uri() . '/css/gattoverde.admin.css', [], '1.0.0', 'all' );
				wp_enqueue_style( 'gattoverde_admin' );

				wp_enqueue_media();

				wp_register_script( 'gattoverde-admin-scripts', get_template_directory_uri() . '/js/gattoverde.admin.js', [ 'jquery' ], '1.0.0', true );
				wp_enqueue_script( 'gattoverde-admin-scripts' );
		 	break;

		 	case 'gatto-verde_page_x_gattoverde_custom_css_page' : 
				wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/gattoverde.ace.css', [], '1.0.0', 'all' );
		 		
		 		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', [ 'jquery' ], '1.4.1', true );
		 		wp_enqueue_script( 'gattoverde-custom-css-script', get_template_directory_uri() . '/js/gattoverde.ace.js', [ 'jquery' ], '1.0.0', true );
		 	break;

		 	default:
		 		return;
		 	break;

		}

}

add_action( 'admin_enqueue_scripts', 'gattoverde_load_admin_scripts' );

/**
 * FrontEnd Code embedding
 */

function gattoverde_load_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], '4.1.3', 'all' );
	wp_enqueue_style( 'gattoverde', get_template_directory_uri() . '/css/gattoverde.css', [], '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', [], '1.12.4', true );
	wp_enqueue_script( 'jquery' );


	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', [ 'jquery' ], '4.1.3', true );

}

add_action( 'wp_enqueue_scripts', 'gattoverde_load_scripts' );