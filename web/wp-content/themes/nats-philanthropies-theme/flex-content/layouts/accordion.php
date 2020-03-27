<?php
use Modules\Accordion;

$args = array(
	'accordion_items' => get_sub_field('accordion_items'),
);
$accordion = new Accordion($args);
$accordion->render();
