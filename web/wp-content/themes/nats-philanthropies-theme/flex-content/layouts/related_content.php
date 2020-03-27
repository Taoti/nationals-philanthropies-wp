<?php
use Modules\PostCard;
use Modules\PostColumns;

$heading = get_sub_field('heading');
$related_terms = get_sub_field('related_terms');

// echo "<pre>"; print_r($related_terms); echo "</pre>";

$related_args = [
	'post_type' => 'post',
	'posts_per_page' => 4,
	'orderby' => 'rand',
];

if( is_array($related_terms) && !empty($related_terms) ){
	$related_args['tax_query'] = [
		[
			'taxonomy' =>'topic',
			'field' => 'term_id',
			'terms' => $related_terms,
		]
	];
}

$related_query = new WP_Query( $related_args );
$postCards = [];

if( $related_query->have_posts() ){
	foreach( $related_query->posts as $related_post ){
		$postCards[] = new PostCard( ['post_object' => $related_post] );
	}
}

$args = array(
	'heading' => $heading,
	'columns' => $postCards,
	'classes' => [
		'l-module',
		'postColumns',
		'postColumns-people',
	],
);
$postColumns = new PostColumns($args);
$postColumns->render();
