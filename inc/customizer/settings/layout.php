<?php

/*
*
* All alignment related settings and controls
*
*/


	$controls = the_gap_get_two_dimension_style('control','three');
	$sections = the_gap_get_two_dimension_style('section','three');
	$labels = the_gap_get_two_dimension_style('label','three');
	$priorities = the_gap_get_two_dimension_style('priority','three');
	$defaults = the_gap_get_two_dimension_style('default','three');


	$i=0;
   	
	foreach ($controls as $control) {

		

		$wp_customize->add_setting(
        $control,
        array(
            'default'           => $defaults[$i],
			
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'postMessage'
        )
    );
	
   
   $wp_customize->add_control(
		$control,
        array(
            'type'      => 'radio',
           
			'label' =>$labels[$i],
			'priority' => $priorities[$i],
            'section'   => $sections[$i],
            	'choices'  => array(
				'left' => __("Left", 'the-gap' ),
				'center'  => __("Center", 'the-gap' ),
				'right'=> __( "Right", 'the-gap' )
				
				
			),
        )
    );	
	$i++;
}

// CONTENT ALIGNMENT

	$controls = the_gap_get_two_dimension_style('control','four');
	$sections = the_gap_get_two_dimension_style('section','four');
	$labels = the_gap_get_two_dimension_style('label','four');
	$priorities = the_gap_get_two_dimension_style('priority','four');
	$defaults = the_gap_get_two_dimension_style('default','four');
	
	$i=0;
   	
	foreach ($controls as $control) {
		
	
		
		$wp_customize->add_setting(
        $control,
        array(
            'default'           => $defaults[$i],
			
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'postMessage'
        )
    );
	
   
   $wp_customize->add_control(
		$control,
        array(
            'type'      => 'radio',
       
			'label' =>$labels[$i],
			'priority' => $priorities[$i],
            'section'   => $sections[$i],
            	'choices'  => array(
				'left' => __("Left", 'the-gap' ),
				'center'  => __("Center", 'the-gap' ),
				'right'=> __( "Right", 'the-gap' ),
				'justify'=> __( "Justify", 'the-gap' )
				
				
			),
        )
    );	
	$i++;
}



// SIDEBAR ALIGNMENT

	$sections = the_gap_sidebar_layout();
		
	
   	foreach ($sections as $section=>$label) {
		
		
		
		$wp_customize->add_setting(
        $section.'-option',
        array(
            'default'           => 'rightbar',
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'refresh'
        )
    );
	
   
   $wp_customize->add_control(
        $section.'-option',
        array(
            'type'      => 'radio',
            'priority' => 340,
			'label' =>$label,
            'section'   => 'sidebar-layout',
            	'choices'  => array(
				'rightbar' => __( "Rightbar", 'the-gap' ),
				'leftbar'  => __( "Leftbar", 'the-gap' ),
				'nosidebar'=> __( "No Sidebar", 'the-gap' )
				
			),
        )
    );	
	
}


$wp_customize->add_setting(
       'header-media-type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'refresh'
        )
    );
	
   
   $wp_customize->add_control(
        'header-media-type',
        array(
            'type'      => 'radio',
            'label'     => __('Header Media Type' , 'the-gap'),
			'priority'   => '9',
            'section'   => 'header_image',
            	'choices'  => array(
				'none' => __( "None", 'the-gap' ),
				'image'  => __( "Image", 'the-gap' ),
				'video'=> __( "Video", 'the-gap' ),
				'slide'=> __( "Slide", 'the-gap' )
				
			),
        )
);	

//slide
	
	$controls = the_gap_get_two_dimension_style('control','page');
	$sections = the_gap_get_two_dimension_style('section','page');
	$labels = the_gap_get_two_dimension_style('label','page');
	$priorities = the_gap_get_two_dimension_style('priority','page');
	$defaults = the_gap_get_two_dimension_style('default','page');


	$i=0;
   	
	foreach ($controls as $control) {
	

	$wp_customize->add_setting(
		$control,
		array(
			'default' => '',
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh'
		)
	);

	$wp_customize->add_control($control,array(
		
			'type' => 'dropdown-pages',
			'section' => $sections[$i],
			'priority' =>$priorities[$i],
			'label'	=>$labels[$i],
		)

	);	

	$i++;
}


