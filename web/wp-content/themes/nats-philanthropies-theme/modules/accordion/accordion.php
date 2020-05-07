<?php
namespace Modules;
use Timber;

### Example usage
	// $args = array(
	// 	'accordion_items' => get_sub_field('accordion_items'),
	// );
	// $accordion = new Accordion($args);
	// $accordion->render();

class Accordion {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'accordion_items' => false,
			'classes' => [
				'l-module',
				'l-has-no-background',
				'accordion',
			]
		];

		extract(array_merge($this->defaults, $args));

		// echo "<pre>"; print_r($accordion_items); echo "</pre>";

		$this->context = Timber::get_context();
		$this->context['accordion_items'] = $accordion_items;
		// $this->context['icon_arrow'] = file_get_contents( get_template_directory().'/images/icon-arrow-down.svg' );
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('accordion.twig', $this->context);
	}

}
