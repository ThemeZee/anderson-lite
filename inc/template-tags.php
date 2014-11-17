<?php
/***
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 */
	
// Display Custom Header
if ( ! function_exists( 'anderson_display_header_banner' ) ):
	
	function anderson_display_header_banner() {
	
		// Get Theme Options from Database
		$theme_options = anderson_theme_options();

		// Display Header Banner Ad
		if ( isset($theme_options['header_ad_code']) and $theme_options['header_ad_code'] <> '' ) : ?>

			<div id="header-banner" class="clearfix">
				<?php echo do_shortcode(wp_kses_post($theme_options['header_ad_code'])); ?>
			</div>

		<?php
		endif;
	
	}
	
endif;


// Display Custom Header
if ( ! function_exists( 'anderson_display_custom_header' ) ):
	
	function anderson_display_custom_header() {
			
		// Check if page is displayed and featured header image is used
		if( is_page() && has_post_thumbnail() ) :
		?>
			<div id="custom-header" class="container">
				<?php the_post_thumbnail('custom-header-image'); ?>
			</div>
<?php
		// Check if there is a custom header image
		elseif( get_header_image() ) :
		?>
			<div id="custom-header" class="container">
				<img src="<?php echo get_header_image(); ?>" />
			</div>
<?php 
		endif;

	}
	
endif;


// Display Postmeta Data
if ( ! function_exists( 'anderson_display_postmeta' ) ):
	
	function anderson_display_postmeta() { ?>
		
		<span class="meta-date">
		<?php printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a>', 'anderson-lite'), 
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		?>
		</span>
		<span class="meta-author">
		<?php printf(__('by <a href="%1$s" title="%2$s" rel="author">%3$s</a>', 'anderson-lite'), 
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'anderson-lite' ), get_the_author() ) ),
				get_the_author()
			);
		?>
		</span>
	<?php
	}
	
endif;


// Display Post Thumbnail on Archive Pages
function anderson_display_thumbnail_and_categories_index() {
	
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Display Post Thumbnail if it exists and feature is activated
	if ( has_post_thumbnail() and 
		(isset($theme_options['post_thumbnails_index']) and $theme_options['post_thumbnails_index'] == true ) ) : ?>

		<div class="post-image">
		
			<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
				<?php the_post_thumbnail('post-thumbnail', array('class' => 'alignleft')); ?>
			</a>
			
			<div class="image-post-categories post-categories">
				<?php echo get_the_category_list(''); ?>
			</div>
			
		</div>
		
<?php // Otherwise only display Categories
	else: ?>
	
		<div class="single-post-categories post-categories clearfix">
			<?php echo get_the_category_list(''); ?>
		</div>

<?php
	endif;

}


// Display Post Thumbnail on single posts
function anderson_display_thumbnail_and_categories_single() {
	
	// Get Theme Options from Database
	$theme_options = anderson_theme_options();
	
	// Display Post Thumbnail if it exists and feature is activated
	if ( has_post_thumbnail() and 
		(isset($theme_options['post_thumbnails_single']) and $theme_options['post_thumbnails_single'] == true ) ) : ?>

		<div class="post-image">
		
			<?php the_post_thumbnail('post-thumbnail', array('class' => 'alignleft')); ?>

			<div class="image-post-categories post-categories">
				<?php echo get_the_category_list(''); ?>
			</div>
			
		</div>
		
<?php // Otherwise only display Categories
	else: ?>
	
		<div class="single-post-categories post-categories clearfix">
			<?php echo get_the_category_list(''); ?>
		</div>

<?php
	endif;

}
	
// Display Content Pagination
if ( ! function_exists( 'anderson_display_pagination' ) ):
	
	function anderson_display_pagination() { 
		
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		 $paginate_links = paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',				
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total' => $wp_query->max_num_pages,
				'next_text' => '&raquo;',
				'prev_text' => '&laquo'
			) );

		// Display the pagination if more than one page is found
		if ( $paginate_links ) : ?>
				
			<div class="post-pagination clearfix">
				<?php echo $paginate_links; ?>
			</div>
		
		<?php
		endif;
		
	}
	
endif;


// Display Social Icons
function anderson_display_social_icons() {

	// Check if there is a social_icons menu
	if( has_nav_menu( 'social' ) ) :

		// Display Social Icons Menu
		wp_nav_menu( array(
			'theme_location' => 'social',
			'container' => false,
			'menu_class' => 'social-icons-menu',
			'echo' => true,
			'fallback_cb' => '',
			'before' => '',
			'after' => '',
			'link_before' => '<span class="screen-reader-text">',
			'link_after' => '</span>',
			'depth' => 1
			)
		);

	else: // Display Hint how to configure Social Icons ?>

		<p class="social-icons-hint">
			<?php _e('Please go to WP-Admin-> Appearance-> Menus and create a new custom menu with custom links to all your social networks. Then click on "Manage Locations" tab and assign your created menu to the "Social Icons" theme location.', 'anderson-lite'); ?>
		</p>
<?php
	endif;

}


?>