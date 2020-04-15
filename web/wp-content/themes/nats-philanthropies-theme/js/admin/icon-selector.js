// One of the ACF fields is the Icon Selector with the class "taoti-iconSelector". It's just a normal <select> field, except that the values correspond with icon SVG files. When one of the <option>s is selected, this script will pull in a preview of the SVG image next to the <select> element.

if( jQuery('.taoti-iconSelector select').length ){

	var preview_div = taoti_create_iconSelector_preview();

	jQuery('.taoti-iconSelector select').parent('.acf-input').append( preview_div );

	for( i = 0; i < jQuery('.taoti-iconSelector select').length; i++ ){
			if( jQuery('.taoti-iconSelector select')[i].value ){

					var this_select_field = jQuery('.taoti-iconSelector select')[i];

					jQuery(this_select_field).next('.taoti-iconSelector-preview').attr( 'style', 'background-image:url(' + taoti_admin_js.theme_path + '/images/' + this_select_field.value + '.svg);' );
					jQuery(this_select_field).next('.taoti-iconSelector-preview').addClass('is-active');

			}
	}

}

jQuery(document).on( 'change', '.taoti-iconSelector select', function(e) {
	var filename = this.value;
	console.log( filename );

	if( filename ){

			jQuery(this).next('.taoti-iconSelector-preview').attr( 'style', 'background-image:url(' + taoti_admin_js.theme_path + '/images/' + filename + '.svg);' );
			jQuery(this).next('.taoti-iconSelector-preview').addClass('is-active');

	}

});



function taoti_create_iconSelector_preview(){

	var preview_div = document.createElement("div");
	preview_div.setAttribute( 'class', 'taoti-iconSelector-preview' );

	return preview_div;

}
