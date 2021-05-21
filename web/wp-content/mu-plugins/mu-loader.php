<?php
/*
  Plugin Name: Taoti Core
  Description: Adds necessary plugins like ACF and Timber.
  Version: 1.1
  Author: James Pfleiderer
  Author URI: https://www.taoti.com/
*/

$plugin_files_to_load = [
	WPMU_PLUGIN_DIR.'/disable-emojis/disable-emojis.php',
	WPMU_PLUGIN_DIR.'/jp/jp.php',
	WPMU_PLUGIN_DIR.'/advanced-custom-fields-pro/acf.php',
	WPMU_PLUGIN_DIR.'/acf-better-search/acf-better-search.php',
	WPMU_PLUGIN_DIR.'/timber-library/timber.php',
	WPMU_PLUGIN_DIR.'/pantheon-advanced-page-cache/pantheon-advanced-page-cache.php',
	WPMU_PLUGIN_DIR.'/safe-svg/safe-svg.php',
	WPMU_PLUGIN_DIR.'/taoti-prevent-acf-field-sync/taoti-prevent-acf-field-sync.php',
    WPMU_PLUGIN_DIR.'/wordpress-seo/wp-seo.php',
];

foreach( $plugin_files_to_load as $file_path ){
	if( file_exists($file_path) ){
		require $file_path;
	}
}
