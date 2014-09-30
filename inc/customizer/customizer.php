<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );

// Load Customizer Settings
require( get_template_directory() . '/inc/customizer/customizer-header.php' );
require( get_template_directory() . '/inc/customizer/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/customizer-colors.php' );
require( get_template_directory() . '/inc/customizer/customizer-fonts.php' );


// Add Theme Options section to Customizer
add_action( 'customize_register', 'anderson_customize_register_options' );

function anderson_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'anderson_panel_options', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Theme Options', 'dynamicnews' ),
		'description'    => '',
	) );
	
	// Add Section for General Settings
	$wp_customize->add_section( 'anderson_section_options', array(
        'title'    => __( 'General Settings', 'anderson-lite' ),
        'priority' => 10,
		'panel' => 'anderson_panel_options' 
		)
	);
	
	// Add Settings and Controls for Theme Layout
	$wp_customize->add_setting( 'anderson_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'anderson_control_layout', array(
        'label'    => __( 'Theme Layout', 'anderson-lite' ),
        'section'  => 'anderson_section_options',
        'settings' => 'anderson_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 2,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'anderson-lite' ),
            'right-sidebar' => __( 'Right Sidebar', 'anderson-lite' ),
			'fullwidth' => __( 'Fullwidth (No Sidebar)', 'anderson-lite' ),
			)
		)
	);

	// Add Footer Settings
	$wp_customize->add_setting( 'anderson_theme_options[footer_content]', array(
        'default'           => 'Place your footer content here',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_footer_content'
		)
	);
    $wp_customize->add_control( 'anderson_control_footer_content', array(
        'label'    => __( 'Footer Content', 'anderson-lite' ),
        'section'  => 'anderson_section_options',
        'settings' => 'anderson_theme_options[footer_content]',
        'type'     => 'textarea',
		'priority' => 3
		)
	);
	$wp_customize->add_setting( 'anderson_theme_options[credit_link]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_credit_link', array(
        'label'    => __( 'Display Credit Link to ThemeZee on footer line.', 'anderson-lite' ),
        'section'  => 'anderson_section_options',
        'settings' => 'anderson_theme_options[credit_link]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = 'Background';
	
	// Add Header Tagline option
	$wp_customize->add_setting( 'anderson_theme_options[header_tagline]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_header_tagline', array(
        'label'    => __( 'Display Tagline below site title.', 'anderson-lite' ),
        'section'  => 'title_tagline',
        'settings' => 'anderson_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 99
		)
	);
	
	// Add Site Logo option & image uploader.
	$wp_customize->add_setting( 'site_logo', array(
		'default' => array('url' => false, 'id' => 0 ),
		'type'       => 'option',
		'capability' => 'manage_options',
		'transport'  => 'refresh'
	) );
	$wp_customize->add_control( new Anderson_Site_Logo_Control( $wp_customize, 'site_logo', array(
	    'label'    => __( 'Site Logo', 'anderson-lite' ),
	    'section'  => 'title_tagline',
	    'settings' => 'site_logo',
		'priority' => 100
	) ) );
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'anderson_customize_preview_js' );

function anderson_customize_preview_js() {
	wp_enqueue_script( 'anderson-lite-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140312', true );
}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'anderson_customize_preview_css' );

function anderson_customize_preview_css() {
	wp_enqueue_style( 'anderson-lite-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20140312' );

}


?>