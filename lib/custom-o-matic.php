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
    
    //Add custom logo via customization
    $wp_customize->add_section( 'soleil_logo_section' , array(
        'title'       => __( 'Soleil Logo', 'reverie' ),
        'priority'   => 20,
        'description' => 'Add a logo to replace the header image, over the stock space',
    ) );
    $wp_customize->add_setting( 'soleil_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'soleil_logo', array(
        'label'   => __( 'Logo', 'reverie' ),
        'section' => 'soleil_logo_section',
        'settings' => 'soleil_logo',
    ) ) );
    
    //Add Image to Homepage
    $wp_customize->add_section( 'soleil_testimonial_section' , array(
        'title'       => __( 'Soleil Testimonial Section', 'reverie' ),
        'priority'   => 30,
        'description' => 'Add a photo to replace the stock image for the testimonial section, just above the footer',
    ) );
    $wp_customize->add_setting( 'soleil_testimonial' );
    $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'soleil_testimonial', array(
        'label'   => __( 'Testimonial Section', 'reverie' ),
        'section' => 'soleil_testimonial_section',
        'settings' => 'soleil_testimonial',
    ) ) );
    
    //Add Image to Homepage contact section
    $wp_customize->add_section( 'soleil_contact_section' , array(
        'title'       => __( 'Soleil Contact Section', 'reverie' ),
        'priority'   => 30,
        'description' => 'Add a photo to replace the stock image for the contact section, just above the footer',
    ) );
    $wp_customize->add_setting( 'soleil_contact' );
    $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'soleil_contact', array(
        'label'   => __( 'Contact Section', 'reverie' ),
        'section' => 'soleil_contact_section',
        'settings' => 'soleil_contact',
    ) ) );
    
    
}
add_action( 'customize_register', 'soleil_customize_register' );

//Now let's add our custom post type for testimonials

// Register Custom Post Type
function testimonial_post_type() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Testimonial', 'text_domain' ),
		'name_admin_bar'      => __( 'Testimonials', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'           => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'        => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Testimonial', 'text_domain' ),
		'edit_item'           => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'         => __( 'Update Testimonial', 'text_domain' ),
		'view_item'           => __( 'View Testimonial', 'text_domain' ),
		'search_items'        => __( 'Search Testimonial', 'text_domain' ),
		'not_found'           => __( 'Not Found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Testimonial', 'text_domain' ),
		'description'         => __( 'Testimonials to be displayed on the homepage, etc.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-media-text',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'testimonial_post_type', 0 );

//Throw in a metabox for subtitles used in the sidebar 

function sidebar_subtitle_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function sidebar_subtitle_add_meta_box() {
	add_meta_box(
		'sidebar_subtitle-sidebar-subtitle',
		__( 'Sidebar Subtitle', 'sidebar_subtitle' ),
		'sidebar_subtitle_html',
		'post',
		'normal',
		'default'
	);
	add_meta_box(
		'sidebar_subtitle-sidebar-subtitle',
		__( 'Sidebar Subtitle', 'sidebar_subtitle' ),
		'sidebar_subtitle_html',
		'page',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sidebar_subtitle_add_meta_box' );

function sidebar_subtitle_html( $post) {
	wp_nonce_field( '_sidebar_subtitle_nonce', 'sidebar_subtitle_nonce' ); ?>

	<p>Add a snazzy subtitle to be displayed in the sidebar section of each page / post</p>

	<p>
		<label for="sidebar_subtitle_subtitle_text"><?php _e( 'Subtitle Text', 'sidebar_subtitle' ); ?></label><br>
		<textarea name="sidebar_subtitle_subtitle_text" id="sidebar_subtitle_subtitle_text" ><?php echo sidebar_subtitle_get_meta( 'sidebar_subtitle_subtitle_text' ); ?></textarea>
	
	</p>
	<p> If this is being used as a featured post, we want it to link somewhere </p>
	<p>
		<label for="sidebar_subtitle_link_url"><?php _e( 'Post Url', 'sidebar_subtitle' ); ?></label><br>
		<input type="text" name="sidebar_subtitle_link_url" id="sidebar_subtitle_subtitle_text" value="<?php echo sidebar_subtitle_get_meta( 'sidebar_subtitle_link_url' ) ?>"></input>
	
	</p>
	<?php
}

function sidebar_subtitle_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['sidebar_subtitle_nonce'] ) || ! wp_verify_nonce( $_POST['sidebar_subtitle_nonce'], '_sidebar_subtitle_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['sidebar_subtitle_subtitle_text'] ) )
		update_post_meta( $post_id, 'sidebar_subtitle_subtitle_text', esc_attr( $_POST['sidebar_subtitle_subtitle_text'] ) );
	if ( isset( $_POST['sidebar_subtitle_link_url'] ) )
		update_post_meta( $post_id, 'sidebar_subtitle_link_url', esc_url( $_POST['sidebar_subtitle_link_url'] ) );
}
add_action( 'save_post', 'sidebar_subtitle_save' );

/*
	Usage: sidebar_subtitle_get_meta( 'sidebar_subtitle_subtitle_text' )
*/


?>