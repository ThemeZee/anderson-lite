<?php
/***
 * Header Content
 *
 * This template displays the content in the right-hand header area based on theme options.
 *
 */
 
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();

	// Display Phone Number on Header
	if ( isset($theme_options['header_phone']) and $theme_options['header_phone'] == true ) : ?>

		<div id="header-phone">
			<span><?php echo esc_attr($theme_options['header_phone']); ?></span>
		</div>

	<?php
	endif;
	
	// Display Email on Header
	if ( isset($theme_options['header_email']) and $theme_options['header_email'] == true ) : ?>

		<div id="header-email">
			<span><?php echo esc_attr($theme_options['header_email']); ?></span>
		</div>

	<?php
	endif;
	
	// Display Address ion Header
	if ( isset($theme_options['header_address']) and $theme_options['header_address'] == true ) : ?>

		<div id="header-address">
			<span><?php echo esc_attr($theme_options['header_address']); ?></span>
		</div>

	<?php
	endif;
	

?>