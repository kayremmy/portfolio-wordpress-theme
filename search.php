<?php get_header(); ?>
 <!--/ Intro Skew Star /-->
 <div class="intro intro-single route bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/overlay-bg.jpg'); ?>)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
        <?php the_title('<h2 class="intro-title mb-4">', '</h2>'); ?>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1>Search Results For: <?php the_search_query(); ?> </h1>
         <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content','archive', get_post_format()); ?>
          <?php endwhile; ?>
          <?php echo paginate_links(); ?>
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