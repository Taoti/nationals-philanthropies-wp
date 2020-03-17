// Use lazysizes to get lazy loading on css background images.
document.addEventListener('lazybeforeunveil', function(e){

  var bg = e.target.getAttribute('data-bg');
  if( bg ){
    e.target.style.backgroundImage = 'url(' + bg + ')';
  }

  // This is for the <image> elements inside of <svg>s.
  var xlink_href = e.target.getAttribute('data-xlink:href');
  if( xlink_href ){
    e.target.setAttribute( 'xlink:href', xlink_href );
  }

});
