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