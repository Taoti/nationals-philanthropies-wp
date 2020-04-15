<?php
use Modules\PostGrid;
use Modules\GridCard;
use Modules\FormCard;

// Will hold the data for each item in the grid, like heading, description, icon, etc.
$grid_items = [];

// Will hold the HTML compiled from a "card" module, like gridCard or postCard. Data from the $grid_items array is used to pass arguments to card modules.
$grid_cards = [];

$big_link_group = get_sub_field('big_link');
if( $big_link_group['heading'] && $big_link_group['link_to'] ){
	$new_grid_item = [
		'heading' => $big_link_group['heading'],
		'description' => $big_link_group['excerpt'],
		'link_to' => $big_link_group['link_to'],
		'image_or_icon' => $big_link_group['image_or_icon'],
		'background_image' => $big_link_group['background_image'],
		'icon' => $big_link_group['icon']['icon_selector'],
	];

	$grid_items[] = $new_grid_item;

}

$other_links_group = get_sub_field('other_links');
if( !empty($other_links_group) ){
	foreach( $other_links_group as $other_link ){

		if( $other_link['heading'] && $other_link['link_to'] ){
			$new_grid_item = [
				'heading' => $other_link['heading'],
				'description' => $other_link['excerpt'],
				'link_to' => $other_link['link_to'],
				'image_or_icon' => $other_link['image_or_icon'],
				'background_image' => $other_link['background_image'],
				'icon' => $other_link['icon']['icon_selector'],
			];

			$grid_items[] = $new_grid_item;

		}

	}
}


// Create a GridCard for each grid item, store the compiled HTML in the cards array. The array of compiled HTML cards $grid_cards is what is fed to the postGrid module.
foreach( $grid_items as $grid_item ){

	$card_args = [
		'image_or_icon' => $grid_item['image_or_icon'],
		'image' => $grid_item['background_image'],
		'icon' => $grid_item['icon'],
		'title' => $grid_item['heading'],
		'permalink' => $grid_item['link_to'],
		'excerpt' => $grid_item['description'],
		'classes' => ['postGridItem-home'],
	];
	$new_card = new GridCard($card_args);
	$grid_cards[] = $new_card->compile();

}


// The signup form goes in the last grid slot, so it's the last thing appended to the $grid_cards array. It is created via FormCard instead GridCard.
$signup_form_group = get_sub_field('signup_form');
// echo "<pre>"; print_r($signup_form_group); echo "</pre>";
if( $signup_form_group['heading'] && $signup_form_group['form'] ){
	$form_card_args = [
		'heading' => $signup_form_group['heading'],
		'background_image' => $signup_form_group['background_image'],
		'form' => do_shortcode( $signup_form_group['form'] ),
		'classes' => ['postGridItem-home'],
	];

	$form_card = new FormCard($form_card_args);
	$grid_cards[] = $form_card->compile();

}

// echo "<pre>"; print_r($grid_cards); echo "</pre>";

$args = [
	'grid_items' => $grid_cards,
	'primary_heading_line_1' => get_sub_field('primary_heading_line_1'),
	'primary_heading_line_2' => get_sub_field('primary_heading_line_2'),
	'description' => get_sub_field('description'),
	'button_label' => get_sub_field('button_label'),
	'button_url' => get_sub_field('button_url'),
	'classes' => [
		'l-module',
		'postGrid',
		'postGrid-home',
	],
];
$post_grid = new PostGrid($args);
$post_grid->render();
