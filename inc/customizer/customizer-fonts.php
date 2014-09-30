<?php
/**
 * Register Theme Font section, settings and controls for Theme Customizer
 *
 */

// Add Theme Fonts section to Customizer
add_action( 'customize_register', 'anderson_customize_register_fonts_settings' );

function anderson_customize_register_fonts_settings( $wp_customize ) {

	// Add Section for Theme Fonts
	$wp_customize->add_section( 'anderson_section_fonts', array(
        'title'    => __( 'Fonts', 'anderson-lite' ),
        'priority' => 50,
		'panel' => 'anderson_panel_options'
		)
	);

	// Add settings and controls for theme fonts
	$wp_customize->add_setting( 'anderson_theme_options[text_font]', array(
        'default'           => 'Carme',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => ''
		)
	);
	$wp_customize->add_control( new Anderson_Customize_Font_Control( 
		$wp_customize, 'text_font', array(
			'label'      => __( 'Default Text Font', 'anderson-lite' ),
			'section'    => 'anderson_section_fonts',
			'settings'   => 'anderson_theme_options[text_font]',
			'priority' => 1
		) ) 
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[title_font]', array(
        'default'           => 'Share',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => ''
		)
	);
	$wp_customize->add_control( new Anderson_Customize_Font_Control( 
		$wp_customize, 'title_font', array(
			'label'      => __( 'Title Font', 'anderson-lite' ),
			'section'    => 'anderson_section_fonts',
			'settings'   => 'anderson_theme_options[title_font]',
			'priority' => 1
		) ) 
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[navi_font]', array(
        'default'           => 'Share',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => ''
		)
	);
	$wp_customize->add_control( new Anderson_Customize_Font_Control( 
		$wp_customize, 'navi_font', array(
			'label'      => __( 'Navigation Font', 'anderson-lite' ),
			'section'    => 'anderson_section_fonts',
			'settings'   => 'anderson_theme_options[navi_font]',
			'priority' => 1
		) ) 
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[widget_title_font]', array(
        'default'           => 'Share',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => ''
		)
	);
	$wp_customize->add_control( new Anderson_Customize_Font_Control( 
		$wp_customize, 'widget_title_font', array(
			'label'      => __( 'Widget Title Font', 'anderson-lite' ),
			'section'    => 'anderson_section_fonts',
			'settings'   => 'anderson_theme_options[widget_title_font]',
			'priority' => 1
		) ) 
	);
	
}


?>