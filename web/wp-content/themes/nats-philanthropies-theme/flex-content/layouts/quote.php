<?php
use Modules\Quote;

$args = array(
	'quoted_text' => get_sub_field('quoted_text'),
	'attribution_name' => get_sub_field('attribution_name'),
	'attribution_description' => get_sub_field('attribution_description'),
	'image' => get_sub_field('image'),
);
$quote = new Quote($args);
$quote->render();
