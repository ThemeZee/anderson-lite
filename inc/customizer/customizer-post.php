<?php
/**
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 */

// Add Theme Fonts section to Customizer
add_action( 'customize_register', 'anderson_customize_register_post_settings' );

function anderson_customize_register_post_settings( $wp_customize ) {

	// Add Section for Theme Fonts
	$wp_customize->add_section( 'anderson_section_post', array(
        'title'    => __( 'Post Settings', 'anderson-lite' ),
        'priority' => 30,
		'panel' => 'anderson_panel_options'
		)
	);

		// Add Settings and Controls for Posts
	$wp_customize->add_setting( 'anderson_theme_options[posts_length]', array(
        'default'           => 'excerpt',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_post_length'
		)
	);
    $wp_customize->add_control( 'anderson_control_posts_length', array(
        'label'    => __( 'Post Length', 'anderson-lite' ),
        'section'  => 'anderson_section_post',
        'settings' => 'anderson_theme_options[posts_length]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'index' => __( 'Show full posts', 'anderson-lite' ),
            'excerpt' => __( 'Show post summaries (excerpt)', 'anderson-lite' )
			)
		)
	);
	
	// Add Post Images Headline
	$wp_customize->add_setting( 'anderson_theme_options[post_images]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_post_images', array(
            'label' => __( 'Post Images', 'anderson-lite' ),
            'section' => 'anderson_section_post',
            'settings' => 'anderson_theme_options[post_images]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'anderson_theme_options[post_thumbnails_index]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_posts_thumbnails_index', array(
        'label'    => __( 'Display featured images on archive pages', 'anderson-lite' ),
        'section'  => 'anderson_section_post',
        'settings' => 'anderson_theme_options[post_thumbnails_index]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);

	$wp_customize->add_setting( 'anderson_theme_options[post_thumbnails_single]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'anderson_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'anderson_control_posts_thumbnails_single', array(
        'label'    => __( 'Display featured images on single posts', 'anderson-lite' ),
        'section'  => 'anderson_section_post',
        'settings' => 'anderson_theme_options[post_thumbnails_single]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);
	
}


?>