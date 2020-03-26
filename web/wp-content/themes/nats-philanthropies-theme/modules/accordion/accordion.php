<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'primary_heading' => get_sub_field('primary_heading'),
	// 	'question_answer_list' => get_sub_field('question_answer_list'),
	// ];
	// $new_module = new Accordion($args);
	// $new_module->render();

class Accordion {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'primary_heading' => false,
			'question_answer_list' => false,
			'classes' => [
				'l-module',
				'accordion',
			]
		];

		extract(array_merge($this->defaults, $args));

		// echo "<pre>"; print_r($question_answer_list); echo "</pre>";

		$this->context = Timber::get_context();
		$this->context['primary_heading'] = $primary_heading;
		$this->context['question_answer_list'] = $question_answer_list;
		$this->context['icon_arrow'] = file_get_contents( get_template_directory().'/images/icon-arrow-down.svg' );
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('accordion.twig', $this->context);
	}

}
