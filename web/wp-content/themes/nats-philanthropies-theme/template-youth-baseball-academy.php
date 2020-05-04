<?php
// Template Name: Youth Baseball Academy Template

use Modules\Hero;



### Critical CSS for the default page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/page-critical.min.css' );


get_header();

the_post();
?>


<?php
$args = [
  'heading_line_1' => get_field( 'youth_baseball_academy_hero_primary_heading_line_1' ),
  'heading_line_2' => get_field( 'youth_baseball_academy_hero_primary_heading_line_2' ),
  'description' => get_field( 'youth_baseball_academy_hero_description' ),
  'button_label' => get_field( 'youth_baseball_academy_hero_button_label' ),
  'button_link' => get_field( 'youth_baseball_academy_hero_button_url' ),
];
$hero = new Hero($args);
$hero->render();
?>

<div class="l-content content-youthBaseball">
	<div class="l-content-inner">

		<?php the_page_builder(); ?>

	</div><!-- END .l-content-inner -->
</div><!-- END .l-content -->



<?php
get_footer();
