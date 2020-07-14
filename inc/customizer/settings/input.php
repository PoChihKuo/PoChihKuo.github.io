<?php

/*
*
* controls & settings of all input field
*
*/

$controls = the_gap_get_two_dimension_style('control','contact');
$sections = the_gap_get_two_dimension_style('section','contact');
$labels = the_gap_get_two_dimension_style('label','contact');
$priorities = the_gap_get_two_dimension_style('priority','contact');
$defaults = the_gap_get_two_dimension_style('default','contact');
$transports = the_gap_get_two_dimension_style('transport','contact');

$i=0;
	
foreach ($controls  as $control) {
   
	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'the_gap_sanitize_text2',
			'active_callback' => 'the_gap_contact_input_active_callback',
			'default'         => $defaults[$i],
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


$controls = the_gap_get_two_dimension_style('control','icon');
$sections = the_gap_get_two_dimension_style('section','icon');
$labels = the_gap_get_two_dimension_style('label','icon');
$priorities = the_gap_get_two_dimension_style('priority','icon');
$defaults = the_gap_get_two_dimension_style('default','icon');
$transports = the_gap_get_two_dimension_style('transport','icon');


$i=0;
	
foreach ($controls  as $control) {
	
	
	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'the_gap_sanitize_choices',
			'active_callback' => 'the_gap_contact_input_active_callback',
			'default'         =>  $defaults[$i],
			'transport'         => $transports[$i]
		)
	);

	
	$wp_customize->add_control($control,array(
		
			'type' => 'select',
			'section'	=> $sections[$i],
			'priority' => $priorities[$i],
			
			'label' =>$labels[$i],
			'choices' => array(
							'user' => __('user', 'the-gap'),
						
							'mobile'=>__('mobile','the-gap'),
							'phone'=>__('phone','the-gap'),
							'phone-square'=>__('phone-square','the-gap'),
							'plane'=>__('plane','the-gap'),
							'plus-circle'=>__('plus-circle','the-gap'),
							'plus-square'=>__('plus-square','the-gap'),
							'eye'=>__('eye','the-gap'),
							'eyedropper'=>__('eyedropper','the-gap'),
							'fax'=>__('fax','the-gap'),
							'feed'=>__('feed','the-gap'),
							'female'=>__('female','the-gap'),
							'gift'=>__('gift','the-gap'),
							'home'=>__('home','the-gap'),
							'globe'=>__('globe','the-gap'),
							'minus-circle'=>__('minus-circle','the-gap'),
							'minus-square'=>__('minus-square','the-gap'),
							'mortar-board'=>__('mortar-board','the-gap'),
							'info-circle'=>__('info-circle','the-gap'),
							'mail-reply'=>__('mail-reply','the-gap'),
							'male'=>__('male','the-gap'),
							'leaf'=>__('leaf','the-gap'),
							'laptop'=>__('laptop','the-gap'),
							'key'=>__('key','the-gap'),
							'keyboard-o'=>__('keyboard-o','the-gap'),
							'institution'=>__('institution','the-gap'),
							'inbox'=>__('inbox','the-gap'),
							'image'=>__('image','the-gap'),
							'heart'=>__('heart','the-gap'),
							'heart-o'=>__('heart-o','the-gap'),
							'history'=>__('history','the-gap'),
							'headphones'=>__('headphones','the-gap'),
							'hashtag'=>__('hashtag','the-gap'),
							'handshake-o'=>__('handshake-o','the-gap'),
							'group'=>__('group','the-gap'),
							'graduation-cap'=>__('graduation-cap','the-gap'),
							'glass'=>__('glass','the-gap'),
							'gear'=>__('gear','the-gap'),
							'folder-open-o'=>__('folder-open-o','the-gap'),
							'folder-open'=>__('folder-open','the-gap'),
							'folder-o'=>__('folder-o','the-gap'),
							'folder-o'=>__('folder','the-gap'),
							'flag'=>__('flag','the-gap'),
							'flash'=>__('flash','the-gap'),
							'fire'=>__('fire','the-gap'),
							'film'=>__('film','the-gap'),
							'file-video-o'=>__('file-video-o','the-gap'),
							'file-pdf-o'=>__('file-pdf-o','the-gap'),
							'arrow-circle-o-dow'=>__('arrow-circle-o-dow','the-gap'),
							'arrow-circle-o-left'=>__('arrow-circle-o-left','the-gap'),
							'arrow-circle-o-right'=>__('arrow-circle-o-right','the-gap'),
							'arrow-circle-down'=>__('arrow-circle-down','the-gap'),
							'arrow-circle-left'=>__('arrow-circle-left','the-gap'),
							'arrow-circle-right'=>__('arrow-circle-right','the-gap'),
							'arrow-circle-up'=>__('arrow-circle-up','the-gap'),
							'arrow-circle-o-up'=>__('arrow-circle-o-up','the-gap'),
							'arrow-right'=>__('arrow-right','the-gap'),
							'arrow-up'=>__('arrow-up','the-gap'),
							'arrow'=>__('arrow','the-gap'),
							
							''=>__('none','the-gap')
							
						),
		)
		
		
		
	);
$i++;
}



$controls = the_gap_get_two_dimension_style('control','social-url');
$sections = the_gap_get_two_dimension_style('section','social-url');
$labels = the_gap_get_two_dimension_style('label','social-url');
$priorities = the_gap_get_two_dimension_style('priority','social-url');
$defaults = the_gap_get_two_dimension_style('default','social-url');
$transports = the_gap_get_two_dimension_style('transport','social-url');

$i=0;
	
	foreach ($controls  as $control) {
	
	
	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'esc_url_raw',
			'active_callback' =>'the_gap_social_input_active_callback',
			'transport'  => 'postMessage'
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


$controls = the_gap_get_two_dimension_style('control','contact-url');
$sections = the_gap_get_two_dimension_style('section','contact-url');
$labels = the_gap_get_two_dimension_style('label','contact-url');
$priorities = the_gap_get_two_dimension_style('priority','contact-url');
$defaults = the_gap_get_two_dimension_style('default','contact-url');
$transports = the_gap_get_two_dimension_style('transport','contact-url');

$i=0;
	
	foreach ($controls  as $control) {
	
	
	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'esc_url_raw',
			'active_callback' =>'the_gap_contact_input_active_callback',
			'transport'  => 'postMessage'
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


$controls = the_gap_get_two_dimension_style('control','social');
$sections = the_gap_get_two_dimension_style('section','social');
$labels = the_gap_get_two_dimension_style('label','social');
$priorities = the_gap_get_two_dimension_style('priority','social');
$defaults = the_gap_get_two_dimension_style('default','social');
$transports = the_gap_get_two_dimension_style('transport','social');




		$social_links_icons = array(
		''=>__('none','the-gap'),
		'behance'=>__('behance','the-gap'),'codepen'=>__('codepen','the-gap'),'deviantart'=>__('deviantart','the-gap'),'digg'=>__('digg','the-gap'),
		'dribbble'=>__('dribbble','the-gap'),'dropbox'=>__('dropbox','the-gap'),'facebook'=>__('facebook','the-gap'),'flickr'=>__('flickr','the-gap'),
		'foursquare'=>__('foursquare','the-gap'),'google-plus'=>__('google-plus','the-gap'),'github'=>__('github','the-gap'),'instagram'=>__('instagram','the-gap'),
		'linkedin'=>__('linkedin','the-gap'),'envelope-o'=>__('envelope-o','the-gap'),'medium'=>__('medium','the-gap'),'pinterest-p'=>__('pinterest-p','the-gap'),
		'get-pocket'=>__('get-pocket','the-gap'),'reddit-alien'=>__('reddit-alien','the-gap'),'skype'=>__('skype','the-gap'),
		'skype'=>__('skype','the-gap'),'slideshare'=>__('slideshare','the-gap'),'snapchat-ghost'=>__('snapchat-ghost','the-gap'),'soundcloud'=>__('soundcloud','the-gap'),
		'spotify'=>__('spotify','the-gap'),'stumbleupon'=>__('stumbleupon','the-gap'),'tumblr'=>__('tumblr','the-gap'),'twitter'=>__('twitter','the-gap'),'vimeo'=>__('vimeo','the-gap'),'vine'=>__('vine','the-gap'),
		'wordpress'=>__('wordpress','the-gap'),'wordpress'=>__('wordpress','the-gap'),'yelp'=>__('yelp','the-gap'),
		'youtube'=>__('youtube','the-gap'),'none'=>__('none','the-gap'));
		
		

	$i=0;
	
	foreach ($controls  as $control) {

	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' => 'the_gap_sanitize_choices',
			'active_callback' =>'the_gap_social_input_active_callback',
			'default'         => '',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control($control,array(
		
			'type' => 'select',
			'section'		=> $sections[$i],
			'priority' => $priorities[$i],
			
			'label' =>$labels[$i],
			'choices' =>$social_links_icons,
			
		)
		
		
		
	);
$i++;
}
	

// footer info and read more

$controls = the_gap_get_two_dimension_style('control','read-more');	
$sections = the_gap_get_two_dimension_style('section','read-more');	
$labels = the_gap_get_two_dimension_style('label','read-more');
$priorities = the_gap_get_two_dimension_style('priority','read-more');
$defaults = the_gap_get_two_dimension_style('default','read-more');
$transports = the_gap_get_two_dimension_style('transport','read-more');
	
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
	
	
// blog post query

$controls = the_gap_get_two_dimension_style('control','query');	
$sections = the_gap_get_two_dimension_style('section','query');	
$labels = the_gap_get_two_dimension_style('label','query');
$description = the_gap_get_two_dimension_style('description','query');

$priorities = the_gap_get_two_dimension_style('priority','query');
$defaults = the_gap_get_two_dimension_style('default','query');
$transports = the_gap_get_two_dimension_style('transport','query');
	
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
			'section'=> $sections[$i],
			'priority' => $priorities[$i],
			'description' =>$description[$i],
			'label' =>$labels[$i],
		)
		
		
		
	);
	
$i++;


}
	
	
	// feature url, button url

$controls = the_gap_get_two_dimension_style('control','more-url');	
$sections = the_gap_get_two_dimension_style('section','more-url');	
$labels = the_gap_get_two_dimension_style('label','more-url');

$priorities = the_gap_get_two_dimension_style('priority','more-url');
$defaults = the_gap_get_two_dimension_style('default','more-url');

	
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
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	




