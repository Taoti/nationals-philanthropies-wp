<footer id="footer">
  <div class="footer-inner">

    <div class="footer-branding footer-gridItem">

      <a href="<?php echo home_url(); ?>" class="footer-logoLink">
        <i class="footer-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies-mark.svg'); ?></i>
      </a>

      <div class="footer-brandingText">

        <h4 class="footer-heading"><a href="<?php echo home_url(); ?>">Nationals Philanthropies</a></h4>

        <div class="footer-siteDescription"><?php echo get_field('footer_site_description', 8); ?></div>

      </div>

    </div>



    <div class="footer-info footer-gridItem">

      <h4 class="footer-heading">Get In Touch</h4>

      <address class="footer-address">
        <?php echo nl2br( get_theme_mod( 'taoti_address' ) ); ?>
      </address>

      <p class="footer-phone"><?php echo get_theme_mod( 'taoti_phone_number' ); ?></p>

    </div>



    <div class="footer-contact footer-gridItem">

      <h4 class="footer-heading"><?php echo get_theme_mod( 'taoti_footer_form_heading' ); ?></h4>

      <?php echo do_shortcode( get_theme_mod( 'taoti_footer_form_shortcode' ) ); ?>

    </div>



    <ul class="footer-socialItems footer-gridItem">

      <li class="footer-socialItem footer-socialItem-twitter">
        <?php if( get_theme_mod('taoti_twitter_url') && !is_preview() ): ?>
          <a class="footer-socialLink js-customizer-twitter" href="<?php echo get_theme_mod('taoti_twitter_url'); ?>">
            <i class="footer-socialIcon footer-socialIcon-twitter"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-twitter.svg'); ?></i>
          </a>
        <?php endif; ?>
      </li>

      <li class="footer-socialItem footer-socialItem-instagram">
        <?php if( get_theme_mod('taoti_instagram_url') && !is_preview() ): ?>
        <a class="footer-socialLink js-customizer-instagram" href="<?php echo get_theme_mod('taoti_instagram_url'); ?>">
          <i class="footer-socialIcon footer-socialIcon-instagram"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-instagram.svg'); ?></i>
        </a>
        <?php endif; ?>
      </li>

      <li class="footer-socialItem footer-socialItem-facebook">
        <?php if( get_theme_mod('taoti_facebook_url') && !is_preview() ): ?>
        <a class="footer-socialLink js-customizer-facebook" href="<?php echo get_theme_mod('taoti_facebook_url'); ?>">
          <i class="footer-socialIcon footer-socialIcon-facebook"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-facebook2.svg'); ?></i>
        </a>
        <?php endif; ?>
      </li>

    </ul>



    <p class="footer-copyright footer-gridItem">Nationals Philanthropies – Copyright <?php echo date("Y"); ?>. All Rights Reserved</p>

  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
