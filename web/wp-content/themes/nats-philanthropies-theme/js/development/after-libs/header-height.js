// There is a CSS custom property `--header-height` that controls the size/position of the mega nav. The height must be updated when the window is resized or scrolled, since the height of the header can change after either of those events.
taoti_update_header_height_property();
// $(window).resize( taoti_update_header_height_property );
// $(window).scroll( taoti_update_header_height_property );
window.addEventListener('resize', taoti_update_header_height_property);
window.addEventListener('scroll', taoti_update_header_height_property);

function taoti_update_header_height_property(){
  // var header_height = $('#header').height();
  var header_height = document.getElementById('header').clientHeight;
  if( header_height ){
    document.documentElement.style.setProperty( '--header-height', header_height + 'px' );
  }
  console.log( 'new header_height = ' + header_height );
}
