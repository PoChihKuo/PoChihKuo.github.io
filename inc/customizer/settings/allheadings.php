<?php


/*
*
* All heading related settings and controls
*
*/

	$i=0;
	
	$controls = the_gap_get_heading_styles('control','free');
	$sections = the_gap_get_heading_styles('section','free');
	$priorities = the_gap_get_heading_styles('priority','free');
	
	$titles = the_gap_get_heading_styles('title','free');
	
	foreach ($controls as $control) {
	
	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'the_gap_sanitize_text2'
		)
	);

	$wp_customize->add_control( new The_Gap_Headings_Control(
		$wp_customize,
		$control,
		array(
			
			'section' => $sections[$i],
			'priority' => $priorities[$i],
			
			'label' =>$titles[$i],
		)
		
		)
		
	);
$i++;
}



