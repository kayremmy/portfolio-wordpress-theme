<?php 
	
/*
	Template Name: About Template
*/

?>
<?php get_header(); 

while(have_posts()) {
  the_post();
  pageBanner( array(
    'title' => 'ABOUT ME..!!',
    'subtitle' => 'Folks,Welcome to my website! Give me a like below.',
  ));
?>

  <!--/ Intro Skew End /-->
  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
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
                      <img src="<?php print $picture; ?>" class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-12">
                 <div class="generic-content">
                  <?php

                   $likeCount = new WP_Query(array(
                   'post_type' => 'like',
                   'meta_query' => array(
                    array(
                      'key' => 'liked_profile_id',
                      'compare' => '=',
                      'value' => get_the_ID()
                        )
                        )
                    ));

                        $existStatus = 'no';

                    if (is_user_logged_in()) {
                    $existQuery = new WP_Query(array(
                      'author' => get_current_user_id(),
                      'post_type' => 'like',
                      'meta_query' => array(
                    array(
                    'key' => 'liked_profile_id',
                    'compare' => '=',
                    'value' => get_the_ID()
                        )
                      )
                  ));

                  if ($existQuery->found_posts) {
                     $existStatus = 'yes';
                   }
                  }

                  ?>
                    <span class="like-box"  data-like="<?php echo $existQuery->posts[0]->ID; ?>" data-profile="<?php the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
                     <i class="fa fa-heart-o" aria-hidden="true"></i>
                      <i class="fa fa-heart" aria-hidden="true"></i>
                      <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
                    </span>
                    </div>
                </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me(<?php print $fullName; ?>)
                    </h5>
                  </div>
                  <p class="lead">
                  <?php print $description; ?>
                  </p>
              <div class="more-info">
                  <?php
                     $relatedPrograms = get_field('related_programs');
                      if ($relatedPrograms)
                      {
                        echo ' <h5 class="title-left">Programming & Frameworks</h5>';
                        echo '<br>';
                        echo '<ul class="list-ico">';
                              foreach($relatedPrograms as $program) { ?>
                                  <li><a href="<?php echo get_the_permalink($program); ?>"><span class="ion-code-working"></span> <?php echo get_the_title($program); ?></a></li>
                     <?php }
                        echo '</ul>';
                      }
                     ?>
               </div>
                  <div class="socials">
                  <h5 class="title-left">Follow me on social media </h5>
                  <br>
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
                  <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="<?php echo site_url('/contact') ?>" role="button">Hire Me</a></p> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
   <!--/ Section Blog-Single End /-->
  <?php } get_footer(); ?>