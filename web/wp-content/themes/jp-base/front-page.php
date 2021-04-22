<?php
// use Modules\CTA;


### Critical CSS for the front page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/front-page-critical.min.css' );


get_header();
?>



<?php
/*
 * NOTE
 * You will most likely need to change the classes
 * used for this home page container.
 */
?>
<div class="content">
	<div class="content-inner">

	</div><!-- END .content-inner -->
</div><!-- END .content -->



<?php
get_footer();
