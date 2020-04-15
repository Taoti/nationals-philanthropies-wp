<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = [
	// 	'primary_heading' => get_field('primary_heading'),
	// 	'description' => get_field('description'),
	// 	'button_url' => get_field('button_url'),
	// 	'button_label' => get_field('button_label'),
	// ];
	// $new_module = new PeopleCard($args);
	// $new_module->render();

class PeopleCard {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'post_object' => false,
			'classes' => [
				'peopleCard',
			]
		];

		extract(array_merge($this->defaults, $args));

		$name = '';
		$job_title = '';
		$image_html = '';

		if( is_a($post_object, 'WP_Post') ){

			$name = get_the_title( $post_object );

			$job_title = get_field( 'job_title', $post_object->ID );

			$image_args = [
				'image_array' => Get::featured_image_array( $post_object->ID ),
				'size' => 'medium',
				'classes' => [
					'peopleCard-image'
				],
			];
			$image_html = Get::image_html( $image_args );

		}

		$this->context = Timber::get_context();
		$this->context['name'] = $name;
		$this->context['job_title'] = $job_title;
		$this->context['image_html'] = $image_html;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('peopleCard.twig', $this->context);
	}

}
