<?php get_header(); 

pageBanner( array(
    'title' => 'All my projects',
    'subtitle' => 'Please check out my latest projects',
  ));
?>
<!--/ Section Blog-Single Star /-->
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <?php 
        $portfolio = new WP_Query (array(
          'post_type' => 'portfolio', 
          'posts_per_page' => 3,
          'paged'=>get_query_var('paged',1)
         ));
        if( $portfolio->have_posts() ):
          while( $portfolio->have_posts() ): $portfolio->the_post(); ?>
            <?php get_template_part('template-parts/content','portfolio', get_post_format()); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata();?>
          <hr>
        <?php echo pagination() ?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
        
        </div>  
        <div class="col-md-4">
           <?php if(!is_front_page()) : ?>
          <div class="sidebar-content">
             <?php if(is_active_sidebar('sidebar')): ?>
             <?php dynamic_sidebar('sidebar'); ?>
             <?php endif; ?>   
          </div>
          <?php endif; ?>
          
       </div>   
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->
  <?php get_footer(); ?>
  
