<?php

/*
 * PURPOSE : Adds the Formats dropdown to the TinyMCE toolbar.
 *  PARAMS : $buttons - array - slugs for the TinyMCE toolbar buttons.
 * RETURNS : $buttons
 *   NOTES : https://codex.wordpress.org/TinyMCE_Custom_Styles
 */
function taoti_mce_add_formats_dropdown( $buttons ){
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter('mce_buttons_2', 'taoti_mce_add_formats_dropdown');



/*
 * PURPOSE : Add options to the Formats dropdown in this function, or if you start adding a bunch then split them into their own functions/files.
 *  PARAMS : $settings - style_formats array of child arrays, each child array defines one of the options
 * RETURNS : $settings
 *   NOTES : https://codex.wordpress.org/TinyMCE_Custom_Styles
 */
function taoti_mce_add_formats_options( $settings ){

    // $style_formats = [
  	// 	[
		// 		'title' => 'Button',
		// 		'selector' => 'a',
		// 		'classes' => 'content-button'
		// 	]
		// ];

		$style_formats = [
  		[
				'title' => 'Button',
				'items' => [
					[
						'title' => 'Button - Red',
						'selector' => 'a',
						'classes' => 'content-button content-button-red',
					],
					[
						'title' => 'Button - Green',
						'selector' => 'a',
						'classes' => 'content-button content-button-green',
					],
					[
						'title' => 'Button - Blue',
						'selector' => 'a',
						'classes' => 'content-button content-button-blue',
					],
				],

			]
		];

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
add_filter('tiny_mce_before_init', 'taoti_mce_add_formats_options');
