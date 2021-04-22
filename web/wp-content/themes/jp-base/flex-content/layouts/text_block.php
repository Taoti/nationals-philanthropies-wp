<?php
use Modules\TextBlock;

$args = [
	'content' => get_sub_field('content'),
];
$textBlock = new TextBlock($args);
$textBlock->render();
