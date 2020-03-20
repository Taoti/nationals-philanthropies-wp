$('a[data-modal]').click( function(e){
  e.preventDefault();
  // console.log(this);

  var modal_selector = '.' + this.dataset.modal;
  $( modal_selector ).toggleClass('is-active');

});

$('.modal-close').click( function(e){
  e.preventDefault();

  $(this).parents('.modal').toggleClass('is-active');

});
