<?php get_header(); ?>
 <section class="container">
    <div class="page-content col-sm-8">
        <?php if (have_posts()): the_post(); ?>
        <?php if(is_category()): ?>
            <h1 class="text-mute">Archive for category: <?php single_cat_title(); ?></h1>
        <?php elseif(is_tag()): ?>
            <h1 class="text-mute">Posta Tagged: <?php single_tag_title(); ?></h1>
          <?php elseif (is_day()) : ?>
              <h1 class="text-mute">Archive for <?php the_time('F jS, Y'); ?></h1>
          <?php elseif (is_month()) : ?>
              <h1 class="text-mute">Archive for <?php the_time('F, Y'); ?></h1>
          <?php elseif (is_year()) : ?>
              <h1 class="text-mute">Archive for <?php the_time('Y'); ?></h1>
          <?php elseif (is_author()) : ?>
              <h1 class="text-mute">Author Archive</h1>
          <?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
              <h1 class="text-mute">Archives</h1>
          <?php endif; ?>
   
          <?php rewind_posts(); ?>
   
          <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
          <?php endwhile; ?>
   
          <?php else : ?>
          <?php if (is_category()) :  ?>
                <h1 class="text-mute">Sorry, but there aren't any posts in the <?php single_cat_title(); ?> category yet.</h1>
            <?php elseif (is_date()) : ?>
                <h1 class="text-mute">Sorry, but there aren't any posts with this date.</h1>
            <?php elseif (is_author()) : ?>
                <?php get_userdatabylogin(get_query_var('author_name')); ?>
                <h1 class="text-mute">Sorry, but there aren't any posts by <?php echo $userdata->display_name; ?> yet.</h1>
        <?php else : ?>
            <h1 class="text-mute">No posts found.</h1>
        <?php endif; ?>
 
        <?php endif; ?>
    </div>
    <div class="sidebar col-sm-4">
      <?php get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
