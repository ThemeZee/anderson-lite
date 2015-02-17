<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'anderson_enqueue_scripts');

if ( ! function_exists( 'anderson_enqueue_scripts' ) ):
function anderson_enqueue_scripts() {

	// Register and Enqueue Stylesheet
	wp_enqueue_style('anderson-lite-stylesheet', get_stylesheet_uri());
	
	// Register Genericons
	wp_enqueue_style('anderson-lite-genericons', get_template_directory_uri() . '/css/genericons/genericons.css');

	// Register and enqueue navigation.js
	wp_enqueue_script('anderson-lite-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Register and Enqueue FlexSlider JS and CSS if necessary
	if ( ( isset($theme_options['slider_active']) and $theme_options['slider_active'] == true )
		|| ( isset($theme_options['slider_active_magazine']) and $theme_options['slider_active_magazine'] == true ) ) :

		// FlexSlider CSS
		wp_enqueue_style('anderson-lite-flexslider', get_template_directory_uri() . '/css/flexslider.css');

		// FlexSlider JS
		wp_enqueue_script('anderson-lite-flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'));

		// Register and enqueue slider.js
		wp_enqueue_script('anderson-lite-post-slider', get_template_directory_uri() .'/js/slider.js', array('anderson-lite-flexslider'));

	endif;
	
	// Register and Enqueue Font
	wp_enqueue_style('anderson-lite-default-fonts', anderson_fonts_url(), array(), null );

}
endif;

// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'anderson_enqueue_comment_reply' );

function anderson_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/*
* Retrieve Font URL to register default Google Fonts
* Source: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
function anderson_fonts_url() {
    $fonts_url = '';

	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Only embed Google Fonts if not deactivated
	if ( ! ( isset($theme_options['deactivate_google_fonts']) and $theme_options['deactivate_google_fonts'] == true ) ) :
		
		// Set Default Fonts
		$font_families = array('Carme:400,700', 'Share');
		 
		// Set Google Font Query Args
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		
		// Create Fonts URL
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		
	endif;
	
	return apply_filters( 'anderson_google_fonts_url', $fonts_url );
	
}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'anderson_setup' );

if ( ! function_exists( 'anderson_setup' ) ):
function anderson_setup() {

	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 860;
		
	// init Localization
	load_theme_textdomain('anderson-lite', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => '777777'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1300,
		'height' => 250,
		'flex-height' => true));
		
	// Add theme support for Jetpack Featured Content
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'anderson_get_featured_content',
		'max_posts'  => 4
		)
	);
	
	// Add Theme Support for Anderson Pro Plugin
	add_theme_support( 'anderson-pro' );

	// Register Navigation Menus
	register_nav_menu( 'primary', __('Main Navigation', 'anderson-lite') );
	register_nav_menu( 'secondary', __('Top Navigation', 'anderson-lite') );
	register_nav_menu( 'footer', __('Footer Navigation', 'anderson-lite') );
	
	// Register Social Icons Menu
	register_nav_menu( 'social', __('Social Icons', 'anderson-lite') );

}
endif;


// Add custom Image Sizes
add_action( 'after_setup_theme', 'anderson_add_image_sizes' );

if ( ! function_exists( 'anderson_add_image_sizes' ) ):
function anderson_add_image_sizes() {

	// Add Post Thumbnail Size
	add_image_size( 'post-thumbnail', 275, 275, true);
	
	// Add Custom Header Image Size
	add_image_size( 'custom-header-image', 1300, 250, true);
	
	// Add Category Post Widget image sizes
	add_image_size( 'category-posts-widget-small', 95, 95, true);
	add_image_size( 'category-posts-widget-big', 460, 325, true);
	
	// Add Slider Image Size
	add_image_size( 'slider-image', 840, 440, true);

}
endif;


// Register Sidebars
add_action( 'widgets_init', 'anderson_register_sidebars' );

if ( ! function_exists( 'anderson_register_sidebars' ) ):
function anderson_register_sidebars() {

	// Register Sidebar
	register_sidebar( array(
		'name' => __( 'Sidebar', 'anderson-lite' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except Magazine Homepage and Fullwidth template.', 'anderson-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));
	
	// Register Magazine Homepage Widgets
	register_sidebar( array(
		'name' => __( 'Magazine Homepage', 'anderson-lite' ),
		'id' => 'magazine-homepage',
		'description' => __( 'Appears on "Magazine Homepage" page template only. You can use the Category Posts widgets here.', 'anderson-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

}
endif;


/*==================================== THEME FUNCTIONS ====================================*/

// Creates a better title element text for output in the head section
add_filter( 'wp_title', 'anderson_wp_title', 10, 2 );

function anderson_wp_title( $title, $sep = '' ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'anderson-lite' ), max( $paged, $page ) );

	return $title;
}


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
    return 60;
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
    return 28;
}


// Change Excerpt Length for Featured Content
add_filter('excerpt_length', 'anderson_excerpt_length');
function anderson_category_posts_widgets_excerpt_length($length) {
    return 12;
}


// Custom Template for comments and pingbacks.
if ( ! function_exists( 'anderson_list_comments' ) ):
function anderson_list_comments($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;

	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'anderson-lite' ); ?> <?php comment_author_link(); ?>
			<?php edit_comment_link( __( '(Edit)', 'anderson-lite' ), '<span class="edit-link">', '</span>' ); ?>
			</p>

	<?php else : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 56 ); ?>
					<?php printf(__('<span class="fn">%s</span>', 'anderson-lite'), get_comment_author_link()) ?>
				</div>

		<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'anderson-lite' ); ?></p>
		<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf(__('%1$s at %2$s', 'anderson-lite'), get_comment_date(),  get_comment_time()) ?></a>
					<?php edit_comment_link(__('(Edit)', 'anderson-lite'),'  ','') ?>
				</div>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>

			</div>
<?php
	endif;

}
endif;


/*==================================== INCLUDE FILES ====================================*/

// include Theme Info page
require( get_template_directory() . '/inc/theme-info.php' );

// include Theme Customizer Options
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/customizer/default-options.php' );

// include Customization Files
require( get_template_directory() . '/inc/customizer/frontend/custom-layout.php' );
require( get_template_directory() . '/inc/customizer/frontend/custom-slider.php' );

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// include Widget Files
require( get_template_directory() . '/inc/widgets/widget-category-posts-boxed.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-columns.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-grid.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-horizontal.php' );

// Include Featured Content class in case it does not exist yet (e.g. user has not Jetpack installed)
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

?>