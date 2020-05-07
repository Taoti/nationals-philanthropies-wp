<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = ['post_object' => $related_post];
	// $new_postCard = new PostCard( $args );
	// $postCards[] = $new_postCard->compile();

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
			'topics' => [],
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));


		if( !in_array( 'postCard', $classes ) ){
			$classes[] = 'postCard';
		}


		if( is_a($post_object, 'WP_Post') ){

			$title = get_the_title( $post_object );
			$permalink = get_permalink( $post_object );
			$excerpt = wp_trim_words( get_the_excerpt( $post_object ), 15 );

			$primary_type = taoti_get_primary_term( $post_object->ID, 'type' );
			if( is_a($primary_type, 'WP_Term') ){
				$subheading_items[] = $primary_type->name;
			}

			$subheading_items[] = get_the_date( null, $post_object );

			$subheading = implode( '<span class="postCard-seperator">|</span>', $subheading_items );

			// Get post topics into the array
			$topics = wp_get_post_terms( $post_object->ID, 'topic' );

		}

		$this->context = Timber::get_context();
		$this->context['title'] = $title;
		$this->context['permalink'] = $permalink;
		$this->context['excerpt'] = $excerpt;
		$this->context['subheading'] = $subheading;
		$this->context['subheading_items'] = $subheading_items;
		$this->context['topics'] = $topics;
		$this->context['arrow_icon'] = file_get_contents( get_stylesheet_directory().'/images/icon-arrow.svg' );
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('postCard.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('postCard.twig', $this->context);
	}

}
