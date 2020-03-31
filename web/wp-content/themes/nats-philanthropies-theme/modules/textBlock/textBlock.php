<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'content' => get_sub_field('content'),
	// ];
	// $new_module = new TextBlock($args);
	// $new_module->render();

class TextBlock {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'content' => false,
			'classes' => [
				'l-module',
				'l-container',
				'textBlock',
			]
		];

		extract(array_merge($this->defaults, $args));

		$processed_content = do_shortcode( $content );

		$this->context = Timber::get_context();
		$this->context['content'] = $processed_content;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('textBlock.twig', $this->context);
	}

}
