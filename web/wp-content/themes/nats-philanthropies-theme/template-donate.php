<?php
/* Template Name: Donate Template */
use Modules\Hero;
use Modules\ContentGroup;
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

<div class="content content-donate">
	<div class="content-inner">

		<?php if( get_field('donateCTA_primary_heading_line_1') ): ?>
		<section class="l-module donateCTA">
			<div class="donateCTA-inner">

					<div class="donateCTA-contentGroup">
						<?php
						// ContentGroup
						$args = [
						'primary_heading' => get_field('donateCTA_primary_heading_line_1'),
						'secondary_heading' => get_field('donateCTA_primary_heading_line_2'),
						'description' => get_field('donateCTA_description'),
						'cta_link' => get_field('donateCTA_button_url'),
						'cta_label' => get_field('donateCTA_button_label'),
						];
						$contentGroup = new ContentGroup($args);
						$contentGroup->render();
						?>
					</div>

					<div class="donateCTA-imageContainer">
						<img class="donateCTA-image lazyload" data-src="<?php echo get_stylesheet_directory_uri().'/images/donate-form-example.png'; ?>" width="994" height="758" alt="Example donation form.">
					</div>

			</div>
		</section>
		<?php endif; ?>

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
