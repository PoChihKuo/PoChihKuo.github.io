<?php
/**
 * The main template file
 * 
 *  @package the-gap
 **/

get_header();
 ?>
 
 <?php $styles = the_gap_blog_fronpage_margins();
the_gap_blog_front_page_content_header(); ?>

<div id="inner-content" class="inner-content <?php echo esc_attr($styles); ?>">
    
	<?php the_gap_blog_fpage_feature_items();
	the_gap_blog_fpage_feature_sliders(); 
	the_gap_blog_fpage_popular_post();
	?>

	<!-- primary area of index.php -->

	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
		
		<?php $post_section_title = get_theme_mod('post_section_title');
		$post_column_no = get_theme_mod('post_column_no','1a');
		$section_styles = '';
		if ($post_section_title != ""){ ?>
		 <h3 class="blog_post_section_title"><?php echo esc_html($post_section_title); ?></h3>
		<?php } ?>
		
		<div class="nl_grid_row the-gap-post-grid col_gap_30">
			<?php
			$col_count = 0;
		if ( have_posts() ) :
			 $counter = 1; 
			
			
		if (($post_column_no == '2a')){
			$col_count = -1;
		} else {
			$col_count = 0;
		}
		
			if($post_column_no == '2a'){
				$col_no = 2;
			}
			elseif ($post_column_no == '1a'){
				$col_no = 1;
			}
			else {
			$col_no = $post_column_no;
			}
			
			
			$style = get_theme_mod('post_style','style1');
			
			
			if ($post_column_no == '1a')
			{
				$style = 'style2';
			}
			if ($style == 'style2'){$col_no = 1;}
			
			/* Start the Loop */
			while ( have_posts() ) :
				$col_count++; $fstyles = '';  
				if($col_count == 0){$fstyles = 'margins';}else {$fstyles = '';}
		
				if($col_count != 0){
				?>
				
			<div class="<?php echo esc_attr( $style );  ?> nl-blog-entry no_of_col_<?php echo esc_attr( $col_no );  ?> col_no_<?php echo esc_attr( $col_count );  ?> col_padd_margin" >
				<?php } ?>
				<div class="home_blog_border_style <?php echo esc_attr( $fstyles );  ?> <?php echo esc_attr( $style );  ?> clear">
			<?php
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
		?>
				
				<?php
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() ); ?>
				
				
				<?php if (get_theme_mod('post_column_no','1a') == '1a' && get_theme_mod('enable-related-post-home') == '1') { 
				
				
				if ($counter < 5){
				
				?>
				<div class="the-gap-related-posts">
					<?php
					// Attach related post template to single.php
					get_template_part( 'single-post/related-posts' ); ?>
				</div>
				
					<?php }
				$counter++; 
				 } ?>
				
				</div> 
			<?php	if($col_count != 0){ ?>
			</div> 
			<?php } ?>
			<?php
				if ( $col_count == $col_no) {
						$col_count = '0';
					}
			endwhile;
			
			 ?>
		</div>	 
			<nav class="navigation pagination clear" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'the-gap' ); ?></h1>
				<?php 
					    the_posts_pagination( 
            	array(
				    'prev_text' => __( '&larr; Previous', 'the-gap' ),
				    'next_text' => __( 'Next &rarr;', 'the-gap' ),
					)
            	); 
				?>
			</nav><!-- navigation -->
			<?php 
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		
		</main><!-- main -->
		
		<?php the_gap_blog_fpage_feature_post_bottom();
		the_gap_blog_fpage_popular_post_bottom();
		?>
	
	</div><!-- primary -->

	<?php get_sidebar(); ?>
	
	
</div> <!-- inner content end -->

<?php get_footer(); ?>
