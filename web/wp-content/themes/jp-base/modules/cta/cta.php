<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'heading' => get_field('heading'),
	// 	'description' => get_field('description'),
	// 	'button_url' => get_field('button_url'),
	// 	'button_label' => get_field('button_label'),
	// ];
	// $new_module = new CTA($args);
	// $new_module->render();

class CTA {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'heading' => false,
			'description' => false,
			'button_url' => false,
			'button_label' => false,
			'classes' => [],
		];

		extract(array_merge($this->defaults, $args));

		$required_classes = [
			'l-module',
			'cta',
		];
		foreach( $required_classes as $required_class ){
			if( !in_array($required_class, $classes) ){
				$classes[] = $required_class;
			}
		}

		$this->context = Timber::get_context();
		$this->context['heading'] = $heading;
		$this->context['description'] = $description;
		$this->context['button_url'] = $button_url;
		$this->context['button_label'] = $button_label;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('cta.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('cta.twig', $this->context);
	}

}
