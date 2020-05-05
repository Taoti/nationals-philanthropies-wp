<?php
// Template Name: Youth Baseball Academy Template
use Modules\Hero;
use Modules\GridCard;
use Modules\PostGrid;



### Critical CSS for the default page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/template-youth-baseball-academy-critical.min.css' );


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
// Create a GridCard for each grid item, store the compiled HTML in the cards array. The array of compiled HTML cards $grid_cards is what is fed to the postGrid module.

$grid_items = get_field( 'card_grid' );
$grid_cards = [];

foreach( $grid_items as $grid_item ){

	$card_args = [
		'image_or_icon' => $grid_item['image_or_icon'],
		'image' => $grid_item['background_image'],
		'icon' => $grid_item['icon']['icon_selector'],
		'title' => $grid_item['heading'],
		'permalink' => $grid_item['link_to'],
		'excerpt' => $grid_item['excerpt'],
		'classes' => [ 'postGridItem', 'postGridItem-youthBaseball'],
	];
	$new_card = new GridCard($card_args);
	$grid_cards[] = $new_card->compile();

}

$args = [
	'grid_items' => $grid_cards,
	'classes' => [
		'l-module',
		'postGrid',
		'postGrid-youthBaseball',
	],
];
$postGrid = new PostGrid($args);
$postGrid->render();
?>



<?php
get_footer();
