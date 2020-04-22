<footer id="tempFooter">
  <div class="tempFooter-inner">

    <a href="<?php echo home_url(); ?>" class="tempFooter-logoLink tempFooter-gridItem">
      <i class="tempFooter-logo"><?php echo file_get_contents(get_stylesheet_directory() . '/images/logo-nats-philanthropies-mark.svg'); ?></i>
    </a>

    <div class="tempFooter-brandingText tempFooter-gridItem">

      <h4 class="tempFooter-heading">Nationals Philanthropies</h4>

      <p class="tempFooter-siteDescription">
        A nonprofit fueled by collective action in pursuit of a better Washington region. The official charitable arm of the Washington Nationals, including the signature program of the Nationals Youth Baseball Academy.
      </p>

    </div>

    <ul class="tempFooter-socialItems">

      <li class="tempFooter-socialItem tempFooter-socialItem-twitter tempFooter-gridItem">
        <?php if( get_theme_mod('taoti_twitter_url') && !is_preview() ): ?>
          <a class="tempFooter-socialLink js-customizer-twitter" href="<?php echo get_theme_mod('taoti_twitter_url'); ?>">
            <i class="tempFooter-socialIcon tempFooter-socialIcon-twitter"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-twitter.svg'); ?></i>
          </a>
        <?php endif; ?>
      </li>

      <li class="tempFooter-socialItem tempFooter-socialItem-instagram tempFooter-gridItem">
        <?php if( get_theme_mod('taoti_instagram_url') && !is_preview() ): ?>
        <a class="tempFooter-socialLink js-customizer-instagram" href="<?php echo get_theme_mod('taoti_instagram_url'); ?>">
          <i class="tempFooter-socialIcon tempFooter-socialIcon-instagram"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-instagram.svg'); ?></i>
        </a>
        <?php endif; ?>
      </li>

      <li class="tempFooter-socialItem tempFooter-socialItem-facebook tempFooter-gridItem">
        <?php if( get_theme_mod('taoti_facebook_url') && !is_preview() ): ?>
        <a class="tempFooter-socialLink js-customizer-facebook" href="<?php echo get_theme_mod('taoti_facebook_url'); ?>">
          <i class="tempFooter-socialIcon tempFooter-socialIcon-facebook"><?php echo file_get_contents(get_stylesheet_directory() . '/images/social-facebook2.svg'); ?></i>
        </a>
        <?php endif; ?>
      </li>

    </ul>

    <p class="tempFooter-copyright tempFooter-gridItem">Nationals Philanthropies – Copyright <?php echo date("Y"); ?>. All Rights Reserved</p>

  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
