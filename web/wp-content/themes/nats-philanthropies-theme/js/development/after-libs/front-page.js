// scrollspy cb
// Populates the tab_section_positions[] array (which must already exist on a global scope) with the scroll positions of the elements in the homepage_sections[] array. Used as callback on page load and on window resize event.
function taoti_get_section_positions_cb(homepage_sections){

	for( i=0; i<homepage_sections.length; i++ ){
		var this_tab_section = document.getElementById( homepage_sections[i] );

		if( this_tab_section !== null ){
			var this_tab_section_shape = this_tab_section.getBoundingClientRect();
			tab_section_positions.push( {
				id: homepage_sections[i],
				position: this_tab_section_shape.top + window.pageYOffset
			} );
		}

	}

}


// Determines if a section on the page has been scrolled to, highlights the navigation link of that section.
// var homepage_sections = [
// 	'the-challenge',
// 	'the-solutions',
// 	'the-results'
// ];

// var tab_section_positions = [];
// kp_get_section_positions_cb(homepage_sections);
// console.log( tab_section_positions );

// window.addEventListener( 'resize', function(){
// 	kp_get_section_positions_cb(homepage_sections);
// });

var scrollspy_navItems = jQuery('.scrollspy-navItem');

window.addEventListener( 'scroll', function(){
	// console.log('scrolling');
	var height_offset = 1;//0.66;
	var current_scroll_distance = window.pageYOffset + (window.innerHeight * height_offset);
	console.log( current_scroll_distance );

	var active_section_index = 0;

	var homepage_sections = jQuery('.scrollspy');
	// console.log( homepage_sections );

	for( i=0; i<scrollspy_navItems.length; i++){

		var this_navItems_shape = scrollspy_navItems[i].getBoundingClientRect();
		var this_navItems_bottom_edge = this_navItems_shape.top + this_navItems_shape.height;
		console.log(this_navItems_shape);

		for( j=0; j<homepage_sections.length; j++){

			var this_section_shape = homepage_sections[j].getBoundingClientRect();
			this_section_bottom_edge = this_section_shape.top + this_section_shape.height;

			// TODO: This works for scrolling down. But if scrolling up, check if this_navItems_top_edge is greater than the section edge.
			// var edges_have_crossed = false;
			// if( window.scroll_direction === 'down' ){
			// 	edges_have_crossed = (this_navItems_bottom_edge > this_section_bottom_edge);
			// } else if( window.scroll_direction === 'up' ){
			// 	edges_have_crossed = (this_navItems_shape.top > this_section_bottom_edge);
			// }

			if( this_navItems_bottom_edge > this_section_bottom_edge && this_section_bottom_edge > 0 ){
			// if( edges_have_crossed && this_section_bottom_edge > 0 ){
				// active_section_index = j;

				if( jQuery(homepage_sections[j]).hasClass('scrollspy-dark') ){
					jQuery(scrollspy_navItems[i]).addClass('scrollspy-dark');
					// jQuery(scrollspy_navItems[i]).removeClass('scrollspy-light');

				} else {
					// jQuery(scrollspy_navItems[i]).addClass('scrollspy-light');
					jQuery(scrollspy_navItems[i]).removeClass('scrollspy-dark');
				}

			}

		}

	}


	// console.log( 'active section = ');
	// console.log( homepage_sections[active_section_index] );
	// console.log( '%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%');



	// var tabs = document.querySelectorAll('.case-study-tabs-link');
	// if( active_tab ){
	// 	try {
	// 		kpRemoveClass(tabs, 'is-active');
	// 		kpAddClass(active_tab, 'is-active');

	// 	} catch( error ){
	// 		console.log(error);
	// 	}

	// } else {
	// 	try {
	// 		kpRemoveClass(tabs, 'is-active');

	// 	} catch( error ){
	// 		console.log(error);
	// 	}
	// }

});



function isElementInViewport (el) {

	// Special bonus for those using jQuery
	if (typeof jQuery === "function" && el instanceof jQuery) {
			el = el[0];
	}

	var rect = el.getBoundingClientRect();

	return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /* or $(window).height() */
			rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */
	);
}



var lastScrollTop = 0;
window.scroll_direction = '';
window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
   var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
   if (st > lastScrollTop){
		window.scroll_direction = 'down';
   } else {
    window.scroll_direction = 'up';
   }
   lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
}, false);
