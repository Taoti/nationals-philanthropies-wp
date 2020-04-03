// Use this to load fonts from Google Fonts, Typekit, Fonts.com, and Fontdeck, as well as self-hosted web fonts
// https://github.com/typekit/webfontloader

WebFont.load({
    // GOOGLE FONTS
    // google: {
    //     families: ['Open Sans:400,400i,700']
    // }

    // OR TYPEKIT
    typekit: { id: 'prq8jxo' },

    // CALLBACK WHEN FONTS LOAD
    active: taoti_fonts_active_cb
});



// Callback function for when the fonts are loaded.
function taoti_fonts_active_cb(){

    // The fonts loading in will change the height of the header.
    taoti_update_header_height_property();

}
