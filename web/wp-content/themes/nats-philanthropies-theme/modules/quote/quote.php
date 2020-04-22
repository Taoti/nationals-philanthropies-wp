<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = [
	// 	'primary_heading' => get_field('primary_heading'),
	// 	'description' => get_field('description'),
	// 	'button_url' => get_field('button_url'),
	// 	'button_label' => get_field('button_label'),
	// ];
	// $new_module = new Quote($args);
	// $new_module->render();

class Quote {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'image' => false,
			'quoted_text' => false,
			'attribution_name' => false,
			'attribution_description' => false,
			'overlay_color' => 'blue',
			'image_html' => '',
			'classes' => [
				'l-module',
				'quote',
			]
		];

		extract(array_merge($this->defaults, $args));

    if( is_array($image) ){
			$image_args = [
				'image_array' => $image,
				'size' => 'medium',
				'classes' => ['quote-image'],
			];
      $image_html = Get::image_html( $image_args );
		}

		if( $overlay_color ){
			$classes[] = 'quote-overlay-' . $overlay_color;
		}

		$this->context = Timber::get_context();
		$this->context['image'] = $image;
		$this->context['image_html'] = $image_html;
		$this->context['quoted_text'] = $quoted_text;
		$this->context['attribution_name'] = $attribution_name;
		$this->context['attribution_description'] = $attribution_description;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('quote.twig', $this->context);
	}

}
