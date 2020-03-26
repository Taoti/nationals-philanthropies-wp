<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = [
	// 	'image_array' => get_sub_field('image'),
	// 	'caption' => get_sub_field('caption'),
	// ];
	// $new_module = new FullWidthImage($args);
	// $new_module->render();

class FullWidthImage {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'image_array' => false,
			'caption' => false,
			'classes' => [
				'l-module',
				'l-container',
				'fullWidthImage',
			]
		];

		extract(array_merge($this->defaults, $args));

		$image_args = [
			'image_array' => $image_array,
			'size' => '1080p',
			'classes' => [
				'fullWidthImage-image'
			],
		];
		$image_html = Get::image_html($image_args);

		if( !$image_html ){
			$image_args['size'] = ['720p'];
			$image_html = Get::image_html($image_args);
		}

		$this->context = Timber::get_context();
		$this->context['image_array'] = $image_array;
		$this->context['image_html'] = $image_html;
		$this->context['caption'] = $caption;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('fullWidthImage.twig', $this->context);
	}

}
