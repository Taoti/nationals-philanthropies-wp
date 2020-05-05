<?php

/*
 * Events are not meant to have a `single` view, so redirect to the homepage.
 * Avoid linking to event posts in your code.
 */

wp_redirect( home_url(), 301 );
