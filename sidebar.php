<aside id="sidebar" role="complementary" class="col-sm-4 sidebar">
  <div>
    <?php
        global $post;
        $ancestors = get_post_ancestors( $post );
        $top = get_post(end($ancestors), "OBJECT");
     ?>
    <h2><?php echo $top->post_title; ?></h2>
    <h2>Archive</h2>
    <ul class="blog-navigation">
        <?php wp_get_archives(); ?>
    </ul>
    <h2>Popular Categories</h2>
    <ul class="blog-navigation">
      <?php
      $args = array('show_count' => 0, 'title_li' => '',
              'orderby' => 'count');
      wp_list_categories($args); ?>
    </ul>
  </div>
</aside>
