<?php
/**
 * Template part for displaying single post.
 * 
 * @package the-gap
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="single-header">
			
	
			<div class="featured-image top">
			<?php 
			if( get_theme_mod( 'hide-featured-images-single') != '1' && has_post_thumbnail()) {
			$thumbnail_size = get_theme_mod('single-thumbnail-sizes','medium_large');
			the_post_thumbnail($thumbnail_size); 
			}
			?>
			</div>
		
		
		
		<div class="single-title-meta">
			<!-- to display categories on top  -->
			<?php echo wp_kses_post(get_the_category_list());?>
			<!-- Single Blog Post Title  -->	
			<h1 class="single-title"><?php the_title(); ?></h1>
			<div class="featured-image middle">
			<?php 
			if( get_theme_mod( 'hide-featured-images-single') != '1' && has_post_thumbnail()) {
			$thumbnail_size = get_theme_mod('single-thumbnail-sizes','medium_large');
			the_post_thumbnail($thumbnail_size); 
			}
			?>
			</div>
			<!-- Single Blog Post Meta  -->
			<div class="single-meta">
				<?php the_gap_single_posted_on(); ?>
			</div><!-- .single-meta -->
			<div class="featured-image down">
			<?php 
			if( get_theme_mod( 'hide-featured-images-single') != '1' && has_post_thumbnail()) {
			$thumbnail_size = get_theme_mod('single-thumbnail-sizes','medium_large');
			the_post_thumbnail($thumbnail_size); 
			}
			?>
			</div>
		</div>
		
	</header><!-- .single-header -->
    
    <!-- Single Blog Post Content  -->
	<div class="single-content clear">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the-gap' ), 
				array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
	
			wp_link_pages( array(
				'before' => '<div class="page-links clear">' . esc_html__( 'Pages:', 'the-gap' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- End .single-content -->
	
	
<!-- Single Blog Post Footer Content  -->
	<footer class="single-footer clear">
	<?php if ( 'post' === get_post_type() ) {
	$get_tags = get_the_tag_list( '', esc_html__( ', ', 'the-gap' ) );
		if ( $get_tags ) {
			printf( /* translators: tag link */'<div class="tags-links">' . esc_html__( 'Tagged %1$s', 'the-gap' ) . '</div>', wp_kses_post($get_tags )); // WPCS: XSS OK.
		}
	}
		 ?>
		<?php the_gap_single_entry_footer(); ?>
	</footer><!-- .single-footer -->
	
</article><!-- #post-## -->
