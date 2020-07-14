<?php


if( class_exists( 'WP_Customize_Control' ) ):

    class The_Gap_Headings_Control extends WP_Customize_Control {
        public $types = 'heading';
        public $label = '';
        public function render_content() {
        ?>
            <h3 class="customize_header_control"><?php echo esc_html( $this->label ); ?></h3>
        <?php
		if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo wp_kses_post($this->description); ?></span>
		<?php endif; 
        
        }
    } 

/* this control taken from https://github.com/soderlind/2016-customizer-demo/blob/master/functions.php */

class The_Gap_Customizer_Range_Value_Control extends WP_Customize_Control {
	public $types = 'range-value';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 3.4.0
	**/
	public function enqueue() {
		wp_enqueue_script( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/js/customizer-range-value-control.js', array( 'jquery' ), rand(), true );
		wp_enqueue_style( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/assets/css/customizer-range-value-control.css', array(), rand() );
	}

	/**
	 * Render the control's content.
	 *
	 * @author soderlind
	 * @version 1.2.0
	 **/
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider">
				<span  class="range-slider-span"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
				<span class="range-slider__value">0</span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}

endif;


if ( class_exists( 'WP_Customize_Control' ) ) {
	
if ( ! class_exists( 'The_Gap_Custom_Font_Control' ) ) {

	class The_Gap_Custom_Font_Control extends WP_Customize_Control {

		
		public $types = 'nl-font-family';

	
		public function render_content() {

			$current_val = $this->value(); 
		
			$nl_std_fonts = the_gap_web_safe_fonts();
			$nl_google_fonts = the_gap_google_fonts_array();
			$desc = $this->description;
			?>

			<label>
			<span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
			</span>
			</label>

			<div class="fnf-font-select">

				<select <?php $this->link(); ?>>

					<option class="font-default" value="" <?php if ( ! $current_val ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Default Font', 'the-gap' ); ?></option>

	
					<?php

					if ( $nl_std_fonts ) { ?>
						<optgroup class="font-standard" 
						label="<?php esc_attr_e( 'Standard Font Family', 'the-gap' ); ?>">
				
						
					<?php
                    foreach ( $nl_std_fonts as $std_font_key => $std_font_val ){ 
					 ?>
                        <option value="<?php echo wp_kses_post($std_font_val); ?>"  <?php selected( $std_font_val,$current_val,false ); ?>> <?php echo wp_kses_post($std_font_key); ?> </option>;
                   <?php }
					?>
					
						</optgroup>

					<?php }
					
	

					
					if ( $nl_google_fonts ) { ?>
			<optgroup class="font-google" label="<?php esc_attr_e( 'Google Font Family', 'the-gap' ); ?>">
				
				
							<?php
							
							foreach ( $nl_google_fonts as $google_font_key=>$google_font_val) {
								?>
								
								<option value="<?php echo wp_kses_post($google_font_val); ?>" <?php selected( $google_font_val, $current_val ); ?>><?php echo wp_kses_post($google_font_val); ?>
								</option>
							<?php } ?>
			</optgroup>

					<?php } ?>

				</select>

				<?php if($desc){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

			</div>

		<?php }
	}

}	
	
}

