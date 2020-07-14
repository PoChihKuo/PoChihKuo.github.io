<?php

/**
 
 * Author: khuda
 * Author url:themenextlevel.com
 * @package : The Gap
 *
 **/

 
class The_Gap_framework {

    
    protected $the_gap_theme;
    

    /* Constructor for the class */

	function __construct() {

        add_action('after_setup_theme', array(&$this, 'the_gap_initialize_theme'), 11);
		
		add_action('after_setup_theme', array(&$this, 'the_gap_content_width'), 0);
		
	
	}


/**
     * Define theme directories
*/
	 



function the_gap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the_gap_content_width', 960 );
}


/**
     * Load all the Javascript files for the theme
     *
*/

function the_gap_enqueue_scripts() {

 
	wp_enqueue_script( 'the_gap_skip_link_focus_fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'typed.js',  get_template_directory_uri() . '/js/typed.js', array('jquery'),'', true );
	wp_enqueue_script( 'the_gap_few_handle', get_template_directory_uri() . '/js/main.js', array('jquery'),'', true );
	
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '2.4.0', true );
		wp_enqueue_script( 'minimer-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ),'', false );


}


/**
     * Load all the CSS files for the theme
     
*/

function the_gap_enqueue_styles() {
	
	wp_register_style( 'the_gap_style', get_stylesheet_uri() );
	wp_enqueue_style('the_gap_style');
	
	wp_enqueue_style('the_gap_customize_css');
	
	wp_enqueue_style( 'the-gap-google-fonts', $this->the_gap_google_fonts_url(), array(), null );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), true );
	wp_enqueue_style( 'slicks-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), true );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', '4.6.3' );
	
	
}

/*
theme initial functions	
*/

function the_gap_initialize_theme() {

		
		$this->the_gap_initialize();
        $this->the_gap_add_actions_filters();

		$this->the_gap_setup();
}


/*
theme setup function	
*/

function the_gap_setup() {

		/**
		 * Custom background support.
		 */
		 
		
	add_theme_support( 'custom-background');
	
	
	add_theme_support( 'custom-header');
	add_theme_support( 'automatic-feed-links' );
	add_editor_style( get_template_directory().'editor-style.css' );
	add_theme_support( 'title-tag' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

		// Add support for default block styles.
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'the-gap-featured-image', 2000, 1200, true );
	add_image_size( 'the-gap-medium-extra', 400, 350, true );

	add_image_size( 'the-gap-thumbnail-avatar', 100, 100, true );

	add_theme_support( 'html5', array(
		
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'audio',
		'gallery'
	) );


	//Logo support
	add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => false,
			'flex-height' => false,
	) );




	
load_theme_textdomain( 'the-gap', get_template_directory() . '/languages' );
	
	

}
    
/*
initialize script, style, navigation and widgets
*/

function the_gap_add_actions_filters() {

        /* Load all JS required by the theme */
        add_action('wp_enqueue_scripts', array(&$this, 'the_gap_enqueue_scripts'));
        add_action('wp_enqueue_scripts', array(&$this, 'the_gap_enqueue_styles'));
  
        /* Register menus. */
        add_action('init', array(&$this, 'the_gap_register_menus'), 11);

        /* Register widgets. */
        add_action('widgets_init', array(&$this, 'the_gap_widgets_init'), 11);

}

	/*
	
	Registering widgets
	
	*/
 function the_gap_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'the-gap' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'the-gap' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	register_sidebar(array(
			'name' => __('Toggle Sidebar', 'the-gap'),
			'id' => 'nl_toggle_sidebar',
			'description' =>__( 'Add widgets here.', 'the-gap'),
			
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
		
	if(class_exists('woocommerce')){
		
		
		
		register_sidebar(array(
			'name' => __('Front Page Widget Area1', 'the-gap'),
			'id' => 'nl_woocommerce_front1',
			'description' =>__( 'Add one or more widgets here.', 'the-gap' ),
			'before_widget' => '<div id="A%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name' => __('Front Page Widget Area2', 'the-gap'),
			'id' => 'nl_woocommerce_front2',
			'description' =>__( 'Add one or more widgets here.', 'the-gap' ),
			'before_widget' => '<div id="A%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	
	register_sidebar(array(
			'name' => __('WooCommerce Sidebar', 'the-gap'),
			'id' => 'nl_woocommerce_sidebar',
			'description' => __('Add WooCommerce Widgets Only', 'the-gap'),
			'before_widget' => '<div id="A%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		
	for ($i=1; $i<5; $i++) {
		
		register_sidebar( array(
			'name'          => __( 'Front Page Template Column- ', 'the-gap' ) . $i,
			'id'            => 'woo-footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
	
	}
	
	$footer_widgets = get_theme_mod('footer-widget-areas', '4');
	for ($i=1; $i<=$footer_widgets; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'the-gap' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
 }

function the_gap_google_fonts_url() {
	$fonts_url = '';
	
	$subsets   = 'latin,latin-ext';

	$fonts = the_gap_google_fonts_array();

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}


	return esc_url_raw( $fonts_url );
}
 

    /**
     * Registering navigation for the theme. 

     */
	 
    function the_gap_register_menus() {
        
		register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'the-gap' ),
		
		'footer'  => esc_html__( 'Footer', 'the-gap' ),	
		
		
		
		) );
    
	}
	
	
	function the_gap_initialize() {

            add_action('tgmpa_register', array(&$this, 'the_gap_register_recommended_plugins'));
			//add_action('tgmpa_register', array(&$this, 'the_gap_register_recommended_woo_plugins'));

    }

        /**
         * Register the required plugins for this theme.
         *
         **/
        function the_gap_register_recommended_plugins() {

			$plugins[] = array(
					'name'               => __('Elementor','the-gap'),
					'slug'               => 'elementor',
					'required'           => false,
			);
			
			$plugins[] = array(
					'name'               => __('Definitive Addons for Elementor','the-gap'),
					'slug'               => 'definitive-addons-for-elementor',
					'required'           => false,
			);
			
			
			
			tgmpa( $plugins);

            
		
        }
		
      
}
