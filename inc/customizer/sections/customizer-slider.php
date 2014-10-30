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
		'description' => __( 'The slideshow displays your featured posts, which you can configure on the "Featured Content" section above.', 'anderson-lite' ),
        'priority' => 50,
		'panel' => 'anderson_panel_options' 
		)
	);

	// Add settings and controls for Post Slider
	$wp_customize->add_setting( 'anderson_theme_options[slider_activated]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_slider_activated', array(
            'label' => __( 'Activate Featured Post Slider', 'anderson-lite' ),
            'section' => 'anderson_section_slider',
            'settings' => 'anderson_theme_options[slider_activated]',
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
		'priority' => 3,
        'choices'  => array(
            'horizontal' => __( 'Horizontal Slider', 'anderson-lite' ),
            'fade' => __( 'Fade Slider', 'anderson-lite' )
			)
		)
	);
	
}

?>