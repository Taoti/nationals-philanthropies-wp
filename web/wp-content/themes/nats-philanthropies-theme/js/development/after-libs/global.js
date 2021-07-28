
/* Simple helper lisener to determine if the user is scrolling up or down, you can check this at any point in your code.
 * Examples: `window.taoti_scrollDirection === 'up'`
 * or `window.taoti_scrollDirection === 'down'`
 */

window.taoti_lastScrollTop = 0;
window.taoti_scrollDirection = 'down';
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

jQuery(window).on('load', function(){
    if(window.location.hash && window.location.hash == '#EmailSignup') {
        emailSignUpScroll();        
    }

    jQuery('a[href="#EmailSignup"]').click(function(e){
        e.preventDefault();
        emailSignUpScroll();
    })
})


function emailSignUpScroll() {
    jQuery('html, body').animate({
        scrollTop: jQuery('#footer').offset().top
    }, 300)

    jQuery('#gform_fields_3 #3 input')[0].focus();
}

/** Photo Slider Slick */
jQuery(document).ready(function () {
    jQuery( ".photoSlider-images" ).each(function( index ) {
        initializeSlickSlider(jQuery( this ).attr('id'), (jQuery( this ).attr('data-slider-type') == 'Multiple'));
    });

    
});

function initializeSlickSlider(slider_id, is_multiple) {
    jQuery('#' + slider_id).slick({
        infinite: true,
        dots: true,
        slidesToScroll: 1,
        slidesToShow: (is_multiple) ? 3 : 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: (is_multiple) ? 3 : 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: (is_multiple) ? 3 : 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
}
