<?php

/*
 * PURPOSE : Options for Appearance > Customize. Add to this function to set up your own sections and options in the WordPress Customizer.
 *  PARAMS : $wp_customize - WP Customizer object
 * RETURNS : $wp_customize
 *   NOTES : Options for contact details, social URLs, and the 404 page are set up here as a starting point. Use these, remove them, or add more.
 */
function taoti_customize_register_cb($wp_customize){

    ### Section - Contact Details
    $wp_customize->add_section( 'taoti_section_contact_details' , array(
        'title' => __( 'Contact &amp; Social Media Details', 'taoti' ),
        'description' => 'Enter your contact and social media details that will appear throughout the website.',
        'priority' => 20,
    ) );

    // Phone Number
    $wp_customize->add_setting( 'taoti_phone_number' , array(
        'default'   => '(123) 456-7890',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taoti_phone_number', array(
    	'label' => __( 'Phone Number', 'taoti' ),
    	'section' => 'taoti_section_contact_details',
    	'settings' => 'taoti_phone_number',
        'type' => 'text',
        'description' => 'This is for the phone number as it would appear within copy for a person to read, e.g., (123) 456-7890',
    ) ) );

    // Street Address
    $wp_customize->add_setting( 'taoti_address' , array(
        'default'   => '',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taoti_address', array(
    	'label' => __( 'Street Address', 'taoti' ),
    	'section' => 'taoti_section_contact_details',
    	'settings' => 'taoti_address',
        'type' => 'textarea',
        'description' => 'Enter your address as it will appear throughout the website.'
    ) ) );





    // Twitter
    $wp_customize->add_setting('taoti_twitter_url', array(
        'default'   => '',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'taoti_twitter_url', array(
        'label' => __('Twitter Page URL', 'taoti'),
        'section' => 'taoti_section_contact_details',
        'settings' => 'taoti_twitter_url',
        'type' => 'url',
        'description' => 'Copy and paste the URL to your Twitter page here.',
    )));

    // Instagram
    $wp_customize->add_setting('taoti_instagram_url', array(
        'default'   => '',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'taoti_instagram_url', array(
        'label' => __('Instagram Page URL', 'taoti'),
        'section' => 'taoti_section_contact_details',
        'settings' => 'taoti_instagram_url',
        'type' => 'url',
        'description' => 'Copy and paste the URL to your Instagram page here.',
    )));

    // Facebook
    $wp_customize->add_setting( 'taoti_facebook_url' , array(
        'default'   => '',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taoti_facebook_url', array(
    	'label' => __( 'Facebook Page URL', 'taoti' ),
    	'section' => 'taoti_section_contact_details',
    	'settings' => 'taoti_facebook_url',
        'type' => 'url',
        'description' => 'Copy and paste the URL to your Facebook page here.',
    ) ) );





    ### Section - 404 Page
    $wp_customize->add_section( 'taoti_section_404_page' , array(
        'title' => __( '404 Page', 'taoti' ),
        'description' => 'Add a custom title and message to your 404 page.',
        'priority' => 20,
    ) );

    // 404 page title
    $wp_customize->add_setting( 'taoti_404_page_title' , array(
        'default'   => 'Not Found (404)',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taoti_404_page_title', array(
    	'label' => __( 'Page Title', 'taoti' ),
    	'section' => 'taoti_section_404_page',
    	'settings' => 'taoti_404_page_title',
        'type' => 'text',
        'description' => 'Set the main page title.',
    ) ) );

    // 404 page content
    $wp_customize->add_setting( 'taoti_404_content' , array(
        'default'   => 'The content you were looking for could not be found.',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taoti_404_content', array(
    	'label' => __( 'Message', 'taoti' ),
    	'section' => 'taoti_section_404_page',
    	'settings' => 'taoti_404_content',
        'type' => 'textarea',
        'description' => 'Set the message that lets a user know what to do.',
    ) ) );



    ### Remove default sections and panels
    // $wp_customize->remove_section('title_tagline');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
    // $wp_customize->remove_panel('widgets');


    return $wp_customize;
}
add_action( 'customize_register', 'taoti_customize_register_cb' );





function taoti_customizer_live_preview(){
    wp_enqueue_script( 'taoti-theme-customizer', get_template_directory_uri().'/js/admin/theme-customizer.js', array( 'jquery','customize-preview' ), '1.0', true );

    wp_enqueue_style('taoti-theme-customizer', get_template_directory_uri() . '/styles/css/style-customizer.min.css', array(), filemtime(get_template_directory() . '/styles/css/style-customizer.min.css'));

}
add_action( 'customize_preview_init', 'taoti_customizer_live_preview', 0, 99 );



// Load the CSS that modifies the customizer's appearance/styles.
function taoti_customizer_custom_css(){
    ?>
    <style>
		<?php echo file_get_contents( get_template_directory().'/styles/css/style-customizer.min.css' ); ?>
	</style>
    <?php
}
add_action( 'customize_controls_print_styles', 'taoti_customizer_custom_css', 9999, 0 );
