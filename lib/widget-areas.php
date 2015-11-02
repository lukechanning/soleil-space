<?php

// create widget area sidebar one
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Sidebar',
        'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

// create widget area for footer
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Footer',
        'before_widget' => '<div class="large-3 columns"><article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

//Let's add our custom widget blocks

if ( ! function_exists( 'custom_sidebar_widgets' ) ) :
function custom_sidebar_widgets() {
    
	register_sidebar(array(
	  'id' => 'home-middle',
	  'name' => __( 'Home Middle Block', 'foundationpress' ),
	  'description' => __( 'Add a text widget to display the Home middle block', 'grunterie' ),
	  'before_widget' => '<div class="large-6 box left columns">',
	  'after_widget' => '</div>',
	  'before_title' => '<h3 class="lead">',
	  'after_title' => '</h3>'
	));

	register_sidebar(array(
	  'id' => 'footer-contact-flash',
	  'name' => __( 'Footer Contact Flash', 'foundationpress' ),
	  'description' => __( 'Add some text to really make the contact section pop!', 'grunterie' ),
	  'before_widget' => '<div class="small-12 large-12 columns">',
	  'after_widget' => '</div>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>'
	));
	
	register_sidebar(array(
	  'id' => 'footer-contact-one',
	  'name' => __( 'Footer Contact #1', 'foundationpress' ),
	  'description' => __( 'Add a text widget to display the footer contact information (left block)', 'grunterie' ),
	  'before_widget' => '<div class="small-12 medium-6 large-6 columns">',
	  'after_widget' => '</div>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));
	
	register_sidebar(array(
	  'id' => 'footer-contact-two',
	  'name' => __( 'Footer Contact #2', 'foundationpress' ),
	  'description' => __( 'Add a text widget to display the footer contact information (right block)', 'grunterie' ),
	  'before_widget' => '<div class="small-12 medium-6 large-6 columns">',
	  'after_widget' => '</div>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));
	
}
add_action( 'widgets_init', 'custom_sidebar_widgets' );
endif;
?>