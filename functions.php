<?php

/**
 * the-gap functions and definitions.
 * 
 * @package The Gap
**/

require_once( get_template_directory() . '/inc/nl-admin.php' );
require_once( get_template_directory() . '/inc/meta-boxes.php' );

/**
 * Styles
*/

require get_template_directory() . '/inc/customizer/styles.php';
require_once( get_template_directory() . '/framework/framework.php' );

if (!isset($the_gap_theme)) {
$the_gap_theme = new The_Gap_framework();
}
       
define('THE_GAP_THEME_DIR', get_template_directory());


/**
 * Custom template tags for this theme.
 */
require THE_GAP_THEME_DIR . '/inc/template-tags.php';



/*  core custom header feature */
require THE_GAP_THEME_DIR . '/inc/custom-header.php';


/**
 * Customizer
*/


function the_gap_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	
	require get_template_directory() . '/inc/customizer/panels.php';
	if(class_exists('woocommerce')){
		
		require get_template_directory() . '/inc/customizer/panels-woo.php';
		require get_template_directory() . '/inc/customizer/settings/woo-settings.php';
	}
	
	require get_template_directory() . '/inc/customizer/settings/font.php';
	require get_template_directory() . '/inc/customizer/settings/post-categories.php';
	
	require get_template_directory() . '/inc/customizer/settings/colors.php';
	require get_template_directory() . '/inc/customizer/settings/allimages.php';
	require get_template_directory() . '/inc/customizer/settings/allheadings.php';
	require get_template_directory() . '/inc/customizer/settings/checkbox.php';
	require get_template_directory() . '/inc/customizer/settings/layout.php';
	require get_template_directory() . '/inc/customizer/settings/positions.php';
	require get_template_directory() . '/inc/customizer/settings/padding.php';
	require get_template_directory() . '/inc/customizer/settings/height-width.php';
	
	
	require get_template_directory() . '/inc/customizer/settings/design-size.php';
	require get_template_directory() . '/inc/customizer/settings/input.php';
	require get_template_directory() . '/inc/customizer/settings/local/extra/extras.php';
	require get_template_directory() . '/inc/customizer/contextual-control.php';
		
}
add_action( 'customize_register', 'the_gap_customize_register' );

require THE_GAP_THEME_DIR . '/inc/customizer/selective-refresh.php';



/*   */
require THE_GAP_THEME_DIR . '/inc/customizer/sanitize.php';
require THE_GAP_THEME_DIR . '/inc/customizer/controls.php';


require THE_GAP_THEME_DIR . '/inc/topbar-social.php';
require THE_GAP_THEME_DIR . '/inc/topbar-text.php';


require THE_GAP_THEME_DIR . '/inc/customizer/core.php';

require THE_GAP_THEME_DIR . '/inc/customizer/customize-control.php';
require THE_GAP_THEME_DIR . '/inc/customizer/settings/local/local.php';

require THE_GAP_THEME_DIR . '/inc/arrays/nl-all-fonts.php';


require THE_GAP_THEME_DIR . '/framework/utility-functions.php';

require THE_GAP_THEME_DIR . '/inc/extra-function.php';


function the_gap_widgets_initialise() {
	
		
		$all_widgets = the_gap_all_widgets();
		foreach($all_widgets as $panel_widget){
		register_widget( $panel_widget);
		
		}
	if(class_exists('woocommerce')){
		register_widget('The_Gap_Widget_Products');
	}
		
}
add_action( 'widgets_init', 'the_gap_widgets_initialise' );



/**
 * widgets.
 */

require THE_GAP_THEME_DIR . '/inc/widgets/social.php';
require THE_GAP_THEME_DIR . '/inc/widgets/contact-us.php';
require THE_GAP_THEME_DIR . '/inc/widgets/latest-post-list.php';

require THE_GAP_THEME_DIR . '/inc/widgets/slides-overlays.php';
require THE_GAP_THEME_DIR . '/inc/widgets/shortcode.php';
require THE_GAP_THEME_DIR . '/inc/widgets/ms-author-detail.php';



if(class_exists('woocommerce')){
	require THE_GAP_THEME_DIR . '/inc/customizer/core-woo.php';
	require THE_GAP_THEME_DIR . '/inc/widgets/wc-widget-products-extended.php';
	require THE_GAP_THEME_DIR . '/inc/woo-function.php';
}

require_once dirname( __FILE__ ) . '/framework/plugin/class-tgm-plugin-activation.php';



