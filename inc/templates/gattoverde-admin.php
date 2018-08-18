<h1>Sunset Theme Options</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">
	<?php settings_fields( 'gattoverde-settings-group' ) ?>
	<?php do_settings_sections( 'x_gattoverde' ) ?>
	<?php submit_button(); ?>
</form>