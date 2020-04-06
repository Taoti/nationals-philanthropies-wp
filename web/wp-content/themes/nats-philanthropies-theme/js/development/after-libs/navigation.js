jQuery('.js-openNav').click( function(e){
	e.preventDefault();

	jQuery('html').addClass('nav-is-open');
	jQuery('.navContainer-main-navigation').addClass('is-open');

});
