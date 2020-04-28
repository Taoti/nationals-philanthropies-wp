<?php
### Useful functions for this particular theme.
// Set up any `add_action`s or `add_filter`s here.



// In the Dashboard main menu, in the News (posts) submenu, add a link to the "page for posts" (the page that is set to display posts in Settings > Reading). This provides a link to edit the archive page for this post type, sort of like how the events archive has an ACF options page.
function admin_menu_new_items() {
		global $submenu;

		$edit_posts_page_url = get_edit_post_link( get_option( 'page_for_posts' ) );

		if( $edit_posts_page_url ){
			$submenu['edit.php'][500] = array( 'News Archive Page', 'manage_options', $edit_posts_page_url );
		}

}
add_action( 'admin_menu' , 'admin_menu_new_items' );
