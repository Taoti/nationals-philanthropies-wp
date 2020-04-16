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
	// $new_module = new ContentGroup($args);
	// $new_module->render();

class ContentGroup {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){

    $accent_image_1_html_default = '<img class="hero-accent hero-accent-1 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-1.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-1@2x.png 2x" width="477" height="82" alt="Paint splatter accent">';
    $accent_image_2_html_default = '<img class="hero-accent hero-accent-2 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-2.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-2@2x.png 2x" width="690" height="67" alt="Paint splatter accent">';

    $this->defaults = [
			'primary_heading' => false,
      'secondary_heading' => false,
			'description' => false,
			'cta_label' => false,
			'cta_link' => false,
			'classes' => [
				'l-module',
				'contentGroup',
			]
		];

		extract(array_merge($this->defaults, $args));

		$this->context = Timber::get_context();
		$this->context['primary_heading'] = $primary_heading;
    $this->context['secondary_heading'] = $secondary_heading;
		$this->context['description'] = $description;
		$this->context['cta_link'] = $cta_link;
		$this->context['cta_label'] = $cta_label;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('contentGroup.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('contentGroup.twig', $this->context);
	}

}
