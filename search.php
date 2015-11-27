<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = anderson_theme_options();
?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">
		
			<?php // Display breadcrumbs or search title
			if ( function_exists( 'themezee_breadcrumbs' ) ) :

				themezee_breadcrumbs(); 
				
			else : ?>
			
				<div class="page-header">
					<h2 id="search-title" class="archive-title">
						<?php printf( esc_html__( 'Search Results for: %s', 'anderson-lite' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h2>
				</div>
			
			<?php
			endif;
		
			if (have_posts()) :

				while (have_posts()) : the_post();
		
					if ( 'post' == get_post_type() ) :
			
						get_template_part( 'content', $theme_options['posts_length'] );
					
					else :
					
						get_template_part( 'content', 'search' );
						
					endif;
			
				endwhile;
		
				anderson_display_pagination();

			else : ?>

			<div class="type-page">
				
				<h2 class="page-title entry-title"><?php esc_html_e( 'No matches', 'anderson-lite' ); ?></h2>
				
				<div class="entry clearfix">
					
					<p><?php esc_html_e( 'Please try again, or use the navigation menus to find what you search for.', 'anderson-lite' ); ?></p>
					
					<?php get_search_form(); ?>
					
				</div>
				
			</div>

			<?php endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>