<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php /* Embeds HTML5shiv to support HTML5 elements in older IE versions plus CSS Backgrounds */ ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php // Get Theme Options from Database
	$theme_options = anderson_theme_options();
?>

<div id="wrapper" class="hfeed">
	
	<div id="header-wrap">
	
		<div id="topheader" class="container clearfix">
			<?php locate_template('/inc/top-navigation.php', true); ?>
		</div>

		<header id="header" class="container clearfix" role="banner">

			<div id="logo">

				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo('name'); ?></h1>
				</a>
				
				<?php // Display Tagline on header if activated
				if ( isset($theme_options['header_tagline']) and $theme_options['header_tagline'] == true ) : ?>			
					<h3 class="site-description"><?php echo bloginfo('description'); ?></h3>
				<?php endif; ?>
			
			</div>
			
			<?php // Display Header Banner Ad
				anderson_display_header_banner(); ?>

		</header>
	
	</div>
	
	<nav id="mainnav" class="container clearfix" role="navigation">
		<div id="mainnav-icon"><span><?php _e('Menu', 'anderson-lite'); ?></span></div>
		<?php 
			// Get Navigation out of Theme Options
			wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_id' => 'mainnav-menu', 'echo' => true, 'fallback_cb' => 'anderson_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
		?>
	</nav>
	
	<?php // Display Custom Header Image
		anderson_display_custom_header(); ?>
		