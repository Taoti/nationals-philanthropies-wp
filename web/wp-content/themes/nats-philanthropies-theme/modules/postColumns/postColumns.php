<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'columns' => [ '<div>array of html strings</div>' ],
	// ];
	// $new_module = new PostColumns($args);
	// $new_module->render();

class PostColumns {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'columns' => false,
			'classes' => [
				'l-module',
				'postColumns',
			]
		];

		extract(array_merge($this->defaults, $args));

		$this->context = Timber::get_context();
		$this->context['columns'] = $columns;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('postColumns.twig', $this->context);
	}

}
