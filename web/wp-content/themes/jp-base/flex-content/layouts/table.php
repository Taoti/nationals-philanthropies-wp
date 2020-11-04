<?php
use Modules\Table;

$args = array(
    'table' => get_sub_field('table'),
);

$table = new Table($args);
$table->render();
