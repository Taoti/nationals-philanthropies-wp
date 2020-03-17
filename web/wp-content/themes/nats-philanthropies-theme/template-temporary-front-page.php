<?php
// use Modules\CTA;


### Critical CSS for the front page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/temp-front-page-critical.min.css' );


get_header();
?>

<div class="hero">

  <div class="hero-bg">
    <?php include get_stylesheet_directory().'/images/bg-home-hero3.php'; ?>
  </div>

  <div class="hero-inner l-container">

    <h1 class="hero-heading">
      <span class="hero-headingOutline">A new pursuit for a</span>
      better Washington
    </h1>

  </div>
</div>

<div class="CTAs">
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

<?php
get_footer();
