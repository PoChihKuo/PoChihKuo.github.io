<?php
/**
 * styles of the-gap and style related functions.
 *
 * @author  Kudrat E Khuda
 * @package the-gap
 *
 */


function the_gap_customizer_css($style) {
		
	
	    $style = '';
	
	    $style .= the_gap_primary_fonts();
	    
 	    $style .=  the_gap_get_color_style('style');
		
	  
	    $style .= the_gap_get_two_dimension_style('style','width-height');
		$style .= the_gap_get_two_dimension_style('style','three');
		$style .= the_gap_get_two_dimension_style('style','four');

        $style .= the_gap_get_border_width_style_radius('style','border');
	    $style .= the_gap_get_border_width_style_radius('style','width');
	    $style .= the_gap_get_border_width_style_radius('style','style');
		$style .= the_gap_get_border_width_style_radius('style','radius');
	
		
		$style .= the_gap_get_border_width_style_radius('style','top-border-color');
		$style .= the_gap_get_border_width_style_radius('style','top-border-width');
		$style .= the_gap_get_border_width_style_radius('style','top-border-style');
		$style .= the_gap_get_border_width_style_radius('style','bottom-border-color');
		$style .= the_gap_get_border_width_style_radius('style','bottom-border-width');
		$style .= the_gap_get_border_width_style_radius('style','bottom-border-style');
		
		$style .= the_gap_get_two_dimension_style('style','font-size');
		$style .= the_gap_get_two_dimension_style('style','single');
		$style .= the_gap_get_site_header_align();

		$style .= the_gap_site_background();
	
		$style .= the_gap_get_two_dimension_style('style','hide');
		$style .= the_gap_get_animation_speed2('slide_border_style','10');
		
		
		if ( class_exists('The_Gap_Pro')) { 
		$style .= the_gap_get_two_dimension_style('style','hide-pro');
		$style .= the_gap_pro_get_color_style('style');
		 $style .= the_gap_pro_get_fonts_style('family','style'); 
		$style .= the_gap_pro_get_fonts_style('size','style'); 
		$style .= the_gap_pro_get_fonts_style('spacing','style'); 
		$style .= the_gap_pro_get_fonts_style('weight','style'); 
		$style .= the_gap_pro_get_fonts_style('height','style'); 
		$style .= the_gap_pro_get_fonts_style('style','style'); 
		$style .= the_gap_pro_get_fonts_style('transform','style');
		$style .= the_gap_sidebar_title_style();
		$style .= the_gap_pro_mobile_menu_color();
		$style .= the_gap_get_two_dimension_style('style','three-pro');
		
		$style .= the_gap_pro_get_animation_speed('header-media-image','10');
		
		$style .= the_gap_pro_get_animation_speed2('nl-slide-ovr-title','10');
		
		$style .= the_gap_pro_full_page_header_media();
		
			if(class_exists('woocommerce')){
				$style .= the_gap_pro_woo_get_section_fonts_style();
				$style .= the_gap_get_two_dimension_style('style','three-pro-woo');
			}
		}
		
		if(class_exists('woocommerce')){
		$style .= the_gap_get_two_dimension_style('style','woo-hide');
		$style .= the_gap_media_woo_title_family();
		}
		
		$style .= the_gap_get_two_dimension_style('style','check');
		$style .= the_gap_scrollup_icon_size();
		
		
		$style .= the_gap_site_title_type();
		$style .= the_gap_topbar_layout();
		$style .= the_gap_topbar_social_item_number();
	
		$style .= the_gap_sticky_header();
		

		$style .= the_gap_button_border_color();
		
		
		$style .= the_gap_get_border_width_style_radius('style','two-border-color');
		$style .= the_gap_get_border_width_style_radius('style','two-border-width');
		$style .= the_gap_get_border_width_style_radius('style','two-border-style');
		
		
		  $style .= the_gap_make_opacity_zero();
		  $style .= the_gap_social_icon_width_height();
		  $style .= the_gap_button_shortcut();
		  $style .= the_gap_post_meta_style();
		  $style .= the_gap_drop_cap();
		  $style .= the_gap_style_white_shadow();
		  $style .= the_gap_overlay_fullwidth_responsive();
		  $style .= the_gap_post_image_width();
		  $style .= the_gap_style_block_qoate();
		  $style .= the_gap_media_screen();
		
		  $style .= the_gap_style_search_input_bg();
		 $style .=  the_gap_form_input_bg_color();
		  $style .= the_gap_header_align_center_topbar();
		 $style .=  the_gap_hide_single_author_meta();
		 $style .= the_gap_widget_border_color();
		 $style .= the_gap_enable_toggle_sidebar();
		 $style .= the_gap_col_one_inline();
		 $style .= the_gap_media_corner_hide();
		
		$style .= the_gap_media_video_style();
		$style .= the_gap_post_title_color_style();
		$style .= the_gap_media_title_family();
		$style .= the_gap_style_search_font_size();
		$style .= the_gap_footer_info_image();
		$style .= the_gap_post_title_color_style();
		$style .= the_gap_topbar_text_show_hide();
		$style .= the_gap_image_ovl();
		$style .= the_gap_media_slide_ovl();
		$style .= the_gap_feature_slider_bg_color();
		$style .= the_gap_single_post_order();
		$style .= the_gap_get_secondary_color();
		$style .= the_gap_accent_color();
		
	wp_enqueue_style( 'the_gap_style', get_stylesheet_uri() );
		
	
	wp_add_inline_style( 'the_gap_style', $style );	
	
}

add_action( 'wp_enqueue_scripts', 'the_gap_customizer_css' );


function the_gap_feature_slider_bg_color(){
	$styles = '';
	$overlay_bg_rgba = the_gap_hex2rgba('#000', 0.2);
		
	return $styles .=  ".slide_cta_wrap {background-color:".$overlay_bg_rgba.";}";
		
}
function the_gap_media_slide_ovl(){
		$styles = '';
		$overlay_height = get_theme_mod('ovr_heights','all');
		$overlay_bg_color = get_theme_mod('overlay-background-color','#000000');
		
		$opacity = '';
		$opacity = get_theme_mod('overlay-background-color-opacity','0.4');
		if ($opacity == ''){$opacity = 0.4;}
		$overlay_bg_rgba	= the_gap_hex2rgba($overlay_bg_color, $opacity);
		
		if ($overlay_bg_rgba) {
			if ($overlay_height != 'all'){
		
		$styles .=  ".media_slide_cta {background-color:".esc_attr($overlay_bg_rgba).";}";
			}
			if ($overlay_height == 'all'){
		
		$styles .=  ".slide_border_style {background-color:".esc_attr($overlay_bg_rgba).";}";
			}
		
		}
		$accent = the_gap_get_accent_color_mod();
		$styles .= ".btn-default.nlbtn1.slide-btn{background-color:".esc_attr($accent).";}";		
		$styles .= ".btn-default.nlbtn1.slide-btn{border: 1px solid ".esc_attr($accent).";}";
		
		$border_style = get_theme_mod('header_ovl_style','none');
		if ($border_style != 'style3'){
			
			$styles .= ".media_slide_corner {display:none;}";
			
		}
		if ($overlay_height == 'all'){
			
			$styles .= ".media_slide_corner {display:none;}";
		}
		return $styles;
		
		
}


function the_gap_image_ovl(){
		$styles ='';
		$overlay_bg_color = get_theme_mod('overlay-background-color','#000');
		$opacity = get_theme_mod('overlay-background-color-opacity','0.4');
		if ($opacity == ''){$opacity = 0.4;}
		$overlay_bg_rgba = the_gap_hex2rgba($overlay_bg_color, $opacity);
		$overlays_height = get_theme_mod('ovr_heights','all');
		if ($overlay_bg_rgba) {
			if ($overlays_height != 'all'){
		
		$styles .=  ".media-imag-overlay-cta {background-color:".esc_attr($overlay_bg_rgba).";}";
			}
			if ($overlays_height == 'all'){
		
		$styles .=  ".overlay_media_border_style {background-color:".esc_attr($overlay_bg_rgba).";}";
		
			}
		
		}
	
		if ($overlays_height == 'all'){
			
			$styles .= '.overlay_media_corner{display:none;}';
		}
		return $styles;
}

function the_gap_single_post_order(){

		 $styles = '';
	
		if( get_theme_mod( 'single-blog-element-order','img-top') == 'img-down') {
			
			$styles .='.featured-image.top{display:none;}';
			$styles .='.featured-image.middle{display:none;}';
			
			$styles .='.featured-image.down{margin-bottom:25px!important;}';
		}
		if( get_theme_mod( 'single-blog-element-order','img-top') == 'img-middle') {
			
			$styles .='.featured-image.top{display:none;}';
			$styles .='.featured-image.down{display:none;}';
			$styles .='.featured-image.middle{margin-top:25px!important;}';
		}
		if( get_theme_mod( 'single-blog-element-order','img-top') == 'img-top') {
			
			$styles .='.featured-image.middle{display:none;}';
			$styles .='.featured-image.down{display:none;}';
			
		}
		
		return $styles;
}

function the_gap_topbar_text_show_hide(){
		
		$styles = '';
		
		$c_number = get_theme_mod('contact-number','2');
		
		if ($c_number == '1'){
			
			$styles .= '#item3 span{display:none;}';
			$styles .= '#item2 span{display:none;}';
			
		}
		if ($c_number == '2'){
			$styles .= '#item3 span{display:none;}';
	
		}
		return $styles;
}

function the_gap_get_secondary_color(){
	
	$styles = '';
	
	$container_bg_color = get_theme_mod('site-content-background-color','#ffffff');
	$container_color = get_theme_mod('site-content-text-color','#000000');
	
	if ($container_color =='#000000' || $container_color =='#000'){
		$styles .= '.single-meta span,.single-meta span a,.site-main p,.entry-meta span,.entry-meta span a {color:#54595F;}';
		
	}else {
		$styles .= '.single-meta span,.single-meta span a,.site-main p,.entry-meta span,.entry-meta span a {color:'.esc_attr($container_color).';}';
		
	}
	
	if ($container_bg_color =='#ffffff' || $container_bg_color =='#fff'){
		
		$styles .= '.sticky {background-color:#eeeeee;}';
	}else {
		$styles .= '.sticky {background-color:'.$container_bg_color.';}';
	}
	
	return $styles;
}

function the_gap_post_title_color_style(){
	$text_color = get_theme_mod('site-content-text-color','#000');
	
	return $style = "h4.entry-title a,h1.single-title {color:".esc_attr($text_color)."!important;}";
}

function the_gap_media_video_style(){
	
	$style = '';
	$header_video = get_theme_mod('header_video');
	
	if ($header_video){
	$style .= "#wp-custom-header-video {height:auto;}";
	}
	
	
	
	return $style;

}

function the_gap_get_animation_speed2($id,$animate_speed){
	$style = '';
	if ($animate_speed != ''){
	$style = '.'.$id.'.animated {';
		
	$style .=	' -webkit-animation-duration:'.$animate_speed.'s;';
	$style .=	'animation-duration: '.$animate_speed.'s;';
		
	$style .=	'}';
	}
	return $style;
}

function the_gap_footer_info_image(){
	
	$style = '';
	$footer_image = get_theme_mod('footer-background');
	$footer_info_height = get_theme_mod('footer-info-height','200');
	
	if($footer_image != ''){
	return $style = '.site-info {background-image:url('.$footer_image.');height:'.esc_attr($footer_info_height).'px;}';
	}
	
}

function the_gap_media_title_family(){
	$style = '';
	if ( class_exists('The_Gap_Pro')) { 
		$header_media_title_font_family = get_theme_mod('header_media_title_font_family');
		$header_media_title_font_size = get_theme_mod('header_media_title_font_size');
		$header_media_title_transformation = get_theme_mod('header_media_title_transformation');
		if ($header_media_title_font_family != '') {
		
			$style .= "h1.nl-media-ovr-title span,h1.nl-slide-ovr-title,h1.video-media-ovr-title span{font-family:".esc_attr($header_media_title_font_family).";}";
		}
		if ($header_media_title_font_size != '') {	
			$style .= "h1.nl-media-ovr-title span,h1.nl-slide-ovr-title,h1.video-media-ovr-title span{font-size:".esc_attr($header_media_title_font_size)."px;}";
		}
		if ($header_media_title_transformation != '') {	
			$style .= "h1.nl-media-ovr-title span,h1.nl-slide-ovr-title,h1.video-media-ovr-title span{text-transform:".esc_attr($header_media_title_transformation).";}";
		}
	}else {
		$style .= 'h1.nl-media-ovr-title span,h1.video-media-ovr-title span{font-size:75px;text-transform:uppercase;font-weight:500;}';
		$style .= 'h1.nl-media-ovr-title span,h1.video-media-ovr-title span{font-family:"Poiret One",sans-serif;}';
		
	}
	return $style;
}





function the_gap_media_corner_hide(){
	
	$style = '';
	$ovl_style = get_theme_mod('header_ovl_style','none');
	if ($ovl_style != 'style3'){
		$style .= ".overlay_media_corner {display:none!important;}";
	}
	return $style;

}


function the_gap_col_one_inline(){
	
	$post_style = get_theme_mod('post_style','style1');
	$col_no = get_theme_mod('post_column_no','1a');
	if ($col_no == '1a')
	{
		$post_style = 'style2';
	}
	$style = '';
	if ($post_style == 'style2' && $col_no = '1' ){
		$style .= ".post-thumbnail {width:45%;float:left;}";
		$style .= ".post-thumbnail.w_thumb {float:none;}";
		$style .= ".header-content.thumb {width:55%;float:right;}";
		$style .= ".header-content.w_thumb {width:100%!important;float:none;}";
		
	}
	if ($post_style == 'none' && $col_no = '1' ){
		$style .= ".post-thumbnail {float:none;}";
		$style .= ".header-content {width:100%;float:none;}";
	}
	return $style;
}

function the_gap_enable_toggle_sidebar(){
	
	if (get_theme_mod('enable-toggle-sidebar','') != '1'){
		return $style = ".sidebar-icon,.sidebar-icon .fa.fa-bars {display:none;}";
	}
}

function the_gap_widget_border_color(){
	
	$bg_color = get_theme_mod('site-content-background-color','#ffffff');
	$style='';
	
		$color = the_gap_hex2rgba('#eeeeee',0.2);
	
		if ($bg_color == '#fff'||$bg_color == '#ffffff'||$bg_color == '#eee'||$bg_color == '#eeeeee') {
		
		$style.='.related-single,.sidebar h3.widget-title:before {border-top:1px solid #eeeeee}';
		$style.='.sidebar h3.widget-title:before {border-top:1px solid #ccc}';
		$style.='.related-single,.the-gap-related-posts,#blog-post article.hentry, .search article.hentry, .archive article.hentry, .tag article.hentry, .category article.hentry, .blog article.hentry {border-bottom:1px solid #eeeeee}';
		} else {
		
		$style.='.related-single,.sidebar h3.widget-title:before {border-top:1px solid '.esc_attr($color).'}';
		$style.='.related-single,.the-gap-related-posts,#blog-post article.hentry, .search article.hentry, .archive article.hentry, .tag article.hentry, .category article.hentry, .blog article.hentry {border-bottom:1px solid '.esc_attr($color).'}';
		}
	
	return $style;
}


function the_gap_style_block_qoate(){
	$quote_style = get_theme_mod('quote_style','single');
	
	$style='';
	
	if ($quote_style == 'single'){
		
		$style .='.single-content blockquote.wp-block-quote p:before,.page-content blockquote.wp-block-quote p:before,.single-content blockquote p:before,.page-content blockquote p:before,.comment-content blockquote p:before{content: "\f10d";left: 0;top: 0; color: #ccc;}';
		
		$style .='.single-content blockquote.wp-block-quote p:after,.single-content blockquote p:after,.page-content blockquote.wp-block-quote p:after,.page-content blockquote p:after,.comment-content blockquote p:after{display:none;}';
		
	}
	if ($quote_style == 'double'){
		$style .='.single-content blockquote.wp-block-quote p:before,.page-content blockquote.wp-block-quote p:before,.single-content blockquote p:before,.page-content blockquote p:before{content: "\f10d"!important;left: 0;top: 0; color: #ccc;}';
		$style .='.single-content blockquote.wp-block-quote p:after,.page-content blockquote.wp-block-quote p:after,.single-content blockquote p:after,.page-content blockquote p:after{content: "\f10e"!important;right: 0;bottom: 0; color: #ccc;}';
	}
	if ($quote_style == 'bar'){
		$style .='.single-content blockquote.wp-block-quote p,.page-content blockquote.wp-block-quote p,.page-content blockquote p,.single-content blockquote p{border-left: 5px solid #ccc!important;}';
	}
	
	return $style;
}

function the_gap_style_white_shadow(){
	$post_style= get_theme_mod('post_style','style1');
	$style='';
	
	if ($post_style == 'style1'){
		$style='.sidebar .widget {box-shadow:0px 5px 25px 0px rgba(0,0,0,0.1);}';
	}
	return $style;
}

function the_gap_header_align_center_topbar(){
	$site_header = get_theme_mod('site-header-alignment','right');
	$style = '';
	
	if ($site_header == 'center'){
		$style = '.topbar .topbar-social {display:none;}';
	}
	return $style;
}

function the_gap_style_search_font_size(){
	$icon_size = get_theme_mod('main-menu-top-level-font-size','12');
	$style='';
	$style .='#main-navigation.main-menu ul li a,.menu-btn,#main-navigation.main-menu .search-icon button.sbtn .fa { font-size:'.esc_attr($icon_size).'px;}';
	return $style;
}



function the_gap_style_search_input_bg(){
	$site_bg = get_theme_mod('site-content-background-color','#ffffff');
	$style='';
	
	if ($site_bg != '#ffffff'){
		$style .='.sidebar input[type="search"]{ background-color:'.esc_attr($site_bg).';}';
	}
		$style .='form.cart { background-color:'.esc_attr($site_bg).'!important;}';
	return $style;
}

function the_gap_post_image_width(){
	
	$col_no = get_theme_mod('post_column_no','1');
	$style='';
	
	if ($col_no == '2' || $col_no == '3'){
		$style ='.entry-header img {width:100%;}';
	}
	if ($col_no == '1'){
		$style='.entry-header img {width:auto;}';
	}
	
	return $style;
}


function the_gap_drop_cap(){
	
		$drop_caps = get_theme_mod('enable-drop-cap-single','');
	$drop_cap = get_theme_mod('enable-drop-cap','');
	
	$site_content = get_theme_mod('site-content-text-color','#000000');
	
	$style = '';
	if ($drop_caps == '1'){
		$style = ".single-content p:nth-of-type(1):first-letter{
		color:".esc_attr($site_content).";
		float: left;
		font-size: 75px;
		line-height: 60px;
		padding-top: 4px;
		padding-right: 8px;
		padding-left: 3px;}";
  
	}
	if ($drop_cap == '1'){
		$style = ".entry-content p:first-child:first-letter{
			color:".esc_attr($site_content).";
			float: left;
			font-size: 75px;
			line-height: 60px;
			padding-top: 4px;
			padding-right: 8px;
			padding-left: 3px;}";
  
	}
	return $style;
	
}

function the_gap_topbar_layout(){
	$style ='';
	$topbar_layout = get_theme_mod('topbar-layout','four');
	$header_align = get_theme_mod('site-header-alignment','right');
	
	if ($header_align == 'center'){
		$topbar_layout = 'four';

	}
	
	if ($topbar_layout == 'one'){
		$style .= ".topbar .topbar-text{float: left}";
		$style .= ".topbar .topbar-text{text-align:left}";
		$style .= ".topbar .topbar-social{float: right}";
		$style .= ".topbar .topbar-social{text-align:right}";
	
	}
	if ($topbar_layout == 'two'){
		$style .= ".topbar .topbar-text{float: right}";
		$style .= ".topbar .topbar-text .contacts-body{text-align: right}";
		
		$style .= ".topbar .topbar-social{float: left}";
		$style .= ".topbar .topbar-social{text-align: left}";
		
		
	}
	if ($topbar_layout == 'three'){
		$style .= ".topbar .topbar-text{display: none}";
		$style .= ".topbar .topbar-social{width: 100%!important}";
		$style .= ".topbar .topbar-social{float: none}";
		$style .= ".inner-topbar .topbar-social{text-align: center}";
	
	}
	if ($topbar_layout == 'four'){
		$style .= ".topbar .topbar-social{display: none}";
		$style .= ".topbar .topbar-text{width: 100%!important}";
		$style .= ".topbar .topbar-text{float: none}";
		$style .= ".topbar .topbar-text .contacts-body{text-align: center}";
	
	}
	
	
	
	return $style;
}



function the_gap_social_icon_width_height(){

	$icon_width = get_theme_mod('social-item-width','32');
	$icon_height = get_theme_mod('social-item-height','32');
	$hvr_border_color = get_theme_mod('topbar-social-hvr-border-color','#323844');
	$social_icon_size = get_theme_mod('topbar-social-icon-size','12');
	
	
	$style 	= ".social-icon-topbar .icon{ height: " . intval($icon_height) . "px;}"."\n";
	$style 	.= ".social-icon-topbar .icon{ width: " . intval($icon_width) . "px;}"."\n";
	$style 	.= ".social-icon-topbar .icon:hover{ border-color: " . esc_attr($hvr_border_color) . ";}"."\n";
	
	$style 	.= ".social-icon-topbar .icon i.fa{ line-height: " . intval($icon_height) . "px;}"."\n";
	$style 	.= ".social-icon-topbar .icon i.fa{ font-size: " . intval($social_icon_size) . "px;}"."\n";
	
	return $style;
	
}

function the_gap_make_opacity_zero(){
		$style = '';
		$selector = the_gap_form_input_selector();
		
		$hvrbgcolor = get_theme_mod('main-menu-top-level-hover-background-color','#fff');
		$bgcolor = get_theme_mod('main-menu-top-level-background-color','#fff');
		$currentbgcolor = get_theme_mod('main-menu-top-level-current-page-background-color','#fff');
		
		
		$hvrbgcolor_opacity = get_theme_mod('main-menu-top-level-hover-background-color-opacity','0');
		$bgcolor_opacity = get_theme_mod('main-menu-top-level-background-color-opacity','0');
		$currentbgcolor_opacity = get_theme_mod('main-menu-top-level-current-page-background-color-opacity','0');
		
		$hvrbgcolor_rgba = the_gap_hex2rgba($hvrbgcolor, $hvrbgcolor_opacity);
		$bgcolor_rgba = the_gap_hex2rgba($bgcolor, $bgcolor_opacity);
		$currentbgcolor_rgba = the_gap_hex2rgba($currentbgcolor, $currentbgcolor_opacity);
		
		if ($hvrbgcolor_opacity == '0'){
		 $style .= '#main-navigation.main-menu ul li a:hover { background-color: '.esc_attr($hvrbgcolor_rgba).'}';
		}
		if ($bgcolor_opacity == '0'){
		$style .= '#main-navigation.main-menu ul,#main-navigation.main-menu ul li a { background-color: '.esc_attr($bgcolor_rgba).'}';	
		}
		if ($currentbgcolor_opacity == '0'){
		 $style .= '#main-navigation.main-menu li.current-menu-item a,
		#main-navigation.main-menu li.current-menu-parent a { background-color: '.esc_attr($currentbgcolor_rgba).'}';	
		}
		
		return $style;
}



function the_gap_get_accent_color_mod(){
	
	return $accent_color = get_theme_mod('site-accent-color','#1a1a1a');
}


function the_gap_accent_color_selectors(){
	
	return $accent_color_selector = '
	.toggle-menu-container .side-nav-wrap a:hover,
	
	.menu-toggle,
	.dropdown-toggle,
	.social-navigation a,
	.post-navigation a,
	.pagination a:hover,
	.pagination a:focus,
	.counter-icon span,
	.feature-icon span,
	.box-icon span,
	.page-links > .page-links-title,
	.comment-reply-title small a:hover,
	.comment-reply-title small a:focus';
	
}


function the_gap_accent_bgcolor_selectors(){
	
	 return $selectors = '.search-form .search-submit,.slider-category .post-categories li a,a.more-link,a.read-more,button:not(.menu-btn):not(.sbtn):not(.submenu-btn),a.ovr-button, .btn-default.nlbtn1, input[type="button"], input[type="reset"], input[type="submit"],
	 #secondary .nl-search-form .btn,.read-more-btn a,
	 .edit-link .post-edit-link,.vc_inline-link,.blog-post-social .icon,
	 #site-footer h4.widget-title:after,.widget_shopping_cart .buttons a, .woocommerce.widget_shopping_cart .buttons a,
	.woocommerce #review_form #respond .form-submit input, .woocommerce .cart .button,
	.woocommerce .cart input.button, .woocommerce button.button,
	.woocommerce button.button.alt,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button';
		
}

function the_gap_form_input_bg_color(){
	
		$selector = the_gap_form_input_selector();
		$bgcolor = get_theme_mod('site-content-background-color','#fff');
		$style = '';
		$style .= '' .$selector.'
		{ background-color: '.esc_attr($bgcolor).'}';
			
		return $style;
}

function the_gap_accent_border_selectors(){
	
	 return $selectors = 'input[type="search"]';
		
}

function the_gap_accent_border_top_selectors(){
	
	 return $selectors = '.sidebar .widget li,.sidebar .widget ul li,.sidebar .news-widget-body-,
			.sidebar .widget-contacts-body span,.sidebar .widget-selected-link span,
			.sidebar .social-icon-widget,.sidebar .cta-overlay';
		
}


function the_gap_accent_color(){
	
	$style = '';
	$accent_color = get_theme_mod('site-accent-color','#1a1a1a');
	
	$colorSelctor = the_gap_accent_color_selectors();
	$bgcolorSelctor = the_gap_accent_bgcolor_selectors();
	$bordercolorSelctor = the_gap_accent_border_selectors();
	$bordertopSelctor = the_gap_accent_border_top_selectors();
	$accent_rgba	= the_gap_hex2rgba($accent_color, 0.3);
		
	$style .= ''.$colorSelctor.'{ color: '.esc_attr($accent_color).';}';
   
	$style .= ''.$bordercolorSelctor.' { border: 1px solid '.esc_attr($accent_rgba).';}';
	
	
	$style .= '.separator{ border-color: '.esc_attr($accent_color).';}';
	
	$style .= ''.$bgcolorSelctor.' { background-color: '.esc_attr($accent_color).';}';
	
			
    return $style;
}


function the_gap_get_body_font_family_mod(){
	
	return $font_family = get_theme_mod('site-primary-font-family','Lato,sans-serif');

}

function the_gap_primary_fonts(){
	
	$style = '';
	$primary_fonts = get_theme_mod('site-primary-font-family','Lato,sans-serif');

	$selectors = '*';
	
	$style .= ''.$selectors.'{ font-family: '.esc_attr($primary_fonts).'}';
     	
    return $style;
	
}

function the_gap_overlay_fullwidth_responsive(){
	
	
	$ovr_heights = get_theme_mod('ovr_heights','all');
	
	
	$style = '';
	
	
	if ($ovr_heights == 'all'){
	
	
	
	$style .= "@media screen and (min-width:960px)and (max-width:1024px){
		.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span	{font-size:45px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:45px!important;}
		h1.nl-slide-ovr-title{font-size:32px!important;}
		h6.nl-media-ovr-sub-title{font-size:16px!important;}
		
	}";
	
	$style .= "@media screen and (min-width:768px)and (max-width:959px){
	.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:38px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:38px!important;}
		h1.nl-slide-ovr-title{font-size:28px!important;}
		h6.nl-media-ovr-sub-title{font-size:14px!important;}
	
	}";
	
	$style .= "@media screen and (min-width:501px)and (max-width:767px){
	.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:32px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:32px!important;}
		
		h1.nl-slide-ovr-title{font-size:24px!important;}
		h6.nl-media-ovr-sub-title{font-size:14px!important;}

	}";
	
	$style .= "@media screen and (max-width:500px){
.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:28px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:28px!important;}
		
		.media-imag-overlay-cta{padding:0!important;}
		h1.nl-slide-ovr-title{font-size:22px!important;}
	
	}";
	
	}
	
	
	
	if ($ovr_heights != 'all'){
	
	$style .= ".media_slide_cta.colorbg,.media-imag-overlay-cta.colorbg{padding-top:25px;padding-bottom:25px;padding-left:15px;padding-right:15px;}";
	
	$style .= "@media screen and (min-width:1025px)and (max-width:1200px){
			.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:48px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:48px!important;}
		h1.nl-slide-ovr-title{font-size:34px!important;}
		.slider-buttons {margin-top: 15px;}
		
		.media_slide_cta.colorbg{padding-top:20px;padding-bottom:20px;}
		.media-imag-overlay-cta.colorbg{padding-top:25px;padding-bottom:25px;}
	}";
	
	$style .= "@media screen and (min-width:960px)and (max-width:1024px){
			.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:45px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:45px!important;}
		h1.nl-slide-ovr-title{font-size:32px!important;}
		.slider-buttons {margin-top: 15px;}
		.media-imag-overlay-cta.colorbg{padding-top:25px;padding-bottom:25px;}
		.media_slide_cta.colorbg{padding-top:15px;padding-bottom:15px;}
		.nl-media-ovr-sub-title:before,.nl-media-ovr-sub-title:after {width:25px;};
	
	}";
	
	$style .= "@media screen and (min-width:768px)and (max-width:959px){
		.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:40px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:40px!important;}
		h1.nl-slide-ovr-title{font-size:28px!important;}
		.slider-buttons {margin-top: 10px;}
		.media-imag-overlay-cta.colorbg{padding-bottom:15px;padding-top:15px;}
		.media_slide_cta.colorbg{padding-bottom:10px;padding-top:10px;}
		.nl-media-ovr-sub-title:before,.nl-media-ovr-sub-title:after {width:25px;};
	
	}";
	
	$style .= "@media screen and (min-width:501px)and (max-width:767px){
	.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:24px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:24px!important;}
		.nl-media-ovr-sub-title,.nl-slide-ovr-sub-title{display:none!important;}
		h1.nl-slide-ovr-title{font-size:20px!important;}
		.media_slide_cta.colorbg,.media-imag-overlay-cta.colorbg{padding:15px!important;}
	}";
	
	$style .= "@media screen and (max-width:500px){
		.video-overlay-cta h1, h1.video-media-ovr-title,.video-media-ovr-title span{font-size:18px!important;}
		.media-imag-overlay-cta h1,h1.nl-media-ovr-title,.nl-media-ovr-title span{font-size:18px!important;}
		.nl-media-ovr-sub-title,.nl-slide-ovr-sub-title{display:none!important;}
		.media-imag-overlay-cta{padding:0!important;}
		h1.nl-slide-ovr-title{font-size:16px!important;}
		.media_slide_cta.colorbg{padding:5px!important;}
		.media-imag-overlay-cta.colorbg {padding-top:10px!important;padding-bottom:10px!important;}
	
	}";
	
	
	
	}

	return $style;
	

}




function the_gap_button_shortcut(){
	$style = '';
	return $style .= '.topbar-text .customize-partial-edit-shortcut-button,
.topbar-social .customize-partial-edit-shortcut-button	{margin-left:70px;}';
	
	
}

function the_gap_form_input_selector(){
	return $selector = 'input[type="text"], input[type="email"], input[type="url"],
	input[type="password"], input[type="number"], input[type="tel"], 
			input[type="range"], input[type="date"], input[type="month"], 
			input[type="week"], input[type="time"], input[type="datetime"], 
			input[type="datetime-local"], input[type="color"], textarea,
			.wpcf7 .cf7_container .wpcf7-text, .wpcf7 .cf7_container .wpcf7-captchar,.wpcf7 .cf7_container textarea';
}

function the_gap_hide_single_author_meta(){
	
	$style ='';
	$hide_author = get_theme_mod('hide-author','1');
	
	if ($hide_author == '1'){
	$style .= ".single-meta span.posted-on:after { display:none}"; 
	}
	return $style;
	
}


function the_gap_button_selectors(){
	
return $selectors = 'button:not(.search-submit):not(.customize-partial-edit-shortcut-button):not(.slick-next:before):not(.slick-prev:before):(.search-icon), input[type="button"], input[type="reset"], input[type="submit"]';

}

function the_gap_button_border_color(){
	
	$style = '';
	$selectors = the_gap_button_selectors();
	$accent = the_gap_get_accent_color_mod();
	$bgcolor = get_theme_mod('all-buttons-background-color',$accent);
	$btncolor = get_theme_mod('all-buttons-text-color','#fff');
	
		$bordercolor = get_theme_mod('button-border-color','#eeeeee');
		$borderwidth = get_theme_mod('button-border-width','0');
		$borderstyle = get_theme_mod('button-border-style','none');
		$borderradius = get_theme_mod('button-border-radius','0');
		
		
		$paddingTop = get_theme_mod('buttons-padding-top','6');
		$paddingBottom = get_theme_mod('buttons-padding-bottom','6');
		$paddingLeft = get_theme_mod('buttons-padding-left','15');
		$paddingRight = get_theme_mod('buttons-padding-right','15');
		
		$buttonApply = get_theme_mod('buttons-padding-apply','0');
		
		
		$btnHoverColor = get_theme_mod('all-buttons-hover-color','#dda95a');
		$btnHoverBgColor = get_theme_mod('all-buttons-hover-background-color','#1a1a1a');
		
		
		$style .= '.wp-block-button,article.hentry .entry-footer span a.post-edit-link,a.read-more, a.more-link,button, input[type="button"], input[type="reset"], input[type="submit"]{ color: '.esc_attr($btncolor).'}';
		
		$style .= 'a.read-more, a.more-link,button:not(.menu-btn):not(.sbtn):not(.slick-dots li button), input[type="button"], input[type="reset"], input[type="submit"]{ background-color: '.esc_attr($bgcolor).'}';
		
		$style .= 'a.read-more:hover,a.more-link:hover,button:not(.sbtn):hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover{ color: '.esc_attr($btnHoverColor).'}';
		
		$style .= 'a.read-more:hover,a.more-link:hover,button:not(.sbtn):not(.hide-mob-menu.show):hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover{ background-color: '.esc_attr($btnHoverBgColor).'}';

		$style .=  ' ' .$selectors.'
		{ border-color: '.esc_attr($bordercolor).'}';
				
		$style .= ' ' .$selectors.'
				 { border-width: '.intval($borderwidth).'px}';
				 
		$style .= ' ' .$selectors.'
				 { border-style: '.esc_attr($borderstyle).'}';
		
		$style .=  ' ' .$selectors.'
				 { border-radius: '.intval($borderradius).'px}';
		
		
		$style .= ' ' .$selectors.'
				 { padding-top: '.intval($paddingTop).'px}';
		$style .=  ' ' .$selectors.'
				 { padding-bottom: '.intval($paddingBottom).'px}';
		$style .= ' ' .$selectors.'
				 { padding-left: '.intval($paddingLeft).'px}';
		$style .=  ' ' .$selectors.'
				 { padding-right: '.intval($paddingRight).'px}';
				 
		
			
		return $style;
}

function the_gap_scrollup_icon_size(){
	
		$icon_size = get_theme_mod('scroll-up-icon-size','20');
		$scrollUpStyle = get_theme_mod('scroll-up-style','circle');
		$controlWidth = intval($icon_size) + intval($icon_size);
		$style = '';
		if ($scrollUpStyle == 'circle' ) {
			$style .= ".scroll-up-circle i.fa  { font-size: ".intval($icon_size)."px}"; 
			$style .= ".scroll-up-circle { width: ".intval($controlWidth)."px}"; 
			$style .= ".scroll-up-circle{ height: ".intval($controlWidth)."px}"; 
			$style .= ".scroll-up-circle{ line-height: ".intval($controlWidth)."px}"; 
		} else {
			$style .= ".scroll-up-sqaure i.fa{ font-size: ".intval($icon_size)."px}"; 
			$style .= ".scroll-up-sqaure{ width: ".intval($controlWidth)."px}"; 
			$style .= ".scroll-up-sqaure{ height: ".intval($controlWidth)."px}"; 
			$style .= ".scroll-up-sqaure{ line-height: ".intval($controlWidth)."px}";
		}	
		return $style;
}


function the_gap_media_screen(){
	global $post;
	$layout_meta = '';
	$page_layout = '';
	if (is_singular()){
	$layout_meta = get_post_meta( $post->ID, 'the_gap_page_layout', true );
	}
	if (is_page()){
	$page_layout = get_theme_mod('page-layout-option','nosidebar');
	}
	
	if (is_single()){
	$page_layout = get_theme_mod('single-post-layout-option','rightbar');
	}
	if (is_home()){
	$page_layout = get_theme_mod('post-layout-option','rightbar');
	}
	if (is_home()&& is_front_page()){
	$page_layout = get_theme_mod('post-layout-option','rightbar');
	}

	$style = '';

if (($layout_meta == 'default' && $page_layout == 'nosidebar' ) || ($layout_meta == 'nosidebar')){ 
	
	
	$d_width = get_theme_mod('desktop-content-container-width','87');



$style .= "@media screen and (min-width:1024px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($d_width)."%;}
	
	inner-content,.inner-topbar,.inner-header {margin-left:auto;margin-right:auto;}

}";

$l_width = get_theme_mod('laptop-content-container-width','87');


$style .= "@media screen and (min-width:768px)and (max-width:1024px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($l_width)."%;}
	
	.inner-content,.inner-topbar,.inner-header {margin-left:auto;margin-right:auto;}

}";

$lg_tab_width = get_theme_mod('large-tablet-content-container-width','90');

$style .= "@media screen and (min-width:768px)and (max-width:959px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($lg_tab_width)."%;}

	
	.inner-content,.inner-topbar,.inner-header {margin-left:auto;margin-right:auto;}

}";


$tab_width = get_theme_mod('tablet-content-container-width','90');

$style .= "@media screen and (min-width:501px)and (max-width:767px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($tab_width)."%;}
	.inner-content {margin: 0 auto;}
	
	.inner-content,.inner-topbar,.inner-header {margin-left:auto;margin-right:auto;}


}";

$phone_width = get_theme_mod('phone-content-container-width','90');
	
$style .= "@media screen and (max-width:500px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($phone_width)."%;}
	
	.inner-content,.inner-topbar,.inner-header {margin-left:auto;margin-right:auto;}


}";
	
	
}
else
{

	
$d_width = get_theme_mod('desktop-content-container-width','87');
$d_content_width = get_theme_mod('desktop-content-width','72');
$d_sidebar_width = get_theme_mod('desktop-sidebar-width','26');


$style .= "@media screen and (min-width:1024px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($d_width)."%;}
	
	#primary {width:".intval($d_content_width)."%;}
	
	#secondary {width:".intval($d_sidebar_width)."%;}
	.inner-content,#primary,#secondary,.inner-topbar {margin-left:auto;margin-right:auto;}

}";

$l_width = get_theme_mod('laptop-content-container-width','87');
$l_content_width = get_theme_mod('laptop-content-width','72');
$l_sidebar_width = get_theme_mod('laptop-sidebar-width','26');

$style .= "@media screen and (min-width:768px)and (max-width:1024px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($l_width)."%;}
	
	#primary {width:".intval($l_content_width)."%;}
	#secondary {width:".intval($l_sidebar_width)."%;}
	.inner-content,#primary,#secondary,.inner-topbar {margin-left:auto;margin-right:auto;}

}";

$lg_tab_width = get_theme_mod('large-tablet-content-container-width','90');
$lg_tab_content_width = get_theme_mod('large-tablet-content-width','100');
$lg_tab_sidebar_width = get_theme_mod('large-tablet-sidebar-width','100');

$style .= "@media screen and (min-width:768px)and (max-width:959px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($lg_tab_width)."%;}

	#primary {width:".intval($lg_tab_content_width)."%;}
	#secondary {width:".intval($lg_tab_sidebar_width)."%;}
	.inner-content,#primary,#secondary,.inner-topbar {margin-left:auto;margin-right:auto;}

}";


$tab_width = get_theme_mod('tablet-content-container-width','90');
$tab_content_width = get_theme_mod('tablet-content-width','100');
$tab_sidebar_width = get_theme_mod('tablet-sidebar-width','100');

$style .= "@media screen and (min-width:501px)and (max-width:767px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($tab_width)."%;}
	.inner-content {margin: 0 auto;}
	#primary,#secondary,.layout-rightbar #primary,.layout-leftbar #primary,.layout-rightbar #secondary,.layout-leftbar #secondary {float: none;}
	#primary {width:".intval($tab_content_width)."%;}
	#secondary {width:".intval($tab_sidebar_width)."%;}
	.inner-content,#primary,#secondary,.inner-topbar {margin-left:auto;margin-right:auto;}


}";

$phone_width = get_theme_mod('phone-content-container-width','90');
$phone_content_width = get_theme_mod('phone-content-width','100');
$phone_sidebar_width = get_theme_mod('phone-sidebar-width','100');
	
$style .= "@media screen and (max-width:500px){
	.inner-content,.inner-topbar,.inner-header {width:".intval($phone_width)."%;}
	#primary,#secondary,.layout-rightbar #primary,.layout-leftbar #primary  {float: none;}
	#primary {width:".intval($phone_content_width)."%;}
	#secondary {width:".intval($phone_sidebar_width)."%;}
	.inner-content,#primary,#secondary,.inner-topbar {margin-left:auto;margin-right:auto;}


}";


}



return $style;

}


function the_gap_sticky_header(){
	
	$style ='';
	$sticky = get_theme_mod('enable-sticky-header','1');
	
	$site_header = get_theme_mod('site-title-type','one');
	
	$headerbgColor = get_theme_mod('site-header-background-color','#ffffff');
	
	$sticky_bg_color = get_theme_mod('sticky-header-background-color',$headerbgColor);
	$headerAlign = get_theme_mod('site-header-alignment');
	$opacity = get_theme_mod('sticky-header-background-color-opacity','1');
	
	$site_margin_left = get_theme_mod('site-layout-margin-left','0');
	$site_margin_right = get_theme_mod('site-layout-margin-right','0');
	$site_margin_lr = intval($site_margin_left) + intval($site_margin_right);
	
	
	$site_layout = get_theme_mod('site-layout');

	$rgbaOrHex = '';
	if ($opacity == '1'){
				$rgbaOrHex = $sticky_bg_color;
	} else {
				$rgbaOrHex 	= the_gap_hex2rgba($sticky_bg_color, $opacity);
	}
	
	if ($sticky == 1){ 
		if ($headerAlign != 'inline'){
			if ($sticky_bg_color !=''){
				
				$style .= "#site-header.fixed { background-color: ".esc_attr($rgbaOrHex)."}"; 
	
			}
			
			if ($site_layout == 'boxed'){
			
			$style .= "#site-header.fixed { width: calc(100% - ".intval($site_margin_lr)."px)!important}";
			
			}
			
			$style .= "#site-header.fixed { z-index: 999999}"; 
		}
		
		if ($headerAlign == 'inline'){
			
			$sticky = '';
			
		}
		
		if ($headerAlign == 'both-left'){
				
				$style .= "#site-header.both { padding-top:0;padding-bottom: 0!important;}"; 
				
				$style .= ".branding.both{margin-bottom:10px!important;}";
				if ($site_header == 'one' ){
				$style .= "#main-navigation.main-menu.both{margin-top:20px!important;}";
				}
				if ($site_header == 'two' ){
				$style .= "#main-navigation.main-menu.both{margin-top:40px!important;}";
				}
			
		}
		
		if ($headerAlign == 'woo2'){
				
				$style .= "#main-navigation.main-menu.woo2 { text-align:center!important;}"; 
		
		}
		if ($headerAlign == 'sameline'){
				
				$style .= "#main-navigation.main-menu.sameline { text-align:center!important;}"; 
		
		}
			
				
	} 

	else {
	    $style .= "#site-header.fixed { z-index: 9999}"; 
		$style .= ".main-menu.fixed { z-index: 9999}"; 
	}
	
	return $style;
	
		 
}	



function the_gap_site_title_type(){
    
    $style ='';
	$site_title_type = get_theme_mod('site-title-type');
	
	if($site_title_type == 'one'){
		$style = ".logo { display: none}"; 
		return $style .= ".site-title { display: block}"; 
	}
	
	if($site_title_type == 'two'){
	 $style = ".site-title { display: none}"; 
		return	$style .= ".logo { display: none}"; 
	}
	
	if($site_title_type == 'three'){
		$style = ".logo { display: none}"; 
		return $style .= ".site-title { display: none}"; 
	}
}


function the_gap_category_border_color(){
	$style ='';
	$post_meta_color = get_theme_mod('post-meta-color','#333');
	$single_meta_color = get_theme_mod('single-meta-color','#333');
	return $style = ".entry-header .post-categories a { border-bottom: 1px solid ".esc_attr($post_meta_color)."}"; 
	return $style .= ".single-header .post-categories a { border-bottom: 1px solid ".esc_attr($single_meta_color)."}"; 
	
}

function the_gap_site_background(){
    
    $style = '';
	$site_layout = get_theme_mod('site-layout','full-width');

	$page_bg_image_url = get_background_image();
	$src = get_template_directory_uri().'/assets/images/';
	$bg_color = get_theme_mod('background_color');
	
	if ($site_layout == 'boxed'){
		if( get_theme_mod('site-background-type')=='one'){
			
	
			$style .= "body.boxed{background-image:none!important}"; 
			$style .= "body.boxed{background-color:" .esc_attr($bg_color)."}"; 
	
		}
	
		if ( get_theme_mod('site-background-type')=='two'){
	

		$style = "body.boxed{background-image:url(" . esc_url($page_bg_image_url). ")}";
	
		}
	
	}
	
	if ($site_layout == 'full-width'){
		
		if( get_theme_mod('site-background-type')=='one'){
			
	
			$style .= "body.custom-background{background-image:none!important}"; 
			$style .= "body.custom-background{background-color:" .esc_attr($bg_color)."}"; 
	
		}
		
		if ( get_theme_mod('site-background-type')=='two'){
	

		$style = "body.custom-background{background-image:url(" . esc_url($page_bg_image_url). ")}";
	
		}
		
	}
	
	return $style;
}



function the_gap_post_meta_style(){

	if ( is_singular( ) ) {
	$styles = '';
	
	global $post;

	$hide_page_header = get_post_meta( $post->ID, 'the_gap_hide_page_header', true );
	$meta_color = get_post_meta( $post->ID, 'the_gap_page_header_bg_color', true );
	
	if ( $hide_page_header == 'yes'){
	$styles .= '.page-content-header { display: none;}'; 
	}
	
	if($meta_color !=''){
		$styles .= '.page-content-header { background-color:'.esc_attr($meta_color).';}';
	}

	return $styles;
	
	}
	
}

function the_gap_get_site_header_align() {
	
	$style = '';
	$title_type = get_theme_mod('site-title-type');
	
	if ( $title_type == 'one') {
		 $style .= ".site-title{display:block}";
		 $style .= ".site-logo{display:none}";
	}
	
	if ( $title_type == 'two') {
		 $style .= ".site-title{display:none}";
		 $style .= ".site-logo{display:block}";
	}
	
	
	if ( $title_type == 'three') {
		 $style .= ".site-title{display:none}";
		 $style .= ".site-logo{display:none}";
	} 

		$site_header_pattern = get_theme_mod('site-header-alignment','right');
	
		if ( $site_header_pattern == 'left') {
		
		 $style .= "#main-navigation.main-menu,.menu-btn{float:left;}";
		 $style .= ".branding{float:right;}";
		 $style .= "#main-navigation.main-menu{text-align:left;}";
		 $style .= ".site-title,.site-logo{float:right;}";
		 $style .= ".site-title,.site-logo{clear:both;}";
		 $style .= ".search-container{float: right;}";
		
		 
		 $style .= ".inner-header{-webkit-box-orient: horizontal;}";
		 $style .= ".inner-header{-webkit-box-direction: reverse;}";
		 $style .= ".inner-header{-ms-flex-direction: row-reverse;}";
		 $style .= ".inner-header{flex-direction: row-reverse;}";
	
		}
		
		if ( $site_header_pattern == 'right') {
			
		 $style .= "#main-navigation.main-menu,.menu-btn{float:right;}";
		 $style .= ".branding{float:left;}";
		 $style .= "#main-navigation.main-menu,.menu-btn{text-align:right;}";
		 $style .= ".site-logo{float:left;}";
		 $style .= ".site-title,.site-logo{clear:both;}";
		 $style .= ".search-container{float: right;}";
		 
		 $style .= ".inner-header{display: -webkit-box;}";
		 $style .= ".inner-header{display: -ms-flexbox;}";
		 $style .= ".inner-header{display: flex;}";
		 $style .= ".inner-header{-ms-flex-wrap: wrap;}";
		 $style .= ".inner-header{flex-wrap: wrap;}";
		 $style .= ".inner-header{-webkit-box-align: center;}";
		 $style .= ".inner-header{-ms-flex-align: center;}";
		 $style .= ".inner-header{align-items: center;}";
		 
		 
		}
		
		if ( $site_header_pattern == 'center') {
			
		 $style .= ".site-title,#main-navigation.main-menu,.menu-btn{margin-left:auto!important;margin-right:auto!important;}";
		 $style .= ".site-title{float:none!important;}";
		 $style .= "#main-navigation.main-menu,.menu-btn{text-align:center;}";
		 $style .= ".site-logo{float:left;}";
		 $style .= ".site-title,.site-logo{clear:both;}";
		 $style .= ".search-container{float: right;}";
		 
		 $style .= ".inner-header{display: -webkit-box;}";
		 $style .= ".inner-header{display: -ms-flexbox;}";
		 $style .= ".inner-header{display: flex;}";
		 $style .= ".inner-header{-ms-flex-wrap: wrap;}";
		 $style .= ".inner-header{flex-wrap: wrap;}";
		 $style .= ".inner-header{-webkit-box-align: center;}";
		 $style .= ".inner-header{-ms-flex-align: center;}";
		 $style .= ".inner-header{align-items: center;}";
	
		}
		
		if ( $site_header_pattern == 'inline') {
		$style .= ".site-title.one{float: none!important;}";
		$style .= ".inner-header{display: block!important;}";
		$style .= ".site-title,.menu-btn{margin-left:auto!important;margin-right:auto!important;}";
		$style .= ".site-logo{width:100%}";
		$style .= ".site-logo{float:none}";
		$style .= ".site-logo {margin:0 auto}";
		$style .= ".site-logo{text-align: center}";
		
	
		
		$style .= ".site-title.one{text-align: center!important;}";
		$style .= "#main-navigation.main-menu,.menu-btn{text-align: center}";
		$style .= "#site-header{padding-top: 35px!important;}";
		$style .= "#main-navigation.main-menu,.menu-btn{margin-top: 35px!important;}";
		
		}
		
		if ( $site_header_pattern == 'both-left') {
		 $style .= ".inner-header{display: block!important;}";
		 $style .= "#main-navigation.main-menu{float:left!important;}";
		 $style .= ".branding{float:left!important;}";
		 $style .= "#main-navigation.main-menu{text-align:left!important;display:block;width:100%!important;}";
		 $style .= ".site-logo{float:left!important;}";
		  $style .= ".branding{margin-bottom: 10px!important;}";
		  $style .= "#site-header{padding-bottom: 0!important!important;}";
		   $style .= "#site-header{padding-top: 20px!important;}";
		
	
		}
		
		if ( $site_header_pattern == 'woo1') {
			
			$style .= ".inner-header{display: block!important;}";
			$style .= "#main-navigation.main-menu{float:left!important;}";
			$style .= ".branding{float:left!important;}";
			$style .= "#main-navigation.main-menu{text-align:left!important;display:block!important;width:100%!important;}";
			$style .= ".site-logo{float:left!important;}";
			$style .= ".branding{margin-bottom: 10px!important;}";
			$style .= "#site-header{padding-bottom: 0!important;}";
		    $style .= "#site-header{padding-top: 20px!important;}";
		    $style .= "#main-navigation .search-icon{display:none!important;}";
		   
		
	
		}
		
		if ( $site_header_pattern == 'woo2') {
			
		
		 $style .= ".site-title{float:none!important;}";
		 $style .= "#main-navigation.main-menu,.menu-btn{text-align:left!important;}";
		 $style .= ".site-logo{float:left;}";
		 $style .= ".site-title,.site-logo{clear:both;margin-right:20px;}";
		 $style .= ".search-container{float: right;}";
		 
		 $style .= ".inner-header{display: -webkit-box;}";
		 $style .= ".inner-header{display: -ms-flexbox;}";
		 $style .= ".inner-header{display: flex;}";
		 $style .= ".inner-header{-ms-flex-wrap: wrap;}";
		 $style .= ".inner-header{flex-wrap: wrap;}";
		 $style .= ".inner-header{-webkit-box-align: center;}";
		 $style .= ".inner-header{-ms-flex-align: center;}";
		 $style .= ".inner-header{align-items: center;}";
		
		}
		
		if ( $site_header_pattern == 'sameline') {

		 $style .= ".site-title{float:none!important;}";
		 $style .= "#main-navigation.main-menu,.menu-btn{text-align:left!important;}";
		 $style .= ".site-logo{float:left;}";
		 $style .= ".site-title,.site-logo{clear:both;margin-right:20px;}";
		 $style .= ".search-container{float: right;}";
		 
		 $style .= ".inner-header{display: -webkit-box;}";
		 $style .= ".inner-header{display: -ms-flexbox;}";
		 $style .= ".inner-header{display: flex;}";
		 $style .= ".inner-header{-ms-flex-wrap: wrap;}";
		 $style .= ".inner-header{flex-wrap: wrap;}";
		 $style .= ".inner-header{-webkit-box-align: center;}";
		 $style .= ".inner-header{-ms-flex-align: center;}";
		 $style .= ".inner-header{align-items: center;}";
			
		}
		
	return $style;
}



function the_gap_topbar_social_item_number(){
    
	$style = '';
	$social_number = get_theme_mod('social-number','4');
	if ($social_number == '2'){
		$style = "#ha3,#ha4,#ha5,#ha6,#ha7,#ha8{display: none}";
		
	}
	if ($social_number == '3'){
		$style = "#ha4,#ha5,#ha6,#ha7,#ha8{display: none}";
		
	}
	if ($social_number == '4'){
		$style = "#ha5,#ha6,#ha7,#ha8{display: none}";
		
	}
	if ($social_number == '5'){
		$style = "#ha6,#ha7,#ha8{display: none}";
		
	}
	if ($social_number == '6'){
		$style = "#ha7,#ha8{display: none}";
		
	}
	if ($social_number == '7'){
		$style = "#ha8{display: none}";
		
	}
	return $style;
}





function the_gap_get_site_description(){
$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<div id="site-description" class="site-description">
				<?php echo esc_html($description);  ?>
				</div>
				
			<?php
		
		
			endif; 	
}


/* 
 * site layout
 */
 if ( ! function_exists( 'the_gap_web_layout' ) ) :   
	function the_gap_web_layout($classes){
	    if(get_theme_mod('site-layout','full-width') == 'boxed'){
	        $classes[]= 'boxed';
	    }
        elseif(get_theme_mod('site-layout','full-width') == 'full-width'){
            $classes[]='full-width';
        }
	    return $classes;
   }
  endif;
 add_filter( 'body_class', 'the_gap_web_layout' );
   
/* 
 * set custom body classes
 */
 
if ( ! function_exists( 'the_gap_set_body_class' ) ) :
	function the_gap_set_body_class( $classes ) {

		
		$classes[] = 'layout-' . the_gap_get_layout();
		
		return $classes;
	}
endif;
add_filter( 'body_class', 'the_gap_set_body_class' );


/* 
 * set page/post layout
 */
 



function the_gap_get_layout() {
		global $post;

		$layout = 'rightbar';

		$layout_home = get_theme_mod('post-layout-option','rightbar');
		$layout_single = get_theme_mod('single-post-layout-option','rightbar');
		$layout_page = get_theme_mod('page-layout-option', 'nosidebar');
		$layout_frontpage = get_theme_mod('layout_frontpage');
		$layout_page = ( !empty($layout_page) ) ? $layout_page : 'center';

		// get custom page layout
		if ( is_singular() ) {
			
			
			$custom = get_post_meta( $post->ID, 'the_gap_page_layout', true );
			if ( '' == $custom || 'default' == $custom ) {
				unset( $custom );
			}
		}

		// 'post' layout
		if ( is_single() && isset( $layout_single) ) {
			$layout = ( isset( $custom ) )
				? $custom
				: $layout_single;
		} // 'page' layout
		elseif ( is_page() && isset( $layout_page )  ) {
			$layout = ( isset( $custom ) )
				? $custom
				: $layout_page;
		} // home layout settings
		elseif ( is_home() && $layout_home ) {
			$layout = $layout_home;
		} // default layout settings
		if ( is_front_page() && $layout_frontpage ) {
				$layout = $layout_frontpage;
		} 
		if(class_exists('woocommerce')){
			if ( (!is_active_sidebar( 'nl_woocommerce_sidebar')) && (is_shop())){
				$layout = 'nosidebar';
			}
		}
		
		return $layout;
}
