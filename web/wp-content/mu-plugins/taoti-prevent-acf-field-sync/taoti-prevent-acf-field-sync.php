<?php
/*
 * The "Sync" feature in ACF should only be used on
 * a local dev environment. This is because ACF will
 * save the field groups as .json files, however
 * Pantheon will prevent files from being generated on
 * their servers.
 *
 * The .json files which are created on a local dev
 * environment act as the source of truth for the ACF
 * fields. These are committed to the repo and can
 * only be edited by a dev.
 *
 * On your local dev environment, if you need to edit
 * any fields then ALWAYS do a sync first. This
 * ensures that your edits will not create
 * conflicts in the .json files.
 */

// Prevent any access to the Sync tab on the pantheon server.
function taoti_prevent_acf_field_sync(){
    if( isset($_ENV['PANTHEON_ENVIRONMENT']) && $_ENV['PANTHEON_ENVIRONMENT'] != 'lando' && is_admin() ){

        // Do a check to make sure this is the "edit ACF field groups" page.
        $screen = get_current_screen();
        $on_acf_edit_page = ( isset($screen->id) && $screen->id === 'edit-acf-field-group' );

        // Also do a check to make sure this is the "Sync" tab.
        $on_sync_tab = ( isset($_GET['post_status']) && $_GET['post_status'] === 'sync' );

        // Die if those checks are true, and this is the pantheon server. (Redirects won't work here)
        if( $on_acf_edit_page && $on_sync_tab ){
            wp_die('Field sync not allowed on the server, sync/edits must be done on a local dev environment and committed to the repo.');
        }

    }
}
add_action( 'current_screen', 'taoti_prevent_acf_field_sync' );


// Disable the link via CSS to the Sync tab on the pantheon server.
function taoti_prevent_acf_field_sync_css(){
    if( isset($_ENV['PANTHEON_ENVIRONMENT']) && $_ENV['PANTHEON_ENVIRONMENT'] != 'lando' ):
    ?>
    <style>body.post-type-acf-field-group .subsubsub .json{opacity:.5;pointer-events:none;cursor:not-allowed}</style>
    <?php
    endif;
}
add_action( 'admin_print_styles', 'taoti_prevent_acf_field_sync_css' );


function taoti_notify_acf_sync_available(){
    if( class_exists('acf_admin_field_groups') ){

        $acf_groups = new acf_admin_field_groups();
        $acf_groups->check_sync();

        if( !isset($_ENV['PANTHEON_ENVIRONMENT']) && is_array($acf_groups->sync) && count($acf_groups->sync) > 0 ){
            acf_add_admin_notice( 'Sync is available in your ACF field groups. Make sure you sync before making edits.', 'warning' );
        } elseif( isset($_ENV['PANTHEON_ENVIRONMENT']) && $_ENV['PANTHEON_ENVIRONMENT'] != 'lando') {
            acf_add_admin_notice( 'Sync is available in your ACF field groups. Make sure you sync before making edits.', 'warning' );
        }

    }
}
add_action( 'admin_print_styles', 'taoti_notify_acf_sync_available' );
