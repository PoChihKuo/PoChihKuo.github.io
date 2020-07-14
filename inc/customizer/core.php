<?php

/* Customizer settings, controls and style related functions
 * Author: Kudrat E Khuda
 * 
 * @package the-gap
*/


/* 
* Set value of all panels of customizer except woocommerce
creating panels in panel.php
*/

function the_gap_panels() {
	
return $panels = array(

'body-accent'=>__('Body Font,Accent & Link Color','the-gap' ),
'layout'=>__('Background Color & Text Color','the-gap' ),
'topbar'=>__('Topbar & Header Social','the-gap' ),
'site-header'=>__('Site Header Panel','the-gap' ),

'post'=>__('Blog Post Panel','the-gap' ),

'footer'=>__('Footer & Sidebar Panel','the-gap' ),
'general'=>__('General Panel','the-gap' ),


);
	
}


/* 
* Set value of all sections of customizer except woocommerce
*/

function the_gap_panels_sections() {
	
	
	
	$panels_sections = array(
	
	'general' =>array('general' =>array('general'=>'general','label'=>__('General','the-gap'),'description'=>''),
	
	'scroll-up' =>array('scroll-up'=>'scroll-up','label'=>__('Scroll Up','the-gap'),'description'=>''),
	
	'pagination' =>array('pagination'=>'pagination','label'=>__('Pagination','the-gap'),'description'=>''),
	
	'buttons' =>array('buttons'=>'buttons','label'=>__('Buttons','the-gap'),'description'=>''),
	'site-width' =>array('site-width'=>'site-width','label'=>__('Site Width','the-gap'),'description'=>''),
	
	),
	
	'body-accent' => array('general' =>
	array('general'=>'general','label'=>__('Accent Color & Body Font','the-gap'),'description'=>''),
	'link-color'=>array('link-color'=>'link-color','label'=>__('Link Color','the-gap'),'description'=>'')),
	
	'layout' => array('site-layout' => 
	array('site-layout'=>'site-layout','label'=>__('Site Layout','the-gap'),'description'=>''),
	'site-background' =>array('site-background'=>'site-background','label'=>__('Site Background','the-gap'),'description'=>''),
	'sidebar-layout' =>array('sidebar-layout'=>'sidebar-layout','label'=>__('Sidebar Layout','the-gap'),'description'=>'')
	),
	
	
	'topbar' =>  array('topbar' => 
	array('topbar'=>'topbar','label'=>__('Topbar','the-gap'),'description'=>''),
	'topbar-contact'=>array('topbar-contact'=>'topbar-contact','label'=>__('Topbar Text','the-gap'),'description'=>''),
	'topbar-social'=>array('topbar-social'=>'topbar-social','label'=>__('Topbar/Header Social','the-gap'),'description'=>'')),
	
	'site-header' => array(
	'site-header'=>array('site-header'=>'site-header','label'=>__('Site Header & Site Icon','the-gap'),'description'=>''),
	'site-title'=>array('site-title'=>'site-title','label'=>__('Site Title & Logo','the-gap'),'description'=>''),
	'main-menu'=>array('main-menu'=>'main-menu','label'=>__('Navigation','the-gap'),'description'=>'')),
	

	'footer' => array(

	'footer-widget'=>array('footer-widget'=>'footer-widget','label'=>__('Footer Widget','the-gap'),'description'=>''),
	'footer-info'=>array('footer-info'=>'footer-info','label'=>__('Footer Info','the-gap'),'description'=>'')),

	'post' => array('feature-item' => 
	array('feature-item'=>'feature-item','label'=>__('Featured Post','the-gap'),'description'=>''),

	'post-general' =>array('post-general'=>'post-general','label'=>__('Blog Frontpage/Homepage/Archive','the-gap'),'description'=>''),
	'single-general' =>array('single-general'=>'single-general','label'=>__('Single Post','the-gap'),'description'=>''),
	'popular-post' =>array('popular-post'=>'popular-post','label'=>__('Popular Post','the-gap'),'description'=>'')),
	
	);
	

	return $panels_sections;
	
}

/* 
* Section creation function of customizer(except woocommerce) 
creating sections in panel.php
*/

function  the_gap_panels_sections_style($param) {
	
	
	$settings = the_gap_panels_sections();
	
	$firstlevelkey = array_keys($settings);
	
	for ($i=0; $i<=6; $i++) {
		
		
		
	foreach ($settings[$firstlevelkey[$i]] as $secondlevelkey=>$secondlevelval) {
		
		$thirdlevelval = array_values($secondlevelval);
		$section = $thirdlevelval[0];
		$sections[] = $section;
		$control = $secondlevelkey;
		$controls[]= $control;
	
		$label = $thirdlevelval[1];
		$labels[] = $label;
		
		$description = $thirdlevelval[2];
		$descriptions[] = $description;
		
		$panel =  $firstlevelkey[$i];
		
		$panels[] = $panel;

	}
	
	
	}

	
	if($param =='control'){
	return $controls;	
	}
	elseif($param =='section'){
	return $sections;	
	}
	
	elseif($param =='label'){
	return $labels;	
	}
	elseif($param =='panel'){
	return $panels;	
	}
	
	elseif($param =='description'){
	return $descriptions;
	}
	
}


/*  Customized Controls  */
/* all contextual control are related to customizer/customize-control.php */

function the_gap_left_customize_controls(){


$rsections = the_gap_get_border_width_style_radius('section','border');


foreach ($rsections as $rsection){
	$control = $rsection.'-border-width';
	$controls[] = $control;
	$rcontrol = $rsection.'-border-radius';
	$radiuscontrols[] = $rcontrol;
	$scontrol = $rsection.'-border-style';
	$stylecontrols[] = $scontrol;
}

$otherControls = array('scroll-up-button-size','scroll-up-icon-size','scroll-up-color',
		'title-length','post-exerpt-length');

		return $leftControls = array($otherControls, $controls,$radiuscontrols,$stylecontrols);
}



function the_gap_checkbox_customized_control(){
	return $checkboxes = array('enable-page-title','enable-single-meta','enable-post-meta','enable-post-title',
	'enable-single-title','enable-topbar','enable-scrollup','hide-featured-images-single',
	'hide-featured-images','enable-full-content-post','enable-excerpt','social-number','contact-number');
	
}

function the_gap_underline_customized_control() {
	
	return $underlines = array('site-background',
	'social-item-design','social-item-size','social-item-target','footer_widget_areas',
		'post-header-align','single-header-align',
		'page-layout-option','post-layout-option','single-post-layout-option',
		'site-background-type','site-background-image-style','scroll-up-style',
		'paging-alignment','scroll-up-icon',
		'site-layout','site-title-type',
		'sidebar-widget-title-alignment','footer-widget-title-alignment',
		'footer-widget-areas','page-content-align','post-content-align'
		,'single-content-align','blog-layout','site_icon','social-number',
		'topbar-text-alignment','topbar-social-alignment','footer-info-height',
		'header-media-type','page-title-align','thumbnail-sizes',
		'single-thumbnail-sizes','header_media_position','topbar-layout'
		);
		
}



function the_gap_site_background_padding_margin(){
	
return $site_background = array('site-background-margins-heading', 'site-layout-margin-top',
'site-layout-margin-bottom', 'site-layout-margin-left',
'site-layout-margin-right');

}

/*  CONTEXTUAL CONTROL START  */
/* all contextual control are related to customizer/contextual-control.php */

function the_gap_remove_control(){
	
	return $removeControl = array('colors','background_image','header_image');


}

function the_gap_alter_priority(){
	
	return $removeControl = array('colors','background_image','header_image');

}

function the_gap_alter_label(){
	
	return $removeControl = array('colors','background_image','header_image');

}

function the_gap_blog_description_control() {
	return $dcontrols = array('blogdescription','site-description-text-color','site-description-text-color-opacity');
	
}

function the_gap_site_title_topbar_control() {
	
	return $sitetitlecontrols = array(

	'title-only' => array('blogname','site-title-text-color',
			'site-title-text-color-opacity','site-title-font-heading',
			'site-title-font-size','site-title-color-heading'
			
			),
			
	'logoOnly' => array('logo-heading','custom_logo'),
	
	'topbars' => array('topbar-contact','topbar-social'),
	
	'topbar' => array('topbar-color-heading','topbar-background-color','topbar-background-color-opacity')

	);
	
}

function the_gap_header_media_control() {
	
	return $headerMediaControls = array(

	'control-all' => array('header_image','header_video','external_header_video',
	'blogdescription','header-media-overlay-heading','header_media_position',
	'header-media-title-input','overlay-text-color','overlay-text-color-opacity',
	'overlay-background-color','overlay-background-color-opacity','show_media_pages',
	'page-selection-for-slides-heading','ovr_heights','header_ovl_style',
	'enable-animated-text','page-selection-slide1','page-selection-slide2',
	'page-selection-slide3','page-selection-slide4','header-slider-btn-text',
	'header-media-btn-url','enable-header-media-btn','header_slider_url1',
	'header_slider_url2','header_slider_url3','header_slider_url4'),
			
	'video-only' => array('header_video','external_header_video',
	'header-media-title-input','overlay-text-color',
	'enable-animated-text','show_media_pages',
	'header-media-overlay-heading','header-slider-btn-text',
	'header-media-btn-url','enable-header-media-btn'),
	
	'image-only' => array('header_image',
	'blogdescription','header-media-overlay-heading','header_media_position',
	'header-media-title-input','overlay-text-color','overlay-text-color-opacity',
	'overlay-background-color','overlay-background-color-opacity','show_media_pages',
	'ovr_heights','header_ovl_style','enable-animated-text','header-slider-btn-text',
	'header-media-btn-url','enable-header-media-btn'),
	
	'slide-only' => array(
	'header-media-overlay-heading','header_media_position',
	'overlay-text-color','overlay-text-color-opacity','show_media_pages',
	'overlay-background-color','overlay-background-color-opacity',
	'page-selection-for-slides-heading','ovr_heights','header_ovl_style',
	'page-selection-slide1','page-selection-slide2',
	'page-selection-slide3','page-selection-slide4','header-slider-btn-text',
	'enable-header-media-btn','header_slider_url1',
	'header_slider_url2','header_slider_url3','header_slider_url4')

	);
	
}


function the_gap_background_control() {
	
	return $backgrounds = array('site-content-background-color','site-content-text-color',
	'site-content-background-color-opacity','site-content-text-color-opacity','background_color',
	'site-background-color-heading','background_image','site-content-link-color');
	
}


function the_gap_contact_input_active_callback($control) {
	
	$control_id = $control->id;
	$callback = false;
	
	$contactNum = get_theme_mod('contact-number','2');
		
				for ($i=1; $i <= $contactNum; $i++){
					
					$contactInput = 'topbar-contact-input'.$i;
					
					if ($control_id == $contactInput){
					$callback = true;
					}
					
					$contactIcon = 'topbar-contact-icon'.$i;
					if ($control_id == $contactIcon ){
					$callback = true;
					}
					
					$contactUrl = 'topbar-text-url'.$i;
					
					if ($control_id == $contactUrl){
					$callback = true;
					}
				}
  
	return $callback ;

}

function the_gap_topbar_active_callback($control) {
	
	$control_id = $control->id;
	$callback = true;
	
	$site_header = get_theme_mod('site-header-alignment','right');
		
			
		
					if ($control_id == 'topbar-layout' && $site_header == 'center'){
					$callback = false;
					}
					
					
  
	return $callback ;

}


function the_gap_ovl_style_active_callback($control){
	
	$control_id = $control->id;
	$callback = true;
	
	$header_media_type = get_theme_mod('header-media-type','image');
	$ovr_heights = get_theme_mod('ovr_heights','box');
	
	if ($control_id == 'header_ovl_style' && $ovr_heights == 'all'){
		$callback = false;
	}
	if ($control_id == 'header_ovl_style' && $header_media_type == 'none'){
		$callback = false;
	}
	
	return $callback ;
	
}



function the_gap_social_input_active_callback($control) {
	
	$control_id = $control->id;
	$callback = false;
	
	$socialNum = get_theme_mod('social-number');
		
				for ($i=1; $i <= $socialNum; $i++){
					

					if ($control_id == 'topbar-social-icon'.$i){
					$callback = true;
					}
					
					
					if ($control_id == 'topbar-social-url'.$i){
					$callback = true;
					}
					
					
				}
  
	return $callback ;

}


function the_gap_background_active_callback($control) {
	$control_id = $control->id;
	$callback = false;
	
	$site_background_type = get_theme_mod('site-background-type');
	
		if ($site_background_type == 'one' && ($control_id == 'background_color'|| $control_id == 'site-background-color-heading'
		 || $control_id == 'site-content-background-color'|| $control_id == 'site-content-text-color' || $control_id == 'site-content-link-color' ||
		 $control_id == 'site-content-background-color-opacity'||$control_id == 'site-content-text-color-opacity')) {
				
		$callback = true;
		
		}
		if ($site_background_type == 'two' && ($control_id == 'background_image' )) {
			 
		$callback = true;
		
		}
		
      
	return $callback ;
}


function the_gap_box_layout_active_callback($control) {

	$callback = false;
	$control_id = $control->id;
	$layout = get_theme_mod('site-layout');
	
	
	  
	if ($layout == 'boxed') {
		$callback = true;
	}
	  
	return $callback ;
}


function the_gap_social_item_size_active_callback($control) {

	$callback = false;
	
	$social_item = get_theme_mod('social-item-design','one');
		
		if ($social_item == 'one' && !empty($social_item)){ 
		$callback = true;
		}
      
	return $callback ;
}

function the_gap_enable_topbar_active_callback($section) {

	$callback = false;
	
	$enable_topbar = get_theme_mod('enable-topbar');
		
		if ($enable_topbar == 1){ 
		$callback = true;
		}
      
	return $callback ;
}


function the_gap_site_title_text_active_callback($control) {

	$callback = false;
	
	$control_id = $control->id;
	$site_title_type = get_theme_mod('site-title-type');
	if ($site_title_type =='one'){
		$callback = true;
	}
	
	return $callback;
}

function the_gap_site_logo_active_callback($control) {

	$callback = false;
	
	$control_id = $control->id;
	$site_title_type = get_theme_mod('site-title-type');
	if ($site_title_type =='two'){
		$callback = true;
	}
	
	return $callback;
}

function the_gap_header_media_active_callback($control) {

	$callback = false;
	
	$control_id = $control->id;
	$media_type = get_theme_mod('header-media-type');
	
	if ($media_type =='image' && $control_id == 'header_image'){
		$callback = true;
	}
	if ($media_type =='video' && $control_id == 'header_video'){
		$callback = true;
	}
	if ($media_type =='video' && $control_id == 'external_header_video'){
		$callback = true;
	}

	if (($media_type =='image') && ( $control_id == 'header-media-overlay-heading' ||
	 $control_id == 'blogdescription' || $control_id == 'show_media_pages' || 
	$control_id == 'header-media-title-input' || $control_id == 'overlay-text-color' || $control_id == 'enable-animated-text' ||
	$control_id == 'overlay-text-color-opacity' || $control_id == 'overlay-background-color' || $control_id == 'overlay-background-color-opacity'
	|| $control_id == 'header_media_position' ||  $control_id == 'ovr_heights'|| $control_id == 'header_ovl_style' ||
	 $control_id == 'full-page-header-media-heading' || $control_id == 'enable-header-media-btn' || $control_id == 'header-media-btn-url' ||
	$control_id == 'header-slider-btn-text'
	)){
		$callback = true;
	}
	if (($media_type =='video') && ( $control_id == 'header_media_position' ||  
	$control_id == 'enable-header-media-btn' || $control_id == 'header-media-btn-url' ||
	$control_id == 'header-slider-btn-text' ||
	$control_id == 'full-page-header-media-heading' ||
	$control_id == 'header-media-title-input'|| $control_id =='overlay-text-color'|| $control_id == 'enable-animated-text'||
	 $control_id == 'show_media_pages' || 
	$control_id == 'full-page-header-media-heading'||$control_id == 'header-media-overlay-heading')){
		$callback = true;
	}
	
	if (($media_type =='slide') && ( $control_id == 'header-media-overlay-heading' ||
	 $control_id == 'overlay-text-color' ||
	$control_id == 'overlay-text-color-opacity' || $control_id == 'overlay-background-color' || $control_id == 'overlay-background-color-opacity'
	|| $control_id == 'header_media_position' ||  $control_id == 'show_media_pages' || 
	$control_id == 'page-selection-for-slides-heading' || $control_id == 'ovr_heights'|| $control_id == 'header_ovl_style'
	||$control_id == 'the_gap_media_category_control'||
	$control_id == 'page-selection-slide1' || $control_id == 'page-selection-slide2' ||
	$control_id == 'page-selection-slide3' || $control_id == 'page-selection-slide4' ||
	$control_id == 'enable-header-media-btn' || 
	$control_id == 'header-slider-btn-text' || $control_id == 'header_slider_url1' ||
	$control_id == 'header_slider_url2' || $control_id == 'header_slider_url3' ||
	$control_id == 'header_slider_url4'
	)){
		$callback = true;
	}
	
	return $callback;
}




function the_gap_site_description_active_callback($control) {
	
	$control_id = $control->id;

	$callback = true;
	
	$description = get_theme_mod('hide-site-description');
	
	return $callback ;
}

/*    CONTEXUAL FUNCTION END */  


function the_gap_twoD_size(){
	$sections = the_gap_panels_sections();
	return $two_d = array(
	'scroll-up-button-size'=>array(	
				'section'=>$sections['general']['scroll-up']['scroll-up'],
				'selector'=>'.scroll-up a','default'=>'12','priority'=>'157',
		'label'=>__('Button Size','the-gap'),'sanitize'=>'','property'=>'text-transform','unit'=>'',
		'transport'  => 'postMessage','description'  => ''));
	
}

/*
* This function creates arrays to create controls, settings and styles.
* These arrays goes to customizer.js to make control live customizer.
* This function calls 34 funcitons.
* Path: calling 34 functions -> creating arrays -> send to setting folder to create
controls and settings and also send style to style.php
*/

function the_gap_get_two_dimension_style($param,$types) {
	
	$style = '';
	$settings = array();
	$controls = array();
	$labels = array();
	$sections = array();
	$defaults = array();
	$priorities = array();
	$transports = array();
	$callbacks = array();
	$descriptions = array();
	
	if ($types == 'font-size'){
		/* design-size.php */
	$settings = the_gap_get_font_icon_size();
	} 

	elseif ($types == 'w-px'){
		/* design-size.php */
		$settings = the_gap_get_without_px();
	}

	elseif ($types == 'single'){
		/* padding.php */
		$settings = the_gap_get_margin_padding_single();
	}elseif ($types == 'icon'){
		/* input.php */
		$settings = the_gap_get_topbar_contact_input_icon();
	}elseif ($types == 'contact'){
		/* input.php */
		$settings = the_gap_get_topbar_contact_input();
	}elseif ($types == 'contact-url'){
		/* input.php */
		$settings = the_gap_get_topbar_text_url();
	}elseif ($types == 'social'){
		/* input.php */
		$settings = the_gap_get_topbar_social_icon();
	}elseif ($types == 'social-url'){
		/* input.php */
		$settings = the_gap_get_topbar_social_url();
	}elseif ($types == 'image'){
		/* allimages.php */
		$settings = the_gap_get_images();
	}
	elseif ($types == 'four'){
		/* layout.php */
	$settings = the_gap_get_four_alignment();
	}elseif ($types == 'three'){
		/* layout.php */
	$settings = the_gap_get_three_alignment();
	}
	elseif ($types == 'check'){
		/* checkbox.php */
	$settings = the_gap_get_enable_checkboxes();
	}
	elseif ($types == 'hide'){
		/* checkbox.php */
	$settings = the_gap_get_hide_checkboxes();
	}
	elseif ($types == 'width-height'){
		/* width-height.php */
	$settings = the_gap_get_height_width();
	}elseif ($types == 'read-more'){
		/* input.php */
	$settings = the_gap_get_more_input();
	}elseif ($types == 'query'){
		/* input.php */
	$settings = the_gap_get_post_query_input();
	}elseif ($types == 'page'){
		/* layout.php */
	$settings = the_gap_get_page_select();
	}
	elseif ($types == 'more-url'){
		/* input.php */
	$settings = the_gap_get_more_url();
	}elseif ($types == 'screen'){
		/* width-height.php */
	$settings = the_gap_get_screen_width();
	}
		 
	if ( class_exists('The_Gap_Pro')) { 
	
		if($types == 'page-pro'){
			$settings = the_gap_pro_get_page_select();
		}
		
		if($types == 'number-pro'){
			$settings = the_gap_pro_number_input();
		}
		
		if($types == 'hide-pro'){
			$settings = the_gap_pro_hide_controls();
		}
		
		if($types == 'check-pro'){
			$settings = the_gap_pro_enable_controls();
		}
		if($types == 'three-pro'){
			$settings = the_gap_pro_get_three_alignment();
		}
		if($types == 'url-pro'){
			$settings = the_gap_pro_get_url();
		}
		
			
	}
	
	if ( class_exists('woocommerce')) { 
	
		if($types == 'woo-more-url'){
			/* customizer/settings/woo-settings.php */
			$settings = the_gap_get_woo_more_url();
		}
		
		if($types == 'woo-read-more'){
			/* customizer/settings/woo-settings.php */
			$settings = the_gap_get_woo_more_input();
		}
		
		if($types == 'woo-hide'){
			/* customizer/settings/woo-settings.php */
			$settings = the_gap_get_woo_hide_checkboxes();
		}
		
		if($types == 'woo-enable'){
			/* customizer/settings/woo-settings.php */
			$settings = the_gap_get_woo_enable_checkboxes();
		}
		
		if($types == 'woo-page'){
			/* customizer/settings/woo-settings.php */
			$settings = the_gap_get_woo_page_select();
		}
		
		if($types == 'woo-image'){
			/* customizer/settings/woo-settings.php */
			$settings = the_gap_get_woo_images();
		}
		
		if($types == 'product-cat'){
			/* customizer/settings/woo-settings.php */
			$settings = the_gap_product_categories();
		}
		
		if ( class_exists('The_Gap_Pro')) { 
			
			if($types == 'woo-page-pro'){
				$settings = the_gap_pro_get_woo_page_select();
			}
			if($types == 'number-woo-pro'){
			$settings = the_gap_pro_woo_number_input();
			}
			if($types == 'three-pro-woo'){
			$settings = the_gap_pro_woo_get_three_alignment();
			}
			if($types == 'pro-product-cat'){
			$settings = the_gap_pro_product_categories();
			}
			if($types == 'pro-woo-url'){
			$settings = the_gap_woo_pro_get_url();
			}
			
			
			
		}
		
		
		
	}
	
	
	foreach ($settings as $firstlevelkey=>$firstlevelval) {
		
		$secondlevelval = array_values($firstlevelval);
		
		$control = $firstlevelkey;
		$controls[]= $control;
		
		$section = $secondlevelval[0];
		$sections[] = $section;
		
		$selector = $secondlevelval[1];
		$selectors[] = $selector;
		
		$default = $secondlevelval[2];
		$defaults[] = $default;
		
		$priority = $secondlevelval[3];
		$priorities[] = $priority;
		
		$label = $secondlevelval[4];
		$labels[] = $label;
		
		$callback = $secondlevelval[5];
		$callbacks[] = $callback;
		
		$property = $secondlevelval[6];
		$properties[] = $property;
		
		$unit = $secondlevelval[7];
		$units[] = $unit;
		
		$transport = $secondlevelval[8];
		$transports[] = $transport;
		
		$description = $secondlevelval[9];
		$descriptions[] = $description;
		
		
		$singleProperty = $secondlevelval[6];
		$singleProperties[] = $singleProperty;
		
		
		
		$mod_val = get_theme_mod($control);
	
		
		if (! empty( $mod_val ) && $types == 'font-size') {
			$mod_val = get_theme_mod($control,$default);
			$style 	.= "".esc_attr($selector). "{ font-size: " . intval($mod_val) . "px;}"."\n";
		}
	
		if (! empty( $mod_val ) && $types =='four') {
		    
		    $mod_val = get_theme_mod($control,$default);
		    
			$style 	.= "".esc_attr($selector). "{ text-align: " . esc_attr($mod_val). ";}"."\n";
		}
		if ($types =='three' || $types =='three-pro' || $types == 'three-pro-woo') {
		    
		    $mod_val = get_theme_mod($control,$default);
		    
			$style 	.= "".esc_attr($selector). "{ text-align: " . esc_attr($mod_val). ";}"."\n";
		}
		
		if (! empty( $mod_val ) && $types == 'single') {
		    
		    	$mod_val = get_theme_mod($control,$default);
			
			$style 	.= "".esc_attr($selector). "{ ".esc_attr($singleProperty).": " . intval($mod_val)."px;}"."\n";
		}
		if (! empty( $mod_val ) && $types == 'image') {
			$style 	.= "".esc_attr($selector). "{ background-image:url( " . esc_url($mod_val). ");}"."\n";

		}
		
	    if ( $types == 'hide' || $types == 'hide-pro' ) {
		    
		    $hide_val = get_theme_mod($control,$default);
	
			if ($hide_val == 1 ){
				
			$style 	.= "".esc_attr($selector). "{ display: none;}"."\n";
			
			}
			
			
		}
		
		if ($types == 'check')  {
		$mod_val = get_theme_mod($control,$default);
	        if ($mod_val == 1){
				
			$style 	= "".esc_attr($selector). "{ display: block;}"."\n";
			}else {
			$style 	= "".esc_attr($selector). "{ display: none;}"."\n";
			}
	
		}
		if ( class_exists('woocommerce')) { 
		
		 if ( $types == 'woo-hide' ) {
		    
		    $hide_val = get_theme_mod($control,$default);
	
			if ($hide_val == 1 ){
				
			$style 	.= "".esc_attr($selector). "{ display: none;}"."\n";
			
			}
			
			
		}
		
		
	
		}
		
	}
	
	if($param =='style'){
	return $style;	
	}
	elseif($param == 'control'){
	return $controls;	
	}
	elseif($param == 'section'){
	return $sections;	
	}
	elseif($param == 'selector'){
	return $selectors;	
	}
	elseif($param == 'default'){
	return $defaults;	
	}
	elseif($param == 'property'){
	return $properties;	
	}
	elseif($param == 'label'){
	return $labels;	
	}
	elseif($param == 'callback'){
	return $callbacks;	
	}
	elseif($param == 'description'){
	return $descriptions;	
	}
	elseif($param == 'priority'){
	return $priorities;	
	}
	elseif($param == 'transport'){
	return $transports;	
	}
	
}



/* INDIVIDUAL FONT & ICON SIZE
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php to create style and called from design-size.php using the_gap_get_two_dimension_style function to
create setting and controls. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.
*/
function the_gap_get_font_icon_size() {

$sections = the_gap_panels_sections();
return $get_size = array(

		
		
		'site-title-font-size'=>array(
				'section'=>$sections['site-header']['site-title']['site-title'],
				'selector'=>'.site-title a','default'=>'18','priority'=>'151',
		'label'=>__('Font Size','the-gap'),'sanitize'=>'','property'=>'font-size','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-top-level-font-size'=>array(
				'section'=>$sections['site-header']['main-menu']['main-menu'],
				'selector'=>'#main-navigation.main-menu ul li a,.menu-btn,#main-navigation.main-menu .search-icon button.sbtn .fa','default'=>'12','priority'=>'108',
		'label'=>__('Font Size','the-gap'),'sanitize'=>'','property'=>'font-size','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-sub-level-font-size'=>array(
				'section'=>$sections['site-header']['main-menu']['main-menu'],
				'selector'=>'#main-navigation.main-menu .sub-menu li a','default'=>'12','priority'=>'208',
		'label'=>__('Font Size','the-gap'),'sanitize'=>'','property'=>'font-size','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		
				);
		
}


/*
*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and padding.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*
*/

function the_gap_get_margin_padding_single() {
    
	$sections = the_gap_panels_sections();
	
	return $singles = array(
	
		'site-layout-margin-top'=>array(
				'section'=>$sections['layout']['site-layout']['site-layout'],
				'selector'=>'body.boxed #page','default'=>'','priority'=>'346',
				'label'=>__('Margin Top','the-gap'),'sanitize'=>'','property'=>'margin-top','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),	
		
		'site-layout-margin-bottom'=>array(
				'section'=>$sections['layout']['site-layout']['site-layout'],
				'selector'=>'body.boxed #page','default'=>'','priority'=>'346',
				'label'=>__('Margin Bottom','the-gap'),'sanitize'=>'','property'=>'margin-bottom','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'site-layout-margin-left'=>array(
				'section'=>$sections['layout']['site-layout']['site-layout'],
				'selector'=>'body.boxed #page','default'=>'','priority'=>'346',
				'label'=>__('Margin Left','the-gap'),'sanitize'=>'','property'=>'margin-left','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'site-layout-margin-right'=>array(
				'section'=>$sections['layout']['site-layout']['site-layout'],
				'selector'=>'body.boxed #page','default'=>'','priority'=>'346',
				'label'=>__('Margin Right','the-gap'),'sanitize'=>'','property'=>'margin-right','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		

		'footer-bar-padding-top'=>array(
				'section'=>$sections['footer']['footer-info']['footer-info'],
				'selector'=>'.site-info, .footerbar-text',
				'default'=>'','priority'=>'230',
		'label'=>__('Padding Top','the-gap'),'sanitize'=>'','property'=>'padding-top','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
				
		'footer-bar-padding-bottom'=>array(
				'section'=>$sections['footer']['footer-info']['footer-info'],
				'selector'=>'.site-info, .footerbar-text',
				
				'default'=>'','priority'=>'230',
		'label'=>__('Padding Bottom','the-gap'),'sanitize'=>'','property'=>'padding-bottom','unit'=>'',
		'transport'  => 'postMessage','description'  => '')
		);
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and design-size.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_get_post_query_input() {

$sections = the_gap_panels_sections();

return $get_input = array(
	
		'exclude-category'=>array(
				'section'=>$sections['post']['post-general']['post-general'],
				'selector'=>'','default'=>'','priority'=>'348',
		'label'=>__('Exclude Categories','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport'  => 'postMessage','description'  =>__('For more than one category use comma as separator. Ex: tips,tactics,design','the-gap'))
	
				);
}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and input.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer*/
function the_gap_get_topbar_contact_input() {

$sections = the_gap_panels_sections();

return $get_input = array(
		
		
		'topbar-contact-input1'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'.contacts-body span','default'=>'','priority'=>'40',
		'label'=>__('Link Text #1:','the-gap'),'sanitize'=>'','property'=>'text-transform','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'topbar-contact-input2'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'.contacts-body span','default'=>'','priority'=>'43',
		'label'=>__('Link Text #2:','the-gap'),'sanitize'=>'','property'=>'text-transform','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'topbar-contact-input3'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'.contacts-body span','default'=>'','priority'=>'46',
		'label'=>__('Link Text #3:','the-gap'),'sanitize'=>'','property'=>'text-transform','unit'=>'',
		'transport'  => 'refresh','description'  => ''),
		
		
		
		);
}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and input.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer*/
function the_gap_get_topbar_contact_input_icon() {

$sections = the_gap_panels_sections();

return $get_input = array(
		
		'topbar-contact-icon1'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'.contacts-body i.fa','default'=>'','priority'=>'39',
		'label'=>__('Link Icon #1:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'topbar-contact-icon2'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'.contacts-body i.fa','default'=>'','priority'=>'42',
		'label'=>__('Link Icon #2:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport'  => 'postMessage','description'  => ''),
		
		'topbar-contact-icon3'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'.contacts-body i.fa','default'=>'','priority'=>'45',
		'label'=>__('Link Icon #3:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport'  => 'refresh','description'  => ''),
		
		
		

				);
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and input.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer*/
function the_gap_get_topbar_text_url() {

$sections = the_gap_panels_sections();

return $get_url = array(
	
		'topbar-text-url1'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'','default'=>'','priority'=>'41',
		'label'=>__('Link Url #1:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-text-url2'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'','default'=>'','priority'=>'44',
		'label'=>__('Link Url #2:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-text-url3'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'','default'=>'','priority'=>'47',
		'label'=>__('Link Url #3:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => '')
		
	
	
				);
		
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and design-size.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer */

function the_gap_get_topbar_social_url() {

$sections = the_gap_panels_sections();

return $get_url = array(
		
		'topbar-social-url1'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'41',
		'label'=>__('Social Url #1:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-url2'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'43',
		'label'=>__('Social Url #2:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-url3'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'45',
		'label'=>__('Social Url #3:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-url4'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'47',
		'label'=>__('Social Url #4:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-url5'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'49',
		'label'=>__('Social Url #5:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-url6'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'51',
		'label'=>__('Social Url #6:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-url7'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'53',
		'label'=>__('Social Url #7:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-url8'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'55',
		'label'=>__('Social Url #8:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-text-url1'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'','default'=>'','priority'=>'41',
		'label'=>__('Link Url #1:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-text-url2'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'','default'=>'','priority'=>'44',
		'label'=>__('Link Url #2:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-text-url3'=>array(
				'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
				'selector'=>'','default'=>'','priority'=>'47',
		'label'=>__('Link Url #3:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
	
	
				);
		
}


/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and input.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer*/
function the_gap_get_topbar_social_icon() {

$sections = the_gap_panels_sections();

return $get_icon = array(
		
		'topbar-social-icon1'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'40',
		'label'=>__('Social Icon #1:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-icon2'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'42',
		'label'=>__('Social Icon #2:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-icon3'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'44',
		'label'=>__('Social Icon #3:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-icon4'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'46',
		'label'=>__('Social Icon #4:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-icon5'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'48',
		'label'=>__('Social Icon #5:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'topbar-social-icon6'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'50',
		'label'=>__('Social Icon #6:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		'topbar-social-icon7'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'52',
		'label'=>__('Social Icon #7:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		'topbar-social-icon8'=>array(
				'section'=>$sections['topbar']['topbar-social']['topbar-social'],
				'selector'=>'','default'=>'','priority'=>'54',
		'label'=>__('Social Icon #8:','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => '')
	
				);
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and design-size.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_get_more_url() {

$sections = the_gap_panels_sections();

		return $get_url = array(
		
		'footer-info-link-url'=>array(
				'section'=>'footer-info',
				'selector'=>'','default'=>__('www.themenextlevel.com','the-gap'),'priority'=>'21',
		'label'=>__('Site Info Link Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
	
		
		'feature-item-url1'=>array(
				'section'=>$sections['post']['feature-item']['feature-item'],
				'selector'=>'','default'=>'','priority'=>'22',
		'label'=>__('Featured Item Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'feature-item-url2'=>array(
				'section'=>$sections['post']['feature-item']['feature-item'],
				'selector'=>'','default'=>'','priority'=>'32',
		'label'=>__('Featured Item Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'feature-item-url3'=>array(
				'section'=>$sections['post']['feature-item']['feature-item'],
				'selector'=>'','default'=>'','priority'=>'42',
		'label'=>__('Featured Item Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'header-media-btn-url'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'80',
		'label'=>__('Button Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'header_slider_url1'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'441',
		'label'=>__('Slider Url#1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'header_slider_url2'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'443',
		'label'=>__('Slider Url#2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'header_slider_url3'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'445',
		'label'=>__('Slider Url#3','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'header_slider_url4'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'447',
		'label'=>__('Slider Url#4','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		
		
		
				);
		
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and input.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_get_more_input(){
	$sections = the_gap_panels_sections();

	return $input = array(
	
	'post_section_title'=>array(
				'section'=>$sections['post']['post-general']['post-general'],
				'selector'=>'.post_section_title',
				'default'=>'','priority'=>'24',
	'label'=>__('Front/Blog Page Section Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
		
	'post_feature_title1'=>array(
				'section'=>$sections['post']['feature-item']['feature-item'],
				'selector'=>'.feature-page-title',
				'default'=>__('Featured Title of Item1','the-gap'),'priority'=>'22',
		'label'=>__('Featured Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'post_feature_title2'=>array(
				'section'=>$sections['post']['feature-item']['feature-item'],
				'selector'=>'.feature-page-title',
				'default'=>__('Featured Title of Item2','the-gap'),'priority'=>'31',
		'label'=>__('Featured Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'post_feature_title3'=>array(
				'section'=>$sections['post']['feature-item']['feature-item'],
				'selector'=>'.feature-page-title',
				'default'=>__('Featured Title of Item3','the-gap'),'priority'=>'41',
		'label'=>__('Featured Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'read-more-input'=>array(
				'section'=>$sections['post']['post-general']['post-general'],
				'selector'=>'a.more-link',
				'default'=>__('Read More','the-gap'),'priority'=>'375',
		'label'=>__('Read More Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'footer-info-input'=>array(
				'section'=>$sections['footer']['footer-info']['footer-info'],
				'selector'=>'.site-credit span.text1',
				'default'=>__('Proudly Powered by WordPress','the-gap'),'priority'=>'19',
		'label'=>__('Site Info Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'footer-info-link-text'=>array(
				'section'=>$sections['footer']['footer-info']['footer-info'],
				'selector'=>'.site-credit a','default'=>__('The Gap','the-gap'),'priority'=>'20',
		'label'=>__('Site Info Link Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'header-media-title-input'=>array(
				'section'=>'header_image',
				'selector'=>'',
				'default'=>'','priority'=>'72',
		'label'=>__('Blog Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	
	'feature-slider-section-title'=>array(
				'section'=>$sections['post']['feature-item']['feature-item'],
				'selector'=>'.feature-post-title',
				'default'=>'','priority'=>'11',
		'label'=>__('Feature Post Section Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
	
		
	'popular-post-section-title'=>array(
				'section'=>$sections['post']['popular-post']['popular-post'],
				'selector'=>'.popular-post-title',
				'default'=>'','priority'=>'10',
		'label'=>__('Popular Post Section Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'header-slider-btn-text'=>array(
				'section'=>'header_image',
				'selector'=>'',
				'default'=>'','priority'=>'80',
		'label'=>__('Header Media Button Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => '')
	
				);
				
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and design-size.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.*/
function the_gap_get_without_px() {
	$sections = the_gap_panels_sections();
	
	
	return $no_px = array(

	
	'post-exerpt-length'=>array(
				'section'=>$sections['post']['post-general']['post-general'],
				'selector'=>'','default'=>'35','priority'=>'74',
		'label'=>__('Exerpt Length','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => '')
	
	
				
	
	);
}



/*
*
* Color related function for style and js
*/

function the_gap_get_color_js($param) {
	
	
	$settings = the_gap_get_fourcolor();
	
	foreach ($settings['color'] as $secondlevelkey=>$secondlevelval) {
		
		$thirdlevelval = array_values($secondlevelval);
		
		$control = $secondlevelkey;
		$controls[]= $control;
		
		$selector = $thirdlevelval[1];
		$selectors[] = $selector;
	}
	
	foreach ($settings['background-color'] as $secondlevelkey=>$secondlevelval) {
		
		$thirdlevelval = array_values($secondlevelval);
		
		$control = $secondlevelkey;
		$bg_controls[]= $control;
		
		$selector = $thirdlevelval[1];
		$bg_selectors[] = $selector;
	}
	
	foreach ($settings['hover-color'] as $secondlevelkey=>$secondlevelval) {
		
		$thirdlevelval = array_values($secondlevelval);
		
		$control = $secondlevelkey;
		$hover_controls[]= $control;
		
		$selector = $thirdlevelval[1];
		$hover_selectors[] = $selector;
	}
	
	foreach ($settings['hover-background-color'] as $secondlevelkey=>$secondlevelval) {
		
		$thirdlevelval = array_values($secondlevelval);
		
		$control = $secondlevelkey;
		$hover_bg_controls[]= $control;
		
		$selector = $thirdlevelval[1];
		$hover_bg_selectors[] = $selector;
	}
	
	if($param =='control'){
	return $controls;	
	}
	elseif($param =='selector'){
	return $selectors;	
	}
	elseif($param =='bg-control'){
	return $bg_controls;	
	}
	elseif($param =='bg-selector'){
	return $bg_selectors;	
	}
	elseif($param =='hover-control'){
	return $hover_controls;	
	}
	elseif($param =='hover-selector'){
	return $hover_selectors;	
	}
	elseif($param =='hover-bg-control'){
	return $hover_bg_controls;	
	}
	elseif($param =='hover-bg-selector'){
	return $hover_bg_selectors;	
	}
	
	
}

function the_gap_hex2rgba($hexstr,$opacity) {
    $int = hexdec($hexstr);
    $rgb = array("red" => 0xFF & ($int >> 0x10), "green" => 0xFF & ($int >> 0x8), "blue" => 0xFF & $int);
    $r = $rgb['red'];
    $g = $rgb['green'];
    $b = $rgb['blue'];

    return "rgba($r,$g,$b, $opacity)";
}

/*
*
* Color related function for style
*/

function  the_gap_get_color_style($param) {
	
	$style = '';
	$properties = array('color','background-color','color','background-color');
	$settings = the_gap_get_fourcolor();
	
	$firstlevelkey = array_keys($settings);
	
	for ($i=0; $i<=3; $i++) {
		
	foreach ($settings[$firstlevelkey[$i]] as $secondlevelkey=>$secondlevelval) {
		
		$thirdlevelval = array_values($secondlevelval);
		$section = $thirdlevelval[0];
		$sections[] = $section;
		$control = $secondlevelkey;
		$controls[]= $control;
		
		$default = $thirdlevelval[2];
		$defaults[] = $default;
		
		$priority = $thirdlevelval[3];
		$priorities[] = $priority;
		
		$label = $thirdlevelval[4];
		$labels[] = $label;
		
		$sanitize = $thirdlevelval[5];
		$sanitizes[] = $sanitize;
		
		$propertyy = $thirdlevelval[6];
		$propertyyy[] = $propertyy;
		
		$transport = $thirdlevelval[7];
		$transports[] = $transport;
		
		$description = $thirdlevelval[8];
		$descriptions[] = $description;

		
		$selector = $thirdlevelval[1];
		$selectors[] = $selector;
		$property = $properties[$i];
		$color ='';
		$color = get_theme_mod($control,$default);
		$opacity_control = $control.'-opacity';
		$opacity_controls[] = $opacity_control;
		$opacity = get_theme_mod($opacity_control,'1');
		$rgba = the_gap_hex2rgba($color, $opacity);
		
		if ($opacity == '1'){
			$rgbaOrHex = $color;
		} else {
			$rgbaOrHex 	= the_gap_hex2rgba($color, $opacity);
		}
	
		if (! empty( $rgbaOrHex ) ) {
			$style 	.= "".esc_attr($selector). "{" .esc_attr($property).":" . esc_attr($rgbaOrHex) . ";}"."\n";
			
		}
		
	}
	
	
	}

	if($param =='style'){
	return $style;	
	}
	elseif($param =='control'){
	return $controls;	
	}
	elseif($param =='section'){
	return $sections;	
	}
	elseif($param =='selector'){
	return $selectors;	
	}
	elseif($param =='opacity'){
	return $opacity_controls;	
	}
	elseif($param =='label'){
	return $labels;	
	}
	elseif($param =='default'){
	return $defaults;
	}
	elseif($param =='description'){
	return $descriptions;
	}
	elseif($param =='priority'){
	return $priorities;
	}
	elseif($param =='transport'){
	return $transports;
	}
}

/*
color related all settings
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_color_style to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_color_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/

function the_gap_get_fourcolor(){
	
$sections = the_gap_panels_sections();
$accent = the_gap_get_accent_color_mod();

$fourcolors = array(
	
	'color' => array(
		

		'site-title-text-color'=>array(
			'section'=>$sections['site-header']['site-title']['site-title'],
			'selector'=>'#site-title a,.site-title a','default'=>'#333333',
			'priority'=>'201','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		
		
		'overlay-text-color'=>array(
			'section'=>'header_image',
			'selector'=>'.media-slider .slider-date,.btn-default.nlbtn.media-btn,.nl-media-ovr-title span,
			.nl-media-ovr-sub-title,.nl-slide-ovr-title,.nl-slide-ovr-sub-title,.nl-slide-ovr-sub-title a,.slider-date,.video-media-ovr-title','default'=>'#ffffff',
			'priority'=>'77','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
	
		'main-menu-top-level-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu ul li a,.menu-btn,#main-navigation .search-icon .sbtn .fa,.sidebar-icon,.cart-value,.total-label,.cart-total-val,.wishlist-icon,.woo-icon-part .fa,span.shopping-cart-value','default'=>'#333',
			'priority'=>'110','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-top-level-current-page-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu li.current-menu-item a,#main-navigation.main-menu li.current-menu-parent a,#main-navigation.main-menu ul li.current_page_item a','default'=>'#06d8a0',
			'priority'=>'111','label'=>__('Current Page Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-sub-level-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu .sub-menu li a','default'=>'#555',
			'priority'=>'210','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-sub-level-current-page-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu ul li ul li.current_page_item a','default'=>'#dd9933',
			'priority'=>'211','label'=>__('Current Page Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		
		'topbar-contact-item-color' => array(
			'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
			'selector'=>'.topbar .contacts-body .one,.two,.three,.four,.five','default'=>'#333',
			'priority'=>'201','label'=>__('Text Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'topbar-contact-icon-color' => array(
			'section'=>$sections['topbar']['topbar-contact']['topbar-contact'],
			'selector'=>'#contact1, #contact2, #contact3, #contact4, #contact5',
			'default'=>'#333','priority'=>'201','label'=>__('Icon Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'topbar-social-item-color' => array(
			'section'=>$sections['topbar']['topbar-social']['topbar-social'],
			'selector'=>'.topbar-social i.fa','default'=>'#333',
			'priority'=>'201','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),

	
		
		'site-footer-text-color'=>array(
			'section'=>$sections['footer']['footer-info']['footer-info'],
			'selector'=>'.site-info a, .site-info','default'=>'#ffffff',
			'priority'=>'201','label'=>__('Text Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'footer-widget-text-color'=>array(
			'section'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'#site-footer #mc_embed_signup_scroll .nl-widget-title,#site-footer h4.widget-title,#site-footer .news-widget-media-right span.entry-date, 
			#site-footer .widget.widget_recent_entries span.post-date,
			#site-footer .widget span,#site-footer .widget-cta-txt,
			#site-footer .widget-contacts-body a,#site-footer .widget-contacts-body i.fa,
			#site-footer .widget-contacts-body span,#site-footer .widget.widget_calendar td,
			#site-footer .widget.widget_calendar th, #site-footer .nl-widget-title,#site-footer .nl-widget-position',
			'default'=>'#fff',
			'priority'=>'201','label'=>__('Text Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'footer-widget-link-color'=>array(
			'section'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'#site-footer .news-widget-media-right a.title,.footer-widgets .widget ul li a, 
			#site-footer .widget.widget_recent_entries a, #site-footer 
			.widget.widget_recent_comments a, #site-footer .widget.widget_categories 
			a,#site-footer .widget.widget_meta a, #site-footer .widget.widget_archive a,
			#site-footer .widget.widget_pages a,#site-footer .widget-selected-link span a,
			#site-footer .hvr-icon .icon a i.fa,#site-footer .widget-socials .icon i.fa','default'=>'#fff',
			'priority'=>'201','label'=>__('Link Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
	
		'post-navigation-text-color'=>array(
			'section'=>$sections['post']['single-general']['single-general'],
			'selector'=>'.post-navigation .nav-previous a, .post-navigation .nav-next a',
			'default'=>'#333',
			'priority'=>'201','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'all-buttons-text-color' => array(
			'section'=>$sections['general']['buttons']['buttons'],
			'selector'=>'button1','default'=>'#ffffff',
			'priority'=>'201','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
	
		
		'scroll-up-color' => array(
			'section'=>$sections['general']['scroll-up']['scroll-up'],
			'selector'=>'#scroll-up i.fa','default'=>'#333333',
			'priority'=>'201','label'=>__('Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
	'site-content-text-color'=>array(
			'section'=>'background_image',
			'selector'=>'.site-main h1,.site-main h2,.site-main h3,.site-main h4,.site-main h5,
			h3.blog_post_section_title,h3.feature-post-title,
			h3.popular-post-title,.wishlist_table .product-stock-status span.wishlist-in-stock,.product_meta .posted_in,
			.product_meta .sku_wrapper,
			.woocommerce .quantity .qty,span.woocommerce-Price-amount amount,.woocommerce-product-details__short-description,
			.woocommerce-result-count,#mc_embed_signup_scroll .nl-widget-title,span.product-title,
			.product-brand-desc,.woo-front-page p,#tab-description p,span.price span,.product-info,
			.woo-footer-top .woocommerce ul.product_list_widget li span,.comment-author,
			.comments-area b.fn a,.comments-area .says,.post-categories a,
			.the-gap-related-post-body span a,.right-side-menu.visible a,
			.news-widget-media-right span.entry-date,.comment-form-comment textarea,
			.comment-form label,.comment-form,.comment-form a,.comment-reply-title,
			.comments-title,.comment-body,.comment-body a,.comment-content p,
			.single-related-meta span,.single-related-meta a,.sidebar .social-icon-widget i.fa,
			.sidebar .author-box i.fa,.sidebar .nl-widget-position,.sidebar span,
			.sidebar span a,.single-footer a,.single-meta a,.page-content-header,
			.tagcloud a,.tags-links a, article.hentry .entry-footer span,
			article.hentry .entry-footer span a:not(.post-edit-link),
			.entry-meta .entry-format a,
			.entry-format:before,.sidebar .widget-title span,.sidebar .widget ul li a,h1,h2,h2 a,h3,h3 a,h4,h5,h6,
			.home_blog_border_style, .post-single-entry, .post-archive, .the-gap-page, .the-gap-search','default'=>'#000000',
			'priority'=>'501','label'=>__('Site Content Text Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
	
	'site-content-link-color'=>array(
			'section'=>$sections['body-accent']['link-color']['link-color'],
			'selector'=>'.woocommerce table.shop_table .product-name a,.entry-content a,.single-content a,.page-content a','default'=>'#0eeae3',
			'priority'=>'501','label'=>__('Content Link Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  =>__('Post/page content and block button link color','the-gap')),



			),
	
	'background-color' => array(
		
	
		'main-menu-top-level-background-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu ul,#main-navigation.main-menu ul li a','default'=>'#ffffff',
			'priority'=>'112','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-sub-level-background-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu .sub-menu li a,#main-navigation.main-menu ul li ul li','default'=>'#ffffff',
			'priority'=>'212','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
	
		'topbar-background-color' => array(
			'section'=>$sections['topbar']['topbar']['topbar'],
			'selector'=>'.topbar','default'=>'#ffffff',
			'priority'=>'201','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		'site-header-background-color'=>array(
			'section'=>$sections['site-header']['site-header']['site-header'],
			'selector'=>'#site-header,.display-menu-toggle,.menu-btn,.sbtn','default'=>'#ffffff',
			'priority'=>'201','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		'overlay-background-color'=>array(
			'section'=>'header_image',
			'selector'=>'.media-imag-overlay-cta.colorbg,.media_slide_cta.colorbg',
			'default'=>'#000000',
			'priority'=>'78','label'=>__('Overlay Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		'site-footer-background-color'=>array(
			'section'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'#site-footer,.site-footer','default'=>'#000000',
			'priority'=>'10','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		'footer-widget-background-color'=>array(
			'section'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'#site-footer #mc_embed_signup,#site-footer .widget,#site-footer .widget-contacts-body,#site-footer .news-widget-body-',
			'default'=>'#000000',
			'priority'=>'201','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
	
		'site-info-background-color'=>array(
			'section'=>$sections['footer']['footer-info']['footer-info'],
			'selector'=>'.site-info','default'=>'#1a1a1a',
			'priority'=>'201','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
	
		
		
		'site-content-background-color'=>array(
			'section'=>'background_image',
			'selector'=>'.home_blog_border_style,.wishlist_table tr td, .wishlist_table tr th.product-checkbox, .wishlist_table tr th.wishlist-delete,#add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.summary.entry-summary,.woocommerce div.product form.cart,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,#tab-description,#tab-description p,.product-entry,.sidebar h3.widget-title span,.right-side-menu.visible,.comments-area,.sidebar .widget,.related-single,.post-author-box,.home_blog_border_style, .post-single-entry, .post-archive, .the-gap-page, .the-gap-search','default'=>'#ffffff',
			'priority'=>'502','label'=>__('Site Content Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
			
	
		
		'scroll-up-background-color' => array(
			'section'=>$sections['general']['scroll-up']['scroll-up'],
			'selector'=>'#scroll-up','default'=>'#ffffff',
			'priority'=>'201','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		
	
		'topbar-social-item-background-color' => array(
			'section'=>$sections['topbar']['topbar-social']['topbar-social'],
			'selector'=>'.social-icon-topbar .icon','default'=>'#ffffff',
			'priority'=>'201','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),

		'post-navigation-background-color'=>array(
			'section'=>$sections['post']['single-general']['single-general'],
			'selector'=>'.post-navigation .nav-previous a, .post-navigation .nav-next a',
			'default'=>'#eeeeee',
			'priority'=>'201','label'=>__('Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		
		
			),
	
	'hover-color' => array(
	
			
		'main-menu-top-level-hover-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu ul li a:hover,.woo-icon-part .fa:hover,span.shopping-cart-value:hover','default'=>'#333',
			'priority'=>'113','label'=>__('Hover Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-sub-level-hover-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu ul li ul li a:hover','default'=>'#333',
			'priority'=>'213','label'=>__('Hover Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
	
		'topbar-social-item-hover-color'=>array(
			'section'=>$sections['topbar']['topbar-social']['topbar-social'],
			'selector'=>'.social-icon-topbar .icon:hover i.fa','default'=>'#333',
			'priority'=>'203','label'=>__('Hover Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
	
		'post-navigation-hover-color'=>array(
			'section'=>$sections['post']['single-general']['single-general'],
			'selector'=>'.post-navigation .nav-previous a:hover, .post-navigation 
			.nav-next a:hover',
			'default'=>'#1a1a1a',
			'priority'=>'203','label'=>__('Hover Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => ''),
		
		
		'all-buttons-hover-color'=>array(
			'section'=>$sections['general']['buttons']['buttons'],
			'selector'=>'.button1','default'=>'#dda95a',
			'priority'=>'203','label'=>__('Hover Color','the-gap'),'sanitize'=>'','property'=>'color',
		'transport'  => 'postMessage','description'  => '')),
	
	'hover-background-color' => array(
	
	
		'main-menu-top-level-hover-background-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu ul li a:hover','default'=>'#fff',
			'priority'=>'114','label'=>__('Hover Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		'main-menu-sub-level-hover-background-color' => array(
			'section'=>$sections['site-header']['main-menu']['main-menu'],
			'selector'=>'#main-navigation.main-menu .sub-menu li a:hover','default'=>'#fff',
			'priority'=>'214','label'=>__('Hover Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		
		'post-navigation-hover-background-color'=>array(
			'section'=>$sections['post']['single-general']['single-general'],
			'selector'=>'.post-navigation .nav-previous a:hover, .post-navigation 
			.nav-next a:hover',
			'default'=>'#ddd',
			'priority'=>'204','label'=>__('Hover Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => ''),
		
		
		'all-buttons-hover-background-color'=>array(
			'section'=>$sections['general']['buttons']['buttons'],
			'selector'=>'.button1:hover,.nav-previous a:hover,.nav-next a:hover',
			'default'=>'#1a1a1a',
			'priority'=>'204','label'=>__('Hover Background Color','the-gap'),'sanitize'=>'','property'=>'background-color',
		'transport'  => 'postMessage','description'  => '')
	)
			
	);
	
	return $fourcolors;
}	


/* 
*
* All border related color settings

Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/



function the_gap_border_top_color(){
		
		$sections = the_gap_panels_sections();
		
		$accent = the_gap_get_accent_color_mod();
		$accent	= the_gap_hex2rgba($accent, 0.3);

		return $top_border_color = array(
	
			'footer-widget-item-top-border-color'=>array(
			'section'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'.site-footer .widget ul li,.site-footer .news-widget-body-,
			.site-footer .widget-contacts-body span,.site-footer .widget-selected-link span,
		.site-footer .social-icon-widget,.site-footer .cta-overlay','default'=>'#aaa',
			'priority'=>'290','label'=>__('Border Top Color','the-gap'),'sanitize'=>'',
			'property'=>'border-top-color','unit'=>'',
			'transport'  => 'postMessage','description'  => ''),
	
			
			);

}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_border_top_width(){
		
		$sections = the_gap_panels_sections();

		return $top_border_width = array(
	
			'footer-widget-item-top-border-width'=>array(
			'section'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'.site-footer .widget ul li,.site-footer .news-widget-body-,
			.site-footer .widget-contacts-body span,.site-footer .widget-selected-link span,
			.site-footer .social-icon-widget,.site-footer .cta-overlay','default'=>'1',
			'priority'=>'291','label'=>__('Border Top Width','the-gap'),'sanitize'=>'',
			'property'=>'width','unit'=>'',
			'transport'  => 'postMessage','description'  => ''), 
			
			
			);

}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/

function the_gap_border_top_style(){
		
		$sections = the_gap_panels_sections();

		return $top_border_style = array(
	
			
			'footer-widget-item-top-border-style'=>array(
			'section'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'.site-footer .widget ul li,.site-footer .news-widget-body-,
			.site-footer .widget-contacts-body span,.site-footer .widget-selected-link span,
			.site-footer .social-icon-widget,.site-footer .cta-overlay','default'=>'solid',
			'priority'=>'292','label'=>__('Border Top Style','the-gap'),'sanitize'=>'','property'=>'border-top-style',
			'unit'=>'',
			'transport'  => 'postMessage','description'  => ''), 
			
			
			);

}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_border_bottom_color() {
		
		$sections = the_gap_panels_sections();

		return $bottom_border_color = array(
			
			'topbar-bottom-border-color' => array(
			'section'=>$sections['topbar']['topbar']['topbar'],
			'selector'=>'.topbar','default'=>'#EEEEEE','priority'=>'270','label'=>__('topbar-bottom-border-color','the-gap'),'sanitize'=>'',
			'property'=>'border-bottom-color','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
			
			);

}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_border_bottom_width(){
		
		$sections = the_gap_panels_sections();

		return $bottom_border_width = array(
			
			'topbar-bottom-border-width' => array(
			'section'=>$sections['topbar']['topbar']['topbar'],
			'selector'=>'.topbar','default'=>'1','priority'=>'272','label'=>__('topbar-bottom-border-color','the-gap'),'sanitize'=>'',
			'property'=>'border-bottom-width','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
			
			);

}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_border_bottom_style(){
		
		$sections = the_gap_panels_sections();

		return $bottom_border_style = array(
			
			'topbar-bottom-border-style' => array(
			'section'=>$sections['topbar']['topbar']['topbar'],
			'selector'=>'.topbar','default'=>'solid','priority'=>'273','label'=>__('Topbar Bottom Border Color','the-gap'),'sanitize'=>'',
			'property'=>'border-bottom-style','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
			
			);

}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_two_side_border_color(){
	$sections = the_gap_panels_sections();

		return $two_side_border_color = array(
	
	'post-meta-border-color' => array(
			'section'=>$sections['post']['post-general']['post-general'],
			'selector'=>'.entry-meta','default'=>'#ededed','priority'=>'526',
			'label'=>__('Post Meta Border Color','the-gap'),'sanitize'=>'',
			'property'=>'border-color','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
	'single-meta-border-color' => array(
			'section'=>$sections['post']['single-general']['single-general'],
			'selector'=>'.single-meta','default'=>'#ededed','priority'=>'527',
			'label'=>__('Single Meta Border Color','the-gap'),'sanitize'=>'',
			'property'=>'border-color','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
	
			);
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_two_side_border_width(){
	$sections = the_gap_panels_sections();

		return $two_side_border_width = array(
	'post-meta-border-width' => array(
			'section'=>$sections['post']['post-general']['post-general'],
			'selector'=>'.entry-meta','default'=>'0','priority'=>'527',
			'label'=>__('post-meta-border-width','the-gap'),'sanitize'=>'',
			'property'=>'border-width','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
	'single-meta-border-width' => array(
			'section'=>$sections['post']['single-general']['single-general'],
			'selector'=>'.single-meta','default'=>'1','priority'=>'527',
			'label'=>__('Single Meta Border Width','the-gap'),'sanitize'=>'',
			'property'=>'border-width','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
	
			);
}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_two_side_border_style(){
	$sections = the_gap_panels_sections();

		return $two_side_border_style = array(
	'post-meta-border-style' => array(
			'section'=>$sections['post']['post-general']['post-general'],
			'selector'=>'.entry-meta','default'=>'none','priority'=>'528',
			'label'=>__('post-meta-border-style','the-gap'),'sanitize'=>'',
			'property'=>'border-style','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
	'single-meta-border-style' => array(
			'section'=>$sections['post']['single-general']['single-general'],
			'selector'=>'.single-meta','default'=>'none','priority'=>'528',
			'label'=>__('Single Meta Border Style','the-gap'),'sanitize'=>'',
			'property'=>'border-style','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
	
			);
}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/

function the_gap_border_color(){
		$sections = the_gap_panels_sections();
		$accent = the_gap_get_accent_color_mod();
		$accent_rgba	= the_gap_hex2rgba($accent, 0.3);
		
		return $borderColor = array(			
		
			'button-border-color'=>array(
			'section'=>$sections['general']['buttons']['buttons'],
			'selector'=>'button1','default'=>'#333','priority'=>'251',
			'label'=>__('button-border-color','the-gap'),'sanitize'=>'',
			'property'=>'border-color','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
			
			
		
	);

}	
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_border_width(){
	
		$sections = the_gap_panels_sections();
		
		return $borderWidth = array(			
			
			
			'button-border-width'=>array(
			'section'=>$sections['general']['buttons']['buttons'],
			'selector'=>'button1','default'=>'0','priority'=>'275',
			'label'=>__('button-border-width','the-gap'),'sanitize'=>'',
			'property'=>'border-width','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
			
			
		
	);

}	

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_border_style(){
	
		$sections = the_gap_panels_sections();
		
		return $borderStyle = array(			
	
			'button-border-style'=>array(
			'section'=>$sections['general']['buttons']['buttons'],
			'selector'=>'button1','default'=>'none','priority'=>'280',
			'label'=>__('button-border-style','the-gap'),'sanitize'=>'',
			'property'=>'border-style','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
			
			
		
	);

}	
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_border_width_style_radius to create array ->
Arrays of this function called from style.php and color.php using the_gap_get_border_width_style_radius function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_border_radius(){
		$sections = the_gap_panels_sections();
		
		return $borderRadiuse = array(			
			
			'button-border-radius'=>array(
			'section'=>$sections['general']['buttons']['buttons'],
			'selector'=>'button1','default'=>'0','priority'=>'276',
			'label'=>__('button-border-radius','the-gap'),'sanitize'=>'',
			'property'=>'border-radius','unit'=>'','transport'  => 'postMessage',
			'description'  => ''),
			
		
		
			'topbar-social-border-radius' => array(
			'section'=>$sections['topbar']['topbar-social']['topbar-social'],
			'selector'=>'.social-icon-topbar .icon','default'=>'0','priority'=>'276',
			'label'=>__('topbar-social-border-radius','the-gap'),'sanitize'=>'',
			'property'=>'border-radius','unit'=>'','transport'  => 'postMessage',
			'description'  => '')
			


	);

}	

/* This function all border related functions to create array */
/* color.php
*/
function the_gap_get_border_width_style_radius($param,$types) {
	
	 $style ='';
	
	 $settings = array();
	 if( $types == 'border'){
	 $settings = the_gap_border_color();
	 }
	elseif ($types == 'top-border-color'){
		$settings = the_gap_border_top_color();
	}elseif ($types == 'top-border-width'){
		$settings = the_gap_border_top_width();
	}elseif ($types == 'top-border-style'){
		$settings = the_gap_border_top_style();
	}
	 elseif ($types == 'bottom-border-color'){
		$settings = the_gap_border_bottom_color();
	}elseif ($types == 'bottom-border-width'){
		$settings = the_gap_border_bottom_width();
	}elseif ($types == 'bottom-border-style'){
		$settings = the_gap_border_bottom_style();
	}
	elseif ($types == 'two-border-color'){
		$settings = the_gap_two_side_border_color();
	}elseif ($types == 'two-border-width'){
		$settings = the_gap_two_side_border_width();
	}elseif ($types == 'two-border-style'){
		$settings = the_gap_two_side_border_style();
	}
	 elseif( $types == 'width'){
	$settings =  the_gap_border_width();
	}elseif ( $types == 'style') {
	 $settings =  the_gap_border_style();
	}elseif ( $types == 'radius') {
	 $settings =  the_gap_border_radius();
	}
	
	
	foreach ($settings as $firstlevelkey=>$firstlevelval) {
		
		$secondlevelval = array_values($firstlevelval);
		
		$section = $secondlevelval[0];
		$sections[] = $section;
		
		
		$control = $firstlevelkey;
		$controls[]= $control;
	

		$selector = $secondlevelval[1];
		$selectors[] = $selector;
		
		$default = $secondlevelval[2];
		$defaults[] = $default;
		
		$priority = $secondlevelval[3];
		$priorities[] = $priority;
		
		
		$label = $secondlevelval[4];
		$labels[] = $label;
		
		$callback = $secondlevelval[5];
		$callbacks[] = $callback;
		
		$property = $secondlevelval[6];
		$properties[] = $property;
		
		$unit = $secondlevelval[7];
		$units[] = $unit;
		
		$transport = $secondlevelval[8];
		$transports[] = $transport;
		
		$description = $secondlevelval[9];
		$descriptions[] = $description;
		
		
		if (($types == 'two-border-color')|| ($types == 'top-border-color')|| ($types == 'bottom-border-color')){
		 
			$color_mod = get_theme_mod($control,$default);
			$opacity = $control.'-opacity';
			$opacity_mod = get_theme_mod($opacity,'1');
			
			if ($opacity_mod < 1) {
				$rgba	= the_gap_hex2rgba($color_mod, $opacity_mod);
			} 
			if ($opacity_mod == 1) {
				$rgba	= $color_mod;
			}
			if ($types == 'two-border-color'){
				$style 	.= "".esc_attr($selector). "{ border-bottom-color:" . esc_attr($rgba) . ";}"."\n";
				$style 	.= "".esc_attr($selector). "{ border-top-color:" . esc_attr($rgba) . ";}"."\n";
			}
			if ($types == 'top-border-color'){
				$style 	.= "".esc_attr($selector). "{ border-top-color:" . esc_attr($rgba) . ";}"."\n";
		
			}
			if ($types == 'bottom-border-color'){
				$style 	.= "".esc_attr($selector). "{ border-bottom-color:" . esc_attr($rgba) . ";}"."\n";
		
			}
			
		}
		
		if ($types == 'border') {
			$color_mod = get_theme_mod($control,$default);
			$opacity = $control.'-opacity';
			$opacity_mod = get_theme_mod($opacity,'1');
			
			if ($opacity_mod < 1) {
				$rgba	= the_gap_hex2rgba($color_mod, $opacity_mod);
			} 
			if ($opacity_mod == 1) {
				$rgba	= $color_mod;
			}
			
			$style 	.= "".esc_attr($selector). "{ border-color:" . esc_attr($rgba) . ";}"."\n";
		
			
		}
		
		if ($types == 'two-border-width'||$types == 'top-border-width'
			||$types == 'bottom-border-width'){
		 
			$width_mod = get_theme_mod($control,$default);
			
			if ($types == 'two-border-width'){
				$style 	.= "".esc_attr($selector). "{ border-bottom-width:" . intval($width_mod) . "px;}"."\n";
				
				$style 	.= "".esc_attr($selector). "{ border-top-width:" . intval($width_mod) . "px;}"."\n";
			}
			if ($types == 'top-border-width'){
				
				$style 	.= "".esc_attr($selector). "{ border-top-width:" . intval($width_mod) . "px;}"."\n";
			}
			if ($types == 'bottom-border-width'){
				
				$style 	.= "".esc_attr($selector). "{ border-bottom-width:" . intval($width_mod) . "px;}"."\n";
			
			}
			
		}
		
		if ($types == 'width'){
		 
			$width_mod = get_theme_mod($control,$default);
			$style 	.= "".esc_attr($selector). "{ border-width:" . intval($width_mod) . "px;}"."\n";
			
		}
		
		if ($types == 'two-border-style'||$types == 'top-border-style'
			||$types == 'bottom-border-style'){
		 
			$style_mod = get_theme_mod($control,$default);
			
			if ($types == 'two-border-style'){
			$style 	.= "".esc_attr($selector). "{ border-bottom-style:" . esc_attr($style_mod) . ";}"."\n";
				
			$style 	.= "".esc_attr($selector). "{ border-top-style:" . esc_attr($style_mod) . ";}"."\n";
			}
			if ($types == 'top-border-style'){
			
			$style 	.= "".esc_attr($selector). "{ border-top-style:" . esc_attr($style_mod) . ";}"."\n";
			}
			if ($types == 'bottom-border-style'){
			
			$style 	.= "".esc_attr($selector). "{ border-bottom-style:" . esc_attr($style_mod) . ";}"."\n";
			}
			
		}
		
		if ($types == 'style'){
		 
			$style_mod = get_theme_mod($control,$default);
			$style 	.= "".esc_attr($selector). "{ border-style:" . esc_attr($style_mod) . ";}"."\n";
			
		}
		
		if ( $types == 'radius') {
			
			if ($control != 'scroll-up-border-radius'){
				
			$style_mod = get_theme_mod($control,$default);
			
			$style 	.= "".esc_attr($selector). "{ border-radius:" . intval($style_mod) . "px;}"."\n";
			
			}
			
		}
	
	}
	
	if($param =='control'){
	return $controls;	
	}
	elseif($param =='style'){
	return $style;	
	}
	elseif($param =='section'){
	return $sections;	
	}
	elseif($param =='default'){
	return $defaults;	
	}
	elseif($param =='description'){
	return $descriptions;	
	}
	elseif($param =='property'){
	return $properties;	
	}
	elseif($param =='priority'){
	return $priorities;	
	}
	elseif($param =='selector'){
	return $selectors;	
	}
	elseif($param =='transport'){
	return $transports;	
	}
	
	
}



/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_heading_styles to create array ->
Arrays of this function called from style.php and allheadings.php using the_gap_get_heading_styles function to
create setting and controls. 
*/
function the_gap_heading_controls() {
	
	$headings = the_gap_panels_sections();
	
	return	 array(
			'site-title-font'=>array(
					'section'=>$headings['site-header']['site-title']['site-title'],
					'seclector'=>'','priority'=>'150','label'=>__('Site Title Font','the-gap')),
			'site-title-color'=>array(
					'section'=>$headings['site-header']['site-title']['site-title'],
					'seclector'=>'','priority'=>'200','label'=>__('Site Title Color','the-gap')),
			
			'topbar-color'=>array(
					'section'=>$headings['topbar']['topbar']['topbar'],
					'seclector'=>'','priority'=>'200','label'=>__('Topbar Color','the-gap')),
			
			'topbar-contact-color'=>array(
					'section'=>$headings['topbar']['topbar-contact']['topbar-contact'],
					'seclector'=>'','priority'=>'200','label'=>__('Topbar Contact Color','the-gap')),
			
			'topbar-social-color'=>array(
					'section'=>$headings['topbar']['topbar-social']['topbar-social'],
					'seclector'=>'','priority'=>'200','label'=>__('Topbar Social Color','the-gap')),
					
			
			'buttons-color'=>array(
					'section'=>$headings['general']['buttons']['buttons'],
					'seclector'=>'','priority'=>'200','label'=>__('Buttons Color','the-gap')),
					
			'scroll-up-color'=>array(
					'section'=>$headings['general']['scroll-up']['scroll-up'],
					'seclector'=>'','priority'=>'200','label'=>__('Scroll-up Color','the-gap')),
					
			'site-background-color'=>array(
					'section'=>'background_image',
					'seclector'=>'','priority'=>'200','label'=>__('Site Background Color','the-gap')),
			
			'site-header-color'=>array(
					'section'=>$headings['site-header']['site-header']['site-header'],
					'seclector'=>'','priority'=>'200','label'=>__('Site Header Color','the-gap')),
			
			
			
			'main-menu-top-level-font'=>array(
					'section'=>$headings['site-header']['main-menu']['main-menu'],
					'seclector'=>'','priority'=>'107','label'=>__('Navigation Top Level Font','the-gap')),
			
			'main-menu-sub-level-font'=>array(
					'section'=>$headings['site-header']['main-menu']['main-menu'],
					'seclector'=>'','priority'=>'207','label'=>__('Navigation Sub Level Font','the-gap')),
			
			'main-menu-top-level-color'=>array(
					'section'=>$headings['site-header']['main-menu']['main-menu'],
					'seclector'=>'','priority'=>'109','label'=>__('Navigation Top Level Color','the-gap')),
			
			
					
			'main-menu-sub-level-color'=>array(
					'section'=>$headings['site-header']['main-menu']['main-menu'],
					'seclector'=>'','priority'=>'209','label'=>__('Navigation Sub Level Color','the-gap')),
					
		
					
			'footer-background-color'=>array(
					'section'=>$headings['footer']['footer-widget']['footer-widget'],
					'seclector'=>'','priority'=>'8','label'=>__('Footer Background Color','the-gap')),
					
					
			'desktop-width'=>array(
					'section'=>$headings['general']['site-width']['site-width'],
					'seclector'=>'','priority'=>'27','label'=>__('Desktop Width','the-gap')),
					
			'laptop-width'=>array(
					'section'=>$headings['general']['site-width']['site-width'],
					'seclector'=>'','priority'=>'30','label'=>__('Laptop Width','the-gap')),
					
			'large-tablet-width'=>array(
					'section'=>$headings['general']['site-width']['site-width'],
					'seclector'=>'','priority'=>'33','label'=>__('Large Tablet Width','the-gap')),
			
			'tablet-width'=>array(
					'section'=>$headings['general']['site-width']['site-width'],
					'seclector'=>'','priority'=>'36','label'=>__('Tablet Width','the-gap')),
			
			'phone-width'=>array(
					'section'=>$headings['general']['site-width']['site-width'],
					'seclector'=>'','priority'=>'39','label'=>__('Phone Width','the-gap')),
					
					
			'topbar-border'=>array(
					'section'=>$headings['topbar']['topbar']['topbar'],
					'seclector'=>'','priority'=>'250','label'=>__('Topbar Border','the-gap')),
			'post-meta-border'=>array(
					'section'=>$headings['post']['post-general']['post-general'],
					'seclector'=>'','priority'=>'525','label'=>__('List Post Meta Border','the-gap')),
			
			'post-meta-separator'=>array(
					'section'=>$headings['post']['post-general']['post-general'],
					'seclector'=>'','priority'=>'500','label'=>__('List Post Meta','the-gap')),
			
			'single-post-meta'=>array(
					'section'=>$headings['post']['single-general']['single-general'],
					'seclector'=>'','priority'=>'500','label'=>__('Single Post Meta','the-gap')),
					
			'single-post-meta-border'=>array(
					'section'=>$headings['post']['single-general']['single-general'],
					'seclector'=>'','priority'=>'525','label'=>__('Single Post Meta Border','the-gap')),
			
			'single-general-color'=>array(
					'section'=>$headings['post']['single-general']['single-general'],
					'seclector'=>'','priority'=>'200','label'=>__('Single Post Navigation Color','the-gap')),
					
			
			
			'footer-widget-color'=>array(
					'section'=>$headings['footer']['footer-widget']['footer-widget'],
					'seclector'=>'','priority'=>'200','label'=>__('Footer Widget Color','the-gap')),
			
			
			'footer-info-color'=>array(
					'section'=>$headings['footer']['footer-info']['footer-info'],
					'seclector'=>'','priority'=>'64','label'=>__('Site Info Color','the-gap')),
					
			'sticky-header'=>array(
					'section'=>$headings['site-header']['site-header']['site-header'],
					'seclector'=>'','priority'=>'8','label'=>__('Sticky Header','the-gap')),
					
				
			'logo'=>array(
					'section'=>$headings['site-header']['site-title']['site-title'],
					'seclector'=>'','priority'=>'61','label'=>__('Logo','the-gap')),
		
			
			'scroll-up-settings'=>array(
					'section'=>$headings['general']['scroll-up']['scroll-up'],
					'seclector'=>'','priority'=>'79','label'=>__('Scroll-up Settings','the-gap')),
			
			'site-background-margins'=>array(
					'section'=>$headings['layout']['site-layout']['site-layout'],
					'seclector'=>'','priority'=>'179','label'=>__('Site Background Margins','the-gap')),
			
				
		
			'button-border'=>array(
					'section'=>$headings['general']['buttons']['buttons'],
					'seclector'=>'button1','priority'=>'250','label'=>__('Button Border','the-gap')),
		
			'social-border'=>array(
					'section'=>$headings['topbar']['topbar-social']['topbar-social'],
					'seclector'=>'','priority'=>'250','label'=>__('Social Border','the-gap')),
			'social-input'=>array(
					'section'=>$headings['topbar']['topbar-social']['topbar-social'],
					'seclector'=>'','priority'=>'37','label'=>__('Social Input','the-gap')),
			
			'contact-input'=>array(
					'section'=>$headings['topbar']['topbar-contact']['topbar-contact'],
					'seclector'=>'','priority'=>'19','label'=>__('Link Input','the-gap')),
		
		
			'site-credit-input'=>array(
					'section'=>$headings['footer']['footer-info']['footer-info'],
					'seclector'=>'','priority'=>'18','label'=>__('Site Credit Input','the-gap')),
			'footer-info-background'=>array(
					'section'=>$headings['footer']['footer-info']['footer-info'],
					'seclector'=>'','priority'=>'58','label'=>__('Site Info Background','the-gap')),
			'footer-info-padding'=>array(
					'section'=>$headings['footer']['footer-info']['footer-info'],
					'seclector'=>'','priority'=>'225','label'=>__('Site Info Padding','the-gap')),
			
			'single-show/hide-elements'=>array(
					'section'=>$headings['post']['single-general']['single-general'],
					'seclector'=>'','priority'=>'8','label'=>__('Show/hide Elements','the-gap')),
					
			'show/hide-elements'=>array(
					'section'=>$headings['post']['post-general']['post-general'],
					'seclector'=>'','priority'=>'8','label'=>__('Show/hide Elements','the-gap')),
		
			'font'=>array(
					'section'=>$headings['general']['general']['general'],
					'seclector'=>'','priority'=>'1','label'=>__('Global Font Settings','the-gap')),
			'first-featured-item'=>array(
					'section'=>$headings['post']['feature-item']['feature-item'],
					'seclector'=>'','priority'=>'22','label'=>__('First Feature Item Detail','the-gap')),
			'second-featured-item'=>array(
					'section'=>$headings['post']['feature-item']['feature-item'],
					'seclector'=>'','priority'=>'30','label'=>__('Second Feature Item Detail','the-gap')),		
			'third-featured-item'=>array(
					'section'=>$headings['post']['feature-item']['feature-item'],
					'seclector'=>'','priority'=>'40','label'=>__('Third Feature Item Detail','the-gap')),
					
			'header-media-overlay'=>array(
					'section'=>'header_image',
					'seclector'=>'','priority'=>'70','label'=>__('Header Media Overlay & Text','the-gap')),
			
		
			'footer-widget-item-border'=>array(
					'section'=>$headings['footer']['footer-widget']['footer-widget'],
					'seclector'=>'','priority'=>'289','label'=>__('Footer Widget Item Border','the-gap')),
			
			'page-selection-for-slides'=>array(
					'section'=>'header_image',
					'seclector'=>'','priority'=>'400','label'=>__('Select Pages for Slider','the-gap')),
			'feature-slide-detail'=>array(
					'section'=>$headings['post']['feature-item']['feature-item'],
					'seclector'=>'','priority'=>'9','label'=>__('Featured Slider','the-gap')),
			'feature-post-detail'=>array(
					'section'=>$headings['post']['feature-item']['feature-item'],
					'seclector'=>'','priority'=>'16','label'=>__('Featured Post/Item','the-gap')),
			
			'popular-post'=>array(
					'section'=>$headings['post']['popular-post']['popular-post'],
			'seclector'=>'','priority'=>'7','label'=>__('Popular Post','the-gap')),
						
		
	);
	
	
}



function the_gap_get_heading_styles($param1,$param2) {
		
		if ($param2 == 'free'){
		$settings = the_gap_heading_controls();	
		}
		if ( class_exists('The_Gap_Pro')) { 
			if ($param2 == 'pro'){
				$settings = the_gap_pro_heading_controls();
			}
			if ($param2 == 'pro-woo'){
				
				$settings = the_gap_pro_woo_heading_controls();
			}
		}
		
			
			foreach ($settings as $firstlevelkey=>$firstlevelval) {
		
				$secondlevelval = array_values($firstlevelval);
				$section = $secondlevelval[0];
				$sections[] = $section;
				$control = $firstlevelkey.'-heading';
				$controls[] = $control;
				$allControls[] = $control;
				
				$label = ucwords(str_replace("-"," ",$firstlevelkey));
				$labels[] = $label;
				$priority = $secondlevelval[2];
				$priorities[] = $priority;
				$title = $secondlevelval[3];
				$titles[] = $title;
				
			}
		
				$colorHeadings =  the_gap_get_color_style('section');
				$uniqueHeads = array_unique($colorHeadings );
				foreach ($uniqueHeads as $uniqueHead) {
					
					$headControl = $uniqueHead.'-color-heading';
					$allControls[] = $headControl;
				}
				
	if($param1 =='control'){
	return $controls;	
	}
	elseif($param1 =='all'){
	return $allControls;	
	}
	elseif($param1 =='section'){
	return $sections;	
	}
	elseif($param1 =='label'){
	return $labels;	
	}
	elseif($param1 =='title'){
	return $titles;	
	}
	elseif($param1 =='priority'){
	return $priorities;	
	}
	
	
}
/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_circle_icon_style to create array ->
Arrays of this function called from style.php and design-size.php using the_gap_get_circle_icon_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
 */
function the_gap_get_circle_icon() {
	
	$sections = the_gap_panels_sections();
	return $circle = array(
	'textbox'=>array(
	
	'scroll-up-icon-size'=>array(	
				'section'=>$sections['general']['scroll-up']['scroll-up'],
				'selector'=>'#scroll-up i.fa','default'=>'20','label'=>__('Icon Size','the-gap')),
	
	));
}


/*  creating settings in design-size.php */
function the_gap_get_circle_icon_style($param, $types) {
	
	$settings = the_gap_get_circle_icon();
	
		foreach ($settings[$types] as $firstlevelkey=>$firstlevelval) {
		
				$secondlevelval = array_values($firstlevelval);
				$section = $secondlevelval[0];
				$sections[] = $section;
				$control = $firstlevelkey;
				$controls[] = $control;
				$selector = $secondlevelval[1];
				$selectors[] = $selector;
				$label = $secondlevelval[3];
				$labels[] = $label;
				$default = $secondlevelval[2];
				$defaults[] = $default;
		
		}
	
	if($param =='control'){
	return $controls;	
	}
	elseif($param =='section'){
	return $sections;	
	}
	elseif($param =='default'){
	return $defaults;	
	}
	elseif($param =='selector'){
	return $selectors;	
	}
	elseif($param =='style'){
	return $style;	
	}
	elseif($param =='label'){
	return $labels;	
	}

}



/*  
* all checkbox related(hide)
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and checkbox.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/
function the_gap_get_hide_checkboxes() {
  
$checkboxes = the_gap_panels_sections();

return array(
  
	'hide-topbar'=>array(
		'section'=>$checkboxes['topbar']['topbar']['topbar'],
		'selector'=>'.topbar','default'=>'1','priority'=>'9',
		'label'=>__('Hide Topbar','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),

	'hide-post-meta'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.entry-meta','default'=>'','priority'=>'501',
		'label'=>__('Hide Post Meta','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),

	'hide-category-on-top'=>array(
		'section'=>$checkboxes['post']['single-general']['single-general'],
		'selector'=>'.single-header .post-categories','default'=>'','priority'=>'11',
		'label'=>__('Hide Category on Top','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),

	
	'hide-single-post-meta'=>array(
		'section'=>$checkboxes['post']['single-general']['single-general'],
		'selector'=>'.single-meta','default'=>'','priority'=>'501',
		'label'=>__('Hide Single Post Meta','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),

	'hide-scrollup'=>array(
		'section'=>$checkboxes['general']['scroll-up']['scroll-up'],
		'selector'=>'#scroll-up','default'=>'','priority'=>'1',
		'label'=>__('Hide Scrollup','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),

	'hide-paging'=>array(
		'section'=>$checkboxes['general']['pagination']['pagination'],
		'selector'=>'.pagination .nav-links','default'=>'','priority'=>'9',
		'label'=>__('Hide Paging','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),

	'hide-post-publication-date'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.entry-meta span.posted-on','default'=>'1','priority'=>'502',
		'label'=>__('Hide Post Publication Date','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	'hide-post-author'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.entry-meta span.byline','default'=>'','priority'=>'503',
		'label'=>__('Hide Post Author','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	'hide-post-comments'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.entry-meta span.comments-link','default'=>'1','priority'=>'504',
		'label'=>__('Hide Leave a Comment','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
	'hide-publication-date'=>array(
		'section'=>$checkboxes['post']['single-general']['single-general'],
		'selector'=>'.single-meta span.posted-on','default'=>'','priority'=>'502',
		'label'=>__('Hide Publication Date','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	'hide-author'=>array(
		'section'=>$checkboxes['post']['single-general']['single-general'],
		'selector'=>'.single-meta span.byline','default'=>'1','priority'=>'503',
		'label'=>__('Hide Author','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	'hide-comments' =>array(
		'section'=>$checkboxes['post']['single-general']['single-general'],
		'selector'=>'.single-meta span.comments-link','default'=>'1','priority'=>'503',
		'label'=>__('Hide Comments','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),

	'hide-categories-on-top'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.entry-header .post-categories','default'=>'','priority'=>'9',
		'label'=>__('Hide Categories on Top','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	
	
	
		);
  
}

/*  
* all checkbox related(enable)
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and checkbox.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer
*/

function the_gap_get_enable_checkboxes() {
  
$checkboxes = the_gap_panels_sections();

return array(

	'enable-excerpt'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.post-excerpt','default'=>'1','priority'=>'10',
		'label'=>__('Enable Excerpt','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
	'enable-drop-cap'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.drop-cap','default'=>'','priority'=>'10',
		'label'=>__('Enable Drop Cap','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'enable-related-post-home'=>array(
		'section'=>$checkboxes['post']['post-general']['post-general'],
		'selector'=>'.drop-cap','default'=>'0','priority'=>'28',
		'label'=>__('Enable Related Posts','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'enable-drop-cap-single'=>array(
		'section'=>$checkboxes['post']['single-general']['single-general'],
		'selector'=>'.drop-cap','default'=>'','priority'=>'10',
		'label'=>__('Enable Drop Cap','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'enable-sticky-header'=>array(
		'section'=>$checkboxes['site-header']['site-header']['site-header'],
		'selector'=>'.sticky-header','default'=>'1','priority'=>'9',
		'label'=>__('Enable Sticky Header','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
	'enable-toggle-sidebar'=>array(
		'section'=>$checkboxes['site-header']['main-menu']['main-menu'],
		'selector'=>'','default'=>'','priority'=>'11',
		'label'=>__('Enable Toggle Sidebar','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'enable-animated-text'=>array(
		'section'=>'header_image',
		'selector'=>'','default'=>'','priority'=>'71',
		'label'=>__('Enable Animated Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),	
	'enable-animated-text-featured'=>array(
		'section'=>$checkboxes['post']['feature-item']['feature-item'],
		'selector'=>'','default'=>'','priority'=>'15',
		'label'=>__('Enable Animated Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),	
		
	'enable-feature-items'=>array(
		'section'=>$checkboxes['post']['feature-item']['feature-item'],
		'selector'=>'','default'=>'0','priority'=>'20',
		'label'=>__('Enable Featured Items','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),	
	'enable-feature-slider'=>array(
		'section'=>$checkboxes['post']['feature-item']['feature-item'],
		'selector'=>'','default'=>'0','priority'=>'11',
		'label'=>__('Enable Featured Slider','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
			
	'enable-popular-post'=>array(
		'section'=>$checkboxes['post']['popular-post']['popular-post'],
		'selector'=>'','default'=>'0','priority'=>'9',
		'label'=>__('Enable Popular Post','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),	
	
	'enable-single-related-post'=>array(
		'section'=>$checkboxes['post']['single-general']['single-general'],
		'selector'=>'.related-single','default'=>'','priority'=>'11',
		'label'=>__('Enable Related Post on Single','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
	'enable-header-media-btn'=>array(
		'section'=>'header_image',
		'selector'=>'.media_button','default'=>'','priority'=>'81',
		'label'=>__('Enable Button','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => '')
	
		);

}

/*
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and layout.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.*/

function the_gap_get_page_select() {


return $page_select = array(
	
	
	'page-selection-slide1'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Slide1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'page-selection-slide2'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'442',
					'label'=>__('Select a Page for Slide2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
		
	'page-selection-slide3'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'444',
					'label'=>__('Select a Page for Slide3','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'page-selection-slide4'=>array(
				'section'=>'header_image',
				'selector'=>'','default'=>'','priority'=>'446',
					'label'=>__('Select a Page for Slide4','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	
	
	
);

}



/*  
* all image related settings
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and allimages.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.
*/
function the_gap_get_images() {
	
	$images = the_gap_panels_sections();
	
	return array(

		
		'footer-background'=>array(
					'section'=>$images['footer']['footer-info']['footer-info'],
					'selector'=>'.site-footer .site-info','default'=>'','priority'=>'60',
		'label'=>__('Footer Background Image','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),

		'featured-item-image1'=>array(
					'section'=>$images['post']['feature-item']['feature-item'],
					'selector'=>'','default'=>'','priority'=>'24',
		'label'=>__('Upload Image for First Feature Item','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
		'featured-item-image2'=>array(
					'section'=>$images['post']['feature-item']['feature-item'],
					'selector'=>'','default'=>'','priority'=>'34',
		'label'=>__('Upload Image for Second Feature Item','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
		'featured-item-image3'=>array(
					'section'=>$images['post']['feature-item']['feature-item'],
					'selector'=>'','default'=>'','priority'=>'44',
		'label'=>__('Upload Image for Third Feature Item','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
			
	);

}

/*  
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and height-width.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.
*/

function the_gap_get_height_width() {
	
	$sections = the_gap_panels_sections();
	
	return array(
	
		
		'footer-info-height'=>array(
					'section'=>$sections['footer']['footer-info']['footer-info'],
					'selector'=>'.site-info','default'=>'200','priority'=>'61',
					'label'=>__('Site Info Height','the-gap'),'sanitize'=>'','property'=>'height','unit'=>'',
		'transport' => 'refresh','description'  => '')
				
	);
}


/* 
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and height-width.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.
*/
function the_gap_get_screen_width() {
	
	$sections = the_gap_panels_sections();

	return array(
		
				
		'desktop-content-container-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'.inner-content','default'=>'87','priority'=>'29',
					'label'=>__('Desktop Content Container Width(%)','the-gap'),'sanitize'=>'','property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
					
		'desktop-content-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#primary','default'=>'72','priority'=>'29',
					'label'=>__('Desktop Content Width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
				
		'desktop-sidebar-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#secondary','default'=>'26','priority'=>'29',
					'label'=>__('Desktop Sidebar Width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
					
		'laptop-content-container-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'.inner-content','default'=>'87','priority'=>'32',
					'label'=>__('Laptop Content Container Width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
					
		'laptop-content-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#primary','default'=>'72','priority'=>'32',
					'label'=>__('Laptop Content Width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
				
		'laptop-sidebar-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#secondary','default'=>'26','priority'=>'32',
					'label'=>__('Laptop Sidebar Width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
				
						
		'large-tablet-content-container-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'.inner-content','default'=>'90','priority'=>'35',
					'label'=>__('Large Tablet Content Container Width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
					
		'large-tablet-content-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#primary','default'=>'100','priority'=>'35',
					'label'=>__('Large Tablet Content width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
				
		'large-tablet-sidebar-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#secondary','default'=>'100','priority'=>'35',
					'label'=>__('Large Tablet Sidebar Width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
					
					
		'tablet-content-container-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'.inner-content','default'=>'90','priority'=>'38',
					'label'=>__('tablet-content-container-width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
					
		'tablet-content-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#primary','default'=>'100','priority'=>'38',
					'label'=>__('tablet-content-width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
				
		'tablet-sidebar-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#secondary','default'=>'100','priority'=>'38',
					'label'=>__('tablet-sidebar-width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
				
		'phone-content-container-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'.inner-content','default'=>'90','priority'=>'41',
					'label'=>__('phone-content-container-width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
					
		'phone-content-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#primary','default'=>'100','priority'=>'41',
					'label'=>__('phone-content-width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => ''),
				
		'phone-sidebar-width'=>array(
					'section'=>$sections['general']['site-width']['site-width'],
					'selector'=>'#secondary','default'=>'100','priority'=>'41',
					'label'=>__('phone-sidebar-width(%)','the-gap'),'sanitize'=>'',
					'property'=>'','unit'=>'%',
		'transport' => 'postMessage','description'  => '')
				
		
				
	);
}




/* 
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and layout.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.

*/
function the_gap_get_three_alignment() {
$sections = the_gap_panels_sections();

return $alignment = array(
	
	
	
	'paging-alignment'=>array(
				'section'=>$sections['general']['pagination']['pagination'],
				'selector'=>'.pagination .nav-links','default'=>'center','priority'=>'71',
				'label'=>__('Page Alignment','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'postMessage','description'  => ''),
	
	'sidebar-widget-title-alignment'=>array(
				'section'=>$sections['layout']['sidebar-layout']['sidebar-layout'],
				'selector'=>'#secondary h3.widget-title','default'=>'center','priority'=>'71',
				'label'=>__('Sidebar Widget Title Alignment','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	'footer-widget-title-alignment'=>array(
				'section'=>$sections['footer']['footer-widget']['footer-widget'],
				'selector'=>'#site-footer h4.widget-title','default'=>'left','priority'=>'71',
				'label'=>__('Footer Widget Title Alignment','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	
	
	'single-header-align'=>array(
				'section'=>$sections['post']['single-general']['single-general'],
				'selector'=>'h1.single-title,.single-meta,.single-footer,.single-header',
				'default'=>'center','priority'=>'71',
				'label'=>__('Single Header Align','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	
	
	'post-header-align'=>array(
				'section'=>$sections['post']['post-general']['post-general'],
				'selector'=>'h2.entry-title,.entry-meta,.entry-header,.post-thumbnail,.blog-buttons',
				'default'=>'center','priority'=>'27',
				'label'=>__('Post Header Align','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => '')
	
);

}

/* 
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and layout.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.

*/
function the_gap_get_four_alignment() {
$sections = the_gap_panels_sections();

return $alignment = array(
	
	
	
	'single-content-align'=>array(
				'section'=>$sections['post']['single-general']['single-general'],
				'selector'=>'.single-content,.single-content p','default'=>'justify','priority'=>'71',
					'label'=>__('Single Content Align','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
	
		
	'post-content-align'=>array(
				'section'=>$sections['post']['post-general']['post-general'],
				'selector'=>'.entry-content,.entry-content p','default'=>'justify','priority'=>'376',
					'label'=>__('Post Content Align','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => '')
	
	
);

}



/* 
Cycle: Define value of controls, settings and styles-> Called by the_gap_get_two_dimension_style to create array ->
Arrays of this function called from style.php and layout.php using the_gap_get_two_dimension_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.

*/
function the_gap_sidebar_layout(){
	
	return $sections = array('post-layout'=>__('List Post Layout','the-gap'),
	'single-post-layout'=>__('Single Post Layout','the-gap'),'page-layout'=>__('Page Layout','the-gap'));
	
}

/* 
Cycle: Define value of controls, settings and styles-> Called by the_gap_layout_options_param_style to create array ->
Arrays of this function called from style.php and position.php using the_gap_layout_options_param_style function to
create setting, controls and styles. Simultaneously this function called by local.php to send array values
to customizer.js to make live customizer.
*/

function the_gap_positions_layouts() {
	
	$sections = the_gap_panels_sections();
	
	if (class_exists('The_Gap_Pro')){
	$ovl_box = the_gap_pro_ovl_box_style();
	$footer_col = the_gap_pro_footer_column();
	
	}else {
	$ovl_box = the_gap_ovl_box_style();	
	$footer_col = array(
		
                '3'     => __('Three', 'the-gap'),
				'4'     => __('Four', 'the-gap')
         
			);
	
	}
	
	
	$layouts = array(
	
			'site-layout' =>array('site-layout'=>$sections['layout']['site-layout']['site-layout'],
			'selector'=>'body','default'=>'full-width','priority'=>'100',
			'label'=>__('Site Layout','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'postMessage','description'  => '',
			'choices' => array('full-width'     => __('Full-Width', 'the-gap'),
                'boxed'   => __('Box', 'the-gap')
			),'control_type'=>'radio'),
			
			'topbar-layout' => array('topbar-layout'=>$sections['topbar']['topbar']['topbar'],
			'selector'=>'.topbar','default'=>'four','priority'=>'100',
			'label'=>__('Topbar Layout','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '','choices' => array(
				'one' => __('Social Right - Text Left', 'the-gap'),
				'two' => __('Social Left - Text Right', 'the-gap'),
				'three' => __('Social Only', 'the-gap'),
				'four' => __('Text Only', 'the-gap')),'control_type'=>'radio'),
		 
			'header_media_position' => array('header_media_position'=>'header_image',
			'selector'=>'','default'=>'top','priority'=>'10',
			'label'=>__('Header Media Position','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'top' => __('Top of header', 'the-gap'),
				'bottom' => __('Bottom of header', 'the-gap'),
			
			),'control_type'=>'radio'),
			
			'ovr_heights' => array('ovr_heights'=>'header_image',
			'selector'=>'','default'=>'all','priority'=>'72',
			'label'=>__('Overlay Type','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'all' => __('Full', 'the-gap'),
		
				'box' => __('Boxed', 'the-gap'),
		
			),'control_type'=>'select'),
			
			'header_ovl_style' => array('header_ovl_style'=>'header_image',
			'selector'=>'','default'=>'none','priority'=>'72',
			'label'=>__('Overlay Border Style','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' =>$ovl_box,'control_type'=>'select'),
			
			'show_media_pages' => array('show_media_pages'=>'header_image',
			'selector'=>'','default'=>'all','priority'=>'21',
			'label'=>__('Show Header Media On','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'fpage' => __('Front Page', 'the-gap'),
				'lpage' => __('Blog Page', 'the-gap'),
				'both' => __('Front & Blog Page', 'the-gap'),
				'all' => __('All Pages', 'the-gap'),
			
			),'control_type'=>'select'),
			
			'show_featured_pages' => array('show_featured_pages'=>$sections['post']['feature-item']['feature-item'],
			'selector'=>'','default'=>'both','priority'=>'21',
			'label'=>__('Show Featured Item On','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'fpage' => __('Front Page', 'the-gap'),
				'lpage' => __('Blog Page', 'the-gap'),
				'both' => __('Both', 'the-gap'),
			
			),'control_type'=>'select'),
			
			'show_slide_pages' => array('show_slide_pages'=>$sections['post']['feature-item']['feature-item'],
			'selector'=>'','default'=>'both','priority'=>'12',
			'label'=>__('Show Slider On','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'fpage' => __('Front Page', 'the-gap'),
				'lpage' => __('Blog Page', 'the-gap'),
				'both' => __('Both', 'the-gap'),
			
			),'control_type'=>'select'),
			
			'show_popular_pages' => array('show_popular_pages'=>$sections['post']['popular-post']['popular-post'],
			'selector'=>'','default'=>'both','priority'=>'12',
			'label'=>__('Show Popular Post On','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'fpage' => __('Front Page', 'the-gap'),
				'lpage' => __('Blog Page', 'the-gap'),
				'both' => __('Both', 'the-gap'),
			
			),'control_type'=>'select'),
			
			
			'slider_type' => array('slider_type'=>$sections['post']['feature-item']['feature-item'],
			'selector'=>'','default'=>'slide','priority'=>'12',
			'label'=>__('Slider Type','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'slide' => __('Slide', 'the-gap'),
				'carousel' => __('Carousel', 'the-gap'),
		
			),'control_type'=>'select'),
	
			'post_style' => array('post_style'=>$sections['post']['post-general']['post-general'],
			'selector'=>'','default'=>'style1','priority'=>'27',
			'label'=>__('Post Background Shadow','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'style1' => __('White Shadow', 'the-gap'),
				
				'none' => __('Simple', 'the-gap'),
			
			),'control_type'=>'select'),
			
			'post_column_no' => array('post_column_no'=>$sections['post']['post-general']['post-general'],
			'selector'=>'','default'=>'1a','priority'=>'27',
			'label'=>__('Number of Column & Layout','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				
					'1' =>__( 'One', 'the-gap' ),
					'1a' =>__( 'One - Inline', 'the-gap' ),
					'2' =>__( 'Two', 'the-gap' ),
					'2a' =>__( 'Two - First Post Full Width', 'the-gap' ),
					
			
			),'control_type'=>'select'),

			
			
			
			'thumbnail-sizes' => array('thumbnail-sizes'=>$sections['post']['post-general']['post-general'],
			'selector'=>'','default'=>'full','priority'=>'29',
			'label'=>__('Thumbnail Size','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'thumbnail' => __('Thumbnail', 'the-gap'),
				'medium' => __('Medium', 'the-gap'),
				'the-gap-medium-extra' => __('Medium Extra', 'the-gap'),
				
				'medium_large' => __('Medium Large', 'the-gap'),
				'large' => __('Large', 'the-gap'),
				'full' => __('Full', 'the-gap')
         
			),'control_type'=>'radio'),
			
			'single-thumbnail-sizes' => array('single-thumbnail-sizes'=>$sections['post']['single-general']['single-general'],
			'selector'=>'','default'=>'medium_large','priority'=>'195',
			'label'=>__('Thumbnail Size','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'thumbnail' => __('Thumbnail', 'the-gap'),
				'medium' => __('Medium', 'the-gap'),
				'medium_large' => __('Medium Large', 'the-gap'),
				'large' => __('Large', 'the-gap'),
				'full' => __('Full', 'the-gap')
         
			),'control_type'=>'radio'),
			
			'single-blog-element-order' => array('single-blog-element-order'=>$sections['post']['single-general']['single-general'],
			'selector'=>'','default'=>'img-top','priority'=>'196',
			'label'=>__('Post Thumbnail Order','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'img-top' => __('Thumbnail Top', 'the-gap'),
				'img-middle' => __('Thumbnail Middle', 'the-gap'),
				'img-down' => __('Thumbnail Down', 'the-gap'),
				
				
         
			),'control_type'=>'select'),
			
			'quote_style' => array('quote_style'=>$sections['post']['single-general']['single-general'],
			'selector'=>'','default'=>'single','priority'=>'196',
			'label'=>__('Blockquote Style','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' => array(
				'single' => __('Single Quote', 'the-gap'),
				'double' => __('Double Quote', 'the-gap'),
				'bar' => __('Left Bar', 'the-gap'),
				
				
         
			),'control_type'=>'select'),
			
			'site-header-alignment' => array('site-header-alignment' =>$sections['site-header']['site-header']['site-header'],
			'selector'=>'#site-header','default'=>'right','priority'=>'',
			'label'=>__('Site Header Align','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' =>  array(
				'right' => __('Menu Right - Site-Branding Left', 'the-gap'),
				'left' => __('Menu Left - Site-Branding Right', 'the-gap'),
				'sameline' => __('Menu,Branding left - icon right', 'the-gap'),
				'center' => __('Menu,Branding,Social - inline', 'the-gap'),
				'inline' => __('Menu & Branding Both Center', 'the-gap'),
				'both-left' => __('Menu & Branding Both left', 'the-gap'),
				'woo1' => __('Woocommerce Header-1', 'the-gap'),
				'woo2' => __('Woocommerce Header-2', 'the-gap'),
         
         
			),'control_type'=>'select'),
	
			'site-title-type' => array('site-title-type' =>$sections['site-header']['site-title']['site-title'],
			'selector'=>'#site-header','default'=>'one','priority'=>'',
			'label'=>__('Site Title Type','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'postMessage','description'  => '',
			'choices' =>  array(
			
				'one' => __( 'Title Text', 'the-gap' ),
				'two'  => __( 'Logo(Image)', 'the-gap' ),
				'three'  => __( 'None', 'the-gap' )
				
				
         
			),'control_type'=>'radio'),
	
	
			'site-background-type' => array('site-background-type'=>'background_image',
			'selector'=>'','default' =>'one','priority'=>'11',
			'label'=>__('Site Background Type','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' =>  array(
			
				'one' => __( "Color", 'the-gap' ),
				'two'  =>__( "Image", 'the-gap' ),
				
         
			),'control_type'=>'radio'),
	
	
			'footer-widget-areas' => array('footer-widget-areas'=>$sections['footer']['footer-widget']['footer-widget'],
			'selector'=>'#site-footer .widget','default'=>'4','priority'=>'11',
			'label'=>__('Footer Widget Areas','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'refresh','description'  => '',
			'choices' =>$footer_col,'control_type'=>'radio'),

			'scroll-up-style' => array('scroll-up-style'=>$sections['general']['scroll-up']['scroll-up'],
			'selector'=>'.scroll-up','default'=>'circle','priority'=>'30',
			'label'=>__('Scroll-up Style','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'postMessage','description'  => '',
			'choices' =>  array(
			
				'circle'     => __('Circle', 'the-gap'),
                'sqaure'     => __('Sqaure', 'the-gap')
         
			),'control_type'=>'radio'),
			
	
			'scroll-up-icon' => array('scroll-up-icon'=>$sections['general']['scroll-up']['scroll-up'],
			'selector'=>'.scroll-up','default'=>'chevron-up','priority'=>'31',
			'label'=>__('Scroll-up Icon','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'postMessage','description'  => '',
			'choices' =>  array(
			
				'angle-double-up' => __('Angle Double', 'the-gap'),
                'angle-up'     => __('Angle Up', 'the-gap'),
				'chevron-up'     => __('Chevron Up', 'the-gap')
         
			),'control_type'=>'radio'),
		
			
			'social-item-target' => array('social-item-target'=>$sections['topbar']['topbar-social']['topbar-social'],
			'selector'=>'.topbar','default'=>'_blank','priority'=>'100',
			'label'=>__('Social Item Target','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'postMessage','description'  => '',
			'choices' =>  array(
			
				'_self' => __( "Same Window", 'the-gap' ),
				'_blank'  => __( "New Window", 'the-gap' )
         
			),'control_type'=>'radio'),
	
			
			'contact-number' => array('contact-number'=>$sections['topbar']['topbar-contact']['topbar-contact'],
			'selector'=>'.topbar','default'=>'2','priority'=>'1',
			'label'=>__('Number of Link Item','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'postMessage','description'  => '',
			'choices' =>  array(
				'1'    => __( 'One', 'the-gap' ),
				'2'    => __( 'Two', 'the-gap' ),
                '3'    => __( 'Three', 'the-gap' ),
               
         
			),'control_type'=>'select'),
			
			'social-number'  => array('social-number' =>$sections['topbar']['topbar-social']['topbar-social'],
			'selector'=>'.topbar','default'=>'4','priority'=>'',
			'label'=>__('Number of Social Icon','the-gap'),'sanitize'=>'the_gap_sanitize_choices','property'=>'','unit'=>'',
			'transport' => 'postMessage','description'  => '',
			'choices' =>  array(
			
				'2'    => __( 'Two', 'the-gap' ),
                '3'    => __( 'Three', 'the-gap' ),
                '4'    => __( 'Four', 'the-gap' ),
				'5'    => __( 'Five', 'the-gap' ),
				'6'    => __( 'Six', 'the-gap' ),
                '7'    => __( 'Seven', 'the-gap' ),
                '8'    => __( 'Eight', 'the-gap' ),
         
			),'control_type'=>'select')
			
			
	
			);
	
	return $layouts ;

}

function the_gap_layout_options_param_style($param,$types) {
	
	$style = '';
	$settings = array();
	$controls = array();
	$labels = array();
	$sections = array();
	$defaults = array();
	$priorities = array();
	$transports = array();	
	$contrl_types = array();
	$control_choices = array();	
	$callbacks	 = array();
	
	
	if($types == 'main'){
		
		$settings = the_gap_positions_layouts();
	}
	
	if ( class_exists('woocommerce')) { 
		
		if ( class_exists('The_Gap_Pro')) { 
		if($types == 'woo-pro'){
		$settings = the_gap_pro_woo_positions_layouts();
		}
		}
	}
	
	if ( class_exists('The_Gap_Pro')) { 
		if($types == 'pro'){
			$settings = the_gap_pro_positions_layouts();
		}
	}
	
	foreach ($settings as $firstlevelkey=>$firstlevelval) {
		
		$secondlevelval = array_values($firstlevelval);
		
		$control = $firstlevelkey;
		$controls[]= $control;
		
		$section = $secondlevelval[0];
		$sections[] = $section;
		
		$selector = $secondlevelval[1];
		$selectors[] = $selector;
		
		$default = $secondlevelval[2];
		$defaults[] = $default;
		
		$priority = $secondlevelval[3];
		$priorities[] = $priority;
		
		$label = $secondlevelval[4];
		$labels[] = $label;
		
		$callback = $secondlevelval[5];
		$callbacks[] = $callback;
		
		$property = $secondlevelval[6];
		$properties[] = $property;
		
		$unit = $secondlevelval[7];
		$units[] = $unit;
		
		$transport = $secondlevelval[8];
		$transports[] = $transport;
		
		$description = $secondlevelval[9];
		$descriptions[] = $description;
		
		$control_choice = $secondlevelval[10];
		$control_choices[] = $control_choice;
		
		$contrl_type = $secondlevelval[11];
		$contrl_types[] = $contrl_type;
		
		
		$singleProperty = $secondlevelval[6];
		$singleProperties[] = $singleProperty;
		
		$mod_val = get_theme_mod($control);
	
	}
	
	if($param =='style'){
	return $style;	
	}
	elseif($param == 'control'){
	return $controls;	
	}
	elseif($param == 'section'){
	return $sections;	
	}
	elseif($param == 'selector'){
	return $selectors;	
	}
	elseif($param == 'default'){
	return $defaults;	
	}
	elseif($param == 'property'){
	return $properties;	
	}
	elseif($param == 'label'){
	return $labels;	
	}
	elseif($param == 'callback'){
	return $callbacks;	
	}
	elseif($param == 'description'){
	return $descriptions;	
	}
	elseif($param == 'priority'){
	return $priorities;	
	}
	elseif($param == 'transport'){
	return $transports;	
	}
	elseif($param == 'choice'){
	return $control_choices;	
	}
	elseif($param == 'type'){
	return $contrl_types;	
	}
	
	
	
}



