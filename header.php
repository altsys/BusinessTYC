<?php
  /**
  * TYC Starter Theme header file
  *
  **/
 ?>
 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
   <head>
     <meta charset="<?php bloginfo('charset'); ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="BusinessTYC - Alula K.">
     <link rel="icon" href="../../../../favicon.ico">

     <title><?php wp_title('|', true, 'right'); ?></title>
     <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
     <header class="header clearfix">
       <div class="blog-masthead">
         <div class="container">
             <?php
                 wp_nav_menu(
                   array (
                           'menu'              => 'primary',
                           'theme_location'    => 'primary',
                           'depth'             => 2,
                           'container_id'      => 'containerNavbar',
                           'menu_class'        => 'nav nav-pills float-right',
                           'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                           'walker'            => new WP_Bootstrap_Navwalker()
                         )
                 );
             ?>
             <h3>TYC Starter Theme</h3>
          </div>
       </div>
     </header>
