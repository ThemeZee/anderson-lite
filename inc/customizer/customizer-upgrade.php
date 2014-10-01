<?php
/**
 * Register PRO Version section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'anderson_customize_register_upgrade_settings' );

function anderson_customize_register_upgrade_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'anderson_section_upgrade', array(
        'title'    => __( 'PRO Version', 'andersonlite' ),
        'priority' => 70,
		'panel' => 'anderson_panel_options' 
		)
	);

	// Add PRO Version Section
	$wp_customize->add_setting( 'anderson_theme_options[pro_version_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Header_Control(
        $wp_customize, 'anderson_control_pro_version_label', array(
            'label' => __( 'Need more features?', 'andersonlite' ),
            'section' => 'anderson_section_upgrade',
            'settings' => 'anderson_theme_options[pro_version_label]',
            'priority' => 	1
            )
        )
    );
	$wp_customize->add_setting( 'anderson_theme_options[pro_version]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Text_Control(
        $wp_customize, 'anderson_control_pro_version', array(
            'label' =>  __( 'Check out the PRO version which comes with additional features and advanced customization options.', 'andersonlite' ),
            'section' => 'anderson_section_upgrade',
            'settings' => 'anderson_theme_options[pro_version]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'anderson_theme_options[pro_version_button]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Anderson_Customize_Button_Control(
        $wp_customize, 'anderson_control_pro_version_button', array(
            'label' => __('Learn more about the PRO Version', 'andersonlite'),
			'section' => 'anderson_section_upgrade',
            'settings' => 'anderson_theme_options[pro_version_button]',
            'priority' => 	3
            )
        )
    );

}

?>