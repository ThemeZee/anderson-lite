
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php anderson_display_thumbnail_single(); ?>
		
		<div class="post-content">
		
			<h2 class="post-title"><?php the_title(); ?></h2>
			
			<div class="postmeta"><?php anderson_display_postmeta(); ?></div>

			<div class="entry clearfix">
				<?php the_content(); ?>
				<!-- <?php trackback_rdf(); ?> -->
				<div class="page-links"><?php wp_link_pages(); ?></div>			
			</div>
			
			<div class="postinfo clearfix"><?php anderson_display_postinfo(); ?></div>
			
		</div>

	</article>