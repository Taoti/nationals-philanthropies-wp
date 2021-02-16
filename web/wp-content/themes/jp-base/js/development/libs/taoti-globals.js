// There is a CSS custom property (CSS variable) that defines the header height so that elements targeted by a jump link will offset the scroll jump to account for the sticky header's height.
// TODO: figure out a way to detect when #wpadminbar loads so the height of that element can be added as well.
function taoti_set_header_height_css(){
	let new_height = 0;

	let header_height = document.getElementById('header').getBoundingClientRect().height;
	if( header_height ){
		new_height += header_height;
	}

	// console.log( document.getElementById('wpadminbar') );
	// if( document.getElementById('wpadminbar') ){
	// 	let admin_bar_height = document.getElementById('wpadminbar').getBoundingClientRect().height;
	// 	if( admin_bar_height ){
	// 		new_height += admin_bar_height;
	// 		// console.log('found wpadminbar, new_height = ' + new_height );
	// 	}
	// }


	if( new_height ){
		document.documentElement.style.setProperty( '--header-height', new_height+'px' );
	}

}

// Set the header height variable on page load...
taoti_set_header_height_css();

// ... and also whenever the window is resized.
let taoti_header_height_timeout = false;
window.addEventListener( 'resize', () => {
	if( taoti_header_height_timeout ){
		clearTimeout(taoti_header_height_timeout );
	}

	taoti_header_height_timeout = setTimeout( taoti_set_header_height_css, 500 );
});






/* Simple helper lisener to determine if the user is scrolling up or down, you can check this at any point in your code.
 * Examples: `window.taoti_scrollDirection === 'up'`
 * or `window.taoti_scrollDirection === 'down'`
 */

window.taoti_lastScrollTop = 0;
window.taoti_scrollDirection = 'down';
window.addEventListener("scroll", () => {
   let st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
   if (st > window.taoti_lastScrollTop){
		window.taoti_scrollDirection = 'down';
   } else {
    window.taoti_scrollDirection = 'up';
   }
	 window.taoti_lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling

	//  console.log(window.taoti_scrollDirection);
}, { passive: true });
