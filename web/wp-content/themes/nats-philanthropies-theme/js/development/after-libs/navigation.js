jQuery('.js-openNav').click( function(e){
	e.preventDefault();
	taoti_open_mainNav();
});


jQuery('.js-closeNav').click( function(e){
	e.preventDefault();
	taoti_close_mainNav();
});



function taoti_open_mainNav(){
	jQuery('html').addClass('nav-is-open');
	jQuery('.navContainer-main-navigation').addClass('is-open');
}

function taoti_close_mainNav(){
	jQuery('html').removeClass('nav-is-open');
	jQuery('.navContainer-main-navigation').removeClass('is-open');
}



// If the mobile nav is open, then the window is resized larger than the nav breakpoint, close the mobile nav.
var timeout_close_mobile_nav = null;

window.addEventListener('resize', function(){

	var nav_breakpoint_collapse = 1000; // NOTE - this must match the $nav-breakpoint-collapse variable in scss/_config.scss.

	timeout_close_mobile_nav = setTimeout( function(){
		if( window.innerWidth >= nav_breakpoint_collapse ){
			taoti_close_mainNav();
		}
	}, 100 );

});
