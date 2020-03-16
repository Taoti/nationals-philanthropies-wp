<?php
### Set up the navigation menus.

function jp_register_menus() {

	// Navigation Menus
	register_nav_menus(
		array(
				'main-navigation' => 'Main Navigation',
				'utility-navigation' => 'Utility Navigation',
				'temporary-navigation' => 'Temporary Landing Page Navigation',
		)
	);

}
add_action( 'init', 'jp_register_menus' );
