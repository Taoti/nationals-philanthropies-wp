<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = [
	// 	'post_object' => get_sub_field('post_object'),
	// 	'image_or_icon' => get_sub_field('image_or_icon'),
	// 	'icon' => get_sub_field('icon'),
	// ];
	// $new_module = new GridCard($args);
	// $new_module->render();

class GridCard {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'post_object' => false,
			'image_or_icon' => 'icon',
			'image' => false,
			'icon' => false,
			'title' => '',
			'permalink' => '',
			'excerpt' => '',
			'icon_html' => '',
			'background_image_url' => '',
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));


		if( !in_array( 'gridCard', $classes ) ){
			$classes[] = 'gridCard';
		}


		if( is_string($icon) ){
			$filepath = get_stylesheet_directory().'/images/' . $icon . '.svg';
			if( $image_or_icon === 'icon' && file_exists($filepath) ){
				$icon_html = file_get_contents($filepath);
			}
		}

		if( $image_or_icon === 'image' && isset($image['sizes']['listing-item']) ){
			$background_image_url = $image['sizes']['listing-item'];
		}

		// If a post object was given, use that to set the field values.
		if( is_a($post_object, 'WP_Post') ){
			$post_id = $post_object->ID;

			$title = get_the_title( $post_id );
			$permalink = get_permalink( $post_id );
			$excerpt = get_the_excerpt( $post_id );

			$featured_image_url = Get::featured_image_url( 'listing-item', $post_id );
			if( $image_or_icon === 'image' && !$background_image_url && $featured_image_url ){
				$background_image_url = $featured_image_url;
			}

		}

		if( $background_image_url && !in_array( 'lazyload', $classes ) ){
			$classes[] = 'lazyload';
		}

		$this->context = Timber::get_context();
		$this->context['image_or_icon'] = $image_or_icon;
		$this->context['title'] = $title;
		$this->context['permalink'] = $permalink;
		$this->context['excerpt'] = $excerpt;
		$this->context['background_image_url'] = $background_image_url;
		$this->context['icon_html'] = $icon_html;
		$this->context['arrow_icon'] = file_get_contents( get_stylesheet_directory().'/images/icon-arrow.svg' );
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('gridCard.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('gridCard.twig', $this->context);
	}

}
