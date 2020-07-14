<?php

/**
 * Contact Us
 *
 * @package The Gap
 */

class The_Gap_Contacts_Widget extends WP_Widget {
   
   
   public function __construct() {
	   
		$widget_ops = array('classname' => 'widget-contacts', 'description' => __( 'Get your contacts.', 'the-gap') );
        parent::__construct(false, $name = __('TG Contacts', 'the-gap'), $widget_ops);
		$this->alt_option_name = 'contacts_widget';
		
		
	}
    
  

   function form($instance) {

		 
		$instance = wp_parse_args( (array) $instance); 
		 
		$title     			= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';		
		$address 		= isset( $instance['address'] ) ? esc_html( $instance['address'] ) : '';
		
		$phoneno 	= isset( $instance['phoneno'] ) ? esc_html( $instance['phoneno'] ) : '';
		$phoneno2 	= isset( $instance['phoneno2'] ) ? esc_html( $instance['phoneno2'] ) : '';
		$email 	= isset( $instance['email'] ) ? esc_html( $instance['email'] ) : '';
		
	?>

	<p>
	<label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'the-gap'); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" 
	name="<?php echo esc_attr( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>

	
	
	<p><label for="<?php echo esc_attr( $this->get_field_id( 'address' )); ?>"><?php esc_html_e( 'Enter Address', 'the-gap' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' )); ?>" type="text" value="<?php echo esc_attr($address); ?>" size="3" />
	</p>
	
	<p><label for="<?php echo esc_attr( $this->get_field_id( 'phoneno' )); ?>"><?php esc_html_e( 'Enter phone number', 'the-gap' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phoneno' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phoneno' )); ?>" type="text" value="<?php echo esc_attr($phoneno); ?>" size="3" />
	</p>
	
	<p><label for="<?php echo esc_attr($this->get_field_id( 'phoneno2' )); ?>"><?php esc_html_e( 'Enter phone number2', 'the-gap' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phoneno2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'phoneno2' )); ?>" type="text" value="<?php echo esc_attr($phoneno2); ?>" size="3" /></p>

	<p><label for="<?php echo esc_attr( $this->get_field_id( 'email' )); ?>"><?php esc_html_e( 'Enter email address', 'the-gap' ); ?></label>
	
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'email' )); ?>" type="text" value="<?php echo esc_attr($email); ?>" size="3" /></p>	
	
	
	
		
	
	<?php
	}
	
	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;
		
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['address'] = sanitize_text_field($new_instance['address']);
		$instance['phoneno'] = sanitize_text_field($new_instance['phoneno']);
		$instance['phoneno2'] = sanitize_text_field($new_instance['phoneno2']);
		$instance['email'] = sanitize_email($new_instance['email']);
		
		return $instance;
	}
		
	function widget($args, $instance) {
		
		extract($args);
        
		
		$title	= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
		$address   	= isset( $instance['address'] ) ? esc_html( $instance['address'] ) : '';
		$phoneno   	= isset( $instance['phoneno'] ) ? esc_html( $instance['phoneno'] ) : '';
		$phoneno2	= isset( $instance['phoneno2'] ) ? esc_html( $instance['phoneno2'] ) : '';
		$email   	= isset( $instance['email'] ) ? esc_html( $instance['email'] ) : '';
		
		
		
		echo wp_kses_post($before_widget);
		if ( ! empty( $title ) ) {
				
				echo wp_kses_post($before_title.$title.$after_title);
				
			}
			
			
	
		
		?>

	<div class= "widget-contacts-body">
		<?php
		if( ($address) ) { ?>
			
			<span ><i class="fa fa-home"></i> <?php echo esc_html($address);?></span>
			 <?php
		}
		 if( ($phoneno) ) { ?>
			
			<span><i class="fa fa-phone"></i> <?php  echo esc_html($phoneno); ?></span>
			<?php
		}
		 if( ($phoneno2) ) { ?>
			
			<span><i class="fa fa-phone"></i><?php  echo esc_html($phoneno2); ?></span> 
			<?php
		}
		if( ($email) ) { ?>
			
			<span ><i class="fa fa-envelope"></i>
			<a class="contact-email" href="mailto:<?php echo esc_attr($email); ?> "><?php  echo esc_html($email);  ?> </a></span>
			  <?php
		}	?>			
	</div> 
	<?php
	
		echo wp_kses_post($after_widget);
   }
}


