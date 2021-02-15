<?php
### Useful functions for this particular theme.
// Set up any `add_action`s or `add_filter`s here.



// In the Dashboard main menu, in the News (posts) submenu, add a link to the "page for posts" (the page that is set to display posts in Settings > Reading). This provides a link to edit the archive page for this post type, sort of like how the events archive has an ACF options page.
function admin_menu_new_items() {
		global $submenu;

		$edit_posts_page_url = get_edit_post_link( get_option( 'page_for_posts' ) );

		if( $edit_posts_page_url ){
			$submenu['edit.php'][500] = array( 'News Listing Page', 'manage_options', $edit_posts_page_url );
		}

}
add_action( 'admin_menu' , 'admin_menu_new_items' );



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
