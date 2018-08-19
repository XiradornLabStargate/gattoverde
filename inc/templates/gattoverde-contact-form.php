<h1>Gatto Verde Contact Page</h1>

<?php settings_errors(); ?>

<?php 
	// $profile_picture = esc_attr( get_option( 'profile_picture' ) );
?>

<form method="post" action="options.php" class="gattoverde-general-form">
	<?php settings_fields( 'gattoverde-contact-options' ); ?>
	<?php do_settings_sections( 'x_gattoverde_contact_page' ) ?>
	<?php submit_button(); ?>
</form>