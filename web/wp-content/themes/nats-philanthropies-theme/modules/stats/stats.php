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
	// $new_module = new Stats($args);
	// $new_module->render();

class Stats {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'primary_heading' => false,
			'description' => false,
			'button_url' => false,
			'button_label' => false,
			'classes' => [
				'l-module',
				'stats',
			]
		];

		extract(array_merge($this->defaults, $args));

		$this->context = Timber::get_context();
		$this->context['stats'] = $stats;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('stats.twig', $this->context);
	}

}
