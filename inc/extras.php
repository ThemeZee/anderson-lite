<?php
/**
 * Custom functions that are not template related
 *
 * @package Anderson Lite
 */

 
// Add Default Menu Fallback Function
function anderson_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Get Featured Posts
function anderson_get_featured_content() {
	return apply_filters( 'anderson_get_featured_content', false );
}


// Check if featured posts exists
function anderson_has_featured_content() {
	return ! is_paged() && (bool) anderson_get_featured_content();
}


// Change Excerpt Length
add_filter('excerpt_length', 'anderson_excerpt_length');
function anderson_excerpt_length($length) {
    return 30;
}


// Change Excerpt More
add_filter('excerpt_more', 'anderson_excerpt_more');
function anderson_excerpt_more($more) {
    
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_text']) and $theme_options['excerpt_text'] == true ) :
		return ' [...]';
	else :
		return '';
	endif;
}


// Change Excerpt Length for Featured Content
add_filter('excerpt_length', 'anderson_excerpt_length');
function anderson_slideshow_excerpt_length($length) {
    return 20;
}


// Change Excerpt Length for Featured Content
add_filter('excerpt_length', 'anderson_excerpt_length');
function anderson_category_posts_widgets_excerpt_length($length) {
    return 20;
}