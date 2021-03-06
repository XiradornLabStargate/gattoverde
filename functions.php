<?php 

/**
 * ADMIN FUNCTIONS
 */
require( get_template_directory() . '/inc/cleanup.php' );
require( get_template_directory() . '/inc/function-admin.php' );
require( get_template_directory() . '/inc/enqueue.php' );


/**
 * FRONTEND FUNCTIONS
 */
require( get_template_directory() . '/inc/theme-options.php' );
require( get_template_directory() . '/inc/custom-post-type.php' );
require( get_template_directory() . '/inc/walker.php' );
require( get_template_directory() . '/inc/ajax.php' );