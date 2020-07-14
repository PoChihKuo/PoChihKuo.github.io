<?php

/*
* localization of variables for js
*/

function the_gap_customize_control_js() {


	global $pagenow;
 
    if ($pagenow != 'customize.php') {
        return;
    }
	    
   wp_enqueue_script( 'the_gap_customize_control', get_template_directory_uri() . '/admin/customize-control.js', array( 'customize-controls', 'jquery' ), null, true );
	
	
	$site_title = the_gap_site_title_topbar_control();
	$the_gap_title_only = $site_title['title-only'];
	
	if(class_exists('The_Gap_Pro')){
		
	$site_title_pro = the_gap_pro_site_title_control();
	$the_gap_title_pro_only = $site_title_pro['title-only'];
	$the_gap_title_only = array_merge($the_gap_title_only, $the_gap_title_pro_only);
	
	}
	
	wp_localize_script( 'the_gap_customize_control', 'the_gap_title_only', $the_gap_title_only );	
	
	$the_gap_logo_only = $site_title['logoOnly'];
	wp_localize_script( 'the_gap_customize_control', 'the_gap_logoOnly', $the_gap_logo_only );
	
	$media_controls = the_gap_header_media_control();
	
	$the_gap_media_control_all = $media_controls['control-all'];
	$the_gap_media_image_only = $media_controls['image-only'];
	$the_gap_media_video_only = $media_controls['video-only'];
	$the_gap_media_slide_only = $media_controls['slide-only'];
	
	if(class_exists('The_Gap_Pro')){
	
	$media_controls_pro = the_gap_pro_header_media_control_js();
	
	
	$the_gap_media_control_all_pro = $media_controls_pro['control-all'];
	$the_gap_media_image_only_pro = $media_controls_pro['image-only'];
	$the_gap_media_video_only_pro = $media_controls_pro['video-only'];
	$the_gap_media_slide_only_pro = $media_controls_pro['slide-only'];
	
	
	$the_gap_media_control_all = array_merge($the_gap_media_control_all, $the_gap_media_control_all_pro);
	
	$the_gap_media_image_only = array_merge($the_gap_media_image_only, $the_gap_media_image_only_pro);
	$the_gap_media_video_only = array_merge($the_gap_media_video_only, $the_gap_media_video_only_pro);
	$the_gap_media_slide_only = array_merge($the_gap_media_slide_only, $the_gap_media_slide_only_pro);
	
	}
	
	wp_localize_script( 'the_gap_customize_control', 'the_gap_media_control_all', $the_gap_media_control_all );
	wp_localize_script( 'the_gap_customize_control', 'the_gap_media_image_only', $the_gap_media_image_only );
	wp_localize_script( 'the_gap_customize_control', 'the_gap_media_video_only', $the_gap_media_video_only );
	wp_localize_script( 'the_gap_customize_control', 'the_gap_media_slide_only', $the_gap_media_slide_only );
		
	wp_enqueue_script( 'the_gap_customize_control' );
	
}
	
add_action( 'customize_controls_enqueue_scripts', 'the_gap_customize_control_js' );
add_action( 'admin_enqueue_scripts', 'the_gap_customize_control_js' );


 if ( ! function_exists( 'the_gap_customizer_live' ) ):
function the_gap_customizer_live() {

		wp_enqueue_script(
			'the_gap_some_handle',
			get_template_directory_uri() . '/js/customizer.js', // URL
			array( 'jquery', 'customize-preview' ), null, true
		);

}
	
endif;
add_action( 'customize_preview_init', 'the_gap_customizer_live' );

function the_gap_php_js(){




$the_gap_controls = the_gap_get_color_js('control');
$the_gap_selectors = the_gap_get_color_js('selector');

$the_gap_bg_controls = the_gap_get_color_js('bg-control');
$the_gap_bg_selectors = the_gap_get_color_js('bg-selector');

$the_gap_hover_controls = the_gap_get_color_js('hover-control');
$the_gap_hover_selectors = the_gap_get_color_js('hover-selector');

$the_gap_hover_bg_controls = the_gap_get_color_js('hover-bg-control');
$the_gap_hover_bg_selectors = the_gap_get_color_js('hover-bg-selector');

$the_gap_src = get_template_directory_uri().'/assets/images/';


wp_localize_script('the_gap_some_handle', 'the_gap_src', $the_gap_src);


			
$the_gap_imgControls = the_gap_get_two_dimension_style('control','image');
$the_gap_imgSelectors = the_gap_get_two_dimension_style('selector','image');
  

wp_localize_script( 'the_gap_some_handle', 'the_gap_imgControls', $the_gap_imgControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_imgSelectors', $the_gap_imgSelectors );

wp_localize_script( 'the_gap_some_handle', 'the_gap_colorParams', $the_gap_controls );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_selectorParams', $the_gap_selectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bgcolorParams', $the_gap_bg_controls );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_bgselectorParams', $the_gap_bg_selectors );	

wp_localize_script( 'the_gap_some_handle', 'the_gap_hoverControls', $the_gap_hover_controls  );
wp_localize_script( 'the_gap_some_handle', 'the_gap_hoverSelectors', $the_gap_hover_selectors  );

wp_localize_script( 'the_gap_some_handle', 'the_gap_hoverbgControls', $the_gap_hover_bg_controls  );
wp_localize_script( 'the_gap_some_handle', 'the_gap_hoverbgSelectors', $the_gap_hover_bg_selectors  );

/* ================== */

if ( class_exists('The_Gap_Pro')) { 

	$the_gap_font_pro = 'gap_Pro';

}else {
	$the_gap_font_pro = 'gap';
}

if ( class_exists('The_Gap_Pro')) { 



$the_gap_font_controls = the_gap_pro_get_fonts_style('family','control');
$the_gap_font_selectors = the_gap_pro_get_fonts_style('family','selector');

$the_gap_f_sizes = the_gap_pro_get_fonts_style('size','control');
$the_gap_fsize_selectors = the_gap_pro_get_fonts_style('size','selector');

$the_gap_font_heights = the_gap_pro_get_fonts_style('height','control');
$the_gap_fheight_selectors = the_gap_pro_get_fonts_style('height','selector');

$the_gap_font_weights = the_gap_pro_get_fonts_style('weight','control');
$the_gap_fweight_selectors = the_gap_pro_get_fonts_style('weight','selector');

$the_gap_font_styles = the_gap_pro_get_fonts_style('style','control');
$the_gap_fstyle_selectors = the_gap_pro_get_fonts_style('style','selector');
			
$the_gap_font_transforms = the_gap_pro_get_fonts_style('transform','control');
$the_gap_ftransform_selectors = the_gap_pro_get_fonts_style('transform','selector');

$the_gap_font_spacings = the_gap_pro_get_fonts_style('spacing','control');
$the_gap_fspacing_selectors = the_gap_pro_get_fonts_style('spacing','selector');



wp_localize_script( 'the_gap_some_handle', 'the_gap_fontParams', $the_gap_font_controls );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontselectorParams', $the_gap_font_selectors);

wp_localize_script( 'the_gap_some_handle', 'the_gap_fontSizesParams', $the_gap_f_sizes );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontSizesSelectors', $the_gap_fsize_selectors);

wp_localize_script( 'the_gap_some_handle', 'the_gap_fontHeightParams', $the_gap_font_heights );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontHeightSelectors', $the_gap_fheight_selectors);

wp_localize_script( 'the_gap_some_handle', 'the_gap_fontWeightParams', $the_gap_font_weights );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontWeightSelectors', $the_gap_fweight_selectors);

wp_localize_script( 'the_gap_some_handle', 'the_gap_fontStyleParams', $the_gap_font_styles );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontStyleSelectors', $the_gap_fstyle_selectors);

wp_localize_script( 'the_gap_some_handle', 'the_gap_fontTransformParams', $the_gap_font_transforms );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontTransformSelectors', $the_gap_ftransform_selectors);

wp_localize_script( 'the_gap_some_handle', 'the_gap_fontSpacingParams', $the_gap_font_spacings );	
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontSpacingSelectors', $the_gap_fspacing_selectors);
}

wp_localize_script( 'the_gap_some_handle', 'the_gap_font_pro', $the_gap_font_pro );
/* ================== */


$the_gap_boderBttmColorControls = the_gap_get_border_width_style_radius('control','bottom-border-color');
$the_gap_boderBttmWidthControls = the_gap_get_border_width_style_radius('control','bottom-border-width');
$the_gap_boderBttmStyleControls = the_gap_get_border_width_style_radius('control','bottom-border-style');

$the_gap_boderBttmColorSelectors = the_gap_get_border_width_style_radius('selector','bottom-border-color');
$the_gap_boderBttmWidthSelectors = the_gap_get_border_width_style_radius('selector','bottom-border-width');
$the_gap_boderBttmStyleSelectors = the_gap_get_border_width_style_radius('selector','bottom-border-style');

wp_localize_script( 'the_gap_some_handle', 'the_gap_boderBttmColorControls', $the_gap_boderBttmColorControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_boderBttmWidthControls', $the_gap_boderBttmWidthControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_boderBttmStyleControls', $the_gap_boderBttmStyleControls );

wp_localize_script( 'the_gap_some_handle', 'the_gap_boderBttmColorSelectors', $the_gap_boderBttmColorSelectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_boderBttmWidthSelectors', $the_gap_boderBttmWidthSelectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_boderBttmStyleSelectors', $the_gap_boderBttmStyleSelectors );

/* ================== */
$the_gap_bodertopColorControls = the_gap_get_border_width_style_radius('control','top-border-color');
$the_gap_bodertopWidthControls = the_gap_get_border_width_style_radius('control','top-border-width');
$the_gap_bodertopStyleControls = the_gap_get_border_width_style_radius('control','top-border-style');

$the_gap_bodertopColorSelectors = the_gap_get_border_width_style_radius('selector','top-border-color');
$the_gap_bodertopWidthSelectors = the_gap_get_border_width_style_radius('selector','top-border-width');
$the_gap_bodertopStyleSelectors = the_gap_get_border_width_style_radius('selector','top-border-style');

wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertopColorControls', $the_gap_bodertopColorControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertopWidthControls', $the_gap_bodertopWidthControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertopStyleControls', $the_gap_bodertopStyleControls );

wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertopColorSelectors', $the_gap_bodertopColorSelectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertopWidthSelectors', $the_gap_bodertopWidthSelectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertopStyleSelectors', $the_gap_bodertopStyleSelectors );



/* ================== */
$the_gap_bodertwoColorControls = the_gap_get_border_width_style_radius('control','two-border-color');
$the_gap_bodertwoWidthControls = the_gap_get_border_width_style_radius('control','two-border-width');
$the_gap_bodertwoSyleControls = the_gap_get_border_width_style_radius('control','two-border-style');

$the_gap_bodertwoColorSelectors = the_gap_get_border_width_style_radius('selector','two-border-color');
$the_gap_bodertwoWidthSelectors = the_gap_get_border_width_style_radius('selector','two-border-width');
$the_gap_bodertwoStyleSelectors = the_gap_get_border_width_style_radius('selector','two-border-style');

wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertwoColorControls', $the_gap_bodertwoColorControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertwoWidthControls', $the_gap_bodertwoWidthControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertwoSyleControls', $the_gap_bodertwoSyleControls );

wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertwoColorSelectors', $the_gap_bodertwoColorSelectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertwoWidthSelectors', $the_gap_bodertwoWidthSelectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_bodertwoStyleSelectors', $the_gap_bodertwoStyleSelectors );

/* ================== */

$the_gap_borderbase = the_gap_get_border_width_style_radius('section','border');
$the_gap_borderSelectors = the_gap_get_border_width_style_radius('selector','border');

wp_localize_script( 'the_gap_some_handle', 'the_gap_borderBase', $the_gap_borderbase );
wp_localize_script( 'the_gap_some_handle', 'the_gap_borderSelectors', $the_gap_borderSelectors );



$the_gap_alignControls = the_gap_get_two_dimension_style('control','three');
$the_gap_alignSelectors = the_gap_get_two_dimension_style('selector','three');
wp_localize_script( 'the_gap_some_handle', 'the_gap_alignControls ', $the_gap_alignControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_alignSelectors', $the_gap_alignSelectors );

$the_gap_justifyControls = the_gap_get_two_dimension_style('control','four');
$the_gap_justifySelectors = the_gap_get_two_dimension_style('selector','four');
wp_localize_script( 'the_gap_some_handle', 'the_gap_justifyControls', $the_gap_justifyControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_justifySelectors', $the_gap_justifySelectors );

$the_gap_fontSizeControls = the_gap_get_two_dimension_style('control','font-size');
$the_gap_fontSizeSelectors = the_gap_get_two_dimension_style('selector','font-size');
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontSizeControls', $the_gap_fontSizeControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_fontSizeSelectors', $the_gap_fontSizeSelectors );

$the_gap_checkControls = the_gap_get_two_dimension_style('control','check');
$the_gap_checkSelectors = the_gap_get_two_dimension_style('selector','check');

if(class_exists('woocommerce')){
	
	$the_gap_woo_enableControls = the_gap_get_two_dimension_style('control','woo-enable');
	$the_gap_woo_enableSelectors = the_gap_get_two_dimension_style('selector','woo-enable');
	$the_gap_checkControls = array_merge($the_gap_checkControls, $the_gap_woo_enableControls);
	$the_gap_checkSelectors = array_merge($the_gap_checkSelectors, $the_gap_woo_enableSelectors);

}

wp_localize_script( 'the_gap_some_handle', 'the_gap_checkControls', $the_gap_checkControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_checkSelectors', $the_gap_checkSelectors );

$the_gap_hideControls = the_gap_get_two_dimension_style('control','hide');
$the_gap_hideSelectors = the_gap_get_two_dimension_style('selector','hide');

if(class_exists('woocommerce')){
	
	$the_gap_woo_hideControls = the_gap_get_two_dimension_style('control','woo-hide');
	$the_gap_woo_hideSelectors = the_gap_get_two_dimension_style('selector','woo-hide');
	$the_gap_hideControls = array_merge($the_gap_hideControls, $the_gap_woo_hideControls);
	$the_gap_hideSelectors = array_merge($the_gap_hideSelectors, $the_gap_woo_hideSelectors);

}

wp_localize_script( 'the_gap_some_handle', 'the_gap_hideControls', $the_gap_hideControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_hideSelectors', $the_gap_hideSelectors );



$the_gap_singleControls = the_gap_get_two_dimension_style('control','single');
$the_gap_singleSelectors = the_gap_get_two_dimension_style('selector','single');
$the_gap_singleProperty = the_gap_get_two_dimension_style('property','single');
wp_localize_script( 'the_gap_some_handle', 'the_gap_singleControls', $the_gap_singleControls );
wp_localize_script( 'the_gap_some_handle', 'the_gap_singleSelectors', $the_gap_singleSelectors );
wp_localize_script( 'the_gap_some_handle', 'the_gap_singleProperty', $the_gap_singleProperty );


$the_gap_readMore = the_gap_get_two_dimension_style('control','read-more');	
$the_gap_readMoreSelectors = the_gap_get_two_dimension_style('selector','read-more');	
wp_localize_script( 'the_gap_some_handle', 'the_gap_readMoreControls', $the_gap_readMore );
wp_localize_script( 'the_gap_some_handle', 'the_gap_readMoreSelectors', $the_gap_readMoreSelectors );

$the_gap_accent = the_gap_accent_color_selectors();
$the_gap_accentbg = the_gap_accent_bgcolor_selectors();
$the_gap_accentborder = the_gap_accent_border_selectors();
$the_gap_accentTopborder = the_gap_accent_border_top_selectors();
$the_gap_buttonSelectors = the_gap_button_selectors();

wp_localize_script( 'the_gap_some_handle', 'the_gap_accent', $the_gap_accent );
wp_localize_script( 'the_gap_some_handle', 'the_gap_accentbg', $the_gap_accentbg );
wp_localize_script( 'the_gap_some_handle', 'the_gap_accentborder', $the_gap_accentborder );
wp_localize_script( 'the_gap_some_handle', 'the_gap_accentTopborder', $the_gap_accentTopborder );
wp_localize_script( 'the_gap_some_handle', 'the_gap_buttonSelectors', $the_gap_buttonSelectors );

$the_gap_formSelectors = the_gap_form_input_selector();
wp_localize_script( 'the_gap_some_handle', 'the_gap_formSelectors', $the_gap_formSelectors );

}
add_action( 'wp_enqueue_scripts', 'the_gap_php_js' );


function the_gap_main_js(){

wp_register_script( 'the_gap_few_handle', get_template_directory_uri() . '/js/main.js' );



$the_gap_sticky = get_theme_mod('enable-sticky-header','1');
$the_gap_full_head = get_theme_mod('enable-full-page-header-media','0');
if($the_gap_sticky != 1){
	$the_gap_sticky = '2';
}

wp_localize_script( 'the_gap_few_handle', 'the_gap_sticky', $the_gap_sticky );



$the_gap_headerAlign = get_theme_mod('site-header-alignment','right');

wp_localize_script( 'the_gap_few_handle', 'the_gap_headerAlign', $the_gap_headerAlign );

// Enqueued script with localized data.
wp_enqueue_script( 'the_gap_few_handle' );

}
add_action( 'wp_enqueue_scripts', 'the_gap_main_js' );


