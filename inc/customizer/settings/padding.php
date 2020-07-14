<?php

/*
*
* All padding and margin related settings and controls
*
*/

	$controls = the_gap_get_two_dimension_style('control','single');

	$sections = the_gap_get_two_dimension_style('section','single');

	$defaults = the_gap_get_two_dimension_style('default','single');

	$labels = the_gap_get_two_dimension_style('label','single');

	$priorities = the_gap_get_two_dimension_style('priority','single');
	
	$transports = the_gap_get_two_dimension_style('transport','single');

	
	$i=0;
	foreach ($controls  as $control) {
	
	
	
	$wp_customize->add_setting(
		$control,
		array(
			'default'           => $defaults[$i],
			'sanitize_callback' => 'absint',
			'transport'         => $transports[$i]
		)
	);

	$wp_customize->add_control($control,array(
		
			'type' => 'text',
			'section'		=> $sections[$i],
			'priority' => $priorities[$i],
			
			'label' =>$labels[$i],
		)
		
		
		
	);
$i++;
}
