<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = array(
	// 	'image' => get_sub_field('image'),
	// 	'quoted_text' => get_sub_field('quoted_text'),
	// 	'attribution_name' => get_sub_field('attribution_name'),
	// 	'attribution_description' => get_sub_field('attribution_description'),
	// 	'overlay_color' => get_sub_field('overlay_color'),
	// );
	// $quote = new Quote($args);
	// $quote->render();

class Quote {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'image' => false,
      'logo' => false,
			'quoted_text' => false,
			'attribution_name' => false,
			'attribution_description' => false,
			'overlay_color' => 'blue',
			'image_html' => '',
			'classes' => [
				'l-module',
				'l-has-background',
				'quote',
			]
		];

		extract(array_merge($this->defaults, $args));

    if( is_array($image) ){
			$image_args = [
				'image_array' => $image,
				'size' => 'quote-image',
				'classes' => ['quote-image'],
			];
      $image_html = Get::image_html( $image_args );
		}

		$logo_html = '';
    if( is_array($logo) ){
      $logo_args = [
        'image_array' => $logo,
        'size' => 'quote-image',
        'classes' => ['quote-image'],
      ];
      $logo_html = Get::image_html( $logo_args );
    }

		if( $overlay_color ){
			$classes[] = 'quote-overlay-' . $overlay_color;
		}

		$this->context = Timber::get_context();
		$this->context['image'] = $image;
		$this->context['image_html'] = $image_html;
    $this->context['logo_html'] = $logo_html;
		$this->context['quoted_text'] = $quoted_text;
		$this->context['attribution_name'] = $attribution_name;
		$this->context['attribution_description'] = $attribution_description;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('quote.twig', $this->context);
	}

}
