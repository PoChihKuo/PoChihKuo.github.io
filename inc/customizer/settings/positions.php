<?php 

/*
*
* All option related settings and controls
*
*/

$controls = the_gap_layout_options_param_style('control','main');
$sections = the_gap_layout_options_param_style('section','main');
$labels = the_gap_layout_options_param_style('label','main');
$priorities = the_gap_layout_options_param_style('priority','main');
$defaults = the_gap_layout_options_param_style('default','main');
$transports = the_gap_layout_options_param_style('transport','main');

$control_choices = the_gap_layout_options_param_style('choice','main');
$control_types = the_gap_layout_options_param_style('type','main');

$i=0;
	
foreach ($controls  as $control) {
   
	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' =>'the_gap_sanitize_choices',
			
			'default'         => $defaults[$i],
			'transport'         => $transports[$i],
		)
	);

	$wp_customize->add_control($control,array(
		
			'type' =>$control_types[$i],
			'section' => $sections[$i],
			'priority' => $priorities[$i],
		
			'label' =>$labels[$i],
			'choices'   => $control_choices[$i]
		)
		
		
		
	);
$i++;
}



