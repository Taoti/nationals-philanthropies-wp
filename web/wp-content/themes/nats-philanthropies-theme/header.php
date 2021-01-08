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

<?php
// Save a variable to tell if the temporary page is in use. This will determine extra body class(es), and other things in the <header> below.
$temporary_page_enabled = ( (is_404() || is_front_page() ) && get_field( 'temporary_landing_page_is_enabled', 'option' ) );

$extra_body_classes = [];
if( $temporary_page_enabled ){
  $extra_body_classes[] = 'temporary-page';
}

?>
<body <?php body_class( $extra_body_classes ); ?>>

  <?php do_action('jp_body_start'); ?>

  <header id="header">
    <div id="header-inner">

      <?php if( $temporary_page_enabled ): ?>
      <a href="<?php echo home_url(); ?>" class="header-logoLink">
        <i class="header-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies.svg'); ?></i>
      </a>

			<?php else: ?>
			<button class="header-searchLink js-openHeaderSearch">
				<i class="header-searchIcon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-search.svg'); ?></i>
			</button>

      <a href="<?php echo home_url(); ?>" class="header-logoLink">
        <i class="header-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies-mark.svg'); ?></i>
      </a>
      <?php endif ?>

      <?php get_template_part( 'parts/navigation' ); ?>

			<?php if( !$temporary_page_enabled ): ?>
			<div class="header-searchContainer">
				<div class="header-searchContainerInner">

					<form action="<?php echo home_url(); ?>" class="header-searchForm" method="get">

						<div class="header-searchInputContainer">
							<input type="search" class="header-searchS" name="s" value="<?php the_search_query(); ?>" placeholder="Enter search terms&hellip;">
						</div>

					</form>

					<button class="header-searchClose js-closeHeaderSearch" title="Close search.">
						<i class="header-searchCloseX">&times;</i>
					</button>

				</div>
			</div>
      <?php endif ?>

    </div>
  </header>



