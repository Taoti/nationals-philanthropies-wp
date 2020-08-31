<?php

/**
 * HTTP to HTTPS redirect, for when the yml file doesn't work.
 * https://pantheon.io/docs/http-to-https#accordion
 */
/*
if (isset($_ENV['PANTHEON_ENVIRONMENT']) && php_sapi_name() != 'cli') {
  // Redirect to https://$primary_domain in the Live environment
  if ($_ENV['PANTHEON_ENVIRONMENT'] === 'live') {
    // Replace www.example.com with your registered domain name.
    $primary_domain = 'www.example.com';
  }
  else {
    // Redirect to HTTPS on every Pantheon environment.
    $primary_domain = $_SERVER['HTTP_HOST'];
  }

  $requires_redirect = false;

  // Ensure the site is being served from the primary domain.
  if ($_SERVER['HTTP_HOST'] != $primary_domain) {
    $requires_redirect = true;
  }

  // If you're not using HSTS in the pantheon.yml file, uncomment this next block.
  // if (!isset($_SERVER['HTTP_USER_AGENT_HTTPS'])
  //     || $_SERVER['HTTP_USER_AGENT_HTTPS'] != 'ON') {
  //   $requires_redirect = true;
  // }

  if ($requires_redirect === true) {

    // Name transaction "redirect" in New Relic for improved reporting (optional).
    if (extension_loaded('newrelic')) {
      newrelic_name_transaction("redirect");
    }

    header('HTTP/1.0 301 Moved Permanently');
    header('Location: https://'. $primary_domain . $_SERVER['REQUEST_URI']);
    exit();
  }
}
*/



/**
 * Allow database repair.
 *
 * Necessary after WordPress 5.5 update.
 */
define('WP_ALLOW_REPAIR', true);
