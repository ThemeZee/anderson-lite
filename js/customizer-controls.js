/*
 * Customizer-controls.js
 *
 * Add Theme Page, Theme Documentation and Rate this theme quick links to theme options panel in customizer
 *
 */

( function( $ ) {

	// Add Theme Links
	if ('undefined' !== typeof anderson_theme_links) {
		
		// Theme Links Wrapper
		box = $('<div class="anderson-theme-links"></div>')
			.css({
				'margin-top' : '14px',
				'padding' : '2px 14px 14px',
				'line-height': '2',
				'font-size' : '14px',
				'clear' : 'both'
			});
		
		title = $('<h3></h3>').text(anderson_theme_links.title).css({ 'margin-bottom' : '4px' });
		
		// Theme Links
		themePage = $('<a class="anderson-theme-page"></a>')
			.attr('href', anderson_theme_links.themeURL)
			.attr('target', '_blank')
			.text(anderson_theme_links.themeLabel)
			.css({ 'display' : 'block' });
		
		themeDocu = $('<a class="anderson-theme-docu"></a>')
			.attr('href', anderson_theme_links.docuURL)
			.attr('target', '_blank')
			.text(anderson_theme_links.docuLabel)
			.css({ 'display' : 'block' });
		
		rateTheme = $('<a class="anderson-rate-theme"></a>')
			.attr('href', anderson_theme_links.rateURL)
			.attr('target', '_blank')
			.text(anderson_theme_links.rateLabel)
			.css({ 'display' : 'block' });
		
		// Add Links to Box
		content = box.append(title).append(themePage).append(themeDocu).append(rateTheme);
		
		setTimeout(function () {
			$('#accordion-panel-anderson_panel_options .control-panel-content').append(content);
		}, 200);

		// Remove accordion click event
		$('.anderson-theme-links a').on('click', function(e) {
			e.stopPropagation();
		});
	}
	
} )( jQuery );