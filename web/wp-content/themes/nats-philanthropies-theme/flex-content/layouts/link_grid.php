<?php
use Modules\PostGrid;
use Modules\GridCard;

// Will hold the HTML compiled from a "card" module, like gridCard or postCard. Data from the $grid_items array is used to pass arguments to card modules.
$grid_cards = [];


$links = get_sub_field('links');
// echo '<pre>'; print_r($links); echo '</pre>';

if( is_array($links) && !empty($links) ){
	foreach( $links as $other_link ){

		if( $other_link['heading'] && $other_link['link_to'] ){

			$card_args = [
				'image_or_icon' => $other_link['image_or_icon'],
				'image' => $other_link['background_image'],
				'icon' => $other_link['icon']['icon_selector'],
				'title' => $other_link['heading'],
				'permalink' => $other_link['link_to'],
				'excerpt' => $other_link['excerpt'],
				'classes' => ['postGridItem'],
			];
			$new_card = new GridCard($card_args);
			$grid_cards[] = $new_card->compile();

		}

	}
}

// echo "<pre>"; print_r($grid_cards); echo "</pre>";
if( !empty($grid_cards) ):
	$args = [
		'grid_items' => $grid_cards,
		'primary_heading_line_1' => '',
		'primary_heading_line_2' => '',
		'description' => '',
		'button_label' => '',
		'button_url' => '',
		'classes' => [
			'l-module',
			'l-has-no-background',
			'postGrid',
			'postGrid-standard',
		],
	];
	$post_grid = new PostGrid($args);
	$post_grid->render();

endif;
