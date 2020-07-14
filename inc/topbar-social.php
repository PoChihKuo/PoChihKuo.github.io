<?php
/**
 * topbar social functions
 * 
 * @package the-gap
 * 
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function the_gap_topbar_social_template() {
	
	
		$social_number = get_theme_mod('social-number','4');

		$icon1 = get_theme_mod('topbar-social-icon1','');
		$url1 = get_theme_mod('topbar-social-url1');
		
		$icon2 = get_theme_mod('topbar-social-icon2','');
		$url2 = get_theme_mod('topbar-social-url2');
		
		$icon3 = get_theme_mod('topbar-social-icon3','');
		$url3 = get_theme_mod('topbar-social-url3');
		
		$icon4 = get_theme_mod('topbar-social-icon4','');
		$url4 = get_theme_mod('topbar-social-url4');
		
		$icon5 = get_theme_mod('topbar-social-icon5','');
		$url5 = get_theme_mod('topbar-social-url5');
		
		$icon6 = get_theme_mod('topbar-social-icon6','');
		$url6 = get_theme_mod('topbar-social-url6');
		
		$icon7 = get_theme_mod('topbar-social-icon7','');
		$url7 = get_theme_mod('topbar-social-url7');
		
		$icon8 = get_theme_mod('topbar-social-icon8','');
		$url8 = get_theme_mod('topbar-social-url8');
		
		$target = get_theme_mod('social-item-target','_blank');
		
	
		if ($social_number == 2) {
		    $url3 = "";
		   $url4 = "";
		    $url5 = "";
		      $url6 = "";
		   $url7 = "";
		    $url8 = "";
		     $icon3 = "";
		   $icon4 = "";
		    $icon5 = "";
		    $icon6 = "";
		   $icon7 = "";
		    $icon8 = "";
		}
		
		if ($social_number == 3) {
		   $url4 = "";
		    $url5 = "";
		      $url6 = "";
		   $url7 = "";
		    $url8 = "";
		   $icon4 = "";
		    $icon5 = ""; 
		    $icon6 = "";
		   $icon7 = "";
		    $icon8 = "";
		}
		
    	if ($social_number == 4) {
		   
		    $url5 = "";
		    $url6 = "";
		   $url7 = "";
		    $url8 = "";
		    $icon5 = "";
		    $icon6 = "";
		   $icon7 = "";
		    $icon8 = "";
		  
		}
		
		if ($social_number == 5) {
		    $url6 = "";
		    $url7 = "";
		    $url8 = "";
		    $icon6 = "";
		    $icon7 = "";
		    $icon8 = "";
		}
		
		if ($social_number == 6) {
		   $url7 = "";
		    $url8 = "";
		   $icon7 = "";
		    $icon8 = "";
		}
		
		if ($social_number == 7) {
		    $url8 = "";
		    $icon8 = "";
		}
		
		
   
   ?>

	<div id="social-id" class="social-icon-topbar">
		
	
		<div class="icon" id="ha1">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url1); ?>">
			<i  class="social1 fa fa-<?php echo esc_attr($icon1); ?>"></i></a>
		
		</div>
		

		<div class="icon" id="ha2">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url2); ?>">
			<i class="social2 fa fa-<?php echo esc_attr($icon2); ?>"></i></a>
		
		</div>
	
		<div class="icon" id="ha3">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url3); ?>">
			<i  class="social3 fa fa-<?php echo esc_attr($icon3); ?>"></i></a>
		
		</div>
		
		<div class="icon" id="ha4">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url4); ?>">
			<i  class="social4 fa fa-<?php echo esc_attr($icon4); ?>"></i></a>
		
		</div>
		
		<div class="icon" id="ha5">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url5); ?>">
			<i class="social5 fa fa-<?php echo esc_attr($icon5); ?>"></i></a>
		
		</div>
		
		<div class="icon" id="ha6">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url6); ?>">
			<i class="social6 fa fa-<?php echo esc_attr($icon6); ?>"></i></a>
		
		</div>
		
		<div class="icon" id="ha7">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url7); ?>">
			<i class="social7 fa fa-<?php echo esc_attr($icon7); ?>"></i></a>
		
		</div>
	
		<div class="icon" id="ha8">
		
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($url8); ?>">
			<i class="social8 fa fa-<?php echo esc_attr($icon8); ?>"></i></a>
		
		</div>
	
	</div>

    <?php

}


