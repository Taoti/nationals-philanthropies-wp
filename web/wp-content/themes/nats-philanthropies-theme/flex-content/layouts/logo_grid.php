<?php
use Modules\LogoGrid;

$args = array(
	'primary_heading' => get_sub_field('primary_heading'),
	'primary_description' => get_sub_field('primary_description'),
	'grids' => get_sub_field('grids'),
);
$logoGrid = new LogoGrid($args);
$logoGrid->render();
