<?php
use Modules\Hero;


### Critical CSS for the default page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/page-critical.min.css' );


get_header();

the_post();
?>

<?php
$args = [
  'heading_line_1' => get_the_title(),
	'heading_line_2' => '',
	'background_image_url' => '', // get featured image
];
$hero = new Hero($args);
$hero->render();
?>

<div class="content">
	<div class="l-container content-inner">

		<?php the_page_builder(); ?>

	</div><!-- END .content-inner -->
</div><!-- END .content -->



<?php
get_footer();
