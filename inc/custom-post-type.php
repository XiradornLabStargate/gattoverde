<?php 
/**
 * @package gattoverde
 *
 * Custom Post Type Section
 */

/// Check if is Activate the Custom post function
$options = get_option( 'activate_contact' );
if ( @$options == 1 ) {

	add_action( 'init', 'gattoverde_contact_custom_post_type' );

	// use a filter because we want sent some vars to a specific callback function
	// add_filter( 'menage_MYCUSTOMPOSTTYPE_posts_columns' );
	add_filter( 'manage_gattoverde-contact_posts_columns', 'gattoverde_set_gattoverde_contact_columns' );

	// now we can customize the editing property of the single column
	add_action( 'manage_gattoverde-contact_posts_custom_column', 'gattoverde_set_gattoverde_custom_column', 10, 2 );

}

/** Contact CPT */
function gattoverde_contact_custom_post_type() {

	$labels = array(
		'name'                  => 'Messages',
		'singular_name'         => 'Message',
		'menu_name'             => 'Messages',
		'name_admin_bar'        => 'Message'
	);

	$args = array(
		'labels'                => $labels,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'menu_position'			=> 26,
		'menu_icon'				=> 'dashicons-email-alt',
		'supports'				=> array( 'title', 'editor', 'author' ),
	);

	register_post_type( 'gattoverde-contact', $args );

}

// function for generate filter
function gattoverde_set_gattoverde_contact_columns( $columns ) {

	// example we can hide the author column in this way
	// unset( $columns[ 'author' ] );
	// return $columns;
	
	$newColumns = array();
	$newColumns[ 'title' ] = 'Full Name';
	$newColumns[ 'message' ] = 'Message';
	$newColumns[ 'email' ] = 'Email';
	$newColumns[ 'date' ] = 'Date';
	return $newColumns;

}

// this function loops throught the single element in the db
function gattoverde_set_gattoverde_custom_column( $column, $post_id ) {

	switch ( $column ) {

		case 'message' :
			echo get_the_excerpt();
		break;

		case 'email' :
			//email column
		break;
		
		default:
			// code...
		break;
	
	}

}