<?php 
/**
 * @package gattoverde
 *
 * Theme Option Functions
 */

$options = get_option( 'post_formats' );

$formats = array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();

foreach ( $formats as $format ) {
	$options[] = ( @$options[ $format ] == 1 ) ? $format : '';
}

if ( !empty( $options ) ) {

	add_theme_support( 'post-formats', $options );

}