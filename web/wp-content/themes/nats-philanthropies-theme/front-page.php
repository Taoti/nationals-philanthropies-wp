<?php
use Modules\SectionNavigation;
use Modules\Hero;
use Modules\ContentGroup;
use JP\Get;

$temporary_page_enabled = ( get_field( 'temporary_landing_page_is_enabled', 'option' ) );

if( $temporary_page_enabled ):
  get_template_part( 'template-temporary-front-page' );

else :


### Critical CSS for the front page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/front-page-critical.min.css' );


get_header();
?>

<?php
$args = [
	'array_of_sections' => get_field('modules_homePage'),
];
$section_navigation = new SectionNavigation($args);
$section_navigation->render();
?>

<?php
$args = [
  'heading_line_1' => get_field( 'home_hero_primary_heading_line_1' ),
  'heading_line_2' => get_field( 'home_hero_primary_heading_line_2' ),
  'description' => get_field( 'home_hero_description' ),
  'button_label' => get_field( 'home_hero_button_label' ),
  'button_link' => get_field( 'home_hero_button_url' ),
];
$hero = new Hero($args);
$hero->render();
?>

<?php the_page_builder( 'modules_homePage' ); ?>


<?php
get_footer();

endif;
