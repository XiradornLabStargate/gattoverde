<?php 
/**
 * @package gattoverde
 *
 * Admin Functions
 */

function gattoverde_add_admin_page() {

	// Create the main page for theme
	// add_menu_page( 'Gatto Verde Theme Options', 'Gatto Verde', 'manage_options', 'x_gattoverde', 'gattoverde_theme_create_page', get_template_directory_uri(). '/img/sunset-icon.png', 110 );
	add_menu_page( 'Gatto Verde Theme Options', 'Gatto Verde', 'manage_options', 'x_gattoverde', 'gattoverde_theme_create_page', 'dashicons-art', 110 );

	// Create the subpage
	// add_submenu_page( 'x_gattoverde', 'Gatto Verde Settings', 'Settings', 'manage_options', 'x_gattoverde_settings', 'gattoverde_theme_settings_page' );
	add_submenu_page( 'x_gattoverde', 'Gatto Verde Theme Options', 'Settings', 'manage_options', 'x_gattoverde', 'gattoverde_theme_create_page' ); // we have used the same structure for not having a page repetitions

	add_submenu_page( 'x_gattoverde', 'Gatto Verde CSS Options', 'Custom CSS', 'manage_options', 'x_gattoverde_css', 'gattoverde_theme_css_page' );

	// Activate the custom settings
	add_action( 'admin_init', 'gattoverde_custom_settings' );

}
add_action( 'admin_menu', 'gattoverde_add_admin_page' );

function gattoverde_custom_settings() {

	register_setting( 'gattoverde-settings-group', 'first_name' );
	add_settings_section( 'gattoverde-sidebar-options', 'Sidebar Options', 'gattoverde_sidebar_options', 'x_gattoverde' );
	add_settings_field( 'sidebar-name', 'First Name', 'gattoverde_sidebar_name', 'x_gattoverde', 'gattoverde-sidebar-options' );

}

function gattoverde_sidebar_options() {

	echo 'Customize Sidebar Info';

}

function gattoverde_sidebar_name() {

	$first_name = esc_attr( get_option( 'first_name' ) );
	echo '<input type="text" name="first_name" value="' . $first_name . '" placeholder="First Name" />';

}

/**
 * Template Recalling
 */
function gattoverde_theme_create_page() {

	// generation of admin main page
	require_once get_template_directory() . '/inc/templates/gattoverde-admin.php';

}

// function gattoverde_theme_settings_page() {
// 	// generation of sub page 
// }

function gattoverde_theme_css_page() {

	// CSS subpages

}