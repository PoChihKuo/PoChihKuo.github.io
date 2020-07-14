<?php

/**
 * Slides Overlay Widget
 *
 * @package The Gap
 */
 
class The_Gap_Slide_Overlay extends WP_Widget {
	
	/**
	 * Register widget
	**/
	
	public function __construct() {
		$widget_ops = array('classname' => '.flexsliders.widget-slider', 'description' => __( 'Slides Overlay.', 'the-gap') );
        parent::__construct(false, $name = __('TG Slides Overlay', 'the-gap'), $widget_ops);
		$this->alt_option_name = 'widget-media-slider';
		
		
    }

	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );
		// Get Outputs
		echo wp_kses_post($before_widget);
		
		
			if ( ! empty( $title ) ) {
				
				echo wp_kses_post($before_title.$title.$after_title);
				
			}
		
		
		$title   	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		
		$categories	= isset( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';
	
		$hide_cta   	= isset( $instance['hide_cta'] ) ? esc_attr( $instance['hide_cta'] ) : '';
		
		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		
		
		$loop = new WP_Query(
				array(
					'post_type' => 'post',
					'cat' =>$categories,
					'posts_per_page' =>6,
					
					'post_status' => 'publish',
					
				)
			);
		
?>

<div class="flexsliders widget-slider"> 
	<ul class="slides clear">
	<?php

	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); 
			
		if (has_post_thumbnail()){
		$slide1_src = get_the_post_thumbnail_url();
		}else {
		$slide1_src = get_template_directory_uri() . "/assets/images/cover.jpg"; 	
		}
	
	 if ($slide1_src){ ?>
    <li>

		<div class="vc_slide_text">
		
			<div class="widget_slide_border_style">
				<div class="widget_slide_cta">
					<div class="slider-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
		
		
						<a  title="<?php the_title_attribute();?>" href="<?php the_permalink(); ?>" target="_self">
						<h3 class="nl-slide-widget-title"><?php the_title(); ?></h3>
						</a>
		
					<div class="nl-slide-ovr-sub-title" ><?php the_gap_single_posted_meta(); ?></div>
	
				</div>
			</div> 
			<div class="widget-slider-img">
				<img src="<?php echo esc_url($slide1_src); ?>" alt="<?php the_title_attribute();?>" title="<?php the_title_attribute();?>" />
			</div>
			
		</div>
	
    </li>
	<?php 
	
	} 
	endwhile;

		endif; 
	?>
  </ul>

</div>
<?php

      wp_reset_postdata();
		

		echo wp_kses_post($after_widget);
		
	}

	/**
	 * Sanitize widget form values as they are saved
	**/
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = sanitize_text_field( $new_instance['title']);
		$instance['categories'] = sanitize_text_field( $new_instance['categories'] );
		
		$instance['hide_cta'] = sanitize_text_field( $new_instance['hide_cta'] );
		
		
		return $instance;
		
	}

	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		

	
		$cta_yes_no = array('no'=>__('No','the-gap'),'yes'=>__('Yes','the-gap'));
	
		$title	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$categories   	= isset( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';

		$hide_cta   	= isset( $instance['hide_cta'] ) ? esc_attr( $instance['hide_cta'] ) : '';
	
	
	?>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'the-gap'); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" 
		name="<?php echo esc_attr( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
	
		<?php
		$blog_cats = get_terms('category', array('hide_empty' => false));
		
		?>
		<p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>"><?php esc_html_e('Category:', 'the-gap'); ?>
		  </label>
          <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'categories' ) ); ?>">
          
          <option value=""><?php esc_html_e( 'All', 'the-gap' ); ?></option>
          <?php foreach($blog_cats as $blog_cat) { ?>
				
		  		<option <?php echo (esc_attr($categories) == esc_attr($blog_cat->term_id) ) ? ' selected="selected"' : ''; ?> 
				value="<?php esc_attr( $blog_cat->term_id ); ?>"><?php esc_html( $blog_cat->name ); ?></option>

		  <?php } ?>
          
          </select>
       </p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('hide_cta')); ?>"><?php esc_html_e('Hide Overlay CTA?:', 'the-gap'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('hide_cta')) ?>" id="<?php echo esc_attr($this->get_field_id('hide_cta')) ?> ">
             <?php foreach ($cta_yes_no as $key => $value) { ?>
	
					<option <?php echo (esc_attr($hide_cta) == esc_attr($key) ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_html( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
	<?php
	}
	


}



?>