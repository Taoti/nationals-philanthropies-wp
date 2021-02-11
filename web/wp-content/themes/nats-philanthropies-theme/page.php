<?php
use Modules\Hero;


### Critical CSS for the default page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/page-critical.min.css' );


get_header();

the_post();

$args = [
	'description' => get_the_excerpt(),
];

// Check for the heading overrides. Line 1 should always be added to $args if it's available, since they might want to put the title all on the one line.
$heading_line_1 = get_field('hero_primary_heading_line_1');
$heading_line_2 = get_field('hero_primary_heading_line_2');
if( $heading_line_1 ){
	$args['heading_line_1'] = $heading_line_1;
}
// However line 2 should only be added if line 1 is also present.
if( $heading_line_2 && $heading_line_1 ){
	$args['heading_line_2'] = $heading_line_2;
}

$hero = new Hero($args);
$hero->render();
?>

<div class="l-content content-page">
	<div class="l-content-inner">

		<?php the_page_builder(); ?>

	</div><!-- END .l-content-inner -->
</div><!-- END .l-content -->



<?php
get_footer();
