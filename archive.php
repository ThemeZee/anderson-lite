<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = anderson_theme_options();
?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">

		<div class="page-header">
			<?php the_archive_title( '<h2 class="archive-title">', '</h2>' ); ?>
		</div>
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', $theme_options['posts_length'] );
		
			endwhile;
			
		anderson_display_pagination();

		endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	