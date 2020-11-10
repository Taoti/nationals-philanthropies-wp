/* Simple helper listener to determine if the user is scrolling up or down, you can check this at any point in your code.
 * Examples:
 * window.jp_scrollDirection === 'up'
 * or
 * window.jp_scrollDirection === 'down'
 */

window.jp_lastScrollTop = 0;
window.jp_scrollDirection = 'down';
window.addEventListener('scroll', function(){

	try {

		let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

		if (scrollTop > window.jp_lastScrollTop){
			window.jp_scrollDirection = 'down';
		} else {
			window.jp_scrollDirection = 'up';
		}

		window.jp_lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Set the last scrollTop value, and make sure the scrolling doesn't go negative.

		//  console.log(window.jp_scrollDirection);

	}
	catch(error){
		console.log('Error with scroll direction detection.');
		console.log(error);
	}

}, { passive: true });
