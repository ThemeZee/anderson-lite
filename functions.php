<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'anderson_enqueue_scripts');

if ( ! function_exists( 'anderson_enqueue_scripts' ) ):
function anderson_enqueue_scripts() {

	// Register and Enqueue Stylesheet
	wp_enqueue_style('anderson-lite-stylesheet', get_stylesheet_uri());
	
	// Register Genericons
	wp_enqueue_style('anderson-lite-genericons', get_template_directory_uri() . '/css/genericons.css');

	// Register and enqueue navigation.js
	wp_enqueue_script('anderson-lite-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	
	// Register and Enqueue Fonts
	wp_enqueue_style('anderson-lite-default-font', '//fonts.googleapis.com/css?family=Carme');
	wp_enqueue_style('anderson-lite-default-title-font', '//fonts.googleapis.com/css?family=Share');

}
endif;


// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'anderson_enqueue_comment_reply' );

function anderson_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
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
	add_theme_support('custom-background', array('default-color' => 'eeeeee'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1340,
		'height' => 250,
		'flex-height' => true));

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
	add_image_size( 'custom-header-image', 1340, 250, true);
	
	// Add Post Thumbnail Size
	add_image_size( 'frontpage-intro', 750, 450, true);

}
endif;


// Register Sidebars
add_action( 'widgets_init', 'anderson_register_sidebars' );

if ( ! function_exists( 'anderson_register_sidebars' ) ):
function anderson_register_sidebars() {

	// Register Sidebars
	register_sidebar( array(
		'name' => __( 'Sidebar', 'anderson-lite' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except front page and fullwidth template.', 'anderson-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

	// Register Frontpage Template Widgets
	register_sidebar( array(
		'name' => __( 'Front Page Fullwidth Top', 'anderson-lite' ),
		'id' => 'frontpage-fullwidth-top',
		'description' => __( 'Top fullwidth widget area displayed on front page template.', 'anderson-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Front Page First Row (4 col)', 'anderson-lite' ),
		'id' => 'frontpage-first-row',
		'description' => __( 'Four column horizontal widget area on front page template.', 'anderson-lite' ),
		'before_widget' => '<div class="widget-col"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Front Page Second Row (3 col)', 'anderson-lite' ),
		'id' => 'frontpage-second-row',
		'description' => __( 'Three column horizontal widget area on front page template.', 'anderson-lite' ),
		'before_widget' => '<div class="widget-col"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Front Page Fullwidth Middle', 'anderson-lite' ),
		'id' => 'frontpage-fullwidth-middle',
		'description' => __( 'Middle fullwidth widget area displayed on front page template.', 'anderson-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Front Page Left', 'anderson-lite' ),
		'id' => 'frontpage-left-column',
		'description' => __( 'Left column widget area displayed on  front page template.', 'anderson-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Front Page Right', 'anderson-lite' ),
		'id' => 'frontpage-right-column',
		'description' => __( 'Right column widget area displayed on  front page template.', 'anderson-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Front Page Fullwidth Bottom', 'anderson-lite' ),
		'id' => 'frontpage-fullwidth-bottom',
		'description' => __( 'Bottom fullwidth widget area displayed on front page template.', 'anderson-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
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


// Display Credit Link Function
function anderson_credit_link() {
	
	printf(__( 'Powered by %1$s and the %2$s.', 'anderson-lite' ), 
			sprintf( '<a href="http://wordpress.org" title="WordPress">%s</a>', __( 'WordPress', 'anderson-lite' ) ),
			sprintf( '<a href="http://themezee.com/themes/anderson/" title="Anderson WordPress Theme">%s</a>', __( 'Anderson Theme', 'anderson-lite' ) )
		);
	
}

// Change Excerpt Length
add_filter('excerpt_length', 'anderson_excerpt_length');
function anderson_excerpt_length($length) {
    return 60;
}

// Change Excerpt More
add_filter('excerpt_more', 'anderson_excerpt_more');
function anderson_excerpt_more($more) {
    return '';
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

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// include Widget Files
require( get_template_directory() . '/inc/widgets/widget-frontpage-services.php' );
require( get_template_directory() . '/inc/widgets/widget-social-icons.php' );

?>