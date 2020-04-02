<?php
### Add custom post types.

function jp_register_post_types() {

	// Add all your post type info into this array.
	$jp_magic_post_type_maker_array = [

		/*
		HOW TO USE

		Copy the array below for 'product' and edit as needed. $jp_magic_post_type_maker_array should be an array of arrays, and those arrays make it easier to create custom post types.

		The 'slug', 'singular', and 'plural' parameters are explained below in the example array's comments.

		For the 'register_args' array, add whichever arguments you need to the array (Except for the 'labels' argument, that's automatically generated for you).

		Use the documentation on https://codex.wordpress.org/Function_Reference/register_post_type

		*** Common arguments (that you'll definitely want to use) are `menu_icon` and `description`. ***

		The most common arguments are here for you to copy/paste, but again you can add whichever arguments are supported by the register_post_type() function.

		'menu_icon'  => 'dashicons-clipboard',
		'description' => 'Manage your PLURAL POST NAME here.',
		'menu_position' => 10,
		'hierarchical' => true,
		'public' => true,
		'has_archive' => true,
		'exclude_from_search' => false,

		*/

		// Comment out or change this example:
		// [
		// 	'slug' => 'products', // Lowercase letters, dashes only. Probably should be plural.
		// 	'singular' => 'Product', // Capitalized, something like 'Product' or 'Staff Member'
		// 	'plural' => 'Products (REPLACE ME)', // Capitalized, something like 'Products' or 'Staff Members'
		// 	'register_args' => [ // Explained above.
		// 		'menu_icon' => 'dashicons-clipboard',
		// 		'description' => 'Manage your Products.',
		// 	],
		//
		// ],

		[
			'slug' => 'people',
			'singular' => 'Person',
			'plural' => 'People',
			'register_args' => [
				'menu_icon' => 'dashicons-id',
				'description' => 'Manage your People.',
			],

		],

		[
			'slug' => 'events',
			'singular' => 'Event',
			'plural' => 'Events',
			'register_args' => [
				'menu_icon' => 'dashicons-buddicons-groups',
				'description' => 'Manage your Events.',
			],

		],

		// NOTE: If you are looking for the 'news' post type there is none, it is the 'post' post type with customized labels. See `taoti_change_post_labels()` below.

	];

	foreach( $jp_magic_post_type_maker_array as $post_type_args ){
		$singular = $post_type_args['singular'];
		$plural = $post_type_args['plural'];
		$slug = $post_type_args['slug'];
		$register_args = $post_type_args['register_args'];

	  	// Arguments
		$final_args = jp_generate_post_type_args( $register_args );

		// Admin Labels
		$labels = jp_generate_label_array([
			'singular' => $singular,
			'plural' => $plural,
			'slug' => $slug,
		]);

		$final_args['labels'] = $labels;

		// Finally register the post type.
		register_post_type( $slug, $final_args );
	}

}
add_action( 'init', 'jp_register_post_types', 0 );



// function jp_generate_label_array($cpt_plural, $cpt_single){
function jp_generate_label_array( $args = [] ){

	$defaults = [
		'singular' => false,
		'plural' => false,
		'slug' => false,
	];

	$merged = array_merge($defaults, $args);

	if( in_array(false, $merged, true) ){
		return false;
	}

	$singular = $merged['singular'];
	$plural = $merged['plural'];
	$slug = $merged['slug'];
	$singular_lowercase = strtolower( $singular );
	$plural_lowercase = strtolower( $plural );

	$labels = array(
		'name' => $plural,
		'singular_name' => $singular,
		'add_new' => _x('Add New', 'add new post or page', 'base'),
		'add_new_item' => sprintf( _x( 'Add New %s', 'referring to a post/page', 'base' ), $singular ),
		'edit_item' => sprintf( _x( 'Edit %s', 'referring to a post/page', 'base' ), $singular ),
		'new_item' => sprintf( _x( 'New %s', 'referring to a post/page', 'base' ), $singular ),
		'view_item' => sprintf( _x( 'View %s', 'referring to a post/page', 'base' ), $singular ),
		'view_items' => sprintf( _x( 'View %s', 'referring to posts/pages', 'base' ), $plural ),
		'search_items' => sprintf( _x( 'Search %s', 'referring to posts/pages', 'base' ), $plural ),
		'not_found' => sprintf( _x( 'No %s found', 'referring to posts/pages', 'base' ), $plural_lowercase ),
		'not_found_in_trash' => sprintf( _x( 'No %s found in Trash.', 'referring to posts/pages', 'base' ), $plural_lowercase ),
		'parent_item_colon' => sprintf( _x( 'Parent %s:', 'referring to a post/page', 'base' ), $singular ),
		'all_items' => sprintf( _x( 'All %s', 'referring to posts/pages', 'base' ), $plural ),
		'archives' => sprintf( _x( '%s Archives', 'referring to posts/pages', 'base' ), $singular ),
		'attributes' => sprintf( _x( '%s Attributes', 'referring to posts/pages', 'base' ), $singular ),
		'insert_into_item' => sprintf( _x( 'Insert into %s.', 'referring to a post/page', 'base' ), $singular ),
		'uploaded_to_this_item' => sprintf( _x( 'Uploaded to this %s.', 'referring to a post/page', 'base' ), $singular ),
    );

	return $labels;
}

function jp_generate_post_type_args( $args = [] ){

	$defaults = array(
		'public'        	  => true,
		'menu_position' 	  => 8,
		'hierarchical'		  => true,
		'supports'      	  => array( 'title', 'editor', 'page-attributes', 'thumbnail', 'excerpt' ),
		'has_archive'   	  => true,
		'exclude_from_search' => false
    );

	$merged = array_merge($defaults, $args);

	return $merged;
}



### Change labels of "Posts" to "News"
// https://revelationconcept.com/wordpress-rename-default-posts-news-something-else/
function taoti_change_post_labels() {
	global $wp_post_types;

	$labels = &$wp_post_types['post']->labels;

	$labels->name = 'News';
	$labels->singular_name = 'News Item';
	$labels->add_new = 'Add New';
	$labels->add_new_item = 'Add News Item';
	$labels->edit_item = 'Edit News Item';
	$labels->new_item = 'News Item';
	$labels->view_item = 'View News Item';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News Items found';
	$labels->not_found_in_trash = 'No News Items found in Trash';
	$labels->all_items = 'All News';
	$labels->menu_name = 'News';
	$labels->name_admin_bar = 'News';

}
add_action( 'init', 'taoti_change_post_labels' );
