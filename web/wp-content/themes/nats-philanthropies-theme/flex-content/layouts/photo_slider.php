<?php
use Modules\PhotoSlider;

$args = array(
    'slider_type' => get_sub_field('slider_type'),
    'images' => get_sub_field('images'),
);
$imageWithTextBlock = new PhotoSlider($args);
$imageWithTextBlock->render();
