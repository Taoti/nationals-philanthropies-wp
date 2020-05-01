<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'stats' => get_field('statistic_columns'),
	// ];
	// $new_module = new Stats($args);
	// $new_module->render();

class Stats {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'stats' => false,
			'classes' => [
				'l-module',
				'l-has-no-background',
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
