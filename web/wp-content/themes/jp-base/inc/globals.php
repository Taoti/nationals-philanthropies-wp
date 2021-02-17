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



### Whenever a post is saved, and if that post type uses the page builder, save the HTML output of the page builder in a post meta option. This acts as a sort of cache for the page builder contents, and can be used to generate excerpts.
function taoti_store_page_builder_output( $post_id, $post, $update ){

	$post_types_with_page_builder = taoti_get_post_types_with_page_builder();

	if( in_array( get_post_type($post_id), $post_types_with_page_builder ) ){
		global $post;
		$post = get_post( $post_id );
		setup_postdata( $post );

        // Get the output of the page builder.
        ob_start();
            the_page_builder();
		    $page_content = ob_get_clean();

		// Save the output to a post meta key so it can be easily retrieved later, like when generating an excerpt.
		update_post_meta( $post_id, 'taoti_page_builder_output', $page_content );

		wp_reset_postdata();
	}

}
add_action( 'save_post', 'taoti_store_page_builder_output', 10, 3 );



// function taoti_use_page_builder_output_for_content( $content ){
// 	if ( is_main_query() ) {
// 		$page_builder_output = get_post_meta( get_the_ID(), 'taoti_page_builder_output', true );
// 		$content = $content . $page_builder_output;
// 	}

// 	return $content;
// }
// add_filter( 'the_content', 'taoti_use_page_builder_output_for_content' );
