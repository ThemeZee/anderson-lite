/*
 * Customizer.js to reload changes on Theme Customizer Preview asynchronously.
 *
 */

( function( $ ) {

	/* Default WordPress Customizer settings */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#logo .site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '#logo .site-description' ).text( to );
		} );
	} );
	
	/* Theme Colors */	
	wp.customize( 'anderson_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			$('#topnav a, #footernav a, .entry a, .entry a:link, .comment a:link, .comment a:visited, #header-social-icons .social-icons-menu li a:hover, #header-social-icons .social-icons-menu li a:hover:before, .post-pagination a:hover, .post-pagination .current, #footer a')
				.css('color', newval );
			$('input[type="submit"], #image-nav .nav-previous a, #image-nav .nav-next a, #commentform #submit, .more-link, #frontpage-intro .entry .button, .postinfo a')
				.css('background', newval )
				.css('color', '#ffffff' );
		} );
	} );
	
	wp.customize( 'anderson_theme_options[navi_color]', function( value ) {
		value.bind( function( newval ) {
			$('#mainnav-icon:hover, #mainnav-menu a:hover, #mainnav-menu ul a:link, #mainnav-menu ul a:visited, #mainnav-menu li.current_page_item a, #mainnav-menu li.current-menu-item a, #mainnav-menu ul li.current_page_item ul li a, #mainnav-menu ul li.current-menu-item ul li a, #mainnav-menu li a:hover:before, #mainnav-menu li a:hover:after')
				.css('color', newval );
			$('#mainnav-menu ul a:hover, #mainnav-menu ul a:active')
				.css('color', '#222222' );
		} );
	} );
	
	wp.customize( 'anderson_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			$('#logo .site-title, .post-title a:link, .post-title a:visited, #header-content div:before')
				.css('color', newval );
			$('.post-title a:hover, .post-title a:active')
				.css('color', '#222222' );
		} );
	} );
	
	wp.customize( 'anderson_theme_options[widget_title_color]', function( value ) {
		value.bind( function( newval ) {
			$('.widgettitle')
				.css('color', newval );
		} );
	} );
	
	wp.customize( 'anderson_theme_options[widget_link_color]', function( value ) {
		value.bind( function( newval ) {
			$('.widget a:link, .widget a:visited, .social-icons-menu li a:hover, .social-icons-menu li a:hover:before, .widget-frontpage-services .widget-service-icon span')
				.css('color', newval );
			$('.tagcloud a')
				.css('background', newval );
			$('.tagcloud a:link, .tagcloud a:visited')
				.css('color', '#ffffff' );
			$('.widget-frontpage-services .widget-service-icon span')
				.css('border-color', newval );
		} );
	} );
	
} )( jQuery );