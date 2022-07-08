<?php get_header();

pageBanner(array(
  'title'=> 'oops! Page not found...!!',
  'subtitle' => 'Use the search form below',
));
?>

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <?php 
        get_search_form();
        ?>
        </div>     
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->
  <?php get_footer(); ?>