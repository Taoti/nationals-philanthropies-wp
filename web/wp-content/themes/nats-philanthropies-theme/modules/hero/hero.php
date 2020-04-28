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

		$this->use_home_template = is_front_page() && !get_field( 'temporary_landing_page_is_enabled', 'option' );

		$accent_image_1_html_default = '<img class="hero-accent hero-accent-1 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-1.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-1@2x.png 2x" width="477" height="82" alt="Paint splatter accent">';
		$accent_image_2_html_default = '<img class="hero-accent hero-accent-2 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-2.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-2@2x.png 2x" width="690" height="67" alt="Paint splatter accent">';

		$post_title = get_the_title();
		$post_title_array = explode( ' ', $post_title );
		// echo "<pre>"; var_dump($post_title_array); echo "</pre>";
		$heading_line_1 = false;
		$heading_line_2 = false;

		if( $post_title && count($post_title_array) > 1 ){

			$post_title_divided_to_lines = array_chunk( $post_title_array, (count($post_title_array) / 2) );
			// echo "<pre>"; var_dump($post_title_divided_to_lines); echo "</pre>";
			$heading_line_1 = implode( ' ', $post_title_divided_to_lines[0] );
			$heading_line_2 = implode( ' ', $post_title_divided_to_lines[1] );
			// echo "<pre>"; print_r($heading_line_1); echo "</pre>";
			// echo "<pre>"; print_r($heading_line_2); echo "</pre>";

		} else {
			$heading_line_1 = $post_title;
		}


		$this->defaults = [
			'heading_line_1' => $heading_line_1,
			'heading_line_2' => $heading_line_2,
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

		if( !$background_image_url ){
			// Try to get a 1080p size featured image first...
			$background_image_url = Get::featured_image_url( '1080p', get_the_ID() );

			// ... or if that's not available, try for a 720p...
			if( !$background_image_url ){
				$background_image_url = Get::featured_image_url( '720p', get_the_ID() );
			}

			// ... otherwise the final fallback for the background image is from the theme.
			if( !$background_image_url ){
				$background_image_url = get_stylesheet_directory_uri() . '/images/bg-home-hero2.jpg';
			}

		}

		if( $this->use_home_template ){
			$classes[] = 'hero-home';
			$classes[] = 'scrollspy';
			$classes[] = 'scrollspy-dark';
		}

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

    if( $this->use_home_template ){
			Timber::render('hero-home.twig', $this->context);

    } else {
      Timber::render('hero.twig', $this->context);
		}

	}

}
