<?php
### Add option pages via ACF.

if( function_exists('acf_add_options_page') ) {

	// Add a temporary options page to have somewhere to toggle the temporary landing page.
	acf_add_options_page('Temporary Landing Page');

	// Options for `events` archive page
	acf_add_options_page(
		array(
			'page_title' => 'Events Listing Page',
			'parent_slug' => 'edit.php?post_type=events'
		)
	);

	// Options for `post` (News) archive page
	acf_add_options_page(
		array(
			'page_title' => 'News Listing Page',
			'parent_slug' => 'edit.php'
		)
	);

}
