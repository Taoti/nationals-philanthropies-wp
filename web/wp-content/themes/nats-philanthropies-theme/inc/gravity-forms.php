<?php

/*
* PURPOSE : Gravity forms uses an <input> element for the submit button. Ew. Changing that to a real <button> element so it can have other contents like the arrow icon.
*  PARAMS : $button: string - the original HTML string for the submit button
						$form: array - data about the form
* RETURNS : string - the possibly modified HTML string for the submit button
*   NOTES : https://docs.gravityforms.com/gform_submit_button/
*/
function form_submit_button( $button, $form ) {
		return '<button class="button gform_button" id="gform_submit_button_'.$form['id'].'">Submit<i class="menu-icon">'.file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg').'</i></button>';
}
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
