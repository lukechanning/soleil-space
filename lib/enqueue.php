<?php
/*********************
Enqueue the proper CSS
if you use Sass.
 *********************/
 
if( ! function_exists( 'grunterie_enqueue_style' ) ) {
    function grunterie_enqueue_style()
    {
        // foundation stylesheet
        //wp_register_style( 'grunterie-foundation-stylesheet', get_stylesheet_directory_uri() . '/css/app.css', array(), '' );

        // Register our scripts and styles
        wp_register_style( 'grunterie-stylesheet', get_stylesheet_directory_uri() . '/css/style.css', array(), '', 'all' );
        wp_register_script( 'parallax', get_stylesheet_directory_uri() . '/js/parallax.min.js', array(), '', 'true' );
        wp_register_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), '', 'true' );
        
        //Enqueue the newly registered gentlemen
        wp_enqueue_style( 'grunterie-stylesheet' );
        wp_enqueue_script( 'parallax' );
        wp_enqueue_script( 'custom' );
        
        

    }
}
add_action( 'wp_enqueue_scripts', 'grunterie_enqueue_style' );
