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
	// $new_module = new Quote($args);
	// $new_module->render();

class Quote {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'image' => false,
			'description' => false,
			'author' => false,
			'location' => false,
			'classes' => [
				'l-module',
				'quote',
			]
		];

		extract(array_merge($this->defaults, $args));

    if($image){
      $image = $image['sizes']['medium'];
    }

		$this->context = Timber::get_context();
		$this->context['image'] = $image;
		$this->context['description'] = $description;
		$this->context['author'] = $author;
		$this->context['location'] = $location;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('quote.twig', $this->context);
	}

}
