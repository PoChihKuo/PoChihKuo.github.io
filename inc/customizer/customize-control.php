<?php 
/**
 *  Customized Controls.
 *
 * @package the-gap
 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'The_Gap_Customized_Controls' ) ) :

/**
 * nl_Admin Class.
**/
class The_Gap_Customized_Controls {

	/**
	 * Constructor.
	**/
	public function __construct() {
	    
	 add_action( 'customize_controls_print_styles', array( $this, 'the_gap_customizer_styles' ));
	
	}

public function the_gap_customizer_styles($styles) { 

$styles = '';

$styles .= '.customize-control.customize-control-select span.customize-control-title{
	margin-bottom:10px;}

#customize-control-scroll-up-icon span.customize-control-title {
	margin-top:20px;
}

#customize-control-order-by .customize-control-title {
	margin-top:20px;
}

#customize-controls .customize-section-title > .customize-control-notifications-container:not(.has-overlay-notifications) {
	display:none!important;
}
p.customizer-section-intro.customize-control-description {
	display:none!important;
}
h3.customize_header_control {
margin-bottom:2px;border-bottom:1px solid;padding:1px;color:#58719E;
			text-transform:uppercase!important;
}
#customize-control-site-header-alignment .customize-control-title {
		
		margin-bottom:15px;
		text-transform: uppercase;
		border-bottom:1px solid #58719E;
		color: #58719E;
		font-size:12px;
		
}';


	
	
$nounderlines = array('blogname','post-exerpt-length');

foreach ($nounderlines  as $control) {



$styles .= '#customize-control-'.esc_html($control).' span.customize-control-title {
	
	text-transform: uppercase;
	color: #58719E;
	font-size:12px;
	margin-bottom:7px;
}';


}

$leftControlss = array();
$leftControls  = array();
$leftControlss = the_gap_left_customize_controls();

foreach ($leftControlss  as $leftControls) { 
	foreach ($leftControls as $leftControl) {

$styles .= '#customize-control-'.esc_html($leftControl).'{
		width:48%;
		margin:0 auto;
		float:left;
		display:inline;
		clear:none;
}';

}
}


$underlines = the_gap_underline_customized_control();
foreach ($underlines  as $control) { 

$styles .= '#customize-control-'.esc_html($control).' span.customize-control-title {
	text-transform: uppercase;
	border-bottom:1px solid #58719E;
	color: #58719E;
	font-size:12px;
	margin-bottom:7px;
}';

}

$checkboxes = the_gap_checkbox_customized_control();

foreach ($checkboxes  as $control) { 

$styles .= '#customize-control-'.esc_html($control).' label {
	text-transform: uppercase;
	
	color: #58719E;
	font-size:12px;
	margin-bottom:7px;
}';
 
}

	wp_register_style( 'the_gap_customize_css', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all' );
	
	wp_enqueue_style( 'the_gap_customize_css', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all' );
	wp_add_inline_style( 'the_gap_customize_css', $styles );
	


}

}

endif;

return new The_Gap_Customized_Controls();
