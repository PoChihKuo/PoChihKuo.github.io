<?php
/**
 * The header for theme The Gap
 * Author: Kudrat E Khuda
 * 
 * @package the-gap
 * 
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
} ?>


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-gap' ); ?></a>

	
  <header id="nl-header" class="nl-header" role="banner">	
	
	<!--  Standard Header start from here. First topbar, top of the site header  -->
		
	<div id="main-header" class="main-header">	 
		<div class="topbar">
		    <div class="inner-topbar">
				<div class="topbar-text">
				<!-- contact or text section of topbar -->
					
				<?php the_gap_topbar_text_template();?>
					
				</div> 
				<div class="topbar-social">
				<!-- social media section of topbar -->
					<?php the_gap_topbar_social_template(); ?>
				</div> <!-- end .container -->
		
			</div> <!-- end inner-top-bar -->
		</div> <!-- end top-bar -->
		
		
		<?php 
		
		$media_position = get_theme_mod('header_media_position','top');
		
		if ($media_position == 'top'){
			$media_pages = get_theme_mod('show_media_pages','all');
			
			if (($media_pages == 'both')&&(is_front_page() || is_home())){
				the_gap_header_media_position();
			}
	
			if ($media_pages == 'fpage' && is_front_page()){
				the_gap_header_media_position();
			}
	
			if ($media_pages == 'lpage' && is_home()){
				if (!is_front_page()){
				the_gap_header_media_position();
				}
			}
			if ($media_pages == 'all'){
				the_gap_header_media_position();
			}
		}
		
		?>
	
		<div  class="header-margin">	
			<div id="site-header" class="site-header clear">		
				<div  class="inner-header">	
		
			
					
	
	<!-- Main site-header starts from here -->
	
			<div class="branding">
		
				<div class="nl-logo-title">
				
					<?php  
				$title_type = get_theme_mod('site-title-type','one');
				
				?>
				
				
	<div  class="site-logo <?php echo esc_attr($title_type);?>">             

	<?php the_custom_logo();?>
	
    </div>
	<?php 
	
	if ( is_front_page() && is_home() ) : ?>
				<div  class="site-title <?php echo esc_attr($title_type);?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			<?php else : ?>
				<div class="site-title <?php echo esc_attr($title_type);?>" id="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?></a></div>
			<?php
	endif; 

					?>
				 
				 </div>
			

	
				</div>
				
				<?php
				
				$site_header_pattern = get_theme_mod('site-header-alignment','right');
				
				if ( $site_header_pattern == 'woo1') {
					if ( class_exists('woocommerce')) {  ?>
	
						<div class="header-cart-container">
							<?php 
							if ( function_exists( 'YITH_WCWL' ) ) {
							the_gap_woo_wishlist();
							}
							?>
							<div class="header-cart-inner-container">
							<?php the_gap_header_cart_icon();?>
							
							<?php
							the_widget( 'WC_Widget_Cart', '' );
							?>
							</div>
						</div>
						<?php
						
					
					 the_widget( 'WC_Widget_Product_Search', 'title=' );
					
					
					 
					}	
				}
			?>
		<!-- Toggle Side Menu on right side starts from here -->

			<div class="toggle-menu-container">

					<!-- To display toggle Side Menu icon -->
					<div class="display-menu-toggle"></div>			
			
					<div class="right-side-menu">
					
					<?php 
					if (is_active_sidebar( 'nl_toggle_sidebar' ) ) {
						 dynamic_sidebar( 'nl_toggle_sidebar' ); 
					
					}?>
						<!-- To hide toggle Side Menu icon -->
							<div class="hide-menu-toggle">			
								<span class="lines">
								&times;

								</span>
							</div>
						
						
					</div><!-- end .side-menu -->
			
			</div><!-- End Toggle side menu container -->

				<!-- Main Navigation/Main Menu Container starts form here -->
		<div class="site-navigation-container">

				<!-- search on header starts from here  -->
			
			<!-- Main Navigation/Main Menu starts form here -->
			<button class="menu-btn" aria-expanded="false"></button>
					<nav id="main-navigation" class="main-menu" role="navigation">
					<button class="hide-mob-menu">			
								<span class="lines">&times;</span>
					</button>		
							
				
					
							<?php if (has_nav_menu('primary')) {
								 ?>
					
								<!-- To display Main Navigation/Main Menu on desktop -->
								<?php wp_nav_menu(array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul id="primary-menu" class="menu main-navi">%3$s</ul>',
								));
					} else { ?>
								
								<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
					} ?>
					
					<button class="hide-mob-menu-btm">			
						<span class="lines">&times;</span>
					</button>

					
					<div class="search-container">
				
						<!-- To display search box -->
						<div class="nl-search-box">
		<?php
$site_header_pattern = get_theme_mod('site-header-alignment','right');
if ($site_header_pattern == 'left' || $site_header_pattern == 'right' ||
$site_header_pattern == 'inline' ||$site_header_pattern == 'center' ||
$site_header_pattern == 'both-left' ){
	get_search_form();
		
}	?>				
								
		<button class="hide-search-box">		
				<span class="cross">&times;</span>
		</button>
						
						
						</div>
					</div> <!-- end search container  -->

					</nav> <!-- end #site-navigation -->
					
					
					</div> <!-- end site navigation container -->
					
				<?php 
				$header_align = get_theme_mod('site-header-alignment','right');
				if($header_align == 'center'){ ?>	
					<div class="topbar-social">
				<!-- social media section of topbar -->
					<?php the_gap_topbar_social_template(); ?>
				</div> <!-- end .container -->
				<?php } ?>	
				
		<?php
				
		if($header_align == 'sameline'){ 	
				
			the_gap_header_icon_part();?>
			<div class="search-container same">
				
				<!-- To display search box -->
				<div class="nl-search-box">
		
				<?php
				
					get_search_form();
				?>				
								
				<button class="hide-search-box">		
					<span class="cross">&times;</span>
				</button>
						
						
				</div>
			</div> <!-- end search container  -->
					
				<?php
		 } ?>
				 
				<?php
				if($header_align == 'woo2'){ 
					if ( class_exists('woocommerce')) { 
				the_gap_woo_header_icon_part();?>	
				
				<div class="search-container woo">
				
						<!-- To display search box -->
						<div class="nl-search-box">
		
		<?php
		$site_header_pattern = get_theme_mod('site-header-alignment','right');
		if ($site_header_pattern == 'woo2') {
			the_widget( 'WC_Widget_Product_Search', 'title=' );	
		}?>				
								
		<button class="hide-search-box">		
				<span class="cross">&times;</span>
		</button>
						
						
						</div>
					</div> <!-- end search container  -->
					
						<?php
				} }?>
				</div>  <!-- end inner header -->
				
		
			
			</div><!-- site header  -->
		</div> <!-- header margin  -->
	</div><!-- main header  -->
	
	<?php 
		$media_position = get_theme_mod('header_media_position','top');
		if ($media_position == 'bottom'){
			$media_pages = get_theme_mod('show_media_pages','all');
			if (($media_pages == 'both')&&(is_front_page() || is_home())){
				the_gap_header_media_position();
			}
	
			if ($media_pages == 'fpage' && is_front_page()){
				the_gap_header_media_position();
			}
	
			if ($media_pages == 'lpage' && is_home()){
				if (!is_front_page()){
				the_gap_header_media_position();
				}
			}
			if ($media_pages == 'all'){
				the_gap_header_media_position();
			}
		}
		?>
	
</header>

<div id="content" class="site-content">
    
