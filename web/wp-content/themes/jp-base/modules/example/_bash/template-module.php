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
	// $new_module = new {{ModuleName}}($args);
	// $new_module->render();

class {{ModuleName}} {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'primary_heading' => false,
			'description' => false,
			'button_url' => false,
			'button_label' => false,
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));

		$required_classes = [
			'l-module', // Keep l-module only for page builder modules (flex content layouts)
			'{{ModuleFile}}',
		];
		foreach( $required_classes as $required_class ){
			if( !in_array($required_class, $classes) ){
				$classes[] = $required_class;
			}
		}

		$this->context = Timber::get_context();
		$this->context['primary_heading'] = $primary_heading;
		$this->context['description'] = $description;
		$this->context['button_url'] = $button_url;
		$this->context['button_label'] = $button_label;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('{{ModuleFile}}.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('{{ModuleFile}}.twig', $this->context);
	}

}
