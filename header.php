<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
  <?php echo get_option('google_analytics'); ?>
</head>
<body <?php echo body_class(); ?>>

  <!-- <header class="header">
    <div class="menu">
      <?php wp_nav_menu( array(
        'theme_location'  => '',
        'menu'            => 'mainmenu', 
        'container'       => 'div', 
        'container_class' => '', 
        'container_id'    => '',
        'menu_class'      => 'secondemenu_wrap', 
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<div class="wrap-menu">%3$s</div>',
        'depth'           => 0,
        'walker'          => '',
      )); ?>
    </div>
  </header> -->
  
  <section id="content" role="main">