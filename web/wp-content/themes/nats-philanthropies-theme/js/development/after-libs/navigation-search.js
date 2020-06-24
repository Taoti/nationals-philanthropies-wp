jQuery('.js-openHeaderSearch').click( function(e){
	e.preventDefault();
	taoti_toggleHeaderSearch();
});

jQuery('.js-closeHeaderSearch').click( function(e){
	e.preventDefault();
	taoti_closeHeaderSearch();
});

function taoti_openHeaderSearch(){
	jQuery('.header-searchContainer').addClass('is-active');
}

function taoti_closeHeaderSearch(){
	jQuery('.header-searchContainer').removeClass('is-active');
}

function taoti_toggleHeaderSearch(){
	jQuery('.header-searchContainer').toggleClass('is-active');
}
