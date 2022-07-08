<?php



function kayremmieRegisterSearch() {
  register_rest_route('kayremmie/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'kayremmieSearchResults'
  ));
}
add_action('rest_api_init', 'kayremmieRegisterSearch');

function kayremmieSearchResults($data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('post', 'page', 'program','portfolio'),
    's' => sanitize_text_field($data['term'])
  ));

  $results = array(
    'generalInfo' => array(),
    'programs' => array(),
    'portfolios' => array(),
  );

  while($mainQuery->have_posts()) {
    $mainQuery->the_post();

    if (get_post_type() == 'post' OR get_post_type() == 'page') {
      array_push($results['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'authorName' => get_the_author()
      ));
    }
    if (get_post_type() == 'post' OR get_post_type() == 'portfolio') {
      array_push($results['portfolios'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'authorName' => get_the_author()
      ));
    }

    if (get_post_type() == 'program') {
    
      array_push($results['programs'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'id' => get_the_id()
      ));
    }
    
  }

  return $results;

}