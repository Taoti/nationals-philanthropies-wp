<?php
use Modules\ImageWithTextBlock;

$args = array(
    'image' => get_sub_field('image'),
    'content' => get_sub_field('text'),
);
$imageWithTextBlock = new ImageWithTextBlock($args);
$imageWithTextBlock->render();
