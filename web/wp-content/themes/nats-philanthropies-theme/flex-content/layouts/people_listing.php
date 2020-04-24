<?php
use Modules\PeopleCard;
use Modules\CardColumns;

$primary_heading = get_sub_field('heading');
$people_listing = get_sub_field('people_listing');

$people_cards = [];

if( is_array($people_listing) && !empty($people_listing) ){
	foreach( $people_listing as $row ){
		if( isset($row['people_post']) && is_a( $row['people_post'], 'WP_Post') ){
			$people_post = $row['people_post'];

			$new_people_card = new PeopleCard( ['post_object' => $people_post] );
			$people_cards[] = $new_people_card->compile();

		}
	}
}

$args = array(
	'primary_heading' => $primary_heading,
	'columns' => $people_cards,
	'classes' => [
		'l-module',
		'cardColumns',
		'cardColumns-people',
	],
);
$cardColumns = new CardColumns($args);
$cardColumns->render();
