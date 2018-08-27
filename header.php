<?php 
/*
	Header_part

	@package gattoverde
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo( 'name' ); wp_title(); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<div class="container-fluid">
		
		<div class="row">
				
			<header class="header-container text-center background-image col-lg-12" style="background-image: url(<?php header_image(); ?>);">
				
				<div class="header-content table">
					<div class="table-cell">
						<h1 class="site-title gattoverde-icon">
							<span class="gattoverde-logo"></span>
							<span class="d-none"><?php bloginfo( 'name' ); ?></span>
						</h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div>
				</div><!-- .header-content -->

				<div class="nav-container">
					
					<nav class="navbar navbar-expand-lg navbar-light navbar-gattoverde">
						<?php wp_nav_menu( array(
							'theme_location'	=> 'primary',
							'container'			=> '',
							'menu_class'		=> 'navbar-nav',
							'walker'			=> new Walker_Gattoverde_Nav_Primary(),
						) ); ?>
					</nav>

				</div><!-- .header-content -->

			</header><!-- .header-container -->

		</div><!-- .row -->

	</div><!-- .container-fluid -->
