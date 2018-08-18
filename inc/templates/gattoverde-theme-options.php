<h1>Gatto Verde Theme Options</h1>

<?php settings_errors(); ?>

<?php 
	// $profile_picture = esc_attr( get_option( 'profile_picture' ) );
?>

<form method="post" action="options.php" class="gattoverde-general-form">
	<?php settings_fields( 'gattoverde-theme-options-group' ); ?>
	<?php do_settings_sections( 'x_gattoverde_theme_options' ) ?>
	<?php submit_button(); ?>
</form>