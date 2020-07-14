<?php

/*
* contextual control
* package: The Gap
*/

		
	$site_titles = array('blogname','site-title-text-color','site-title-text-color-opacity','site-title-color-heading','site-title-font-heading','site-title-font-size');
	$site_title = the_gap_site_title_topbar_control();
	$the_gap_title_only = $site_title['title-only'];
	
	$logoOnly = array('logo-heading','custom_logo');
	
	
	foreach ($the_gap_title_only  as $control){
		
		$wp_customize->get_control($control)->active_callback = 'the_gap_site_title_text_active_callback';
	}
	
	
	foreach ($logoOnly as $logocontrol){
		$wp_customize->get_control($logocontrol)->active_callback = 'the_gap_site_logo_active_callback';
	}	
		
		
	$media_controls = the_gap_header_media_control();
			

	foreach ($media_controls['control-all'] as $media_control){
		$wp_customize->get_control($media_control)->active_callback = 'the_gap_header_media_active_callback';
	}

	/*  Topbar Social  */

	$controls = the_gap_get_two_dimension_style('control','social');
	
	foreach ($controls as $control){
		$wp_customize->get_control( $control)->active_callback = 'the_gap_social_input_active_callback';
	}
	
	$controls = the_gap_get_two_dimension_style('control','social-url');
	
	foreach ($controls as $control){
		$wp_customize->get_control( $control)->active_callback = 'the_gap_social_input_active_callback';
	}
	/*  Topbar Social End  */
	

	
	/*  Topbar Contact  */

	$controls = the_gap_get_two_dimension_style('control','icon');
	
	foreach ($controls as $control){
		$wp_customize->get_control( $control)->active_callback = 'the_gap_contact_input_active_callback';
	}
	
	$controls = the_gap_get_two_dimension_style('control','contact');
	
	foreach ($controls as $control){
		$wp_customize->get_control( $control)->active_callback = 'the_gap_contact_input_active_callback';
	}
	
	$controls = the_gap_get_two_dimension_style('control','contact-url');
	
	foreach ($controls as $control){
		$wp_customize->get_control( $control)->active_callback = 'the_gap_contact_input_active_callback';
	}
	
	/*  Topbar Contact End */
	
	$backgrounds = the_gap_background_control();
	
	foreach ($backgrounds   as $background){
		$wp_customize->get_control( $background)->active_callback = 'the_gap_background_active_callback';
	}


	$site_layouts = the_gap_site_background_padding_margin();
	foreach ($site_layouts   as $site_layout){
		$wp_customize->get_control( $site_layout)->active_callback = 'the_gap_box_layout_active_callback';
	}
	
	$topbarControls = array('topbar-layout','topbar-color-heading','topbar-background-color','topbar-background-color-opacity','topbar-border-heading',
	'topbar-bottom-border-color','topbar-bottom-border-color-opacity','topbar-bottom-border-width','topbar-bottom-border-style');
	
	
	foreach ($topbarControls as $topbarControl){
		$wp_customize->get_control( $topbarControl)->active_callback = 'the_gap_topbar_active_callback';
	
	}
	
	
	$wp_customize->get_control('header_ovl_style')->active_callback = 'the_gap_ovl_style_active_callback';
	

