// scrollspy for the pager (sectionNavigation) that will add/remove a class to each pager item based on the class of the section beneath it. The purpose is to change the color of the pager item so it is readable on a light/dark background as the user scrolls down the page.

// Populate the homepage_section_boundaries[] array (which must already exist on a global scope) with the scroll positions of the homepage sections. This is run here on page load, and should also be ran inside the callback function in web-font-loader.js, so it will run after the fonts are loaded.
var homepage_section_boundaries = [];
taoti_set_homepage_section_boundaries();

// Redetermine the boundaries whenever the browser is resized.
window.addEventListener( 'resize', taoti_set_homepage_section_boundaries );

function taoti_set_homepage_section_boundaries(){

	try {
		// Reset to a blank array so we don't keep appending the same items.
		homepage_section_boundaries = [];

		// All the homepage sections should be marked with the class 'scrollspy'.
		var homepage_sections = jQuery('.scrollspy');

		for( i=0; i<homepage_sections.length; i++ ){
			var this_homepage_section_shape = homepage_sections[i].getBoundingClientRect();
			// console.log(this_homepage_section_shape);

			// For each homepage section, save where it's top and bottom edges are as scroll distances. As if you viewed the entire page at once and could point out the horizontal lines where each section begins and ends.
			var new_homepage_section_boundary = [];
			new_homepage_section_boundary['top'] = this_homepage_section_shape.top + window.pageYOffset;
			new_homepage_section_boundary['bottom'] = this_homepage_section_shape.top + this_homepage_section_shape.height + window.pageYOffset;

			// Also save the section's dark or light indicator class. This indicates whether or not the section has a light or dark background.
			if( jQuery(homepage_sections[i]).hasClass('scrollspy-dark') ){
				new_homepage_section_boundary['class'] = 'scrollspy-dark';
			} else if( jQuery(homepage_sections[i]).hasClass('scrollspy-light') ){
				new_homepage_section_boundary['class'] = 'scrollspy-light';
			}

			// Add the homepage section data to the global array, which will be referenced in the scroll listener.
			homepage_section_boundaries.push( new_homepage_section_boundary );

		}
		// console.log(homepage_section_boundaries);

	}
	catch(e){
		console.log(e);
	}

}

window.addEventListener( 'scroll', function(){
	// console.log('scrolling');
	// var current_scroll_distance = window.pageYOffset + window.innerHeight;
	// console.log( window.pageYOffset );
	// console.log( current_scroll_distance );

	try {

		// Go through each scrollspy item and store the info from getBoundingClientRect. That will be comparent to the position data from the homepage sections.
		var scrollspy_navItems = jQuery('.scrollspy-navItem');

		for( i=0; i<scrollspy_navItems.length; i++){

			var this_navItems_shape = scrollspy_navItems[i].getBoundingClientRect();

			// Go through the homepage section data so we can compare the position of each section to this navItem, figure out which section is underneath the navItem.
			for( j=0; j<homepage_section_boundaries.length; j++){

				// Set a variable for the "faux scroll distance" of the navItem. It's faux because the scrollspy nav has a fixed position, so it doesn't actually scroll. But we can combine the distance from the element to the top of the window, with the distance scrolled (pageYOffset). This gives us the position of the navItem as if it was scrolling, and we can compare that to the positions of the homepage sections.
				var this_navItems_fauxScrollDistance = 0;

				// The distance from the navItem to the top of the window is measured a little differently if you're scrolling up or down. When scrolling down, you want to see when the bottom edge of the navItem touches the boudnary of a section. When scrolling up, you want to use the top edge of the navItem.
				if( window.taoti_scrollDirection === 'down' ){
					this_navItems_fauxScrollDistance = this_navItems_shape.top + window.pageYOffset;

				} else if( window.taoti_scrollDirection === 'up' ){
					this_navItems_fauxScrollDistance = this_navItems_shape.top + this_navItems_shape.height + window.pageYOffset;
				}

				// When the navItem's position is in between the top/bottom positions of a section, we know it's underneath that section...
				var edges_have_crossed = this_navItems_fauxScrollDistance > homepage_section_boundaries[j]['top'] && this_navItems_fauxScrollDistance < homepage_section_boundaries[j]['bottom'];

				// ... so the navItem should copy the same 'scrollspy-{{color}}' class as that section.
				if( edges_have_crossed ){
					var this_section_class = homepage_section_boundaries[j]['class'];

					if( this_section_class === 'scrollspy-dark' ){
						jQuery(scrollspy_navItems[i]).addClass('scrollspy-dark');
						jQuery(scrollspy_navItems[i]).removeClass('scrollspy-light');

					} else if( this_section_class === 'scrollspy-light' ){
						jQuery(scrollspy_navItems[i]).removeClass('scrollspy-dark');
						jQuery(scrollspy_navItems[i]).addClass('scrollspy-light');
					}

				}

			}

		}

	}
	catch(e){
		console.log(e);
	}

});





// inView for homepage sections
// When a homepage section scrolls into view, assign the 'active' class to the related scrollspy pager nav item.
// inView('.scrollspy')
// 	.on('enter', function(el){
// 		jQuery(el).addClass('in-view');
// 	})
// 	.on('exit', function(el){
// 		jQuery(el).removeClass('in-view');
// 	});

// TODO: emit an 'enter' event like they explain in the documentation. Hopefully can emit an event to the window with the in-view section. Then the callback on that event can match the section to one of the pager items.
