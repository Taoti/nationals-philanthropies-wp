<?php
### Enqueue styles and scripts.
### The theme CSS is loaded in the <head> via the 'taoti_do_css' action, so critical and noncritical CSS can be loaded seperately. The standard enqueue functions don't support this sort of thing yet.



/*
 * PURPOSE : Dequeue jQuery, load the theme's main JS file, localize common things like the AJAX URL.
 * NOTES	 : All scripts should load at the end of the page, use TRUE for the 5th parameter of wp_register_script().
 */
function taoti_scripts(){
	if( !is_admin() ){

		// Deregister WordPress jQuery and register Google's, only if you need jQuery.
		if( !is_customize_preview() ){
			wp_deregister_script('jquery');
		}
		// wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1', true);

		// Main Scripts (this file is concatenated from the files inside of js/development/ )
		wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.min.js', array(), filemtime( get_template_directory().'/js/scripts.min.js' ), true);

		// wp_localize_script( 'scripts', 'taoti_js', array(
		// 	'ajax_url' => admin_url('admin-ajax.php'),
		// 	'path' => get_template_directory_uri().'/js',
		// ) );

	}
}
add_action( 'wp_enqueue_scripts', 'taoti_scripts' );





/*
 * PURPOSE : Main stylsheet loaded as Non-Critical CSS.
 *   NOTES : Instructions on loading the non-critical CSS asyncronously - https://github.com/filamentgroup/loadCSS
 */
function taoti_styles(){

  // Set up the URL to the non-critical CSS file with a version number for cache-busting.
  $css_filemtime = filemtime( get_template_directory().'/styles/css/style-noncritical.min.css' );
  $css_version = '?v='.$css_filemtime;
  $css_href = get_template_directory_uri().'/styles/css/style-noncritical.min.css'.$css_version;
  ?>
  <link rel="preload" href="<?php echo $css_href; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="<?php echo $css_href; ?>"></noscript>
	<?php

}
add_action('taoti_do_css', 'taoti_styles');






/*
 * PURPOSE : Admin area enqueues
 */
function taoti_admin_theme_style(){
	// CSS for admin
    wp_enqueue_style('admin-theme', get_template_directory_uri().'/styles/css/style-admin.min.css', array(), filemtime( get_template_directory().'/styles/css/style-admin.min.css' ) );
}
// add_action('admin_enqueue_scripts', 'taoti_admin_theme_style');

/*
 * PURPOSE : Login screen enqueues
 */
function taoti_login_stylesheet(){
	// CSS for login screen
	wp_enqueue_style('login-theme', get_template_directory_uri().'/styles/css/style-login.min.css', array(), filemtime( get_template_directory().'/styles/css/style-login.min.css' ) );
}
// add_action( 'login_enqueue_scripts', 'taoti_login_stylesheet' );

/*
 * PURPOSE : Post content editor (TinyMCE) enqueues (load a CSS file to use for the editor in the iframe)
 */
function taoti_tinymce_style(){
	// CSS for admin
    add_editor_style( get_template_directory_uri().'/styles/css/style-tinymce.min.css', array(), filemtime( get_template_directory().'/styles/css/style-tinymce.min.css' ) );
}
// add_action('admin_init', 'taoti_tinymce_style');
