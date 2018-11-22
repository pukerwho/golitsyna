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
  <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">

  <?php echo get_option('google_analytics'); ?>
</head>
<body <?php echo body_class(); ?>>

  <header class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="header__content">
            <div class="header__content__logo">
              <a href="/" class="text-uppercase">Катерина<br>Голицына</a>
            </div>
            <div class="menu">
              <?php wp_nav_menu( array(
                'theme_location'  => '',
                'menu'            => 'mainmenu', 
                'container'       => 'div', 
                'container_class' => '', 
                'container_id'    => '',
                'menu_class'      => 'mainmenu_wrap', 
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
            <!-- <div class="header__buttons">
              <div class="header__buttons__sound">
                <i class="fas fa-volume-up"></i>
                <i class="fas fa-volume-off hidden"></i>  
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <section id="content" role="main">