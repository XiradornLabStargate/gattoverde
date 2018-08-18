<h1>Sunset Theme Options</h1>

<?php settings_errors(); ?>

<?php 
	$first_name = esc_attr( get_option( 'first_name' ) );
	$last_name = esc_attr( get_option( 'last_name' ) );
	$full_name = $first_name . ' ' . $last_name;
	$user_description = esc_attr( get_option( 'user_description' ) );
?>

<div class="gattoverde-sidebar-preview">
	<div class="gattoverde-sidebar">
		<h1 class="gattoverde-username"><?php print $full_name; ?></h1>
		<h2 class="gattoverde-user-description"><?php print $user_description; ?></h2>
		<div class="icons-wrapper"></div>
	</div>
</div>

<form method="post" action="options.php" class="gattoverde-general-form">
	<?php settings_fields( 'gattoverde-settings-group' ) ?>
	<?php do_settings_sections( 'x_gattoverde' ) ?>
	<?php submit_button(); ?>
</form>