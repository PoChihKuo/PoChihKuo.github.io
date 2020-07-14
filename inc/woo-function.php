<?php
/**
 * woocommerce Related Functions.
 *
 * @package the-gap
 * @since   1.0.8
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
* To display product promotional link with image
*
*/

function the_gap_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'the_gap_woocommerce_setup' );



function the_gap_product_promo_items(){

	$style = '';

	?>

	<div class="nl_grid_row the-gap-promo-grid col_gap_30">
		
		<?php for($i=1; $i<4; $i++) {?>
		
			<?php 	
			$promo_item_url = get_theme_mod('promo-item-url'.$i); 
			$promo_item_image = get_theme_mod('promo-item-image'.$i);
		
		if ($promo_item_image){
			?>
			<div class="product_promo_entry no_of_col_3 col_no_<?php echo esc_attr($i);  ?> col_padd_margin">
			
				<div class="feature_blog_border_style <?php echo esc_attr( $style );  ?> clear">
			
							<?php 	$ft_post_title = get_theme_mod('promo_feature_title'.$i);?>
						<a href="<?php echo esc_url($promo_item_url); ?>" target="_self" >		 
						<h6 class="feature-page-title"><?php echo esc_html($ft_post_title); ?></h6>
						</a>
				</div> 
				
				<div class="feature-media">
				
					<a href="<?php echo esc_url($promo_item_url); ?>" target="_self" >
						<img alt="<?php esc_attr_e('Promo item image','the-gap'); ?>" src="<?php echo esc_url($promo_item_image); ?>" />
					</a>
					<span class="feature-corner-end"></span>
				</div>
			
			</div> 
			<?php } ?>
		<?php } ?>
	</div>
	
	<?php 
}

function the_gap_product_promo_items_vertical(){

	$style = '';

	?>

	<div class="nl_product_promo_items">
	
		<?php for($i=1; $i<4; $i++) {?>
		
			<?php 	
			$promo_item_url = get_theme_mod('promo-item-url'.$i); 
			$promo_item_image = get_theme_mod('promo-item-image'.$i);
		
		if ($promo_item_image){
			?>
			<div class="product_promo_entry">
			
				<div class="feature_blog_border_style <?php echo esc_attr( $style );  ?> clear">
			
					<?php 	$ft_post_title = get_theme_mod('promo_feature_title'.$i);?>
						<a href="<?php echo esc_url($promo_item_url); ?>" target="_self" >		 
						<h6 class="feature-page-title"><?php echo esc_html($ft_post_title); ?></h6>
						</a>
				</div> 
				
				<div class="feature-media">
				
					<a href="<?php echo esc_url($promo_item_url); ?>" target="_self" >
						<img alt="<?php esc_attr_e('Promo item image','the-gap'); ?>" src="<?php echo esc_url($promo_item_image); ?>" />
					</a>
				<span class="feature-corner-end"></span>	
				</div>
			
			</div> 
			<?php } ?>
		<?php } ?>
		
	</div>
	
	<?php 
}


/*
* To display product categories link with image
*
*/

function the_gap_frontpage_product_categories(){

	$product_categories	= array();
	if (class_exists('The_Gap_Pro')){
		$cat_number = 11;
	}else {
		$cat_number = 6;
	}
	
	for ( $i=1; $i < intval($cat_number); $i++ ) {
		
		$category_control = get_theme_mod('the_gap_category_control'.$i);
		
		if( !empty ( $category_control )) { 
			
			if( $category_control !='' ){

			$product_categories[] = get_theme_mod('the_gap_category_control'.$i );
			
			}

		}
	}
	 ?>
			<div class="product-category-container clear">
				<div class="product-category-inner-container">
					<?php
					$cat_section_title = get_theme_mod('product-category-section-title');
					$cat_section_description = get_theme_mod('product-category-section-desc');
				
						if($cat_section_title  != ''){ ?>
							<h4 class="product-cat-title"><?php echo esc_html($cat_section_title );?> </h4>
						<?php }
						
						if($cat_section_description != ''){ ?>
							<p class="product-cat-desc"><?php echo esc_html($cat_section_description); ?></p>
						<?php } ?>
						
					<div class="nl_grid_row category-content-container col_gap_30">
					<?php
						$i = 1;
						foreach ($product_categories as $product_category) {

							$cat_link = get_category_link( $product_category );
							$cat_name = get_term( $product_category );
							$thumb_id = get_term_meta( $product_category, 'thumbnail_id', true );
							
							$product_image_url = wp_get_attachment_image_src( $thumb_id, 'product-category-image' );
							if ($product_image_url){
							$product1_image_url = $product_image_url[0]; 
							}else{
								
								$product1_image_url = get_template_directory_uri() . "/assets/images/cover.jpg"; 
							}
						
						$cats_name ='';	
						if(!empty($cat_name)){
							$cats_name = $cat_name->name;
						}	
							?>
							<div class="product-category-content no_of_col_5 col_no_<?php echo esc_attr($i);  ?> col_padd_margin">
								<?php if ( $product1_image_url ) { ?>
								<div class="product-category-img" >
									<a class="product-category-link" href="<?php echo esc_url( $cat_link ); ?>">
									<img src="<?php echo esc_url( $product1_image_url ); ?>" alt="<?php echo esc_attr( $cats_name ); ?>" />
									</a>
								</div>
								<?php } ?>
								<div class="product-category-text">
									
									<h5 class="product-cat-box-title"><a title="<?php echo esc_attr($cats_name); ?>" 
									href="<?php echo esc_url( $cat_link ); ?>">
									<?php echo esc_html( $cats_name ); ?></a></h5>
									
									<div class="product-count">
									<a href="<?php echo esc_url( $cat_link ); ?>">
									<?php 
									$number_of_prod ='';	
						if(!empty($cat_name)){
									$number_of_prod = $cat_name->count;
						}
									if ($number_of_prod) { 
									echo absint($number_of_prod); 
									} ?> 
									<?php esc_html_e('Products','the-gap'); ?></a>
									</div>
								</div>
							</div> 
							
						<?php 
						$i++;
						if ($i == 6){$i = 1;}
						 }; ?>
					</div>
				</div><!--  -->
			</div><!--  -->
		<?php 
	wp_reset_postdata();
	
}

if(!function_exists('the_gap_is_product_category')) {
	function the_gap_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

/*
* To display shoppingcart icon on header
*
*/

function the_gap_header_cart_icon(){

	if ( class_exists( 'woocommerce' ) ) { ?>
	
				<a class="header-cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
					<i class="fa fa-shopping-basket"></i>
					<span class="cart-value"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
				</a>
				<div class="header-cart-total">
					<div class="total-label"><?php esc_html_e('Total', 'the-gap'); ?></div>
					<div class="cart-total-val"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
				</div>
		
	<?php }
 }


/*
* To display brand items on woo fornt page
*
*/
function the_gap_woo_brand_items(){
	
	$enable_product_brand_section = get_theme_mod('enable_product_brand_section');
	if ($enable_product_brand_section == '1'){
		
	 ?>
		
			<div class="brand-category-items-section clear">
			<?php $brand_title = get_theme_mod('product_brand_section_title');
			$brand_section_desc = get_theme_mod('product_brand_section_desc');
			$id = the_gap_html_id('brand');
				$class = '.';
				$class .= $id;
			?>
				<h4 class="product-brand-title"><?php echo esc_html($brand_title);?></h4>
				<p class="product-brand-desc"><?php echo esc_html($brand_section_desc);?></p>
					
				<div class="<?php echo esc_attr($id); ?> brand-items-container">
					<?php
						
				$slide_pages = array();
				$brand_slider_speed = '2000';
				
				if (class_exists('The_Gap_Pro')){
				$brand_slider_speed = get_theme_mod('brand-slider-speed','2000');
				}else {
				$brand_slider_speed = '2000';	
				}
				
	
         for ( $i=1; $i<7; $i++ ) {
            $slidePageId = get_theme_mod( 'product-brand-slide'.$i );
            if ( !empty ($slidePageId ) && $slidePageId !='0'){
               
			   $slide_pages[] = $slidePageId;
			}
         }

         $media_posts = new WP_Query( array(
            'posts_per_page'        => 6,
            'post_type'             =>  array( 'page' ),
            'post__in'              => $slide_pages,
            'orderby'               => 'post__in'
         ) );

         while( $media_posts->have_posts() ):$media_posts->the_post();
			
			
            $slide_image_url = get_the_post_thumbnail_url();
			
			
		$the_gap_slider_url = get_post_meta( get_the_ID(), 'the_gap_slider_url', true );
		if ($the_gap_slider_url){?>
		<a href="<?php echo esc_url($the_gap_slider_url) ?>">
		<img src="<?php echo esc_url($slide_image_url); ?>" alt="<?php the_title_attribute(); ?>" ></a>
		<?php }else { ?>
		<img src="<?php echo esc_url($slide_image_url); ?>" alt="<?php the_title_attribute(); ?>" >
		<?php } 
		endwhile;
		?>
						
					</div>
				
			</div>
		<?php 
	wp_reset_postdata();

	}
}

/*
* To include feature product slider on frontpage
*
*/
function the_gap_woo_feature_slider(){
	
	$enable_product_slider_section = get_theme_mod('enable_product_slider_section');
	$enable_feature_items = get_theme_mod('enable_product_promo','0');
	
	
	if ($enable_product_slider_section == '1'){
		$width_style ='';
		if ($enable_feature_items != '1'){
			$width_style = "full";
	}
	
	$fades = 'false';
	if (class_exists('The_Gap_Pro')){
		$feature_slider_speed = get_theme_mod('product-slider-speed','2000');
		$number_of_slides = 9;
				}else {
		$feature_slider_speed = '2000';	
		$number_of_slides = 5;
	}
	
		
		
	 ?>
	<div class="product-slider <?php echo esc_attr($width_style); ?>">
			<?php
				$types = 'full';
				$slide_pages = array();
			$product_slider_speed = get_theme_mod('product-slider-speed','2000');
        
		for ( $i=1; $i<$number_of_slides; $i++ ) {
			 
            $slidePageId = get_theme_mod( 'feature-product-slide'.$i );
			
            if ( !empty ($slidePageId) && $slidePageId != 0 ){
               
			   $slide_pages[] = $slidePageId;
			}
         }

         $media_posts = new WP_Query( array(
            'posts_per_page'        => 5,
            'post_type'             =>  array( 'page' ),
            'post__in'              => $slide_pages,
            'orderby'               => 'post__in'
         ) );
		 
		 $i=1;
         while( $media_posts->have_posts() ):$media_posts->the_post();
			
			$the_gap_slider_url = '';
			$slider_btn_txt = '';
			$slide_title = get_the_title();
            $slide_subtitle = the_gap_get_excerpt(35);
            $slide_image_url = get_the_post_thumbnail_url();
			
			$product_slider_btn_text = get_theme_mod('product_slider_btn_text');
			
		$the_gap_slider_url = get_theme_mod('feature_product_url'.$i); ?>
		
		<div class="slide">
		<?php if ($slide_image_url){ ?>
			<a href="<?php echo esc_url($the_gap_slider_url); ?>" title="<?php the_title_attribute();?>">
				<img src="<?php echo esc_url($slide_image_url); ?>" alt="<?php the_title_attribute();?>" />
			</a>
		<?php } ?>
			<div class="feature_product_border_style">
				
					<div class="product_slide_cta">
						
							<a  title="<?php the_title_attribute();?>" href="<?php echo esc_url($the_gap_slider_url); ?>" target="_self">
								<h2 class="nl-slide-product-title"><?php the_title(); ?></h2>
							</a>
							<?php if ($slide_subtitle){ ?>
							<h6 class="nl-slide-product-subtitle"><?php echo esc_html($slide_subtitle);?></h6>
							<?php } ?>
							
							<?php if ($product_slider_btn_text){?>
   <div class="slide1_button1">	
		<a  href="<?php echo esc_url($the_gap_slider_url) ?>" class="btn-default nlbtn1 slider-btn"
			 target="_self">
	
		<?php echo esc_html($product_slider_btn_text);  ?>
	
		</a>
	</div>
	<?php } ?>
		
	
					</div>
				
			</div> 
		
	</div>
	
	<?php 
	$i++;
	
		endwhile;
		?>
						
	</div>
				
			
		<?php 
		
	wp_reset_postdata();
	
	
	
	}
}

 /*
* To display all product categories on dropdown
*
*/

function the_gap_product_categories_lists() {
	
		
		
		$args = array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => 0,
				'title_li'   => '',
		);
		
		$prod_cats = get_categories($args);
		
		$prod_categories = array(
			'' => __( '- Select a Category -', 'the-gap' ),
		);

		

		if ( ! empty( $prod_cats ) ) {
			
				foreach ( $prod_cats as $prod_cat ) {

					if ( ! empty( $prod_cat->term_id )) {
					
						if (! empty( $prod_cat->name ) ) {
							$prod_categories[ $prod_cat->term_id ] = $prod_cat->name;
						}

					}
				}
		}
		return $prod_categories;
}

 
 
 function the_gap_woo_template_header_margin(){
	 
  $styles ='';
  $enable_feature_items = get_theme_mod('enable-feature-items','0');
  $enable_feature_slider = get_theme_mod('enable-feature-slider','0');
   
  if (is_front_page() && is_home()){ 
	if ($enable_feature_items == 1 ){
		$styles = "margin_top50;";
	}
	if($enable_feature_items != 1 && $enable_feature_slider == 1){
	  $styles = "margin_top25;";
	}
	if($enable_feature_items != 1 && $enable_feature_slider != 1){
	  $styles = "margin_top50;";
	}
  }
  if (is_home()){ 
	if ($enable_feature_items == 1 ){
		$styles = "margin_top50;";
	}
	if($enable_feature_items != 1 && $enable_feature_slider == 1){
	  $styles = "margin_top25;";
	}
	if($enable_feature_items != 1 && $enable_feature_slider != 1){
	  $styles = "margin_top50;";
	}
  }
  
  return $styles;
  
 }
 
function the_gap_add_cart_button () {

add_action( 'woocommerce_widget_product_item_end',
 'woocommerce_template_loop_add_to_cart', 10 );

}

add_action( 'after_setup_theme', 'the_gap_add_cart_button' );




function the_gap_banner1_on_frontpage(){
	$woo_banner_1 = get_theme_mod('woo_banner_1');
	if ($woo_banner_1){?>
	<div class="banner-area1">
		<img src="<?php echo esc_url($woo_banner_1); ?>" alt="<?php esc_attr_e('woo banner1','the-gap'); ?>" />
	</div>
	<?php
	}
}

if ( function_exists( 'YITH_WCWL' ) ) {
function the_gap_woo_wishlist() {

		?>

			<div class="wishlist-container">
				<a class="wishlist-icon" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>">
					<i class="fa fa-heart-o"> </i>
					
				</a>
			</div>
		

<?php } 
}

if ( function_exists( 'YITH_WCWL' ) ) {	
function the_gap_wcwl_move_wishlist_button(){
	
	
	
	echo do_shortcode( '[yith_wcwl_add_to_wishlist icon="fa fa-heart-o"]' );


}

add_action( 'woocommerce_widget_product_item_end', 'the_gap_wcwl_move_wishlist_button' );
add_action( 'woocommerce_after_shop_loop_item', 'the_gap_wcwl_move_wishlist_button' );


}

if ( function_exists( 'YITH_WCQV' ) ) {	

function the_gap_yith_quick_view_button(){
	
	echo '<span class="yith_qv_container">';
	
		echo do_shortcode( '[yith_quick_view]' );

		
	echo '</span>';
	


}
add_action( 'woocommerce_widget_product_item_end', 'the_gap_yith_quick_view_button' );

}



function the_gap_banner2_on_shop(){ ?>


<?php
$woo_banner_2 = get_theme_mod('woo_banner_2');
$banner2_heading= get_theme_mod('banner2_heading',__('Buy One Get One Free','the-gap'));
$banner2_desc = get_theme_mod('banner2_desc');
$banner2_btn_url = get_theme_mod('banner2_btn_url');
$banner2_btn_text= get_theme_mod('banner2_btn_text','');

	if ($woo_banner_2){?>
<div class="banner-container">
<div class="banner-overlay">
  <div class="banner-text">
  <?php if ($banner2_heading){?>
    <h2 class="woo_banner2_title"><?php echo esc_html($banner2_heading); ?></h2>
<?php } ?>
	<?php if ($banner2_desc){?>
    <p><?php echo esc_html($banner2_desc); ?></p>
	<?php } ?>
	
	<?php if ($banner2_btn_text){?>
   <div class="slide1_button1">	
		<a  href="<?php echo esc_url($banner2_btn_url) ?>" class="btn-default nlbtn1 banner-btn"
			 target="_self">
	
		<?php echo esc_html($banner2_btn_text);  ?>
	
		</a>
	</div>
	<?php } ?>
	
  </div>
</div>  
<div class="banner-image">
<img src="<?php echo esc_url($woo_banner_2); ?>" />
</div>

</div>
<?php

}
}

function the_gap_media_woo_title_family(){
	$style = '';
	if ( class_exists('The_Gap_Pro')) { 
		$style .= '.woo-front-page .widget-title,.product-cat-title,.product-brand-title{font-family:"oswald",sans-serif;}';
	}else {
	
		$style .= '.woo-front-page .widget-title,.product-cat-title,.product-brand-title{font-family:"oswald",sans-serif;}';
		
	}
	return $style;
}


function the_gap_add_account_link( $login_item, $args ) {
	
	
	
   if (is_user_logged_in() && $args->theme_location == 'primary') {

       $login_item .= '<li class="woo_login"><a href="'. esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )) .'">'. __('My Account','the-gap') .'</a></li>';

   }

   elseif (!is_user_logged_in() && $args->theme_location == 'primary') {

       $login_item .= '<li class="woo_login"><a href="' . esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )) . '">' . __('Log In/Register','the-gap') . '</a></li>';

   }
	
   return $login_item;

}

$site_header_pattern = get_theme_mod('site-header-alignment','right');
			
if ( $site_header_pattern == 'woo1') {
		
add_filter( 'wp_nav_menu_items', 'the_gap_add_account_link', 10, 2 );

}

function the_gap_woo_header_icon_part(){
?>
<div class= "woo-icon-part">
		
			<?php
		if ( function_exists( 'YITH_WCWL' ) ) {	?>
			<span>
				<a class="wishlist-icon" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>">
				
					<i class="fa fa-heart-o"></i>
				</a>	
			</span><?php
		}
		?>
		
			<span class="prod-search-icon">
			
			<i class="fa fa-search"></i>
				
			</span>
		
			
			<span class="prod-user-icon">
			<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>">
			<i class="fa fa-user"></i>
			</a>	
			</span>
			
			
	
			<span class="shopping-cart-container">
			<a class="header-cart-icon1" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
					<i class="fa fa-shopping-cart"></i>
					<span class="shopping-cart-value"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
			</a>
			
				<?php	the_widget( 'WC_Widget_Cart', '' );?>
			
			
			</span>
			
</div> 
<?php
}





