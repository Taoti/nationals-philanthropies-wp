<?php
use Modules\Stats;

$args = [
	'stats' => get_sub_field('statistic_columns'),
];
$stats = new Stats($args);
$stats->render();
