<?php

/**
 * Admin Class.
 *
 * 
 * @package the-gap
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'The_Gap_Admin' ) ) :



class The_Gap_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'nl_admin_menu' ) );
		
		add_action('admin_notices', array($this, 'the_gap_activation_admin_notice'));
		
	}

	/**
	 * Add admin menu.
	 **/
	 
	public function nl_admin_menu() {
		
		add_theme_page(__('The Gap Admin Page','the-gap'),__('Started with The Gap','the-gap'), 'edit_theme_options', 
	'nl-welcome', array($this,'nl_admin_tab' ));

	}



	 
	public function nl_admin_message() {
		
		global $themePhp;

		if ( 'themes.php' == $themePhp && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'nl_getting_start' ) );
			update_option( 'nl_admin_notice_welcome', 1 );
		
		} elseif( ! get_option( 'nl_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'nl_getting_start' ) );
		}
		
	}

	public function the_gap_activation_admin_notice() {
            
		global $pagenow;
		
		if ( ! current_user_can( 'publish_posts' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'the-gap' ) ); // WPCS: xss ok.
		}
             ?>
			 <?php  
				  if (is_admin() && ('themes.php' == $pagenow) && (isset($_GET['activated']))) {  ?>
                   
                <div class="notice notice-success is-dismissible"> 
				
				   <p><?php echo esc_html__('Welcome! Thank you for choosing The Gap. Recommended plugin is elementor. In addition WooCommerce,YITH WooCommerce Quick View,YITH WooCommerce Wishlist are recommended for E-commerce users.', 'the-gap'); ?></p>
                  
					<p><a class="button button-primary" href="<?php echo esc_url(admin_url('/themes.php?page=nl-welcome')); ?>"><?php echo esc_html__('Get Started', 'the-gap'); ?></a></p>
				  
				</div>
				<?php  } ?>
                <?php
           
    }
	
	public function nl_getting_start() {
	    
		?>
		<div id="message" class="updated nl-message">
	
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=nl-welcome' ) ); ?>"><?php esc_html_e( 'Get Started with NextLevel', 'the-gap' ); ?></a>
			</p>
		</div>
		<?php
		
	}


	private function nl_first_phase() {
		$theme = wp_get_theme( get_template() );
		
		$theme_version = $theme->get( 'Version' );
		?>
		<div class="nl-theme-info">
			<h1>
				<?php esc_html_e( 'About', 'the-gap' ); ?>
				<?php echo esc_html($theme->display( 'Name' )); ?>
				<?php printf( '%s', esc_html($theme_version) ); ?>
			</h1>
	
			
			
		</div> <?php
    }


 private function nl_third_phase() { 
	
	if ( ! current_user_can( 'publish_posts' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'the-gap' ) ); // WPCS: xss ok.
	}
	
	$theme = wp_get_theme( get_template() );
		$theme_versions = $theme['Version']; ?>
		
		<h2 class="nav-tab-wrapper">
		    
			<a class="nav-tab <?php if ( isset( $_GET['page']) == 'nl_first_tab' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'nl-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html($theme->display( 'Name' )); ?>
			</a>
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'show_recommended_plugins' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'nl-welcome', 'tab' => 'show_recommended_plugins' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Recommended Plugins', 'the-gap' ); ?>
			</a>
			
		
			
		</h2>
		
		<?php
}

	
	public function nl_admin_tab() {
		
		if ( ! current_user_can( 'publish_posts' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'the-gap' ) ); // WPCS: xss ok.
		}
		
		$active_tab = empty($_GET['tab']) ? 'about' : sanitize_title( wp_unslash($_GET['tab'] ));

		
		if ( is_callable( array( $this, $active_tab ) ) ) {
			return $this->{ $active_tab }();
		}

		return $this->nl_first_tab();
	}

	/**
	 * NextLevel First Tab.
	 */
	public function nl_first_tab() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="about-wrap">

			<?php $this->nl_first_phase(); ?>
				
					<?php $this->nl_third_phase(); ?>

			<div class="nav-tab-wrapper">
				<div class="two-col">
					
					<div class="col">
						<h3><?php esc_html_e( 'Theme Demos', 'the-gap' ); ?></h3>
						<p><?php esc_html_e( '10 Demos are avaible right now.', 'the-gap' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themenextlevel.com/the-gap/' ); ?>"  target="_blank" class="button"><?php esc_html_e( 'Theme Demos', 'the-gap' ); ?></a></p>
					</div>
					
					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'the-gap' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'the-gap' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://the-gap-docs.themenextlevel.com/'); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Documentation', 'the-gap' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Theme Support', 'the-gap' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our dedicated support forum.', 'the-gap' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themenextlevel.com/support/' ); ?>"  target="_blank" class="button"><?php esc_html_e( 'Theme Support', 'the-gap' ); ?></a></p>
					</div>
					
		
				</div>
			</div>


		<?php
		$this->nl_back_to_dash_board();
		
	}


public function nl_back_to_dash_board(){ 	?>
    			<div class="return-to-dashboard nextlevel">
				
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Back to Dashboard', 'the-gap' ) : esc_html_e( 'Back to Dashboard', 'the-gap' ); ?></a>
			</div>
		</div>
    <?php
}

	/**
	 * Output the supported plugins screen.
	 */
	 
	
	public function show_recommended_plugins() {
		?>
		<div class="wrap about-wrap">

			<?php $this->nl_first_phase(); ?>
				
					<?php $this->nl_third_phase(); ?>

			<p class="about-description"><?php esc_html_e( 'This theme recommends following plugins.', 'the-gap' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Elementor Page Builder', 'the-gap' ); ?></li>
				
				<li><?php esc_html_e( 'Definitive Addons for Elementor', 'the-gap' ); ?></li>
				
			</ul>
			<p class="about-description"><?php esc_html_e( 'This theme recommends additional plugins for shop or store users.', 'the-gap' ); ?></p>
			<ul>
			
				<li><?php esc_html_e( 'WooCommerce', 'the-gap' ); ?></li>
				<li><?php esc_html_e( 'YITH WooCommerce Quick View', 'the-gap' ); ?></li>
				<li><?php esc_html_e( 'YITH WooCommerce Wishlist', 'the-gap' ); ?></li>
				
			</ul>

		</div>
		<?php
	}

	
	
}

endif;

return new The_Gap_Admin();
