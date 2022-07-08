<?php get_header(); 

pageBanner();
?>

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <?php 
         if(have_posts()) : ?>
             <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'portfolio',get_post_format()); ?>
            <?php endwhile; ?>
            <?php else : ?>
               <p><?php __('No Posts Found'); ?></p>
            <?php endif; ?> 
            <?php if(is_single()) : ?>
           <?php comments_template(); ?>
            <?php endif; ?>          
        </div>
       </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->
  <?php get_footer(); ?>