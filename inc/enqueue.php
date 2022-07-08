<?php

/*
	
	========================
	ADMIN ENQUEUE FUNCTIONS
	========================
*/

function load_admin_scripts( $hook ){
	//echo $hook;
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	//register css admin section
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
  wp_enqueue_style('login_styles', get_theme_file_uri('/css/login.css'));
	
	//register js admin section
	wp_register_script( 'uploader', get_template_directory_uri() . '/js/uploader.js', array('jquery'), '1.0.0', true );
	
	
	//PHP 7
	
	if( in_array( $hook ) ){
		
		wp_enqueue_style( 'raleway-admin' );
    wp_enqueue_style( 'custom-google-fonts' );
		wp_enqueue_style( 'uploader' );
	
	} 
	
	if( $hook ){
		
		wp_enqueue_media();
		
		wp_enqueue_script( 'uploader' );
		
	}

}
add_action( 'admin_enqueue_scripts', 'load_admin_scripts' );


/*
	========================
	FRONT-END ENQUEUE FUNCTIONS
	========================
*/
  function kayremmie_files() {
    wp_enqueue_style('font_awesome', get_theme_file_uri('/lib/font-awesome/css/font-awesome.min.css'));
    wp_enqueue_style('animation',get_theme_file_uri( '/lib/animate/animate.min.css'));
    wp_enqueue_style('ion_icons',get_theme_file_uri('/lib/ionicons/css/ionicons.min.css'));
    wp_enqueue_style('owl_carousel',get_theme_file_uri('/lib/owlcarousel/assets/owl.carousel.min.css') );
    wp_enqueue_style('lightbox',get_theme_file_uri('/lib/lightbox/css/lightbox.min.css'));
    wp_enqueue_style('custom_google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:   100,300,400,400i,700,700i');
    wp_enqueue_style('bootstrap', get_theme_file_uri('/lib/bootstrap/css/bootstrap.min.css') );
    wp_enqueue_style('slick-styles', get_theme_file_uri('/assets/slick/slick.css'));
    wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/slick/slick-theme.css'));
     wp_enqueue_style('product-styles', get_theme_file_uri('/css/product.css'));
    wp_enqueue_style('search-overlay', get_theme_file_uri('/css/search-overlay.css'));
    wp_enqueue_style('main_styles', get_theme_file_uri('/css/style.css'));

   wp_deregister_script( 'jquery' );
   wp_register_script( 'jquery' , get_template_directory_uri() . '/lib/jquery/jquery.min.js', false, '1.1', true );
   wp_enqueue_script('jquery');
   wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=yourkeygoeshere', NULL, '1.0', true);
   wp_enqueue_script( 'migrate', get_template_directory_uri() . '/lib/jquery/jquery-migrate.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'popper', get_template_directory_uri() . '/lib/popper/popper.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/lib/bootstrap/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'easying', get_template_directory_uri() . '/lib/easing/easing.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/lib/counterup/jquery.waypoints.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'counterup', get_template_directory_uri() . '/lib/counterup/jquery.counterup.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'carousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/lib/lightbox/js/lightbox.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'typed', get_template_directory_uri() .     '/lib/typed/typed.min.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'contact', get_template_directory_uri() .  '/js/contact.js', array('jquery'), '1.0.0', true );
   wp_enqueue_script( 'like-js', get_template_directory_uri() .'/js/Like.js', array('jquery'), '1.0.0', true );
   wp_enqueue_script( 'custom-js', get_template_directory_uri() .'/js/custom.js', array('jquery','slick-js'), '1.0.0', true );

      wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/slick/slick.js', array ( 'jquery' ), null, true);   wp_enqueue_script( 'slick-main-js', get_template_directory_uri() . '/assets/slick/main.js', array ( 'jquery','slick-js' ), null, true);
   wp_enqueue_script( 'main_script', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);

   wp_localize_script('like-js', 'kayremmieData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
 }
  
  add_action('wp_enqueue_scripts', 'kayremmie_files');
