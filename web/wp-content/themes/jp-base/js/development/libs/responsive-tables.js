/*
 * https://zurb.com/playground/responsive-tables
 *
 * Just add the class `responsive` to the <table> element,
 * the JS will take it from there to allow horizontal
 * scrolling on small screens.
 *
 * Related CSS is in <theme>/styles/scss/_responsive-tables.scss
 *
 * NOTE: Modified a little bit from the original so it
 * stops throwing JS errors.
 * - Removed the outer document.ready function, since our scripts
 * are compiled and loaded at the bottom of the HTML anyway.
 * - Removed `$(window).load(updateTables);` replaced with `updateTables();`
 * - Changed `$(this).outerHeight( true );` to `$(this).height()` for Zepto compatibility.
 * - Added try/catch blocks.
*/

var switched = false;
var updateTables = function () {

	try {

		if (($(window).width() < 767) && !switched) {
			switched = true;
			$("table.responsive").each(function (i, element) {
				splitTable($(element));
			});
			return true;
		} else if (switched && ($(window).width() > 767)) {
			switched = false;
			$("table.responsive").each(function (i, element) {
				unsplitTable($(element));
			});
		}

	}
	catch(e){
		// console.log('Error updating tables.');
		// console.log(e);
	}

};

// Initialize
try {
	if( $("table.responsive").length ){
		updateTables();
		$(window).on("redraw", function () {
			switched = false;
			updateTables();
		}); // An event to listen for
		$(window).on("resize", updateTables);
	}
}
catch(e){
	// console.log(e);
}



function splitTable(original) {

	try {
		original.wrap("<div class='table-wrapper' />");

		var copy = original.clone();
		copy.find("td:not(:first-child), th:not(:first-child)").css("display", "none");
		copy.removeClass("responsive");

		original.closest(".table-wrapper").append(copy);
		copy.wrap("<div class='pinned' />");
		original.wrap("<div class='scrollable' />");

		setCellHeights(original, copy);

	}
	catch(e){
		// console.log('Error in splitTable().');
		// console.log(e);
	}

}

function unsplitTable(original) {

	try {
		original.closest(".table-wrapper").find(".pinned").remove();
		original.unwrap();
		original.unwrap();
	}
	catch(e){
		// console.log('Error in unsplitTable().');
		// console.log(e);
	}

}

function setCellHeights(original, copy) {

	try {
		var tr = original.find('tr'),
		tr_copy = copy.find('tr'),
		heights = [];

	tr.each(function (index) {
		var self = $(this),
			tx = self.find('th, td');

		tx.each(function () {
			var height = $(this).height();
			heights[index] = heights[index] || 0;
			if (height > heights[index]) heights[index] = height;
		});

	});

	tr_copy.each(function (index) {
		$(this).height(heights[index]);
	});

	}
	catch(e){
		// console.log('Error in setCellHeights().');
		// console.log(e);
	}

}
