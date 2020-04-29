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
	// 	'classes' => ['l-module']
	// ];
	// $new_module = new ListingItem($args);
	// $new_module->render();

class ListingItem {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'primary_heading' => false,
			'subtitle' => false,
			'excerpt' => false,
			'permalink' => false,
			'primary_button_url' => false,
			'primary_button_label' => false,
			'secondary_button_url' => false,
			'secondary_button_label' => false,
			'image_array' => false,
			'image_html' => false,
      'is_featured' => false,
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));

		$classes[] = 'listingItem';

		if( is_array($image_array) && !$image_html ){
			$image_args = [
				'image_array' => $image_array,
				'size' => 'listing-item',
				'classes' => ['listingItem-image'],
			];
			$image_html = Get::image_html($image_args);

		}

		$this->context = Timber::get_context();
		$this->context['primary_heading'] = $primary_heading;
		$this->context['subtitle'] = $subtitle;
		$this->context['excerpt'] = $excerpt;
		$this->context['permalink'] = $permalink;
		$this->context['primary_button_url'] = $primary_button_url;
		$this->context['primary_button_label'] = $primary_button_label;
		$this->context['secondary_button_url'] = $secondary_button_url;
		$this->context['secondary_button_label'] = $secondary_button_label;
		$this->context['image_html'] = $image_html;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('listingItem.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('listingItem.twig', $this->context);
	}

}
