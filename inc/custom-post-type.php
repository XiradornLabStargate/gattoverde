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

	// add anb action for generate custom metabox
	add_action( 'add_meta_boxes', 'gattoverde_contact_add_meta_box' );

	//add action for save post with new meta infos
	add_action( 'save_post', 'gattoverde_save_contact_email_data' );

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
			$email = get_post_meta( $post_id, '_gv_contact_email_value_key', true );
			echo '<a href="mailto:' . $email . '">' . $email . '</a>';
		break;
		
		default:
			// code...
		break;
	
	}

}

// generation of custom meta box area for collects a couple of info
function gattoverde_contact_add_meta_box() {

	// add_meta_box( $id, $title, $callback, $screen = null, $context = 'advanced', $priority = 'default', $callback_args = null )
	add_meta_box( 'contact_email', 'User Email', 'gattoverde_contact_email_callback', 'gattoverde-contact', 'side', 'default' );

}

// we need to insert a vars $post for grab all info linked to post
function gattoverde_contact_email_callback( $post ) {

	wp_nonce_field( 'gattoverde_save_contact_email_data', 'gattoverde_contact_email_meta_box_nonce' );

	$value = get_post_meta( $post->ID, '_gv_contact_email_value_key', true );

	echo '<label for="gattoverde_contact_email_field">User Email Address: </label>';
	echo '<input type="email" id="gattoverde_contact_email_field" name="gattoverde_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';

}

function gattoverde_save_contact_email_data( $post_id ) {

	if( ! isset( $_POST['gattoverde_contact_email_meta_box_nonce'] ) ) {
		return;
	}

	if( ! wp_verify_nonce( $_POST['gattoverde_contact_email_meta_box_nonce'], 'gattoverde_save_contact_email_data' ) ) {
		return;
	}

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if( ! isset( $_POST['gattoverde_contact_email_field'] ) ) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['gattoverde_contact_email_field'] );

	update_post_meta( $post_id, '_gv_contact_email_value_key', $my_data );

}