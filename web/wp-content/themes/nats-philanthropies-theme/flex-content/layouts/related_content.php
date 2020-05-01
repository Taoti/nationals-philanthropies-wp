<?php
use Modules\PostCard;
use Modules\CardColumns;

$heading = get_sub_field('heading');
$related_terms = get_sub_field('related_terms');

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

// echo "<pre>"; var_dump($related_query->have_posts()); echo "</pre>";

if( $related_query->have_posts() ){
	foreach( $related_query->posts as $related_post ){
		$new_postCard = new PostCard( ['post_object' => $related_post] );
		$postCards[] = $new_postCard->compile();
	}
}

$args = array(
	'heading' => $heading,
	'columns' => $postCards,
	'classes' => [
		'l-module',
		'l-has-no-background',
		'cardColumns',
		'cardColumns-relatedContent',
	],
);
$cardColumns = new CardColumns($args);
$cardColumns->render();
