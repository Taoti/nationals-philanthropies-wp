<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'array_of_sections' => get_field('modules_homePage'),
	// ];
	// $section_navigation = new SectionNavigation($args);
	// $section_navigation->render();

class SectionNavigation {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'array_of_sections' => false,
			'classes' => [
				'sectionNavigation',
			]
		];

		extract(array_merge($this->defaults, $args));

		$total_sections = 1; // The 1 is the hero.
		if( is_array($array_of_sections) && !empty($array_of_sections) ){
			$total_sections = $total_sections + count($array_of_sections);
		}

		$final_numbers = [];
		for( $i = 1; $i <= $total_sections; $i++ ){
      $final_numbers[] = sprintf('%02d', $i);
		}

		$this->context = Timber::get_context();
		$this->context['final_numbers'] = $final_numbers;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('sectionNavigation.twig', $this->context);
	}

}
