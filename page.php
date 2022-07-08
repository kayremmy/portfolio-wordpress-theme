<?php get_header();

pageBanner();
?>
  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
          <div class="post-box">
            <div class="article-content">
              <p> <?php the_content(); ?> </p> 
            </div>
          </div>
          <?php endwhile; ?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->
  <?php get_footer(); ?>