  <?php
  /**
  * TYC Starter Theme functions and definations
  * @package tycstartertheme
  */
  require_once get_template_directory().'/inc/wp-bootstrap-navwalker.php';

  if(! function_exists('tycstartertheme_setup')):
    function tycstartertheme_setup() {
      //Add default posts and comments rss feed links
      add_theme_support('automatic-feed-links');
      //Enable post thumbnail
      add_theme_support( 'post-thumbnails' );
      //Enable support for post formats
      add_theme_support('post-formats', array('side', 'image', 'video', 'quote', 'links'));
      //Register theme location
      register_nav_menu('primary', __('Primary navigation', 'tycstartertheme'));
    }
  endif;

  //Enqueue scripts and styles
  function tycstartertheme_enqueque_script_and_style() {
    wp_enqueue_style( 'bootstrap_style', get_template_directory_uri().'/css/bootstrap.min.css', false, '1.0', 'screen' );
    wp_enqueue_style( 'style', get_stylesheet_uri() , array('bootstrap_style'), '1.0', 'screen');
    wp_enqueue_style( 'font_awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css', array('bootstrap_style'), '1.0', 'screen' );

    wp_enqueue_style('nivo-lightbox', get_template_directory_uri().'/css/nivo-lightbox.css', array('bootstrap_style'), '1.0', 'screen' );
    wp_enqueue_style('nivo-lightbox-theme', get_template_directory_uri().'/css/nivo-lightbox-theme/default/default.css', array('bootstrap_style'), '1.0', 'screen' );
    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/css/owl.carousel.css', array('bootstrap_style'), '1.0', 'screen' );
    wp_enqueue_style('owl-theme', get_template_directory().'/css/owl.theme.css', array('bootstrap_style'), '1.0', 'screen' );

    //change fonts here.
    wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Droid+Sans|Francois+One', false );
    wp_enqueue_style( 'tycstyle', get_template_directory_uri().'/css/tyc-main.css', array('bootstrap_style'), '1.0', 'screen' );
    wp_enqueue_style( 'animateStyle', get_template_directory_uri().'/css/animate.css', array('tycstyle'), '1.0', 'screen' );
    wp_enqueue_style( 'colorstyle', get_template_directory_uri().'/css/default.css', array('tycstyle'), '1.0', 'screen' );
    /**
    * Let's add the latest jquery
    */
    if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
      wp_enqueue_script('jquery');
    }
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '1.0', false );
    wp_enqueue_script('jquery_easing_js', get_template_directory_uri().'/js/jquery.easing.min.js', array('jquery'), '1.0', false );
    wp_enqueue_script('jquery_sticky_js', get_template_directory_uri().'/js/jquery.sticky.js', array('jquery'), '1.0', false );
    wp_enqueue_script('jquery_scrollto_js', get_template_directory_uri().'/js/jquery.scrollTo.js', array('jquery'), '1.0', false );
    wp_enqueue_script('stellar_js', get_template_directory_uri().'/js/stellar.js', array('jquery'), '1.0', false );
    wp_enqueue_script('wow_js', get_template_directory_uri().'/js/wow.min.js', array('jquery'), '1.0', false );
    wp_enqueue_script('carousel_js', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'), '1.0', false );
    wp_enqueue_script('lightbox_js', get_template_directory_uri().'/js/nivo-lightbox.min.js', array('jquery'), '1.0', false );

    wp_enqueue_script( 'tycscript', get_template_directory_uri().'/js/custom.js', array('bootstrap_js'), '1.0', false );
    wp_enqueue_script( 'contactscript', get_template_directory_uri().'/js/contactform.js', array('bootstrap_js'), '1.0', false );
  }


  //include category IDs in body_class and post_class
  function add_category_classes($classes) {
    global $post;

    foreach ((get_the_category($post_ID)) as $category) {
      $classes[] = 'cat-'.$category->slug;
    }

    return $classes;
  }
  /**
  // use this function is template files of page.php and single.php like this:
  // <article id="<?php echo get_the_post_slug(get_the_ID()); ?>" <?php post_class(); ?>>
  // This will enable reuse
  **/
  function get_the_post_slug($id) {
    $post_data = get_post($id, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
  }

  /**
  * Simple copyright for footer
  **/
  function simple_copyright () {
    echo "&copy; " . get_bloginfo('name') ." ". date("Y");
  }

  //add functions to hook
  ini_set( 'mysql.trace_mode', 0 );
  // add_action( 'init', 'tycstartertheme_menu_setup' );
  add_action('after_setup_theme','tycstartertheme_setup');
  add_action('wp_enqueue_scripts', 'tycstartertheme_enqueque_script_and_style');
  //add function to filter
  add_filter( 'post_class', 'add_category_classes' );
  ?>
