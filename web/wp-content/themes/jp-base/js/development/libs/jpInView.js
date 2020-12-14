/*
 * Simple checker for the question "is an element in view?"
 *
 * Add the 'inView' class to your elements, this script will
 * loop through them to see if they are in the widow enough
 * to be considered "in view". If they are they get the class
 * "is-inView" and "touched-inView". The class "is-inView" is
 * removed when an element is no longer in view, but the
 * "touched-inView" class will remain.
 *
 */

/*
 * You can modify the percentage of the window you want to
 * consider "in view". This is the threshold where an element
 * must scroll into this area before it is in view.
 *
 * For example, if the window is 900px in height, then 80% of
 * the screen is 720px. So a section would have to be
 * within that 720px to get the 'is-inView' class applied to
 * it.
 */
const activeScreenPercentage = 0.8; // Use a decimal value.

// Retrieve all the sections using the `inView` class.
const sections = document.querySelectorAll('.inView');

// Run the check on page load, scrolls, and resize. That should cover all the instances where the elements' positions need to be checked.
jp_checkInView();
window.addEventListener('scroll', jp_checkInView, { passive: true });
window.addEventListener('resize', jp_checkInView, { passive: true });



function jp_checkInView(){
	try {

		// Check the top/bottom borders of each section compared to the window dimensions. This determines if the section is "in view" or not.
		for( let i = 0; i < sections.length; i++ ){

			let thresholdTop = window.innerHeight * activeScreenPercentage;
			let thresholdBottom = window.innerHeight * (1 - activeScreenPercentage);

			if( sections[i].getBoundingClientRect().top < thresholdTop && sections[i].getBoundingClientRect().bottom >= thresholdBottom ){
				sections[i].classList.add('is-inView');
				sections[i].classList.add('touched-inView');

			} else {
				sections[i].classList.remove('is-inView');
			}

		}

	}
	catch(error){
		console.log(error);
	}

}
