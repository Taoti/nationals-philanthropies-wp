<?php
namespace Modules;
use Timber;

### Example usage
	// $args = [
	// 	'text_block' => get_sub_field('text_block'),
	// ];
	// $new_module = new TextBlock($args);
	// $new_module->render();

class TextBlock {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'text_block' => false,
			'classes' => [
				'l-module',
				'l-container',
				'textBlock',
			]
		];

		extract(array_merge($this->defaults, $args));

		$processed_content = do_shortcode( $text_block );

		$this->context = Timber::get_context();
		$this->context['content'] = $processed_content;
		$this->context['classes'] = implode(' ', $classes);

	}

	public function render(){
		Timber::render('textBlock.twig', $this->context);
	}

}
