<?php
use Modules\ListingItem;
use JP\Get;

$selected_event = get_sub_field('selected_event');

if( is_a( $selected_event, 'WP_Post') ){

	$listingItem_args = [
		'primary_heading' => get_the_title( $selected_event ),
		'subtitle' => get_sub_field( 'subtitle' ),
		'excerpt' => get_the_excerpt( $selected_event ),
		'permalink' => false,
		'primary_button_url' => get_field( 'rsvp_url', $selected_event->ID ),
		'primary_button_label' => 'RSVP',
		'secondary_button_url' => get_field( 'sponsor_url', $selected_event->ID ),
		'secondary_button_label' => get_field( 'sponsor_name', $selected_event->ID ),
		'image_array' => Get::featured_image_array( $selected_event->ID ),
		'classes' => [
			'l-module',
			'featuredEvent',
		],
	];
	$listingItem = new ListingItem( $listingItem_args );
	$listingItem->render();

}
