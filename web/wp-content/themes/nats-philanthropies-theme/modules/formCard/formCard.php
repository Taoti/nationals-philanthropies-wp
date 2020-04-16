<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'post_object' => get_sub_field('post_object'),
	// 	'image_or_icon' => get_sub_field('image_or_icon'),
	// 	'icon' => get_sub_field('icon'),
	// ];
	// $new_module = new GridCard($args);
	// $new_module->render();

class FormCard {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'heading' => false,
			'background_image' => false,
			'form' => false,
			'background_image_url' => '',
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));


		if( !in_array( 'formCard', $classes ) ){
			$classes[] = 'formCard';
		}

		if( !in_array( 'lazyload', $classes ) ){
			$classes[] = 'lazyload';
		}


		if( !$background_image_url && isset($background_image['sizes']['listing-item']) ){
			$background_image_url = $background_image['sizes']['listing-item'];
		}

		$this->context = Timber::get_context();
		$this->context['heading'] = $heading;
		$this->context['background_image_url'] = $background_image_url;
		$this->context['form'] = $form;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('formCard.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('formCard.twig', $this->context);
	}

}
