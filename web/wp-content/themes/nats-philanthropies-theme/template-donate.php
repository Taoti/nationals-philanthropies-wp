<?php
/* Template Name: Donate Template */
use Modules\Hero;
use Modules\PostGrid;
use Modules\GridCard;


### Critical CSS for the default page template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/template-donation-critical.min.css' );


get_header();

the_post();
?>

<?php
$args = [
  'heading_line_1' => 'Ways to',
  'heading_line_2' => 'Give',
  // 'background_image_url' => '', // get featured image
];
$hero = new Hero($args);
$hero->render();
?>

<div class="content">
	<div class="content-inner">

		<?php the_page_builder(); ?>

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
				'classes' => [ 'postGridItem', 'postGridItem-donate'],
			];
			$new_card = new GridCard($card_args);
			$grid_cards[] = $new_card->compile();

		}

		$args = [
			'grid_items' => $grid_cards,
			'classes' => [
				'l-module',
				'postGrid',
				'postGrid-donate',
			],
		];
		$postGrid = new PostGrid($args);
		$postGrid->render();
		?>

	</div><!-- END .content-inner -->
</div><!-- END .content -->



<?php
get_footer();
