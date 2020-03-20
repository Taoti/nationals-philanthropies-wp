<?php
// use Modules\CTA;


### Critical CSS for the front page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/temp-front-page-critical.min.css' );


get_header();
?>

<div class="hero lazyload" data-bg="<?php echo get_stylesheet_directory_uri(); ?>/images/bg-home-hero.jpg">

  <!-- <div class="hero-bgCover"></div> -->

  <div class="hero-inner l-container">

    <h1 class="hero-heading lazyload" data-bg="<?php echo get_stylesheet_directory_uri(); ?>/images/accent-spatter-1.png">
      <span class="hero-headingLine hero-headingOutline lazyload" data-bg="<?php echo get_stylesheet_directory_uri(); ?>/images/accent-spatter-2.png">A new pursuit for a</span>
      <span class="hero-headingLine">better Washington</span>
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
        <h3 class="cta-heading">Sign Up For Newsletter</h3>
        <p class="cta-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <button class="cta-button" data-openModal="newsletter">Sign Up <i class="cta-buttonIcon"><?php echo file_get_contents( get_stylesheet_directory().'/images/icon-arrow.svg' ); ?></i></button>
      </div>

    </div>

    <div class="cta">

      <div class="cta-side">
        <i class="cta-icon cta-icon-heart-hand"></i>
      </div>

      <div class="cta-content">
        <h3 class="cta-heading">Donate to the Nationals Philanthropies</h3>
        <p class="cta-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <button class="cta-button" data-openModal="donate">Donate <i class="cta-buttonIcon"><?php echo file_get_contents( get_stylesheet_directory().'/images/icon-arrow.svg' ); ?></i></button>
      </div>

    </div>

  </div>
</div>

<!-- <div>
  <?php
  $theme_location = 'temporary-navigation';
  $menuLocations = get_nav_menu_locations();
  // echo "<pre>"; print_r( $menuLocations ); echo "</pre>";
  if( isset($menuLocations[$theme_location]) ):
    $main_nav = wp_get_nav_menu_items( $menuLocations[$theme_location] );
    // echo "<pre>"; var_dump($main_nav); echo "</pre>";

    if( !empty($main_nav) ):
      foreach( $main_nav as $nav_item ):

        echo "<pre>"; print_r($nav_item); echo "</pre>";

      endforeach;
    endif;

  endif;
  ?>
</div> -->

<?php
get_footer();
