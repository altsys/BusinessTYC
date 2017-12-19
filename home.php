<?php get_header(); ?>
<section class="container">
    <div class="latest-news blog-post col-sm-8">
        <h1>Latest Blogs</h1>
        <?php
            $args = array(
              'post_type' => 'post',
              'orderby' => 'date',
              'order' => 'DES',
              'posts_per_page' => 3
            );
            $latest_blog = new WP_Query($args);
            if ($latest_blog->have_posts()): while ($latest_blog->have_posts()):
                  $latest_blog->the_post();
         ?>
           <?php get_template_part( 'template-parts/content', get_post_format()); ?>
       <?php endwhile; ?>
     <?php else: ?>
       <article class="error">
         <h2>Sorry, there are no blog articles.</h2>
       </article>

      <hr  />
        <div class="post-page-navigation">
            <?php
              // next_posts_link() usage with max_num_pages
              next_posts_link( 'Older Entries', $the_query->max_num_pages );
              previous_posts_link( 'Newer Entries' );
             ?>
             <?php posts_nav_link('sep','prelabel','nxtlabel'); ?>
             <?php paginate_links(); ?>
             <?php
              // clean up after the query and pagination
              wp_reset_postdata();
              ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="sidebar col-sm-4">
      <?php get_sidebar('blog'); ?>
    </div>

</section>

<?php get_footer(); ?>
