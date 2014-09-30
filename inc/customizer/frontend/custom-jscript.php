<?php 
/***
 * Custom Javascript Options
 *
 * Passing Variables from custom Theme Options to the javascript files
 * of theme navigation and frontpage slider. 
 *
 */

// Passing Variables to Theme Navigation ( js/navigation.js)
add_action('wp_enqueue_scripts', 'anderson_custom_jscript_navigation');

if ( ! function_exists( 'anderson_custom_jscript_navigation' ) ):
function anderson_custom_jscript_navigation() { 

	// Set Parameters array
	$params = array(
		'menuTitle' => __('Menu', 'anderson-lite')
	);
	
	// Passing Parameters to Javascript
	wp_localize_script( 'anderson-lite-jquery-navigation', 'anderson_navigation_params', $params );
}
endif;


// Passing Variables to Frontpage Slider ( js/slider.js)
add_action('wp_enqueue_scripts', 'anderson_custom_jscript_slider');

if ( ! function_exists( 'anderson_custom_jscript_slider' ) ):
function anderson_custom_jscript_slider() { 
	
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Set Parameters array
	$params = array();
	
	// Define Slider Animation
	if( isset($theme_options['slider_animation']) ) :
		$params['animation'] = esc_attr($theme_options['slider_animation']);
	endif;
	
	// Define Slider Speed
	if( isset($theme_options['slider_speed']) ) :
		$params['speed'] = esc_attr($theme_options['slider_speed']);
	endif;
	
	// Passing Parameters to Javascript
	wp_localize_script( 'anderson-lite-jquery-frontpage_slider', 'anderson_slider_params', $params );
}
endif;


?>