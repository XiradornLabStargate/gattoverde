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

add_theme_support( 'post-thumbnails' );

/// Activate Menu Option
function gattoverde_register_nav_menu() {

	register_nav_menu( 'primary', 'Header Menu Navigation' );

}
add_action( 'after_setup_theme', 'gattoverde_register_nav_menu' );

/**
 * Content Functions
 */

function gattoverde_posted_meta() {
	$posted_on = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );

	$categories = get_the_category();
	$separator = ', ';
	$output = '';

	$i = 1;

	if ( !empty( $categories ) ) :

		foreach ($categories as $category) :

			if ( $i > 1 ) {
				$output .= $separator;
			}

			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( "View all post in%s", $category->name ) . '">' . esc_html( $category->name ) . '</a>';
			$i++;
			
		endforeach;

	endif;

	return '<span class="posted-on">Posted <a href="' . esc_url( get_permalink() ) . '">' . $posted_on . '</a> ago</span> / <span class="posted-in">' . $output . '</span>';
}

function gattoverde_posted_footer() {

	// $comments = '';
	$comments_num = get_comments_number();

	if ( comments_open() ) {

		if ( $comments_num == 0 ) {
			$comments = __( 'No Comments' );
		} elseif ( $comments_num == 1 ) {
			$comments = __( '1 Comment' );
		} else {
			$comments = __( 'Comments' );
		}
		$comments = '<a href="' . get_comments_link() . '">' . $comments . ' <span class="gattoverde-icon gattoverde-comment"></a>';

	} else {
		$comments = __( 'Comments are closed' );
	}

	return '<div class="post-footer-container"><div class="row"><div class="col-nd-12 col-lg-6">' . get_the_tag_list( '<div class="tags-list"><span class="gattoverde-icon gattoverde-tag"> </span>', ' ', '</div>' ) . '</div><div class="col-md-12 col-lg-6">' . $comments . '</div></div></div>';

}
?>
