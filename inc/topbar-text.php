<?php

/**
 * Topbar Text Template
 *
 * @author  Kudrat E Khuda
 * 
 * @package the-gap
 *
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function the_gap_topbar_text_template() {

		$input1 = get_theme_mod('topbar-contact-input1','');
		$input2 = get_theme_mod('topbar-contact-input2','');
		$input3 = get_theme_mod('topbar-contact-input3','');
		
		
		$icon1 = get_theme_mod('topbar-contact-icon1','');
		$icon2 = get_theme_mod('topbar-contact-icon2','');
		$icon3 = get_theme_mod('topbar-contact-icon3','');
		
		
		$input1_url = get_theme_mod('topbar-text-url1');
		$input2_url = get_theme_mod('topbar-text-url2');
		$input3_url = get_theme_mod('topbar-text-url2');
		
		
	
		
	
   ?>
<div class="contacts-body">

		    <div id="item1">
			<a href="<?php echo esc_url($input1_url) ?>">
				<span id="contact1" class="fa fa-<?php echo esc_attr($icon1) ?>"></span> 
				<span class="one"><?php echo esc_html($input1);?></span></a>
			 </div>
			 
			 <div id="item2">
			 <a href="<?php echo esc_url($input2_url) ?>">
				<span id="contact2"  class="fa fa-<?php echo esc_attr($icon2) ?>"></span>
				<span class="two"> <?php  echo esc_html($input2); ?></span>
			</a>
		    </div>
			
			<div id="item3">
			 <a href="<?php echo esc_url($input3_url) ?>">
				<span id="contact3"  class="fa fa-<?php echo esc_attr($icon3) ?>"></span>
				<span class="three"> <?php  echo esc_html($input3); ?></span>
			</a>
		    </div>
		  

</div> 

    <?php

}




