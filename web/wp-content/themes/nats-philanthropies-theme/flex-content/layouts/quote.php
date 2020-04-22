<?php
use Modules\Quote;

$args = array(
	'image' => get_sub_field('image'),
	'quoted_text' => get_sub_field('quoted_text'),
	'attribution_name' => get_sub_field('attribution_name'),
	'attribution_description' => get_sub_field('attribution_description'),
	'overlay_color' => get_sub_field('overlay_color'),
);
$quote = new Quote($args);
$quote->render();
