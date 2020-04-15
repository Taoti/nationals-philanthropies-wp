<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = [
	// 	'primary_heading' => get_field('primary_heading'),
	// 	'description' => get_field('description'),
	// 	'button_url' => get_field('button_url'),
	// 	'button_label' => get_field('button_label'),
	// ];
	// $new_module = new PostCard($args);
	// $new_module->render();

class PostCard {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'post_object' => false,
			'title' => '',
			'permalink' => '',
			'excerpt' => '',
			'subheading_items' => [],
			'tags' => [],
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));


		if( !in_array( 'postCard', $classes ) ){
			$classes[] = 'postCard';
		}


		if( is_a($post_object, 'WP_Post') ){

			$title = get_the_title( $post_object );
			$permalink = get_permalink( $post_object );
			$excerpt = get_the_excerpt( $post_object );

			$primary_type = taoti_get_primary_term( $post_object->ID, 'type' );
			if( is_a($primary_type, 'WP_Term') ){
				$subheading_items[] = $primary_type->name;
			}

			$subheading_items[] = get_the_date( null, $post_object );

			// Get post tags into the array

		}

		$this->context = Timber::get_context();
		$this->context['title'] = $title;
		$this->context['permalink'] = $permalink;
		$this->context['excerpt'] = $excerpt;
		$this->context['subheading_items'] = $subheading_items;
		$this->context['tags'] = $tags;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('postCard.twig', $this->context);
	}

}
