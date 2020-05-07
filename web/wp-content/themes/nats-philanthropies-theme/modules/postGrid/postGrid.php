<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'grid_items' => [ '<div> Array of compiled card modules HTML </div>' ],
	// 	'classes' => [
	// 		'l-module',
	// 		'postGrid',
	// 		'postGrid-donate',
	// 	],
	// ];
	// $postGrid = new PostGrid($args);
	// $postGrid->render();

class PostGrid {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'primary_heading_line_1' => false,
			'primary_heading_line_2' => false,
			'description' => false,
			'button_label' => false,
			'button_url' => false,
			'grid_items' => false,
			'classes' => [
				'l-module',
				'l-has-background',
				'postGrid',
			]
		];

		extract(array_merge($this->defaults, $args));

		$args = [
			'primary_heading' => $primary_heading_line_1,
			'secondary_heading' => $primary_heading_line_2,
			'description' => $description,
			'cta_link' => $button_url,
			'cta_label' => $button_label,
		];
		$content_group = new ContentGroup($args);
		$header_html = $content_group->compile();

		$this->context = Timber::get_context();
		$this->context['header_html'] = $header_html;
		$this->context['grid_items'] = $grid_items;
		$this->context['primary_heading_line_1'] = $primary_heading_line_1;
		$this->context['primary_heading_line_2'] = $primary_heading_line_2;
		$this->context['description'] = $description;
		$this->context['button_url'] = $button_url;
		$this->context['button_label'] = $button_label;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('postGrid.twig', $this->context);
	}

}
