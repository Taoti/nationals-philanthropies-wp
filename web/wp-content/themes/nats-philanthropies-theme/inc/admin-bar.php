<?php

/*
 * PURPOSE : Add 'Edit' and 'View' buttons to the toolbar for custom options pages that manage post type archives.
 *   NOTES : https://codex.wordpress.org/Function_Reference/add_node
 */
function taoti_admin_bar_customize(){
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

add_action( 'admin_bar_menu', 'taoti_admin_bar_customize', 75 );
