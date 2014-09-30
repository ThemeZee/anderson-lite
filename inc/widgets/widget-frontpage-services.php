<?php

// Add Social Icons Widget
class Anderson_Front_Page_Services_Widget extends WP_Widget {

	function __construct() {

		$widget_ops = array('classname' => 'anderson_frontpage_services', 'description' => __('Displays your Services with a Icon.', 'anderson-lite') );
		$this->WP_Widget('anderson_frontpage_services', 'Front Page Services (Anderson)', $widget_ops);
		
		add_action( 'load-widgets.php', array(&$this, 'enqueue_dashicons_picker') );
		
		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_enqueue_scripts', array(&$this, 'enqueue_dashicons') );	
	}

	function enqueue_dashicons() {
		wp_enqueue_style( 'dashicons' );
	}
	
	function enqueue_dashicons_picker( $hook ) {
		
		// Enqueuing Dashicons Picker JS and CSS
		wp_enqueue_script( 'anderson-lite-dashicons-picker-js', get_template_directory_uri() . '/js/dashicons-picker.js', array( 'jquery' ), '20140604', true );
		wp_enqueue_style( 'anderson-lite-dashicons-picker-css', get_template_directory_uri() . '/css/dashicons-picker.css', array(), '20140604' );
		
		// Enqueuing the underscore.js library.
		wp_enqueue_script( 'underscore' );
	}
	
	function excerpt_length($length) {
		return 18;
	}

	function widget($args, $instance) {

		$cache = wp_cache_get('widget_anderson_frontpage_services', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);
		
		// Get Widget Settings
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$icon = empty( $instance['icon'] ) ? 'dashicons-admin-home' : esc_attr($instance['icon']);
		$page_id = empty( $instance['page_id'] ) ? 0 : (int)$instance['page_id'];
		$read_more = empty( $instance['read_more'] ) ? __('Read more', 'anderson-lite') : esc_attr($instance['read_more']);
		
		// Get Page Content
		global $post;
		$post = get_post($page_id); 
		
		// Setup Post Data
		setup_postdata( $post ); 
		
		// Limit the number of words in slideshow page excerpts
		add_filter('excerpt_length', array(&$this, 'excerpt_length') );	

		// Output
		echo $before_widget;
	?>
		<div class="widget-frontpage-services clearfix">
			
			<div class="widget-service-icon"><span class="<?php echo $icon; ?>"></span></div>
			
			<div class="widget-service-content clearfix">
				
				<?php // Display Title
				if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
				?>
				
				<div class="widget-service-entry">
					<?php the_excerpt(); ?>
					<a href="<?php esc_url(the_permalink()) ?>" class="widget-service-link"><?php echo $read_more; ?></a>
				</div>
				
			</div>
			
		</div>
	<?php
		echo $after_widget;
		
		// Remove excerpt filter
		remove_filter('excerpt_length', array(&$this, 'excerpt_length') );	

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_anderson_frontpage_services', $cache, 'widget');
	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['title'] = isset($new_instance['title']) ? esc_attr($new_instance['title']) : '';
		$instance['icon'] = isset($new_instance['icon']) ? esc_attr($new_instance['icon']) : 'dashicons-admin-home';
		$instance['page_id'] = isset($new_instance['page_id']) ? (int)$new_instance['page_id'] : 0;
		$instance['read_more'] = isset($new_instance['read_more']) ? esc_attr($new_instance['read_more']) : __('Read more', 'anderson-lite');
		
		return $instance;
	}

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$icon = isset($instance['icon']) ? esc_attr($instance['icon']) : 'dashicons-admin-home';
		$page_id = isset($instance['page_id']) ? (int)$instance['page_id'] : 0;
		$read_more = isset($instance['read_more']) ? esc_attr($instance['read_more']) : __('Read more', 'anderson-lite');
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'anderson-lite'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Select Icon Image:', 'anderson-lite'); ?></label><br/>
			<div class="dashicons-picker-icon-preview">
				<span id="<?php echo $this->get_field_id('icon'); ?>-preview" class="dashicons <?php echo $icon; ?>"></span>
			</div>
			
			<input id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="hidden" value="<?php echo $icon; ?>" />	
			<input type="button" data-target="#<?php echo $this->get_field_id('icon'); ?>" data-preview="#<?php echo $this->get_field_id('icon'); ?>-preview" class="button dashicons-picker" value="<?php _e('Choose Icon', 'anderson-lite'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e('Select Service Page:', 'anderson-lite'); ?><br/>
			
			<?php // Show Dropdown Categories
			$dropdown_pages_args = array( 
				'id' => $this->get_field_id('page_id'), 
				'name' => $this->get_field_name('page_id'), 
				'show_option_none' => ' ', 
				'selected' => $page_id
			);
			wp_dropdown_pages($dropdown_pages_args); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('read_more'); ?>"><?php _e('Read More text:', 'anderson-lite'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('read_more'); ?>" name="<?php echo $this->get_field_name('read_more'); ?>" type="text" value="<?php echo esc_attr($read_more); ?>" />
			</label>
		</p>
	<?php
	}
}

register_widget('Anderson_Front_Page_Services_Widget');
?>