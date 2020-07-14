<?php
/**
 * The template for displaying archive pages
 *
 * 
 *  @package the-gap
 */

get_header(); 

	?>
<div class="page-content-header">
	<div class="inner-content">	    

		<!-- title of archive page -->
			<div class="archive-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div><!-- page-header -->
	
	</div>
</div>

<div id="inner-content" class="inner-content">
    
<div  class="primary-seconday">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="nl_grid_row the-gap-post-grid col_gap_30">
			<?php
		if ( have_posts() ) :
			
			$col_count = 0;
		
			$style = get_theme_mod('post_style','style1');
			$col_no = get_theme_mod('post_column_no','1a');
			if (($col_no == '2a')){
				$col_count = -1;
				} else {
				$col_count = 0;
			}
			
			if($col_no == '2a'){
				$col_no = 2;
			}
			elseif ($col_no == '1a'){
				$col_no = 1;
			}
			else {
			$col_no = $col_no;
			}
			
			if ($col_no == '1a')
			{
				$style = 'style2';
			}
			
			if ($style == 'style2'){
				$col_no = 1;
			}
			
			/* Start the Loop */
			while ( have_posts() ) :
				$col_count++;  
				$fstyles = '';
				
				if($col_count == 0){
					$fstyles = 'margins';
				}else {
					$fstyles = '';
				}
	
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
				get_template_part( 'template-parts/content', get_post_format() ); ?>
				
				
				
				
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

		</main><!-- main end -->
	</div><!-- primary end-->

<?php
get_sidebar();  ?>
</div><!-- primary-secondary end-->
</div><!-- inner-content -->
	
	<?php
get_footer();
?>
