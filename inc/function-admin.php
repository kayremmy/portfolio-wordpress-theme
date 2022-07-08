<?php
/*
	========================
	PROFILE ADMIN PAGE
	========================
*/

function add_admin_page() {
	
	//Generate  Admin Page
	add_menu_page( 'Profile Options', 'Profile', 'manage_options', 'kayremmie_profile', 'create_profile',  'dashicons-welcome-learn-more', 7);

}
add_action( 'admin_menu', 'add_admin_page' );


//Activate custom settings
function custom_settings() {
    //profile options
	register_setting( 'settings-group', 'profile_picture' );
	register_setting( 'settings-group', 'first_name' );
	register_setting( 'settings-group', 'last_name' );
	register_setting( 'settings-group', 'profile_email' );
	register_setting( 'settings-group', 'profile_address' );
	register_setting( 'settings-group', 'profile_phone' );
	register_setting( 'settings-group', 'user_description' );
	register_setting( 'settings-group', 'twitter_handler', 'sanitize_twitter_handler' );
	register_setting( 'settings-group', 'facebook_handler' );
       register_setting( 'settings-group', 'instagram_handler' );

      add_settings_section( 'kayremmie-profile-options', 'Profile Options', 'kayremmie_profile_options', 'kayremmie_profile');

    add_settings_field( 'profile-picture', 'Profile Picture', 'profile_picture', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-name', 'Full Name', 'profile_name', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-email', 'Email', 'profile_email', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-address', 'Address', 'profile_address', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-phone', 'Phone', 'profile_phone', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-description', 'Description', 'profile_description', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-twitter', 'Twitter handler', 'profile_twitter', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-facebook', 'Facebook handler', 'profile_facebook', 'kayremmie_profile', 'kayremmie-profile-options');
	add_settings_field( 'profile-instagram', 'Instagram handler', 'profile_instagram', 'kayremmie_profile', 'kayremmie-profile-options');

}

add_action( 'admin_init', 'custom_settings' );


function create_profile(){
       //get profile page
    require_once( get_template_directory() . '/templates/profile.php' );
	
}

function profile_picture() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="sunset-icon-button dashicons-before dashicons-no"></span> Remove</button>';
	}
	
}
function profile_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function profile_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<textarea name="user_description"  placeholder="Description" rows="5" cols="52">'.$description.'</textarea><p class="description">Write something about yourself.</p>';
}
function profile_email() {
	$email = esc_attr( get_option( 'profile_email' ) );
	echo '<input type="text" name="profile_email" value="'.$email.'" placeholder="Your email" />';
}
function profile_address() {
	$address = esc_attr( get_option( 'profile_address' ) );
	echo '<input type="text" name="profile_address" value="'.$address.'" placeholder="Your address" />';
}
function profile_phone() {
	$phone = esc_attr( get_option( 'profile_phone' ) );
	echo '<input type="text" name="profile_phone" value="'.$phone.'" placeholder="phone number" />';
}
function profile_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function profile_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function profile_instagram() {
	$instagram = esc_attr( get_option( 'instagram_handler' ) );
	echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="instagram handler" />';
}

//Sanitization settings
function sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

// Profile Options Functions
function kayremmie_profile_options() {
	echo 'Customize your Profile Information';
}

// Customize Login Screen

function ourHeaderUrl() {
	return esc_url(site_url('/'));
  }
  add_filter('login_headerurl', 'ourHeaderUrl');
  
  
 function ourLoginCSS() {
	wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('login_styles', get_theme_file_uri('/css/login.css'));
  }
  
  add_action('login_enqueue_scripts', 'ourLoginCSS');
  
  function ourLoginTitle() {
	return get_bloginfo('name');
  }add_filter('login_headertitle', 'ourLoginTitle');
