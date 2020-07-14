<?php
/**
 * This template to displays woocommerce page
 *
 * 
 * @package the-gap
 * 
 */

get_header(); ?>
<div class="page-content-header">
    <div class="inner-content"></div>	
</div>

<div id="inner-content" class="inner-content">

	<div id="primary" class="content-area">
	

		<main id="main" class="site-main" role="main">
			
			
			<?php woocommerce_content(); ?>
			
			
		</main><!-- main -->
	</div><!-- primary -->

<?php 
	if(class_exists('woocommerce')){
	if ( is_active_sidebar( 'nl_woocommerce_sidebar') ) : ?>
	
<aside id="secondary" class="sidebar woo">
    
	
	
  <?php    dynamic_sidebar( 'nl_woocommerce_sidebar' );  ?>
   
	
	
</aside>
<?php
endif; 
	}
	?>

	
</div>
<?php get_footer(); ?>