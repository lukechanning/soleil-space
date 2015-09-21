<?php 
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