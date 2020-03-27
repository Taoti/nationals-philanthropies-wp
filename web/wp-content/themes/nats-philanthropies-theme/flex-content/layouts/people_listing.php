<?php
use Modules\PeopleCard;
use Modules\PostColumns;

$people_listing = get_sub_field('people_listing');
$people_cards = [];

if( is_array($people_listing) && !empty($people_listing) ){
	foreach( $people_listing as $row ){
		if( isset($row['people_post']) && is_a( $row['people_post'], 'WP_Post') ){
			$people_post = $row['people_post'];

			$people_cards[] = new PeopleCard( ['post_object' => $people_post] );

		}
	}
}

$args = array(
	'columns' => $people_cards,
	'classes' => [
		'l-module',
		'postColumns',
		'postColumns-people',
	],
);
$postColumns = new PostColumns($args);
$postColumns->render();
