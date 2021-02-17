<?php
use Modules\Table;
/*
 * NOTE
 * To use this layout you must enable the "Advanced
 * Custom Fields Table" plugin, then create the layout
 * in the page builder field group. It only needs one
 * field of type `table` and just name the
 * layout/field "table".
 */

$args = array(
    'table' => get_sub_field('table'),
);

$table = new Table($args);
$table->render();
