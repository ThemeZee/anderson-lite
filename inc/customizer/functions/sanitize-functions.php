<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER SANITIZE FUNCTIONS ==========================*/

// Sanitize checkboxes
function anderson_sanitize_checkbox( $value ) {

	if ( $value == 1) :
        return 1;
	else:
		return '';
	endif;
}


// Sanitize the layout width value.
function anderson_sanitize_design( $value ) {

	if ( ! in_array( $value, array( 'boxed', 'wide' ) ) ) :
        $value = 'boxed';
	endif;

    return $value;
}


// Sanitize the layout sidebar value.
function anderson_sanitize_layout( $value ) {

	if ( ! in_array( $value, array( 'left-sidebar', 'right-sidebar', 'fullwidth' ) ) ) :
        $value = 'right-sidebar';
	endif;

    return $value;
}


// Sanitize footer content textarea
function anderson_sanitize_footer_content( $value ) {

	if ( current_user_can('unfiltered_html') ) :
		return $value;
	else :
		return stripslashes( wp_filter_post_kses( addslashes($value) ) );
	endif;
}



// Sanitize the post length value.
function anderson_sanitize_post_length( $value ) {

	if ( ! in_array( $value, array( 'index', 'excerpt' ) ) ) :
        $value = 'excerpt';
	endif;

    return $value;
}


?>