<?php
### Useful functions for this particular theme.
// Set up any `add_action`s or `add_filter`s here.



### Remove the default content editor on post types that use the page builder.
function remove_textarea_page() {

	$post_types_with_page_builder = taoti_get_post_types_with_page_builder();

	if( !empty($post_types_with_page_builder) ):
		foreach( $post_types_with_page_builder as $post_type_slug ):
			remove_post_type_support( $post_type_slug, 'editor' );
		endforeach;
	endif;

}
add_action('admin_init', 'remove_textarea_page');
