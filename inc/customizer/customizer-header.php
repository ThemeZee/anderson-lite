<?php
/**
 * Register Header Content section, settings and controls for Theme Customizer
 *
 */

// Add Theme Fonts section to Customizer
add_action( 'customize_register', 'anderson_customize_register_header_settings' );

function anderson_customize_register_header_settings( $wp_customize ) {

	// Add Section for Theme Fonts
	$wp_customize->add_section( 'anderson_section_header', array(
        'title'    => __( 'Header Content', 'anderson-lite' ),
        'priority' => 20,
		'panel' => 'anderson_panel_options'
		)
	);
	
	// Add TopHeader Content Headline
	$wp_customize->add_setting( 'anderson_theme_options[topheader_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_topheader_content', array(
            'label' => __( 'Top Header Content', 'anderson-lite' ),
            'section' => 'anderson_section_header',
            'settings' => 'anderson_theme_options[topheader_content]',
            'priority' => 	1
            )
        )
    );
	$wp_customize->add_setting( 'anderson_theme_options[header_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_header_icons', array(
        'label'    => __( 'Display Social Icons on header area', 'anderson-lite' ),
        'section'  => 'anderson_section_header',
        'settings' => 'anderson_theme_options[header_icons]',
        'type'     => 'checkbox',
		'priority' => 2
		)
	);
	
	// Add Header Content Headline
	$wp_customize->add_setting( 'anderson_theme_options[header_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_header_content', array(
            'label' => __( 'Header Content', 'anderson-lite' ),
            'section' => 'anderson_section_header',
            'settings' => 'anderson_theme_options[header_content]',
            'priority' => 	4
            )
        )
    );
	$wp_customize->add_setting( 'anderson_theme_options[header_content_description]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Description_Control(
        $wp_customize, 'anderson_control_header_content_description', array(
            'label' =>  __( 'The Header Content entered below will be displayed on the right hand side of the header area.', 'anderson-lite' ),
            'section' => 'anderson_section_header',
            'settings' => 'anderson_theme_options[header_content_description]',
            'priority' => 	5,
			'description' =>  __( 'Stay hungry. Stay foolish.', 'anderson-lite' )
            )
        )
    );

	// Add Settings and Controls for Header
	$wp_customize->add_setting( 'anderson_theme_options[header_phone]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
		)
	);
    $wp_customize->add_control( 'anderson_control_header_phone', array(
        'label'    => __( 'Phone', 'anderson-lite' ),
        'section'  => 'anderson_section_header',
        'settings' => 'anderson_theme_options[header_phone]',
        'type'     => 'text',
		'priority' => 6
		)
	);
	$wp_customize->add_setting( 'anderson_theme_options[header_email]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
		)
	);
    $wp_customize->add_control( 'anderson_control_header_email', array(
        'label'    => __( 'Email', 'anderson-lite' ),
        'section'  => 'anderson_section_header',
        'settings' => 'anderson_theme_options[header_email]',
        'type'     => 'text',
		'priority' => 7
		)
	);
	$wp_customize->add_setting( 'anderson_theme_options[header_address]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
		)
	);
    $wp_customize->add_control( 'anderson_control_header_address', array(
        'label'    => __( 'Address', 'anderson-lite' ),
        'section'  => 'anderson_section_header',
        'settings' => 'anderson_theme_options[header_address]',
        'type'     => 'text',
		'priority' => 8
		)
	);
	
}


?>