<?php

/*
*
* Some font and other related settings and controls
*
*/
	

$controls = the_gap_get_two_dimension_style('control','font-size');
$sections = the_gap_get_two_dimension_style('section','font-size');
$labels = the_gap_get_two_dimension_style('label','font-size');
$defaults = the_gap_get_two_dimension_style('default','font-size');
$priorities = the_gap_get_two_dimension_style('priority','font-size');
$transports = the_gap_get_two_dimension_style('transport','font-size');

$i=0;

foreach ($controls as $control) {
 

 
 $wp_customize->add_setting(
        $control,
        array(
            'default'           => $defaults[$i],
            'sanitize_callback' => 'absint',
			'transport'         => $transports[$i]
        )
    );
    $wp_customize->add_control(
        $control,
        array(
            'type'        => 'text',
			'priority' => $priorities[$i],
           
			'label' =>$labels[$i],
            'section'     => $sections[$i],
            
            
        )
    );
	
$i++;
}	

$controls = the_gap_get_two_dimension_style('control','w-px');
$sections = the_gap_get_two_dimension_style('section','w-px');
$labels = the_gap_get_two_dimension_style('label','w-px');
$defaults = the_gap_get_two_dimension_style('default','w-px');
$priorities = the_gap_get_two_dimension_style('priority','w-px');
$transports = the_gap_get_two_dimension_style('transport','w-px');

$i=0;
foreach ($controls as $control) {


 
 $wp_customize->add_setting(
        $control,
        array(
            'default'           =>$defaults[$i],
            'sanitize_callback' => 'absint',
			'transport'         => $transports[$i]
        )
    );
    $wp_customize->add_control(
        $control,
        array(
            'type'        => 'text',
			'priority' => $priorities[$i],
            
			'label' =>$labels[$i],
            'section'     => $sections[$i],
            
            
        )
    );
	
$i++;
}	


$controls = the_gap_get_circle_icon_style('control','textbox');
$sections = the_gap_get_circle_icon_style('section','textbox');
$labels = the_gap_get_circle_icon_style('label','textbox');
$defaults = the_gap_get_circle_icon_style('default','textbox');
$i=0;

foreach ($controls as $control) {
	

 
 $wp_customize->add_setting(
        $control,
        array(
            'default'           => $defaults[$i],
            'sanitize_callback' => 'absint',
			'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $control,
        array(
            'type'        => 'text',
			'priority' => '280',
         
			'label' =>$labels[$i],
            'section'     => $sections[$i],
            
            
        )
    );
	
$i++;
}	
 
