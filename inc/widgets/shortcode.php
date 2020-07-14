<?php

/**
 * Shortcode Widget
 *
 * @package The Gap
 */
 
class The_Gap_Shortcode extends WP_Widget {
	
	/**
	 * Register widget
	**/
	
	public function __construct() {
		
		$widget_ops = array('classname' => 'nl-shortcode', 'description' => __( 'Shortcode for contact form7 etc.', 'the-gap') );
        parent::__construct(false, $name = __('TG Shortcode', 'the-gap'), $widget_ops);
		$this->alt_option_name = 'nl-shortcode';
		
		
    }

	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title   	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		
		$shortcodes   	= isset( $instance['shortcodes'] ) ?  $instance['shortcodes'] : '';
		$extra_class   	= isset( $instance['extra_class'] ) ? esc_attr( $instance['extra_class'] ) : '';
		$id   	= isset( $instance['id'] ) ? esc_attr( $instance['id'] ) : '';
		$id   	= 'cf7_custom_style_4';
		echo wp_kses_post($before_widget);
		
			if ( ! empty( $title ) ) {
				
				echo wp_kses_post($before_title.$title.$after_title);
				
			}
		
		
		?>
		
	
			<div id="<?php echo esc_attr($id); ?>" class="nl-shortcode <?php echo esc_attr($extra_class); ?>">
				<?php echo do_shortcode($shortcodes);?>
			</div>
		
		<?php
		echo wp_kses_post($after_widget);
		
	}

	/**
	 * Sanitize widget form values as they are saved
	**/
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = sanitize_text_field( $new_instance['title']);
		$instance['shortcodes'] = sanitize_text_field( $new_instance['shortcodes'] );
		$instance['id'] = sanitize_text_field( $new_instance['id'] );
		$instance['extra_class'] = sanitize_text_field( $new_instance['extra_class'] );
		
		
		

		return $instance;
		
	}

	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
	
	$title	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	$shortcodes   	= isset( $instance['shortcodes'] ) ? esc_attr( $instance['shortcodes'] ) : '';
	$extra_class   	= isset( $instance['extra_class'] ) ? esc_attr( $instance['extra_class'] ) : '';
	$id   	= isset( $instance['id'] ) ? esc_attr( $instance['id'] ) : '';
	
	?>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'the-gap'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" 
			name="<?php echo esc_attr( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
	
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'shortcodes' ) ); ?>"><?php esc_html_e('Shortcodes:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'shortcodes' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'shortcodes' ) ); ?>" value="<?php echo esc_attr( $shortcodes ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>"><?php esc_html_e('Extra Class:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'extra_class' ) ); ?>" value="<?php echo esc_attr( $extra_class ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>"><?php esc_html_e('id:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'id' ) ); ?>" value="<?php echo esc_attr( $id ); ?>" 
			class="widefat" />
		</p>
		
		
		
	
		
		
		
	<?php
	}
	
	
	

}



?>