<?php get_header(); ?>
 
<section class="container">
     <div class="page-content col-sm-8">
        <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
                 <article <?php post_class(); ?>>
                        <h1><?php the_title(); ?></h1>
                         <?php the_content(); ?>
                 </article>
   
          <?php endwhile; endif; ?>
    </div>
    <div class="sidebar col-sm-4">
      <?php get_sidebar(); ?>
    </div>
 </section>

<?php get_footer(); ?>
