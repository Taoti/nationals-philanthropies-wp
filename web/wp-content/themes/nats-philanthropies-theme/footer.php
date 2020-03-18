<footer id="footer">

    <div class="footer-inner l-container">

      <div class="footer-branding">

        <a href="<?php echo home_url(); ?>" class="footer-logoLink">
          <img class="footer-logo lazyload" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies-small.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies-small@2x.png 2x" width="92" height="92" alt="Washington Nationals Philanthropies Logo (small)">
        </a>

        <div class="footer-brandingText">

          <h4 class="footer-heading">Nationals Philanthropies</h4>

          <p class="footer-siteDescription">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          </p>

        </div>

      </div>

      <ul class="footer-socialLinks">

        <li class="footer-socialItem">
          <a class="footer-socialLink" href="#0">
            <i class="footer-socialIcon footer-socialIcon-twitter"><?php echo file_get_contents( get_stylesheet_directory().'/images/social-twitter.svg' ); ?></i>
          </a>
        </li>

        <li class="footer-socialItem">
          <a class="footer-socialLink" href="#0">
            <i class="footer-socialIcon footer-socialIcon-facebook"><?php echo file_get_contents( get_stylesheet_directory().'/images/social-facebook2.svg' ); ?></i>
          </a>
        </li>

        <li class="footer-socialItem">
          <a class="footer-socialLink" href="#0">
            <i class="footer-socialIcon footer-socialIcon-instagram"><?php echo file_get_contents( get_stylesheet_directory().'/images/social-instagram.svg' ); ?></i>
          </a>
        </li>

      </ul>

    </div>

    <div class="footer-inner l-container">
      <p class="footer-copyright">Nationals Philanthropies – Copyright <?php echo date("Y"); ?>. All Rights Reseved</p>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
