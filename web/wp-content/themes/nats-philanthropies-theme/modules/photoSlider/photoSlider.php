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
	// $new_module = new ImageWithTextBlock($args);
	// $new_module->render();

class PhotoSlider {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'slider_type' => false,
			'images' => false,
			'classes' => [
				'l-module',
				'photoSlider',
			]
		];

		extract(array_merge($this->defaults, $args));

		$image_arr = array();
		foreach($images as $image) {
			array_push($image_arr, ($slider_type == 'Multiple') ? $image['sizes']['article'] : $image['sizes']['small-square']);
		}

		$this->context = Timber::get_context();
		$this->context['slider_type'] = $slider_type;
		$this->context['is_multiple'] = ($slider_type == 'Multiple') ? 'true' : 'false';
        $this->context['images'] = $image_arr;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('photoSlider.twig', $this->context);
	}

}
