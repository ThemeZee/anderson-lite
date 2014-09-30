
<?php // Check if there are footer widgets
	if(is_active_sidebar('footer-left') 
		or is_active_sidebar('footer-center-left')
		or is_active_sidebar('footer-center-right')
		or is_active_sidebar('footer-right')) : 
?>
		
	<div id="footer-widgets-wrap">
	
		<div id="footer-widgets" class="clearfix">
		
			<div id="footer-widget-one" class="footer-widget-column">
				<?php dynamic_sidebar('footer-left'); ?>
			</div>
			
			<div id="footer-widget-two" class="footer-widget-column">
				<?php dynamic_sidebar('footer-center-left'); ?>
			</div>

			<div id="footer-widget-three" class="footer-widget-column">
				<?php dynamic_sidebar('footer-center-right'); ?>
			</div>
			
			<div id="footer-widget-four" class="footer-widget-column">
				<?php dynamic_sidebar('footer-right'); ?>
			</div>
				
		</div>
		
	</div>
	
<?php endif; ?>
