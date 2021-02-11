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
	// $new_module = new LogoCard($args);
	// $new_module->render();

class LogoCard {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'image_array' => [],
			'image_html' => false,
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));

		$required_classes = [
			'l-module', // Keep l-module only for page builder modules (flex content layouts)
			'logoCard',
		];
		foreach( $required_classes as $required_class ){
			if( !in_array($required_class, $classes) ){
				$classes[] = $required_class;
			}
		}

		if( !$image_html ){
			$image_args = [
				'image_array' => $image_array,
				'size' => 'logo-grid',
				'classes' => ['logoCard-image'],
			];
			$image_html = Get::image_html( $image_args );
		}

		$this->context = Timber::get_context();
		$this->context['image_array'] = $image_array;
		$this->context['image_html'] = $image_html;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('logoCard.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('logoCard.twig', $this->context);
	}

}
