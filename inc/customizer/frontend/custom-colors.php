<?php
/***
 * Custom Color Options
 *
 * Get custom colors from theme options and embed CSS color settings 
 * in the <head> area of the theme. 
 *
 */


// Add Custom Colors
add_action('wp_head', 'anderson_custom_colors');
function anderson_custom_colors() { 
	
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();

	// Set Color CSS Variable
	$color_css = '';
	
	// Set Link Color
	if ( isset($theme_options['link_color']) and $theme_options['link_color'] <> '#00aa55' ) : 
	
		$color_css .= '
			a, a:link, a:visited, .comment a:link, .comment a:visited,
			#header-social-icons .social-icons-menu li a:hover, #header-social-icons .social-icons-menu li a:hover:before, 
			.post-pagination a:hover, .post-pagination .current, #footer a {
				color: '. $theme_options['link_color']  .';
			}
			input[type="submit"], #image-nav .nav-previous a, #image-nav .nav-next a,
			#commentform #submit, .more-link, #frontpage-intro .entry .button, .postinfo a {
				background-color: '. $theme_options['link_color']  .';
			}';
			
	endif;
	
	// Set Navigation Color
	if ( isset($theme_options['navi_color']) and $theme_options['navi_color'] <> '#00aa55' ) : 
	
		$color_css .= '
			#mainnav-icon:hover, #mainnav-menu a:hover, #mainnav-menu ul a:link, #mainnav-menu ul a:visited,
			#mainnav-menu li.current_page_item a, #mainnav-menu li.current-menu-item a,
			#mainnav-menu ul li.current_page_item ul li a, #mainnav-menu ul li.current-menu-item ul li a,
			#mainnav-menu li a:hover:before, #mainnav-menu li a:hover:after {
				color: '. $theme_options['navi_color'] .';
			}
			#mainnav-menu ul a:hover, #mainnav-menu ul a:active {
				color: #222;
			}';
			
	endif;
	
	// Set Post Title Color
	if ( isset($theme_options['title_color']) and $theme_options['title_color'] <> '#00aa55' ) : 
	
		$color_css .= '
			#logo .site-title, .post-title a:link, .post-title a:visited, #header-content div:before {
				color: '. $theme_options['title_color'].';
			}
			.post-title a:hover, .post-title a:active {
				color: #222222;
			}';
			
	endif;
	
	// Set Widget Title Color
	if ( isset($theme_options['widget_title_color']) and $theme_options['widget_title_color'] <> '#222222' ) : 
	
		$color_css .= '
			.widgettitle {
				color: '. $theme_options['widget_title_color'] .';
			}';
			
	endif;
	
	// Set Widget Link Color
	if ( isset($theme_options['widget_link_color']) and $theme_options['widget_link_color'] <> '#00aa55' ) : 
	
		$color_css .= '
			.widget a:link, .widget a:visited, .social-icons-menu li a:hover, .social-icons-menu li a:hover:before {
				color: '. $theme_options['widget_link_color'].';
			}
			.tagcloud a {
				background-color: '. $theme_options['widget_link_color']  .';
			}
			.tagcloud a:link, .tagcloud a:visited {
				color: #fff;
			}
			.widget-frontpage-services .widget-service-icon span {
				color: '. $theme_options['widget_link_color'].';
				border: 3px solid '. $theme_options['widget_link_color'].';
			}';
			
	endif;
	
	
	// Print Color CSS
	if ( isset($color_css) and $color_css <> '' ) :
	
		echo '<style type="text/css">';
		echo $color_css;
		echo '</style>';
	
	endif;
	
}