<?php
use Modules\HeroTemp;


### Critical CSS for the front page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/temp-front-page-critical.min.css' );


get_header();
?>

<?php
$args = [
  'heading_line_1' => 'Join Us In A',
  'heading_line_2' => 'New Pursuit',
  // 'background_image_url' => get_stylesheet_directory_uri() . '/images/bg-home-hero.jpg',
];
$hero = new HeroTemp($args);
$hero->render();
?>

<div class="CTAs section-homepage">
  <div class="CTAs-inner l-container">

    <div class="tempCTA">

      <div class="tempCTA-side">
        <i class="tempCTA-icon tempCTA-icon-letter"></i>
      </div>

      <div class="tempCTA-content">
        <h3 class="tempCTA-heading">Stay Up To Date</h3>
        <p class="tempCTA-description">For the latest information on news, events and special offers, register for our email newsletter.</p>
        <button class="tempCTA-button" data-modal="menu-modal-subscribe">Sign Up <i class="tempCTA-buttonIcon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i></button>
      </div>

    </div>

    <div class="tempCTA">

      <div class="tempCTA-side">
        <i class="tempCTA-icon tempCTA-icon-heart-hand"></i>
      </div>

      <div class="tempCTA-content">
        <h3 class="tempCTA-heading">Make A Contribution</h3>
        <p class="tempCTA-description">Give a tax deductible gift today in support of the ongoing work of Nationals Philanthropies.</p>
        <a class="tempCTA-button" href="https://www.mlb.com/nationals/forms/give">Donate <i class="tempCTA-buttonIcon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i></a>
      </div>

    </div>

  </div>
</div>

<?php
// get_footer();
get_template_part( 'parts/footer', 'temp' );
