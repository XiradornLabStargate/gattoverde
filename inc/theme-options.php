<?php 
/**
 * @package gattoverde
 *
 * Theme Option Functions
 */

/// POST FORMAT
$options = get_option( 'post_formats' );

$formats = array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();

foreach ( $formats as $format ) {
	$options[] = ( @$options[ $format ] == 1 ) ? $format : '';
}

if ( !empty( $options ) ) {

	add_theme_support( 'post-formats', $options );

}

/// HEADER
$options = get_option( 'custom_header' );

if ( @$options == 1 ) {

	add_theme_support( 'custom-header' );

}

/// BACKGROUND
$options = get_option( 'custom_background' );

if ( @$options == 1 ) {

	add_theme_support( 'custom-background' );

}

/// Activate Menu Option
function gattoverde_register_nav_menu() {

	register_nav_menu( 'primary', 'Header Menu Navigation' );

}
add_action( 'after_setup_theme', 'gattoverde_register_nav_menu' );