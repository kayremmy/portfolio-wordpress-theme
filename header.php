<!DOCTYPE html>
<head>  
<html <?php language_attributes(); ?>>
  <title><?php bloginfo( 'name' ); wp_title(); ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="<?php bloginfo( 'description' ); ?>" name="description">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <?php wp_head(); ?>
  	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
	<!-- font awesome 5 cdn -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
</head>
<body id="page-top" <?php body_class(); ?> >
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="<?php echo site_url(''); ?>  "><?php bloginfo( 'name' ); ?></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        
      <?php
            wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => false,
            'container_id'      => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker())
            );
          ?>
         <div class="site-header__util">
                <?php if(is_user_logged_in()) { ?>
            <a href="<?php echo wp_logout_url();  ?>" class="btn btn--small  btn--dark-orange float-left btn--with-photo">
            <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
            <span class="btn__text">Log Out</span>
            </a>
            <?php } else { ?>
              <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
              <a href="<?php echo wp_registration_url(); ?>" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
             <?php } ?>
             <a href="#" class="search-trigger  js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
          </div>
    </div>
    </div>
  </nav>

  <!--/ Nav End /-->