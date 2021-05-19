<?php

/*
* PURPOSE : Gravity forms uses an <input> element for the submit button. Ew. Changing that to a real <button> element so it can have other contents like the arrow icon.
*  PARAMS : $button: string - the original HTML string for the submit button
						$form: array - data about the form
* RETURNS : string - the possibly modified HTML string for the submit button
*   NOTES : https://docs.gravityforms.com/gform_submit_button/
*/
function taoti_gf_edit_submit_button( $button, $form ) {
		return '<button class="button gform_button gform_submitButton" id="gform_submit_button_'.$form['id'].'" title="Send Form"><i class="gform_button-submitIcon">'.file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg').'</i></button>';
}
add_filter( 'gform_submit_button', 'taoti_gf_edit_submit_button', 10, 2 );



/*
* PURPOSE : Gravity forms does not add a default class to the forms that it outputs, so it makes it trickier to target them in CSS. This will add the `gform_form` class to the <form> element.
*  PARAMS : $form_tag: string - the HTML string for the <form ...> tag (not the whole elment, just the tag w/ attributes)
						$form: array - data about the form
* RETURNS : string - the possibly modified HTML string for the <form ...> tag
*   NOTES : https://docs.gravityforms.com/gform_form_tag/
*/
function taoti_gf_form_tag( $form_tag, $form ) {
	// $form['id']

	// If there is already a class attribute, add to that.
	if( stripos( $form_tag, 'class=' ) !== false ){
		$form_tag = str_replace( 'class="', 'class="gform_form ', $form_tag );

	// Otherwise add a class attribute.
	} else {
		$form_tag = str_replace( 'action=', 'class="gform_form" action=', $form_tag );
	}

  return $form_tag;
}
add_filter( 'gform_form_tag', 'taoti_gf_form_tag', 10, 2 );





function taoti_gf_add_column_shortcode( $columns ) {
  $columns['shortcode'] = esc_html__( 'Shortcode', 'gravityforms' );
  return $columns;
}
add_filter( 'gform_form_list_columns', 'taoti_gf_add_column_shortcode' );

function taoti_gf_display_column_shortcode( $item ){
	echo "<input readonly value='[gravityform id=\"" . $item->id . "\" title=\"false\" description=\"false\"]' onclick='this.select();' style='font-family:monospace'>";

}
add_action( 'gform_form_list_column_shortcode', 'taoti_gf_display_column_shortcode' );





### Move Gravity Forms jQuery calls to footer
// https://hereswhatidid.com/2013/01/move-gravity-forms-jquery-calls-to-footer/
add_filter( 'gform_init_scripts_footer', '__return_true' );





/**
 * Enforce anti-spam honeypot on all Gravity forms.
 * https://www.timjensen.us/enforce-anti-spam-honeypots-on-gravity-forms/
 * @param array $form
 * @return array $form
 */
function taoti_gform_honeypot_default( $form ){
    $form['enableHoneypot'] = true;
	return $form;
}
add_filter( 'gform_form_post_get_meta', 'taoti_gform_honeypot_default', 10, 1 );









/*
* PURPOSE : Move the progress bar on multi-page forms to the bottom of the form. It makes more sense this way.
*  PARAMS : $form_string: string
						$form: array
* RETURNS : $form_string: string
*   NOTES : See https://gist.github.com/n7studios/f0b3ce229fa686ea0184 for where I got this function.
						Filter documenation - https://docs.gravityforms.com/gform_get_form_filter/
*/
function gravity_forms_move_progress_bar( $form_string, $form ) {

	// Check if Pagination is enabled on this form
	if ( ! is_array( $form['pagination'] ) ) {
			return $form_string;
	}
	if ( empty( $form['pagination']['type'] ) ) {
			return $form_string;
	}

	// Check if the first page CSS class is progress-bar-bottom
	if ( ! isset( $form['firstPageCssClass'] ) ) {
			return $form_string;
	}
	// if ( $form['firstPageCssClass'] != 'progress-bar-bottom' ) {
	// 		return $form_string;
	// }
	if ( strpos($form['firstPageCssClass'], 'progress-bar-bottom' ) !== false) {
		return $form_string;
	}

	// If here, the progress bar needs to be at the end of the form
	// Load form string into DOMDocument
	$dom = new DOMDocument;
	@$dom->loadHTML( $form_string );

	// Load Xpath
	$xpath = new DOMXPath( $dom );

	// Find Progress Bar
	$progress_bar = $xpath->query( '//div[@class="gf_progressbar_wrapper"]' )->item(0);

	// Find Form
	$form = $xpath->query( '//form' )->item(0);

	// Move Progress Bar to end of the Form
	$form->appendChild( $progress_bar );

	// Get HTML string
	$form_string = $dom->saveHTML();

	// Return modified HTML string
	return $form_string;

}
add_filter( 'gform_get_form_filter', 'gravity_forms_move_progress_bar', 10, 3 );






/*
* PURPOSE : Add a class with the field type to each `li.gfield` element. This way we can add styles to the field containers based on the type of field they contain.
*  PARAMS : 6 parameters, check the documentation
* RETURNS : (string) The <li> html string for the form field.
*   NOTES : https://docs.gravityforms.com/gform_field_container/
*						Use `{FIELD_CONTENT}` to add the contents of the the <li> element.
*/
// function my_field_container( $field_container, $field, $form, $css_class, $style, $field_content ) {
// 	$css_class .= ' gfield-' . $field->type;
// 	return '<li id="' . $form['id'] . '" class="' . $css_class . '">{FIELD_CONTENT}</li>';
// }
// add_filter( 'gform_field_container', 'my_field_container', 10, 6 );