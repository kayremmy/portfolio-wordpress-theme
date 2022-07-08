<div class="post-box">
            <div class="post-thumb">
            <a href="#"> <?php the_post_thumbnail( 'post-thumb', array( 'class'  => 'img-fluid', 'alt'=>'') ); ?></a>
            </div>
            <div class="post-meta">
            <?php if(is_single()) : ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
            <?php else : ?>
            <a href="<?php the_permalink(); ?>"><h1 class="article-title"><?php the_title(); ?></h1></a> 
            <?php endif; ?>
              <ul>
                <li>
                <span class="ion-ios-clock-outline">
                </span> &nbsp;<?php echo get_the_date(); ?>
                </li>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">By &nbsp;<?php the_author(); ?></a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#"><?php the_tags()?></a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                  <a href="#"><?php comments_number();?></a>
                </li>
              </ul>
            </div>
            <div class="article-content">
            <?php echo get_embedded_media( array('audio','iframe') ); ?>
         </div>
 </div>