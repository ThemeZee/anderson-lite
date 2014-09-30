<?php

// Include Fonts from Google Web Fonts API
function anderson_load_web_fonts() { 

	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Default Fonts which haven't to be load from Google
	$default_fonts = array('Arial', 'Verdana', 'Tahoma', 'Times New Roman');
	
	// Embed Text Font
	if( isset($theme_options['text_font']) and !in_array($options['text_font'], $default_fonts)) :
		
		wp_register_style('anderson_text_font', '//fonts.googleapis.com/css?family=' . $theme_options['text_font']);
		wp_enqueue_style('anderson_text_font');
		
		// add embedded font to array to prevent second font embed
		$default_fonts[] = $theme_options['text_font']; 
	endif;
	
	// Embed Title Font
	if( isset($theme_options['title_font']) and !in_array($options['title_font'], $default_fonts)) :
		
		wp_register_style('anderson_title_font', '//fonts.googleapis.com/css?family=' . $theme_options['title_font']);
		wp_enqueue_style('anderson_title_font');
		
		// add embedded font to array to prevent second font embed
		$default_fonts[] = $theme_options['title_font']; 
	endif;
	
	// Embed Navigation Font
	if( isset($theme_options['navi_font']) and !in_array($options['navi_font'], $default_fonts)) :
		
		wp_register_style('anderson_navi_font', '//fonts.googleapis.com/css?family=' . $theme_options['navi_font']);
		wp_enqueue_style('anderson_navi_font');
		
		// add embedded font to array to prevent second font embed
		$default_fonts[] = $theme_options['navi_font']; 
	endif;

	// Embed Widget Title Font
	if( isset($theme_options['widget_title_font']) and !in_array($options['widget_title_font'], $default_fonts)) :
		
		wp_register_style('anderson_widget_title_font', '//fonts.googleapis.com/css?family=' . $theme_options['widget_title_font']);
		wp_enqueue_style('anderson_widget_title_font');
		
		// add embedded font to array to prevent second font embed
		$default_fonts[] = $theme_options['widget_title_font']; 
	endif;

}
add_action('wp_enqueue_scripts', 'anderson_load_web_fonts');


add_action('wp_head', 'anderson_css_fonts');
function anderson_css_fonts() {
	
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Set Font CSS Variable
	$font_css = '';
	
	// Set Default Text Font
	if ( isset($theme_options['text_font']) and $theme_options['text_font'] <> 'Carme' ) : 
	
		$font_css .= '
			body, input, textarea, #mainnav-menu ul a {
				font-family: "'.esc_attr($theme_options['text_font']).'";
			}';
		
	endif;
	
	// Set Title Font
	if ( isset($theme_options['title_font']) and $theme_options['title_font'] <> 'Share' ) : 
	
		$font_css .= '
			#logo .site-title, .page-title, .post-title, .archive-title,
			#comments .comments-title, #respond #reply-title {
				font-family: "'.esc_attr($theme_options['title_font']).'";
			}';
		
	endif;
	
	// Set Navigation Font
	if ( isset($theme_options['navi_font']) and $theme_options['navi_font'] <> 'Share' ) : 
	
		$font_css .= '
			#mainnav-icon, #mainnav-menu a {
				font-family: "'.esc_attr($theme_options['navi_font']).'";
			}';
		
	endif;
	
	// Set Widget Title Font
	if ( isset($theme_options['widget_title_font']) and $theme_options['widget_title_font'] <> 'Share' ) : 
	
		$font_css .= '
			.widgettitle {
				font-family: "'.esc_attr($theme_options['widget_title_font']).'";
			}';
		
	endif;
	
	// Print Font CSS
	if ( isset($font_css) and $font_css <> '' ) :
	
		echo '<style type="text/css">';
		echo $font_css;
		echo '</style>';
	
	endif;
}


