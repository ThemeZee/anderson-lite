<?php 
add_action('wp_head', 'anderson_css_layout');
function anderson_css_layout() {
	
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Change Theme Layout to Left Sidebar
	if ( isset($theme_options['layout']) and $theme_options['layout'] == 'left-sidebar' ) :
	
		echo '<style type="text/css">
			@media only screen and (min-width: 60em) {
				#content {
					float: right;
					padding-right: 0;
					padding-left: 2em;
				}
				#sidebar {
					float: left;
				}
			}
		</style>';
	
	endif;

}


?>