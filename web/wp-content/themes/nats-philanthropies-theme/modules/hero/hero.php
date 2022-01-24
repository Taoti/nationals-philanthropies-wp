<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = [
	// 	'description' => get_the_excerpt(),
	// ];
	// $hero = new Hero($args);
	// $hero->render();

class Hero {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){

		// Save a boolean as to whether or not this should use the home page twig template. This of course depends on `is_front_page()`, and also on the use of the temporary landing page (which has its own hero).
		$this->use_home_template = is_front_page() && !get_field( 'temporary_landing_page_is_enabled', 'option' );
    $this->use_youth_baseball_academy_template = get_page_template_slug() == 'template-youth-baseball-academy.php';

		// Set up the default <img> html for the "paint splatter" accent image.
		$accent_image_1_html_default = '<img class="hero-accent hero-accent-1 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-1.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-1@2x.png 2x" width="477" height="82" alt="Paint splatter accent">';

		// Set up defaults for the heading lines 1 and 2. This will take the post title, split it into an array of words, and split that array in half. Then each half of the post title makes the heading lines 1 and 2.
		$heading_line_1 = false;
		$heading_line_2 = false;

		$post_title = get_the_title();
		$post_title_array = explode( ' ', $post_title );

		if( $post_title && count($post_title_array) > 1 ){
			$post_title_divided_to_lines = array_chunk( $post_title_array, ceil(count($post_title_array) / 2) );
			$heading_line_1 = implode( ' ', $post_title_divided_to_lines[0] );
			$heading_line_2 = implode( ' ', $post_title_divided_to_lines[1] );

		} else {
			$heading_line_1 = $post_title;
		}


		// Default args for this class, using some values set above.
		$this->defaults = [
			'heading_line_1' => $heading_line_1,
			'heading_line_2' => $heading_line_2,
      'header_img' => false,
      'description' => get_the_excerpt(),
			'disable_excerpt' => false,
      'button_label' => false,
      'button_link' => false,
			'background_image_url' => false,
			'accent_image_1_html' => $accent_image_1_html_default,
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

		$statsTitle = '';
		$statsDescription = '';
		$stats = false;
		if( $this->use_home_template ){
			$classes[] = 'hero-home';
			$classes[] = 'scrollspy';
			$classes[] = 'scrollspy-dark';

			$hero_diamond_image = get_field('hero_diamond_image');
	  		if ($hero_diamond_image) {
				$header_img = $hero_diamond_image['url'];
			} else {
				echo 'uso el regular';
				$header_img = get_stylesheet_directory_uri() . '/images/hero-header-img-withShadows.png';
			}
	  		
		} elseif($this->use_youth_baseball_academy_template){
      $classes[] = 'hero-youth-baseball-academy';
      $header_img = get_stylesheet_directory_uri() . '/images/bg-hero-youth-baseball-academy-header-img.png';
      $accent_image_1_html = '<img class="hero-accent hero-accent-1 lazyload" data-srcset="' . get_stylesheet_directory_uri() . '/images/accent-spatter-2-blue.png 1x, ' . get_stylesheet_directory_uri() . '/images/accent-spatter-2-blue@2x.png 2x" width="477" height="82" alt="Paint splatter accent">';
      $tba_logo = get_stylesheet_directory_uri() . '/images/img-TBA-logo.png';
      $stats = get_field('hero_stats');
      $statsTitle = $stats['title'];
      $statsDescription = $stats['description'];
      $stats = $stats['statistic_columns'];

    }

		$this->context = Timber::get_context();
		$this->context['heading_line_1'] = $heading_line_1;
		$this->context['heading_line_2'] = $heading_line_2;
    $this->context['header_img'] = $header_img;
    $this->context['description'] = $description;
		$this->context['disable_excerpt'] = $disable_excerpt;
    $this->context['button_label'] = $button_label;
    $this->context['button_link'] = $button_link;
		$this->context['background_image_url'] = $background_image_url;
		$this->context['accent_image_1_html'] = $accent_image_1_html;
    $this->context['statsTitle'] = $statsTitle;
    $this->context['statsDescription'] = $statsDescription;
    $this->context['stats'] = $stats;
		$this->context['classes'] = implode(' ', $classes);
	}

	public function render(){

    if( $this->use_home_template ){
			Timber::render('hero-home.twig', $this->context);
    } elseif( $this->use_youth_baseball_academy_template ) {
      Timber::render('hero-youth-baseball-academy.twig', $this->context);
    } else {
      Timber::render('hero.twig', $this->context);
		}

	}

}
