<?php

/*
*
* All color related settings and controls
*
*/

$controls =  the_gap_get_color_style('control');
$sections =  the_gap_get_color_style('section');
$labels =  the_gap_get_color_style('label');
$defaults =  the_gap_get_color_style('default');
$priorities =  the_gap_get_color_style('priority');
$transports =  the_gap_get_color_style('transport');
$i=0;


foreach($controls as $control) {



$wp_customize->add_setting(
		$control,
		array(
			
			'default'           => $defaults[$i],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => $transports[$i]
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		$control,
		array(
			
			'label' =>$labels[$i],
			'priority'          => $priorities[$i],
			'section'     => $sections[$i],
			
		)
	) );
	
	$wp_customize->add_setting(
		$control.'-opacity',
		array(
			
			'default'           => '1',
			'sanitize_callback' => 'the_gap_sanitize_float',
			'transport'         => $transports[$i]
		)
	);

	$wp_customize->add_control( new The_Gap_Customizer_Range_Value_Control(
		$wp_customize,
		$control.'-opacity',
		array(
			'label'       => __( 'Opacity:' , 'the-gap' ),
			'priority'    => $priorities[$i],
			'type'     => 'range-value',
			'section'     => $sections[$i],
			'input_attrs' => array(
			'min'    => 0.00,
			'max'    => 1.00,
			'step'   => 0.02,
			
		),
			
		)
	) );
	
	$i++;
}


$controls = the_gap_get_border_width_style_radius('control','border');
$sections = the_gap_get_border_width_style_radius('section','border');
$defaults = the_gap_get_border_width_style_radius('default','border');
$labels = the_gap_get_border_width_style_radius('label','border');
$priorities = the_gap_get_border_width_style_radius('priority','border');

$i=0;
$priority =  251;

foreach($controls as $control) {

$wp_customize->add_setting(
		$control,
		array(
			
			'default'           => $defaults[$i],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		$control,
		array(
			'label'       => __( 'Border Color' , 'the-gap' ),
			'priority'          => $priority,
			'section'     => $sections[$i],
			
		)
	) );
	
	$wp_customize->add_setting(
		$control.'-opacity',
		array(
			
			'default'           => '1',
			'sanitize_callback' => 'the_gap_sanitize_float',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new The_Gap_Customizer_Range_Value_Control(
		$wp_customize,
		$control.'-opacity',
		array(
			'label'       => __( 'Opacity:' , 'the-gap' ),
			'priority'    => $priority,
			'type'     => 'range-value',
			'section'     => $sections[$i],
			'input_attrs' => array(
			'min'    => 0.00,
			'max'    => 1.00,
			'step'   => 0.02,
			
		),
			
		)
	) );
	
	

	
	$i++;
}


	
$controls = the_gap_get_border_width_style_radius('control', 'top-border-color');
$sections = the_gap_get_border_width_style_radius('section', 'top-border-color');
$defaults = the_gap_get_border_width_style_radius('default','top-border-color');
$labels = the_gap_get_border_width_style_radius('label','top-border-color');
$priorities = the_gap_get_border_width_style_radius('priority','top-border-color');

$i = 0;
foreach ($controls as $control ) {
	
	
	
		$wp_customize->add_setting(
		$control,
		array(
			'default'           => $defaults[$i],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		$control,
		array(
			'label' =>__( 'Top Border Color', 'the-gap'),
			'priority'          => 252,
			'section'     => $sections[$i],
			
		)
	) );
	
	$wp_customize->add_setting(
		$control.'-opacity',
		array(
			
			'default'           => '1',
			'sanitize_callback' => 'the_gap_sanitize_float',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new The_Gap_Customizer_Range_Value_Control(
		$wp_customize,
		$control.'-opacity',
		array(
			'label'       => __( 'Opacity:' , 'the-gap' ),
			'priority'    => 252,
			'type'     => 'range-value',
			'section'     => $sections[$i],
			'input_attrs' => array(
			'min'    => 0.00,
			'max'    => 1.00,
			'step'   => 0.02,
			
		),
			
		)
	) );
	
	
	
$i++;
}	

$controls = the_gap_get_border_width_style_radius('control','top-border-width');
$sections = the_gap_get_border_width_style_radius('section','top-border-width');
$defaults = the_gap_get_border_width_style_radius('default','top-border-width');
$labels = the_gap_get_border_width_style_radius('label','top-border-width');
$priorities = the_gap_get_border_width_style_radius('priority','top-border-width');

$i=0;
foreach($controls as $control) {


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
			'priority' => $priorities[$i],
            'label'       => __( 'Top Border Width', 'the-gap'),
            'section'     => $sections[$i],
            
            
        )
    );
	
	$i++;
	

}

$controls = the_gap_get_border_width_style_radius('control','top-border-style');
$sections = the_gap_get_border_width_style_radius('section','top-border-style');
$defaults = the_gap_get_border_width_style_radius('default','top-border-style');
$labels = the_gap_get_border_width_style_radius('label','top-border-style');
$priorities = the_gap_get_border_width_style_radius('priority','top-border-style');

$i=0;
foreach($controls as $control) {


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
            'type'        => 'select',
			'priority' =>$priorities[$i],
            'label'       => __( 'Top Border Style', 'the-gap'),
            'section'     => $sections[$i],
			'choices'     => array(
					'solid'  => __( "Solid", 'the-gap' ),
					'dashed'   => __( "Dashed", 'the-gap' ),
					'dotted' => __( "Dotted", 'the-gap' ),
					'double' => __( "Double", 'the-gap' ),
					'groove' => __( "Groove", 'the-gap' ),
					'none' => __( "None", 'the-gap' ),
				),
            
            
        )
    );
	

	$i++;
	

}	


$controls = the_gap_get_border_width_style_radius('control', 'bottom-border-color');
$sections = the_gap_get_border_width_style_radius('section', 'bottom-border-color');
$defaults = the_gap_get_border_width_style_radius('default','bottom-border-color');
$labels = the_gap_get_border_width_style_radius('label','bottom-border-color');
$priorities = the_gap_get_border_width_style_radius('priority','bottom-border-color');

$i = 0;
foreach ($controls as $control ) {
	
	
	
	$wp_customize->add_setting(
		$control,
		array(
			'default'           => $defaults[$i],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		$control,
		array(
			'label' =>$labels[$i],
			'priority'          => 252,
			'section'     => $sections[$i],
			
		)
	) );
	
	$wp_customize->add_setting(
		$control.'-opacity',
		array(
			
			'default'           => '1',
			'sanitize_callback' => 'the_gap_sanitize_float',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new The_Gap_Customizer_Range_Value_Control(
		$wp_customize,
		$control.'-opacity',
		array(
			'label'       => __( 'Opacity:' , 'the-gap' ),
			'priority'    => 252,
			'type'     => 'range-value',
			'section'     => $sections[$i],
			'input_attrs' => array(
			'min'    => 0.00,
			'max'    => 1.00,
			'step'   => 0.02,
			
		),
			
		)
	) );
	
	
$i++;
}


$controls = the_gap_get_border_width_style_radius('control','bottom-border-width');
$sections = the_gap_get_border_width_style_radius('section','bottom-border-width');
$defaults = the_gap_get_border_width_style_radius('default','bottom-border-width');
$labels = the_gap_get_border_width_style_radius('label','bottom-border-width');
$priorities = the_gap_get_border_width_style_radius('priority','bottom-border-width');

$i=0;
foreach($controls as $control) {


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
			'priority' => $priorities[$i],
            'label'       => __( 'Border Width', 'the-gap'),
            'section'     => $sections[$i],
            
            
        )
    );
	
	$i++;
	

}

$controls = the_gap_get_border_width_style_radius('control','bottom-border-style');
$sections = the_gap_get_border_width_style_radius('section','bottom-border-style');
$defaults = the_gap_get_border_width_style_radius('default','bottom-border-style');
$labels = the_gap_get_border_width_style_radius('label','bottom-border-style');
$priorities = the_gap_get_border_width_style_radius('priority','bottom-border-style');

$i=0;
foreach($controls as $control) {


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
            'type'        => 'select',
			'priority' =>$priorities[$i],
            'label'       => __( 'Border Style', 'the-gap'),
            'section'     => $sections[$i],
			'choices'     => array(
					'solid'     => __( "Solid", 'the-gap' ),
					'dashed'   => __( "Dashed", 'the-gap' ),
					'dotted' => __( "Dotted", 'the-gap' ),
					'double' => __( "Double", 'the-gap' ),
					'groove' => __( "Groove", 'the-gap' ),
					'none' => __( "None", 'the-gap' ),
				),
            
            
        )
    );
	

	$i++;
	

}	


$controls = the_gap_get_border_width_style_radius('control','width');
$sections = the_gap_get_border_width_style_radius('section','width');
$defaults = the_gap_get_border_width_style_radius('default','width');
$labels = the_gap_get_border_width_style_radius('label','width');
$priorities = the_gap_get_border_width_style_radius('priority','width');

$i=0;
foreach($controls as $control) {


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
			'priority' => $priorities[$i],
            'label'       => __( 'Border Width', 'the-gap'),
            'section'     => $sections[$i],
            
            
        )
    );
	
	$i++;
	

}	

$controls = the_gap_get_border_width_style_radius('control','style');
$sections = the_gap_get_border_width_style_radius('section','style');
$defaults = the_gap_get_border_width_style_radius('default','style');
$labels = the_gap_get_border_width_style_radius('label','style');
$priorities = the_gap_get_border_width_style_radius('priority','style');

$i=0;
foreach($controls as $control) {


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
            'type'        => 'select',
			'priority' =>$priorities[$i],
            'label'       => __( 'Border Style', 'the-gap'),
            'section'     => $sections[$i],
			'choices'     => array(
					'solid'     => __( "Solid", 'the-gap' ),
					'dashed'   => __( "Dashed", 'the-gap' ),
					'dotted' => __( "Doted", 'the-gap' ),
					'double' => __( "Double", 'the-gap' ),
					'groove' => __( "Groove", 'the-gap' ),
					'none' => __( "None", 'the-gap' ),
				),
            
            
        )
    );
	

	$i++;
	

}	


$controls = the_gap_get_border_width_style_radius('control','radius');
$sections = the_gap_get_border_width_style_radius('section','radius');
$defaults = the_gap_get_border_width_style_radius('default','radius');
$labels = the_gap_get_border_width_style_radius('label','radius');
$priorities = the_gap_get_border_width_style_radius('priority','radius');

$i=0;
foreach($controls as $control) {


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
			'priority' => $priorities[$i],
            'label'       => __( 'Border Radius', 'the-gap'),
            'section'     => $sections[$i],
            
            
        )
    );
	
	$i++;
	

}	



$controls = the_gap_get_border_width_style_radius('control','two-border-color');
$sections = the_gap_get_border_width_style_radius('section','two-border-color');
$defaults = the_gap_get_border_width_style_radius('default','two-border-color');
$labels = the_gap_get_border_width_style_radius('label','two-border-color');
$priorities = the_gap_get_border_width_style_radius('priority','two-border-color');

$i=0;
$priority =  251;

foreach($controls as $control) {

	$wp_customize->add_setting(
		$control,
		array(
			
			'default'           =>$defaults[$i],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		$control,
		array(
			'label'       => __( 'Border Color' , 'the-gap' ),
			'priority'          => $priority,
			'section'     => $sections[$i],
			
		)
	) );
	
	$wp_customize->add_setting(
		$control.'-opacity',
		array(
			
			'default'           => '1',
			'sanitize_callback' => 'the_gap_sanitize_float',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new The_Gap_Customizer_Range_Value_Control(
		$wp_customize,
		$control.'-opacity',
		array(
			'label'       => __( 'Opacity:' , 'the-gap' ),
			'priority'    => $priority,
			'type'     => 'range-value',
			'section'     => $sections[$i],
			'input_attrs' => array(
			'min'    => 0.00,
			'max'    => 1.00,
			'step'   => 0.02,
			
		),
			
		)
	) );
	
	$i++;
}


$controls = the_gap_get_border_width_style_radius('control','two-border-width');
$sections = the_gap_get_border_width_style_radius('section','two-border-width');
$defaults = the_gap_get_border_width_style_radius('default','two-border-width');
$labels = the_gap_get_border_width_style_radius('label','two-border-width');
$priorities = the_gap_get_border_width_style_radius('priority','two-border-width');

$i=0;
foreach($controls as $control) {

	
	
	$wp_customize->add_setting(
        $control,
        array(
            'default'           =>$defaults[$i],
            'sanitize_callback' => 'absint',
			'transport'         => 'postMessage'
        )
    );
    
	$wp_customize->add_control(
        $control,
        array(
            'type'        => 'text',
			'priority' => $priorities[$i],
            'label'       => __( 'Border Width', 'the-gap'),
            'section'     => $sections[$i],
            
            
        )
    );
	
	$i++;
	

}	

$controls = the_gap_get_border_width_style_radius('control','two-border-style');
$sections = the_gap_get_border_width_style_radius('section','two-border-style');
$defaults = the_gap_get_border_width_style_radius('default','two-border-style');
$labels = the_gap_get_border_width_style_radius('label','two-border-style');
$priorities = the_gap_get_border_width_style_radius('priority','two-border-style');

$i=0;
foreach($controls as $control) {


	$wp_customize->add_setting(
        $control,
        array(
            'default'           =>$defaults[$i],
            'sanitize_callback' => 'the_gap_sanitize_choices',
			'transport'         => 'postMessage'
        )
    );
    
	$wp_customize->add_control(
        $control,
        array(
            'type'        => 'select',
			'priority' =>$priorities[$i],
            'label'       => __( 'Border Style', 'the-gap'),
            'section'     => $sections[$i],
			'choices'     => array(
					'solid'     => __( "Solid", 'the-gap' ),
					'dashed'   => __( "Dashed", 'the-gap' ),
					'dotted' => __( "Doted", 'the-gap' ),
					'double' => __( "Double", 'the-gap' ),
					'groove' => __( "Groove", 'the-gap' ),
					'none' => __( "None", 'the-gap' ),
				),
            
            
        )
    );
	

	$i++;
	

}	


/*  Sticky Header Background Color  */
$headerbgColor = get_theme_mod('site-header-background-color','#ffffff');
$wp_customize->add_setting(
		'sticky-header-background-color',
		array(
			
			'default'           => $headerbgColor,
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sticky-header-background-color',
		array(
			'label'       => __( 'Sticky Header Background Color' , 'the-gap' ),
			'priority'          => 10,
			'section'     => 'site-header',
			
		)
	) );
	
	$wp_customize->add_setting(
		'sticky-header-background-color-opacity',
		array(
			
			'default'           => '1',
			'sanitize_callback' => 'the_gap_sanitize_float',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new The_Gap_Customizer_Range_Value_Control(
		$wp_customize,
		'sticky-header-background-color-opacity',
		array(
			'label'       => __( 'Opacity:', 'the-gap' ),
			'priority'    =>  10,
			'type'     => 'range-value',
			'section'     => 'site-header',
			'input_attrs' => array(
			'min'    => 0.00,
			'max'    => 1.00,
			'step'   => 0.02,
			
		),
			
		)
	) );
	
	
	//accent color
	$wp_customize->add_setting(
		'site-accent-color',
		array(
			
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'site-accent-color',
		array(
			'label'       => __( 'Accent Color' , 'the-gap' ),
			'priority'          => 1,
			'section'     => 'general',
			
		)
	) );
	

