<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = [
	// 	'heading' => get_field('heading'),
	// 	'description' => get_field('description'),
	// 	'button_url' => get_field('button_url'),
	// 	'button_label' => get_field('button_label'),
	// ];
	// $new_module = new Hero($args);
	// $new_module->render();

class Hero {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){

		$accent_image_1_html_default = '<img class="hero-accent hero-accent-1 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-1.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-1@2x.png 2x" width="477" height="82" alt="Paint splatter accent">';
		$accent_image_2_html_default = '<img class="hero-accent hero-accent-2 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-2.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-2@2x.png 2x" width="690" height="67" alt="Paint splatter accent">';

		$this->defaults = [
			'heading_line_1' => false,
			'heading_line_2' => false,
			'background_image_url' => get_stylesheet_directory_uri() . '/images/bg-home-hero2.jpg',
			'accent_image_1_html' => $accent_image_1_html_default,
			'accent_image_2_html' => $accent_image_2_html_default,
			'classes' => [
				'lazyload',
				'hero',
			]
		];

		extract(array_merge($this->defaults, $args));

		$this->context = Timber::get_context();
		$this->context['heading_line_1'] = $heading_line_1;
		$this->context['heading_line_2'] = $heading_line_2;
		$this->context['background_image_url'] = $background_image_url;
		$this->context['accent_image_1_html'] = $accent_image_1_html;
		$this->context['accent_image_2_html'] = $accent_image_2_html;
		$this->context['classes'] = implode(' ', $classes);
	}

	public function render(){
		Timber::render('heroTemp.twig', $this->context);
	}

}
