<?php

/*
* PURPOSE : Gravity forms uses an <input> element for the submit button. Ew. Changing that to a real <button> element so it can have other contents like the arrow icon.
*  PARAMS : $button: string - the original HTML string for the submit button
						$form: array - data about the form
* RETURNS : string - the possibly modified HTML string for the submit button
*   NOTES : https://docs.gravityforms.com/gform_submit_button/
*/
function taoti_edit_gf_submit_button( $button, $form ) {
		return '<button class="button gform_button" id="gform_submit_button_'.$form['id'].'" title="Submit"><i class="gform_button-submitIcon">'.file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg').'</i></button>';
}
add_filter( 'gform_submit_button', 'taoti_edit_gf_submit_button', 10, 2 );



/*
* PURPOSE : Gravity forms does not add a default class to the forms that it outputs, so it makes it trickier to target them in CSS. This will add the `gform_form` class to the <form> element.
*  PARAMS : $form_tag: string - the HTML string for the <form ...> tag (not the whole elment, just the tag w/ attributes)
						$form: array - data about the form
* RETURNS : string - the possibly modified HTML string for the <form ...> tag
*   NOTES : https://docs.gravityforms.com/gform_form_tag/
*/
function form_tag( $form_tag, $form ) {
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
add_filter( 'gform_form_tag', 'form_tag', 10, 2 );
