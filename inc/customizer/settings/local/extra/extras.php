<?php

	$accent = the_gap_get_accent_color_mod();
	$accentRgb	= the_gap_hex2rgba($accent, 0.3);
	
	$wp_customize->get_control( 'blogname'  )->section ='site-title';
	$wp_customize->get_control( 'blogname'  )->label   = __('Site Title Input','the-gap');
	$wp_customize->get_control( 'blogname'  )->priority  = 50;
	$wp_customize->get_control( 'blogdescription'  )->priority  = 73;
	$wp_customize->get_control( 'blogdescription'  )->label  =__('Blog Description Input','the-gap');
	$wp_customize->get_control( 'blogdescription'  )->section   = 'header_image';
	$wp_customize->get_setting( 'blogdescription'  )->default =__('Just another WordPress site','the-gap');
	
	
	$wp_customize->get_control( 'custom_logo'  )->section   = 'site-title';
	$wp_customize->get_control( 'custom_logo'  )->priority   = '119';
	$wp_customize->get_control( 'site_icon')->section ='site-header';
	$wp_customize->get_control( 'background_color')->section ='background_image';
	$wp_customize->get_section( 'background_image')->panel ='layout';
	$wp_customize->get_control( 'background_preset')->priority  = 251;
	$wp_customize->get_control( 'background_position')->priority  = 251;
	$wp_customize->get_control( 'background_size')->priority  = 251;
	$wp_customize->get_control( 'background_repeat')->priority  = 251;
	$wp_customize->get_control( 'background_attachment')->priority  = 251;
	$wp_customize->get_control( 'post-meta-border-color')->priority  = 526;
	$wp_customize->get_control( 'single-meta-border-color')->priority  = 526;
	$wp_customize->get_control( 'single-meta-border-color-opacity')->priority  = 526;
	
	$wp_customize->get_section( 'background_image')->title ='Site Background';
	$wp_customize->get_control( 'background_color')->priority  = 248;
	$wp_customize->get_control( 'background_image')->priority  = 48;
	
	
	$wp_customize->get_section( 'site-background')->panel  = 'layout';
	$wp_customize->get_section( 'header_image')->panel  = 'site-header';
	$wp_customize->get_section( 'header_image')->description  = '';
	$wp_customize->get_section('sidebar-layout')->panel  = 'footer';
	
	$wp_customize->get_control( 'scroll-up-icon-size')->priority  = 80;

	$wp_customize->get_control( 'enable-related-post-home' )->description =__('You have to select "One column" or "One Column-inline" from "Number of Column & Layout" option before enable this setting.','the-gap');

	$wp_customize->get_control('site_icon')->priority = 501;
	$wp_customize->get_control( 'footer-widget-item-top-border-color')->priority = '290';
	$wp_customize->get_control( 'footer-widget-item-top-border-color-opacity')->priority = '290';
	$wp_customize->get_setting('page-layout-option')->default = 'nosidebar';
	$wp_customize->get_setting('enable-sticky-header')->default = '1';
	$wp_customize->get_setting('enable-excerpt')->default = '1';
	$wp_customize->get_setting('main-menu-top-level-hover-background-color-opacity')->default = '0';
	$wp_customize->get_setting('main-menu-top-level-background-color-opacity')->default = '0';
	$wp_customize->get_setting('overlay-background-color-opacity')->default = '0.4';
	$wp_customize->get_control( 'post-meta-border-color-opacity')->priority  = 527;
	$wp_customize->get_control( 'site-content-link-color')->description  = __('Post/page content and block button link color','the-gap');
	
	
	$wp_customize->get_setting('hide-post-comments')->default = '1';
	$wp_customize->get_setting('hide-post-publication-date')->default = '1';
	$wp_customize->get_setting('hide-comments')->default = '1';
	$wp_customize->get_setting('hide-author')->default = '1';
	$wp_customize->get_setting('hide-topbar')->default = '1';
	
	
	
	
	
	$wp_customize->get_setting('post_section_title')->transport = 'refresh';
	
	$wp_customize->get_section( 'background_image')->description =__( 'Follow documentation - https://the-gap-docs.themenextlevel.com/background-color-box-layout/', 'the-gap' );
	$wp_customize->get_control( 'page-selection-for-slides-heading' )->description =__( 'Follow documentation - https://the-gap-docs.themenextlevel.com/header-media-slider/', 'the-gap' );
	
	
	
	
	

	