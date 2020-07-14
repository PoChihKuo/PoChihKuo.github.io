<?php
	
/*
*
* All product categories
*
*/
$controls = the_gap_get_two_dimension_style('control','product-cat');	

$labels = the_gap_get_two_dimension_style('label','product-cat');

	
	$priorities = 14;
	 
	$i=0;
	
foreach ($controls  as $control) {
	
	$wp_customize->add_setting(
        $control,
        array(
            'default'           => '',
			
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'refresh'
        )
    );
	
   
   $wp_customize->add_control(
		$control,
        array(
            'type'  => 'select',
           
			'label' =>$labels[$i],
			'priority' =>14,
            'section'   =>'product_categories',
            'choices'  => the_gap_product_categories_lists(),
        )
    );	
	
$i++;


}

	

	
// footer info and read more

$controls = the_gap_get_two_dimension_style('control','woo-read-more');	
$sections = the_gap_get_two_dimension_style('section','woo-read-more');	
$labels = the_gap_get_two_dimension_style('label','woo-read-more');
$priorities = the_gap_get_two_dimension_style('priority','woo-read-more');
$defaults = the_gap_get_two_dimension_style('default','woo-read-more');
$transports = the_gap_get_two_dimension_style('transport','woo-read-more');
	
$i=0;
	
foreach ($controls  as $control) {


	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'the_gap_sanitize_text2',
			'default'   => $defaults[$i],
			'transport'         => 'refresh'
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

$controls = the_gap_get_two_dimension_style('control','woo-more-url');	
$sections = the_gap_get_two_dimension_style('section','woo-more-url');	
$labels = the_gap_get_two_dimension_style('label','woo-more-url');

$priorities = the_gap_get_two_dimension_style('priority','woo-more-url');
$defaults = the_gap_get_two_dimension_style('default','woo-more-url');

	
$i=0;
	
foreach ($controls  as $control) {
	


	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'   => $defaults[$i],
			'transport'         => 'postMessage'
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



$controls = the_gap_get_two_dimension_style('control','woo-hide');
  $sections = the_gap_get_two_dimension_style('section','woo-hide');
  $priorities = the_gap_get_two_dimension_style('priority','woo-hide');
  $defaults = the_gap_get_two_dimension_style('default','woo-hide');
  $transports = the_gap_get_two_dimension_style('transport','woo-hide');
  $labels = the_gap_get_two_dimension_style('label','woo-hide');

 
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
 

  $controls = the_gap_get_two_dimension_style('control','woo-enable');
  $sections = the_gap_get_two_dimension_style('section','woo-enable');
  $priorities = the_gap_get_two_dimension_style('priority','woo-enable');
  $defaults = the_gap_get_two_dimension_style('default','woo-enable');
  $transports = the_gap_get_two_dimension_style('transport','woo-enable');
  $labels = the_gap_get_two_dimension_style('label','woo-enable');
 
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
 
	
// image
	
$controls = the_gap_get_two_dimension_style('control','woo-image');
$sections = the_gap_get_two_dimension_style('section','woo-image');
$priorities = the_gap_get_two_dimension_style('priority','woo-image');
$transports = the_gap_get_two_dimension_style('transport','woo-image');
$callback = the_gap_get_two_dimension_style('callback','woo-image');
$labels = the_gap_get_two_dimension_style('label','woo-image');

$i=0;
	 
foreach ($controls as $control) {

		$wp_customize->add_setting(
		$control,
		array(
			'default'			=> '',
			'transport'         => $transports[$i],
			'sanitize_callback' => 'esc_url_raw',
			'active_callback' => $callback[$i]
		)
	);
 
		$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					$control,
					array(
						'label' =>$labels[$i],
						'priority'=>$priorities[$i],
						'section' => $sections[$i],
						
				)
			)
		);
	
$i++;

	}
	
	
	
	//slide
	
	$controls = the_gap_get_two_dimension_style('control','woo-page');
	$sections = the_gap_get_two_dimension_style('section','woo-page');
	$labels = the_gap_get_two_dimension_style('label','woo-page');
	$priorities = the_gap_get_two_dimension_style('priority','woo-page');
	$defaults = the_gap_get_two_dimension_style('default','woo-page');


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
			'priority' => $priorities[$i],
			'label'	=>$labels[$i],
		)

	);	

	$i++;
}

