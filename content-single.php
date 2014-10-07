
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php anderson_display_thumbnail_and_categories_single(); ?>
		
		<div class="post-content">

			<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<div class="postmeta"><?php anderson_display_postmeta(); ?></div>
			
			<div class="entry clearfix">
				<?php the_content(); ?>
				<!-- <?php trackback_rdf(); ?> -->
				<div class="page-links"><?php wp_link_pages(); ?></div>			
			</div>
			
			<div class="post-tags clearfix">
				<?php echo get_the_tag_list('', ' '); ?>
			</div>
						
		</div>

	</article>