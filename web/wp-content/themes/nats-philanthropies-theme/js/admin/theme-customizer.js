/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */

// console.log('inside theme customizer script');



// 404 Page Title
wp.customize('taoti_404_page_title', function (value) {
    value.bind(function (newval) {
        var pageTitle = document.querySelectorAll('.js-customizer-404Title');

        if (pageTitle.length) {
            pageTitle[0].innerHTML = newval;
        }

    });
});

// 404 Page Content
wp.customize('taoti_404_content', function (value) {
    value.bind(function (newval) {
        var content = document.querySelectorAll('.js-customizer-404Content');

        if (content.length) {
            content[0].innerHTML = newval;
        }

    });
});



// ####### SOCIAL MEDIA LINKS

// Twitter
// wp.customize('taoti_twitter_url', function (value) {
//     value.bind(function (newval) {
//         var socialLinks = document.querySelectorAll('.js-customizer-twitter');

//         for( i = 0; i < socialLinks.length; i++ ){
//             socialLinks[i].href = newval;
//         }

//     });
// });

// Instagram
// wp.customize('taoti_instagram_url', function (value) {
//     value.bind(function (newval) {
//         var socialLinks = document.querySelectorAll('.js-customizer-instagram');

//         for (i = 0; i < socialLinks.length; i++) {
//             socialLinks[i].href = newval;
//         }

//     });
// });

// Facebook
// wp.customize('taoti_facebook_url', function (value) {
//     value.bind(function (newval) {
//         var socialLinks = document.querySelectorAll('.js-customizer-facebook');

//         for (i = 0; i < socialLinks.length; i++) {
//             socialLinks[i].href = newval;
//         }

//     });
// });