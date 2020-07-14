<?php

/*
*
* All height width related settings and controls
*
*/

$controls = the_gap_get_two_dimension_style('control','width-height');
$sections = the_gap_get_two_dimension_style('section','width-height');
$priorities = the_gap_get_two_dimension_style('priority','width-height');
$defaults = the_gap_get_two_dimension_style('default','width-height');
$transports = the_gap_get_two_dimension_style('transport','width-height');
$labels = the_gap_get_two_dimension_style('label','width-height');

$i=0;
	
foreach ($controls as $control) {


	
	
	$wp_customize->add_setting(
        $control,
        array(
            'default' => $defaults[$i],
            'sanitize_callback' => 'absint',
			'transport'         => $transports[$i]
        )
	);
	
	$wp_customize->add_control(
        $control,
        array(
          
			'label' =>$labels[$i],
            'section' => $sections[$i],
            'type' => 'text',
            'priority' =>$priorities[$i],

			
        )
);

$i++;
}


$screen_controls = the_gap_get_two_dimension_style('control','screen');
$screen_sections = the_gap_get_two_dimension_style('section','screen');
$screen_defaults = the_gap_get_two_dimension_style('default','screen');
$priorities = the_gap_get_two_dimension_style('priority','screen');
$transports = the_gap_get_two_dimension_style('transport','screen');
$labels = the_gap_get_two_dimension_style('label','screen');


$i=0;
	
foreach ($screen_controls as $control) {


	
	$wp_customize->add_setting(
        $control,
        array(
            'default' => $screen_defaults[$i],
            'sanitize_callback' => 'absint',
			'transport'         => $transports[$i]
        )
	);
	
	$wp_customize->add_control(
        $control,
        array(
            
			'label' =>$labels[$i],
            'section' => $screen_sections[$i],
            'type' => 'text',
		
            'priority' =>$priorities[$i],

			
        )
);

$i++;
}


