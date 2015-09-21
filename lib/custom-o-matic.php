<?php 

/**********************
Add theme supports
 **********************/
if( ! function_exists( 'reverie_theme_support' ) ) {
    function reverie_theme_support() {
        // Add language supports.
        load_theme_textdomain('reverie', get_template_directory() . '/lang');

        // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
        add_theme_support('post-thumbnails');
        // set_post_thumbnail_size(150, 150, false);
        add_image_size('fd-lrg', 1024, 99999);
        add_image_size('fd-med', 768, 99999);
        add_image_size('fd-sm', 320, 9999);

        // rss thingy
        add_theme_support('automatic-feed-links');

        // Add post formats support. http://codex.wordpress.org/Post_Formats
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

        // Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
        add_theme_support('menus');
        register_nav_menus(array(
            'primary' => __('Primary Navigation', 'reverie'),
            'additional' => __('Additional Navigation', 'reverie'),
            'utility' => __('Utility Navigation', 'reverie')
        ));

        // Add custom background support
        add_theme_support( 'custom-background',
            array(
                'default-image' => '',  // background image default
                'default-color' => '', // background color default (dont add the #)
                'wp-head-callback' => '_custom_background_cb',
                'admin-head-callback' => '',
                'admin-preview-callback' => ''
            )
        );
    }
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

//Add Our custom areas for Soleil

function soleil_customize_register( $wp_customize ) {
    //Add Custom Header
    $wp_customize->add_section( 'soleil_logo_section' , array(
        'title'       => __( 'Soleil Logo', 'reverie' ),
        'priority'   => 30,
        'description' => 'Upload a logo to replace the default Soleil name and
        description in the header',
    ) );
    $wp_customize->add_setting( 'soleil_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'soleil_logo', array(
        'label'   => __( 'Logo', 'reverie' ),
        'section' => 'soleil_logo_section',
        'settings' => 'soleil_logo',
    ) ) );
}
add_action( 'customize_register', 'soleil_customize_register' );
?>