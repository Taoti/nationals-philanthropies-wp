<?php
// use Modules\CTA;


### Critical CSS for the front page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/temp-front-page-critical.min.css' );


get_header();
?>

<div class="hero lazyload" data-bg="<?php echo get_stylesheet_directory_uri(); ?>/images/bg-home-hero2.jpg">

  <!-- <div class="hero-bgCover"></div> -->

  <div class="hero-inner l-container">

    <h1 class="hero-heading">

      <img class="hero-accent hero-accent-1 lazyload" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/accent-spatter-1.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/accent-spatter-1@2x.png 2x" width="477" height="82" alt="Paint splatter accent">

      <span class="hero-headingLine hero-headingOutline">
        <span class="hero-textWrap">Join us in a</span>
        <img class="hero-accent hero-accent-2 lazyload" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/accent-spatter-2.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/accent-spatter-2@2x.png 2x" width="690" height="67" alt="Paint splatter accent">
      </span>

      <span class="hero-headingLine">
        <span class="hero-textWrap">new pursuit</span>
      </span>

    </h1>

  </div>
</div>

<div class="CTAs section-homepage">
  <div class="CTAs-inner l-container">

    <div class="cta">

      <div class="cta-side">
        <i class="cta-icon cta-icon-letter"></i>
      </div>

      <div class="cta-content">
        <h3 class="cta-heading">Stay Up To Date</h3>
        <p class="cta-description">For the latest information on news, events and special offers, register for our email newsletter.</p>
        <button class="cta-button" data-modal="menu-modal-subscribe">Sign Up <i class="cta-buttonIcon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i></button>
      </div>

    </div>

    <div class="cta">

      <div class="cta-side">
        <i class="cta-icon cta-icon-heart-hand"></i>
      </div>

      <div class="cta-content">
        <h3 class="cta-heading">Make A Contribution</h3>
        <p class="cta-description">Give a tax deductible gift today in support of the ongoing work of Nationals Philanthropies.</p>
        <a class="cta-button" href="#0">Donate <i class="cta-buttonIcon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i></a>
      </div>

    </div>

  </div>
</div>

<!-- <div>
  <?php
  $theme_location = 'temporary-navigation';
  $menuLocations = get_nav_menu_locations();
  // echo "<pre>"; print_r( $menuLocations ); echo "</pre>";
  if (isset($menuLocations[$theme_location])) :
    $main_nav = wp_get_nav_menu_items($menuLocations[$theme_location]);
    // echo "<pre>"; var_dump($main_nav); echo "</pre>";

    if (!empty($main_nav)) :
      foreach ($main_nav as $nav_item) :

        echo "<pre>";
        print_r($nav_item);
        echo "</pre>";

      endforeach;
    endif;

  endif;
  ?>
</div> -->

<?php
get_footer();
