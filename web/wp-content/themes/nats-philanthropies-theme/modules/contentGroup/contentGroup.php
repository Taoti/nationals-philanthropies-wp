<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'primary_heading' => get_sub_field('primary_heading_line_1'),
	// 	'secondary_heading' => get_sub_field('primary_heading_line_2'),
	// 	'description' => get_sub_field('description'),
	// 	'cta_link' => get_sub_field('button_url'),
	// 	'cta_label' => get_sub_field('button_label'),
	// ];
	// $contentGroup = new ContentGroup($args);
	// $contentGroup->render();

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
