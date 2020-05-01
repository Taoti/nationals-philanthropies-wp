<?php
use Modules\Hero;


### Critical CSS for the default page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/page-critical.min.css' );


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

<div class="content content-page">
	<div class="content-inner">

		<?php the_page_builder(); ?>

	</div><!-- END .content-inner -->
</div><!-- END .content -->



<?php
get_footer();
