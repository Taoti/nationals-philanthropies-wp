<?php
// This file should be included within a query loop.
use Modules\ListingItem;
use JP\Get;

$subtitle = '';
$newsTypes = wp_get_post_terms( get_the_id(), $taxonomy = 'type', array('fields' => 'names') );
if( $newsTypes && !empty($newsTypes) ){
	$subtitle = implode(', ', $newsTypes);
}

// Featured Listing Item
$listingItem_args = [
	'primary_heading' => get_the_title(),
	'subtitle' => $subtitle,
	'excerpt' => get_the_excerpt(),
	'permalink' => get_permalink(),
	'primary_button_url' => get_permalink(),
	'primary_button_label' => 'Read More',
	'image_array' => Get::featured_image_array(get_the_id()),
];
$listingItem = new ListingItem( $listingItem_args );
$listingItem->render();
