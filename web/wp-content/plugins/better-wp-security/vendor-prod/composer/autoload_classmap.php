<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'ITSEC_Admin_Notice' => $baseDir . '/core/lib/admin-notices/interface-itsec-admin-notice.php',
    'ITSEC_Admin_Notice_Action' => $baseDir . '/core/lib/admin-notices/actions/interface-itsec-admin-notice-action.php',
    'ITSEC_Admin_Notice_Action_Callback' => $baseDir . '/core/lib/admin-notices/actions/class-itsec-admin-notice-action-callback.php',
    'ITSEC_Admin_Notice_Action_Link' => $baseDir . '/core/lib/admin-notices/actions/class-itsec-admin-notice-action-link.php',
    'ITSEC_Admin_Notice_Callback' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-callback.php',
    'ITSEC_Admin_Notice_Context' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-context.php',
    'ITSEC_Admin_Notice_Globally_Dismissible' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-globally-dismissible.php',
    'ITSEC_Admin_Notice_Highlighted_Log' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-highlighted-log.php',
    'ITSEC_Admin_Notice_Licensed_Hostname_Prompt' => $baseDir . '/core/modules/global/notices.php',
    'ITSEC_Admin_Notice_Managers_Only' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-managers-only.php',
    'ITSEC_Admin_Notice_Network_Brute_Force_Promo' => $baseDir . '/core/modules/global/notices.php',
    'ITSEC_Admin_Notice_New_Feature_Core' => $baseDir . '/core/modules/core/notices.php',
    'ITSEC_Admin_Notice_Remind_Me' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-remind-me.php',
    'ITSEC_Admin_Notice_Screen_Blacklist' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-screen-blacklist.php',
    'ITSEC_Admin_Notice_Static' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-static.php',
    'ITSEC_Admin_Notice_User_Dismissible' => $baseDir . '/core/lib/admin-notices/class-itsec-admin-notice-user-dismissible.php',
    'ITSEC_Admin_Notices' => $baseDir . '/core/modules/core/class-itsec-admin-notices.php',
    'ITSEC_Application_Passwords_Util' => $baseDir . '/core/modules/two-factor/application-passwords-util.php',
    'ITSEC_Backup' => $baseDir . '/core/modules/backup/class-itsec-backup.php',
    'ITSEC_Backup_Logs' => $baseDir . '/core/modules/backup/logs.php',
    'ITSEC_Backup_Privacy' => $baseDir . '/core/modules/backup/privacy.php',
    'ITSEC_Backup_Settings' => $baseDir . '/core/modules/backup/settings.php',
    'ITSEC_Backup_Setup' => $baseDir . '/core/modules/backup/setup.php',
    'ITSEC_Ban_Users' => $baseDir . '/core/modules/ban-users/class-itsec-ban-users.php',
    'ITSEC_Ban_Users_Config_Generators' => $baseDir . '/core/modules/ban-users/config-generators.php',
    'ITSEC_Ban_Users_Settings' => $baseDir . '/core/modules/ban-users/settings.php',
    'ITSEC_Ban_Users_Setup' => $baseDir . '/core/modules/ban-users/setup.php',
    'ITSEC_Brute_Force' => $baseDir . '/core/modules/brute-force/class-itsec-brute-force.php',
    'ITSEC_Brute_Force_Logs' => $baseDir . '/core/modules/brute-force/logs.php',
    'ITSEC_Brute_Force_Setup' => $baseDir . '/core/modules/brute-force/setup.php',
    'ITSEC_Content_Directory_Utility' => $baseDir . '/core/modules/content-directory/utility.php',
    'ITSEC_Core_Active' => $baseDir . '/core/modules/core/class-itsec-core-active.php',
    'ITSEC_Core_Admin' => $baseDir . '/core/modules/core/class-itsec-core-admin.php',
    'ITSEC_Dashboard' => $baseDir . '/core/modules/dashboard/class-itsec-dashboard.php',
    'ITSEC_Dashboard_Card' => $baseDir . '/core/modules/dashboard/cards/abstract-class-itsec-dashboard-card.php',
    'ITSEC_Dashboard_Card_Active_Lockouts' => $baseDir . '/core/modules/dashboard/cards/class-itsec-dashboard-card-active-lockouts.php',
    'ITSEC_Dashboard_Card_Banned_Users' => $baseDir . '/core/modules/dashboard/cards/class-itsec-dashboard-card-banned-users.php',
    'ITSEC_Dashboard_Card_Database_Backup' => $baseDir . '/core/modules/backup/cards/class-itsec-dashboard-card-database-backup.php',
    'ITSEC_Dashboard_Card_Line_Graph' => $baseDir . '/core/modules/dashboard/cards/class-itsec-dashboard-card-line-graph.php',
    'ITSEC_Dashboard_Card_Malware_Scan' => $baseDir . '/core/modules/site-scanner/cards/class-itsec-dashboard-card-malware-scan.php',
    'ITSEC_Dashboard_Card_Pie_Chart' => $baseDir . '/core/modules/dashboard/cards/class-itsec-dashboard-card-pie-chart.php',
    'ITSEC_Dashboard_REST' => $baseDir . '/core/modules/dashboard/class-itsec-dashboard-rest.php',
    'ITSEC_Dashboard_Setup' => $baseDir . '/core/modules/dashboard/setup.php',
    'ITSEC_Dashboard_Util' => $baseDir . '/core/modules/dashboard/class-itsec-dashboard-util.php',
    'ITSEC_Database_Prefix_Utility' => $baseDir . '/core/modules/database-prefix/utility.php',
    'ITSEC_Debug' => $baseDir . '/core/lib/debug.php',
    'ITSEC_Email_Confirmation' => $baseDir . '/core/modules/email-confirmation/class-itsec-email-confirmation.php',
    'ITSEC_File_Change' => $baseDir . '/core/modules/file-change/class-itsec-file-change.php',
    'ITSEC_File_Change_Admin' => $baseDir . '/core/modules/file-change/admin.php',
    'ITSEC_File_Change_Chunk_Scanner' => $baseDir . '/core/modules/file-change/lib/chunk-scanner.php',
    'ITSEC_File_Change_Hash_Comparator' => $baseDir . '/core/modules/file-change/lib/hash-comparator.php',
    'ITSEC_File_Change_Hash_Comparator_Chain' => $baseDir . '/core/modules/file-change/lib/hash-comparator-chain.php',
    'ITSEC_File_Change_Hash_Comparator_Loadable' => $baseDir . '/core/modules/file-change/lib/hash-comparator-loadable.php',
    'ITSEC_File_Change_Hash_Comparator_Managed_Files' => $baseDir . '/core/modules/file-change/lib/hash-comparator-managed-files.php',
    'ITSEC_File_Change_Hash_Loading_Failed_Exception' => $baseDir . '/core/modules/file-change/lib/hash-loading-failed-exception.php',
    'ITSEC_File_Change_Logs' => $baseDir . '/core/modules/file-change/logs.php',
    'ITSEC_File_Change_Package' => $baseDir . '/core/modules/file-change/lib/package.php',
    'ITSEC_File_Change_Package_Core' => $baseDir . '/core/modules/file-change/lib/package-core.php',
    'ITSEC_File_Change_Package_Factory' => $baseDir . '/core/modules/file-change/lib/package-factory.php',
    'ITSEC_File_Change_Package_Plugin' => $baseDir . '/core/modules/file-change/lib/package-plugin.php',
    'ITSEC_File_Change_Package_System' => $baseDir . '/core/modules/file-change/lib/package-system.php',
    'ITSEC_File_Change_Package_Theme' => $baseDir . '/core/modules/file-change/lib/package-theme.php',
    'ITSEC_File_Change_Package_Unknown' => $baseDir . '/core/modules/file-change/lib/package-unknown.php',
    'ITSEC_File_Change_Scanner' => $baseDir . '/core/modules/file-change/scanner.php',
    'ITSEC_File_Change_Setup' => $baseDir . '/core/modules/file-change/setup.php',
    'ITSEC_Fingerprint' => $baseDir . '/core/lib/fingerprinting/class-itsec-fingerprint.php',
    'ITSEC_Fingerprint_Comparison' => $baseDir . '/core/lib/fingerprinting/class-itsec-fingerprint-comparison.php',
    'ITSEC_Fingerprint_Source' => $baseDir . '/core/lib/fingerprinting/interface-itsec-fingerprint-source.php',
    'ITSEC_Fingerprint_Value' => $baseDir . '/core/lib/fingerprinting/class-itsec-fingerprint-value.php',
    'ITSEC_Form' => $baseDir . '/core/lib/form.php',
    'ITSEC_Geolocator' => $baseDir . '/core/lib/geolocation/interface-itsec-geolocator.php',
    'ITSEC_Geolocator_Chain' => $baseDir . '/core/lib/geolocation/class-itsec-geolocator-chain.php',
    'ITSEC_Geolocator_Page_Cache' => $baseDir . '/core/lib/geolocation/class-itsec-geolocator-page-cache.php',
    'ITSEC_Global_Logs' => $baseDir . '/core/modules/global/logs.php',
    'ITSEC_Global_Privacy' => $baseDir . '/core/modules/global/privacy.php',
    'ITSEC_Global_Settings' => $baseDir . '/core/modules/global/settings.php',
    'ITSEC_Global_Setup' => $baseDir . '/core/modules/global/setup.php',
    'ITSEC_Global_Validator' => $baseDir . '/core/modules/global/validator.php',
    'ITSEC_HIBP' => $baseDir . '/core/modules/hibp/class-itsec-hibp.php',
    'ITSEC_HIBP_API' => $baseDir . '/core/modules/hibp/class-itsec-hibp-api.php',
    'ITSEC_HIBP_Setup' => $baseDir . '/core/modules/hibp/setup.php',
    'ITSEC_Hide_Backend' => $baseDir . '/core/modules/hide-backend/class-itsec-hide-backend.php',
    'ITSEC_Hide_Backend_Privacy' => $baseDir . '/core/modules/hide-backend/privacy.php',
    'ITSEC_Hide_Backend_Settings' => $baseDir . '/core/modules/hide-backend/settings.php',
    'ITSEC_Hide_Backend_Setup' => $baseDir . '/core/modules/hide-backend/setup.php',
    'ITSEC_IPCheck' => $baseDir . '/core/modules/network-brute-force/class-itsec-ipcheck.php',
    'ITSEC_IPCheck_Logs' => $baseDir . '/core/modules/network-brute-force/logs.php',
    'ITSEC_IPCheck_Setup' => $baseDir . '/core/modules/network-brute-force/setup.php',
    'ITSEC_IP_Detector' => $baseDir . '/core/lib/class-itsec-ip-detector.php',
    'ITSEC_Ithemes_Sync_Upgrader_Skin' => $baseDir . '/core/modules/sync-connect/includes/upgrader-skin.php',
    'ITSEC_Job' => $baseDir . '/core/lib/class-itsec-job.php',
    'ITSEC_Lib_Admin_Notices' => $baseDir . '/core/lib/class-itsec-lib-admin-notices.php',
    'ITSEC_Lib_Browser' => $baseDir . '/core/lib/class-itsec-lib-browser.php',
    'ITSEC_Lib_Canonical_Roles' => $baseDir . '/core/lib/class-itsec-lib-canonical-roles.php',
    'ITSEC_Lib_Config_File' => $baseDir . '/core/lib/class-itsec-lib-config-file.php',
    'ITSEC_Lib_Directory' => $baseDir . '/core/lib/class-itsec-lib-directory.php',
    'ITSEC_Lib_Distributed_Storage' => $baseDir . '/core/lib/class-itsec-lib-distributed-storage.php',
    'ITSEC_Lib_Distributed_Storage_Cursor' => $baseDir . '/core/lib/class-itsec-lib-distributed-storage.php',
    'ITSEC_Lib_Email_Confirmation' => $baseDir . '/core/lib/class-itsec-lib-email-confirmation.php',
    'ITSEC_Lib_Feature_Flags' => $baseDir . '/core/lib/class-itsec-lib-feature-flags.php',
    'ITSEC_Lib_File' => $baseDir . '/core/lib/class-itsec-lib-file.php',
    'ITSEC_Lib_Fingerprinting' => $baseDir . '/core/lib/class-itsec-lib-fingerprinting.php',
    'ITSEC_Lib_Geolocation' => $baseDir . '/core/lib/class-itsec-lib-geolocation.php',
    'ITSEC_Lib_Highlighted_Logs' => $baseDir . '/core/lib/class-itsec-lib-highlighted-logs.php',
    'ITSEC_Lib_IP_Detector' => $baseDir . '/core/lib/class-itsec-lib-ip-detector.php',
    'ITSEC_Lib_IP_Tools' => $baseDir . '/core/lib/class-itsec-lib-ip-tools.php',
    'ITSEC_Lib_JWT' => $baseDir . '/core/lib/class-itsec-lib-jwt.php',
    'ITSEC_Lib_Login' => $baseDir . '/core/lib/class-itsec-lib-login.php',
    'ITSEC_Lib_Login_Interstitial' => $baseDir . '/core/lib/class-itsec-lib-login-interstitial.php',
    'ITSEC_Lib_Opaque_Tokens' => $baseDir . '/core/lib/class-itsec-lib-opaque-tokens.php',
    'ITSEC_Lib_Password_Requirements' => $baseDir . '/core/lib/class-itsec-lib-password-requirements.php',
    'ITSEC_Lib_REST' => $baseDir . '/core/lib/class-itsec-lib-rest.php',
    'ITSEC_Lib_Remote_Messages' => $baseDir . '/core/lib/class-itsec-lib-remote-messages.php',
    'ITSEC_Lib_Static_Map_API' => $baseDir . '/core/lib/class-itsec-lib-static-map-api.php',
    'ITSEC_Lib_Upgrader' => $baseDir . '/core/lib/class-itsec-lib-upgrader.php',
    'ITSEC_Lib_User_Activity' => $baseDir . '/core/lib/class-itsec-lib-user-activity.php',
    'ITSEC_Lib_Utility' => $baseDir . '/core/lib/class-itsec-lib-utility.php',
    'ITSEC_Log' => $baseDir . '/core/lib/log.php',
    'ITSEC_Log_Util' => $baseDir . '/core/lib/log-util.php',
    'ITSEC_Login_Interstitial' => $baseDir . '/core/lib/login-interstitial/abstract-itsec-login-interstitial.php',
    'ITSEC_Login_Interstitial_Config_Driven' => $baseDir . '/core/lib/login-interstitial/class-itsec-login-interstitial-config-driven.php',
    'ITSEC_Login_Interstitial_Session' => $baseDir . '/core/lib/login-interstitial/class-itsec-login-interstitial-session.php',
    'ITSEC_Mail' => $baseDir . '/core/lib/class-itsec-mail.php',
    'ITSEC_Mutex' => $baseDir . '/core/lib/class-itsec-mutex.php',
    'ITSEC_Network_Brute_Force_Utilities' => $baseDir . '/core/modules/network-brute-force/utilities.php',
    'ITSEC_Network_Brute_Force_Validator' => $baseDir . '/core/modules/network-brute-force/validator.php',
    'ITSEC_Network_Bruteforce_Privacy' => $baseDir . '/core/modules/network-brute-force/privacy.php',
    'ITSEC_Notification_Center' => $baseDir . '/core/modules/notification-center/class-notification-center.php',
    'ITSEC_Notification_Center_Debug' => $baseDir . '/core/modules/notification-center/debug.php',
    'ITSEC_Notification_Center_Logs' => $baseDir . '/core/modules/notification-center/logs.php',
    'ITSEC_Notification_Center_Settings' => $baseDir . '/core/modules/notification-center/settings.php',
    'ITSEC_Notification_Center_Setup' => $baseDir . '/core/modules/notification-center/setup.php',
    'ITSEC_Notification_Center_Validator' => $baseDir . '/core/modules/notification-center/validator.php',
    'ITSEC_Password_Requirements' => $baseDir . '/core/modules/password-requirements/class-itsec-password-requirements.php',
    'ITSEC_Password_Requirements_Settings' => $baseDir . '/core/modules/password-requirements/settings.php',
    'ITSEC_Password_Requirements_Setup' => $baseDir . '/core/modules/password-requirements/setup.php',
    'ITSEC_Password_Requirements_Validator' => $baseDir . '/core/modules/password-requirements/validator.php',
    'ITSEC_Privacy' => $baseDir . '/core/modules/privacy/class-itsec-privacy.php',
    'ITSEC_Privacy_Util' => $baseDir . '/core/modules/privacy/util.php',
    'ITSEC_REST_Actor_Types_Controller' => $baseDir . '/core/modules/core/class-itsec-rest-actor-types-controller.php',
    'ITSEC_REST_Actors_Controller' => $baseDir . '/core/modules/core/class-itsec-rest-actors-controller.php',
    'ITSEC_REST_Core_Admin_Notices_Controller' => $baseDir . '/core/modules/core/class-rest-core-admin-notices-controller.php',
    'ITSEC_REST_Dashboard_Available_Cards_Controller' => $baseDir . '/core/modules/dashboard/rest/class-itsec-rest-dashboard-available-cards-controller.php',
    'ITSEC_REST_Dashboard_Card_Controller' => $baseDir . '/core/modules/dashboard/rest/class-itsec-rest-dashboard-card-controller.php',
    'ITSEC_REST_Dashboard_Cards_Controller' => $baseDir . '/core/modules/dashboard/rest/class-itsec-rest-dashboard-cards-controller.php',
    'ITSEC_REST_Dashboard_Controller' => $baseDir . '/core/modules/dashboard/rest/abstract-itsec-rest-dashboard-controller.php',
    'ITSEC_REST_Dashboard_Dashboards_Controller' => $baseDir . '/core/modules/dashboard/rest/class-itsec-rest-dashboard-dashboards-controller.php',
    'ITSEC_REST_Dashboard_Layout_Controller' => $baseDir . '/core/modules/dashboard/rest/class-itsec-rest-dashboard-layout-controller.php',
    'ITSEC_REST_Dashboard_Static_Controller' => $baseDir . '/core/modules/dashboard/rest/class-itsec-rest-dashboard-static-controller.php',
    'ITSEC_REST_Dashboard_Unknown_Card_Controller' => $baseDir . '/core/modules/dashboard/rest/class-itsec-rest-dashboard-unknown-card-controller.php',
    'ITSEC_SSL' => $baseDir . '/core/modules/ssl/class-itsec-ssl.php',
    'ITSEC_SSL_Setup' => $baseDir . '/core/modules/ssl/setup.php',
    'ITSEC_Salts_Setup' => $baseDir . '/core/modules/salts/setup.php',
    'ITSEC_Scheduler' => $baseDir . '/core/lib/class-itsec-scheduler.php',
    'ITSEC_Scheduler_Cron' => $baseDir . '/core/lib/class-itsec-scheduler-cron.php',
    'ITSEC_Scheduler_Page_Load' => $baseDir . '/core/lib/class-itsec-scheduler-page-load.php',
    'ITSEC_Schema' => $baseDir . '/core/lib/schema.php',
    'ITSEC_Security_Check_Feedback' => $baseDir . '/core/modules/security-check/feedback.php',
    'ITSEC_Security_Check_Feedback_Renderer' => $baseDir . '/core/modules/security-check/feedback-renderer.php',
    'ITSEC_Security_Check_Pro' => $baseDir . '/core/modules/security-check-pro/class-itsec-security-check-pro.php',
    'ITSEC_Security_Check_Pro_Privacy' => $baseDir . '/core/modules/security-check-pro/privacy.php',
    'ITSEC_Security_Check_Pro_Utility' => $baseDir . '/core/modules/security-check-pro/utility.php',
    'ITSEC_Security_Check_Scanner' => $baseDir . '/core/modules/security-check/scanner.php',
    'ITSEC_Settings' => $baseDir . '/core/lib/settings.php',
    'ITSEC_Site_Scanner' => $baseDir . '/core/modules/site-scanner/class-itsec-site-scanner.php',
    'ITSEC_Site_Scanner_API' => $baseDir . '/core/modules/site-scanner/api.php',
    'ITSEC_Site_Scanner_Logs' => $baseDir . '/core/modules/site-scanner/logs.php',
    'ITSEC_Site_Scanner_Mail' => $baseDir . '/core/modules/site-scanner/mail.php',
    'ITSEC_Site_Scanner_Privacy' => $baseDir . '/core/modules/site-scanner/privacy.php',
    'ITSEC_Site_Scanner_Template' => $baseDir . '/core/modules/site-scanner/template.php',
    'ITSEC_Site_Scanner_Util' => $baseDir . '/core/modules/site-scanner/util.php',
    'ITSEC_Static_Map_API' => $baseDir . '/core/lib/static-map-api/interface-itsec-static-map-api.php',
    'ITSEC_Storage' => $baseDir . '/core/lib/storage.php',
    'ITSEC_Strong_Passwords' => $baseDir . '/core/modules/strong-passwords/class-itsec-strong-passwords.php',
    'ITSEC_Strong_Passwords_Setup' => $baseDir . '/core/modules/strong-passwords/setup.php',
    'ITSEC_Sync_Connect' => $baseDir . '/core/modules/sync-connect/class-itsec-sync-connect.php',
    'ITSEC_Sync_Connect_Interstitial' => $baseDir . '/core/modules/sync-connect/class-itsec-sync-connect-interstitial.php',
    'ITSEC_System_Tweaks' => $baseDir . '/core/modules/system-tweaks/class-itsec-system-tweaks.php',
    'ITSEC_System_Tweaks_Config_Generators' => $baseDir . '/core/modules/system-tweaks/config-generators.php',
    'ITSEC_System_Tweaks_Settings' => $baseDir . '/core/modules/system-tweaks/settings.php',
    'ITSEC_System_Tweaks_Setup' => $baseDir . '/core/modules/system-tweaks/setup.php',
    'ITSEC_Two_Factor' => $baseDir . '/core/modules/two-factor/class-itsec-two-factor.php',
    'ITSEC_Two_Factor_Helper' => $baseDir . '/core/modules/two-factor/class-itsec-two-factor-helper.php',
    'ITSEC_Two_Factor_Interstitial' => $baseDir . '/core/modules/two-factor/class-itsec-two-factor-interstitial.php',
    'ITSEC_Two_Factor_Logs' => $baseDir . '/core/modules/two-factor/logs.php',
    'ITSEC_Two_Factor_On_Board' => $baseDir . '/core/modules/two-factor/class-itsec-two-factor-on-board.php',
    'ITSEC_Two_Factor_Privacy' => $baseDir . '/core/modules/two-factor/privacy.php',
    'ITSEC_Two_Factor_Provider_CLI_Configurable' => $baseDir . '/core/modules/two-factor/includes/interface-itsec-two-factor-provider-cli-configurable.php',
    'ITSEC_Two_Factor_Provider_On_Boardable' => $baseDir . '/core/modules/two-factor/includes/interface-itsec-two-factor-provider-on-boardable.php',
    'ITSEC_Two_Factor_Settings' => $baseDir . '/core/modules/two-factor/settings.php',
    'ITSEC_Two_Factor_Setup' => $baseDir . '/core/modules/two-factor/setup.php',
    'ITSEC_Upgrader_Skin' => $baseDir . '/core/lib/upgrader-skin.php',
    'ITSEC_Validator' => $baseDir . '/core/lib/validator.php',
    'ITSEC_WP_List_Table' => $baseDir . '/core/lib/class-itsec-wp-list-table.php',
    'ITSEC_WordPress_Salts_Utilities' => $baseDir . '/core/modules/salts/utilities.php',
    'ITSEC_WordPress_Tweaks' => $baseDir . '/core/modules/wordpress-tweaks/class-itsec-wordpress-tweaks.php',
    'ITSEC_WordPress_Tweaks_Config_Generators' => $baseDir . '/core/modules/wordpress-tweaks/config-generators.php',
    'ITSEC_WordPress_Tweaks_Setup' => $baseDir . '/core/modules/wordpress-tweaks/setup.php',
    'ITSEC_Wordpress_Tweaks_Settings' => $baseDir . '/core/modules/wordpress-tweaks/settings.php',
    'Ithemes_Sync_Verb_ITSEC_Authorize_Two_Factor_User' => $baseDir . '/core/modules/two-factor/sync-verbs/itsec-authorize-two-factor-user.php',
    'Ithemes_Sync_Verb_ITSEC_Do_Security_Check' => $baseDir . '/core/modules/security-check/sync-verbs/itsec-do-security-check.php',
    'Ithemes_Sync_Verb_ITSEC_Get_Security_Check_Feedback_Response' => $baseDir . '/core/modules/security-check/sync-verbs/itsec-get-security-check-feedback-response.php',
    'Ithemes_Sync_Verb_ITSEC_Get_Security_Check_Modules' => $baseDir . '/core/modules/security-check/sync-verbs/itsec-get-security-check-modules.php',
    'Ithemes_Sync_Verb_ITSEC_Get_Two_Factor_Users' => $baseDir . '/core/modules/two-factor/sync-verbs/itsec-get-two-factor-users.php',
    'Ithemes_Sync_Verb_ITSEC_Latest_File_Scan' => $baseDir . '/core/modules/file-change/sync-verbs/itsec-latest-file-scan.php',
    'Ithemes_Sync_Verb_ITSEC_Override_Two_Factor_User' => $baseDir . '/core/modules/two-factor/sync-verbs/itsec-override-two-factor-user.php',
    'Pimple\\Container' => $vendorDir . '/pimple/pimple/src/Pimple/Container.php',
    'Pimple\\Exception\\ExpectedInvokableException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/ExpectedInvokableException.php',
    'Pimple\\Exception\\FrozenServiceException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/FrozenServiceException.php',
    'Pimple\\Exception\\InvalidServiceIdentifierException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/InvalidServiceIdentifierException.php',
    'Pimple\\Exception\\UnknownIdentifierException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/UnknownIdentifierException.php',
    'Pimple\\Psr11\\Container' => $vendorDir . '/pimple/pimple/src/Pimple/Psr11/Container.php',
    'Pimple\\Psr11\\ServiceLocator' => $vendorDir . '/pimple/pimple/src/Pimple/Psr11/ServiceLocator.php',
    'Pimple\\ServiceIterator' => $vendorDir . '/pimple/pimple/src/Pimple/ServiceIterator.php',
    'Pimple\\ServiceProviderInterface' => $vendorDir . '/pimple/pimple/src/Pimple/ServiceProviderInterface.php',
    'Psr\\Container\\ContainerExceptionInterface' => $vendorDir . '/psr/container/src/ContainerExceptionInterface.php',
    'Psr\\Container\\ContainerInterface' => $vendorDir . '/psr/container/src/ContainerInterface.php',
    'Psr\\Container\\NotFoundExceptionInterface' => $vendorDir . '/psr/container/src/NotFoundExceptionInterface.php',
    'Two_Factor_Backup_Codes' => $baseDir . '/core/modules/two-factor/providers/class.two-factor-backup-codes.php',
    'Two_Factor_Core' => $baseDir . '/core/modules/two-factor/class-itsec-two-factor-core-compat.php',
    'Two_Factor_Email' => $baseDir . '/core/modules/two-factor/providers/class.two-factor-email.php',
    'Two_Factor_Provider' => $baseDir . '/core/modules/two-factor/providers/class.two-factor-provider.php',
    'Two_Factor_Totp' => $baseDir . '/core/modules/two-factor/providers/class.two-factor-totp.php',
    'Wikimedia\\Composer\\Logger' => $vendorDir . '/wikimedia/composer-merge-plugin/src/Logger.php',
    'Wikimedia\\Composer\\MergePlugin' => $vendorDir . '/wikimedia/composer-merge-plugin/src/MergePlugin.php',
    'Wikimedia\\Composer\\Merge\\ExtraPackage' => $vendorDir . '/wikimedia/composer-merge-plugin/src/Merge/ExtraPackage.php',
    'Wikimedia\\Composer\\Merge\\MissingFileException' => $vendorDir . '/wikimedia/composer-merge-plugin/src/Merge/MissingFileException.php',
    'Wikimedia\\Composer\\Merge\\NestedArray' => $vendorDir . '/wikimedia/composer-merge-plugin/src/Merge/NestedArray.php',
    'Wikimedia\\Composer\\Merge\\PluginState' => $vendorDir . '/wikimedia/composer-merge-plugin/src/Merge/PluginState.php',
    'Wikimedia\\Composer\\Merge\\StabilityFlags' => $vendorDir . '/wikimedia/composer-merge-plugin/src/Merge/StabilityFlags.php',
    'iThemesSecurity\\Actor\\Actor' => $baseDir . '/core/lib/actor/Actor.php',
    'iThemesSecurity\\Actor\\Actor_Factory' => $baseDir . '/core/lib/actor/Actor_Factory.php',
    'iThemesSecurity\\Actor\\Lockout_Module' => $baseDir . '/core/lib/actor/Lockout_Module.php',
    'iThemesSecurity\\Actor\\Lockout_Module_Factory' => $baseDir . '/core/lib/actor/Lockout_Module_Factory.php',
    'iThemesSecurity\\Actor\\Multi_Actor_Factory' => $baseDir . '/core/lib/actor/Multi_Actor_Factory.php',
    'iThemesSecurity\\Actor\\User' => $baseDir . '/core/lib/actor/User.php',
    'iThemesSecurity\\Actor\\User_Factory' => $baseDir . '/core/lib/actor/User_Factory.php',
    'iThemesSecurity\\Ban_Hosts\\Ban' => $baseDir . '/core/lib/ban-hosts/Ban.php',
    'iThemesSecurity\\Ban_Hosts\\Chain_Source' => $baseDir . '/core/lib/ban-hosts/Chain_Source.php',
    'iThemesSecurity\\Ban_Hosts\\Creatable' => $baseDir . '/core/lib/ban-hosts/Creatable.php',
    'iThemesSecurity\\Ban_Hosts\\Cursor' => $baseDir . '/core/lib/ban-hosts/Cursor.php',
    'iThemesSecurity\\Ban_Hosts\\Deletable' => $baseDir . '/core/lib/ban-hosts/Deletable.php',
    'iThemesSecurity\\Ban_Hosts\\Deprecated_Filter_Source' => $baseDir . '/core/lib/ban-hosts/Deprecated_Filter_Source.php',
    'iThemesSecurity\\Ban_Hosts\\Filters' => $baseDir . '/core/lib/ban-hosts/Filters.php',
    'iThemesSecurity\\Ban_Hosts\\Legacy_Ban' => $baseDir . '/core/lib/ban-hosts/Legacy_Ban.php',
    'iThemesSecurity\\Ban_Hosts\\Malformed_Cursor' => $baseDir . '/core/lib/ban-hosts/Malformed_Cursor.php',
    'iThemesSecurity\\Ban_Hosts\\Multi_Cursor' => $baseDir . '/core/lib/ban-hosts/Multi_Cursor.php',
    'iThemesSecurity\\Ban_Hosts\\Multi_Repository' => $baseDir . '/core/lib/ban-hosts/Multi_Repository.php',
    'iThemesSecurity\\Ban_Hosts\\Multi_Repository_Results' => $baseDir . '/core/lib/ban-hosts/Multi_Repository_Results.php',
    'iThemesSecurity\\Ban_Hosts\\Persistable' => $baseDir . '/core/lib/ban-hosts/Persistable.php',
    'iThemesSecurity\\Ban_Hosts\\REST' => $baseDir . '/core/lib/ban-hosts/REST.php',
    'iThemesSecurity\\Ban_Hosts\\Repository' => $baseDir . '/core/lib/ban-hosts/Repository.php',
    'iThemesSecurity\\Ban_Hosts\\Repository_Ban' => $baseDir . '/core/lib/ban-hosts/Repository_Ban.php',
    'iThemesSecurity\\Ban_Hosts\\Source' => $baseDir . '/core/lib/ban-hosts/Source.php',
    'iThemesSecurity\\Ban_Hosts\\Unknown_Source' => $baseDir . '/core/lib/ban-hosts/Unknown_Source.php',
    'iThemesSecurity\\Ban_Hosts\\Unsupported_Operation' => $baseDir . '/core/lib/ban-hosts/Unsupported_Operation.php',
    'iThemesSecurity\\Ban_Hosts\\Updatable' => $baseDir . '/core/lib/ban-hosts/Updatable.php',
    'iThemesSecurity\\Ban_Users\\Ban' => $baseDir . '/core/modules/ban-users/Ban.php',
    'iThemesSecurity\\Ban_Users\\Database_Repository' => $baseDir . '/core/modules/ban-users/Database_Repository.php',
    'iThemesSecurity\\Ban_Users\\REST' => $baseDir . '/core/modules/ban-users/REST.php',
    'iThemesSecurity\\Config_Settings' => $baseDir . '/core/lib/Config_Settings.php',
    'iThemesSecurity\\Config_Validator' => $baseDir . '/core/lib/Config_Validator.php',
    'iThemesSecurity\\Contracts\\Runnable' => $baseDir . '/core/Contracts/Runnable.php',
    'iThemesSecurity\\Exception\\Exception' => $baseDir . '/core/Exception/Exception.php',
    'iThemesSecurity\\Exception\\Invalid_Argument_Exception' => $baseDir . '/core/Exception/Invalid_Argument_Exception.php',
    'iThemesSecurity\\Exception\\Invalid_Module' => $baseDir . '/core/Exception/Invalid_Module.php',
    'iThemesSecurity\\Exception\\Unsatisfied_Module_Dependencies_Exception' => $baseDir . '/core/Exception/Unsatisfied_Module_Dependencies_Exception.php',
    'iThemesSecurity\\Exception\\WP_Error' => $baseDir . '/core/Exception/WP_Error.php',
    'iThemesSecurity\\Lib\\Config_Password_Requirement' => $baseDir . '/core/lib/Config_Password_Requirement.php',
    'iThemesSecurity\\Lib\\Legacy_Password_Requirement' => $baseDir . '/core/lib/Legacy_Password_Requirement.php',
    'iThemesSecurity\\Lib\\Lockout\\Context' => $baseDir . '/core/lib/lockout/abstract-context.php',
    'iThemesSecurity\\Lib\\Lockout\\Execute_Lock\\Context' => $baseDir . '/core/lib/lockout/execute-lock/abstract-context.php',
    'iThemesSecurity\\Lib\\Lockout\\Execute_Lock\\Host_Context' => $baseDir . '/core/lib/lockout/execute-lock/class-host-context.php',
    'iThemesSecurity\\Lib\\Lockout\\Execute_Lock\\Source\\Configurable' => $baseDir . '/core/lib/lockout/execute-lock/source/class-configurable.php',
    'iThemesSecurity\\Lib\\Lockout\\Execute_Lock\\Source\\Lockout_Module' => $baseDir . '/core/lib/lockout/execute-lock/source/class-lockout-module.php',
    'iThemesSecurity\\Lib\\Lockout\\Execute_Lock\\Source\\Source' => $baseDir . '/core/lib/lockout/execute-lock/source/interface-source.php',
    'iThemesSecurity\\Lib\\Lockout\\Execute_Lock\\User_Context' => $baseDir . '/core/lib/lockout/execute-lock/class-user-context.php',
    'iThemesSecurity\\Lib\\Lockout\\Execute_Lock\\Username_Context' => $baseDir . '/core/lib/lockout/execute-lock/class-username-context.php',
    'iThemesSecurity\\Lib\\Lockout\\Host_Context' => $baseDir . '/core/lib/lockout/class-host-context.php',
    'iThemesSecurity\\Lib\\Lockout\\Lockout' => $baseDir . '/core/lib/lockout/class-lockout.php',
    'iThemesSecurity\\Lib\\Lockout\\User_Context' => $baseDir . '/core/lib/lockout/class-user-context.php',
    'iThemesSecurity\\Lib\\Lockout\\Username_Context' => $baseDir . '/core/lib/lockout/class-username-context.php',
    'iThemesSecurity\\Lib\\Password_Requirement' => $baseDir . '/core/lib/Password_Requirement.php',
    'iThemesSecurity\\Lib\\REST\\Modules_Controller' => $baseDir . '/core/lib/rest/Modules_Controller.php',
    'iThemesSecurity\\Lib\\REST\\Settings_Controller' => $baseDir . '/core/lib/rest/Settings_Controller.php',
    'iThemesSecurity\\Lib\\REST\\Site_Types_Controller' => $baseDir . '/core/lib/rest/Site_Types_Controller.php',
    'iThemesSecurity\\Lib\\REST\\Tools_Controller' => $baseDir . '/core/lib/rest/Tools_Controller.php',
    'iThemesSecurity\\Lib\\Result' => $baseDir . '/core/lib/Result.php',
    'iThemesSecurity\\Lib\\Site_Types\\Answer_Details' => $baseDir . '/core/lib/site-types/Answer_Details.php',
    'iThemesSecurity\\Lib\\Site_Types\\Answer_Handler' => $baseDir . '/core/lib/site-types/Answer_Handler.php',
    'iThemesSecurity\\Lib\\Site_Types\\Answered_Question' => $baseDir . '/core/lib/site-types/Answered_Question.php',
    'iThemesSecurity\\Lib\\Site_Types\\Controller' => $baseDir . '/core/lib/site-types/Controller.php',
    'iThemesSecurity\\Lib\\Site_Types\\Defaults' => $baseDir . '/core/lib/site-types/Defaults.php',
    'iThemesSecurity\\Lib\\Site_Types\\Has_End_Users' => $baseDir . '/core/lib/site-types/Has_End_Users.php',
    'iThemesSecurity\\Lib\\Site_Types\\Has_Prerequisites' => $baseDir . '/core/lib/site-types/Has_Prerequisites.php',
    'iThemesSecurity\\Lib\\Site_Types\\Question' => $baseDir . '/core/lib/site-types/Question.php',
    'iThemesSecurity\\Lib\\Site_Types\\Question\\Client_Question_Pack' => $baseDir . '/core/lib/site-types/Question/Client_Question_Pack.php',
    'iThemesSecurity\\Lib\\Site_Types\\Question\\End_Users_Question_Pack' => $baseDir . '/core/lib/site-types/Question/End_Users_Question_Pack.php',
    'iThemesSecurity\\Lib\\Site_Types\\Question\\Login_Security_Question_Pack' => $baseDir . '/core/lib/site-types/Question/Login_Security_Question_Pack.php',
    'iThemesSecurity\\Lib\\Site_Types\\Questions_Provider' => $baseDir . '/core/lib/site-types/Questions_Provider.php',
    'iThemesSecurity\\Lib\\Site_Types\\Registry' => $baseDir . '/core/lib/site-types/Registry.php',
    'iThemesSecurity\\Lib\\Site_Types\\Responds' => $baseDir . '/core/lib/site-types/Responds.php',
    'iThemesSecurity\\Lib\\Site_Types\\Site_Type' => $baseDir . '/core/lib/site-types/Site_Type.php',
    'iThemesSecurity\\Lib\\Site_Types\\Templated_Question' => $baseDir . '/core/lib/site-types/Templated_Question.php',
    'iThemesSecurity\\Lib\\Site_Types\\Templating_Site_Type' => $baseDir . '/core/lib/site-types/Templating_Site_Type.php',
    'iThemesSecurity\\Lib\\Site_Types\\Templating_Site_Type_Adapter' => $baseDir . '/core/lib/site-types/Templating_Site_Type_Adapter.php',
    'iThemesSecurity\\Lib\\Site_Types\\Type\\Blog' => $baseDir . '/core/lib/site-types/Type/Blog.php',
    'iThemesSecurity\\Lib\\Site_Types\\Type\\Brochure' => $baseDir . '/core/lib/site-types/Type/Brochure.php',
    'iThemesSecurity\\Lib\\Site_Types\\Type\\Ecommerce' => $baseDir . '/core/lib/site-types/Type/Ecommerce.php',
    'iThemesSecurity\\Lib\\Site_Types\\Type\\Network' => $baseDir . '/core/lib/site-types/Type/Network.php',
    'iThemesSecurity\\Lib\\Site_Types\\Type\\Non_Profit' => $baseDir . '/core/lib/site-types/Type/Non_Profit.php',
    'iThemesSecurity\\Lib\\Site_Types\\Type\\Portfolio' => $baseDir . '/core/lib/site-types/Type/Portfolio.php',
    'iThemesSecurity\\Lib\\Tools\\Config_Tool' => $baseDir . '/core/lib/tools/Config_Tool.php',
    'iThemesSecurity\\Lib\\Tools\\Tool' => $baseDir . '/core/lib/tools/Tool.php',
    'iThemesSecurity\\Lib\\Tools\\Tools_Registry' => $baseDir . '/core/lib/tools/Tools_Registry.php',
    'iThemesSecurity\\Lib\\Tools\\Tools_Runner' => $baseDir . '/core/lib/tools/Tools_Runner.php',
    'iThemesSecurity\\Module_Config' => $baseDir . '/core/lib/Module_Config.php',
    'iThemesSecurity\\Modules\\HIBP\\HIBP_Requirement' => $baseDir . '/core/modules/hibp/HIBP_Requirement.php',
    'iThemesSecurity\\Modules\\Strong_Passwords\\Strength_Requirement' => $baseDir . '/core/modules/strong-passwords/Strength_Requirement.php',
    'iThemesSecurity\\Site_Scanner\\Blacklist' => $baseDir . '/core/modules/site-scanner/Model/Blacklist.php',
    'iThemesSecurity\\Site_Scanner\\Entry' => $baseDir . '/core/modules/site-scanner/Model/Entry.php',
    'iThemesSecurity\\Site_Scanner\\Factory' => $baseDir . '/core/modules/site-scanner/Model/Factory.php',
    'iThemesSecurity\\Site_Scanner\\Fixer' => $baseDir . '/core/modules/site-scanner/Fixer/Fixer.php',
    'iThemesSecurity\\Site_Scanner\\Issue' => $baseDir . '/core/modules/site-scanner/Model/Issue.php',
    'iThemesSecurity\\Site_Scanner\\Issue_Trait' => $baseDir . '/core/modules/site-scanner/Model/Issue_Trait.php',
    'iThemesSecurity\\Site_Scanner\\Malware' => $baseDir . '/core/modules/site-scanner/Model/Malware.php',
    'iThemesSecurity\\Site_Scanner\\Multi_Fixer' => $baseDir . '/core/modules/site-scanner/Fixer/Multi_Fixer.php',
    'iThemesSecurity\\Site_Scanner\\REST\\Issues' => $baseDir . '/core/modules/site-scanner/REST/Issues.php',
    'iThemesSecurity\\Site_Scanner\\REST\\Muted_Issues' => $baseDir . '/core/modules/site-scanner/REST/Muted_Issues.php',
    'iThemesSecurity\\Site_Scanner\\REST\\REST' => $baseDir . '/core/modules/site-scanner/REST/REST.php',
    'iThemesSecurity\\Site_Scanner\\REST\\Scans' => $baseDir . '/core/modules/site-scanner/REST/Scans.php',
    'iThemesSecurity\\Site_Scanner\\Repository\\LatestScanRepository' => $baseDir . '/core/modules/site-scanner/Repository/LatestScanRepository.php',
    'iThemesSecurity\\Site_Scanner\\Repository\\LogRepository' => $baseDir . '/core/modules/site-scanner/Repository/LogRepository.php',
    'iThemesSecurity\\Site_Scanner\\Repository\\Options' => $baseDir . '/core/modules/site-scanner/Repository/Options.php',
    'iThemesSecurity\\Site_Scanner\\Repository\\Repository' => $baseDir . '/core/modules/site-scanner/Repository/Repository.php',
    'iThemesSecurity\\Site_Scanner\\Scan' => $baseDir . '/core/modules/site-scanner/Model/Scan.php',
    'iThemesSecurity\\Site_Scanner\\Status' => $baseDir . '/core/modules/site-scanner/Model/Status.php',
    'iThemesSecurity\\Site_Scanner\\Vulnerability' => $baseDir . '/core/modules/site-scanner/Model/Vulnerability.php',
    'iThemesSecurity\\Site_Scanner\\Vulnerability_Fixer' => $baseDir . '/core/modules/site-scanner/Fixer/Vulnerability_Fixer.php',
    'iThemesSecurity\\TwoFactor\\Application_Passwords_Core' => $baseDir . '/core/modules/two-factor/Application_Passwords_Core.php',
    'iThemesSecurity\\User_Groups\\All_Users' => $baseDir . '/core/modules/user-groups/All_Users.php',
    'iThemesSecurity\\User_Groups\\Default_Matcher' => $baseDir . '/core/modules/user-groups/Match/Default_Matcher.php',
    'iThemesSecurity\\User_Groups\\Everybody_Else' => $baseDir . '/core/modules/user-groups/Everybody_Else.php',
    'iThemesSecurity\\User_Groups\\Match_Target' => $baseDir . '/core/modules/user-groups/Match/Match_Target.php',
    'iThemesSecurity\\User_Groups\\Matchable' => $baseDir . '/core/modules/user-groups/Matchable.php',
    'iThemesSecurity\\User_Groups\\Matchable_Not_Found' => $baseDir . '/core/modules/user-groups/Match/Matchable_Not_Found.php',
    'iThemesSecurity\\User_Groups\\Matchables_Source' => $baseDir . '/core/modules/user-groups/Matchables_Source.php',
    'iThemesSecurity\\User_Groups\\Matcher' => $baseDir . '/core/modules/user-groups/Match/Matcher.php',
    'iThemesSecurity\\User_Groups\\Module\\Module' => $baseDir . '/core/modules/user-groups/Module/Module.php',
    'iThemesSecurity\\User_Groups\\REST\\Matchables' => $baseDir . '/core/modules/user-groups/REST/Matchables.php',
    'iThemesSecurity\\User_Groups\\REST\\REST' => $baseDir . '/core/modules/user-groups/REST/REST.php',
    'iThemesSecurity\\User_Groups\\REST\\Settings' => $baseDir . '/core/modules/user-groups/REST/Settings.php',
    'iThemesSecurity\\User_Groups\\REST\\User_Groups' => $baseDir . '/core/modules/user-groups/REST/User_Groups.php',
    'iThemesSecurity\\User_Groups\\Repository\\DB_Repository' => $baseDir . '/core/modules/user-groups/Repository/DB_Repository.php',
    'iThemesSecurity\\User_Groups\\Repository\\Decorator' => $baseDir . '/core/modules/user-groups/Repository/Decorator.php',
    'iThemesSecurity\\User_Groups\\Repository\\Eager_Loading_Decorator' => $baseDir . '/core/modules/user-groups/Repository/Eager_Loading_Decorator.php',
    'iThemesSecurity\\User_Groups\\Repository\\In_Memory_Repository' => $baseDir . '/core/modules/user-groups/Repository/In_Memory_Repository.php',
    'iThemesSecurity\\User_Groups\\Repository\\Object_Caching_Decorator' => $baseDir . '/core/modules/user-groups/Repository/Object_Caching_Decorator.php',
    'iThemesSecurity\\User_Groups\\Repository\\Repository' => $baseDir . '/core/modules/user-groups/Repository/Repository.php',
    'iThemesSecurity\\User_Groups\\Repository\\User_Group_Not_Found' => $baseDir . '/core/modules/user-groups/Repository/User_Group_Not_Found.php',
    'iThemesSecurity\\User_Groups\\Settings_Proxy' => $baseDir . '/core/modules/user-groups/Settings/Settings_Proxy.php',
    'iThemesSecurity\\User_Groups\\Settings_Registration' => $baseDir . '/core/modules/user-groups/Settings/Settings_Registration.php',
    'iThemesSecurity\\User_Groups\\Settings_Registry' => $baseDir . '/core/modules/user-groups/Settings/Settings_Registry.php',
    'iThemesSecurity\\User_Groups\\Upgrader' => $baseDir . '/core/modules/user-groups/Upgrader.php',
    'iThemesSecurity\\User_Groups\\User_Group' => $baseDir . '/core/modules/user-groups/User_Group.php',
);
