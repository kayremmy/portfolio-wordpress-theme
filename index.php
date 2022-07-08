<?php 
get_header();

pageBanner( array(
  'title' => 'Welcome to My Blog',
  'subtitle' => 'Keep Up with latest news',
));
?>
  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">

        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content','article', get_post_format()); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
        <hr>
        <?php echo pagination(); ?>
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
  
