
// Simple helper function to determine if the user is scrolling up or down.
// Examples: `window.taoti_scrollDirection === 'up'`
// 				or `window.taoti_scrollDirection === 'down'`
window.taoti_lastScrollTop = 0;
window.taoti_scrollDirection = '';
window.addEventListener("scroll", function(){
   var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
   if (st > window.taoti_lastScrollTop){
		window.taoti_scrollDirection = 'down';
   } else {
    window.taoti_scrollDirection = 'up';
   }
	 window.taoti_lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling

	//  console.log(window.taoti_scrollDirection);
}, false);
