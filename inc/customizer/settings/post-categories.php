<?php

	
	//featured
	$wp_customize->add_setting(
        'fpage_featured_category',
        array(
            'default'           =>'',
			
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'refresh'
        )
    );
	
   
   $wp_customize->add_control(
		'fpage_featured_category',
        array(
            'type'      => 'select',
           
			'label' => __( 'Select a Category for Feature Slider', 'the-gap' ),
			'priority' => 12,
            'section'   => 'feature-item',
            'choices'  => the_gap_post_categories(),
        )
    );	
	
	//popular
	$wp_customize->add_setting(
        'popular_category',
        array(
            'default'           =>'',
			
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'refresh'
        )
    );
	
   
   $wp_customize->add_control(
		'popular_category',
        array(
            'type'      => 'select',
           
			'label' => __( 'Select a Category for Popular', 'the-gap' ),
			'priority' => 14,
            'section'   => 'popular-post',
            'choices'  => the_gap_post_categories(),
        )
    );	
	
	
	
	//index.php
	
	$wp_customize->add_setting(
        'the_gap_index_category_control',
        array(
            'default'           =>'',
			
            'sanitize_callback' => 'the_gap_sanitize_choices',
            'transport'         => 'refresh'
        )
    );
	
   
   $wp_customize->add_control(
		'the_gap_index_category_control',
        array(
            'type'      => 'select',
           
			'label' => __( 'Select a Category', 'the-gap' ),
			'priority' => 346,
            'section'   => 'post-general',
            'choices'  => the_gap_post_categories(),
        )
    );	
	
	
	
	

