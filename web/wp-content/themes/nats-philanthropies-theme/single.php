<?php
use Modules\Hero;


### Critical CSS for the default single template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/single-critical.min.css' );


get_header();

the_post();
?>


<?php
$args = [
	'description' => get_the_excerpt(),
];
$hero = new Hero($args);
$hero->render();
?>



<div class="l-content content-single">
	<div class="l-content-inner">

		<?php the_page_builder(); ?>

	</div><!-- END .l-content-inner -->
</div><!-- END .l-content -->



<?php
get_footer();
