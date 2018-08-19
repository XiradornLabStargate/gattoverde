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
	add_submenu_page( 'x_gattoverde', 'Gatto Verde Sidebar Options', 'Sidebar', 'manage_options', 'x_gattoverde', 'gattoverde_theme_create_page' ); // we have used the same structure for not having a page repetitions

	add_submenu_page( 'x_gattoverde', 'Gatto Verde Theme Options', 'Theme Options', 'manage_options', 'x_gattoverde_theme_options', 'gattoverde_theme_options_page' );

	add_submenu_page( 'x_gattoverde', 'Gatto Verde CSS Options', 'Custom CSS', 'manage_options', 'x_gattoverde_css', 'gattoverde_theme_css_page' );

	// Activate the custom settings
	add_action( 'admin_init', 'gattoverde_custom_settings' );

}
add_action( 'admin_menu', 'gattoverde_add_admin_page' );

function gattoverde_custom_settings() {

	// SIDEBAR OPTIONS
	register_setting( 'gattoverde-settings-group', 'profile_picture' );
	register_setting( 'gattoverde-settings-group', 'first_name' );
	register_setting( 'gattoverde-settings-group', 'last_name' );
	register_setting( 'gattoverde-settings-group', 'user_description' );
	register_setting( 'gattoverde-settings-group', 'twitter_handler', 'gattoverde_sanitize_twitter_handler' );
	register_setting( 'gattoverde-settings-group', 'facebook_handler' );
	register_setting( 'gattoverde-settings-group', 'gplus_handler' );
	
	add_settings_section( 'gattoverde-sidebar-options', 'Sidebar Options', 'gattoverde_sidebar_options', 'x_gattoverde' );

	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'gattoverde_sidebar_profile_picture', 'x_gattoverde', 'gattoverde-sidebar-options' );
	add_settings_field( 'sidebar-name', 'Full Name', 'gattoverde_sidebar_name', 'x_gattoverde', 'gattoverde-sidebar-options' );
	add_settings_field( 'sidebar-user-description', 'User Description', 'gattoverde_sidebar_user_description', 'x_gattoverde', 'gattoverde-sidebar-options' );
	add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'gattoverde_sidebar_twitter', 'x_gattoverde', 'gattoverde-sidebar-options' );
	add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'gattoverde_sidebar_facebook', 'x_gattoverde', 'gattoverde-sidebar-options' );
	add_settings_field( 'sidebar-gplus', 'Google+ Handler', 'gattoverde_sidebar_gplus', 'x_gattoverde', 'gattoverde-sidebar-options' );

	// THEME OPTIONS
	register_setting( 'gattoverde-theme-options-group', 'post_formats' );
	register_setting( 'gattoverde-theme-options-group', 'custom_header' );
	register_setting( 'gattoverde-theme-options-group', 'custom_background' );

	add_settings_section( 'gattoverde-theme-options', 'Theme Options', 'gattoverde_theme_options', 'x_gattoverde_theme_options' );

	add_settings_field( 'post-formats', 'Post Formats', 'gattoverde_post_formats', 'x_gattoverde_theme_options', 'gattoverde-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'gattoverde_custom_header', 'x_gattoverde_theme_options', 'gattoverde-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'gattoverde_custom_background', 'x_gattoverde_theme_options', 'gattoverde-theme-options' );
	
}

////// THEME OPTIONS
// Post formats callback function -- not needed
// function gattoverde_post_formats_callback( $input ) {
// 	return $input;
// }

// activate specific theme support
function gattoverde_theme_options() {
	echo 'Activate/Deactivate Specific Theme Options';
}

function gattoverde_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';

	foreach ( $formats as $format ) {
		$checked = ( @$options[ $format ] == 1 ) ? ' checked="checked"' : '';
		$output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1" ' . $checked . ' />' . $format . '</label><br>';
	}
	echo $output;
}

function gattoverde_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ) ? ' checked="checked"' : '';
	
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" ' . $checked . ' /> Activate Custom Header</label><br>';
}

function gattoverde_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ) ? ' checked="checked"' : '';
	
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" ' . $checked . ' /> Activate Custom Header</label><br>';
}

function gattoverde_theme_options_page() {
	
	// generation of sub page 
	require_once( get_template_directory() . '/inc/templates/gattoverde-theme-options.php' );

}

///// SIDEBAR SECTION
function gattoverde_sidebar_options() {
	echo 'Customize Sidebar Info';
}

function gattoverde_sidebar_profile_picture() {
	$profile_picture = esc_attr( get_option( 'profile_picture' ) );

	if ( $profile_picture ) {
		echo '<input type="button" value="Replace Profile Picture" id="upload-button" class="button button-secondary"/> ';
		echo '<input type="button" value="Remove Picture" id="remove-picture" class="button button-secondary" />';
		echo '<input type="hidden" name="profile_picture" id="profile-picture" value="' . $profile_picture . '" />';
	} else {
		echo '<input type="button" value="Replace Profile Picture" id="upload-button" class="button button-secondary"/>';
		echo '<input type="hidden" name="profile_picture" id="profile-picture" value="' . $profile_picture . '" />';
	}
}
function gattoverde_sidebar_name() {
	$first_name = esc_attr( get_option( 'first_name' ) );
	$last_name = esc_attr( get_option( 'last_name' ) );

	echo '<input type="text" name="first_name" value="' . $first_name . '" placeholder="First Name" />';
	echo '<input type="text" name="last_name" value="' . $last_name . '" placeholder="Last Name" />';
}
function gattoverde_sidebar_user_description() {
	$user_description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="' . $user_description . '" placeholder="Someting about you" />';
}

function gattoverde_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter" /><p class="description">Insert your Twitter Username. The @ will be stripped out</p>';
}
function gattoverde_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="' . $facebook . '" placeholder="Facebook" />';
}
function gattoverde_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="' . $gplus . '" placeholder="Google+" />';
}

// Sanitize Twitter Handler
function gattoverde_sanitize_twitter_handler( $input ) {
	$output = sanitize_text_field( $input );
	return str_replace( '@', '', $output );
}

/**
 * Template Recalling
 */
function gattoverde_theme_create_page() {

	// generation of admin main page
	require_once( get_template_directory() . '/inc/templates/gattoverde-admin.php' );

}

function gattoverde_theme_css_page() {

	// CSS subpages

}