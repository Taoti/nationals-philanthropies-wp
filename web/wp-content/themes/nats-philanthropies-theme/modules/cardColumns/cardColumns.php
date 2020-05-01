<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'columns' => [ '<div>array of html strings</div>' ],
	// ];
	// $new_module = new CardColumns($args);
	// $new_module->render();

class CardColumns {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'primary_heading' => false,
			'columns' => false,
			'classes' => [
				'l-module',
				'l-has-no-background',
				'cardColumns',
			]
		];

		extract(array_merge($this->defaults, $args));

		$this->context = Timber::get_context();
		$this->context['primary_heading'] = $primary_heading;
		$this->context['columns'] = $columns;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('cardColumns.twig', $this->context);
	}

}
