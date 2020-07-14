<?php
 
/*
*
* All checkbox related settings and controls
*
*/
  $controls = the_gap_get_two_dimension_style('control','hide');
  $sections = the_gap_get_two_dimension_style('section','hide');
  $priorities = the_gap_get_two_dimension_style('priority','hide');
  $defaults = the_gap_get_two_dimension_style('default','hide');
  $transports = the_gap_get_two_dimension_style('transport','hide');
  $labels = the_gap_get_two_dimension_style('label','hide');

 
  $label='';
  $i=0;
 foreach ($controls as $control) {
	 
	 
	
	  
   $wp_customize->add_setting($control,array(
		'default' => $defaults[$i],
		'sanitize_callback' => 'the_gap_sanitize_checkbox',
		'transport'         => $transports[$i]
	));
	
	$wp_customize->add_control($control,array(
		'type' => 'checkbox',
		'priority' => $priorities[$i],
		
		'label' =>$labels[$i],
		'section' => $sections[$i]
	));
	
	$i++;
	
}
 
 //replace-standard-header-as-side-header
 
 
 
  $controls = the_gap_get_two_dimension_style('control','check');
  $sections = the_gap_get_two_dimension_style('section','check');
  $priorities = the_gap_get_two_dimension_style('priority','check');
  $defaults = the_gap_get_two_dimension_style('default','check');
  $transports = the_gap_get_two_dimension_style('transport','check');
   $labels = the_gap_get_two_dimension_style('label','check');
 
  $label='';
  $i=0;
 foreach ($controls as $control) {
	 
	 

	  
   $wp_customize->add_setting($control,array(
		
		'default' => '',
		'sanitize_callback' => 'the_gap_sanitize_checkbox',
		'transport'         => $transports[$i]
		
	));
	
	$wp_customize->add_control($control,array(
		
		'type' => 'checkbox',
		'priority' => $priorities[$i],
	
		'label' =>$labels[$i],

		'section' => $sections[$i]
		
	));
	
	$i++;
	
}
 
 