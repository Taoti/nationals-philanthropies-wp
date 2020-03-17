<?php
// use Modules\CTA;


### Critical CSS for the front page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/temp-front-page-critical.min.css' );


get_header();
?>

<div class="hero">

  <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1954 1303" height="0" width="0">
    <defs>
      <clipPath id="mask-pageTear-1">
        <path d="M1954 0H0v1254h.8c-.4.4-.6 1.1-.6 2.3.2 8.3.1 16.7.1 25 1 0 2 0 3.1.1 13.7 1.6 27.5 3.3 41.2 4 13.2.7 26.4 1.1 39.5 2.3 20.7 1.8 41.3 2.6 62 3.4 21.1.7 42.1 1.4 63.2-.8 10.4-1 20.9-.8 31.2-1 10.6-.8 21.3-.1 31.9-.6 1.7-.1 3.9 1.1 5-1.2-2.8-1.5-6-.3-9-.7-3.2-.2-6.4.4-9.6-.4-3.7 0-7.3-.9-11-.2-3.5-1.1-7 .3-10.4-.8-1.3-.4-2.6-.8-4-1.2-1.3-1.5-3.2-2-4.9-2.6-.6-.4-2.5-.7-.5-1.5 1.7-.7 3.8-.5 5.7-.7.9-.1 1.8-.5 2.5-1.1 3.6-1 7.1-3.1 10.6-2.8 19.5 1.3 38.9-1.9 58.4-1.3-.5-3-.5-3-6.2-4.2-.3 0-.9 0-.9-.1 0-.7.6-.2.9-.4 4.7.5 8.4 4.7 13.5 3.6 3 .7 6 .6 9.1.4 6.2-.3 12.4-.6 18.6-.7 18.1-.4 36.2 1.7 54.3.8 10.1-.5 20-.2 30-1.5 3-.4 5.9-.7 8.3-2.6 2-1.6 1.4-3-.3-4.2-1.4-2.8-4.2-2.5-6.6-2.4-9.8.3-19.5-.9-29.3-1.2h6.4c15.3-.3 30.4-.5 45.4 3.7 5 1.4 10 1.3 15 1.5 2.6.1 5.4-.5 8 .4 2.3 1.3 4.9 1.2 7.4 1 12.4-.8 24.8-1.6 37.2-2.5 7.4-.5 14.9-1.7 22.4-1.1 11.9 1 24 .8 35.7 3.9 1-.5 1.5-2.1 3.1-1.1 2.3 3.2 4.2-.8 6.4-.4 12.2 2.1 24.5.8 36.8 2 14.2 1.4 28.7 1 43 1.8 12.9.7 25.9-.5 38.8 1.4 3.1-.4 6 1 9.1.5 1.7 0 3.6-.1 5.4-.1.7 0 1.5-.2 2.4-.2-1 .7-2.1.4-3.2.6-3.7.3-7.5-.4-11.2.6-.5.2-1.1.4-1.6.5-1.7.6-4-.1-5.1 2 1 1.1 2.3.6 3.4.9 1.7.2 3.5.1 5.1-.5 3.7.5 7.3 1.2 11 1.3 20.9.4 41.7-.3 62.6-1.1 25.7-1 51.5-2.3 77.2-3.2 14.9-.5 29.6-.1 44.5-.2 16.6-.1 33.1-.3 49.7-.3 16.3 0 32.6.2 49.3-.2 5.2 1.2 10-1.2 15-1.4 4.6-.1 9.2.4 13.6-.4 20-1.4 40 .3 60-.1 2.7 1.5 5.8 1 8.8 1.4 3.9-.3 7.8.2 11.7-.5 4.4-.3 8.9 1.2 13-.9 2.7-1.3 5.1.3 7.5 1 1.3.2 2.7.1 4.1.1 9.9-1 19.7.5 29.6.4 6.6.4 13.2-1.5 19.8-.5h2c1.3-1 3-.5 4.4-.5 6.7 0 13.4.3 20.1.6 3.5.2 6.9.3 10.4.7 9.3 1.2 18.6-.1 27.9.4 5.1 1.6 10.4.5 15.6 1.1 15.4 1.7 30.9 2.1 46.3 3.9 8.6 1 17.3-.4 25.9 1.9 8.5 2.3 17.5.8 26.3 1.1 4.2.4 8.2 1 12.4.3 6.3-1.3 12.6.4 19 0 7.7-.5 15.6.9 23.5.2 7.8-.7 15.7.5 23.5 1.5 1.2.7 2.6.5 4 .5 23.4.3 46.8-1.4 70.2.4 1.7-.8 3.6-.2 5.4-.4 3.1.1 6 1 9.1 1.2.7.3 1.4.5 2.1.7 1.6-.5 3.6-.1 5-1.3h2.8c1.8.7 3.8.3 5.6.8 3.7-.9 7.2.3 10.8.4 21 .7 41.9-.6 62.8-1.7 12-.6 23.7.1 35.5 1.6 2.4.6 4.9 1.9 7.5.9.1-.1.1-.2-.1-.5-.4-.5.9.2.3.4-.9 1-3.8.6-2.3 3.3 5 .9 10.4-.2 15.3 1.8l2.7.3c2.1 1 4.5-.4 6.5.9l.2.2.3-.1c1.7 1.2 4-.9 5.6.8.6.3 1.2.7 1.8.8 11.7 1.6 23.5.9 35.3 1.2.1 0 .3-1.1.5-1.7 1.4-1.3-1.5-2.7.1-4.1h25.9c4.2 1.1 9.2-1.4 12.4 3.2 3.4 3.1 7 1.9 10.7.7 1.4-.5 2.6-1.3 4.3-1.3 8.1.2 16.3.3 24.4.5 3.6.1 7 1.8 10.4 2.1 4 .4 4.2 2 4.2 4.9 3.9 3.5 8.6 4 13.5 3.7 5.1-.3 8.8-4.7 9-9.9-2-2.2-4.5-1.8-6.9-.9-1.9.6-3.9 1.4-6.4 1 1.4-.9 2.5-.8 3.5-1 1.2-.2 2.3-.7 3.4-1.6 1.9-1.8 2.4-4 1-6.4-2.2-.7-2.8-2.6-3.6-4.6-.4-1.2-.7-2.3 1.4-2.1 4.7.4 9.5.5 14.1 1.2 1.2.2 2.3.6 3.1-.4s.2-2.1-.4-3.3c-2.7-5.1-1.5-7.2 4.3-7 19.6.6 39.4-3.4 59.1-.2 5.7.9 11.4-1.4 17.1-1 7 .4 14 1.2 21.1 0 0-2.8-.2-5.8.1-8.6.3-2.6-.2-3.8-1.8-4.3h1.8L1954 0zM379.9 1260.7c-.3.1-.4.2-.3.4.3.6-.5-.2.3-.4 1.4-.4 2.9-.4 4.5-.2-1.5-.1-3 0-4.5.2zm11.9.5c-1-.1-2-.2-3.1-.3 1.4 0 2.7.2 4 .3h-.9z"/>
      </clipPath>
    </defs>
  </svg> -->

  <div class="hero-bg">
    <?php include get_stylesheet_directory().'/images/bg-home-hero4.php'; ?>

    <!-- <img class="hero-bgImage" src="<?php echo get_stylesheet_directory_uri(); ?>/images/bg-home-hero.jpg" width="1366" height="883" alt="" -->

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
