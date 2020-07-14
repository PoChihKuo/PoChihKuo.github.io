<?php

/*
* Creating all panels
*/



$panels = the_gap_woo_panels();

$priority = 8;


foreach ($panels as $panel_id=>$panel_label) {
	
		 $wp_customize->add_panel($panel_id, array(
        'priority'       => $priority++,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
		'title' =>$panel_label,
        
    ) ); 
	
	
}


$controls = the_gap_panels_woo_sections_style('control');
$sections = the_gap_panels_woo_sections_style('section');
$labels = the_gap_panels_woo_sections_style('label');
$panells = the_gap_panels_woo_sections_style('panel');
$sec_desc = the_gap_panels_woo_sections_style('description');


$i = 0;
foreach ($controls as $control) {

	$wp_customize->add_section($control, array(
	  'priority' => $priority++,
	  'description' =>$sec_desc[$i],
	  'title' =>$labels[$i],
	  'panel' => $panells[$i],
	  
	));
	
	$i++;
}


