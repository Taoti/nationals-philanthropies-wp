<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'heading' => get_field('heading'),
	// 	'description' => get_field('description'),
	// 	'button_url' => get_field('button_url'),
	// 	'button_label' => get_field('button_label'),
	// ];
	// $new_module = new CTA($args);
	// $new_module->render();

class CTA {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'heading' => false,
			'description' => false,
			'button_url' => false,
			'button_label' => false,
			'background_image' => false,
			'background_image_url' => false,
			'overlay_color' => false,
			'classes' => [
				'l-module',
				'cta',
			]
		];

		extract(array_merge($this->defaults, $args));

		// If no specific background image url was given, pull one from the image array.
		if( !$background_image_url ){

			if( isset( $background_image['sizes']['1080p'] ) ){
				$background_image_url = $background_image['sizes']['1080p'];

			} elseif( isset( $background_image['sizes']['720p'] ) ){
				$background_image_url =$background_image['sizes']['720p'];

			}

		}

		// Add the lazyload class for the background image to be lazyloaded.
		if( $background_image_url ){
			$classes[] = 'lazyload';
		}


		if( is_string( $overlay_color ) ){
			$classes[] = 'cta-'.$overlay_color;
		}


		$this->context = Timber::get_context();
		$this->context['heading'] = $heading;
		$this->context['description'] = $description;
		$this->context['button_url'] = $button_url;
		$this->context['button_label'] = $button_label;
		$this->context['background_image'] = $background_image;
		$this->context['background_image_url'] = $background_image_url;
		$this->context['overlay_color'] = $overlay_color;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('cta.twig', $this->context);
	}

}
