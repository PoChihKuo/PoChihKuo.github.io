<?php

/**
 * Author Box
 *
 * @package The Gap
 */
class The_Gap_Author_Box extends WP_Widget {
	
	/**
	 * Register widget
	**/
	
	public function __construct() {
		$widget_ops = array('classname' => 'author-box', 'description' => __( 'Author Box.', 'the-gap') );
        parent::__construct(false, $name =__('TG Author Box ', 'the-gap'), $widget_ops);
		$this->alt_option_name = 'author-box';
		add_action( 'admin_enqueue_scripts', array( $this, 'the_gap_image_upload_enqueue' ) );
		
    }

	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

	
		
		$title = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
		
		$height	= isset( $instance['height'] ) ? esc_attr( $instance['height'] ) : '200';
		$width = isset( $instance['width'] ) ? esc_attr( $instance['width'] ) : '250';
		$align = isset( $instance['align'] ) ? esc_attr( $instance['align'] ) : '';
		$author_text   	= isset( $instance['author_text'] ) ? esc_html( $instance['author_text'] ) : '';
		$image_url   	= isset( $instance['image_url'] ) ? esc_url( $instance['image_url'] ) : '';
		$icon_bg_color   	= isset( $instance['icon_bg_color'] ) ? esc_attr( $instance['icon_bg_color'] ) : '';
		$author_position   	= isset( $instance['author_position'] ) ? esc_html( $instance['author_position'] ) : '';
		$author_name = isset( $instance['author_name'] ) ? esc_attr( $instance['author_name'] ) : '';
		$border_radius = isset( $instance['border_radius'] ) ? esc_attr( $instance['border_radius'] ) : '';
		
		$icon0   	= isset( $instance['social_icon0'] ) ? esc_attr( $instance['social_icon0'] ) : '';
		$icon1   	= isset( $instance['social_icon1'] ) ? esc_attr( $instance['social_icon1'] ) : '';
		$icon2   	= isset( $instance['social_icon2'] ) ? esc_attr( $instance['social_icon2'] ) : '';
		$icon3   	= isset( $instance['social_icon3'] ) ? esc_attr( $instance['social_icon3'] ) : '';
		
		
		$url0   	= isset( $instance['social_url0'] ) ? esc_attr( $instance['social_url0'] ) : '';
		$url1   	= isset( $instance['social_url1'] ) ? esc_attr( $instance['social_url1'] ) : '';
		$url2   	= isset( $instance['social_url2'] ) ? esc_attr( $instance['social_url2'] ) : '';
		$url3   	= isset( $instance['social_url3'] ) ? esc_attr( $instance['social_url3'] ) : '';
		
		$style   	= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';
			
		
		$styles ='';
		
		if ($icon_bg_color != ''){
		$styles .= ".author-box .icon{background-color:".$icon_bg_color.";}";
		}
	
		if ($image_url == ''){
			
		$image_url = get_template_directory_uri() . "/assets/images/dummy-image.jpg"; 
		
		} else {
		
		$image_url = esc_url($image_url);
		
		}
		
		
		if ($height != ''){
		$styles .= ".author_photo img {height:".intval($height)."px;}";
		}
		if ($width != ''){
		$styles .= ".author_photo img {width:".intval($width)."px;}";
		}
		
		if ($border_radius != ''){
		$styles .= ".author_photo img {border-radius:".intval($border_radius)."%;}";
		}
		
		$target = '_blank';
		
		echo wp_kses_post($before_widget);
		if ( ! empty( $title ) ) {
				
				echo wp_kses_post($before_title.$title.$after_title);
				
		}
		
		
		
			?>
   
<div class="author-box <?php echo esc_attr($style) ?>">
	
	<div class="image_wrap_border_style <?php echo esc_attr($align) ?>">

		<?php if ($image_url){ ?>
			<div class="author_photo">
			<a href="" target="_self" >
				<img   alt="<?php esc_attr_e('Author Box','the-gap'); ?>" src="<?php echo esc_url($image_url); ?>"/></a>
			</div>
			<?php } ?>
			
			<div id="hash" class="social-icon-widget <?php echo esc_attr($align) ?>">
			<?php
			if( ($icon0!='default') ) { ?>
				<div class="icon">
		
					<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url0); ?>">
					<i id="hash4" class="fa <?php echo esc_attr($icon0); ?>"></i></a>
		
				</div>
			<?php
			}
			
				if( ($icon1 !='default') ) { ?>
				<div class="icon">
		
					<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url1); ?>">
					<i id="hash1" class="fa <?php echo esc_attr($icon1); ?>"></i></a>
		
				</div>
			<?php
			}
			if( ($icon2 !='default') ) { ?>
				<div class="icon">
		
					<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url2); ?>">
					<i id="hash2" class="fa <?php echo esc_attr($icon2); ?>"></i></a>
		
				</div>
			<?php
			}
			if( ($icon3 != 'default') ) { ?>
				<div class="icon">
		
					<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url3); ?>">
					<i id="hash3" class="fa <?php echo esc_attr($icon3); ?>"></i></a>
		
				</div>
			<?php
			}
			
			?>
			</div>
			
			<div class="author-box-cta <?php echo esc_attr($align) ?>">
	
				<?php if ($author_name){ ?>
					<h4 class="nl-widget-title"><?php echo esc_html($author_name); ?></h4>
				<?php } ?>
				
				<?php if ($author_position){ ?>
					<div class="nl-widget-position"><?php echo esc_html($author_position);?></div>
				<?php } ?>
				
				<?php if ($author_text){ ?>
					<div class="image-txt"><?php echo esc_html($author_text);?></div>
				<?php } ?>
			
			</div>
	</div>
   
</div>
			
		
	    <?php 
		wp_enqueue_style( 'the_gap_style_author_detail', get_stylesheet_uri() );
		wp_add_inline_style( 'the_gap_style_author_detail', $styles );

		
		echo wp_kses_post($after_widget);
		
	}

	/**
	 * Sanitize widget form values as they are saved
	**/
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['style'] = the_gap_sanitize_widget_style( $new_instance['style'] );
		
		$instance['height'] = absint( $new_instance['height'] );
		$instance['width'] = absint( $new_instance['width'] );
		$instance['border_radius'] = absint( $new_instance['border_radius'] );

		$instance['author_name'] = sanitize_text_field( $new_instance['author_name'] );
		$instance['author_text'] = sanitize_text_field( $new_instance['author_text'] );
		$instance['author_position'] = sanitize_text_field( $new_instance['author_position'] );
		$instance['image_url'] = esc_url_raw( $new_instance['image_url'] );
		$instance['icon_bg_color'] = sanitize_hex_color( $new_instance['icon_bg_color'] );
		
		for ( $i = 0; $i <= 3; $i ++ ) {
			
		$instance['social_icon'.$i] =  the_gap_sanitize_widget_choices($new_instance['social_icon'.$i]);
 
		$instance['social_url'.$i] = esc_url_raw( $new_instance['social_url'.$i]);
			
		}
	
		$instance['align'] = the_gap_sanitize_widget_align( $new_instance['align'] );
		return $instance;
		
	}

	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
	
	
	
	
	$fa_icons_array = the_gap_fontawesome_social_list();
	
	$widget_align = array('center'=>__('Center','the-gap'),'left'=>__('Left','the-gap'));
		
	$widget_style = array('style1'=>__('Style1','the-gap'),'style2'=>__('Style2','the-gap'),'style3'=>__('Style3','the-gap'),'style4'=>__('Style4','the-gap'),'none'=>__('None','the-gap'));
	
	
		$title   	= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
		$align   	= isset( $instance['align'] ) ? esc_attr( $instance['align'] ) : '';
		$author_text   	= isset( $instance['author_text'] ) ? esc_html( $instance['author_text'] ) : '';
		$image_url   	= isset( $instance['image_url'] ) ? esc_url( $instance['image_url'] ) : '';
		$icon_bg_color   	= isset( $instance['icon_bg_color'] ) ? esc_attr( $instance['icon_bg_color'] ) : '';
		$author_position   	= isset( $instance['author_position'] ) ? esc_html( $instance['author_position'] ) : '';
		$height     			= isset( $instance['height'] ) ? esc_attr( $instance['height'] ) : '200';
		$width     			= isset( $instance['width'] ) ? esc_attr( $instance['width'] ) : '250';
		
		$author_name     			= isset( $instance['author_name'] ) ? esc_attr( $instance['author_name'] ) : '';
		$border_radius     			= isset( $instance['border_radius'] ) ? esc_attr( $instance['border_radius'] ) : '';
		
		
		for ( $i = 0; $i <= 3; $i ++ ) {
			$social_icon[] = isset( $instance['social_icon'.$i] ) ? esc_attr( $instance['social_icon'.$i] ) : '';
 
			$social_urls[] = isset( $instance['social_url'.$i] ) ? esc_attr( $instance['social_url'.$i] ) : '';
		}
		
		$style   	= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';
	?>
	
		
		
		<p>
			<label for="meta-image" class="nl-row-title"><?php esc_html_e( 'Author Image Upload', 'the-gap' )?></label>
				<br>
				
				<input class="widefat image_url_id" type="text" name="<?php echo esc_attr($this->get_field_name('image_url')) ?>" id="image_url_id1" value="<?php echo esc_attr($image_url) ?>">
		
				<input type="button" id="the-gap-image-uploader1" class="the-gap-image-uploader"  value="<?php esc_attr_e( 'Choose or Upload an Image', 'the-gap' )?>" />
		</p>
			<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_html_e('Image Height:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" value="<?php echo esc_attr( $height ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php esc_html_e('Image Width:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" value="<?php echo esc_attr( $width ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>"><?php esc_html_e('Border Radius:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_radius' ) ); ?>" value="<?php echo esc_attr( $border_radius ); ?>" 
			class="widefat" />
		</p>
		
		<?php   for ( $i = 0; $i <= 3; $i ++ ) { ?>
		
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
			<label for = "<?php echo esc_attr( $this->get_field_id( 'icon_bg_color' ) ); ?>"><?php esc_html_e('Icon Background Color:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'icon_bg_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_bg_color' ) ); ?>" value="<?php echo esc_attr( $icon_bg_color ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Widget Title:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" 
			class="widefat" />
		</p>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'author_name' ) ); ?>"><?php esc_html_e('Author Name:', 'the-gap'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'author_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_name' ) ); ?>" value="<?php echo esc_attr( $author_name ); ?>" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_position' ) ); ?>">
			<?php esc_html_e('Author Position:', 'the-gap'); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'author_position' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'author_position' ) ); ?>" value="<?php echo esc_attr( $author_position); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_text' ) ); ?>">
			<?php esc_html_e('Author Text:', 'the-gap'); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'author_text' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'author_text' ) ); ?>" value="<?php echo esc_attr( $author_text); ?>" 
			class="widefat" />
		</p>
		

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('align')); ?>"><?php esc_html_e('Widget Align:', 'the-gap'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('align')) ?>" id="<?php echo esc_attr($this->get_field_id('align')) ?> ">
             <?php foreach ($widget_align as $key => $value) { ?>
	
					<option <?php echo (esc_attr($align) == esc_attr($key) ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
	
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e('Widget Style:', 'the-gap'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('style')) ?>" id="<?php echo esc_attr($this->get_field_id('style')) ?> ">
             <?php foreach ($widget_style as $key => $value) { ?>
	
					<option <?php echo (esc_attr($style) == esc_attr($key) ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>


	<?php
	}
	
	public function the_gap_image_upload_enqueue() {
   
        wp_enqueue_media();
		wp_register_script( 'the_gap_image_widget', get_template_directory_uri() . '/admin/imgloader.js', array( 'jquery' ) );
       $upload_img = __('Upload an Image', 'the-gap');
	   $bg_img = __('Use this Background Image', 'the-gap');
		 $the_gap_titles = array($upload_img,$bg_img); 
		wp_localize_script('the_gap_image_widget', 'the_gap_titles', $the_gap_titles);
		 wp_enqueue_script( 'the_gap_image_widget' );
    
	}
	
	
	
	


}



?>