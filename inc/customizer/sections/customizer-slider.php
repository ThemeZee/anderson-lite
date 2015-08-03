<?php
/**
 * Register Post Slider section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'anderson_customize_register_slider_settings' );

function anderson_customize_register_slider_settings( $wp_customize ) {

	// Add Sections for Slider Settings
	$wp_customize->add_section( 'anderson_section_slider', array(
        'title'    => __( 'Post Slider', 'anderson-lite' ),
        'priority' => 50,
		'panel' => 'anderson_panel_options' 
		)
	);

	// Add settings and controls for Post Slider
	$wp_customize->add_setting( 'anderson_theme_options[slider_active_header]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_slider_active_header', array(
            'label' => __( 'Activate Featured Post Slider', 'anderson-lite' ),
            'section' => 'anderson_section_slider',
            'settings' => 'anderson_theme_options[slider_active_header]',
            'priority' => 	1
            )
        )
    );
	
	$wp_customize->add_setting( 'anderson_theme_options[slider_active]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_slider_active', array(
        'label'    => __( 'Display Slider above latest blog posts.', 'anderson-lite' ),
        'section'  => 'anderson_section_slider',
        'settings' => 'anderson_theme_options[slider_active]',
        'type'     => 'checkbox',
		'priority' => 2
		)
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[slider_active_magazine]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_slider_active_magazine', array(
        'label'    => __( 'Display Slider on Magazine Homepage template.', 'anderson-lite' ),
        'section'  => 'anderson_section_slider',
        'settings' => 'anderson_theme_options[slider_active_magazine]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);
	
	// Select Featured Posts
	$wp_customize->add_setting( 'anderson_theme_options[featured_posts_header]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_featured_posts_header', array(
            'label' => __( 'Select Featured Posts', 'anderson-lite' ),
            'section' => 'anderson_section_slider',
            'settings' => 'anderson_theme_options[featured_posts_header]',
            'priority' => 4,
			'active_callback' => 'anderson_slider_activated_callback'
            )
        )
    );
	$wp_customize->add_setting( 'anderson_theme_options[featured_posts_description]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Description_Control(
        $wp_customize, 'anderson_control_featured_posts_description', array(
			'label'    => __( 'The slideshow displays all your featured posts. You can easily feature posts by a tag of your choice.', 'anderson-lite' ),
            'section' => 'anderson_section_slider',
            'settings' => 'anderson_theme_options[featured_posts_description]',
            'priority' => 5,
			'active_callback' => 'anderson_slider_activated_callback'
            )
        )
    );

	$wp_customize->add_setting( 'anderson_theme_options[slider_animation]', array(
        'default'           => 'horizontal',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_slider_animation'
		)
	);
    $wp_customize->add_control( 'anderson_control_slider_animation', array(
        'label'    => __( 'Slider Animation', 'anderson-lite' ),
        'section'  => 'anderson_section_slider',
        'settings' => 'anderson_theme_options[slider_animation]',
        'type'     => 'radio',
		'priority' => 9,
		'active_callback' => 'anderson_slider_activated_callback',
        'choices'  => array(
            'horizontal' => __( 'Horizontal Slider', 'anderson-lite' ),
            'fade' => __( 'Fade Slider', 'anderson-lite' )
			)
		)
	);
	
}

?>