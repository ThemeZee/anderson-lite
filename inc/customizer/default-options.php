<?php
/**
 * Returns theme options
 *
 * Use sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function anderson_theme_options() {
    
	// Get theme options from DB
	$theme_options = get_option( 'anderson_theme_options' );

	// Check if user has already configured theme options
	if ( false === $theme_options ) :

		// Set Default Options
		$theme_options = anderson_default_options();
		
    endif;
	
	// Return theme options
	return $theme_options;
}


// Build default options array
function anderson_default_options() {

	$default_options = array(
		'layout' 							=> 'right-sidebar',
		'footer_content'					=> __('Place your footer content here', 'anderson-lite'),
		'credit_link' 						=> true,
		'header_icons' 						=> false,
		'header_ad_code' 					=> '',
		'posts_length' 						=> 'excerpt',
		'post_thumbnails_index'				=> true,
		'post_thumbnails_single' 			=> true,
		'image_grayscale' 					=> false
	);
	
	return $default_options;
}


?>