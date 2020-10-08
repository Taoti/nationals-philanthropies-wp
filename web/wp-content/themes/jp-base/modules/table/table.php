<?php
namespace Modules;
use Timber;
use JP\Get;

// Note - this relies on the ACF Table plugin
// https://wordpress.org/plugins/advanced-custom-fields-table-field/

### Example usage
	// $args = [
	// 	'table' => get_sub_field('table'),
	// ];
	// $table = new Table($args);
	// $table->render();

class Table {
	protected $defaults;
	protected $context;

	public function __construct( $args=[] ){
		$this->defaults = [
			'table' => false,
      'classes' => [
        'l-module',
        'l-module-table',
        'notShowing'
      ]
		];

		extract(array_merge($this->defaults, $args));

		$table_html = taoti_get_table_html( $table );

		$this->context = Timber::get_context();
		$this->context['table_html'] = $table_html;
    $this->context['classes'] = implode(' ', $classes);
	}

	public function render(){
		Timber::render('table.twig', $this->context);
	}

}
