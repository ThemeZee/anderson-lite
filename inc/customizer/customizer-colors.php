<?php
/**
 * Register Theme Colors section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'anderson_customize_register_colors_settings' );

function anderson_customize_register_colors_settings( $wp_customize ) {

	// Add Sections for Theme Colors
	$wp_customize->add_section( 'anderson_section_colors', array(
        'title'    => __( 'Colors', 'anderson-lite' ),
        'priority' => 40,
		'panel' => 'anderson_panel_options'
		)
	);
	
	// Add settings and controls for theme colors	
	$wp_customize->add_setting( 'anderson_theme_options[link_color]', array(
        'default'           => '#00aa55',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'link_color', array(
			'label'      => __( 'Link Color', 'anderson-lite' ),
			'section'    => 'anderson_section_colors',
			'settings'   => 'anderson_theme_options[link_color]',
			'priority' => 1
		) ) 
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[navi_color]', array(
        'default'           => '#00aa55',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'navi_color', array(
			'label'      => __( 'Navigation Color', 'anderson-lite' ),
			'section'    => 'anderson_section_colors',
			'settings'   => 'anderson_theme_options[navi_color]',
			'priority' => 2
		) ) 
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[title_color]', array(
        'default'           => '#00aa55',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'title_color', array(
			'label'      => __( 'Post Title Color', 'anderson-lite' ),
			'section'    => 'anderson_section_colors',
			'settings'   => 'anderson_theme_options[title_color]',
			'priority' => 3
		) ) 
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[widget_title_color]', array(
        'default'           => '#222222',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'widget_title_color', array(
			'label'      => __( 'Widget Title Color', 'anderson-lite' ),
			'section'    => 'anderson_section_colors',
			'settings'   => 'anderson_theme_options[widget_title_color]',
			'priority' => 4
		) ) 
	);
	
	$wp_customize->add_setting( 'anderson_theme_options[widget_link_color]', array(
        'default'           => '#00aa55',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'widget_link_color', array(
			'label'      => __( 'Widget Link Color', 'anderson-lite' ),
			'section'    => 'anderson_section_colors',
			'settings'   => 'anderson_theme_options[widget_link_color]',
			'priority' => 5
		) ) 
	);
	
}


?>