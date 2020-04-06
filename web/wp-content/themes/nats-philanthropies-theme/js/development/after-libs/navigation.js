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
