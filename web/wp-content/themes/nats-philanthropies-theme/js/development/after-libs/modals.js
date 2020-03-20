$('[data-modal]').click( function(e){
  e.preventDefault();

  var modal_selector = '.' + this.dataset.modal;

  $( modal_selector ).toggleClass('is-active');

  document.querySelector(modal_selector).scrollIntoView({
    behavior: "smooth"
  });

});

$('.modal-close').click( function(e){
  e.preventDefault();

  $(this).parents('.modal').toggleClass('is-active');

});
