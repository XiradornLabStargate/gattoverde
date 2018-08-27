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
			$comments = $comments_num . ' ' . __( 'Comments' );
		}
		$comments = '<a class="comments-link" href="' . get_comments_link() . '">' . $comments . ' <span class="gattoverde-icon gattoverde-comment"></a>';

	} else {
		$comments = __( 'Comments are closed' );
	}

	return '<div class="post-footer-container"><div class="row"><div class="col-nd-12 col-lg-6">' . get_the_tag_list( '<div class="tags-list"><span class="gattoverde-icon gattoverde-tag"> </span>', ' ', '</div>' ) . '</div><div class="col-md-12 col-lg-6 text-right">' . $comments . '</div></div></div>';

}

//
// Support functions for post content formats
// 

function gattoverde_get_attachment( $num = 1 ) {

	$output = '';

	if ( has_post_thumbnail() && $num == 1 ) { 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );	
	} else {
		// we have to check if there is an image inside the content and not in featured image
		$attachments = get_posts( array(
			'post_type'			=> 'attachment',
			'posts_per_page'	=> $num,
			'post_parent'		=> get_the_ID()
		) );

		if ( $attachments && $num == 1 ) {
			foreach ( $attachments as $attachment ) {
				$output = wp_get_attachment_url( $attachment->ID );				
			}
		} elseif ( $attachments && $num > 1 ) {
			// we create this exception for check if user have up more than one attachments
			$output = $attachments;
		}

		// just for not affects post 
		wp_reset_postdata();
	}
	return $output;

}


// Audio format support
function gattoverde_get_embedded_media( $type = array() ) {

	// global $post; ???? probably?

	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );

	// just for audio from soundcloud
	if ( in_array( 'audio', $type ) ) {
		$media = str_replace( '?visual=true', '?visual=false', $embed[0] );
	} else {
		$media = $embed[0];
	}

	return $media;

}