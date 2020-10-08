/*
 * Based on https://zurb.com/playground/responsive-tables
 *
 * Just add the class `responsive` to the <table> element,
 * the JS will take it from there to allow horizontal
 * scrolling on small screens.
 *
 * Related CSS is in <theme>/styles/scss/_responsive-tables.scss
 * 									 OR
 * 									 <theme>/modules/table/scss/_responsive-tables.scss
 *
 * NOTE: Modified from the original script so it stops throwing JS errors.
 * - Removed the outer document.ready function, since our scripts
 * are compiled and loaded at the bottom of the HTML anyway.
 * - Added try/catch blocks.
 * - Replaced jQuery code with ES6 syntax.
*/

let switched = false;
let updateTables = function () {

	try {
		let responsiveTables = Array.from( document.querySelectorAll('table.responsive') );

		if (( window.innerWidth <= 767) && !switched) {
			switched = true;

			for( let i = 0; i < responsiveTables.length; i++ ){
				splitTable( responsiveTables[i] );
			}

			return true;

		} else if (switched && (window.innerWidth > 767)) {
			switched = false;

			for( let i = 0; i < responsiveTables.length; i++ ){
				unsplitTable( responsiveTables[i] );
			}
		}

	}
	catch(e){
		console.log('Error updating tables.');
		console.log(e);
	}

};

// Initialize
try {
	if( document.querySelectorAll('table.responsive').length ){
		updateTables();

		window.addEventListener('redraw', () => {
			switched = false;
			updateTables();
		});

		window.addEventListener('resize', updateTables);

	}
}
catch(e){
	console.log(e);
}



function splitTable(original) {
	// `original` should be an element == table.responsive
	// console.log('INSIDE splitTable()');
	// console.log('original = ');
	// console.log(original);

	try {
		// Save a copy of the original's parent so we can alter its HTML contents later.
		let original_parent = original.parentNode;

		// Set up 3 <div>s. div.table-wrapper will contain the other two <div>s. The other two <div>s will contain the original or cloned version of the <table>.
		let wrap = document.createElement('div');
		wrap.classList.add('table-wrapper');

		let scrollable = document.createElement('div');
		scrollable.classList.add('scrollable');

		let pinned = document.createElement('div');
		pinned.classList.add('pinned');

		wrap.appendChild(scrollable);
		wrap.appendChild(pinned);

		// Make a copy of the original <table>, this will be modified to allow for the horizontal scrolling.
		let copy = original.cloneNode(true);
		let cells = Array.from( copy.querySelectorAll("td:not(:first-child), th:not(:first-child)") );
		for( let i=0; i < cells.length; i++ ){
			cells[i].style.display = 'none';
		}
		copy.classList.remove('responsive');

		// Add the original table to the new div.scrollable container, and the copy goes in div.pinned.
		scrollable.appendChild(original);
		pinned.appendChild(copy);

		// Now `wrap` should have the `scrollable` and `pinned` containers, which themselves have the original and cloned tables respectively. Replace the original's parent's HTML with this new `wrap`'s HTML.
		original_parent.innerHTML = wrap.outerHTML;

		// The cell heights in the cloned/original tables need to match for the effect to work.
		setCellHeights(original, copy);

	}
	catch(error){
		console.log('Error in splitTable().');
		console.log(error);
	}

}

function unsplitTable(original) {
	// console.log('INSIDE unsplitTable()');
	// console.log('original = ');
	// console.log(original);

	try {

		// `original` should be a <table> element within div.scrollable, which is within div.table-wrapper. The goal here is to get the parent immediately beyond div.table-wrapper.
		let parent_container = original;
		do {
			parent_container = parent_container.parentNode;
		}
		while( (parent_container.matches('.table-wrapper') || parent_container.matches('.scrollable')) && parent_container !== document.body );

		// With that outer parent, set its contents to the original <table>'s HTML.
		parent_container.innerHTML = original.outerHTML;

	}
	catch(error){
		console.log('Error in unsplitTable().');
		console.log(error);
	}

}

function setCellHeights(original, copy) {

	try {
		let tr = Array.from( original.querySelectorAll('tr') );
		let tr_copy = Array.from( copy.querySelectorAll('tr') );
		let heights = [];

		for( let i=0; i < tr.length; i++ ){
			let self = tr[i];
			let tx = self.querySelectorAll('th, td');

			for( let j=0; j < tx.length; j++ ){
				let height = parseInt( window.getComputedStyle(tx[j]).height );
				heights[i] = heights[i] || 0;
				if( height > heights[i] ){
					heights[i] = height;
				}
			}

		}

		for( let i=0; i < tr_copy.length; i++ ){
			tr_copy[i].style.height = heights[i] + 'px';
		}

	}
	catch(error){
		console.log('Error in setCellHeights().');
		console.log(error);
	}

}
