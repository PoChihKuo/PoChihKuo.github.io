<?php

function the_gap_selective_refresh( $wp_customize ) {
	
	
	
	$wp_customize->selective_refresh->add_partial( 'site-title-color-heading', array(
    'selector' => '.site-title a',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'site-header-color-heading', array(
    'selector' => '.header-margin',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'logo-heading', array(
    'selector' => '.site-logo',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	

	$wp_customize->selective_refresh->add_partial('social-input-heading', array(
    'selector' => '.topbar-social',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial('contact-input-heading', array(
    'selector' => '.topbar-text',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial('topbar-color-heading', array(
    'selector' => '.topbar',
	
    'render_callback' => 'nl_customize_partial_dummy',
	) );

	
	$wp_customize->selective_refresh->add_partial('header-media-overlay-heading', array(
    'selector' => '.nl-media-ovr-title,.nl-slide-ovr-title',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	

	
	
	$wp_customize->selective_refresh->add_partial('single-post-meta-border-heading', array(
    'selector' => '.single-meta',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial('single-general-color-heading', array(
    'selector' => '.nav-next,.nav-previous',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial('feature-slide-detail-heading', array(
    'selector' => '.the-gap-feature-grid,.featured-area,.flexsliders.feature-slider.feature-carousel',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	
	$wp_customize->selective_refresh->add_partial('main-menu-top-level-color-heading', array(
    'selector' => '.main-menu',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	

	$wp_customize->selective_refresh->add_partial('footer-widget-color-heading', array(
    'selector' => '.footer-widgets',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	
	$wp_customize->selective_refresh->add_partial('site-header-color-heading', array(
    'selector' => '.site-header',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	

	$wp_customize->selective_refresh->add_partial('post-meta-border-heading', array(
    'selector' => '.entry-meta',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	
	
	$wp_customize->selective_refresh->add_partial('single-show/hide-elements-heading', array(
    'selector' => '.single-header .post-categories,.post-author-box,.related-single',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	
	
	$wp_customize->selective_refresh->add_partial('show/hide-elements-heading', array(
    'selector' => '.entry-header .post-categories',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial('scroll-up-settings-heading', array(
    'selector' => '#scroll-up',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	$wp_customize->selective_refresh->add_partial('footer-info-padding-heading', array(
    'selector' => '.site-credit',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
	
	
	$wp_customize->selective_refresh->add_partial('popular-post-heading', array(
    'selector' => '.popular-post',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	

	
	$wp_customize->selective_refresh->add_partial('buttons-color-heading', array(
    'selector' => 'a.read-more,.more-link',
    'render_callback' => 'nl_customize_partial_dummy',
	) );
	
		
}
add_action( 'customize_register', 'the_gap_selective_refresh' );