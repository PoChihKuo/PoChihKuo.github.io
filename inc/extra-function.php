<?php
/**
 * Post Related Functions.
 *
 * @package the-gap
 * @since   1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
@link  https://developer.wordpress.org/reference/hooks/excerpt_more/
*/
function the_gap_excerpt_more( $more ) {
	$post_style = get_theme_mod('post_style','style1');
	$col_no = get_theme_mod('post_column_no','1a');
	$hcstyle ='';					
	$read_more_btn_txt = get_theme_mod('read-more-input',__('Read More','the-gap'));
	if ($col_no == '1a')
	{
		$post_style = 'style2';
	}
	if ($post_style == 'style2'){
		if (has_post_thumbnail()){
	
			$hcstyle .= "thumb";				
		}else {
			$hcstyle .= "w_thumb";	
		}
	}
	
	if ($post_style == 'style2' && $col_no = '1' && $hcstyle == "thumb"){
		return sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),esc_attr($read_more_btn_txt),
          sprintf(__( 'Continue reading %s', 'the-gap' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
		} else {
		return sprintf( '<div class="blog-buttons"><a href="%1$s" class="more-link">%2$s</a></div>',
          esc_url( get_permalink( get_the_ID() ) ),esc_attr($read_more_btn_txt),
          sprintf(__( 'Continue reading %s', 'the-gap' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
		
		}
}
add_filter( 'excerpt_more', 'the_gap_excerpt_more' );


/*
* To Display featured item or promotional item
*
*/
function the_gap_post_featured_items(){

	$style = '';
	
	?>

	<div class="nl_grid_row the-gap-feature-grid col_gap_30">
		<?php for($i=1; $i<4; $i++) {?>
		
			<?php 	$feature_item_url = get_theme_mod('feature-item-url'.$i); 
			$featured_item_image = get_theme_mod('featured-item-image'.$i);
		
		if ($featured_item_image){
			?>
			<div class="nl-feature-entry no_of_col_3 col_no_<?php echo esc_attr($i);  ?> col_padd_margin">
			
				<div class="feature_blog_border_style <?php echo esc_attr( $style );  ?> clear">
			
							<?php 	$ft_post_title = get_theme_mod('post_feature_title'.$i);?>
						<a href="<?php echo esc_url($feature_item_url); ?>" target="_self" >		 
						<h6 class="feature-page-title"><?php echo esc_html($ft_post_title); ?></h6>
						</a>
				</div> 
				
				<div class="feature-media">
				
					<a href="<?php echo esc_url($feature_item_url); ?>" target="_self" >
						<img alt="<?php esc_attr_e('feature image','the-gap') ?>" src="<?php echo esc_url($featured_item_image); ?>" />
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
* To facilitate header media image with overlay text and animation
*
*/
function the_gap_header_media_image_overlay(){
	
		$heading_text = get_theme_mod('header-media-title-input');
		
		$overlays_height = get_theme_mod('ovr_heights','all');
		
		$media_btn_txt = get_theme_mod('header-slider-btn-text');		
		$the_gap_media_url = get_theme_mod('header-media-btn-url');
		
		$types = 'none1';  
		if ($overlays_height != 'all'){
		$types = 'colorbg';
	
		}
	
		if ($overlays_height == 'all'){
	
			$types = 'full';
		}
	
		$border_style ='';
		$border_style = get_theme_mod('header_ovl_style','none');
	
		if ($overlays_height == 'all'){
			$border_style = '';
			
		}
		
		$animate_style = '';
		$animate_itteration = '';
		$animated = '';
		if (class_exists('The_Gap_Pro')){
			
			$animate_style = get_theme_mod('header_media_animate','');
			$animate_itteration = get_theme_mod('animation_itteration','once');
			$animated = 'animated';
		}
	
		$enable_animated_text = get_theme_mod('enable-animated-text','');
		if ($enable_animated_text == '1'){
			$animated_text = 'yes';
		}else {
			$animated_text = 'no';
		}
		?>
        

<div class="header-media-image">

	<?php $blog_heading = get_bloginfo( 'name' ); ?>
		<div class="overlay_media_border_style <?php echo esc_attr($types); ?> animated <?php echo esc_attr($animate_itteration); ?> <?php echo esc_attr($animate_style); ?>">
	
			<div class="media-imag-overlay-cta <?php echo esc_attr($types); ?> <?php echo esc_attr($border_style); ?>">
				<?php if ($heading_text==''){ ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<h1 id="media_type" class="nl-media-ovr-title" data-mediaanimate="<?php echo esc_attr($animated_text) ?>" data-mediaheading="<?php echo esc_attr($blog_heading); ?>">
					
					<span>
					<?php bloginfo( 'name' ); ?>
					</span>
					
					</h1>
				</a>
				<?php } else { ?>	
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<h1 id="media_type" class="nl-media-ovr-title" data-mediaanimate="<?php echo esc_attr($animated_text) ?>" data-mediaheading="<?php echo esc_attr($heading_text); ?>">
					
					<span>
					<?php echo esc_html( $heading_text); ?>
					</span>
					
					</h1>
				</a>
				<?php } ?>	
				<?php $description = get_bloginfo( 'description', 'display' );
				if ($description || is_customize_preview()){ ?>
					<h6 class="nl-media-ovr-sub-title">			
						<?php	echo esc_html($description);?>	</h6>
				<?php } ?>	
				
				

	<?php if ($media_btn_txt){ ?>
	<div class="media_button">	
		<a  href="<?php echo esc_url($the_gap_media_url) ?>" class="btn-default nlbtn1 slide-btn"
			 target="_self">
	
		<?php echo esc_html($media_btn_txt);  ?>
	
		</a>
	</div>
	<?php }  ?>
	
					<div class="overlay_media_corner"></div>
			</div>
			
		</div>

	<div class="header-media" >
	 
		<?php	the_header_image_tag(); ?>
	</div>

</div>
<?php
}

/*
* 
* To facilitate header media slider with overlay text and animation
*
*/
function the_gap_header_media_slide_overlay(){
	
		
		$overlay_height = get_theme_mod('ovr_heights','all');
		$types = 'none1';
		if ($overlay_height != 'all'){
			$types = 'colorbg';
		}
	
		if ($overlay_height == 'all'){
			$types = 'full';
		}
		
		$media_type  = get_theme_mod('header-media-type','image');
		$media_position  = get_theme_mod('header_media_position','bottom');
		
		$border_style = get_theme_mod('header_ovl_style','none');
		
		
		if ($overlay_height == 'all'){
			$border_style = 'none';
			
		}
	
		$media_slider_style = 'slide';
		if ( class_exists('The_Gap_Pro')) { 
		
		$media_slider_style = get_theme_mod('media_slider_style','slide');
		$slideshow_speed = get_theme_mod('media-slider-speed','5000');
	
		}else {
			$slideshow_speed = '5000';
			$media_slider_style = 'slide';
		}

		$animate_style = '';
		$animate_itteration = '';
		if (class_exists('The_Gap_Pro')){
			$number_of_slider = 9;
			$animate_style = get_theme_mod('header_media_animate','');
			$animate_itteration = get_theme_mod('animation_itteration','once');
		
		}else{
			$number_of_slider = 5;
			$animate_style = 'shake';
		}
		
		
?>

<div class="flexsliders media-slider"> 
	<ul class="slides">
	
	<?php 
	
	$slide_pages = array();
	
         for ( $i=1; $i<$number_of_slider; $i++ ) {
			 
            $slidePageId = get_theme_mod( 'page-selection-slide'.$i );
			
			
            if ( !empty($slidePageId ) && $slidePageId !='0'){
               
			   $slide_pages[] = $slidePageId;
			}
         }

         $media_posts = new WP_Query( array(
            'posts_per_page'        => $number_of_slider,
            'post_type'             =>  array( 'page' ),
            'post__in'              => $slide_pages,
            'orderby'               => 'post__in'
         ) );
		 
			$i = 1;
         while( $media_posts->have_posts() ):$media_posts->the_post();
		 
			$the_gap_slider_url ='';
			$slider_btn_txt = '';
			$slide_title = get_the_title();
            $slide_subtitle = the_gap_get_excerpt(35);
            $slide_image_url = get_the_post_thumbnail_url();
			
			
			
		$slider_btn_txt = get_theme_mod('header-slider-btn-text');		
		
		$the_gap_slider_url = get_theme_mod('header_slider_url'.$i);
         
	if ($slide_image_url){ ?>
    <li>
      
		<div id="media_data" class="vc_slide_text" data-slidestyle="<?php echo esc_attr($media_slider_style); ?>" data-speed="<?php echo esc_attr($slideshow_speed); ?>">
		<?php 
		$the_gap_alt =__('header media image','the-gap');
		if ($the_gap_slider_url){ ?>
		<a href="<?php echo esc_url($the_gap_slider_url) ?>">
		<img src="<?php echo esc_url($slide_image_url); ?>" alt="<?php echo esc_attr($the_gap_alt); ?>"></a>
		<?php }else { ?>
		<img src="<?php echo esc_url($slide_image_url); ?>" alt="<?php echo esc_attr($the_gap_alt); ?>" >
		<?php } ?>
        <div class="slide_border_style <?php echo esc_attr($types); ?> animated <?php echo esc_attr($animate_itteration); ?> <?php echo esc_attr($animate_style); ?>">
		<div class="media_slide_cta <?php echo esc_attr($types); ?> <?php echo esc_attr($border_style); ?>">
		<?php 
		
			if ($slide_title){ ?>
				<a href="<?php echo esc_url($the_gap_slider_url) ?>" class="slide-ovr-title" title="<?php the_title_attribute(); ?>">
				
					
					<h1 class="nl-slide-ovr-title"><?php echo esc_html($slide_title) ?></h1></a>
			<?php }
	
		
		if ($slide_subtitle){ ?>
			<h5 class="nl-slide-ovr-sub-title"><?php echo esc_html($slide_subtitle) ?></h5>
		<?php } ?>	
			
			

	<?php if ($slider_btn_txt){ ?>
	<div class="media_button">	
		<a  href="<?php echo esc_url($the_gap_slider_url) ?>" class="btn-default nlbtn1 slide-btn"
			 target="_self">
	
		<?php echo esc_html($slider_btn_txt);  ?>
	
		</a>
	</div>
	<?php }  ?>
	
			
	<div class="media_slide_corner"></div>
	</div>
	</div>
	   
	</div>
    </li>
	<?php }
	
	  $i++;
         endwhile;
         // Reset Post Data
         wp_reset_query(); 

	?>
	
	
  </ul>

</div>

<?php

}

/*
* To facilitate header media video with overlay text and animation
*
*/

function the_gap_header_media_video_overlay(){

		$title_styles = '';

		$heading_text = get_theme_mod('header-media-title-input',__('BLOG TITLE','the-gap'));
	
	$enable_animated_text = get_theme_mod('enable-animated-text','');
	if ($enable_animated_text == '1'){
		$animated_text = 'yes';
	}else {
		$animated_text = 'no';
	}
		
		$video_btn_txt = get_theme_mod('header-slider-btn-text');		
		$the_gap_video_url = get_theme_mod('header-media-btn-url');

			?>
	
<div class="header-media-video-container">
		<?php $blog_heading = get_bloginfo( 'name' ); ?>
			<div class="video-overlay">
				<div class="video-overlay-cta">
				<?php if ($heading_text == ''){ ?>
					<h1 id="videotype" class="video-media-ovr-title" data-videoanimate="<?php echo esc_attr($animated_text);  ?>" data-videotxt="<?php echo esc_attr($blog_heading); ?>">
					<span>
					<?php bloginfo( 'name' ); ?>
					</span>
					</h1>
				<?php } else { ?>	
				<h1 id="videotype" class="video-media-ovr-title" data-videoanimate="<?php echo esc_attr($animated_text); ?>" data-videotxt="<?php echo esc_attr($heading_text); ?>">
					<span><?php echo esc_html($heading_text) ?></span>
					
				</h1>
				<?php }  ?>	
				<?php if ($video_btn_txt){ ?>
				<div class="media_button">	
					<a  href="<?php echo esc_url($the_gap_video_url) ?>" class="btn-default nlbtn1 slide-btn"
					target="_self">
	
					<?php echo esc_html($video_btn_txt);  ?>
					
	
					</a>
				</div>
	<?php }  ?>
				</div>
					
			</div>
		
	
	<div class="header-media-video">
	 
		<?php	the_custom_header_markup(); ?>
	</div>

</div>
<?php
}


function the_gap_feature_post_select_slider() { 

		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$id = the_gap_html_id('feature');
		$feature_slider ='';
		$feature_slider_number = '';
		$feature_slider_style = '';
		$slideshow_speed = '5000';
		
		if ( class_exists('The_Gap_Pro')) {
			
		$feature_slider_number = get_theme_mod('feature-slider-number','9');
		$feature_slider_style = get_theme_mod('feature_slider_style','slide');
		$slideshow_speed = get_theme_mod('feature-slider-speed','5000');
		
		} else {
			$feature_slider_style = 'slide';
			$slideshow_speed = '5000';
			$feature_slider_number = 5;
		}
	
		$loop = new WP_Query(
				array(
					'post_type' => 'post',
					'cat' =>get_theme_mod('fpage_featured_category',''),
					'posts_per_page' =>intval($feature_slider_number),
					
					'post_status' => 'publish',
					
				)
			);
	
		$feature_slider ='';
	
	$slider_type = get_theme_mod('slider_type','slide');
	$ovl_width = '';
	if ($slider_type == 'carousel'){
		$ovl_width = 'full';
	}
	
	$enable_animation = get_theme_mod('enable-animated-text-featured','');
	
	if ($enable_animation == '1'){
		$enable_animation = 'yes';
	}else {
		$enable_animation = 'no';
	}
	
?>

<div class="flexsliders feature-slider feature-carousel"> 
	<ul class="slides clear">
	<?php

	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); 
			
		if (has_post_thumbnail()){
		$slide1_src = get_the_post_thumbnail_url();
		}else {
		$slide1_src = get_template_directory_uri() . "/assets/images/dummy-image.jpg"; 	
		}
	
	 if ($slide1_src){ ?>
    <li>

		<div id="feature_data" class="feature_slider_entry <?php echo esc_attr($feature_slider); ?>" data-slidestyle="<?php echo esc_attr($feature_slider_style); ?>" data-speed="<?php echo esc_attr($slideshow_speed); ?>" data-slidertype="<?php echo esc_attr($slider_type); ?>" data-number="<?php echo esc_attr($feature_slider_number); ?>">
        <img src="<?php echo esc_url($slide1_src); ?>" alt="<?php the_title_attribute();?>" title="<?php the_title_attribute();?>" />
        
			<div class="feature_slide_border_abs <?php echo esc_attr($ovl_width); ?>">
				
					<div class="feature_post_cta" >
						<div class="slider-category"><?php the_category(); ?></div>
		
		
							<a  title="<?php the_title_attribute();?>" href="<?php the_permalink(); ?>" target="_self">
								<h3  class="nl-slide-feature-title"><span id="<?php echo esc_attr($id); ?>" data-title="<?php the_title_attribute(); ?>" data-enable="<?php echo esc_attr($enable_animation); ?>"><?php the_title(); ?></span></h3>
							</a>
						<div class="featured-slider-meta">
							<?php the_gap_single_posted_meta_time_author(); ?>
						</div>
			
						
	
					</div>
				
			</div> 
		</div>
	
    </li>
	<?php 
	
	} 
	endwhile;

		endif; 
	?>
  </ul>

</div>
<?php

      wp_reset_postdata(); 
 }
 

/*
* To display title and meta on list post
*
*/
 function the_gap_list_post_title_meta() {
	 ?>
		<div class="title-meta">
		 <!-- To display categories on the top of the post title -->
			<?php echo wp_kses_post(get_the_category_list());?>
		
		<!-- To display titles of blog post -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
		
		<?php
		
		// To display meta of blog post -->	
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
		    	
	
			<!-- Meta function calling -->
				<?php the_gap_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
		</div>
		<?php
 }
 
/*
* To display header media on header
*
*/
 
 function the_gap_header_media_position() {
		?>
	<div id="header-media-container" class="header-media-container">
		<?php 
		$background_animation = '';
		$background_animation = get_theme_mod('enable-background-animation');
		if ( get_header_image() && get_theme_mod('header-media-type','image')=='image') {
		
		if ( class_exists('The_Gap_Pro')) { 
			
			if ($background_animation == '1'){
					the_gap_pro_header_media_image_overlay();
				} else {
					the_gap_header_media_image_overlay();
				}
			} else {
			
				the_gap_header_media_image_overlay();
		
		
			}
		}
		
		if (( get_theme_mod('header-media-type','image')=='video')) {
			
			the_gap_header_media_video_overlay(); 
			
		
		}
		
		if ( get_theme_mod('header-media-type','image')=='slide') {  
			
			the_gap_header_media_slide_overlay(); 
			
		
		}

	
	?>
	</div>
<?php 

}

/*
* To display popular post on header
*
*/

function the_gap_popular_post(){
?>
		
		<div class="nl_grid_row popular-post-grid col_gap_30">

	
		<?php
		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			
		$popular_post_number = '';
		if ( class_exists('The_Gap_Pro')) { 
		$popular_post_number = get_theme_mod('popular-post-number','4');
		}else {
			$popular_post_number = 4;
		}
			
			$loop = new WP_Query(
				array(
					'post_type' => 'post',
					'cat' =>get_theme_mod('popular_category',''), 
					'posts_per_page' =>intval($popular_post_number),
					
					'orderby' => 'comment_count',
					'order' => 'desc',
					
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1
				)
			);
	
			$col_count = 0;
			$col_no = 2; 
			
	
		if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();  ?>
	
				<?php $col_count++;  ?>
				
			<div class="nl-blog-entry no_of_col_<?php echo esc_attr( $col_no );  ?> col_no_<?php echo esc_attr( $col_count );  ?> col_padd_margin" >

				<div class="blog-pop_border_style">
	
						
						<?php if (has_post_thumbnail()) {
								$src = get_the_post_thumbnail_url();
							}else {
								$src = get_template_directory_uri() . "/assets/images/dummy-image.jpg"; 
							}
								?>
								<div  class="pop_post_thumbnail">
			
								<?php  if($src){ ?>
					
									<a href="<?php the_permalink(); ?>" target="_self">
										<img src="<?php echo esc_url($src) ?>" alt="<?php the_title_attribute(); ?>" />
									</a>
								
								<?php    }  ?>
								
							
								</div>
	
							<div class="blog-pop-cta">
							<div class="pop-cta">
							<div><?php echo wp_kses_post(get_the_category_list());?></div>
							<a href="<?php the_permalink(); ?>" target="_self">
							<h3 class="blog-title"><?php the_title(); ?></h3>
							</a>
								<div class="vc-entry-meta">
									<?php the_gap_single_posted_meta_time_author(); ?>
								</div><!-- .entry-meta -->
							</div>
							</div>
						
		
						
				</div>
			</div> <!--  end single post -->
	
	
			<?php 		
			
					if ( $col_count == $col_no) {
						$col_count = '0';
					}	

			endwhile; ?>
		</div>
	 		
		<?php 
		

		endif; 
		wp_reset_postdata(); 
	
		
}

function the_gap_all_widgets() {
	
return $nl_widgets = array('The_Gap_Author_Box',
'The_Gap_Contacts_Widget','The_Gap_Latest_News',
'The_Gap_Shortcode','The_Gap_Slide_Overlay','The_Gap_Socials');

}



function the_gap_excerpt_length( $length ) {
	if ( is_admin() ) {
                return $length;
        }
  $excerpt = get_theme_mod('post-exerpt-length', '35');
  return absint($excerpt);
}
add_filter( 'excerpt_length', 'the_gap_excerpt_length', 999 );



function the_gap_fontawesome_social_list(){

		return $social_links_icons = array(
		''=>__('none','the-gap'),
		'fa-500px'=>__('500px','the-gap'),
		'fa-adn'=>__('adn','the-gap'),'fa-amazon'=>__('amazon','the-gap'),
		'fa-android'=>__('android','the-gap'),'fa-apple'=>__('apple','the-gap'),
		'fa-behance'=>__('behance','the-gap'),'fa-codepen'=>__('codepen','the-gap'),
		'fa-deviantart'=>__('deviantart','the-gap'),'fa-digg'=>__('digg','the-gap'),
		'fa-dribbble'=>__('dribbble','the-gap'),'fa-dropbox'=>__('dropbox','the-gap'),
		'fa-facebook-f'=>__('facebook','the-gap'),'fa-flickr'=>__('flickr','the-gap'),
		'fa-foursquare'=>__('foursquare','the-gap'),'fa-google-plus'=>__('google-plus',
		'the-gap'),'fa-github'=>__('github','the-gap'),
		'fa-instagram'=>__('instagram','the-gap'),
		'fa-linkedin'=>__('linkedin','the-gap'),
		'fa-medium-m'=>__('medium','the-gap'),
		'fa-pinterest-p'=>__('pinterest-p','the-gap'),
		'fa-get-pocket'=>__('get-pocket','the-gap'),
		'fa-reddit-alien'=>__('reddit-alien','the-gap'),
		
		'fa-skype'=>__('skype','the-gap'),'fa-slideshare'=>__('slideshare','the-gap'),
		'fa-snapchat-ghost'=>__('snapchat-ghost','the-gap'),
		'fa-soundcloud'=>__('soundcloud','the-gap'),
		'fa-spotify'=>__('spotify','the-gap'),
		'fa-stumbleupon'=>__('stumbleupon','the-gap'),
		'fa-tumblr'=>__('tumblr','the-gap'),'fa-twitch'=>__('twitch','the-gap'),
		'fa-twitter'=>__('twitter','the-gap'),'fa-vimeo-v'=>__('vimeo','the-gap'),
		'fa-vine'=>__('vine','the-gap'),
		'fa-vk'=>__('vk','the-gap'),'fa-wordpress'=>__('WordPress','the-gap'),
		'fa-yelp'=>__('yelp','the-gap'),
		
		'fa-tripadvisor'=>__('tripadvisor','the-gap'),
		'fa-youtube'=>__('youtube','the-gap'),
		'fab fa-whatsapp'=>__('whatsapp','the-gap'),

		'fa-cc-amex'=>__('amex','the-gap'),'fa-cc-mastercard'=>__('mastercard','the-gap'),'fa-cc-paypal'=>__('cc-paypal','the-gap'),'fa-cc-stripe'=>__('stripe','the-gap'),
		
		'fa-cc-visa'=>__('visa','the-gap'),'fa-credit-card'=>__('credit-card','the-gap'),'fa-google-wallet'=>__('google-wallet','the-gap'),'fa-paypal'=>__('paypal','the-gap'),
		
		'fa-cc-discover'=>__('discover','the-gap'),'fa-cc-jcb'=>__('jcb','the-gap'),
		''=>__('none','the-gap'));
	
}

function the_gap_comment_navigation() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'the-gap' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'the-gap' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', esc_html($prev_link ));
				endif;
				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'the-gap' ) ) ) :
					printf( '<div class="nav-next">%s</div>', esc_html($next_link ));
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}


function the_gap_single_navigation() {
	
	if ( is_singular( 'attachment' ) ) {
				// Blog Post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'the-gap' ),
				) );
				} elseif ( is_singular( 'post' ) ) {
				//Blog post navigation( Previous/next)
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'the-gap' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'the-gap' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'the-gap' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'the-gap' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
	}
	
}



function the_gap_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'the_gap_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
 
 

function the_gap_pingback_header() {
	
if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
	
}
add_action( 'wp_head', 'the_gap_pingback_header' );


function the_gap_add_search_box( $items, $args ) {
	
$items .= '<li class="search-icon"><button class="sbtn"><i class="fa fa-search"></button></i></li>';
return $items;

}


$site_header_pattern = get_theme_mod('site-header-alignment','right');
if ($site_header_pattern == 'left' || $site_header_pattern == 'right' ||
$site_header_pattern == 'inline' ||$site_header_pattern == 'center' ||
$site_header_pattern == 'both-left' ){
	add_filter( 'wp_nav_menu_items','the_gap_add_search_box', 10, 2 );
}

function the_gap_add_sidebar_icon( $items, $args ) {
	
$items .= '<li class="sidebar-icon"><i class="fa fa-bars"></i></li>';
return $items;


}
add_filter( 'wp_nav_menu_items','the_gap_add_sidebar_icon', 10, 2 );


  

function the_gap_ovl_box_style(){
	
	
		
	return array(
				'none' => __('None', 'the-gap'),
				'style1' => __('Double Border', 'the-gap'),
				'style2' => __('Border Shadow', 'the-gap'),
				'style3' => __('Corner Border', 'the-gap'),
			);
		
	
}

function the_gap_blog_fronpage_margins(){
	
  
  $styles ='';
  $enable_feature_items = get_theme_mod('enable-feature-items','0');
  $enable_feature_slider = get_theme_mod('enable-feature-slider','0');
   
  if (is_front_page() && is_home()){ 
	if ($enable_feature_items == 1 ){
		$styles = "fifty";
	}
	if($enable_feature_items != 1 && $enable_feature_slider == 1){
	  $styles = "twentyfive";
	}
	if($enable_feature_items != 1 && $enable_feature_slider != 1){
	  $styles = "fifty";
	}
  }
  if (is_home()){ 
	if ($enable_feature_items == 1 ){
		$styles = "fifty";
	}
	if($enable_feature_items != 1 && $enable_feature_slider == 1){
	  $styles = "twentyfive";
	}
	if($enable_feature_items != 1 && $enable_feature_slider != 1){
	  $styles = "fifty";
	}
  }
  return $styles;
 
}

function the_gap_blog_front_page_content_header(){
	 if (!is_front_page()){ ?>
<div class="page-content-header">
    
	<div class="inner-content">	    
	

		<div class="blog-post-page">	
		<!-- Title for blog list page/blog home page(index.php)  -->
		<?php if(!is_front_page()) { ?>
		<h1 class="page-title">
			<?php $the_gap_page_title = get_the_title( get_option('page_for_posts', true) ); 
			echo esc_html($the_gap_page_title);
			?>
		</h1><!-- page  title -->
	<?php } ?>
		</div><!-- entry-header -->
	
	</div> <!-- innder header end -->
	
</div> <!-- page header end -->
 <?php } 
 
}

function the_gap_blog_fpage_feature_items(){
	$enable_feature_items = get_theme_mod('enable-feature-items','0');
	$show_featured_pages = get_theme_mod('show_featured_pages','both'); 
	
	?>
	
	<div class="featured-area">
	<?php
	if ($enable_feature_items == '1'){

		if ($show_featured_pages == 'both'){
			the_gap_post_featured_items();
		}
	
		if ($show_featured_pages == 'fpage' && is_front_page()){
			the_gap_post_featured_items();
		}
	
		if (($show_featured_pages == 'lpage') && (is_home())){
			if (!is_front_page()){
			the_gap_post_featured_items();
			}
		}
		
	}

	?>
	</div> 
	<?php
}

function the_gap_blog_fpage_feature_sliders(){
	if (class_exists('The_Gap_Pro')){
	$show_feature_order = get_theme_mod('show_feature_order','top');
	} else {
		$show_feature_order = 'top';
	}
	$show_slide_pages = get_theme_mod('show_slide_pages','both');
	$enable_feature_slider = get_theme_mod('enable-feature-slider','0');
	$feature_post_title = get_theme_mod('feature-slider-section-title');
	
	if ($enable_feature_slider == '1'){
		if ($show_feature_order == 'top'){ ?>
	
			<div class="feature-post">
				<?php if ($feature_post_title){ ?>
					<h3 class="feature-post-title">
						<?php echo esc_html($feature_post_title); ?>
					</h3>
				<?php }
	 
					if ($show_slide_pages == 'both'){
						the_gap_feature_post_select_slider();
					}
	
					if ($show_slide_pages == 'fpage' && is_front_page()){
						the_gap_feature_post_select_slider();
					}
	
					if ($show_slide_pages == 'lpage' && is_home()){
						if (!is_front_page()){
							the_gap_feature_post_select_slider();
						}
					} ?> 
			</div> 
		<?php
		}
	}
	
}


function the_gap_blog_fpage_popular_post(){

	if ( class_exists('The_Gap_Pro')) { 
	$show_popular_order = get_theme_mod('show_popular_order','bottom');
	$show_popular_pages = get_theme_mod('show_popular_pages','both');
	$enable_popular_post = get_theme_mod('enable-popular-post');
	$popular_post_title = get_theme_mod('popular-post-section-title'); 
	
	if ($enable_popular_post == '1'){
		if ($show_popular_order == 'top'){
	
	?>
	<div class="popular-post">
	<?php if ($popular_post_title){ ?>
	<h3 class="popular-post-title">
	<?php echo esc_html($popular_post_title); ?>
	</h3> 
	<?php } ?>
	<?php
	
		if ($show_popular_pages == 'both'){
			the_gap_popular_post();
		}
	
		if ($show_popular_pages == 'fpage' && is_front_page()){
			the_gap_popular_post();
		}
	
		if ($show_popular_pages == 'lpage' && is_home()){
			if (!is_front_page()){
			the_gap_popular_post();
			}
		}
	  ?>	
	</div> 
	<?php } 
	 } 
	} 
}

function the_gap_blog_fpage_feature_post_bottom(){

	if ( class_exists('The_Gap_Pro')) { 
	$show_feature_order = get_theme_mod('show_feature_order','top');
	$show_slide_pages = get_theme_mod('show_slide_pages','both');
	$enable_feature_slider = get_theme_mod('enable-feature-slider','0');
	$feature_post_title = get_theme_mod('feature-slider-section-title');
	
	if ($enable_feature_slider == '1'){
		if ($show_feature_order == 'bottom'){?>

			<div class="feature-post">
	<?php if ($feature_post_title){ ?>
	<h3 class="feature-post-title">
	<?php echo esc_html($feature_post_title); ?>
	</h3>
	 <?php }
	 
		if ($show_slide_pages == 'both'){
			the_gap_feature_post_select_slider();
		}
	
		if ($show_slide_pages == 'fpage' && is_front_page()){
			the_gap_feature_post_select_slider();
		}
	
		if ($show_slide_pages == 'lpage' && is_home()){
			if (!is_front_page()){
			the_gap_feature_post_select_slider();
			}
		}?>
		</div> 
		<?php
	 }
	}
	}
}


function the_gap_blog_fpage_popular_post_bottom(){
	
	$show_popular_pages = get_theme_mod('show_popular_pages','both');
	$enable_popular_post = get_theme_mod('enable-popular-post');
	$popular_post_title = get_theme_mod('popular-post-section-title'); 
	$show_popular_order = get_theme_mod('show_popular_order','top');
	
	if ($enable_popular_post == '1'){
			$show_popular_order = 'bottom';
			if (class_exists('The_Gap_Pro')){
			$show_popular_order = get_theme_mod('show_popular_order','bottom');
			}
			if (($show_popular_order == 'bottom')){
		
	?>
	<div class="popular-post">
	<?php
	if ($popular_post_title){?>
	<h3 class="popular-post-title">
	<?php echo esc_html($popular_post_title); ?>
	</h3> 
	<?php } ?>
	<?php
	
		if ($show_popular_pages == 'both'){
			the_gap_popular_post();
		}
	
		if ($show_popular_pages == 'fpage' && is_front_page()){
			the_gap_popular_post();
		}
	
		if ($show_popular_pages == 'lpage' && is_home()){
			if (!is_front_page()){
			the_gap_popular_post();
			}
		}
	  ?>	
	</div> 
	
	<?php }
	} 
}

function the_gap_post_categories()
    {
	
		$args = array(
				'taxonomy'   => 'category',
				'hide_empty' => 0,
				'title_li'   => '',
		);
		$post_cats = get_categories($args);
		$post_categories = array(
		'' => __( '--All--', 'the-gap' ),
		);
		if ( ! empty( $post_cats ) ) {
			
				foreach ( $post_cats as $post_cat ) {

					if ( ! empty( $post_cat->term_id )) {
					
						if (! empty( $post_cat->name ) ) {
							$post_categories[ $post_cat->term_id ] = $post_cat->name;
						}

					}
				}
		}
		return $post_categories;
    }
	
	
function the_gap_get_excerpt($word){
		if ($word != ''){
        $exc_words = explode(' ', get_the_excerpt(), $word);
        if (count($exc_words) >= $word) {
            array_pop($exc_words);
            $exc_words = implode(" ", $exc_words);
        } else {
            $exc_words = implode(" ", $exc_words);
        }
		 
        $exc_words = preg_replace('`\[[^\]]*\]`', '', $exc_words);
        return $exc_words;
		}
		

}

function the_gap_starter_content_add_widget( $content, $config ) {

        $content = array(
            'theme_mods', array(
                'header-media-title-input' =>'BLOG TITLE',
            ),
        );
   
    return $content;
	
	
	
}
add_filter( 'get_theme_starter_content', 'the_gap_starter_content_add_widget', 10, 2 );


function the_gap_header_icon_part(){
    
    
?>
<div class= "woo-icon-part">
		
			
			<span class="page-user-icon">
			<a href="<?php echo esc_url( wp_login_url() ); ?>">
			<i class="fa fa-user"></i>
			</a>	
			</span>
		

			<span class="page-search-icon">
		    <button>
			<i class="fa fa-search"></i>
			</button>
			</span>
			
<?php	if ( class_exists('woocommerce')) { ?>
			<span class="shopping-cart-container">
			<a class="header-cart-icon1" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
					<i class="fa fa-shopping-cart"></i>
					<span class="shopping-cart-value"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
			</a>
			
				<?php	the_widget( 'WC_Widget_Cart', '' );?>
			
			
			</span>
			
	<?php	} else { ?>
		
		<span class="shopping-cart-container">
		
			<i class="fa fa-shopping-cart"></i>
			
			
		</span>
		
	<?php	} ?>
			
</div> 
<?php

}