<?php
use Modules\PostGrid;

$grid_items = [];

$big_link_group = get_sub_field('big_link');
// heading
// description
// image_or_icon
// background_image
// icon
// link_to

$other_links_group = get_sub_field('other_links');
// repeater, but same fields

$signup_form_group = get_sub_field('signup_form');
// heading
// background_image
// form (shortcode)


$args = array(
	'heading' => get_sub_field('heading'),
	'description' => get_sub_field('description'),
);
$post_grid = new PostGrid($args);
$post_grid->render();
