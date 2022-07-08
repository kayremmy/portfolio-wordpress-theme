<?php
  function kayremmie_customize_register($wp_customize){
    // Showcase Section
    $wp_customize->add_section('home', array(
      'title'   => __('Slider-Home', 'kayremmie'),
      'description' => sprintf(__('Options for home','kayremmie')),
      'priority'    => 130
    ));

    $wp_customize->add_setting('home_bg-image', array(
      'default'   => get_bloginfo('template_directory').'/img/banner.png',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'home_bg-image', array(
      'label'   => __('home_bg-image', 'kayremmie'),
      'section' => 'home',
      'settings' => 'home_bg-image',
      'priority'  => 1
    )));


    $wp_customize->add_setting('home_heading', array(
      'default'   => _x('I am Remmy', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('home_heading', array(
      'label'   => __('Heading', 'kayremmie'),
      'section' => 'home',
      'priority'  => 2
    ));

    $wp_customize->add_setting('home_text', array(
      'default'   => _x('Web Developer,Web Designer,Frontend Developer,Graphic Designer', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('home_text', array(
      'label'   => __('Text', 'kayremmie'),
      'section' => 'home',
      'priority'  => 3
    ));

    $wp_customize->add_setting('btn_url', array(
      'default'   => _x('http://kayremmie.com', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_url', array(
      'label'   => __('Button URL', 'kayremmie'),
      'section' => 'home',
      'priority'  => 4
    ));

    $wp_customize->add_setting('btn_text', array(
      'default'   => _x('Read More', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_text', array(
      'label'   => __('Button Text', 'kayremmie'),
      'section' => 'home',
      'priority'  => 5
    ));
  }

  add_action('customize_register', 'kayremmie_customize_register');


  function counter_customize_register($wp_customize){
    // Showcase Section
    $wp_customize->add_section('counter paralax-mf bg-image', array(
      'title'   => __('Counter-Home', 'kayremmie'),
      'description' => sprintf(__('Options for counter','kayremmie')),
      'priority'    => 140
    ));

    $wp_customize->add_setting('bg-image', array(
      'default'   => get_bloginfo('template_directory').'/img/counters-bg.jpg',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bg-image', array(
      'label'   => __('bg-image', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'settings' => 'bg-image',
      'priority'  => 1
    )));


    $wp_customize->add_setting('counter-box', array(
      'default'   => _x('ion-checkmark-round', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-box', array(
      'label'   => __('Icon-1', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 2
    ));

    $wp_customize->add_setting('counter-num', array(
      'default'   => _x('450', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-num', array(
      'label'   => __('WORKS COMPLETED', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 3
    ));


    $wp_customize->add_setting('counter-box pt-4 pt-md-0', array(
      'default'   => _x('ion-ios-calendar-outline', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-box pt-4 pt-md-0', array(
      'label'   => __('Icon-2', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 4
    ));

    $wp_customize->add_setting('counter-num-2', array(
      'default'   => _x('15', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-num-2', array(
      'label'   => __('YEARS OF EXPERIENCE', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 5
    ));


    $wp_customize->add_setting('counter-box pt-4 pt-md-1', array(
      'default'   => _x('ion-ios-people', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-box pt-4 pt-md-1', array(
      'label'   => __('Icon-3', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 6
    ));

    $wp_customize->add_setting('counter-num-3', array(
      'default'   => _x('550', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-num-3', array(
      'label'   => __('TOTAL CLIENTS', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 7
    ));

    $wp_customize->add_setting('counter-box pt-4 pt-md-2', array(
      'default'   => _x('ion-ribbon-a', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-box pt-4 pt-md-2', array(
      'label'   => __('Icon-4', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 8
    ));

    $wp_customize->add_setting('counter-num-4', array(
      'default'   => _x('36', 'kayremmie'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('counter-num-4', array(
      'label'   => __('AWARDS WON', 'kayremmie'),
      'section' => 'counter paralax-mf bg-image',
      'priority'  => 9
    ));
    
 
  }

  add_action('customize_register', 'counter_customize_register');

