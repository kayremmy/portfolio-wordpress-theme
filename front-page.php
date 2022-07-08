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

<body id="page-top" <?php body_class(); ?>>

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
 <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url( <?php echo get_theme_mod('home_bg-image', get_bloginfo('template_url').'/img/banner.png'); ?>)">
 
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container"><br> <br>
         <p class="display-6 color-d">Hello, world ❤️!</p> 
          <h1 class="intro-title mb-4"><?php echo get_theme_mod('home_heading', 'I am Remmy'); ?></h1>
          <p class="intro-subtitle"><span class="text-slider-items"><?php echo get_theme_mod('home_text', 'Web Developer,Web Designer,Frontend Developer,Graphic Designer'); ?></span><strong class="text-slider"></strong></p>
           <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="<?php echo get_theme_mod('btn_url', 'http://test.com'); ?>" role="button"><?php echo get_theme_mod('btn_text', 'Get Started'); ?></a></p> 
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-6 col-md-12">
                  <?php 
	                $picture = esc_attr( get_option( 'profile_picture' ) );
	                $firstName = esc_attr( get_option( 'first_name' ) );
                	$lastName = esc_attr( get_option( 'last_name' ) );
                 	$fullName = $firstName . ' ' . $lastName;
                  $description = esc_attr( get_option( 'user_description' ) );
                  $email= esc_attr( get_option( 'profile_email' ) );
                  $address = esc_attr( get_option( 'profile_address' ) );
                  $phone = esc_attr( get_option( 'profile_phone' ) );
	                $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
	                $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
	                $instagram_icon = esc_attr( get_option( 'instagram_handler' ) );
                ?>
                    <div class="about-img">
                      <img src="<?php print $picture; ?>" class="about-img" alt="Image">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                  <p class="lead">
                  <?php print $description; ?>
                  </p>
                  <div class="socials">
                  <ul>
			             <?php if( !empty( $twitter_icon ) ): ?>
                    <li><a href="https://twitter.com/<?php echo $twitter_icon; ?>"><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                   <?php endif; 
			            if( !empty( $instagram_icon ) ): ?>
                    <li><a href="https://instagram.com/<?php echo $instagram_icon; ?>"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                   <?php endif; 
			              if( !empty( $facebook_icon ) ): ?>
                   <li><a href="https://facebook.com/<?php echo $facebook_icon; ?>"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
		            	<?php endif; ?>
		              </div>
                  <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="<?php echo site_url('/about') ?>" role="button">Read More</a></p> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Services
            </h3>
            <p class="subtitle-a">
              Checkout Our Services
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
       </div>
       <div class="row">
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-2')) : ?>
            <?php dynamic_sidebar('sidebar-2'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-3')) : ?>
            <?php dynamic_sidebar('sidebar-3'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-4')) : ?>
            <?php dynamic_sidebar('sidebar-4'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-5')) : ?>
            <?php dynamic_sidebar('sidebar-5'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
           <?php if(is_active_sidebar('sidebar-6')) : ?>
            <?php dynamic_sidebar('sidebar-6'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Services End /-->

  <div class="section-counter paralax-mf bg-image" style="background-image: url(<?php echo get_theme_mod('bg-image', get_bloginfo('template_url').'/img/counters-bg.jpg'); ?>)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box', 'ion-checkmark-round'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num', '450'); ?></p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box pt-4 pt-md-0', 'ion-ios-calendar-outline'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num-2', '15'); ?></p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box pt-4 pt-md-1', 'ion-ios-people'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num-3', '550'); ?></p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box pt-4 pt-md-2', 'ion-ribbon-a'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num-4', '36'); ?></p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Portfolio Star /-->
  <section id="work" class="block portfolio-mf  sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Portfolio
            </h3>
            <p class="subtitle-a">
              Check out my best porfolio projects
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
       <?php echo do_shortcode('[recent_products columns="4"]'); ?> 
    </div>
  </section>
  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Services
            </h3>
            <p class="subtitle-a">
              Checkout Our Services
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
       </div>
       <div class="row">
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-2')) : ?>
            <?php dynamic_sidebar('sidebar-2'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-3')) : ?>
            <?php dynamic_sidebar('sidebar-3'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-4')) : ?>
            <?php dynamic_sidebar('sidebar-4'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar-5')) : ?>
            <?php dynamic_sidebar('sidebar-5'); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
           <?php if(is_active_sidebar('sidebar-6')) : ?>
            <?php dynamic_sidebar('sidebar-6'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Services End /-->

  <div class="section-counter paralax-mf bg-image" style="background-image: url(<?php echo get_theme_mod('bg-image', get_bloginfo('template_url').'/img/counters-bg.jpg'); ?>)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box', 'ion-checkmark-round'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num', '450'); ?></p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box pt-4 pt-md-0', 'ion-ios-calendar-outline'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num-2', '15'); ?></p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box pt-4 pt-md-1', 'ion-ios-people'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num-3', '550'); ?></p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="<?php echo get_theme_mod('counter-box pt-4 pt-md-2', 'ion-ribbon-a'); ?>"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"><?php echo get_theme_mod('counter-num-4', '36'); ?></p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Portfolio Star /-->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Portfolio
            </h3>
            <p class="subtitle-a">
              Check out my best porfolio projects
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
      <?php
        $args = array('post_type' => 'portfolio', 'posts_per_page' => 6 );
        $loop = new WP_Query( $args );
        if( $loop->have_posts() ):
          while( $loop->have_posts() ): $loop->the_post(); ?>
      <div class="col-md-4">
           <div class="work-box">
            <a href="#"  data-lightbox="gallery-mf">
              <div class="work-img">
             <?php the_post_thumbnail( 'post-thumb', array( 'class'  => 'img-fluid', 'alt'=>'') ); ?>
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                  <a href="<?php the_permalink(); ?>"><h2 class="w-title"><?php the_title();?></h2></a>
                    <div class="w-more">
                      <span class="w-ctegory"><?php echo portfolio_get_terms( $post->ID, 'field' ); ?></span> / <span class="w-date"><?php echo get_the_date();?></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
      </div>
      <?php endwhile; ?>
          <?php wp_reset_postdata();?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
    </div>
  </section>
  <!--/ Section Portfolio End /-->

  <!--/ Section Testimonials Star /-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/overlay-bg.jpg'); ?>)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-mf" class="owl-carousel owl-theme">
        <?php
        $args = array('post_type' => 'testimonial', 'posts_per_page' => 5 );
        $loop = new WP_Query( $args );
        if( $loop->have_posts() ):
          while( $loop->have_posts() ): $loop->the_post(); ?>
            <div class="testimonial-box">
              <div class="author-test">
                <?php the_post_thumbnail( 'post-thumb', array( 'class'  => 'rounded-circle b-shadow-a', 'alt'=>'') ); ?>
                <span class="author"><?php the_title();?></span>
              </div>
              <div class="content-test">
                <p class="description lead">
                <?php the_excerpt(); ?>
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
      <?php endwhile; ?>
          <?php wp_reset_postdata();?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              Checkout my latest Blogs
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
    <div class="row">
     <?php
        $args = array('post_type' => 'post', 'posts_per_page' => 3 );
        $loop = new WP_Query( $args );
        if( $loop->have_posts() ):
          while( $loop->have_posts() ): $loop->the_post(); ?>
      <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="#"><?php the_post_thumbnail( 'post-thumb', array( 'class'  => 'img-fluid', 'alt'=>'') ); ?></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category"><?php the_category( ' ' ); ?></h6>
                </div>
              </div>
              <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="card-description">
              <?php the_excerpt(); ?>
              </p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                  <span class="author">By &nbsp;<?php the_author(); ?></span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline">&nbsp;<?php echo get_the_date(); ?></span> 
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
          <?php wp_reset_postdata();?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
    </div>
  

    </div>
  </section>
  <!--/ Section Blog End /-->
    <!--/ Section Contact-Footer Star /-->
    <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(<?php echo get_theme_file_uri('img/overlay-bg.jpg'); ?>)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
         <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Me A Message 
                    </h5>
                  </div>
                  <div>
                      <form  id="contactForm" action="#" method="post" role="form" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" />
                            <div class="invalid-feedback">Your Name is Required</div> 
						            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" />
                        <div class="invalid-feedback">Your Email is Required</div>  
						           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message"></textarea>
                           <div class="invalid-feedback">A Message is Required</div> 
						              </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Submit</button>
                          <div class="js-form-submission validation">Submission in process, please wait..</div>
                          <div class="valid-feedback">Message Successfully submitted,Thank you!</div>
                          <div class="invalid-feedback ">There was a problem with the Contact Form, please try again!</div> 
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
			         <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Please use the social media handles below to get in touch,call me,email me or fill the form.
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span><?php echo $address; ?></li>
                      <li><span class="ion-ios-telephone"></span> <?php echo $phone; ?></li>
                      <li><span class="ion-email"></span> <?php echo $email; ?></li>
                    </ul>
                  </div>
                  <div class="socials">
                  <ul>
			             <?php if( !empty( $twitter_icon ) ): ?>
                    <li><a href="https://twitter.com/<?php echo $twitter_icon; ?>"><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                   <?php endif; 
			            if( !empty( $instagram_icon ) ): ?>
                    <li><a href="https://instagram.com/<?php echo $instagram_icon; ?>"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                   <?php endif; 
			              if( !empty( $facebook_icon ) ): ?>
                   <li><a href="https://facebook.com/<?php echo $facebook_icon; ?>"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
		            	<?php endif; ?>
		              </div>
                </div>
              </div>
            </div>
			     </div>
        </div>
      </div>
    </div>
<footer>
      <div class="container"  >
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
            <p>&copy; <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?>. All Rights Reserved</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

 <?php wp_footer(); ?>
				

</body>
</html>
