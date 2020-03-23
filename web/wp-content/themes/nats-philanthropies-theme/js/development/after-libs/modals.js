jQuery('[data-modal]').click( function(e){
  e.preventDefault();

  var modal_selector = '.' + this.dataset.modal;

  jQuery( modal_selector ).toggleClass('is-active');

  document.querySelector(modal_selector).scrollIntoView({
    behavior: "smooth"
  });

});

jQuery('.modal-close').click( function(e){
  e.preventDefault();

  jQuery(this).parents('.modal').toggleClass('is-active');

});
