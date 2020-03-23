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

  <?php /*
    <!-- http://realfavicongenerator.net/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#45a9ba">
    <meta name="theme-color" content="#ffffff">
    */ ?>

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

      <a href="<?php echo home_url(); ?>" class="header-logoLink">
        <!-- <img class="header-logo lazyload" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies@2x.png 2x" width="240" height="76" alt="Washington Nationals Philanthropies Logo"> -->
        <i class="header-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies.svg'); ?></i>
      </a>

      <?php
      $theme_location = 'temporary-navigation';
      if (has_nav_menu($theme_location)) :
        $args = [
          'theme_location' => $theme_location,
          'item_spacing' => 'discard',
          'container' => 'nav',
          'menu_class' => 'menu menu-' . $theme_location,
          'fallback_cb' => false,
        ];
      // wp_nav_menu( $args );

      endif;

      $menuLocations = get_nav_menu_locations();
      // echo "<pre>"; print_r( $menuLocations ); echo "</pre>";
      if (isset($menuLocations[$theme_location])) :
        $main_nav = wp_get_nav_menu_items($menuLocations[$theme_location]);
        // echo "<pre>"; var_dump($main_nav); echo "</pre>";

        if (!empty($main_nav)) : ?>
          <nav class="navContainer">
            <ul class="menu menu-mainMenu">
              <?php foreach ($main_nav as $nav_item) : ?>
                <?php
                $title = get_the_title($nav_item);
                $href = $nav_item->url;
                ?>

                <li class="menu-item">
                  <a href="<?php echo $href; ?>" class="menu-link" <?php if ($title === 'Subscribe') : ?> data-modal="menu-modal-subscribe" <?php endif; ?>><?php echo $title; ?><i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory().'/images/icon-arrow.svg'); ?></i></a>

                  <?php if ($title === 'Subscribe') : ?>
                    <div class="modal menu-modal menu-modal-subscribe">
                      <div class="menu-modal-inner">
                        <button class="modal-close">Close<i class="modal-closeX">&times;</i></button>
                        <?php echo do_shortcode( '[gravityform id="1" title="true" description="false" ajax="true"]'); ?>
                    </div>
                  <?php endif; ?>

                </li>

              <?php endforeach; ?>
            </ul>
          </nav>
      <?php
        endif;

      endif;
      ?>

    </div>
  </header>