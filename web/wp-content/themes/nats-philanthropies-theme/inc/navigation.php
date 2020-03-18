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




/*
 * PURPOSE : Edit the <a>s that get output in a WP nav.
 * RETURNS : $atts
 *   NOTES : https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_link_attributes
 */
function taoti_add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    // echo "<pre>"; print_r($atts); echo "</pre>";
    // echo "<pre>"; print_r($item); echo "</pre>";
    // echo "<pre>"; print_r($args); echo "</pre>";
    // if( $args->theme_location == 'main-navigation' ) {
      // add the desired attributes:
      $atts['class'] = 'menu-link';
    // }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'taoti_add_specific_menu_location_atts', 10, 3 );

function taoti_test( $args, $item, $depth ){
	// echo "<pre id='atts'>"; print_r($args); echo "</pre>";
	// echo "<pre id='item'>"; print_r($item); echo "</pre>";
	// echo "<pre id='depth'>"; print_r($depth); echo "</pre>";

	if( $depth === 0 && $args->theme_location == 'temporary-navigation' ){
		$args->link_after = '<i class="menu-icon">'.file_get_contents(get_stylesheet_directory().'/images/icon-arrow.svg').'</i>';
	}

	return $args;
}
add_filter( 'nav_menu_item_args', 'taoti_test', 10, 3 );
