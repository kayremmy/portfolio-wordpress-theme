<?php get_header(); 

  
pageBanner( array(
    'title' => 'Our location',
    'subtitle' => 'Click on the pin-drop for exact location',
  ));
?>
<!--/ Section Blog-Single Star /-->
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <?php 
        $map = new WP_Query (array(
          'post_type' => 'map', 
          'posts_per_page' => 3,
          'paged'=>get_query_var('paged',1)
         ));
        if( $map->have_posts() ):
          while( $map->have_posts() ): $map->the_post(); ?>
            <?php get_template_part('template-parts/content','map', get_post_format()); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata();?>
          <hr>
        <?php echo pagination() ?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>    
        </div>     
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->
  <?php get_footer(); ?>