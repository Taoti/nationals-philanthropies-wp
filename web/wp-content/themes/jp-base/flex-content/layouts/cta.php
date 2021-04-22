<?php
use Modules\CTA;

$args = array(
	'heading' => get_sub_field('heading'),
	'description' => get_sub_field('description'),
	'button_link' => get_sub_field('button_link'),
);
$cta = new CTA($args);
$cta->render();
