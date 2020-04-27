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
      'header_img' => false,
      'use_homepage_template' => false,
      'description' => false,
      'button_label' => false,
      'button_link' => false,
			'background_image_url' => false,
			'accent_image_1_html' => $accent_image_1_html_default,
			'accent_image_2_html' => $accent_image_2_html_default,
			'classes' => [
				'lazyload',
				'hero',
			]
		];

		extract(array_merge($this->defaults, $args));

		if( is_front_page() && !get_field( 'temporary_landing_page_is_enabled', 'option' ) ){
			$classes[] = 'hero-home';
			$classes[] = 'scrollspy';
			$classes[] = 'scrollspy-dark';
		}

    // if($background_image_url) {
    //   $background_image_url = $background_image_url[0];
    // }

		$this->context = Timber::get_context();
		$this->context['heading_line_1'] = $heading_line_1;
		$this->context['heading_line_2'] = $heading_line_2;
    $this->context['header_img'] = get_stylesheet_directory_uri() . '/images/hero-header-img-withShadows.png';
    $this->context['description'] = $description;
    $this->context['button_label'] = $button_label;
    $this->context['button_link'] = $button_link;
		$this->context['background_image_url'] = $background_image_url;
		$this->context['accent_image_1_html'] = $accent_image_1_html;
		$this->context['accent_image_2_html'] = $accent_image_2_html;
		$this->context['classes'] = implode(' ', $classes);
	}

	public function render(){
    if( is_front_page() && !get_field( 'temporary_landing_page_is_enabled', 'option' ) ){
		  Timber::render('hero-home.twig', $this->context);
    } else {
      Timber::render('hero.twig', $this->context);
    }
	}

}
