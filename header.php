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
	<header id="header" role="banner">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="ico/logo.jpg" alt="#">
  <a class="navbar-brand" href="#">FEATURE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse offset-md-9" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SHARE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo get_option('facebook_link');?>"><img src="<?php echo get_template_directory_uri() ?>/ico/social_facebook_box_blue.ico" alt="f">FACEBOOK</a>
          <a class="dropdown-item" href="<?php if (get_option('facebook_link')) {
            echo get_option('facebook_link');
          } 
          ?>">TWITTER</a>
          <a class="dropdown-item" href="<?php if (get_option('facebook_link')) {
            echo get_option('facebook_link');
          } 
          ?>">GOOGLE +</a>
          <a class="dropdown-item" href="<?php if (get_option('facebook_link')) {
            echo get_option('facebook_link');
          } 
          ?>">PINTEREST</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-search" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-user" href="#"></a>
      </li>
    </ul>
  </div>
</nav>


	</header>
	<section id="content" role="main">
