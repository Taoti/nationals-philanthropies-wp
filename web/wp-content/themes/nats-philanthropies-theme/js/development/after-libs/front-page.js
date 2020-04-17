// scrollspy cb
// Populates the homepage_section_boundaries[] array (which must already exist on a global scope) with the scroll positions of the homepage sections.
var homepage_section_boundaries = [];
taoti_set_homepage_section_boundaries();

window.addEventListener( 'resize', taoti_set_homepage_section_boundaries );

function taoti_set_homepage_section_boundaries(){

	try {
		homepage_section_boundaries = [];

		var homepage_sections = jQuery('.scrollspy');

		for( i=0; i<homepage_sections.length; i++ ){
			var this_homepage_section_shape = homepage_sections[i].getBoundingClientRect();
			// console.log(this_homepage_section_shape);

			var new_homepage_section_boundary = [];
			new_homepage_section_boundary['top'] = this_homepage_section_shape.top + window.pageYOffset;
			new_homepage_section_boundary['bottom'] = this_homepage_section_shape.top + this_homepage_section_shape.height + window.pageYOffset;

			if( jQuery(homepage_sections[i]).hasClass('scrollspy-dark') ){
				new_homepage_section_boundary['class'] = 'scrollspy-dark';
			} else if( jQuery(homepage_sections[i]).hasClass('scrollspy-light') ){
				new_homepage_section_boundary['class'] = 'scrollspy-light';
			}

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

		var scrollspy_navItems = jQuery('.scrollspy-navItem');

		for( i=0; i<scrollspy_navItems.length; i++){

			var this_navItems_shape = scrollspy_navItems[i].getBoundingClientRect();
			var this_navItems_bottom_edge = this_navItems_shape.top + this_navItems_shape.height;
			// console.log(this_navItems_shape);

			for( j=0; j<homepage_section_boundaries.length; j++){

				var this_navItems_fauxScrollDistance = 0;

				if( window.taoti_scrollDirection === 'down' ){
					this_navItems_fauxScrollDistance = this_navItems_shape.top + window.pageYOffset;

				} else if( window.taoti_scrollDirection === 'up' ){
					this_navItems_fauxScrollDistance = this_navItems_shape.top + this_navItems_shape.height + window.pageYOffset;
				}

				var edges_have_crossed = this_navItems_fauxScrollDistance > homepage_section_boundaries[j]['top'] && this_navItems_fauxScrollDistance < homepage_section_boundaries[j]['bottom'];

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

window.taoti_lastScrollTop = 0;
window.taoti_scrollDirection = '';
window.addEventListener("scroll", function(){
   var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
   if (st > window.taoti_lastScrollTop){
		window.taoti_scrollDirection = 'down';
   } else {
    window.taoti_scrollDirection = 'up';
   }
	 window.taoti_lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling

	//  console.log(window.taoti_scrollDirection);
}, false);








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
