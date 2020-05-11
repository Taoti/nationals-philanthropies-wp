<?php

/*
 * PURPOSE : Add 'Edit' and 'View' buttons to the toolbar for the custom options page that manages the Events archive.
 *   NOTES : https://codex.wordpress.org/Function_Reference/add_node
 */
function taoti_admin_bar_customize_events(){
    global $wp_admin_bar;

    // If viewing the events archive, add a link to the toolbar to the ACF edit screen.
    if( is_post_type_archive('events') ){

        $args = array(
            'id' => 'edit', // This is what adds the pencil icon to the button.
            'title' => 'Edit Events Listing Page',
            'href' => admin_url('edit.php?post_type=events&page=acf-options-events-listing-page'),
        );

        $wp_admin_bar->add_node( $args );

    }

    // If on the ACF edit screen for the events archive, add a 'view' link to the toolbar.
    if( function_exists('get_current_screen') ){
        $screen = get_current_screen();
        // echo "<pre>"; print_r($screen); echo "</pre>";

        if( is_admin() && isset($screen->id) && $screen->id=='events_page_acf-options-events-listing-page' ){
            $args = array(
                'id' => 'view-events',
                'title' => 'View Events',
                'href' => get_post_type_archive_link( 'events' ),
            );

            $wp_admin_bar->add_node( $args );
        }

		}

}
add_action( 'admin_bar_menu', 'taoti_admin_bar_customize_events', 75 );





/*
 * PURPOSE : Add 'Edit' button for the 404 page that really links to the Customizer.
 *   NOTES :
 */
function taoti_admin_bar_customize_404(){
	global $wp_admin_bar;

	// If viewing the events archive, add a link to the toolbar to the ACF edit screen.
	if( is_404() ){

			global $wp;
			$current_url = home_url( add_query_arg( array(), $wp->request ) );

			$args = array(
					'id' => 'customize', // This will override the default Customizer link in the admin bar.
					'title' => 'Customize 404 Page', // Want to make it clearer that admins can edit the 404 page content using the Customizer.
					'href' => admin_url( 'customize.php?url=' . urlencode($current_url) ),
			);

			$wp_admin_bar->add_node( $args );

	}

}
add_action( 'admin_bar_menu', 'taoti_admin_bar_customize_404', 75 );




/*
* PURPOSE : For logged in users (admins) hide the WordPress link in the admin bar.
*   NOTES : For the Dashboard area, the same button is hidden in `styles/scss/admin/style-admin.scss`
*/
function taoti_hide_wp_link_in_admin_bar(){

	if( is_user_logged_in() ): ?>
	<style>#wp-admin-bar-wp-logo{display:none}</style>
	<?php endif;

}
add_action( 'wp_head', 'taoti_hide_wp_link_in_admin_bar' );
