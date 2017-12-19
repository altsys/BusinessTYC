<?php get_header(); ?>
 
<section class="container">

    <?php the_post(); ?>

    <article class="page-content">
        <h2 class="blog-title"><?php the_title(); ?></h2>
        <p class="lead blog-description"><?php the_content(); ?></p>
    </article>
    <hr />
    <aside class="latest-news blog-post">
      <h2>Latest Blogs</h2>
      <?php
          $args = array(
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'ASC',
            'posts_per_page' => 2
          );
          $latest_blog = new WP_Query($args);
          if ($latest_blog->have_posts()):
            while ($latest_blog->have_posts()):
                $latest_blog->the_post();
       ?>
       <article <?php post_class(); ?>>
          <h3 class=""> <?php the_title(); ?> </h3>
          <p class="blog-post-meta"><?php the_date(); ?>&nbsp; <?php the_author(); ?></p>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>" rel="help">Read More &raquo;</a>
       </article>
     <?php endwhile; endif; ?>
     <?php wp_reset_query(); ?>
    </aside>

</section>
 
<?php get_footer(); ?>
