<?php

/* Customizer settings, controls and style related functions
 * Author: Kudrat E Khuda
 * 
 * @package the-gap
*/


/* 
* All panels of customizer
*/

function the_gap_woo_panels() {
	
return $panels = array(


'woofrontpage'=>__('WooFrontPage Panel','the-gap' )

);
	
}


/* 
* All sections of customizer
*/

function the_gap_panels_woo_sections() {
	
	
	
	$panels_sections = array(
	
	'woofrontpage' => array('banner' =>
	array('banner'=>'banner','label'=>__('Banner','the-gap'),'description'=>''),
	'promo-item'=>array('promo-item'=>'promo-item','label'=>__('Promotional Items','the-gap'),'description'=>''),
	
	'product_slider'=>array('product_slider'=>'product_slider','label'=>__('Product Slider','the-gap'),'description'=>''),
	
	'product_categories'=>array('product_categories'=>'product_categories','label'=>__('Product Categories','the-gap'),'description'=>''),
	'product_brand'=>array('product_brand'=>'product_brand','label'=>__('Product Brand','the-gap'),'description'=>'')),
	
	
	);
	

	return $panels_sections;
	
}

/* 
* Section creation function of customizer
*/

function  the_gap_panels_woo_sections_style($param) {
	
	
	$settings = the_gap_panels_woo_sections();
	
	$firstlevelkey = array_keys($settings);
	
	for ($i=0; $i<1; $i++) {
		
		
		
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



function the_gap_get_woo_more_url() {

$sections = the_gap_panels_woo_sections();

		return $get_url = array(
	
		'promo-item-url1'=>array(
				'section'=>$sections['woofrontpage']['promo-item']['promo-item'],
				'selector'=>'','default'=>'','priority'=>'22',
		'label'=>__('Promo Item Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'promo-item-url2'=>array(
				'section'=>$sections['woofrontpage']['promo-item']['promo-item'],
				'selector'=>'','default'=>'','priority'=>'32',
		'label'=>__('Promo Item Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'promo-item-url3'=>array(
				'section'=>$sections['woofrontpage']['promo-item']['promo-item'],
				'selector'=>'','default'=>'','priority'=>'42',
		'label'=>__('Promo Item Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
		'banner2_btn_url'=>array(
				'section'=>$sections['woofrontpage']['banner']['banner'],
				'selector'=>'.banner-text button',
				'default'=>'','priority'=>'59',
	'label'=>__('Product Bannner2 Button Url','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'postMessage','description'  => ''),
	
	'feature_product_url1'=>array(
				'section'=>$sections['woofrontpage']['product_slider']['product_slider'],
				'selector'=>'',
				'default'=>'','priority'=>'441',
	'label'=>__('Feature Product Url1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'postMessage','description'  => ''),
	
	'feature_product_url2'=>array(
				'section'=>$sections['woofrontpage']['product_slider']['product_slider'],
				'selector'=>'',
				'default'=>'','priority'=>'443',
	'label'=>__('Feature Product Url2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'postMessage','description'  => ''),
	
	'feature_product_url3'=>array(
				'section'=>$sections['woofrontpage']['product_slider']['product_slider'],
				'selector'=>'',
				'default'=>'','priority'=>'445',
	'label'=>__('Feature Product Url3','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'postMessage','description'  => ''),
	
	'feature_product_url4'=>array(
				'section'=>$sections['woofrontpage']['product_slider']['product_slider'],
				'selector'=>'',
				'default'=>'','priority'=>'447',
	'label'=>__('Feature Product Url4','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'postMessage','description'  => ''),
	
	'feature_product_url5'=>array(
				'section'=>$sections['woofrontpage']['product_slider']['product_slider'],
				'selector'=>'',
				'default'=>'','priority'=>'449',
	'label'=>__('Feature Product Url5','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'postMessage','description'  => ''),
				);
		
}

function the_gap_get_woo_more_input(){
	$sections = the_gap_panels_woo_sections();

	return $input = array(
		
	//------------------
	
	'promo_feature_title1'=>array(
				'section'=>$sections['woofrontpage']['promo-item']['promo-item'],
				'selector'=>'.feature-page-title',
				'default'=>__('Title of Promo Item1','the-gap'),'priority'=>'22',
		'label'=>__('Promotional Title1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'promo_feature_title2'=>array(
				'section'=>$sections['woofrontpage']['promo-item']['promo-item'],
				'selector'=>'.feature-page-title',
				'default'=>__('Title of Promo Item2','the-gap'),'priority'=>'31',
		'label'=>__('Promotional Title2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'promo_feature_title3'=>array(
				'section'=>$sections['woofrontpage']['promo-item']['promo-item'],
				'selector'=>'.feature-page-title',
				'default'=>__('Title of Promo Item3','the-gap'),'priority'=>'41',
		'label'=>__('Promotional Title3','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
	//------------------------

	'product-category-section-title'=>array(
				'section'=>$sections['woofrontpage']['product_categories']['product_categories'],
				'selector'=>'.product-cat-title',
				'default'=>'','priority'=>'10',
	'label'=>__('Product Category Section Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'product-category-section-desc'=>array(
				'section'=>$sections['woofrontpage']['product_categories']['product_categories'],
				'selector'=>'.product-cat-desc',
				'default'=>'','priority'=>'10',
	'label'=>__('Product Category Section Descripton','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'product_brand_section_title'=>array(
				'section'=>$sections['woofrontpage']['product_brand']['product_brand'],
				'selector'=>'.product-brand-title',
				'default'=>'','priority'=>'10',
	'label'=>__('Product Brand Section Title','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'product_brand_section_desc'=>array(
				'section'=>$sections['woofrontpage']['product_brand']['product_brand'],
				'selector'=>'.product-brand-desc',
				'default'=>'','priority'=>'10',
	'label'=>__('Product Brand Section Description','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'banner2_heading'=>array(
				'section'=>$sections['woofrontpage']['banner']['banner'],
				'selector'=>'.banner-text h1',
				'default'=>__('Buy One Get One Free','the-gap'),'priority'=>'58',
	'label'=>__('Product Banner2 Heading','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'banner2_desc'=>array(
				'section'=>$sections['woofrontpage']['banner']['banner'],
				'selector'=>'.banner-text p',
				'default'=>'','priority'=>'58',
	'label'=>__('Product Banner2 Descripton','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'banner2_btn_text'=>array(
				'section'=>$sections['woofrontpage']['banner']['banner'],
				'selector'=>'.banner-text button',
				'default'=>'','priority'=>'58',
	'label'=>__('Product Bannner2 Button Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'product_slider_btn_text'=>array(
				'section'=>$sections['woofrontpage']['product_slider']['product_slider'],
				'selector'=>'.product_slide_cta button',
				'default'=>'','priority'=>'11',
	'label'=>__('Feature Product Button Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	
				);
				
}


/*  
* all checkbox related settings(hide)
*/

function the_gap_get_woo_hide_checkboxes() {
  
$checkboxes = the_gap_panels_woo_sections();

return array(
  
	'hide_product_slider_text'=>array(
		'section'=>$checkboxes['woofrontpage']['product_slider']['product_slider'],
		'selector'=>'.slide .feature_product_border_style','default'=>'','priority'=>'10',
		'label'=>__('Hide Product Slider Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => ''),
		
	'hide_promo_item_text'=>array(
		'section'=>$checkboxes['woofrontpage']['promo-item']['promo-item'],
		'selector'=>'.the-gap-promo-grid .feature_blog_border_style,.product_promo_entry .feature_blog_border_style','default'=>'','priority'=>'10',
		'label'=>__('Hide Product Promo Text','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'postMessage','description'  => '')

		);
  
}

/*  
* all checkbox related settings(enable)
*/

function the_gap_get_woo_enable_checkboxes() {
  
$checkboxes = the_gap_panels_woo_sections();

return array(
	
	'enable_product_brand_section'=>array(
		'section'=>$checkboxes['woofrontpage']['product_brand']['product_brand'],
		'selector'=>'.product-brand','default'=>'','priority'=>'9',
		'label'=>__('Enable Product Brand Section','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
		
	'enable_product_slider_section'=>array(
		'section'=>$checkboxes['woofrontpage']['product_slider']['product_slider'],
		'selector'=>'.product-slider','default'=>'','priority'=>'9',
		'label'=>__('Enable Product Slider Section','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'enable_product_promo'=>array(
		'section'=>$checkboxes['woofrontpage']['promo-item']['promo-item'],
		'selector'=>'','default'=>'','priority'=>'9',
		'label'=>__('Enable Product Promo','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'enable_product_category_section'=>array(
		'section'=>$checkboxes['woofrontpage']['product_categories']['product_categories'],
		'selector'=>'.product-categories','default'=>'','priority'=>'9',
		'label'=>__('Enable Product Categories Section','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	

		
		);

}

function the_gap_get_woo_page_select() {

return $page_select = array(

	'feature-product-slide1'=>array(
				'section'=>'product_slider',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Feature Product1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'feature-product-slide2'=>array(
				'section'=>'product_slider',
				'selector'=>'','default'=>'','priority'=>'442',
					'label'=>__('Select a Page for Feature Product2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'feature-product-slide3'=>array(
				'section'=>'product_slider',
				'selector'=>'','default'=>'','priority'=>'444',
					'label'=>__('Select a Page for Feature Product3','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'feature-product-slide4'=>array(
				'section'=>'product_slider',
				'selector'=>'','default'=>'','priority'=>'446',
					'label'=>__('Select a Page for Feature Product4','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
	'feature-product-slide5'=>array(
				'section'=>'product_slider',
				'selector'=>'','default'=>'','priority'=>'448',
					'label'=>__('Select a Page for Feature Product5','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	
		
	'product-brand-slide1'=>array(
				'section'=>'product_brand',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Brand1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'product-brand-slide2'=>array(
				'section'=>'product_brand',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Brand2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
		
	'product-brand-slide3'=>array(
				'section'=>'product_brand',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Brand3','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'product-brand-slide4'=>array(
				'section'=>'product_brand',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Brand4','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	'product-brand-slide5'=>array(
				'section'=>'product_brand',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Brand5','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => ''),
	'product-brand-slide6'=>array(
				'section'=>'product_brand',
				'selector'=>'','default'=>'','priority'=>'440',
					'label'=>__('Select a Page for Brand6','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
	'transport' => 'refresh','description'  => '')
	
	
	
);

}


/*  
* all image related settings
*/
function the_gap_get_woo_images() {
	
	$images = the_gap_panels_woo_sections();
	
	return array(

		'promo-item-image1'=>array(
					'section'=>$images['woofrontpage']['promo-item']['promo-item'],
					'selector'=>'','default'=>'','priority'=>'24',
		'label'=>__('Upload Image for First Promo Item','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
		'promo-item-image2'=>array(
					'section'=>$images['woofrontpage']['promo-item']['promo-item'],
					'selector'=>'','default'=>'','priority'=>'34',
		'label'=>__('Upload Image for Second Promo Item','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
		'promo-item-image3'=>array(
					'section'=>$images['woofrontpage']['promo-item']['promo-item'],
					'selector'=>'','default'=>'','priority'=>'44',
		'label'=>__('Upload Image for Third Promo Item','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
		'woo_banner_1'=>array(
					'section'=>$images['woofrontpage']['banner']['banner'],
					'selector'=>'','default'=>'','priority'=>'44',
		'label'=>__('Upload Image for Banner-1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		
		'woo_banner_2'=>array(
					'section'=>$images['woofrontpage']['banner']['banner'],
					'selector'=>'','default'=>'','priority'=>'54',
		'label'=>__('Upload Image for Banner-2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => '')
		
	
			
	);

}

/* this function calling from the_gap_get_two_dimension_style function of core.php file 
after then the_gap_get_two_dimension_style function calling from woo-settings.php file  */
function the_gap_product_categories(){
	
	$settings = the_gap_panels_woo_sections();
	return array(
	'the_gap_category_control1'=>array(
					'section'=>$settings['woofrontpage']['product_categories']['product_categories'],
					'selector'=>'','default'=>'','priority'=>'14',
		'label'=>__('Select a Category #1','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	
	'the_gap_category_control2'=>array(
					'section'=>$settings['woofrontpage']['product_categories']['product_categories'],
					'selector'=>'','default'=>'','priority'=>'14',
		'label'=>__('Select a Category #2','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'the_gap_category_control3'=>array(
					'section'=>$settings['woofrontpage']['product_categories']['product_categories'],
					'selector'=>'','default'=>'','priority'=>'14',
		'label'=>__('Select a Category #3','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'the_gap_category_control4'=>array(
					'section'=>$settings['woofrontpage']['product_categories']['product_categories'],
					'selector'=>'','default'=>'','priority'=>'14',
		'label'=>__('Select a Category #4','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
	'the_gap_category_control5'=>array(
					'section'=>$settings['woofrontpage']['product_categories']['product_categories'],
					'selector'=>'','default'=>'','priority'=>'14',
		'label'=>__('Select a Category #5','the-gap'),'sanitize'=>'','property'=>'','unit'=>'',
		'transport' => 'refresh','description'  => ''),
		);
}



