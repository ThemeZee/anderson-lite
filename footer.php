		
	<?php // Get Theme Options from Database
		$theme_options = anderson_theme_options();
	?>
	
	<div id="footer-wrap">
		
		<footer id="footer" class="container clearfix" role="contentinfo">
			
			<nav id="footernav" class="clearfix" role="navigation">
				<?php 
					// Get Navigation out of Theme Options
					wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'menu_id' => 'footernav-menu', 'echo' => true, 'fallback_cb' => '', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 1));
				?>
			</nav>
			
			<div class="footer-content">
				
				<?php // Display Footer Content from Database
					if ( isset( $theme_options['footer_content'] ) and $theme_options['footer_content'] <> '' ) :
					
						echo do_shortcode(wp_kses_post($theme_options['footer_content']));
						
					endif; ?>
					
				<div id="credit-link"><?php anderson_credit_link(); ?></div>

			</div>
			
		</footer>

	</div>
	
</div><!-- end #wrapper -->

<?php wp_footer(); ?>
</body>
</html>