<?php

function kayremmieLikeRoutes() {
  register_rest_route('kayremmie/v1', 'manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike'
  ));

  register_rest_route('kayremmie/v1', 'manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike'
  ));
}
add_action('rest_api_init', 'kayremmieLikeRoutes');

function createLike($data) {
  if (is_user_logged_in()) {
    $profile = sanitize_text_field($data['profileId']);
    $existQuery = new WP_Query(array(
      'author' => get_current_user_id(),
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key' => 'liked_profile_id',
          'compare' => '=',
          'value' => $profile
        )
      )
    ));

    if ($existQuery->found_posts == 0 ) {
      return wp_insert_post(array(
        'post_type' => 'like',
        'post_status' => 'publish',
        'post_title' => 'New Like',
        'meta_input' => array(
          'liked_profile_id' => $profile
        )
      ));
    } else {
      die("Invalid profile id");
    }
    
  } else {
    die("Please login to create a like.");
  }

  
}

function deleteLike($data) {
  $likeId = sanitize_text_field($data['like']);
  if (get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like') {
    wp_delete_post($likeId, true);
    return 'like deleted.';
  } else {
    die("You do not have permission to delete that.");
  }
}