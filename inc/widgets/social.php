<?php

/**
 * Social Widget
 *
 * @package The Gap
 */

class The_Gap_Socials extends WP_Widget {


	public function __construct() {
		$widget_ops = array('classname' => 'widget-socials', 'description' => __( 'Show Social Item Lists.', 'the-gap') );
        parent::__construct(false, $name = __('TG Social Item Lists', 'the-gap'), $widget_ops);
		$this->alt_option_name = 'socials_widget';
		
    }
  
  
  
// Display Outputs form widget
function widget ($args,$instance) {
   extract($args);

 
  // Get Outputs
  echo wp_kses_post($before_widget);
  

		$icon_styles = '';
		$title   	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		
			if ( ! empty( $title ) ) {
				
				echo wp_kses_post($before_title.$title.$after_title);
				
			}
		
		
		
		for ( $i = 0; $i <= 7; $i ++ ) {
			$social_icon[] = isset( $instance['social_icon'.$i] ) ? esc_attr( $instance['social_icon'.$i] ) : '';
 
			$social_url[] = isset( $instance['social_url'.$i] ) ? esc_attr( $instance['social_url'.$i] ) : '';
		}
		
		$align   	= isset( $instance['align'] ) ? esc_attr( $instance['align'] ) : '';
		$target   	= isset( $instance['target'] ) ? esc_attr( $instance['target'] ) : '';
		
		$icon_font_size   	= isset( $instance['icon_font_size'] ) ? esc_attr( $instance['icon_font_size'] ) : '18';
		$icon_bg_color   	= isset( $instance['icon_bg_color'] ) ? esc_attr( $instance['icon_bg_color'] ) : '';
		
		$icon_border_radius   	= isset( $instance['icon_border_radius'] ) ? esc_attr( $instance['icon_border_radius'] ) : '';
		
		
		$icon_height   	= isset( $instance['icon_height'] ) ? esc_attr( $instance['icon_height'] ) : '36';
		$icon_width   	= isset( $instance['icon_width'] ) ? esc_attr( $instance['icon_width'] ) : '36';
		
		$icon_border_radius   	= isset( $instance['icon_border_radius'] ) ? esc_attr( $instance['icon_border_radius'] ) : '';
			
		$styles = '';
		
		if($icon_font_size != "") {
            $styles .= ".social-icon-widget .icon {font-size: ".intval($icon_font_size)."px;}";
		}
		
		if($icon_height != "") {
            $styles .= ".social-icon-widget .icon {height: ".intval($icon_height)."px;}";
			 $styles .= ".social-icon-widget .icon {line-height: ".intval($icon_height)."px;}";
		}
		
		if($icon_width != "") {
            $styles .= ".social-icon-widget .icon {width: ".intval($icon_width)."px;}";
		}
		
		
		if($icon_bg_color != "") {
            $styles .= ".social-icon-widget .icon {background-color: ".esc_attr($icon_bg_color).";}";
		}
	
		if($icon_border_radius != "") {
            $styles .= ".social-icon-widget .icon {border-radius: ".intval($icon_border_radius)."px;}";
		}
		
		if($target == ''){
            $target = "_self";
        }
		
		$styles .= ".social-icon-widget{ text-align: ".esc_attr($align).";}";
		

  ?>
  
		<div id="hash" class="social-icon-widget hvr-icon">
		
			<?php
			for ( $i = 0; $i <= 7; $i ++ ) {
				if( ($social_icon[$i] !='default') ) { ?>
					<div class="icon">
		
						<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($social_url[$i]); ?>">
						<i id="hash<?php echo esc_attr($i); ?>" class="fa <?php echo esc_attr($social_icon[$i]); ?>"></i></a>
		
					</div>
				<?php
				}
			}
		?>
		</div>


  <?php
  
		wp_enqueue_style( 'the_gap_style_social_widget', get_stylesheet_uri() );
		wp_add_inline_style( 'the_gap_style_social_widget', $styles );
		
  echo wp_kses_post($after_widget);
 }
 
 
// Update Widget
function update ($new_instance, $old_instance) {
  $instance = $old_instance;

  $instance['title'] = sanitize_text_field( $new_instance['title']);
   $instance['align'] = the_gap_sanitize_widget_align( $new_instance['align']);
   
   for ( $i = 0; $i <= 7; $i ++ ) {
		$instance['social_icon'.$i] = the_gap_sanitize_widget_choices( $new_instance['social_icon'.$i] );
 
		$instance['social_url'.$i] = esc_url_raw( $new_instance['social_url'.$i]);
   }
  
   $instance['target'] = the_gap_sanitize_social_link_target( $new_instance['target']);
   
   $instance['icon_font_size'] = absint( $new_instance['icon_font_size']);
 
	$instance['icon_bg_color'] = sanitize_hex_color( $new_instance['icon_bg_color']);
	
	$instance['icon_height'] = absint( $new_instance['icon_height']);
	$instance['icon_width'] = absint( $new_instance['icon_width']);
		
	$instance['icon_border_radius'] = absint( $new_instance['icon_border_radius']);	
		
	
		
  return $instance;
}

// Form Fields in widget
function form ($instance) {
   
	$fa_icons_array = the_gap_fontawesome_social_list();
	
	$widget_align = array('left'=>__('Left','the-gap'),'center'=>__('Center','the-gap'));
	
	$target_window = array('_self'=>__('Self','the-gap'),'_blank'=>__('Blank','the-gap'));
	

		
		$title	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		
		
		
		for ( $i = 0; $i <= 7; $i ++ ) {
			$social_icon[] = isset( $instance['social_icon'.$i] ) ? esc_attr( $instance['social_icon'.$i] ) : '';
 
			$social_urls[] = isset( $instance['social_url'.$i] ) ? esc_attr( $instance['social_url'.$i] ) : '';
		}
		
		$align   	= isset( $instance['align'] ) ? esc_attr( $instance['align'] ) : '';
		$target   	= isset( $instance['target'] ) ? esc_attr( $instance['target'] ) : '';
		
		$icon_font_size   	= isset( $instance['icon_font_size'] ) ? esc_attr( $instance['icon_font_size'] ) : '18';
		$icon_bg_color   	= isset( $instance['icon_bg_color'] ) ? esc_attr( $instance['icon_bg_color'] ) : '';
		
		$icon_border_radius   	= isset( $instance['icon_border_radius'] ) ? esc_attr( $instance['icon_border_radius'] ) : '';
		
		
		$icon_height   	= isset( $instance['icon_height'] ) ? esc_attr( $instance['icon_height'] ) : '36';
		$icon_width   	= isset( $instance['icon_width'] ) ? esc_attr( $instance['icon_width'] ) : '36';
		
		$icon_border_radius   	= isset( $instance['icon_border_radius'] ) ? esc_attr( $instance['icon_border_radius'] ) : '';
			
		
	
	?>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title :', 'the-gap'); ?></label>
		<input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr( $this->get_field_id('title')); ?> " value="<?php echo esc_attr($title); ?>">
		</p>

		<?php   for ( $i = 0; $i <= 7; $i ++ ) { ?>
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('social_icon'.$i)); ?>"><?php esc_html_e('social Icon :', 'the-gap'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('social_icon'.$i)) ?>" id="<?php echo esc_attr($this->get_field_id('social_icon'.$i)) ?> ">
				<?php foreach ($fa_icons_array as $key => $value) { ?>
	
					<option <?php echo (esc_attr($social_icon[$i]) == esc_attr($key) ) ? ' selected="selected"' : ''; ?> 
					value="<?php echo esc_attr( $key ); ?>"><?php 
					echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
  
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('social_url'.$i)); ?>"><?php esc_html_e('social url :', 'the-gap'); ?></label>
			<input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('social_url'.$i)) ?>" id="<?php echo esc_attr($this->get_field_id('social_url'.$i)); ?> " value="<?php echo esc_url($social_urls[$i]); ?>">
		</p>
		<?php } ?>
 
      
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e('Target Window:', 'the-gap'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('target')) ?>" id="<?php echo esc_attr($this->get_field_id('target')) ?> ">
             <?php foreach ($target_window as $key => $value) { ?>
	
					<option <?php echo (esc_attr($target) == esc_attr($key) ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
 
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'icon_font_size' ) ); ?>"><?php esc_html_e('Icon Font Size:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'icon_font_size' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'icon_font_size' ) ); ?>" value="<?php echo esc_attr( $icon_font_size ); ?>" 
			class="widefat" />
		</p>
	
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'icon_bg_color' ) ); ?>"><?php esc_html_e('Icon Background Color:', 'the-gap'); ?>
			</label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'icon_bg_color' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'icon_bg_color' ) ); ?>" value="<?php echo esc_attr( $icon_bg_color ); ?>" 
			class="widefat" />
		</p>
		
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'icon_height' ) ); ?>"><?php esc_html_e('Icon Height:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'icon_height' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'icon_height' ) ); ?>" value="<?php echo esc_attr( $icon_height ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'icon_width' ) ); ?>"><?php esc_html_e('Icon Width:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'icon_width' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'icon_width' ) ); ?>" value="<?php echo esc_attr( $icon_width ); ?>" 
			class="widefat" />
		</p>
		
		
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'icon_border_radius' ) ); ?>"><?php esc_html_e('Icon Border Radius:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'icon_border_radius' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'icon_border_radius' ) ); ?>" value="<?php echo esc_attr( $icon_border_radius ); ?>" 
			class="widefat" />
		</p>
		
		
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('align')); ?>"><?php esc_html_e('Align:', 'the-gap'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('align')) ?>" id="<?php echo esc_attr($this->get_field_id('align')) ?> ">
             <?php foreach ($widget_align as $key => $value) { ?>
	
					<option <?php echo (esc_attr($align) == esc_attr($key) ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>

		
		
<?php 
}

}


?>