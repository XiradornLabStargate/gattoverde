<?php 
/*
	Standard post content format
	@package gattoverde
*/
?>

<!-- the the_ID returns a value. the get_the_ID() need to beh echoed for show the values -->

<article id="post-<?php the_ID(); ?>" <?php post_class( 'gattoverde-format-link' ); ?>>
	
	<header class="entry-header text-center row">
		
		<?php

			$link = gattoverde_grab_url();

			the_title( '<h1 class="entry-title col-lg-12"><a href="' . $link . '" target="_blank">', '<div class="link-icon"><span class="gattoverde-icon gattoverde-link"></span></div></a></h1>' );
		?>

	</header>

</article>