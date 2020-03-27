<?php
use Modules\CTA;

$args = array(
	'heading' => get_sub_field('heading'),
	'description' => get_sub_field('description'),
);
$cta = new CTA($args);
$cta->render();
