<?php

/*
    ========================
    THEME SUPPORT OPTIONS
    ========================
*/

/* Activate Nav Menu Option */
function kayremmie_register_nav_menu(){
    register_nav_menu('primary', 'Primary Menu');

}
add_action('after_setup_theme', 'kayremmie_register_nav_menu');

    // Post Formats
add_theme_support('post-formats', array('aside', 'gallery','video','audio','link','status','chat','image'));

//post thumbnails
add_theme_support('post-thumbnails');

//pageBanner
add_image_size('pageBanner', 1500, 350, true);


// Excerpt Length Control
function set_excerpt_length(){
    return 35;
  }
  
  add_filter('excerpt_length', 'set_excerpt_length');

/* Activate HTML5 features */
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));


//share with social media
function share_this($content)
{
    if (is_single()) {
        $content .= '<div class="socials"><h4>Share This</h4>';

        $title = get_the_title();
        $permalink = get_permalink();

        $twitterHandler = (get_option('twitter_handler') ? '&amp;via='.esc_attr(get_option('twitter_handler')) : '');

        $twitter = 'https://twitter.com/intent/tweet?text=Hey! Read this: '.$title.'&amp;url='.$permalink.$twitterHandler.'';
        $facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$permalink.'';
        $telegram = 'https://telegram.me/share/url?url='.$permalink;

        $content .= '<ul>';
        $content .= '<li><a href="'.$twitter.'" target="_blank" rel="nofollow"><span class="ico-circle"><span class="ion-social-twitter"></span></a></li>';
        $content .= '<li><a href="'.$facebook.'" target="_blank" rel="nofollow"><span class="ico-circle"><span class="ion-social-facebook"></span></a></li>';
        $content .= '<li><a href="'.$telegram.'" target="_blank" rel="nofollow"><span class="ico-circle"><span class="ion-paper-airplane"></span></a></li>';
        $content .= '</ul></div><!-- .share -->';

        return $content;
    } else {
        return $content;
    }
}
add_filter('the_content', 'share_this');


//Mail Trap Options
function mailtrap($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'scar.remmie@gmail.com';
    $phpmailer->Password = '29459507@kay';
  }
  
  add_action('phpmailer_init', 'mailtrap');


function get_attachment($num = 1)
{
    $output = '';
    if (has_post_thumbnail() && $num == 1):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); else:
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => $num,
            'post_parent' => get_the_ID(),
        ));
    if ($attachments && $num == 1):
            foreach ($attachments as $attachment):
                $output = wp_get_attachment_url($attachment->ID);
    endforeach; elseif ($attachments && $num > 1):
            $output = $attachments;
    endif;

    wp_reset_postdata();

    endif;

    return $output;
}

function get_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed = get_media_embedded_in_content($content, $type);

    if (in_array('audio', $type)):
        $output = str_replace('?visual=true', '?visual=false', $embed[0]); else:
        $output = $embed[0];
    endif;

    return $output;
}

function MapKey($api) {
  $api['key'] = 'AIzaSyCVHN1Ch7tnBi_jHB_VP2lAtKuLxDwcFOU';
  return $api;
}

add_filter('acf/fields/google_map/api', 'MapKey');



function pageBanner($args = NULL) {
  
    if (!$args['title']) {
      $args['title'] = get_the_title();
    }
  
    if (!$args['subtitle']) {
      $args['subtitle'] = get_field('page_banner_subtitle');
    }
  
    if (!$args['photo']) {
      if (get_field('page_banner_background_image')) {
        $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
      } else {
        $args['photo'] = get_theme_file_uri('img/overlay-bg.jpg');
      }
    }
    ?>
    <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(<?php echo $args['photo']; ?>)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4"><?php echo $args['title'] ?></h2>
          <p class="intro-subtitle"><?php echo $args['subtitle']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <?php }

//pagination
function pagination() {
 
  if( is_singular() )
      return;
 
  global $wp_query;
 
  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;
 
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );
 
  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;
 
  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }
 
  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }
 
  echo '<div class="pagination-links"><ul>' . "\n";
 
  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="active"' : '';
 
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
      if ( ! in_array( 2, $links ) )
          echo '<li>…</li>';
  }
 
  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }
 
  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li>…</li>' . "\n";
 
      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }
 
  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
  echo '</ul></div>' . "\n";
 
 }

  // Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

