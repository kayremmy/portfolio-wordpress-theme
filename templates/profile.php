<h1>Theme Profile Options</h1>
<?php settings_errors(); ?>
<?php 
	
	$picture = esc_attr( get_option( 'profile_picture' ) );
	
?>

		<div> <?php print $picture; ?></div>

<form id="submitForm" method="post" action="options.php" class="general-form">
	<?php settings_fields( 'settings-group' ); ?>
    <?php do_settings_sections( 'templates_profile' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>
