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
      'classes' => []
		];

		extract(array_merge($this->defaults, $args));

		$required_classes = [
			'l-module',
			'tableModule',
		];
		foreach( $required_classes as $required_class ){
			if( !in_array($required_class, $classes) ){
				$classes[] = $required_class;
			}
		}

		$table_html = $this->taoti_get_table_html( $table );

		$this->context = Timber::get_context();
		$this->context['table_html'] = $table_html;
    $this->context['classes'] = implode(' ', $classes);
	}

	public function render(){
		Timber::render('table.twig', $this->context);
	}

	public function compile(){
		return Timber::compile('table.twig', $this->context);
	}

	### When using the ACF Table plugin, use this function to get the table HTML.
	// $field_value = get_field( 'your_table_field_name' );
	// https://wordpress.org/plugins/advanced-custom-fields-table-field/
	public function taoti_get_table_html( $field_value ){

		$table = $field_value;
		$table_html = '';

		if ( ! empty ( $table ) ) {

				$table_html .= '<table class="contentTable" border="0">';

						if ( ! empty( $table['caption'] ) ) {
								$table_html .= '<caption>' . $table['caption'] . '</caption>';
						}

						if ( ! empty( $table['header'] ) ) {
								$table_html .= '<thead>';

										$table_html .= '<tr>';

												foreach ( $table['header'] as $th ) {

														$table_html .= '<th>';
																$table_html .= $th['c'];
														$table_html .= '</th>';
												}

										$table_html .= '</tr>';

								$table_html .= '</thead>';
						}

						$table_html .= '<tbody>';

								foreach ( $table['body'] as $tr ) {

										$table_html .= '<tr>';

												foreach ( $tr as $td ) {

														$table_html .= '<td>';
																$table_html .= $td['c'];
														$table_html .= '</td>';
												}

										$table_html .= '</tr>';
								}

						$table_html .= '</tbody>';

				$table_html .= '</table>';
		}

		return $table_html;
	}

}
