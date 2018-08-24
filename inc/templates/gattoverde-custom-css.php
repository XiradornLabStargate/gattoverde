<h1>Gatto Verde Custom CSS Page</h1>

<?php settings_errors(); ?>

<?php 
	// $profile_picture = esc_attr( get_option( 'profile_picture' ) );
?>

<form id="save-custom-css-form" method="post" action="options.php" class="gattoverde-general-form">
	<?php settings_fields( 'gattoverde-custom-css-options' ); ?>
	<?php do_settings_sections( 'x_gattoverde_custom_css_page' ) ?>
	<?php submit_button(); ?>
</form>