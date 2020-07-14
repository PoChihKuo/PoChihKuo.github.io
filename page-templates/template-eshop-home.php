<?php
/**
 * Template Name: Shop FronPage
 *
 * 
 * @package The Gap
 * 
 */

get_header();

 ?>
 
 <?php 
 
  if(class_exists('woocommerce')){
  $styles ='';
  $styles = the_gap_woo_template_header_margin();
  
  ?>

<div id="inner-content" class="inner-content <?php echo esc_attr($styles); ?>">
	<?php 
	if ( class_exists('The_Gap_Pro')) { 
	$banner1_position = get_theme_mod('banner1_position','img-top');
	if ($banner1_position == 'img-top') {
	the_gap_banner1_on_frontpage();
	
	} 
	}else {
	the_gap_banner1_on_frontpage();	
	}
	
	$enable_promo_item = get_theme_mod('enable_product_promo','0');
	$enable_product_slider = get_theme_mod('enable_product_slider_section','0');
	
	if ($enable_product_slider == '1' || $enable_promo_item == '1'){
	?>
	
	<div class="product-promo-area">
	<?php

		if ($enable_product_slider == '1'){
			
			the_gap_woo_feature_slider();
		}
	
		if ($enable_promo_item == '1'){
			
			if ($enable_product_slider == '1'){
			the_gap_product_promo_items_vertical();
			}
			if ($enable_product_slider != '1'){
			the_gap_product_promo_items();
			}
		
		}

	?>
	
	</div> 
	<?php } ?>
	<!-- primary area of index.php -->

	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
		
		<div class="woo-front-page">
		
		<?php 
		
		$enable_product_category = get_theme_mod('enable_product_category_section');
		
		if ($enable_product_category == '1'){
		the_gap_frontpage_product_categories();
		}
		
		
		if ( class_exists('The_Gap_Pro')) { 
			$banner1_position = get_theme_mod('banner1_position','img-top');
   
			if ($banner1_position == 'img-middle') { 
				the_gap_banner1_on_frontpage();
			} 
			
		}	
			if (is_active_sidebar( 'nl_woocommerce_front1' ) ) {
				dynamic_sidebar( 'nl_woocommerce_front1' ); 
					
			}
			
			if ( class_exists('The_Gap_Pro')) { 
			$banner2_position = get_theme_mod('banner2_position','img-top');
				if ($banner2_position == 'img-top') {
					the_gap_banner2_on_shop();
				}  
			}else {
				the_gap_banner2_on_shop();
			}
					
					
					if (is_active_sidebar( 'nl_woocommerce_front2' ) ) {
						 dynamic_sidebar( 'nl_woocommerce_front2' ); 
					
					}
			
			?>
		
		</div>	
		
		<?php
		if ( class_exists('The_Gap_Pro')) { 
		$banner2_position = get_theme_mod('banner2_position','img-top');
		if ($banner2_position == 'img-middle') { 
		the_gap_banner2_on_shop();
		}
		}
		?>
			<div class="woo-footer-top clear">
				<?php if ( is_active_sidebar( 'woo-footer-1') ) :  ?>
					<div class="woo-footer one">
						
							<?php dynamic_sidebar('woo-footer-1');?>
				
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'woo-footer-2') ) :  ?>
					<div class="woo-footer two">
			
							<?php dynamic_sidebar('woo-footer-2');?>
					
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'woo-footer-3') ) :  ?>
					<div class="woo-footer three">
			
						
							<?php dynamic_sidebar('woo-footer-3');?>
						
						
					</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'woo-footer-4') ) :  ?>
					<div class="woo-footer four">
			
						
							<?php dynamic_sidebar('woo-footer-4');?>
					
						
					</div>
						<?php endif; ?>
			</div>	
			
		<?php the_gap_woo_brand_items();?>
			
		</main><!-- main -->
		
	</div><!-- primary -->

</div> <!-- inner content end -->
  <?php } ?>
<?php get_footer(); ?>
