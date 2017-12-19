<article <?php post_class(); ?>>
  <h3 class=""> <?php the_title(); ?> </h3>
  <p class="blog-post-meta"><?php the_time('F jS, Y'); ?>&nbsp; <?php the_author_posts_link(); ?></p>
  <?php the_excerpt(); ?>
  <p class="blog-post-meta"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
  <a type="button" class="btn btn-primary" href="<?php the_permalink(); ?>" rel="help">Read More &raquo;</a>
</article>
