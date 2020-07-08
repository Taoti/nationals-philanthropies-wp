*** Guide for Organizing SCSS Files

There are two main SCSS files:
- styles/style-critical.scss
- styles/style-noncritical.scss

These will compile down to the two main CSS files:
- styles/css/style-critical.min.css
- styles/css/style-noncritical.min.css

Think of the two main SCSS files like long @import lists. There shouldn't be any styles written in them, they just import other files. The styles are written in those other files.



*** Noncritical SCSS

Noncritical SCSS files should be placed in the `styles/scss/` folder, this is where most SCSS files will end up on any given project. The scss files should have a "_" (underscore) at the front of the name to indicate they are @imported. All noncritical styles are compiled down to the one minified file and lazyloaded on every page. The idea is to put all the "below the fold" styles in the noncritical file since they are for things that won't be immediately visible on page load. Plus the browser will cache the file after it's loaded once.

NOTE - Since there is only the one main noncritical CSS file, all noncritical styles are considered "global" styles.



*** Critical SCSS (global)

The main critical SCSS file should import all the global critical styles, which are placed in the `styles/scss/critical/` folder. The scss files should have a "_" (underscore) at the front of the name to indicate they are @imported. These are the styles that are guaranteed to be visbile at the top of any page. Typically this is the header, navigation, and hero at the very least.

NOTE - This also includes the base, layout, and reset styles by default but you can include more.

The compiled critical CSS file is dumped into a <style> tag in the <head> so the style are available before the <body>.
*** IMPORTANT For this reason, the global critical styles should be kept as minimal as possible. ***

* Critical SCSS (template-specific)

To help keep the global critical CSS small, you can add critical CSS on a per-template basis. If you have CSS that needs to be critical, and it only appears on the news archive for example, it would be a waste to load it as global critical CSS. In this example, you can add a file called "styles/scss/critical/singles/archive-news-critical.scss" (or whatever your template file is). Just do NOT include the "_" underscore and DO add "-critical" to the end of the name.

Note that since these scss files are individual (they are not @imported elsewhere), you will need to include stuff like the config and mixins files from the location of the critical scss file, so you will need a couple "../" in your path like:
	@import '../../inc/config';
	@import '../../inc/mixins';

These files will compile into individual minified CSS files in `styles/css/critical/`. On any template, before the get_header() call, add the following:

	taoti_enqueue_critical_css( $css_src_filepath );

	* Example:
	taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/front-page-critical.min.css' );

	NOTE - You can also supply an array of CSS files.



*** The Includes Folder (where to define variables and mixins)

The `styles/scss/inc/` folder contains files that need to be included in other files. By default this folder contains the very important config and mixins files. You can add more as needed.

*IMPORTANT* the `inc` scss files only define stuff like variables and mixins. They should never contain any styles that could be output when @imported. Because these scss files are meant to be included like libraries that provide shared variables/mixins/etc between critical and noncritical files.



*** Admin CSS (optional)

There are three main hooks where WordPress will load custom CSS files on the Dashboard - login, TinyMCE, and general Dashboard. For each of these there is a corresponding scss file in `styles/scss/admin/`. You can add custom login styles, or add styles to ACF fields.

These files are compiled to minified css files in `styles/css/`, and get loaded in `inc/enqueue.php`. NOTE - you need to uncomment the `add_action` lines in enqueue.php to enable the admin css files.
