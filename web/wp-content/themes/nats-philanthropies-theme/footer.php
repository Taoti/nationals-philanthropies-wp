<footer id="footer">
  <div class="footer-inner">

    <!-- <div class="footer-branding"> -->

    <a href="<?php echo home_url(); ?>" class="footer-logoLink footer-gridItem">
      <!-- <img class="footer-logo lazyload" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies-small.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies-small@2x.png 2x" width="92" height="92" alt="Washington Nationals Philanthropies Logo (small)"> -->
      <i class="footer-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies-mark.svg'); ?></i>
    </a>

    <div class="footer-brandingText footer-gridItem">

      <h4 class="footer-heading">Nationals Philanthropies</h4>

      <p class="footer-siteDescription">
        A nonprofit fueled by collective action in pursuit of a better Washington region. The official charitable arm of the Washington Nationals, including the signature program of the Nationals Youth Baseball Academy.
      </p>

    </div>

    <!-- </div> -->

    <ul class="footer-socialItems">

      <li class="footer-socialItem footer-socialItem-twitter footer-gridItem">
        <?php if( get_theme_mod('taoti_twitter_url') && !is_preview() ): ?>
          <a class="footer-socialLink js-customizer-twitter" href="<?php echo get_theme_mod('taoti_twitter_url'); ?>">
            <i class="footer-socialIcon footer-socialIcon-twitter"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-twitter.svg'); ?></i>
          </a>
        <?php endif; ?>
      </li>

      <li class="footer-socialItem footer-socialItem-instagram footer-gridItem">
        <?php if( get_theme_mod('taoti_instagram_url') && !is_preview() ): ?>
        <a class="footer-socialLink js-customizer-instagram" href="<?php echo get_theme_mod('taoti_instagram_url'); ?>">
          <i class="footer-socialIcon footer-socialIcon-instagram"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-instagram.svg'); ?></i>
        </a>
        <?php endif; ?>
      </li>

      <li class="footer-socialItem footer-socialItem-facebook footer-gridItem">
        <?php if( get_theme_mod('taoti_facebook_url') && !is_preview() ): ?>
        <a class="footer-socialLink js-customizer-facebook" href="<?php echo get_theme_mod('taoti_facebook_url'); ?>">
          <i class="footer-socialIcon footer-socialIcon-facebook"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-facebook2.svg'); ?></i>
        </a>
        <?php endif; ?>
      </li>

    </ul>

    <p class="footer-copyright footer-gridItem">Nationals Philanthropies – Copyright <?php echo date("Y"); ?>. All Rights Reserved</p>

    <!-- <div class="footer-emptyItem footer-emptyItem-1 footer-gridItem"></div>
    <div class="footer-emptyItem footer-emptyItem-2 footer-gridItem"></div>
    <div class="footer-emptyItem footer-emptyItem-3 footer-gridItem"></div>
    <div class="footer-emptyItem footer-emptyItem-4 footer-gridItem"></div> -->

  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
