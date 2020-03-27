<?php
use Modules\TextBlock;

$args = array(
	'content' => get_sub_field('content'),
);
$textBlock = new TextBlock($args);
$textBlock->render();
