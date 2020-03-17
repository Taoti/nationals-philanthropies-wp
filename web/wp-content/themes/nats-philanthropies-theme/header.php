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

    <meta charset="<?php bloginfo( 'charset' ); ?>">
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
          <img class="header-logo lazyload" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies@2x.png 2x" width="240" height="76">
        </a>

        <?php
        $theme_location = 'temporary-navigation';
        if( has_nav_menu($theme_location) ):
            $args = [
                'theme_location' => $theme_location,
                'item_spacing' => 'discard',
                'container' => 'nav',
                'menu_class' => 'menu-'.$theme_location,
                'fallback_cb' => false,
            ];
            wp_nav_menu( $args );

        endif;
        ?>

    </div>
</header>
