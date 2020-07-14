<?php

/**
 * The template for displaying all single posts and attachments
 *
 * 
 *  @package the-gap
*/

get_header();


	?>
<div class="page-content-header">
    <div class="inner-content">	 <!-- inner-container of page header -->   
    </div>	<!-- header inner content end -->
	
	
</div><!-- page header end -->

<div id="inner-content" class="inner-content">
	<div  class="single-primary-seconday">
	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
	
			<?php
			// Single Blog Post Loop Start.
			while ( have_posts() ) : the_post(); ?>
				<div class="post-single-entry">
				<?php
				// Attach template to single.php which is located on template-parts folder
				get_template_part( 'template-parts/content', 'single' );
				?>
				</div>
			
				<div class="single-nav">
				<?php
				the_gap_single_navigation();
				?>
			
				</div>
				
				<?php
				$enable_posts = get_theme_mod('enable-single-related-post','');
			
				
				
			if ($enable_posts == '1'){
				?>
				
			<div class="related-single clear">
			<?php
            // Attach related post template to single.php
			
			 get_template_part( 'single-post/related-posts' ); ?>
			 </div>
			
			<?php } ?>
			
			<div class="single-comments">
			<?php
			// Attach comment template to single.php based on condition
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
			</div>
			
			
			<?php
			// End of the loop.
			
		endwhile;
		?>
		
	</main><!-- site-main end-->

	</div><!-- primary end-->

<?php get_sidebar(); ?>
</div><!-- primary-secondary end-->
</div><!-- inner content end-->
<?php get_footer(); ?>