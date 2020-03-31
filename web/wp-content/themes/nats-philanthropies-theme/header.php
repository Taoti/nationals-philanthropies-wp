<!DOCTYPE html>
<html lang="en-US">

<head>
  <?php
  // Use js/development/after-libs/web-font-loader.js to load fonts.
  ?>

  <?php
  // Common prefetches
  // <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  // <link rel="dns-prefetch" href="https://ajax.googleapis.com">
  // <link rel="dns-prefetch" href="https://www.google-analytics.com">
  // <link rel="dns-prefetch" href="https://www.googletagmanager.com">
  // <link rel="dns-prefetch" href="https://use.typekit.net">
  ?>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ab0003">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">

  <?php
  ### Set up critical and non critical CSS.
  do_action('taoti_do_css');
  ?>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <?php do_action('jp_body_start'); ?>

  <header id="header">
    <div id="header-inner" class="l-container">

      <?php
      $temporary_page_enabled = ( (is_404() || is_front_page() ) && get_field( 'temporary_landing_page_is_enabled', 'option' ) );
      ?>

      <?php if( $temporary_page_enabled ): ?>
      <a href="<?php echo home_url(); ?>" class="header-logoLink">
        <i class="header-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies.svg'); ?></i>
      </a>

      <?php else: ?>
      <a href="<?php echo home_url(); ?>" class="header-logoLink">
        <i class="header-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies-mark.svg'); ?></i>
      </a>
      <?php endif ?>

      <?php
      if( $temporary_page_enabled ){
        // $theme_location = 'temporary-navigation';
        get_template_part( 'parts/navigation', 'temp' );
      } else {
        // $theme_location = 'main-navigation';
        get_template_part( 'parts/navigation' );
      }
      ?>

    </div>
  </header>
