<?php
namespace Modules;
use Timber;
use JP\Get;

### Example usage
	// $args = ['post_object' => $people_post];
	// $new_people_card = new PeopleCard( $args );
	// $people_cards[] = $new_people_card->compile();

class PeopleCard {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'post_object' => false,
			'classes' => []
		];

		extract(array_merge($this->defaults, $args));


		if( !in_array( 'peopleCard', $classes ) ){
			$classes[] = 'peopleCard';
		}


		$name = '';
		$job_title = '';
		$image_html = '';

		if( is_a($post_object, 'WP_Post') ){

			$name = get_the_title( $post_object );

			$job_title = get_field( 'people_job_title', $post_object->ID );

			$image_args = [
				'image_array' => Get::featured_image_array( $post_object->ID ),
				'size' => 'small-square',
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

	public function compile(){
		return Timber::compile('peopleCard.twig', $this->context);
	}

}
