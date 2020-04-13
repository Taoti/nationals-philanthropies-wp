<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'primary_heading' => get_field('primary_heading'),
	// 	'description' => get_field('description'),
	// 	'button_url' => get_field('button_url'),
	// 	'button_label' => get_field('button_label'),
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
			'title' => '',
			'permalink' => '',
			'excerpt' => '',
			'icon' => '',
			'background_image' => '',
			'classes' => [
				'l-module',
				'gridCard',
			]
		];

		extract(array_merge($this->defaults, $args));

		$this->context = Timber::get_context();
		$this->context['image_or_icon'] = $image_or_icon;
		$this->context['title'] = $title;
		$this->context['permalink'] = $permalink;
		$this->context['excerpt'] = $excerpt;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('gridCard.twig', $this->context);
	}

}
