<footer id="footer">
  <div class="footer-inner l-container">

    <!-- <div class="footer-branding"> -->

    <a href="<?php echo home_url(); ?>" class="footer-logoLink footer-gridItem">
      <img class="footer-logo lazyload" data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies-small.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/logo-nats-philanthropies-small@2x.png 2x" width="92" height="92" alt="Washington Nationals Philanthropies Logo (small)">
    </a>

    <div class="footer-brandingText footer-gridItem">

      <h4 class="footer-heading">Nationals Philanthropies</h4>

      <p class="footer-siteDescription">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      </p>

    </div>

    <!-- </div> -->

    <ul class="footer-socialItems">

      <li class="footer-socialItem footer-socialItem-twitter footer-gridItem">
        <a class="footer-socialLink" href="#0">
          <i class="footer-socialIcon footer-socialIcon-twitter"><?php echo file_get_contents( get_stylesheet_directory().'/images/social-twitter.svg' ); ?></i>
        </a>
      </li>

      <li class="footer-socialItem footer-socialItem-facebook footer-gridItem">
        <a class="footer-socialLink" href="#0">
          <i class="footer-socialIcon footer-socialIcon-facebook"><?php echo file_get_contents( get_stylesheet_directory().'/images/social-facebook2.svg' ); ?></i>
        </a>
      </li>

      <li class="footer-socialItem footer-socialItem-instagram footer-gridItem">
        <a class="footer-socialLink" href="#0">
          <i class="footer-socialIcon footer-socialIcon-instagram"><?php echo file_get_contents( get_stylesheet_directory().'/images/social-instagram.svg' ); ?></i>
        </a>
      </li>

    </ul>

    <p class="footer-copyright footer-gridItem">Nationals Philanthropies – Copyright <?php echo date("Y"); ?>. All Rights Reseved</p>

    <!-- <div class="footer-emptyItem footer-emptyItem-1 footer-gridItem"></div>
    <div class="footer-emptyItem footer-emptyItem-2 footer-gridItem"></div>
    <div class="footer-emptyItem footer-emptyItem-3 footer-gridItem"></div>
    <div class="footer-emptyItem footer-emptyItem-4 footer-gridItem"></div> -->

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
