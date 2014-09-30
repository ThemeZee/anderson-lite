<?php
/*
Template Name: Frontpage Template
*/
?>
<?php get_header(); ?>

	<?php // Display Page Content as Frontpage Intro
	if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="frontpage-intro" class="clearfix">
			
			<div id="frontpage-intro-left">
			
				<h2 class="page-title"><?php the_title(); ?></h2>

				<div class="entry clearfix">
					<?php the_content(); ?>		
				</div>
				
			</div>
			
			<div id="frontpage-intro-right">
			
				<?php the_post_thumbnail('frontpage-intro'); ?>
				
			</div>
				
		</div>
			
	<?php
			endwhile;
		
		endif; 
	?>

	<div id="wrap" class="template-frontpage clearfix">

	<?php // Display Front Page Fullwidth Top Widgets
	if( is_active_sidebar('frontpage-fullwidth-top') ) : ?>
	
		<div id="frontpage-widgets-fullwidth-top" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-fullwidth-top'); ?>
		</div>
		
	<?php endif; ?>
	
	<?php // Display Front Page First Row Widgets
	if( is_active_sidebar('frontpage-first-row') ) : ?>
	
		<div id="frontpage-widgets-first-row" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-first-row'); ?>
		</div>
		
	<?php endif; ?>
	
	<?php // Display Front Page Second Row Widgets
	if( is_active_sidebar('frontpage-second-row') ) : ?>
		
		<div id="frontpage-widgets-second-row-wrap">
			
			<div id="frontpage-widgets-second-row" class="frontpage-widgets clearfix">
				<?php dynamic_sidebar('frontpage-second-row'); ?>
			</div>
			
		</div>
		
	<?php endif; ?>
	
	<?php // Display Front Page Fullwidth Middle Widgets
	if( is_active_sidebar('frontpage-fullwidth-middle') ) : ?>
	
		<div id="frontpage-widgets-fullwidth-middle" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-fullwidth-middle'); ?>
		</div>
		
	<?php endif; ?>
	
	<?php // Display Frontpage Widgets Left and Right Column
	if( is_active_sidebar('frontpage-left-column') or is_active_sidebar('frontpage-right-column') ) : ?>
	
		<div id="frontpage-widgets-columns" class="clearfix">
		
			<div id="frontpage-widgets-left-col" class="frontpage-widgets clearfix">
				<?php dynamic_sidebar('frontpage-left-column'); ?>
			</div>
			
			<div id="frontpage-widgets-right-col" class="frontpage-widgets clearfix">
				<?php dynamic_sidebar('frontpage-right-column'); ?>
			</div>
			
		</div>
		
	<?php endif; ?>
	
	<?php // Display Front Page Fullwidth Bottom Widgets
	if( is_active_sidebar('frontpage-fullwidth-bottom') ) : ?>
	
		<div id="frontpage-widgets-fullwidth-bottom" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-fullwidth-bottom'); ?>
		</div>
		
	<?php endif; ?>
	
	</div>
	
<?php get_footer(); ?>	