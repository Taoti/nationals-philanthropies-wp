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

		$accent_image_html_default = '<img class="contentGroup-accent lazyload" data-src="' . get_stylesheet_directory_uri() . '/images/accent-spatter-3.png' .'" width="253" height="25" alt="Paint splatter accent">';
		$accent_image_html_invert_default = '<img class="contentGroup-accent lazyload" data-src="' . get_stylesheet_directory_uri() . '/images/accent-spatter-3-white.png' .'" width="253" height="25" alt="Paint splatter accent">';

    $this->defaults = [
			'primary_heading' => false,
      'secondary_heading' => false,
      'tertiary_heading' => false,
			'description' => false,
			'cta_label' => false,
			'cta_link' => false,
			'accent_image_html' => $accent_image_html_default,
			'accent_image_html_invert' => $accent_image_html_invert_default,
			'use_inverted_accent' => false,
			'classes' => [
				'contentGroup',
			]
		];

		extract(array_merge($this->defaults, $args));

		if( $use_inverted_accent && $accent_image_html_invert ){
			$accent_image_html = $accent_image_html_invert;
		}

		$this->context = Timber::get_context();
		$this->context['primary_heading'] = $primary_heading;
    $this->context['secondary_heading'] = $secondary_heading;
    $this->context['tertiary_heading'] = $tertiary_heading;
		$this->context['description'] = $description;
		$this->context['cta_link'] = $cta_link;
		$this->context['cta_label'] = $cta_label;
		$this->context['accent_image_html'] = $accent_image_html;
		$this->context['use_inverted_accent'] = $use_inverted_accent;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('contentGroup.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('contentGroup.twig', $this->context);
	}

}
