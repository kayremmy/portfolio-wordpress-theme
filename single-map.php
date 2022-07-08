<?php get_header(); 

while(have_posts()) {
    the_post();
    pageBanner(array(
        'subtitle'=>'Click on the pin-drop for exact location',
    ));
     ?>


  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="post-box">
         <div class="post-meta">
            <?php if(is_single()) : ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
            <?php else : ?>
            <a href="<?php the_permalink(); ?>"><h1 class="article-title"><?php the_title(); ?></h1></a> 
            <?php endif; ?>
         </div>
            <div class="article-content">
            <div class="acf-map">
                <?php $mapLocation = get_field('map_location');?>
             <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
               <?php echo $mapLocation['address']; ?>
           </div>
        </div>
               <?php the_content(); ?>

         </div>
        </div>   
        </div>
        
       </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->
  <?php get_footer(); } ?>