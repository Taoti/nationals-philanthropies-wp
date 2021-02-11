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
	// $new_module = new LogoGrid($args);
	// $new_module->render();

class LogoGrid {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'primary_heading' => false,
			'primary_description' => false,
			'grids' => false,
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));

		$required_classes = [
			'l-module', // Keep l-module only for page builder modules (flex content layouts)
			'logoGrid',
		];
		foreach( $required_classes as $required_class ){
			if( !in_array($required_class, $classes) ){
				$classes[] = $required_class;
			}
		}

		$final_grids = [];
		if( !empty($grids) ):
			foreach( $grids as $grid ):

				$add_to_final = [
					'heading' => $grid['grid_heading'],
					'cta_link' => $grid['grid_cta_link'],
					'cards' => [],
				];

				if( !empty($grid['grid_images']) ){
					foreach( $grid['grid_images'] as $grid_image ){
						$card_args = [
							'image_array' => $grid_image['image'],
						];
						$logoCard = new LogoCard($card_args);
						$add_to_final['cards'][] = $logoCard->compile();
					}
				}

				$final_grids[] = $add_to_final;

			endforeach;
		endif;

		$this->context = Timber::get_context();
		$this->context['primary_heading'] = $primary_heading;
		$this->context['primary_description'] = $primary_description;
		$this->context['final_grids'] = $final_grids;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('logoGrid.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('logoGrid.twig', $this->context);
	}

}
