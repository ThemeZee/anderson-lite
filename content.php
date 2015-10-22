		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php anderson_display_thumbnail_and_categories_index(); ?>
		
		<div class="post-content">

			<h2 class="post-title entry-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<div class="postmeta"><?php anderson_display_postmeta(); ?></div>
			
			<div class="entry clearfix">
				<?php the_content( esc_html__( '&raquo; Read more', 'anderson-lite' ) ); ?>
			</div>
						
		</div>

	</article>