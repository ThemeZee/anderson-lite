<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = anderson_theme_options();
?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">

		<h2 id="date-title" class="archive-title">
			<?php // Display Archive Title
			if ( is_date() ) :
				printf( __( 'Monthly Archives: %s', 'anderson-lite' ), '<span>' . get_the_date( _x( 'F Y', 'date format of monthly archives', 'anderson-lite' ) ) . '</span>' );
			else :
				_e( 'Archives', 'anderson-lite' );
			endif;
			?>
		</h2>
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', $theme_options['posts_length'] );
		
			endwhile;
			
		anderson_display_pagination();

		endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	