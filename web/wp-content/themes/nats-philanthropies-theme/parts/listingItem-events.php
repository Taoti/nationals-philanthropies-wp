<?php
// This file should be included within a query loop.
use Modules\ListingItem;
use JP\Get;

$subtitle = '';
if( get_field('sponsor_name') ){
	$subtitle = 'Sponsored Event';
}

$listingItem_args = [
	'primary_heading' => get_the_title(),
	'subtitle' => $subtitle,
	'excerpt' => get_the_excerpt(),
	'permalink' => get_permalink(),
	'primary_button_url' => get_field('rsvp_url'),
	'primary_button_label' => 'RSVP',
	'secondary_button_url' => get_field('sponsor_url'),
	'secondary_button_label' => get_field('sponsor_name'),
	'image_array' => Get::featured_image_array(get_the_id()),
];
$listingItem = new ListingItem( $listingItem_args );
$listingItem->render();
