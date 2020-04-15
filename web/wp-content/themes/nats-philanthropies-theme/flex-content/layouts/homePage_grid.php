<?php
use Modules\PostGrid;
use Modules\GridCard;

$grid_items = [];

$big_link_group = get_sub_field('big_link');
// echo "<pre>"; print_r($big_link_group); echo "</pre>";
// heading
// description
// image_or_icon
// background_image
// icon
// link_to
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
// echo "<pre>"; print_r($other_links_group); echo "</pre>";
// repeater, but same fields
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

$signup_form_group = get_sub_field('signup_form');
// echo "<pre>"; print_r($signup_form_group); echo "</pre>";
// heading
// background_image
// form (shortcode)

// echo "<pre>"; print_r($grid_items); echo "</pre>";

$grid_cards = [];
foreach( $grid_items as $grid_item ){

	$card_args = [
		'image_or_icon' => $grid_item['image_or_icon'],
		'image' => $grid_item['background_image'],
		'icon' => $grid_item['icon'],
		'title' => $grid_item['heading'],
		'permalink' => $grid_item['link_to'],
		'excerpt' => $grid_item['description'],
	];
	$new_card = new GridCard($card_args);
	$grid_cards[] = $new_card->compile();

}

// echo "<pre>"; print_r($grid_cards); echo "</pre>";

$args = array(
	'grid_items' => $grid_cards,
	'primary_heading_line_1' => get_sub_field('primary_heading_line_1'),
	'primary_heading_line_2' => get_sub_field('primary_heading_line_2'),
	'description' => get_sub_field('description'),
	'button_label' => get_sub_field('button_label'),
	'button_url' =>get_sub_field('button_url'),
);
$post_grid = new PostGrid($args);
// $post_grid->render();
