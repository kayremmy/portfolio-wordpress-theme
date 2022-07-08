<div class="post-box">
            <div class="post-meta">
            <?php if(is_single()) : ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
            <?php else : ?>
            <a href="<?php the_permalink(); ?>"><h1 class="article-title"><?php the_title(); ?></h1></a> 
            <?php endif; ?>
            </div>
            <div class="article-content">
            <?php if(is_single()) : ?>
               <?php the_content(); ?>
           <?php else : ?>
               <?php the_excerpt(); ?>
           <?php endif; ?>
         </div>
 </div>